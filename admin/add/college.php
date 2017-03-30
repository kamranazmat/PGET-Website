<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');


	$check = "INSERT INTO registered (colname, col_id, course, dept, dept_name, coursename, intake, available, intake_obc, available_obc, intake_s, available_s, intake_ph, available_ph) VALUES ('$_POST[colname]', '$_POST[ccode]', '$_POST[course]', '$_POST[department]', '$_POST[dname]', '$_POST[cname]', '$_POST[gintake]', '$_POST[gintake]', '$_POST[ointake]', '$_POST[ointake]', '$_POST[sintake]', '$_POST[sintake]', '$_POST[pintake]', '$_POST[pintake]')";


	$check_q = mysqli_query($seat, $check);
		
	echo "1";
	
?>

