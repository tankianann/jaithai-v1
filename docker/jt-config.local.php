<?php

/*
 * Docker-only local configuration.
 *
 * These values are intentionally non-secret and must never be used for a
 * public or production deployment. Compose mounts this file over the ignored
 * src/jt-config.php without modifying the developer's private configuration.
 */

if ( ! function_exists('jaithai_env')) {
	function jaithai_env($name, $default = NULL)
	{
		static $config = array(
			'JAITHAI_ENVIRONMENT' => 'development',
			'JAITHAI_BASE_URL' => 'http://localhost:8080/',
			'JAITHAI_DB_HOST' => 'mariadb',
			'JAITHAI_DB_USERNAME' => 'jaithai',
			'JAITHAI_DB_PASSWORD' => 'jaithai-local-only',
			'JAITHAI_DB_NAME' => 'jaithai',
			'JAITHAI_ENCRYPTION_KEY' => 'local-development-only-change-me',
			'JAITHAI_OUTBOUND_ENABLED' => 'false',
			'JAITHAI_PAYPAL_ENABLED' => 'false',
			'JAITHAI_ONEMAP_API_TOKEN' => '',
			'JAITHAI_ELASTIC_EMAIL_API_KEY' => '',
			'JAITHAI_SMTP_HOST' => '',
			'JAITHAI_SMTP_PORT' => '587',
			'JAITHAI_SMTP_USERNAME' => '',
			'JAITHAI_SMTP_PASSWORD' => '',
			'JAITHAI_BREVO_API_KEY' => '',
			'JAITHAI_CLICKATELL_USERNAME' => '',
			'JAITHAI_CLICKATELL_PASSWORD' => '',
			'JAITHAI_CLICKATELL_API_ID' => '',
			'JAITHAI_SMS_DEFAULT_FROM' => '',
			'JAITHAI_SMS_DEFAULT_TO' => '',
			'JAITHAI_SMS_BANNED_NUMBERS' => '',
			'JAITHAI_PAYPAL_MERCHANT_ID' => '',
		);

		if ( ! array_key_exists($name, $config) || $config[$name] === '') {
			return $default;
		}

		return $config[$name];
	}
}
