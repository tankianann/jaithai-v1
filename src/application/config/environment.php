<?php

$jaithai_config_file = dirname(__DIR__, 2).'/jt-config.php';

if ( ! is_file($jaithai_config_file)) {
	exit('Application configuration is missing. Copy jt-config.example.php to jt-config.php and populate it.');
}

require_once $jaithai_config_file;
unset($jaithai_config_file);

if ( ! function_exists('jaithai_env')) {
	exit('Application configuration is invalid: jaithai_env() is not defined.');
}

if ( ! function_exists('jaithai_env_bool')) {
	function jaithai_env_bool($name, $default = FALSE)
	{
		$value = jaithai_env($name, NULL);

		if ($value === NULL) {
			return (bool) $default;
		}

		$value = strtolower(trim($value));

		if (in_array($value, array('1', 'true', 'yes', 'on'), TRUE)) {
			return TRUE;
		}

		if (in_array($value, array('0', 'false', 'no', 'off'), TRUE)) {
			return FALSE;
		}

		return (bool) $default;
	}
}

if ( ! function_exists('jaithai_outbound_enabled')) {
	function jaithai_outbound_enabled()
	{
		return jaithai_env_bool('JAITHAI_OUTBOUND_ENABLED', FALSE);
	}
}
