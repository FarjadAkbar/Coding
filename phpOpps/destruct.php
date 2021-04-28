<?php

class abc{
    public function __construct(){
        echo "This is construct function \n";
    }
    public function hello(){
        echo "This is hello function \n";
    }
    public function __destruct(){
        echo "This is destruct function \n";
    }
}
$test=new abc();
$test->hello();
$test->hello();
$test->hello();

// construct function humesha sb se phle khud b khud call ho jae ga (object bna ne k bad hi call hoga)
// destruct function humesha sb se akhir m khud b khud call ho jae ga (object bna ne k bad hi call hoga)
?>