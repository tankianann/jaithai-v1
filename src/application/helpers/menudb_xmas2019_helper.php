<?php

function menuXMASMP2019() {

	$menu = array();
	$menu['id'] = "XMASMP2019";
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'Xmas Mini Party Set';
	$menu['description'] = "$187 Nett Per Set - 8 Dishes for 10 Pax";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CK);
	$menu['hascontainercharge'] = true;
	$menu['deliverycharge'] = 30;
	$menu['minorder'] = 10;
	$menu['numdishes'] = 8;
	$menu['perpax'] = 18.7;
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
		"label" => "Fried Crab Meat with Curry Powder"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Mango Salad"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Deep Fried Fish with Xmas Sauce (Sweet, Sour and Little Spicy with Red and Green Capsicum)"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Green Curry Chicken"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Broccoli Prawn"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Tom Yum Fried Rice"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Xmas Ruby"
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}
