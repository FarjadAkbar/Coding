<?php
include('config.php');
include('function.php');

if(isset($_POST["user_id"])){
    $output=array();
    $statement=$connection->prepare("SELECT * FROM players WHERE id= '". $_POST["user_id"]."' LIMIT 1");
    // $statement=$connection->prepare("SELECT * FROM players WHERE id= '76'");
    $statement->execute();
    $result=$statement->fetchAll();

    foreach($result as $row){
        // print_r($row);
        $output["first_name"]=$row["first_name"];
        $output["last_name"]=$row["last_name"];
        if($row["image"] !=''){
            $output["image"]='<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35"/>
                                    <input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
        }
        else{
            $output["image"]=' <input type="hidden" name="hidden_user_image" value="" />';
        }
    }
    echo json_encode($output);
}

?>