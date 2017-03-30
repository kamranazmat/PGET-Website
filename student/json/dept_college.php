<?php
	
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	
	//$sql = "SELECT distinct col_id FROM registered";
	$sql = "SELECT distinct dept FROM registered";
	$res = mysqli_query($seat, $sql);
	$colleges = array();
			
	while($row = mysqli_fetch_array($res)){
		$sq = "SELECT distinct col_id FROM registered WHERE dept = '$row[0]'";
		$re = mysqli_query($seat, $sq);
		$dept = array();
		while($ro = mysqli_fetch_array($re)) {
			array_push($dept,
				$ro[0] 
			);
		}
		array_push($colleges,
			array($row[0]=>$dept)
		);
	}
	//$college = (object) $colleges;
	echo json_encode(array("department"=>$colleges));
 
 
?>