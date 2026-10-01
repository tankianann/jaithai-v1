<?php

function menuCATERA() {

	$menu = array();
	$menu['id'] = "CATERA";
	$menu['url'] = "catering-menu-a.php";
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'set-catering-menu-a.pdf';
	$menu['title'] = 'Catering Menu A';
	$menu['description'] = "8 Course @ $15 per person (Min 40 pax)";
	$menu['meta_description'] = "Jai Thai Catering Menu A offers an 8 course Thai buffet at $15 per person for a minimum of 40 pax. Drinks can be added at $1 per pax.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 40;
	$menu['numdishes'] = 8;
	$menu['perpax'] = 15;
	$menu['tnc'] = array(
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

	$menudishes = array();
	$menudishes[] = array("type" => "fixed", "label" => "Money Bag");
	$menudishes[] = array("type" => "fixed", "label" => "Vegetable Spring Rolls");
	$menudishes[] = array("type" => "fixed", "label" => "Deep Fried Fish with Chili Sauce");
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Thai Green Curry",
		"controlname" => "greencurrychoice",
		"choices" => array(
			array('label' => 'Thai Green Curry Chicken'),
			array('label' => 'Thai Green Curry Vegan')
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Mixed Vegetable",
		"vegecontrol" => "mixedveg" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai",
		"vegecontrol" => "phadthai" . JT_VEGCTRL
	);
	$menudishes[] = array("type" => "fixed", "label" => "Steamed Rice");
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Dessert",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Thai Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Thai Coconut Jelly'),
			array('label' => 'Taro Bauloy in Coconut Milk'),
			array('label' => 'Tako'),
			array('label' => 'Mango Sticky Rice (+ $1.00 Per Pax)')
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuCATERB() {

	$menu = array();
	$menu['id'] = "CATERB";
	$menu['url'] = "catering-menu-b.php";
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'set-catering-menu-b.pdf';
	$menu['title'] = 'Catering Menu B';
	$menu['description'] = "9 Course @ $18 per person (Min 30 pax)";
	$menu['meta_description'] = "Jai Thai Catering Menu B offers a 9 course Thai buffet at $18 per person for a minimum of 30 pax. Drinks can be added at $1 per pax.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 9;
	$menu['perpax'] = 18;
	$menu['tnc'] = array(
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

	$menudishes = array();
	$menudishes[] = array("type" => "fixed", "label" => "Vegetable Spring Roll");
	$menudishes[] = array("type" => "fixed", "label" => "Prawn Cake");
	$menudishes[] = array("type" => "fixed", "label" => "Deep Fried Fish with Pepper & Garlic");
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Thai Green Curry",
		"controlname" => "greencurrychoice",
		"choices" => array(
			array('label' => 'Thai Green Curry Chicken'),
			array('label' => 'Thai Green Curry Vegan')
		)
	);
	$menudishes[] = array("type" => "fixed", "label" => "Fried Chicken with Basil Leaf");
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Mixed Vegetable",
		"vegecontrol" => "mixedveg" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai",
		"vegecontrol" => "phadthai" . JT_VEGCTRL
	);
	$menudishes[] = array("type" => "fixed", "label" => "Steamed Rice");
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Dessert",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Thai Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Thai Coconut Jelly'),
			array('label' => 'Taro Bauloy in Coconut Milk'),
			array('label' => 'Tako'),
			array('label' => 'Mango Sticky Rice (+ $1.00 Per Pax)')
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuCATERC() {

	$menu = array();
	$menu['id'] = "CATERC";
	$menu['url'] = "catering-menu-c.php";
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'set-catering-menu-c.pdf';
	$menu['title'] = 'Catering Menu C';
	$menu['description'] = "10 Course @ $21 per person (Min 30 pax)";
	$menu['meta_description'] = "Jai Thai Catering Menu C offers a 10 course Thai buffet at $21 per person for a minimum of 30 pax. Drinks can be added at $1 per pax.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 10;
	$menu['perpax'] = 21;
	$menu['tnc'] = array(
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

	$menudishes = array();
	$menudishes[] = array("type" => "fixed", "label" => "Prawn Cake");
	$menudishes[] = array("type" => "fixed", "label" => "Mango Salad");
	$menudishes[] = array("type" => "fixed", "label" => "Deep Fried Fish with Pepper & Garlic");
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Green Curry or Tom Yum Seafood Soup",
		"controlname" => "currysoupchoice",
		"choices" => array(
			array('label' => 'Thai Green Curry Chicken'),
			array('label' => 'Thai Green Curry Vegan'),
			array('label' => 'Tom Yum Seafood Clear Soup (Aromatic with Herbal and Spices Taste)'),
			array('label' => 'Tom Yum Seafood Chilli Paste (Slightly Thicker Soup with Red Chilli Paste)')
		)
	);
	$menudishes[] = array("type" => "fixed", "label" => "Deep Fried Pandan Chicken");
	$menudishes[] = array("type" => "fixed", "label" => "Fried Prawn with Chilli Paste");
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Mixed Vegetable",
		"vegecontrol" => "mixedveg" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai",
		"vegecontrol" => "phadthai" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Rice",
		"controlname" => "ricechoice",
		"choices" => array(
			array('label' => 'Pineapple Rice', 'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice', 'vegecontrol' => 'oliverice' . JT_VEGCTRL)
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Dessert",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Thai Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Thai Coconut Jelly'),
			array('label' => 'Taro Bauloy in Coconut Milk'),
			array('label' => 'Tako'),
			array('label' => 'Mango Sticky Rice (+ $1.00 Per Pax)')
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuCATERD() {

	$menu = array();
	$menu['id'] = "CATERD";
	$menu['url'] = "catering-menu-d.php";
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'set-catering-menu-d.pdf';
	$menu['title'] = 'Catering Menu D';
	$menu['description'] = "11 Course @ $24 per person (Min 30 pax)";
	$menu['meta_description'] = "Jai Thai Catering Menu D offers an 11 course Thai buffet at $24 per person for a minimum of 30 pax. Drinks can be added at $1 per pax.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 11;
	$menu['perpax'] = 24;
	$menu['tnc'] = array(
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

	$menudishes = array();
	$menudishes[] = array("type" => "fixed", "label" => "Prawn Cake");
	$menudishes[] = array("type" => "fixed", "label" => "Mango Salad");
	$menudishes[] = array("type" => "fixed", "label" => "Deep Fried Fish with Pepper & Garlic");
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Tom Yum Seafood Soup",
		"controlname" => "tomyumchoice",
		"choices" => array(
			array('label' => 'Tom Yum Seafood Clear Soup (Aromatic with Herbal and Spices Taste)'),
			array('label' => 'Tom Yum Seafood Chilli Paste (Slightly Thicker Soup with Red Chilli Paste)')
		)
	);
	$menudishes[] = array("type" => "fixed", "label" => "Lemon Leaf Chicken");
	$menudishes[] = array("type" => "fixed", "label" => "Fried Prawn with Basil Leaf");
	$menudishes[] = array("type" => "fixed", "label" => "Fried Squid with Pepper & Garlic");
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Broccoli with Chinese Mushroom",
		"vegecontrol" => "broccolichimush" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai",
		"vegecontrol" => "phadthai" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Rice",
		"controlname" => "ricechoice",
		"choices" => array(
			array('label' => 'Pineapple Rice', 'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice', 'vegecontrol' => 'oliverice' . JT_VEGCTRL)
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Dessert",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Thai Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Thai Coconut Jelly'),
			array('label' => 'Taro Bauloy in Coconut Milk'),
			array('label' => 'Tako'),
			array('label' => 'Mango Sticky Rice (+ $1.00 Per Pax)')
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}
