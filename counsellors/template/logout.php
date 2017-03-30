<?php
	# Start session:
	session_start();
	
	
	unset($_SESSION['student']); // Delete the username key
	
	//session_destroy(); // This would delete all of the session keys
	
	header('Location: ../student.php'); // Redirect to login page	 
?>
