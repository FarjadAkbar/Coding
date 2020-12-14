<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include "config.php";
$obj=new Database();
$conn=$obj->connection();

$data=json_decode(file_get_contents("php://input"),true);
$id=$data['sid'];

$sql="DELETE FROM `students`  WHERE id= :id";
$result=$conn->prepare($sql);

$result->bindValue(':id', $id,PDO::PARAM_INT);

if($result->execute()) { //return number of rows 
    if($result->rowCount() > 0) {
        $msg['message'] = 'Student Deleted Successfully';
    }
}
else{
    $msg['message'] = 'Student not Deleted Successfully';
}

echo json_encode($msg);

?>