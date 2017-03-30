<?php 
	#Database Connection here...
	$user = 'root';
	//$password = '';
	$password = 'L6BAl8Y3basD';
	$database = 'students';
	$dbc = mysqli_connect('localhost', $user, $password, $database) OR die('Error: '.mysqli_connect_error());
	$seat = mysqli_connect('localhost', $user, $password, 'college') OR die('Error: '.mysqli_connect_error());
	//$img = mysqli_connect('localhost', $user, $password, 'student') OR die('Error: '.mysqli_connect_error());
?>