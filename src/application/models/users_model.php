<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends KA_Model {

    function  __construct()  {
        parent::__construct();
    }
    //end __construct
    
    function dologin($username, $password, $type = "", $scope = "") {
	    
	    $query = $this->db->where('uname', $username);
	    $query = $this->db->get('jt_users');

		$loggedinuser = false;
		$canaccess = true;
		
		if ($query->num_rows()) {
			$thisrow = $query->row_array();

			if ($this->hashPassword($password) != $thisrow['pwd']) {
				$canaccess = false;
			}

			if ($type != '') {
				if ($type != $thisrow['type']) {
					$canaccess = false;
				}
			}
			
			if ($scope != '') {
				if ($scope != $thisrow['scope']) {
					$canaccess = false;
				}
			}
			
			if ($canaccess) {
				
				$loggedinuser['uname'] = $thisrow['uname'];
				$loggedinuser['pwd'] = $thisrow['pwd'];
				$loggedinuser['type'] = $thisrow['type'];
				$loggedinuser['scope'] = $thisrow['scope'];
				$loggedinuser['hash'] = $this->hashPassword(print_r($loggedinuser, true));
				
			}
			
		}
		else {
			$canaccess = false;
		}
		

		if ($canaccess) {
			return new karesponse(true, $loggedinuser);
		}
		else {
			return new karesponse(false, false);
		}

    }//end dologin
    
    
    function verifylogin($loggedinuser) {
	    
	    $canaccess = true;
	    
	    //first, make sure that the cookie has not been tampered with (verify details with hash)
		$theuser['uname'] = $loggedinuser['uname'];
		$theuser['pwd'] = $loggedinuser['pwd'];
		$theuser['type'] = $loggedinuser['type'];
		$theuser['scope'] = $loggedinuser['scope'];
	    $hash = $this->hashPassword(print_r($theuser, true));
	    
	    if ($loggedinuser['hash'] != $hash) {
		    $canaccess = false;
	    }
	    else {
		    
		    //verified that it has not been tampered
		    //now check with database
		    
		    $query = $this->db->where('uname', $loggedinuser['uname']);
		    $query = $this->db->get('jt_users');
		    
		    if ($query->num_rows()) {
		    
		    	$thisrow = $query->row_array();
				if ($loggedinuser['pwd'] != $thisrow['pwd']) {
					$canaccess = false;
				}
		    }
		    else {
			    $canaccess = false;
		    }
		    
	    }
	    
		if ($canaccess) {
			return new karesponse(true, true);
		}
		else {
			return new karesponse(false, false);
		}

    }
    
    
    private function hashPassword($pwd) {
	    
	    $algo = "sha1";
	    $salt = "jaithaigood";
	    return hash($algo, $pwd . $salt);
	    
    }
    

} //end class