<form action="" method="post">
    <label htmlfor="name">User Name: </label>
    <input type="text" placeholder="enter the name" name="name" id="name" required/><br><br>

    <label htmlfor="email">Email: </label>
    <input type="email" placeholder="enter the email" name="email" id="email" required/><br><br>

    <label htmlfor="password">Password: </label>
    <input type="password" placeholder="enter the password" name="password" id="password" required/><br><br>

    <button type="submit">Submit</button>
</form>
<?php
if($_POST){
    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $error = [];
    if(empty($username)){
        $error[] = "username is required";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error[] = "email is required";
    }
    if(strlen($password) < 8){
         $error[] = "password must be atleast 8 character";
    }
    if(empty($error)){
        echo "form submitted successfully";
    }
    else{
        echo "<ul>";
        foreach($error as $err){
             echo "<li>".$err."</li>";
        }
        echo "</ul>";
    }
}
?>