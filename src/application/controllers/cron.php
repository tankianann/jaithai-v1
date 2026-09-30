<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends KA_Controller
{

	public function index()
	{

		header('location: ' . site_url());

	}

	//end index()

	public function sms_orders_today()
	{
		$today = new DateTime(date('Y-m-d'));
		//$today = new DateTime( date('2016-02-07') );
		$tomorrow = $today->add(new DateInterval('P2D'));
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
				do_sms("Jai Thai", $mobile, $text);
				if ($mobile2) {
					do_sms("Jai Thai", $mobile2, $text);
				}
				sleep(1);
				echo $text . "<br/>";

			}
		}
	}

}
//end Class