</br></br></br></br></br>
<div class="col-md-4"></div>
<div class="col-md-4">
	<div class="panel panel-info">
		<div class="panel-heading"><strong><i class="fa fa-sign-in"></i>&nbsp;&nbsp; Login </strong></div> <!-- END panel-heading -->
		<div class="panel-body">
			<div style="color: red;">
				<h5 style="text-align: left">
					<?php
						echo $status;
					 ?>
				</h5>
			</div>
			<form action="index.php" method="post" role="form" autocomplete="off">
			  <div class="form-group">
			  	<i class="fa fa-user"></i>
			    <label for="email">Unique ID</label>
			    <input type="number" class="form-control" name="uid" id="uid" placeholder="Unique ID" required>
			  </div>
			  
			  <div class="form-group">
			  	<i class="fa fa-lock"></i>
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>					    
			  </div>
			  <center>
			  	<button type="submit" class="btn btn-primary">Log In</button>	
			  </center>
			  
			</form>	
		</div> <!-- END panel-body -->
	</div>
</div>