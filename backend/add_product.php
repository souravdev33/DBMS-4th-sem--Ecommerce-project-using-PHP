<?php
include 'config.php';
if (isset($_POST['submit'])) {
    // Sanitize and validate inputs
    $name = mysqli_real_escape_string($conn, $_POST['pname']);
    $price = floatval($_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $stock = intval($_POST['stock']);
    $categoryID = intval($_POST['catagoryID']);
    $image = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name']; // Fixed typo from 'temp_name' to 'tmp_name'
    $folder = 'images/' . $image;

    // Check if file was uploaded
    if (move_uploaded_file($tempname, $folder)) {
        // Prepare SQL query
        $query = "INSERT INTO products (Name, Price, Description, Stock, CategoryID, Image) VALUES ('$name', '$price', '$description', '$stock', '$categoryID', '$image')";
        // Execute SQL query
        if (mysqli_query($conn, $query)) {
            echo "<h2>Product added successfully</h2>";
        } else {
            echo "<h2>Error: " . mysqli_error($conn) . "</h2>";
        }
    } else {
        echo "<h2>File did not upload</h2>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Add Product</title>
</head>

<body>
    <style>
        .container {
            padding: 20px;
            width: 40%;
            box-sizing: border-box;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: #ececec;
        }
    </style>
    <div class="container mt-4">
        <form action="add_product.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" class="form-control" id="pname" name="pname" placeholder="Product name" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" required>
            </div>
            <div class="form-group">
                <label for="catagoryID">Category ID</label>
                <input type="number" class="form-control" id="catagoryID" name="catagoryID" placeholder="Category ID" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>