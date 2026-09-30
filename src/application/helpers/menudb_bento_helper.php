<?php

function menuBENTO() {

	$menu = array();
	$menu['id'] = "BENTO";
	$menu['url'] = 'catering-bento-set.php';
	$menu['type'] = JT_ALACARTEMENU;
	$menu['pdffile'] = 'bento-ala-carte.pdf';
	$menu['title'] = 'Bento Ala Carte Menu';
	$menu['description'] = "Get the best of both worlds: Authentic thai food in convenient lunch boxes";
	$menu['meta_description'] = "Perfect for corporate lunch talks, Jai Siam's bento catering give you the best of both worlds - authentic thai food in convenient lunch boxes!";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CW, JT_CK);
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 40;
	$menu['minorder'] = 120;
	$menu['numdishes'] = 0;
	$menu['perpax'] = 0;
	$menu['tnc'] = 	array(
		"This menu includes:<ul>
			<li>Food served in disposable bento box, suitable for individual serving.</li>
			<li>Disposable plates & cutlery</li></ul>",
		"Food best consumed within one hour of delivery.",
		"Minimum delivery order is $". $menu['minorder'] . ". Delivery charge of $". $menu['deliverycharge'] . " applies.",
		"For orders below $". $menu['minorder'] . ", an additional $10 delivery surcharge applies.",
		"Can be added on to your Mini Party or Buffet order."
	);
	$menu['agreetnc'] = "I understand that the food will be served in disposable bento boxes, suitable for individual serving.";

	//dishes
	$menudishes = array();
	$menudishes['group_regular'] = array(
		'type' => 'group',
		'label' => 'Bento Meals'
	);
	$menudishes['bento1'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Pineapple Rice Bento Set</strong><br />Set includes:<br />- Pineapple Rice<br />- Money Bag<br />- Green Curry Chicken<br />- Deep Fried Fish Fillet with Chilli Sauce',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 10
	);
	$menudishes['bento2'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Olive Rice Bento Set</strong><br />Set includes: <br />- Olive Rice<br />- Green Curry Chicken<br />- Mango Salad<br />- Deep Fried Fish Fillet with Chilli Sauce',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 10
	);
	$menudishes['bento3'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Vegetarian Bento Set</strong><br />Set includes:<br />- Olive Rice<br />- Green Curry Vegetarian<br />- Mango Salad<br />- Beancurd Cashew Nut',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 10
	);
    $menudishes['bento7'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => '<strong>Vegetarian Bento Set (No onion, no garlic)</strong><br />Set includes:<br />- Olive Rice<br />- Red Curry Vegetarian<br />- Mango Salad<br />- Beancurd Cashew Nut',
        'usecontainer' => false,
        'serves' => 1,
        'price' => 10
    );
	$menudishes['bento4'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Non Spicy Pineapple Rice Bento</strong><br />Set includes:<br />- Pineapple Rice<br />- Vegetable Spring Roll<br />- Deep Fried Fish with Tamarind Sauce<br />- Stir Fried Chicken Oyster Sauce',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 10
	);
	$menudishes['bento5'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Non Spicy Olive Rice Bento</strong><br />Set includes:<br />- Olive Rice<br />- Vegetable Spring Roll<br />- Deep Fried Fish with Tamarind Sauce<br />- Stir Fried Chicken Oyster Sauce',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 10
	);
//	$menudishes['bento6'] = array(
//		'type' => 'dish',
//		'spicykid' => JT_NONE,
//		'speciality' => JT_NONE,
//		'label' => '<strong>Phad Thai Bento</strong><br />Set includes:<br />- Phad Thai<br />- Mango Salad<br />- Vegetable Spring Roll<br />- Deep Fried Fish with Tamarind Sauce',
//		'usecontainer' => false,
//		'serves' => 1,
//		'price' => 11
//	);
	$menudishes['group_deluxe'] = array(
		'type' => 'group',
		'label' => 'Deluxe Bento Meals'
	);

	$menudishes['deluxe1'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Bento Deluxe A</strong><br />Set includes:<br />- Seafood Fried Rice<br />- Stuffed Chicken Wing<br />- Green Curry Chicken<br />- Fish Fillet with Tamarind Sauce',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 15
	);
	$menudishes['deluxe2'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Bento Deluxe B</strong><br />Set includes:<br />- Basil Seafood Rice<br />- Money Bag<br />- Pandan Chicken<br />- Panang Fish (Dried Curry)',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 15
	);
	$menudishes['deluxe3'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Bento Deluxe C - Non Spicy</strong><br />Set includes:<br />- Phad Thai<br />- Money Bag<br />- Chicken Oyster Sauce<br />- Fish Fillet with Tamarind Sauce',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 15
	);
	$menudishes['deluxe4'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Bento Deluxe Vegetarian - Non Spicy</strong><br />Set includes:<br />- Pineapple Rice Vegetarian<br />- Fried Tofu with Cashew Nut<br />- Vegetarian Fried Basil<br />- Mixed Vegetable',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 15
	);
    $menudishes['deluxe5'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => '<strong>Grilled Chicken Bento</strong><br />Set includes:<br />- Butterfly Pea Rice<br />- Grilled Chicken<br />- Grilled Vegetables<br />- Salted Duck Egg<br />- Jai Thai Special Sauce',
        'usecontainer' => false,
        'serves' => 1,
        'price' => 15.90
    );

	$menudishes['group_premium'] = array(
		'type' => 'group',
		'label' => 'Premium Bento Meals'
	);
	$menudishes['premium1'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Premium Bento 1</strong><br />Set includes:<br />- Pineapple Rice<br />- Deep fried fish with Tamarind Sauce<br />- Stuffed Wing<br />- Mango Salad<br />- Green Curry Prawn',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 20
	);
	$menudishes['premium2'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Premium Bento 2</strong><br />Set includes:<br />- Olive Rice<br />- Money Bag<br />- Deep Fried Fish with Pepper Garlic<br />- Prawn Omelette<br />- Chicken Cashew Nut',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 20
	);
	$menudishes['premium3'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Premium Vegetarian Bento</strong><br />Set includes:<br />- Olive Rice<br />- Dried Curry<br />- Fried Mixed Vegetable with Water Chest Nut<br />- Fried Beancurd Cashew Nut<br />- Mango Salad',
		'usecontainer' => false,
		'serves' => 1,
		'price' => 20
	);


	$menu['dishes'] = $menudishes;

	return $menu;

}
