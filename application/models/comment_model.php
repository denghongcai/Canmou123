<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-25
 * Time: 下午7:37
 * To change this template use File | Settings | File Templates.
 */
class Comment_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_dh_comment($dhid, $page = 0, $num = 2)
    {
        $this->db->where('dhid', $dhid);
        $this->db->order_by('date desc');
        if (!$page)
            $query = $this->db->get('comment', $num);
        else
            $query = $this->db->get('comment', $num, $page * $num);
        return $query->result_array();
    }

    public function add_dh_comment($dhid, $uid, $data)
    {
        $data['dhid'] = $dhid;
        $data['uid'] = $uid;
        $this->db->insert('comment', $data);
        if($this->db->affected_rows())
            return TRUE;
        else
            return FALSE;
    }
}