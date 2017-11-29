<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Arr_lib {
	public function subjects() {
		return array(
				'tech' => 'Technology',
				'politics' => 'Politics',
				'science' => 'Science',
				'history' => 'History',
				'bus' => 'Business'
		);
	}
	
	public function get_subject($key) {
		return $this->subjects()[$key];
	}
}

