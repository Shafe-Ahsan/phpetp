<?php
include('./config11.php');

// Fetch employees with salary > 4200
$getEmployee = $conn->prepare("SELECT * FROM tech WHERE salary > 4200");
$getEmployee->execute();
$getEmp = $getEmployee->fetchAll();

echo "<h1>Employee Table</h1>";
echo "<table border=1>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Departments</th>
            <th>Salary</th>
            <th>Experience</th>
        </tr>";

// Loop through the results and display in table rows
foreach ($getEmp as $row) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['departments']}</td>
            <td>{$row['salary']}</td>
            <td>{$row['experience']}</td>
          </tr>";
}

echo "</table>";
echo "<br>";
echo "<br>";

// Fetch the count of employees in the sales department with salary > 4000, ordered by salary in ascending order and grouped by departments
$getEmployee = $conn->prepare("
    SELECT departments, COUNT(*) AS employee_count 
    FROM tech 
    WHERE departments = 'sales' AND salary > 4000 
    GROUP BY departments 
    ORDER BY salary ASC
");
$getEmployee->execute();
$getEmpCount = $getEmployee->fetchAll();

// Display the aggregated results
echo "<h1>Sales Department Employee Count</h1>";
echo "<table border=1>
        <tr>
            <th>Department</th>
            <th>Employee Count</th>
        </tr>";

foreach ($getEmpCount as $row) {
    echo "<tr>
            <td>{$row['departments']}</td>
            <td>{$row['employee_count']}</td>
          </tr>";
}

echo "</table>";
?>
