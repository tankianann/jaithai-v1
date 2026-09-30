<?php

function menuCHOKDEEVEGAN() {

    $menu = array();
    $menu['id'] = "CHOKDEEVEGAN";
//    $menu['url'] = 'catering-chaiyo-set.php';
    $menu['type'] = JT_SETMENU;
//    $menu['pdffile'] = 'chaiyo-set.pdf';
    $menu['title'] = 'Chokdee Vegan Set';
    $menu['description'] = "8 Course @ $26.90 person (min 10 pax)";
    $menu['meta_description'] = "The Chokdee set is perfect for a team meeting or for a gathering with your besties! Order online and collect at any one of our outlets!";
    $menu['hasdrink'] = false;
    $menu['allowpickup'] = true;
    $menu['pickuplocations'] = array(JT_PV, JT_CK);
    $menu['hascontainercharge'] = false;
    $menu['deliverycharge'] = 40;
    $menu['minorder'] = 10;
    $menu['numdishes'] = 8;
    $menu['perpax'] = 26.9;

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
        "label" => "Mixed Appetizer (Vegetable Spring Rolls, Corn Fritter, Deep Fried Bean Curd) with Peanut Sauce"
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Vegan Mango Salad"
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "Crispy Plant Based Soy Protein with Sesame Seeds"
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
        "label" => "Tom Yum Vegan Clear Soup",
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
        "label" => "Vegan Fried Tang Hoon",
    );
    $menudishes[] = array(
        "type" => "fixed",
        "label" => "[FREE] 10 pcs of Thai Coconut Jelly",
    );

    $menu['dishes'] = $menudishes;

    return $menu;
}