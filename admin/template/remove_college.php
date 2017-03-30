<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');
		
	$qu = "SELECT * FROM registered";
	$colleges = mysqli_query($seat, $qu);


	if (isset($_POST['ak']) == 1) {
		$iid = $_POST['ak'];		
		//$q = "SELECT * FROM registered WHERE id = $iid";
		//$r = mysqli_query($seat, $q);
		
		//$data = mysqli_fetch_assoc($r);
		//echo "<script>alert($iid); </script>";
		// delete college details
		$del = "DELETE FROM registered WHERE id = $iid";
		$r = mysqli_query($seat, $del);
		//header('Location: '.$_SERVER['PHP_SELF']);
		//die;
		//header('Location: ../admin');
		//header('Location: index.php');
		//echo"<script language='javascript'>
		//	$.ajax ({
		//		url: 'index.php',
		//	})
		//	</script>
		//";
		//header("Refresh:0");
		//echo "<meta http-equiv="refresh" content="5">";
		//echo '<script type="text/javascript">';
		//echo 'window.location.href="index.php";';
		//echo '</script>';
	}
	
	
?>


<script>
	 
	$(document).ready(function() {

    var table = $('#example2').DataTable();
    /*
    "tableTools": {
        "fnPreRowSelect": function ( e, nodes ) {
            if ( e.currentTarget.className.indexOf('no_select') != -1 ) {
                return false;
            }
            return true;
        }
    }
    */
    var c_id = 0;
    document.getElementById("select").disabled = true;
    $('#example2 tbody').on( 'click', 'tr', function () {

    	/*chnages made here
    	if (table.row(this, { selected: true }).any()) {                
            if (!condition) table.row(this).deselect();
        }
    	*/
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');		            
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        var data = table.row('.selected').data();
        if(typeof data === 'undefined'){
		    document.getElementById("select").disabled = true;
		}
		else {
			console.log(data);
	        c_id = data[0];
	        //aForm.ak.$setViewValue(c_id);
	        //document.aForm.ak.value = c_id;
	        document.getElementById('ak').value = c_id;
	        console.log(c_id);
	        //if()


	        document.getElementById("select").disabled = false;
		}
    } );
} );
</script>
		
		
<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-11">
			<div class="panel panel-info">
				<div class="panel-heading"><strong><i class="fa fa-table"></i>&nbsp;&nbsp; Remove College </strong></div> <!-- END panel-heading -->
				<div class="panel-body">
					<table id="example2" class="display" cellspacing="0" width="100%">
				        
				        <thead>
				            <tr>
				            	<td>S.No</td>
				                <th>College Name</th>
				                <th>Course</th>
				                <th>Department</th>
				                <th>Course Name</th>
				                <!-- <th>General Intake</th> -->
				                <th>General Available / Intake</th>
				                <!--<th>OBC Intake</th> -->
				                <th>OBC Available / Intake</th>
				                <!--<th>SC/ST Intake</th> -->
				                <th>SC/ST Available / Intake</th>
				                <!--<th>PH Intake</th> -->
				                <th>PH Available / Intake</th>
				            </tr>
				        </thead>
				        <tfoot>
				            <tr>
				            	<td>S.No</td>
				                <th>College Name</th>
				                <th>Course</th>
				                <th>Department</th>
				                <th>Course Name</th>
				                <!-- <th>General Intake</th> -->
				                <th>General Available / Intake</th>
				                <!-- <th>OBC Intake</th> -->
				                <th>OBC Available / Intake</th>
				                <!-- <th>SC/ST Intake</th> -->
				                <th>SC/ST Available / Intake</th>
				                <!-- <th>PH Intake</th> -->
				                <th>PH Available / Intake</th>
				            </tr>
				        </tfoot>
				        <tbody>				        	
				        	<?php
							foreach($colleges as $college) {
							
							?>
							<tr>
								<td><?php echo $college['id']; ?></td>
								<td><?php echo $college['colname']; ?></td>
							    <td><?php echo $college['course']; ?></td>
							    <td><?php echo $college['dept']; ?></td>
							    <td><?php echo $college['coursename']; ?></td>
							    <!-- <td><?php //echo $match['intake']; ?></td> -->
							    <td><?php echo $college['available'].'/'.$college['intake']; ?></td>
							    <!-- <td><?php //echo $match['intake_obc']; ?></td> -->
							    <td><?php echo $college['available_obc'].'/'.$college['intake_obc']; ?></td>
							    <!-- <td><?php //echo $match['intake_s']; ?></td> -->
							    <td><?php echo $college['available_s'].'/'.$college['intake_s']; ?></td>
							    <!-- <td><?php //echo $match['intake_ph']; ?></td> -->
							    <td><?php echo $college['available_ph'].'/'.$college['intake_ph']; ?></td>
							</tr>
							<?php 
							}
							?>        
				        </tbody>
					</table>
				</br>
				<form class="form form-horizontal" id="regg" autocomplete="on" method="post" name="aForm" acton="remove_college.php" novalidate>
					<div class="form-group" align="right">
						<input type="hidden" id="ak" name="ak" value="">
						<button type="submit" id="select" class="btn btn-danger">Remove</button>&nbsp;&nbsp;&nbsp;&nbsp;
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
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