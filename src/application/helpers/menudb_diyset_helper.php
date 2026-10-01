<?php

function diyFishChoices() {
	return array(
		array('label' => 'Deep Fried Fish with Thai Chilli Sauce'),
		array('label' => 'Deep Fried Fish with Basil Leaf'),
		array('label' => 'Deep Fried Fish with Pepper & Garlic'),
		array('label' => 'Deep Fried Fish with Tamarind Sauce'),
		array('label' => 'Deep Fried Fish with Sweet & Sour Sauce'),
		array('label' => 'Steamed Fish with Chilli Lemon'),
		array('label' => 'Steamed Fish with Soy Sauce')
	);
}

function diyDessertChoices($mango_label = 'Mango Sticky Rice (+ $1.00 Per Pax)') {
	return array(
		array('label' => 'Thai Red Ruby'),
		array('label' => 'Thai Chendol'),
		array('label' => 'Tapioca with Coconut Milk'),
		array('label' => 'Assorted Thai Coconut Jelly'),
		array('label' => 'Taro Bauloy in Coconut Milk'),
		array('label' => 'Tako'),
		array('label' => $mango_label)
	);
}

function diyDrinkChoices() {
	return array(
		array('label' => 'Lime Juice'),
		array('label' => 'Ice Lemon Tea'),
		array('label' => 'Fruit Punch'),
		array('label' => 'Lemongrass Drink (+ $1.00 Per Pax)'),
		array('label' => 'Butterfly Pea Drink (+ $1.00 Per Pax)'),
		array('label' => 'Thai Milk Green Tea (+ $1.00 Per Pax)'),
		array('label' => 'Thai Milk Tea (+ $1.00 Per Pax)'),
		array('label' => 'Thai Ice Lemon Tea (+ $1.00 Per Pax)')
	);
}

