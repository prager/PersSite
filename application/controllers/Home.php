<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("America/Los_Angeles");
		//redirect('https://kulisek.org');
	}
	
	public function index() {
		$data = NULL;
		$this->load->view('templates/header');
		$this->load->view('home/home_view', $data);
		$this->load->view('templates/footer');
	}
	
	public function about() {
		
		$data = NULL;
		//$this->load->view('templates/header');
		$this->load->view('about/about_view', $data);
		$this->load->view('templates/footer');
	}
	
	public function work() {
		$data = NULL;
		$this->load->view('templates/header');
		$this->load->view('work/work_view', $data);
		$this->load->view('templates/footer');
	}
	
	public function login() {
		
		$data['msg'] = '<br>Login Error! Please, enter valid Login ID and Password<br><br>';
		$this->load->view('templates/header_page');
		$this->load->view('home/login_view', $data);
		$this->load->view('templates/footer_page');
	}
	
	public function msg() {
		$param['name'] = $this->input->post('name');
		$param['subj'] = $this->input->post('subj');
		$param['web'] = $this->input->post('web');
		$param['email'] = $this->input->post('email');
		$param['msg'] = $this->input->post('msg');
		
		$this->load->view('templates/header_page');
		
		$msg = $this->Home_model->send_msg($param);
		
		$data['msg'] = '<p style="color: red">' . $msg . '</p>';
		
		$this->load->view('home/status_view', $data);
		$this->load->view('templates/footer_page');
	}
}