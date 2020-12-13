<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<body>
<div class="container-fluid mt-2 p-2 bg-dark">
    <h2 class="text-center text-white">Ajax Table</h2>
</div>


<div class="container bg-dark p-5">
<form action="">
    <div class="form-group col-md-4">
        <label for="name" class="text-white">Select Name:</label>
        <select name="name" class="form-control"  id="name">
            <option value="" >Select Name</option>
        </select>
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
    $.ajax({
        url:"get-data.php",
        type:"POST",
        dataType:"JSON",
        success:function(data){
            $.each(data,function(key,value){
                $("#name").append("<option value='"+value.name+"'>"+value.name+"</option>");
            });
        }
    });
    //load data
    $("#name").change(function(){
        var name=$(this).val();
        if(name==""){
            $("#show-data").html("");
        }
        else{
            $.ajax({
                url:"load-data.php",
                type:"POST",
                data:{name:name},
                success:function(data){
                    $("#show-data").html(data);
                }
            });
        }
    });
});
</script>

</body>
</html>