<?php
function rotateArray($arr, $n) {
    $temp = [];
    for($i=0;$i<sizeof($arr);$i++){
        $temp[($i+$n)%sizeof($arr)] = $arr[$i];

    }
    $temp1 = [];
    for($i=0;$i<sizeof($arr);$i++){
        $temp1[$i] = $temp[$i];
    }
    print_r($temp1);
    
    
}
$arr = [1,2,3,4,5];
$n = 2;

rotateArray($arr, $n);
?>