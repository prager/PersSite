<?php
class Blog_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function get_entries($cnt, $offset) {
		$this->db->select('*');
		$this->db->limit($cnt, $offset);
		$this->db->order_by('date', 'DESC');
		$entries = $this->db->get('blog')->result();
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
	
	public function get_posts() {
		$this->db->select('id_blog, date, title, published');
		$this->db->order_by('date', 'DESC');
		return $this->db->get('blog')->result();
	}
	
	public function get_partial_entries($cnt, $offset) {
		$entries = NULL;
		$pinned = NULL;
		
		$posts = $this->get_entries($cnt, $offset);
		$i = 0;
		$num_chars = 330;
		foreach ($posts as $row) {
			
			$snip = $row->text;
			
			$snip = strip_tags($snip);
			$snip = html_entity_decode($snip, ENT_QUOTES, 'UTF-8');
			$snip = mb_substr($snip, 0, $num_chars, 'UTF-8');			
			$snip .= '...';
			
			if($row->pinned == 0) {
				$entries[$i]['fname'] = $this->User_model->get_user_by_id($row->id_user)->fname;
				$entries[$i]['lname'] = $this->User_model->get_user_by_id($row->id_user)->lname;
				$entries[$i]['date'] = $this->date_lib->set_date($row->date)['long'];
				$entries[$i]['title'] = $row->title;
				$entries[$i]['id_blog'] = $row->id_blog;
				
				$entries[$i]['published']= $row->published;
				$entries[$i]['snip'] = $snip;
				$i++;
			}
			else {
				$pinned['fname'] = $this->User_model->get_user_by_id($row->id_user)->fname;
				$pinned['lname'] = $this->User_model->get_user_by_id($row->id_user)->lname;
				$pinned['date'] = $this->date_lib->set_date($row->date)['long'];
				$pinned['title'] = $row->title;
				$pinned['id_blog'] = $row->id_blog;
				
				$pinned['published']= $row->published;
				$pinned['snip'] = $snip;
			}
		}
		
		$retarr['entries'] = $entries;
		$retarr['pinned'] = $pinned;
		
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
	
	public function delete_post($id) {
		$this->db->where('id_blog', $id);
		$this->db->delete('blog');
	}
	
	public function publish($id, $status) {
		$this->db->where('id_blog', $id);
		if($status == 1) {
			$this->db->update('blog', array('published' => 1, 'date' => time()));
			$retval = 'Post Published';
		}
		else {
			$this->db->update('blog', array('published' => 0));
			$retval = 'Post De-published';
		}
		return $retval;
	}
}