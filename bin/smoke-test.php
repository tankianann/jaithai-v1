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
$fixture_counts = array(
	'jt_feedback' => 1,
	'jt_options' => 2,
	'jt_orders' => 1,
	'jt_users' => 1,
	'jt_vouchers' => 1,
);

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

	foreach ($fixture_counts as $table => $expected_count) {
		$count_result = $database->query('SELECT COUNT(*) FROM `'.$table.'`');
		$actual_count = -1;

		if ($count_result !== FALSE) {
			$row = $count_result->fetch_row();
			$actual_count = (int) $row[0];
			$count_result->free();
		}

		smoke_result(
			$actual_count === $expected_count,
			$table.' contains the expected synthetic fixtures',
			'expected '.$expected_count.', found '.$actual_count
		);
	}

	$fixture_result = $database->query("SELECT COUNT(*) FROM jt_orders WHERE id = 1 AND email LIKE '%@example.invalid'");
	$fixture_order_count = -1;

	if ($fixture_result !== FALSE) {
		$row = $fixture_result->fetch_row();
		$fixture_order_count = (int) $row[0];
		$fixture_result->free();
	}

	smoke_result($fixture_order_count === 1, 'the fixture order uses a reserved non-deliverable email domain');
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
	'greencurrychoice' => 'Thai Green Curry Chicken',
	'mixedveg-vege' => 'REG',
	'phadthai-vege' => 'REG',
	'dessertchoice' => 'Thai Red Ruby',
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

foreach (array('Catering Menu A', 'Thai Green Curry Chicken', 'Thai Red Ruby') as $cart_marker) {
	smoke_result(response_contains($populated_cart, $cart_marker), 'populated cart contains '.$cart_marker);
}

smoke_result(response_has_no_php_error($populated_cart), 'populated cart contains no rendered PHP error');

$admin_login = smoke_request($curl, $base_url, '/jtadmin/login', array(
	'formSubmitted' => '1',
	'username' => 'local-admin',
	'password' => 'local-admin-only',
));

smoke_result($admin_login['status'] === 302, 'synthetic administrator login redirects', 'HTTP '.$admin_login['status']);
$admin_location = smoke_get_location($admin_login);
$admin_location_parts = $admin_location === '' ? FALSE : parse_url($admin_location);
smoke_result(
	$admin_location_parts !== FALSE && isset($admin_location_parts['path']) && $admin_location_parts['path'] === '/jtadmin/dashboard',
	'synthetic administrator login targets the dashboard',
	$admin_location
);

$admin_checks = array(
	array('/jtadmin/dashboard', 'Synthetic Local Customer', 'authenticated administrator dashboard'),
	array('/jtadmin/vieworder/1', 'Synthetic Catering Menu', 'synthetic order detail'),
	array('/jtadmin/feedback', 'Synthetic fixture feedback.', 'synthetic feedback listing'),
	array('/jtadmin/vouchers', 'LOCAL000001', 'synthetic voucher listing'),
);

foreach ($admin_checks as $check) {
	$response = smoke_request($curl, $base_url, $check[0]);
	smoke_result($response['status'] === 200, $check[2].' returns 200', 'HTTP '.$response['status']);
	smoke_result(response_contains($response, $check[1]), $check[2].' contains its fixture marker');
	smoke_result(response_has_no_php_error($response), $check[2].' contains no rendered PHP error');
}

$pdf_generation = smoke_request($curl, $base_url, '/jtadmin/getpdf/timestamp/1');
smoke_result($pdf_generation['status'] === 302, 'authenticated timestamp PDF generation redirects', 'HTTP '.$pdf_generation['status']);
$pdf_location = smoke_get_location($pdf_generation);
$pdf_location_parts = $pdf_location === '' ? FALSE : parse_url($pdf_location);
smoke_result(
	$pdf_location_parts !== FALSE && isset($pdf_location_parts['path']) && $pdf_location_parts['path'] === '/assets/pdf/JT300001-ts.pdf',
	'timestamp PDF generation targets the synthetic order document',
	$pdf_location
);

$generated_pdf = smoke_request($curl, $base_url, '/assets/pdf/JT300001-ts.pdf');
smoke_result($generated_pdf['status'] === 200, 'generated synthetic timestamp PDF is reachable', 'HTTP '.$generated_pdf['status']);
smoke_result(strpos($generated_pdf['content_type'], 'application/pdf') === 0, 'generated document has a PDF content type', $generated_pdf['content_type']);
smoke_result(strpos($generated_pdf['body'], '%PDF-') === 0, 'generated document has a PDF signature');

curl_close($curl);

$verification_database = new mysqli(
	$database_host === NULL ? jaithai_env('JAITHAI_DB_HOST') : $database_host,
	jaithai_env('JAITHAI_DB_USERNAME'),
	jaithai_env('JAITHAI_DB_PASSWORD'),
	jaithai_env('JAITHAI_DB_NAME'),
	$database_port
);

if ($verification_database->connect_errno) {
	smoke_result(FALSE, 'fixture rows remain unchanged after smoke testing', $verification_database->connect_error);
} else {
	$fixtures_unchanged = TRUE;

	foreach ($fixture_counts as $table => $expected_count) {
		$count_result = $verification_database->query('SELECT COUNT(*) FROM `'.$table.'`');

		if ($count_result === FALSE) {
			$fixtures_unchanged = FALSE;
			break;
		}

		$row = $count_result->fetch_row();
		$count_result->free();

		if ((int) $row[0] !== $expected_count) {
			$fixtures_unchanged = FALSE;
			break;
		}
	}

	$verification_database->close();
	smoke_result($fixtures_unchanged, 'fixture row counts remain unchanged after smoke testing');
}

fwrite(STDOUT, "\n{$passed} passed, {$failed} failed.\n");

exit($failed === 0 ? 0 : 1);
