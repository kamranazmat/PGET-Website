<?php
	
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	
	$ver_sql = "SELECT MAX(version_code) FROM version";
	$ver_re = mysqli_query($dbc, $ver_sql);
	$ver_row = mysqli_fetch_array($ver_re);

	$Version = $_POST['Version'];
	
	if($ver_row[0] == $Version) {		
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


		$sql = "SELECT distinct col_id FROM registered";
		$res = mysqli_query($seat, $sql);
		$college_dept = array();
				
		while($row = mysqli_fetch_array($res)){
			$sq = "SELECT distinct dept_name FROM registered WHERE col_id = '$row[0]'";
			$re = mysqli_query($seat, $sq);
			$dept = array();
			while($ro = mysqli_fetch_array($re)) {
				array_push($dept,
					$ro[0] 
				);
			}
			array_push($college_dept,
				array($row[0]=>$dept)
			);
		}


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

		$sql = "SELECT distinct dept FROM registered";
		$res = mysqli_query($seat, $sql);
		$dept_colleges = array();
				
		while($row = mysqli_fetch_array($res)){
			$sq = "SELECT distinct col_id FROM registered WHERE dept = '$row[0]'";
			$re = mysqli_query($seat, $sq);
			$dept = array();
			while($ro = mysqli_fetch_array($re)) {
				array_push($dept,
					$ro[0] 
				);
			}
			array_push($dept_colleges,
				array($row[0]=>$dept)
			);
		}
		
		$sql = "SELECT distinct dept, dept_name FROM registered";
		$res = mysqli_query($seat, $sql);
		$department = array();
				
		while($row = mysqli_fetch_array($res)){
			array_push($department,
				array(
					'code'=>$row[0],
					'name'=>$row[1],
			));
		}
	 

		echo json_encode(array("dates"=>$dates, "news"=>$news, "college_dept"=>$college_dept, "colleges"=>$colleges, "dept_colleges"=>$dept_colleges, "department"=>$department));
	}
	else {
		echo "Ravi";
	}
 
 
?> 