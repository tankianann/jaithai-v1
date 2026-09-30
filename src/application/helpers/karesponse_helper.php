<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Helper class to allow model to pass back a response with a result */

class KAResponse {

	public $success;
	public $result;
	
	function __construct($success, $result) {
		$this->success = $success;
		$this->result = $result;
	}
	
}