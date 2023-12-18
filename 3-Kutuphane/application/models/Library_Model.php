<?php
class Library_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data = array())
    {
        return $this->db->insert("books", $data);
    }
}
