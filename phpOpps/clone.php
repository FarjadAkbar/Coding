<?php

class student{
    public $name;
    public $course;

    public function __construct($n){
        $this->name=$n;
    }
    public function setCourse(course $c){ //course class ka hi object pass kr skte hai
        $this->course=$c;
    }
    public function __clone(){        
        $this->course=clone $this->course; 
    }
}

class course{
    public $cname;
    public function __construct($cn){
        $this->cname=$cn;
    }
}

$student1=new student('farjad');
$course1=new course('php');

$student1->setCourse($course1);

$student2= clone $student1;

$student2->name='akbar';
$student2->course->cname = 'python';

// echo $student1->name;
// echo $student2->name;

print_r($student1);
print_r($student2);


// clone method value ko change nhi hone deta/
// m ne student1 ki value change nhi kei lkn student2 ki value student1 
// ko bhi assign hojati. q k dono object ka address same hogya hai.
// isliye hm clone use krte hai tk value same na ho
// clone method ki copy bna ta hai lkn value alg rkhta hai.
// clon sub property p kam nhi krrta ($cname) 
// student2 ko course ki value nhi de lkn clone ki wja se use bhi assign hogae

?>