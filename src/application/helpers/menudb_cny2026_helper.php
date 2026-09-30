<?php

function menuCNY2026Joy()
{

    $menu                         = array ();
    $menu[ 'id' ]                 = "CNY2026JOY";
    $menu[ 'url' ]                = "cnymenu/cnyjoy";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'CNY 2025 Joy - Festive Catering Set';
    $menu[ 'description' ]        = "9 Course @ $24.90 per person (Min 40 pax)";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = false;
    $menu[ 'allowpickup' ]        = false;
    $menu[ 'pickuplocations' ]    = array ();
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 100;
    $menu[ 'minorder' ]           = 40;
    $menu[ 'numdishes' ]          = 9;
    $menu[ 'perpax' ]             = 24.90;
    $menu[ 'tnc' ]                = array (
        "This menu includes:<ul>
			<li>Tables with skirting</li>
			<li>Food warmers</li>
			<li>Disposable plates & cutlery</li>
			<li>Napkins</li>
			<li>Trash bags</li>
			<li>Food tags</li></ul>",
        "No take away container provided",
        "Minimum order is ".$menu[ 'minorder' ]." pax",
        "A $".$menu[ 'deliverycharge' ]." transportation charge is applicable"
    );
    $menu[ 'agreetnc' ]           = "";

    //dishes
    $menudishes       = array ();
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Prosperity Mushroom Cracker (Complimentary)"
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Appetizer",
        "controlname" => "appetizerchoice",
        "choices"     => array (
            array ('label' => 'Spring Rolls'),
            array ('label' => 'Prawn Spring Roll'),
            array ('label' => 'Thai Money Bag'),
        )
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Fish Cake"
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Green Curry",
        "controlname" => "greencurrychoice",
        "choices"     => array (
            array ('label' => 'Green Curry Chicken'),
            array ('label' => 'Green Curry Vegetarian'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Fish",
        "controlname" => "fishchoice",
        "choices"     => array (
            array ('label' => 'Deep Fried Fish Fillet with Pepper & Garlic Sauce'),
            array ('label' => 'Deep Fried Fish Fillet with Thai Tamarind Sauce'),
            array ('label' => 'Deep Fried Fish Fillet with Sweet and Sour Sauce'),
            array ('label' => 'Deep Fried Fish Fillet with Thai Chili Sauce (Spicy)'),
            array ('label' => 'Steamed Fish with Thai Chili Lemon'),
            array ('label' => 'Steamed Fish (Seabass Fillet) with Thai Chili Lemon (+ $2.00 Per Pax)'),
            array ('label' => 'Steamed Fish (Salmon Fillet) with Thai Chili Lemon (+ $3.50 Per Pax)'),
            array ('label' => 'Steamed Fish with Soy Sauce'),
            array ('label' => 'Steamed Fish (Seabass Fillet) with Soy Sauce (+ $2.00 Per Pax)'),
            array ('label' => 'Steamed Fish (Salmon Fillet) with Soy Sauce (+ $3.50 Per Pax)'),
        )
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Stir Fried Chicken with Oyster Sauce"
    );
    $menudishes[]     = array (
        "type"        => "fixed",
        "label"       => "Fried Mixed Vegetables with Chinese Mushroom",
        "vegecontrol" => "mixedveg".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Rice",
        "controlname" => "ricechoice",
        "choices"     => array (
            array ('label' => 'Pineapple Rice', 'vegecontrol' => 'pineapplerice'.JT_VEGCTRL),
            array ('label' => 'Egg Fried Rice', 'vegecontrol' => 'eggfriedrice'.JT_VEGCTRL),
        )
    );
    $menudishes[]     = array (
        "type"        => "fixed",
        "label"       => "Phad Thai",
        "vegecontrol" => "phadthai".JT_VEGCTRL,
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Dessert",
        "controlname" => "dessertchoice",
        "choices"     => array (
            array ('label' => 'Tapioca with Coconut Milk'),
            array ('label' => 'Thai Red Ruby'),
            array ('label' => 'Thai Chendol'),
        )
    );
    $menu[ 'dishes' ] = $menudishes;

    return $menu;
}

function menuCNY2026Fortune()
{

    $menu                         = array ();
    $menu[ 'id' ]                 = "CNY2026FORTUNE";
    $menu[ 'url' ]                = "cnymenu/cnyfortune";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'CNY 2026 Fortune - Festive Catering Set';
    $menu[ 'description' ]        = "10 Course @ $26.90 per person (Min 35 pax)";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = false;
    $menu[ 'allowpickup' ]        = false;
    $menu[ 'pickuplocations' ]    = array ();
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 100;
    $menu[ 'minorder' ]           = 35;
    $menu[ 'numdishes' ]          = 10;
    $menu[ 'perpax' ]             = 26.90;
    $menu[ 'tnc' ]                = array (
        "This menu includes:<ul>
			<li>Tables with skirting</li>
			<li>Food warmers</li>
			<li>Disposable plates & cutlery</li>
			<li>Napkins</li>
			<li>Trash bags</li>
			<li>Food tags</li></ul>",
        "No take away container provided",
        "Minimum order is ".$menu[ 'minorder' ]." pax",
        "A $".$menu[ 'deliverycharge' ]." transportation charge is applicable"
    );
    $menu[ 'agreetnc' ]           = "";

    //dishes
    $menudishes       = array ();
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Prosperity Mushroom Cracker (Complimentary)"
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Appetizer",
        "controlname" => "appetizerchoice",
        "choices"     => array (
            array ('label' => 'Spring Rolls'),
            array ('label' => 'Prawn Spring Roll'),
            array ('label' => 'Thai Money Bag'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Appetizer",
        "controlname" => "appetizer2choice",
        "choices"     => array (
            array ('label' => 'Thai Fish Cake'),
            array ('label' => 'Prawn Cake'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Green Curry",
        "controlname" => "greencurrychoice",
        "choices"     => array (
            array ('label' => 'Green Curry Chicken'),
            array ('label' => 'Green Curry Vegetarian'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Fish",
        "controlname" => "fishchoice",
        "choices"     => array (
            array ('label' => 'Deep Fried Fish Fillet with Pepper & Garlic Sauce'),
            array ('label' => 'Deep Fried Fish Fillet with Thai Tamarind Sauce'),
            array ('label' => 'Deep Fried Fish Fillet with Sweet and Sour Sauce'),
            array ('label' => 'Deep Fried Fish Fillet with Thai Chili Sauce (Spicy)'),
            array ('label' => 'Steamed Fish with Thai Chili Lemon'),
            array ('label' => 'Steamed Fish (Seabass Fillet) with Thai Chili Lemon (+ $2.00 Per Pax)'),
            array ('label' => 'Steamed Fish (Salmon Fillet) with Thai Chili Lemon (+ $3.50 Per Pax)'),
            array ('label' => 'Steamed Fish with Soy Sauce'),
            array ('label' => 'Steamed Fish (Seabass Fillet) with Soy Sauce (+ $2.00 Per Pax)'),
            array ('label' => 'Steamed Fish (Salmon Fillet) with Soy Sauce (+ $3.50 Per Pax)'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Chicken",
        "controlname" => "chickenchoice",
        "choices"     => array (
            array ('label' => 'Chicken with Cashew Nut'),
            array ('label' => 'Chicken with Pepper & Garlic'),
        )
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Cereal Prawn",
    );
    $menudishes[]     = array (
        "type"        => "fixed",
        "label"       => "Fried Mixed Vegetables with Chinese Mushroom",
        "vegecontrol" => "mixedveg".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Rice",
        "controlname" => "ricechoice",
        "choices"     => array (
            array ('label' => 'Pineapple Rice', 'vegecontrol' => 'pineapplerice'.JT_VEGCTRL),
            array ('label' => 'Egg Fried Rice', 'vegecontrol' => 'eggfriedrice'.JT_VEGCTRL),
            array ('label' => 'Olive Rice', 'vegecontrol' => 'oliverice'.JT_VEGCTRL),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Noodle",
        "controlname" => "noodlechoice",
        "choices"     => array (
            array ('label' => 'Phad Thai', 'vegecontrol' => 'phadthai'.JT_VEGCTRL),
            array ('label' => 'Fried Tang Hoon', 'vegecontrol' => 'friedtanghoon'.JT_VEGCTRL),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Dessert",
        "controlname" => "dessertchoice",
        "choices"     => array (
            array ('label' => 'Tapioca with Coconut Milk'),
            array ('label' => 'Thai Red Ruby'),
            array ('label' => 'Thai Chendol'),
        )
    );
    $menu[ 'dishes' ] = $menudishes;

    return $menu;
}

function menuCNY2026Prosperity()
{

    $menu                         = array ();
    $menu[ 'id' ]                 = "CNY2026PROSPERITY";
    $menu[ 'url' ]                = "cnymenu/cnyprosperity";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'CNY 2026 Prosperity - Festive Catering Set';
    $menu[ 'description' ]        = "13 Course @ $29.90 per person (Min 30 pax)";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = false;
    $menu[ 'allowpickup' ]        = false;
    $menu[ 'pickuplocations' ]    = array ();
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 100;
    $menu[ 'minorder' ]           = 30;
    $menu[ 'numdishes' ]          = 13;
    $menu[ 'perpax' ]             = 29.90;
    $menu[ 'tnc' ]                = array (
        "This menu includes:<ul>
			<li>Tables with skirting</li>
			<li>Food warmers</li>
			<li>Disposable plates & cutlery</li>
			<li>Napkins</li>
			<li>Trash bags</li>
			<li>Food tags</li></ul>",
        "No take away container provided",
        "Minimum order is ".$menu[ 'minorder' ]." pax",
        "A $".$menu[ 'deliverycharge' ]." transportation charge is applicable"
    );
    $menu[ 'agreetnc' ]           = "";

    //dishes
    $menudishes       = array ();
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Prosperity Mushroom Cracker (Complimentary)"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Prawn Cake"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Money Bag"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Seafood Spring Rolls"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Fish Cake"
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Green Curry",
        "controlname" => "greencurrychoice",
        "choices"     => array (
            array ('label' => 'Green Curry Chicken'),
            array ('label' => 'Green Curry Vegetarian'),
        )
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Tom Yum Seafood Chilli Paste"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Deep Fried Fish Fillet with Thai Tamarind Sauce"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Prawn & Squid with Pepper & Garlic Sauce"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Thai Style Grilled Chicken"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Fried Mixed Vegetables with Chinese Mushroom & Ginkgo Nut "
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Rice",
        "controlname" => "ricechoice",
        "choices"     => array (
            array ('label' => 'Pineapple Rice', 'vegecontrol' => 'pineapplerice'.JT_VEGCTRL),
            array ('label' => 'Egg Fried Rice', 'vegecontrol' => 'eggfriedrice'.JT_VEGCTRL),
            array ('label' => 'Olive Rice', 'vegecontrol' => 'oliverice'.JT_VEGCTRL),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Noodle",
        "controlname" => "noodlechoice",
        "choices"     => array (
            array ('label' => 'Phad Thai', 'vegecontrol' => 'phadthai'.JT_VEGCTRL),
            array ('label' => 'Fried Tang Hoon', 'vegecontrol' => 'friedtanghoon'.JT_VEGCTRL),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Dessert",
        "controlname" => "dessertchoice",
        "choices"     => array (
            array ('label' => 'Tapioca with Coconut Milk'),
            array ('label' => 'Thai Red Ruby'),
            array ('label' => 'Thai Chendol'),
        )
    );
    $menu[ 'dishes' ] = $menudishes;

    return $menu;
}

function menuCNY2026FamilySet()
{

    $menu                         = array ();
    $menu[ 'id' ]                 = "CNY2026FAMILYSET";
    $menu[ 'url' ]                = "cnymenu/cnyfamilyset";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'CNY 2026 Takeaway Family Set';
    $menu[ 'description' ]        = "9 Course @ $28.8 per person (Min 10 pax)";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = true;
    $menu[ 'allowpickup' ]        = true;
    $menu[ 'pickuplocations' ]    = array (JT_CW, JT_CK);
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 50;
    $menu[ 'minorder' ]           = 10;
    $menu[ 'numdishes' ]          = 9;
    $menu[ 'perpax' ]             = 28.8;
    $menu[ 'tnc' ]                = array (
        "This menu includes:<ul>
			<li>Food prepared in disposable containers / trays</li>
			<li>Disposable plates & cutlery</li></ul>",
        "Delivery available for orders more than 20 pax.",
        "Minimum order is ".$menu[ 'minorder' ]." pax (1 set).  Order quantity in multiples of 10 pax only.",
        "Order is 10 pax per set",
    );
    $menu[ 'agreetnc' ]           = "I understand that this set is only available for self collection, with no buffet table set-up.";

    //dishes
    $menudishes       = array ();
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Prosperity Mushroom Cracker (Complimentary)"
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Appetizer",
        "controlname" => "appetizerchoice",
        "choices"     => array (
            array ('label' => 'Spring Rolls'),
            array ('label' => 'Prawn Spring Roll'),
            array ('label' => 'Prosperity Money Bag'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Appetizer",
        "controlname" => "appetizer2choice",
        "choices"     => array (
            array ('label' => 'Prawn Cake'),
            array ('label' => 'Fish Cake'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Chicken",
        "controlname" => "chickenchoice",
        "choices"     => array (
            array ('label' => 'Green Curry Chicken'),
            array ('label' => 'Green Curry Vegetarian'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Fish",
        "controlname" => "fishchoice",
        "choices"     => array (
            array ('label' => 'Deep Fried Fish Fillet with Thai Tamarind Sauce'),
            array ('label' => 'Deep Fried Fish Fillet with Thai Chili Sauce (Spicy)'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Prawn",
        "controlname" => "prawnchoice",
        "choices"     => array (
            array ('label' => 'Stir Fried Prawn with Chilli Paste'),
            array ('label' => 'Stir Fried Prawn with Cashew Nut'),
        )
    );
    $menudishes[]     = array (
        "type"        => "fixed",
        "label"       => "Fried Mixed Vegetables",
        "vegecontrol" => "mixedveg".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Rice",
        "controlname" => "ricechoice",
        "choices"     => array (
            array ('label' => 'Egg Fried Rice', 'vegecontrol' => 'eggfriedrice'.JT_VEGCTRL),
            array ('label' => 'Pineapple Rice', 'vegecontrol' => 'pineapplerice'.JT_VEGCTRL),
            array ('label' => 'Olive Rice', 'vegecontrol' => 'oliverice'.JT_VEGCTRL),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Noodle",
        "controlname" => "noodlechoice",
        "choices"     => array (
            array ('label' => 'Fried Tang Hoon', 'vegecontrol' => 'friedtanghoon'.JT_VEGCTRL),
            array ('label' => 'Phad Thai', 'vegecontrol' => 'phadthai'.JT_VEGCTRL),
        )
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Tapioca with Coconut Milk ",
    );
    $menu[ 'dishes' ] = $menudishes;

    return $menu;
}

function menuCNY2026Addons()
{
    $menu                         = array ();
    $menu[ 'id' ]                 = "CNYADDONS";
    $menu[ 'url' ]                = 'cnymenu/cnyaddons';
    $menu[ 'type' ]               = JT_ALACARTEMENU;
    $menu[ 'title' ]              = 'CNY 2026 Add On Dishes';
    $menu[ 'description' ]        = "";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = false;
    $menu[ 'allowpickup' ]        = true;
    $menu[ 'pickuplocations' ]    = array (JT_CW, JT_PV, JT_CK);
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 50;
    $menu[ 'minorder' ]           = 200;
    $menu[ 'numdishes' ]          = 0;
    $menu[ 'perpax' ]             = 0;
    $menu[ 'tnc' ]                = array (
        "This menu includes:<ul>
			<li>Food prepared in disposable trays</li>
			<li>Disposable plates & cutlery</li></ul>",
        "Food best consumed within one hour of delivery.",
        "Suggest 7 - 8 items to ensure enough food for your party.",
        "No buffet table set-up or food warmers.",
        "Minimum delivery order is $".$menu[ 'minorder' ].". Delivery charge of $".$menu[ 'deliverycharge' ]." applies.",
        "If chafing set is required, delivery charge of $95 applies.",
        "For orders below $".$menu[ 'minorder' ].", an additional $10 delivery surcharge applies.",
        "Menu items subject to availability."
    );
    $menu[ 'agreetnc' ]           = "I understand that the food will be prepared in disposable trays, with no buffet table set-up.";

    //dishes
    $menudishes = array ();


    //special
    $menudishes[ 'group_special' ] = array (
        'type'  => 'group',
        'label' => '<img src="'.site_url('assets/images/cny-gold-ingot.png').'"/>   Chinese New Year Special   <img src="'.site_url('assets/images/cny-gold-ingot.png').'"/>'
    );
    $menudishes[ 'cny1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Jai Siam Mango Prosperity Yusheng with King Topshell',
        'usecontainer' => true,
        'serves'       => 8,
        'price'        => 48.8
    );
    $menudishes[ 'cny2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Jai Siam Mango Prosperity Yusheng with Fruits',
        'usecontainer' => true,
        'serves'       => 8,
        'price'        => 48.8
    );
    $menudishes['appetizer1'] = array(
        'type' => 'dish',
        'spicykid' => JT_KID,
        'speciality' => JT_SPECIALITY,
        'label' => 'Prawn Cake',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 32 * 1.2
    );
    $menudishes['appetizer2'] = array(
        'type' => 'dish',
        'spicykid' => JT_SPICY,
        'speciality' => JT_SPECIALITY,
        'label' => 'Fish Cake',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 32 * 1.2
    );
    $menudishes['appetizer4'] = array(
        'type' => 'dish',
        'spicykid' => JT_KID,
        'speciality' => JT_NONE,
        'label' => 'Thai Spring Rolls',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 26 * 1.2
    );
    $menudishes['appetizer5'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => 'Prawn Spring Roll',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 26 * 1.2
    );
    $menudishes['appetizer6'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => 'Money Bag',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 26 * 1.2
    );
    $menudishes['fish1'] = array(
        'type' => 'dish',
        'spicykid' => JT_SPICY,
        'speciality' => JT_SPECIALITY,
        'label' => 'Deep Fried Fish Fillet with Chilli Sauce',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 38 * 1.2
    );
    $menudishes['fish2'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_SPECIALITY,
        'label' => 'Deep Fried Fish Fillet with Pepper & Garlic',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 38 * 1.2
    );
    $menudishes['fish3'] = array(
        'type' => 'dish',
        'spicykid' => JT_SPICY,
        'speciality' => JT_NONE,
        'label' => 'Deep Fried Fish Fillet with Basil Leaf',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 38 * 1.2
    );
    $menudishes['fish4'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => 'Deep Fried Fish Fillet with Sweet & Sour Sauce',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 38 * 1.2
    );
    $menudishes['fish5'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_NONE,
        'label' => 'Deep Fried Fish with Tamarind Sauce',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 38 * 1.2
    );
    $menudishes['meat10'] = array(
        'type' => 'dish',
        'spicykid' => JT_NONE,
        'speciality' => JT_SPECIALITY,
        'label' => 'Stuffed Chicken Wings',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 36 * 1.2
    );
    $menudishes['meat6'] = array(
        'type' => 'dish',
        'spicykid' => JT_KID,
        'speciality' => JT_NONE,
        'label' => 'Lemon Leaf Chicken',
        'usecontainer' => true,
        'serves' => 10,
        'price' => 34 * 1.2
    );
    $menu[ 'dishes' ] = $menudishes;

    return $menu;


}