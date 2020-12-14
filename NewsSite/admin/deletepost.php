<?php
include "config.php";

if($_SESSION['user_id']==null){
    header("Location:{$hostname}/admin/");
}

$post_id=$_GET['id'];
$cat_id=$_GET['catid'];

$query="SELECT * FROM post WHERE post_id={$post_id}";
$result=mysqli_query($conn,$query) or die("Query Failed");
$row=mysqli_fetch_assoc($result);

unlink("upload/".$row['post_img']);

$query2="DELETE FROM `post` WHERE post_id={$post_id};";
$query2.="UPDATE `category` SET `post`=post - 1 WHERE category_id={$category}";

if(mysqli_multi_query($conn,$query2)){
 header("Location: {$hostname}/admin/post.php");
}
else{
 echo "Query Failed";
}
?>