<?php
class Login_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function is_logged() {
		$retval = FALSE;
		
		if (session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
		}
		
		if(isset($_SESSION['logged'])) {
			$retval = $_SESSION['logged'];
		}
		
		return $retval;
	}
	
	public function validate_user($param) {
		$retval = FALSE;		
		
		$this->db->select('username');
		$this->db->where('username', $param['user']);
		//echo '<br><br>user: ' . $param['user'];
		if(count($this->db->get('users')->row()) == 1) {
			$this->db->select('password');
			$this->db->where('username', $param['user']);
			$pass = $this->db->get('users')->row()->password;
			if(password_verify($param['pass'], $pass)) {
				$retval = TRUE;
				
				if (session_status() !== PHP_SESSION_ACTIVE) {
					session_start();
					session_regenerate_id(FALSE);
				}
				
				$_SESSION['logged'] = TRUE;
				
				$this->db->select_max('id_sessions');
				$max = $this->db->get('sessions')->row()->id_sessions;
				$this->db->where('id_sessions', $max);
				$this->db->update('sessions', array('logged' => 1, 'date' => time()));
			}
		}	
		
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