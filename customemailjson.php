<?php

#Add your vars for connection here
$url = 'https://www.thespout.ca/portal/includes/api.php';
$user = 'whmcs';
$pass = 'WHMCS3y3s0nly!';

#Build your API call
$postfields = array();
$postfields['username'] = $user;
$postfields['password'] = md5($pass);
$postfields['action'] = 'sendemail';
$postfields['customtype'] = 'invoice';
$postfields['id'] = '22928';
$postfields['customsubject'] = 'Successful Topup Charge - WHMCS TEST';
$postfields['custommessage'] = 'Hello, <br /> <br />This is an informational email to let you know that Spout has succeeded - WHMCS TEST';
#$postfields['customvars'] = base64_encode(serialize(array('invoicenumber'=>'$id','topupamount'=>'100')));
$postfields['responsetype'] = 'json';

$query_string = '';
foreach ($postfields AS $k=>$v) $query_string .= '$k='.urlencode($v).'&';

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

 $arr = json_decode($jsondata);

 print_r($arr);

 #Debug stuff

 echo "<textarea rows=50 cols=100>Request: ".print_r($postfields,true);
 echo "\nResponse: ".htmlentities($jsondata)."\n\nArray: ".print_r($arr,true);
 echo "</textarea>";