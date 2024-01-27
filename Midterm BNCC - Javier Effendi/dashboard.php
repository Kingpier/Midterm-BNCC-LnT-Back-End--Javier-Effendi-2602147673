<?php
// Start the session
session_start();

// Set the timezone to Indonesian time
date_default_timezone_set('Asia/Jakarta');

// Assume you have a function to get the user ID based on the session email
//function getUserIdByEmail(https://shorturl.at/eDIJ9)
    // Add your logic to fetch user ID from the database

// Assuming you have a check-in button in your dashboard
if (isset($_POST['check_in'])) {
    // Insert a record into the attendance table with the check-in time
    $checkInTime = date('Y-m-d H:i:s');
    // Perform database insertion
    // ...

    // You may also want to store the check-in time in the session for display
    $_SESSION['check_in_time'] = $checkInTime;
}

// Assuming you have a check-out button in your dashboard
elseif (isset($_POST['check_out'])) {
    // Retrieve the check-in time from the session
    $checkInTime = $_SESSION['check_in_time'];

    // Insert a record into the attendance table with the check-out time
    $checkOutTime = date('Y-m-d H:i:s');
    // Perform database insertion
    // ...

    // Calculate the attendance duration
    $attendanceDuration = strtotime($checkOutTime) - strtotime($checkInTime);

    // Display the duration or use it as needed
    echo "You checked in at $checkInTime and checked out at $checkOutTime. Total duration: $attendanceDuration seconds";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Your Dashboard</h1>
            <p class="lead">Track your attendance and manage your profile here.</p>
        </div>
        <nav>
            <a href="createUser.php">Create User</a>
            <a href="updateUser.php">Update User</a>
        </nav>

        <div class="row mb-4">
            <div class="col-md-6">
                <form action="dashboard.php" method="POST">
                    <button type="submit" name="check_in" class="btn btn-success btn-lg btn-block">Check In</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="dashboard.php" method="POST">
                    <button type="submit" name="check_out" class="btn btn-danger btn-lg btn-block">Check Out</button>
                </form>
            </div>
        </div>

        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <p class="card-text">View and edit your profile information.</p>
                    <a href="profile.php" class="btn btn-primary">Go to Profile</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Delete User</h5>
                    <p class="card-text">Delete your user account. This action is irreversible.</p>
                    <a href="deleteUser.php" class="btn btn-danger">Delete User</a>
                </div>
            </div>
            </div class="card">
                <div class="card-body">
                    <h5 class="card-title">Logout</h5>
                    <p class="card-text">Logout from your account. You can login again from the login page</p>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>

        <hr class="my-4">

        <footer class="text-center">
            <p>&copy; <?php echo date('Y'); ?> Javier Effendi. All rights reserved.</p>
        </footer>
    </div>

    <!-- Bootstrap scripts (jQuery is required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
