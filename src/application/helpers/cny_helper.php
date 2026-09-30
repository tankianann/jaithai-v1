<?php

class CNY_Helper
{
	public static function outlet_opening_hours_banner ()
	{
		/*
		if ( date ( 'Y-m-d' ) <= '2018-02-28' ):
			?>
			<div class="row" style="background: linear-gradient(180deg, #d00 0%, #a00 100%); color: #fff;">
				<div class="col-sm-12">
					<h3>Chinese New Year 2018 Outlet Opening Hours</h3>
					<p>Please note that during the Chinese New Year festive period, our restaurant outlets will follow the following opening hours:</p>
					<ul>
						<li><strong>Purvis Outlet</strong> – Open as usual (11:30am - 3pm for Lunch, 6pm - 10pm for Dinner)</li>
						<li><strong>Clover Way Outlet</strong> – Closed for Lunch on 28th & 29th Jan 2017. Dinner open as usual (6pm - 10pm).</li>
						<li><strong>Dhoby X'Change Outlet</strong> – Closed from 27th to 30th Jan 2017.</li>
						<li><strong>East Coast Outlet</strong> – Closed from 28th to 30th Jan 2017.</li>
					</ul>
				</div>
			</div>
			<?php
		endif;
		  */
	}

	public static function show_banner ()
	{
		if ( date ( 'Y-m-d' ) <= '2021-02-14' ):
			?>
			<div class="row cnysurcharge">
				<div class="col-lg-2 col-md-3 col-sm-4" style="vertical-align: bottom">
					<img src="<?php _e ( site_url ( 'assets/images/cny-surcharge-left.png' ) ) ?>" class="img-responsive" style="margin: 0 auto;"/>
				</div>
				<div class="col-lg-10 col-md-9 col-sm-8">
					<h3>Note: CNY 2021 Specials / Surcharges (11 Feb 2021 – 14 Feb 2021)</h3>
					<p>Please note that there will be an additional 20% surcharge due to the increase of supplies during CNY and the delivery charge will be S$80 for Catering Order and $40 for Mini
						Party Order during this period.</p>
					<p>Our <strong>Mini Party Set Menu</strong>, <strong>Set Catering Menu A</strong>, <strong>DIY Catering Menu A</strong> and <strong>Vegetarian Set Menu A</strong> will also NOT be
						available during this period. Additionally, for our vegetable dishes, only <strong>Fried Mixed Vegetables</strong> and <strong>Fried Mixed Vegetables with Chinese
							Mushrooms</strong> will be available.</p>
					<?php /*
 						<p>Make your toast to prosperity with our special <a href="<?php _e ( site_url ( '/jtpages/cateringmenu#promotion' ) );	?>">
						<strong>Chinese New Year Mini Party Menus</strong></a>, or add a Jai Thai Mango Prosperity Yusheng to your order in our
						<a href="<?php _e ( site_url ( 'mini-parties.php' ) ); ?>"><strong>Mini Party Ala Carte Menu</strong></a>!</p>
 					*/ ?>
				</div>
				<div class="botbg col-xs-12"></div>
			</div>
		<?php
		endif;
	}

