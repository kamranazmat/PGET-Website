<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');
	//DELETE FROM `news` WHERE `news`.`id` = 3

	$check = "DELETE FROM dates WHERE id = '$_POST[id]'";
	$check_q = mysqli_query($dbc, $check);
	
	
	echo "1";
	
?>

