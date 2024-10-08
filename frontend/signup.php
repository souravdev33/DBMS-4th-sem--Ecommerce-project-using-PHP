<?php
// session_start();
include 'config.php';
$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];

    // Check if the email already exists
    $existsql = "SELECT * FROM `customerprofile` WHERE Email='$email'";
    $result = mysqli_query($conn, $existsql);
    $numExistsRows = mysqli_num_rows($result);
    if ($numExistsRows > 0) {
        $showError = "Email is already used";
    } else {
        if ($password == $cpassword) {
            // Hash the password before storing it in the database
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `customerprofile` (`FirstName`, `LastName`, `Address`, `PhoneNumber`, `Email`, `Password`, `DateOfBirth`, `Gender`)
                    VALUES ('$firstName', '$lastName', '$address', '$phoneNumber', '$email', '$password', '$dateOfBirth', '$gender')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                // header('location: login.php');
                // exit;
            } else {
                $showError = "There was an error creating your account";
            }
        } else {
            $showError = "Passwords don't match";
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Sign Up</title>
</head>

<body>
    <style>
        .container {
            padding: 20px;
            width: 40%;
            box-sizing: border-box;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: #ececec;
        }
    </style>

    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can <a href="login.php" class="alert-link">login</a>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
    ?>
    <div class="container">
        <h5>Welcome to x10sion! Please Sign Up</h5>
        <form action="signup.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Retype Password" required>
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date of Birth</label>
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="Date of Birth" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>