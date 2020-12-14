<?php

include "config.php";

// $file_name="";
if(empty($_FILES['new-image']['name'])){
  $file_name = $_POST['old-image'];
}
else{
    $errors=array();

    $file_name=$_FILES['new-image']['name'];
    $file_size=$_FILES['new-image']['size'];
    $file_temp=$_FILES['new-image']['tmp_name'];
    $file_type=$_FILES['new-image']['type'];
    $text=explode('.',$file_name);
    $file_ext=end($text);
    $extensions=array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)===false){
        $errors[]="This extension file not allowed, Please choose jpeg, jpg or png extension";
    }
    if($file_size > 2097152){//2097152byte=2mb
        $errors[]="File size must be 2mb or lower";
    }
    if(empty($errors)==true){    

        $new_name=time()."-".$file_name;
        $target="upload/".$image_name;
        $image_name=$new_name;

        unlink("upload/".$_POST['old-image']);
        move_uploaded_file($file_temp,$target);
    }
    else{
        print_r($errors);
        die();
    }
} 
 
print_r($query="UPDATE `post` SET `title`='{$_POST['post_title']}',`description`='{$_POST['postdesc']}',`category`='{$_POST['category']}',`post_img`='{$image_name}' WHERE `post_id`={$_POST['post_id']};");
if($_POST['old_category'] != $_POST['category']){
    $query.="UPDATE `category` SET `post`=post - 1 WHERE category_id={$_POST['old_category']};";
    $query.="UPDATE `category` SET `post`=post + 1 WHERE category_id={$_POST['category']};";
}

$result=mysqli_multi_query($conn,$query);

if($result){
    header("Location:{$hostname}/admin/post.php");
}
else{
    echo $query;
    print_r($result);
}

?>