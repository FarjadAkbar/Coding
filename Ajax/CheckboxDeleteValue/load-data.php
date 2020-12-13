<?php
$conn=mysqli_connect("localhost","root","","test") or die("Connection Failed");
$query="SELECT * FROM student";
$result=mysqli_query($conn,$query);
$output="";
if(mysqli_num_rows($result)>0){
    $output.="<table class='table table-bordered text-center'>
               <thead class='table-dark text-uppercase'>
                <tr>
                  <th scope='col'></th>
                  <th scope='col'>id</th>
                  <th scope='col'>name</th>
                  <th scope='col'>age</th>
                  <th scope='col'>gender</th scope='col'>
                  <th scope='col'>country</th>
                </tr>
               </thead>";
     while($row=mysqli_fetch_assoc($result)){
        $output.="<thead>
                    <tr>
                      <td scope='col'><input type='checkbox' value='{$row['id']}'/></td>
                      <td scope='col'>{$row['id']}</td>
                      <td scope='col'>{$row['name']}</td>
                      <td scope='col'>{$row['age']}</td>
                      <td scope='col'>{$row['gender']}</td>
                      <td scope='col'>{$row['country']}</td>
                    </tr>
                  </thead>";
     }
    $output.="</table>";

    echo $output;
}
else{
    echo "<h2>No record Found</h2>";
}
?>