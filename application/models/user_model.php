<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    function log_in($user){
    	$this->db->query("UPDATE administrator
    						SET status = 1
    						WHERE username = '$user'");
    }

    function log_out($user){
    	$this->db->query("UPDATE administrator
    						SET status = 2
    						WHERE username = '$user'");
    }

    function get_admin_accounts(){
    	$data = $this->db->query("SELECT * FROM administrator")->result();
    	return $data;
    }
    
    function create_admin($user){
    	$this->db->query("INSERT INTO administrator
    						VALUES ('" . $user['username'] . "','" . 
								$user['password'] . "', 
								2)");
    }




    /*-------------------ADMIN-CAPABILITIES----------------*/

    function add_flight($flight){
    	echo "asdfasdfasdf";
    	$this->db->query("INSERT INTO flight
    						VALUES ('" . $flight['flight_id'] . "'," .
    							$flight['slot'] . ",'" .
    							$flight['destination'] . "','" .
    							$flight['origin'] . "', 
    							TO_TIMESTAMP('" . $flight['time_departure'] . "', 'YYYY-MM-DD HH24:MI'),
    							TO_TIMESTAMP('" . $flight['time_arrival'] . "', 'YYYY-MM-DD HH24:MI')," .
    							"'NV')");
    }

    function make_flight_visible($flight){
    	$this->db->query("UPDATE flight
    						SET status = 'VB'
    						WHERE flight_id = " . $flight['flight_id']
    						);
    }




}

?>