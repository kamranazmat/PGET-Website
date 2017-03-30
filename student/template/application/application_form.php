<script>
	$(document).ready(function() {				
		$('.datePicker').datepicker({
            format: 'M, yyyy',
            startDate: '01/2000',
            endDate: '08/2016'
        });
		/*
        var myImage = document.getElementById("myImage");

		myImage.onchange = function() {
			alert();
		    if(this.files[0].size > 307200){
		       //alert("File is too big!");
		       toastr.error('File is too big!');
		       this.value = "";
		    };
		};*/
    });
</script>

<div ng-app="mApp">
	<div ng-controller="homesCtrl">
		<?php
			
			if(isset($_POST['submits']) == 1) {
				//echo $_POST['myImage'];
				//echo $_POST['mySignature'];

				$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));								
				$cur_time = $date->format('d-m-Y H:i:s a');

				$uid = $data['u_id'];
			    $i = sha1($uid.$cur_time);
			    
			    $imageTmpName = $_FILES['myImage']['tmp_name'];
				$signatureTmpName = $_FILES['mySignature']['tmp_name'];
			    // 
			    $target_path1 = $_SERVER['DOCUMENT_ROOT']."/images/photo/".$i.".jpg";
				move_uploaded_file($imageTmpName, $target_path1);
				chmod($target_path1, 0777);
				
				//$target_path2 = "/opt/lampp/htdocs/images/signature/".$i.".jpg";
				$target_path2 = $_SERVER['DOCUMENT_ROOT']."/images/signature/".$i.".jpg";
				move_uploaded_file($signatureTmpName, $target_path2);
				chmod($target_path2, 0777);
				
				 
					
				//$q = "INSERT INTO application (u_id, nationality, hstate, gender, category, ph, aadhar, houseno, locality, village, dist, state, pin, boardten, yearten, divisionten, marksten, boardtwelve, yeartwelve, divisiontwelve, markstwelve, boardgraduation, yeargraduation, divisiongraduation, marksgraduation, myImage, mySignature) VALUES ('$uid', '$_POST[nationality]', '$_POST[hstate]', '$_POST[gender]', '$_POST[category]', '$_POST[ph]', '$_POST[aadhar]', '$_POST[houseno]', '$_POST[locality]', '$_POST[village]', '$_POST[dist]', '$_POST[state]', '$_POST[pin]', '$_POST[boardten]', '$_POST[yearten]', '$_POST[divisionten]', '$_POST[marksten]', '$_POST[boardtwelve]', '$_POST[yeartwelve]', '$_POST[divisiontwelve]', '$_POST[markstwelve]', '$_POST[boardgraduation]', '$_POST[yeargraduation]', '$_POST[divisiongraduation]', '$_POST[marksgraduation]', '$_POST[myImage]', '$_POST[mySignature]')";
				$q = "INSERT INTO application (u_id, nationality, hstate, gender, category, ph, aadhar, houseno, locality, village, dist, state, pin, boardten, yearten, divisionten, marksten, boardtwelve, yeartwelve, divisiontwelve, markstwelve, boardgraduation, yeargraduation, divisiongraduation, marksgraduation, time, pic) VALUES ('$uid', '$_POST[nationality]', '$_POST[hstate]', '$_POST[gender]', '$_POST[category]', '$_POST[ph]', '$_POST[aadhar]', '$_POST[houseno]', '$_POST[locality]', '$_POST[village]', '$_POST[dist]', '$_POST[state]', '$_POST[pin]', '$_POST[boardten]', '$_POST[yearten]', '$_POST[divisionten]', '$_POST[marksten]', '$_POST[boardtwelve]', '$_POST[yeartwelve]', '$_POST[divisiontwelve]', '$_POST[markstwelve]', '$_POST[boardgraduation]', '$_POST[yeargrad]', '$_POST[divisiongraduation]', '$_POST[marksgraduation]', '$cur_time', '$i')";
				//$q = "INSERT INTO application (u_id, nationality, hstate, gender, category, ph, aadhar) VALUES ('$uid', '$_POST[nationality]', '$_POST[hstate]', '$_POST[gender]', '$_POST[category]', '$_POST[ph]', '$_POST[aadhar]')";
				$r = mysqli_query($dbc, $q);
				if($r) {							
					echo"<script language='javascript'>
					$.ajax ({
  						url: 'logout.php',
  					})

					bootbox.dialog({
						  message: 'Keep visiting the site for updates.',
						  title: '<h3 style=\'color: green\'>Application Successful</h3>',
						  closeButton: false,
						  buttons: {
						    ok: {
						      label: 'Logout',
						      className: 'btn-default',
						      callback: function() {
						        window.open('logout.php','_self');
						      }
						    }
						  }
						});
				</script>";
				//unset($_SESSION['username']); // Delete the username key
				}
			}			 
		?>
	
	<form class="form form-horizontal" id="reg" autocomplete="on" method="post" name="aForm" action="apply.php" enctype="multipart/form-data" novalidate>
	
	
	<div class="col-md-12" align="left">
	  <div class="panel panel-info">
	  	<div class="panel-heading">
	  		<h5><i class="fa fa-users"></i>&nbsp;&nbsp;Personal Details</h5>
	  	</div>
	    <div class="panel-body">    								  
			  <div class="form-group">
			  	<div class="col-sm-2"></div>
			    <label for="cname" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;Candidate Name </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" readonly="" id="cname" value="<?php echo $data['cname']; ?>"/>
			    </div>			    					    
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-2"></div>				  	
			    <label for="mname" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-female"></i>&nbsp;&nbsp;Mother's Name </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" readonly="" id="mname" value="<?php echo $data['mname']; ?>"/>					      
			    </div>			    
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-2"></div>
			    <label for="fname" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-male"></i>&nbsp;&nbsp;Father's Name </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" readonly="" id="fname" value="<?php echo $data['fname']; ?>" />
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-2"></div>
			    <label for="dob" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;Date of Birth </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" readonly id="dob" value="<?php echo $data['dob']; ?>" />
			    </div>
			  </div>		  
			  <div class="form-group">
			  	<div class="col-sm-2"></div>
			    <label for="nationality" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-flag-o"></i>&nbsp;&nbsp;Nationality </label>
			    <div class="col-sm-4">
			      <select class="form-control" name="nationality" ng-model="nationality" required>
					<option selected="selected" value="">---Select---</option>
					<option value="Indian">Indian</option>
					<option value="OCI">OCI</option>
				  </select>			      
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-1"></div>
			    <label for="hstate" class="col-sm-4 control-label" style="text-align: right"><i class="fa fa-map-o"></i>&nbsp;&nbsp;State of Domicile</label>
			    <div class="col-sm-4">
			      <select class="form-control" name="hstate" ng-model="hstate" required>
					<option selecte="selected" value="">---Select---</option>
					<option value="Andaman & Nicobar Islands">Andaman &amp; Nicobar Islands</option>
					<option value="Andhra Pradesh">Andhra Pradesh</option>
					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					<option value="Assam">Assam</option>
					<option value="Bihar">Bihar</option>
					<option value="Chandigarh">Chandigarh</option>
					<option value="Chhatisgarh">Chhatisgarh</option>
					<option value="Dadra & Nagar Haveli">Dadra &amp; Nagar Haveli</option>
					<option value="Daman & Diu">Daman &amp; Diu</option>
					<option value="Delhi">Delhi</option>
					<option value="Goa">Goa</option>
					<option value="Gujarat">Gujarat</option>
					<option value="Haryana">Haryana</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option>
					<option value="Jammu and Kashmir">Jammu and Kashmir </option>
					<option value="Jharkhand">Jharkhand</option>
					<option value="Karnataka">Karnataka</option>
					<option value="Kerala">Kerala</option>
					<option value="Lakshadweep">Lakshadweep</option>
					<option value="Madhya">Madhya Pradesh</option>
					<option value="Maharashtra">Maharashtra</option>
					<option value="Manipur">Manipur</option>
					<option value="Meghalaya">Meghalaya</option>
					<option value="Mizoram">Mizoram</option>
					<option value="Nagaland">Nagaland</option>
					<option value="Odisha">Odisha</option>
					<option value="Puducherry">Puducherry</option>
					<option value="Punjab">Punjab</option>
					<option value="Rajasthan">Rajasthan</option>
					<option value="Sikkim">Sikkim</option>
					<option value="Tamil Nadu">Tamil Nadu</option>
					<option value="Telangana">Telangana</option>
					<option value="Tripura">Tripura</option>
					<option value="Uttar Pradesh">Uttar Pradesh</option>
					<option value="Uttarakhand">Uttarakhand</option>
					<option value="West Bengal">West Bengal</option>
				  </select>			      
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-2"></div>
			    <label for="gender" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-transgender-alt"></i>&nbsp;&nbsp;Gender </label>
			    <div class="col-sm-4">
			      <select class="form-control" name="gender" ng-model="gender" required>
					<option selected="selected" value="">---Select---</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Transgender">Transgender</option>	
				  </select>			      
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-2"></div>
			    <label for="category" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-users"></i>&nbsp;&nbsp;Category </label>
			    <div class="col-sm-4">
			      <select class="form-control" name="category" ng-model="category" required>
					<option selected="selected" value="">--Select--</option>
					<option value="SC/ST">SC/ST</option>
					<option value="OBC">OBC</option>
					<option value="General">General</option>
				  </select>			      
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-1"></div>
			    <label for="ph" class="col-sm-4 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-gift"></i>&nbsp;&nbsp;Physically handicapped </label>
			    <div class="col-sm-4">
			      <select class="form-control" name="ph" ng-model="ph" required>
					<option selected="selected" value="">--Select--</option>
					<option value="No">No</option>
					<option value="Yes">Yes</option>
				  </select>	
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-1"></div>				  	
			    <label for="aadhar" class="col-sm-4 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-credit-card"></i>&nbsp;&nbsp;Aadhar Card Number </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="aadhar" id="aadhar" placeholder="Optional"/>					      
			    </div>			    
			  </div>			 
		</div>
		</div>
	</div>
	
	<br>
	 
	
	<div class="col-md-12" align="left">
	  <div class="panel panel-info">
	  	<div class="panel-heading">
	  		<h5><i class="fa fa-tty"></i>&nbsp;&nbsp;Contact Details (Only provide your own or parent's contact details)</h5>
	  	</div>
	    <div class="panel-body">    								  
			  <div class="form-group">
			  	<div class="col-sm-2"></div>
			    <label for="houseno" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-home"></i>&nbsp;&nbsp;House No. / Block </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="houseno" id="houseno" ng-model="houseno" required />
			    </div>			    					    
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-2"></div>				  	
			    <label for="locality" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-location-arrow"></i>&nbsp;&nbsp;Locality </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="locality" id="locality" ng-model="locality" required />					      
			    </div>			    
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-2"></div>
			    <label for="village" class="col-sm-3 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-building"></i>&nbsp;&nbsp;Village / Town / City </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="village" id="village" ng-model="village" required />
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-3"></div>
			    <label for="dist" class="col-sm-2 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-map-marker"></i>&nbsp;&nbsp;District </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="dist" id="dist" ng-model="dist" required />
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-1"></div>
			    <label for="state" class="col-sm-4 control-label" style="text-align: right"><i class="fa fa-map-o"></i>&nbsp;&nbsp;State </label>
			    <div class="col-sm-4">
			      <select class="form-control" name="state" ng-model="state" required>
					<option selecte="selected" value="">---Select---</option>
					<option value="Andaman & Nicobar Islands">Andaman &amp; Nicobar Islands</option>
					<option value="Andhra Pradesh">Andhra Pradesh</option>
					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					<option value="Assam">Assam</option>
					<option value="Bihar">Bihar</option>
					<option value="Chandigarh">Chandigarh</option>
					<option value="Chhatisgarh">Chhatisgarh</option>
					<option value="Dadra & Nagar Haveli">Dadra &amp; Nagar Haveli</option>
					<option value="Daman & Diu">Daman &amp; Diu</option>
					<option value="Delhi">Delhi</option>
					<option value="Goa">Goa</option>
					<option value="Gujarat">Gujarat</option>
					<option value="Haryana">Haryana</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option>
					<option value="Jammu and Kashmir">Jammu and Kashmir </option>
					<option value="Jharkhand">Jharkhand</option>
					<option value="Karnataka">Karnataka</option>
					<option value="Kerala">Kerala</option>
					<option value="Lakshadweep">Lakshadweep</option>
					<option value="Madhya">Madhya Pradesh</option>
					<option value="Maharashtra">Maharashtra</option>
					<option value="Manipur">Manipur</option>
					<option value="Meghalaya">Meghalaya</option>
					<option value="Mizoram">Mizoram</option>
					<option value="Nagaland">Nagaland</option>
					<option value="Odisha">Odisha</option>
					<option value="Puducherry">Puducherry</option>
					<option value="Punjab">Punjab</option>
					<option value="Rajasthan">Rajasthan</option>
					<option value="Sikkim">Sikkim</option>
					<option value="Tamil Nadu">Tamil Nadu</option>
					<option value="Telangana">Telangana</option>
					<option value="Tripura">Tripura</option>
					<option value="Uttar Pradesh">Uttar Pradesh</option>
					<option value="Uttarakhand">Uttarakhand</option>
					<option value="West Bengal">West Bengal</option>
				  </select>			      
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-3"></div>
			    <label for="pin" class="col-sm-2 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-map-pin"></i>&nbsp;&nbsp;Pin Code</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="pin" id="pin" ng-minlength="6" ng-maxlength="6" ng-model="pin" required />
			    </div>
			  
			  	<div class="col-sm-3">
					<span style="color:red" ng-show="aForm.pin.$dirty && aForm.pin.$invalid">
						<span style="color:red" ng-show="!aForm.pin.$error.required && (aForm.pin.$error.minlength || aForm.pin.$error.maxlength) && aForm.pin.$dirty">Invalid Pin Code</span>							
					</span>
			  	</div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-3"></div>
			    <label for="contact" class="col-sm-2 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-mobile"></i>&nbsp;&nbsp;Mobile Number </label>
			    
			    <div class="col-sm-4">
			      <input type="number" class="form-control" readonly="" id="contact" value="<?php echo $data['contact']; ?>" />
			    </div>
			  </div>		  
			  <div class="form-group">
			  	<div class="col-sm-3"></div>
			    <label for="contact" class="col-sm-2 control-label" style="text-align: right">&nbsp;&nbsp;<i class="fa fa-envelope-o"></i>&nbsp;&nbsp;Email Address </label>
			    <div class="col-sm-4">
			      <input type="email" class="form-control" readonly="" id="email" value="<?php echo $data['email']; ?>" />
			    </div>
			  </div>		  		
		   </div>
		</div>
	</div>
	<br>
	<div class="col-md-12" align="left">
	  <div class="panel panel-info">
	  	<div class="panel-heading">
	  		<h5><i class="fa fa-certificate"></i>&nbsp;&nbsp;Qualification Details</h5>
	  	</div>
	    <div class="panel-body">    								  
		  <table class="table table-striped table-bordered table-condensed">
		  	<thead>
		  		<tr>
		  		   <td>S.No.</td>
		           <td>Qualification</td>
		           <td>Board / Universiy</td>			   
				   <td>Month and Year</td>	
		           <td>Division</td>
				   <td>Percentage of Marks / GPA</td>
		        </tr>
		  	</thead>
		    <tbody>
		        <tr>
		           <td><p class="form-control-static" style="text-align: right;">1.</p></td>	
		           <td><p class="form-control-static" style="text-align: right;">10th</p></td>
		           <td><input type="text" class="form-control" name="boardten" id="boardten" ng-model="boardten" required/></td>		           
		           <td><input type="text" class="form-control datePicker" name="yearten" onkeydown="return false" id="yearten" ng-model="yearten" required/></td>
		           <td><input type="text" class="form-control" name="divisionten" id="divisionten" ng-model="divisionten" required/></td>
		           <td><input type="text" class="form-control" name="marksten" id="marksten" ng-model="marksten" required/></td>
		        </tr>
		        <tr>
		           <td><p class="form-control-static" style="text-align: right;">2.</p></td>
		           <td><p class="form-control-static" style="text-align: right;">12th</p></td>
		           <td><input type="text" class="form-control" name="boardtwelve" id="boardtwelve" ng-model="boardtwelve" required/></td>
		           <td><input type="text" class="form-control datePicker" name="yeartwelve" onkeydown="return false" id="yeartwelve" ng-model="yeartwelve" required/></td>
		           
		           <td><input type="text" class="form-control" name="divisiontwelve" id="divisiontwelve" ng-model="divisiontwelve" required/></td>
		           <td><input type="text" class="form-control" name="markstwelve" id="markstwelve" ng-model="markstwelve" required/></td>
		        </tr>
		        <tr>
		           <td><p class="form-control-static" style="text-align: right;">3.</p></td>	 
				   <td><p class="form-control-static" style="text-align: right;">Graduation</p></td>
		           <td><input type="text" class="form-control" name="boardgraduation" id="boardgrad" ng-model="boardgrad" required/></td>
		           <td><input type="text" class="form-control datePicker" name="yeargrad" onkeydown="return false" id="yeargrad" ng-model="yeargrad" required/></td>
		           <!-- <td><input type="month" class="form-control" name="yeargraduation" id="yeargrad" max="2016-12" min="2008-12" onkeydown="return false" ng-model="yeargrad" required/></td>-->
		           <td><input type="text" class="form-control" name="divisiongraduation" id="divisiongrad"  ng-model="divisiongrad" required/></td>
		           <td><input type="text" class="form-control" name="marksgraduation" id="marksgrad" ng-model="marksgrad" required/></td>
		        </tr>	        
		    </tbody>
		  </table>
		</div>
		</div>
	</div>
	<br>
	<div class="col-md-12" align="left">
	  <div class="panel panel-info">
	  	<div class="panel-heading">
	  		<h5><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Upload Image and Signature</h5>
	  	</div>
	  	<script>


	  		function readURL1(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		
		            reader.onload = function (e) {
		                $('#ima')
		                    .attr('src', e.target.result)
		                    .width(150)
		                    .height(200);
		            };
		            		
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		    function readURL2(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		
		            
		            reader.onload = function (e) {
		                $('#sig')
		                    .attr('src', e.target.result)
		                    .width(150)
		                    .height(50);
		            };
		
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
	  	</script>
	  		
	    <div class="panel-body">
	       <div class="col-md-3">
	       		<div class="panel panel-default">
				  	<h4 align="center" style="font: bold">Passport Size Photo</h4>
				    <div class="panel-body" align="center">
				    	<img id="ima" class="img-rounded" src="#" alt="<?php echo $data['cname']; ?>" /> 
				    </div>
				</div>
				<input type='file' id="myImage" name="myImage" ng-model="myImage" ngf-select ngf-max-size="2MB" required accept="image/jpeg" onchange="readURL1(this);" />
				<span style="color:red" ng-show="aForm.myImage.$error.maxSize">File too large {{picFile.size / 1000000|number:1}}MB: max 2M</span>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-3"></div>
			<div class="col-md-3">
	       		<div class="panel panel-default">
	       			<h4 align="center" style="font: bold">Signature</h4>
				    <div class="panel-body" align="center">
				    	<img id="sig" class="img-rounded" src="#" alt="<?php echo $data['cname']; ?>"/> 
				    </div>
				</div>			
	      	      
				<input type='file' id="mySignature" name="mySignature" ng-model="mySignature"  ngf-select ngf-max-size="2MB" required accept="image/jpeg" onchange="readURL2(this);" />
				<span style="color:red" ng-show="aForm.mySignature.$error.maxSize">File too large {{picFile.size / 1000000|number:1}}MB: max 2M</span>
			</div>
		</div>
	  </div>
	</div> 
	 <br>
	<div class="col-md-12" align="left">
	  <div class="panel panel-info">
	  	<div class="panel-heading">
	  		<h5><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Declaration</h5>
	  	</div>
	    <div class="panel-body">    								  
		    <input type="checkbox" required ng-model="checked" />						      
			&nbsp;&nbsp;I hereby declare that I have read and understand the conditions of eligibility for the programme for which I am appearing in the PGET 2016 examination. I fulfill the minimum eligible criteria and I have provided the necessary information in this regard. In the event of information being found incorrect or misleading, my candidature shall be liable to cancellation at any time and I shall not entitled to get refund of any fee paid by me. Further, I have carefully read all the instructions and accept them and shall not rise any dispute over the same.</br></br></br>
			<div align="right">				 
				<button type="submit" id="confirm" class="btn" ng-disabled="!aForm.$valid">Submit</button>
		    	<input type="hidden" name="submits" value="1">
			</div>
		</div>
	  </div>
	 </div>	 
	</form>
  </div>
</div>   
