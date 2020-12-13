<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>
#response{
    width:70%;
    margin:15px auto;
    padding:10px;
}
.error{
    background:red;
    color:white;
    text-align:center;
}
.success{
    background:green;
    color:white;
    text-align:center;
}

</style>

<div class="container-fluid bg-default" style="padding:130px;">
 <div class="row">
  <div class="col-md-6 col-md-offset-2">
    <form id="submit-form">
        <div class="form-group m-3">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" name="fname" id="fname">
        </div>
        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" name="lname" id="lname">
        </div>
        <input type="button" value="submit" id="submit">
        <!-- <button type="submit" id="submit" class="btn btn-info">Submit</button> -->
    </form>
    <div id="response"></div>
  </div>
 </div>
</div>

<script>
$(document).ready(function(){
    $("#submit").on("click",function(){
        var fname=$("#fname").val();
        var lname=$("#lname").val();
        // alert(fname + lname);
        if(fname=="" || lname==""){
            $("#response").fadeIn();
            $("#response").addClass('error').html("All fields are required.");
        }
        else{        
            $.post(
                "save-form.php",
                $("#submit-form").serialize(),
                function(data){
                    if(data==1){
                        $("#submit-form").trigger("reset");
                        $("#response").fadeIn();
                        $("#response").addClass('success').html("Data Successful Saved.");
                        setTimeout(function(){
                            $("#response").fadeOut();
                        }, 5000);
                    }
                }
            );
        }
    });
});
</script>
</body>
</html>