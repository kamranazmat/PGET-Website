<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	$qu = "SELECT * FROM registered";
	$matches = mysqli_query($seat, $qu);
	
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><strong><i class="fa fa-table"></i>&nbsp;&nbsp; Seat Matrix </strong></div> <!-- END panel-heading -->
				<div class="panel-body">
					<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>College Name</th>
				                <th>Course</th>
				                <th>Department</th>
				                <th>Course Name</th>
				                <!-- <th>General Intake</th> -->
				                <th>General Available / Intake</th>
				                <!--<th>OBC Intake</th> -->
				                <th>OBC Available / Intake</th>
				                <!--<th>SC/ST Intake</th> -->
				                <th>SC/ST Available / Intake</th>
				                <!--<th>PH Intake</th> -->
				                <th>PH Available / Intake</th>
				            </tr>
				        </thead>
				        <tfoot>
				            <tr>
				                <th>College Name</th>
				                <th>Course</th>
				                <th>Department</th>
				                <th>Course Name</th>
				                <!-- <th>General Intake</th> -->
				                <th>General Available / Intake</th>
				                <!-- <th>OBC Intake</th> -->
				                <th>OBC Available / Intake</th>
				                <!-- <th>SC/ST Intake</th> -->
				                <th>SC/ST Available / Intake</th>
				                <!-- <th>PH Intake</th> -->
				                <th>PH Available / Intake</th>
				            </tr>
				        </tfoot>
				        <tbody>				        	
				        	<?php
							foreach($matches as $match) {
							
							?>
							<tr>
								<td><?php echo $match['colname']; ?></td>
							    <td><?php echo $match['course']; ?></td>
							    <td><?php echo $match['dept']; ?></td>
							    <td><?php echo $match['coursename']; ?></td>
							    <!-- <td><?php echo $match['intake']; ?></td> -->
							    <td><?php echo $match['available'].'/'.$match['intake']; ?></td>
							    <!-- <td><?php echo $match['intake_obc']; ?></td> -->
							    <td><?php echo $match['available_obc'].'/'.$match['intake_obc']; ?></td>
							    <!-- <td><?php echo $match['intake_s']; ?></td> -->
							    <td><?php echo $match['available_s'].'/'.$match['intake_s']; ?></td>
							    <!-- <td><?php echo $match['intake_ph']; ?></td> -->
							    <td><?php echo $match['available_ph'].'/'.$match['intake_ph']; ?></td>
							</tr>
							<?php 
							}
							?>        
				        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>