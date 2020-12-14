<?php include "header.php"; 

if($_SESSION['role']=='0'){
    header("Location:{$hostname}/admin/post.php");
}

include "config.php";

$userid=$_GET['id'];
$query="DELETE FROM user WHERE user_id='{$userid}'";
if(mysqli_query($conn,$query)){
    header("Location:{$hostname}/admin/users.php");
   // echo "<script>alert('Delete Successfully');</script>";
}
else{
echo "Error".mysqli_error($conn);
}

mysqli_close($conn);
?>