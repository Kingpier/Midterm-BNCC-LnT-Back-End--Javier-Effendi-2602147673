<?php
session_start();

// Include database connection and necessary functions
//require_once 'config.php';

// Check if the user ID is provided in the URL
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    // Get user details for confirmation message (dummy data, replace with actual data retrieval)
    $user = getUserById($userId);
}

// Check if the form is submitted for deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['userId'];

    // Delete the user from the database
    //$result = deleteUser($userId);

    if ($result) {
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Error deleting the user. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Delete User</title>
</head>
<body>
    <div class="container">
        <h1>Delete User</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
            <a href="createUser.php">Create User</a>
            <a href="updateUser.php">Update User</a>
        </nav>
        
        <?php if (isset($user)): ?>
            <p>Are you sure you want to delete the user with ID <?php echo $user['id']; ?>?</p>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="deleteUser.php" method="POST">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>">

            <button type="submit" class="btn btn-danger">Delete User</button>
        </form>

        <footer>
        <p>&copy; <?php echo date('Y'); ?> Javier Effendi. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
