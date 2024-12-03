<?php
if(isset($_POST['fileName'])){
$fileName="context/".$_POST['fileName'];
$content=$_POST['content'];
$file=fopen($fileName,"w") or die("Unable to open this file");
fwrite($file,$content);
fclose($file);
echo "File created successfully";
}

?>
<form action="" method="post">
       <input
       type="text"
       placeholder="enter file name"
       name="fileName"

       />
       <br/>
       <br/>
       <textarea name="content">

       </textarea>
       <br/>
       <br/>
       <button>Create File</button>
</form>