<?php

include('config.php');
include('function.php');

if(isset($_POST["operation"])){
    if($_POST["operation"] == "Add"){
        $image = '';

        if($_FILES["user_image"]["name"] != ''){
            $image = upload_image();
        }

        $statment=$connection->prepare('INSERT INTO players (first_name,last_name,image) VALUES (:firstname,:lastname,:image)');
        $result = $statment->execute(
            array(
                ':firstname' => $_POST["first_name"],
                ':lastname' => $_POST["last_name"],
                ':image' => $image,
                )
        );

        if(!empty($result)){
            echo 'Data Inserted';
        }
        else{
            echo 'Data Not Inserted';
        }

        // print_r($statment);
    }

    if(isset($_POST["operation"]) == "Edit"){
        $image='';
        if($_FILES["user_image"]["name"] != ''){
            $image = upload_image();
        }
        else{
            $image=$_POST["hidden_user_image"];
        }
        delete_image($_POST["user_id"]);
        $statment=$connection->prepare("UPDATE players SET first_name = :first_name, last_name = :last_name, image = :image WHERE id=:id");
        $statment->execute(
            array(
                ':first_name' => $_POST["first_name"],
                ':last_name'  => $_POST["last_name"],
                ':image'      => $image,
                ':id'         => $_POST["user_id"]
            )
        );

        echo "Data Updated";
    }
}
?>