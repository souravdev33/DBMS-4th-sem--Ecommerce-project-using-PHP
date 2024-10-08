<?php
// Start the session
session_start();

// Include the database configuration
include 'config.php';

// Count the number of sold orders
$sql = "SELECT COUNT(*) AS total_sold FROM sold";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalSold = $row['total_sold'];

// Count the number of customers
$sql = "SELECT COUNT(*) AS total_customer FROM customerprofile";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalCustomer = $row['total_customer'];

// Query to count the total number of reviews
$sql = "SELECT COUNT(*) AS total_reviews FROM reviews";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalReviews = $row['total_reviews'];

// Query to count total earnings
$sql = "SELECT SUM(p.Price * s.Quantity) AS total_earnings
        FROM sold s
        JOIN products p ON s.product_id = p.ProductID";
$result = $conn->query($sql);

// Fetch total earnings
$row = $result->fetch_assoc();
$totalEarnings = $row['total_earnings'];

// Fetch order details from the database
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);

// Fetch customer details from the database with concatenated name
$sql1 = "SELECT customerID, CONCAT(FirstName, ' ', LastName) AS Name, Email FROM customerprofile";
$result1 = $conn->query($sql1);

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
    header("Location: admin1.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li><a href="#">
                        <span class="icon"><ion-icon name="logo-apple"></ion-icon></span>
                        <span class="title">Brand Name</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Customers</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
                        <span class="title">Message</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                        <span class="title">Help</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <span class="title">Passwords</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>



        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- userImg -->
                <div class="user">
                    <img src="bidhan.jpg" alt="">
                </div>
            </div>
            <!-- cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo htmlspecialchars($totalCustomer); ?></div>
                        <div class="cardName">Customers</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo htmlspecialchars($totalSold); ?></div>
                        <div class="cardName">Sales</div>
                    </div>
                    <div class="iconBx">
                        <a href="sold.php"><ion-icon name="cart-outline"></ion-icon></a>

                    </div>
                </div>
                <a href="store_reviews.php">
                    <div class="card">

                        <div>
                            <div class="numbers"><?php echo htmlspecialchars($totalReviews); ?></div>
                            <div class="cardName">Reviews</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </div>
                    </div>
                </a>

                <div class="card">
                    <div>
                        <div class="numbers">$<?php echo htmlspecialchars($totalEarnings); ?></div>
                        <div class="cardName">Earning</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- order details list -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <!-- <a href="" class="btn">View All</a> -->
                    </div>
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
                                        <form action="admin1.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['id']); ?>">
                                            <button type="submit" name="status" value="packed" class="btn btn-success btn-sm"><i class='bx bxs-send'></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!-- new Customers -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Customers</h2>
                    </div><br><br>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result1->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result1->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($row['customerID']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['Name']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['Email']) . '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="3">No customers found</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        //MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function() {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }


        //add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');

        function activeLink() {
            list.forEach((item) =>
                list.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
            item.addEventListener('mouseover', activeLink))
    </script>
</body>

</html>