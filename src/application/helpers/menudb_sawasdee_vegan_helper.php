<?php

function menuSAWASDEEVEGAN() {

    $menu = array();
    $menu['id'] = "SAWASDEEVEGAN";
//    $menu['url'] = 'catering-chaiyo-set.php';
    $menu['type'] = JT_SETMENU;
    $menu['title'] = 'Sawasdee Vegan Set';
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
        "label" => "Corn Fritter"
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Vegetable Spring Roll"
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Fried Plant Based Soy Protein with Pepper & Garlic"
    );
    $menudishes[] = array(
        "type" => "pick1",
        "label" => "Choice of Bean Curd",
        "controlname" => "beancurdchoice",
        "choices" => array(
            array('label' => 'Fried Bean Curd with Basil Leaf'),
            array('label' => 'Fried Bean Curd with Cashew Nut'),
            array('label' => 'Fried Bean Curd with Sweet & Sour Sauce'),
            array('label' => 'Steamed Bean Curd with Thai Chili Lemon'),
        )
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Green Curry Vegetarian",
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Fried Mixed Vegetables",
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Vegan Pineapple Rice",
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Vegan Fried Phad Thai",
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "[FREE] 10 pcs of Thai Coconut Jelly",
    );

    $menu['dishes'] = $menudishes;

    return $menu;
}