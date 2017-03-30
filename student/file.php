<!DOCTYPE html>
<html class="no-js">
	<head>
		<style>
			.no-js #loader { display: none;  }
			.js #loader { display: block; position: absolute; left: 100px; top: 0; }
			.se-pre-con {
				position: fixed;
				left: 0px;
				top: 0px;
				width: 100%;
				height: 100%;
				z-index: 9999;
				background: url(images/Preloader_2.gif) center no-repeat #fff;
			}
		</style>
		
		<noscript>
		  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=template/ShowErrorPage.php">
		</noscript>
		<title>PGET | Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			//include('config/stylesheets/css.php');
			//include('config/stylesheets/css2.php');
			include('config/scriptfiles/js.php');
		?>
		
		<script>
			$(window).load(function() {
				// Animate loader off screen
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>
		
	</head>
	<body ng-app="mApp" ng-controller="homesCtrl">
	  <form name="myForm">
	    <fieldset>
	      <legend>Upload on form submit</legend>
	      
	      <br>Photo:
	      <input type="file" ngf-select ng-model="picFile" name="file"    
	             accept="image/*" ngf-max-size="2MB" required>
	      <i ng-show="myForm.file.$error.required">*required</i><br>
	      <i ng-show="myForm.file.$error.maxSize">File too large 
	          {{picFile.size / 1000000|number:1}}MB: max 2M</i>
	      
	      <button ng-disabled="!myForm.$valid">Submit</button>
	     
	    </fieldset>
	    <br>
	  </form>
	</body>
</html>