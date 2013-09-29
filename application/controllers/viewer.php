<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewer extends CI_Controller {

	function __construct(){

		parent::__construct();
		session_start();
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->load->model('booking_model');

		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function add_flight_view(){
		if(isset($_SESSION['logged_in'])){
			$_SESSION['status'] = "flight_adder";
			$this->load->view("/admin_views/admin_nav");
			$this->load->view("/admin_views/flight_adder");
		}else{
			redirect("../");
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */