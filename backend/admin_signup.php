<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];

   
    // Insert new admin into the database
    $sql = "INSERT INTO admin_profile (FirstName, LastName, Email, Password, Address, PhoneNumber, DateOfBirth, Gender) 
            VALUES ('$firstName', '$lastName', '$email', '$password', '$address', '$phoneNumber', '$dateOfBirth', '$gender')";

    if (mysqli_query($conn, $sql)) {
        echo "Admin registered successfully!";
        header('Location: admin_login.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Admin Sign Up</h2>
        <form action="admin_signup.php" method="post">
            <div class="form-group">
                <input type="text" name="firstName" class="form-control" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="lastName" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="text" name="address" class="form-control" placeholder="Address" required>
            </div>
            <div class="form-group">
                <input type="text" name="phoneNumber" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <input type="date" name="dateOfBirth" class="form-control" placeholder="Date of Birth" required>
            </div>
            <div class="form-group">
                <select name="gender" class="form-control" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
</body>

</html>