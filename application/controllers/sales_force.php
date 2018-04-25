<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_force extends CI_Controller {
	//functions
	public function index(){
print_r("xxxxxxxxxxx");die();		
		$this->load->model("main_model");
		$data["fetch_data"] = $this->main_model->fetch_data();
		//$this->load->view("main_view");
		$this->load->view("main_view", $data);

	}
	
	
	public function add(){
		
		echo"ADD";
		
	}
	
	
}