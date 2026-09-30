<?php

function menuXMASSET()
{
    $menu                         = array ();
    $menu[ 'id' ]                 = "XMASSET";
    $menu[ 'url' ]                = "xmasset";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'XMas and New Year Mini Party Set';
    $menu[ 'description' ]        = "$328 Plus GST Per Set - 10 Dishes for 10 Pax";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = true;
    $menu[ 'allowpickup' ]        = true;
    $menu[ 'pickuplocations' ]    = array (JT_CW, JT_PV, JT_CK);
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 40;
    $menu[ 'minorder' ]           = 10;
    $menu[ 'numdishes' ]          = 10;
    $menu[ 'perpax' ]             = 32.8;
    $menu[ 'tnc' ]                = array (
        "Food will be prepared in disposable trays, no buffet table set-up.",
        "Disposable plates, forks &amp; spoons and chilli sauce will be provided.",
        "Minimum order is ".$menu[ 'minorder' ]." pax (1 set).  Order quantity in multiples of 10 pax only.",
        "A $".$menu[ 'deliverycharge' ]." transportation charge is applicable",
        "Please submit a separate order for each delivery address."
    );
    $menu[ 'agreetnc' ]           = "I understand that the food will be prepared in disposable trays, with no buffet table set-up.";

    //dishes
    $menudishes       = array ();
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Turkey Ham Salad with Thai Dressing"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Prawn Cake"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Tom Yum Seafood Soup"
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Fish",
        "controlname" => "fish",
        "choices"     => array (
            array ('label' => 'Steamed Salmon'),
            array ('label' => 'Seabass with Chili Lemon'),
            array ('label' => 'Seabass with Soya Sauce'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Meat",
        "controlname" => "meat",
        "choices"     => array (
            array ('label' => 'Black Pepper Braised Beef'),
            array ('label' => 'Black Pepper Chicken'),
            array ('label' => 'Stuffed Chicken Wings'),
        )
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Fried Prawn with Cashew Nut"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Stir Fried Long Bean with Capsicum",
        "vegecontrol" => "longbean".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Xmas Glass Noodle",
        "vegecontrol" => "noodle".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Pineapple Rice",
        "vegecontrol" => "rice".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Xmas Ruby",
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "[FREE] 1 box of Premium Brownie worth $38 (for orders paid before 15 December)",
    );
    $menu[ 'dishes' ] = $menudishes;

    return $menu;
}


function menuXMASCATERING()
{

    $menu                         = array ();
    $menu[ 'id' ]                 = "XMASCATERING";
    $menu[ 'url' ]                = "xmascatering";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'XMas and New Year Catering';
    $menu[ 'description' ]        = "10 Course @ $29.80 Plus GST Per Person";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = false;
    $menu[ 'allowpickup' ]        = false;
    $menu[ 'pickuplocations' ]    = array ();
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 80;
    $menu[ 'minorder' ]           = 30;
    $menu[ 'numdishes' ]          = 10;
    $menu[ 'perpax' ]             = 29.80;
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
        "label" => "Turkey Ham Salad with Thai Dressing"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Prawn Cake"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Tom Yum Seafood Soup"
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Fish",
        "controlname" => "fish",
        "choices"     => array (
            array ('label' => 'Steamed Salmon'),
            array ('label' => 'Seabass with Chili Lemon'),
            array ('label' => 'Seabass with Soya Sauce'),
        )
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Meat",
        "controlname" => "meat",
        "choices"     => array (
            array ('label' => 'Black Pepper Braised Beef'),
            array ('label' => 'Black Pepper Chicken'),
            array ('label' => 'Stuffed Chicken Wings'),
        )
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Fried Prawn with Cashew Nut"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Stir Fried Long Bean with Capsicum",
        "vegecontrol" => "longbean".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Xmas Glass Noodle",
        "vegecontrol" => "noodle".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Pineapple Rice",
        "vegecontrol" => "rice".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Xmas Ruby",
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "[FREE] 1 box of Premium Brownie worth $38 (for orders paid before 15 December)",
    );
    $menu[ 'dishes' ] = $menudishes;

    return $menu;
}