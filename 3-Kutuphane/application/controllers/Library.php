<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Library extends CI_Controller
{


	public function index()
	{
		$this->load->view("library_view");
	}

	public function save()
	{
		$data = array(
			"name" 			=> $this->input->post("name"),
			"author"		=> $this->input->post("author"),
			"type"			=> $this->input->post("type"),
			"publish_date"	=> $this->input->post("publish_date"),
			"status"		=> $this->input->post("status")
		);
		$this->load->model("Library_Model");
		$insert = $this->Library_Model->insert($data);
		if ($insert) {
			echo "Kayıt Başarılı";
		} else {
			echo "Kayıt sırasında bir problem oldu.";
		}
	}
}
