<?php

function menuTHAICELEBRATION() {

    $menu = array();
    $menu['id'] = "THAICELEBRATION";
    $menu['type'] = JT_SETMENU;
    $menu['title'] = 'Thai Celebration Set';
    $menu['description'] = "8 Course @ $37.50 person (min 10 pax)";
    $menu['meta_description'] = "Authentic Thai Celebration Set for 10 pax. Enjoy stuffed wings, seabass, tom yum soup, mango sticky rice & more. Perfect for parties & gatherings!";
    $menu['hasdrink'] = false;
    $menu['allowpickup'] = true;
    $menu['pickuplocations'] = array(JT_PV, JT_CK);
    $menu['hascontainercharge'] = false;
    $menu['deliverycharge'] = 40;
    $menu['minorder'] = 10;
    $menu['numdishes'] = 6;
    $menu['perpax'] = 37.50;

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
        "label" => "Thai Stuffed Chicken Wing"
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Deep Fried Seabass with Pepper & Garlic",
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Battered Prawns in Tamarind Sauce",
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Tom Yum Seafood Soup",
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Fried Cabbage with Beancurd Skin",
        "vegecontrol" => "cabbage" . JT_VEGCTRL,
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Baked Tofu with Tanghoon",
        "vegecontrol" => "tofu" . JT_VEGCTRL,
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Thai Belachan Rice with Condiments",
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Mango Sticky Rice",
    );
    $menu['dishes'] = $menudishes;

    return $menu;
}