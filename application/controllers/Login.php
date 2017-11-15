<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("America/Los_Angeles");
	}
	
	public function index() {
		$param['pass'] = $this->input->post('pass');
		$param['user'] = $this->input->post('username');
		$this->load->view('templates/header');
		if ($this->Login_model->validate_user($param)) {
			$data = NULL;
			$this->load->view('master/master_view', $data);
		}
		else {
			$data['msg'] = '<br>Login Error! Please, enter valid Login ID and Password<br><br>';
			$this->load->view('home/login_view', $data);
		}
		$this->load->view('templates/footer');
	}
}
