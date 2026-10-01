#!/usr/bin/env php
<?php

/**
 * Replace local application rows with the tracked synthetic fixture set.
 */

if (PHP_SAPI !== 'cli') {
	fwrite(STDERR, "This command can only run from the command line.\n");
	exit(1);
}

if ( ! in_array('--force', $argv, TRUE)) {
	fwrite(STDERR, "Refusing to replace local data without --force.\n");
	fwrite(STDERR, "Usage: php bin/seed.php --force\n");
	exit(64);
}

$repository_root = dirname(__DIR__);
$container_config_path = '/var/www/html/jt-config.php';
$container_fixture_path = '/opt/jaithai/database/fixtures.sql';

if (is_readable($container_config_path) && is_readable($container_fixture_path)) {
	$config_path = $container_config_path;
	$fixture_path = $container_fixture_path;
	$database_host = NULL;
	$database_port = 3306;
} else {
	$config_path = $repository_root.'/docker/jt-config.local.php';
	$fixture_path = $repository_root.'/database/fixtures.sql';
	$database_host = '127.0.0.1';
	$database_port = 3307;
}

if ( ! is_readable($config_path) || ! is_readable($fixture_path)) {
	fwrite(STDERR, "Local configuration or fixture file is not readable.\n");
	exit(1);
}

require_once $config_path;

if ( ! function_exists('jaithai_env')) {
	fwrite(STDERR, "The local configuration does not define jaithai_env().\n");
	exit(1);
}

if (jaithai_env('JAITHAI_ENVIRONMENT') !== 'development') {
	fwrite(STDERR, "Refusing to seed a database outside the development environment.\n");
	exit(1);
}

$database_name = jaithai_env('JAITHAI_DB_NAME');

if ($database_name !== 'jaithai') {
	fwrite(STDERR, "Refusing to seed an unexpected database: {$database_name}\n");
	exit(1);
}

$fixtures = file_get_contents($fixture_path);

if ($fixtures === FALSE || trim($fixtures) === '') {
	fwrite(STDERR, "Fixture file is empty or unreadable.\n");
	exit(1);
}

mysqli_report(MYSQLI_REPORT_OFF);
$database = new mysqli(
	$database_host === NULL ? jaithai_env('JAITHAI_DB_HOST') : $database_host,
	jaithai_env('JAITHAI_DB_USERNAME'),
	jaithai_env('JAITHAI_DB_PASSWORD'),
	$database_name,
	$database_port
);

if ($database->connect_errno) {
	fwrite(STDERR, "Database connection failed: {$database->connect_error}\n");
	exit(1);
}

$database->set_charset('utf8mb4');
$expected_tables = array('jt_feedback', 'jt_options', 'jt_orders', 'jt_users', 'jt_vouchers');
$table_result = $database->query('SHOW FULL TABLES WHERE Table_type = \'BASE TABLE\'');
$actual_tables = array();

if ($table_result !== FALSE) {
	while ($row = $table_result->fetch_row()) {
		$actual_tables[] = $row[0];
	}
	$table_result->free();
}

sort($expected_tables);
sort($actual_tables);

if ($actual_tables !== $expected_tables) {
	fwrite(STDERR, "Expected schema is missing. Run php bin/migrate.php --force first.\n");
	$database->close();
	exit(1);
}

function seed_fail($database, $message)
{
	fwrite(STDERR, $message.': '.$database->error."\n");
	$database->close();
	exit(1);
}

if ( ! $database->query('SET FOREIGN_KEY_CHECKS=0')) {
	seed_fail($database, 'Could not disable foreign-key checks');
}

foreach ($expected_tables as $table) {
	if ( ! $database->query('TRUNCATE TABLE `'.$table.'`')) {
		seed_fail($database, 'Could not clear '.$table);
	}
}

if ( ! $database->query('SET FOREIGN_KEY_CHECKS=1')) {
	seed_fail($database, 'Could not restore foreign-key checks');
}

if ( ! $database->multi_query($fixtures)) {
	seed_fail($database, 'Could not apply the synthetic fixtures');
}

do {
	if ($result = $database->store_result()) {
		$result->free();
	}

	if ( ! $database->more_results()) {
		break;
	}

	if ( ! $database->next_result()) {
		seed_fail($database, 'Could not finish applying the synthetic fixtures');
	}
} while (TRUE);

$expected_counts = array(
	'jt_feedback' => 1,
	'jt_options' => 2,
	'jt_orders' => 1,
	'jt_users' => 1,
	'jt_vouchers' => 1,
);

foreach ($expected_counts as $table => $expected_count) {
	$result = $database->query('SELECT COUNT(*) FROM `'.$table.'`');

	if ($result === FALSE) {
		seed_fail($database, 'Could not verify '.$table);
	}

	$row = $result->fetch_row();
	$result->free();

	if ((int) $row[0] !== $expected_count) {
		seed_fail($database, 'Unexpected fixture count for '.$table);
	}
}

$database->close();
fwrite(STDOUT, "Replaced local data with 6 synthetic fixture records.\n");
