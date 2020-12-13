<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Uploading with Ajax</title>
</head>
<body>

<style>
.col-md-10{
    display:none;
}
</style>

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<div class="container bg-light">
    <div class="row">    
        <div class="col-xs-12 text-center bg-primary">  
           <h2>Image Uploading and Remove With Ajax</h2>            
        </div>
    </div>

    <div class="row">    
        <div class="col-xs-12 col-md-6 col-md-offset-1 col-sm-8 col-sm-offset-2">  
            <form id="submitform">
                <div class="form-group" style="padding:5px;">
                   <h4 class="text-danger">Select Image</h4>
                   <input type="file" name="file" id="upload_file"  style="padding:5px 0px 8px 0px;">
                   <span class="text-info">Allowd file type- jpeg, jpg, png, gif</span>
                </div> 
                <input type="submit" class="btn btn-primary" value="Upload" name="upload_btn" id="upload_btn">
            </form>
            <br>
            <div class="container">
               <div class="row">
                 <div class="col-md-10" style="border:2px solid black">
                    <h4>Image Preview</h4>
                        <div id="image_preview"></div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
 $("#submitform").on("submit",function(e){
    e.preventDefault();
    var formData=new FormData(this);
    $.ajax({
        url:"upload.php",
        type:"POST",
        data:formData,
        contentType:false, //contentType:multipart/form-data
        processData:false,
        success:function(data){
            $(".col-md-10").show();
            $("#image_preview").html(data);
            $("#upload_file").val('');
        }
    });
 });
 $(document).on("click","#delete_btn",function(){
  if(confirm("Are you sure you want to remove this image")){
      var path=$("#delete_btn").data("path");
      $.ajax({
        url:"delete.php",
        type:"POST",
        data:{path:path},
        success:function(data){            
            if(data!=""){
                $(".col-md-10").hide();
                $("#image_preview").html('');
            }
        }
      });
  }
 });
});
</script>

</body>
</html>