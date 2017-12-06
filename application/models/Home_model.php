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
	
}