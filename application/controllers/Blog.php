<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("America/Los_Angeles");
	}
	
	public function index() {
		
	}
	
	public function show() {
		$id = $this->uri->segment(3, 0);
		$data = $this->Blog_model->get_post($id);
		
		$this->load->view('templates/header_page');
		if($this->Login_model->is_logged()) {
			$data['logged'] = TRUE;
		}
		else {
			$data['logged'] = FALSE;
		}
		$this->load->view('blog/post_view', $data);
		$this->load->view('templates/footer_page');
	}
	
	public function search_blog() {
		$key = $this->input->post('search_blog');
		$data['results'] = $this->Blog_model->search_blog($key);
		$this->load->view('templates/header_page');
		$this->load->view('blog/search_view', $data);
		$this->load->view('templates/footer_page');
	}
	
	public function edit_blog() {
		
		if($this->Login_model->is_logged()) {
			$this->load->view('templates/header_page');
			$id = $this->uri->segment(3, 0);
			$data['post'] = $this->Blog_model->get_post($id)['post'];
			$this->load->view('blog/edit_view', $data);
			$this->load->view('templates/footer_page');
		}
		else {
			$this->load->view('templates/header_page');
			$data['msg'] = '<br>You have to be logged in to access this page. Please, login. Thank you<br><br>';
			$this->load->view('home/login_view', $data);
			$this->load->view('templates/footer');
		}
	}
}
