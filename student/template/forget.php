<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	$check = "SELECT * FROM registered WHERE password = sha1('$_POST[cur_pwd]') and email='$_POST[email]'";
	$check_q = mysqli_query($dbc, $check);
	
	$num = mysqli_num_rows($check_q);
	if ($num == 1) {
		//echo "0";
		if ($_POST['new_pwd'] != $_POST['new_pwdc']) {
			echo "0";
			
			
		}
		else {
			echo "2";
			$q = "UPDATE registered SET password = sha1('$_POST[new_pwd]') WHERE email = '$_POST[email]';";
			$r = mysqli_query($dbc, $q);
			
		}
	}
	else {
		echo "1";
		
	}
	
	
?>

