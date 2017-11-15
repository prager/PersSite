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
			$retval = TRUE;
		}
		
		return $retval;
	}
	
	public function validate_user($param) {
		$retval = FALSE;		
		if(!$this->is_logged()) {
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
					$date = time();	
					
					$_SESSION['logged'] = TRUE;
					$_SESSION['date'] = $date;
					
					$this->db->select_max('id_sessions');
					$max = $this->db->get('sessions')->row()->id_sessions;
					$this->db->where('id_sessions', $max);
					$this->db->update('sessions', array('logged' => 1, 'date' => $date));
				}
			}	
		}
		else {
			$retval = TRUE;
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
	
	public function logout() {
		if (session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
		}
		
		$this->db->where('date', $_SESSION['date']);
		$this->db->update('sessions', array('logged' => 0));
		
		if(isset($_SESSION['logged'])) {
			unset($_SESSION['logged']);
			unset($_SESSION['date']);
		}
		
		session_regenerate_id(FALSE);
		session_destroy();
	}
	
}