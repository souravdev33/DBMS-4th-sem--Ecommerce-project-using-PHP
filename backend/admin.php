<?php
// Start the session
session_start();

// Include the database configuration
include 'config.php';

// Fetch order details from the database
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);

// Check if the form was submitted
if (isset($_POST['status']) && $_POST['status'] === 'packed') {
    $orderID = intval($_POST['order_id']);

    // Fetch the order details
    $sql = "SELECT * FROM orders WHERE id = " . $orderID;
    $result = $conn->query($sql);
    $order = $result->fetch_assoc();

    if ($order) {
        // Escape values before inserting into the 'sold' table
        $product_id = mysqli_real_escape_string($conn, $order['product_id']);
        $image = mysqli_real_escape_string($conn, $order['image']);
        $quantity = mysqli_real_escape_string($conn, $order['quantity']);
        $user_email = mysqli_real_escape_string($conn, $order['user_email']);
        $order_date = mysqli_real_escape_string($conn, $order['order_date']);

        // Move the order to the 'sold' table
        $sql = "INSERT INTO sold (product_id, image, quantity, user_email, order_date)
                VALUES ('$product_id', '$image', '$quantity', '$user_email', '$order_date')";
        $conn->query($sql);

        // Delete the order from the 'orders' table
        $sql = "DELETE FROM orders WHERE id = " . $orderID;
        $conn->query($sql);
    }

    // Redirect back to the admin dashboard
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Dashboard</title>

</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="container mt-4">
        <h2>Admin Dashboard - Orders</h2>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>User Email</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['product_id']); ?></td>
                        <td><img src="images/<?php echo htmlspecialchars($order['image']); ?>" style="width: 50px;" alt="Product Image"></td>
                        <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($order['user_email']); ?></td>
                        <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                        <td>
                            <form action="admin.php" method="POST" style="display: inline;">
                                <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['id']); ?>">
                                <button type="submit" name="status" value="packed" class="btn btn-success btn-sm"><i class='bx bxs-send'></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>