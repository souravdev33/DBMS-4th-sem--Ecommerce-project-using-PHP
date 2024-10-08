<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customerprofile WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $sql1 = "SELECT * FROM customerprofile WHERE Email = '$email' AND Password ='$password'";
        $result1 = mysqli_query($conn, $sql1);
        $num1 = mysqli_num_rows($result1);
        if ($num1 == 1) {
            $login = true;
            $_SESSION['customer_logged_in'] = true;
            $_SESSION['email'] = $email;
            header("location: index.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No customer found with that email address.";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Login</title>
</head>

<body>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?php echo $error; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <style>
        .container {
            padding: 20px;
            width: 40%;
            box-sizing: border-box;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: #ececec;
        }

        .df {
            display: flex;
            justify-content: space-between;
        }

        .password-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .form-control {
            width: 100%;
            padding-right: 40px;
        }

        /* .toggle-password {
            position: absolute;
            top: 75%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .toggle-password i {
            font-size: 1.2em;
            color: #696969;
        } */
    </style>

    <div class="container my-5">
        <form action="login.php" method="post">
            <div class="df">
                <h5>Welcome to x10sion! please login</h5>
                <a href="signup.php">register</a>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
            </div>

            <div class="form-group password-wrapper">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- <script>
        const pwd = document.getElementById("password");
        const togglePwd = document.getElementById("togglePwd");

        togglePwd.onclick = function() {
            const icon = togglePwd.querySelector("i");
            if (pwd.type === "password") {
                pwd.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                pwd.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        };
    </script> -->

</body>

</html>
