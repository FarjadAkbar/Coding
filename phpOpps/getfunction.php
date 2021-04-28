<?php

class myclass{
    function name(){
        echo "Class Name : ".get_class($this) ."\n";
    }
}

class abc{
//    child class
}

class xyz extends abc{
    function name(){
        echo "Class Name : ". get_parent_class($this) ."\n";
    }
}

class hell{
    function __construct(){

    }
    function myfunc1(){

    }
    function myfunc2(){

    }
}

class variables{
    public $vas1;
    public $vas2="hello";
    public $vas3=100;
    private $vas4;

    function __construct(){
        $var1="abc";
        $var2="xyz";
        print_r(get_class_vars(__CLASS__));
        // print_r(get_object_vars($this)); (dono same kam krte hai)
    }
}

class parents{
    static public function test(){
        var_dump(get_called_class());
    }
}
class child extends parents{

}


$obj=new myclass();
$obj->name();

echo "Class Name is : ".get_class($obj) ."\n";


$obj2=new xyz();
$obj2->name();
echo "Class Name is : ".get_parent_class($obj2) ."\n";


$obj3=new hell();
$class_methods=get_class_methods($obj3);
print_r($class_methods) . "\n";

foreach($class_methods as $methods){
    echo $methods . "\n";
}

$obj4=new variables();
$class_variables=get_class_vars(get_class($obj4));
// $class_variables=get_object_vars($obj4);
print_r($class_variables) . "\n";



parents::test();
child::test();

class aliasclass{
    public $test;
}
class_alias('aliasclass','ac');

$a=new ac();
$b=new aliasclass();
$a->test="here";
echo $a->test;

//get_class(parameter) js class m call hoga usi class ka nam return kre ga
//get_parent_class(parameter) apni parent class ka name return kre ga
//get_class_methods(parameter) js class m call hoga use k method ka nam return kre ga array form m
/*get_class_vars(get_class(parameter)) js class m call hoga use k variable return kre ga associative array form m
  agr private variable ko call krna ho to class k andr hi method call krna hoga 
  agr contructor method bna k variable ki new value assign krde tb bhi first time jo assign hoi thi wo hi return kre ga*/

//get_called_class() ye btata ha k ye ks class k liye call hoa (var_dump  return array)
/*get_declared_class() php ki sari classes retrn krta hai
  agr ap ne apni koi class bnae ha is page m to wo bhi return krega*/

/*get_declared_interfaces() php ki sari interfaces retrn krta hai
  agr ap ne apni koi interfaces bnae ha is page m to wo bhi return krega*/
  
//get_declared_trait() is page k andr ktne traits hai*/

//class_alias('classname','aliasname') jo parameter k name is m pass honge hm un namo ko bhi istmal kr k class ka object bna skte hai
?>