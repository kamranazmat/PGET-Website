	
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
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
		  </div>
		  
		  <div class="form-group">
		  	<i class="fa fa-lock"></i>
		    <label for="password">Password</label>
		    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>					    
		  </div>
		  
		  <button type="submit" class="btn btn-default">Log In</button>
		  <label>&nbsp;&nbsp;<a href="passwordhelp.php" target="_blank"><small>Forget your Password ?</small></a></label>
		  </br></br>				
		  <label>New User?<a href="pass.php" target="_blank"> Register&nbsp;&nbsp;</a><i class="fa fa-external-link"></i></label>
		</form>	
	</div> <!-- END panel-body -->
</div>		