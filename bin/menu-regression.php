#!/usr/bin/env php
<?php

/**
 * Verify the tracked catering-menu definitions and their application wiring
 * without requiring Docker, a database, or network access.
 */

if (PHP_SAPI !== 'cli') {
	fwrite(STDERR, "This command can only run from the command line.\n");
	exit(1);
}

$repository_root = dirname(__DIR__);
$container_application_root = '/var/www/html';
$application_root = is_readable($container_application_root.'/application/helpers/menudb_cateringset_helper.php')
	? $container_application_root
	: $repository_root.'/src';
$passed = 0;
$failed = 0;

define('JT_SETMENU', 1);
define('JT_REG', 'REG');
define('JT_VEG', 'VEG');
define('JT_VEGCTRL', '-vege');

require_once $application_root.'/application/helpers/menudb_cateringset_helper.php';
require_once $application_root.'/application/helpers/menudb_diyset_helper.php';
require_once $application_root.'/application/helpers/menudb_vegeset_helper.php';

function menu_regression_result($condition, $label, $detail = '')
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

function menu_regression_find_control($menu, $controlname)
{
	foreach ($menu['dishes'] as $dish) {
		if (isset($dish['controlname']) && $dish['controlname'] === $controlname) {
			return $dish;
		}
	}

	return FALSE;
}

function menu_regression_food_count($menu)
{
	$count = 0;

	foreach ($menu['dishes'] as $dish) {
		if ($dish['type'] === 'group') {
			continue;
		}

		if (isset($dish['controlname']) && $dish['controlname'] === 'drinkchoice') {
			continue;
		}

		$count++;
	}

	return $count;
}

function menu_regression_controls($menu)
{
	$controls = array();

	foreach ($menu['dishes'] as $dish) {
		if (isset($dish['controlname'])) {
			$controls[] = $dish['controlname'];
		}

		if (isset($dish['vegecontrol'])) {
			$controls[] = $dish['vegecontrol'];
		}

		if (isset($dish['choices'])) {
			foreach ($dish['choices'] as $choice) {
				if (isset($choice['vegecontrol'])) {
					$controls[] = $choice['vegecontrol'];
				}
			}
		}
	}

	if ( ! $menu['hasdrink']) {
		$controls[] = 'addondrink';
	}

	return array_values(array_unique($controls));
}

function menu_regression_contains_text($value, $needle)
{
	if (is_array($value)) {
		foreach ($value as $child) {
			if (menu_regression_contains_text($child, $needle)) {
				return TRUE;
			}
		}

		return FALSE;
	}

	return is_string($value) && stripos($value, $needle) !== FALSE;
}

function menu_regression_controller_body($source, $method, $next_method)
{
	$start = strpos($source, 'public function '.$method.'()');
	$end = $start === FALSE ? FALSE : strpos($source, 'public function '.$next_method.'()', $start + 1);

	if ($start === FALSE || $end === FALSE) {
		return FALSE;
	}

	return substr($source, $start, $end - $start);
}

