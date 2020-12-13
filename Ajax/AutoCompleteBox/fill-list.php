<?php

$con=mysqli_connect("localhost","root","","test") or die("connection failed");

$name=$_POST["name"];

$query="SELECT distinct(name) FROM `reg_data` WHERE name LIKE '%{$name}%'";
$result=mysqli_query($con,$query) or die("Query Failed");
$output="<ul>";

if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $output.="<li>{$row['name']}</li>";
    }
}
else{
    $output.="<li>Name not found</li>";;
}
$output.="</ul>";

echo $output;

?>