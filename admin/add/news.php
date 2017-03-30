<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');


	$check = "INSERT INTO news (news_head, news_body) VALUES ('$_POST[news_head]', '$_POST[link]')";
	$check_q = mysqli_query($dbc, $check);
	
	
	echo "1";
	
?>

