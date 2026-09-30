<?php if ( ! defined( 'BASEPATH' ) ) {
    exit( 'No direct script access allowed' );
}

class Surcharge_model extends KA_Model {

    function __construct() {
        parent::__construct();
    }

    //end __construct

    function addsurcharges( $orderdata, $cartdata ) {

        $cartdata = $this->stair_access_surcharge( $orderdata, $cartdata );
        $cartdata = $this->late_collection_surcharge( $orderdata, $cartdata );
        $cartdata = $this->delivery_area_surcharge( $orderdata, $cartdata );
        $cartdata = $this->sentosa_surcharge( $orderdata, $cartdata );
//		$cartdata = $this->cny2021_surcharge( $orderdata, $cartdata );

        // % surcharges
        $cartdata = $this->removePercentageSurcharges($orderdata, $cartdata);
        $cartdata = $this->creditcard_surcharge( $orderdata, $cartdata );
        $cartdata = $this->gst_surcharge( $orderdata, $cartdata );

        return $cartdata;
    }

    function addPromotions( $orderdata, $cartdata ) {

        //$cartdata = $this->promo30ecvoucher($orderdata, $cartdata);
        return $cartdata;

    }

    private function removePercentageSurcharges( $orderdata, $cartdata ) {

        $surcharges = array ();
        if ( array_key_exists( 'surcharges', $cartdata ) ) {
            $surcharges = $cartdata[ 'surcharges' ];
        }

        if ( array_key_exists( 'Credit Card / Paypal Surcharge (3.9%)', $surcharges ) ) {
            unset( $surcharges[ 'Credit Card / Paypal Surcharge (3.9%)' ] );
        }

        if ( array_key_exists( 'GST 9%', $surcharges ) ) {
            unset( $surcharges[ 'GST 9%' ] );
        }

        $cartdata[ 'surcharges' ] = $surcharges;

        return $cartdata;
    }



    private function creditcard_surcharge( $orderdata, $cartdata ) {

        $surcharges = array ();
        if ( array_key_exists( 'surcharges', $cartdata ) ) {
            $surcharges = $cartdata[ 'surcharges' ];
        }

        if ( $orderdata[ 'paymentmode' ] == 'Credit Card / Paypal' ) {
            $total_base_price = $cartdata[ 'foodprice' ];
            $total_base_price += $cartdata[ 'deliveryprice' ];

            if ( $cartdata[ 'chargeforcontainers' ] ) {
                $total_base_price += $cartdata[ 'containerprice' ];
            }

            if ( array_key_exists( 'surcharges', $cartdata ) ) {
                $surcharges_base = $cartdata[ 'surcharges' ];
                foreach ( $surcharges_base as $key => $value ) {
                    $total_base_price += $value;
                }
            }

            $surcharges[ 'Credit Card / Paypal Surcharge (3.9%)' ] = round( $total_base_price * 0.039, 2 );
        }

        $cartdata[ 'surcharges' ] = $surcharges;

        return $cartdata;

    }// credit card surcharge


    private function gst_surcharge( $orderdata, $cartdata ) {

        $surcharges = array ();
        if ( array_key_exists( 'surcharges', $cartdata ) ) {
            $surcharges = $cartdata[ 'surcharges' ];
        }

        $total_base_price = $cartdata[ 'foodprice' ];

        if ( array_key_exists( 'deliverypickup', $orderdata ) && $orderdata['deliverypickup'] == 'delivery') {
            $total_base_price += $cartdata[ 'deliveryprice' ];
        }

        if ( $cartdata[ 'chargeforcontainers' ] ) {
            $total_base_price += $cartdata[ 'containerprice' ];
        }

        if ( array_key_exists( 'surcharges', $cartdata ) ) {
            $surcharges_base = $cartdata[ 'surcharges' ];
            foreach ( $surcharges_base as $key => $value ) {
                $total_base_price += $value;
            }
        }

        $surcharges[ 'GST 9%' ] = round( $total_base_price * 0.09, 2 );

        $cartdata[ 'surcharges' ] = $surcharges;

        return $cartdata;

    }// GST surcharge


    private function stair_access_surcharge( $orderdata, $cartdata ) {

        $surcharges = array ();
        if ( array_key_exists( 'surcharges', $cartdata ) ) {
            $surcharges = $cartdata[ 'surcharges' ];
        }

        switch ( $orderdata[ 'accessiblebylift' ] ) {

            case "1":
                $surcharges[ 'Stair Access Surcharge' ] = 30;
                break;

            case "2":
                $surcharges[ 'Stair Access Surcharge' ] = 60;
                break;

            case "3":
                $surcharges[ 'Stair Access Surcharge' ] = 90;
                break;

            case "4":
                $surcharges[ 'Stair Access Surcharge' ] = 120;
                break;

            case "5":
                $surcharges[ 'Stair Access Surcharge' ] = 150;
                break;

            default:
                if ( array_key_exists( 'Stair Access Surcharge', $surcharges ) ) {
                    unset( $surcharges[ 'Stair Access Surcharge' ] );
                }
                break;

        }

        $cartdata[ 'surcharges' ] = $surcharges;

        return $cartdata;

    } //stair_access_surcharge


