<?php

// Include header
include 'header.php';

// Include the database configuration
include 'config.php';

// Get the CategoryID from the URL and validate it
$categoryID = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Initialize variables
$categoryName = '';
$products = [];

if ($categoryID > 0) {
    // Sanitize the CategoryID
    $categoryID = mysqli_real_escape_string($conn, $categoryID);

    // Prepare and execute the query to get the CategoryName based on the CategoryID
    $sql = "SELECT CategoryName FROM categories WHERE CategoryID = $categoryID";
    $result = $conn->query($sql);

    // Check if the category exists and get the CategoryName
    if ($result->num_rows > 0) {
        $categoryName = $result->fetch_assoc()['CategoryName'];
    } 
    else {
        $categoryName = 'Category not found';
    }

    // Fetch products based on the CategoryID
    $sql = "SELECT * FROM products WHERE CategoryID = $categoryID";
    $result = $conn->query($sql);

    // Fetch all products
    $products = $result->fetch_all(MYSQLI_ASSOC);
} 
else {
    $categoryName = 'Invalid Category ID';
}
?>

<div class="container mt-4">
    <h2><?php echo htmlspecialchars($categoryName); ?></h2>
    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="card">
                        <img src="images/<?php echo htmlspecialchars($product['Image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['Name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['Name']); ?></h5>
                            <p class="card-text">$<?php echo htmlspecialchars($product['Price']); ?></p>
                            <a href="product.php?id=<?php echo intval($product['ProductID']); ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products found in this category.</p>
        <?php endif; ?>
    </div>
</div>

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition: transform 0.2s;
    }

    .card-img-top {
        width: 100%;
        height: 220px;
    }
</style>

<?php
// Include footer
include 'footer.php';
?>