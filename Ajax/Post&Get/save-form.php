<?php

$conn=mysqli_connect("localhost","root","","test");
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];

$query="INSERT INTO `student2`( `firstname`, `lastname`) VALUES ('{$firstname}','{$lastname}')";

if(mysqli_query($conn,$query)){
    echo 1;
}
else{
    echo 0;
}
?>