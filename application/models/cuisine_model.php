<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Cuisine_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function addCuisine($dhid, $data)
    {
        $data['dhid'] = $dhid;
        $this->db->insert('cuisine', $data);
        if($this->db->affected_rows() == 1)
            return TRUE;
        else
            return FALSE;
    }

    public function getCuisine($dhid)
    {
        $query = $this->db->get_where('cuisine', array(
            'dhid'=>$dhid
        ));
        return $query->result_array();
    }
}