<?php
session_start(); // Start the session
if (!isset($_SESSION['success_message'])) {
    header("Location: registration.php"); // Redirect to form if accessed directly
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<body>
    <h1><?php echo $_SESSION['success_message']; ?></h1>
    <?php
    // Clear the session message after displaying it
    unset($_SESSION['success_message']);
    ?>
    <a href="registration.php">Go Back to Form</a>
</body>
</html>
