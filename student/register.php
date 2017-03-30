<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	session_start();
	if(!isset($_SESSION['pass'])) {
		header('Location: ../student');
	}
	//require_once __DIR__ . '/vendor/autoload.php';
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
		<title>PGET | Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">			
		
		<?php
			include('config/stylesheets/css.php');
			include('config/scriptfiles/js.php');
		?>
		<noscript>
		  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=ShowErrorPage.php">
		</noscript>
		<script>
			$(window).load(function() {
				// Animate loader off screen
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>
	</head>
	
	<body>
		<div class="se-pre-con"></div>
		<div id="wrap">			
			<center id="logo"><img id="menuh2_img" src="images/bg4.jpg" align="center" border="0" style="text-align:center;" alt="" title="" usemap="#planetmap" /></center>
			<map name="planetmap">
			  <area shape="rect" coords="0,0,82,126" href="../student">
			</map>
			</br>			
			<?php include('template/form/register_form.php') // Registration Form ?>	
		</div><!--end wrap-->		
		<?php include('template/footer.php'); // Page Footer ?>		
	</body>
</html>