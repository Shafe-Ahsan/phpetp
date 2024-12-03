<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form_Validation</title>
</head>
<body>
    <form method="post">
        <label htmlfor="firstname">First Name: </label>
        <input type="text" placeholder="enter your first name" id="firstname" name="firstname" required/><br><br>
        <label htmlfor="lastname">Last Name: </label>
        <input type="text" placeholder="enter your last name" id="lastname" name="lastname" required/><br><br>
        <label htmlfor="email">Email: </label>
        <input type="email" placeholder="enter your email" id="email" name="email" required/><br><br>
        <label htmlfor="password">Password: </label>
        <input type="password" placeholder="enter your password" id="password" name="password" required/><br><br>
        <label htmlfor="confirmpassword">Password: </label>
        <input type="password" placeholder="confirm your password" id="confirmpassword" name="confirmpassword" required/><br><br>
        <button type="submit">Submit</button>


    </form>
</body>
</html>
<?php
if($_POST){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $error = [];
    if(empty($firstname)){
        $error[] = "first name cannot be empty";
    }
    if(empty($lastname)){
        $error[] = "last name cannot be empty";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error[] = "email is required";
    }
    if(strlen($password) < 8){
        $error[] = "password must be atleast character";
    }
    if(!preg_match('/[A-Z]/',$password)){
        $error[] = "password should atleast one uppercase";
    }
    if(!preg_match('/[0-9]/',$password)){
        $error[] = "password should atleast one digit";
    }
    if($password!==$confirmpassword){
        $error[] = "password should match with confirm password";
    }
    if(!empty($error)){
        echo "<ul>";
        foreach($error as $err){
            "<li>".$err."</li>";
        }
        echo "</ul>";
    }else{
        echo "file submitted successfully";
        echo "first name is".$firstname;
    }
    
}
?>