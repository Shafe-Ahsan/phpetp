<?php

function doubleValue($arr){
     foreach ($arr as $ar){
        $arr = 2*$ar;
     }
     foreach($arr as $ar){
        echo $arr;
        echo "</br>";
     }
}


$arr = [1,2,3,4,5,6,7,8,9];
doubleValue($arr);
?>