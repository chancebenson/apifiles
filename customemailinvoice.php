<?php

require 'init.php';

#Build your vars
$command = 'sendemail';
$adminuser = 'put your admin user here';
$values['customtype'] = 'invoice';
$values['id'] = '22928'; #this is the invoice you provided in your test call
$values['customsubject'] = 'Successful Topup Charge';
$values['custommessage'] = 'Hello, <br /> <br />This is an informational email to let you know that Spout has succeeded!';

#Now make your call
logActivity('Invoice ID: $id custom email was sent successfully');

echo '<pre>'.print_r($values,1).'</pre>';

$results = localAPI($command,$values,$adminuser);

echo '<pre>'.print_r($results,1).'</pre>';