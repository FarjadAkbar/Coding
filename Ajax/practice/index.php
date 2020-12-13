<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

</head>
<style>
option{
    border-bottom: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-left: 1px solid #ccc;
    border-radius:2px;
    padding:5px;
    transition:background 0.3s ease;
    padding-left:10px;
}
option:hover{
    background:#ccc;
}
</style>
<body>
<div class="container">
    <h1 class="text-center">Load Data</h1>

    <form class="form-horizontal col-3">
        <div class="form-group">
            <input type="text" class="form-control" id="search" autocomplete="off" placeholder="Name">
            <div id="fetch"></div>
            <!-- <button type="submit" class="btn btn-info" id="submit">Search</button> -->
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Mobile#</th>
                <th scope="col">Address</th>
                <th scope="col">Gender</th>
            </tr>
        </thead>
        <tbody id="loaddata">
        </tbody>
    </table>
</div> 

<script>
    $(document).ready(function(){
        function loadTable(){
            var search=$("#search").val();
            $.ajax({
                url:'load.php',
                type:"POST",
                data:{search:search},
                success:function(data){
                    $("#loaddata").append(data);
                }
            });
        }
       
       $("#search").on("keyup",function(){
            var search=$(this).val();
           if(search == ""){
                $("#fetch").html("");
           }
           else{
            $.ajax({
                url:'get.php',
                type:"POST",
                data:{search:search},
                success:function(data){
                    $("#fetch").html(data);
                }
            });
           }

           $(document).on("click","option",function(){
                $("#search").val($(this).text());
                $("option").fadeOut();

                loadTable();
           });
       });
    });
</script>
</body>
</html>