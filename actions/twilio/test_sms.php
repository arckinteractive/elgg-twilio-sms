<?php

$to = get_input('to');
$text = get_input('text');

$result = elgg_send_sms($to, $text);

if (!$result) {
	return elgg_error_response(elgg_echo('twilio:sms:error'));
}

return elgg_ok_response('', elgg_echo('twilio:sms:success'));