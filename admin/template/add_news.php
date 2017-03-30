<script>	
	$(document).ready(function() {
		$("#change").click(function() {
			$("#change").attr("disabled", true);
			var newsHead = $('#news_head').val();
			var linK = $('#link').val();

			$.ajax ({
		   	  type: 'POST',
		      url: "add/news.php",
		      data: {news_head: newsHead, link: linK},
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
			  		<h5><i class="fa fa-tty"></i>&nbsp;&nbsp;Add News and Events</h5>
			  	</div>
		    	<div class="panel-body">    								  
		    		<form method="post" role="form" name="myForm" autocomplete="off">
						<div class="form-group">
					    	<label for="news_head" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-header" aria-hidden="true"></i>&nbsp;&nbsp;Heading </label>
					    	<div class="col-sm-8">
					      		<input type="text" class="form-control" name="news_head" id="news_head" required />
					    	</div>			    					    
					    </div>
					    <div class="form-group">			  	
					    	<label for="link" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-link" aria-hidden="true"></i>&nbsp;&nbsp;Link </label>
					    	<div class="col-sm-8">
					      		<input type="text" class="form-control" name="link" id="link" required />
					    	</div>			    
					  	</div>
					  	<br>
					  	<center>
					  		<button type="submit" id="change" class="btn btn-default">Submit</button>
					  	</center>
					</form>
			   	</div>
			</div>
		</div>
	</div>
</div>