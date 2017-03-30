<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');

	$check = "SELECT * FROM registered WHERE u_id = '$_POST[cur_pwd]' and email='$_POST[new_pwd]' and dob='$_POST[new_pwdc]'";
	$check_q = mysqli_query($dbc, $check);
	
	$num = mysqli_num_rows($check_q);
	if ($num == 1) {
		echo "1";
		$data = mysqli_fetch_assoc($check_q);		
		include($_SERVER['DOCUMENT_ROOT'] . '/student/template/form/forgetmail.php');
		
	}
	else {
		echo "0";		
	}
	
	
?>

