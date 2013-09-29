<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Booking_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	function get_flight($flights){
		$data['status'] = "Success";
		$data['result'] = $this->db->query("SELECT * 
											FROM flight 
											WHERE
												destination = '" . $flights['destination'] .
												"' AND origin = '" . $flights['origin'] ."'
											ORDER BY flight_id")->result();
		return $data;
	}

	function book_flight($data){
		$this->db->query("INSERT INTO books
							VALUES ('" .
								$data['customer_id'] . "','" .
								$data['flight_id'] . "','" .
								$data['class'] . "','" .
								$data['flight_type'] . "'" .
							")");
	}

}

?>