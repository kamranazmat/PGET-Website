<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');

	if(!isset($_SESSION['admin'])) {
		header('Location: /admin');
	}
	
	$can = $_GET['id'];
	$q = "SELECT * FROM registered WHERE u_id = '$can'";
	$r = mysqli_query($dbc, $q);
	$pdata = mysqli_fetch_assoc($r);
	$qs = "SELECT * FROM application WHERE u_id = '$can'";
	$rs = mysqli_query($dbc, $qs);
	$data = mysqli_fetch_assoc($rs);	

	$qsd = "SELECT * FROM payment WHERE u_id = '$can'";
	$rsd = mysqli_query($dbc, $qsd);
	$ddata = mysqli_fetch_assoc($rsd);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PGET | <?php echo $pdata['cname']; ?> </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include($_SERVER['DOCUMENT_ROOT'] . '/student/config/stylesheets/css.php');
			include($_SERVER['DOCUMENT_ROOT'] . '/student/config/scriptfiles/js.php');
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
			<div class="wrap">
			<fieldset class="scheduler-border">
              <legend align="right"><?php echo $data['u_id']."&nbsp;|&nbsp;"."WBUT-PGET 2016"."&nbsp;|&nbsp;"."<span id=\"time\"></span>"."&nbsp;&nbsp|&nbsp;&nbsp".$pdata['cname'];  ?></legend>
              <div id="mydiv">
              	</br></br></br>
              <div class="col-md-2"></div>
              <div class="col-md-6">
              	<div class="col-md-3">
              		<img class="img-rounded" width="150" height="200" src="<?php echo "../images/photo/".$data['pic'].".jpg"; ?>"/></br>
              		<img class="img-rounded" width="150" height="50" src="<?php echo "../images/signature/".$data['pic'].".jpg"; ?>"/></br> 
              		<!-- <img class="img-rounded" width="150" height="200" src="../images/photo/2015000090.jpg";/></br>
              		<img class="img-rounded" width="150" height="50" src="<?php echo "..images/signature/".$uid."jpg"; ?>"/>-->
              	</div>
              </div>
                         
              <div class="col-md-6">
              	<h3 style="font: bold">Candidate Details</h3>
              	<table class="table table-striped table-bordered">
				  <tr>
				    <td>Candidate Name</td>
				    <td><?php echo $pdata['cname']; ?></td>
				 </tr>
				 <tr>
				    <td>Mother's Name</td>
				    <td><?php echo $pdata['mname']; ?></td>
				 </tr>
				 <tr>
				    <td>Father's Name</td>
				    <td><?php echo $pdata['fname']; ?></td>
				 </tr>
				 <tr>
				    <td>Date of Birth</td>
				    <td><?php echo $pdata['dob']; ?></td>
				 </tr>
				 <tr>
				    <td>Nationality</td>
				    <td><?php echo $data['nationality']; ?></td>
				 </tr>
				 <tr>
				    <td>State of Domicile</td>
				    <td><?php echo $data['hstate']; ?></td>
				 </tr>
				 <tr>
				    <td>Gender</td>
				    <td><?php echo $data['gender']; ?></td>
				 </tr>
				 <tr>
				    <td>Category</td>
				    <td><?php echo $data['category']; ?></td>
				 </tr>
				 <tr>
				    <td>Physically handicapped</td>
				    <td><?php echo $data['ph']; ?></td>
				 </tr>
				 <tr>
				    <td>Aadhar Card Number</td>
				    <td><?php echo $data['aadhar']; ?></td>
				 </tr>
				 <tr>
				    <td>Communication Address</td>
				    <td>
				    	<?php 
				    		echo $data['houseno'].", "; 
							echo $data['locality']."</br>";
							echo $data['village']."</br>";
							echo $data['dist']."</br>";
							echo $data['state']." - ".$data['pin'];
				    	?>				    	
				    </td>
				  </tr>				  				  
				</table>
				</br></br></br></br></br>
				<h3 style="font: bold">Qualification Details</h3>
				<table class="table table-striped table-bordered">
				  <tr>
				    <td>10th</td>
				    <td>
				    	<table>
				    		<tr>
				    			<td>Board:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['boardten']; ?></td>
							</tr>
							<tr>
				    			<td>Year of Passing:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['yearten']; ?></td>
							</tr>
							<tr>
				    			<td>Division:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['divisionten']; ?></td>
							</tr>
							<tr>
				    			<td>Marks:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['marksten']; ?></td>
							</tr>					    			
				    	</table>				    	
				    </td>
				 </tr>
				 <tr>
				    <td>12th</td>
				    <td>
				    	<table>
				    		<tr>
				    			<td>Board:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['boardtwelve']; ?></td>
							</tr>
							<tr>
				    			<td>Year of Passing:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['yeartwelve']; ?></td>
							</tr>
							<tr>
				    			<td>Division:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['divisiontwelve']; ?></td>
							</tr>
							<tr>
				    			<td>Marks:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['markstwelve']; ?></td>
							</tr>					    			
				    	</table>				    	
				    </td>
				 </tr>
				 <tr>
				    <td>Graduation</td>
				    <td>
				    	<table>
				    		<tr>
				    			<td>Board:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['boardgraduation']; ?></td>
							</tr>
							<tr>
				    			<td>Year of Passing:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['yeargraduation']; ?></td>
							</tr>
							<tr>
				    			<td>Division:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['divisiongraduation']; ?></td>
							</tr>
							<tr>
				    			<td>Marks:&nbsp;&nbsp;</td>
				    			<td><?php echo "&nbsp;&nbsp;".$data['marksgraduation']; ?></td>
							</tr>					    			
				    	</table>				    	
				    </td>
				 </tr>			 			  				  
				</table>
				</br></br></br></br></br>
				<h3 style="font: bold">Payment Details</h3>
				
				
				<table class="table table-striped table-bordered">
				  <tr>
				    <td>Bank Name</td>
				    <td><?php echo "&nbsp;&nbsp;".$ddata['bankName']; ?></td>
				 </tr>					 			  			
				 <tr>
				    <td>Bank Branch</td>
				    <td><?php echo "&nbsp;&nbsp;".$ddata['bankBranch']; ?></td>
				 </tr>					 			  			
				 <tr>
				    <td>Draft Number</td>
				    <td><?php echo "&nbsp;&nbsp;".$ddata['draftNo']; ?></td>
				 </tr>					 			  			
				 <tr>
				    <td>Date</td>
				    <td><?php echo "&nbsp;&nbsp;".$ddata['draftDate']; ?></td>
				 </tr>					 			  			
				</table>

				<div class="no-print">
					<center><button class="btn no-print" onclick="printpage()">Print</button></center>	
					<div></div>			
				</div>
				
				
              </div>
              </div>				
			  </fieldset>			 		
			</div>
		</div>
		<div class="no-print"><?php include('template/footer.php'); // Page Footer ?><div>
	</body>
	<script>
		var today = new Date();
		document.getElementById('time').innerHTML=today;
	</script>
</html>