<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('message');
        $this->load->library('AES');
    }

    public function register()
    {
        $this->load->model('Sms_model','sms');
        $mobile = $this->input->get_post('mobile');

        if (!empty($mobile)) {
            $one = $this->sms->get_one(['mobile'=>$mobile,'type'=>'1','status'=>'0']);

            if(!empty($one) && (time() - strtotime($one['time']) < 60)){
                echo json_encode(array('code' => '300', 'error_code' => '9997','error_message'=>'获取验证码间隔不得小于1分钟','time'=>date('Y-m-d H:i:s'),'message'=>'failed'));
                die;
            }
            $str = "1,2,3,4,5,6,7,8,9,0";      //要显示的字符，可自己进行增删
            $list = explode(",", $str);
            $cmax = count($list) - 1;
            $verifyCode = '';
            for ($i = 0; $i < 4; $i++) {
                $randnum = mt_rand(0, $cmax);
                $verifyCode .= $list[$randnum];           //取出字符，组合成为我们要的验证码字符
            }
            $message = '您的短信验证码为' . $verifyCode . '，验证码有效期为10分钟';

            $response = $this->message->sendmessage($mobile, $message, '');
//            $response['code'] = '000';
            if ($response['code'] == '000') {
                $this->sms->insert(['mobile'=>$mobile,'verifyCode'=>$verifyCode,'time'=>date('Y-m-d H:i:s'),'type'=>'1']);
                echo json_encode(array('code' => '200', 'error_code' => 0,'error_message'=>'','time'=>date('Y-m-d H:i:s'),'message'=>'OK','data'=>['sign'=>$this->aes->key16aes128ecbEncrypt($mobile)]));
                die;
            } else {
                echo json_encode(array('code' => '300', 'error_code' => '9998','error_message'=>'验证码发发送失败','time'=>date('Y-m-d H:i:s'),'message'=>'failed'));
                die;
            }
        }
    }

    public function password(){
        $this->load->model('Sms_model','sms');
        $this->load->model('Cust_model','cust');
        $mobile = $this->input->get_post('mobile');


        if (!empty($mobile)) {
            $mobile   = str_replace('*','_',$mobile);

            $one      = $this->sms->get_one(['mobile'=>$mobile,'type'=>'2','status'=>'0']);

            if(!empty($one) && (time() - strtotime($one['time']) < 60)){
                echo json_encode(array('code' => '300', 'error_code' => '9997','error_message'=>'获取验证码间隔不得小于1分钟','time'=>date('Y-m-d H:i:s'),'message'=>'failed'));
                die;
            }
            $str = "1,2,3,4,5,6,7,8,9,0";      //要显示的字符，可自己进行增删
            $list = explode(",", $str);
            $cmax = count($list) - 1;
            $verifyCode = '';
            for ($i = 0; $i < 4; $i++) {
                $randnum = mt_rand(0, $cmax);
                $verifyCode .= $list[$randnum];           //取出字符，组合成为我们要的验证码字符
            }
            $message = '您的短信验证码为' . $verifyCode . '，验证码有效期为10分钟';

            $response = $this->message->sendmessage($mobile, $message, '');

//            $response['code'] = '000';
            if ($response['code'] == '000') {
                $this->sms->insert(['mobile'=>$mobile,'verifyCode'=>$verifyCode,'time'=>date('Y-m-d H:i:s'),'type'=>'2']);
                echo json_encode(array('code' => '200', 'error_code' => 0,'error_message'=>'','time'=>date('Y-m-d H:i:s'),'message'=>'OK','data'=>['sign'=>$this->aes->key16aes128ecbEncrypt($mobile)]));
                die;
            } else {
                echo json_encode(array('code' => '300', 'error_code' => '9998','error_message'=>'验证码发发送失败','time'=>date('Y-m-d H:i:s'),'message'=>'failed'));
                die;
            }
        }
    }

}