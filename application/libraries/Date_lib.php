<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Date_lib {
	public function set_date($date_str) {
		date_default_timezone_set("America/Los_Angeles");
		
		//echo '<br>' . $date_str . '<br>';
		$date_str = getdate($date_str);
		$month = $date_str['mon'];
		$day = $date_str['mday'];
		$hours = $date_str['hours'];
		$minutes = $date_str['minutes'];
		$seconds = $date_str['seconds'];
		//format the date and time output string
		if (strlen($minutes) == 1){
			$minutes = "0" . $minutes;
		}
		
		if (strlen($hours) == 1){
			$hours = "0" . $hours;
		}
		
		if (strlen($seconds) == 1){
			$seconds = "0" . $seconds;
		}
		
		//format the date and time output string for last comment
		if (strlen($minutes) == 1){
			$minutes = "0" . $minutes;
		}
		
		if (strlen($hours) == 1){
			$hours = "0" . $hours;
		}
		
		if (strlen($seconds) == 1){
			$seconds = "0" . $seconds;
		}
		
		//and build the string here
		$date_str2 = $month . "/" . $day . "/" . $date_str['year'];
		$date_str4 = $month . "/" . $day . "/" . $date_str['year'] . ", " . $hours . ":" . $minutes . ":" . $seconds;
		
		$data['short'] = $date_str2;
		$data['long'] = $date_str4;
		
		return $data;
	}
	
	public function validateDate($date) {
		$format = 'm-d-Y';
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
	
	public function get_today() {
		return strtotime($this->set_date(time())['short']);
	}
	
	public function get_begin_of_day() {
		$now = time();
		
		return $now - ($now % 86400);
	}
}

