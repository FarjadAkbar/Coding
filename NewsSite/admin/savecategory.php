<?php

include "config.php";
if(isset($_POST['save'])){
    $cat=$_POST['cat'];

    $query="INSERT INTO `category`(`category_name`) VALUES ('{$cat}')";
    $result=mysqli_query($con,$query);

    if(mysqli_query($conn,$query)){
        header("Location:{$hostname}/admin/category.php");
    }
    else{
        echo "<div class='alert alert-danger'>Query Failed.</div>";
    }
}
?>