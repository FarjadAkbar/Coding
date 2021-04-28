<?php

// overriding mtlb alg alg function m ak hi name ka function ya variable bna ho 
class base{
    public $name="parents class";
    public function calc($a,$b){
        return $a+$b;
    }
}

class derived extends base{
    public $name="derived class";
    public function calc($a,$b){
        return $a*$b;
    }
}

$obj1=new base();
$obj2=new derived();

echo $obj1->name . "<br>";
echo $obj2->name . "<br>";

echo $obj1->calc(5,10) . "<br>";
echo $obj2->calc(5,10) . "<br>";

?>