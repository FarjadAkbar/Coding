<?php
$con=mysqli_connect("localhost","root","","test") or die("connection failed");

$limit_page=5;
$page="";
if(isset($_POST["page_no"])){
    $page=$_POST["page_no"];
}
else{
    $page = 1;
}
$offset=($page - 1) * $limit_page;

$query="SELECT * FROM `reg_data` LIMIT {$offset},{$limit_page}";
$result=mysqli_query($con,$query);
$output="";
if(mysqli_num_rows($result) > 0){
$output .= "<table>";

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
$output .= "</table>";

$query2="SELECT * FROM `reg_data`";
$records=mysqli_query($con,$query2) or die("Query Failed");
$total_record=mysqli_num_rows($records);

$total_pages=ceil($total_record/$limit_page);


$output .= "<div id='pagination'>";

for($i=1;$i<= $total_pages;$i++){
    if($i==$page){
        $active='active';
    }
    else{
        $active='';
    }
       $output .= "<a class=".$active." href='' id='{$i}'>{$i}</a>";
}
$output .= "</div>";

echo $output;
mysqli_close($con);
}
else{
$output.="<h2 style='color:red; text-align:center;'>No Record Found</h2>";
}


?>