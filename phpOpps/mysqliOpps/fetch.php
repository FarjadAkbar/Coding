<?php

$servername="localhost";
$username="root";
$password="";
$database="test";

$conn=new mysqli($servername,$username,$password,$database);

if($conn->connect_error){
    die("Connection Failed" . $conn->connect_error);
}
else{
    $query="SELECT * FROM reg_data";
    $result=$conn->query($query);
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            echo "id : {$row["id"]}  -  Name : {$row["name"]}  -  Email : {$row["email"]} \n";
        }
    }
    else{
        echo "data not found";
    }
}
$conn->close();

?>