<?php

$con=mysqli_connect("localhost","root","","test") or die("connection failed");

$name=$_POST["name"];
$language=$_POST["language"];

$query="INSERT INTO `student3`(`name`, `languages`) VALUES ('{$name}','{$language}')";
if(mysqli_query($con,$query)){
    echo "Successfully Saved";
}
else{
    echo "Can't Saved";
}
?>