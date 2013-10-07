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
        $this->db->close();
    }

    function log_out($user){
    	$this->db->query("UPDATE administrator
    						SET status = 2
    						WHERE username = '$user'");
        $this->db->close();
    }

    function get_admin_accounts(){
    	$data = $this->db->query("SELECT * FROM administrator")->result();
    	return $data;
        $this->db->close();
    }
    
    function create_admin($user){
    	$this->db->query("INSERT INTO administrator
    						VALUES ('" . $user['username'] . "','" . 
								$user['password'] . "', 
								2)");
        $this->db->close();
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
    							"'NV',". $flight['fare'] .")");
        $this->db->close();
    }

    function update_flight($flight){
    	$this->db->query("UPDATE flight
    						SET
    						slot = " . $flight['slot'] . ",
    						origin = '" . $flight['origin'] . "',
    						destination = '" . $flight['destination'] . "',
    						time_departure = TO_TIMESTAMP('" . $flight['time_departure'] . "', 'YYYY-MM-DD HH24:MI'),
    						time_arrival = TO_TIMESTAMP('" . $flight['time_arrival'] . "', 'YYYY-MM-DD HH24:MI'),
    						status = '" . $flight['visibility'] . "',
    						fare = " . $flight['fare'] . "
    						WHERE flight_id = '" . $flight['flight_id'] . "'
    						");
        $this->db->close();
    }

    function delete_flight($flight_id){
    	$this->db->query("DELETE FROM flight WHERE flight_id = '$flight_id'");
        $this->db->close();
    }
}

?>