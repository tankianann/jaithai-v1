<?php
define('JT_SETMENU',			1);
define('JT_ALACARTEMENU', 		2);
define('JT_MISCITEM', 		    3);
define('JT_CW', 				'Clover Way');
define('JT_7C', 				'7 Clover');
define('JT_JS', 				'Dhoby Ghaut');
define('JT_EC', 				'East Coast');
define('JT_SP', 				'SingPost (Halal)');
define('JT_PV', 				'Purvis');
define('JT_CK', 				'Pandan Loop (Halal)');
define('JT_NONE', 				0);
define('JT_SPICY', 				2);
define('JT_KID', 				1);
define('JT_SPECIALITY',			1);
define('JT_REG',			    "REG");
define('JT_VEG',			    "VEG");
define('JT_VEGCTRL',			"-vege");

function getJaiThaiMenu($id) {

	$menus = [
		"CATERA" => "menuCATERA",
		"CATERB" => "menuCATERB",
		"CATERC" => "menuCATERC",
		"CATERD" => "menuCATERD",
		"DIYA" => "menuDIYA",
		"DIYB" => "menuDIYB",
		"DIYC" => "menuDIYC",
		"DIYD" => "menuDIYD",
		"VEGEA" => "menuVEGEA",
		"VEGEB" => "menuVEGEB",
		"VEGEC" => "menuVEGEC",
		"MPSET" => "menuMPSET",
		"MPALACARTE" => "menuMPALACARTE",
		"SANOOK" => "menuSanook",
		"BENTO" => "menuBENTO",
        "CNY2026JOY" => "menuCNY2026Joy",
        "CNY2026FORTUNE" => "menuCNY2026Fortune",
        "CNY2026PROSPERITY" => "menuCNY2026Prosperity",
        "CNY2026FAMILYSET" => "menuCNY2026FamilySet",
        "CNY2026ADDONS" => "menuCNY2026Addons",
		"XMASSET" => "menuXMASSET",
		"XMASCATERING" => "menuXMASCATERING",
		"MOTHERSDAY" => "menuMOTHERSDAY",
        "CHAIYO" => "menuCHAIYO",
        "SAWASDEE" => "menuSAWASDEE",
        "CHOKDEE" => "menuCHOKDEE",
        "CHAIYOVEGAN" => "menuCHAIYOVEGAN",
        "SAWASDEEVEGAN" => "menuSAWASDEEVEGAN",
        "CHOKDEEVEGAN" => "menuCHOKDEEVEGAN",
        "THAICELEBRATION" => "menuTHAICELEBRATION",
	];

	if (array_key_exists($id, $menus)) {
		return $menus[$id]();
	}

	return false;
}

