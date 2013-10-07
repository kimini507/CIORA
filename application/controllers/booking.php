<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('user_model');
        $this->load->model('booking_model');
        $this->load->model('flight_model');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    function step1(){
        var_dump($_POST);

    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */