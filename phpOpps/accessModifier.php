<?php

class base{
    public $chk;
    private $name;

    public function __construct($n){
        $this->name=$n;
    }

    protected function show(){
        echo "Your Name : ".$this->name."<br>";
    }
}

class derived extends base{
    public function get(){
        echo "Your Name : ".$this->name."<br>";
    }
}


$test=new derived("suffiyan");
$test->name="humza";

$test->get();
?>



<!-- 
          class-itself  outside-class  derived-class
public        /             /               /
private       /             x               /
protected     /             x               x     
 -->