<?php
	//session_destroy();
	session_start();
	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');
	$status = ""; 
	
	if(isset($_SESSION['admin'])) {
		header('Location: /admin');
		die;
	}

	if($_POST){
		$q = "SELECT * FROM admin WHERE uid = '$_POST[uid]' AND adminpwd = sha1('$_POST[password]')";
		$r = mysqli_query($admin, $q);
		$num = mysqli_num_rows($r);
		
		if($num == 1) {
			$_SESSION['admin'] = $_POST['uid'];
			header('Location: /admin');
			
		}
		else {
			$status = "Invalid Combination";
		}
	} 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PGET | Admin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include('config/css.php');
			include('config/js.php');
		?>
		<style>
			.footer {
				  position: absolute;
				  bottom: 0;
				  width: 100%;
				  /* Set the fixed height of the footer here */
				  height: 60px;
				  background-color: #f5f5f5;
				}
		</style>
	</head>
	<body>		
		<div id="wrap">
			<?php include('template/login.php'); // Main Body?>
		</div> <!--end wrap-->
		<br>
		<?php include('template/footer.php'); // Page Footer ?>		
	</body>
</html>