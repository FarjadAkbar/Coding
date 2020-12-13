<?php

$conn=mysqli_connect("localhost","root","","selectbox") or die("Connection failed");

if($_POST["type"] == ""){
    $query=mysqli_query($conn,"SELECT * FROM country_tb") or die("Query Failed");
    $str="";
    while($row=mysqli_fetch_assoc($query)){
        $str.="<option value='{$row['c_id']}' >{$row['c_name']}</option>";
    }
    echo $str;
}
else if($_POST["type"]=="statedata"){        
    $query=mysqli_query($conn,"SELECT * FROM state_tb WHERE c_id={$_POST['id']}") or die("Query Failed");
    $output="";
    while($row=mysqli_fetch_assoc($query)){
        $output.="<option value='{$row['s_id']}' >{$row['state']}</option>";
    }
    echo $output;
}
?>