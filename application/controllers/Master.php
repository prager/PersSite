<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("America/Los_Angeles");
	}
	
	public function index() {
		$this->load->view('templates/header_page');
		if($this->Login_model->is_logged()) {
			$data = NULL;
			$this->load->view('master/master_view', $data);
		}
		else {
			$data['msg'] = '<br>You have to be logged in to access this page. Please, login. Thank you<br><br>';
			$this->load->view('home/login_view', $data);
		}
		$this->load->view('templates/footer_page');
	}
	
	public function set_user() {
		$param['username'] = $this->input->post('username');
		$param['pass1'] = $this->input->post('pass1');
		$param['pass2'] = $this->input->post('pass2');
		$param['email'] = $this->input->post('email');
		$param['phone'] = $this->input->post('phone');
		
		$this->Master_model->set_user_login($param);
		
		$this->load->view('templates/header_page');
		$data['msg'] = '<br>User set! Thank you!<br>';
		$this->load->view('home/login_view', $data);
		$this->load->view('templates/footer_page');
	}
}
