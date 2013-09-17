<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-25
 * Time: 下午8:52
 * To change this template use File | Settings | File Templates.
 */

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function register($type = null)
    {
        if ($type == 'post') {
            $data = $this->input->post(NULL, TRUE);
            if (!$data) {
                $this->output
                    ->set_content_type('json')
                    ->set_output(json_encode(array('err' => '1')));
            } else {
                $data = array_map('strip_slashes', $data);
                $data = array_map('trim', $data);
                $err = array();
                if (mb_strlen($data['usrname']) < 3)
                    $err['usrname'] = 1;
                if (mb_strlen($data['nickname']) < 3)
                    $err['nickname'] = 1;
                if (!preg_match('/^[0-9a-zA-Z_\x{4e00}-\x{9fa5}]+$/u', $data['usrname']))
                    $err['usrname'] = 1;
                if (mb_strlen($data['passwd']) >= 20 || mb_strlen($data['passwd']) < 6)
                    $err['passwd'] = 1;
                if (!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $data['mail']))
                    $err['mail'] = 1;
                if ($data['passwd'] !== $data['repasswd'])
                    $err['passwd'] = 1;
                if (count($err)) {
                    $err['err'] = 1;
                    $this->output
                        ->set_content_type('json')
                        ->set_output(json_encode($err));
                } else {
                    unset($data['repasswd']);
                    $this->user_model->user_register($data);
                    $this->session->set_userdata(array(
                        'is_login' => 1,
                        'usrname' => $data['usrname'],
                        'uid'=>$data['uid'],
                        'nickname' => $data['nickname']
                    ));
                    $this->output
                        ->set_content_type('json')
                        ->set_output(json_encode(array('err' => 0)));
                }
            }
        } else {
            $header['title'] = '用户注册-餐谋网';
            $header['type'] = 'form';
            $header['is_login'] = $this->session->userdata('is_login');
            $this->load->view('header', $header);
            $this->load->view('register');
            $this->load->view('footer');
        }
    }

    public function login()
    {
        $data = $this->input->post(NULL, TRUE);
        if (!$data)
            $this->output
                ->set_content_type('json')
                ->set_output(json_encode(array('err' => '1')));
        else {
            $data = array_map('strip_slashes', $data);
            $data = array_map('trim', $data);
            $data = $this->user_model->user_login($data);
            if ($data) {
                $this->session->set_userdata(array(
                    'is_login' => 1,
                    'usrname' => $data['usrname'],
                    'uid'=>$data['uid'],
                    'nickname' => $data['nickname']
                ));
                $this->output
                    ->set_content_type('json')
                    ->set_output(json_encode(array('err' => '0')));
            } else {
                $this->output
                    ->set_content_type('json')
                    ->set_output(json_encode(array('err' => '1')));
            }
        }
    }

    public function social_login($provider = '')
    {
        $this->config->load('oauth2');
        $allowed_providers = $this->config->item('oauth2');
        if (!$provider OR !isset($allowed_providers[$provider])) {
            $this->output
                ->set_content_type('json')
                ->set_output(json_encode(array('err' => '1')));
        } else {
            $this->load->library('oauth2');
            $providername = $provider;
            $provider = $this->oauth2->provider($provider, $allowed_providers[$provider]);
            $args = $this->input->get();
            if ($args AND !isset($args['code'])) {
                $this->output
                    ->set_content_type('json')
                    ->set_output(json_encode(array('err' => '1')));
                return;
            }
            $code = $this->input->get('code', TRUE);
            if (!$code) {
                $provider->authorize();
                return;
            } else {
                try {
                    $token = $provider->access($code);
                    $sns_user = $provider->get_user_socialinfo($token);
                    if (is_array($sns_user)) {
                        if ($this->user_model
                            ->user_social_login("$providername:" . $sns_user['uid'])
                        ) {
                            $usrname = $this->user_model
                                ->user_get_info($sns_user['uid']);
                            $usrname = $usrname['usrname'];
                            $this->session->set_userdata(array(
                                'is_login' => 1,
                                'usrname' => $usrname
                            ));
                            $this->output
                                ->set_content_type('json')
                                ->set_output(json_encode(array('err' => '0')));
                        }
                    } else {
                        $this->output
                            ->set_content_type('json')
                            ->set_output(json_encode(array('err' => '1')));
                    }
                } catch (OAuth2_Exception $e) {
                    $this->output
                        ->set_content_type('json')
                        ->set_output(json_encode(array('err' => '1')));
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }
}