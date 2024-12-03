<?php
if($_FILES['fileUpload']){
    $path = $_FILES['fileUpload']['tmp_name'];
    echo $path;
}
?>