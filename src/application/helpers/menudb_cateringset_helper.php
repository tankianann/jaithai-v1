<?php

function menuCATERA() {

	$menu = array();
	$menu['id'] = "CATERA";
	$menu['url'] = "catering-menu-a.php";
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'set-catering-menu-a.pdf';
	$menu['title'] = 'Catering Menu A';
	$menu['description'] = "7 Course @ $14 per person (Min 40 pax)";
	$menu['meta_description'] = "Let us help cater for your next event with Jai Thai Catering Set A, with 7 Course @ just $12 per person (Min 30 pax). Drinks can be added at $1 / pax.";
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
		"label" => "Prawn Cake"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Deep Fried Fish Fillet with Chilli Sauce (Spicy)"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Thai Green Curry",
		"controlname" => "greencurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Green Curry Vegetarian')
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Mixed Vegetables",
		"vegecontrol" => "mixedveg" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai (Fried Thai Small Kway Teow)",
		"vegecontrol" => "phadthai" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Pineapple Rice",
		"vegecontrol" => "pineapplerice" . JT_VEGCTRL
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

function menuCATERB() {

	$menu = array();
	$menu['id'] = "CATERB";
	$menu['url'] = "catering-menu-b.php";
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'set-catering-menu-b.pdf';
	$menu['title'] = 'Catering Menu B';
	$menu['description'] = "9 Course @ $17 per person (Min 30 pax)";
	$menu['meta_description'] = "Get a 9 course Thai Buffet Catering for your event in Singapore at just $15 per person (Min 30 pax). Drinks can be added at $1 / pax.";
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
		"label" => "Prawn Cake"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Fish",
		"controlname" => "fishchoice",
		"choices" => array(
			array('label' => 'Deep Fried Fish Fillet with Chilli Sauce (Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Basil Leaf (Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic (Non-Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Tamarind Sauce (Non-Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Sweet & Sour Sauce (Non-Spicy)'),
            array ('label' => 'Steamed Fish with Thai Chili Lemon'),
            array ('label' => 'Steamed Fish (Seabass Fillet) with Thai Chili Lemon (+ $2.00 Per Pax)'),
            array ('label' => 'Steamed Fish (Salmon Fillet) with Thai Chili Lemon (+ $3.50 Per Pax)'),
            array ('label' => 'Steamed Fish with Soy Sauce'),
            array ('label' => 'Steamed Fish (Seabass Fillet) with Soy Sauce (+ $2.00 Per Pax)'),
            array ('label' => 'Steamed Fish (Salmon Fillet) with Soy Sauce (+ $3.50 Per Pax)'),
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Prawn with Chilli Paste (Deshelled)"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Thai Green Curry",
		"controlname" => "greencurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Green Curry Vegetarian')
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Pandan Chicken"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Mixed Vegetables",
		"vegecontrol" => "mixedveg" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai (Fried Thai Small Kway Teow)",
		"vegecontrol" => "phadthai" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice for Rice",
		"controlname" => "ricechoice",
		"choices" => array(
			array('label' => 'Olive Rice',          'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Pineapple Rice',      'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
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

function menuCATERC() {

	$menu = array();
	$menu['id'] = "CATERC";
	$menu['url'] = "catering-menu-c.php";
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'set-catering-menu-c.pdf';
	$menu['title'] = 'Catering Menu C';
	$menu['description'] = "10 Course @ $20 per person (Min 30 pax)";
	$menu['meta_description'] = "Catering for your corporate event? Get a 10 course delectable thai buffet at just $18 per person from Jai Thai Catering. Drinks can be added at $1 / pax.";
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
		"label" => "Prawn Cake"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Mango Salad",
		"vegecontrol" => "mangosalad" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Tom Yum Seafood Soup",
		"controlname" => "tomyumchoice",
		"choices" => array(
			array('label' => 'Tom Yum Clear Soup (Aromatic with Herbal and Spices Taste)'),
			array('label' => 'Tom Yum With Chilli Paste (Slightly Thicker Soup with Red Chilli Paste)'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Fish",
		"controlname" => "fishchoice",
		"choices" => array(
			array('label' => 'Deep Fried Fish Fillet with Chilli Sauce (Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Basil Leaf (Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic (Non-Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Tamarind Sauce (Non-Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Sweet & Sour Sauce (Non-Spicy)'),
            array ('label' => 'Steamed Fish with Thai Chili Lemon'),
            array ('label' => 'Steamed Fish (Seabass Fillet) with Thai Chili Lemon (+ $2.00 Per Pax)'),
            array ('label' => 'Steamed Fish (Salmon Fillet) with Thai Chili Lemon (+ $3.50 Per Pax)'),
            array ('label' => 'Steamed Fish with Soy Sauce'),
            array ('label' => 'Steamed Fish (Seabass Fillet) with Soy Sauce (+ $2.00 Per Pax)'),
            array ('label' => 'Steamed Fish (Salmon Fillet) with Soy Sauce (+ $3.50 Per Pax)'),
        )
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Thai Green Curry",
		"controlname" => "greencurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Green Curry Vegetarian')
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Chicken with Cashew Nut"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Mixed Vegetables",
		"vegecontrol" => "mixedveg" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai (Fried Thai Small Kway Teow)",
		"vegecontrol" => "phadthai" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice for Rice",
		"controlname" => "ricechoice",
		"choices" => array(
			array('label' => 'Olive Rice',          'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Pineapple Rice',      'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
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

function menuCATERD() {

	$menu = array();
	$menu['id'] = "CATERD";
	$menu['url'] = "catering-menu-d.php";
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'set-catering-menu-d.pdf';
	$menu['title'] = 'Catering Menu D';
	$menu['description'] = "11 Course @ $24 per person (Min 30 pax)";
	$menu['meta_description'] = "Get your company event or party catering at with our 11 course set buffet at just $22 per pax from Jai Thai Catering. Drinks can be added at $1 / pax.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 11;
	$menu['perpax'] = 24;
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
		"label" => "Mixed Appetizers (Thai Fish Cake, Prawn Cake, Spring Rolls, DF. Bean Curd)"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Prawn with Tamarind Sauce (Deshelled)"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Fish",
		"controlname" => "fishchoice",
		"choices" => array(
			array('label' => 'Deep Fried Fish Fillet with Chilli Sauce (Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Basil Leaf (Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic (Non-Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Tamarind Sauce (Non-Spicy)'),
			array('label' => 'Deep Fried Fish Fillet with Sweet & Sour Sauce (Non-Spicy)'),
            array ('label' => 'Steamed Fish with Thai Chili Lemon'),
            array ('label' => 'Steamed Fish (Seabass Fillet) with Thai Chili Lemon (+ $2.00 Per Pax)'),
            array ('label' => 'Steamed Fish (Salmon Fillet) with Thai Chili Lemon (+ $3.50 Per Pax)'),
            array ('label' => 'Steamed Fish with Soy Sauce'),
            array ('label' => 'Steamed Fish (Seabass Fillet) with Soy Sauce (+ $2.00 Per Pax)'),
            array ('label' => 'Steamed Fish (Salmon Fillet) with Soy Sauce (+ $3.50 Per Pax)'),
        )
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Tom Yum Seafood Soup",
		"controlname" => "tomyumchoice",
		"choices" => array(
			array('label' => 'Tom Yum Clear Soup (Aromatic with Herbal and Spices Taste)'),
			array('label' => 'Tom Yum With Chilli Paste (Slightly Thicker Soup with Red Chilli Paste)')
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Squid with Chilli Paste"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice of Thai Green Curry",
		"controlname" => "greencurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Green Curry Vegetarian')
		)
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Lemon Leaf Chicken"
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Fried Broccoli with Chinese Mushroom",
		"vegecontrol" => "broccolichimush" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "fixed",
		"label" => "Phad Thai (Fried Thai Small Kway Teow)",
		"vegecontrol" => "phadthai" . JT_VEGCTRL
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Choice for Rice",
		"controlname" => "ricechoice",
		"choices" => array(
			array('label' => 'Olive Rice',          'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Pineapple Rice',      'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
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