function diyTerms($menu) {
	return array(
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
}

function menuDIYA() {
	$menu = array();
	$menu['id'] = 'DIYA';
	$menu['url'] = 'catering-diy-a.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'diy-catering-menu-a.pdf';
	$menu['title'] = 'DIY Catering Menu A';
	$menu['description'] = "8 Course + Drink @ $16.90 per person (Min 40 pax)";
	$menu['meta_description'] = "Jai Thai Catering DIY Menu A offers an 8 course customizable Thai buffet with a drink at $16.90 per person for a minimum of 40 pax.";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 40;
	$menu['numdishes'] = 8;
	$menu['perpax'] = 16.90;
	$menu['tnc'] = diyTerms($menu);
	$menu['agreetnc'] = '';

	$menudishes = array();
	$menudishes[] = array('type' => 'fixed', 'label' => 'Money Bag');
	$menudishes[] = array('type' => 'fixed', 'label' => 'Vegetable Spring Rolls');
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Fish', 'controlname' => 'fishchoice', 'choices' => diyFishChoices());
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Curry',
		'controlname' => 'currychoice',
		'choices' => array(
			array('label' => 'Thai Red Curry'),
			array('label' => 'Thai Green Curry Chicken'),
			array('label' => 'Thai Green Curry Vegan'),
			array('label' => 'Thai Green Curry Beef (+ $1.00 Per Pax)')
		)
	);
	$menudishes[] = array('type' => 'group', 'nextnum' => '5');
	$menudishes[] = array('type' => 'fixed', 'label' => 'Fried Mixed Vegetable', 'vegecontrol' => 'mixedveg' . JT_VEGCTRL);
	$menudishes[] = array('type' => 'fixed', 'label' => 'Phad Thai', 'vegecontrol' => 'phadthai' . JT_VEGCTRL);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Rice',
		'controlname' => 'ricechoice',
		'choices' => array(
			array('label' => 'Steamed Rice'),
			array('label' => 'Brown Rice'),
			array('label' => 'Turmeric Rice'),
			array('label' => 'Butterfly Pea Rice')
		)
	);
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Dessert', 'controlname' => 'dessertchoice', 'choices' => diyDessertChoices());
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Drink', 'controlname' => 'drinkchoice', 'choices' => diyDrinkChoices());
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuDIYB() {
	$menu = array();
	$menu['id'] = 'DIYB';
	$menu['url'] = 'catering-diy-b.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'diy-catering-menu-b.pdf';
	$menu['title'] = 'DIY Catering Menu B';
	$menu['description'] = "9 Course + Drink @ $19.90 per person (Min 30 pax)";
	$menu['meta_description'] = "Jai Thai Catering DIY Menu B offers a 9 course customizable Thai buffet with a drink at $19.90 per person for a minimum of 30 pax.";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 9;
	$menu['perpax'] = 19.90;
	$menu['tnc'] = diyTerms($menu);
	$menu['agreetnc'] = '';

	$menudishes = array();
	$menudishes[] = array('type' => 'fixed', 'label' => 'Vegetable Spring Roll');
	$menudishes[] = array('type' => 'fixed', 'label' => 'Prawn Cake');
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Fish', 'controlname' => 'fishchoice', 'choices' => diyFishChoices());
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Curry',
		'controlname' => 'currychoice',
		'choices' => array(
			array('label' => 'Thai Red Curry'),
			array('label' => 'Thai Green Curry Chicken'),
			array('label' => 'Thai Green Curry Vegan'),
			array('label' => 'Thai Green Curry Beef (+ $1.00 Per Pax)')
		)
	);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Chicken',
		'controlname' => 'chickenchoice',
		'choices' => array(
			array('label' => 'Fried Chicken with Basil Leaf'),
			array('label' => 'Fried Chicken with Cashew Nut'),
			array('label' => 'Fried Chicken with Pepper & Garlic'),
			array('label' => 'Pandan Chicken'),
			array('label' => 'Lemon Leaf Chicken')
		)
	);
	$menudishes[] = array('type' => 'group', 'nextnum' => '6');
	$menudishes[] = array('type' => 'fixed', 'label' => 'Fried Mixed Vegetable', 'vegecontrol' => 'mixedveg' . JT_VEGCTRL);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Noodle',
		'controlname' => 'noodlechoice',
		'choices' => array(
			array('label' => 'Phad Thai', 'vegecontrol' => 'phadthai' . JT_VEGCTRL),
			array('label' => 'Fried Tang Hoon', 'vegecontrol' => 'tanghoon' . JT_VEGCTRL),
			array('label' => 'Tom Yum Bee Hoon', 'vegecontrol' => 'tomyumbeehoon' . JT_VEGCTRL),
			array('label' => 'Fried Bee Hoon', 'vegecontrol' => 'beehoon' . JT_VEGCTRL)
		)
	);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Rice',
		'controlname' => 'ricechoice',
		'choices' => array(
			array('label' => 'Steamed Rice'),
			array('label' => 'Brown Rice'),
			array('label' => 'Turmeric Rice'),
			array('label' => 'Butterfly Pea Rice')
		)
	);
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Dessert', 'controlname' => 'dessertchoice', 'choices' => diyDessertChoices());
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Drink', 'controlname' => 'drinkchoice', 'choices' => diyDrinkChoices());
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuDIYC() {
	$menu = array();
	$menu['id'] = 'DIYC';
	$menu['url'] = 'catering-diy-c.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'diy-catering-menu-c.pdf';
	$menu['title'] = 'DIY Catering Menu C';
	$menu['description'] = "10 Course + Drink @ $22.90 per person (Min 30 pax)";
	$menu['meta_description'] = "Jai Thai Catering DIY Menu C offers a 10 course customizable Thai buffet with a drink at $22.90 per person for a minimum of 30 pax.";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 10;
	$menu['perpax'] = 22.90;
	$menu['tnc'] = diyTerms($menu);
	$menu['agreetnc'] = '';

	$menudishes = array();
	$menudishes[] = array('type' => 'fixed', 'label' => 'Prawn Cake');
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Salad',
		'controlname' => 'saladchoice',
		'choices' => array(
			array('label' => 'Mango Salad'),
			array('label' => 'Mango Salad Vegan'),
			array('label' => 'Smoked Duck Garden Salad with Thai Spicy Dressing')
		)
	);
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Fish', 'controlname' => 'fishchoice', 'choices' => diyFishChoices());
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Tom Yum Seafood Soup',
		'controlname' => 'tomyumchoice',
		'choices' => array(
			array('label' => 'Tom Yum Seafood Clear Soup (Aromatic with Herbal and Spices Taste)'),
			array('label' => 'Tom Yum Seafood Chilli Paste (Slightly Thicker Soup with Red Chilli Paste)')
		)
	);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Chicken',
		'controlname' => 'chickenchoice',
		'choices' => array(
			array('label' => 'Fried Chicken with Basil Leaf'),
			array('label' => 'Fried Chicken with Cashew Nut'),
			array('label' => 'Fried Chicken with Pepper & Garlic'),
			array('label' => 'Pandan Chicken'),
			array('label' => 'Lemon Leaf Chicken')
		)
	);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Prawn',
		'controlname' => 'prawnchoice',
		'choices' => array(
			array('label' => 'Fried Prawn with Chilli Paste'),
			array('label' => 'Fried Prawn with Basil Leaf'),
			array('label' => 'Fried Prawn with Cashew Nut'),
			array('label' => 'Fried Prawn with Pepper & Garlic')
		)
	);
	$menudishes[] = array('type' => 'group', 'nextnum' => '7');
	$menudishes[] = array('type' => 'fixed', 'label' => 'Fried Mixed Vegetable', 'vegecontrol' => 'mixedveg' . JT_VEGCTRL);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Noodle',
		'controlname' => 'noodlechoice',
		'choices' => array(
			array('label' => 'Phad Thai', 'vegecontrol' => 'phadthai' . JT_VEGCTRL),
			array('label' => 'Fried Tang Hoon', 'vegecontrol' => 'tanghoon' . JT_VEGCTRL),
			array('label' => 'Tom Yum Bee Hoon', 'vegecontrol' => 'tomyumbeehoon' . JT_VEGCTRL),
			array('label' => 'Fried Bee Hoon', 'vegecontrol' => 'beehoon' . JT_VEGCTRL)
		)
	);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Rice',
		'controlname' => 'ricechoice',
		'choices' => array(
			array('label' => 'Pineapple Rice', 'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice', 'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Tom Yum Fried Rice', 'vegecontrol' => 'tomyumfriedrice' . JT_VEGCTRL),
			array('label' => 'Egg Fried Rice')
		)
	);
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Dessert', 'controlname' => 'dessertchoice', 'choices' => diyDessertChoices());
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Drink', 'controlname' => 'drinkchoice', 'choices' => diyDrinkChoices());
	$menu['dishes'] = $menudishes;

	return $menu;
}

