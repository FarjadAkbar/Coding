<?php

class student{
    public $courses;
    private $fname;
    private $lname;
    private $detail=['name'=>'Test Name','age'=>'20'];

    public function setName($fn,$ln){
        $this->fname=$fn;
        $this->lname=$ln;
    }
    // public function __isset($property){
    //     echo isset($this->$property);
    // }

    public function __isset($name){ //check multi dimensional array
        echo isset($this->detail[$name]);
    }
}
$test=new student();
$test->setName("farjad","akbar");

// echo isset($test->fname) . "<br>"; (jse hi private property call hogi isset function jo bnya hai automatically run hojae ga. agr __isset() nhi bnao ga to property call nhi hogi)

$test->courses="Php"; //(set the value of course)
echo isset($test->courses) . "<br>"; //(check the value of course)

echo isset($test->name)."<br>";
echo isset($test->age)."<br>"; //check values of array



// isset function bolean method hai(return true or false)
// jb zero return hoga to kuch bhi print nhi hoga
// hm private property ko isset k zariye direct class k bahr call nhi kra skte

?>