	public static function validate_order ( $formdata, $cart, $errors )
	{
		$lunch = array (
            "10:00 AM", "10:15 AM", "10:30 AM", "10:45 AM",
            "11:00 AM", "11:15 AM", "11:30 AM", "11:45 AM",
			"12:00 PM", "12:15 PM", "12:30 PM", "12:45 PM",
			"1:00 PM", "1:15 PM", "1:30 PM", "1:45 PM",
			"2:00 PM", "2:15 PM", "2:30 PM", "2:45 PM",
			"3:00 PM", "3:15 PM", "3:30 PM", "3:45 PM", );
        $dinner = array ( "4:00 PM", "4:15 PM", "4:30 PM", "4:45 PM",
            "5:00 PM", "5:15 PM", "5:30 PM", "5:45 PM",
            "6:00 PM", "6:15 PM", "6:30 PM", "6:45 PM",
            "7:00 PM", "7:15 PM", "7:30 PM", "7:45 PM",
            "8:00 PM", "8:15 PM", "8:30 PM", "8:45 PM",
            "9:00 PM", "9:15 PM", "9:30 PM", "9:45 PM", "10:00 PM" );
        $blocked_out = ['2024-01-27', '2024-01-28', '2024-01-29', '2024-01-30', '2024-01-31'];

        if ( ($formdata[ 'functiondate' ] == '2026-02-15')) {
            $errors[] = "Sorry, our catering slots for 15 Feb 2026 are full. ";
        }
        if ( ($formdata[ 'functiondate' ] == '2026-02-16')) {
            $errors[] = "Sorry, our catering slots for 16 Feb 2026 are full. ";
        }
        if ( ($formdata[ 'functiondate' ] == '2026-02-17')) {
            $errors[] = "Sorry, our catering slots for 17 Feb 2026 are full. ";
        }
        if ( ($formdata[ 'functiondate' ] == '2026-02-18')) {
            $errors[] = "Sorry, our catering slots for 18 Feb 2026 are full. ";
        }
        if ( ($formdata[ 'functiondate' ] == '2026-02-19')) {
            $errors[] = "Sorry, our catering slots for 19 Feb 2026 are full. ";
        }

        if ( ($formdata[ 'functiondate' ] == '2025-05-07')
             && ($formdata['deliverypickup'] == 'delivery')) {
            $errors[] = "Sorry, our catering slots for 7 May 2025 are full. ";
        }
        if ( ($formdata[ 'functiondate' ] == '2025-08-19')
             && (in_array($formdata[ 'timestart' ], $lunch))
             && ($formdata['deliverypickup'] == 'delivery')) {
            $errors[] = "Sorry, our lunch catering slots for 19 Aug 2025 are full. ";
        }
        if ( ($formdata[ 'functiondate' ] == '2025-07-23')
             && (in_array($formdata[ 'timestart' ], $lunch))) {
            $errors[] = "Sorry, our lunch catering slots for 23 July 2025 are full. ";
        }
		if ( (in_array($formdata['functiondate'], $blocked_out) )
		     && ($formdata['deliverypickup'] == 'delivery')) {
			$errors[] = "Sorry, our catering slots are fully booked for 27 - 31 Jan 2024. ";
		}

		if ( ( $formdata[ 'functiondate' ] >= '2026-02-14' ) && ( $formdata[ 'functiondate' ] <= '2026-03-03' ) ) {
			$cartitems = $cart[ 'items' ];
			$cnyerror = false;

			foreach ( $cartitems as $cartitem ) {
				if ( !in_array ($cartitem[ 'menuid' ], ['CNY2026JOY', 'CNY2026FORTUNE', 'CNY2026PROSPERITY', 'CNY2026FAMILYSET', 'CNY2026ADDONS'] )) {
					$cnyerror = true;
				}
			}
			if ( $cnyerror ) {
				$errors[] = "Only our CNY Festive Menus will be available between 14 Feb 2026 - 3 Mar 2026.";
			}
		}

//        if ( ( $formdata[ 'functiondate' ] < '2026-02-14' ) || ( $formdata[ 'functiondate' ] > '2026-03-03' ) ) {
//            $cartitems = $cart[ 'items' ];
//            $cnyerror = false;
//
//            foreach ( $cartitems as $cartitem ) {
//                if ( in_array ($cartitem[ 'menuid' ], ['MPALACARTE', 'CNY2026JOY', 'CNY2026FORTUNE', 'CNY2026PROSPERITY', 'CNY2026FAMILYSET', 'CNYADDONS'] )) {
//                    $cnyerror = true;
//                }
//            }
//            if ( $cnyerror ) {
//                $errors[] = "Our CNY Festive Menus will be available only between 14 Feb 2026 - 3 Mar 2026.";
//            }
//        }




		return $errors;

	}//validate_order()

	public static function show_upsell ()
	{
		if ( date ( 'Y-m-d' ) <= '2018-02-07' ):
			?>
			<script>
				swal (
					{
						title : "Make Your Toast to Prosperity!",
						text : "Would you like to add Jai Thai Mango Prosperity Yusheng @ $2 per pax?",
						showCancelButton : true,
						confirmButtonText : "Yes!",
						cancelButtonText : "No, thank you.",
						closeOnConfirm : false,
						closeOnCancel : true,
					},
					function ( isConfirm ) {
						if ( isConfirm ) {
							swal (
								{
									title : "Jai Thai Mango Prosperity Yusheng",
									text : "Please choose the number of servings of Jai Thai Mango Prosperity Yusheng you need." +
									"<div style='margin-top: 10px'><select id='upsellqty'>" +
									"   <option value='1'>Serves 20 pax ($40)</option>" +
									"   <option value='1.5'>Serves 30 pax ($60)</option>" +
									"   <option value='2'>Serves 40 pax ($80)</option>" +
									"   <option value='2.5'>Serves 50 pax ($100)</option>" +
									"   <option value='3'>Serves 60 pax ($120)</option>" +
									"   <option value='3.5'>Serves 70 pax ($140)</option>" +
									"   <option value='4'>Serves 80 pax ($160)</option>" +
									"   <option value='4.5'>Serves 90 pax ($180)</option>" +
									"   <option value='5'>Serves 100 pax ($200)</option>" +
									"   <option value='5.5'>Serves 110 pax ($220)</option>" +
									"   <option value='6'>Serves 120 pax ($240)</option>" +
									"   <option value='6.5'>Serves 130 pax ($260)</option>" +
									"   <option value='7'>Serves 140 pax ($280)</option>" +
									"   <option value='7.5'>Serves 150 pax ($300)</option>" +
									"   <option value='8'>Serves 160 pax ($320)</option>" +
									"   <option value='8.5'>Serves 170 pax ($340)</option>" +
									"   <option value='9'>Serves 180 pax ($360)</option>" +
									"   <option value='9.5'>Serves 190 pax ($380)</option>" +
									"   <option value='10'>Serves 200 pax ($400)</option>" +
									"</select></div>",
									showCancelButton : true,
									confirmButtonText : "Add to Order",
									cancelButtonText : "Cancel",
									closeOnConfirm : true,
									closeOnCancel : true,
								},
								function ( isConfirm ) {
									if ( isConfirm ) {
										window.location.href = "https://www.jai-thai.com/cnymenu/addupsells/" + $ ( "#upsellqty" ).val ();
									}
								}
							);
						}//isconfirm
					}
				);
			</script>
		<?php endif;
	}//show_upsell
}

