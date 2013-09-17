<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-25
 * Time: 下午4:08
 * To change this template use File | Settings | File Templates.
 */
class Comment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('comment_model');
        if($this->session->userdata('is_login') != 1)
            redirect();
    }

    public function add($dhid)
    {
        $data = $this->input->post(NULL, TRUE);
        $uid = $this->session->userdata('uid');
        $total = floor(($data['tastestar'] * 5 + $data['serstar'] * 3 + $data['envstar'] * 2)/10);
        $data['rate'] = $total;
        $data['content'] = htmlspecialchars_decode($data['content']);
        $data['content'] = preg_replace("/<(.*?)>/","", $data['content']);
        if($this->comment_model->add_dh_comment($dhid, $uid, $data) && mb_strlen($data['content']))
            echo json_encode(array('err'=> 0));
        else
            echo json_encode(array('err'=> 1));
    }
}