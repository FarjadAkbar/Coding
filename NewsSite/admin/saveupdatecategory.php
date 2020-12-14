<?php

include "config.php";

if(isset($_POST['submit'])){

$cat_id=$_POST['cat_id'];
$cat_name=$_POST['cat_name'];

$query="UPDATE `category` SET `category_name`='{$cat_name}' WHERE `category_id`={$cat_id}";
$result=mysqli_query($conn,$query);

if($result){
    header("Location:{$hostname}/admin/category.php");
}
else{
    echo $query;
    print_r($result);
}

}
?>