
<script>	
	$(document).ready(function() {
				
		$(".coladd").click(function() {
			$(".coladd").attr("disabled", true);

			var ccode = $('#ccode').val();
			var colname = $('#colname').val();
			var course = $('#course').val();
			var department = $('#department').val();
			var dname = $('#dname').val();
			var cname = $('#cname').val();
			var gintake = $('#gintake').val();
			var ointake = $('#ointake').val();
			var sintake = $('#sintake').val();
			var pintake = $('#pintake').val();

			$.ajax ({
			   	type: 'POST',
			    url: "add/college.php",
			    data: {ccode: ccode, colname: colname, course: course, department: department, dname: dname, cname: cname, gintake: gintake, ointake: ointake, sintake: sintake, pintake: pintake},
		      	success: function(data) {		
		      		
		      		if (data == 1) {
		      			location.reload();
		      		}						  	
			  }
			});
		});		
	});			
</script>

<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-11">
			<div class="panel panel-info">
				<div class="panel-heading"><strong><i class="fa fa-table"></i>&nbsp;&nbsp; Add College </strong></div> <!-- END panel-heading -->
				<div class="panel-body">
					<form method="post" action="" class="form-group">
						<p></p>						
						
						<div class="form-group">
							<label class="col-sm-3">College Code</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="ccode" id="ccode" class="form-control" placeholder="" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3">College Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="colname" id="colname" placeholder="" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3">Course</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="course" id="course" placeholder="" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3">Department</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="department" id="department" placeholder="" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3">Department Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="dname" id="dname" placeholder="" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3">Course Name</label>
							<div class="col-sm-8">
								<input type="text" name="cname" class="form-control" id="cname" placeholder="" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3">General Intake</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="gintake" name="gintake" placeholder="" required>
							</div>	
						</div>

						<div class="form-group">
							<label class="col-sm-3">OBC Intake</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="ointake" id="ointake" placeholder="" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3">SC/ST Intake</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="sintake" id="sintake" placeholder="" required>
							</div>	
						</div>
						<div class="form-group">
							<label class="col-sm-3">PH Intake</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="pintake" id="pintake" placeholder="" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3"></label>
							<div class="col-sm-8">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-8">
								<center>
									<button type="submit" name="coladd" class="btn btn-default coladd">Submit</button>
								</center>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</div>