<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doc extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('pdf'); // Load library
		$this->pdf->fontpath = 'font/'; // Specify font folder
	}

	public function index()
	{   session_start();
		// Generate PDF by saying hello to the world
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial','B',16);
        $title = 'Book Summary';
        $this->pdf->SetTitle($title);
        $this->pdf->Cell(40,10,'Book Summary');
        $this->pdf->Ln();
        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(40,10,'Flight Details');
        $this->pdf->Ln();
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(40,4,$_SESSION['flights'][0]->ORIGIN." to ".$_SESSION['flights'][0]->DESTINATION);
        $this->pdf->Ln();
        $this->pdf->Cell(40,4,"Departure: ".$_SESSION['flights'][0]->TIME_DEPARTURE);
        $this->pdf->Ln();
        $this->pdf->Cell(40,4,"Arrival: ".$_SESSION['flights'][0]->TIME_ARRIVAL);
        $this->pdf->Ln();
        $this->pdf->Cell(40,4,"Flight ID: ".$_SESSION['flights'][0]->FLIGHT_ID);
        $this->pdf->Ln();
        if(isset($_SESSION['flights'][1])){
            $this->pdf->Ln();
            $this->pdf->Cell(40,4,$_SESSION['flights'][1]->ORIGIN." to ".$_SESSION['flights'][1]->DESTINATION);
            $this->pdf->Ln();
            $this->pdf->Cell(40,4,"Departure: ".$_SESSION['flights'][1]->TIME_DEPARTURE);
            $this->pdf->Ln();
            $this->pdf->Cell(40,4,"Arrival: ".$_SESSION['flights'][1]->TIME_ARRIVAL);
            $this->pdf->Ln();
            $this->pdf->Cell(40,4,"Flight ID: ".$_SESSION['flights'][1]->FLIGHT_ID);
            $this->pdf->Ln();
        }
        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(40,10,'Guest Details');
        $this->pdf->Ln();
        $this->pdf->SetFont('Arial','B',10);
        for($i = 0, $j =$_SESSION['passengers']["passenger_number"]; $i < $j; $i ++){
            $this->pdf->Cell(60,4,$_SESSION['passengers']["guest_title".$i]." ".$_SESSION['passengers']["guest_fname".$i]." ".$_SESSION['passengers']["guest_mname".$i]." ".$_SESSION['passengers']["guest_lname".$i]);
            $this->pdf->Cell(1,4,"|");
            $this->pdf->Cell(30,4,$_SESSION['passengers']["user_address".$i]);
            $this->pdf->Cell(1,4,"|");
            $this->pdf->Cell(30,4,$_SESSION['passengers']["user_email".$i]);
            $this->pdf->Cell(1,4,"|");
            $this->pdf->Cell(20,4,$_SESSION['passengers']["user_homephone".$i]);
            $this->pdf->Cell(1,4,"|");
            $this->pdf->Cell(15,4,$_SESSION['passengers']["user_mobilephone".$i]);
            $this->pdf->Ln();
        }
        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(40,10,'Payment Details');
        $this->pdf->Ln();
        $this->pdf->SetFont('Arial','B',10);
        $cost = $_SESSION['flights'][0]->FARE;
        $discount = 0;
        if(isset($_SESSION['flights'][1])){
            $cost += $_SESSION['flights'][1]->FARE;
            $discount = 1000;
        }

        $this->pdf->Cell(40,4,"Passenger Count:  ".$_SESSION['passengers']["passenger_number"]);
        $this->pdf->Ln();
        $this->pdf->Cell(40,4,"Flight Cost: ".$cost);
        $this->pdf->Ln();
        $this->pdf->Cell(40,4,"Discount: ".$discount);
        $this->pdf->Ln();
        $this->pdf->Cell(40,4,"Total Cost: ".$_SESSION['passengers']["passenger_number"]*($cost-$discount));
        $this->pdf->Ln();
        $this->pdf->Output();
	}

	// More methods goes here
}
?>