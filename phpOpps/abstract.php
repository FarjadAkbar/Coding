<?php

/* abstract class m ak abstract method hona or child class m call hona zarori hai. */

abstract class parentClass{
    public $name;
    abstract protected function calc($a,$b);
}

class childClass extends parentClass{
    public function calc($c,$d){
        echo "hello";
    }
}

$test=new childClass();
$test->calc(10,30);


//personal info (abstract class)

//fees department (child classes)
//libray dept (child classes)

?>