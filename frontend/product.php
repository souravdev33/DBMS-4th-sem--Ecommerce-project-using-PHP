<?php
// Start output buffering
ob_start();

// Include header
include 'header.php';


// session_start();

if (!isset($_SESSION['customer_logged_in']) || !$_SESSION['customer_logged_in']) {
    header('Location: login.php');
    exit();
}

include 'config.php';

// Get the product ID from the URL
$productID = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Store the product ID in session for review submission
$_SESSION['ProductID'] = $productID;

// $productID = mysqli_real_escape_string($conn, $productID);
$sql = "SELECT * FROM products WHERE ProductID = $productID";
$result = $conn->query($sql);
$product = $result->num_rows > 0 ? $result->fetch_assoc() : null;

// End output buffering and flush the output
ob_end_flush();
?>

<div class="container mt-4">
    <?php if ($product): ?>
        <div class="row">
            <div class="col-md-6">
                <img src="..//frontend/images/<?php echo htmlspecialchars($product['Image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($product['Name']); ?>">
            </div>
            <div class="col-md-6">
                <h3><?php echo htmlspecialchars($product['Name']); ?></h3>
                <p><?php echo htmlspecialchars($product['Description']); ?></p>
                <p><strong>Price:</strong> $<?php echo htmlspecialchars($product['Price']); ?></p>
                <p><strong>Stock:</strong> <?php echo htmlspecialchars($product['Stock']); ?></p>
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $productID; ?>">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
        <?php include 'review.php'; ?>
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>
</div>

<?php
// Include footer
include 'footer.php';
?>
