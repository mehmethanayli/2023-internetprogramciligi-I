<?php
/* Uygulama:
Form ekranına parola ve parola tekrarı alanları ekleyip form validation kurallarını yazınız.
Veri tabanına kayıt işlemi gerçekleştikten sonra yeni bir view ekrana basarak veri tabanındaki
tüm kayıtları bir tablo halinde gösteriniz.
 */

class FormApp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view("formApp_view");
    }

    public function save()
    {
        /*    Not: Form Validation Olmadan Örnek  
              echo "Gelen veriler kaydedilmeye başlanacak";
              $name = $this->input->post("name");
              $surname = $this->input->post("surname");
              $email = $this->input->post("email");

              echo "<br>$name --- $surname ---- $email";

              $data = array(
                  "name" => $name,
                  "email" => $email,
                  "surname" => $surname
              );

              $this->load->model("FormApp_Model");
              $this->FormApp_Model->save($data); 
              
              */

        /* Form Validation */

        /* Form Validation Kütüphanesi Yüklenir */
        $this->load->library("form_validation");

        /* Kurallar Yazılır */
        $this->form_validation->set_rules("name", "İsim", "required|trim");
        $this->form_validation->set_rules("surname", "Soyisim", "required|trim");
        $this->form_validation->set_rules("email", "E-posta", "required|trim");

        /* Mesaj şablonu oluşturulur */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır."
            )
        );


        /* Form validasyonu çalıştırılır. */
        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "name" => $this->input->post("name"),
                "email" => $this->input->post("email"),
                "surname" => $this->input->post("surname")
            );

            $this->load->model("FormApp_Model");
            $this->FormApp_Model->save($data);
            
            echo "Validasyon başarılı kayıt işlemi başarılı.";

        } else {
            echo "Validasyon başarısız.";

            $viewData = new stdClass();
            $viewData->formError = true;
            $viewData->test = array(1, 2, 3, "Mavi", "Elma");
            $this->load->view("formApp_view", $viewData);

        }

    }



}
