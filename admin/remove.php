<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');
		
	$qu = "SELECT * FROM registered";
	$colleges = mysqli_query($seat, $qu);


	if (isset($_POST['ak']) == 1) {
		$iid = $_POST['ak'];		
		//$q = "SELECT * FROM registered WHERE id = $iid";
		//$r = mysqli_query($seat, $q);
		
		//$data = mysqli_fetch_assoc($r);
		//echo "<script>alert($iid); </script>";
		// delete college details
		$del = "DELETE FROM registered WHERE id = $iid";
		$r = mysqli_query($seat, $del);
		//header('Location: '.$_SERVER['PHP_SELF']);
		//die;
		header('Location: ../admin');
		//header('Location: index.php');
		//echo"<script language='javascript'>
		//	$.ajax ({
		//		url: 'index.php',
		//	})
		//	</script>
		//";
		//header("Refresh:0");
		//echo "<meta http-equiv="refresh" content="5">";
		//echo '<script type="text/javascript">';
		//echo 'window.location.href="index.php";';
		//echo '</script>';
	}
	
	
?>