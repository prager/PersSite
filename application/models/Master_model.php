<?php
class Master_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_messages($param) {
		$this->db->select('*');
		$this->db->order_by('id_messages', 'DESC');
		return $this->db->get('messages')->result();
	}
	
	public function get_users() {
		$retarr = array();
		$userarr = array();
		$this->db->select('description, type_code');
		$this->db->order_by('type_code', 'ASC');
		$j = 0;
		$usr_types = $this->db->get('user_types')->result();
		$typarr = array();
		$codearr = array();
		foreach($usr_types as $row) {
			$typarr[$j] = $row->description;
			$codearr[$j] = $row->type_code;
			$j++;
		}
		$retarr['usr_types'] = $typarr;
		$this->db->select('*');
		$users = $this->db->get('user_tbl')->result();
		$i = 0;
		//echo '<br><br><br>';
		foreach ($users as $row) {
			
			$userarr[$i]['id_user'] = $row->id_user;
			$userarr[$i]['user_name'] = $row->user_name;
			$userarr[$i]['fname'] = $row->fname;
			$userarr[$i]['lname'] = $row->lname;
			$userarr[$i]['email'] = $row->email;
			$userarr[$i]['phone'] = $row->phone;
			$userarr[$i]['street'] = $row->street;
			$userarr[$i]['city'] = $row->city;
			$userarr[$i]['state'] = $row->state_cd;
			$userarr[$i]['zip'] = $row->zip_cd;
			$userarr[$i]['authorized'] = $row->authorized;
			
			$this->db->select('id_team, bday, team_role, last4');
			$this->db->where('id_user', $row->id_user);
			$team_data = $this->db->get('team_roster')->row();
			
			for($k=0; $k<count($codearr); $k++) {
				if($row->type_code == $codearr[$k]) {
					$userarr[$i]['usr_type'] = $k;
					break;
				}
			}
			$userarr[$i]['team_ind'] = 0;
			
//figure out if user belongs to a team; if yes, get the league too			
			if(count($team_data) != 0) {
				$id_team = $team_data->id_team;
				$userarr[$i]['role'] = $team_data->team_role;
				$userarr[$i]['last4'] = $team_data->last4;
				$userarr[$i]['bday'] = $this->date_lib->set_date($team_data->bday)['short'];
				$userarr[$i]['id_team'] = $id_team;
				
				$this->db->select('team_name, id_league');
				$this->db->where('id_team', $userarr[$i]['id_team']);
				$team_info = $this->db->get('team_tbl')->row();
				$userarr[$i]['team_name'] = $team_info->team_name;
				$userarr[$i]['id_league'] = $team_info->id_league;
				
				$this->db->select('name');
				$this->db->where('id_league', $userarr[$i]['id_league']);
				$userarr[$i]['league_name'] = $this->db->get('leagues')->row()->name;
				
				$this->db->select('team_name');
				$this->db->where('id_league', $userarr[$i]['id_league']);
				$teams = $this->db->get('team_tbl')->result();
				if(count($teams) > 0) {
					$userarr[$i]['teams'] = array();
					foreach ($teams as $team) {
						array_push($userarr[$i]['teams'], $team);
					}
				}				
				
				$team_data = $this->Team_model->get_all_teams_arr()['data'];
				for($l=1;$l<count($team_data);$l++) {
					if($team_data[$l]['id_team'] == $id_team) {
						$userarr[$i]['team_ind'] = $l;
						break;
					}
				}
				
			}
			else {
				$userarr[$i]['id_team'] = 0;
				$userarr[$i]['team_name'] = 'n/a';
				$userarr[$i]['id_division'] = 0;
				$userarr[$i]['division_name'] = 'n/a';
				$userarr[$i]['league_name'] = 'n/a';
				$userarr[$i]['bday'] = '';
				$userarr[$i]['role'] = 0;
				$userarr[$i]['last4'] = '';
			}
			
			$i++;			
		}
		$retarr['users'] = $userarr;
		
		return $retarr;
	}
	
	public function update_user($param) {
		
		//$this->set_user($id_user);
	}
	
	private function set_user($id) {
		$this->db->select('*');
		$this->db->where('id_user', $id);
		$user = $this->db->get('user_tbl')->row();
		
		//$this->session->unset_userdata('user');
		unset($_SESSION['user']);
		
		$_SESSION['user']['level'] = $user->type_code;
		$_SESSION['user']['fname'] = $user->fname;
		$_SESSION['user']['lname'] = $user->lname;
		$_SESSION['user']['authorized'] = $user->authorized;
		$_SESSION['user']['username'] = $user->user_name;
		
		$this->db->select('*');
		$this->db->where('id_user', $id);
		$row = $this->db->get('team_roster')->row();
		
		if(count($row) == 0) {
			$_SESSION['user']['id_roster']= 0;
			$_SESSION['user']['id_team']= 0;
			$_SESSION['user']['team'] = '';
		}
		else {
			$_SESSION['user']['id_roster']= $row->id_roster;
			$_SESSION['user']['id_team'] = $row->id_team;
//get team name
			$this->db->select('*');
			$this->db->where('id_team', $row->id_team);
			$_SESSION['user']['team'] = $this->db->get('team_tbl')->row()->team_name;
		}
		
//get user attributes from logins table
		$this->db->select('description');
		$this->db->where('type_code', $_SESSION['user']['level']);
		$_SESSION['user']['description'] = $this->db->get('user_types')->row()->description;
	}
	
	public function set_user_login($param) {
		$retval = TRUE;		
		
		if($param['pass1'] == $param['pass2']) {
			$setarr['password'] = password_hash($param['pass1'], PASSWORD_BCRYPT, array('cost' => 12));
			$setarr['username'] = $param['username'];
			$setarr['email'] = $param['email'];
			if($param['phone'] != '') {
				$setarr['phone'] = $param['phone'];
			}
			else {
				$setarr['phone'] = '000-000-0000';
			}
			
			$this->db->insert('users', $setarr);
			
			if (session_status() !== PHP_SESSION_ACTIVE) {
				session_start();
				session_regenerate_id(FALSE);
			}
		}
		else {
			$retval = FALSE;
		}
		
		return $retval;
	}		
	
	public function add_user($param) {
		$retval = TRUE;
		
		if($param['pass1'] == $param['pass2']) {
			$param['password'] = password_hash($param['pass1'], PASSWORD_BCRYPT, array('cost' => 12));
			unset($param['pass1']);
			unset($param['pass2']);
			$this->db->insert('users', $param);
		}
		else {
			$retval = FALSE;
		}
		return $retval;
	}
	
	public function delete_user($id) {
		$this->db->where('id_user', $id);
		$this->db->delete('user_tbl');
	}
	
	public function get_master_data() {
		$retarr = array();
		
		if (session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
			session_regenerate_id(FALSE);
		}
		
		$retarr['user'] = $_SESSION['user'];
		
		$posts = $this->Blog_model->get_partial_entries(10, 0);
		
		$retarr['exerpts'] = $posts['entries'];
		
		$retarr['pinned'] = $posts['pinned'];
		
		$retarr['subjects'] = $this->arr_lib->subjects();
		
		return $retarr;
	}
}