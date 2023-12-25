<?php
function getTypeName($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $types = $ci->db->where(array("id" => $id))->get("types")->row();
    return $types->name;
}
