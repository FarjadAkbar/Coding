<?php

$id=$_POST['id'];
$str_id=implode($id,",");//convert array to string

$conn=mysqli_connect("localhost","root","","test") or die("Connection Failed");
$query="DELETE FROM student WHERE id IN ({$str_id})";//passing multiple values using IN
$result=mysqli_query($conn,$query);
if($result){
    echo 1;
}
else{
    echo 0;
}
?>