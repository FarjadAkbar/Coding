<?php

class base{
    protected static $name="farjad";
    public function show(){
        echo self::$name; //print parent class value
        echo static::$name; //print child class value
    }
}

class derived extends base{
    protected static $name="akbar";
}
$test=new derived();
$test->show();

?>