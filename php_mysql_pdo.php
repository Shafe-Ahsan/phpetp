<?php
$host="localhost";
$user="root";
$pass=null;
try{
    $conn = new PDO("mysql:host=$host;dbname=college", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
echo "<br/>";
$result = $conn->query("show tables");
while($row=$result->fetch(PDO::FETCH_NUM)){
    print_r($row);
}
?>