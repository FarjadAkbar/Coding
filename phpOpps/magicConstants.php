<?php

echo "Line Number : " . __LINE__ . "\n"; //return a line number
echo "full path of file : " . __FILE__ . "\n"; //return absoulte path of file
echo "full path directory : " . __DIR__ ."\n"; //js folder m ha ye file uska path return kre gi


function myFunction(){
    echo "function name is : " . __FUNCTION__ . "\n"; //return function name
}
myFunction();


// namespace myNamespace;
// trait mytrait{ //trait asa function jse lsi bhi class m use kia ja ske
//     public function getTraitName(){
//         return __TRAIT__ ; //return trait name
//     }
// }
class myclass{
    public function getClassname(){
        return __CLASS__; //return class name
        // return __METHOD__; //return method name
    //    return __NAMESPACE__; //return namespace name 
        // use mytrait; 
    }
}
$obj=new myclass();
echo "class name is : " . $obj->getClassname() . "\n";

// magin constant ka kam fixed value ko return krna hai or ye tbhi kam krta hai jb hm ise ksi fixed location k andr use kre
?>