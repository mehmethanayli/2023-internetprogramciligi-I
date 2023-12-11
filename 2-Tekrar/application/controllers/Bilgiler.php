<?php
class Bilgiler extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("bilgiler_view");
    }

    public function save()
    {
        // echo "Veriler kaydedilecek";
        $data = array(
            "name" => $this->input->post("name"),
            "surname" => $this->input->post("surname"),
            "age" => $this->input->post("age"),
            "email" => $this->input->post("email")
        );

        $this->load->model("Bilgiler_Model");
        $insert = $this->Bilgiler_Model->insert($data);
        if ($insert) {
            echo "Bilgiler Kaydedildi";
        } else {
            echo "Kayıt Sırasında Bir Hata Oluştu";
        }
    }
}
