<?php

class calculation{
    public $a,$b;

    public function __construct($a,$b){
        $this->a=$a;
        $this->b=$b;
    }

    public function sum(){
        echo $this->a + $this->b;
    }

    public function __invoke(){
        echo $this->a + $this->b;
        // echo "you call object like a function";
    }
}

$obj=new calculation(30,50);
// $obj->sum();

$obj();

// invoke method ki wja se hm object ko function ki tarha call krwa skte hai.
?>