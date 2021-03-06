<?php
#Call it for activity logging :)
include ('../init.php');

#Create your Vars
$url = 'http://whmcstest.biz/includes/api.php';
$user = 'api';
$pass = 'apitest';
$id = '3';

#Build your call
$postfields = array();
$postfields['username'] = $user;
$postfields['password'] = md5($pass);
$postfields['action'] = 'sendemail';
$postfields['id'] = $id;
$postfields['customtype'] = 'invoice';
$postfields['customsubject'] = 'WHMCS Sending Custom Invoice Email';
$postfields['custommessage'] = 'Here is the WHMCS invoice I created for testing';
$postfields['responsetype'] = 'json';

#Get in the activity log
logActivity('I just sent out a custom invoice for Invoice ID: $id');

#Cross your fingers and let the magic begin :D
$query_string = "";
foreach ($postfields AS $k=>$v) $query_string .= "$k=".urlencode($v)."&";
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$jsondata = curl_exec($ch);
if (curl_error($ch)) die("Connection Error: ".curl_errno($ch).' - '.curl_error($ch));
curl_close($ch);
 
$arr = json_decode($jsondata); # Decode JSON String
 
#Now show me the goodies ;-)
echo "<textarea rows=50 cols=100>Request: ".print_r($postfields,true);
echo "\nResponse: ".htmlentities($jsondata)."\n \nArray: ".print_r($arr,true);
echo "</textarea>";