function menuDIYD() {
	$menu = array();
	$menu['id'] = 'DIYD';
	$menu['url'] = 'catering-diy-d.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'diy-catering-menu-d.pdf';
	$menu['title'] = 'DIY Catering Menu D';
	$menu['description'] = "11 Course + Drink @ $25.90 per person (Min 30 pax)";
	$menu['meta_description'] = "Jai Thai Catering DIY Menu D offers an 11 course customizable Thai buffet with a drink at $25.90 per person for a minimum of 30 pax.";
	$menu['hasdrink'] = true;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 11;
	$menu['perpax'] = 25.90;
	$menu['tnc'] = diyTerms($menu);
	$menu['agreetnc'] = '';

	$menudishes = array();
	$menudishes[] = array('type' => 'fixed', 'label' => 'Prawn Cake');
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Salad',
		'controlname' => 'saladchoice',
		'choices' => array(
			array('label' => 'Mango Salad'),
			array('label' => 'Mango Salad Vegan'),
			array('label' => 'Smoked Duck Garden Salad with Thai Spicy Dressing')
		)
	);
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Fish', 'controlname' => 'fishchoice', 'choices' => diyFishChoices());
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Tom Yum Seafood Soup',
		'controlname' => 'tomyumchoice',
		'choices' => array(
			array('label' => 'Tom Yum Seafood Clear Soup (Aromatic with Herbal and Spices Taste)'),
			array('label' => 'Tom Yum Seafood Chilli Paste (Slightly Thicker Soup with Red Chilli Paste)')
		)
	);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Chicken',
		'controlname' => 'chickenchoice',
		'choices' => array(
			array('label' => 'Fried Chicken with Basil Leaf'),
			array('label' => 'Fried Chicken with Cashew Nut'),
			array('label' => 'Fried Chicken with Pepper & Garlic'),
			array('label' => 'Pandan Chicken'),
			array('label' => 'Lemon Leaf Chicken')
		)
	);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Prawn',
		'controlname' => 'prawnchoice',
		'choices' => array(
			array('label' => 'Fried Prawn with Chilli Paste'),
			array('label' => 'Fried Prawn with Basil Leaf'),
			array('label' => 'Fried Prawn with Cashew Nut')
		)
	);
	$menudishes[] = array('type' => 'group', 'nextnum' => '7');
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Squid',
		'controlname' => 'squidchoice',
		'choices' => array(
			array('label' => 'Fried Squid with Chilli Paste'),
			array('label' => 'Fried Squid with Basil Leaf'),
			array('label' => 'Fried Squid with Cashew Nut'),
			array('label' => 'Fried Squid with Pepper & Garlic')
		)
	);
	$menudishes[] = array('type' => 'fixed', 'label' => 'Fried Broccoli with Chinese Mushroom', 'vegecontrol' => 'broccolichimush' . JT_VEGCTRL);
	$menudishes[] = array('type' => 'fixed', 'label' => 'Phad Thai', 'vegecontrol' => 'phadthai' . JT_VEGCTRL);
	$menudishes[] = array(
		'type' => 'pick1',
		'label' => 'Choice of Rice',
		'controlname' => 'ricechoice',
		'choices' => array(
			array('label' => 'Pineapple Rice', 'vegecontrol' => 'pineapplerice' . JT_VEGCTRL),
			array('label' => 'Olive Rice', 'vegecontrol' => 'oliverice' . JT_VEGCTRL),
			array('label' => 'Tom Yum Fried Rice', 'vegecontrol' => 'tomyumfriedrice' . JT_VEGCTRL),
			array('label' => 'Egg Fried Rice')
		)
	);
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Dessert', 'controlname' => 'dessertchoice', 'choices' => diyDessertChoices('Change to Mango Sticky Rice (+ $1.00 Per Pax)'));
	$menudishes[] = array('type' => 'pick1', 'label' => 'Choice of Drink', 'controlname' => 'drinkchoice', 'choices' => diyDrinkChoices());
	$menu['dishes'] = $menudishes;

	return $menu;
}
