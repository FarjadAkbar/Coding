<?php

class student{
    private $fname;
    private $lname;

    private function setName($fn,$ln){
        $this->fname=$fn;
        $this->lname=$ln;
    } 

    public function __call($method,$arg){
        if(method_exists($this,$method)){
            call_user_func_array([$this, $method], $arg);
            // method_exists(object,methodname) use to search method exist in class
        }
        else{
            echo "This is private or non existing property ($method) \n ";
        }

    }
}

$test=new student();

$test->setName("ali","aman");
// $test->personal();
print_r($test);

// print_r use for array as well as object

// private method ya non existing method ko professionally 
// handle krne k liye __call() function istmal krte hai
// __set() aur __get() private properties k liye istmal hote hai

?>