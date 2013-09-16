<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-9-15
 * Time: 上午2:00
 * To change this template use File | Settings | File Templates.
 */
Class Sms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_login') != 1)
            die(json_encode(array(
                'err' => 1
            )));
    }

    public function getcheap()
    {
        $data = $this->input->post();
        if($data){
            if($this->session->userdata('smstime')){
                if((time() - $this->session->userdata('smstime')) > 60)
                    ;
                else
                    die(json_encode(array(
                        'err' => 2
                    )));
            }
            $this->session->set_userdata(array(
                'smstime'=>time()
            ));
            $sms_uid = 285628;
            $sms_pid = 3724;
            $sms_passwd = "349a230c48eca6d5207c3361a679d2da";
            $mobile = $data['phone'];
            $send_txt = mb_convert_encoding('尊敬的用户，你在餐谋网获得的优惠券为'.rand(1000,2000), 'gb2312', 'utf-8');
            $tplid = 16;
            $request = "http://sms.phpcms.cn/api.php?op=sms_service_new&sms_uid=$sms_uid&sms_pid=$sms_pid&sms_passwd=$sms_passwd&mobile=$mobile&send_txt=".urlencode($send_txt)."&charset=gb2312&tplid=".$tplid;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $request);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result=curl_exec($ch);
            curl_close($ch);
            echo json_encode(array(
                'err'=>1
            ));
        }
    }
}