<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

include "config.php";
$obj=new Database();
$conn=$obj->connection();

$data=json_decode(file_get_contents("php://input"),true);
$student_id=$data['sid'];

$sql="select * from students where id={$student_id}";

$result=$conn->prepare($sql);
$result->execute();

if($result->rowCount() > 0) { //return number of rows 

    $output=$result->fetch(PDO::FETCH_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(['message'=>'No post found']);
}


// $query="select * from students where id={$student_id}";
// $result=mysqli_query($con,$query) or die("query failed");
// if(mysqli_num_rows($result)>0) { //return number of rows 
//     $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
//     echo json_encode($output);
// }
// else{
//     echo json_encode(array('message'=>'No record','status'=>false));
// }

?>