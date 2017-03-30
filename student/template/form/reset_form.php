</br></br></br></br></br>
<div class="col-md-4"></div>
<div class="col-md-4">
	<div class="panel panel-info">
		<div class="panel-heading"><strong><i class="fa fa-sign-in"></i>&nbsp;&nbsp; Reset Password </strong></div> <!-- END panel-heading -->
		<div class="panel-body">
			<div style="color: red;">
				<h5 style="text-align: left">
					<?php
						echo $status;
					 ?>
				</h5>
			</div>
			<div class="panel-body">
		    	<div ng-app="myApp">
					<div ng-controller="homeCtrl">
						<form action="forget.php" method="post" role="form" name="myForm" autocomplete="off">
						  <div class="form-group">
						  	<i class="fa fa-user"></i>
						    <label for="email">Temporary Password / OTP</label>
						    <input type="text" class="form-control" name="uid" id="uid" placeholder="Temporary Password" required>
						  </div>
						  
						  <div novalidate ng-app="app" ng-controller="AppCtrl">
						  <div class="form-group">
						  	<i class="fa fa-key"></i>
						    <label for="password1">New Password</label>
						    <input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password" ng-minlength="8" ng-maxlength="20"  required   ng-model="password" ng-required ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/" />						    
						  </div>
						  <div class="form-group" ng-class="{'has-error':!myForm.password.$valid}">
					  		<div class="help-inline">
	   							<span style="color:red" ng-show="!myForm.password.$error.required && (myForm.password.$error.minlength || myForm.password.$error.maxlength) && myForm.password.$dirty">Passwords must be between 8 and 20 characters</span>
	   							<span style="color:red" ng-show="!myForm.password.$error.required && !myForm.password.$error.minlength && !myForm.password.$error.maxlength && myForm.password.$error.pattern && myForm.password.$dirty">Must contain one lower &amp; uppercase letter, and one non-alpha character (a number or a symbol)</span>	
					  		</div>
						  </div>				
						  <div class="form-group">
						  	<div class="control-group">
						  		<i class="fa fa-key"></i>
						    	<label for="password">Confirm New Password</label>
							    <input class="form-control" type="password" name="passwordConfirmation" required ng-model="passwordConfirmation" placeholder="Re-enter Password" password-confirm match-target="password" />						      
							    <div ng-hide="!myForm.passwordConfirmation.$valid">
							    	<i class="fa fa-check" style="color: green"></i>
							    </div>
							</div>
						  </div>
						  <div class="form-group">
						  	<div class="col-sm-2"></div>
						  	<div class="col-sm-4">						  		
						       <div class="help-inline" ng-class="{'has-error':!myForm.passwordConfirmation.$valid}">
						       </div> 
						    </div>
						  </div>
						  </div>
						  <center>
						  	<button type="submit" class="btn btn-primary">Reset</button>	
						  </center>						  
						</form>
					</div>
				</div>
			</div>	
		</div> <!-- END panel-body -->
	</div>
</div>