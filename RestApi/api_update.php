<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: PUT");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "config.php";
$obj=new Database();
$conn=$obj->connection();

$data=json_decode(file_get_contents("php://input"),true);

$id=$data['sid'];
$name=$data['sname'];
$age=$data['sage'];
$city=$data['scity'];

if(isset($id)){
    $msg['message']='';

    $sql="UPDATE `students` SET `name`= :name,`age`= :age,`city`= :city WHERE id= :id";
    $result=$conn->prepare($sql);

    $result->bindValue(':id', htmlspecialchars(strip_tags($id)), PDO::PARAM_STR);
    $result->bindValue(':name', htmlspecialchars(strip_tags($name)), PDO::PARAM_STR);
    $result->bindValue(':age', htmlspecialchars(strip_tags($age)), PDO::PARAM_STR);
    $result->bindValue(':city', htmlspecialchars(strip_tags($city)), PDO::PARAM_STR);

    if($result->execute()){
        $msg['message'] = 'Data updated successfully';
    }
    else{
        $msg['message'] = 'data not updated';
    }   
} 
else{
    $msg['message'] = 'Invlid ID';
}

echo json_encode($msg);

// include "config.php";

// $query="UPDATE `students` SET `name`='{$name}' ,`age`='{$age}',`city`='{$city}'  WHERE id='{$id}'";

// if(mysqli_query($con,$query)) { 
//     echo json_encode(array('message'=>'Record Succesfully Updates','status'=>true));
// }
// else{
//     echo json_encode(array('message'=>'Record Not Updated','status'=>false));
// }

?>