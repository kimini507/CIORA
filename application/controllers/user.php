<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
  	function __construct()
    {
        parent::__construct();
        session_start();
		$this->load->model('user_model');
		$this->load->model('flight_model');
		$this->load->helper('url');
		$this->load->helper('form');
    }

	public function log_in(){
		$accounts = $this->user_model->get_admin_accounts();
		//var_dump($accounts);

		foreach($accounts as $account){
			if($account->USERNAME == $_POST['username']){
				if($account->PASSWORD == $_POST['password']){
					$_SESSION['user'] = $_POST['username'];
					$this->user_model->log_in($_POST['username']);
					unset($_SESSION['error_message']);
					$_SESSION['logged_in'] = true;
					break;
				}
			}
		}


		if(!isset($_SESSION['logged_in'])){
			$_SESSION['error_message'] = "Invalid Username/Password";
		}

		redirect('../');

	}

	public function log_out(){
		if(isset($_SESSION['logged_in'])){
			$this->load->model('user_model');
			$this->user_model->log_out($_SESSION['user']);
			session_destroy();
		}
		redirect('../');
	}

	/*------------------ADMIN FUNCTIONALITIES------------------*/

	public function add_flight(){
/*    						VALUES ('" . $flight['flight_id'] . "'," .
    							$flight['slot'] . ",'" .
    							$flight['destination'] . "','" .
    							$flight['origin'] . "', 
    							TO_TIMESTAMP('" . $flight['time_departure'] . "', 'YYYY-MM-DD HH24:MI'),
    							TO_TIMESTAMP('" . $flight['time_arrival'] . "', 'YYYY-MM-DD HH24:MI')," .
    							"'NV')");
*/ 
		/* -----------------------------
			add checker if             |
			flight id is already taken |
		   -----------------------------
		*/
/*
$this->user_model->add_flight(["flight_id"=>"IDNO07",
										"slot"=> 60,
										"destination"=>"Manila",
										"origin"=>"Leyte",
										"time_departure"=>"2008-11-11 13:23",
										"time_arrival"=>"2008-12-12 13:23"
										]);
*/
/*		$flight_data['time_departure'] = $this->convert_datetime_format($_POST['departure_time']);
		$flight_data['time_arrival'] = $this->convert_datetime_format($_POST['arrival_time']);

		$flight_data['flight_id'] = $_POST['flight_id'];
		$flight_data['slot'] = $_POST['slot'];
		$flight_data['destination'] = $_POST['destination'];
		$flight_data['origin'] = $_POST['origin'];
*/
		$flights = $this->flight_model->get_all_flight_data();

		foreach($flights as $flight){
			if($flight->FLIGHT_ID == $_POST['flight_id']){
				$_SESSION['error_message_flight'] = "Flight ID already exists";
                $_SESSION["status"] = "none";
                redirect("../viewer/add_flight_view");
				exit;
			}
		}

		$this->user_model->add_flight(["flight_id"=>$_POST['flight_id'],
										"slot"=> $_POST['slot'],
										"destination"=>	$_POST['destination'],
										"origin"=>$_POST['origin'],
										"time_departure"=> $this->convert_datetime_format($_POST['departure_time']),
										"time_arrival"=> $this->convert_datetime_format($_POST['departure_time'])
										]);
		$_SESSION["status"] = "none";
		redirect("../viewer/add_flight_view");



//		var_dump($this->convert_datetime_format($_POST['departure_time']));
//		var_dump($_POST);
	}


	public function convert_datetime_format($datetime){
		$datetime = explode('T', $datetime);
		$datetime = $datetime[0] . ' ' . $datetime[1];
		// $datetime;
		return $datetime;
	}

	public function edit_flight(){
		$this->user_model->update_flight(["flight_id"=>$_POST['flight_id'],
										"slot"=> $_POST['slot'],
										"destination"=>	$_POST['destination'],
										"origin"=>$_POST['origin'],
										"time_departure"=> $this->convert_datetime_format($_POST['departure_time']),
										"time_arrival"=> $this->convert_datetime_format($_POST['departure_time']),
										"visibility"=>$_POST['status']
										]);	
		
		$_SESSION['status'] = 'none';
		redirect('../viewer/edit_flight_view');
	}

	public function delete_flight(){
		$this->user_model->delete_flight($_POST['delete']);
		$_SESSION['status'] = 'none';
		redirect('../viewer/edit_flight_view');
	}

    public function convert_datetime_format_reverse($datetime){
        $datetime = explode(' ', $datetime);
        $datetime = $datetime[0] . 'T' . $datetime[1];
        // $datetime;

        return $datetime;
    }

    /*----------------------------SEARCH FLIGHTS----------------------*/

    public function get_flights(){

        $this->input->post("flight_id");

        $data["flight_id"] = $this->input->post("flight_id");
        $data["origin"] = $this->input->post("origin");
        $data["destination"] = $this->input->post("destination");
        $data["time_departure"] = $this->input->post("time_departure");
        $data["arrival"] = $this->input->post("arrival");


        $_SESSION["search"] = $data;

        $flights = $this->flight_model->get_flights_with($data);

        $res["flights"] = $flights;
        $res = json_encode($res);

        echo $res;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */