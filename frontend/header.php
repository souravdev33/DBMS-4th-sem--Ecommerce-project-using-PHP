<?php
// Start the session
session_start();

// Include the database configuration
include 'config.php';

// Initialize variables
$searchQuery = '';
$products = [];

// Check if there's a search query
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    $sql = "SELECT * FROM products WHERE Name LIKE '%" . $conn->real_escape_string($searchQuery) . "%'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
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
    <title>E-commerce</title>
    <style>
        .navbar {
            transition: top 0.3s;
            background-color: #343a40;
        }

        .navbar-nav .nav-item .nav-link {
            color: #fff;
            font-size: 16px;
            transition: color 0.3s;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #ff6347;
        }

        .navbar-brand img {
            width: 30px;
            height: 30px;
        }

        .placeholder {
            height: 70px;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .navbar-toggler-icon {
            color: #fff;
        }

        .badge-danger {
            background-color: #ff6347;
        }

        .nav-link i {
            margin-right: 5px;
        }

        .navbar-nav .nav-item .nav-link,
        .navbar-nav .nav-link {
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link i {
            margin-right: 5px;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <div class="placeholder"></div>

    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="index.php">
            <img src="/frontend/img/logo.png" alt="Logo"> x10sion
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../frontend/index.php"><i class='bx bxs-home'></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../frontend/product_showcase.php"><i class='bx bxs-grid'></i> Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php"><i class='bx bxs-info-circle'></i> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../frontend/contact.php"><i class='bx bxs-contact'></i> Contact</a>
                </li>
                <li>
                    <div class="row mb-6 px-5">
                        <div class="col-12">
                            <form action="product_showcase.php" method="GET" class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search for products" aria-label="Search" name="query" value="<?php echo htmlspecialchars($searchQuery); ?>">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="navbar-nav">
                <?php if (isset($_SESSION['customer_logged_in']) && $_SESSION['customer_logged_in']) : ?>
                    <a class="nav-link" href="profile.php"><i class='bx bxs-user-circle'></i> Profile</a>
                    <a class="nav-link" href="logout.php"><i class='bx bx-log-out'></i> Logout</a>
                <?php else : ?>
                    <a class="nav-link" href="login.php"><i class='bx bx-log-in'></i> Login</a>
                    <a class="nav-link" href="signup.php"><i class='bx bxs-user-plus'></i> Sign Up</a>
                <?php endif; ?>
                <a class="nav-link" href="cart.php">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-pill badge-danger">
                        <?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Your page content here -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var previousScroll = 0;
            $(window).scroll(function() {
                var currentScroll = $(this).scrollTop();
                if (currentScroll > previousScroll) {
                    $('.navbar').css('top', '-70px');
                } else {
                    $('.navbar').css('top', '0');
                }
                previousScroll = currentScroll;
            });
        });
    </script>
</body>

</html>