<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');
	$qu = "SELECT * FROM counsellors";
	$counsellors = mysqli_query($con, $qu);
	
?>

<script>
    $(document).ready(function() {
        $('#example4').DataTable();
    } );
    

    $(document).ready(function() {
		var table = $('#example4').DataTable();
		var data = '';
		$(".rmvcon").click(function() {

	        $('#example4 tbody').on( 'click', 'tr', function () {
	        	data = table.row( this ).data();
	        	
	        });


			bootbox.confirm({
				message: "Are you sure?",
				size: "small", 
				callback: function(result) {
			        if (result) {
			        	console.log(data[0]);
			        	
			        	$.ajax ({
						   	type: 'POST',
						    url: "remove/counsellor.php",
						    data: {id: data[0]},
						    success: function(data) {		
					      		
					      		if (data == 1) {
					      			location.reload();
					      		}						  	
							}
						});
					}
		        }
		    });
			/*
			$.ajax ({
		   	  type: 'POST',
		      url: "add/news.php",
		      data: {news_head: newsHead, link: linK},
		      success: function(data) {		
		      		
		      		if (data == 1) {
		      			location.reload();
		      		}						  	
			  }
			});*/
		});		
	});			
</script>

<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-11">
			<div class="panel panel-info">
				<div class="panel-heading"><strong><i class="fa fa-table"></i>&nbsp;&nbsp; View Counsellors </strong></div> <!-- END panel-heading -->
				<div class="panel-body">
					<table id="example4" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>Unique ID</th>
				                <th>Counsellor Name</th>
				                <th>Remove</th>
				            </tr>
				        </thead>
				        <tfoot>
				            <tr>
				                <th>Unique ID</th>
				                <th>Counsellor Name</th>
				                <th>Remove</th>
				            </tr>
				        </tfoot>
				        <tbody>	
				        	


				        	<?php
							foreach($counsellors as $counsellor) {
							
							?>
							<tr>
								<td><?php echo $counsellor['u_id']; ?></td>
							    <td><?php echo $counsellor['name']; ?></td>
							    <td><button class="btn btn-danger rmvcon">Remove</button></td>
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