<?php
// Start the session
// session_start();
// Include header
include 'header.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Custom CSS for box shadow -->
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transition: transform 0.2s;
        }

        .card-img-top {
            width: 100%;
            height: 250px;
        }
    </style>

    <title>Product</title>
</head>

<body>

    <!-- Products Showcase -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h2><?php echo $searchQuery ? 'Search Results for "' . htmlspecialchars($searchQuery) . '"' : 'All Products'; ?></h2>
                <div class="row">
                    <?php
                    if (!empty($products)) {
                        foreach ($products as $product) {
                            echo '<div class="col-sm-6 col-md-3 mb-4">';
                            echo '<div class="card h-100 d-flex flex-column">';
                            echo '<img src="images/' . htmlspecialchars($product['Image']) . '" class="card-img-top" alt="' . htmlspecialchars($product['Name']) . '">';
                            echo '<div class="card-body flex-grow-1 d-flex flex-column justify-content-between">';
                            echo '<div class="mb-2">';
                            echo '<h5 class="card-title mb-1">' . htmlspecialchars($product['Name']) . '</h5>';
                            echo '<p class="card-text text-primary">$' . htmlspecialchars($product['Price']) . '</p>';
                            echo '</div>';
                            echo '<a href="product.php?id=' . $product['ProductID'] . '" class="btn btn-primary mt-auto w-100">View Details</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No products found.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>