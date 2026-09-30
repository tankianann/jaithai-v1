<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voucher_model extends KA_Model {
		
    function  __construct()  {
        parent::__construct();
    }
    //end __construct
    
    function createVoucherForOrder($order) {

		$curdate = new DateTime();
		$curdate = $curdate->format('Y-m-d h:i:s');
    	
		$expdate = new DateTime();
		$expdate->add(new DateInterval("P1M"));
    	$expdate = $expdate->format('Y-m-d h:i:s');
		
		$voucher = array();
		$voucher['vouchernum'] = formatOrderNum($order, false);
		$voucher['name'] = $order['name'];
		$voucher['email'] = $order['email'];
		$voucher['dateissue'] = $curdate;
		$voucher['dateexpire'] = $expdate;
		$voucher['dateused'] = '0000-00-00 00:00:00';
		$voucher['orderid'] = $order['id'];
		$voucher['amount'] = floatval(KA_VOUCHER_AMOUNT);
		$voucher['type'] = 'percent';

	    $this->db->insert('jt_vouchers', $voucher);
	    
		if ($this->db->affected_rows() > 0) {
			return new KAResponse(true, $this->db->insert_id());
		}
		else {
			return new KAResponse(false, "Cannot add voucher");
		}

    }//end createVoucherForOrder


    function generateVoucherPdf($voucherid) {
	    
		$query = $this->db->get_where('jt_vouchers', array('id' => $voucherid));
		if ($query->result()) {
		
			$voucher = $query->row_array();
			
			$displaydata['voucherdata'] = $voucher;

			//create the pdf and store it in a file
			$thepdfhtml = $this->load->view('emails/voucher_pdf_view', $displaydata, true);
			$thepdf = dompdf_createpdf($thepdfhtml, '', false);
			file_put_contents(KA_PDF_DIRECTORY . "voucher-" . $voucher['vouchernum'] . ".pdf", $thepdf);
		}

    }//generateOrderPdf()

    
    function getVoucher($voucherid) {
    
		$query = $this->db->where(array('id' => $voucherid));
		$query = $this->db->get('jt_vouchers');
		    
		if ($query->num_rows()) {
			return new KAResponse(true, $query->row_array());
		}
		else {
			return new KAResponse(false, array()); 
		}
	    
    }//end getVoucher    
    

    function getVouchersWhere($where, $orderby = "") {
    
    	if ($where) {
		    $query = $this->db->where($where);
		}
	    if ($orderby) {
		    $query = $this->db->order_by($orderby);		    
	    }
	    else {
		    $query = $this->db->order_by('id DESC');		    
	    }
	    $query = $this->db->get('jt_vouchers');
	    
		if ($query->num_rows()) {
			return new KAResponse(true, $query->result_array());
		}
		else {
			return new KAResponse(false, array()); 
		}
	    
    }//end getVouchersWhere
    
 
    function updateVouchersWhere($order, $where) {
    
	    $query = $this->db->where($where);
	    $query = $this->db->update('jt_vouchers', $order);
	    
		if ($this->db->affected_rows() > 0) {
			return new KAResponse(true, $this->db->affected_rows());
		}
		else {
			return new KAResponse(false, "Cannot update vouchers");
		}
	    
    }//end updateVouchersWhere
 
     
    
    /* PRIVATE FUNCTIONS */
    
    private function getNewVoucherNumber() {
	    
		$unique = false;
		$vouchernum = "";
		
		while (!$unique) {
	    	$vouchernum = date('Y') . "-" . strtoupper(substr(md5(rand(10000,99999)), 0, 6));

		    $where = array('vouchernum' => $vouchernum);
		    
		    $query = $this->db->where($where);
		    $query = $this->db->get('jt_vouchers');
		    
			if (!$query->num_rows()) {
				$unique = true;
			}

		}
	    
	    return $vouchernum; 
	    
    }



    
} //end class