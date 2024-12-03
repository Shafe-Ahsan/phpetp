<!-- <?php
if(file_exist("abc.txt")){
    $file=fopen("abc.txt","r");
    $file2=fread($file,filesize("abc.txt"));
    echo $file2<br>;
    echo "open successfully";
}else{
    die("Error: the file does not exist");
}
?> -->
<?php
function abc_error_handler($error_no,$error_msg){
    echo "Oops! something unexpected happen...";
    echo "Possible reason: ".$error_msg;
    echo "We are working on it.";
}
set_error_handler("abc_error_handler");
$result = 7/0;
echo $test;
?>