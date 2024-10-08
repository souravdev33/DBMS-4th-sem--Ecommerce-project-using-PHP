<?php
include 'config.php';

session_start();

if (isset($_GET['id'])) {
    $productID = intval($_GET['id']);

    // Check if the product is already ordered
    $checkOrderSql = "SELECT COUNT(*) AS orderCount FROM orders WHERE product_id = $productID";
    $orderResult = mysqli_query($conn, $checkOrderSql);
    $orderCount = mysqli_fetch_assoc($orderResult)['orderCount'];

    if ($orderCount > 0) {
        // If the product is found in any orders, set a session variable for the alert
        $_SESSION['delete_warning'] = true;
        header("Location: products.php");
        exit();
    } 
    else {
        // First, delete records from the 'sold' table that reference this product
        $deleteSoldSql = "DELETE FROM sold WHERE product_id = $productID";
        mysqli_query($conn, $deleteSoldSql);

        // Then, proceed to delete the product from the 'products' table
        $sql = "DELETE FROM products WHERE ProductID = $productID";
        mysqli_query($conn, $sql);

        header("Location: products.php");
        exit();
    }
}
?>
