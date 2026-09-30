<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KA_Controller extends CI_Controller {

    function  __construct()  {
    
        parent::__construct();
    }
    //end __construct

	function successMessage($msg) {
	
		$this->session->set_userdata('statusmessage', array('type' => 'successMessage', 'text' => $msg));
	
	}
	//end successMessage
	
	function errorMessage($msg) {
	
		$this->session->set_userdata('statusmessage', array('type' => 'errorMessage', 'text' => $msg));
	
	}
	//end errorMessage
	
    function formSubmitted() {
    
        return ($this->input->get(KA_FORM_SUBMITTED) == '1' || $this->input->post(KA_FORM_SUBMITTED) == '1');
    
    }
    //end formSubmitted
    
    
    
    
	/* Functions to manage the logged in user */
	
    function setLoggedInUser($loggedInUser) {
    	
    	$cookie = array();
    	$cookie['name'] = 'jtloginuser';
    	$cookie['value'] = serialize($loggedInUser);
    	$cookie['expire'] = 14 * 24 * 60 * 60; //auto login for 14 days
    	$cookie['path'] = "/";
    	
    	$this->input->set_cookie($cookie);
    	
    }

    function clearLoggedInUser() {
    	$cookie = array();
    	$cookie['name'] = 'jtloginuser';
    	$cookie['value'] = "";
    	$cookie['expire'] = 24 * 60 * 60 * -1;
    	$cookie['path'] = "/";

    	$this->input->set_cookie($cookie);
    
    }

    function getLoggedInUser() {
    
    	return unserialize($this->input->cookie('jtloginuser'));
    }
    
    
    function canAutoLogin() {
	    
	    $loggedInUser = $this->getLoggedInUser();
	    if ($loggedInUser) {
		    $karesponse = $this->users_model->verifyLogin($loggedInUser);
		    return $karesponse->success;
	    }
	    else {
		    return false;
	    }
    }

    function limitAccess($permissionstring) {
    	
    	$hasAccess = false;
    	$loggedInUser = $this->getLoggedInUser();
    	
    	//first, recheck to make sure that the user still authenticates with the database
    	$karesponse = $this->users_model->verifyLogin($loggedInUser);
    	if ($karesponse->success) {
	    	
	    	//permissions string = 3 digit string (admin, staff, public)
	       	$admincanaccess = substr($permissionstring, 0, 1);
	    	$staffcanaccess = substr($permissionstring, 1, 1);
	    	$publiccanaccess = substr($permissionstring, 2, 1);
	    	
	    	if (($loggedInUser['type'] == "staff") && $staffcanaccess) {
	    		$hasAccess = true;
	    	}
	    	if (($loggedInUser['type'] == "admin") && $admincanaccess) {
	    		$hasAccess = true;
	    	}
    	}
    	
    	if (!$hasAccess) {
    		redirect('jtadmin/logout/unauthorized');
    	}
    	else {
    		return true;
    	}

    }	
        
}
//end Class