function getDefaultJaiThaiMenu($menuid) {

	$menu = getJaiThaiMenu($menuid);

	$newmenu = array();
	$newmenu['menutype'] = $menu['type'];

    if ($menu['type'] == JT_SETMENU) {

		// use the defaults - 1st dish for pick1, first 2 dishes for pick2
		// numpax = min number
	    $menudishes = $menu['dishes'];
		$dishes = array();
    	foreach($menudishes as $menudish) {

	    	if ($menudish['type'] == 'fixed') {
		    	$dishes[] = $menudish['label'];
	    	}
	    	elseif ($menudish['type'] == 'pick1') {
	    		$choices = $menudish['choices'];
                $dish = $choices[0];
		    	$dishes[] = $dish['label'];
	    	}
	    	elseif ($menudish['type'] == 'pick2') {
	    		$choices = $menudish['choices'];

                $dish = $choices[0];
		    	$dishes[] = $dish['label'];
                $dish = $choices[2];
                $dishes[] = $dish['label'];
	    	}
    	}

	    $newmenu['menutype'] = $menu['type'];
	    $newmenu['title'] = $menu['title'];
	    $newmenu['menuid'] = $menu['id'];
    	$newmenu['dishes'] = $dishes;
    	$newmenu['numpax'] = $menu['minorder'];
		$newmenu['hasdrink'] = $menu['hasdrink'];
		$newmenu['allowpickup'] = $menu['allowpickup'];
		$newmenu['pickuplocations'] = $menu['pickuplocations'];
		$newmenu['hascontainercharge'] = $menu['hascontainercharge'];
		$newmenu['deliverycharge'] = $menu['deliverycharge'];
		$newmenu['minorder'] = $menu['minorder'];
		$newmenu['numdishes'] = $menu['numdishes'];
		$newmenu['perpax'] = $menu['perpax'];
		$newmenu['addondrink'] = "No Drink";
		$newmenu['hitmin'] = true;
		$newmenu['foodprice'] = $newmenu['numpax'] * $newmenu['perpax'];

		if ($menu['hascontainercharge']) {
			$newmenu['containerprice'] = $newmenu['numdishes'] * Cart_model::CONTAINERCHARGE;
		}
		else {
			$newmenu['containerprice'] = 0;
		}


    }
    elseif ($menu['type'] == JT_ALACARTEMENU) {

        $menudishes = $menu['dishes'];

        $foodprice = 0;
        $dishes = array();

        // we need to specify some defaults for alacarte menus
        $details = array();
        if ($menu['id'] == 'MPALACARTE') {
            $details['appetizer1'] = 10;
        } elseif ($menu['id'] == 'BENTO') {
            $details['bento1'] = 10;
            $details['bento2'] = 10;
            $details['bento3'] = 10;
        }

        foreach ($details as $dishid => $qty) {

            $menudish = $menudishes[$dishid];

            $dish = array();
            $dish['name'] = $menudish['label'];
            $dish['serves'] = $menudish['serves'];
            $dish['price'] = $menudish['price'];
            $dish['qty'] = $qty;

            $foodprice += $menudish['price'] * $qty;

            $dishes[] = $dish;
        }


        $newmenu['menutype'] = $menu['type'];
        $newmenu['title'] = $menu['title'];
        $newmenu['menuid'] = $menu['id'];;
        $newmenu['dishes'] = $dishes;
        $newmenu['addondrink'] = "No Drink"; //Ala carte menus have no drink
        $newmenu['numpax'] = 0;
        $newmenu['hasdrink'] = $menu['hasdrink'];
        $newmenu['allowpickup'] = $menu['allowpickup'];
        $newmenu['pickuplocations'] = $menu['pickuplocations'];
        $newmenu['hascontainercharge'] = $menu['hascontainercharge'];
        $newmenu['deliverycharge'] = $menu['deliverycharge'];
        $newmenu['minorder'] = $menu['minorder'];

        $newmenu['numdishes'] = sizeof($dishes);
        $newmenu['perpax'] = $menu['perpax'];

        //calculated values
        $newmenu['foodprice'] = $foodprice;
        $newmenu['hitmin'] = true;
        if ($menu['hascontainercharge']) {
            $newmenu['containerprice'] = $newmenu['numdishes'] * Cart_model::CONTAINERCHARGE;
        } else {
            $newmenu['containerprice'] = 0;
        }
    }
    elseif($menu['type'] == JT_MISCITEM) {

        // use the defaults - 1st dish for pick1, first 2 dishes for pick2
        // numpax = min number
        $newmenu['menutype'] = $menu['type'];
        $newmenu['title'] = $menu['title'];
        $newmenu['menuid'] = $menu['id'];
        $newmenu['dishes'] = $menu['dishes'];
        $newmenu['numpax'] = $menu['minorder'];
        $newmenu['hasdrink'] = $menu['hasdrink'];
        $newmenu['allowpickup'] = $menu['allowpickup'];
        $newmenu['pickuplocations'] = $menu['pickuplocations'];
        $newmenu['hascontainercharge'] = $menu['hascontainercharge'];
        $newmenu['deliverycharge'] = $menu['deliverycharge'];
        $newmenu['minorder'] = $menu['minorder'];
        $newmenu['numdishes'] = $menu['numdishes'];
        $newmenu['perpax'] = $menu['perpax'];
        $newmenu['addondrink'] = "No Drink";
        $newmenu['hitmin'] = true;
        $newmenu['foodprice'] = 0;

    }//end if menu type

	return $newmenu;

}

include "menudb_cateringset_helper.php";
include "menudb_diyset_helper.php";
include "menudb_vegeset_helper.php";
include "menudb_miniparty_helper.php";
include "menudb_bento_helper.php";

//include "menudb_xmas2017_helper.php";
//include "menudb_xmas2018_helper.php";
//include "menudb_xmas2019_helper.php";
//include "menudb_xmas2022_helper.php";
//include "menudb_xmas2023_helper.php";
include "menudb_xmas2025_helper.php";

//include "menudb_cny2015_helper.php";
//include "menudb_cny2018_helper.php";
//include "menudb_cny2019_helper.php";
//include "menudb_cny2020_helper.php";
//include "menudb_cny2021_helper.php";
//include "menudb_cny2023_helper.php";
//include "menudb_cny2024_helper.php";
//include "menudb_cny2025_helper.php";
include "menudb_cny2026_helper.php";
include "menudb_mothersday_helper.php";
include "menudb_chaiyo_helper.php";
include "menudb_sawasdee_helper.php";
include "menudb_chokdee_helper.php";
include "menudb_chaiyo_vegan_helper.php";
include "menudb_sawasdee_vegan_helper.php";
include "menudb_chokdee_vegan_helper.php";
include "menudb_thaicelebration_helper.php";