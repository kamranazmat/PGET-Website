<?php
	# Start session:
	session_start();
	
	unset($_SESSION['username']); // Delete the username key
	
	unset($_SESSION['apply']);
	unset($_SESSION['view']);
	
	//session_destroy(); // This would delete all of the session keys
	
	header('Location: ../student'); 
?>
