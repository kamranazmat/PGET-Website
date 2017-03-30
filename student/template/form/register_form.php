<?php
	/*
	$siteKey = '6LeFcxsTAAAAAD3D7vSf_IHLxyGjzpqKRHMcnkkR';
	$secret = '6LeFcxsTAAAAAPvApCS-7kto2zr5Gih2RznQWvc9';
	$lang = 'en';
	if(isset($_POST['g-recaptcha-response'])) {
		$recaptcha = new \ReCaptcha\ReCaptcha($secret);
		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
	}
	*/
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<strong>
						<p style="color: blue; text-align: center; font: Courier; font-size: 18px">
							<h4>Enter your Details <br><small style="color: red">Note: All fields are mandatory</small></h4>
							<!-- <i class="fa fa-angle-double-left"></i> -->
						</p>
					</strong>
					<h1 style="font: bold"></h1>
				</div> <!-- END panel-heading -->

				<script>


					$(document).ready(function() {
						//$('#regi').submit(function(e) {
						console.log("kamran");
						$("#confirm").click(function(e){
							console.log("kamran");
							$("#confirm").attr("disabled", true);
						    var currentForm = this;
						    var mail = $('#email').val();
						    $('#get_email').html(mail);

						    //alert();
						    e.preventDefault();
						   	$.ajax ({
						   		type: 'POST',
						      	url: "template/email.php",
						      	data: {email: mail},
						      	success: function(data) {
						      		//alert(data);
						      		if (data == '0') {
						      			toastr.error('Email already registered !!');
						      			$("#confirm").attr("disabled", false);
						      		}
						      		else {
						      			toastr.success('You will receive the OTP if the Email is valid');
						      			openLoginModal();
						      		}

							}

							});
						});

						//$("#confirm").attr("disabled", false);
						$('#datePicker').datepicker({
				            format: 'dd/mm/yyyy',
				            startDate: '01/01/1985',
				            endDate: '31/12/1995'
				        });
						/*
						$(".accept_email").hide();
						$("#check_otp").hide();

						$("#email_verify").click(function(){
						   var mail = "azmat.kamran@gmail.com"
						   $.ajax ({
						   	  type: 'POST',
						      url: "template/email.php",
						      data: {email: mail},
						      success: function(data) {
						      		if (data == '0') {
						      			$('#loginModal').modal('hide');
						      			toastr.error('Email already registered !!');
						      		}
						      		else {
						      			toastr.success('You will receive the OTP if the Email is valid');
						      		}

							  }

						   });
						});
						*/
						$("#email_reverify").click(function(){

						   var mail = $('#email').val();
						   $('.error').html('');
						   $.ajax ({
						   	  type: 'POST',
						      url: "template/email.php",
						      data: {email: mail},
						      success: function(data) {
						      		if (data == '0') {
						      			toastr.error('Email already registered !!');
						      		}
						      		else {
						      			toastr.success('You will receive the OTP if the Email is valid');
						      		}

							  }

						   });
						});

						$("#confirm_email").click(function(){

						   var mail = $('#email').val();
						   var otp = $('#otp').val();
						   $.ajax ({
						   	  type: 'POST',
						      url: "template/otp.php",
						      data: {email: mail, otp: otp},
						      success: function(data) {
						      		if(data == 'match') {
						      			//toastr.success('OTP Correct');
						      			$("#regi").submit();
						      		}
						      		else {
						      			shakeModal();
						      		}
							  }

						   });
						});
					});
				</script>

				<div class="panel-body">
					<div ng-app="myApp">
						<div ng-controller="homeCtrl">
						<?php
							if(isset($_POST['submitted']) == 1) {
								$hpassword = hash( 'sha1', $_POST['password'] );
								/*
								$cur_time = time();
								$cur_time = date("D, d M Y H:i:s",$cur_time);
								*/
								$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
								$cur_time = $date->format('d-m-Y H:i:s a');
								$q = "INSERT INTO registered (cname, mname, fname, dob, contact, email, password, time) VALUES ('$_POST[cname]', '$_POST[mname]', '$_POST[fname]', '$_POST[dob]', '$_POST[contact]', '$_POST[email]', '$hpassword', '$cur_time')";
								$r = mysqli_query($dbc, $q);



								if($r) {
									$que = "SELECT * FROM registered WHERE email = '$_POST[email]'";
									$res = mysqli_query($dbc, $que);
									$da = mysqli_fetch_assoc($res);
									$ref = $da['u_id'];

									echo"<script language='javascript'>
										$.ajax ({
				      						url: 'logout.php',
				      					})

										bootbox.dialog({
											  message: 'This is your Reference Number,  Use this for future reference.' + '</br>'+'<h4 style=\'font: bold\'> $ref</h4>',
											  title: '<h3 style=\'color: green\'>Registratoion Successful</h3>',
											  closeButton: false,
											  buttons: {
											    ok: {
											      label: 'Login',
											      className: 'btn-default',
											      callback: function() {
											        window.open('logout.php','_self');
											      }
											    }
											  }
											});
									</script>";
									include($_SERVER['DOCUMENT_ROOT'] . '/student/template/form/mail.php');


								}
								else {
									echo "<script language='javascript'>
										bootbox.dialog({
											  message: 'There is some error, try again.' + '</br>'+'If error continues, contact us.',
											  title: '<h3 style=\'color: red\'>Error</h3>',
											  closeButton: false,
											  size: 'small',
											  buttons: {
											    ok: {
											      label: 'Try Again',
											      className: 'btn-default',
											      callback: function() {
											        window.open('logout.php','_self');
											      }
											    }
											  }
											});
									</script>";
								}

								/*else if($r == false){
									    echo mysql_error();
									}
									/*echo "Mysql Error : ".mysql_error();
									/*if (mysql_errno() == 1062) {
										echo"<script language='javascript'>";
										echo "alert(mysq)";
											//bootbox.alert({size: 'small', message: '<div class='alert alert-danger'>Error! Try Again</div>', closeButton: false, 'ok': { className: 'btn-danger', callback: function () {} }})
										echo "</script>";
									}
									else {

									}*/
								//}
							}

						?>
						<div class="container">
							<div class="modal fade bs-example-modal-sm" id="loginModal">
							    <div class="modal-dialog modal-sm" style="padding-top: 10%;">
							        <div class="modal-content">
						                <div class="modal-header">
							                <h4 class="modal-title"><strong>Enter One Time Password</strong></h4>
							            </div>
							            <div class="modal-body">
							                <div class="box">
							                	<p style="font-family: 'Open Sans',Arial,sans-serif; text-align: left">One Time Password (OTP) has been sent to your mail <strong id="get_email"></strong>, please enter it here to verify your mail.</p>
							                     <div class="content">
							                        <div class="error" style="color: red; font-size: 12px"></div><br>
							                        <div class="form loginBox input-wrapper">
							                            <form class="form form-horizontal" method="post" name="otp_form" action="" accept-charset="UTF-8" id="form_otp">
								                            <input id="otp" class="form-control group" type="number" placeholder="OTP" name="OTP">
							                            </form>
							                        </div>
							                     </div>
							                </div>
							            </div>
							            <div class="modal-footer">
							            	<button class="btn btn-link" id="email_reverify">Resend OTP</button>
				                    <button class="btn btn-info" id="confirm_email">Verify</button>
									    		</div>
								    </div>
							    </div>
							</div>
						</div>



					    <form class="form form-horizontal" id="regi" autocomplete="on" method="post" name="myForm" action="register.php" novalidate>
						  <div class="form-group">
						    <label for="cname" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;Candidate Name </label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" name="cname" id="cname" ng-minlength="6" placeholder="Candidate's Full Name" ng-model="cname" required />
						    </div>
						    <div class="col-sm-5">
						    	<h6 style="font-family: Courier; font-size: 12px">(As per Class X Certificate)</h6>
						    </div>
						  </div>
						  <div class="form-group">
						  	<div class="col-sm-3"></div>
						  	<div class="col-sm-6">
						  		<span style="color:red" ng-show="myForm.cname.$dirty && myForm.cname.$invalid">
									<span style="color:red" ng-show="!myForm.cname.$error.required && myForm.cname.$error.minlength && myForm.cname.$dirty">Name cannot be less than 6 characters</span>
								</span>
						  	</div>
						  </div>
						  <div class="form-group">
						    <label for="mname" class="col-sm-3 control-label" style="text-align: right;">&nbsp;&nbsp;<i class="fa fa-female"></i>&nbsp;&nbsp;Mother's Name </label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" name="mname" id="mname" placeholder="Mother's Full Name" ng-minlength="6" ng-model="mname" required />
						    </div>
						    <div class="col-sm-5">
						    	<h6 style="font-family: Courier; font-size: 12px">(As per Class X Certificate)</h6>
						    </div>
						  </div>
						  <div class="form-group">
						  	<div class="col-sm-3"></div>
						  	<div class="col-sm-6">
						  		<span style="color:red" ng-show="myForm.mname.$dirty && myForm.mname.$invalid">
									<!-- <span ng-show="myForm.mname.$error.required">Mother's name is required</span> -->
									<span style="color:red" ng-show="!myForm.mname.$error.required && myForm.mname.$error.minlength && myForm.mname.$dirty">Name cannot be less than 6 characters</span>
								</span>
						  	</div>
						  </div>
						  <div class="form-group">
						    <label for="fname" class="col-sm-3 control-label" style="text-align: right;">&nbsp;&nbsp;<i class="fa fa-male"></i>&nbsp;&nbsp;Father's Name </label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" name="fname" id="fname" placeholder="Father's Full Name" ng-minlength="6" ng-model="fname" required />
						    </div>
						    <div class="col-sm-5">
						    	<h6 style="font-family: Courier; font-size: 12px">(As per Class X Certificate) </h6>
						    </div>
						  </div>
						  <div class="form-group">
						  	<div class="col-sm-3"></div>
						  	<div class="col-sm-6">
						  		<span style="color:red" ng-show="myForm.fname.$dirty && myForm.fname.$invalid">
									<span style="color:red" ng-show="!myForm.fname.$error.required && myForm.fname.$error.minlength && myForm.fname.$dirty">Name cannot be less than 6 characters</span>
								</span>
						  	</div>
						  </div>
						  <!--
						  <div class="form-group">
					        <label class="col-sm-2 control-label">&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;Date of Birth </label>
					        <div class="col-sm-3 dateContainer">
					            <div class="input-group date" id="datetimePicker">
					                <input type="text" class="form-control" name="meeting" placeholder="MM/DD/YYYY" />
					                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					            </div>
					        </div>
					    </div>
					   -->
						  <!-- Working
						  <div class="form-group">

						    <label for="dob" class="col-sm-2 control-label" style="text-align: left">&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;Date of Birth </label>
						    <div class="input-group date col-sm-3" id="dob">
						      <input type="text" class="form-control"  name="dob" placeholder="mm/dd/yyyy" ng-model="dob" readonly required />
						      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
							<!--

						    <div class="col-sm-6">
						    	<h6 style="font-family: Courier; font-size: 12px">(As per Class X Certificate)</h6>
						    </div>
						 </div> -->
						  <!-- Original -->
						  <div class="form-group">
						    <label for="dob" class="col-sm-3 control-label" style="text-align: right;">&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;Date of Birth </label>
						    <div class="col-sm-4">
						      	<div class="input-group input-append date" id="datePicker">
				                	<input type="text" class="form-control" name="dob" id="dob" autocomplete="off" onkeydown="return false" ng-model="dob" placeholder="Date of Birth" required/>
				                	<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
				            	</div>
				            	<!--
						      	<input type="date" class="form-control" name="dob" id="dob" min="1985-12-31" max="1995-12-31" onkeydown="return false" ng-model="dob" required />
						      	-->
						    </div>
						    <div class="col-sm-5">
						    	<h6 style="font-family: Courier; font-size: 12px">(As per Class X Certificate)</h6>
						    </div>
						  </div>
						  <div class="form-group">
						  	<div class="col-sm-3"></div>
						  	<div class="col-sm-6">
							  	<span style="color:red" ng-show="myForm.dob.$dirty && myForm.dob.$invalid">
									<span ng-show="myForm.dob.$error.date">Invalid Date of Birth</span>
		                  		</span>
		                  	</div>
						  </div>
						  <div class="form-group">
						    <label for="contact" class="col-sm-3 control-label" style="text-align: right;">&nbsp;&nbsp;<i class="fa fa-mobile"></i>&nbsp;&nbsp;Mobile Number </label>
						    <div class="col-sm-1">
						      <!-- <input type="text" class="form-control" value="+91" readonly> -->
						      <p class="form-control-static" style="text-align: right;">+91</p>
						    </div>
						    <div class="col-sm-3">
						      <input type="number" class="form-control" name="contact" id="contact" placeholder="Contact Number" maxlength="10" ng-minlength="10" ng-maxlength="10" ng-model="contact" required />
						    </div>
						  </div>
						  <div class="form-group">
						  	<div class="col-sm-3"></div>
						  	<div class="col-sm-6">
								<span style="color:red" ng-show="myForm.contact.$dirty && myForm.contact.$invalid">
									<!-- <span style="color:red" ng-show="myForm.contact.$error.required">Mobile Number is required</span> -->
									<span style="color:red" ng-show="!myForm.contact.$error.required && (myForm.contact.$error.minlength || myForm.contact.$error.maxlength) && myForm.contact.$dirty">Invalid Mobile Number</span>
								</span>
						  	</div>
						  </div>
						  <div class="form-group">

						    <label for="contact" class="col-sm-3 control-label" style="text-align: right;">&nbsp;&nbsp;<i class="fa fa-envelope-o"></i>&nbsp;&nbsp;Email Address </label>
						    <div class="col-sm-4">
						      <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" ng-model="email" required />
						    </div>
						    <div class="col-sm-5">
						    	<h6 style="font-family: Courier; font-size: 12px">(You will recieve an OTP for verification)</h6>
						    </div>
						    <!--
						    <div class="col-sm-1" id="ver_email">
						      	<input type="button" class="form-control btn btn-success" id="email_verify" value="Verify" ng-disabled="!myForm.email.$valid" />
						    </div>
						    <div class="col-sm-2 accept_email">
						      	<input type="number" class="form-control" id="otp" ng-minlength="6" ng-maxlength="6" ng-model="otp" placeholder="Enter OTP" required=""/>
						    </div>
						    <div class="col-sm-2 accept_email">
						    	<input type="button" class="form-control btn btn-success" id="confirm_email" value="Confirm"/>
						    </div>
						    <div class="col-sm-2 accept_email">
						    	<input type="button" class="form-control btn btn-danger" id="email_reverify" value="Send Again"/>
						    </div>

						    <input type="text" ng-hide="myForm.otp_email.$valid" class="form-control" id="otp_email" name="otp_email" ng-model="otp_email" required="" unique-email/>

						    <div class="col-sm-2" id="check_otp">
						    	<i class="fa fa-check" style="color: green"></i>
						    </div>-->


						  </div>
						  <div class="form-group">
						  	<div class="col-sm-3"></div>
						  	<div class="col-sm-6">
								<span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
									<span style="color:red" ng-show="myForm.email.$error.email">Invalid email address</span>
								 </span>
						  	</div>
						  </div>
						  <div novalidate ng-app="app" ng-controller="AppCtrl">
						  <div class="form-group">
						    <label for="password1" class="col-sm-3 control-label" style="text-align: right;">&nbsp;&nbsp;<i class="fa fa-key"></i>&nbsp;&nbsp;Password </label>
						    <div class="col-sm-4">
						      <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" ng-minlength="8" ng-maxlength="20"  required   ng-model="password" ng-required ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/" />
						    </div>
						    <!-- <div class="col-sm-2" ng-show="!myForm.password.length && myForm.password.$valid">
						    	<i class="fa fa-check" style="color: green"></i>
						    </div> -->
						  </div>
						  <div class="form-group" ng-class="{'has-error':!myForm.password.$valid}">
						  	<div class="col-sm-3"></div>
						  	<div class="col-sm-6">
						  		<div class="help-inline">
						  			<!-- <span style="color:red" ng-show="myForm.password.$error.required && myForm.password.$dirty">Required</span> -->
		   							<span style="color:red" ng-show="!myForm.password.$error.required && (myForm.password.$error.minlength || myForm.password.$error.maxlength) && myForm.password.$dirty">Passwords must be between 8 and 20 characters</span>
		   							<span style="color:red" ng-show="!myForm.password.$error.required && !myForm.password.$error.minlength && !myForm.password.$error.maxlength && myForm.password.$error.pattern && myForm.password.$dirty">Must contain one lower &amp; uppercase letter, and one non-alpha character (a number or a symbol)</span>
						  		</div>
						  	</div>
						  </div>
						  <div class="form-group">
						  	<div class="control-group">
						    	<label for="password" class="col-sm-3 control-label" style="text-align: right;"><i class="fa fa-key"></i>&nbsp;&nbsp;Confirm Password </label>
							    <div class="col-sm-4">
							      <input class="form-control" type="password" name="passwordConfirmation" required ng-model="passwordConfirmation" placeholder="Re-enter Password" password-confirm match-target="password" />
							    </div>
							    <div class="col-sm-2" ng-hide="!myForm.passwordConfirmation.$valid">
							    	<i class="fa fa-check" style="color: green"></i>
							    </div>
							</div>
						  </div>
						  <div class="form-group">
						  	<div class="col-sm-3"></div>
						  	<div class="col-sm-6">
						       <div class="help-inline" ng-class="{'has-error':!myForm.passwordConfirmation.$valid}">

						          <!-- <span style="color:red" ng-show="!!myForm.passwordConfirmation.$error.isBlank && myForm.passwordConfirmation.visited">Confirmation Required</span> -->
						          <!-- <span style="color:red" ng-show="!!myForm.passwordConfirmation.$error.match && !!myForm.password.$error.isBlank">Passwords do not match</span> -->
						          <!--
						          <span class="help-block" ng-show="myForm.passwordConfirmation.$error.match">Passwords do not match.</span>
						          <span class="help-block" ng-show="myForm.passwordConfirmation.$error.required">Required</span>
						          <
						          <span style="color:red" ng-show="myForm.password_c.$error.required && myForm.password_c.$dirty">Please confirm your password.</span>
   								  <span style="color:red" ng-show="myForm.password == myForm.password_c">Passwords matches.</span> -->
						       </div>
						    </div>
						  </div>
						  </div>
						  <div class="form-group">
						  	<div class="control-group">
							    <div class="col-sm-4">

							    </div>
							</div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <div class="form-actions">
						      	<!-- <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
					            <script type="text/javascript"
					                    src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>">
					            </script></br></br> -->
						      	<input type="checkbox" required ng-model="checked" />
							     &nbsp;&nbsp;I have downloaded the Information Broucher and read all the instructions.</br></br></br>
						        <button type="submit" id="confirm" class="btn" disabled="" ng-disabled="!myForm.$valid" >Submit</button>
						        <input type="hidden" name="submitted" value="1">
						        <!-- <a class="scrollTo" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Login</a> -->
						      </div>
						    </div>
						  </div>
						</form>

					    </div>
					</div>
				</div> <!-- END panel-body -->
			</div>
		</div> <!-- END col -->
	</div> <!-- END row -->
</div> <!-- END container -->
