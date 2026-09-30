<?php if ( ! defined ( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Cart extends KA_Controller
{

	public function index ()
	{

		$displaydata = array ();

		//initalize display data with some default values
		$displaydata[ 'meta_title' ] = "Shopping Cart - Jai Thai Catering";
		$displaydata[ 'meta_description' ] = "Let us help cater for your next event!";

		//initialize form defaults data with form defaults
		$formdatadefaults = array ();
		$formdatadefaults[ 'deliverypickup' ] = "delivery";
		$formdatadefaults[ 'pickuplocation' ] = "";
		$formdatadefaults[ 'functiondate' ] = "";
		$formdatadefaults[ 'timestart' ] = "9:00 AM";
		$formdatadefaults[ 'timeend' ] = "1:00 PM";
		$formdatadefaults[ 'paymentmode' ] = "Cash";
		$formdatadefaults[ 'notes' ] = "";
		$formdatadefaults[ 'name' ] = "";
		$formdatadefaults[ 'email' ] = "";
		$formdatadefaults[ 'email2' ] = "";
		$formdatadefaults[ 'telephone' ] = "";
		$formdatadefaults[ 'mobile' ] = "";
		$formdatadefaults[ 'mobile2' ] = "";
		$formdatadefaults[ 'company' ] = "";
		$formdatadefaults[ 'address' ] = "";
		$formdatadefaults[ 'unitnum' ] = "";
		$formdatadefaults[ 'buildingname' ] = "";
		$formdatadefaults[ 'postalcode' ] = "";
		$formdatadefaults[ 'typeoffunction' ] = "";
		$formdatadefaults[ 'setuparea' ] = "";
		$formdatadefaults[ 'accessiblebylift' ] = "";
        $formdatadefaults[ 'cutleryrequired' ] = "";
        $formdatadefaults[ 'tablesrequired' ] = "";
		$formdatadefaults[ 'sameasdelivery' ] = 1;
		$formdatadefaults[ 'billname' ] = "";
		$formdatadefaults[ 'billcompany' ] = "";
		$formdatadefaults[ 'billemail' ] = "";
		$formdatadefaults[ 'billtelephone' ] = "";
		$formdatadefaults[ 'billmobile' ] = "";
		$formdatadefaults[ 'billaddress' ] = "";
		$formdatadefaults[ 'billunitnum' ] = "";
		$formdatadefaults[ 'billbuildingname' ] = "";
		$formdatadefaults[ 'billpostalcode' ] = "";
		$formdatadefaults[ 'communicationpreference' ] = "SMS Email";

		if ( $this->formSubmitted () ) {
			//process the order form

			$deliverypickup = $this->input->post ( 'deliverypickup' );

			$formdata = array ();
			$errors = array ();
			$cart = $this->cart_model->getCart ();

			if ( $deliverypickup == "pickup" ) {
				//pickup order

				//retrieve from POST, putting blank value for fields not submitted
				$formdata[ 'deliverypickup' ] = $deliverypickup;
				$formdata[ 'pickuplocation' ] = $this->input->post ( 'pickuplocation' );
				$formdata[ 'functiondate' ] = $this->input->post ( 'functiondate' );
				$formdata[ 'timestart' ] = $this->input->post ( 'timestart' );
				$formdata[ 'timeend' ] = "";
				$formdata[ 'paymentmode' ] = $this->input->post ( 'paymentmode' );
				$formdata[ 'notes' ] = $this->input->post ( 'notes' );
				$formdata[ 'name' ] = $this->input->post ( 'name' );
				$formdata[ 'email' ] = $this->input->post ( 'email' );
				$formdata[ 'email2' ] = $this->input->post ( 'email2' );
				$formdata[ 'telephone' ] = $this->input->post ( 'telephone' );
				$formdata[ 'mobile' ] = $this->input->post ( 'mobile' );
				$formdata[ 'mobile2' ] = $this->input->post ( 'mobile2' );
				$formdata[ 'company' ] = $this->input->post ( 'company' );
				$formdata[ 'cutleryrequired' ] = $this->input->post ( 'cutleryrequired' );
				$formdata[ 'tablesrequired' ] = "";
				$formdata[ 'address' ] = "";
				$formdata[ 'unitnum' ] = "";
				$formdata[ 'buildingname' ] = "";
				$formdata[ 'postalcode' ] = "";
				$formdata[ 'typeoffunction' ] = "";
				$formdata[ 'setuparea' ] = "";
				$formdata[ 'accessiblebylift' ] = "";
				$formdata[ 'sameasdelivery' ] = 1;
				$formdata[ 'billname' ] = "";
				$formdata[ 'billcompany' ] = "";
				$formdata[ 'billemail' ] = "";
				$formdata[ 'billtelephone' ] = "";
				$formdata[ 'billmobile' ] = "";
				$formdata[ 'billaddress' ] = "";
				$formdata[ 'billunitnum' ] = "";
				$formdata[ 'billbuildingname' ] = "";
				$formdata[ 'billpostalcode' ] = "";
				$formdata[ 'communicationpreference' ] = $this->input->post ( 'communicationpreference' );
				$formdata[ 'agreetnc' ] = $this->input->post ( 'agreetnc' );

				//pre validation processsing
				$formdata[ 'pickuplocation' ] = trim ( $formdata[ 'pickuplocation' ] );
				$formdata[ 'functiondate' ] = trim ( $formdata[ 'functiondate' ] );
				$formdata[ 'timestart' ] = trim ( $formdata[ 'timestart' ] );
				$formdata[ 'paymentmode' ] = trim ( $formdata[ 'paymentmode' ] );
				$formdata[ 'notes' ] = trim ( $formdata[ 'notes' ] );
				$formdata[ 'name' ] = trim ( $formdata[ 'name' ] );
				$formdata[ 'email' ] = trim ( $formdata[ 'email' ] );
				$formdata[ 'email2' ] = trim ( $formdata[ 'email2' ] );
				$formdata[ 'telephone' ] = trim ( $formdata[ 'telephone' ] );
				$formdata[ 'mobile' ] = trim ( $formdata[ 'mobile' ] );
				$formdata[ 'mobile2' ] = trim ( $formdata[ 'mobile2' ] );
				$formdata[ 'company' ] = trim ( $formdata[ 'company' ] );
                $formdata[ 'cutleryrequired' ] = trim ( $formdata[ 'cutleryrequired' ] );
				//validation
				if ( ! strtotime ( $formdata[ 'functiondate' ] ) ) {
					$errors[] = "Please enter your collection date.";
				} else {
					$formdata[ 'functiondate' ] = date ( "Y-m-d", strtotime ( $formdata[ 'functiondate' ] ) );
				}
				if ( $formdata[ 'name' ] == "" ) {
					$errors[] = "Please enter your name.";
				}
				if ( ! filter_var ( $formdata[ 'email' ], FILTER_VALIDATE_EMAIL ) ) {
					$errors[] = "Please enter a valid email address.";
				}
				if ( ( $formdata[ 'email2' ] != "" ) &&
					( ! filter_var ( $formdata[ 'email2' ], FILTER_VALIDATE_EMAIL ) )
				) {
					$errors[] = "Please enter a valid secondary email address.";
				}
				if ( ($formdata[ 'telephone' ] != "") && (strlen ( $formdata[ 'telephone' ] ) != 8) ) {
					$errors[] = "Please enter a valid telephone number.";
				}
				if ( $formdata[ 'mobile' ] == "" ) {
					$errors[] = "Please enter your mobile.";
				}
				if ( strlen ( $formdata[ 'mobile' ] ) != 8 ) {
					$errors[] = "Please enter a valid mobile number.";
				}
				elseif ( ( substr ( $formdata[ 'mobile' ], 0, 1 ) != "8" ) &&
					( substr ( $formdata[ 'mobile' ], 0, 1 ) != "9" )
				) {
					$errors[] = "Please enter a valid mobile number.";
				}
				if ( $formdata[ 'mobile2' ] != "" &&
					( substr ( $formdata[ 'mobile2' ], 0, 1 ) != "8" ) &&
					( substr ( $formdata[ 'mobile2' ], 0, 1 ) != "9" )
				) {
					$errors[] = "Please enter a valid secondary mobile number.";
				}
                if ( $formdata[ 'cutleryrequired' ] == "" ) {
                    $errors[] = "Please specify if you need cutlery.";
                }
				if ( $formdata[ 'agreetnc' ] != "agree" ) {
					$errors[] = "Please agree to the catering terms and conditions.";
				}

				$errors = CNY_Helper::validate_order ( $formdata, $cart, $errors );

				//make sure cart is not empty
				$cartitems = $cart[ 'items' ];
				if ( ! sizeof ( $cartitems ) ) {
					$errors[] = "You need to have at least one item in your cart.";
				}


			}//pickup validation
			elseif ( $deliverypickup == "delivery" ) {
				//delivery order

				//retrieve from POST, putting blank value for fields not submitted
				$formdata[ 'deliverypickup' ] = $deliverypickup;
				$formdata[ 'pickuplocation' ] = "";
				$formdata[ 'functiondate' ] = $this->input->post ( 'functiondate' );
				$formdata[ 'timestart' ] = $this->input->post ( 'timestart' );
				$formdata[ 'timeend' ] = $this->input->post ( 'timeend' );
				$formdata[ 'paymentmode' ] = $this->input->post ( 'paymentmode' );
				$formdata[ 'notes' ] = $this->input->post ( 'notes' );
				$formdata[ 'name' ] = $this->input->post ( 'name' );
				$formdata[ 'email' ] = $this->input->post ( 'email' );
				$formdata[ 'email2' ] = $this->input->post ( 'email2' );
				$formdata[ 'telephone' ] = $this->input->post ( 'telephone' );
				$formdata[ 'mobile' ] = $this->input->post ( 'mobile' );
				$formdata[ 'mobile2' ] = $this->input->post ( 'mobile2' );
				$formdata[ 'company' ] = $this->input->post ( 'company' );
				$formdata[ 'address' ] = $this->input->post ( 'address' );
				$formdata[ 'unitnum' ] = $this->input->post ( 'unitnum' );
				$formdata[ 'buildingname' ] = $this->input->post ( 'buildingname' );
				$formdata[ 'postalcode' ] = $this->input->post ( 'postalcode' );
				$formdata[ 'typeoffunction' ] = $this->input->post ( 'typeoffunction' );
				$formdata[ 'setuparea' ] = $this->input->post ( 'setuparea' );
				$formdata[ 'accessiblebylift' ] = $this->input->post ( 'accessiblebylift' );
                $formdata[ 'cutleryrequired' ] = $this->input->post ( 'cutleryrequired' );
                $formdata[ 'tablesrequired' ] = $this->input->post ( 'tablesrequired' );;
				$formdata[ 'sameasdelivery' ] = $this->input->post ( 'sameasdelivery' );
				if ( $formdata[ 'sameasdelivery' ] ) {
					$formdata[ 'sameasdelivery' ] = 1; //change the "on" into 1. if not specified, the value shd be empty.
				}

				if ( $formdata[ 'sameasdelivery' ] ) {
					$formdata[ 'billname' ] = "";
					$formdata[ 'billcompany' ] = "";
					$formdata[ 'billemail' ] = "";
					$formdata[ 'billtelephone' ] = "";
					$formdata[ 'billmobile' ] = "";
					$formdata[ 'billaddress' ] = "";
					$formdata[ 'billunitnum' ] = "";
					$formdata[ 'billbuildingname' ] = "";
					$formdata[ 'billpostalcode' ] = "";
				} else {
					$formdata[ 'billname' ] = $this->input->post ( 'billname' );
					$formdata[ 'billcompany' ] = $this->input->post ( 'billcompany' );
					$formdata[ 'billemail' ] = $this->input->post ( 'billemail' );
					$formdata[ 'billtelephone' ] = $this->input->post ( 'billtelephone' );
					$formdata[ 'billmobile' ] = $this->input->post ( 'billmobile' );
					$formdata[ 'billaddress' ] = $this->input->post ( 'billaddress' );
					$formdata[ 'billunitnum' ] = $this->input->post ( 'billunitnum' );
					$formdata[ 'billbuildingname' ] = $this->input->post ( 'billbuildingname' );
					$formdata[ 'billpostalcode' ] = $this->input->post ( 'billpostalcode' );
				}
				$formdata[ 'communicationpreference' ] = $this->input->post ( 'communicationpreference' );

				//pre validation processsing
				$formdata[ 'functiondate' ] = trim ( $formdata[ 'functiondate' ] );
				$formdata[ 'timestart' ] = trim ( $formdata[ 'timestart' ] );
				$formdata[ 'timeend' ] = trim ( $formdata[ 'timeend' ] );
				$formdata[ 'paymentmode' ] = trim ( $formdata[ 'paymentmode' ] );
				$formdata[ 'notes' ] = trim ( $formdata[ 'notes' ] );
				$formdata[ 'name' ] = trim ( $formdata[ 'name' ] );
				$formdata[ 'email' ] = trim ( $formdata[ 'email' ] );
				$formdata[ 'email2' ] = trim ( $formdata[ 'email2' ] );
				$formdata[ 'telephone' ] = trim ( $formdata[ 'telephone' ] );
				$formdata[ 'mobile' ] = trim ( $formdata[ 'mobile' ] );
				$formdata[ 'mobile2' ] = trim ( $formdata[ 'mobile2' ] );
				$formdata[ 'company' ] = trim ( $formdata[ 'company' ] );
				$formdata[ 'address' ] = trim ( $formdata[ 'address' ] );
				$formdata[ 'unitnum' ] = trim ( $formdata[ 'unitnum' ] );
				$formdata[ 'buildingname' ] = trim ( $formdata[ 'buildingname' ] );
				$formdata[ 'postalcode' ] = trim ( $formdata[ 'postalcode' ] );
				$formdata[ 'typeoffunction' ] = trim ( $formdata[ 'typeoffunction' ] );
				$formdata[ 'setuparea' ] = trim ( $formdata[ 'setuparea' ] );
                $formdata[ 'tablesrequired' ] = trim ( $formdata[ 'tablesrequired' ] );
                $formdata[ 'cutleryrequired' ] = trim ( $formdata[ 'cutleryrequired' ] );
                if ( ! $formdata[ 'sameasdelivery' ] ) {
					$formdata[ 'billname' ] = trim ( $formdata[ 'billname' ] );
					$formdata[ 'billcompany' ] = trim ( $formdata[ 'billcompany' ] );
					$formdata[ 'billemail' ] = trim ( $formdata[ 'billemail' ] );
					$formdata[ 'billtelephone' ] = trim ( $formdata[ 'billtelephone' ] );
					$formdata[ 'billmobile' ] = trim ( $formdata[ 'billmobile' ] );
					$formdata[ 'billaddress' ] = trim ( $formdata[ 'billaddress' ] );
					$formdata[ 'billunitnum' ] = trim ( $formdata[ 'billunitnum' ] );
					$formdata[ 'billbuildingname' ] = trim ( $formdata[ 'billbuildingname' ] );
					$formdata[ 'billpostalcode' ] = trim ( $formdata[ 'billpostalcode' ] );
				}
				$formdata[ 'agreetnc' ] = $this->input->post ( 'agreetnc' );

				//validation
				if ( ! strtotime ( $formdata[ 'functiondate' ] ) ) {
					$errors[] = "Please enter your function date.";
				} else {
					$formdata[ 'functiondate' ] = date ( "Y-m-d", strtotime ( $formdata[ 'functiondate' ] ) );
				}

				if ( $formdata[ 'name' ] == "" ) {
					$errors[] = "Please enter your name.";
				}
				if ( ! filter_var ( $formdata[ 'email' ], FILTER_VALIDATE_EMAIL ) ) {
					$errors[] = "Please enter a valid email address.";
				}
				if ( ( $formdata[ 'email2' ] != "" ) &&
					( ! filter_var ( $formdata[ 'email2' ], FILTER_VALIDATE_EMAIL ) )
				) {
					$errors[] = "Please enter a valid secondary email address.";
				}
				if ( ($formdata[ 'telephone' ] != "") && (strlen ( $formdata[ 'telephone' ] ) != 8) ) {
					$errors[] = "Please enter a valid telephone number.";
				}
				if ( $formdata[ 'mobile' ] == "" ) {
					$errors[] = "Please enter your mobile.";
				}
				if ( strlen ( $formdata[ 'mobile' ] ) != 8 ) {
					$errors[] = "Please enter a valid mobile number.";
				}
                elseif ( ( substr ( $formdata[ 'mobile' ], 0, 1 ) != "8" ) &&
				     ( substr ( $formdata[ 'mobile' ], 0, 1 ) != "9" )
				) {
					$errors[] = "Please enter a valid mobile number.";
				}
				if ( ( $formdata[ 'mobile2' ] != "" ) &&
					( substr ( $formdata[ 'mobile2' ], 0, 1 ) != "8" ) &&
					( substr ( $formdata[ 'mobile2' ], 0, 1 ) != "9" )
				) {
					$errors[] = "Please enter a valid secondary mobile number.";
				}
				if ( $formdata[ 'address' ] == "" ) {
					$errors[] = "Please enter your delivery address.";
				}
				if ( $formdata[ 'postalcode' ] == "" ) {
					$errors[] = "Please enter your delivery postal code.";
				}
				if ( ! $formdata[ 'sameasdelivery' ] ) {
					if ( $formdata[ 'billname' ] == "" ) {
						$errors[] = "Please enter your billing name.";
					}
					if ( ! filter_var ( $formdata[ 'billemail' ], FILTER_VALIDATE_EMAIL ) ) {
						$errors[] = "Please enter a valid billing email address.";
					}
					if ( ( substr ( $formdata[ 'billmobile' ], 0, 1 ) != "8" ) &&
						( substr ( $formdata[ 'billmobile' ], 0, 1 ) != "9" )
					) {
						$errors[] = "Please enter a valid billing mobile number.";
					}
					if ( $formdata[ 'billaddress' ] == "" ) {
						$errors[] = "Please enter your billing address.";
					}
					if ( $formdata[ 'billpostalcode' ] == "" ) {
						$errors[] = "Please enter your billing postal code.";
					}
				}
				if ( $formdata[ 'typeoffunction' ] == "" ) {
					$errors[] = "Please specify your type of function.";
				}
				if ( $formdata[ 'accessiblebylift' ] == "" ) {
					$errors[] = "Please specify your catering set up area accessiblity.";
				}
                if ( $formdata[ 'tablesrequired' ] == "" ) {
                    $errors[] = "Please specify if tables are required for your catering setup.";
                }
                if ( $formdata[ 'cutleryrequired' ] == "" ) {
                    $errors[] = "Please specify if you need cutlery.";
                }
				if ( $formdata[ 'agreetnc' ] != "agree" ) {
					$errors[] = "Please agree to the catering terms and conditions.";
				}

				$errors = CNY_Helper::validate_order ( $formdata, $cart, $errors );

				//make sure cart is not empty
				$cartitems = $cart[ 'items' ];
				if ( ! sizeof ( $cartitems ) ) {
					$errors[] = "You need to have at least one item in your cart.";
				}

			} //delivery validation

			//check if validation went thru
			if ( sizeof ( $errors ) ) {

				//there are errors, display them
				$errors = "<ul><li>" . implode ( "</li><li>", $errors ) . "</li></ul>";
				$this->errorMessage ( $errors );

				//load the values back into the display data and display the form
				$displaydata[ 'formdata' ] = $formdata;
				$displaydata[ 'cart' ] = $this->cart_model->getCart ();
				$displaydata[ 'template' ] = 'cart_view';
				$this->load->view ( KA_CITHEME . '/index', $displaydata );

			} else {

				//no errors, process the values
				//call some model to process the data here
				unset($formdata['agreetnc']);

				//re-retrieve the cart and create the database order record.
				$cart = $this->cart_model->getCart ();
				$cart = $this->surcharge_model->addSurcharges ( $formdata, $cart );
				$cart = $this->surcharge_model->addPromotions ( $formdata, $cart );
				$karesponse = $this->order_model->addOrder ( $formdata, $cart );
				if ( $karesponse->success ) {

					//order created and added
					$orderid = $karesponse->result;

					//once the order is created, send the email out
					$this->order_model->sendPlacedOrderEmail ( $orderid );

					//clear the cart and put order id into session
					$this->session->set_flashdata ( 'jtorderid', $orderid );
					$this->cart_model->clearItems ();

					//display a success message
					//redirect to display the confirmation

					$this->successMessage ( 'Thank you for your order. Your order has been placed, and we will be in touch shortly.' );
					redirect ( 'orderplaced.php' );

				} else {

					//there are errors, display them
					$this->errorMessage ( "Error.  Cannot place order." );

					//load the values back into the display data and display the form
					$displaydata[ 'formdata' ] = $formdata;
					$displaydata[ 'cart' ] = $this->cart_model->getCart ();
					$displaydata[ 'template' ] = 'cart_view';
					$this->load->view ( KA_CITHEME . '/index', $displaydata );

				}//karesponse->success
			}
		} else {
			//just display the cart
			$displaydata[ 'formdata' ] = $formdatadefaults;
			$displaydata[ 'cart' ] = $this->cart_model->getCart ();
			$displaydata[ 'template' ] = 'cart_view';
			$this->load->view ( KA_CITHEME . '/index', $displaydata );
		}

	}

	//end index()

	public function orderplaced ()
	{

		$displaydata = array ();

		//initalize display data with some default values
		$displaydata[ 'meta_title' ] = "Shopping Cart";
		$displaydata[ 'meta_description' ] = "";

		if ( $this->formSubmitted () ) {
			//order confirmed - add to database and start processing

		} else {
			//display the confirmation and thank you page
			$orderid = $this->session->flashdata ( 'jtorderid' );

			$karesponse = $this->order_model->getOrder ( $orderid );
			if ( $karesponse->success ) {

				$order = $karesponse->result;
				$displaydata[ 'orderdata' ] = $order;

				$displaydata[ 'template' ] = 'orderplaced_view';
				$this->load->view ( KA_CITHEME . '/index', $displaydata );

			} else {

				$this->errorMessage ( 'Order not found' );
				redirect ( 'cart.php' );
			}

		}

	}//end confirmation()


	public function acknowledgeorder ()
	{

		$orderhash = $this->input->get ( 'oh' );
		$where = array ( 'orderhash' => $orderhash );

		$karesponse = $this->order_model->getOrderWhere ( $where );
		$order = $karesponse->result;


		if ( $order[ 'paymentmode' ] == "Credit Card / Paypal" ) {
			if (
				! jaithai_outbound_enabled()
				|| ! jaithai_env_bool('JAITHAI_PAYPAL_ENABLED', FALSE)
				|| jaithai_env('JAITHAI_PAYPAL_MERCHANT_ID', '') === ''
			) {
				$this->errorMessage('Online payment is disabled in this environment.');
				redirect('cart');
				return;
			}

			//acknowledge and pay order
			$orderid = $order[ 'id' ];

			$displaydata = array ();
			$displaydata[ 'merchantcode' ] = jaithai_env('JAITHAI_PAYPAL_MERCHANT_ID', '');

			$displaydata[ 'itemname' ] = 'Jai Thai Catering Order ' . formatOrderNum ( $order );
			$displaydata[ 'amount' ] = $order[ 'ordertotalprice' ];
			$displaydata[ 'customvariable' ] = $order[ 'id' ];
			$displaydata[ 'notifyurl' ] = site_url ( 'cart/paypalipn' );
			$displaydata[ 'cancelurl' ] = site_url ( 'cart/paypalcancel' );
			$displaydata[ 'returnurl' ] = site_url ( 'cart/paypalreturn' );
			$this->load->view ( 'direct/paypalredirect_view', $displaydata );

		} else {
			//acknowledge order only

			$orderid = $order[ 'id' ];

			$where = array ( 'id' => $orderid );
			$toupdate = array ( 'a_confirmationack' => date ( 'Y-m-d H:i:s' ) );
			$karesponse = $this->order_model->updateOrdersWhere ( $toupdate, $where );

			//send the confirmation email
			$this->order_model->sendAcknowledgementEmail ( $orderid );

			$this->successmessage ( 'Thank you. Your order acknowledgement has been received.' );
			redirect ( '' );

		}
	}//end acknowledgeorder


	public function leavefeedback ()
	{


		if ( $this->formSubmitted () ) {
			//process feedback submission

			//retrieve post vales
			$orderid = $this->input->post ( 'orderid' );
			$qn1 = $this->input->post ( 'qn1' );
			$qn2 = $this->input->post ( 'qn2' );
			$qn3 = $this->input->post ( 'qn3' );
			$qn4 = $this->input->post ( 'qn4' );
			$qn4a = $this->input->post ( 'qn4a' );
			$qn5 = $this->input->post ( 'qn5' );
			$qn6 = $this->input->post ( 'qn6' );

			if ( is_array ( $qn4 ) ) {
				$qn4 = implode ( ", ", $qn4 );
			}

			$feedback = array ();
			$feedback[ 'orderid' ] = $orderid;
			$feedback[ 'qn1' ] = $qn1;
			$feedback[ 'qn2' ] = $qn2;
			$feedback[ 'qn3' ] = $qn3;
			$feedback[ 'qn4' ] = $qn4;
			$feedback[ 'qn4a' ] = $qn4a;
			$feedback[ 'qn5' ] = $qn5;
			$feedback[ 'qn6' ] = $qn6;
			$karesponse = $this->feedback_model->logFeedback ( $feedback );

			$karesponse = $this->feedback_model->sendThankYouNote ( $orderid );

			$where = array ( 'id' => $orderid );
			$toupdate = array ( 'a_feedbackreceived' => date ( 'Y-m-d H:i:s' ) );
			$karesponse = $this->order_model->updateOrdersWhere ( $toupdate, $where );

			$this->successmessage ( 'Thank you. Your feedback has been sent.' );
			redirect ( '' );


		} else {
			//show feedback form

			$orderhash = $this->input->get ( 'oh' );
			$where = array ( 'orderhash' => $orderhash );

			$karesponse = $this->order_model->getOrderWhere ( $where );
			$order = $karesponse->result;


			//show feedback form
			$displaydata[ 'orderdata' ] = $order;
			$displaydata[ 'template' ] = 'leavefeedback_view';
			$this->load->view ( KA_CITHEME . '/index', $displaydata );

		}
	}//end leavefeedback


	public function paypalipn ()
	{
		$mc_gross = $_POST[ 'mc_gross' ];

		if ( $mc_gross > 0 ) {
			$orderid = $_POST[ 'custom' ];
			$where = array ( 'id' => $orderid );
			$toupdate = array (
				'a_confirmationack' => date ( 'Y-m-d H:i:s' ),
				'a_paid' => date ( 'Y-m-d H:i:s' )
			);
			$this->order_model->updateOrdersWhere ( $toupdate, $where );

			$this->order_model->generateOrderReceiptPdf($orderid);
			$this->order_model->sendOrderPaidEmail($orderid);
		}
		//there is no need to do a response for this function, its and API call (IPN)		

	}//end paypalipn


	public function paypalcancel ()
	{

		$this->errormessage ( 'Paypal payment cancelled.  Please the link in the confirmation email to pay and acknowledge the order.' );
		redirect ( '' );

	}//end paypalcancel


	public function paypalreturn ()
	{

		//the setting of paid and acknowledge is handled by paypalipn.  This function just informs the user that the thing is done.

		$this->successmessage ( 'Thank you. Your order has been acknowledgement and paid.' );
		redirect ( '' );

	}//end paypalreturn


	public function clear ()
	{

		$this->cart_model->clearItems ();
		$this->successMessage ( 'Cart cleared.' );
		redirect ( 'cart.php' );

	}//end clear()


	public function change ()
	{
		$id = $this->uri->segment ( 3 );

		$cartItem = $this->cart_model->getItem ( $id );
		$menu = getJaiThaiMenu ( $cartItem[ 'menuid' ] );

		$this->cart_model->removeItem ( $id );
		$this->successMessage ( 'Item removed from cart. Please reselect your options.' );

		if ( $menu ) {
			redirect ( $menu[ 'url' ] );
			return;
		}
		redirect ( 'cart.php' );

	}//end change()

	public function remove ()
	{

		$id = $this->uri->segment ( 3 );
		$this->cart_model->removeItem ( $id );
		$this->successMessage ( 'Item removed.' );
		redirect ( 'cart.php' );
	}//end remove()

}
//end Class
