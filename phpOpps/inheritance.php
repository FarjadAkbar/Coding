<?php

class baseclass{
    public $name,$age,$salary;
function __construct($n,$a,$s){
   $this->name=$n;
   $this->age=$a;
   $this->salary=$s;
}   
function info(){
  echo "<h3>Employee </h3>";
  echo "Employee name " .  $this->name ."<br>";
  echo "Employee age " .  $this->age ."<br>";
  echo "Employee salary " . $this->salary ;
}
}

class derivedclass extends baseclass{
    public $ta=1000;
    public $phone=300;
    public $totalsalary;
 function info(){
     $this->totalsalary=$this->salary+$this->ta+$this->phone;
    echo "<h3>Manager </h3>";
    echo "Manager name " .  $this->name ."<br>";
    echo "Manager age " .  $this->age ."<br>";
    echo "Manager salary " . $this->salary ;
  }
}

$e1=new baseclass("humza",25,30000);
$e2=new derivedclass("ali",29,50000);

$e1->info();
$e2->info();
?>