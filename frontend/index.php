<?php
// Include header
include 'header.php';
?>

<div class="container m-0 p-0 w-100 mw-100 overflow-hidden">
    <!-- Categories and Banner Slider -->
    <div class="row p-5 d-flex justify-content-center align-items-center" style="background-image: url(/frontend/img/home/home.jpg); height:90vh; object-fit:cover;background-size:cover; background-repeat:no-repeat; ">

        <!--hero section -->
        <div class="col-md-6 pl-md-5 font-weight-bold">
            <h4>Free Delivery Festival</h4>
            <h1>Mega Deals</h1>
            <h3>Add to cart & win your products</h3>
            <button class="btn btn-primary"> <a href="product_showcase.php" class="text-white">Shop now</a></button>
        </div>
        <!-- Banner Slider -->
        <div class="col-md-6 pr-md-5">
            <!-- Add your slider code here -->
            <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/frontend/img/carousel/01.jpg" class="d-block w-100" alt="Banner 1">
                    </div>
                    <div class="carousel-item">
                        <img src="/frontend/img/carousel/02.jpg" class="d-block w-100" alt="Banner 2">
                    </div>
                    <div class="carousel-item">
                        <img src="/frontend/img/carousel/03.jpg" class="d-block w-100" alt="Banner 3">
                    </div>
                    <div class="carousel-item">
                        <img src="/frontend/img/carousel/04.jpg" class="d-block w-100" alt="Banner 4">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Categories -->

        <div class="col">
            <h1 class="text-center">Our Categories</h1>
            <?php include 'categories.php'; ?>
        </div>
    </div>
    <h1 class="text-center">Our Products</h1><br>
    <!-- Products Showcase -->
    <div class="row px-5">
        <div class="col-12">
            <!-- <h2><?php echo $searchQuery ? 'Search Results for "' . htmlspecialchars($searchQuery) . '"' : 'OUR Products'; ?></h2> -->
            <div class="row">
                <?php
                // Limit the number of products to 18
                $limitedProducts = array_slice($products, 0, 18);

                if (!empty($limitedProducts)) {
                    foreach ($limitedProducts as $product) {
                        echo '<div class="col-sm-6 col-md-3 col-lg-2 mb-4">'; // Adjusted grid classes
                        echo '<div class="card">';
                        echo '<img src="images/' . htmlspecialchars($product['Image']) . '" class="card-img-top" alt="' . htmlspecialchars($product['Name']) . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title" style="font-size: 1rem;">' . htmlspecialchars($product['Name']) . '</h5>'; // Smaller title
                        echo '<p class="card-text" style="font-size: 0.9rem;">$' . htmlspecialchars($product['Price']) . '</p>'; // Smaller text
                        echo '<a href="product.php?id=' . $product['ProductID'] . '" class="btn btn-primary btn-sm">View Details</a>'; // Smaller button
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

    <div class="text-center mt-4">
        <a href="product_showcase.php" class="btn btn-primary btn-lg">
            <!-- ALL Products... -->
            <i class='bx bx-chevrons-right'></i>
        </a>
    </div>

    <br>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transition: transform 0.2s;
        }

        .card-img-top {
            width: 100%;
            height: 150px;
        }
    </style>

    <?php
    // Include footer
    include 'footer.php';
    ?>