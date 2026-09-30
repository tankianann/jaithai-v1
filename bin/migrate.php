#!/usr/bin/env php
<?php

/**
 * Reset the Docker development database and recreate the tracked schema.
 *
 * This intentionally is not a versioned migration system. It is a destructive
 * local reset tool for the legacy application's current schema baseline.
 */

if (PHP_SAPI !== 'cli') {
	fwrite(STDERR, "This command can only run from the command line.\n");
	exit(1);
}

if ( ! in_array('--force', $argv, TRUE)) {
	fwrite(STDERR, "Refusing to reset the database without --force.\n");
	fwrite(STDERR, "Usage: php bin/migrate.php --force\n");
	exit(64);
}

$repository_root = dirname(__DIR__);
$container_config_path = '/var/www/html/jt-config.php';
$container_schema_path = '/opt/jaithai/database/schema.sql';

if (is_readable($container_config_path) && is_readable($container_schema_path)) {
	$config_path = $container_config_path;
	$schema_path = $container_schema_path;
	$database_host = NULL;
	$database_port = 3306;
} else {
	$config_path = $repository_root.'/docker/jt-config.local.php';
	$schema_path = $repository_root.'/database/schema.sql';
	$database_host = '127.0.0.1';
	$database_port = 3307;
}

if ( ! is_readable($config_path)) {
	fwrite(STDERR, "Local application configuration is not readable.\n");
	exit(1);
}

require_once $config_path;

if ( ! function_exists('jaithai_env')) {
	fwrite(STDERR, "The local configuration does not define jaithai_env().\n");
	exit(1);
}

if (jaithai_env('JAITHAI_ENVIRONMENT') !== 'development') {
	fwrite(STDERR, "Refusing to reset a database outside the development environment.\n");
	exit(1);
}

if ( ! is_readable($schema_path)) {
	fwrite(STDERR, "Schema file is not readable: {$schema_path}\n");
	exit(1);
}

$database_name = jaithai_env('JAITHAI_DB_NAME');

if ($database_name !== 'jaithai') {
	fwrite(STDERR, "Refusing to reset an unexpected database: {$database_name}\n");
	exit(1);
}

$schema = file_get_contents($schema_path);

if ($schema === FALSE || trim($schema) === '') {
	fwrite(STDERR, "Schema file is empty or unreadable.\n");
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

function quote_identifier($identifier)
{
	return '`'.str_replace('`', '``', $identifier).'`';
}

function fail_query($database, $message)
{
	fwrite(STDERR, $message.': '.$database->error."\n");
	$database->close();
	exit(1);
}

$objects = $database->query('SHOW FULL TABLES');

if ($objects === FALSE) {
	fail_query($database, 'Could not inspect the existing database');
}

$tables = array();
$views = array();

while ($row = $objects->fetch_row()) {
	if (isset($row[1]) && strtoupper($row[1]) === 'VIEW') {
		$views[] = $row[0];
	} else {
		$tables[] = $row[0];
	}
}

$objects->free();

if ( ! $database->query('SET FOREIGN_KEY_CHECKS=0')) {
	fail_query($database, 'Could not disable foreign-key checks');
}

foreach ($views as $view) {
	if ( ! $database->query('DROP VIEW IF EXISTS '.quote_identifier($view))) {
		fail_query($database, 'Could not drop view '.quote_identifier($view));
	}
}

foreach ($tables as $table) {
	if ( ! $database->query('DROP TABLE IF EXISTS '.quote_identifier($table))) {
		fail_query($database, 'Could not drop table '.quote_identifier($table));
	}
}

if ( ! $database->query('SET FOREIGN_KEY_CHECKS=1')) {
	fail_query($database, 'Could not restore foreign-key checks');
}

if ( ! $database->multi_query($schema)) {
	fail_query($database, 'Could not apply the schema');
}

do {
	if ($result = $database->store_result()) {
		$result->free();
	}

	if ( ! $database->more_results()) {
		break;
	}

	if ( ! $database->next_result()) {
		fail_query($database, 'Could not finish applying the schema');
	}
} while (TRUE);

$result = $database->query('SHOW FULL TABLES WHERE Table_type = \'BASE TABLE\'');

if ($result === FALSE) {
	fail_query($database, 'Could not verify the recreated schema');
}

$table_count = $result->num_rows;
$result->free();
$database->close();

fwrite(STDOUT, "Reset {$database_name} and created {$table_count} tables.\n");
