<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');


	$check = "INSERT INTO dates (event, dates) VALUES ('$_POST[event]', '$_POST[edate]')";
	$check_q = mysqli_query($dbc, $check);
	
	
	echo "1";
	
?>

