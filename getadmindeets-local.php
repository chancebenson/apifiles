<?php

#Don't forget init ;)
include ('init.php');

#This is local so it makes it easy, just build your call
$command = 'getadmindetails';
$adminuser = 'whmcs_support';

#That was easy and this call is already gonna return XML yay
#Now send the call
$results = localAPI($command,$values,$adminuser);