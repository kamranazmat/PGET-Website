<?php
	 session_start();
	 unset($_SESSION['pass']);
	 $_SESSION['lastcheck'] = time();
	 include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	 $status = "";
	 if($_POST){
		$q = "SELECT * FROM registered WHERE email = '$_POST[email]' AND password = sha1('$_POST[password]')";
		$r = mysqli_query($dbc, $q);

		$num = mysqli_num_rows($r);

		if($num == 1) {
			$_SESSION['username'] = $_POST['email'];
			header('Location: application.php');
		}
		else {
			$status = "Invalid Combination";
		}
	}
?>

<!DOCTYPE html>
<html class="no-js">
	<head>
		<style>
			.no-js #loader { display: none;  }
			.js #loader { display: block; position: absolute; left: 100px; top: 0; }
			.se-pre-con {
				position: fixed;
				left: 0px;
				top: 0px;
				width: 100%;
				height: 100%;
				z-index: 9999;
				background: url(images/Preloader_2.gif) center no-repeat #fff;
			}
		</style>

		<noscript>
		  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=template/ShowErrorPage.php">
		</noscript>
		<title>PGET | Home</title>
		<!-- <script  -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include('config/stylesheets/css.php');
			include('config/stylesheets/css2.php');
			include('config/scriptfiles/js.php');
		?>
		<script>
			$(window).load(function() {
				// Animate loader off screen
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>
	</head>
	<body style="background-color: white">
		<div class="se-pre-con"></div>
		<div id="wrap" ng-app="myApp" ng-controller="TabController">
			<?php include('template/navigation.php'); // Main Navigation ?>
			<?php include('template/body.php'); // Main Body?>
		</div> <!--end wrap-->
		<?php include('template/footer.php'); // Page Footer ?>
		<?php include('config/scriptfiles/bootboxjs.php'); ?>
	</body>
</html>
