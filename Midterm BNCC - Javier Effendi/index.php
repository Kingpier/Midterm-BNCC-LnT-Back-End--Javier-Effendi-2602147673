<?php
session_start();

// Include database connection and necessary functions
//require_once 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Authenticate user
    //if (authenticateUser($email, $password))
        $_SESSION['email'] = $email;

        // Check if "Remember Me" is selected
        if (isset($_POST['remember'])) {
            // Set a cookie with the user's email
            setcookie('remember_me', $email, time() + (30 * 24 * 60 * 60)); // Cookie expires in 30 days
        }

        // Redirect to dashboard.php
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
<script src="scripts.js"></script>
</html>
