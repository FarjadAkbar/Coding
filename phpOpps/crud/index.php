<?php

include 'database.php';

$obj=new Database();

// $obj->insert('opps',['student_name'=>'anus ali','age'=>'22','city'=>'karachi']);
// $obj->insert('opps',['student_name'=>'farjad akbar','age'=>'26','city'=>'karachi']);
// $obj->insert('opps',['student_name'=>'talha haider','age'=>'24','city'=>'karachi']);

// $obj->update('opps',['student_name'=>'furqan umer','age'=>'29','city'=>'karachi'], 'id="1"');
// $obj->delete('opps','id="4"');


// $obj->selectall('SELECT * FROM opps WHERE id=2');
// $obj->select('opps','*',null,null,null,null);


// $join="students on opps.id=student.id";
// $obj->select('opps','*',$join,null,null,null);

$obj->select('opps','*',null, null,null,2);

echo "<pre>";
print_r($obj->getResult());
echo "</pre>";


$obj->pagination('opps',null, null,null,2);

?>