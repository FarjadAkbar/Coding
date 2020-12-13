<?php
$con=mysqli_connect("localhost","root","","test") or die("connection failed");

$id=$_POST["id"];
$query = "SELECT * FROM `reg_data` WHERE id={$id}";
$result=mysqli_query($con,$query) or die("Query Failed");
$output="";

if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $output .= "<tr>
                        <td>
                            <label for='name' class='label-control'><strong>Name</strong></label>
                            <input type='text' value='{$row["name"]}' placeholder='Enter Your Name' name='name' id='ename' class='form-control'>                
                            <input type='hidden' value='{$row["id"]}' id='eid'>                
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='email' class='label-control'><strong>Email</strong></label>
                            <input type='email' value='{$row["email"]}' placeholder='Enter Your Email' name='email' id='eemail' class='form-control'>                
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='password' class='label-control'><strong>Password</strong></label>
                            <input type='password' value='{$row["password"]}' placeholder='Enter Your Password' name='password' id='epassword' class='form-control'>                
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='mobile' class='label-control'><strong>Mobile</strong></label>
                            <input type='text' value='{$row["mobile"]}' placeholder='Enter Your Mobile' name='mobile' id='emobile' class='form-control'>                
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type='submit' id='save' class='btn btn-primary'>                
                        </td>
                    </tr> ";
    }
    echo $output;
    mysqli_close($con);
}
?>