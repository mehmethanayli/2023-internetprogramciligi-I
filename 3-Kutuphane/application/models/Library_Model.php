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


    public function getAllBooks($order="id ASC"){
        return $this->db->order_by($order)->get("books")->result();
    }


}
