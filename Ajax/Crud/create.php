<?php
$con=mysqli_connect("localhost","root","","test") or die("connection failed");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];

$query = "INSERT INTO `reg_data`(`name`, `email`, `password`, `mobile`, `address`, `gender`) VALUES('{$name}', '{$email}', '{$password}', '{$mobile}', '{$address}', '{$gender}')";
if(mysqli_query($con,$query)){
echo 1;
}
else{
echo 0;
}

?>