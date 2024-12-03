<?php
include("./config1.php");
$getStudent = $conn->prepare("SELECT * FROM employee");
$getStudent->execute();
$stud = $getStudent->fetchAll();
echo "<h1>Employee Table</h1>";
echo "<table border=1>";
foreach($stud as $row){
    echo "<tr>
    <td>".$row['id']."<td>
    <td>".$row['name']."<td>
    <td>".$row['departments']."<td>
    <td>".$row['salary']."<td>
    <td>".$row['experience']."<td>
    </tr>";
}
echo "<table>";
echo "<br>";
echo "<h2>Department of cricket having salary greater than 40000</h2>";
$getStudent = $conn->prepare("SELECT * FROM employee WHERE departments='cricket' AND salary>40000");
$getStudent->execute();
$stud = $getStudent->fetchAll();
echo "<table border=1>";
foreach($stud as $row){
    echo "<tr>
    <td>".$row['id']."<td>
    <td>".$row['name']."<td>
    <td>".$row['departments']."<td>
    <td>".$row['salary']."<td>
    <td>".$row['experience']."<td>
    </tr>";
}
echo "<table>";
echo "<br>";
echo "<h2>Sorting the accordong to salary in ascenddong order</h2>";
$getStudent = $conn->prepare("SELECT * FROM employee ORDER BY salary ASC");
$getStudent->execute();
$stud = $getStudent->fetchAll();
echo "<table border=1>";
foreach($stud as $row){
    echo "<tr>
    <td>".$row['id']."<td>
    <td>".$row['name']."<td>
    <td>".$row['departments']."<td>
    <td>".$row['salary']."<td>
    <td>".$row['experience']."<td>
    </tr>";
}
echo "<table>";
echo "<br>";
echo "<h2>Sorting of cricket department</h2>";
$getStudent = $conn->prepare("SELECT * FROM employee  WHERE departments='cricket' ORDER BY salary ASC");
$getStudent->execute();
$stud = $getStudent->fetchAll();
echo "<table border=1>";
foreach($stud as $row){
    echo "<tr>
    <td>".$row['id']."<td>
    <td>".$row['name']."<td>
    <td>".$row['departments']."<td>
    <td>".$row['salary']."<td>
    <td>".$row['experience']."<td>
    </tr>";
}
echo "<table>";
echo "<br>";
$getEmployeeCount = $conn->prepare("SELECT departments, COUNT(*) as total_employees FROM employee GROUP BY departments");
$getEmployeeCount->execute();
$employeeCounts = $getEmployeeCount->fetchAll();
echo "<h2>Total Number of Employees in Each Department</h2>";
echo "<table border=1>";
echo "<tr>
        <th>Department</th>
        <th>Total Employees</th>
      </tr>";
foreach ($employeeCounts as $row) {
    echo "<tr>
            <td>" . $row['departments'] . "</td>
            <td>" . $row['total_employees'] . "</td>
          </tr>";
}
echo "</table>";
?>