<script>
	$(document).ready(function() {	
		$("#vapp").click(function(){
			//alert();
			window.open('viewapplication.php', '_target');
		});
	});	
</script>
<div class="container">	
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading"><strong><i class="fa fa-newspaper-o"></i>&nbsp;&nbsp; News and Events </strong></div> <!-- END panel-heading -->
				<div class="panel-body">
					<?php include($_SERVER['DOCUMENT_ROOT'] . '/student/template/news.php'); ?>
				</div> <!-- END panel-body -->				
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-info" style="">
				<div class="panel-heading">

					<?php 
						echo "Welcome, <strong>$name</strong> - <strong>$data[u_id]</strong>";
					?>
					
				</div> <!-- END panel-heading -->
			

				<?php
					//$challan = 0;
					
					if($showMe == 1) {
						$_SESSION['view'] = $data['u_id'];
						echo "
							<div class=\"panel-body\">
								<p class='text-success'>
									<i class=\"fa fa-check\"></i>&nbsp;&nbspApplication Completed &nbsp;&nbsp<button id=\"vapp\" class=\"btn btn-success btn-sm\">View Application</button> 
								</p>										
							
						";
						if($challan == 1) {
							echo"
								<p class='text-success'>
									<i class=\"fa fa-check\"></i>&nbsp;&nbspPayment Details Uploaded
								</p>												
							</div>
							";
						}
						else {

							include($_SERVER['DOCUMENT_ROOT'] . '/student/template/application/payment.php');
							
							echo "</div>";
						}
					}
					else {
						$_SESSION['apply'] = "yes";
						echo "<div class='panel-body'>
								<p>
									<h4>
										<ul style='font-family: monospace;font-size: 15px;text-align: left;'>
											<li>The candidate should supply all the details while filling the Online Application Form.</li>
											<li>After successful submission of the form, submit the fee through Draft.</li>
										</ul>
									</h4>
								</p>
								</br>
								<form action='apply.php' method='post' class='form form-horizontal'>
									<center>
										&nbsp;&nbsp;<button class='btn btn-info' type='submit'>Proceed</button>
									</center>	
								</form>						
							</div>
						";
					}
				?>				
		</div>	
		</div>
	</div> <!-- END row -->	
</div> <!-- END container -->