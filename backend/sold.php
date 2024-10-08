<?php
// Start the session
session_start();

// Include the database configuration
include 'config.php';

// Fetch sold orders from the database
$sql = "SELECT * FROM sold ORDER BY order_date DESC";
$result = $conn->query($sql);
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sold Orders</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding: 15px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #e2e6ea;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .product-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }

        .status {
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
        }

        .status.active {
            background-color: #28a745;
        }

        .status.draft {
            background-color: #ffc107;
        }

        .status.scheduled {
            background-color: #17a2b8;
        }
    </style>
</head>

<body>
    
    <div class="container mt-4">
        <h2>Sold Orders</h2>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>User Email</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($sold = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($sold['product_id']); ?></td>
                        <td><img src="images/<?php echo htmlspecialchars($sold['image']); ?>" style="width: 50px;" alt="Product Image"></td>
                        <td><?php echo htmlspecialchars($sold['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($sold['user_email']); ?></td>
                        <td><?php echo htmlspecialchars($sold['order_date']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>