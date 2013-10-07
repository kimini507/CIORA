<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Flight_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function get_all_flight_data(){
    	$res = $this->db->query('SELECT flight_id, slot, destination, origin, TO_CHAR(time_departure, ' . "'YYYY-MM-DD HH24:MM')" .'"TIME_DEPARTURE", TO_CHAR(time_arrival, ' . "'YYYY-MM-DD HH24:MM')" .'"TIME_ARRIVAL", status, fare FROM flight ORDER BY flight_id')->result();
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

    public function get_flights_with($data){
        $searches = "";

        if(isset($data["flight_id"]) && $data["flight_id"] != "")
            $searches .= "flight_id = '" . $data["flight_id"] . "' AND ";
        if(isset($data["origin"]) && $data["origin"] != "")
            $searches .= "origin = '" . $data["origin"] . "' AND ";
        if(isset($data["destination"]) && $data["destination"] != "")
            $searches .= "destination = '" . $data["destination"] . "' AND ";
        if(isset($data["slot"]) && $data["slot"] != "")
            $searches .= "slot >= '" . $data["slot"] . "' AND ";
        if(isset($data["time_departure"]) && $data["time_departure"] != "")
            $searches .= "TO_CHAR(time_departure, 'YYYY-MM-DD HH24:MM') LIKE '%" . $data['time_departure'] . "%' AND ";
        if(isset($data["time_arrival"]) && $data["time_arrival"] != "")
            $searches .= "TO_CHAR(time_arrival, 'YYYY-MM-DD HH24:MM') LIKE '%" . $data['time_arrival'] . "%' AND ";
        if($searches != ""){
            $searches = "WHERE " . substr($searches, 0, strlen($searches)-4);
        }
        $res = $this->db->query('SELECT flight_id, slot, destination, origin, TO_CHAR(time_departure, ' . "'YYYY-MM-DD HH24:MM')" .'"TIME_DEPARTURE", TO_CHAR(time_arrival, ' . "'YYYY-MM-DD HH24:MM')" . '"TIME_ARRIVAL", status, fare FROM flight ' . $searches .' ORDER BY flight_id')->result();
        return $res;
    }

    public function get_flights_with2($data){
        $searches = "";

        if(isset($data["flight_id"]) && $data["flight_id"] != "")
            $searches .= "flight_id = '" . $data["flight_id"] . "' AND ";
        if(isset($data["origin"]) && $data["origin"] != "")
            $searches .= "origin = '" . $data["origin"] . "' AND ";
        if(isset($data["destination"]) && $data["destination"] != "")
            $searches .= "destination = '" . $data["destination"] . "' AND ";
        if(isset($data["slot"]) && $data["slot"] != "")
            $searches .= "slot >= '" . $data["slot"] . "' AND ";
        if(isset($data["time_departure"]) && $data["time_departure"] != "")
            $searches .= "TO_CHAR(time_departure, 'YYYY-MM-DD HH24:MM') > '" . $data['time_departure'] . "' AND ";
        if(isset($data["time_arrival"]) && $data["time_arrival"] != "")
            $searches .= "TO_CHAR(time_arrival, 'YYYY-MM-DD HH24:MM') > '" . $data['time_arrival'] . "' AND ";
        if($searches != ""){
            $searches = "WHERE " . substr($searches, 0, strlen($searches)-4);
        }
        $res = $this->db->query('SELECT flight_id, slot, destination, origin, TO_CHAR(time_departure, ' . "'YYYY-MM-DD HH24:MM')" .'"TIME_DEPARTURE", TO_CHAR(time_arrival, ' . "'YYYY-MM-DD HH24:MM')" . '"TIME_ARRIVAL", status, fare FROM flight ' . $searches .' ORDER BY flight_id')->result();
        return $res;
    }
}

?>