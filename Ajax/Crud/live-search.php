<?php
$search=$_POST["search"];

$con=mysqli_connect("localhost","root","","test") or die("connection failed");
$query="SELECT * FROM `reg_data` WHERE name like '%{$search}%' or email like '%{$search}%'";
$result=mysqli_query($con,$query);

$output="";
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
    $output.="<tr>
                <th scope='row'>{$row['id']}</th>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['password']}</td>
                <td>{$row['mobile']}</td>
                <td>{$row['address']}</td>
                <td>{$row['gender']}</td>
                <td><button class='edit-btn' data-id='{$row['id']}'>Edit</button></td>
                <td><button class='delete-btn' data-id='{$row['id']}'>Delete</button></td>
            </tr>";
}
echo $output;
mysqli_close($con);
}
else{
$output .="<tr><td><h2 style='color:red; text-align:center;'>No Record Found</h2></td></tr>";
}
?>