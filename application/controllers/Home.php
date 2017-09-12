<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index() {
		$data = NULL;
		$this->load->view('templates/header');
		$this->load->view('home/home_view', $data);
		$this->load->view('templates/footer');
	}
}
