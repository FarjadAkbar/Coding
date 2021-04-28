<?php

// On static class 'this' keyword is  not use because it is represent class of object
// On static class object cannot be created

class base{
    public static $name="Hello World";

    public static function show(){
        echo self::$name;
    }

    // public function __construct($n)
    // {
    //     self::$name=$n;
    // }
}

class derived extends base{
    public static function show(){
        echo parent::$name;
    }
}

$test=new derived();
$test->show();

// echo base::$name . "\n";
// base::show();

// $test=new base("yahoo");
// $test->show();

?>
