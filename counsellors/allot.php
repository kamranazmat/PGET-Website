<?php
	include('config/setup.php');
	
	session_start();
	//echo $_SESSION['student'];
	$can = $_SESSION['student'];
	$q = "SELECT * FROM registered WHERE u_id = '$can'";
	$r = mysqli_query($fetch, $q);
	$pdata = mysqli_fetch_assoc($r);

	$qc = "SELECT * FROM application WHERE u_id = '$can'";
	$rc = mysqli_query($fetch, $qc);
	$pcdata = mysqli_fetch_assoc($rc);

	//print_r($pcdata);
	$a = $pcdata['category'];
	if(!isset($_SESSION['college'])) {
		header('Location: ../counsellors/fetch.php');
	}
	if(isset($_SESSION['complete'])) {
		unset($_SESSION['complete']);
	}
	//$seat = mysqli_connect('localhost', $user, $password, 'college') OR die('Error: '.mysqli_connect_error());
	//include('config/connection.php');
	$qu = "SELECT * FROM registered";
	$matches = mysqli_query($seat, $qu);
	if ($_POST) {
		$iid = $_POST['ak'];		
		$q = "SELECT * FROM registered WHERE id = $iid";
		$r = mysqli_query($seat, $q);
		//print_r($r);
		//echo $num = mysqli_num_rows($r);
		$data = mysqli_fetch_assoc($r);
		//print_r($data);
		if ($a == "General") {
		$updated = $data['available'] - 1;		
		$qq = "UPDATE registered SET available = $updated WHERE id = $iid";
		$rr = mysqli_query($seat, $qq);
		}
		if ($a == "OBC") {
		$updated = $data['available_obc'] - 1;		
		$qq = "UPDATE registered SET available_obc = $updated WHERE id = $iid";
		$rr = mysqli_query($seat, $qq);
		}
		if ($a == "SC/ST") {
		$updated = $data['available_s'] - 1;		
		$qq = "UPDATE registered SET available_s = $updated WHERE id = $iid";
		$rr = mysqli_query($seat, $qq);
		}
		if ($a == "PH") {
		$updated = $data['available_ph'] - 1;		
		$qq = "UPDATE registered SET available_ph = $updated WHERE id = $iid";
		$rr = mysqli_query($seat, $qq);
		}
		$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));								
		$cur_time = $date->format('d-m-Y H:i:s a'); 

		$qqu = "INSERT INTO allotments (u_id, course_id, category, time) VALUES ('$pdata[u_id]', '$iid', '$a', '$cur_time')";
		$rs = mysqli_query($seat, $qqu);
		//UPDATE `application` SET `allot` = '1' WHERE `application`.`u_id` = 2015000092;
		$alloted = $iid;
		$st_id = $pdata[u_id];
		$qsq = "UPDATE application SET allot = $alloted WHERE u_id = $st_id";
		$rs = mysqli_query($fetch, $qsq);
		print_r($rs);
		$_SESSION['complete'] = $iid;
		header('Location: complete.php');		
	}
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PGET | Allot </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include('config/stylesheets/css.php');
			include('config/scriptfiles/js.php');
		?>
		<script>
			var c_id = 0; 
			$(document).ready(function() {
			    var table = $('#example').DataTable();
			    /*
			    $('#example').dataTable( {
			        "dom": 'T<"clear">lfrtip',
			        "tableTools": {
			            "fnPreRowSelect": function ( e, nodes ) {
			                if ($(e.currentTarget).hasClass('editable')) {
			                    return false;
			                }
			                return true;
			            }
			        }
			    } );
				*/


			    document.getElementById("select").disabled = true;
			    $('#example tbody').on( 'click', 'tr', function () {

			    	/*chnages made here
			    	if (table.row(this, { selected: true }).any()) {                
		                if (!condition) table.row(this).deselect();
		            }
			    	*/
			        if ( $(this).hasClass('selected') ) {
			            $(this).removeClass('selected');		            
			        }
			        else {
			            table.$('tr.selected').removeClass('selected');
			            $(this).addClass('selected');
			        }
			        var data = table.row('.selected').data();
			        //console.log(data[6]);

			        
			        if (typeof data === 'undefined' || data[6] == '0') {
					    document.getElementById("select").disabled = true;
					    $(this).removeClass('selected');
					}

					else {
						//console.log(data);
				        c_id = data[0];
				        //aForm.ak.$setViewValue(c_id);
				        //document.aForm.ak.value = c_id;
				        document.getElementById('ak').value = c_id;
				        console.log(c_id);
				        //if() document.getElementById("myTextarea").readOnly = true;
				        document.getElementById("select").disabled = false;
					}
			    } );
		} );
		</script>
		
	</head>
	<body>	
		<div class="container">
		<fieldset class="scheduler-border">
          <legend align="right"><?php echo $pdata['u_id']."&nbsp;|&nbsp;"."WBUT-PGET 2016"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pdata['cname']."<a class='no-print' href='template/logout.php'>&nbsp;&nbsp|&nbsp;&nbspLogout&nbsp;&nbsp;</a>";  ?></legend>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading"><strong><i class="fa fa-table"></i>&nbsp;&nbsp; Seat Matrix </strong></div> <!-- END panel-heading -->
						<div class="panel-body">
							<table id="example" class="display" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						            	<td>S.No</td>
						                <th>College Name</th>
						                <th>Course</th>
						                <th>Department</th>
						                <th>Course Name</th>
						                <?php
						                	
						                	if ($a == "General") {
						                		echo "
						                			<th>General Intake</th>
						                			<th>General Available</th>
						                		";
						                	}
						                	else if ($a == "OBC") {
						                		echo "
						                			<th>OBC Intake</th>
						                			<th>OBC Available</th>
						                		";
						                	}
						                	else if ($a == "SC/ST") {
						                		echo "
						                			<th>SC/ST Intake</th>
						                			<th>SC/ST Available</th>
						                		";
						                	}
						                	else if ($a == 4) {
						                		echo "
						                			<th>PH Intake</th>
						                			<th>PH Available</th>
						                		";
						                	}
						                ?>
						                
						            </tr>
						        </thead>
						        <tfoot>
						            <tr>
						            	<td>S.No</td>
						                <th>College Name</th>
						                <th>Course</th>
						                <th>Department</th>
						                <th>Course Name</th>
						                <?php
						                	
						                	if ($a == "General") {
						                		echo "
						                			<th>General Intake</th>
						                			<th>General Available</th>
						                		";
						                	}
						                	else if ($a == "OBC") {
						                		echo "
						                			<th>OBC Intake</th>
						                			<th>OBC Available</th>
						                		";
						                	}
						                	else if ($a == "SC/ST") {
						                		echo "
						                			<th>SC/ST Intake</th>
						                			<th>SC/ST Available</th>
						                		";
						                	}
						                	else if ($a == 4) {
						                		echo "
						                			<th>PH Intake</th>
						                			<th>PH Available</th>
						                		";
						                	}
						                ?>
						            </tr>
						        </tfoot>
						        <tbody>				        	
						        	<?php
									foreach($matches as $match) {
										
									?>
									<tr>
										<td><?php echo $match['id']; ?></td>
										<td><?php echo $match['colname']; ?></td>
									    <td><?php echo $match['course']; ?></td>
									    <td><?php echo $match['dept']; ?></td>
									    <td><?php echo $match['coursename']; ?></td>
									    <?php
						                	$ava = $match['available'];
						                	$int = $match['intake'];
						                	$ava_obc = $match['available_obc'];
						                	$int_obc = $match['intake_obc'];
						                	$ava_s = $match['available_s'];
						                	$int_s = $match['intake_s'];
						                	$ava_p = $match['available_ph'];
						                	$int_p = $match['intake_ph'];

						                	if ($a == "General") {

						                		echo "
						                			<td>$int</td>
						                			<td>$ava</td>									    			
						                		";
						                	}
						                	if ($a == "OBC") {
						                		echo "
						                			<td>$int_obc</td>
						                			<td>$ava_obc</td>								    			
						                		";
						                	}
						                	if ($a == "SC/ST") {
						                		echo "
						                			<td>$int_s</td>
						                			<td>$ava_s</td>									    			
						                		";
						                	}
						                	if ($a == 4) {
						                		echo "
						                			<td>$int_p</td>
						                			<td>$ava_p</td>									    			
						                		";
						                	}
						                	
						                ?>									    
									</tr>
									<?php 
										
									}
									?>        
						        </tbody>
							</table>
						</br>
						
						<!-- <div align="right"><button type="submit" id="select" class="btn btn-primary">Confirm</button></div> -->
						<form class="form form-horizontal" id="regg" autocomplete="on" method="post" name="aForm" action="allot.php" novalidate>
							<div class="form-group" align="right">
								<input type="hidden" id="ak" name="ak" value="">
								<button type="submit" id="select" class="btn btn-danger">Confirm</button>&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		  </fieldset>
		</div>
	</body>
	<div class="no-print"><?php include('template/footer.php'); // Page Footer ?><div>
</html>