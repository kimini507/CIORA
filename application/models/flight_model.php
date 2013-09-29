<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Flight_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function get_all_flight_data(){
    	$res = $this->db->query('SELECT flight_id, slot, destination, origin, TO_CHAR(time_departure, ' . "'YYYY-MM-DD HH24:MM')" .'"TIME_DEPARTURE", TO_CHAR(time_arrival, ' . "'YYYY-MM-DD HH24:MM')" .'"TIME_ARRIVAL", status FROM flight ORDER BY flight_id')->result();
    	return $res;
    }

    public function get_visible_flight_data(){
    	$res = $this->db->query("SELECT * FROM flight WHERE status = 'VB'")->result();
    	return $res;
    }

    public function get_invisible_flight_data(){
    	$res = $this->db->query("SELECT * FROM flight WHERE status = 'NV'")->result();
    	return $res;
    }


}

?>