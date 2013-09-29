<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	function abc(){
		$data['title'] = "Blog";
		$data['header'] = "This is a heading.";
		$data['first_name'] = "PADster";
		$data['result'] = $this->db->query('select * from books');
		
		return $data;
	}

}

?>