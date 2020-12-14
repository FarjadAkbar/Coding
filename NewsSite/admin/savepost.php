<?php

include "config.php";

if(isset($_FILES['fileToUpload'])){
    $errors=array();

    $file_name=$_FILES['fileToUpload']['name'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_temp=$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_ext=end(explode('.',$file_name));
    $extensions=array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)===false){
        $errors[]="This extension file not allowed, Please choose jpeg, jpg or png";
    }
    if($file_size > 2097152){//2097152byte=2mb
        $errors[]="File size must be 2mb or lower";
    }
    
    if(empty($errors)==true){   
        $new_name=time()."-".$file_name;
        $target="upload/".$image_name;
        $image_name=$new_name;

        move_uploaded_file($file_temp,$target);
    }
    else{
        print_r($errors);
        die();
    }
}

session_start();

$title=mysqli_real_escape_string($conn,$_POST['post_title']);
$description=mysqli_real_escape_string($conn,$_POST['postdesc']);
$category=mysqli_real_escape_string($conn,$_POST['category']);
$date=date("d M, Y");
$author=$_SESSION['user_id'];

$query="INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES ('{$title}','{$description}',{$category},'{$date}',{$author},'{$image_name}');";
$query.="UPDATE `category` SET `post`=post + 1 WHERE category_id={$category}";


if(mysqli_multi_query($conn,$query)){
    header("Location:{$hostname}/admin/post.php");
}
else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
}

?>