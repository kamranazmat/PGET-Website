<?php
	
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
		//$sql = "SELECT * FROM registered WHERE email = '$_POST[email]' AND password = '$_POST[pass]'";


		//$sql = "SELECT u_id, cname, email FROM registered WHERE email = '$_GET[email]' AND password = sha1('$_GET[pass]')";

		//$sql = "SELECT u_id, cname, email FROM registered WHERE email = '$_POST[email]' AND password = sha1('$_POST[pass]')";
		$sql = "SELECT u_id, cname, email FROM registered WHERE email = '$_POST[email]' AND password = '$_POST[pass]'";

		//$sql = "SELECT u_id, cname, email FROM registered WHERE email = 'kamranazmat@outlook.com' AND password = sha1('Kamran123')";


		$res=mysqli_query($dbc, $sql);
		$result = array();
		
	
		while($row = mysqli_fetch_array($res)) {
			$sqll = "SELECT pic FROM application WHERE u_id = '$row[0]'";
			$rrr = mysqli_query($dbc, $sqll);
			$num = mysqli_num_rows($rrr);
			$ro = mysqli_fetch_array($rrr);

			if ($num == 1) {
				array_push($result,
					array(
						'USER_ID'=>$row[0],
						'USER_NAME'=>$row[1],
						'USER_EMAIL'=>$row[2],
						'USER_PIC'=>$ro[0],
				));	
			}			
		}
		
		echo json_encode(array("User_details"=>$result));
		
	
 
 
?>