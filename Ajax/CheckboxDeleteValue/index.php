<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<style>
#error{
    background:#EFDCDD;
    color:red;
    padding:15px;
    margin:10px;
    display:none;
    position:absolute;
    right:15px;
    top:15px;
}
#success{
    background:#EFDCDD;
    color:green;
    padding:15px;
    margin:15px;
    display:none;
    position:absolute;
    right:15px;
    top:15px;
}
</style>

<body>
<div class="container-fluid bg-light mt-2 p-5">

<div class="row">
    <div class="col-md-12 text-center">
        <h2>Delete Multiple Data With <br> Php & Ajax Crud</h2>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-2 p-2">
        <button id="delete" class="btn btn-danger">Delete</button>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div id="table-data"></div>
    </div>
</div>

<div id="error"></div>
<div id="success"></div>


</div>

<script>
$(document).ready(function(){
   function loadtable() {
        $.ajax({
            url:"load-data.php",
            type:"POST",
            success:function(data) {
                $("#table-data").html(data);
            }
        });
   }
   loadtable();
    $("#delete").on("click",function() {
       var id=[]; 
       $(":checkbox:checked").each(function(key) {
           id[key]=$(this).val();
       });
       if(id.length===0){
        alert("select at least one record");
       }
       else{
           if(confirm("Do you really want to delete this")){
               $.ajax({
                   url:"delete-data.php",
                   type:"POST",
                   data:{id:id},
                   success:function(data){
                        if(data == 1){
                            $("#success").html("Data deleted successfully").slideDown();
                            $("#error").slideUp();
                            setTimeout(function(){
                                $("#success").fadeOut("slow");
                            }, 2000);
                            loadtable();
                        }
                        else{
                            $("#error").html("Can't deleted").slideDown();
                            $("#success").slideUp();
                            setTimeout(function(){
                                $("#error").fadeOut("slow");
                            }, 2000);
                        }
                   }
               });
           }
       }
    });
});
</script>
</body>
</html>