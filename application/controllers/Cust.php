<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cust extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('AES');
    }

    public function identity()
    {
        $this->load->model('Cust_model','cust');
        $identify = $this->input->get_post('identity');
        $custNo   = $_COOKIE['userId'];

        if(empty($custNo)){
            header('HTTP/1.1 401 Unauthorized');
            $result['code']     = 401;
            $result['message']  = 'Unauthorized';
            $result['error_code'] = 401;
            $result['data']       = [];
            $result['time'] = date('Y-m-d H:i:s');
            $result['error_message'] = 'Unauthorized';
            echo json_encode($result,true);
            die;
        }else{
            if($this->cust->update(['indent'=>$identify,'is_identity'=>'1'],['custNo'=>$custNo])){
                $result['code']     = 200;
                $result['message']  = 'OK';
                $result['error_code'] = 0;
                $result['data']       = [];
                $result['time'] = date('Y-m-d H:i:s');
                $result['error_message'] = '';
                echo json_encode($result,true);
            }
        }
    }


    public function info(){
        $custNo   = isset($_COOKIE['userId']) ? $_COOKIE['userId'] : '';
        if(empty($custNo)){
            header('HTTP/1.1 401 Unauthorized');
            $result['code']     = 401;
            $result['message']  = 'Unauthorized';
            $result['error_code'] = 401;
            $result['data']       = [];
            $result['time'] = date('Y-m-d H:i:s');
            $result['error_message'] = 'Unauthorized';
            echo json_encode($result,true);
            die;
        }else{
            $this->load->model('Cust_model','cust');
            $one = $this->cust->get_one(['custNo'=>$custNo]);
            $result['code']     = 200;
            $result['message']  = 'OK';
            $result['error_code'] = 0;
            $result['data']       = [
                'indent'        =>$one['indent'],
                'is_username'   =>0,
                'mobile'        =>$one['mobile'],
                'realname'      =>'',
                'sex'           =>'男',
                'userAccount'   =>'0.00',
                'userScore'     =>0,
                'user_photo'    =>$one['user_photo'],
                'user_sign'     =>0,
                'username'      =>$one['user_name']
            ];
            $result['time'] = date('Y-m-d H:i:s');
            $result['error_message'] = '';
            echo json_encode($result,true);
        }
    }

    public function code(){
        $get                        = $_GET;
        $result['code']             = '200';
        $result['message']          = 'OK';
        $result['error_code']       = 0;
        $result['time']             = date('Y-m-d H:i:s');
        $result['error_message']    = '';
        try {
            $this->load->model('Sms_model', 'sms');
            $this->load->model('Cust_model', 'cust');
            if(!isset($get['sign'])){
                $result['error_code'] = '9997';
                throw new Exception('请先发送验证码');
            }
            if($get['sign'] != $this->aes->key16aes128ecbEncrypt($get['mobile'])){
                $result['error_code'] = '9999';
                throw new Exception('验签失败');
            }
            $one = $this->sms->get_one(['verifyCode'=>$get['code'],'mobile'=>$get['mobile'],'status'=>'0','type'=>'2']);

            if(empty($one)){
                $result['error_code'] = '9998';
                throw new Exception('验证码错误');
            }else{
                $this->sms->update(['status'=>1],['verifyCode'=>$get['code'],'mobile'=>$get['mobile'],'type'=>'2']);
                echo json_encode($result,true);
            }

        }catch (Exception $e){
            $result['error_message'] = $e->getMessage();
            $result['message'] = $e->getMessage();
            echo json_encode($result,true);
        }
    }

    public function password(){
        $post = $_POST;
        $result['code']             = '200';
        $result['message']          = 'OK';
        $result['error_code']       = 0;
        $result['time']             = date('Y-m-d H:i:s');
        $result['error_message']    = '';
        try {
            $this->load->model('Cust_model', 'cust');
            if(!isset($_COOKIE['userId'])){
                $result['error_code'] = '9996';
                throw new Exception('登录超时，请重新登录');
            }
            $userId = $_COOKIE['userId'];
            if($this->cust->update(['password'=>$post['password']],['custNo'=>$userId])){
                echo json_encode($result,true);
                die;
            }else{
                $result['error_code'] = '9995';
                throw new Exception('更新失败');
            }

        }catch (Exception $e){
            $result['error_message'] = $e->getMessage();
            $result['message'] = $e->getMessage();
            echo json_encode($result,true);
        }
    }

}