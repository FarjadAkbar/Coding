<?php

class abc{
    public function __toString(){
        return "Can't print object as a class ".get_class($this);        
    }
}

$test=new abc();
echo $test; //yha object ko as a string call krwaya ja rha, ye error hai

//ye method us waqt call hoga jb ksi bhi object as a string call krwaya jae
//error ko professionally handle krne k liye ye istaml kr rhe hai

//get_class js class m ho uska name return krta hai
?>