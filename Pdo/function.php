<?php

function get_records(){
    include "config.php";

    $stmt=$connection->prepare("SELECT * FROM players");
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $stmt->rowCount();
}

function upload_image(){
    $extension=explode(".", $_FILES['user_image']['name']);
    $new_name=rand(). "." . $extension[1];
    $destination= './upload/' . $new_name;

    move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);

    return $new_name;
}

function delete_image($id){

    include "config.php";
    $output=array();
    $statement=$connection->prepare("SELECT * FROM players WHERE id=:id");
    $result=$statement->execute(
        array(':id' => $id)
    );
    $result = $statement->fetchAll();

    foreach($result as $row){
        $output["image"]=$row["image"];
    }

    unlink ("upload/".$output["image"]);
}


?>