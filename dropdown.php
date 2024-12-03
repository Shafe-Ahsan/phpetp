<?php
include('./config.php');
$getStudent = $conn->prepare("SELECT id,name FROM students");
$getStudent->execute();
$studentData = $getStudent->fetchAll();
echo "<select>";
echo "<option>Select Student</option>";
foreach($studentData as $row){
    echo "<option >".$row['name']."</option>";
}
echo "</select>";

?>