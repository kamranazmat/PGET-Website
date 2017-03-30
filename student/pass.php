<?php 
	session_start();
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	$_SESSION['pass'] = "ok";
	header('Location: register.php');
?>