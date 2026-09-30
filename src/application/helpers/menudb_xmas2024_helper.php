<?php

function menuXMASSET()
{
    $menu                         = array ();
    $menu[ 'id' ]                 = "XMASSET";
    $menu[ 'url' ]                = "xmasset";
    $menu[ 'type' ]               = JT_SETMENU;
    $menu[ 'title' ]              = 'XMas and New Year Mini Party Set';
    $menu[ 'description' ]        = "$328 Plus GST Per Set - 9 Dishes for 10 Pax";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = true;
    $menu[ 'allowpickup' ]        = true;
    $menu[ 'pickuplocations' ]    = array (JT_CW, JT_PV, JT_CK);
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 40;
    $menu[ 'minorder' ]           = 10;
    $menu[ 'numdishes' ]          = 9;
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
        "label" => "Turkey Ham with Thai Spicy Salad Dressing"
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Fish",
        "controlname" => "deepfriedfish",
        "choices"     => array (
            array ('label' => 'Deep Fried Fish with Tamarind Sauce'),
            array ('label' => 'Seabass with Tamarind Sauce (+ $3.00 Per Pax)'),
        )
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Stuffed Chicken Wings"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Xmas Fried Prawn with Cashew Nut"
    );
    $menudishes[]     = array (
        "type"        => "fixed",
        "label"       => "Fried Mixed Vegetable",
        "vegecontrol" => "bakedmixedveg".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Curry",
        "controlname" => "redcurry",
        "choices"     => array (
            array ('label' => 'Red Curry Chicken',),
            array ('label' => 'Panang Curry Marble Striploin Steak (+ $5.00 Per Pax)'),
        )
    );
    $menudishes[]     = array (
        "type"        => "fixed",
        "label"       => "Spaghetti with Thai Basil Sauce",
        "vegecontrol" => "spaghetti".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"        => "fixed",
        "label"       => "Pattaya Fried Rice",
        "vegecontrol" => "friedrice".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Xmas Ruby",
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
    $menu[ 'description' ]        = "9 Course @ $32.80 Plus GST Per Person";
    $menu[ 'meta_description' ]   = "";
    $menu[ 'hasdrink' ]           = false;
    $menu[ 'allowpickup' ]        = false;
    $menu[ 'pickuplocations' ]    = array ();
    $menu[ 'hascontainercharge' ] = false;
    $menu[ 'deliverycharge' ]     = 80;
    $menu[ 'minorder' ]           = 30;
    $menu[ 'numdishes' ]          = 9;
    $menu[ 'perpax' ]             = 36.8;
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
        "label" => "Turkey Ham with Thai Spicy Salad Dressing"
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Fish",
        "controlname" => "deepfriedfish",
        "choices"     => array (
            array ('label' => 'Deep Fried Fish with Tamarind Sauce'),
            array ('label' => 'Seabass with Tamarind Sauce (+ $3.00 Per Pax)'),
        )
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Stuffed Chicken Wings"
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Xmas Fried Prawn with Cashew Nut"
    );
    $menudishes[]     = array (
        "type"        => "fixed",
        "label"       => "Fried Mixed Vegetable",
        "vegecontrol" => "bakedmixedveg".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"        => "pick1",
        "label"       => "Choice of Curry",
        "controlname" => "redcurry",
        "choices"     => array (
            array ('label' => 'Red Curry Chicken',),
            array ('label' => 'Panang Curry Marble Striploin Steak (+ $5.00 Per Pax)'),
        )
    );
    $menudishes[]     = array (
        "type"        => "fixed",
        "label"       => "Spaghetti with Thai Basil Sauce",
        "vegecontrol" => "spaghetti".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"        => "fixed",
        "label"       => "Pattaya Fried Rice",
        "vegecontrol" => "friedrice".JT_VEGCTRL
    );
    $menudishes[]     = array (
        "type"  => "fixed",
        "label" => "Xmas Ruby",
    );
    $menu[ 'dishes' ] = $menudishes;

    return $menu;
}