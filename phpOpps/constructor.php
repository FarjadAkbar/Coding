<?php

class person{
    public $name,$age;

    function __construct($n="No Name",$a=0){
        $this->name=$n;
        $this->age=$a;
    }
    function show(){
        echo $this->name." - ".$this->age ."\n" ;
    }
}

$p1=new person();
$p2=new person("sami",30);
$p3=new person("ali",20);

//use these line when we do not use construct function
// $p1->name="ali";
// $p1->age=20;

$p1->show();
$p2->show();
$p3->show();

?>