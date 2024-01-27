<?php
session_start();

// Include database connection and necessary functions
//require_once 'config.php';


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate email
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } else {
        // Retrieve form data
        $photo = $_POST['photo'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $bio = $_POST['bio'];

        // Validate other form data (dummy validation, replace with actual validation logic)
        $errors = [];
        if (empty($firstName) || empty($lastName) || empty($email)) {
            $errors[] = "First Name, Last Name, and Email are required.";
        }

        // Add more validation as needed...

        // If no errors, add the user to the database
        if (empty($errors)) {
            $result = createUser($photo, $firstName, $lastName, $email, $bio);

            if ($result) {
                header('Location: dashboard.php');
                exit();
            } else {
                $error = "Error creating the user. Please try again.";
            }
        }
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
    <title>Create a New User</title>
</head>
<body>
    <div class="container">
        <h1>Create a New User</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
            <a href="deleteUser.php">Delete User</a>
            <a href="updateUser.php">Update User</a>
        </nav>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="createUser.php" method="POST">
            <label for="photo">Photo:</label>
            <input type="text" id="photo" name="photo" required>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio"></textarea>

            <button type="submit" class="btn btn-primary">Create User</button>
        </form>

        <footer>
        <p>&copy; <?php echo date('Y'); ?> Javier Effendi. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
