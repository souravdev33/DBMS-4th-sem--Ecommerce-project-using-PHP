<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="footer.css">
</head>
<style>
    .footer {
        background-color: #e0edec;
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .footer h5 {
        font-weight: bold;
    }

    .footer p {
        margin-bottom: 0.5rem;
    }

    .footer .list-unstyled {
        padding-left: 0;
    }

    .footer .list-unstyled li {
        margin-bottom: 0.5rem;
    }

    .footer .list-unstyled li a {
        color: #000;
        text-decoration: none;
    }

    .footer .list-unstyled li a:hover {
        text-decoration: underline;
    }

    .footer .app-store-icon,
    .footer .payment-icon {
        margin-right: 10px;
        margin-top: 10px;
    }

    .footer .social-icon {
        margin-right: 10px;
        color: #000;
    }

    .footer .social-icon:hover {
        color: #007bff;
    }

    .text-center {
        border-top: 1px solid #ccc;
        padding-top: 15px;
    }
</style>

<body>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <i class="fas fa-store fa-3x mb-3"></i>
                    <h5>Contact</h5>
                    <p><strong>Address:</strong> Hajari Lane, Laldighi, Chattagram</p>
                    <p><strong>Number:</strong> +8801571151411, +8801645350942</p>
                    <p><strong>Hours:</strong> 10:00-4:00, Monday - Saturday</p>
                </div>
                <div class="col-md-3">
                    <h5>About</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>My Account</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Sign In</a></li>
                        <li><a href="#">View Cart</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Install App</h5>
                    <p>From App Store or Google Play</p>
                    <a href="#"><i class="fab fa-apple fa-2x app-store-icon"></i></a>
                    <a href="#"><i class="fab fa-google-play fa-2x app-store-icon"></i></a>
                    <h5 class="mt-4">Secure Payment Gateway</h5>
                    <i class="fab fa-cc-visa fa-2x payment-icon"></i>
                    <i class="fab fa-cc-mastercard fa-2x payment-icon"></i>
                    <i class="fab fa-cc-maestro fa-2x payment-icon"></i>
                    <i class="fab fa-cc-amex fa-2x payment-icon"></i>
                </div>
            </div>
            <div class="text-center py-3">
                <p>Follow Us</p>
                <a href="#"><i class="fab fa-facebook fa-2x social-icon"></i></a>
                <a href="#"><i class="fab fa-twitter fa-2x social-icon"></i></a>
                <a href="#"><i class="fab fa-youtube fa-2x social-icon"></i></a>
                <a href="#"><i class="fab fa-instagram fa-2x social-icon"></i></a>
                <a href="#"><i class="fab fa-pinterest fa-2x social-icon"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>