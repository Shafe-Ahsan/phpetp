<?php
// echo <<<FINISH
// this is an example used to display the text by using end token.
// FINISH;
// $a=10;
// function abc(){
//     global $a;
//     echo "variable inside the function is: $a, <br>";


// }
// abc(){
//     echo "variable inside the function is: $a, <br>";
//}

// define("pi",3.14);

// echo "the value of pi is: ".pi;
// echo " directory of the current php script name is: ".dirname(__FILE__);
// $num = 5;
// $count = 0;
// for($i = 2; $i <= $num/2; $i++) {
//     if($num%$i==0){
//         echo "$num is not a prime number";
//         $count = 1;
//         break;
//     }
// }
// if($count == 0){
//     echo "$num is a prime number";
// }
// $age = 34;
// if($age<=18){
//     echo "you are not eligible for marriage";
// }
// else if($age>18 && $age<60){
//     echo "you are married";
// }else{
//     echo "you are old enough to get married";
// }
// $num = 7;
// switch($num){
//     case 1:
//         echo "one";
//         break;
//     case 2:
//         echo "two";
//         break;
//     case 3:
//         echo "three";
//         break;
//     case 4:
//         echo "four";
//         break;
//     case 5:
//         echo "five";
//         break;
//     default:
//         echo "invalid";
//}
// $num1 = (int)readline("enter the first number: ");
// $num2 = (int)readline("enter the second number: ");
// echo $num1+$num2;
$a[0] = "red";
$a[1] = "green";
$a[2] = "blue";
$text = implode(" ",$a);
echo $text;
?>