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

    public function _remap($functionName,$args)
    {
        switch($functionName)
        {
            case "step1":
                $this->load->view('user_information_view');
                break;
            case "step2":
                $this->load->view('step2');
                break;
            case "step3":
                $this->load->view('step3');
                break;
        }
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */