<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->load->model('booking_model');

		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		
		//$this->user_model->create_admin(["username"=>"admin2","password"=>"admin2pass"]);

		//$data2 = $this->booking_model->get_flights(['destination'=>'Manila', 'origin' => 'Leyte', 'time_arrival' => null, 'time_departure' => null]);
		//$data3 = $this->user_model->get_admin_accounts();

/*		$this->user_model->add_flight(["flight_id"=>"IDNO10",
										"slot"=> 60,
										"destination"=>	"Manila",
										"origin"=>"Leyte",
										"time_departure"=>"2008-11-11 13:23",
										"time_arrival"=>"2008-12-12 13:23"
										]);
*/

//		$data['result'] = $this->booking_model->get_flight(['destination'=>'Manila', 'origin'=>'Leyte']);
		$this->load->view('home');
	}

	function get_book_data(){
		echo "ASDFSADFAS";		
//		$data['flight_id'] = $_POST['flight_id'];

//		$this->db->add_flight($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */