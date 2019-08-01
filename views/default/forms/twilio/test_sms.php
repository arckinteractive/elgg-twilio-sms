<?php

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('twilio:sms:to'),
	'#help' => elgg_echo('twilio:sms:to:help'),
	'required' => true,
	'name'=> 'to',
]);

echo elgg_view_field([
	'#type' => 'plaintext',
	'#label' => elgg_echo('twilio:sms:text'),
	'required' => true,
	'name' => 'text',
	'rows' => 2,
]);

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('twilio:sms:send'),
]);

elgg_set_form_footer($footer);