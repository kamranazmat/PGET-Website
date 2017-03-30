<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');
	$qu = "SELECT * FROM registered";
	$students = mysqli_query($dbc, $qu);
	
?>
<script>
    $(document).ready(function() {
        //$('#example3').DataTable();
        /*
        $("#vapp").click(function(){
			//alert();
			window.open('viewapplication.php', '_target');
		});*/


        var table = $('#example3').DataTable();
        $('#example3 tbody').on( 'click', 'tr', function () {
        	var data = table.row( this ).data();
        	console.log(data[0]);
        });
    } );
    
</script>

<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-11">
			<div class="panel panel-info">
				<div class="panel-heading"><strong><i class="fa fa-table"></i>&nbsp;&nbsp; View Students </strong></div> <!-- END panel-heading -->
				<div class="panel-body">
					<table id="example3" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>Unique ID</th>
				                <th>Student Name</th>
				                <th>DOB</th>
				                <th>Contact</th>
				                <th>Email</th>
				                <th>View Application</th>
				            </tr>
				        </thead>
				        <tfoot>
				            <tr>
				                <th>Unique ID</th>
				                <th>Student Name</th>
				                <th>DOB</th>
				                <th>Contact</th>
				                <th>Email</th>
				                <th>View Application</th>
				            </tr>
				        </tfoot>
				        <tbody>				        	
				        	<?php
							foreach($students as $student) {
							
							?>
							<tr>
								<td><?php echo $student['u_id']; ?></td>
							    <td><?php echo $student['cname']; ?></td>
							    <td><?php echo $student['dob']; ?></td>
							    <td><?php echo $student['contact']; ?></td>
							    <!-- <td><?php //echo $match['intake']; ?></td> -->
							    <td><?php echo $student['email']; ?></td>
							    <td><button id="vapp" class="btn btn-info" onclick="window.open('viewapplication.php?id=<?php echo $student['u_id'];?>')">View Application</button></td>
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