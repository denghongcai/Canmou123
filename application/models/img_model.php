<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Img_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function uploadDh($dhid, $path)
    {
        $this->db->insert('dhimg', array(
            'dhid'=>$dhid,
            'path'=>$path
        ));
        return TRUE;
    }

    public function getDhimg($dhid)
    {
        $query = $this->db->get_where('dhimg', array(
            'dhid'=>$dhid
        ));
        return $query->result_array();
    }
}