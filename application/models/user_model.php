<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-25
 * Time: 下午7:37
 * To change this template use File | Settings | File Templates.
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function user_register($data)
    {
        $this->db->insert('user', $data);
        $query = $this->db->get_where('user', $data);
        return $query->row_array();
    }

    public function user_login($data)
    {
        $query = $this->db->get_where('user', $data);
        if ($query->num_rows() == 1)
            return $query->row_array();
        else
            return FALSE;
    }

    public function user_social_login($data)
    {
        $query = $this->db->get_where('user', array('platform_uid'=>$data));
        if ($query->num_rows() == 1)
            return TRUE;
        else
            return FALSE;
    }

    public function user_get_socialinfo($pid){
        $query = $this->db->get_where('user', array('platform_uid'=>$pid));
        return $query->row_array();
    }

    public function user_get_info($uid){
        $query = $this->db->get_where('user', array('uid'=>$uid));
        return $query->row_array();
    }

}