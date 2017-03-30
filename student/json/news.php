<?php
	
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	
	$sql = "SELECT * FROM news";
	$res=mysqli_query($dbc, $sql);
	$news = array();
			
	while($row = mysqli_fetch_array($res)){
		array_push($news,
			array(
				'id'=>$row[0],
				'heading'=>$row[1],
				'body' =>$row[2],
				'time' =>$row[3],
		));
	}

	echo json_encode(array("news"=>$news));
 
 
?>