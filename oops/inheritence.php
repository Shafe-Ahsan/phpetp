<?php
class UserAuth{
    function login($usertype){
        echo $usertype." loogedin";
    }
}
class Student extends UserAuth{
    
}
class Teacher{
    function login(){
        echo "teacher loogedin";
    }
}
$s1 = new Student();
$s1->login("student");



?>