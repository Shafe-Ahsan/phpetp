<form method="post" action="">
 <input type="text" name="name" required/><br><br>   
 <input type="text" name="departments" required/><br><br>   
 <input type="numeric" name="salary" required/><br><br>   
 <input type="numeric" name="experience" required/><br><br> 
 <button type="submit">submit</button>  
 <br><br>
</form>
<form method="get" action="">
    <input type="text" name="search"/><br><br>
    <button type="submit">Search Button</button> 
</form>
<br><br>
<h1>update table</h1>
<form method="post" action="">
     <input type="numeric" name="update" />
     <button type="submit">Update</button>
</form>
<?php
include('./config11.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert Operation
    if (isset($_POST['name'], $_POST['departments'], $_POST['salary'], $_POST['experience'])) {
        $name = $_POST['name'];
        $departments = $_POST['departments'];
        $salary = $_POST['salary'];
        $experience = $_POST['experience'];

        $item = $conn->prepare("INSERT INTO tech (`name`, `departments`, `salary`, `experience`) 
                                VALUES (:name, :departments, :salary, :experience)");
        if ($item->execute([':name' => $name, ':departments' => $departments, ':salary' => $salary, ':experience' => $experience])) {
            echo "Employee added successfully!";
        } else {
            echo "Failed to add employee.";
        }
    }

    // Update Operation
    if (isset($_POST['update'])) {
        $update = $_POST['update'];

        $itm = $conn->prepare("D");
        if ($itm->execute([':id' => $update])) {
            echo "Record deleted successfully.";
        } else {
            echo "Failed to delete the record.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    // Search Operation
    $search = $_GET['search'];
    $item = $conn->prepare("SELECT * FROM tech WHERE name = :name");
    $item->execute([':name' => $search]);
    $item1 = $item->fetchAll();

    if (!empty($item1)) {
        echo "<h1>Employee Table</h1>";
        echo "<table border=1>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Departments</th>
                <th>Salary</th>
                <th>Experience</th>
              </tr>";
        foreach ($item1 as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['departments']) . "</td>
                    <td>" . htmlspecialchars($row['salary']) . "</td>
                    <td>" . htmlspecialchars($row['experience']) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No employee found with the name: " . htmlspecialchars($search);
    }
}
?>
