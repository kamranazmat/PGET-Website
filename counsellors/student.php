<?php
	session_start();
	include('config/setup.php');
	if(!isset($_SESSION['counsellor'])) {
		header('Location: ../counsellors');
	}
	if(isset($_SESSION['student'])) {
		unset($_SESSION['student']);
	}
	$uid = $_SESSION['counsellor'];
	$q = "SELECT * FROM counsellors WHERE u_id = '$uid'";	
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	
	
	//echo $data['name']; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PGET | Student</title>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include('config/stylesheets/css.php');
			include('config/scriptfiles/js.php');
		?>
	</head>
	<body>
		<fieldset class="scheduler-border">
            <legend align="right"><?php echo $data['name']."&nbsp;&nbsp|&nbsp;&nbsp"."<span id=\"time\"></span>"."&nbsp;&nbsp|&nbsp;&nbsp"."<a href='logout.php'>Logout&nbsp;&nbsp;</a>";  ?></legend>
            <div class="wrap">
            	<div class="container">	
				<div class="row">
	            <div class="col-md-4"></div>
				<div class="col-md-4">
					<?php 
						$stat = ""; 
						 if($_POST){
							$qu = "SELECT * FROM registered WHERE u_id = '$_POST[uid]' AND password = sha1('$_POST[password]')";
							$re = mysqli_query($fetch, $qu);
							$num = mysqli_num_rows($re);
							$query = "SELECT * FROM application WHERE u_id = '$_POST[uid]'";
							$result = mysqli_query($fetch, $query);
							$check = mysqli_fetch_assoc($result);
							
							
							
							if ($check['allot'] == 1){
								echo "<script>
										bootbox.confirm({
											message: \"Counselling Process Completed for the candidate with Unique Id: $_POST[uid].\",
											size: 'small', 
											callback: function(result) {
												if(result) {
													
												}    
									        }
									    });
									</script>";
							}
							 
						 	else {
								if($num == 1) {
									if ($check['payment'] == '') {
										echo "<script>
											bootbox.confirm({
												message: \"Not allowed for counselling. Payment not done for the candidate with Unique Id: $_POST[uid].\",
												size: 'small', 
												callback: function(result) {
													if(result) {
														
													}    
										        }
										    });
										</script>";
									}
									else {
										//print_r(mysqli_fetch_assoc($re));								
										$_SESSION['student'] = $_POST['uid'];
										$_SESSION['username'] = $uid;
										echo "<script type=\"text/javascript\">
											window.location.href = 'fetch.php';
										</script>";	
									}
									
								}
								else {
									$stat = "Invalid Combination";
								}
							}
						}
					?>
					<div class="panel panel-info">
						<div class="panel-heading"><strong><i class="fa fa-sign-in"></i>&nbsp;&nbsp; Get Student Details </strong></div> <!-- END panel-heading -->
						<div class="panel-body">
							<div style="color: red;">
								<h5 style="text-align: left">
									<?php
										echo $stat;
									 ?>
								</h5>
							</div>
				            <form action="student.php" method="post" role="form" autocomplete="off">
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
							  	<button type="submit" class="btn btn-primary">Fetch</button>	
							  </center>			  
							</form>
						</div>
					</div>
				</div>
				</div>
			</div>
            </div>
            
						         
        </fieldset>
        
        <script>
        	var today = new Date();
			document.getElementById('time').innerHTML=today;
        </script>
	</body>
</html>