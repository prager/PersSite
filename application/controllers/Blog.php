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
		$data['post'] = $this->Blog_model->get_post($id);
		$this->load->view('templates/header_page');
		$this->load->view('blog/post_view', $data);
		$this->load->view('templates/footer_page');
	}
}
