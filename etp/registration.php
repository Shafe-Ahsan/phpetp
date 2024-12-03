<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
</head>
<body>
    <form method="post" action="">
        <label for="firstname">First Name: </label>
        <input type="text" placeholder="Enter your first name" name="firstname" id="firstname" required/><br><br>

        <label for="lastname">Last Name: </label>
        <input type="text" placeholder="Enter your last name" name="lastname" id="lastname" required/><br><br>

        <label for="email">Email: </label>
        <input type="email" placeholder="Enter your email" name="email" id="email" required/><br><br>

        <label for="password">Password: </label>
        <input type="password" placeholder="Enter your password" name="password" id="password" required/><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
<?php
 // Start the session

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $errors = [];

    // Validation
    if (empty($firstname)) {
        $errors[] = "First name cannot be empty.";
    }
    if (empty($lastname)) {
        $errors[] = "Last name cannot be empty.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email should be in a proper format.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password should be at least 8 characters long.";
    }

    if (empty($errors)) {
        // If no errors, set success message in session and redirect
        $_SESSION['success_message'] = "Form submitted successfully!";
        $_SESSION['success_message'] = "first name is".$firstname;
        $_SESSION['success_message'] = "last name is".$lastname;

        header("Location: resi.php");
        exit;
    } else {
        // Set error messages in session and redirect back to the form
        $_SESSION['errors'] = $errors;
        header("Location: resi.php");
        exit;
    }
}
?>
