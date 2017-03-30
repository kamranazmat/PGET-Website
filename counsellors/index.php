<?php
	 //session_destroy();
	 session_start();
	 include('config/setup.php');
	 $status = ""; 
	 if($_POST){
		$q = "SELECT * FROM counsellors WHERE u_id = '$_POST[uid]' AND pwd = sha1('$_POST[password]')";
		$r = mysqli_query($dbc, $q);
		$num = mysqli_num_rows($r);
		
		if($num == 1) {
			$_SESSION['counsellor'] = $_POST['uid'];
			header('Location: student.php');
		}
		else {
			$status = "Invalid Combination";
		}
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PGET | Counsellor</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include('config/stylesheets/css.php');
			include('config/scriptfiles/js.php');
		?>
	</head>
	<body>		
		<div id="wrap">
			<?php include('template/login.php'); // Main Body?>
		</div> <!--end wrap-->
		<?php include('template/footer.php'); // Page Footer ?>		
	</body>
</html>