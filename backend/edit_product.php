<?php
include 'config.php';

if (isset($_GET['id'])) {
    // Retrieve product by ID
    $productID = intval($_GET['id']);
    $productID = mysqli_real_escape_string($conn, $productID);

    $sql = "SELECT * FROM products WHERE ProductID = '$productID'";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}

if (isset($_POST['update_product'])) {
    // Escape form inputs
    $productID = intval($_POST['ProductID']);
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $price = floatval($_POST['Price']);
    $stock = intval($_POST['Stock']);
    $categoryID = intval($_POST['CategoryID']);
    $description = mysqli_real_escape_string($conn, $_POST['Description']);

    // Update the product in the database
    $sql = "UPDATE products SET Name='$name', Price='$price', Stock='$stock', CategoryID='$categoryID', Description='$description' WHERE ProductID='$productID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: products.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Edit Product</h1>
        <form method="post">
            <input type="hidden" name="ProductID" value="<?php echo htmlspecialchars($product['ProductID']); ?>">
            <div class="form-group">
                <label for="Name">Product Name</label>
                <input type="text" class="form-control" id="Name" name="Name" value="<?php echo htmlspecialchars($product['Name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" class="form-control" id="Price" name="Price" value="<?php echo htmlspecialchars($product['Price']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Stock">Stock</label>
                <input type="number" class="form-control" id="Stock" name="Stock" value="<?php echo htmlspecialchars($product['Stock']); ?>" required>
            </div>
            <div class="form-group">
                <label for="CategoryID">Category</label>
                <input type="number" class="form-control" id="CategoryID" name="CategoryID" value="<?php echo htmlspecialchars($product['CategoryID']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea class="form-control" id="Description" name="Description" required><?php echo htmlspecialchars($product['Description']); ?></textarea>
            </div>
            <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>

</html>
