<!-- <style>
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

<div class="d-flex">
    <div class="sidebar">
        <h2>x10sion</h2>
        <a href="admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="products.php"><i class="fas fa-box"></i> Products</a>
        <a href="categories.php"><i class="fas fa-tags"></i> Categories</a>
        <a href="sold.php"><i class="fas fa-shopping-cart"></i> Sold</a>
        <a href="customers.php"><i class="fas fa-users"></i> Customers</a>
        <a href="analytics.php"><i class="fas fa-chart-line"></i> Analytics</a>
        <a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a>
        <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
    </div> -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your custom CSS file -->
    <style>
        /* styles.css */

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 220px;
            background-color: #f8f9fa;
            padding: 15px;
            transform: translateX(-220px);
            transition: transform 0.3s ease;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar button {
            position: absolute;
            top: 15px;
            transition: right 0.3s ease;
            z-index: 1000;
        }

        #sidebarToggle {
            right: -50px;
            transform: rotate(90deg);
        }

        #sidebarClose {
            right: 15px;
            top: 15px;
        }

        .sidebar.active #sidebarToggle {
            right: 220px;
        }

        .sidebar.active #sidebarClose {
            right: 15px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #e2e6ea;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .sidebar.active~.content {
            margin-left: 0;
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

        .sidebar a.active {
            background-color: #007bff;
            color: #fff;
        }

        .sidebar a.active:hover {
            background-color: #0056b3;
            /* Slightly darker color for hover effect on active link */
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <div class="sidebar" id="sidebar">
            <button class="btn btn-primary" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <button class="btn btn-danger" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
            <h2>x10sion</h2>
            <a href="admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="products.php"><i class="fas fa-box"></i> Products</a>
            <a href="categories.php"><i class="fas fa-tags"></i> Categories</a>
            <a href="sold.php"><i class="fas fa-shopping-cart"></i> Sold</a>
            <a href="customers.php"><i class="fas fa-users"></i> Customers</a>
            <a href="analytics.php"><i class="fas fa-chart-line"></i> Analytics</a>
            <a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a>
            <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarClose = document.getElementById('sidebarClose');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.add('active');
            });

            sidebarClose.addEventListener('click', function() {
                sidebar.classList.remove('active');
            });
        });

        //Active page selection
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('.sidebar a');
            const currentPage = window.location.pathname.split("/").pop(); // Get the current page's file name

            sidebarLinks.forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.classList.add('active');
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script> <!-- Link to your custom JavaScript file -->
</body>

</html>