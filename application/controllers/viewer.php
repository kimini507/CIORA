<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewer extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->load->model('flight_model');
		$this->load->model('booking_model');

		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function add_flight_view(){
        $this->load->view("/includes/header");

		if(isset($_SESSION['logged_in'])){
			$_SESSION['status'] = "flight_adder";
			$this->load->view("/admin_views/flight_adder");
		}else{
			redirect("../");
		}
	}

	public function edit_flight_view(){
        $this->load->view("/includes/header");
		if(isset($_SESSION['logged_in'])){
			$_SESSION['status'] = "flight_editor";
			
			$data['flights'] = $this->flight_model->get_all_flight_data();

			for($i = 0, $j = count($data['flights']); $i < $j; $i++){
				$data['flights'][$i]->TIME_DEPARTURE = $this->convert_datetime_format_reverse($data['flights'][$i]->TIME_DEPARTURE);
				$data['flights'][$i]->TIME_ARRIVAL = $this->convert_datetime_format_reverse($data['flights'][$i]->TIME_ARRIVAL);
			}

			$this->load->view("/admin_views/flight_editor", $data);
		}else{
			redirect("../");
		}
	}

    public function login_view(){
        $this->load->view("includes/header.php");
        $this->load->view("login_view.php");
    }

	public function convert_datetime_format_reverse($datetime){
		$datetime = explode(' ', $datetime);
		$datetime = $datetime[0] . 'T' . $datetime[1];
		// $datetime;

		return $datetime;
	}

    public function home_view(){
        redirect("../");
    }

    public function booking_view(){
        $res = $this->input->post("result");
        echo $res;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */