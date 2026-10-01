#!/usr/bin/env php
<?php

/**
 * Exercise the local Jai Thai runtime without placing an order or contacting
 * production and third-party services.
 */

if (PHP_SAPI !== 'cli') {
	fwrite(STDERR, "This command can only run from the command line.\n");
	exit(1);
}

if ( ! extension_loaded('curl')) {
	fwrite(STDERR, "The PHP curl extension is required.\n");
	exit(1);
}

if ( ! extension_loaded('mysqli')) {
	fwrite(STDERR, "The PHP mysqli extension is required.\n");
	exit(1);
}

$repository_root = dirname(__DIR__);
$container_config_path = '/var/www/html/jt-config.php';
$container_schema_path = '/opt/jaithai/database/schema.sql';
$running_in_container = is_readable($container_config_path) && is_readable($container_schema_path);

if ($running_in_container) {
	$config_path = $container_config_path;
	$default_base_url = 'http://127.0.0.1';
	$database_host = NULL;
	$database_port = 3306;
} else {
	$config_path = $repository_root.'/docker/jt-config.local.php';
	$default_base_url = 'http://127.0.0.1:8080';
	$database_host = '127.0.0.1';
	$database_port = 3307;
}

if ( ! is_readable($config_path)) {
	fwrite(STDERR, "Docker-local application configuration is not readable.\n");
	exit(1);
}

require_once $config_path;

if ( ! function_exists('jaithai_env')) {
	fwrite(STDERR, "The local configuration does not define jaithai_env().\n");
	exit(1);
}

if (jaithai_env('JAITHAI_ENVIRONMENT') !== 'development') {
	fwrite(STDERR, "Refusing to smoke-test outside the development environment.\n");
	exit(1);
}

if (jaithai_env('JAITHAI_OUTBOUND_ENABLED') !== 'false' || jaithai_env('JAITHAI_PAYPAL_ENABLED') !== 'false') {
	fwrite(STDERR, "Refusing to run while outbound integrations or PayPal are enabled.\n");
	exit(1);
}

$base_url = $default_base_url;

foreach ($argv as $argument) {
	if (strpos($argument, '--base-url=') === 0) {
		$base_url = rtrim(substr($argument, strlen('--base-url=')), '/');
	}
}

$base_parts = parse_url($base_url);
$allowed_hosts = array('127.0.0.1', 'localhost', '::1');

if (
	$base_parts === FALSE
	|| ! isset($base_parts['scheme'], $base_parts['host'])
	|| $base_parts['scheme'] !== 'http'
	|| ! in_array($base_parts['host'], $allowed_hosts, TRUE)
	|| isset($base_parts['user'])
	|| isset($base_parts['pass'])
	|| (isset($base_parts['path']) && $base_parts['path'] !== '' && $base_parts['path'] !== '/')
	|| isset($base_parts['query'])
	|| isset($base_parts['fragment'])
) {
	fwrite(STDERR, "Refusing to test a non-loopback or non-HTTP target: {$base_url}\n");
	exit(1);
}

$passed = 0;
$failed = 0;

function smoke_result($condition, $label, $detail = '')
{
	global $passed, $failed;

	if ($condition) {
		$passed++;
		fwrite(STDOUT, "PASS  {$label}\n");
		return;
	}

	$failed++;
	$suffix = $detail === '' ? '' : " ({$detail})";
	fwrite(STDOUT, "FAIL  {$label}{$suffix}\n");
}

function response_contains($response, $expected)
{
	return strpos($response['body'], $expected) !== FALSE;
}

function response_has_no_php_error($response)
{
	$markers = array('Fatal error', 'A PHP Error was encountered', 'An uncaught Exception was encountered');

	foreach ($markers as $marker) {
		if (strpos($response['body'], $marker) !== FALSE) {
			return FALSE;
		}
	}

	return TRUE;
}

function smoke_request($curl, $base_url, $path, $post_data = NULL)
{
	$options = array(
		CURLOPT_URL => $base_url.$path,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_HEADER => TRUE,
		CURLOPT_FOLLOWLOCATION => FALSE,
		CURLOPT_CONNECTTIMEOUT => 3,
		CURLOPT_TIMEOUT => 15,
		CURLOPT_USERAGENT => 'JaiThaiLocalSmokeTest/1.0',
	);

	if ($post_data === NULL) {
		$options[CURLOPT_HTTPGET] = TRUE;
		$options[CURLOPT_POST] = FALSE;
		$options[CURLOPT_POSTFIELDS] = NULL;
	} else {
		$options[CURLOPT_HTTPGET] = FALSE;
		$options[CURLOPT_POST] = TRUE;
		$options[CURLOPT_POSTFIELDS] = http_build_query($post_data, '', '&');
	}

	curl_setopt_array($curl, $options);
	$raw_response = curl_exec($curl);

	if ($raw_response === FALSE) {
		return array(
			'status' => 0,
			'headers' => '',
			'body' => '',
			'content_type' => '',
			'error' => curl_error($curl),
		);
	}

	$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);

	return array(
		'status' => curl_getinfo($curl, CURLINFO_RESPONSE_CODE),
		'headers' => substr($raw_response, 0, $header_size),
		'body' => substr($raw_response, $header_size),
		'content_type' => (string) curl_getinfo($curl, CURLINFO_CONTENT_TYPE),
		'error' => '',
	);
}

function smoke_get_location($response)
{
	if (preg_match('/^Location:\s*(.+)\r?$/mi', $response['headers'], $matches)) {
		return trim($matches[1]);
	}

	return '';
}

fwrite(STDOUT, "Local smoke target: {$base_url}\n\n");

mysqli_report(MYSQLI_REPORT_OFF);
$database = new mysqli(
	$database_host === NULL ? jaithai_env('JAITHAI_DB_HOST') : $database_host,
	jaithai_env('JAITHAI_DB_USERNAME'),
	jaithai_env('JAITHAI_DB_PASSWORD'),
	jaithai_env('JAITHAI_DB_NAME'),
	$database_port
);

smoke_result( ! $database->connect_errno, 'MariaDB accepts the local application connection', $database->connect_error);

if ( ! $database->connect_errno) {
	$expected_tables = array('jt_feedback', 'jt_options', 'jt_orders', 'jt_users', 'jt_vouchers');
	$actual_tables = array();
	$table_result = $database->query('SHOW TABLES');

	if ($table_result !== FALSE) {
		while ($row = $table_result->fetch_row()) {
			$actual_tables[] = $row[0];
		}

		$table_result->free();
	}

	sort($expected_tables);
	sort($actual_tables);
	smoke_result($actual_tables === $expected_tables, 'the five expected application tables exist');
	$database->close();
}

$curl = curl_init();
curl_setopt($curl, CURLOPT_COOKIEFILE, '');

$checks = array(
	array('/__health', 200, 'ok', 'independent health endpoint'),
	array('/', 200, 'Jai Thai Restaurant and Thai Catering Singapore', 'public home page'),
	array('/jtpages/cateringmenu', 200, 'Set Catering Menu A', 'catering collection page'),
	array('/jtmenu/cateringmenua', 200, 'name="numpax"', 'individual catering menu form'),
	array('/cart', 200, 'Shopping Cart', 'shopping cart page'),
	array('/jtadmin/login', 200, 'Please Login', 'administrator login page'),
);

foreach ($checks as $check) {
	$response = smoke_request($curl, $base_url, $check[0]);
	$detail = $response['error'] === '' ? 'HTTP '.$response['status'] : $response['error'];
	smoke_result($response['status'] === $check[1], $check[3].' returns '.$check[1], $detail);
	smoke_result(response_contains($response, $check[2]), $check[3].' contains its baseline marker');
	smoke_result(response_has_no_php_error($response), $check[3].' contains no rendered PHP error');
}

$stylesheet = smoke_request($curl, $base_url, '/assets/css/jaithai.css');
smoke_result($stylesheet['status'] === 200, 'compiled stylesheet is reachable', 'HTTP '.$stylesheet['status']);
smoke_result(strpos($stylesheet['content_type'], 'text/css') === 0, 'compiled stylesheet has a CSS content type', $stylesheet['content_type']);

$missing = smoke_request($curl, $base_url, '/smoke-test-route-that-does-not-exist');
smoke_result($missing['status'] === 404, 'unknown application route returns 404', 'HTTP '.$missing['status']);

$blocked_paths = array('/jt-config.php', '/application/cache/smoke-test', '/application/logs/smoke-test');

foreach ($blocked_paths as $path) {
	$blocked = smoke_request($curl, $base_url, $path);
	smoke_result($blocked['status'] === 403, $path.' is denied', 'HTTP '.$blocked['status']);
}

$add_to_cart = smoke_request($curl, $base_url, '/jtmenu/cateringmenua', array(
	'formSubmitted' => '1',
	'mixedveg-vege' => 'REG',
	'phadthai-vege' => 'REG',
	'pineapplerice-vege' => 'REG',
	'greencurrychoice' => 'Green Curry Chicken',
	'dessertchoice' => 'Red Ruby',
	'addondrink' => 'No Drink',
	'numpax' => '40',
));

smoke_result($add_to_cart['status'] === 302, 'valid menu selection redirects after add-to-cart', 'HTTP '.$add_to_cart['status']);
$cart_location = smoke_get_location($add_to_cart);
$cart_location_parts = $cart_location === '' ? FALSE : parse_url($cart_location);
smoke_result(
	$cart_location_parts !== FALSE && isset($cart_location_parts['path']) && $cart_location_parts['path'] === '/cart.php',
	'add-to-cart redirects to the legacy cart alias',
	$cart_location
);

$populated_cart = smoke_request($curl, $base_url, '/cart');
smoke_result($populated_cart['status'] === 200, 'session-backed populated cart is reachable', 'HTTP '.$populated_cart['status']);

foreach (array('Catering Menu A', 'Green Curry Chicken', 'Red Ruby') as $cart_marker) {
	smoke_result(response_contains($populated_cart, $cart_marker), 'populated cart contains '.$cart_marker);
}

smoke_result(response_has_no_php_error($populated_cart), 'populated cart contains no rendered PHP error');

curl_close($curl);

fwrite(STDOUT, "\n{$passed} passed, {$failed} failed.\n");

exit($failed === 0 ? 0 : 1);
