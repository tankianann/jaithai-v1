<?php

function menuCNY2020Happiness() {

	$menu = array();
	$menu['id'] = "CNY2020HAPPINESS";
	$menu['url'] = "cny2020-happiness.php";
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'CNY 2020 Happiness Set';
	$menu['description'] = "9 Course @ $18 per person (Min 30 pax)";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 9;
	$menu['perpax'] = 18;
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

function menuCNY2020Delight() {

	$menu = array();
	$menu['id'] = "CNY2020DELIGHT";
	$menu['url'] = "cny2020-delight.php";
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'Delight CNY Menu';
	$menu['description'] = "10 Course @ $22 per person (Min 30 pax)";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 10;
	$menu['perpax'] = 22;
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
			array('label' => 'Fried Mixed Vegetables with Water Chestnut and Lotus Root'),
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
			array('label' => 'Fried Bee Hoon',               'vegecontrol' => 'friedbeehoon' . JT_VEGCTRL),
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

function menuCNY2020Treasure() {

	$menu = array();
	$menu['id'] = "CNY2020TREASURE";
	$menu['url'] = "cny2020-treasure.php";
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'Treasure CNY Menu';
	$menu['description'] = "13 Course @ $26 per person (Min 30 pax)";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 13;
	$menu['perpax'] = 26;
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
			array('label' => 'Cereal Prawn'),
			array('label' => 'Stir Fried Prawn with Cashew Nut'),
			array('label' => 'Stir Fied Prawn with Almond'),
			array('label' => 'Prawn & Squid with Pepper & Garlic Sauce'),
			array('label' => 'Prawn & Squid with Thai Chili Paste'),
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
			array('label' => 'Fried Mixed Vegetables with Water Chestnut, Lotus Root & Macadamia'),
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
			array('label' => 'Fried Bee Hoon',               'vegecontrol' => 'friedbeehoon' . JT_VEGCTRL),
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

function menuCNY2020AddOnDishes() {

	$menu = array();
	$menu['id'] = "CNY2020AddOnDishes";
	$menu['url'] = 'cny2020-addondishes.php';
	$menu['type'] = JT_ALACARTEMENU;
	$menu['pdffile'] = '';
	$menu['title'] = 'CNY 2020 Add On Dishes';
	$menu['description'] = "Select your own dishes!";
	$menu['meta_description'] = "";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CK);
	$menu['hascontainercharge'] = true;
	$menu['deliverycharge'] = 40;
	$menu['minorder'] = 200;
	$menu['numdishes'] = 0;
	$menu['perpax'] = 0;
	$menu['tnc'] = 	array(
		"This menu includes:<ul>
			<li>Food prepared in disposable trays</li>
			<li>Disposable plates & cutlery</li></ul>",
		"Food best consumed within one hour of delivery.",
		"Suggest 7 - 8 items to ensure enough food for your party.",
		"No buffet table set-up or food warmers.",
		"There is a container charge of $" . Cart_model::CONTAINERCHARGE . " for each food item.",
		"Minimum delivery order is $". $menu['minorder'] . ". Delivery charge of $". $menu['deliverycharge'] . " applies.",
		"If chafing set is required, delivery charge of $90 applies.",
		//"For orders below $". $menu['minorder'] . ", an additional $10 delivery surcharge applies.",
		"Menu items subject to availability."
	);
	$menu['agreetnc'] = "I understand that the food will be prepared in disposable trays, with no buffet table set-up.";

	//dishes
	$menudishes = array();
	$surcharge = 1.2;

//	special
	$menudishes['group_special'] = array(
		'type' => 'group',
		'label' => '<img src="' . site_url('assets/images/cny-gold-ingot.png') .  '"/>   Chinese New Year Special   <img src="' . site_url('assets/images/cny-gold-ingot.png') .  '"/>'
	);
	$menudishes['special1'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_SPECIALITY,
		'label' => 'Jai Thai Mango Prosperity Yusheng with King Topshell',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 38.8
	);
	$menudishes['special2'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Thai Prawn Cracker (2500ml container)',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 15
	);


	//appetizer
	$menudishes['group_appetizer'] = array(
		'type' => 'group',
		'label' => 'Appetizer'
	);
	$menudishes['appetizer1'] = array(
		'type' => 'dish',
		'spicykid' => JT_KID,
		'speciality' => JT_SPECIALITY,
		'label' => 'Prawn Cake',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['appetizer2'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_SPECIALITY,
		'label' => 'Fish Cake',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['appetizer3'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Deep Fried Bean Curd',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 16 * $surcharge
	);
	$menudishes['appetizer4'] = array(
		'type' => 'dish',
		'spicykid' => JT_KID,
		'speciality' => JT_NONE,
		'label' => 'Thai Spring Rolls',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 16 * $surcharge
	);
	$menudishes['appetizer5'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Prawn Spring Roll',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['appetizer6'] = array(
		'type' => 'dish',
		'spicykid' => JT_KID,
		'speciality' => JT_SPECIALITY,
		'label' => 'Mixed Appetizers (Fish Cake, Prawn Cake, Spring Roll, Money Bag)',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 30 * $surcharge
	);

	//salad
	$menudishes['group_salad'] = array(
		'type' => 'group',
		'label' => 'Salad'
	);
	$menudishes['salad1'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_SPECIALITY,
		'label' => 'Mango Salad',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['salad2'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Tang Hoon Salad',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['salad3'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Beef Salad',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['salad4'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Seafood Salad',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);

	//fish
	$menudishes['group_fish'] = array(
		'type' => 'group',
		'label' => 'Fish'
	);
	$menudishes['fish1'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_SPECIALITY,
		'label' => 'Deep Fried Fish Fillet with Chilli Sauce',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['fish2'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_SPECIALITY,
		'label' => 'Deep Fried Fish Fillet with Pepper & Garlic',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['fish3'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Deep Fried Fish Fillet with Basil Leaf',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['fish4'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Deep Fried Fish Fillet with Sweet & Sour Sauce',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['fish5'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Deep Fried Fish with Tamarind Sauce',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);

	//squid prawn
	$menudishes['group_squidprawn'] = array(
		'type' => 'group',
		'label' => 'Squid / Prawn'
	);
	$menudishes['squidprawn1'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Squid Pepper & Garlic',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 32 * $surcharge
	);
	$menudishes['squidprawn2'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Squid Chilli Paste',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 32 * $surcharge
	);
	$menudishes['squidprawn3'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Squid Basil Leaf',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 32 * $surcharge
	);
	$menudishes['squidprawn4'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Prawn Chilli Paste',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 32 * $surcharge
	);
	$menudishes['squidprawn5'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Prawn Basil Leaf',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 32 * $surcharge
	);
	$menudishes['squidprawn6'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Prawn Curry Powder',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 32 * $surcharge
	);
	$menudishes['squidprawn7'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Prawn Pepper & Garlic',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 32 * $surcharge
	);
	$menudishes['squidprawn8'] = array(
		'type' => 'dish',
		'spicykid' => JT_KID,
		'speciality' => JT_SPECIALITY,
		'label' => 'Prawn Tamarind Sauce',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 32 * $surcharge
	);

	//meat
	$menudishes['group_meat'] = array(
		'type' => 'group',
		'label' => 'Meat'
	);
	$menudishes['meat1'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Stir Fried Beef with Pepper & Garlic',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['meat2'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Stir Fried Beef with Basil Leaf',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['meat3'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Stir Fried Beef with Chilli Paste',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['meat4'] = array(
		'type' => 'dish',
		'spicykid' => JT_KID,
		'speciality' => JT_SPECIALITY,
		'label' => 'Deep Fried Pandan Chicken',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['meat5'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Chicken with Cashew Nut',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['meat6'] = array(
		'type' => 'dish',
		'spicykid' => JT_KID,
		'speciality' => JT_NONE,
		'label' => 'Lemon Leaf Chicken',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['meat7'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Stir Fried Chicken Pepper & Garlic',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['meat8'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_SPECIALITY,
		'label' => 'Stir Fried Chicken with Basil Leaf',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['meat9'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Stir Fried Chicken Chilli Paste',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);

	//currysoup
	$menudishes['group_currysoup'] = array(
		'type' => 'group',
		'label' => 'Thai Curry / Soup Special'
	);
	$menudishes['currysoup1'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_SPECIALITY,
		'label' => 'Green Curry Chicken',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['currysoup2'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Green Curry Beef',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['currysoup3'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Green Curry Fish',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['currysoup4'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Green Curry Prawn',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 32 * $surcharge
	);
	$menudishes['currysoup5'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Green Curry Vegetarian',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['currysoup6'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Red Curry Chicken',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['currysoup7'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Red Curry Beef',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['currysoup8'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Red Curry Fish',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['currysoup9'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Red Curry Prawn',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 32 * $surcharge
	);
	$menudishes['currysoup10'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Red Curry Vegetarian',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['currysoup11'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Dried Curry Chicken',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['currysoup12'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Dried Curry Beef',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['currysoup13'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Dried Curry Vegetarian',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['currysoup14'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_SPECIALITY,
		'label' => 'Tom Yum Seafood Soup (Clear Soup)',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 30 * $surcharge
	);
	$menudishes['currysoup15'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_SPECIALITY,
		'label' => 'Tom Yum Seafood Soup (with Chilli Paste)',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 30 * $surcharge
	);
	$menudishes['currysoup16'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Tom Yum Chicken Soup (Clear Soup)',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['currysoup17'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Tom Yum Chicken Soup (with Chilli Paste)',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
	$menudishes['currysoup18'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Tom Yum Vegetarian Soup (Clear Soup)',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['currysoup20'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Tom Kha Chicken',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 25 * $surcharge
	);
//	$menudishes['currysoup21'] = array(
//		'type' => 'dish',
//		'spicykid' => JT_NONE,
//		'speciality' => JT_NONE,
//		'label' => 'Red Curry Duck',
//		'usecontainer' => true,
//		'serves' => 10,
//		'price' => 30 * $surcharge
//	);

	//vegetable
	$menudishes['group_vegetable'] = array(
		'type' => 'group',
		'label' => 'Vegetable'
	);
	$menudishes['vegetable6'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Fried Mixed Vegetables',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['vegetable7'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Fried Mixed Vegetables with Chinese Mushroom',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);

	//noodlerice
	$menudishes['group_noodlerice'] = array(
		'type' => 'group',
		'label' => 'Noodle / Rice'
	);
	$menudishes['noodlerice1'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_SPECIALITY,
		'label' => 'Pineapple Rice',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 5,
		'price' => 20 * $surcharge
	);
	$menudishes['noodlerice2'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_SPECIALITY,
		'label' => 'Olive Rice',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 5,
		'price' => 20 * $surcharge
	);
	$menudishes['noodlerice3'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Salted Fish Fried Rice',
		'usecontainer' => true,
		'serves' => 5,
		'price' => 20 * $surcharge
	);
	$menudishes['noodlerice4'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Seafood Fried Rice',
		'usecontainer' => true,
		'serves' => 5,
		'price' => 30 * $surcharge
	);
	$menudishes['noodlerice5'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Fried Rice Basil Leaf',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 5,
		'price' => 20 * $surcharge
	);
	$menudishes['noodlerice6'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Fried Tang Hoon',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 5,
		'price' => 20 * $surcharge
	);
	$menudishes['noodlerice7'] = array(
		'type' => 'dish',
		'spicykid' => JT_SPICY,
		'speciality' => JT_NONE,
		'label' => 'Fried Spicy Noodle',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 5,
		'price' => 20 * $surcharge
	);
	$menudishes['noodlerice8'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Fried Bee Hoon',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 5,
		'price' => 20 * $surcharge
	);
	$menudishes['noodlerice9'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_SPECIALITY,
		'label' => 'Phad Thai',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 5,
		'price' => 25 * $surcharge
	);
	$menudishes['noodlerice10'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Fried Hor Fan (Dry)',
		'usecontainer' => true,
		'vegecontrol' => true,
		'serves' => 5,
		'price' => 20 * $surcharge
	);
	$menudishes['noodlerice11'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Steamed Rice',
		'usecontainer' => true,
		'serves' => 5,
		'price' => 5 * $surcharge
	);

	//dessert
	$menudishes['group_dessert'] = array(
		'type' => 'group',
		'label' => 'Desserts'
	);
	$menudishes['dessert1'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Tapioca with Coconut Milk',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['dessert2'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Assorted Jelly',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 10 * $surcharge
	);
	$menudishes['dessert3'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Tako in Pandan Leaf',
		'usecontainer' => true,
		'serves' => 20,
		'price' => 30 * $surcharge
	);
	$menudishes['dessert4'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Chendol',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['dessert5'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Red Ruby',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['dessert6'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Chendol Ruby Mixed',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 20 * $surcharge
	);
	$menudishes['dessert7'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Mango Sticky Rice',
		'usecontainer' => true,
		'serves' => 10,
		'price' => 30 * $surcharge
	);

	//drinks
	$menudishes['group_drinks'] = array(
		'type' => 'group',
		'label' => 'Drinks'
	);
	$menudishes['drinks1'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Chrysanthemum Tea (Packet)',
		'usecontainer' => false,
		'serves' => 6,
		'price' => 6
	);
	$menudishes['drinks2'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Green Tea (Packet)',
		'usecontainer' => false,
		'serves' => 6,
		'price' => 6
	);
	$menudishes['drinks3'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Ice Lemon Tea (Packet)',
		'usecontainer' => false,
		'serves' => 6,
		'price' => 6
	);
	$menudishes['drinks4'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Lemon Barley (Packet)',
		'usecontainer' => false,
		'serves' => 6,
		'price' => 6
	);
	$menudishes['drinks5'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Lychee (Packet)',
		'usecontainer' => false,
		'serves' => 6,
		'price' => 6
	);
	$menudishes['drinks6'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Sugarcane (Packet)',
		'usecontainer' => false,
		'serves' => 6,
		'price' => 6
	);
	$menudishes['drinks7'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Winter Melon Tea (Packet)',
		'usecontainer' => false,
		'serves' => 6,
		'price' => 6
	);
	$menudishes['drinks8'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => 'Mineral Water',
		'usecontainer' => false,
		'serves' => 6,
		'price' => 6
	);
	$menu['dishes'] = $menudishes;

	return $menu;

}
