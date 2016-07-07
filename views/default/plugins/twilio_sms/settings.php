<?php

$entity = elgg_extract('entity', $vars);

echo elgg_view_input('text', [
	'name' => 'params[account_sid]',
	'value' => $entity->account_sid,
	'label' => elgg_echo('twilio:sms:account_sid'),
	'required' => true,
]);

echo elgg_view_input('text', [
	'name' => 'params[auth_token]',
	'value' => $entity->auth_token,
	'label' => elgg_echo('twilio:sms:auth_token'),
	'required' => true,
]);

echo elgg_view_input('text', [
	'name' => 'params[phone_number]',
	'value' => $entity->phone_number,
	'label' => elgg_echo('twilio:sms:phone_number'),
	'help' => elgg_echo('twilio:sms:phone_number:help'),
]);

echo elgg_view_input('text', [
	'name' => 'params[messaging_service_sid]',
	'value' => $entity->messaging_service_sid,
	'label' => elgg_echo('twilio:sms:messaging_service_sid'),
	'help' => elgg_echo('twilio:sms:messaging_service_sid:help'),
]);

echo elgg_view_input('text', [
	'name' => 'params[signature]',
	'value' => $entity->signature,
	'label' => elgg_echo('twilio:sms:signature'),
	'help' => elgg_echo('twilio:sms:signature:help'),
]);
