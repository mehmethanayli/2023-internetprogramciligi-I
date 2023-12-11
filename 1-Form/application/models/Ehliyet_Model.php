<?php
class Ehliyet_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function save($data = array())
    {
        return $this->db->insert("ehliyet", $data);
    }


}



?>