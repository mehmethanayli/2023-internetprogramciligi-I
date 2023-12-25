<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Library extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Library_Model");
		$this->load->model("Type_Model");
	}

	public function index()
	{
		$books = $this->Library_Model->getAllBooks();
		$types = $this->Type_Model->getAllTypes(array(
			"status" => 1
		));
		$viewData = new stdClass();
		$viewData->books = $books;
		$viewData->types = $types;
		$this->load->view("library_view", $viewData);
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
		$insert = $this->Library_Model->insert($data);
		if ($insert) {
			redirect(base_url("library"));
		} else {
			echo "Kayıt sırasında bir problem oldu.";
		}
	}
}
