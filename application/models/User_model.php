<?php
class User_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Los_Angeles");
	}
	
	public function get_user_by_id($id) {
		$this->db->select('*');
		$this->db->where('id_users', $id);
		return $this->db->get('users')->row();
	}
	
}