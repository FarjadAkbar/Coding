<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

</head>

<body>

<style>
body{
    background-color: #525252;
}
.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
#response{
	width:70%;
	margin:0px 80px;
	text-align:center;
	padding:10px;
	border-radius:5px;
}
.error-msg{
	background:#f2dedf;
	color:#9c4150;
	border:1px solid #e7ced1;
}
.success-msg{
	background:#e0efda;
	color:#407a4a;
	border:1px solid #c6dfb2;
}
.process-msg{
	background:#d9edf6;
	color:#377084;
	border:1px solid #c8dce5;
}
</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
						<h3 class="panel-title">Independent Select Box <small>It's free!</small></h3>
						</div>
						<div class="panel-body">
						<form id="submit-form">
                            
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" class="form-control"  id="country">
                                    <option value="" >Select Country</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <select name="state" class="form-control" id="state">
                                    <option value="" ></option>
                                </select>
                            </div>
                            
							<div id="response"></div>							
							<input type="button" id="submit" value="Register" class="btn btn-info btn-block">
												
						</form>
						
					</div>
				</div>				
			</div>			
		</div>
    </div>	
</div>

<script>
    $(document).ready(function(){
        function loaddata(type,c_id){
            $.ajax({
                url:"load-state.php",
                type:"POST",
                data:{type:type,id:c_id},
                success:function(data){
                    if(type=="statedata"){                        
                        $("#state").html(data);
                    }
                    else{                        
                        $("#country").append(data);
                    }
  
                }
            });
        }
        loaddata();
      $("#country").on("change",function(){
        var country=$("#country").val();
        if(country!=""){
            loaddata("statedata",country);
        }
        else{
            $("#state").html("");
        }
      });
    });
</script>
</body>
</html>