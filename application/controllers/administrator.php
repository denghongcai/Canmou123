<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-27
 * Time: 下午3:09
 * To change this template use File | Settings | File Templates.
 */

Class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->model('dininghall_model');
        $this->load->model('img_model');
        $this->load->model('cuisine_model');
    }

    public function index()
    {
        $data['dhdata'] = $this->dininghall_model->get_dininghall(null, null, null, null, null, 4, null);
        $this->load->view('admin/header');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }

    public function dhlist($page = null)
    {
        $data['dhdata'] = $this->dininghall_model->get_dininghall(null, null, null, null, null, 4, $page);
        $data['pagenum'] = $this->dininghall_model->get_dh_count();
        $this->load->view('admin/header');
        $this->load->view('admin/dh', $data);
        $this->load->view('admin/footer');
    }

    public function dhdetail($dhid = null)
    {
        if ($dhid === null) {
            $data['dhid'] = null;
            $data['dhdata']['name'] = '';
            $data['dhdata']['image'] = null;
            $data['dhdata']['intro'] = '';
            $data['dhdata']['type'] = '';
            $data['dhdata']['rate'] = '';
            $data['dhdata']['area'] = '';
            $data['dhdata']['price'] = '';
            $data['dhdata']['eater'] = '';
            $data['dhdata']['map'] = '';
            $data['dhdata']['dial'] = '';
            $data['dhdata']['position'] = '';
        } else {
            if ((int)$dhid != 0) {
                $data['dhdata'] = $this->dininghall_model->get_dh_detail($dhid);
                $data['dhid'] = $data['dhdata']['dhid'];
                $data['dhimg'] = $this->dininghall_model->get_dh_img($dhid);
                $data['cuisineimg'] = $this->cuisine_model->getCuisine($dhid);
            } else {
                $data['error'] = urldecode($dhid);
            }
        }
        $this->load->view('admin/header');
        $this->load->view('admin/dhdetail', $data);
        $this->load->view('admin/footer');
    }

    public function dhmodify($dhid = null)
    {
        $data = $this->input->post(NULL, TRUE);

        if ($dhid !== null) {
            if ($this->dininghall_model->modify_dininghall($data, $dhid))
                $error = '修改成功';
            else
                $error = '修改失败';
            redirect(base_url("administrator/dhdetail/$error"));
        } else {
            $config['upload_path'] = './img/dh/';
            $config['allowed_types'] = 'png';
            $config['file_name'] = 'dh.png';
            $config['max_size'] = '0';
            $config['max_width'] = '1600';
            $config['max_height'] = '900';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                $error = $this->upload->display_errors();
                //$error = '图片上传失败';
                redirect(base_url("administrator/dhdetail/$error"));
            } else {
                $path = $this->upload->data();
                $data['image'] = 'img/dh/' . $path['file_name'];
                $data['map'] = trim($data['map']);
                if ($this->dininghall_model->add_dininghall($data, $dhid))
                    $error = '添加成功，你可以开始添加新的餐厅';
                else
                    $error = '添加失败';
                redirect(base_url("administrator/dhdetail/$error"));
            }
        }
    }

    public function dhdel($dhid)
    {
        if ($this->dininghall_model->del_dininghall($dhid))
            redirect('administrator/dhlist');
    }

    public function deldhimg($imageid)
    {
        if($this->dininghall_model->del_dh_img($imageid))
            echo json_encode(array(
                'err'=>0
            ));
        else
            echo json_encode(array(
                'err'=>1
            ));
    }

    public function delcuisine($id)
    {
        if($this->cuisine_model->delCuisine($id))
            echo json_encode(array(
                'err'=>0
            ));
        else
            echo json_encode(array(
                'err'=>1
            ));
    }

    public function modifycuisine($dhid)
    {
        $data = $this->input->post();
        $data = array_filter($data);
        if(count($data) == 3){
            if($this->cuisine_model->addCuisine($dhid, $data))
                $error = '添加成功，你可以开始添加新的菜品';
            else
                $error = '添加失败';
            redirect(base_url("administrator/dhdetail/$error"));
        }
        else{
            $error = '添加失败';
            redirect(base_url("administrator/dhdetail/$error"));
        }
    }

    public function imgupload($dhid, $type)
    {
        $config['upload_path'] = './img/other/';
        $config['allowed_types'] = 'png';
        $config['file_name'] = 'other.png';
        $config['max_size'] = '0';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            echo '上传失败';
        } else {
            switch ($type) {
                case 1:
                    $path = $this->upload->data();
                    $data['image'] = 'img/other/' . $path['file_name'];
                    if ($this->img_model->uploadDh($dhid, $data['image']))
                        echo $data['image'];
                    else
                        echo '0';
                    break;
                case 2:
                    $path = $this->upload->data();
                    $data['image'] = 'img/other/' . $path['file_name'];
                    echo $data['image'];
                    break;
            }
        }
    }
}