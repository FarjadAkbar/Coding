<?php
$con=mysqli_connect("localhost","root","","test") or die("connection failed");

$name = $_POST["first_name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$country = $_POST["country"];

$query = "INSERT INTO `student`(`name`, `age`, `gender`, `country`) VALUES('{$name}', {$age}, '{$gender}', '{$country}')";
if(mysqli_query($con,$query)){
echo "Hello {$name} your record is saved";
}
else{
echo "Can't save your data";
}

?>