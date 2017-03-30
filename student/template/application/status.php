<?php
	
	//$q = "SELECT * FROM registered WHERE u_id = '$iid'";
	//$r = mysqli_query($dbc, $q);
	//$pdata = mysqli_fetch_assoc($r);
	//echo $idd;
	$d = "SELECT * FROM allotments WHERE u_id = '$idd'";
	$res = mysqli_query($seat, $d);
	$da = mysqli_fetch_assoc($res);
	$alloted = $da['course_id'];
	//echo "Kamran";
	$qq = "SELECT * FROM registered WHERE id = '$alloted'";
	$result = mysqli_query($seat, $qq);
	$pdata = mysqli_fetch_assoc($result);
	
?>

<table class="table table-striped table-bordered">
  <tr>
    <td>Candidate Name</td>
    <td><?php echo $data['cname']; ?></td>
 </tr>
 <tr>
    <td>Candidate Unique Id</td>
    <td><?php echo $data['u_id']; ?></td>
 </tr>
 <tr>
    <td>College Name</td>
    <td><?php echo $pdata['colname']; ?></td>
 </tr>
 <tr>
    <td>Course</td>
    <td><?php echo $pdata['course']; ?></td>
 </tr>
 <tr>
    <td>Department</td>
    <td><?php echo $pdata['dept']; ?></td>
 </tr>
 <tr>
    <td>Course Name</td>
    <td><?php echo $pdata['coursename']; ?></td>
 </tr> 		  				  
</table>