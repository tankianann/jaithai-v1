<?php

function menuCNY2021Happiness() {

	$menu = array();
	$menu['id'] = "CNY2021HAPPINESS";
	$menu['url'] = "cnymenu/cny2021happiness";
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'CNY 2021 Happiness Set';
	$menu['description'] = "9 Course @ $18 per person (Min 10 pax)";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CK);
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 40;
	$menu['minorder'] = 10;
	$menu['numdishes'] = 9;
	$menu['perpax'] = 18;
	$menu['tnc'] = 	array(
		"This menu includes:<ul>
			<li>Food prepared in disposable containers / trays</li>
			<li>Disposable plates & cutlery</li></ul>",
		"Order is 10 pax per set",
		"No buffet table set-up or food warmers.",
		"Minimum order is ". $menu['minorder'] . " pax",
		"A $". $menu['deliverycharge'] . " transportation charge is applicable"
	);
	$menu['agreetnc'] = "";

	//dishes
	$menudishes = array();
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Appetizer",
		"controlname" => "appetizerchoice",
		"choices" => array(
			array('label' => 'Seafood Spring Rolls'),
			array('label' => 'Vegetable Spring Roll'),
			array('label' => 'Thai Money Bag'),
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fish Cake"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Green Curry",
		"controlname" => "greencurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00)'),
			array('label' => 'Green Curry Vegetarian'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Fish",
		"controlname" => "fishchoice",
		"choices" => array(
			array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Thai Tamarind Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Sweet and Sour Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Thai Chili Sauce (Spicy)'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Chicken",
		"controlname" => "chickenchoice",
		"choices" => array(
			array('label' => 'Deep Fried Chicken with Lemon Leaf'),
			array('label' => 'Honey Chicken'),
			array('label' => 'Chicken with Cashew Nut'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Vegetables",
		"controlname" => "vegetablechoice",
		"choices" => array(
			array('label' => 'Fried Mixed Vegetables with Chinese Mushroom'),
			array('label' => 'Fried Mixed Vegetables with Oyster Sauce'),
			array('label' => 'Fried Mixed Vegetables Vegetarian'),
		)
	);
	$menudishes[] = array(
		"type" => "pick2",
		"label" => "Noodle / Rice - Please Choose 2",
		"controlname" => "noodlericechoice",
		"choices" => array(
			array('label' => 'Pineapple Rice',               'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice',                   'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Phad Thai',                    'vegecontrol' => 'phadthai' . JT_VEGCTRL),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Dessert",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Thai Red Ruby'),
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuCNY2021Delight() {

	$menu = array();
	$menu['id'] = "CNY2021DELIGHT";
	$menu['url'] = "cnymenu/cny2021delight";
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'CNY 2021 Delight Set';
	$menu['description'] = "10 Course @ $22 per person (Min 10 pax)";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CK);
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 40;
	$menu['minorder'] = 10;
	$menu['numdishes'] = 10;
	$menu['perpax'] = 22;
	$menu['tnc'] = 	array(
		"This menu includes:<ul>
			<li>Food prepared in disposable containers / trays</li>
			<li>Disposable plates & cutlery</li></ul>",
		"Order is 10 pax per set",
		"No buffet table set-up or food warmers.",
		"Minimum order is ". $menu['minorder'] . " pax",
		"A $". $menu['deliverycharge'] . " transportation charge is applicable"
	);
	$menu['agreetnc'] = "";

	//dishes
	$menudishes = array();
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Appetizer",
		"controlname" => "appetizerchoice",
		"choices" => array(
			array('label' => 'Seafood Spring Rolls'),
			array('label' => 'Vegetable Spring Roll'),
			array('label' => 'Thai Money Bag'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Appetizer",
		"controlname" => "appetizer2choice",
		"choices" => array(
			array('label' => 'Thai Fish Cake'),
			array('label' => 'Prawn Cake'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Green Curry",
		"controlname" => "greencurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00)'),
			array('label' => 'Green Curry Vegetarian'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Fish",
		"controlname" => "fishchoice",
		"choices" => array(
			array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Thai Tamarind Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Sweet and Sour Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Thai Chili Sauce (Spicy)'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Chicken",
		"controlname" => "chickenchoice",
		"choices" => array(
			array('label' => 'Deep Fried Chicken with Lemon Leaf'),
			array('label' => 'Honey Chicken'),
			array('label' => 'Chicken with Cashew Nut'),
			array('label' => 'Pandan Chicken'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Prawn",
		"controlname" => "squidprawnchoice",
		"choices" => array(
			array('label' => 'Prawn Tamarind Sauce'),
			array('label' => 'Prawn with Pepper & Garlic Sauce'),
			array('label' => 'Stir Fried Prawn with Cashew Nut'),
			array('label' => 'Prawn with Thai Chili Paste'),
			array('label' => 'Cereal Prawn'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Vegetables",
		"controlname" => "vegetablechoice",
		"choices" => array(
			array('label' => 'Fried Mixed Vegetables with Chinese Mushroom'),
			array('label' => 'Fried Mixed Vegetables with Oyster Sauce'),
			array('label' => 'Fried Mixed Vegetables Vegetarian'),
		)
	);
	$menudishes[] = array(
		"type" => "pick2",
		"label" => "Noodle / Rice - Please Choose 2",
		"controlname" => "noodlericechoice",
		"choices" => array(
			array('label' => 'Pineapple Rice',               'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice',                   'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Phad Thai',                    'vegecontrol' => 'phadthai' . JT_VEGCTRL),
			array('label' => 'Egg Fried Rice',               'vegecontrol' => 'eggfriedrice' . JT_VEGCTRL),
			array('label' => 'Fried Tang Hoon',              'vegecontrol' => 'friedtanghoon' . JT_VEGCTRL),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Dessert",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Thai Red Ruby'),
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuCNY2021Treasure() {

	$menu = array();
	$menu['id'] = "CNY2021TREASURE";
	$menu['url'] = "cnymenu/cny2021treasure";
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'CNY 2021 Treasure Set';
	$menu['description'] = "13 Course @ $26 per person (Min 10 pax)";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CK);
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 40;
	$menu['minorder'] = 10;
	$menu['numdishes'] = 13;
	$menu['perpax'] = 26;
	$menu['tnc'] = 	array(
		"This menu includes:<ul>
			<li>Food prepared in disposable containers / trays</li>
			<li>Disposable plates & cutlery</li></ul>",
		"Order is 10 pax per set",
		"No buffet table set-up or food warmers.",
		"Minimum order is ". $menu['minorder'] . " pax",
		"A $". $menu['deliverycharge'] . " transportation charge is applicable"
	);
	$menu['agreetnc'] = "";

	//dishes
	$menudishes = array();
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Prawn Cake"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Money Bag"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Seafood Spring Rolls"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fish Cake"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Green Curry",
		"controlname" => "greencurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00)'),
			array('label' => 'Green Curry Vegetarian'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Tom Yum Seafood Soup",
		"controlname" => "soupchoice",
		"choices" => array(
			array('label' => 'Tom Yum Seafood Clear Soup'),
			array('label' => 'Tom Yum Seafood Chilli Paste'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Fish",
		"controlname" => "fishchoice",
		"choices" => array(
			array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Thai Tamarind Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Sweet and Sour Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Thai Chili Sauce (Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Thai Chili Paste (Spicy)'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Prawn",
		"controlname" => "squidprawnchoice",
		"choices" => array(
			array('label' => 'Prawn Tamarind Sauce'),
			array('label' => 'Prawn with Pepper & Garlic Sauce'),
			array('label' => 'Stir Fried Prawn with Cashew Nut'),
			array('label' => 'Prawn with Thai Chili Paste'),
			array('label' => 'Cereal Prawn'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Chicken",
		"controlname" => "chickenchoice",
		"choices" => array(
			array('label' => 'Deep Fried Chicken with Lemon Leaf'),
			array('label' => 'Honey Chicken'),
			array('label' => 'Chicken with Cashew Nut'),
			array('label' => 'Pandan Chicken'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Vegetables",
		"controlname" => "vegetablechoice",
		"choices" => array(
			array('label' => 'Fried Mixed Vegetables with Chinese Mushroom'),
			array('label' => 'Fried Mixed Vegetables with Oyster Sauce'),
			array('label' => 'Fried Mixed Vegetables Vegetarian'),
		)
	);
	$menudishes[] = array(
		"type" => "pick2",
		"label" => "Noodle / Rice - Please Choose 2",
		"controlname" => "noodlericechoice",
		"choices" => array(
			array('label' => 'Pineapple Rice',               'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice',                   'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Phad Thai',                    'vegecontrol' => 'phadthai' . JT_VEGCTRL),
			array('label' => 'Egg Fried Rice',               'vegecontrol' => 'eggfriedrice' . JT_VEGCTRL),
			array('label' => 'Fried Tang Hoon',              'vegecontrol' => 'friedtanghoon' . JT_VEGCTRL),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Dessert",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Thai Red Ruby'),
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}