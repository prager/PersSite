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
		$message = "Name: " . $param['name'] . "\n\n" . "Message:\n\n" . $param['msg'];
		
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
	
}