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
        $this->load->view("includes/header");
        $this->load->view("user_information_view", $_POST);
        $this->load->view("includes/footer");
    }

    function step2(){
        $_SESSION['passenger_info'] = $_POST;

        $flight1 = $this->flight_model->get_flights_with(["flight_id" => $_SESSION["flight1"]]);
        $data[0] = $flight1[0];

        if(isset($_SESSION['flight2'])){
            $flight2 = $this->flight_model->get_flights_with(["flight_id" => $_SESSION["flight2"]]);
            $data[1] = $flight2[0];
        }

        var_dump($data);
        var_dump($_POST);

        $_SESSION["flights"] = $data;
        $_SESSION["passengers"] = $_POST;

        var_dump($_SESSION);
        $this->load->view("includes/header");
        $this->load->view("book_success_view", ["flights"=>$data, "passengers"=>$_POST]);
        $this->load->view("includes/footer");
    }

    function finalize_book(){
        for($i = 0, $j = $_SESSION["passenger_info"]["passenger_number"]; $i<$j; $i++){
            $data["name"] = $_SESSION["passenger_info"]["guest_fname" . $i] . " " . $_SESSION["passenger_info"]["guest_mname" . $i] . " " . $_SESSION["passenger_info"]["guest_lname" . $i];
            $data["flight1"] = $_SESSION["flights"][0]->FLIGHT_ID;
            $data["flight2"] = "NULL";
            if(isset($_SESSION["flights"][1]))
                $data["flight2"] = $_SESSION["flights"][1]->FLIGHT_ID;

            $this->booking_model->add_customer($data);
        }

        $this->load->view("includes/header");
        $this->load->view("final_step");
        $this->load->view("includes/footer");
//        $this->booking_model->book_flight();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */