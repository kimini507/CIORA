<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Booking_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function add_customer($data){
        $data["customer_id"] = $this->db->query("SELECT customer_customer_id.NEXTVAL FROM dual");

        $this->db->query("INSERT INTO customer VALUES(customer_customer_id.NEXTVAL, '" .
            $data["name"] . "','" .
            $data["flight2"] . "','" .
            $data["flight1"]
        );

        $data["flight"] = $data["flight1"];
        $this->add_book_data($data);

        if($data["flight2"] != NULL){
            $data["flight"] = $data["flight2"];
            $this->add_book_data($data);
        }
    }

    function add_book_data($data){
        $this->db->query("INSERT INTO books VALUES(" .
            $data["customer_id"] . "," .
            $data["name"] . "','" .
            $data["flight"] . "'"
        );
    }

}

?>