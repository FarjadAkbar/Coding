<?php
include "config.php";

if($_SESSION['user_id']==null){
    header("Location:{$hostname}/admin/");
}

if(isset($_GET['id'])){
    $cat_id=$_GET['id'];
}

$query2="DELETE FROM `category` WHERE category_id={$cat_id};";

if(mysqli_query($conn,$query2)){
 header("Location: {$hostname}/admin/category.php");
}
else{
 echo "Query Failed";
}
?>