<?php
session_start();
include 'config.php';

// Check if the customer is logged in
if (!isset($_SESSION['customer_logged_in']) || !$_SESSION['customer_logged_in']) {
    header('Location: login.php');
    exit();
}

// Fetch customer details
$email = $_SESSION['email'];
$sql = "SELECT * FROM `customerprofile` WHERE Email = '$email'";
$query = mysqli_query($conn, $sql);
$customer = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update customer details
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $newEmail = $_POST['email'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $originalEmail = $_POST['originalEmail'];

    // Update the customer profile in the database
    $sql = "UPDATE customerprofile SET 
            FirstName = '$firstName', 
            LastName = '$lastName', 
            Address = '$address', 
            PhoneNumber = '$phoneNumber', 
            Email = '$newEmail', 
            DateOfBirth = '$dateOfBirth', 
            Gender = '$gender' 
            WHERE Email = '$originalEmail'";
    mysqli_query($conn, $sql);

    // Update session email if it was changed
    if ($email !== $newEmail) {
        $_SESSION['email'] = $newEmail;
    }

    // Refresh the customer details
    header('Location: index.php');
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <title>Customer Profile</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }

        .profile-container h1 {
            margin-bottom: 30px;
            font-size: 24px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile-container">
            <h1>MY Profile</h1>
            <form action="profile.php" method="post">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo htmlspecialchars($customer['FirstName']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo htmlspecialchars($customer['LastName']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo htmlspecialchars($customer['Address']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" value="<?php echo htmlspecialchars($customer['PhoneNumber']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($customer['Email']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="dateOfBirth">Date of Birth</label>
                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="Date of Birth" value="<?php echo htmlspecialchars($customer['DateOfBirth']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="Male" <?php if ($customer['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($customer['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        <option value="Other" <?php if ($customer['Gender'] == 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <!-- Hidden field to store the original email -->
                <input type="hidden" name="originalEmail" value="<?php echo htmlspecialchars($customer['Email']); ?>">
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>
