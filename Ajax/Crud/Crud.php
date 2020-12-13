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
.delete-btn{
  background:red;
  color:white;
  border:0;
  padding:5px;
  border-radius:5px;
}
.edit-btn{
  background:green;
  color:white;
  border:0;
  padding:5px;
  border-radius:5px;
}
#modal{
    background:rgba(0,0,0,0.7);
    position:fixed;
    left:0;
    top:0;
    width:100%;
    height:100%;
    z-index:100;
    display:none;
    transition:0.5s ease-in;
}
#modal-form{
    background:#fff;
    position:relative;
    left:36%;
    top:10%;
    padding:14px;
    border-radius:4px;
    width:30%;
}
#modal-form h2{
    margin:0 0 15px;
    padding-bottom:10px;    
}
#close-btn{
    background:red;
    color:white;
    position:absolute;
    right:-15px;
    top:-15px;
    line-height:30px;
    text-align:center;
    width:30px;
    height:30px;
    border-radius:50%;
    cursor:pointer;
}
#pagination{
    color:black;
}
#pagination a{
    text-decoration:none;
    font-size:16px;
    cursor:pointer;
    padding:10px;
}
.active{
    color:blue;
    font-weight:bold;
}
</style>

<body>
<div class="container mt-2 p-2 bg-light">
<table class="table table-striped table-bordered text-center" cellpadding="10px">
<h2 class="text-center">Ajax Table</h2>

<div id="search-bar" class="col-3 m-3">
    <label for="search">Search</label>
    <input type="text" name="search" id="search" class="form-control" auto-complete="off">
</div>
<!-- <form id="insertform"> -->
<div class="row">
    <div class="col-md-4 mb-4">
        <label for="name" class="label-control"><strong>Name</strong></label>
        <input type="text" placeholder="Enter Your Name" name="name" id="name" class="form-control">
    </div>
    <div class="col-md-4 mb-4">
        <label for="email" class="label-control"><strong>Email</strong></label>
        <input type="email" placeholder="Enter Your Email" name="email" id="email" class="form-control">
    </div>
    <div class="col-md-4 mb-4">
        <label for="password" class="label-control"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Your Password" name="password" id="password" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="mobile" class="label-control"><strong>Mobile</strong></label>
        <input type="tel" placeholder="Enter Your Mobile" name="mobile" id="mobile" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="address" class="label-control"><strong>Address</strong></label>
        <input type="text" placeholder="Enter Your Address" name="address" id="address" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="gender" class="label-control"><strong>Gender</strong></label>
        <input type="text" placeholder="Enter Your Gender" name="gender" id="gender" class="form-control">
    </div>
    <div class="col-md-6 offset-md-3 mb-4">
        <label for="insert" class="label-control"></label>
        <button type="submit" class="btn btn-primary form-control" name="insert" id="insertdata">Insert</button>
    </div>
</div>
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
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="show-data">
  </tbody>

</table>

<div id="error"></div>
<div id="success"></div>

<div id="modal">
    <div id="modal-form">
        <h2>Edit Form</h2>
            <table class="table table-striped">

            </table>
        <div id="close-btn">X</div>
    </div>
</div>

</div>

<script>
$(document).ready(function(){
    function loadData(page){
        $.ajax({
        url:"fetch.php",
        type:"POST",
        data:{page_no:page},
        success:function(data){
            $("#show-data").html(data);
        }
    });  
    }
    loadData(pagination());

    //Pagination
    function pagination(){
            $(document).on("click","#pagination a",function(e){
            e.preventDefault();
            var page_id=$(this).attr("id");

            loadData(page_id);
        });
    }

    //Insert Record
    $("#insertdata").on("click",function(e){
        // e.preventDeafult();
        var name=$("#name").val();
        var email=$("#email").val();
        var password=$("#password").val();
        var address=$("#address").val();
        var mobile=$("#mobile").val();
        var gender=$("#gender").val();

        if(name == "" || email == "" || password == "" || address == "" || mobile == "" || gender == ""){
            $("#error").html("All fields Are Requried").slideDown();
            $("#success").slideUp();   
            setInterval(function(){$("#error").slideUp()}, 1500);         
        }
        else{
                $.ajax({
                url:'create.php',
                type:"POST",
                data:{
                    name:name,
                    email:email,
                    password:password,
                    address:address,
                    mobile:mobile,
                    gender:gender
                },
                success:function(data){
                    if(data == 1){
                        loadData(pagination());
                        // $("insertform").trigger("reset");
                        $("#success").html("Insert Successfully").slideDown();
                        $("#error").slideUp();
                        setInterval(function(){$("#success").slideUp()}, 1500);         
                    }
                    else{
                        $("#error").html("Can't Inserted").slideDown();
                        $("#success").slideUp();
                        setInterval(function(){$("#error").slideUp()}, 1500);         
                    }
                }
            });
        }
    });

    //Delete Record
    $(document).on("click",".delete-btn",function(e){
        var id=$(this).data("id");
        var element=this;
            $.ajax({
            url:'remove.php',
            type:"POST",
            data:{id:id},
            success:function(data){
                if(data == 1){
                    $(element).closest("tr").fadeOut();                    
                    loadData(pagination());
                    // $("insertform").trigger("reset");
                    $("#success").html("Delete Successfully").slideDown();
                    $("#error").slideUp();
                    setInterval(function(){$("#success").slideUp()}, 1500);         
                }
                else{
                    $("#error").html("Can't Delete").slideDown();
                    $("#success").slideUp();
                    setInterval(function(){$("#error").slideUp()}, 1500);         
                }
            }
        });        
    });

    //Show Modal
    $(document).on("click",".edit-btn",function(e){
        $("#modal").show();
        var id=$(this).data("id");      
            $.ajax({
            url:'edit.php',
            type:"POST",
            data:{id:id},
            success:function(data){              
                $("#modal-form table").html(data);      
            }
        });        
    });

    $(document).on("click","#save",function(e){
        var id=$("#eid").val();
        var name=$("#ename").val();
        var email=$("#eemail").val();
        var password=$("#epassword").val();
        var mobile=$("#emobile").val();
       
        $.ajax({
            url:'edit-form.php',
            type:"POST",
            data:{
                    id:id,
                    name:name,
                    email:email,
                    password:password,
                    mobile:mobile
                },

                success:function(data){
                    if(data == 1){
                        $("#modal").hide();
                        loadData(pagination());
                    }
                    else{   
                        $("#error").html("Can't Update").slideDown();
                        $("#success").slideUp();
                        setInterval(function(){$("#error").slideUp()}, 1500);            
                    }
                }
        });
    });

    //close modal
    $("#close-btn").on("click",function(e){
        $("#modal").hide();
    });

    //Live Search
    $("#search").on("keyup",function(){
        var search_term=$(this).val();
        $.ajax({
            url:'live-search.php',
            type:"POST",
            data:{search:search_term},
            success:function(data){
                $("#show-data").html(data);
            }
        });
    });
});
</script>

</body>
</html>