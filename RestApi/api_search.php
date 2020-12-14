<?php
header('Content-Type:application.json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');

// Use For Post Method
// $data=json_decode(file_get_contents("php://input"),true);
// $search_name=$data['search'];

//Use For Get Method
$search_name=isset($_GET['search'])?$_GET['search']:die();

include "config.php";

$query="SELECT * FROM `students`  WHERE name like '%{$search_name}%'";

$result=mysqli_query($con,$query) or die("query failed");
if(mysqli_num_rows($result)>0) { //return number of rows 
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message'=>'Record Not Deleted','status'=>false));
}

?>