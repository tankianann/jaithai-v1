<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends KA_Model {
	
	const JTCARTITEMS = 'jaithaicart';
	const CONTAINERCHARGE = 2;
	
    function  __construct()  {
        parent::__construct();
    }
    //end __construct
    
    function addItem($menuid, $thismenudetails) {
		
		$lineitem = $this->convertOrderToLineItem($menuid, $thismenudetails);
		
		$cartitems = $this->session->userdata(Cart_model::JTCARTITEMS);
		if (!is_array($cartitems)) {
			$cartitems = array();
		}
		
		$cartitemid = md5(date('ymdhis'));
		$cartitems[$cartitemid] = $lineitem;
		$this->session->set_userdata(Cart_model::JTCARTITEMS, $cartitems);

    }
    

    function clearItems() {
	    
		$cartitems = array();
		$this->session->set_userdata(Cart_model::JTCARTITEMS, $cartitems);

    }

	function getItem($id) {

		$cartitems = $this->session->userdata(Cart_model::JTCARTITEMS);
		return $cartitems[$id];

	}//getItem


    function removeItem($id) {
	    
		$cartitems = $this->session->userdata(Cart_model::JTCARTITEMS);
		
		if (!is_array($cartitems) || (sizeof($cartitems) == 1)) {
			$this->clearItems();
		}
		else {
			unset($cartitems[$id]);
			$this->session->set_userdata(Cart_model::JTCARTITEMS, $cartitems);
		}

    }//removeItem
    
    function getCart() {
	    
	    $cart = array();
	    
	    //get the properly formatted items in first
	    $cartitems = $this->session->userdata(Cart_model::JTCARTITEMS);
	    $cartitems = $this->formatCartForDisplay($cartitems);
	    $cart['items'] = $cartitems;
	    
	    $cart = $this->calculateCartTotals($cart);

	    return $cart;
	    
    }//getCart
    
    function calculateCartTotals($cart) {

	    $cartitems = $cart['items'];

	    //use the items to find out the rest;
	    $allowpickup = true;
	    $chargeforcontainers = true;
	    $pickuplocations = array(JT_PV, JT_CK);
	    $foodprice = 0;
	    $containerprice = 0;
	    $deliveryprice = 0;
	    $hitmin = 0;
	    
	    foreach ($cartitems as $cartitem) {
		    
		    if (!$cartitem['allowpickup']) {
			    $allowpickup = false;
			    $chargeforcontainers = false;
		    }
		    
		    $pickuplocations = array_intersect($pickuplocations, $cartitem['pickuplocations']);
		    $pickuplocations = array_unique($pickuplocations);
		    
		    $foodprice += $cartitem['foodprice'];		    
		    
		    $containerprice += $cartitem['containerprice'];
		    
		    if ($cartitem['deliverycharge'] > $deliveryprice) {
			    $deliveryprice = $cartitem['deliverycharge'];
		    }

		    if ($cartitem['hitmin']) {
			    $hitmin++;
		    }

	    }

		//add $10 for delivery below $200 (but if only bento then $120)
/*	    $minimum_foodprice = 120;
	    foreach ($cartitems as $cartitem) {
		    if ($cartitem['menuid'] != 'BENTO') {
			    $minimum_foodprice = 200;
		    }
	    }
	    if ($foodprice < $minimum_foodprice && $foodprice != 0) {
		    $deliveryprice += 10;
	    }
*/
	    $cart['hitmin'] = $hitmin;
	    $cart['allowpickup'] = $allowpickup;
	    $cart['chargeforcontainers'] = $chargeforcontainers;
	    $cart['pickuplocations'] = $pickuplocations;
	    $cart['foodprice'] = $foodprice;
	    $cart['containerprice'] = $containerprice;
	    $cart['deliveryprice'] = $deliveryprice;



		return $cart;
    }//calculateCartTotals


    function hitMinimumOrder() {
	    
	    $cart = $this->getCart();
	    return $cart['hitmin'];
	    
    }//hitMinimumOrder
    
    function getContainerCharge() {
	    return Cart_model::CONTAINERCHARGE;
    }
    
    /* private functions below */
    
    private function formatCartForDisplay($cartitems) {

	    $formattedcartitems = array();
	    
	    if (is_array($cartitems) && sizeof($cartitems)) {
	    
		    foreach($cartitems as $cartitemid => $cartitem) {
			    
			    $menuid = $cartitem['menuid'];
			    $details = $cartitem['details'];
			    
			    $menu = getJaiThaiMenu($menuid);
			    
			    $formattedcartitem = array();

			    $formattedcartitem['perpax'] = $menu['perpax'];

			    if ($menu['type'] == JT_SETMENU) {
				    
				    $menudishes = $menu['dishes']; 
					$dishes = array();
			    	foreach($menudishes as $menudish) {
				    	
				    	if ($menudish['type'] == 'fixed') {

                            if (isset($menudish['vegecontrol'])
                                && (isset($details[$menudish['vegecontrol']]))
                                && ($details[$menudish['vegecontrol']] == JT_VEG)) {

                                $dishes[] = $menudish['label'] . " (Vegan)";
                            }
                            else {
                                $dishes[] = $menudish['label'];
                            }

				    	}
				    	elseif ($menudish['type'] == 'pick1') {

                            foreach($menudish['choices'] as $choice) {
                                if ($choice['label'] == $details[$menudish['controlname']]) {
                                    if (isset($choice['vegecontrol'])
                                        && isset($details[$choice['vegecontrol']])
                                        && ($details[$choice['vegecontrol']] == JT_VEG)) {

                                        $dishes[] = $details[$menudish['controlname']] . " (Vegan)";
                                    }
                                    else {
                                        $dishes[] = $details[$menudish['controlname']];
                                    }

	                                if (strpos($details[$menudish['controlname']], "+ $1.00 Per Pax") !== false) {
		                                $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 1.00;
	                                }
	                                if (strpos($details[$menudish['controlname']], "+ $2.00 Per Pax") !== false) {
		                                $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 2.00;
	                                }
                                    if (strpos($details[$menudish['controlname']], "+ $3.00 Per Pax") !== false) {
                                        $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 3.00;
                                    }
                                    if (strpos($details[$menudish['controlname']], "+ $3.50 Per Pax") !== false) {
                                        $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 3.50;
                                    }
                                    if (strpos($details[$menudish['controlname']], "+ $4.00 Per Pax") !== false) {
                                        $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 4.00;
                                    }
                                    if (strpos($details[$menudish['controlname']], "+ $5.00 Per Pax") !== false) {
                                        $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 5.00;
                                    }
                                }
                            }
				    	}
				    	elseif ($menudish['type'] == 'pick2') {

				    		foreach($details[$menudish['controlname']] as $dishname) {

                                foreach($menudish['choices'] as $choice) {
                                    if ($choice['label'] == $dishname) {
                                        if (isset($choice['vegecontrol'])
                                            && isset($details[$choice['vegecontrol']])
                                            && ($details[$choice['vegecontrol']] == JT_VEG)) {

                                            $dishes[] = $dishname . " (Vegan)";
                                        }
                                        else {
                                            $dishes[] = $dishname;
                                        }

                                        if (strpos($dishname, "+ $1.00 Per Pax") !== false) {
                                            $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 1.00;
                                        }
                                        if (strpos($dishname, "+ $2.00 Per Pax") !== false) {
                                            $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 2.00;
                                        }
                                        if (strpos($dishname, "+ $3.00 Per Pax") !== false) {
                                            $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 3.00;
                                        }
                                        if (strpos($dishname, "+ $3.50 Per Pax") !== false) {
                                            $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 3.50;
                                        }
                                        if (strpos($dishname, "+ $4.00 Per Pax") !== false) {
                                            $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 4.00;
                                        }
                                        if (strpos($dishname, "+ $5.00 Per Pax") !== false) {
                                            $formattedcartitem['perpax'] = $formattedcartitem['perpax'] + 5.00;
                                        }
                                    }
                                }

				    		}//foreach

				    	}//if
			    	}
			    	
				    $formattedcartitem['menutype'] = $menu['type'];
				    $formattedcartitem['title'] = $menu['title'];
				    $formattedcartitem['menuid'] = $menuid;
			    	$formattedcartitem['dishes'] = $dishes;
			    	$formattedcartitem['numpax'] = $details['numpax'];
					$formattedcartitem['hasdrink'] = $menu['hasdrink'];
					$formattedcartitem['allowpickup'] = $menu['allowpickup'];
					$formattedcartitem['pickuplocations'] = $menu['pickuplocations'];
					$formattedcartitem['hascontainercharge'] = $menu['hascontainercharge'];
					$formattedcartitem['deliverycharge'] = $menu['deliverycharge'];
					$formattedcartitem['minorder'] = $menu['minorder'];
					$formattedcartitem['numdishes'] = $menu['numdishes'];

					//add on drink if applicable
					if(!$menu['hasdrink']) {
			    		$formattedcartitem['addondrink'] = $details['addondrink'];
			    	}
					else {
			    		$formattedcartitem['addondrink'] = "No Drink";
			    	}
					
					//calculated values
					if ($formattedcartitem['addondrink'] != "No Drink") {

						$drinkprice = 1.00;
						if (strpos($formattedcartitem['addondrink'], "+ $2.00 Per Pax") !== false) {
							$drinkprice = 2.00;
						}
						$formattedcartitem['perpax'] = $formattedcartitem['perpax'] + $drinkprice;

					}
					$formattedcartitem['hitmin'] = ($details['numpax'] >= $formattedcartitem['minorder']);
					$formattedcartitem['foodprice'] = $details['numpax'] * $formattedcartitem['perpax'];
					if ($menu['hascontainercharge']) {
						$formattedcartitem['containerprice'] = $formattedcartitem['numdishes'] * Cart_model::CONTAINERCHARGE;
					}
					else {
						$formattedcartitem['containerprice'] = 0;
					}
					
			    	
			    }
			    elseif ($menu['type'] == JT_ALACARTEMENU) {

                    $menudishes = $menu['dishes'];

                    $foodprice = 0;
                    $dishes = array();
					$numcontainers = 0;

                    foreach ($details as $dishid => $qty) {

                        if ($qty != 'VEG') {
                            $menudish = $menudishes[$dishid];

                            $dish = array();
                            if (isset($menudish['vegecontrol'])
                                && isset($details[$dishid . JT_VEGCTRL])
                                && ($details[$dishid . JT_VEGCTRL] == JT_VEG)
                            ) {

                                $dish['name'] = $menudish['label'] . " (Vegan)";
                            } else {
                                $dish['name'] = $menudish['label'];
                            }
                            $dish['serves'] = $menudish['serves'];
                            $dish['price'] = $menudish['price'];
                            $dish['qty'] = $qty;

                            $foodprice += $menudish['price'] * $qty;

							if ($menudish['usecontainer']) {
								$numcontainers++;
							}

                            $dishes[] = $dish;
                        }
                    }


                    $formattedcartitem['menutype'] = $menu['type'];
                    $formattedcartitem['title'] = $menu['title'];
                    $formattedcartitem['menuid'] = $menuid;
                    $formattedcartitem['dishes'] = $dishes;
                    $formattedcartitem['addondrink'] = "No Drink"; //Ala carte menus have no drink
                    $formattedcartitem['numpax'] = 0;
                    $formattedcartitem['hasdrink'] = $menu['hasdrink'];
                    $formattedcartitem['allowpickup'] = $menu['allowpickup'];
                    $formattedcartitem['pickuplocations'] = $menu['pickuplocations'];
                    $formattedcartitem['hascontainercharge'] = $menu['hascontainercharge'];
                    $formattedcartitem['deliverycharge'] = $menu['deliverycharge'];
                    $formattedcartitem['minorder'] = $menu['minorder'];

                    $formattedcartitem['numdishes'] = sizeof($dishes);
				    $formattedcartitem['perpax'] = $menu['perpax'];

                    //calculated values
                    $formattedcartitem['foodprice'] = $foodprice;
                    $formattedcartitem['hitmin'] = ($foodprice >= $formattedcartitem['minorder']);
                    if ($menu['hascontainercharge']) {
                        $formattedcartitem['containerprice'] = $numcontainers * Cart_model::CONTAINERCHARGE;
                    } else {
                        $formattedcartitem['containerprice'] = 0;
                    }
                }
                elseif ($menu['type'] == JT_MISCITEM) {

                    $formattedcartitem = getDefaultJaiThaiMenu($menuid);

			    }//end if menu type
			    
			    $formattedcartitems[$cartitemid] = $formattedcartitem;
			    
		    }//endforeach $cartitems

		} //if is_array
	    
	    return $formattedcartitems;

	    
    }
    
    private function convertOrderToLineItem($menuid, $thismenudetails) {
	    
		//for ala carte menus, remove the items where the quantity ordered is 0
		$menu = getJaiThaiMenu($menuid);
		if ($menu['type'] == JT_ALACARTEMENU) {
			foreach($thismenudetails as $key => $value) {
				if ($value == '0' || $key == 'agreetnc') {
                    unset($thismenudetails[$key]);
                    unset($thismenudetails[$key . JT_VEGCTRL]);
				}
			}
		}
		
		$lineitem = array();
		$lineitem['menuid'] = $menuid;
		$lineitem['details'] = $thismenudetails;
		
	    return $lineitem;
    }

    
    

} //end class