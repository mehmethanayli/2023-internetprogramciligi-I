<?php
/* 
name
surname
birthday */

class Ehliyet extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("ehliyet_view");
    }

    public function save()
    {
        $birthday = $this->input->post("birthday");
        $surname = $this->input->post("surname");
        $name = $this->input->post("name");
        $data = array(
            "name" => $name,
            "surname" => $surname,
            "birthday" => $birthday
        );
        $age = 2023 - $birthday;
        if ($age > 18) {
        
            $this->load->model("Ehliyet_Model");
            $insert = $this->Ehliyet_Model->save($data);
            if ($insert) {
                echo "Yaşınız: $age -- Ehliyet alabilir veri tabanı kaydı gerçekleşti.";
            } else {
                echo "Veri tabanı kaydı sırasında bir hata oluştu";
            }
        } else {
            echo "Ehliyet Almak İçin Yaşınız Uygun Değil! Yaşınız: $age";
        }
    }
}
