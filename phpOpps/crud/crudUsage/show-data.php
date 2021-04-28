<?php

include 'database.php';

$obj=new Database();

$colname='*';
$join="city on employee.cid=city.cid";
$limit=2;

$obj->select('employee',$colname,$join, null,null,null);
$result=$obj->getResult();

echo "<table border='1' width='500px'>";
foreach($result as list("sid"=>$id,"name"=>$name,"age"=>$age,"city"=>$city)){
    echo "<tr>
            <td>$id</td>
            <td>$name</td>
            <td>$age</td>
            <td>$city</td> 
        </tr>";
}
echo "</table>";

// $obj->pagination('opps',null, null,null,2);

?>