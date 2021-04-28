<?php

// class abc{
//     private $name="Farjad Akbar";
//     public function __get($property){
//         echo "You are trying to access Non Existing Property($property)";
//     }
// }
// $test=new abc();
// $test->name;

// for an array 
class abc{
    private $data=["name"=>"farjad akbar","course"=>"PHP","fee"=>"2000"];
    public function __get($key){
        if(array_key_exists($key,$this->data)){
            return $this->data[$key];
        }
        else{
            echo "This key($key) not exist";
        }
    }
}
$test=new abc();
echo $test->course;
// private chez ko uski apni class se bahar call nhi kra skte. 
// lkn hm ne yha "$name" ko call krwaya hai jo k error hai
// is error ko professional bnane k liye hm ne __get() istmal kis ta k error
// professionally show kiya ja ske.

?>