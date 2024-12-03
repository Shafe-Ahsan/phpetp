<?php
$h1_color="green";
echo "<h1 style='color:red'>php with HTML</h1>";
?>
<?php
$name = "shafe ahsan";
echo "<h1 style='color:orange'>My name is: $name</h1>"
?>
<h1 style="color:<?php echo $h1_color ?>">
    <?php
    echo $name;
    ?>
</h1>
<h1 style="color:<?php echo $h1_color ?>">
    <?php
    echo "My name is shafe ahsan";
    ?>
</h1>
<h1 style="color:<?php echo $h1_color ?>">
    <?php
    echo "I love my india";
    ?>
</h1>