<?php
	# Start the session
	
	session_start();
	
	if(!isset($_SESSION['username'])) {
		header('Location: ../student');
	}
		
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	$email = $_SESSION['username'];
	$q = "SELECT * FROM registered WHERE email = '$email'";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	$num = mysqli_num_rows($r);
	//$uid = $data['u_id'];
	/*
	if(isset($_POST['challan']) == 1) {
		$uid = $data['u_id'];		
		$qs = "UPDATE application SET cin = '$_POST[cin]' WHERE u_id = '$uid'";
		$rs = mysqli_query($dbc, $qs);
		header('Location: ../student/application.php');						
	}*/
	



	$name = $data['cname'];
	$idd = $data['u_id'];
	$check = "SELECT * FROM application WHERE u_id = '$idd'";
	$rr = mysqli_query($dbc, $check);
	$nu = mysqli_num_rows($rr);
	$km = mysqli_fetch_assoc($rr);
	$challan = 0;
	$allot = $km['allot'];
	//echo $km['payment'];



	if(isset($_POST['submitted']) == 1) {
		
		//echo $_FILES['Draft'];
		$uid = $data['u_id'];
	    $i = $km['pic'];
	    
	    $draftTmpName = $_FILES['Draft']['tmp_name'];
		//$signatureTmpName = $_FILES['mySignature']['tmp_name'];
	    // 
	    $target_path1 = $_SERVER['DOCUMENT_ROOT']."/images/draft/".$i.".jpg";
		move_uploaded_file($draftTmpName, $target_path1);
		chmod($target_path1, 0777);		
	
		$q = "INSERT INTO payment (u_id, bankName, bankBranch, draftNo, draftDate) VALUES ('$uid', '$_POST[bname]', '$_POST[branch]', '$_POST[draftno]', '$_POST[ddate]')";
		$r = mysqli_query($dbc, $q);


		


		$pay = "Complete";
		$qsq = "UPDATE application SET payment = '$pay' WHERE u_id = '$uid'";
		$rs = mysqli_query($dbc, $qsq);

		header('Location: ../student/application.php');						
	}

	if ($km['payment'] != '') {
		$challan = 1;
		//echo $challan;
	}
	//print_r($nu);
	if($nu == 1) {
		$showMe = 1;
	}
	else {
		$showMe = 0;
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
		<title>PGET | Application</title>
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
	<noscript>
	  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=ShowErrorPage.php">
	</noscript>
	<body style="background-color: white">
		<div class="se-pre-con"></div>		
		<div id="wrap" ng-app="myApp" ng-controller="TabController">			
			<?php
				include('template/application/navigation.php'); // Main Navigation 
				include('template/application/body.php'); // Main Body
			?>			
		</div> <!--end wrap-->
		<?php include('template/footer.php'); // Page Footer ?>
	</body>
</html>	
</nav>