$expected = array(
	'CATERA' => array('menu' => menuCATERA(), 'title' => 'Catering Menu A', 'price' => 15.00, 'minimum' => 40, 'courses' => 8, 'method' => 'cateringMenuA', 'next' => 'cateringMenuB'),
	'CATERB' => array('menu' => menuCATERB(), 'title' => 'Catering Menu B', 'price' => 18.00, 'minimum' => 30, 'courses' => 9, 'method' => 'cateringMenuB', 'next' => 'cateringMenuC'),
	'CATERC' => array('menu' => menuCATERC(), 'title' => 'Catering Menu C', 'price' => 21.00, 'minimum' => 30, 'courses' => 10, 'method' => 'cateringMenuC', 'next' => 'cateringMenuD'),
	'CATERD' => array('menu' => menuCATERD(), 'title' => 'Catering Menu D', 'price' => 24.00, 'minimum' => 30, 'courses' => 11, 'method' => 'cateringMenuD', 'next' => 'cateringDIYA'),
	'DIYA' => array('menu' => menuDIYA(), 'title' => 'DIY Catering Menu A', 'price' => 16.90, 'minimum' => 40, 'courses' => 8, 'method' => 'cateringDIYA', 'next' => 'cateringDIYB'),
	'DIYB' => array('menu' => menuDIYB(), 'title' => 'DIY Catering Menu B', 'price' => 19.90, 'minimum' => 30, 'courses' => 9, 'method' => 'cateringDIYB', 'next' => 'cateringDIYC'),
	'DIYC' => array('menu' => menuDIYC(), 'title' => 'DIY Catering Menu C', 'price' => 22.90, 'minimum' => 30, 'courses' => 10, 'method' => 'cateringDIYC', 'next' => 'cateringDIYD'),
	'DIYD' => array('menu' => menuDIYD(), 'title' => 'DIY Catering Menu D', 'price' => 25.90, 'minimum' => 30, 'courses' => 11, 'method' => 'cateringDIYD', 'next' => 'vegetarianMenuA'),
	'VEGEA' => array('menu' => menuVEGEA(), 'title' => 'Vegan Catering Menu A', 'price' => 15.00, 'minimum' => 40, 'courses' => 8, 'method' => 'vegetarianMenuA', 'next' => 'vegetarianMenuB'),
	'VEGEB' => array('menu' => menuVEGEB(), 'title' => 'Vegan Catering Menu B', 'price' => 18.00, 'minimum' => 30, 'courses' => 9, 'method' => 'vegetarianMenuB', 'next' => 'vegetarianMenuC'),
	'VEGEC' => array('menu' => menuVEGEC(), 'title' => 'Vegan Catering Menu C', 'price' => 21.00, 'minimum' => 30, 'courses' => 10, 'method' => 'vegetarianMenuC', 'next' => 'vegetarianMenuD'),
	'VEGED' => array('menu' => menuVEGED(), 'title' => 'Vegan Catering Menu D', 'price' => 24.00, 'minimum' => 30, 'courses' => 11, 'method' => 'vegetarianMenuD', 'next' => 'miniPartySet'),
);

$controller_source = file_get_contents($application_root.'/application/controllers/jtmenu.php');
$allowed_types = array('fixed', 'pick1', 'group');

foreach ($expected as $menu_id => $specification) {
	$menu = $specification['menu'];
	$prefix = $menu_id.' ';

	menu_regression_result($menu['id'] === $menu_id, $prefix.'uses its stable menu ID');
	menu_regression_result($menu['title'] === $specification['title'], $prefix.'preserves its customer-facing title', $menu['title']);
	menu_regression_result(abs((float) $menu['perpax'] - $specification['price']) < 0.001, $prefix.'has the approved per-pax price', (string) $menu['perpax']);
	menu_regression_result((int) $menu['minorder'] === $specification['minimum'], $prefix.'has the approved minimum', (string) $menu['minorder']);
	menu_regression_result((int) $menu['numdishes'] === $specification['courses'], $prefix.'has the approved course count', (string) $menu['numdishes']);
	menu_regression_result(menu_regression_food_count($menu) === $specification['courses'], $prefix.'course count matches its food definitions', (string) menu_regression_food_count($menu));

	$types_valid = TRUE;
	$labels_valid = TRUE;

	foreach ($menu['dishes'] as $dish) {
		if ( ! in_array($dish['type'], $allowed_types, TRUE)) {
			$types_valid = FALSE;
		}

		if ($dish['type'] !== 'group' && ( ! isset($dish['label']) || trim($dish['label']) === '')) {
			$labels_valid = FALSE;
		}

		if (isset($dish['choices'])) {
			foreach ($dish['choices'] as $choice) {
				if ( ! isset($choice['label']) || trim($choice['label']) === '') {
					$labels_valid = FALSE;
				}
			}
		}
	}

	menu_regression_result($types_valid, $prefix.'uses only existing renderer control types');
	menu_regression_result($labels_valid, $prefix.'has no empty customer-facing dish labels');
	menu_regression_result( ! menu_regression_contains_text($menu, 'halal'), $prefix.'contains no halal wording');

	$dessert = menu_regression_find_control($menu, 'dessertchoice');
	$dessert_labels = array();
	if ($dessert !== FALSE) {
		foreach ($dessert['choices'] as $choice) {
			$dessert_labels[] = $choice['label'];
		}
	}

	menu_regression_result(in_array('Tako', $dessert_labels, TRUE), $prefix.'keeps Tako surcharge-free');
	menu_regression_result(in_array('Mango Sticky Rice (+ $1.00 Per Pax)', $dessert_labels, TRUE) || in_array('Change to Mango Sticky Rice (+ $1.00 Per Pax)', $dessert_labels, TRUE), $prefix.'keeps the Mango Sticky Rice surcharge');

	$controller_body = menu_regression_controller_body($controller_source, $specification['method'], $specification['next']);
	menu_regression_result($controller_body !== FALSE, $prefix.'has a controller action');

	$missing_bindings = array();
	if ($controller_body !== FALSE) {
		foreach (menu_regression_controls($menu) as $control) {
			$needle = substr($control, -strlen(JT_VEGCTRL)) === JT_VEGCTRL ? substr($control, 0, -strlen(JT_VEGCTRL)) : $control;
			if (substr_count($controller_body, "'{$needle}'") < 2 && substr_count($controller_body, '"'.$needle.'"') < 2) {
				$missing_bindings[] = $control;
			}
		}
	}

	menu_regression_result(empty($missing_bindings), $prefix.'controller defaults and POST fields cover every selector', implode(', ', $missing_bindings));
}

