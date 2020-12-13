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
						<h3 class="panel-title">Please sign up for Bootsnipp <small>It's free!</small></h3>
						</div>
						<div class="panel-body">
						<form id="submit-form">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="number" name="age" id="age" class="form-control input-sm" placeholder="Age" min="1">
									</div>
								</div>
							</div>

							<div class="form-group">
								<input type="radio" name="gender" value="male" id="gender">male
								<input type="radio" name="gender" value="female" id="gender">female
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<select name="country" class="form-control input-sm">
											<option value="ind">India</option>
											<option value="pak">Pakistan</option>
											<option value="ban">Bangladesh</option>
										</select>
									</div>
								</div>			    			
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
	    $("#submit").click(function(){
            var name=$("#first_name").val();
	        var age=$("#age").val();

            if(name == "" || age == "" || !$('input:radio[name=gender]').is(':checked')){
                $("#response").fadeIn();				
				$("#response").removeClass('success-msg').addClass('error-msg').html('All fields are required');				
				setTimeout(function() {
							$("#response").fadeOut("slow");
						}, 1000);
            }
			else{
				// $("#response").html($("#submit-form").serialize());
				$.ajax({
					url:"save-serialize.php",
					type:"POST",
					data:$('#submit-form').serialize(),
					beforesend:function(){
						$("#response").fadeIn();				
						$("#response").removeClass('success-msg error-msg').addClass('process-msg').html('just wait ...');				
					},
					success:function(data){
						$('#submit-form').trigger("reset");
						$("#response").fadeIn();				
						$("#response").removeClass('error-msg').addClass('success-msg').html(data);
						setTimeout(function(){
							$("#response").fadeOut("slow");
						}, 1000);
					}
				});
			}
        });
     });
    </script>
</body>
</html>