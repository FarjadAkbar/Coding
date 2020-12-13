<?php
if($_FILES['file']['name'] != ''){

    $file_name=$_FILES['file']['name'];
    $extension=pathinfo($file_name,PATHINFO_EXTENSION);
    $valid_extension=array("jpg","jpeg","png","gif");

    if(in_array($extension,$valid_extension)){
        $new_name=rand().".".$extension;
        $path="images/".$new_name;

        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
            echo "<img src='".$path."' style='width:100%;'/><br><br>
                  <button data-path='".$path."' id='delete_btn' class='btn btn-danger' style='margin-bottom:20px;'>Delete</button>";
        }
    }
    else{
        echo "<script>alert('Invalid file format')</script>";
    }
}
else{
    echo "<script>alert('please select file')</script>";
}
?>