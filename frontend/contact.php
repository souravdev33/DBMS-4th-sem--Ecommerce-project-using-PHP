<?php
include 'header.php';
include 'config.php';

// Check if the customer is logged in
if (!isset($_SESSION['customer_logged_in']) || !$_SESSION['customer_logged_in']) {
    header('Location: login.php');
    exit();
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Insert contact form details into database without bind_param
    $sql = "INSERT INTO contact_form (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Message submitted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>x10sion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Style updates for a more professional look */
        #page-header {
            background: url('/frontend/img/banner/contact_page_banner.jpg') no-repeat center center;
            background-size: cover;
            height: 200px;
            width: 100%;
            color: black;
            text-align: center;
            /* padding: 5rem 0; */
        }

        #page-header h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        #page-header p {
            font-size: 1.5rem;
            margin: 0 auto;
            max-width: 800px;
        }

        #contact_details {
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #contact_details .details {
            text-align: center;
            margin-bottom: 40px;
        }

        #contact_details .details h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        #contact_details .details ul {
            list-style: none;
            padding: 0;
            font-size: 16px;
            line-height: 1.5;
        }

        #contact_details .details ul li {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 0;
        }

        #contact_details .details ul li i {
            font-size: 20px;
            color: #007bff;
            margin-right: 15px;
        }

        #contact_details .map {
            width: 100%;
            height: 400px;
            margin-top: 20px;
        }

        #form-details {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        #form-details .container {
            max-width: 800px;
            background: #ffffff;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        #form-details h2 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        #form-details .form-control {
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: none;
        }

        #form-details .btn-primary {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            background-color: #007bff;
            border-color: #007bff;
            font-size: 1rem;
            font-weight: 600;
        }

        .people {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            padding: 60px 0;
        }

        .people div {
            text-align: center;
            width: 200px;
        }

        .people .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .people p {
            font-size: 14px;
            line-height: 1.4;
        }
    </style>
</head>

<body>
    <!-- header include -->
    <?php  ?>
    
    <section id="page-header">
        <!-- <img src="/frontend//img/banner/contact_page_banner.jpg" style="height: 100vh; width:100%" alt=""> -->
        <div class="container">
            <h2>Get in Touch</h2>
            <p>We value your feedback and are here to assist you. Please leave us a message, and we will get back to you as soon as possible.</p>
        </div>
    </section>

    <section id="contact_details">
        <div class="details">
            <span class="text-muted">GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3 class="text-primary">Head Office</h3>
            <ul>
                <li>
                    <i class='bx bx-map-alt'></i>
                    <p>Laldighi, Chottogram, Bangladesh</p>
                </li>
                <li>
                    <i class='bx bxl-gmail'></i>
                    <p>pucX10sion@gmail.com</p>
                </li>
                <li>
                    <i class='bx bxs-contact'></i>
                    <p>01571141511</p>
                </li>
                <li>
                    <i class='bx bx-time-five'></i>
                    <p>Monday to Saturday: 9:00 AM to 10:00 PM</p>
                </li>
            </ul>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.3937048905486!2d91.83333507437828!3d22.338758341502004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad275971a7ceaf%3A0x1300e42a953c30ec!2sPremier%20University%2C%20Department%20of%20Law%2C%20Department%20of%20Economics%2C%20Department%20of%20CSE%20and%20Department%20of%20EEE.!5e0!3m2!1sen!2sbd!4v1710264585975!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <section id="form-details">
        <div class="container">
            <h2>We Love to Hear From You</h2>
            <form action="contact.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <section class="people text-center mt-5">
        <div>
            <img src="./img/image/sourav.jpg" alt="Sourav Dev" class="profile-picture">
            <p><strong>Sourav Dev</strong><br>Senior Network Engineer<br>Phone: 01571151411<br>Email: devsourav@gmail.com</p>
        </div>
        <div>
            <img src="./img/image/imti.jpg" alt="Md Imtiaz Uddin" class="profile-picture">
            <p><strong>Md Imtiaz Uddin</strong><br>Senior Web Developer<br>Phone: 013
            06733010<br>Email: imtimd@gmail.com</p>
        </div>
        <div>
            <img src="./img/image/bidhan.jpg" alt="Bidhan Nath" class="profile-picture">
            <p><strong>Bidhan Nath</strong><br>Senior Marketing Manager<br>Phone: 01835272050<br>Email: bidhannath@gmail.com</p>
        </div>
        <div>
            <img src="./img/image/aritra.jpg" alt="Aritra Chowdhury" class="profile-picture">
            <p><strong>Aritra Chowdhury</strong><br>Senior Sales Manager<br>Phone: 01765743474<br>Email: mummydady@gmail.com</p>
        </div>
        <div>
            <img src="./img/image/rafi.jpg" alt="Tahsin Ahmed" class="profile-picture">
            <p><strong>Tahsin Ahmed</strong><br>Senior Production Manager<br>Phone: 01835272050<br>Email: eastdeltaa@gmail.com</p>
        </div>
    </section>

    <!-- footer include -->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>