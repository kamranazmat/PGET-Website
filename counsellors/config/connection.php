<?php 
	#Database Connection here...
	$user = 'root';
	//$password = '';
	$password = 'L6BAl8Y3basD';
	$database = 'counsellor';
	$dbc = mysqli_connect('localhost', $user, $password, $database) OR die('Error: '.mysqli_connect_error());
	$seat = mysqli_connect('localhost', $user, $password, 'college') OR die('Error: '.mysqli_connect_error());
	$fetch = mysqli_connect('localhost', $user, $password, 'students') OR die('Error: '.mysqli_connect_error());	
?>
