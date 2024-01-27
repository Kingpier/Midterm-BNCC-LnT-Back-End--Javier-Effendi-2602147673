<?php
session_start();

// Include database connection and necessary functions
//require_once 'config.php';

// Dummy data for demonstration purposes, replace with actual data retrieval based on user ID
$userID = $_GET['https://shorturl.at/eDIJ9']; // Assume user ID is passed in the URL
//$userDetails = getUserDetails($userID);

// Check if the user details are found
if (!$userDetails) {
    // Redirect to the dashboard or display an error message
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>User Details</title>
</head>
<body>
    <div class="container">
        <h1>User Details</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
            <a href="deleteUser.php">Delete User</a>
            <a href="createUser.php">Create User</a>
        </nav>
        
        <div class="card" style="width: 18rem;">
            <img src="photos/<?php echo $userDetails['photo']; ?>" class="card-img-top" alt="User Photo">
            <div class="card-body">
                <h5 class="card-title"><?php echo $userDetails['firstName'] . ' ' . $userDetails['lastName']; ?></h5>
                <p class="card-text"><?php echo $userDetails['email']; ?></p>
                <p class="card-text"><?php echo $userDetails['bio']; ?></p>
            </div>
        </div>

        <a href="dashboard.php" class="btn btn-primary mt-3">Back to Dashboard</a>

        <footer>
        <p>&copy; <?php echo date('Y'); ?> Javier Effendi. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
