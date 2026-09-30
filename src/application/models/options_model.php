<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Options_model extends KA_Model {

    function  __construct()  {
        parent::__construct();
    }
    //end __construct
        
    function nextordernum($increment = true) {
	    
	    $nextordernum = 0; 
	    $query = $this->db->where('key', 'jtnextordernum');
	    $query = $this->db->get('jt_options');
		if ($query->num_rows()) {
			$thisrow = $query->row_array();
			$nextordernum = $thisrow['value'];
		}
		
		if ($increment) {
			if ($nextordernum == 9999) {
				$nextordernum = 0;
			}
			$option = array('value' => $nextordernum + 1);
			$where = array('key' => 'jtnextordernum');
			$this->db->update('jt_options', $option, $where);
		}
		
		if ($nextordernum) {
			return new karesponse(true, $nextordernum);			
		}
		else {
			return new karesponse(false, false);
		}	    
    }//end nextordernum
    

	function getOption($key) {

		$value = "";
		
	    $query = $this->db->where('key', $key);
	    $query = $this->db->get('jt_options');
		if ($query->num_rows()) {
			$thisrow = $query->row_array();
			$value = $thisrow['value'];
		}
		
		return $value;
	}
	//end getoption
    
	function updateOption($key, $value) {

	    $query = $this->db->where('key', $key);
	    $query = $this->db->get('jt_options');
	    
		if ($query->num_rows()) {
			
			//key is found, get the id and update
			$thisrow = $query->row_array();
			$id = $thisrow['id'];
			
			$toupdate = array(
				'key' => $key,
				'value' => $value,
			);
			$query = $this->db->where('id', $id);
		    $query = $this->db->update('jt_orders', $toupdate);

			if ($this->db->affected_rows() > 0) {
				return new KAResponse(true, $id);
			}
			else {
				return new KAResponse(false, "Cannot update option");
			}

			
		}
		else {
			
			//key not found, insert
			$toinsert = array(
				'key' => $key,
				'value' => $value,
			);
			$query = $this->db->insert('jt_options', $toinsert);
			if ($this->db->affected_rows() > 0) {
				return new KAResponse(true, $this->db->insert_id());
			}
			else {
				return new KAResponse(false, "Cannot insert option");
			}
			
		}
		
	}
	//end getoption
    

} //end class