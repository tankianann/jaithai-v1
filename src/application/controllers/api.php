<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends KA_Controller {

	public function index() {
		echo "";
	}

	public function orders() {
		
		$command = $this->uri->segment(3);
		
		if ("add" == $command) { 
			echo $this->orders_add();
		}
		elseif ("get" == $command) { 
			echo $this->orders_get();
		}
		else {
			echo "";
		}
	}
	//end orders()	
	
	
	/* PRIVATE FUNCTIONS */
	
	private function orders_add() {
		
		// orders/add {json}

		$payload = file_get_contents("php://input");

		$payload = json_decode($payload, true);
				
		$karesponse = $this->order_model->addOrder($payload['orderdata'], $payload['cart']);
		if ($karesponse->success) {
			
			//order created and added
			$orderid = $karesponse->result;
			
			//once the order is created, send the email out
			$this->order_model->sendPlacedOrderEmail($orderid);
			
			return $orderid;
			
		}
		else {

			return '0';
			
		}//karesponse->success

	}
	
	private function orders_get() {

		// orders/get/:orderid
		
		$orderid = $this->uri->segment(4);
		$karesponse = $this->order_model->getOrder($orderid);
		
		if ($karesponse->success) {
			
			$result = $karesponse->result;
			return json_encode($result);
			
		}
	}
	
	
	
}
//end Class