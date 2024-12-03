<?php
include('./config.php');
$getStudent = $conn->prepare("SELECT * FROM students");
$getStudent->execute();
$result = $getStudent->fetchAll();
echo "<table border=1>";
foreach($result as $row){
    echo "<tr>
    <td>".$row['id']."<td>
    <td>".$row['name']."<td>
    <td>".$row['course']."<td>
    <td>".$row['batch']."<td>
    <td>".$row['city']."<td>
    
    </tr>";
    
}
echo "<table>";
?>