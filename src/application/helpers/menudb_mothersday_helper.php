<?php

function menuMOTHERSDAY() {

	$menu = array();
	$menu['id'] = "MOTHERSDAY";
	$menu['url'] = 'catering-mothersday-set.php';
	$menu['type'] = JT_ALACARTEMENU;
	$menu['title'] = 'Mothers Day Set';
	$menu['description'] = "This Mother’s Day, give the gift of flavors at Jai Thai!";
	$menu['meta_description'] = "Spoil your mum with our exclusive Mother’s Day Special Set, crafted just for her.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CK);
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 40;
	$menu['minorder'] = 188;
	$menu['numdishes'] = 0;
	$menu['perpax'] = 0;

	$menu['tnc'] = 	array(
		"Food is prepared in disposable trays / containers.",
		"No buffet table set-up, food warmers, cutlery.",
		"Minimum order is 1 set",
		"For self collection at any of our outlets",
	);

	$menu['agreetnc'] = "I understand that the food will be prepared in disposable trays, for self collection at any of Jai Siam outlets only.";

	//dishes
	$menudishes = array();
	$menudishes['mothersday1'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Mothers Day Set for 6 Pax (No Drink)</strong><br />' .
                   'Set includes:<br />' .
                   '- Golden Money Bags – crispy, bite-sized delights<br />' .
                   '- Prawn Spring Rolls – fresh and crunchy<br />' .
                   '- Stuffed Chicken Wings – juicy and satisfying<br />' .
                   '- Fried Chicken with Basil Leaves<br />' .
                   '- Green Curry Fish – rich and aromatic<br />' .
                   '- Stir-Fried Mixed Vegetables<br />' .
                   '- Pineapple Rice<br />' .
                   '- Fried Tang Hoon Noodles',
		'usecontainer' => false,
		'serves' => 6,
		'price' => 188
	);
    $menudishes['mothersday1d'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => '<strong>Mothers Day Set for 6 Pax (With Drink)</strong><br />' .
                   'Set includes:<br />' .
                   '- Golden Money Bags – crispy, bite-sized delights<br />' .
                   '- Prawn Spring Rolls – fresh and crunchy<br />' .
                   '- Stuffed Chicken Wings – juicy and satisfying<br />' .
                   '- Fried Chicken with Basil Leaves<br />' .
                   '- Green Curry Fish – rich and aromatic<br />' .
                   '- Stir-Fried Mixed Vegetables<br />' .
                   '- Pineapple Rice<br />' .
                   '- Fried Tang Hoon Noodles<br/>' .
                   '- 6 Bottles of Thai Milk Tea',
        'usecontainer' => false,
        'serves' => 6,
        'price' => 199
    );
    $menudishes['mothersday2'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => '<strong>Mothers Day Set for 8 Pax (No Drink)</strong><br />' .
                   'Set includes:<br />' .
                   '- Golden Money Bags – crispy, bite-sized delights<br />' .
                   '- Prawn Spring Rolls – fresh and crunchy<br />' .
                   '- Stuffed Chicken Wings – juicy and satisfying<br />' .
                   '- Fried Chicken with Basil Leaves<br />' .
                   '- Green Curry Fish – rich and aromatic<br />' .
                   '- Stir-Fried Mixed Vegetables<br />' .
                   '- Pineapple Rice<br />' .
                   '- Fried Tang Hoon Noodles',
        'usecontainer' => false,
        'serves' => 8,
        'price' => 238
    );
    $menudishes['mothersday2d'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => '<strong>Mothers Day Set for 8 Pax (With Drink)</strong><br />' .
                   'Set includes:<br />' .
                   '- Golden Money Bags – crispy, bite-sized delights<br />' .
                   '- Prawn Spring Rolls – fresh and crunchy<br />' .
                   '- Stuffed Chicken Wings – juicy and satisfying<br />' .
                   '- Fried Chicken with Basil Leaves<br />' .
                   '- Green Curry Fish – rich and aromatic<br />' .
                   '- Stir-Fried Mixed Vegetables<br />' .
                   '- Pineapple Rice<br />' .
                   '- Fried Tang Hoon Noodles<br/>' .
                   '- 8 Bottles of Thai Milk Tea',
        'usecontainer' => false,
        'serves' => 8,
        'price' => 249
    );
    $menudishes['mothersday3'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => '<strong>Mothers Day Set for 10 Pax (No Drink)</strong><br />' .
                   'Set includes:<br />' .
                   '- Golden Money Bags – crispy, bite-sized delights<br />' .
                   '- Prawn Spring Rolls – fresh and crunchy<br />' .
                   '- Stuffed Chicken Wings – juicy and satisfying<br />' .
                   '- Fried Chicken with Basil Leaves<br />' .
                   '- Green Curry Fish – rich and aromatic<br />' .
                   '- Stir-Fried Mixed Vegetables<br />' .
                   '- Pineapple Rice<br />' .
                   '- Fried Tang Hoon Noodles',
        'usecontainer' => false,
        'serves' => 10,
        'price' => 288
    );
    $menudishes['mothersday3d'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => '<strong>Mothers Day Set for 10 Pax (With Drink)</strong><br />' .
                   'Set includes:<br />' .
                   '- Golden Money Bags – crispy, bite-sized delights<br />' .
                   '- Prawn Spring Rolls – fresh and crunchy<br />' .
                   '- Stuffed Chicken Wings – juicy and satisfying<br />' .
                   '- Fried Chicken with Basil Leaves<br />' .
                   '- Green Curry Fish – rich and aromatic<br />' .
                   '- Stir-Fried Mixed Vegetables<br />' .
                   '- Pineapple Rice<br />' .
                   '- Fried Tang Hoon Noodles<br/>' .
                   '- 10 Bottles of Thai Milk Tea',
        'usecontainer' => false,
        'serves' => 10,
        'price' => 299
    );
	$menu['dishes'] = $menudishes;

	return $menu;
}
function menuMOTHERSDAY2024() {

	$menu = array();
	$menu['id'] = "MOTHERSDAY";
	$menu['url'] = 'catering-mothersday-set.php';
	$menu['type'] = JT_ALACARTEMENU;
	$menu['title'] = 'Mothers Day Set';
	$menu['description'] = "This Mother’s Day, give the gift of flavors at Jai Siam!";
	$menu['meta_description'] = "Spoil your mum with our exclusive Mother’s Day Special Set, crafted just for her.";
	$menu['hasdrink'] = false;
	$menu['allowpickup'] = true;
	$menu['pickuplocations'] = array(JT_PV, JT_CK);
	$menu['hascontainercharge'] = false;
	$menu['deliverycharge'] = 50;
	$menu['minorder'] = 75;
	$menu['numdishes'] = 0;
	$menu['perpax'] = 0;

	$menu['tnc'] = 	array(
		"Food is prepared in disposable trays / containers.",
		"No buffet table set-up, food warmers, cutlery.",
		"Minimum order is 1 set",
		"For self collection at any of our outlets",
	);

	$menu['agreetnc'] = "I understand that the food will be prepared in disposable trays, for self collection at any of Jai Siam outlets only.";

	//dishes
	$menudishes = array();
	$menudishes['mothersday1'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Mothers Day Set for 4 Pax</strong><br />Set includes:<br />- Olive Rice<br />- Pineapple Rice<br />- Fish in Sweet and Sour Sauce<br />- Prawn in Tamarind Sauce<br/>- Green Curry<br/>- Pandan Chicken<br/>- Fried Mixed Vegetables',
		'usecontainer' => false,
		'serves' => 4,
		'price' => 75
	);
	$menudishes['mothersday2'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Mothers Day Set for 6 Pax</strong><br />Set includes:<br />- Olive Rice<br />- Pineapple Rice<br />- Fish in Sweet and Sour Sauce<br />- Prawn in Tamarind Sauce<br/>- Green Curry<br/>- Pandan Chicken<br/>- Fried Mixed Vegetables',
		'usecontainer' => false,
		'serves' => 6,
		'price' => 105
	);
	$menudishes['mothersday3'] = array(
		'type' => 'dish',
		'spicykid' => JT_NONE,
		'speciality' => JT_NONE,
		'label' => '<strong>Mothers Day Set for 8 Pax</strong><br />Set includes:<br />- Olive Rice<br />- Pineapple Rice<br />- Fish in Sweet and Sour Sauce<br />- Prawn in Tamarind Sauce<br/>- Green Curry<br/>- Pandan Chicken<br/>- Fried Mixed Vegetables',
		'usecontainer' => false,
		'serves' => 8,
		'price' => 135
	);
	$menu['dishes'] = $menudishes;

	return $menu;

}
