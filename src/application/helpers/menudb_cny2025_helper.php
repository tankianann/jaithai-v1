<?php

function menuCNY2025Happiness()
{

    $menu                         = array ();
    $menu[ 'id' ]                 = "CNY2025HAPPINESS";
    $menu[ 'url' ]                = "cnymenu/cnyhappiness";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'CNY 2025 Happiness - Festive Catering Set';
    $menu[ 'description' ]        = "9 Course @ $23.90 per person (Min 40 pax)";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = false;
    $menu[ 'allowpickup' ]        = false;
    $menu[ 'pickuplocations' ]    = array ();
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 90;
    $menu[ 'minorder' ]           = 40;
    $menu[ 'numdishes' ]          = 9;
    $menu[ 'perpax' ]             = 23.90;
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

function menuCNY2025Delight()
{

    $menu                         = array ();
    $menu[ 'id' ]                 = "CNY2025DELIGHT";
    $menu[ 'url' ]                = "cnymenu/cnydelight";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'CNY 2025 Delight - Festive Catering Set';
    $menu[ 'description' ]        = "10 Course @ $25.90 per person (Min 35 pax)";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = false;
    $menu[ 'allowpickup' ]        = false;
    $menu[ 'pickuplocations' ]    = array ();
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 90;
    $menu[ 'minorder' ]           = 35;
    $menu[ 'numdishes' ]          = 10;
    $menu[ 'perpax' ]             = 25.90;
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

function menuCNY2025Treasure()
{

    $menu                         = array ();
    $menu[ 'id' ]                 = "CNY2025TREASURE";
    $menu[ 'url' ]                = "cnymenu/cnytreasure";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'CNY 2025 Treasure - Festive Catering Set';
    $menu[ 'description' ]        = "13 Course @ $28.90 per person (Min 30 pax)";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = false;
    $menu[ 'allowpickup' ]        = false;
    $menu[ 'pickuplocations' ]    = array ();
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 90;
    $menu[ 'minorder' ]           = 30;
    $menu[ 'numdishes' ]          = 13;
    $menu[ 'perpax' ]             = 28.90;
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
        "label" => "Stuffed Chicken Wing"
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

function menuCNY2025FamilySet()
{

    $menu                         = array ();
    $menu[ 'id' ]                 = "CNY2025FAMILYSET";
    $menu[ 'url' ]                = "cnymenu/cnyfamilyset";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'CNY 2025 Takeaway Family Set';
    $menu[ 'description' ]        = "9 Course @ $28.8 per person (Min 10 pax)";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = true;
    $menu[ 'allowpickup' ]        = true;
    $menu[ 'pickuplocations' ]    = array (JT_CW, JT_PV, JT_CK);
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 0;
    $menu[ 'minorder' ]           = 10;
    $menu[ 'numdishes' ]          = 10;
    $menu[ 'perpax' ]             = 26.8;
    $menu[ 'tnc' ]                = array (
        "This menu includes:<ul>
			<li>Food prepared in disposable containers / trays</li>
			<li>Disposable plates & cutlery</li></ul>",
        "Available for self collection only.",
        "Minimum order is ".$menu[ 'minorder' ]." pax (1 set).  Order quantity in multiples of 10 pax only.",
        "Order is 10 pax per set",
    );
    $menu[ 'agreetnc' ]           = "I understand that this set is only available for self collection, with no buffet table set-up.";

    //dishes
    $menudishes       = array ();
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

function menuCNY2025Yusheng()
{

    $menu                         = array ();
    $menu[ 'id' ]                 = "CNYYUSHENG";
    $menu[ 'url' ]                = 'cnymenu/yusheng';
    $menu[ 'type' ]               = JT_ALACARTEMENU;
    $menu[ 'title' ]              = 'CNY 2025 Prosperity Yusheng';
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
        "Minimum delivery order is $".$menu[ 'minorder' ].". Delivery charge of $".$menu[ 'deliverycharge' ]." applies.",
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
    $menudishes[ 'yusheng1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Jai Siam Mango Prosperity Yusheng with King Topshell',
        'usecontainer' => true,
        'serves'       => 8,
        'price'        => 48.8
    );
    $menudishes[ 'yusheng2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Jai Siam Mango Prosperity Yusheng with Fruits',
        'usecontainer' => true,
        'serves'       => 8,
        'price'        => 48.8
    );
    $menu[ 'dishes' ]              = $menudishes;

    return $menu;


}

function menuCNY2025Addons()
{
    $menu                         = array ();
    $menu[ 'id' ]                 = "CNYADDONS";
    $menu[ 'url' ]                = 'cnymenu/cnyaddons';
    $menu[ 'type' ]               = JT_ALACARTEMENU;
    $menu[ 'title' ]              = 'CNY 2025 Add On Dishes';
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
    $menudishes[ 'yusheng1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Jai Siam Mango Prosperity Yusheng with King Topshell',
        'usecontainer' => true,
        'serves'       => 8,
        'price'        => 48.8
    );
    //appetizer
    $menudishes[ 'group_appetizer' ] = array (
        'type'  => 'group',
        'label' => 'Appetizer'
    );
    $menudishes[ 'appetizer1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_KID,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Prawn Cake',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 32
    );
    $menudishes[ 'appetizer2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Fish Cake',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 32
    );
    $menudishes[ 'appetizer3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Deep Fried Bean Curd',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 26
    );
    $menudishes[ 'appetizer4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_KID,
        'speciality'   => JT_NONE,
        'label'        => 'Thai Spring Rolls',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 26
    );
    $menudishes[ 'appetizer5' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Prawn Spring Roll',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 26
    );
    $menudishes[ 'appetizer6' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Money Bag',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 26
    );
    $menudishes[ 'appetizer7' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_KID,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Mixed Appetizers',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );

    //salad
    $menudishes[ 'group_salad' ] = array (
        'type'  => 'group',
        'label' => 'Salad'
    );
    $menudishes[ 'salad1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Mango Salad',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'salad2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Tang Hoon Salad',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'salad3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Beef Salad',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'salad4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Seafood Salad',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );

    //fish
    $menudishes[ 'group_fish' ] = array (
        'type'  => 'group',
        'label' => 'Fish'
    );
    $menudishes[ 'fish1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Deep Fried Fish Fillet with Chilli Sauce',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'fish2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Deep Fried Fish Fillet with Pepper & Garlic',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'fish3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Deep Fried Fish Fillet with Basil Leaf',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'fish4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Deep Fried Fish Fillet with Sweet & Sour Sauce',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'fish5' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Deep Fried Fish with Tamarind Sauce',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );

    //squid prawn
    $menudishes[ 'group_squidprawn' ] = array (
        'type'  => 'group',
        'label' => 'Squid / Prawn'
    );
    $menudishes[ 'squidprawn1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Squid Pepper & Garlic',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'squidprawn2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Squid Chilli Paste',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'squidprawn3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Squid Basil Leaf',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'squidprawn4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Prawn Chilli Paste (Deshelled)',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'squidprawn5' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Prawn Basil Leaf (Deshelled)',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'squidprawn6' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Prawn Curry Powder (Deshelled)',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'squidprawn7' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Prawn Pepper & Garlic (Deshelled)',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'squidprawn8' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_KID,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Prawn Tamarind Sauce (Deshelled)',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );

    //meat
    $menudishes[ 'group_meat' ] = array (
        'type'  => 'group',
        'label' => 'Meat'
    );
    $menudishes[ 'meat1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Stir Fried Beef with Pepper & Garlic',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'meat2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Stir Fried Beef with Basil Leaf',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'meat3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Stir Fried Beef with Chilli Paste',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'meat4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_KID,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Deep Fried Pandan Chicken',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'meat5' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Chicken with Cashew Nut',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'meat6' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_KID,
        'speciality'   => JT_NONE,
        'label'        => 'Lemon Leaf Chicken',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'meat7' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Stir Fried Chicken Pepper & Garlic',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'meat8' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Stir Fried Chicken with Basil Leaf',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'meat9' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Stir Fried Chicken Chilli Paste',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'meat10' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Stuffed Chicken Wings',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 36
    );

    //currysoup
    $menudishes[ 'group_currysoup' ] = array (
        'type'  => 'group',
        'label' => 'Thai Curry / Soup Special'
    );
    $menudishes[ 'currysoup1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Green Curry Chicken',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'currysoup2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Green Curry Beef',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'currysoup3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Green Curry Fish',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'currysoup4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Green Curry Prawn',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'currysoup5' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Green Curry Vegan',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'currysoup6' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Red Curry Chicken',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'currysoup7' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Red Curry Beef',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'currysoup8' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Red Curry Fish',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'currysoup9' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Red Curry Prawn',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'currysoup10' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Red Curry Vegan',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'currysoup11' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Dried Curry Chicken',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'currysoup12' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Dried Curry Beef',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'currysoup13' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Dried Curry Vegan',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'currysoup14' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Tom Yum Seafood Soup (Clear Soup)',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'currysoup15' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Tom Yum Seafood Soup (with Chilli Paste)',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'currysoup16' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Tom Yum Chicken Soup (Clear Soup)',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'currysoup17' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Tom Yum Chicken Soup (with Chilli Paste)',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'currysoup18' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Tom Yum Vegan Soup (Clear Soup)',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'currysoup20' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Tom Kha Chicken',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 34
    );
//	$menudishes['currysoup21'] = array(
//		'type' => 'dish',
//		'spicykid' => JT_NONE,
//		'speciality' => JT_NONE,
//		'label' => 'Red Curry Duck',
//		'usecontainer' => true,
//		'serves' => 10,
//		'price' => 30
//	);

    //vegetable
    $menudishes[ 'group_vegetable' ] = array (
        'type'  => 'group',
        'label' => 'Vegetable'
    );
    $menudishes[ 'vegetable1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Kai Lan Oyster Sauce',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'vegetable2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Kai Lan with Salted Fish',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'vegetable3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Kai Lan with Chinese Mushroom',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'vegetable4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Bean Sprout',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'vegetable5' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Bean Sprout with Salted Fish',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'vegetable6' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Mixed Vegetables',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'vegetable7' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Mixed Vegetables with Chinese Mushroom',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'vegetable8' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Cabbage Oyster Sauce',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'vegetable9' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Cabbage with Chinese Mushroom',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 38
    );
    $menudishes[ 'vegetable10' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Broccoli',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 34
    );
    $menudishes[ 'vegetable11' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Broccoli with Chinese Mushroom',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 10,
        'price'        => 38
    );

    //noodlerice
    $menudishes[ 'group_noodlerice' ] = array (
        'type'  => 'group',
        'label' => 'Noodle / Rice'
    );
    $menudishes[ 'noodlerice1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Pineapple Rice',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 5,
        'price'        => 34
    );
    $menudishes[ 'noodlerice2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Olive Rice',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 5,
        'price'        => 34
    );
    $menudishes[ 'noodlerice3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Salted Fish Fried Rice',
        'usecontainer' => true,
        'serves'       => 5,
        'price'        => 34
    );
    $menudishes[ 'noodlerice4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Seafood Fried Rice',
        'usecontainer' => true,
        'serves'       => 5,
        'price'        => 42
    );
    $menudishes[ 'noodlerice5' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Rice Basil Leaf',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 5,
        'price'        => 34
    );
    $menudishes[ 'noodlerice6' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Tang Hoon',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 5,
        'price'        => 34
    );
    $menudishes[ 'noodlerice7' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_SPICY,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Spicy Noodle',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 5,
        'price'        => 34
    );
    $menudishes[ 'noodlerice8' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Bee Hoon',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 5,
        'price'        => 34
    );
    $menudishes[ 'noodlerice9' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_SPECIALITY,
        'label'        => 'Phad Thai',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 5,
        'price'        => 34
    );
    $menudishes[ 'noodlerice10' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Fried Hor Fan (Dry)',
        'usecontainer' => true,
        'vegecontrol'  => true,
        'serves'       => 5,
        'price'        => 34
    );
    $menudishes[ 'noodlerice11' ]     = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Steamed Rice',
        'usecontainer' => true,
        'serves'       => 5,
        'price'        => 7
    );

    //dessert
    $menudishes[ 'group_dessert' ] = array (
        'type'  => 'group',
        'label' => 'Desserts'
    );
    $menudishes[ 'dessert1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Tapioca with Coconut Milk',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 32
    );
    $menudishes[ 'dessert2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Assorted Jelly',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 32
    );
    $menudishes[ 'dessert3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Tako in Pandan Leaf',
        'usecontainer' => true,
        'serves'       => 20,
        'price'        => 36
    );
    $menudishes[ 'dessert4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Chendol',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 32
    );
    $menudishes[ 'dessert5' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Red Ruby',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 32
    );
    $menudishes[ 'dessert6' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Chendol Ruby Mixed',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 32
    );
    $menudishes[ 'dessert7' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Mango Sticky Rice',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 42
    );
    $menudishes[ 'dessert8' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Assorted Coconut Jelly',
        'usecontainer' => true,
        'serves'       => 10,
        'price'        => 38
    );
//	$menudishes['tray-dessert7'] = array(
//		'type' => 'dish',
//		'spicykid' => JT_NONE,
//		'speciality' => JT_NONE,
//		'label' => 'Fruit Luk Choob - Miniature Mung Bean Paste (Min 3 Days Advanced Order)',
//		'usecontainer' => true,
//		'serves' => 100,
//		'price' => 75
//	);
//	$menudishes['tray-dessert8'] = array(
//		'type' => 'dish',
//		'spicykid' => JT_NONE,
//		'speciality' => JT_NONE,
//		'label' => 'Duck Luk Choob - Miniature Mung Bean Paste (Min 3 Days Advanced Order)',
//		'usecontainer' => true,
//		'serves' => 50,
//		'price' => 50
//	);

    //drinks
    $menudishes[ 'group_drinks' ] = array (
        'type'  => 'group',
        'label' => 'Drinks'
    );
    $menudishes[ 'drinks1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Chrysanthemum Tea (Packet)',
        'usecontainer' => false,
        'serves'       => 6,
        'price'        => 6
    );
    $menudishes[ 'drinks2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Green Tea (Packet)',
        'usecontainer' => false,
        'serves'       => 6,
        'price'        => 6
    );
    $menudishes[ 'drinks3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Ice Lemon Tea (Packet)',
        'usecontainer' => false,
        'serves'       => 6,
        'price'        => 6
    );
    $menudishes[ 'drinks4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Lemon Barley (Packet)',
        'usecontainer' => false,
        'serves'       => 6,
        'price'        => 6
    );
    $menudishes[ 'drinks5' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Lychee (Packet)',
        'usecontainer' => false,
        'serves'       => 6,
        'price'        => 6
    );
    $menudishes[ 'drinks6' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Sugarcane (Packet)',
        'usecontainer' => false,
        'serves'       => 6,
        'price'        => 6
    );
    $menudishes[ 'drinks7' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Winter Melon Tea (Packet)',
        'usecontainer' => false,
        'serves'       => 6,
        'price'        => 6
    );
    $menudishes[ 'drinks8' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Mineral Water',
        'usecontainer' => false,
        'serves'       => 6,
        'price'        => 6
    );


    //drinks
    $menudishes[ 'group_sdrinks' ] = array (
        'type'  => 'group',
        'label' => 'Speciality Homemade Drink'
    );
    $menudishes[ 'sdrinks1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Thai Milk Tea (Bottle)',
        'usecontainer' => false,
        'serves'       => 1,
        'price'        => 3
    );
    $menudishes[ 'sdrinks2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Thai Green Tea (Bottle)',
        'usecontainer' => false,
        'serves'       => 1,
        'price'        => 3
    );
    $menudishes[ 'sdrinks3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Butterfly Pea Drink (Bottle)',
        'usecontainer' => false,
        'serves'       => 1,
        'price'        => 3
    );
    $menudishes[ 'sdrinks4' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Lemongrass Drink (Bottle)',
        'usecontainer' => false,
        'serves'       => 1,
        'price'        => 3
    );

    //drinks
    $menudishes[ 'group_equipment' ] = array (
        'type'  => 'group',
        'label' => 'Equipment'
    );
    $menudishes[ 'equipment1' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Chafing Set Rental - 2 Dishes to 1 Set (Delivery charge of $90 applies)',
        'usecontainer' => false,
        'serves'       => 1,
        'price'        => 15
    );
    $menudishes[ 'equipment2' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Porcelain Plate with Stainless Steel Fork & Spoon',
        'usecontainer' => false,
        'serves'       => 1,
        'price'        => 3.50
    );
    $menudishes[ 'equipment3' ]      = array (
        'type'         => 'dish',
        'spicykid'     => JT_NONE,
        'speciality'   => JT_NONE,
        'label'        => 'Dessert Bowl with Spoon',
        'usecontainer' => false,
        'serves'       => 1,
        'price'        => 1
    );

    $menu[ 'dishes' ] = $menudishes;

    return $menu;


}