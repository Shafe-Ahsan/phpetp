<form action="" method="post">
    <input type="text" placeholder="name" name="name" required/><br><br>
    <input type="email" placeholder="email" name="email" required/><br><br>
    <select name="sect">
        <option value="Webthon">Webthon</option>
        <option value="codethon">Codethon</option>
        <option value="hackverse">Hackverse</option>
        <option value="codecarvan">Codecarvan</option>
        <option value="codehaunt">Codehaunt</option>
    </select>
    <button type="submit">Submit</button><br><br>
    
</form>
<form action="" method="get">
    <input type="text" name="event"/><br><br>
    <button type="submit">Submit</button>
</form>


<?php
include('./config11.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $user = $_POST['name'];
        $email = $_POST['email'];
        $sect = $_POST['sect'];

        $insrt = $conn->prepare("INSERT INTO eventreg (`name`, `email`, `event_event`) VALUES (:name, :email, :sect)");
        if ($insrt->execute([':name' => $user, ':email' => $email, ':sect' => $sect])) {
            echo "<p>Registration successful!</p>";
        } else {
            echo "<p style='color: red;'>Failed to register. Please try again.</p>";
        }
    
}
if($_GET){
    $itm = $conn->prepare('SELECT event_event, COUNT(*) as total_event FROM eventreg GROUP BY event_event');
    $itm->execute();
    $itm1 = $itm->fetchAll();
    echo "<table>";
    foreach ($itm1 as $row) {
        echo "<tr>
                <td>" . htmlspecialchars($row['event_event']) . "</td>
                <td>" . htmlspecialchars($row['total_event']) . "</td>
                
                
              </tr>";
    }
    echo "</table>";
}
?>
