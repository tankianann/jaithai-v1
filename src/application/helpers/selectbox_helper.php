<?php


function selectBoxHelper($type, $id, $name, $class, $selected, $args = "") {

    if($type == 'MPALACARTE_QTY') {
        $serves = $args;

        if (strstr($id, 'sdrinks') !== false) {
            $thevalues = array();
            for ($i = 0; $i <= 100; $i++) {
                if ($i < 2) {
                    $thevalues[strval($i)] = $serves * $i . " bottle";
                }
                else {
                    $thevalues[strval($i)] = $serves * $i . " bottles";
                }
            }
        }
        elseif (strstr($id, 'drink') !== false) {
            $thevalues = array(
                "0" => "Serves " . $serves * 0 . " pax",
                "1" => "Serves " . $serves * 1 . " pax",
                "2" => "Serves " . $serves * 2 . " pax",
                "3" => "Serves " . $serves * 3 . " pax",
                "4" => "Serves " . $serves * 4 . " pax",
                "5" => "Serves " . $serves * 5 . " pax",
                "6" => "Serves " . $serves * 6 . " pax",
                "7" => "Serves " . $serves * 7 . " pax",
                "8" => "Serves " . $serves * 8 . " pax",
                "9" => "Serves " . $serves * 9 . " pax",
                "10" => "Serves " . $serves * 10 . " pax",
            );
        }
        elseif (in_array($id, array ('equipment1', 'equipment4'))) {
            $thevalues = array(
                "0" => $serves * 0 . " set",
                "1" => $serves * 1 . " set",
                "2" => $serves * 2 . " sets",
                "3" => $serves * 3 . " sets",
                "4" => $serves * 4 . " sets",
                "5" => $serves * 5 . " sets",
                "6" => $serves * 6 . " sets",
                "7" => $serves * 7 . " sets",
                "8" => $serves * 8 . " sets",
                "9" => $serves * 9 . " sets",
                "10" => $serves * 10 . " sets",
            );
        }
        elseif (in_array($id, array ('equipment2', 'equipment3'))) {
            $thevalues = array(
                "0" => $serves * 0 . " set",
                "10" => $serves * 10 . " sets",
                "15" => $serves * 15 . " sets",
                "20" => $serves * 20 . " sets",
                "25" => $serves * 25 . " sets",
                "30" => $serves * 30 . " sets",
                "35" => $serves * 35 . " sets",
                "40" => $serves * 40 . " sets",
                "45" => $serves * 45 . " sets",
                "50" => $serves * 50 . " sets",
                "55" => $serves * 55 . " sets",
                "60" => $serves * 60 . " sets",
                "65" => $serves * 65 . " sets",
                "70" => $serves * 70 . " sets",
                "75" => $serves * 75 . " sets",
                "80" => $serves * 80 . " sets",
                "85" => $serves * 85 . " sets",
                "90" => $serves * 90 . " sets",
                "95" => $serves * 95 . " sets",
            );
        }
        elseif ($id == 'special4') {
            $thevalues = array(
                "0" => $serves * 0 . " container",
                "1" => $serves * 1 . " container",
                "2" => $serves * 2 . " containers",
                "3" => $serves * 3 . " containers",
                "4" => $serves * 4 . " containers",
                "5" => $serves * 5 . " containers",
                "6" => $serves * 6 . " containers",
                "7" => $serves * 7 . " containers",
                "8" => $serves * 8 . " containers",
                "9" => $serves * 9 . " containers",
                "10" => $serves * 10 . " containers",
            );
        }
        elseif ($id == 'dessert3') {
            $thevalues = array(
                "0" => $serves * 0 . " pieces",
                "1" => $serves * 1 . " pieces",
                "1.5" => $serves * 1.5 . " pieces",
                "2" => $serves * 2 . " pieces",
                "2.5" => $serves * 2.5 . " pieces",
                "3" => $serves * 3 . " pieces",
                "3.5" => $serves * 3.5 . " pieces",
                "4" => $serves * 4 . " pieces",
                "4.5" => $serves * 4.5 . " pieces",
                "5" => $serves * 5 . " pieces",
                "5.5" => $serves * 5.5 . " pieces",
                "6" => $serves * 6 . " pieces",
                "6.5" => $serves * 6.5 . " pieces",
                "7" => $serves * 7 . " pieces",
                "7.5" => $serves * 7.5 . " pieces",
                "8" => $serves * 8 . " pieces",
                "8.5" => $serves * 8.5 . " pieces",
                "9" => $serves * 9 . " pieces",
                "9.5" => $serves * 9.5 . " pieces",
                "10" => $serves * 10 . " pieces",
            );
        }
        elseif (strstr($id, 'tray') !== false) {
            $thevalues = array(
                "0" => $serves * 0 . " pieces",
                "1" => $serves * 1 . " pieces",
                "2" => $serves * 2 . " pieces",
                "3" => $serves * 3 . " pieces",
                "4" => $serves * 4 . " pieces",
                "5" => $serves * 5 . " pieces",
            );
        }
        elseif (in_array($id, ['cny1', 'cny2'])) {
            $thevalues = array(
                "0" => "Serves " . $serves * 0 . " pax",
                "1" => "Serves " . $serves * 1 . " pax",
                "2" => "Serves " . $serves * 2 . " pax",
                "3" => "Serves " . $serves * 3 . " pax",
                "4" => "Serves " . $serves * 4 . " pax",
                "5" => "Serves " . $serves * 5 . " pax",
                "6" => "Serves " . $serves * 6 . " pax",
                "7" => "Serves " . $serves * 7 . " pax",
                "8" => "Serves " . $serves * 8 . " pax",
                "9" => "Serves " . $serves * 9 . " pax",
                "10" => "Serves " . $serves * 10 . " pax",
            );
        }
        elseif (strstr($id, 'yusheng') !== false) {
            $thevalues = array(
                "0" => "Serves " . $serves * 0 . " pax",
                "1" => "Serves " . $serves * 1 . " pax",
                "2" => "Serves " . $serves * 2 . " pax",
                "3" => "Serves " . $serves * 3 . " pax",
                "4" => "Serves " . $serves * 4 . " pax",
                "5" => "Serves " . $serves * 5 . " pax",
                "6" => "Serves " . $serves * 6 . " pax",
                "7" => "Serves " . $serves * 7 . " pax",
                "8" => "Serves " . $serves * 8 . " pax",
                "9" => "Serves " . $serves * 9 . " pax",
                "10" => "Serves " . $serves * 10 . " pax",
            );
        }
        elseif (in_array($id, ['cny7', 'cny8'])) {
            $thevalues = array(
                "0" => "Serves " . $serves * 0 . " pax",
                "3" => "Serves " . $serves * 3 . " pax",
                "3.5" => "Serves " . $serves * 3.5 . " pax",
                "4" => "Serves " . $serves * 4 . " pax",
                "4.5" => "Serves " . $serves * 4.5 . " pax",
                "5" => "Serves " . $serves * 5 . " pax",
                "5.5" => "Serves " . $serves * 5.5 . " pax",
                "6" => "Serves " . $serves * 6 . " pax",
                "6.5" => "Serves " . $serves * 6.5 . " pax",
                "7" => "Serves " . $serves * 7 . " pax",
                "7.5" => "Serves " . $serves * 7.5 . " pax",
                "8" => "Serves " . $serves * 8 . " pax",
                "8.5" => "Serves " . $serves * 8.5 . " pax",
                "9" => "Serves " . $serves * 9 . " pax",
                "9.5" => "Serves " . $serves * 9.5 . " pax",
                "10" => "Serves " . $serves * 10 . " pax",
            );
        }
        else {
            $thevalues = array(
                "0" => "Serves " . $serves * 0 . " pax",
                "1" => "Serves " . $serves * 1 . " pax",
                "1.5" => "Serves " . $serves * 1.5 . " pax",
                "2" => "Serves " . $serves * 2 . " pax",
                "2.5" => "Serves " . $serves * 2.5 . " pax",
                "3" => "Serves " . $serves * 3 . " pax",
                "3.5" => "Serves " . $serves * 3.5 . " pax",
                "4" => "Serves " . $serves * 4 . " pax",
                "4.5" => "Serves " . $serves * 4.5 . " pax",
                "5" => "Serves " . $serves * 5 . " pax",
                "5.5" => "Serves " . $serves * 5.5 . " pax",
                "6" => "Serves " . $serves * 6 . " pax",
                "6.5" => "Serves " . $serves * 6.5 . " pax",
                "7" => "Serves " . $serves * 7 . " pax",
                "7.5" => "Serves " . $serves * 7.5 . " pax",
                "8" => "Serves " . $serves * 8 . " pax",
                "8.5" => "Serves " . $serves * 8.5 . " pax",
                "9" => "Serves " . $serves * 9 . " pax",
                "9.5" => "Serves " . $serves * 9.5 . " pax",
                "10" => "Serves " . $serves * 10 . " pax",
            );
        }
    }

    if($type == 'BENTO_QTY') {
        $thevalues = array();
        for ($i = 0; $i <= 100; $i++) {
            $thevalues['' . $i] = '' . $i;
        }
    }

    if($type == 'SANOOK_QTY') {
        $thevalues = array();
        $thevalues['0'] = "0 Sets";
        $thevalues['1'] = "1 Set";
        for ($i = 2; $i <= 10; $i++) {
            $thevalues['' . $i] = '' . $i . " Sets";
        }
    }

    if ($type == "PICKUP_LOCATIONS") {
        $locations = $args;
        $thevalues = array();
        foreach($locations as $location) {
            $thevalues[$location] = $location;
        }
    }

    if ($type == "ORDER_TYPE") {
        $thevalues = array();
        $thevalues['pickup'] = "Self Collect";
        $thevalues['delivery'] = "Delivery";
    }

    if ($type == "PAYMENT_MODE") {
        $thevalues = array(
//			"Cash" => "Cash",
            "PayNow" => "PayNow",
            "Bank Transfer" => "Bank Transfer",
//			"Cheque" => "Cheque",
            "Credit Card / Paypal" => "Credit Card / Paypal (Additional 3.9% Surcharge)"
        );
    }

    if ($type == "PAYMENT_MODE_JTADMIN") {
        $thevalues = array(
            "Cash" => "Cash",
            "PayNow" => "PayNow",
            "PayNow UEN" => "PayNow UEN",
            "PayNow UEN (Thaicoon Aunt)" => "PayNow UEN (Thaicoon Aunt)",
            "Cheque" => "Cheque",
            "Credit Card / Paypal" => "Credit Card / Paypal (Additional 3.9% Surcharge)",
            "Bank Transfer" => "Bank Transfer",
            "Caterspot" => "Caterspot",
            "Foodline" => "Foodline",
            "Foodline - Foodline" => "Foodline - Foodline",
            "Foodline - PayNow" => "Foodline - PayNow",
            "WhyQ" => "WhyQ",
        );
    }

    if ($type == "ALL_MENUS") {
        $thevalues = array(
            'CATERA' => 'Catering Menu A',
            'CATERB' => 'Catering Menu B',
            'CATERC' => 'Catering Menu C',
            'CATERD' => 'Catering Menu D',
            'DIYA' => 'Catering DIY Menu A',
            'DIYB' => 'Catering DIY Menu B',
            'DIYC' => 'Catering DIY Menu C',
            'DIYD' => 'Catering DIY Menu D',
            'VEGEA' => 'Vegan Catering Menu A',
            'VEGEB' => 'Vegan Catering Menu B',
            'VEGEC' => 'Vegan Catering Menu C',
            'VEGED' => 'Vegan Catering Menu D',
            'MPSET' => 'Mini Party Set Menu',
            'CNY15SET' => 'Chinese New Year Mini Party',
            'MPALACARTE' => 'Mini Party Ala Carte',
            'BENTO' => 'Bento Ala Carte Menu',
        );
    }

    if ($type == "PICKUP_MENUS") {
        $thevalues = array(
            'MPSET' => 'Mini Party Set Menu',
            'MPALACARTE' => 'Mini Party Ala Carte',
            'BENTO' => 'Bento Ala Carte Menu',
            'CNY15SET' => 'Chinese New Year Mini Party',
            'PROMO30ECVOUCHER' => 'East Coast $30 Dine In Voucher'
        );
    }


    if ($type == "ADDON_DRINKS") {
        $thevalues = array(
            'No Drink' => 'No Drink',
            'Ice Lemon Tea (+ $1.00 Per Pax)' => 'Ice Lemon Tea (+ $1.00 Per Pax)',
            'Lime Juice (+ $1.00 Per Pax)' => 'Lime Juice (+ $1.00 Per Pax)',
            'Fruit Punch (+ $1.00 Per Pax)' => 'Fruit Punch (+ $1.00 Per Pax)',
            'Lemongrass Drink (+ $2.00 Per Pax)' => 'Lemongrass Drink (+ $2.00 Per Pax)',
            'Thai Iced Tea with Lemon (+ $2.00 Per Pax)' => 'Thai Iced Tea with Lemon (+ $2.00 Per Pax)',
            'Thai Iced Tea with Milk (+ $2.00 Per Pax)' => 'Thai Iced Tea with Milk (+ $2.00 Per Pax)',
        );
    }

    if ($type == "PACKET_DRINKS") {
        $thevalues = array(
            'No Drink' => 'No Drink',
            'Chrysanthemum Tea (Packet)' => 'Chrysanthemum Tea (Packet)',
            'Green Tea (Packet)' => 'Green Tea (Packet)',
            'Ice Lemon Tea (Packet)' => 'Ice Lemon Tea (Packet)',
            'Lemon Barley (Packet)' => 'Lemon Barley (Packet)',
            'Lychee (Packet)' => 'Lychee (Packet)',
            'Sugarcane (Packet)' => 'Sugarcane (Packet)',
            'Winter Melon Tea (Packet)' => 'Winter Melon Tea (Packet)',
            'Mineral Water' => 'Mineral Water',
        );
    }

    if ($type == "ADMIN_PICKUPDELIVERY_TIME") {

        $thevalues = array(
            '12:00 AM' => "12:00 AM",
            '12:15 AM' => "12:15 AM",
            '12:30 AM' => "12:30 AM",
            '12:45 AM' => "12:45 AM",
            '1:00 AM' => "1:00 AM",
            '1:15 AM' => "1:15 AM",
            '1:30 AM' => "1:30 AM",
            '1:45 AM' => "1:45 AM",
            '2:00 AM' => "2:00 AM",
            '2:15 AM' => "2:15 AM",
            '2:30 AM' => "2:30 AM",
            '2:45 AM' => "2:45 AM",
            '3:00 AM' => "3:00 AM",
            '3:15 AM' => "3:15 AM",
            '3:30 AM' => "3:30 AM",
            '3:45 AM' => "3:45 AM",
            '4:00 AM' => "4:00 AM",
            '4:15 AM' => "4:15 AM",
            '4:30 AM' => "4:30 AM",
            '4:45 AM' => "4:45 AM",
            '5:00 AM' => "5:00 AM",
            '5:15 AM' => "5:15 AM",
            '5:30 AM' => "5:30 AM",
            '5:45 AM' => "5:45 AM",
            '6:00 AM' => "6:00 AM",
            '6:15 AM' => "6:15 AM",
            '6:30 AM' => "6:30 AM",
            '6:45 AM' => "6:45 AM",
            '7:00 AM' => "7:00 AM",
            '7:15 AM' => "7:15 AM",
            '7:30 AM' => "7:30 AM",
            '7:45 AM' => "7:45 AM",
            '8:00 AM' => "8:00 AM",
            '8:15 AM' => "8:15 AM",
            '8:30 AM' => "8:30 AM",
            '8:45 AM' => "8:45 AM",
            '9:00 AM' => "9:00 AM",
            '9:15 AM' => "9:15 AM",
            '9:30 AM' => "9:30 AM",
            '9:45 AM' => "9:45 AM",
            '10:00 AM' => "10:00 AM",
            '10:15 AM' => "10:15 AM",
            '10:30 AM' => "10:30 AM",
            '10:45 AM' => "10:45 AM",
            '11:00 AM' => "11:00 AM",
            '11:15 AM' => "11:15 AM",
            '11:30 AM' => "11:30 AM",
            '11:45 AM' => "11:45 AM",
            '12:00 PM' => "12:00 PM",
            '12:15 PM' => "12:15 PM",
            '12:30 PM' => "12:30 PM",
            '12:45 PM' => "12:45 PM",
            '1:00 PM' => "1:00 PM",
            '1:15 PM' => "1:15 PM",
            '1:30 PM' => "1:30 PM",
            '1:45 PM' => "1:45 PM",
            '2:00 PM' => "2:00 PM",
            '2:15 PM' => "2:15 PM",
            '2:30 PM' => "2:30 PM",
            '2:45 PM' => "2:45 PM",
            '3:00 PM' => "3:00 PM",
            '3:15 PM' => "3:15 PM",
            '3:30 PM' => "3:30 PM",
            '3:45 PM' => "3:45 PM",
            '4:00 PM' => "4:00 PM",
            '4:15 PM' => "4:15 PM",
            '4:30 PM' => "4:30 PM",
            '4:45 PM' => "4:45 PM",
            '5:00 PM' => "5:00 PM",
            '5:15 PM' => "5:15 PM",
            '5:30 PM' => "5:30 PM",
            '5:45 PM' => "5:45 PM",
            '6:00 PM' => "6:00 PM",
            '6:15 PM' => "6:15 PM",
            '6:30 PM' => "6:30 PM",
            '6:45 PM' => "6:45 PM",
            '7:00 PM' => "7:00 PM",
            '7:15 PM' => "7:15 PM",
            '7:30 PM' => "7:30 PM",
            '7:45 PM' => "7:45 PM",
            '8:00 PM' => "8:00 PM",
            '8:15 PM' => "8:15 PM",
            '8:30 PM' => "8:30 PM",
            '8:45 PM' => "8:45 PM",
            '9:00 PM' => "9:00 PM",
            '9:15 PM' => "9:15 PM",
            '9:30 PM' => "9:30 PM",
            '9:45 PM' => "9:45 PM",
            '10:00 PM' => "10:00 PM",
            '10:15 PM' => "10:15 PM",
            '10:30 PM' => "10:30 PM",
            '10:45 PM' => "10:45 PM",
            '11:00 PM' => "11:00 PM",
            '11:15 PM' => "11:15 PM",
            '11:30 PM' => "11:30 PM",
            '11:45 PM' => "11:45 PM",
        );
    }


    if ($type == "PICKUPDELIVERY_TIME") {

        $thevalues = array(
            '10:00 AM' => "10:00 AM",
            '10:15 AM' => "10:15 AM",
            '10:30 AM' => "10:30 AM",
            '10:45 AM' => "10:45 AM",
            '11:00 AM' => "11:00 AM",
            '11:15 AM' => "11:15 AM",
            '11:30 AM' => "11:30 AM",
            '11:45 AM' => "11:45 AM",
            '12:00 PM' => "12:00 PM",
            '12:15 PM' => "12:15 PM",
            '12:30 PM' => "12:30 PM",
            '12:45 PM' => "12:45 PM",
            '1:00 PM' => "1:00 PM",
            '1:15 PM' => "1:15 PM",
            '1:30 PM' => "1:30 PM",
            '1:45 PM' => "1:45 PM",
            '2:00 PM' => "2:00 PM",
            '2:15 PM' => "2:15 PM",
            '2:30 PM' => "2:30 PM",
            '2:45 PM' => "2:45 PM",
            '3:00 PM' => "3:00 PM",
            '3:15 PM' => "3:15 PM",
            '3:30 PM' => "3:30 PM",
            '3:45 PM' => "3:45 PM",
            '4:00 PM' => "4:00 PM",
            '4:15 PM' => "4:15 PM",
            '4:30 PM' => "4:30 PM",
            '4:45 PM' => "4:45 PM",
            '5:00 PM' => "5:00 PM",
            '5:15 PM' => "5:15 PM",
            '5:30 PM' => "5:30 PM",
            '5:45 PM' => "5:45 PM",
            '6:00 PM' => "6:00 PM",
            '6:15 PM' => "6:15 PM",
            '6:30 PM' => "6:30 PM",
            '6:45 PM' => "6:45 PM",
            '7:00 PM' => "7:00 PM",
            '7:15 PM' => "7:15 PM",
            '7:30 PM' => "7:30 PM",
            '7:45 PM' => "7:45 PM",
            '8:00 PM' => "8:00 PM",
            '8:15 PM' => "8:15 PM",
            '8:30 PM' => "8:30 PM",
            '8:45 PM' => "8:45 PM",
            '9:00 PM' => "9:00 PM",
            '9:15 PM' => "9:15 PM",
            '9:30 PM' => "9:30 PM",
            '9:45 PM' => "9:45 PM",
            '10:00 PM' => "10:00 PM"
        );
    }


    if ($type == "COLLECTION_TIME") {

        $thevalues = array(
            '11:00 AM' => "11:00 AM",
            '11:30 AM' => "11:30 AM",
            '11:45 AM' => "11:45 AM",
            '12:00 PM' => "12:00 PM",
            '12:15 PM' => "12:15 PM",
            '12:30 PM' => "12:30 PM",
            '12:45 PM' => "12:45 PM",
            '1:00 PM' => "1:00 PM",
            '1:15 PM' => "1:15 PM",
            '1:30 PM' => "1:30 PM",
            '1:45 PM' => "1:45 PM",
            '2:00 PM' => "2:00 PM",
            '2:15 PM' => "2:15 PM",
            '2:30 PM' => "2:30 PM",
            '2:45 PM' => "2:45 PM",
            '3:00 PM' => "3:00 PM",
            '3:15 PM' => "3:15 PM",
            '3:30 PM' => "3:30 PM",
            '3:45 PM' => "3:45 PM",
            '4:00 PM' => "4:00 PM",
            '4:15 PM' => "4:15 PM",
            '4:30 PM' => "4:30 PM",
            '4:45 PM' => "4:45 PM",
            '5:00 PM' => "5:00 PM",
            '5:15 PM' => "5:15 PM",
            '5:30 PM' => "5:30 PM",
            '5:45 PM' => "5:45 PM",
            '6:00 PM' => "6:00 PM",
            '6:15 PM' => "6:15 PM",
            '6:30 PM' => "6:30 PM",
            '6:45 PM' => "6:45 PM",
            '7:00 PM' => "7:00 PM",
            '7:15 PM' => "7:15 PM",
            '7:30 PM' => "7:30 PM",
            '7:45 PM' => "7:45 PM",
            '8:00 PM' => "8:00 PM",
            '8:15 PM' => "8:15 PM",
            '8:30 PM' => "8:30 PM",
            '8:45 PM' => "8:45 PM",
            '9:00 PM' => "9:00 PM",
            '9:15 PM' => "9:15 PM",
            '9:30 PM' => "9:30 PM",
            '9:45 PM' => "9:45 PM",
            '10:00 PM' => "10:00 PM",
            '10:30 PM' => "10:30 PM (Additional $25 surcharge)",
            '11:00 PM' => "11:00 PM (Additional $50 surcharge)",
            '11:30 PM' => "11:30 PM (Additional $75 surcharge)",
            '12:00 AM' => "12:00 AM (Additional $100 surcharge)"
        );
    }

    if ($type == "ADMIN_COLLECTION_TIME") {

        $thevalues = array(
            '12:15 AM' => "12:15 AM",
            '12:30 AM' => "12:30 AM",
            '12:45 AM' => "12:45 AM",
            '1:00 AM' => "1:00 AM",
            '1:15 AM' => "1:15 AM",
            '1:30 AM' => "1:30 AM",
            '1:45 AM' => "1:45 AM",
            '2:00 AM' => "2:00 AM",
            '2:15 AM' => "2:15 AM",
            '2:30 AM' => "2:30 AM",
            '2:45 AM' => "2:45 AM",
            '3:00 AM' => "3:00 AM",
            '3:15 AM' => "3:15 AM",
            '3:30 AM' => "3:30 AM",
            '3:45 AM' => "3:45 AM",
            '4:00 AM' => "4:00 AM",
            '4:15 AM' => "4:15 AM",
            '4:30 AM' => "4:30 AM",
            '4:45 AM' => "4:45 AM",
            '5:00 AM' => "5:00 AM",
            '5:15 AM' => "5:15 AM",
            '5:30 AM' => "5:30 AM",
            '5:45 AM' => "5:45 AM",
            '6:00 AM' => "6:00 AM",
            '6:15 AM' => "6:15 AM",
            '6:30 AM' => "6:30 AM",
            '6:45 AM' => "6:45 AM",
            '7:00 AM' => "7:00 AM",
            '7:15 AM' => "7:15 AM",
            '7:30 AM' => "7:30 AM",
            '7:45 AM' => "7:45 AM",
            '8:00 AM' => "8:00 AM",
            '8:15 AM' => "8:15 AM",
            '8:30 AM' => "8:30 AM",
            '8:45 AM' => "8:45 AM",
            '9:00 AM' => "9:00 AM",
            '9:15 AM' => "9:15 AM",
            '9:30 AM' => "9:30 AM",
            '9:45 AM' => "9:45 AM",
            '10:00 AM' => "10:00 AM",
            '10:15 AM' => "10:15 AM",
            '10:30 AM' => "10:30 AM",
            '10:45 AM' => "10:45 AM",
            '11:00 AM' => "11:00 AM",
            '11:30 AM' => "11:30 AM",
            '11:45 AM' => "11:45 AM",
            '12:00 PM' => "12:00 PM",
            '12:15 PM' => "12:15 PM",
            '12:30 PM' => "12:30 PM",
            '12:45 PM' => "12:45 PM",
            '1:00 PM' => "1:00 PM",
            '1:15 PM' => "1:15 PM",
            '1:30 PM' => "1:30 PM",
            '1:45 PM' => "1:45 PM",
            '2:00 PM' => "2:00 PM",
            '2:15 PM' => "2:15 PM",
            '2:30 PM' => "2:30 PM",
            '2:45 PM' => "2:45 PM",
            '3:00 PM' => "3:00 PM",
            '3:15 PM' => "3:15 PM",
            '3:30 PM' => "3:30 PM",
            '3:45 PM' => "3:45 PM",
            '4:00 PM' => "4:00 PM",
            '4:15 PM' => "4:15 PM",
            '4:30 PM' => "4:30 PM",
            '4:45 PM' => "4:45 PM",
            '5:00 PM' => "5:00 PM",
            '5:15 PM' => "5:15 PM",
            '5:30 PM' => "5:30 PM",
            '5:45 PM' => "5:45 PM",
            '6:00 PM' => "6:00 PM",
            '6:15 PM' => "6:15 PM",
            '6:30 PM' => "6:30 PM",
            '6:45 PM' => "6:45 PM",
            '7:00 PM' => "7:00 PM",
            '7:15 PM' => "7:15 PM",
            '7:30 PM' => "7:30 PM",
            '7:45 PM' => "7:45 PM",
            '8:00 PM' => "8:00 PM",
            '8:15 PM' => "8:15 PM",
            '8:30 PM' => "8:30 PM",
            '8:45 PM' => "8:45 PM",
            '9:00 PM' => "9:00 PM",
            '9:15 PM' => "9:15 PM",
            '9:30 PM' => "9:30 PM",
            '9:45 PM' => "9:45 PM",
            '10:00 PM' => "10:00 PM",
            '10:30 PM' => "10:30 PM (Additional $25 surcharge)",
            '11:00 PM' => "11:00 PM (Additional $50 surcharge)",
            '11:30 PM' => "11:30 PM (Additional $75 surcharge)",
            '12:00 AM' => "12:00 AM (Additional $100 surcharge)"
        );
    }

    $retval = "<select name='$name' id='$id' class='$class'>";
    foreach ( $thevalues as $thekey => $thevalue ) {
        $retval .= "<option value='$thekey'";
        if ($selected == $thekey) {
            $retval .= " selected='selected' ";
        }
        $retval .= ">$thevalue</option>";
    }
    $retval .= "</select>";

    return $retval;

}//end selectBoxHelper()
