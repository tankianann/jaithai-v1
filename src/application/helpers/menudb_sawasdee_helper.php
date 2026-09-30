<?php

function menuSAWASDEE() {

    $menu = array();
    $menu['id'] = "SAWASDEE";
//    $menu['url'] = 'catering-chaiyo-set.php';
    $menu['type'] = JT_SETMENU;
    $menu['title'] = 'Sawasdee Set';
    $menu['description'] = "8 Course @ $23.90 person (min 10 pax)";
    $menu['meta_description'] = "The Sawasdee set is perfect for a team meeting or for a gathering with your besties! Order online and collect at any one of our outlets!";
    $menu['hasdrink'] = false;
    $menu['allowpickup'] = true;
    $menu['pickuplocations'] = array(JT_PV, JT_CK);
    $menu['hascontainercharge'] = false;
    $menu['deliverycharge'] = 40;
    $menu['minorder'] = 10;
    $menu['numdishes'] = 8;
    $menu['perpax'] = 23.9;

    $menu['tnc'] = 	array(
        "Food is prepared in disposable trays / containers.",
        "No buffet table set-up, food warmers, cutlery.",
        "Minimum order is 1 set",
    );

    $menu['agreetnc'] = "I understand that the food will be prepared in disposable trays, with no buffet table set-up.";

    //dishes
    $menudishes = array();
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Money Bag"
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Prawn Spring Roll"
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Mango Salad"
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Fried Chicken Basil Leaf"
    );
    $menudishes[] = array(
        "type" => "pick1",
        "label" => "Choice of Fish",
        "controlname" => "fishchoice",
        "choices" => array(
            array('label' => 'Deep Fried Fish Fillet with Tamarind Sauce'),
            array('label' => 'Deep Fried Fish Fillet with Chilli Sauce'),
            array('label' => 'Deep Fried Fish Fillet with Pepper & Garlic'),
            array('label' => 'Deep Fried Fish Fillet with Basil Leaf'),
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
        "label" => "Choice of Thai Green Curry",
        "controlname" => "greencurrychoice",
        "choices" => array(
            array('label' => 'Green Curry Chicken'),
            array('label' => 'Green Curry Vegetarian')
        )
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Pineapple Rice",
        "vegecontrol" => "pineapplerice" . JT_VEGCTRL
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Phad Thai",
        "vegecontrol" => "phadthai" . JT_VEGCTRL
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "[FREE] 10 pcs of Thai Coconut Jelly",
    );

    $menu['dishes'] = $menudishes;

    return $menu;
}