<?php
class Home_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Los_Angeles");
	}
	
	public function send_msg($param) {
		
		$recipient = 'jank@jlkconsulting.info';
		$message = "Name: " . $param['name'] . "\n\n" . "Email: " .  $param['email'] . "\n\n" . "Message:\n\n" . $param['msg'];
		
		//Send mail
		if(mail($recipient, 'From kulisek.org: ' . $param['subj'], $message)) {
			$msg = 'Your message has been sent. Thank you.';
		}
		else {
			$msg = 'There has been an error while sending your message. Please, try again. Thank you'; 
		}
		
		$this->db->insert('messages', $param);
		
		return $msg;
	}
	
	public function get_blog() {
		
		$retarr = array();
		
		if (session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
			session_regenerate_id(FALSE);
		}
		
		$this->db->select('fname, lname');
		$this->db->where('level', 99);
		$q = $this->db->get('users')->row();
		
		$retarr['user']['fname'] = $q->fname;
		$retarr['user']['lname'] = $q->lname;
		
		$entries = $this->Blog_model->get_partial_entries(10, 0);
		
		$retarr['exerpts'] = $entries['entries'];
		$retarr['pinned'] = $entries['pinned'];
		
		$retarr['subjects'] = $this->arr_lib->subjects();
		
		return $retarr;
	}
	
	public function get_bio() {
	    
	    $retarr = array();
	    
	    if (session_status() !== PHP_SESSION_ACTIVE) {
	        session_start();
	        session_regenerate_id(FALSE);
	    }
	    
	    $this->db->select('fname, lname');
	    $this->db->where('level', 99);
	    $q = $this->db->get('users')->row();
	    
	    $retarr['user']['fname'] = $q->fname;
	    $retarr['user']['lname'] = $q->lname;
	    
	    $entries = $this->Bio_model->get_partial_entries(10, 0);
	    
	    $retarr['exerpts'] = $entries['entries'];
	    $retarr['pinned'] = $entries['pinned'];
	    	    
	    return $retarr;
	}
	
	public function reg_user($param) {
		$retval = FALSE;
		
		if(($param['pass1'] == $param['pass2']) && ($param['email'] == $param['email2'])) {
			
			$q = $this->db->get_where('users', array('email'=>$param['email']));
			$q2 = $this->db->get_where('users', array('username'=>$param['username']));
			
			if(($q->num_rows() == 0) && ($q->num_rows() == 0)) {
				unset($param['email2']);
				unset($param['pass2']);
				$param['password'] = password_hash($param['pass1'], PASSWORD_BCRYPT, array('cost' => 12));
				unset($param['pass1']);
				$this->db->insert('users', $param);
				$retval = TRUE;
			}
		}
		
		return $retval;
	}
	
}