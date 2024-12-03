<?php
if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];
    
    if ($file) {
        $content = file_get_contents($file);
        echo "<pre>$content</pre>";
    } else {
        echo "Error: Unable to open the uploaded file.";
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input
        type="file"
        name="file"
    />
    <br/>
    <br/>
    <button type="submit">Read File</button>
</form>
