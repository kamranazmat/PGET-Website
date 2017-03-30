<script>	
	$(document).ready(function() {
		$("#change").click(function() {
			$("#change").attr("disabled", true);
			var cur_pwd = $('#cur_pwd').val();
			var new_pwd = $('#password').val();
			var new_pwdc = $('#passwordConfirmation').val();
			var email = "<?php echo $email; ?>";
			var name = "<?php echo $name; ?>";
			$.ajax ({
		   	  type: 'POST',
		      url: "template/forget.php",
		      data: {cur_pwd: cur_pwd, new_pwd: new_pwd, new_pwdc: new_pwdc, email: email},
		      success: function(data) {		
		      		
		      		if (data == 1) {
		      			toastr.error('Current Password Incorrect');						      				
		      		}
		      		else if (data == 0) {
		      			toastr.error('Password Combination Incorrect');			  		
				  		
		      		}
		      		else if (data == 2) {
		      			//toastr.success('All correct');

		      			$.ajax({ 
		      				type: 'POST',		      				
		      				url: 'template/form/passwordchangedmail.php',
		      				data: {mail: email, name: name},
		      				success: function(data) {
		      					$.ajax ({
		      						url: "logout.php",
		      					})
		      				}
		      			});
		      			$("#change").attr("disabled", false);
					    $("#myForm").trigger("reset");
		      			bootbox.dialog({
						  message: 'You have successfully changed your password.',
						  title: "<h3 style='color: green'>Password change Successful</h3>",
						  closeButton: false,
						  buttons: {
						    ok: {
						      label: 'Logout',
						      className: 'btn-default',
						      callback: function() {						      	
						        window.open('logout.php','_self');
						      }
						    }
						  }
						});
		      			

		      			//window.open("logout.php","_self");
		      		}
			  										  	
			  }
			});
		});		
	});			
</script>

<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading"><strong><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Account Help</strong></div> <!-- END panel-heading -->
		<div class="panel-body">
	    	<div ng-app="myApp">
				<div ng-controller="homeCtrl">
					<form method="post" role="form" name="myForm" autocomplete="off">
					  <div class="form-group">
					    <label for="email">Current Password</label>
					    <input type="password" class="form-control" name="cur_pwd" id="cur_pwd" placeholder="Current Password" ng-model="cur_pwd" required>
					  </div>
					  <!--
					  <div class="form-group">
					  	<label for="new_pwd">New Password</label>
					    <input type="password" class="form-control" name="new_pwd" id="new_pwd" placeholder="New Password" required>
					  </div>
					  <div class="form-group">
					  	<label for="new_pwdc">Confirm New Password</label>
					    <input type="password" class="form-control" name="new_pwdc" id="new_pwdc" placeholder="Confirm New Password" required>
					  </div>
					  -->
					  <!--   -->
					    <div novalidate ng-app="app" ng-controller="AppCtrl">
						  <div class="form-group">
						    <label for="password1">New Password </label>
						    <div>
						      <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" ng-minlength="8" ng-maxlength="20"  required   ng-model="password" ng-required ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/" />
						    </div>
						    <!-- <div class="col-sm-2" ng-show="!myForm.password.length && myForm.password.$valid">
						    	<i class="fa fa-check" style="color: green"></i>
						    </div> -->
						  </div>
						  <div class="form-group" ng-class="{'has-error':!myForm.password.$valid}">  
						  	
						  	<div>
						  		<div class="help-inline">
						  			<!-- <span style="color:red" ng-show="myForm.password.$error.required && myForm.password.$dirty">Required</span> -->
		   							<span style="color:red" ng-show="!myForm.password.$error.required && (myForm.password.$error.minlength || myForm.password.$error.maxlength) && myForm.password.$dirty">Passwords must be between 8 and 20 characters</span>
		   							<span style="color:red" ng-show="!myForm.password.$error.required && !myForm.password.$error.minlength && !myForm.password.$error.maxlength && myForm.password.$error.pattern && myForm.password.$dirty">Must contain one lower &amp; uppercase letter, and one non-alpha character (a number or a symbol)</span>	
						  		</div>					  		
						  	</div>
						  </div>			
						  	
						  <div class="form-group">
						  	<div class="control-group">
						    	<label for="password">Confirm New Password </label>
							    <div>
							      <input class="form-control" type="password" name="passwordConfirmation" id="passwordConfirmation" required ng-model="passwordConfirmation" placeholder="Re-enter Password" password-confirm match-target="password" />							      
							    </div>
							    <div ng-hide="!myForm.passwordConfirmation.$valid">
							    	<i class="fa fa-check" style="color: green"></i>
							    </div>
							</div>
						  </div>
						  <div class="form-group">						  	
						  	<div>						  		
						       <div class="help-inline" ng-class="{'has-error':!myForm.passwordConfirmation.$valid}"></div> 
						    </div>
						  </div>
						 </div>
						<!--   -->			
						<center>
					  		<button type="submit" id="change" class="btn btn-default" ng-disabled="!myForm.$valid">Submit</button>
					  	</center>					  						  
					</form> 
				</div>
			</div>				
		</div> <!-- END panel-body -->
	</div>
</div>	