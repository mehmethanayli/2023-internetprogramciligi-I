<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type extends CI_Controller
{


	public function index()
	{
		$this->load->view("type_view");
	}

	public function save()
	{
		$data = array(
			"name" 			=> $this->input->post("name"),
			"status"		=> $this->input->post("status")
		);
		$this->load->model("Type_Model");
		$insert = $this->Type_Model->insert($data);
		if ($insert) {
			echo "Kayıt Başarılı";
		} else {
			echo "Kayıt sırasında bir problem oldu.";
		}
	}
}
