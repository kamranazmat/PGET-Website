<?php

include($_SERVER['DOCUMENT_ROOT'] . '/student/config/connection.php');

require_once('./vendor/autoload.php');
// Import the Postmark Client Class.
use Postmark\PostmarkClient;

// Create Client
$client = new PostmarkClient("12500e30-8882-4ec4-a74c-f88c2928fbe6");


function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$new = randomPassword();

// Make a request

$sendResult = $client->sendEmailWithTemplate(
  "kamran@kamranazmat.com",
  "$_POST[new_pwd]", 
  534403,
  [
  "name" => "$data[cname]",
  "u_id" => "$new",
  "action_url" => "action_url_Value",
]);

/*
$sendResult = $client->sendEmailWithTemplate(
  "kamran@kamranazmat.com",
  "azmat.kamran@gmail.com", 
  534403,
  [
  "name" => "Kamran Azmat",
  "u_id" => "20150002",
  "action_url" => "action_url_Value",
]);*/

$q = "UPDATE registered SET password = sha1('$new') WHERE email = '$_POST[new_pwd]';";
$r = mysqli_query($dbc, $q);	
 
?>



