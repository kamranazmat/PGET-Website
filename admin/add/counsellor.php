<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');

	$hpassword = hash( 'sha1', $_POST['password'] );
	$check = "INSERT INTO counsellors (name, pwd) VALUES ('$_POST[coname]', '$hpassword')";
	$check_q = mysqli_query($con, $check);
	
	
	echo "1";
	
?>

