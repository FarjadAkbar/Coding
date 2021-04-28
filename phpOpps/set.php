<?php

class student{
    private $name;

    public function hello(){
        echo $this->name;
    }
    public function __get($property){
        echo "you are trying to access private property ($property)\n";
    }
    public function __set($property,$value){
        if(property_exists($this, $property)){
            $this->$property=$value;
            // property koi member variable nhi ha bl k parameter hai is liye "$" sign k sath likha hai
            // private property ko value assign hogi, agr exist krti hai
        }
        else{
            echo "This is non existing property ($property) \n";
        }
    }
}

$test=new student();
// echo $test->name;

$test->name="\nfarjad";
$test->class="10";
$test->hello();

// private chez ki value ko bahr se set krna ya non existing property ko 
// professionally handle krne k liye __set() function istmal krte hai
// __set() m do prameter istmal hote hai property aur value

?>