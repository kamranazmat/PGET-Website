<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/student/template/vendor/autoload.php');
// Import the Postmark Client Class.
use Postmark\PostmarkClient;

// Create Client
$client = new PostmarkClient("12500e30-8882-4ec4-a74c-f88c2928fbe6");

// Make a request
$sendResult = $client->sendEmailWithTemplate(
  "kamran@kamranazmat.com",
  "$da[email];", 
  489322,
  [
  "name" => "$da[cname]",
  "product_name" => "West Bengal University of Technology",
  "u_id" => "$da[u_id]",									  
  "sender_name" => "kamran@kamranazmat.com",
  "product_address_line1" => "BF - 142, Sector 1",
  "product_address_line2" => "Salt Lake, Kolkata",
]);
 
?>



