<?php

include('config.php');
include('function.php');

if(isset($_POST["user_id"])){
    $statement = $connection->prepare("DELETE FROM players WHERE id = :id");
    $result=$statement->execute(
        array(':id' => $_POST["user_id"])
    );

    echo 'Data Deleted';
}
?>