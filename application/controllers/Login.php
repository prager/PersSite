<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("America/Los_Angeles");
	}
	
	public function index() {
	    $this->load->view('templates/header_page');
	    
	    if(!$this->Login_model->is_logged()) {
	        $this->load->view('home/login_view', array('msg' => ''));
	    }
	    else {
	        $data = $this->Master_model->get_master_data();
	        $data['msg'] = '';
	        $this->load->view('master/master_view', $data);
	    }
	    
	    $this->load->view('templates/footer');
	}
	
	public function load() {
	    $param['pass'] = $this->input->post('pass');
	    $param['user'] = $this->input->post('username');
	    
	    if ($this->Login_model->validate_user($param)) {
	        $this->load->view('templates/header');
	        $data = $this->Master_model->get_master_data();
	        $this->load->view('master/master_view', $data);
	    }
	    else {
	        $this->load->view('templates/header_page');
	        $data['msg'] = '<br>Login Error! Please, enter valid Login ID and Password<br><br>';
	        $this->load->view('home/login_view', $data);
	    }
	    $this->load->view('templates/footer');
	}
}
