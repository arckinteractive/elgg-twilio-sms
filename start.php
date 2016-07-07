<?php

/**
 * Twilio SMS Service
 *
 * @author Ismayil Khayredinov <info@arckinteractive.com>
 * @copyright Copyright (c) 2015, Ismayil Khayredinov
 */
require_once __DIR__ . '/autoloader.php';

elgg_register_event_handler('init', 'system', 'twilio_sms_init');

/**
 * Initialize the plugin
 * @return void
 */
function twilio_sms_init() {
	elgg_register_plugin_hook_handler('send', 'sms', 'twilio_sms_send');
}

/**
 * Sends SMS using Twilio
 *
 * @param string $hook   "send"
 * @param string $type   "sms"
 * @param bool   $return Was SMS sent?
 * @param array  $params Hook params
 * @return bool
 */
function twilio_sms_send($hook, $type, $return, $params) {
	if ($return === true) {
		// other plugin has already sent the SMS
		return;
	}

	$account_sid = elgg_get_plugin_setting('account_sid', 'twilio_sms');
	$auth_token = elgg_get_plugin_setting('auth_token', 'twilio_sms');
	$phone_number = elgg_get_plugin_setting('phone_number', 'twilio_sms');
	$messaging_service_sid = elgg_get_plugin_setting('messaging_service_sid', 'twilio_sms');

	if (!$account_sid || !$auth_token) {
		return;
	}

	if (!$phone_number && !$messaging_service_sid) {
		if (!elgg_admin_notice_exists('twilio_number')) {
			elgg_add_admin_notice('twilio_number', 'Twilio requires either an outgoing phone number or a messaging service ID to work');
		}
	}

	$to = elgg_extract('to', $params);
	$text = elgg_extract('text', $params);
	$signature = elgg_get_plugin_setting('signature', 'twilio_sms');
	if ($signature) {
		$text .= " $signature";
	}

	$client = new Services_Twilio($account_sid, $auth_token);

	$options = [
		'To' => $to,
		'Body' => $text,
	];

	if ($messaging_service_sid) {
		$options['MessagingServiceSid'] = $messaging_service_sid;
	} else {
		$options['From'] = $phone_number;
	}

	try {
		$client->account->messages->create($options);
		return true;
	} catch (Exception $ex) {
		error_log($ex->getMessage());
	}
}
