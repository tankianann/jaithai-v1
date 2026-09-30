<?php

function menuVEGEA() {

	$menu = array();
	$menu['id'] = "VEGEA";
	$menu['url'] = 'vegetarian-menu-a.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'vegetarian-menu-a.pdf';
	$menu['title'] = 'Vegan Menu A';
	$menu['description'] = "7 Course @ $14 per person (Min 40 pax)";
	$menu['meta_description'] = "Get a 7 course delicious thai vegan buffet catered for your event at just $12 per person (Min 30 pax). Drinks can be added at $1 / pax.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 40;
	$menu['numdishes'] = 7;
	$menu['perpax'] = 14;
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
		"label" => "Corn Fritter"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Deep Fried Bean Curd",
		"controlname" => "beancurdchoice",
		"choices" => array(
			array('label' => 'Deep Fried Bean Curd with Chilli Sauce (Spicy)'),
			array('label' => 'Deep Fried Bean Curd with Basil Leaf'),
			array('label' => 'Deep Fried Bean Curd with Cashew Nut'),
			array('label' => 'Deep Fried Bean Curd with Pepper & Garlic')
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Thai Green Curry Vegan"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Mixed	Vegetable"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai (Fried Thai Small Kway Teow)"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Pineapple Rice"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Dessert",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Coconut Jelly'),
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuVEGEB() {

	$menu = array();
	$menu['id'] = "VEGEB";
	$menu['url'] = 'vegetarian-menu-b.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'vegetarian-menu-b.pdf';
	$menu['title'] = 'Vegan Menu B';
	$menu['description'] = "9 Course @ $17 per person (Min 30 pax)";
	$menu['meta_description'] = "Looking for vegan catering? Check out our 9 course thai vegan set buffet - just $15 per person (Min 30 pax). Drinks can be added at $1 / pax.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 9;
	$menu['perpax'] = 17;
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
		"label" => "Corn Fritter"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Deep Fried Bean Curd",
		"controlname" => "beancurdchoice",
		"choices" => array(
			array('label' => 'Deep Fried Bean Curd with Chilli Sauce (Spicy)'),
			array('label' => 'Deep Fried Bean Curd with Basil Leaf'),
			array('label' => 'Deep Fried Bean Curd with Cashew Nut'),
			array('label' => 'Deep Fried Bean Curd with Pepper & Garlic')
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Sweet & Sour Bean Curd"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Thai Green Curry Vegan"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Mango Salad"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Mixed	Vegetable"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai (Fried Thai Small Kway Teow)"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice for Rice",
		"controlname" => "ricechoice",
		"choices" => array(
			array('label' => 'Olive Rice'),
			array('label' => 'Pineapple Rice'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Dessert",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Coconut Jelly'),
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuVEGEC() {

	$menu = array();
	$menu['id'] = "VEGEC";
	$menu['url'] = 'vegetarian-menu-c.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'vegetarian-menu-c.pdf';
	$menu['title'] = 'Vegan Menu C';
	$menu['description'] = "10 Course @ $20 per person (Min 30 pax)";
	$menu['meta_description'] = "Need vegan catering for your event? Come check out our 10 course authentic thai vegan set buffet @ just $18 per pax. Drinks can be added at $1/pax.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 10;
	$menu['perpax'] = 20;
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
		"label" => "Mixed Platter (Corn, Papaya and Carrot Fritter)"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Thai Spring Rolls"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Tom Yum Soup"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Deep Fried Bean Curd",
		"controlname" => "beancurdchoice",
		"choices" => array(
			array('label' => 'Deep Fried Bean Curd with Chilli Sauce (Spicy)'),
			array('label' => 'Deep Fried Bean Curd with Basil Leaf'),
			array('label' => 'Deep Fried Bean Curd with Cashew Nut'),
			array('label' => 'Deep Fried Bean Curd with Pepper & Garlic')
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Thai Green Curry Vegan"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Mango Salad"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Mixed	Vegetable"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai (Fried Thai Small Kway Teow)"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice for Rice",
		"controlname" => "ricechoice",
		"choices" => array(
			array('label' => 'Olive Rice'),
			array('label' => 'Pineapple Rice'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Dessert",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Coconut Jelly'),
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}