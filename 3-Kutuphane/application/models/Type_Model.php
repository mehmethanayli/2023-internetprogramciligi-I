<?php
class Type_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data = array())
    {
        return $this->db->insert("types", $data);
    }

    public function getAllTypes($where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get("types")->result();
    }


}
