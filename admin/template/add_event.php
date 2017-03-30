<script>	
	$(document).ready(function() {
		$('#datePicker').datepicker({
            format: 'dd/mm/yyyy',
            startDate: '01/01/2016',
            endDate: '31/12/2016'
        });
		
		$("#change2").click(function() {
			$("#change2").attr("disabled", true);
			var event = $('#event').val();
			var edate = $('#edate').val();

			$.ajax ({
		   	  type: 'POST',
		      url: "add/event.php",
		      data: {event: event, edate: edate},
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
		<div class="col-md-11" align="left">
		    <div class="panel panel-info">
			  	<div class="panel-heading">
			  		<h5><i class="fa fa-tty"></i>&nbsp;&nbsp;Add Event</h5>
			  	</div>
		    	<div class="panel-body">    								  
		    		<form method="post" role="form" name="myForm" autocomplete="off">
						<div class="form-group">
					    	<label for="event" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-header" aria-hidden="true"></i>&nbsp;&nbsp;Event Name </label>
					    	<div class="col-sm-8">
					      		<input type="text" class="form-control" name="event" id="event" required />
					    	</div>			    					    
					    </div>
					    <div class="form-group">			  	
					    	<label for="edate" class="col-sm-3 control-label" style="text-align: right;">&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;Date</label>
						    <div class="col-sm-8">
						      	<div class="input-group input-append date" id="datePicker">
				                	<input type="text" class="form-control" name="edate" id="edate" autocomplete="off" onkeydown="return false" ng-model="edate" placeholder="" required/>
				                	<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
				            	</div>
				            	
						    </div> 						    
						  </div>		    
					  	</div>
					  	<center>
					  		<button type="submit" id="change2" class="btn btn-default">Submit</button>
					  	</center>
					</form>
					<br>
			   	</div>
			</div>
		</div>
	</div>
</div>