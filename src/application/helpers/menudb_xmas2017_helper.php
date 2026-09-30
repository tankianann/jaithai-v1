<?php
function menuXMASSET2017() {

	$menu = array();
	$menu['id'] = "XMASSET2017";
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'Special Xmas Menu';
	$menu['description'] = "<del>$48 Nett</del> $36 Nett Per Person - 10 Dishes";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 60;
	$menu['minorder'] = 20;
	$menu['numdishes'] = 10;
	$menu['perpax'] = 36;
	$menu['tnc'] = 	array(
		"This menu includes:<ul>
			<li>Tables with skirting</li>
			<li>Food warmers</li>
			<li>Disposable plates & cutlery</li>
			<li>Napkins</li>
			<li>Trash bags</li>
			<li>Food tags</li></ul>",
		"No take away container provided",
		"Minimum order is ". $menu['minorder'] . " pax",
		"A $". $menu['deliverycharge'] . " transportation charge is applicable"
	);
	$menu['agreetnc'] = "";

	//dishes
	$menudishes = array();
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Turkey Breast with Black Pepper Sauce"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Salad with 3 types of dressing – Oriental, Thai Spicy and Thousand Island",
		"controlname" => "salad",
		"choices" => array(
			array('label' => 'Mango Salad'),
			array('label' => 'Garden Salad'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Fish in any of the following style",
		"controlname" => "fish",
		"choices" => array(
			array('label' => 'Seabass Fillet Thai Chilli Sauce'),
			array('label' => 'Seabass Fillet Thai Tamarind Sauce'),
			array('label' => 'Seabass Fillet Tartar Sauce'),
			array('label' => 'Seabass Fillet Teriyaki'),
			array('label' => 'Salmon Thai Chilli Sauce'),
			array('label' => 'Salmon Thai Tamarind Sauce'),
			array('label' => 'Salmon Tartar Sauce'),
			array('label' => 'Salmon Teriyaki'),
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Gray Prawn with Cereal"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Fried Squid",
		"controlname" => "squid",
		"choices" => array(
			array('label' => 'Fried Squid with Salted Egg Sauce'),
			array('label' => 'Fried Squid with Chili Paste'),
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Broccoli Scallop"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Spaghetti with Basil Sauce"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Rice",
		"controlname" => "rice",
		"choices" => array(
			array('label' => 'Tom Yum Fried Rice'),
			array('label' => 'Pineapple Rice'),
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Xmas Ruby Dessert"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Lime Juice"
	);
	$menu['dishes'] = $menudishes;
	return $menu;
}

function menuXMASMP2017() {

	$menu = array();
	$menu['id'] = "XMASMP2017";
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'Christmas Mini Party Set';
	$menu['description'] = "$250 Nett Per Set - 8 Dishes for 10 Pax";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CK);
	$menu['hascontainercharge'] = true;
	$menu['deliverycharge'] = 30;
	$menu['minorder'] = 10;
	$menu['numdishes'] = 9;
	$menu['perpax'] = 25;
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
		"label" => "Turkey Breast with Black Pepper Sauce"
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