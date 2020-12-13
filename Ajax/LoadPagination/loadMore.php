<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

</head>
<body>

<div class="container mt-2 p-2 bg-light">
<table class="table table-striped table-bordered text-center" cellpadding="10px">
<h2 class="text-center">Load More Pagination Table</h2>
<!-- </form> -->
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
  <tbody id="show-data">
  </tbody>
</table>
</div>

<script>
 $(document).ready(function(){
   function loadData(page){
    $.ajax({
        url:'loadPagination.php',
        type:"POST",
        data:{page_no:page},
        success:function(data){
            if(data){
                $("#pagination").remove();
                $("#show-data").html(data);
            }
            else{                
                $("#moredata").html("Finished");
                $("#moredata").prop("disabled",true);
            }
        }
       
    });
   }

   loadData();
   $(document).on("click","#moredata",function(){
        $("#moredata").html("loading..");
        var pag_id=$(this).data("id");        
        loadData(pag_id);
   });
 });
</script>
</body>
</html>