<?php
	
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	
	$sql = "SELECT distinct col_id, colname FROM registered";
	$res=mysqli_query($seat, $sql);
	$colleges = array();
			
	while($row = mysqli_fetch_array($res)){
		array_push($colleges,
			array(
				'College_Id'=>$row[0],
				'College_Name'=>$row[1],
		));
	}

	echo json_encode(array("colleges"=>$colleges));
 
 
?>