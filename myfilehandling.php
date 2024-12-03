<html>
    <body>
        <form action = '' method="post" enctype="multipart/form-data">

        Upload my file:

            <input type="file" name="fileup">

            <input type="submit" name="upload" value="UPLOAD MY FILE">


        </form>
        <?php
            print_r($_FILES['fileup']);
            $file_name = $_FILES['fileup']['name'];
            $file_size = $_FILES['fileup']['size'];
            $file_tmpname = $_FILES['fileup']['tmp_name'];
            $file_error= $_FILES['fileup']['error'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

            echo "$file_name"."<br>";
            echo "$file_size"."<br>";
            echo "$file_tmpname"."<br>";
            echo "$file_error"."<br>";
            echo "$file_ext"."<br>";  
            if(!is_dir('file1')){
                mkdir('file1');
            }

            if(move_uploaded_file($file_tmpname, 'file1/'.$file_name)){
                echo "File uploaded successfully\n";
            }
            
            if($file_size>200){
                echo "File size should be less than 200kb"."\n";
            }
            $allowed_file_type=['jpg', 'jpeg', 'png', 'gif'];
            if(in_array($file_ext, $allowed_file_type)){
                echo "File type is allowed"."\n";
            }

       
        ?>
    </body>
</html>