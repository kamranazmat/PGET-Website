<script>
		$('#reg').submit(function(e) {			
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
