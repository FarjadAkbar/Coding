<?php
$con=mysqli_connect("localhost","root","","test") or die("connection failed");

$id=$_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];

$query = "UPDATE `reg_data` SET `name`='{$name}', `email`='{$email}', `password`='{$password}', `mobile`='{$mobile}' WHERE id={$id}";

// $query="UPDATE `reg_data` SET `name`='alisha', `email`='abc@gmail.com', `password`='abc', `mobile`='031234' WHERE id=4";

if(mysqli_query($con,$query)){
echo 1;
}
else{
echo 0;
echo mysqli_error($con);
}

?>