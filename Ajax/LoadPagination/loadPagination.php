<?php

$con=mysqli_connect("localhost","root","","test") or die("connection failed");

$limit=5;
if(isset($_POST["page_no"])){
    $page=$_POST["page_no"];
}
else{
    $page=1;
}
// $offset=($page - 1) * $limit;
$query="SELECT * FROM `reg_data` LIMIT {$page},{$limit}";
$result=mysqli_query($con,$query);
$output="";

if(mysqli_num_rows($result)>0){
$output .= "<table>";

while($row=mysqli_fetch_assoc($result)){
    $last_id=$row["id"];
    $output.="<tr>
                <th scope='row'>{$row['id']}</th>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['password']}</td>
                <td>{$row['mobile']}</td>
                <td>{$row['address']}</td>
                <td>{$row['gender']}</td>
            </tr>";        
}
$output .= "</table>";
    
$output .="<tr id='pagination'>
            <td colspan='7'><button class='btn btn-success' id='moredata' data-id='{$last_id}'>Load More</button></td>   
           </tr>";

echo $output;           
}
else{
    echo "";
}
mysqli_close($con);

?>