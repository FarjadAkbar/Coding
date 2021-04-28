<?php

class calculation{
    public $a,$b,$c;
    
    function sum(){
        $this->c=$this->a + $this->b;
        return $this->c;
    }
    
    function subtract(){
        $this->c=$this->a - $this->b;
        return $this->c;
    }
    
}
class chk{
    use sum;
}
$c1=new calculation();
$c2=new calculation();

$c1->a=50;
$c1->b=20;

$c2->a=10;
$c2->b=20;

echo "Sum of C1 :" . $c1->sum() . "\n";
echo "Subtraction of C2 :" . $c1->subtract();
?>