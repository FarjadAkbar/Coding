<?php

class student{
    public $course="Php";
    private $fname;
    private $lname;

    public function setName($fn,$ln){
        $this->fname=$fn;
        $this->lname=$ln;
    }

    public function __unset($property){ //is taha hm private ko bhi unset krskte hai
        unset($this->$property);
    }
}

$test=new student();
$test->setName("farjad","akbar");

unset($test->course);    
unset($test->fname);

print_r($test);

//jb bhi unset class k bahr call hoga __unset() khud hi run hojae ga
//private property ko class k bahr unset nhi kr skte
//unset property  ksi bhi property ko completly destroy kr deta hai
//unset value hogi to error aye ga
?>