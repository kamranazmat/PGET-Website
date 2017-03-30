<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');
	$qu = "SELECT * FROM news";
	$news = mysqli_query($dbc, $qu);
	
?>

<script>	
	$(document).ready(function() {
		var table = $('#example5').DataTable();
		var data = '';
		$(".rmvnews").click(function() {

	        $('#example5 tbody').on( 'click', 'tr', function () {
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
						    url: "remove/news.php",
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
					<table id="example5" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>News ID</th>
				                <th>Heading</th>
				                <th>Time</th>
				                <th>View News</th>
				                <th>Remove</th>
				            </tr>
				        </thead>
				        <tfoot>
				            <tr>
				                <th>News ID</th>
				                <th>Heading</th>
				                <th>Time</th>
				                <th>View News</th>
				                <th>Remove</th>
				            </tr>
				        </tfoot>
				        <tbody>				        	
				        	<?php
							foreach($news as $new) {
							
							?>
							<tr>
								<td><?php echo $new['id']; ?></td>
							    <td><?php echo $new['news_head']; ?></td>
							    <td><?php echo $new['time']; ?></td>
							    <td><button class="btn btn-info" onclick="window.open('<?php echo $new['news_body']; ?>');">View News and Events</button></td>
							    <td><button class="btn btn-danger rmvnews">Remove</button></td>
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