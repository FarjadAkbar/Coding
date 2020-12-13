<?php
$con=mysqli_connect("localhost","root","","test") or die("connection failed");

$query="SELECT distinct(name) FROM `reg_data`";
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result)>0){
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo "No record found"; 
}
?>