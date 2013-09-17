<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-25
 * Time: 下午4:08
 * To change this template use File | Settings | File Templates.
 */
class Dininghall extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dininghall_model');
        $this->load->model('comment_model');
        $this->load->model('user_model');
        $this->load->model('img_model');
        $this->load->model('cuisine_model');
    }

    public function index($page = null)
    {
        $data['dininghallrc'] = $this->dininghall_model->get_dininghallrc(NULL, $page);
        $data['dininghallrc'] = array_map(array($this, 'addComment'), $data['dininghallrc']);
        $header['is_login'] = $this->session->userdata('is_login');
        $header['title'] = '餐谋网';
        $header['type'] = NULL;
        $category['current']['type'] = 0;
        $category['current']['area'] = 0;
        $category['current']['eater'] = 0;
        $category['current']['price'] = 0;
        $this->load->view('header', $header);
        $this->load->view('category', $category);
        $this->load->view('dininghallrc_view', $data);
        $this->load->view('footer');
    }

    public function autocomplete($type = null)
    {
        $data = $this->input->get(NULL, TRUE);
        $data = $data['query'];
        $data = $this->dininghall_model->search_dh($data);
        echo json_encode($data);
    }

    public function dhlist($type=null, $area=null, $eater=null, $price=null, $rate=null, $order=null, $page=null)
    {
        $data['dhlist'] = $this->dininghall_model->get_dininghall($type, $area, $price, $eater, $rate, $order, $page);
        $data['dhlist'] = array_map(array($this, 'imagefilter'), $data['dhlist']);
        $data['dhlist'] = array_map(array($this, 'addComment'), $data['dhlist']);
        $header['is_login'] = $this->session->userdata('is_login');
        $header['title'] = '餐谋网';
        $header['type'] = NULL;
        $category['current']['type'] = $type;
        $category['current']['area'] = $area;
        $category['current']['eater'] = $eater;
        $category['current']['price'] = $price;
        $this->load->view('header', $header);
        $this->load->view('category', $category);
        $this->load->view('dhlist_view', $data);
        $this->load->view('footer');
    }

    public function dhhotrate()
    {
        $data['dhlist'] = $this->dininghall_model->get_dh_hot();
        $data['dhlist'] = array_map(array($this, 'imagefilter'), $data['dhlist']);
        $data['dhhot'] = array_map(array($this, 'addComment'), $data['dhlist']);
        $header['is_login'] = $this->session->userdata('is_login');
        $header['title'] = '参谋热评-餐谋网';
        $header['type'] = NULL;
        $category['current']['type'] = 0;
        $category['current']['area'] = 0;
        $category['current']['eater'] = 0;
        $category['current']['price'] = 0;
        $this->load->view('header', $header);
        $this->load->view('category', $category);
        $this->load->view('hotrate', $data);
        $this->load->view('footer');
    }

    public function dhdetail($dhid){
        $result = $this->dininghall_model->get_dh_detail($dhid);
        $result['dhid'] = $dhid;
        $result['uid'] = $this->session->userdata('uid');
        $result['dhimg'] = $this->img_model->getDhimg($dhid);
        $result['cuisine'] = $this->cuisine_model->getCuisine($dhid);
        $data = array(
            array(
                'dhid'=>$dhid
            )
        );
        $result['comment'] = array_map(array($this, 'addComment'), $data);
        $header['title'] = $result['name'].'——餐谋网';
        $header['is_login'] = $this->session->userdata('is_login');
        $header['type'] = 'content';
        $footer['position'] = $result['position'];
        $this->load->view('header', $header);
        $this->load->view('dininghall', $result);
        $this->load->view('footer', $footer);
    }

    private function imagefilter($v)
    {
        $v['image'] = explode(':', $v['image']);
        return $v;
    }

    private function addComment($v){
        $v['comment'] = array();
        $comment = $this->comment_model->get_dh_comment($v['dhid']);
        foreach($comment as $item){
            $userinfo = $this->user_model->user_get_info($item['uid']);
            $userinfo['image'] = base_url($userinfo['image']);
            $item['userinfo'] = $userinfo;
            array_push($v['comment'], $item);
        }
        return $v;
    }
}