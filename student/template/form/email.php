<?php

require_once('./vendor/autoload.php');
// Import the Postmark Client Class.
use Postmark\PostmarkClient;

// Create Client
$client = new PostmarkClient("12500e30-8882-4ec4-a74c-f88c2928fbe6");


$str = '';
for($i=6;$i>0;$i--) {
    $str = $str.(rand(0,9));
}

// Make a request
$sendResult = $client->sendEmailWithTemplate(
  "kamran@kamranazmat.com",
  "$_POST[email]", 
  529662,
  [
  "otp" => "$str",
]);

$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));								
$cur_time = $date->format('d-m-Y H:i:s a');

$email_exist = "SELECT * FROM email WHERE email='$_POST[email]'";
$email_r_e = mysqli_query($dbc, $email_exist);
$num_email_e = mysqli_num_rows($email_r_e);
		
	
if($num_email_e == 1) {
	$q = "UPDATE email SET tmp = '$str', time = '$cur_time' WHERE email = '$_POST[email]';";
	$r = mysqli_query($dbc, $q);			
}
else {
	$q = "INSERT INTO email (email, tmp, time) VALUES ('$_POST[email]', '$str', '$cur_time')";
	$r = mysqli_query($dbc, $q);			
}
	 


 
?>



