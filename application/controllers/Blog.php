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
	
	public function submit_edit() {
		
		$this->load->view('templates/header_page');
		
		if($this->Login_model->is_logged()) {
			$id = $this->uri->segment(3, 0);
			$param['title'] = $this->input->post('title');
			$param['subject'] = $this->input->post('subj');
			$param['text'] = $this->input->post('article');
			$this->Blog_model->edit_entry($param, $id);
			$data = $this->Master_model->get_master_data();
			$this->load->view('master/master_view', $data);
		}
		else {
			$data['msg'] = '<br>You have to be logged in to access this page. Please, login. Thank you<br><br>';
			$this->load->view('home/login_view', $data);
		}
		
		$this->load->view('templates/footer_page');
	}
	
	public function delete_blog() {
		$this->load->view('templates/header_page');
		
		if($this->Login_model->is_logged()) {
			$id = $this->uri->segment(3, 0);
			$action = $this->uri->segment(4, 0);
			if($action == 1) {
				$this->Blog_model->delete_post($id);
				$data['msg'] = 'The post was deleted. Thank you';
				$this->load->view('home/status_view', $data);
			}
			elseif($action == 0) {
				$data['msg'] = '<br>Do you wish to delete this post? ' . anchor('blog/delete_blog/'. $id . '/1', 'Yes') . ' / ' 
						. anchor('blog/delete_blog/' . $id . '/2', 'No');
				$this->load->view('home/status_view', $data);
			}
			else {
				$data['msg'] = 'The post will not be deleted. Click on X to go to Home Page. Thank you';
				$this->load->view('home/status_view', $data);
			}
		}
		else {
			$data['msg'] = '<br>You have to be logged in to access this page. Please, login. Thank you<br><br>';
			$this->load->view('home/login_view', $data);
		}
		
		$this->load->view('templates/footer_page');
	}
	
	public function publish() {
		
		$this->load->view('templates/header_page');		
		
		if($this->Login_model->is_logged()) {
			$id = $this->uri->segment(3, 0);
			$status = $this->uri->segment(4, 0);
			
			$data['msg'] = $this->Blog_model->publish($id, $status);
			$this->load->view('home/status_view', $data);
		}
		else {			
			$data['msg'] = '<br>You have to be logged in to access this page. Please, login. Thank you<br><br>';
			$this->load->view('home/login_view', $data);
		}		
		
		$this->load->view('templates/footer_page');
	}
	
	public function posts() {
		
		$this->load->view('templates/header_page');
		
		if($this->Login_model->is_logged()) {
			$data['posts'] = $this->Blog_model->get_posts();
			$this->load->view('blog/posts_view', $data);
		}
		else {
			$data['msg'] = '<br>You have to be logged in to access this page. Please, login. Thank you<br><br>';
			$this->load->view('home/login_view', $data);
		}
		
		$this->load->view('templates/footer_page');		
	}
}
