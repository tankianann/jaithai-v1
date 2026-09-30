<?php

/*
 * Copy this file to jt-config.php and replace the blank values locally.
 * Never commit jt-config.php because it contains application secrets.
 */

if ( ! function_exists('jaithai_env')) {
	function jaithai_env($name, $default = NULL)
	{
		static $config = array(
			// Application (use production on the live server)
			'JAITHAI_ENVIRONMENT' => 'development',
			'JAITHAI_BASE_URL' => 'http://localhost:8080/',

			// Database
			'JAITHAI_DB_HOST' => '',
			'JAITHAI_DB_USERNAME' => '',
			'JAITHAI_DB_PASSWORD' => '',
			'JAITHAI_DB_NAME' => '',

			// CodeIgniter sessions and encryption
			'JAITHAI_ENCRYPTION_KEY' => '',

			// External services remain disabled until explicitly enabled.
			'JAITHAI_OUTBOUND_ENABLED' => 'false',
			'JAITHAI_PAYPAL_ENABLED' => 'false',

			// OneMap
			'JAITHAI_ONEMAP_API_TOKEN' => '',

			// Elastic Email legacy API
			'JAITHAI_ELASTIC_EMAIL_API_KEY' => '',

			// SMTP
			'JAITHAI_SMTP_HOST' => '',
			'JAITHAI_SMTP_PORT' => '587',
			'JAITHAI_SMTP_USERNAME' => '',
			'JAITHAI_SMTP_PASSWORD' => '',

			// Brevo email API
			'JAITHAI_BREVO_API_KEY' => '',

			// Clickatell SMS
			'JAITHAI_CLICKATELL_USERNAME' => '',
			'JAITHAI_CLICKATELL_PASSWORD' => '',
			'JAITHAI_CLICKATELL_API_ID' => '',
			'JAITHAI_SMS_DEFAULT_FROM' => '',
			'JAITHAI_SMS_DEFAULT_TO' => '',
			'JAITHAI_SMS_BANNED_NUMBERS' => '',

			// PayPal
			'JAITHAI_PAYPAL_MERCHANT_ID' => '',
		);

		if ( ! array_key_exists($name, $config) || $config[$name] === '') {
			return $default;
		}

		return $config[$name];
	}
}
