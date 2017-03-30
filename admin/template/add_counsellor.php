<script>	
	$(document).ready(function() {
		$('#datePicker').datepicker({
            format: 'dd/mm/yyyy',
            startDate: '01/01/2016',
            endDate: '31/12/2016'
        });
		
		$("#change3").click(function() {
			$("#change3").attr("disabled", true);
			var coname = $('#coname').val();
			var password = $('#password').val();

			$.ajax ({
		   	  type: 'POST',
		      url: "add/counsellor.php",
		      data: {coname: coname, password: password},
		      success: function(data) {		
		      		//alert(data);
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
		<div class="col-md-11" align="left">
		    <div class="panel panel-info">
			  	<div class="panel-heading">
			  		<h5><i class="fa fa-tty"></i>&nbsp;&nbsp;Add Counsellor</h5>
			  	</div>
		    	<div class="panel-body">    								  
		    		<form method="post" role="form" name="myForm" autocomplete="off">
						<div class="form-group">
					    	<label for="coname" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;Counsellor Name </label>
					    	<div class="col-sm-8">
					      		<input type="text" class="form-control" name="coname" id="coname" placeholder="Counsellor Name" required />
					    	</div>			    					    
					    </div>
					    <div class="form-group">
						    <label for="password" class="col-sm-3 control-label" style="text-align: right;">&nbsp;&nbsp;<i class="fa fa-key" aria-hidden="true"></i>&nbsp;&nbsp;Password</label>
						    <div class="col-sm-8">
						    	<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>					    
						    </div>
						</div>
					  	<center>
					  		<button type="submit" id="change3" class="btn btn-default">Submit</button>
					  	</center>
					</form>
					<br>
			   	</div>
			</div>
		</div>
	</div>
</div>