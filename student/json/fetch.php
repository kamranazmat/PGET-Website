<?php
	
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	
	//$sql = "SELECT colname, coursename, available, available_s, available_obc, available_ph  FROM registered WHERE col_id = '101'";
	//$sql = "SELECT colname, coursename, available, available_s, available_obc, available_ph  FROM registered WHERE dept = 'CSE' and col_id = '101'";
/*
	if($_GET['Department'] == '000') {
		$sql = "SELECT colname, coursename, available, available_s, available_obc, available_ph  FROM registered WHERE col_id = '$_GET[College]'";
	}
	else if($_GET['College'] == '000') {
		$sql = "SELECT colname, coursename, available, available_s, available_obc, available_ph  FROM registered WHERE dept = '$_GET[Department]'";
	}*/

	
	if($_POST['Department'] == '000' && $_POST['College'] != '000') {
		$sql = "SELECT colname, coursename, available, available_s, available_obc, available_ph  FROM registered WHERE col_id = '$_POST[College]' ORDER BY colname";
	}
	else if($_POST['College'] == '000' && $_POST['Department'] != '000') {
		$sql = "SELECT colname, coursename, available, available_s, available_obc, available_ph  FROM registered WHERE dept = '$_POST[Department]' ORDER BY colname";
	}
	else if($_POST['College'] == '000' && $_POST['Department'] == '000') {
		$sql = "SELECT colname, coursename, available, available_s, available_obc, available_ph  FROM registered ORDER BY colname";
	}
	else if($_POST['College'] != '000' && $_POST['Department'] != '000') {
		$sql = "SELECT colname, coursename, available, available_s, available_obc, available_ph  FROM registered WHERE dept = '$_POST[Department]' and col_id = '$_POST[College]' ORDER BY colname";
	}
	//$sql = "SELECT colname, coursename, available, available_s, available_obc, available_ph  FROM registered WHERE dept = '$_POST[Department]' and col_id = '$_POST[College]'";



	$res=mysqli_query($seat, $sql);
	$colleges = array();
					
	while($row = mysqli_fetch_array($res)){
		array_push($colleges,
			array(
				'collegename'=>$row[0],
				'coursename'=>$row[1],
				'gen'=>$row[2],
				'sc_st'=>$row[3],
				'obc'=>$row[4],
				'phy'=>$row[5],
		));
	}
	 
	echo json_encode(array("data"=>$colleges));
 
 
?>
