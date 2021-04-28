<?php

class student{
    public $course="PHP";
    private $fname;
    private $lname;

    public function setName($fn,$ln){
        $this->fname=$fn;
        $this->lname=$ln;
    }

    public function __sleep() {
        return array('fname','lname'); //ab serial object hme srf do hi property show kre ga jo yha return hoi hai
    }
}

$test=new student();
$test->setName("farjad","akbar");
$srl=serialize($test);
echo $srl;

//object ko hm direct ksi session ya vaiable m store nhi kr skte isliye hm object ko serialize m krte hai
//sleep method serialize array ko clean krne k krta hai
// ye use waqt call hojae ga jb bhi hm ksi object ko serialize krege

// is k istmal ka maqsadd agr hm do ya teen property hi istmal krna chate hai aur hme bht sari property mil rhi ha serialize method se to hm __sleep() ismalt kre ge.
?>