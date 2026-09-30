<?php

function menuDIYA() {

	$menu = array();
	$menu['id'] = "DIYA";
	$menu['url'] = "catering-diy-a.php";
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'catering-diy-a.php';
	$menu['title'] = 'Catering DIY Menu A';
	$menu['description'] = "7 Course + Drink @ $15.90 per person (Min 40 pax)";
	$menu['meta_description'] = "Get a 7 course DIY delicious thai buffet catered to your home or corporate event at just S$13.90 per pax (min 30 pax), inclusive of drinks!";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 40;
	$menu['numdishes'] = 7;
	$menu['perpax'] = 15.90;
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
		"label" => "Appetizer - Please Choose 1",
		"controlname" => "appetizerchoice",
		"choices" => array(
			array('label' => 'Prawn Cake'),
			array('label' => 'Fish Cake'),
			array('label' => 'Deep Fried Bean Curd'),
			array('label' => 'Thai Spring Rolls')
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Fish - Please Choose 1",
		"controlname" => "fishchoice",
		"choices" => array(
			array('label' => 'Deep Fried Fish Fillet with Chilli Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic'),
			array('label' => 'Deep Fried Fish Fillet with Basil Leaf'),
			array('label' => 'Deep Fried Fish Fillet with Tamarind Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Sweet & Sour Sauce'),
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
		"label" => "Thai Curry Special - Please Choose 1",
		"controlname" => "thaicurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Green Curry Vegetarian'),
			array('label' => 'Red Curry Chicken'),
			array('label' => 'Red Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Red Curry Vegetarian'),
			array('label' => 'Dried Curry Chicken'),
			array('label' => 'Dried Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Dried Curry Vegetarian')
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Vegetable - Please Choose 1",
		"controlname" => "vegetablechoice",
		"choices" => array(
			array('label' => 'Fried Kai Lan Oyster Sauce',                  'vegecontrol' => 'kailanoystersauce' . JT_VEGCTRL),
			array('label' => 'Fried Kai Lan with Salted Fish'),
			array('label' => 'Fried Kai Lan with Chinese Mushroom',         'vegecontrol' => 'kailanchimush' . JT_VEGCTRL),
			array('label' => 'Fried Bean Sprout',                           'vegecontrol' => 'beansprout' . JT_VEGCTRL),
			array('label' => 'Fried Bean Sprout with Salted Fish'),
			array('label' => 'Fried Mixed Vegetables',                       'vegecontrol' => 'mixedveg' . JT_VEGCTRL),
			array('label' => 'Fried Mixed Vegetables with Chinese Mushroom', 'vegecontrol' => 'mixedvegchimush' . JT_VEGCTRL),
			array('label' => 'Fried Cabbage Oyster Sauce',                  'vegecontrol' => 'cabbageoystersauce' . JT_VEGCTRL),
			array('label' => 'Fried Cabbage with Chinese Mushroom',         'vegecontrol' => 'cabbagechimush' . JT_VEGCTRL)
		)
	);
	$menudishes[] = array(
		"type" => "group",
		"nextnum" => "5"
	);
	$menudishes[] = array(
		"type" => "pick2",
		"label" => "Noodle / Rice - Please Choose 2",
		"controlname" => "noodlericechoice",
		"choices" => array(
			array('label' => 'Pineapple Rice',               'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice',                   'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Salted Fish Fried Rice'),
			array('label' => 'Seafood Fried Rice'),
			array('label' => 'Fried Rice Basil Leaf',        'vegecontrol' => 'ricebasil' . JT_VEGCTRL),
			array('label' => 'Fried Tang Hoon',              'vegecontrol' => 'tanghoon' . JT_VEGCTRL),
			array('label' => 'Fried Spicy Noodle',           'vegecontrol' => 'spicynoodle' . JT_VEGCTRL),
			array('label' => 'Fried Bee Hoon',               'vegecontrol' => 'beehoon' . JT_VEGCTRL),
			array('label' => 'Phad Thai',                    'vegecontrol' => 'phadthai' . JT_VEGCTRL),
			array('label' => 'Fried Hor Fan (Dry)',          'vegecontrol' => 'horfan' . JT_VEGCTRL),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Dessert - Please Choose 1",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Coconut Jelly'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Drink - Please Choose 1",
		"controlname" => "drinkchoice",
		"choices" => array(
			array('label' => 'Iced Lemon Tea'),
			array('label' => 'Lime Juice'),
			array('label' => 'Lemongrass Drink (+ $1.00 Per Pax)'),
			array('label' => 'Thai Iced Tea with Lemon (+ $1.00 Per Pax)'),
			array('label' => 'Thai Iced Tea with Milk (+ $1.00 Per Pax)'),
		)
	);

	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuDIYB() {

	$menu = array();
	$menu['id'] = "DIYB";
	$menu['url'] = 'catering-diy-b.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'diy-catering-menu-b.pdf';
	$menu['title'] = 'Catering DIY Menu B';
	$menu['description'] = "9 Course + Drink @ $18.90 per person (Min 30 pax)";
	$menu['meta_description'] = "Select your own dishes with our 9 course + drink authentic thai cuisine buffet catering @ $16.90 per person. Perfect for your home party or baby shower!";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 9;
	$menu['perpax'] = 18.90;
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
		"label" => "Appetizer - Please Choose 1",
		"controlname" => "appetizerchoice",
		"choices" => array(
			array('label' => 'Prawn Cake'),
			array('label' => 'Fish Cake'),
			array('label' => 'Deep Fried Bean Curd'),
			array('label' => 'Thai Spring Rolls')
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Fish - Please Choose 1",
		"controlname" => "fishchoice",
		"choices" => array(
			array('label' => 'Deep Fried Fish Fillet with Chilli Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic'),
			array('label' => 'Deep Fried Fish Fillet with Basil Leaf'),
			array('label' => 'Deep Fried Fish Fillet with Tamarind Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Sweet & Sour Sauce'),
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
		"label" => "Squid /  Prawn - Please Choose 1",
		"controlname" => "squidprawnchoice",
		"choices" => array(
			array('label' => 'Squid Pepper & Garlic'),
			array('label' => 'Squid Chilli Paste'),
			array('label' => 'Squid Basil Leaf'),
			array('label' => 'Prawn Chilli Paste (Deshelled)'),
			array('label' => 'Prawn Basil Leaf (Deshelled)'),
			array('label' => 'Prawn Curry Powder (Deshelled)'),
			array('label' => 'Prawn Pepper & Garlic (Deshelled)'),
			array('label' => 'Prawn Tamarind Sauce (Deshelled)')
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Meat - Please Choose 1",
		"controlname" => "meatchoice",
		"choices" => array(
			array('label' => 'Stir Fried Beef with Pepper & Garlic (+ $1.00 Per Pax)'),
			array('label' => 'Stir Fried Beef with Basil Leaf (+ $1.00 Per Pax)'),
			array('label' => 'Stir Fried Beef with Chilli Paste (+ $1.00 Per Pax)'),
			array('label' => 'Deep Fried Pandan Chicken'),
			array('label' => 'Chicken with Cashew Nut'),
			array('label' => 'Lemon Leaf Chicken'),
			array('label' => 'Stir Fried Chicken Pepper & Garlic'),
			array('label' => 'Stir Fried Chicken with Basil Leaf'),
			array('label' => 'Stir Fried Chicken Chilli Paste')
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Thai Curry Special - Please Choose 1",
		"controlname" => "thaicurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Green Curry Vegetarian'),
			array('label' => 'Red Curry Chicken'),
			array('label' => 'Red Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Red Curry Vegetarian'),
			array('label' => 'Dried Curry Chicken'),
			array('label' => 'Dried Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Dried Curry Vegetarian')
		)
	);
	$menudishes[] = array(
		"type" => "group",
		"nextnum" => "6"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Vegetable - Please Choose 1",
		"controlname" => "vegetablechoice",
		"choices" => array(
			array('label' => 'Fried Kai Lan Oyster Sauce',                  'vegecontrol' => 'kailanoystersauce' . JT_VEGCTRL),
			array('label' => 'Fried Kai Lan with Salted Fish'),
			array('label' => 'Fried Kai Lan with Chinese Mushroom',         'vegecontrol' => 'kailanchimush' . JT_VEGCTRL),
			array('label' => 'Fried Bean Sprout',                           'vegecontrol' => 'beansprout' . JT_VEGCTRL),
			array('label' => 'Fried Bean Sprout with Salted Fish'),
			array('label' => 'Fried Mixed Vegetables',                       'vegecontrol' => 'mixedveg' . JT_VEGCTRL),
			array('label' => 'Fried Mixed Vegetables with Chinese Mushroom', 'vegecontrol' => 'mixedvegchimush' . JT_VEGCTRL),
			array('label' => 'Fried Cabbage Oyster Sauce',                  'vegecontrol' => 'cabbageoystersauce' . JT_VEGCTRL),
			array('label' => 'Fried Cabbage with Chinese Mushroom',         'vegecontrol' => 'cabbagechimush' . JT_VEGCTRL)
		)
	);
	$menudishes[] = array(
		"type" => "pick2",
		"label" => "Noodle / Rice - Please Choose 2",
		"controlname" => "noodlericechoice",
		"choices" => array(
			array('label' => 'Pineapple Rice',               'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice',                   'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Salted Fish Fried Rice'),
			array('label' => 'Seafood Fried Rice'),
			array('label' => 'Fried Rice Basil Leaf',        'vegecontrol' => 'ricebasil' . JT_VEGCTRL),
			array('label' => 'Fried Tang Hoon',              'vegecontrol' => 'tanghoon' . JT_VEGCTRL),
			array('label' => 'Fried Spicy Noodle',           'vegecontrol' => 'spicynoodle' . JT_VEGCTRL),
			array('label' => 'Fried Bee Hoon',               'vegecontrol' => 'beehoon' . JT_VEGCTRL),
			array('label' => 'Phad Thai',                    'vegecontrol' => 'phadthai' . JT_VEGCTRL),
			array('label' => 'Fried Hor Fan (Dry)',          'vegecontrol' => 'horfan' . JT_VEGCTRL),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Dessert - Please Choose 1",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Coconut Jelly'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Drink - Please Choose 1",
		"controlname" => "drinkchoice",
		"choices" => array(
			array('label' => 'Iced Lemon Tea'),
			array('label' => 'Lime Juice'),
			array('label' => 'Lemongrass Drink (+ $1.00 Per Pax)'),
			array('label' => 'Thai Iced Tea with Lemon (+ $1.00 Per Pax)'),
			array('label' => 'Thai Iced Tea with Milk (+ $1.00 Per Pax)'),
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuDIYC() {

	$menu = array();
	$menu['id'] = "DIYC";
	$menu['url'] = 'catering-diy-c.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'diy-catering-menu-c.pdf';
	$menu['title'] = 'Catering DIY Menu C';
	$menu['description'] = "10 Course + Drink @ $21.90 per person (Min 30 pax)";
	$menu['meta_description'] = "Cater a 10 course sumptuous buffet for your corporate event at $19.90 per person (min 30 pax). With our DIY sets, you can pick from a variety of dishes.";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 10;
	$menu['perpax'] = 21.90;
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
		"label" => "Appetizer - Please Choose 1",
		"controlname" => "appetizerchoice",
		"choices" => array(
			array('label' => 'Prawn Cake'),
			array('label' => 'Fish Cake'),
			array('label' => 'Deep Fried Bean Curd'),
			array('label' => 'Thai Spring Rolls')
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Fish - Please Choose 1",
		"controlname" => "fishchoice",
		"choices" => array(
			array('label' => 'Deep Fried Fish Fillet with Chilli Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic'),
			array('label' => 'Deep Fried Fish Fillet with Basil Leaf'),
			array('label' => 'Deep Fried Fish Fillet with Tamarind Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Sweet & Sour Sauce'),
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
		"label" => "Squid /  Prawn - Please Choose 1",
		"controlname" => "squidprawnchoice",
		"choices" => array(
			array('label' => 'Squid Pepper & Garlic'),
			array('label' => 'Squid Chilli Paste'),
			array('label' => 'Squid Basil Leaf'),
			array('label' => 'Prawn Chilli Paste (Deshelled)'),
			array('label' => 'Prawn Basil Leaf (Deshelled)'),
			array('label' => 'Prawn Curry Powder (Deshelled)'),
			array('label' => 'Prawn Pepper & Garlic (Deshelled)'),
			array('label' => 'Prawn Tamarind Sauce (Deshelled)')
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Meat - Please Choose 1",
		"controlname" => "meatchoice",
		"choices" => array(
			array('label' => 'Stir Fried Beef with Pepper & Garlic (+ $1.00 Per Pax)'),
			array('label' => 'Stir Fried Beef with Basil Leaf (+ $1.00 Per Pax)'),
			array('label' => 'Stir Fried Beef with Chilli Paste (+ $1.00 Per Pax)'),
			array('label' => 'Deep Fried Pandan Chicken'),
			array('label' => 'Chicken with Cashew Nut'),
			array('label' => 'Lemon Leaf Chicken'),
			array('label' => 'Stir Fried Chicken Pepper & Garlic'),
			array('label' => 'Stir Fried Chicken with Basil Leaf'),
			array('label' => 'Stir Fried Chicken Chilli Paste')
		)
	);
	$menudishes[] = array(
		"type" => "pick2",
		"label" => "Thai Curry / Soup Special - Please Choose 2",
		"controlname" => "thaicurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Green Curry Vegetarian'),
			array('label' => 'Red Curry Chicken'),
			array('label' => 'Red Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Red Curry Vegetarian'),
			array('label' => 'Dried Curry Chicken'),
			array('label' => 'Dried Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Dried Curry Vegetarian'),
			array('label' => 'Tom Yum Seafood Soup (Clear Soup)'),
			array('label' => 'Tom Yum Seafood Soup (with Chilli Paste)'),
			array('label' => 'Tom Yum Chicken Soup (Clear Soup)'),
			array('label' => 'Tom Yum Chicken Soup (with Chilli Paste)'),
			array('label' => 'Tom Yum Vegetarian Soup (Clear Soup)'),
			array('label' => 'Tom Yum Vegetarian Soup (with Chilli Paste)'),
			array('label' => 'Blue Ginger Soup with Chicken'),
			array('label' => 'Om Khai (Jungle Chicken Soup)')
		)
	);
	$menudishes[] = array(
		"type" => "group",
		"nextnum" => "6"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Vegetable - Please Choose 1",
		"controlname" => "vegetablechoice",
		"choices" => array(
			array('label' => 'Fried Kai Lan Oyster Sauce',                  'vegecontrol' => 'kailanoystersauce' . JT_VEGCTRL),
			array('label' => 'Fried Kai Lan with Salted Fish'),
			array('label' => 'Fried Kai Lan with Chinese Mushroom',         'vegecontrol' => 'kailanchimush' . JT_VEGCTRL),
			array('label' => 'Fried Bean Sprout',                           'vegecontrol' => 'beansprout' . JT_VEGCTRL),
			array('label' => 'Fried Bean Sprout with Salted Fish'),
			array('label' => 'Fried Mixed Vegetables',                       'vegecontrol' => 'mixedveg' . JT_VEGCTRL),
			array('label' => 'Fried Mixed Vegetables with Chinese Mushroom', 'vegecontrol' => 'mixedvegchimush' . JT_VEGCTRL),
			array('label' => 'Fried Cabbage Oyster Sauce',                  'vegecontrol' => 'cabbageoystersauce' . JT_VEGCTRL),
			array('label' => 'Fried Cabbage with Chinese Mushroom',         'vegecontrol' => 'cabbagechimush' . JT_VEGCTRL)
		)
	);
	$menudishes[] = array(
		"type" => "pick2",
		"label" => "Noodle / Rice - Please Choose 2",
		"controlname" => "noodlericechoice",
		"choices" => array(
			array('label' => 'Pineapple Rice',               'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice',                   'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Salted Fish Fried Rice'),
			array('label' => 'Seafood Fried Rice'),
			array('label' => 'Fried Rice Basil Leaf',        'vegecontrol' => 'ricebasil' . JT_VEGCTRL),
			array('label' => 'Fried Tang Hoon',              'vegecontrol' => 'tanghoon' . JT_VEGCTRL),
			array('label' => 'Fried Spicy Noodle',           'vegecontrol' => 'spicynoodle' . JT_VEGCTRL),
			array('label' => 'Fried Bee Hoon',               'vegecontrol' => 'beehoon' . JT_VEGCTRL),
			array('label' => 'Phad Thai',                    'vegecontrol' => 'phadthai' . JT_VEGCTRL),
			array('label' => 'Fried Hor Fan (Dry)',          'vegecontrol' => 'horfan' . JT_VEGCTRL),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Dessert - Please Choose 1",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Coconut Jelly'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Drink - Please Choose 1",
		"controlname" => "drinkchoice",
		"choices" => array(
			array('label' => 'Iced Lemon Tea'),
			array('label' => 'Lime Juice'),
			array('label' => 'Lemongrass Drink (+ $1.00 Per Pax)'),
			array('label' => 'Thai Iced Tea with Lemon (+ $1.00 Per Pax)'),
			array('label' => 'Thai Iced Tea with Milk (+ $1.00 Per Pax)'),
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuDIYD() {

	$menu = array();
	$menu['id'] = "DIYD";
	$menu['url'] = 'catering-diy-d.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'diy-catering-menu-d.pdf';
	$menu['title'] = 'Catering DIY Menu D';
	$menu['description'] = "11 Course + Drink @ $25.90 per person (Min 30 pax)";
	$menu['meta_description'] = "Looking for catering for your corporate event or party? Get Jai Thai's 11 Course + Drink authentic thai buffet catering @ $23.90 per person (Min 30 pax).";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 11;
	$menu['perpax'] = 25.90;
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
		"label" => "Appetizer - Please Choose 1",
		"controlname" => "appetizerchoice",
		"choices" => array(
			array('label' => 'Prawn Cake'),
			array('label' => 'Fish Cake'),
			array('label' => 'Deep Fried Bean Curd'),
			array('label' => 'Thai Spring Rolls')
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Salad - Please Choose 1",
		"controlname" => "saladchoice",
		"choices" => array(
			array('label' => 'Mango Salad',         'vegecontrol' => 'mangosalad' . JT_VEGCTRL),
			array('label' => 'Tang Hoon Salad',     'vegecontrol' => 'tanghoonsalad' . JT_VEGCTRL),
			array('label' => 'Beef Salad (+ $1.00 Per Pax)'),
			array('label' => 'Seafood Salad')
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Fish - Please Choose 1",
		"controlname" => "fishchoice",
		"choices" => array(
			array('label' => 'Deep Fried Fish Fillet with Chilli Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic'),
			array('label' => 'Deep Fried Fish Fillet with Basil Leaf'),
			array('label' => 'Deep Fried Fish Fillet with Tamarind Sauce'),
			array('label' => 'Deep Fried Fish Fillet with Sweet & Sour Sauce'),
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
		"label" => "Squid /  Prawn - Please Choose 1",
		"controlname" => "squidprawnchoice",
		"choices" => array(
			array('label' => 'Squid Pepper & Garlic'),
			array('label' => 'Squid Chilli Paste'),
			array('label' => 'Squid Basil Leaf'),
			array('label' => 'Prawn Chilli Paste (Deshelled)'),
			array('label' => 'Prawn Basil Leaf (Deshelled)'),
			array('label' => 'Prawn Curry Powder (Deshelled)'),
			array('label' => 'Prawn Pepper & Garlic (Deshelled)'),
			array('label' => 'Prawn Tamarind Sauce (Deshelled)')
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Meat - Please Choose 1",
		"controlname" => "meatchoice",
		"choices" => array(
			array('label' => 'Stir Fried Beef with Pepper & Garlic (+ $1.00 Per Pax)'),
			array('label' => 'Stir Fried Beef with Basil Leaf (+ $1.00 Per Pax)'),
			array('label' => 'Stir Fried Beef with Chilli Paste (+ $1.00 Per Pax)'),
			array('label' => 'Deep Fried Pandan Chicken'),
			array('label' => 'Chicken with Cashew Nut'),
			array('label' => 'Lemon Leaf Chicken'),
			array('label' => 'Stir Fried Chicken Pepper & Garlic'),
			array('label' => 'Stir Fried Chicken with Basil Leaf'),
			array('label' => 'Stir Fried Chicken Chilli Paste')
		)
	);
	$menudishes[] = array(
		"type" => "pick2",
		"label" => "Thai Curry / Soup Special - Please Choose 2",
		"controlname" => "thaicurrychoice",
		"choices" => array(
			array('label' => 'Green Curry Chicken'),
			array('label' => 'Green Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Green Curry Vegetarian'),
			array('label' => 'Red Curry Chicken'),
			array('label' => 'Red Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Red Curry Vegetarian'),
			array('label' => 'Dried Curry Chicken'),
			array('label' => 'Dried Curry Beef (+ $1.00 Per Pax)'),
			array('label' => 'Dried Curry Vegetarian'),
			array('label' => 'Tom Yum Seafood Soup (Clear Soup)'),
			array('label' => 'Tom Yum Seafood Soup (with Chilli Paste)'),
			array('label' => 'Tom Yum Chicken Soup (Clear Soup)'),
			array('label' => 'Tom Yum Chicken Soup (with Chilli Paste)'),
			array('label' => 'Tom Yum Vegetarian Soup (Clear Soup)'),
			array('label' => 'Tom Yum Vegetarian Soup (with Chilli Paste)'),
			array('label' => 'Blue Ginger Soup with Chicken'),
			array('label' => 'Om Khai (Jungle Chicken Soup)')
		)
	);
	$menudishes[] = array(
		"type" => "group",
		"nextnum" => "7"
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Vegetable - Please Choose 1",
		"controlname" => "vegetablechoice",
		"choices" => array(
			array('label' => 'Fried Kai Lan Oyster Sauce',                  'vegecontrol' => 'kailanoystersauce' . JT_VEGCTRL),
			array('label' => 'Fried Kai Lan with Salted Fish'),
			array('label' => 'Fried Kai Lan with Chinese Mushroom',         'vegecontrol' => 'kailanchimush' . JT_VEGCTRL),
			array('label' => 'Fried Bean Sprout',                           'vegecontrol' => 'beansprout' . JT_VEGCTRL),
			array('label' => 'Fried Bean Sprout with Salted Fish'),
			array('label' => 'Fried Mixed Vegetables',                       'vegecontrol' => 'mixedveg' . JT_VEGCTRL),
			array('label' => 'Fried Mixed Vegetables with Chinese Mushroom', 'vegecontrol' => 'mixedvegchimush' . JT_VEGCTRL),
			array('label' => 'Fried Cabbage Oyster Sauce',                  'vegecontrol' => 'cabbageoystersauce' . JT_VEGCTRL),
			array('label' => 'Fried Cabbage with Chinese Mushroom',         'vegecontrol' => 'cabbagechimush' . JT_VEGCTRL)
		)
	);
	$menudishes[] = array(
		"type" => "pick2",
		"label" => "Noodle / Rice - Please Choose 2",
		"controlname" => "noodlericechoice",
		"choices" => array(
			array('label' => 'Pineapple Rice',               'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice',                   'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Salted Fish Fried Rice'),
			array('label' => 'Seafood Fried Rice'),
			array('label' => 'Fried Rice Basil Leaf',        'vegecontrol' => 'ricebasil' . JT_VEGCTRL),
			array('label' => 'Fried Tang Hoon',              'vegecontrol' => 'tanghoon' . JT_VEGCTRL),
			array('label' => 'Fried Spicy Noodle',           'vegecontrol' => 'spicynoodle' . JT_VEGCTRL),
			array('label' => 'Fried Bee Hoon',               'vegecontrol' => 'beehoon' . JT_VEGCTRL),
			array('label' => 'Phad Thai',                    'vegecontrol' => 'phadthai' . JT_VEGCTRL),
			array('label' => 'Fried Hor Fan (Dry)',          'vegecontrol' => 'horfan' . JT_VEGCTRL),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Dessert - Please Choose 1",
		"controlname" => "dessertchoice",
		"choices" => array(
			array('label' => 'Red Ruby'),
			array('label' => 'Thai Chendol'),
			array('label' => 'Tapioca with Coconut Milk'),
			array('label' => 'Assorted Coconut Jelly'),
		)
	);
	$menudishes[] = array(
		"type" => "pick1",
		"label" => "Drink - Please Choose 1",
		"controlname" => "drinkchoice",
		"choices" => array(
			array('label' => 'Iced Lemon Tea'),
			array('label' => 'Lime Juice'),
			array('label' => 'Lemongrass Drink (+ $1.00 Per Pax)'),
			array('label' => 'Thai Iced Tea with Lemon (+ $1.00 Per Pax)'),
			array('label' => 'Thai Iced Tea with Milk (+ $1.00 Per Pax)'),
		)
	);
	$menu['dishes'] = $menudishes;

	return $menu;
}