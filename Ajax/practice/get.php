<?php

$conn=mysqli_connect("localhost","root","","test") or die("Connection failed");

$search_name=$_POST["search"];

$query="SELECT name FROM reg_data WHERE name LIKE '%{$search_name}%'";

$result=mysqli_query($conn,$query) or die("Query Failed");
$output="";
while($row=mysqli_fetch_assoc($result)){
    $output.="<option value='{$row['name']}' id='namelist'>{$row['name']}</option>";
}
echo $output;

?>