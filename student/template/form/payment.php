<?php
	

?>

<script>
	$(document).ready(function() {
		$(document).ready(function() {				
			$('.datePicker').datepicker({
	            format: 'dd-mm-yyyy',
	            startDate: '01/01/2016',
	            endDate: '31/07/2016'
	        });
			
	    });
	});
		
</script>
<script>
	$('#regi').submit(function(e) {			
	    var currentForm = this;
	    e.preventDefault();
	    bootbox.confirm({
			message: "Are you sure?",
			size: "small", 
			callback: function(result) {
		        if (result) {
		        	currentForm.submit();    
	        }
	    }});
	});
</script>


<form class="form form-horizontal" id="regi" autocomplete="on" method="post" name="myForm" action="application.php" enctype="multipart/form-data" novalidate>
	<div class="form-group">
	  	<div class="col-sm-2"></div>
	    <label for="bname" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp;&nbsp;Bank Name</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="bname" placeholder="Bank Name" name="bname" ng-model="bname" required/>
	    </div>			    					    
	</div>
	<div class="form-group">
	  	<div class="col-sm-2"></div>
	    <label for="branch" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-keyboard-o" aria-hidden="true"></i>&nbsp;&nbsp;Bank Branch</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="branch" placeholder="Bank Branch" name="branch" ng-model="branch" required/>
	    </div>			    					    
	</div>
	<div class="form-group">
	  	<div class="col-sm-2"></div>
	    <label for="draftno" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;Draft No</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="draftno" placeholder="Draft No" name="draftno" ng-model="draftno" required/>
	    </div>			    					    
	</div>
	<div class="form-group">
	  	<div class="col-sm-2"></div>
	    <label for="ddate" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-calendar-minus-o" aria-hidden="true"></i>&nbsp;&nbsp;Date</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control datePicker" name="ddate" onkeydown="return false" name="ddate" id="ddate" ng-model="ddate" required/></td>
	    </div>			    					    
	</div>
	<div class="form-group">
		<div class="col-sm-2"></div>
		<label for="Draft" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;&nbsp;Upload Draft</label>
		<div class="col-sm-4">
			<input type='file' class="form-control" id="Draft" name="Draft" ng-model="Draft" valid-file required accept="image/jpeg" />
		</div>
	</div>	
	<div align="right">				 
		<button type="submit" id="confirm" class="btn" ng-disabled="!myForm.$valid">Submit</button>
    	<input type="hidden" name="submitted" value="1">
	</div>
</form>

