<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function chart_data()
	{
		$data = $this->Chart_model->chart_database();
		echo json_encode($data);
	}
}