foreach (array('CATERA' => 'greencurrychoice', 'CATERB' => 'greencurrychoice', 'CATERC' => 'currysoupchoice', 'CATERD' => 'tomyumchoice', 'DIYA' => 'currychoice', 'DIYB' => 'currychoice', 'DIYC' => 'tomyumchoice', 'DIYD' => 'tomyumchoice', 'VEGED' => 'tomyumchoice') as $menu_id => $controlname) {
	$dish = menu_regression_find_control($expected[$menu_id]['menu'], $controlname);
	$has_dropdown = FALSE;

	if ($dish !== FALSE) {
		foreach ($dish['choices'] as $choice) {
			if (isset($choice['vegecontrol'])) {
				$has_dropdown = TRUE;
			}
		}
	}

	menu_regression_result($dish !== FALSE && ! $has_dropdown, $menu_id.' curry or Tom Yum group uses radio choices without a version dropdown');
}

$registry_source = file_get_contents($application_root.'/application/helpers/menudb_helper.php');
$collection_source = file_get_contents($application_root.'/application/views/jtpages/cateringmenu_view.php');
$display_source = file_get_contents($application_root.'/application/helpers/menudisplay_helper.php');
$selectbox_source = file_get_contents($application_root.'/application/helpers/selectbox_helper.php');
$htaccess_source = file_get_contents($application_root.'/.htaccess');
$menu_d_image = $application_root.'/assets/i/catering-menu/vegan-catering-menu-d.jpg';

menu_regression_result(strpos($registry_source, '"VEGED" => "menuVEGED"') !== FALSE, 'VEGED is registered in the menu lookup');
menu_regression_result(strpos($collection_source, '/jtmenu/vegetarianmenud') !== FALSE, 'Vegan Menu D card links to its native route');
menu_regression_result(strpos($collection_source, 'vegan-catering-menu-d.jpg') !== FALSE, 'Vegan Menu D card uses its supplied application image');
menu_regression_result(strpos($display_source, 'case "VEGED":') !== FALSE, 'VEGED has a registered display layout');
menu_regression_result(strpos($selectbox_source, "'VEGED' => 'Vegan Catering Menu D'") !== FALSE, 'VEGED is available to the administration menu selector');
menu_regression_result(strpos($htaccess_source, 'vegetarian-menu-d.php') === FALSE, 'Vegan Menu D has no legacy PHP redirect');
menu_regression_result(is_file($menu_d_image), 'Vegan Menu D application image exists');
menu_regression_result(is_file($menu_d_image) && hash_file('sha256', $menu_d_image) === '88b6e0f3693cb207a9253740bfdf13e773bacb40869940ed17f0cd421cee11e9', 'Vegan Menu D application image matches the supplied asset');

fwrite(STDOUT, "\nMenu regression checks: {$passed} passed, {$failed} failed.\n");
exit($failed === 0 ? 0 : 1);
