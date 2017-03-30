<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');
	$qu = "SELECT * FROM dates";
	$dates = mysqli_query($dbc, $qu);
	
?>


<script>	
	$(document).ready(function() {
		var table = $('#example6').DataTable();
		var data = '';
		$(".rmvevent").click(function() {

	        $('#example6 tbody').on( 'click', 'tr', function () {
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
						    url: "remove/event.php",
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
				<div class="panel-heading"><strong><i class="fa fa-table"></i>&nbsp;&nbsp; View News and Events </strong></div> <!-- END panel-heading -->
				<div class="panel-body">
					<table id="example6" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>Event ID</th>
				                <th>Event</th>
				                <th>Date</th>
				                <th>Published Date</th>
				                <th>Remove</th>
				            </tr>
				        </thead>
				        <tfoot>
				            <tr>
				                <th>Event ID</th>
				                <th>Event</th>
				                <th>Date</th>
				                <th>Published Date</th>
				                <th>Remove</th>
				            </tr>
				        </tfoot>
				        <tbody>				        	
				        	<?php
							foreach($dates as $date) {
							
							?>
							<tr>
								<td><?php echo $date['id']; ?></td>
							    <td><?php echo $date['event']; ?></td>
							    <td><?php echo $date['dates']; ?></td>
							    <td><?php echo $date['pub_date']; ?></td>
							    <td><button class="btn btn-danger rmvevent">Remove</button></td>
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