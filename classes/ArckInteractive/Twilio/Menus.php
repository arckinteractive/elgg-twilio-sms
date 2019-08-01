<?php

namespace ArckInteractive\Twilio;

class Menus {

	public static function setupPageMenu($hook, $type, $return, $params) {
		if (elgg_in_context('admin')) {
			$return[] = \ElggMenuItem::factory([
				'name' => 'twilio:settings',
				'section' => 'twilio',
				'text' => elgg_echo('twilio:settings'),
				'href' => 'admin/plugin_settings/twilio_sms',
			]);

			$return[] = \ElggMenuItem::factory([
				'name' => 'twilio:test',
				'section' => 'twilio',
				'text' => elgg_echo('admin:twilio:test_sms'),
				'href' => 'admin/twilio/test_sms',
			]);
		}

		return $return;
	}
}