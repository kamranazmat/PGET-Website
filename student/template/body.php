<?php
	include('config/connection.php');
	$date_q = "SELECT * FROM dates";
	$dates = mysqli_query($dbc, $date_q);
	
?>
<marquee style="color: red;"></marquee>
<div class="container">
	<div class="z" ng-hide="tab == 'b' || tab == 'a' || tab == 'c' || tab == 'd' || tab == 'e' || tab == 'f' || tab == 'g' || tab == 'h' || tab == 'i'">
		<?php include('template/body/body_home.php'); // Home ?>
	</div>	
	<div class="a" ng-hide="tab !== 'a'">
		<?php include('template/body/body_home.php'); // Home ?>
	</div>
	<div class="b" ng-show="tab == 'b'">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading"><strong><i class="fa fa-info-circle"></i>&nbsp;&nbsp; About PGET </strong></div> <!-- END panel-heading -->
						<div class="panel-body">
							<p style="text-align: justify">
							    The Maulana Abul Kalam Azad University of Technology 
								formerly known as West Bengal University of Technology 
								conducts an entrance exam for the M.Tech admissions. 
								GATE qualified candidates must also appear for the exam 
								as there is no exception for them.
							</p>
						</div> <!-- END panel-body -->				
					</div>
				</div>												
			</div>
		</div>
	</div>
	<div class="c" ng-show="tab == 'c'">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="panel panel-info">
						<div class="panel-heading"><strong><i class="fa fa-calendar"></i>&nbsp;&nbsp; Important Dates </strong></div> <!-- END panel-heading -->
						<div class="panel-body">
							<table class="table table-hover">
							    <thead>
							      <tr>
							      	<th>S. no</th>
							        <th>Event</th>
							        <th>Date</th>
							      </tr>
							    </thead>
							    <tbody>
							        <?php
										foreach($dates as $date) {										
								    ?>
								    <tr>
										<td><?php echo $date['id']; ?></td>
									    <td><?php echo $date['event']; ?></td>
									    <td><?php echo $date['dates']; ?></td>
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
	</div>
	<div class="d" ng-show="tab == 'd'">
		
	</div>
	<div class="e" ng-show="tab == 'e'">
		<div class="container">
			<div class="row">
				<div clas="col-md-4"></div>
				<div class="col-md-4">
					<div class="panel panel-info">
						<div class="panel-heading"><strong><i class="fa fa-envelope-o"></i>&nbsp;&nbsp; Contact </strong></div> <!-- END panel-heading -->
						<div class="panel-body">
							<p style="text-align: left">
							   Maulana Abul Kalam Azad University of Technology, West Bengal (MAKAUT WB),</br>
							   BF 142, Sector 1,</br>
							   Salt Lake City,</br>
							   Kolkata 700064, West Bengal</br>
							</p>
						</div> <!-- END panel-body -->				
					</div>
				</div>
				<div class="col-md-4">
					<div id="googleMap" style="width:500px;height:380px;"></div>
				</div>
			</div>
		</div>		
	</div>
	<div class="f" ng-show="tab == 'f'">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading"><strong><i class="fa fa-info-circle"></i>&nbsp;&nbsp; About MAKAUTWB </strong></div> <!-- END panel-heading -->
						<div class="panel-body">
							<p style="text-align: justify">
							   In the last decade, The West Bengal University of Technology being a Centre of Excellence seamlessly engaged in National Building Exercise. The basic objective of the University is to organize undergraduate and post graduate courses of study in Engineering, Technology & Management, also in emerging areas with a view to produce young scientists, technologist and manager of high caliber, capable of contributing towards development of the country. The University is also to develop as a Centre of Excellence for higher studies and Research in mentioned areas. </br>
							   The University which began its operation only with 30 colleges mostly undergraduate, now has strength of 217 colleges with significant presence of Post Graduate courses. It slowly but gradually became the largest affiliating University in short span of time promoting Education and Research and fulfilling its objective in true sense. The increase of Post Graduate courses has provided the University an edge advantage and helped the education arena to meet the gap of future Human Resource in Education.
							</p>
							<p><a href="http://www.wbut.ac.in" target="_blank">Website</a></p>
						</div> <!-- END panel-body -->				
					</div>
				</div>				
				<div class="col-md-4">
				</br></br>
					<div class="panel panel-info">						
						<div class="panel-body">
							<img src="images/wbut.jpg" style="max-height:100%; max-width:100%;"/>
						</div>
					</div>								
				</div>
			</div>
		</div>
	</div>
	
	<div class="g" ng-show="tab == 'g'">		
		<?php include('template/body/faq.php');?>
	</div>
	<div class="h" ng-show="tab == 'h'">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading"><strong><i class="fa fa-graduation-cap"></i>&nbsp;&nbsp; WBUT PGET 2016 Eligibility Criteria</strong></div> <!-- END panel-heading -->
						<div class="panel-body">
							<ul>									
								<li>Candidates must have passed a Bachelor's Degree in Engineering/ Technology/ Pharmacy/ Architecture from a recognized institute/university</li>
								<li>Final Year candidates can also apply provided they fulfil the eligibility criteria by August 31, 2016</li>
								<li>Candidates who are Associate Members of a Professional of Engineers recognized by the Govt. of India as equivalent courses are also eligible to apply</li>
								<li>Candidates who have M.Sc. or are completing M.Sc in the appropriate branches are also eligible.</li>
								<li>It may be noted that distance education degrees are not eligible</li>
							</ul>
						</div> <!-- END panel-body -->				
					</div>
				</div>												
			</div>
		</div>
	</div>	
	<div class="i" ng-show="tab == 'i'">
		<?php include('template/seatmatrix.php'); ?>
	</div>
</div>
