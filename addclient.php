<?php

#Create your Vars
$url = 'http://whmcstest.biz/includes/api.php';
$user = 'api';
$pass = 'apitest';

#Build your call
$postfields = array();
$postfields['username'] = $user;
$postfields['password'] = md5($pass);
$postfields['action'] = 'addclient';
$postfields['firstname'] = 'Demo';
$postfields['lastname'] = 'Test';
$postfields['email'] = 'demowhmcs@client.tld';
$postfields['address1'] = '123 Any Street';
$postfields['city'] = 'Houston';
$postfields['state'] = 'Texas';
$postfields['postcode'] = '77098';
$postfields['country'] = 'US';
$postfields['phonenumber'] = '7135551234';
$postfields['password2'] = 'whmcsdemotest';
$postfields['cardtype'] = 'visa';
$postfields['cardnum'] = '4012888818888888';
$postfields['expdate'] = '0916';
$postfields['responsetype'] = 'json';

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