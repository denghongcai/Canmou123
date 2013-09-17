<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-25
 * Time: 下午3:36
 * To change this template use File | Settings | File Templates.
 */
class Dininghall_model extends CI_Model
{

    private $limit = 9;

    public function __construct()
    {
        $this->load->database();
    }

    public function search_dh($data, $type = null)
    {
        if($type){

        }
        else{
            $this->db->like('name', $data);
            $query = $this->db->get('dininghall', $this->limit);
            $result = $query->result_array();
            $suggests = array();
            $dhid = array();
            foreach($result as $item){
                array_push($suggests, $item['name']);
                array_push($dhid, $item['dhid']);
            }
            $return = array(
                'query'=>$data,
                'suggestions'=>$suggests,
                'data'=>$dhid
            );
            return $return;
        }
    }

    public function get_dininghallrc($type = null, $page = 0)
    {
        if(!$type){
            $this->db->order_by('rand()');
            $this->db->where('recommend', 0);
            $query = $this->db->get('dininghall', $this->limit, $page*$this->limit);
            return $query->result_array();
        }
        else{
            ;
        }
    }

    public function get_dininghall($type, $area, $price, $eater, $rate, $order, $page)
    {
        $where = array('area' => $area, 'price' => $price,
            'eater' => $eater, 'rate' => $rate);
        $where = array_filter($where, array($this, "illegalfilter"));
        if (count($where) != 0)
            if($type != null && $type != 0){
                $where = $this->get_where($where);
                $this->db->where("concat(',',type,',') LIKE '%,".$type.",%'".$where);
            }
            else
                $this->db->where($where);
        else
            if($type != null && $type != 0){
                $this->db->where("concat(',',type,',') LIKE '%,".$type.",%'");
            }
        if ($this->illegalfilter($order)) {
            switch ($order) {
                case 1:
                    $order = 'price desc';
                    break;
                case 2:
                    $order = 'price asc';
                    break;
                case 3:
                    $order = 'rate desc';
                    break;
                case 4:
                    $order = 'outdate desc';
                    break;
                default:
                    $order = 'rand()';
            }
        } else
            $order = 'rand()';
        if($page == null)
            $page = 0;
        $this->db->order_by($order);
        $query = $this->db->get('dininghall',$this->limit, $page*$this->limit);

        return $query->result_array();
    }

    public function get_dh_hot()
    {
        $this->db->order_by('rate desc');
        $query = $this->db->get('dininghall', 3);
        return $query->result_array();
    }

    public function get_dh_count()
    {
        $query = $this->db->get('dininghall');
        return $query->num_rows();
    }

    public function get_dh_detail($dhid)
    {
        $query = $this->db->get_where('dininghall', array('dhid' => $dhid));
        return $query->row_array();
    }

    public function add_dininghall($data)
    {
        $query = $this->db->insert('dininghall', $data);
        if($this->db->affected_rows())
            return TRUE;
        else
            return FALSE;
    }

    public function del_dininghall($dhid){
        $query = $this->db->delete('dininghall', array('dhid' => $dhid));
        if($this->db->affected_rows())
            return TRUE;
        else
            return FALSE;
    }

    public function modify_dininghall($data, $dhid)
    {
        $this->db->where('dhid', $dhid);
        $query = $this->db->update('dininghall', $data);
        if($this->db->affected_rows())
            return TRUE;
        else
            return FALSE;
    }

    private function illegalfilter($v)
    {
        if (!(int)$v)
            return false;
        else
            return true;
    }

    private function get_where($arg = null) {
        $where = '';
        foreach ((array)$arg as $key => $val) {
            if(is_int($key)) {
                $where .= " $val ";
            }else {
                if(is_string($val)) {
                    if($val === null) {
                        $where .= " and $key is null ";
                    }else {
                        $where .= " and $key = '$val' ";
                    }
                }elseif(is_array($val)) {
                    foreach ($val as $v) {
                        if(is_string($v)) {
                            $in .= $in ? ",'$v'" : "'$v'";
                        }else {
                            $in .= $in ? ",$v" : "$v";
                        }
                    }
                    $where .= " and $key in ($in)";
                }else {
                    $where .= " and $key = $val ";
                }
            }
        }
        return $where;
    }
}