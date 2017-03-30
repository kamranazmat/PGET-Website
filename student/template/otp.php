<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	
	$email = "SELECT * FROM email WHERE email='$_POST[email]' AND tmp='$_POST[otp]'";	
	$email_r = mysqli_query($dbc, $email);
	
	$num_r = mysqli_num_rows($email_r);	
	
	if($num_r == 1) {
		echo "match";
	}
	else {
		echo "no match";
	}
	
	
	
?>