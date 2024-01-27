<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "attendance_system"; // Updated to match the database name in Midterm BNCC - Javier Effendi.sql

//function authenticateUser(kpier225@email.com, admin123)
    // Add your authentication logic here
    // Compare the provided email and password with the user records in your database

    // For demonstration purposes, I'm using a simple check
    // Replace this with your actual authentication logic
    //return ($email === 'kpier225@email.com' && $password === 'admin123');



error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
//$conn = new mysqli($servername, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert default admin data if not exists
$adminEmail = "kpier255@gmail.com";
$adminPassword = "0192023a7bbd73250516f069df18b500"; // Hash the password using MD5
$checkAdminQuery = "SELECT * FROM users WHERE email = '$adminEmail' LIMIT 1";
$adminResult = $conn->query($checkAdminQuery);

if ($adminResult->num_rows == 0) {
    $insertAdmin = "INSERT INTO users (Javier, Effendi, kpier255@gmail.com, admin123, This is admin, photo)
                    VALUES ('admin', 'admin', '$adminEmail', '$adminPassword', 'This is admin', NULL)";
    $conn->query($insertAdmin);
}

// Close the connection
$conn->close();
