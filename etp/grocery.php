<form action="" method="get">
    <input type="text" name="search" placeholder="Search for a product" />
    <br/><br/>
    <button type="submit">Search</button>
</form>
<br/><br/>
<form action="" method="post">
    <input type="text" name="insert" placeholder="Insert a product" />
    <br/><br/>
    <button type="submit">Add Product</button>
</form>
<br/><br/>
<form action="" method="post">
    <input type="text" name="delete" placeholder="Insert a product" />
    <br/><br/>
    <button type="submit">delete</button>
</form>
<br/><br/>
<form action="" method="post">
    <input type="text" name="update" placeholder="update a product" />
    <br/><br/>
    <button type="submit">update</button>
</form>
<?php
include('./config1.php');

// Handle the search functionality
if (isset($_GET['search']) ) {
    $search = ($_GET['search']); // Sanitize input
    $item = $conn->prepare("SELECT * FROM grocery WHERE items='$search'");
    $item->execute(); // Use wildcard for partial matching
    $itm = $item->fetchAll();

    echo "<h1>Product Table</h1>";
    if (count($itm) > 0) {
        echo "<table border=1>";
        echo "<tr>
                <th>ID</th>
                <th>Item</th>
              </tr>";
        foreach ($itm as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['items']) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No products found matching '<strong>$search</strong>'</p>";
    }
}

// Handle the insert functionality
if (isset($_POST['insert']) ) {
    $insert = ($_POST['insert']); // Sanitize input
    $item = $conn->prepare("INSERT INTO grocery (`items`) VALUES (:insert)");
    if ($item->execute([':insert' => $insert])) {
        echo "<p>Product '<strong>$insert</strong>' inserted successfully.</p>";
    } else {
        echo "<p style='color: red;'>Failed to insert the product.</p>";
    }
}
if (isset($_POST['delete']) ) {
    $delete = ($_POST['delete']); // Sanitize input
    $item = $conn->prepare("DELETE FROM grocery WHERE items=:delete");
    if ($item->execute([':delete' => $delete])) {
        echo "<p>Product '<strong>$delete</strong>' deleted successfully.</p>";
    } else {
        echo "<p style='color: red;'>Failed to delete the product.</p>";
    }
    
}
if (isset($_POST['update']) && !empty(trim($_POST['update']))) {
    $update = htmlspecialchars(trim($_POST['update'])); // Sanitize input

    // Example: Update the product name where the ID is 1
    $item = $conn->prepare("UPDATE grocery SET items = :update WHERE id = 1");
    if ($item->execute([':update' => $update])) {
        echo "<p>Product '<strong>$update</strong>' updated successfully for ID 1.</p>";
    } else {
        echo "<p style='color: red;'>Failed to update the product.</p>";
    }
}

?>


