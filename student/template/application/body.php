
<div class="container">
	<div class="aa" ng-hide="tab == 'ab' || tab == 'aa' || tab == 'ac' || tab == 'ad' || tab == 'ae'">
		<?php 
			include('template/application/application_home.php'); // Home 
		?>
	</div>	
	<div class="aa" ng-show="tab == 'aa'">
		<?php
			include('template/application/application_home.php'); // Home 
		?>
	</div>
	<div class="ad" ng-show="tab == 'ad'">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading"><strong><i class="fa fa-info-circle"></i>&nbsp;&nbsp; Counselling Status </strong></div> <!-- END panel-heading -->
						<div class="panel-body">
							<?php
								//print_r($allot);
								if ($allot == 0) {
									echo "<p style=\"text-align: justify\">
									   Counselling not yet done. 
									</p>
									"; 	
								}
								else {
									include('template/application/status.php');	
								}								
							?>
							
						</div> <!-- END panel-body -->				
					</div>
				</div>												
			</div>
		</div>
	</div>
	<div class="ab" ng-show="tab == 'ab'">
		<div class="container">
			<div class="row">
				<div class="col-md-4">					
					<div class="panel panel-info">
						<div class="panel-heading"><strong><i class="fa fa-link"></i>&nbsp;&nbsp; Important Links </strong></div> <!-- END panel-heading -->
						<div class="panel-body">
							<li><a href="http://www.wbut.ac.in/datas/users/0-brochure-pget-new-2014.pdf" target="_blank"><i class="fa fa-file-pdf-o"></i>&nbsp;Information Brochure</a></li>
						</div> <!-- END panel-body -->				
					</div>
				</div>											
			</div>
		</div>
	</div>
	<div class="ae" ng-show="tab == 'ae'">
		<?php include('template/changepassword.php'); ?>
	</div>
	<div class="ac" ng-show="tab == 'ac'">
		<?php include('template/seatmatrix.php'); ?>
	</div>
	
</div>
