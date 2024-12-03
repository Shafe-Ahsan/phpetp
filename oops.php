<?php
class color{
    var $carcolor
    function__construct($carcolor){
        $this->message = $carcolor;
    }
    function m(){
        return "this car is of".$this->message."color";
    }
}
$newObj = new color("black");
echo $newObj->m();
?>