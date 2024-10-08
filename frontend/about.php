<?php
include 'header.php';
// session_start();
include 'config.php';

// Check if the customer is logged in
if (!isset($_SESSION['customer_logged_in']) || !$_SESSION['customer_logged_in']) {
    header('Location: login.php');
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>x10sion - About Us</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome and Boxicons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
            color: #333;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 15px 0;
        }

        #navbar {
            display: flex;
            justify-content: center;
            background-color: #495057;
            padding: 10px 0;
        }

        #navbar li {
            list-style: none;
            margin: 0 15px;
        }

        #navbar li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            padding: 10px 15px;
            transition: background-color 0.3s, color 0.3s;
        }

        #navbar li a:hover {
            background-color: #f4b41a;
            color: #343a40;
            border-radius: 5px;
        }

        #page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/banner/about-banner.jpg') no-repeat center center/cover;
            padding: 100px 0;
            text-align: center;
            color: #fff;
        }

        #page-header h2 {
            font-size: 48px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        #page-header p {
            font-size: 20px;
            font-weight: 300;
        }

        .section-p1 {
            padding: 60px 0;
        }

        .section-p1 h2 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .section-p1 p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
            color: #6c757d;
        }

        .marquee {
            background-color: #f4b41a;
            padding: 10px 0;
            color: #343a40;
            font-weight: 500;
            font-size: 16px;
        }

        .section-p1 .video {
            margin-top: 30px;
        }

        .video video {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .fe-box {
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .fe-box:hover {
            transform: translateY(-10px);
        }

        .fe-box img {
            width: 80px;
            margin-bottom: 15px;
        }

        .fe-box h6 {
            font-size: 18px;
            font-weight: 500;
            color: #343a40;
        }

        #newsletter {
            background-color: #343a40;
            color: #fff;
            padding: 40px 0;
        }

        #newsletter h4 {
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        #newsletter p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        #newsletter .form input[type="email"] {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            width: 300px;
            max-width: 100%;
            margin-right: 10px;
        }

        #newsletter .form button {
            padding: 10px 20px;
            background-color: #f4b41a;
            border: none;
            border-radius: 5px;
            color: #343a40;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #newsletter .form button:hover {
            background-color: #ffcc00;
        }

        .footer {
            background-color: #343a40;
            color: black;
            padding: 40px 0;
        }

        .footer .col h4 {
            color: #f4b41a;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .footer .col a {
            color: black;
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer .col a:hover {
            color: #f4b41a;
        }

        .footer .icon i {
            font-size: 20px;
            margin-right: 10px;
            color: #f4b41a;
        }

        .copyright {
            background-color: #222;
            color: black;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!--PAGE HEADER SECTION START-->
    <section id="page-header" class="about-header">
        <h2>Know the x10sion Team</h2>
        <h2>Bringing the store to your door</h2>
    </section>
    <!--PAGE HEADER SECTION END-->

    <!-- About Us Section -->
    <section id="about-head" class="section-p1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Who We Are?</h2>
                    <p>Welcome to x10sion—your one-stop shop for a hassle-free online shopping experience. We’re here to bring you closer to the products you need with convenience and quality at the forefront. From tech gadgets to daily essentials, our diverse catalog is designed to meet your needs effortlessly. Enjoy a seamless experience with exceptional service and fast delivery. Shop with us and see why x10sion is your go-to destination for all things shopping!</p>
                    <marquee class="marquee" loop="-1" scrollamount="5" width="100%">Bringing the store to your door</marquee>
                </div>
                <div class="col-md-6">
                    <img src="img/banner/about-banner.jpg" class="img-fluid" alt="About Us">
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile App Section -->
    <section id="about-app" class="section-p1">
        <div class="container text-center">
            <h1>Download Our Mobile <a href="#">App</a></h1>
            <div class="video">
                <video autoplay muted loop src="img/video/e-commerce-app.mp4"></video>
            </div>
        </div>
    </section>

    <!-- Feature Section -->
    <section id="feature" class="section-p1 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-2 fe-box">
                    <img src="./img/feature/01.png" alt="">
                    <h6>Wholesale Price</h6>
                </div>
                <div class="col-md-4 col-lg-2 fe-box">
                    <img src="./img/feature/02.png" alt="">
                    <h6>Everyday Low Price!</h6>
                </div>
                <div class="col-md-4 col-lg-2 fe-box">
                    <img src="./img/feature/03.png" alt="">
                    <h6>Fashion</h6>
                </div>
                <div class="col-md-4 col-lg-2 fe-box">
                    <img src="./img/feature/04.png" alt="">
                    <h6>Branding</h6>
                </div>
                <div class="col-md-4 col-lg-2 fe-box">
                    <img src="./img/feature/05.png" alt="">
                    <h6>Payment Methods</h6>
                </div>
                <div class="col-md-4 col-lg-2 fe-box">
                    <img src="./img/feature/06.png" alt="">
                    <h6>Support</h6>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <?php include 'footer.php'; ?>
</body>

</html>