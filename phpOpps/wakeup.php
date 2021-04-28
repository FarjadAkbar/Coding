<?php

class student{
    public $course="PHP";
    private $fname;
    private $lname;

    public function setName($fn,$ln){
        $this->fname=$fn;
        $this->lname=$ln;
    }
    // public function __construct() {
    //     $this->con=mysqli_connect(//pass connection)
    // }
    public function __sleep() {
        // $this->mysqli_close()
        return array('fname','lname'); //ab serial object hme srf do hi property show kre ga jo yha return hoi hai
    }
    public function __wakeup() {
        // $this->con=mysqli_connect(//pass connection)
        echo "This is wakeup method";
    }
}

$test=new student();
$test->setName("farjad","akbar");
$srl=serialize($test);
echo $srl;

//unserialize convert array into object
//is method ka normally use framework m hi hota. eg:
// m ne construct method m connection bna 
// m chata hu jb object serialize ho jo connection close hojae. jsa hm ne sleep() mehod m kia hai
// aur jb connection unserialize ho connection dobara bn jae. jsa hm ne wakeup() mehod m kia hai
?>