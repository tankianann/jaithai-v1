<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_model extends KA_Model {
		
    function  __construct()  {
        parent::__construct();
    }
    //end __construct
    
    function logFeedback($feedback) {

	    $this->db->insert('jt_feedback', $feedback);
	    
		if ($this->db->affected_rows() > 0) {
			return new KAResponse(true, $this->db->insert_id());
		}
		else {
			return new KAResponse(false, "Cannot log feedback");
		}
    }//end logFeedback


    function getFeedbacksWhere($where, $orderby = "") {

		$query = $this->db->select('jt_feedback.*, jt_orders.ordernum, jt_orders.ordertime, jt_orders.a_assignedoutlet');
		$query = $this->db->from('jt_feedback');
		$query = $this->db->join('jt_orders', 'jt_orders.id = jt_feedback.orderid');

    	if ($where) {
		    $query = $this->db->where($where);
		}
	    if ($orderby) {
		    $query = $this->db->order_by($orderby);		    
	    }
	    else {
		    $query = $this->db->order_by('id DESC');		    
	    }
	    $query = $this->db->get();
	    
		if ($query->num_rows()) {
			return new KAResponse(true, $query->result_array());
		}
		else {
			return new KAResponse(false, array()); 
		}
	    
    }//end getFeedbacksWhere

	public function sendThankYouNote($orderid)
	{
		$query = $this->db->get_where('jt_orders', array('id' => $orderid));

		$order = $query->row_array();
		$ordernum = formatOrderNum($order);
		$emaildata['orderdata'] = $order;

		//initialize the email
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf8';
		$this->load->library('email');

		//send email to to customer
		$sendto = $order['email'];
		if (KA_TEST) { $sendto = KA_TEST_EMAIL; }
		$the_message = $this->load->view('emails/thankcustomerforfeedback_view', $emaildata, true);
		$this->email->initialize($config);
		$this->email->from(KA_ADMIN_EMAIL, KA_ADMIN_NAME);
		$this->email->to($sendto);
		if (KA_BCC) { $this->email->bcc(KA_BCC_EMAIL); }
		$this->email->subject('Thank you for your feedback: Jai Thai Catering Order #' . $ordernum);
		$this->email->message($the_message);
		$this->email->send();
		$this->email->clear(true);
		
	}
    
} //end class