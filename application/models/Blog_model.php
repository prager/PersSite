<?php
class Blog_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function get_entries($cnt, $offset) {		
		$retarr = array();
		$this->db->select('*');
		$this->db->limit($cnt, $offset);
		$this->db->order_by('id_blog', 'DESC');
		$entries = $this->db->get('blog')->result();
		$i = 0;
		/*foreach($entries as $row) {
			$author = $this->User_model->get_user_by_id($row->id_user);
			$retarr[$i]['id_blog'] = $row->id_blog;
			$retarr[$i]['author'] = $author;
			$retarr[$i]['title'] = $row->title;
			$snip = $row->text;
			$retarr[$i]['text'] = $snip;
			$retarr[$i]['date'] = $this->date_lib->set_date($row->date)['short'];
			$i++;
		}*/
		
		//return $retarr;	
		return $entries;
	}
	
	public function get_post($id) {
		$retarr = array();
		$this->db->select('*');
		$this->db->where('id_blog', $id);
		$post = $this->db->get('blog')->row();
		$retarr['post'] = $post;
		
		$this->db->select('fname, lname');
		$this->db->where('id_users', $post->id_user);
		$retarr['fname'] = $this->db->get('users')->row()->fname;
		$retarr['lname'] = $this->db->get('users')->row()->lname;
		
		return $retarr;
	}
	
	public function get_partial_entries($cnt, $offset) {
		$retarr = array();
		
		$entries = $this->get_entries($cnt, $offset);
		$i = 0;
		foreach ($entries as $row) {
			$retarr[$i]['fname'] = $this->User_model->get_user_by_id($row->id_user)->fname;
			$retarr[$i]['lname'] = $this->User_model->get_user_by_id($row->id_user)->lname;
			$retarr[$i]['date'] = $this->date_lib->set_date($row->date)['long'];
			$retarr[$i]['title'] = $row->title;
			$retarr[$i]['id_blog'] = $row->id_blog;
			
			$retarr[$i]['published']= $row->published;
			
			$snip = $row->text;
			$snip = substr($snip, 0, 330);
			$snip = str_replace("\t", ' ', $snip);
			$snip = str_replace("\n", ' ', $snip);
			$snip = str_replace("\r", ' ', $snip);
			$snip = str_replace("<br>", ' ', $snip);
			$snip = str_replace("<br />", ' ', $snip);
			$snip = preg_replace('/\s+/', ' ', $snip);
				
			$retarr[$i]['snip'] = $snip;
			$i++;
		}
		
		return $retarr;
	}
	
	public function save_entry($param) {
		$param['date'] = time();
		
		if (session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
		}
		
		$param['id_user'] = $_SESSION['user']['id_user'];
		
		$this->db->insert('blog', $param);
	}
	
	public function delete_entry($id) {
		$this->db->where('id_blog', $id);
		$this->db->delete('blog');
	}
	
	public function search_blog($key) {
		$arr = array('title' => $key, 'text' => $key);
		$this->db->like($arr);
		return $this->db->get('blog')->result();
	}
	
	public function edit_entry($param, $id) {
		$param['updated'] = time();
		$this->db->where('id_blog', $id);
		$this->db->update('blog', $param);
	}
}