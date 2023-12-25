<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Type_Model");

	}
	public function index()
	{
		$types = $this->Type_Model->getAllTypes();
		$viewData = new stdClass();
		$viewData->types = $types;
		$this->load->view("type_view", $viewData);
	}

	public function save()
	{
		$data = array(
			"name" 			=> $this->input->post("name"),
			"status"		=> $this->input->post("status")
		);
		$insert = $this->Type_Model->insert($data);
		if ($insert) {
			redirect(base_url('type'));
		} else {
			echo "Kayıt sırasında bir problem oldu.";
		}
	}
}
