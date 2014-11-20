<?php

function hook_email_template_edit($vars) {
	$vars['relid'] = 154;

	//Add your PHP to an email template when sending
	$merge_fields = array();
	$merge_fields['phptest'] = 'I added this using my custom variable';

	logActivity("I am sending an email with my custom vars!");
	return $merge_fields;
	
}

add_hook("EmailPreSend",1,"hook_email_template_edit");