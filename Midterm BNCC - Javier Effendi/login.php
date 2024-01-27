<?php
session_start();

// Include database connection and validation functions
//require_once config.php

// Simulating a user database
$users = [
    'kpier225@gmail.com' => ['password' => md5('admin123')],
    // Add more users as needed
];

function validateUser($email, $password) {
    global $users;

    // Check if the user exists in the database
    if (isset($users[$email])) {
        // Check if the provided password matches the stored password (hashed)
        if ($users[$email]['password'] === md5($password)) {
            return true; // User is validated
        }
    }

    return false; // Invalid email or password
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate email
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } else {
        $password = $_POST['password']; // Not hashing for now, see note below

        // Validate user
        if (validateUser($email, $password)) {
            $_SESSION['email'] = $email;

            // Check if "Remember Me" is checked
            if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
                // Set a cookie with a long expiration time (e.g., 30 days)
                setcookie('remember_me', $_SESSION['email'], time() + (30 * 24 * 3600));
            }

            header('Location: dashboard.php');
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    }
}