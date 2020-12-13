<?php

$con=mysqli_connect("localhost","root","","test") or die("connection failed");

$name=$_POST["name"];

$query="SELECT * FROM `reg_data` WHERE name LIKE '%{$name}%'";
$result=mysqli_query($con,$query) or die("Query Failed");
$output="";

if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $output.="<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['password']}</td>
                    <td>{$row['mobile']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['gender']}</td>
                  </tr>";
    }
}
else{
    $output.="<tr><td><h3>Name not found</h3></td></tr>";;
}

echo $output;


?>