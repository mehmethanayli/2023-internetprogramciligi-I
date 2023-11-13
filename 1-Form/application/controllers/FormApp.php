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
        $this->load->model("FormApp_Model");
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
        $this->form_validation->set_rules("email", "E-posta", "required|trim|valid_email|is_unique[forms.email]");
        $this->form_validation->set_rules("pass", "Parola", "required|trim|min_length[3]|max_length[8]");
        $this->form_validation->set_rules("re_pass", "Parola Tekrarı", "required|trim|matches[pass]");

        /* Mesaj şablonu oluşturulur */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "min_length" => "<b>{field}</b> alanı minimum 3 karakterden oluşmalıdır.",
                "max_length" => "<b>{field}</b> alanı maksimum 8 karakterden oluşmalıdır.",
                "matches" => "<b>{field}</b> alanı Parola alanı ile aynı olmak zorundadır.",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz!",
                "is_unique" => "Bu e-posta adresi ile daha önceden kayıt oluşturuldu."
            )
        );


        /* Form validasyonu çalıştırılır. */
        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "name" => $this->input->post("name"),
                "email" => $this->input->post("email"),
                "surname" => $this->input->post("surname"),
                "pass" => $this->input->post("pass")
            );


            $insert = $this->FormApp_Model->save($data);

            //echo "Validasyon başarılı kayıt işlemi başarılı.";
            if ($insert) {
                //echo "Kayıt başarılı";

                $items = $this->FormApp_Model->getAll();

                //print_r($items);

                $viewData = new stdClass();
                $viewData->items = $items;
                $this->load->view("form_table_view", $viewData);
            } else {
                echo "Kayıt başarısız....";
            }
        } else {
            echo "Validasyon başarısız.";

            $viewData = new stdClass();
            $viewData->formError = true;
            $viewData->test = array(1, 2, 3, "Mavi", "Elma");
            $this->load->view("formApp_view", $viewData);
        }
    }
}
