<form action="" method="post">
    <input type="text" placeholder="enter your name" name="user_name"/>
    <br/>
    <br/>
    <input type="text" placeholder="enter your course" name="user_course"/>
    <br/>
    <br/>
    <input type="text" placeholder="enter your batch" name="user_batch"/>
    <br/>
    <br/>
    <input type="text" placeholder="enter your city" name="user_city"/>
    <br/>
    <br/>
    <input type="text" placeholder="enter your year" name="user_year"/>
    <br/>
    <br/>
    <button>Add new Students</button>
</form>

<?php
if(isset($_POST['user_name'])){
    $name=$_POST['user_name'];
    $course=$_POST['user_course'];
    $batch=$_POST['user_batch'];
    $city=$_POST['user_city'];
    $year=$_POST['user_year'];
    include('./config.php');
    $query = $conn->prepare("INSERT INTO `students` (`id`, `name`, `course`, `batch`, `city`,`year`) VALUES (NULL, '$name', '$course', '$batch', '$city', '$year')");
    $result = $query->execute();
    if($result){
       echo "inserted successfully";
    }else{    
       echo "insertion failed";
   }
}

?>