<?php
class Login_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function validate_user($param) {
		$retval = FALSE;
		
		return $retval;
	}
	
}