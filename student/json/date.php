<?php
	
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	
	$sql = "SELECT * FROM dates";
	$res=mysqli_query($dbc, $sql);
	$dates = array();
			
	while($row = mysqli_fetch_array($res)){
		array_push($dates,
			array(
				'id'=>$row[0],
				'event'=>$row[1],
				'date' =>$row[2],
				'pub_date' =>$row[3],
		));
	}

	echo json_encode(array("dates"=>$dates));
 
 
?>