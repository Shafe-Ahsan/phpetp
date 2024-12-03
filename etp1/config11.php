<?php
$host="localhost";
$user="root";
$pass=null;
$conn = new PDO("mysql:host=$host;dbname=event",$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// echo "connection established";
?>