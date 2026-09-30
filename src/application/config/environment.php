<?php

if ( ! function_exists('jaithai_env')) {
	function jaithai_env($name, $default = NULL)
	{
		$value = getenv($name);

		if ($value === FALSE || $value === '') {
			return $default;
		}

		return $value;
	}
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
