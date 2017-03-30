</br></br></br></br></br>
<div class="col-md-4"></div>
<div class="col-md-4">
	<div class="panel panel-info">
		<div class="panel-heading"><strong><i class="fa fa-sign-in"></i>&nbsp;&nbsp; Account Help</strong></div> <!-- END panel-heading -->
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
						    <label for="email">Unique ID</label>
						    <input type="text" class="form-control" name="uid" id="uid" placeholder="Unique ID" required>
						  </div>
						  <div class="form-group">
						  	<i class="fa fa-calendar"></i>
						  	<label for="dob">Date of Birth</label>
						    <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" required>
						  </div>
						  <div class="form-group">
						    <input type="hidden" class="form-control" name="hidden" id="hidden" value="0" placeholder="Date of Birth" required>
						  </div>
						  <center>
						  	<button type="submit" class="btn btn-primary">Submit</button>	
						  </center>						  
						</form>
					</div>
				</div>
			</div>	
		</div> <!-- END panel-body -->
	</div>
</div>