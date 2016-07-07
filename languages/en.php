<?php

return [
	'twilio:sms:account_sid' => 'Twilio Account SID',
	'twilio:sms:auth_token' => 'Twilio Auth Token',
	'twilio:sms:phone_number' => 'Twilio Phone Number',
	'twilio:sms:phone_number:help' => 'Phone Number for outgoing messages configured in your Twilio account. Required if Messaging Service SID is not configured',
	'twilio:sms:messaging_service_sid' => 'Twilio Messaging Service SID',
	'twilio:sms:messaging_service_sid:help' => 'Messaging Service SID configured in your Twilio account. Required if Phone Number is not configured',
	'twilio:sms:signature' => 'Signature',
	'twilio:sms:signature:help' => 'Text to be added at the end of all outgoing SMS',
];
