<?php
// Start the session
session_start();

// Include the database configuration
include 'config.php';

// Get the product ID from the POST request
$productID = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

// Escape the product ID to prevent SQL injection
$productID = mysqli_real_escape_string($conn, $productID);

// Check if the product exists
$sql = "SELECT * FROM products WHERE ProductID = $productID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    $productName = $product['Name'];
    $productPrice = $product['Price'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (!isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID] = [
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1
        ];
    } else {
        $_SESSION['cart'][$productID]['quantity'] += 1;
    }

    header('Location: cart.php');
    exit();
} else {
    echo "Product not found.";
}
