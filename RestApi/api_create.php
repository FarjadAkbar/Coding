<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "config.php";
$obj=new Database();
$conn=$obj->connection();

$data=json_decode(file_get_contents("php://input"),true);
$name=$data['sname'];
$age=$data['sage'];
$city=$data['scity'];

if(isset($name) && isset($age) && isset($city)){
    // CHECK DATA VALUE IS EMPTY OR NOT
    if(!empty($name) && !empty($age) && !empty($city)){
        $sql="INSERT INTO `students`( `name`, `age`, `city`) VALUES (:name, :age, :city)";
        $result=$conn->prepare($sql);

        $result->bindValue(':name',htmlspecialchars(strip_tags($name)), PDO::PARAM_STR);
        $result->bindValue(':age',htmlspecialchars(strip_tags($age)), PDO::PARAM_STR);
        $result->bindValue(':city',htmlspecialchars(strip_tags($city)), PDO::PARAM_STR);

        if($result->execute()){
            $msg['message'] = 'Data Inserted Successfully';
        }
        else{
            $msg['message'] = 'Data not Inserted';
        }
    }
    else{
        $msg['message'] = 'Oops! empty field detected. Please fill all the fields';
    }  
}
else{
    $msg['message'] = 'Please fill all the fields | name, age, city';
}
echo json_encode($msg);

// $query="insert into students(name,age,city) values('{$name}','{$age}','{$city}')";

// if(mysqli_query($con,$query)) { 
//     echo json_encode(array('message'=>'Record Succesfully Insert','status'=>true));
// }
// else{
//     echo json_encode(array('message'=>'Record Failed Insert','status'=>false));
// }

?>