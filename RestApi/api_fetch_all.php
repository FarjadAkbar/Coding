<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

include "config.php";
$obj=new Database();
$conn=$obj->connection();

// CHECK GET ID PARAMETER OR NOT
if(isset($_GET['id']))
{
    //IF HAS ID PARAMETER
    $post_id = filter_var($_GET['id'], FILTER_VALIDATE_INT,[
        'options' => [
            'default' => 'all_posts',
            'min_range' => 1
        ]
    ]);
}
else{
    $post_id = 'all_posts';
}

// MAKE SQL QUERY
// IF GET POSTS ID, THEN SHOW POSTS BY ID OTHERWISE SHOW ALL POSTS
$sql = is_numeric($post_id) ? "SELECT * FROM `students` WHERE id='$post_id'" : "SELECT * FROM `students`"; 

$stmt = $conn->prepare($sql);

$stmt->execute();

//CHECK WHETHER THERE IS ANY POST IN OUR DATABASE
if($stmt->rowCount() > 0){
    // CREATE POSTS ARRAY
    $posts_array = [];
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        $post_data = [
            'id' => $row['id'],
            'name' => $row['name'],
            'age' => $row['age'],
            'city' => $row['city']
        ];
        // PUSH POST DATA IN OUR $posts_array ARRAY
        array_push($posts_array, $post_data);
    }
    //SHOW POST/POSTS IN JSON FORMAT
    echo json_encode($posts_array);
 

}
else{
    //IF THER IS NO POST IN OUR DATABASE
    echo json_encode(['message'=>'No post found']);
}

// $query="select * from students";
// $result=mysqli_query($con,$query) or die("query failed");
// if(mysqli_num_rows($result)>0) { //return number of rows 
//     $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
//     echo json_encode($output);
// }
// else{
//     echo json_encode(array('message'=>'No record','status'=>false));
// }

// class Students extends Database{
//     public function fetch_all(){
//         $sql="select * from students";
//         $result=$this->conn->prepare($sql);

//         $result->execute();

//         if($result->rowCount() > 0) { //return number of rows 
//             $output=$result->fetchAll(PDO::FETCH_ASSOC);
//             echo json_encode($output);
//         }
//         else{
//             echo json_encode(array('message'=>'No record','status'=>false));
//         }
//     }
// }
?>