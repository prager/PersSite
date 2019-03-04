<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("America/Los_Angeles");
		//redirect('https://kulisek.org');
	}
	
	public function index() {
		$this->load->view('templates/header');
		if($this->Login_model->is_logged()) {
			$data = $this->Master_model->get_master_data();
			$this->load->view('master/master_view', $data);
		}
		else {
			$data = $this->Home_model->get_blog();
			$this->load->view('templates/header');
			$this->load->view('home/home_view', $data);
		}
		$this->load->view('templates/footer');
	}
	
	public function about() {
		
		$data = NULL;
		$this->load->view('templates/header');
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
	
	public function register() {
		$this->load->view('templates/header_page');
		$this->load->view('home/register_view');
		$this->load->view('templates/footer_page');
	}
	
	public function resume() {
	    $this->load->view('templates/header_page');
	    $this->load->view('home/resume_view');
	    $this->load->view('templates/footer_page');
	}
	
	public function reg_user() {
		$param['fname'] = $this->input->post('fname');
		$param['lname'] = $this->input->post('lname');
		$param['username'] = $this->input->post('username');
		$param['pass1'] = $this->input->post('pass1');
		$param['pass2'] = $this->input->post('pass2');
		$param['email'] = $this->input->post('email');
		$param['email2'] = $this->input->post('email2');
		
		if($this->Home_model->reg_user($param)) {
			$msg = 'Thank you for your registration. Your data have been saved for future Comments Section of K\'s Blog.';
		}
		else {
			$msg = 'There was an error with the data you entered. Please, use different email and password and try again. Thank you!';
		}
		$this->load->view('templates/header_page');
		$this->load->view('home/status_view', array('msg' => $msg));
		$this->load->view('templates/footer_page');
	}
}