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
#namelist{
    background:#ecf0f1;
    border-radius:4px;
    width:50%;
    cursor:pointer;
}
ul{    
    list-style:none;
    margin:0;
    padding:0px;
}

li{    
    padding:2px 0px 2px 12px;
}
li:hover{
    background:#bdc3c7;
}
</style>

<body>
<div class="container-fluid mt-2 p-2 bg-dark">
    <h2 class="text-center text-white">Ajax Table</h2>
</div>


<div class="container bg-dark p-5">
<form action="">
    <div class="form-group col-md-6">                
        <div id="autocomplete">
            <input type="text" class="form-control col-md-6" id="name" placeholder="Enter Name" autocomplete="off">
            <div id="namelist"></div>
        </div>
        
        <input type="submit" class="btn btn-primary mt-1" value="Submit" id="search-btn">
    </div>
</form>

<table class="table table-light text-center" cellpadding="10px">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Mobile#</th>
      <th scope="col">Address</th>
      <th scope="col">Gender</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="show-data">
  </tbody>

</table>
</div>

<script>
$(document).ready(function(){
    $("#name").keyup(function(){
        var name=$(this).val();
        if(name != ''){
            $.ajax({
            url:"fill-list.php",
            type:"POST",
            data:{name:name},
            success:function(data){
                $("#namelist").fadeIn().html(data);
            }
        });
        }
        else{
            $("#namelist").fadeOut();
            $("#show-data").html(""); 
        }
    });

    $(document).on('click','#namelist li',function(){
        $("#name").val($(this).text());
        $("#namelist").fadeOut();
        
        $("#show-data").html(""); 
    });

    $("#search-btn").on("click",function(e){
        e.preventDefault();

        var name=$("#name").val();
        if(name != ''){
           $.ajax({
            url:"show-table.php",
            type:"POST",
            data:{name:name},
            success:function(data){
                $("#namelist").fadeOut();
                $("#show-data").html(data);                
            }
           }); 
        }
    });
});
</script>

</body>
</html>