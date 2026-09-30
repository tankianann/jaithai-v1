<?php

function menuXMASSET() {

	$menu = array();
	$menu['id'] = "XMASSET";
	$menu['url'] = "xmasset";
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'Christmas Mini Party Set';
	$menu['description'] = "$180 Nett Per Set - 9 Dishes for 10 Pax";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CK);
	$menu['hascontainercharge'] = true;
	$menu['deliverycharge'] = 40;
	$menu['minorder'] = 10;
	$menu['numdishes'] = 9;
	$menu['perpax'] = 18;
	$menu['tnc'] = 	array(
		"Food will be prepared in disposable trays, no buffet table set-up.",
		"Disposable plates, forks &amp; spoons and chilli sauce will be provided.",
		"Minimum order is ". $menu['minorder'] . " pax (1 set).  Order quantity in multiples of 10 pax only.",
		"A $". $menu['deliverycharge'] . " transportation charge is applicable",
		"Please submit a separate order for each delivery address."
	);
	$menu['agreetnc'] = "I understand that the food will be prepared in disposable trays, with no buffet table set-up.";

	//dishes
	$menudishes = array();
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Honey Chicken"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Thai Mango Salad"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Thai Money Bag"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Deep Fried Fish Fillet in any of the following style",
		"controlname" => "deepfriedfish",
		"choices" => array(
			array('label' => 'Deep Fried Fish with Chili Sauce'),
			array('label' => 'Deep Fried Fish with Pepper & Garlic'),
			array('label' => 'Deep Fried Fish with Basil Leaf'),
			array('label' => 'Deep Fried Fish with Sweet & Sour Sauce'),
			array('label' => 'Deep Fried Fish with Tamarind Sauce'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Green Curry",
		"controlname" => "greencurry",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Green Curry Vegetarian'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Meat",
		"controlname" => "meat",
		"choices" => array(
			array('label' => 'Stir Fried Beef with Pepper & Garlic (+ $1.00 Per Pax)'),
			array('label' => 'Chicken with Cashew Nut'),
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Salt and Pepper Deep Fried Squid Ring"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Rice / Noodles",
		"controlname" => "ricenoodles",
		"choices" => array(
			array('label' => 'Pineapple Rice'),
			array('label' => 'Olive Rice'),
			array('label' => 'Phad Thai'),
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Tapioca with Coconut Milk"
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}
