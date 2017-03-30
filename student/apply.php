<?php
	# Start the session
	
	include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');
	
	session_start();
	if(!isset($_SESSION['username'])) {
		header('Location: ../student');
	}
	if(!isset($_SESSION['apply'])) {
		header('Location: ../student/application.php');
	}
	$user = $_SESSION['username'];
	$q = "SELECT * FROM registered WHERE email = '$user'";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);


	$query = "SELECT * FROM application WHERE u_id = '$data[u_id]'";
	$result = mysqli_query($dbc, $query);
	$value = mysqli_num_rows($result);
	
	if($value == 1) {
		header('Location: ../student/application.php');
	}
	/*
	$idd = $data['u_id'];
	$check = "SELECT * FROM application WHERE u_id = '$idd'";
	$rr = mysqli_query($dbc, $check);
	
	$nu = mysqli_num_rows($rr);		
	//print_r($nu);
	if($nu == 1) {
		//header('Location: ../student/application.php');
	}*/
	
?>
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
    	<title>PGET | Apply</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			include('config/stylesheets/css.php');
			include('config/stylesheets/css2.php');
			include('config/scriptfiles/js.php');
		?>
		<noscript>
		  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=ShowErrorPage.php">
		</noscript>
		<script>
			$(window).load(function() {
				// Animate loader off screen
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>
        <script>/*
            var formSubmitting = false;
            var setFormSubmitting = function() { formSubmitting = true; };

            window.onload = function() {
                window.addEventListener("beforeunload", function (e) {
                    if (formSubmitting) {
                        return undefined;
                    }

                    var confirmationMessage = 'It looks like you have been editing something. '
                                            + 'If you leave before saving, your changes will be lost.';

                    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
                    return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
                });
            };*/
        </script>
    </head>
    <body>
    	<div class="se-pre-con"></div>
    	<div id="wrap">			
			<center id="logo"><img id="menuh2_img" src="images/bg4.jpg" align="center" border="0" style="text-align:center;" alt="" title="" usemap="#planetmap" /></center>
			
			<div class="container">
				<div class="row">
					</br></br>					
					<?php include('template/application/application_form.php'); ?>					
				</div>					
			</div>
        </div>
        <?php include('template/footer.php'); // Page Footer ?>
        
    </body>
</html>