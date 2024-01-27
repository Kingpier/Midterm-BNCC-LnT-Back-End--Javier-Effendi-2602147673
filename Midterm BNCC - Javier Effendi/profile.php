<?php
// Include the configuration file
//include 'config.php';

// Include database connection and necessary functions
//require_once 'config.php';

// Example data for the admin profile
$adminProfile = array(
    'firstName' => 'Javier',
    'lastName' => 'Effendi',
    'email' => 'kpier225@gmail.com',
    'bio' => 'This is admin',
    'photo' => './Admin Picture.jpg',
    // Add more admin profile information as needed
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?php echo $adminProfile['firstName'] . ' ' . $adminProfile['lastName']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>Welcome, <?php echo $adminProfile['firstName'] . ' ' . $adminProfile['lastName']; ?>!</h1>
    </header>

    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
        <a href="deleteUser.php">Delete User</a>
        <a href="createUser.php">Create User</a>
        <a href="updateUser.php">Update User</a>
    </nav>

    <section id="profile-section">
        <h2>Profile Information</h2>
        <p><strong>Name:</strong> <?php echo $adminProfile['firstName'] . ' ' . $adminProfile['lastName']; ?></p>
        <p><strong>Email:</strong> <?php echo $adminProfile['email']; ?></p>
        <p><strong>Bio:</strong> <?php echo $adminProfile['bio']; ?></p>

        <p><strong>Photo:</strong> <img src="<?php echo $adminProfile['photo']; ?>" alt="Admin Photo"></p>

    </section>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Javier Effendi. All rights reserved.</p>
    </footer>

    <script src="scripts.js"></script>
</body>

</html>
