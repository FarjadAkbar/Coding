<?php

// function fruits(array $name){
//     foreach($name as $nam){
//         echo $nam . "<br>";
//     }
// }
// $test=["apple","orange"];
// // $test="apple";
// fruits($test);


class school{
    public function getNames(student $name){
        foreach ($name ->Names() as $key => $value) {
            echo $value . "\n";
        }
    }
}

class student{
    public function Names(){
        return ["Ali","Haider","Humza"];
    }
}
function wow(hello $c){
    $c->sayhello();
}

$std=new student();
$sch=new school();

$sch->getNames($std);

// typehinting mtlb agr resultant ki type function k parameter vali ho(int, array, string..)
// tb hi run kre wrna phli hi line m rok de
// e:g function ___(int ___), function ___(array ___), function ___(string ___) etc
?>