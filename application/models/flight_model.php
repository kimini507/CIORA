<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Flight_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function get_all_flight_data(){
    	$res = $this->db->query("SELECT * FROM flights")->result();
    	return $res;
    }

    public function get_visible_flight_data(){
    	$res = $this->db->query("SELECT * FROM flights WHERE status = 'VB'")->result();
    	return $res;
    }

    public function get_invisible_flight_data(){
    	$res = $this->db->query("SELECT * FROM flights WHERE status = 'NV'")->result();
    	return $res;
    }

}

?>