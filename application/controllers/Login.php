<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("America/Los_Angeles");
	}
	
	public function index() {
		$data = NULL;
		$this->load->view('templates/header_page');
		$this->load->view('master/master_view', $data);
		$this->load->view('templates/footer_page');
	}
}
