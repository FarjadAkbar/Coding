<?php

include "config.php";
if(empty($_FILES['logo-image']['name'])){
    $file_name = $_POST['old-image'];
}
else{
    $errors=array();

    $file_name=$_FILES['logo-image']['name'];
    $file_size=$_FILES['logo-image']['size'];
    $file_temp=$_FILES['logo-image']['tmp_name'];
    $file_type=$_FILES['logo-image']['type'];

    $text=explode('.',$file_name);
    $file_ext=end($text);
    $extension=array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extension)==false){
        $errors[]="This extension file not allowed, Please choose jpeg, jpg or png extension";
    }
    if($file_size>2097152){
        $errors[]="File size must be 2mb or lower";
    }
    if(empty($errors)==true){
        unlink("images/".$_POST['old-image']);
        move_uploaded_file($file_temp,"images/".$file_name);
    }
    else{
        print_r($errors);
        die();
    }
}

$query="UPDATE `settings` SET `website_name`='{$_POST['website_name']}',`logo`='{$file_name}',`footer_desc`='{$_POST['footer_desc']}'";


$result=mysqli_query($conn,$query);

if($result){
    header("Location:{$hostname}/admin/settings.php");
}
else{
    echo $query;
    print_r($result);
}

?>