<?php
class Blog_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function get_entries($param) {		
		$retarr = array();
		$this->db->select('*');
		$this->db->limit($param['rec_cnt'], $param['rec_offset']);
		$entries = $this->db->get('blog')->result();
		$i = 0;
		//echo '<br><br>';
		foreach($entries as $row) {
			$author = $this->User_model->get_user_by_id($row->id_user);
			$retarr[$i]['id_blog'] = $row->id_blog;
			$retarr[$i]['author'] = $author;
			$retarr[$i]['headline'] = $row->headline;
			$snip = $row->entry;
			//$snip = str_replace("<br>", "&#10;", $snip);
			//$snip = str_replace("<br />", '\n', $snip);
			$retarr[$i]['entry'] = $snip;
			$retarr[$i]['date'] = $this->date_lib->set_date($row->date)['short'];
			$i++;
		}
		
		return $retarr;	
	}
	
	public function get_entry($id) {
		$retarr = array();
		$this->db->select('*');
		$this->db->where('id_blog', $id);
		$entry = $this->db->get('blog')->row();
		$retarr['id_blog'] = $entry->id_blog;
		$retarr['headline'] = $entry->headline;
		$snip = $entry->entry;
		//$snip = str_replace("<br>", '', $snip);
		//$snip = str_replace("<br />", '', $snip);
		//preg_replace("/\n/", "", $snip);
		$retarr['entry'] = $snip;
		$retarr['op'] = '3/' . $entry->id_blog;
		return $retarr;
	}
	
	public function get_partial_entries($param) {
		$retarr = array();
		
		$entries = $this->get_entries($param['rec_cnt'], $param['rec_offset']);
		
		foreach ($entries as $row) {
			$retarr['user'] = $this->User_model->get_user_by_id($row->id_user);
			$retarr['date'] = $this->date_lib->set_date($row->date)['short'];
			$retarr['title'] = $row->title;
			
			$updated = $row->updated;
			
			if($updated > 0) {
				$retarr['updated'] = $this->date_lib->set_date($row->updated)['short'];
			}
			else {
				$retarr['updated'] = NULL;
			}
			
			$retarr['updated'] = $row->updated;
			$snip = $row->entry;
			$snip = substr($snip, 0, 330);
			$snip = str_replace("\t", ' ', $snip);
			$snip = str_replace("\n", ' ', $snip);
			$snip = str_replace("\r", ' ', $snip);
			$snip = str_replace("<br>", ' ', $snip);
			$snip = str_replace("<br />", ' ', $snip);
			$snip = preg_replace('/\s+/', ' ', $snip);
				
			$retarr['snip'] = $snip;
		}
		
		return $retarr;
	}
	
	public function save_entry($data, $id) {
		$data['entry'] = str_replace("\n", '<br>', $data['entry']);
		$data['date'] = time();
		if($id == 0) {
			$this->db->insert('blog', $data);
		}
		else {
			$this->db->where('id_blog', $id);
			$this->db->update('blog', $data);
		}
	}
	
	public function delete_entry($id) {
		$this->db->where('id_blog', $id);
		$this->db->delete('blog');
	}
}