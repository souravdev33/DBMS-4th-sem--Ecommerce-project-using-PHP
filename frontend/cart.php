<?php
// Start output buffering
ob_start();

// Include header
include 'header.php';

// Include the database configuration
include 'config.php';

// Check if the user is logged in and user email is set in session
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$userEmail = $_SESSION['email'];

// Handle remove button logic
if (isset($_GET['remove'])) {
    $removeProductID = intval($_GET['remove']);
    if (isset($_SESSION['cart'][$removeProductID])) {
        unset($_SESSION['cart'][$removeProductID]);
    }
    header('Location: cart.php');
    exit();
}

// Handle update quantities button logic
if (isset($_POST['update_quantity']) && isset($_POST['quantities'])) {
    foreach ($_POST['quantities'] as $productID => $quantity) {
        $productID = intval($productID);
        $quantity = intval($quantity);
        if ($quantity > 0) {
            $_SESSION['cart'][$productID]['quantity'] = $quantity;
        } else {
            unset($_SESSION['cart'][$productID]);
        }
    }
    header('Location: cart.php');
    exit();
}

if (isset($_POST['place_order'])) {
    $orderDate = date('Y-m-d H:i:s');

    foreach ($_SESSION['cart'] as $productID => $cartItem) {
        // Fetch product details from the database
        $productID = mysqli_real_escape_string($conn, $productID);
        $sql = "SELECT * FROM products WHERE ProductID = $productID";
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();

        if ($product) {
            $quantity = $cartItem['quantity'];
            $productImage = $product['Image'];

            // Insert order into the orders table
            $insertSql = "INSERT INTO orders (product_id, image, quantity, user_email, order_date) 
                          VALUES ('$productID', '" . mysqli_real_escape_string($conn, $productImage) . "', 
                          '$quantity', '" . mysqli_real_escape_string($conn, $userEmail) . "', '$orderDate')";
            if (!$conn->query($insertSql)) {
                die('Error inserting order: ' . htmlspecialchars($conn->error));
            }
        }
    }

    // Clear the cart after placing the order
    unset($_SESSION['cart']);
    $orderPlaced = true;
}
// End output buffering and flush the output
ob_end_flush();
?>

<div class="container mt-4">
    <h2>Shopping Cart</h2>
    <?php if (isset($orderPlaced) && $orderPlaced): ?>
        <p class="alert alert-success">Your order has been placed successfully!</p>
    <?php endif; ?>
    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <form method="post" action="cart.php">
            <table class="table" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Price</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $productID => $cartItem) {
                        // Fetch product details from the database
                        $productID = mysqli_real_escape_string($conn, $productID);
                        $sql = "SELECT * FROM products WHERE ProductID = $productID";
                        $result = $conn->query($sql);
                        $product = $result->fetch_assoc();

                        if ($product) {
                            $quantity = $cartItem['quantity'];
                            $subtotal = $product['Price'] * $quantity;
                            $total += $subtotal;
                            echo '<tr>';
                            echo '<td style="text-align: center;"><img src="images/' . htmlspecialchars($product['Image']) . '" class="img-fluid" style="width: 60px;" alt="' . htmlspecialchars($product['Name']) . '"></td>';
                            echo '<td style="text-align: center;">' . htmlspecialchars($product['Name']) . '</td>';
                            echo '<td style="text-align: center;">$' . htmlspecialchars($product['Price']) . '</td>';
                            echo '<td style="text-align: center;">
                                <input type="number" name="quantities[' . $productID . ']" value="' . htmlspecialchars($quantity) . '" min="1" class="form-control" style="width: 60px;">
                                </td>';
                            echo '<td style="text-align: center;">$' . htmlspecialchars($subtotal) . '</td>';
                            echo '<td style="text-align: center;">
                                <a href="cart.php?remove=' . $productID . '" class="btn btn-danger btn-sm">Remove</a>
                                </td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                        <td style="text-align: center;"><strong>$<?php echo $total; ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" name="update_quantity" class="btn btn-primary">Update Quantities</button>
            <button type="submit" name="place_order" class="btn btn-success">Place Order</button>
        </form>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>

<?php
// Include footer
include 'footer.php';
?>
