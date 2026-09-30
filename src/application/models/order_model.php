<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends KA_Model {
		
    function  __construct()  {
        parent::__construct();
    }
    //end __construct
    
    function addOrder($orderdata, $cart) {

	    //get the next order number
	    $newordernum = $this->options_model->nextordernum();
	    
	    //calculate the total price of the order, based on delivery or pickup
	    $totalprice = $this->calculateTotalPrice($orderdata, $cart);

	    
	    //serialize the cart items
	    $cart = serialize($cart);
	    
	    //set the appropriate values.  some defaults too
	    $orderdata['items'] = $cart;
	    $orderdata['ordertime'] = date('Y-m-d H:i:s');
	    $orderdata['ordernum'] = $newordernum->result;
	    $orderdata['ordertotalprice'] = $totalprice;
	    $orderdata['orderhash'] = createOrderHash($newordernum->result);
	    $orderdata['a_assigneddriver'] = "";
	    $orderdata['a_assignedoutlet'] = "";
	    $orderdata['a_addedtocalendar'] = "0000-00-00 00:00:00";
	    $orderdata['a_confirmationsent'] = "0000-00-00 00:00:00";
	    $orderdata['a_confirmationack'] = "0000-00-00 00:00:00";
	    $orderdata['a_paid'] = "0000-00-00 00:00:00";
	    $orderdata['a_delivered'] = "0000-00-00 00:00:00";
	    $orderdata['a_feedbacksent'] = "0000-00-00 00:00:00";
	    $orderdata['a_feedbackreceived'] = "0000-00-00 00:00:00";
	    $orderdata['a_credit'] = "0000-00-00 00:00:00";
	    $orderdata['a_archived'] = "0000-00-00 00:00:00";
	    $orderdata['a_cancelled'] = "0000-00-00 00:00:00";

	    $this->db->insert('jt_orders', $orderdata);
	    
		if ($this->db->affected_rows() > 0) {
			return new KAResponse(true, $this->db->insert_id());
		}
		else {
			return new KAResponse(false, "Cannot add order");
		}
    }//end addOrder
    
    
    //calculates the total price of the order, including surcharges
    function calculateTotalPrice($orderdata, $cart) {

		$totalprice = 0; 
	    if ($orderdata['deliverypickup'] == "delivery") {
		    if ($cart['chargeforcontainers'] && $cart['containerprice'] > 0) {
			    $totalprice = $cart['foodprice'] + $cart['containerprice'] + $cart['deliveryprice'];
		    }
		    else {
			    $totalprice = $cart['foodprice'] + $cart['deliveryprice'];
		    }
	    }
	    elseif ($orderdata['deliverypickup'] == "pickup") {
	    	$totalprice = $cart['foodprice'] + $cart['containerprice'];
	    }
	    
	    if (array_key_exists('surcharges', $cart)) {
		    $surcharges = $cart['surcharges'];
		    if (is_array($surcharges) and sizeof($surcharges)) {
				
				foreach($surcharges as $key => $value) {
					$totalprice += $value;
				}			    
			    
		    }
	    }
	    
	    return $totalprice;
	    
    }
    

    function getOrder($orderid) {

	    $query = $this->db->where('id', $orderid);
	    $query = $this->db->get('jt_orders');
	    
		if ($query->num_rows()) {
			return new KAResponse(true, $query->row_array());
		}
		else {
			return new KAResponse(false, false); 
		}
    }//end getOrder


    function getOrderWhere($where) {

	    $query = $this->db->where($where);
	    $query = $this->db->get('jt_orders');
	    
		if ($query->num_rows()) {
			return new KAResponse(true, $query->row_array());
		}
		else {
			return new KAResponse(false, false); 
		}
    }//end getOrderWhere

    
    function getOrdersWhere($where, $orderby = "", $wherein = array()) {
    
	    $query = $this->db->where($where);
	    if ($orderby) {
		    $query = $this->db->order_by($orderby);		    
	    }
	    else {
		    $query = $this->db->order_by('ordertime DESC');		    
	    }

		if (is_array($wherein) && sizeof($wherein)) {
			foreach($wherein as $key => $values) {
			    $query = $this->db->where_in($key, $values);
			}
		}

	    $query = $this->db->get('jt_orders');
	    
		if ($query->num_rows()) {
			return new KAResponse(true, $query->result_array());
		}
		else {
			return new KAResponse(false, array()); 
		}
	    
    }//end getOrdersWhere
    
    
    function updateOrdersWhere($order, $where) {
    
	    $query = $this->db->where($where);
	    $query = $this->db->update('jt_orders', $order);
	    
		if ($this->db->affected_rows() > 0) {
			return new KAResponse(true, $this->db->affected_rows());
		}
		else {
			return new KAResponse(false, "Cannot update orders");
		}
	    
    }//end updateOrdersWhere
    
    
	function sendPlacedOrderEmail($orderid) {
		$query = $this->db->get_where('jt_orders', array('id' => $orderid));
		if ($query->result()) {
		
			$order = $query->row_array();
			$ordernum = formatOrderNum($order);
			$emaildata['orderdata'] = $order;
			phpmailer_send_email([
				'from' => KA_ADMIN_EMAIL,
				'from_name' => KA_ADMIN_NAME,
				'to' => $order['email'],
				'cc' => ($order['email2']) ? $order['email2'] : "",
				'subject' => 'Notification: Catering Order #' . $ordernum,
				'message' => $this->load->view('emails/orderplaced_customer_view', $emaildata, true),
			]);

			phpmailer_send_email([
				'from' => KA_ADMIN_EMAIL,
				'from_name' => KA_ADMIN_NAME,
				'to' => KA_NOTIFY_ADMIN_EMAIL,
				'bcc' => (KA_BCC) ? KA_BCC_EMAIL : "",
				'subject' => 'Notification: Catering Order #' . $ordernum,
				'message' => $this->load->view('emails/orderplaced_admin_view', $emaildata, true),
			]);
		}
	}//sendPlacedOrderEmail()


   	function sendConfirmationEmail($orderid) {
   	
		$query = $this->db->get_where('jt_orders', array('id' => $orderid));
		if ($query->result()) {

			$order = $query->row_array();
			$ordernum = formatOrderNum($order);
			$pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix

			$emaildata['orderdata'] = $order;
			phpmailer_send_email([
				'from' => KA_ADMIN_EMAIL,
				'from_name' => KA_ADMIN_NAME,
				'to' => $order['email'],
				'cc' => ($order['email2']) ? $order['email2'] : "",
				'bcc' => (KA_BCC) ? KA_BCC_EMAIL : "",
				'attachment_filename' => $pdffilename . ".pdf",
				'attachment' => KA_PDF_DIRECTORY . $pdffilename . ".pdf",
				'subject' => 'Acknowledgement Required: Catering Order #' . $ordernum,
				'message' => $this->load->view('emails/orderconfirmed_customer_view', $emaildata, true),
			]);

		}
	}//sendConfirmationEmail()


   	function sendConfirmationSMS($orderid) {

		$query = $this->db->get_where('jt_orders', array('id' => $orderid));
		if ($query->result()) {

			$order = $query->row_array();
			$ordernum = formatOrderNum($order);

			$sms_text =
				"Sawasdee kha! This is Happy from Jai Thai / Jai Siam group. This is to confirm your online order #" . $ordernum . ". " .
				"I have sent you a confirmation email. Please help to check and click the link on top to acknowledge it.\n\n" .
				"Warmest regards,\nHappy\n92715706";

			$mobile_no = $order['mobile'];
			if (substr($mobile_no, 0, 2) != '65') {
				$mobile_no = "65" . $mobile_no;
			}
			$mobile_no2 = '';
			if ($order['mobile2']) {
				$mobile_no2 = $order['mobile2'];
				if (substr($mobile_no2, 0, 2) != '65') {
					$mobile_no2 = "65" . $mobile_no2;
				}
			}

			if (KA_TEST) {
				$mobile_no = '6596195806';
				$mobile_no2 = '';
			}

			$this->load->helper('sms');
			do_sms("Jai Thai", $mobile_no, $sms_text);

			if ($mobile_no2) {
				do_sms("Jai Thai", $mobile_no2, $sms_text);
			}
		}
	}//sendConfirmationSMS()


	function sendAcknowledgementEmail($orderid) {

		$query = $this->db->get_where('jt_orders', array('id' => $orderid));
		if ($query->result()) {

			$order = $query->row_array();
			$ordernum = formatOrderNum($order);
			$pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix

			$emaildata['orderdata'] = $order;
			phpmailer_send_email([
				'from' => KA_ADMIN_EMAIL,
				'from_name' => KA_ADMIN_NAME,
				'to' => $order['email'],
				'cc' => ($order['email2']) ? $order['email2'] : "",
				'bcc' => (KA_BCC) ? KA_BCC_EMAIL : "",
				'attachment_filename' => $pdffilename . ".pdf",
				'attachment' => KA_PDF_DIRECTORY . $pdffilename . ".pdf",
				'subject' => 'Order Confirmed: Catering Order #' . $ordernum,
				'message' => $this->load->view('emails/ackreceived_customer_view', $emaildata, true),
			]);

		}
	}//sendAcknowledgementEmail()


	function sendOrderPaidEmail($orderid) {

		$query = $this->db->get_where('jt_orders', array('id' => $orderid));
		if ($query->result()) {

			$order = $query->row_array();
			$ordernum = formatOrderNum($order);
			$pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix

			$emaildata['orderdata'] = $order;
			$emaildata['custom_pdf_title'] = "Receipt";

			phpmailer_send_email([
				'from' => KA_ADMIN_EMAIL,
				'from_name' => KA_ADMIN_NAME,
				'to' => $order['email'],
				'cc' => ($order['email2']) ? $order['email2'] : "",
				'bcc' => (KA_BCC) ? KA_BCC_EMAIL : "",
				'attachment_filename' => $pdffilename . "-receipt.pdf",
				'attachment' => KA_PDF_DIRECTORY . $pdffilename . "-receipt.pdf",
				'subject' => 'Payment Received: Catering Order #' . $ordernum,
				'message' => $this->load->view('emails/orderpaid_customer_view', $emaildata, true),
			]);
		}
	}


   	function sendThankCustomerEmail($orderid, $voucherid = 0) {
   	
   		$dataready = false;
   		
   		//check if want to send voucher
   		if ($voucherid == 0) {
			$query = $this->db->get_where('jt_orders', array('id' => $orderid));
	   		if ($query->result()) {
		   		$dataready = true;
	   		}
   		}
   		else {
			$query = $this->db->get_where('jt_orders', array('id' => $orderid));
			$query_voucher = $this->db->get_where('jt_vouchers', array('id' => $voucherid));
	   		if ($query->result() && $query_voucher->result()) {
	   			$dataready = true;
	   		}
   		}
   	
		if ($dataready) {

			$order = $query->row_array();
			$ordernum = formatOrderNum($order);
			$pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix
			$emaildata['orderdata'] = $order;

			//attach voucher data only if there is a voucher
			if ($voucherid) {
				$voucher = $query_voucher->row_array();
				$emaildata['voucherdata'] = $voucher;
			}
			else {
				$emaildata['voucherdata'] = array();
			}

			phpmailer_send_email([
				'from' => KA_ADMIN_EMAIL,
				'from_name' => KA_ADMIN_NAME,
				'to' => $order['email'],
				'cc' => ($order['email2']) ? $order['email2'] : "",
				'bcc' => (KA_BCC) ? KA_BCC_EMAIL : "",
				'attachment_filename' => $voucherid ? "voucher-" . $voucher['vouchernum'] . ".pdf": "",
				'attachment' => $voucherid ? KA_PDF_DIRECTORY . "voucher-" . $voucher['vouchernum'] . ".pdf" : "",
				'subject' => 'Thank you: Jai Thai Catering Order #' . $ordernum,
				'message' => $this->load->view('emails/thankcustomer_view', $emaildata, true),
			]);

		}
	}


	function generateOrderPdf($orderid) {
	    
		$query = $this->db->get_where('jt_orders', array('id' => $orderid));
		if ($query->result()) {
		
			$order = $query->row_array();
			$pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix
			
			$emaildata['orderdata'] = $order;

			//create the pdf and store it in a file
			$thepdfhtml = $this->load->view('emails/order_pdf_view', $emaildata, true);
			$thepdf = dompdf_createpdf($thepdfhtml, '', false);
			file_put_contents(KA_PDF_DIRECTORY . $pdffilename . ".pdf", $thepdf);

            //create the DO pdf and store it in a file
//            $thepdfhtml = $this->load->view('emails/delivery_order_pdf_view', $emaildata, true);
//            $thepdf = dompdf_createpdf($thepdfhtml, '', false);
//            file_put_contents(KA_PDF_DIRECTORY . $pdffilename . "-do.pdf", $thepdf);
            
			//create the pdf envelope
//			$thepdfhtml = $this->load->view('emails/orderenvelope_pdf_view', $emaildata, true);
//			$thepdf = dompdf_createpdf($thepdfhtml, '', false);
//			file_put_contents(KA_PDF_DIRECTORY . $pdffilename . "-env.pdf", $thepdf);
        }

    }

	function generateOrderReceiptPdf($orderid) {

		$query = $this->db->get_where('jt_orders', array('id' => $orderid));
		if ($query->result()) {

			$order = $query->row_array();
			$pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix

			$emaildata['orderdata'] = $order;
			$emaildata['custom_pdf_title'] = "Receipt";

			//create the pdf and store it in a file
			$thepdfhtml = $this->load->view('emails/order_pdf_view', $emaildata, true);
			$thepdf = dompdf_createpdf($thepdfhtml, '', false);
			file_put_contents(KA_PDF_DIRECTORY . $pdffilename . "-receipt.pdf", $thepdf);
		}
	}


	function generateCustomPDF($orderid, $pdftitle = 'Invoice') {

		$query = $this->db->get_where('jt_orders', array('id' => $orderid));
		if ($query->result()) {
			$order = $query->row_array();
			$emaildata['orderdata'] = $order;
			$emaildata['custom_pdf_title'] = $pdftitle;
			$thepdfhtml = $this->load->view('emails/order_pdf_view', $emaildata, true);
			$thepdf = dompdf_createpdf($thepdfhtml, '', false);
			return $thepdf;
		}

	}


	function sendCustomPDFEmail($orderid, $pdffile, $custom_pdf_title) {
		$query = $this->db->get_where('jt_orders', array('id' => $orderid));

		if ($query->result()) {

			$order = $query->row_array();
			$ordernum = formatOrderNum($order);
			$pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix
			file_put_contents (KA_PDF_DIRECTORY . "/custom/"  . $pdffilename . ".pdf", $pdffile);
			sleep(1);

			$emaildata['orderdata'] = $order;
			$emaildata['custompdftitle'] = $custom_pdf_title;

			//initialize the email
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf8';
			$this->load->library('email');

			//send email to to customer
			$sendto = $order['email'];
			if (KA_TEST) { $sendto = KA_TEST_EMAIL; }
			$the_message = $this->load->view('emails/custom_pdf_view', $emaildata, true);
			$this->email->initialize($config);
			$this->email->from(KA_ADMIN_EMAIL, KA_ADMIN_NAME);
			$this->email->to($sendto);
			if ($order['email2']) {
				$this->email->cc ( $order[ 'email2' ] );
			}
			if (KA_BCC) { $this->email->bcc(KA_BCC_EMAIL); }
			$this->email->subject($custom_pdf_title . ' for Catering Order #' . $ordernum);
			$this->email->attach(KA_PDF_DIRECTORY . "/custom/"  . $pdffilename . ".pdf");
			$this->email->message($the_message);
			$this->email->send();
			$this->email->clear(true);

		}
	}
    
}