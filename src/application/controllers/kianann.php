<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kianann extends KA_Controller {

    public function index()
    {

    }

    public function go20260807()
    {
        $orders = [12782, 12781, 12780];//, 12779, 12777];
//        $orders = [12776, 12775, 12774, 12771, 12770, 12769, 12766, 12765, 12764, 12762, 12759, 12749, 12743, 12740, 12707, 12640];
        foreach ($orders as $order) {
            $this->order_model->generateOrderPdf($order);
            sleep (5);
        }
        echo "done";


   }
    function generateOrderPdf($orderid) {

        $query = $this->db->get_where('jt_orders', array('id' => $orderid));
        if ($query->result()) {
            $orders = $query->result_array();

            foreach ($orders as $order) {
                $pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix

                $emaildata['orderdata'] = $order;

                //create the food tag
                $thepdfhtml = $this->load->view('emails/foodtag_pdf_view', $emaildata, true);
                $thepdf = dompdf_createpdf300dpi($thepdfhtml, '', false);
                file_put_contents(KA_PDF_DIRECTORY . $pdffilename . "-foodtag.pdf", $thepdf);
            }
        }

    }
	public function quote() {
        $params = [
            "functiondate >=" => "2023-02-01",
//            "functiondate <=" => "2024-03-01"
        ];
        $karesponse = $this->order_model->getOrdersWhere($params);
        $orders = $karesponse->result;

        $i = 1;
        echo '<style>table {border-collapse: collapse} th,td {font-family: Arial; font-size: 14px;padding: 8px; border: 1px solid #666}</style>';
        echo "<table><tr>";
            echo "<th>No</th>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Function Date / Time</th>";
            echo "<th>Paid</th>";
            echo "<th>Function</th>";
            echo "<th>Order Total</th>";
            echo "<th>Details</th>";
//            echo "<td></td>";
        echo "</tr>";
        foreach ($orders as $order) {
            $items = unserialize($order['items']);

            $details = [];
            $menus = $items['items'];

            $morethan150 = false;

            if (isset($_GET['p'])) {
                if ($order ['ordertotalprice'] > intval($_GET['p'])) {
                    $morethan150 = true;
                }
            }

            foreach ($menus as $menu) {
                if ( ! isset ($menu['numpax']) ) {
                    $details[] = "????????";
                    continue;
                }
                if ($menu['numpax'] >= 150) {
                    $morethan150 = true;
                }
//                if ( $menu['numpax'] == 0 && $menu['foodprice'] >= 500) {
//                    $morethan150 = true;
//                }

                if ( $menu['numpax'] > 0 ) {
                    $details[] = $menu['title'] .  " (" . $menu['numpax'] . " Pax) ";
                }
                else {


                    $details[] = $menu['title'];
                }
            }
            $details = implode("<br/>", $details);

            if (!$morethan150) {
                continue;
            }

            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td><a href='https://www.jai-thai.com/jtadmin/vieworder/". $order['id'] ."' target='_blank'>". $order['ordernum'] ."</a></td>";
            echo "<td>". $order['name'] . "</br>" . $order['address'] ."</br>Singapore " . $order['postalcode'] ."</td>";
            echo "<td>". $order['functiondate'] ."</br>". $order['timestart'] ."</td>";
            echo "<td>". $order['a_paid'] ."</td>";
            echo "<td>". $order['typeoffunction'] ."</td>";
            echo "<td>". sprintf("$%0.2f", $order['ordertotalprice']) ."</td>";
            echo "<td>".$details."</td>";
//            echo "<td></td>";
//            echo "<td><pre>" . print_r($order, true) . "</pre></td>";
//            echo "<td><pre>" . print_r($items, true) . "</pre></td>";
            echo "</tr>";
        }
        echo "</table>";

	}
	//end index()

    public function testbrevo()
    {

    }

    public function testsms()
    {
        $this->load->helper('sms');
        do_sms("Jai Thai", "6596195806", "hello test");
    }

	public function do20190128 (  )
	{
		$recipients = array(
//			array('JT195559-CW', '81124968'),
//			array('JT195545-CW', '96541771'),
//			array('JT185429-EC', '96462948'),
//			array('JT195587-CW', '91509293'),
//			array('JT185474-CW', '97299593'),
//			array('JT185445-EC', '92725227'),
//			array('JT195523-CW', '97865780')
		);

		$message = "Sawasdee kha\n\n" .
		"A courtesy message from Jai Thai / Jai Siam Restaurant that your CNY catering order number { order_number } is in good hands.\n\n" .
		"* If you wish to add Jai Thai Mango Yusheng @ $38.80 for 10 pax, please let us know.\n\n" .
		"We wish you and your family a happy horse year. Have a prosperous year ahead. GONG XI FA CAI.\n\n" .
		"Warmest regards.\nAnne (81183202)";

		foreach ($recipients as $recipient) {
			$this->load->helper('sms');
			$tosend = str_replace ("{ order_number }", $recipient[0], $message);
			echo do_sms("Jai Thai", "65" . $recipient[1], $tosend) . " -- " . $recipient[0] . " -- " . $recipient[1] . "<br/><br/>";
		}
	}

    public function cny2026reminder()
    {
        $cny = new DateTime("2026-02-18");

        $params = array(
            'functiondate' => $cny->format('Y-m-d'),
            'a_cancelled' => '0000-00-00 00:00:00', //must not be a cancelled order
            'a_confirmationsent	!=' => '0000-00-00 00:00:00', //must be a confirmed order
        );
        $karesponse = $this->order_model->getOrdersWhere($params);


        if ($karesponse->success) {

            $this->load->helper('sms');
            $tomorrow_orders = $karesponse->result;

            foreach ($tomorrow_orders as $order) {

                $order_date = new DateTime($order['functiondate']);
                $order_date = $order_date->format('d-M-Y (D)');
                $order_time = $order['timestart'];
                $order_num = formatOrderNum($order);
                $pickup_location = $order['pickuplocation'];
                $mobile = "65" . str_replace(" ", "", $order['mobile']);
//				$mobile = "6596195806"; //test KA

                if ($order['deliverypickup'] == 'delivery') {
                    $text = "Sawasdee kha\n\n" .
                            "A courtesy message from Jai Thai / Jai Siam Restaurant that your CNY catering order is in good hands.\n\n"
                            . $order_num . " on " . $order_date . " will be ready to eat at " . $order_time . "."
                            . "\n\nThanks for your kind support! Gong Xi Fa Cai!"
                            . "\n\nWarmest regards,\nHappy (92715706)";
                } else {
                    $text = "Sawasdee kha\n\n" .
                            "A courtesy message from Jai Thai / Jai Siam Restaurant that your CNY catering order is in good hands.\n\n"
                            . $order_num . " on " . $order_date . " will be ready for pick up at " . $order_time . " at our " . $pickup_location . " outlet."
                            . "\n\nThanks for your kind support! Gong Xi Fa Cai!"
                            . "\n\nWarmest regards,\nHappy (92715706)";
                }
//				do_sms("Jai Thai", $mobile, $text);
//                usleep(100000);
                echo $text . "<br/>";

            }
        }
    }



	public function regenpdf() {

		if (!$this->uri->segment(3)) {
			echo "Error";
			return;
		}

		$query = $this->db->get_where('jt_orders', array('id' => $this->uri->segment(3)));
		if ($query->result()) {

			$orders = $query->result_array();

			foreach ($orders as $order) {

				$ordernum = formatOrderNum($order);
				$pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix

				$emaildata['orderdata'] = $order;

				//create the pdf and store it in a file
				$thepdfhtml = $this->load->view('emails/order_pdf_view', $emaildata, true);
				$thepdf = dompdf_createpdf($thepdfhtml, '', false);
				file_put_contents(KA_PDF_DIRECTORY . $pdffilename . ".pdf", $thepdf);

//				//create the pdf purchase order and store it in a file
//				$thepdfhtml = $this->load->view('emails/order_receipt_pdf_view', $emaildata, true);
//				$thepdf = dompdf_createpdf($thepdfhtml, '', false);
//				file_put_contents(KA_PDF_DIRECTORY . $pdffilename . "-receipt.pdf", $thepdf);

				//create the pdf envelope
				$thepdfhtml = $this->load->view('emails/orderenvelope_pdf_view', $emaildata, true);
				$thepdf = dompdf_createpdf($thepdfhtml, '', false);
				file_put_contents(KA_PDF_DIRECTORY . $pdffilename . "-env.pdf", $thepdf);

				echo $pdffilename . " PDFs done</br>" ;
			}

		}

	}//end regenpdf

	public function ordertohtml() {

		$query = $this->db->get_where('jt_orders', array('id' => 1034));
		if ($query->result()) {

			$orders = $query->result_array();

			foreach ($orders as $order) {

				$ordernum = formatOrderNum($order);
				$pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix

				$emaildata['orderdata'] = $order;

				//create the pdf purchase order and store it in a file
				$thepdfhtml = $this->load->view('emails/order_pdf_view', $emaildata, true);
				file_put_contents(KA_PDF_DIRECTORY . "aaa-" . $pdffilename . ".html", $thepdfhtml);


			}

		}

	}//end customPDF

	public function htmltopdf() {

		$query = $this->db->get_where('jt_orders', array('id' => 1034));
		if ($query->result()) {

			$orders = $query->result_array();

			foreach ($orders as $order) {

				$ordernum = formatOrderNum($order);
				$pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix

				$emaildata['orderdata'] = $order;

				//create the pdf purchase order and store it in a file
				//$thepdfhtml = $this->load->view('emails/order_pdf_view', $emaildata, true);
				//file_put_contents(KA_PDF_DIRECTORY . "AAA" . $pdffilename . "-receipt.html", $thepdfhtml);

				//read the html and convert to PDF
				$thepdfhtml = file_get_contents(KA_PDF_DIRECTORY . "aaa-" . $pdffilename . ".html");
				$thepdf = dompdf_createpdf($thepdfhtml, '', false);
				file_put_contents(KA_PDF_DIRECTORY . "aaa-" . $pdffilename . ".pdf", $thepdf);

			}

		}

	}//end customPDF

	public function sms_orders_today()
	{
		$today = new DateTime(date('Y-m-d'));
		//$today = new DateTime( date('2016-02-07') );
		$tomorrow = $today->add(new DateInterval('P3D'));
		$tomorrow = $tomorrow->format('Y-m-d');

		$params = array(
			'functiondate' => $tomorrow,
			'a_cancelled' => '0000-00-00 00:00:00', //must not be a cancelled order
			'a_confirmationsent	!=' => '0000-00-00 00:00:00', //must be a confirmed order
		);
		$karesponse = $this->order_model->getOrdersWhere($params);


		if ($karesponse->success) {

			$this->load->helper('sms');
			$tomorrow_orders = $karesponse->result;

			foreach ($tomorrow_orders as $order) {

				$order_date = new DateTime($order['functiondate']);
				$order_date = $order_date->format('d-M-Y (D)');
				$order_time = $order['timestart'];
				$order_num = formatOrderNum($order);
				$pickup_location = $order['pickuplocation'];
				$mobile = "65" . str_replace(" ", "", $order['mobile']);
				$mobile2 = "";
				if ($order['mobile2']) {
					$mobile2 = "65" . str_replace(" ", "", $order['mobile2']);
				}
//				$mobile = "6596195806"; //test KA

				$contact_person = "Anne (81183202)";
				if ($order['a_assignedoutlet'] == "PV") {
					$contact_person = "Chanold (90295803)";
				}
				if ($order['a_assignedoutlet'] == "CW") {
					$contact_person = "Cory (91885291)";
				}

				if ($order['deliverypickup'] == 'delivery') {
					$text = "Sawasdee kha\n\nA courtesy message from Jai Thai / Jai Siam Restaurant that your catering order number "
					        . $order_num . " on " . $order_date . " will be ready to eat at " . $order_time
					        . "\n\n Thanks for your kind support.\n Warmest regards.\n " . $contact_person;
				} else {
					$text = "Sawasdee kha\n\nA courtesy message from Jai Thai / Jai Siam Restaurant that your catering order number "
					        . $order_num . " on " . $order_date . " will be ready for pick up at " . $order_time . " at our " . $pickup_location . " outlet."
					        . "\n\n Thanks for your kind support.\n Warmest regards.\n " . $contact_person;
				}
//				do_sms("Jai Thai", $mobile, $text);
//				if ($mobile2) {
//					do_sms("Jai Thai", $mobile2, $text);
//				}
//				sleep(1);
				echo $text . "<br/>";

			}
		}
	}



}
//end Class