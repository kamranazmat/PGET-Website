<?php
	$result = "";
	echo "<script>
			$('#reg').submit(function(e) {
			    var currentForm = this;
			    e.preventDefault();


			    bootbox.prompt({
				  title: 'Password',
				  inputType: \"password\",
				  size: \"small\",
				  callback: function(result) {
			  	 	document.getElementById(\"pwdd\").value = result;
					currentForm.submit();
				  }
				  });
			});

	</script>";
?>
<script>
	$('#regg').submit(function(e) {
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
