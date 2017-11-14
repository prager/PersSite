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
	
	public function check_login() {
		$retval = TRUE;
		
		$this->db->select_max('id_sessions');
		$max = $this->db->get('sessions')->row()->id_sessions;
		
		$this->db->select('logged');
		$this->db->where('id_sessions', $max);
		
		if($this->db->get('sessions')->row()->logged == 1) {
			$retval = TRUE;
		}
		
		return $retval;
	}
	
}