    private function late_collection_surcharge( $orderdata, $cartdata ) {

        $surcharges = array ();
        if ( array_key_exists( 'surcharges', $cartdata ) ) {
            $surcharges = $cartdata[ 'surcharges' ];
        }

        switch ( $orderdata[ 'timeend' ] ) {

            case "10:30 PM":
                $surcharges[ 'Late Collection Surcharge' ] = 25;
                break;

            case "11:00 PM":
                $surcharges[ 'Late Collection Surcharge' ] = 50;
                break;

            case "11:30 PM":
                $surcharges[ 'Late Collection Surcharge' ] = 75;
                break;

            case "12:00 AM":
                $surcharges[ 'Late Collection Surcharge' ] = 100;
                break;

            default:
                if ( array_key_exists( 'Late Collection Surcharge', $surcharges ) ) {
                    unset( $surcharges[ 'Late Collection Surcharge' ] );
                }
                break;

        }

        $cartdata[ 'surcharges' ] = $surcharges;

        return $cartdata;

    } //late collection surcharge


    /**
     * @param $orderdata
     * @param $cartdata
     */
    private function sentosa_surcharge( $orderdata, $cartdata ) {

        $surcharges = array ();
        if ( array_key_exists( 'surcharges', $cartdata ) ) {
            $surcharges = $cartdata[ 'surcharges' ];
        }

        $ci = get_instance();
        $ci->load->helper( 'sentosa' );
        if ( isInSentosa( $orderdata[ 'postalcode' ] ) ) {
            $surcharges[ 'Sentosa Island Delivery Surcharge' ] = 10.00;
        }
        else {
            if ( array_key_exists( 'Sentosa Island Delivery Surcharge', $surcharges ) ) {
                unset( $surcharges[ 'Sentosa Island Delivery Surcharge' ] );
            }
        }

        $cartdata[ 'surcharges' ] = $surcharges;

        return $cartdata;
    }

    private function number_of_trips($orderdata, $cartdata)
    {
        if ($cartdata['chargeforcontainers']) {
            return 1;
        }
        return 2;
    }

    private function delivery_area_surcharge( $orderdata, $cartdata ) {

        $surcharges = array ();
        if ( array_key_exists( 'surcharges', $cartdata ) ) {
            $surcharges = $cartdata[ 'surcharges' ];
        }

        $surcharge_areas = [
            '01', '02', '03', '04', '05', '06', '07', '08', '17', '18', '19', '22', '23', // CBD
            '63', // West
        ];

        $first2digit = substr( $orderdata[ 'postalcode' ], 0, 2 );
        if ( in_array( $first2digit, $surcharge_areas) ) {
            $surcharges[ 'Delivery Area Surcharge' ] = 10.00 * $this->number_of_trips($orderdata, $cartdata);
        }
        else {
            if ( array_key_exists( 'Delivery Area Surcharge', $surcharges ) ) {
                unset( $surcharges[ 'Delivery Area Surcharge' ] );
            }
        }

        $cartdata[ 'surcharges' ] = $surcharges;

        return $cartdata;
    }


    private function promo30ecvoucher( $orderdata, $cartdata ) {


        $orderdate = date( "Y-m-d" );

        //discount $30 for each delivery of SET menus
        if ( $orderdate >= '2015-05-30' && $orderdate <= '2015-05-31' ) {

            $order_qualifies_for_promo = false;

            $menus_with_promo = array (
                'CATERA',
                'CATERB',
                'CATERC',
                'CATERD',
                'DIYA',
                'DIYB',
                'DIYC',
                'DIYD',
                'VEGEA',
                'VEGEB',
                'VEGEC'
            );

            foreach ( $cartdata[ 'items' ] as $cartitem ) {
                $menuid = $cartitem[ 'menuid' ];
                if ( in_array( $menuid, $menus_with_promo ) ) {
                    $order_qualifies_for_promo = true;
                }
            }

            if ( $order_qualifies_for_promo ) {

                $promo_name = 'PROMO30ECVOUCHER';

                $newmenu = getDefaultJaiThaiMenu( $promo_name );

                $cartitems                = $cartdata[ 'items' ];
                $cartitems[ $promo_name ] = $newmenu;
                $cartdata[ 'items' ]      = $cartitems;

            }
        }

        return $cartdata;

    } // end promo30ecvoucher

    private function cny2021_surcharge( $orderdata, $cartdata ) {
        $surcharges = array ();
        if ( array_key_exists( 'surcharges', $cartdata ) ) {
            $surcharges = $cartdata[ 'surcharges' ];
        }

        $functiondate = $orderdata[ 'functiondate' ];

        if ( $functiondate >= '2021-02-11' && $functiondate <= '2021-02-14' ) {

            if ( $cartdata[ 'deliveryprice' ] == '30' ) {
                $cartdata[ 'deliveryprice' ] = '40';
            } elseif ( $cartdata[ 'deliveryprice' ] == '60' ) {
                $cartdata[ 'deliveryprice' ] = '80';
            }

            //cny surcharge 20% for everything except cny menus
            $no_surcharge      = array (
                "CNY2021HAPPINESS",
                "CNY2021DELIGHT",
                "CNY2021TREASURE",
                "CNY2021ADDONDISHES"
            );
            $cnysurcharge_base = $cartdata[ 'foodprice' ];
            foreach ( $cartdata[ 'items' ] as $cartitem ) {
                if ( in_array( $cartitem[ 'menuid' ], $no_surcharge ) ) {
                    $cnysurcharge_base -= $cartitem[ 'foodprice' ];
                }
            }
            if ( $cnysurcharge_base ) {
                $surcharges[ 'CNY 2021 Surcharge (20%)' ] = round( 0.2 * floatval( $cnysurcharge_base ), 2 );
            }
            $cartdata[ 'surcharges' ] = $surcharges;
        }

        return $cartdata;

    }




} //end class