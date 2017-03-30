<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');
	//DELETE FROM `news` WHERE `news`.`id` = 3

	$check = "DELETE FROM counsellors WHERE u_id = '$_POST[id]'";
	$check_q = mysqli_query($con, $check);
	
	
	echo "1";
	
?>

