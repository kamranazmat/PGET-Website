<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	
	$email_exist = "SELECT * FROM registered WHERE email='$_POST[email]'";
	$email_r_e = mysqli_query($dbc, $email_exist);
	
	
	$num_email_e = mysqli_num_rows($email_r_e);
		
	
	if($num_email_e == 1) {
		echo "0";
	}
	else {
		include('form/email.php');
	}
	
	
	
?>