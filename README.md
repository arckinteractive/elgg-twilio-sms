Twilio SMS provider
===================
![Elgg 2.1](https://img.shields.io/badge/Elgg-2.1.x-orange.svg?style=flat-square)

## Features

 * Send SMS using Twilio API

### Usage

This plugin provides a handler for SMS notification delivery for `notifications_sms` plugin.

It can also send SMS messages programmatically:

```php
notify_user($member->guid, 0, $subject, $message, [
		'action' => 'something',
		'object' => $entity,
		'url' => $entity->getURL(),
		'summary' => $summary,
		'sms' => $sms, // Provide custom text of the SMS notification, if not provided will fallback to 'summary' and then to 'subject'
], ['email', 'site', 'sms']);
```

```php
elgg_send_sms('+1123434343', 'Hello there');
```