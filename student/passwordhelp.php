<?php	
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	 
?>
<!DOCTYPE html>
<html>
	<head>
		<noscript>
		  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=ShowErrorPage.php">
		</noscript>
		<title>PGET | Account Help</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include('config/stylesheets/css.php');
			include('config/stylesheets/css2.php');
			include('config/scriptfiles/js.php');
		?>
		<script>			
			$(document).ready(function() {
				$('#datePicker').datepicker({
		            format: 'dd/mm/yyyy',
		            startDate: '01/01/1985',
		            endDate: '31/12/1995'
		        });

				$("#change").click(function() {
					//var sha1 = require('sha1');
					$("#change").attr("disabled", true);
					var cur_pwd = $('#uid').val();
					var new_pwd = $('#email').val();
					var new_pwdc = $('#date').val();
					$.ajax ({
				   	  type: 'POST',
				      url: "template/passwordchange.php",
				      data: {cur_pwd: cur_pwd, new_pwd: new_pwd, new_pwdc: new_pwdc},
				      success: function(data) {
				      		
				      		if (data == 0) {
				      			toastr.error('Incorrect Combination !!');	
				      			$("#change").attr("disabled", false);					      				
				      		}
				      		else {									
				      			toastr.success('New Password Sent');	
				      			$("#change").attr("disabled", false);
						  		$('#uid').val('');
						  		$('#email').val('');
						  		$('#date').val('');
				      		}
					  										  	
					  }
					});
				});		
			});
		</script>
	</head>
	<body>
		<center id="logo"><img id="menuh2_img" src="images/bg4.jpg" align="center" border="0" style="text-align:center;" alt="" title="" usemap="#planetmap" /></center>
		<br>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading"><strong><i class="fa fa-sign-in"></i>&nbsp;&nbsp; Account Help</strong></div> <!-- END panel-heading -->
				<div class="panel-body">
					<div style="color: red;">
						<h5 style="text-align: left">
							<?php
								//echo $status;
							 ?>
						</h5>
					</div>					
					<div class="panel-body">
				    	<div ng-app="myApp">
							<div ng-controller="homeCtrl">
								<form method="post" role="form" name="myForm" autocomplete="off">
								  <div class="form-group">
								  	<i class="fa fa-user"></i>
								    <label for="ud">Unique ID</label>
								    <input type="number" class="form-control" name="uid" id="uid" placeholder="Unique ID" ng-model="uid" required>
								  </div>
								  <div class="form-group">
								  	  <i class="fa fa-envelope-o"></i>
								  	  <label for="email">Email</label>
								      <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" ng-model="email" required />
								    </div> 
								  <div class="form-group">
								  	<i class="fa fa-calendar"></i>
								  	<label for="date">DOB</label>
									<div class="input-group input-append date" id="datePicker">
					                	<input type="text" class="form-control" name="date" onkeydown="return false" id="date" ng-model="date" placeholder="Date of Birth" required="" />
					                	<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
					            	</div>
								  </div>
								  
								  <center>
								  	<button type="submit" id="change" class="btn btn-default" ng-disabled="!myForm.$valid">Submit</button>	
								  </center>						  
								</form>
							</div>
						</div>
					</div>	
				</div> <!-- END panel-body -->
			</div>
		</div>		
		<?php include('template/footer.php'); // Page Footer ?>
	</body>
</html>