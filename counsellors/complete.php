<?php
	session_start();
	include('config/setup.php');
	if(!isset($_SESSION['complete'])) {
		header('Location: ../counsellors/allot.php');
	}
	//echo $_SESSION['complete'];
	$can = $_SESSION['student'];
	$q = "SELECT * FROM registered WHERE u_id = '$can'";
	$r = mysqli_query($fetch, $q);
	$pdata = mysqli_fetch_assoc($r);
	$alloted = $_SESSION['complete'];
	$qq = "SELECT * FROM registered WHERE id = '$alloted'";
	$result = mysqli_query($seat, $qq);
	$data = mysqli_fetch_assoc($result);

	$qs = "SELECT pic FROM application WHERE u_id = '$can'";
	$rs = mysqli_query($fetch, $qs);
	$cdata = mysqli_fetch_assoc($rs);

	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));								
    $cur_time = $date->format('d-m-Y H:i:s a');

	//print_r($data);
	unset($_SESSION['student']);
	unset($_SESSION['college']);
	unset($_SESSION['complete']);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PGET | Complete </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include('config/stylesheets/css.php');
			include('config/scriptfiles/js.php');
		?>
		<style>
			@media print
			{    
			    .no-print, .no-print *
			    {
			        display: none !important;
			    }
			}
		</style>
		<script>
			function printpage() {
			    window.print();
			}
		</script>
	</head>
	<body>	
		<div class="container">
		  <fieldset class="scheduler-border">          	
          	<legend align="right"><?php echo $pdata['u_id']."&nbsp;|&nbsp;"."WBUT-PGET 2016"."&nbsp;|&nbsp;"."<span id=\"time\"></span>"."&nbsp;&nbsp|&nbsp;&nbsp".$pdata['cname']."<a class='no-print' href='template/logout.php'>&nbsp;&nbsp|&nbsp;&nbspLogout&nbsp;&nbsp;</a>";  ?></legend>
			<div id="mydiv">
              <div class="col-md-2"></div>
              <div class="col-md-6">
              	<div class="col-md-3">
              		<img class="img-rounded" width="150" height="200" src="<?php echo "../images/photo/".$cdata['pic'].".jpg"; ?>"/></br>
              		<img class="img-rounded" width="150" height="50" src="<?php echo "../images/signature/".$cdata['pic'].".jpg"; ?>"/></br>               		
              	</div>
              </div>
              <div class="col-md-6">
              	<h3 style="font: bold">Allotment Details</h3>
              	<table class="table table-striped table-bordered">
				  <tr>
				    <td>Candidate Name</td>
				    <td><?php echo $pdata['cname']; ?></td>
				 </tr>
				 <tr>
				    <td>Candidate Unique Id</td>
				    <td><?php echo $pdata['u_id']; ?></td>
				 </tr>
				 <tr>
				    <td>College Name</td>
				    <td><?php echo $data['colname']; ?></td>
				 </tr>
				 <tr>
				    <td>Course</td>
				    <td><?php echo $data['course']; ?></td>
				 </tr>
				 <tr>
				    <td>Department</td>
				    <td><?php echo $data['dept']; ?></td>
				 </tr>
				 <tr>
				    <td>Course Name</td>
				    <td><?php echo $data['coursename']; ?></td>
				 </tr>
				 <tr>
				    <td>Time</td>
				    <td><?php echo $cur_time; ?></td>
				 </tr>			  				  
				</table>
			  </div>
			 </div> 
		  </fieldset>
		</div>
		<center><button class="btn no-print" onclick="printpage()">Print</button></center>
	</body>
</html>
