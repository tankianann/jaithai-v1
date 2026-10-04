<?php  


/*
|--------------------------------------------------------------------------
| App Constants
|--------------------------------------------------------------------------
|
| These constants are used for the application
|
*/

/* Jai Thai Specific Functions */

function getLicenseNumber($order) {
    if (in_array ($order['a_assignedoutlet'], array('CW'))) {
        return "CE06C20B000";
    }
    return "PL24K0305";
}

function formatOrderNum($order, $outletpostfix = true) {
	
	$orderyear = date('y', strtotime($order['ordertime']));
	$ordernum = $order['ordernum'];
	
	$assignedoutlet = "";
	if ($outletpostfix) {
		$assignedoutlet = $order['a_assignedoutlet'];
		if ($assignedoutlet) { $assignedoutlet = "-" . $assignedoutlet; }
	}
	
	return "JT" . $orderyear . sprintf('%04d', $ordernum) . $assignedoutlet;
	
}

function createOrderHash($orderid) {
	
	$algo = 'sha1';
	$salt = 'asdfa298rylvbjaisiam';
	
	return hash($algo, $orderid . $salt);
	
}
//end createOrderHash()


/**
 * Preserve the unnumbered set-menu presentation requested for legacy order
 * database ID 12977 across the administration, email, and PDF views.
 *
 * This is a v1-only rendering exception for an existing order. Do not carry
 * the order-ID allowlist into v2; model any future presentation requirement
 * explicitly in v2 order data instead.
 */
function orderUsesUnnumberedSetMenu($orderid) {

	static $orderids = array(
		12977,
	);

	return in_array((int) $orderid, $orderids, true);

}


function kidspicy($i) {
	
	switch ($i) {
		
		case 0: 
			echo '<td><img src="' . base_url() . 'assets/i/notkidspicy.gif" alt=""/></td>';
			break;
		case 1:
			echo '<td><img src="' . base_url() . 'assets/i/kid.gif" alt="Kid\'s Favourite" title="Kid\'s Favourite"/></td>';
			break;
		case 2:
			echo '<td><img src="' . base_url() . 'assets/i/spicy.gif" alt="Spicy Dish" title="Spicy Dish"/></td>';
			break;

		
	}
	
}//kidspicy

function speciality($i) {
	
	switch ($i) {
		
		case 0: 
			echo '<td><img src="' . base_url() . 'assets/i/notspeciality.gif" alt=""/></td>';
			break;
		case 1:
			echo '<td><img src="' . base_url() . 'assets/i/speciality.png" alt="Jai Thai Speciality" title="Jai Thai Speciality"/></td>';
			break;
		
	}
	
}//speciality

function outletbusinessname($i) {

	switch ($i) {
		
		case "JS": 
			return 'Jai Siam Pte Ltd';
		case "EC":
		case "SP":
			return 'Thai Kitchen Pte Ltd (201008118H)';
		case "PV":
			return 'Thaicoon Aunt Pte Ltd (201019918Z)';
		case "CW":
		case "7C":
			return 'Jai Thai Restaurant Pte Ltd (200815408M)';

	}
}//outletbusinessname


function setuparea($setuparea, $accessibleByLift) {

	$setuparea = $setuparea ? "Set Up Area: " . $setuparea : $setuparea;
	switch ($accessibleByLift) {
		case "Y": return '<br/><br/>' . $setuparea . '<br/>(Direct Lift Access)';
		case "N": return '<br/><br/>' . $setuparea . '<br/>(No Lift Access)';
		case "1": return '<br/><br/>' . $setuparea . '<br/>(Requires Stair Access - 1 Level)';
		case "2": return '<br/><br/>' . $setuparea . '<br/>(Requires Stair Access - 2 Levels)';
		case "3": return '<br/><br/>' . $setuparea . '<br/>(Requires Stair Access - 3 Levels)';
		case "4": return '<br/><br/>' . $setuparea . '<br/>(Requires Stair Access - 4 Levels)';
		case "5": return '<br/><br/>' . $setuparea . '<br/>(Requires Stair Access - 5 Levels)';
	}
	return "";
}


function accessibleByLift($accessibleByLift) {

	switch ($accessibleByLift) {
		case "Y": return '<br/>(Direct Lift Access)';
		case "N": return '<br/>(No Lift Access)';
		case "1": return '<br/>(Requires Stair Access - 1 Level)';
		case "2": return '<br/>(Requires Stair Access - 2 Levels)';
		case "3": return '<br/>(Requires Stair Access - 3 Levels)';
		case "4": return '<br/>(Requires Stair Access - 4 Levels)';
		case "5": return '<br/>(Requires Stair Access - 5 Levels)';
	}
	return "";
}


function fake_daily_promo_claimed($enddate, $minleft, $useeveryday) {
    $days_left = (strtotime($enddate) - time()) / ( 60 * 60 * 24 );
    $num_left = intval($minleft + ($days_left * $useeveryday));
    if ($num_left <= 0) {
        $num_left = 0;
    }
    return $num_left;
}//fake_daily_promo_claimed
