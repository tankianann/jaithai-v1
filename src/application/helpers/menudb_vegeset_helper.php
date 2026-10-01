<?php

function veganDessertChoices() {
	return array(
		array('label' => 'Thai Red Ruby'),
		array('label' => 'Thai Chendol'),
		array('label' => 'Tapioca with Coconut Milk'),
		array('label' => 'Assorted Thai Coconut Jelly'),
		array('label' => 'Taro Bauloy in Coconut Milk'),
		array('label' => 'Tako'),
		array('label' => 'Mango Sticky Rice (+ $1.00 Per Pax)')
	);
}

function veganTerms($menu) {
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

function menuVEGEA() {
	$menu = array();
	$menu['id'] = 'VEGEA';
	$menu['url'] = 'vegetarian-menu-a.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'vegetarian-menu-a.pdf';
	$menu['title'] = 'Vegan Catering Menu A';
	$menu['description'] = "8 Course @ $15 per person (Min 40 pax)";
	$menu['meta_description'] = "Jai Thai Vegan Catering Menu A offers an 8 course plant-based Thai buffet at $15 per person for a minimum of 40 pax. Drinks can be added separately.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 40;
	$menu['numdishes'] = 8;
	$menu['perpax'] = 15;
	$menu['tnc'] = veganTerms($menu);
	$menu['agreetnc'] = '';

	$menu['dishes'] = array(
		array('type' => 'fixed', 'label' => 'Vegetable Spring Rolls'),
		array('type' => 'fixed', 'label' => 'Vegan Stir Fried Bean Curd with Cashew Nut'),
		array('type' => 'fixed', 'label' => 'Fried Brinjal Basil Leaf'),
		array('type' => 'fixed', 'label' => 'Vegan Thai Green Curry'),
		array('type' => 'fixed', 'label' => 'Vegan Fried Mixed Vegetable'),
		array('type' => 'fixed', 'label' => 'Vegan Phad Thai'),
		array('type' => 'fixed', 'label' => 'Steamed Rice'),
		array('type' => 'pick1', 'label' => 'Choice of Dessert', 'controlname' => 'dessertchoice', 'choices' => veganDessertChoices())
	);

	return $menu;
}

function menuVEGEB() {
	$menu = array();
	$menu['id'] = 'VEGEB';
	$menu['url'] = 'vegetarian-menu-b.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'vegetarian-menu-b.pdf';
	$menu['title'] = 'Vegan Catering Menu B';
	$menu['description'] = "9 Course @ $18 per person (Min 30 pax)";
	$menu['meta_description'] = "Jai Thai Vegan Catering Menu B offers a 9 course plant-based Thai buffet at $18 per person for a minimum of 30 pax. Drinks can be added separately.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 9;
	$menu['perpax'] = 18;
	$menu['tnc'] = veganTerms($menu);
	$menu['agreetnc'] = '';

	$menu['dishes'] = array(
		array('type' => 'fixed', 'label' => 'Vegetable Spring Roll'),
		array('type' => 'fixed', 'label' => 'Vegan Deep Fried Mushroom'),
		array('type' => 'fixed', 'label' => 'Fried Tofu with Pepper & Garlic'),
		array('type' => 'fixed', 'label' => 'Vegan Green Curry'),
		array('type' => 'fixed', 'label' => 'Vegan Fried Tempeh with Basil Leaf'),
		array('type' => 'fixed', 'label' => 'Vegan Fried Mixed Vegetable'),
		array('type' => 'fixed', 'label' => 'Vegan Phad Thai'),
		array('type' => 'fixed', 'label' => 'Steamed Rice'),
		array('type' => 'pick1', 'label' => 'Choice of Dessert', 'controlname' => 'dessertchoice', 'choices' => veganDessertChoices())
	);

	return $menu;
}

function menuVEGEC() {
	$menu = array();
	$menu['id'] = 'VEGEC';
	$menu['url'] = 'vegetarian-menu-c.php';
	$menu['type'] = JT_SETMENU;
	$menu['pdffile'] = 'vegetarian-menu-c.pdf';
	$menu['title'] = 'Vegan Catering Menu C';
	$menu['description'] = "10 Course @ $21 per person (Min 30 pax)";
	$menu['meta_description'] = "Jai Thai Vegan Catering Menu C offers a 10 course plant-based Thai buffet at $21 per person for a minimum of 30 pax. Drinks can be added separately.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 10;
	$menu['perpax'] = 21;
	$menu['tnc'] = veganTerms($menu);
	$menu['agreetnc'] = '';

	$menu['dishes'] = array(
		array('type' => 'fixed', 'label' => 'Vegan Corn Fritter'),
		array('type' => 'fixed', 'label' => 'Vegan Spring Roll'),
		array('type' => 'fixed', 'label' => 'Vegan Mango Salad'),
		array('type' => 'fixed', 'label' => 'Fried Mushroom with Basil Leaf'),
		array('type' => 'fixed', 'label' => 'Vegan Green Curry'),
		array('type' => 'fixed', 'label' => 'Fried Beancurd with Chilli Paste'),
		array(
			'type' => 'pick1',
			'label' => 'Choice of Fried Vegetables',
			'controlname' => 'vegetablechoice',
			'choices' => array(
				array('label' => 'Vegan Fried Mixed Vegetable'),
				array('label' => 'Vegan Fried Baby Kailan'),
				array('label' => 'Vegan Fried Brinjal with Spicy Basil Leaf')
			)
		),
		array(
			'type' => 'pick1',
			'label' => 'Choice of Noodle',
			'controlname' => 'noodlechoice',
			'choices' => array(
				array('label' => 'Vegan Phad Thai'),
				array('label' => 'Vegan Fried Tang Hoon'),
				array('label' => 'Vegan Fried Tom Yum Bee Hoon'),
				array('label' => 'Vegan Fried Bee Hoon')
			)
		),
		array(
			'type' => 'pick1',
			'label' => 'Choice of Rice',
			'controlname' => 'ricechoice',
			'choices' => array(
				array('label' => 'Vegan Pineapple Rice'),
				array('label' => 'Vegan Olive Rice'),
				array('label' => 'Vegan Fried Rice'),
				array('label' => 'Vegan Basil Rice'),
				array('label' => 'Vegan Tom Yum Fried Rice')
			)
		),
		array('type' => 'pick1', 'label' => 'Choice of Dessert', 'controlname' => 'dessertchoice', 'choices' => veganDessertChoices())
	);

	return $menu;
}

function menuVEGED() {
	$menu = array();
	$menu['id'] = 'VEGED';
	$menu['url'] = 'jtmenu/vegetarianmenud';
	$menu['type'] = JT_SETMENU;
	$menu['title'] = 'Vegan Catering Menu D';
	$menu['description'] = "11 Course @ $24 per person (Min 30 pax)";
	$menu['meta_description'] = "Jai Thai Vegan Catering Menu D offers an 11 course plant-based Thai buffet at $24 per person for a minimum of 30 pax. Drinks can be added separately.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = false;
	$menu['pickuplocations'] = array();
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 80;
	$menu['minorder'] = 30;
	$menu['numdishes'] = 11;
	$menu['perpax'] = 24;
	$menu['tnc'] = veganTerms($menu);
	$menu['agreetnc'] = '';

	$menu['dishes'] = array(
		array('type' => 'fixed', 'label' => 'Vegan Thai Fish Cake'),
		array('type' => 'fixed', 'label' => 'Deep Fried Mushroom'),
		array(
			'type' => 'pick1',
			'label' => 'Choice of Salad',
			'controlname' => 'saladchoice',
			'choices' => array(
				array('label' => 'Vegan Mango Salad'),
				array('label' => 'Vegan Pomelo Salad'),
				array('label' => 'Vegan Larb Tofu')
			)
		),
		array('type' => 'fixed', 'label' => 'Stir Fried Beancurd with Basil Leaf'),
		array('type' => 'fixed', 'label' => 'Stir Fried Tempeh with Pepper & Garlic'),
		array(
			'type' => 'pick1',
			'label' => 'Choice of Vegan Tom Yum Soup',
			'controlname' => 'tomyumchoice',
			'choices' => array(
				array('label' => 'Tom Yum Vegan Clear Soup (Aromatic with Herbal and Spices Taste)'),
				array('label' => 'Tom Yum Vegan Chilli Paste (Slightly Thicker Soup with Red Chilli Paste)')
			)
		),
		array('type' => 'fixed', 'label' => 'Vegan Red Curry'),
		array(
			'type' => 'pick1',
			'label' => 'Choice of Fried Vegetables',
			'controlname' => 'vegetablechoice',
			'choices' => array(
				array('label' => 'Vegan Fried Mixed Vegetable'),
				array('label' => 'Vegan Fried Cabbage with Beancurd Skin'),
				array('label' => 'Vegan Fried Baby Kailan'),
				array('label' => 'Vegan Fried Brinjal with Spicy Basil Leaf')
			)
		),
		array(
			'type' => 'pick1',
			'label' => 'Choice of Noodle',
			'controlname' => 'noodlechoice',
			'choices' => array(
				array('label' => 'Vegan Phad Thai'),
				array('label' => 'Vegan Fried Tang Hoon'),
				array('label' => 'Vegan Fried Tom Yum Bee Hoon'),
				array('label' => 'Vegan Fried Bee Hoon'),
				array('label' => 'Vegan Baked Beancurd with Tang Hoon')
			)
		),
		array(
			'type' => 'pick1',
			'label' => 'Choice of Rice',
			'controlname' => 'ricechoice',
			'choices' => array(
				array('label' => 'Vegan Pineapple Rice'),
				array('label' => 'Vegan Olive Rice'),
				array('label' => 'Vegan Fried Rice'),
				array('label' => 'Vegan Basil Rice'),
				array('label' => 'Vegan Tom Yum Fried Rice')
			)
		),
		array('type' => 'pick1', 'label' => 'Choice of Dessert', 'controlname' => 'dessertchoice', 'choices' => veganDessertChoices())
	);

	return $menu;
}
