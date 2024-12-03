<form action="" method="post">
    <label>Username: </label>
    <input type="text" placeholder="entered your username" name="name" id="name" required/><br><br>

    <label htmlfor="email">Email: </label>
    <input type="email" placeholder="entered your email" required name="email" id="email"/><br><br>

    <select name="sect">
        <option>Code carvan</option>
        <option>Code fest</option>
        <option>hack verse</option>
        <option>Code haunt</option>
        <option>Code carvan</option>
        <option>Code carvan</option>
    </select>
    <br><br>
    <button type="submit">Register</button>

</form>
<form method="get" action="">
    <input type="text" name="sect"/>
    <button type="submit">Search</button>
</form>
<?php
include('./config10.php');
if($_POST){
    $user = $_POST['name'];
    $email = $_POST['email'];
    $sect = $_POST['sect'];
    $insrt = $conn->prepare("INSERT INTO event (`name`, `email`, `eve`) VALUES (:name, :email, :sect)");
    if ($insrt->execute([':name' => $user, ':email' => $email, ':sect' => $sect])) {
        echo "Registered Successfully";
    }
    if($insrt->execute([':name'=>$user,':email'=>$email,':sect'=>$sect])){
        echo "registered successfully";
    }else{
        echo "there is issue while you are registering";
    }
    
}

if($_GET){
    $itm = $conn->prepare('SELECT eve,COUNT(*) as total_event FROM event GROUP BY eve');
    $itm->execute();
    $itm1=$itm->fetchAll();
    echo "<table border>";
    echo "<ul>";
    foreach($itm as $row){
         "<li>".$row['eve']."</li>";
         "<li>".$row['total_event']."</li>";
    }
    echo "</ul>";
    echo "</table";
}
?>