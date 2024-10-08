<?php


session_start();

// Check if the delete warning session variable is set
if (isset($_SESSION['delete_warning'])):
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="deleteAlert">
        This product cannot be deleted because it has been ordered.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Show the alert
            var deleteAlert = document.getElementById('deleteAlert');
            if (deleteAlert) {
                var bootstrapAlert = new bootstrap.Alert(deleteAlert);
                bootstrapAlert.show();
            }
        });
    </script>
<?php
    // Unset the session variable to avoid showing the alert on page refresh
    unset($_SESSION['delete_warning']);
endif;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="container mt-4">
        <h1>Products</h1>
        <a href="add_product.php" class="btn btn-primary mb-3">Add New Product</a>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';
                $sql = "SELECT p.ProductID, p.Name, p.Price, p.Stock, p.Image, c.CategoryName, p.Description
                            FROM products p
                            JOIN categories c ON p.CategoryID = c.CategoryID";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $statusClass = strtolower($row['Description']);
                    echo '<tr>';
                    echo '<td><img src="images/' . $row['Image'] . '" class="product-img" alt="Product Image"> ' . $row['Name'] . '</td>';
                    echo '<td>' . $row['CategoryName'] . '</td>';
                    echo '<td>$' . number_format($row['Price'], 2) . '</td>';
                    echo '<td>' . $row['Stock'] . '</td>';
                    echo '<td>' . ucfirst($row['Description']) . '</td>';
                    echo '<td><a href="edit_product.php?id=' . $row['ProductID'] . '" class="btn btn-sm btn-info">Edit</a> <a href="delete_product.php?id=' . $row['ProductID'] . '" class="btn btn-sm btn-danger">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>