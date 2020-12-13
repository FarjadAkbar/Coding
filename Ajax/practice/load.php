<?php

$conn=mysqli_connect("localhost","root","","test") or die("Connection failed");

$name=$_POST["search"];


$query="SELECT * FROM reg_data WHERE name = '{$name}'";
$result=mysqli_query($conn,$query);
$output="";
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
echo $output;

?>