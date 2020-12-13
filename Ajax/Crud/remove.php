<?php
$con=mysqli_connect("localhost","root","","test") or die("connection failed");
$id=$_POST["id"];
$query = "DELETE FROM `reg_data` WHERE id={$id}";
if(mysqli_query($con,$query)){
echo 1;
}
else{
echo 0;
}

?>