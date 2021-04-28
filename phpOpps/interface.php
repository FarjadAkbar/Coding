<?php

interface parent1{
    function add($a,$b); /* no need of access modifier in interface, always use
                             public modifier, by default modifier is public */
}

interface parent2{
    function sub($c,$d);
}

class childClass implements parent1,parent2{
    public function add($e,$f){
        echo $e + $f . "\n";
    }

    public function sub($g,$h){
        echo $g - $h . "\n";
    }
}

$test=new childClass();
$test->add(10,30); 
// $test->sub(100,30);

?>

<!-- Interface is just like a abstract class, always use in derived class-->
<!-- Interface use for security purpose -->