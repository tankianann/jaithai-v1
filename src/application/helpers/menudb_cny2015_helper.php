<?php

function menuCNY15SET() {

	$menu = array();
	$menu['id'] = "CNY15SET";
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'cny-mini-party-set.pdf';
	$menu['title'] = 'Chinese New Year Mini Party';
	$menu['description'] = "8 Dishes for 10 Pax @ $238 nett";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CK);
	$menu['hascontainercharge'] = true;
	$menu['deliverycharge'] = 40;
	$menu['minorder'] = 10;
	$menu['numdishes'] = 8;
	$menu['perpax'] = 23.8;
	$menu['tnc'] = 	array(
		"Food will be prepared in disposable trays, no buffet table set-up.",
		"Disposable plates, forks &amp; spoons and chilli sauce will be provided.",
		"There is a container charge of $" . Cart_model::CONTAINERCHARGE . " for each food item.",
		"Minimum order is ". $menu['minorder'] . " pax.",
		"A $". $menu['deliverycharge'] . " transportation charge is applicable"
	);
	$menu['agreetnc'] = "I understand that the food will be prepared in disposable trays, with no buffet table set-up.";

	//dishes
	$menudishes = array();
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Jai Thai Mango Prosperity Yusheng with King Topshell"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Mixed Appetizers (Prawn Cake, Fish Cake, Deep Fried Bean Curd, Spring Rolls)"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Deep Fried Fish in any of the following style",
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
		"type" => "fixed",
		"label" => "Stir Fried Prawn & Squid with Pepper and Garlic"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Thai Honey Chicken"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Curry or Soup",
		"controlname" => "currysoup",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Tom Yum Seafood Soup'),
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Pineapple Rice"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Tapioca with Coconut Milk"
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}