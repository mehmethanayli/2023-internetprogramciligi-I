<?php
class FormApp_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /* Tabloya veri ekleyen fonksiyon */
    public function save($data = array())
    {
        return $this->db->insert("forms", $data);
    }

    /* Tablodaki tüm kayıtları çeken fonksiyon */

    public function getAll($order = "id ASC")
    {
        return $this->db->order_by($order)->get("forms")->result_array();
    }


}



?>