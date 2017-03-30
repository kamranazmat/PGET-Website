<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/student/template/vendor/autoload.php');
// Import the Postmark Client Class.
use Postmark\PostmarkClient;

// Create Client
$client = new PostmarkClient("12500e30-8882-4ec4-a74c-f88c2928fbe6");


$sendResult = $client->sendEmailWithTemplate(
  "kamran@kamranazmat.com",
  "$_POST[mail]", 
  580663,
  [
  "name" => "$_POST[name]",
]);

echo $sendResult;
?>

