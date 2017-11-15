<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('AES');
    }

    public function Login(){
        $post = $_POST;
        $result['code']     = '200';
        $result['message']  = 'OK';
        $result['error_code'] = 0;
        $result['time'] = date('Y-m-d H:i:s');
        $result['error_message'] = '';
        try{
            $this->load->model('Cust_model','cust');
            $custinfo = $this->cust->get_one(['user_name'=>$post['mobile']]);
            if(empty($custinfo)){
                $result['error_code'] = 1;
                throw new Exception('该用户不存在!');
            }else{
                if(empty($custinfo['password'])){
                    $this->cust->update(['login_date'=>date('Y-m-d'),'password'=>$post['password'],'accessToken'=>md5($post['mobile'].time())],['user_name'=>$post['mobile']]);
                    $result['data']['custNo']           = $custinfo['custNo'];
                    $result['data']['indent']           = $custinfo['indent'];
                    $result['data']['user_name']        = $custinfo['user_name'];
                    $result['data']['mobile']           = $custinfo['mobile'];
                    $result['data']['accessToken']      = md5($post['mobile'].time());
                    $result['data']['user_photo']       = $custinfo['user_photo'];
                    $result['data']['activated']        = $custinfo['activated'];
                    $result['data']['is_identity']      = $custinfo['is_identity'];
                    set_cookie('userId',$custinfo['custNo'],time()+60*60*2);
                }else if($custinfo['password'] != $post['password']){
                    $result['error_code'] = 9000;
                    throw new Exception('密码输入不正确!');
                }else{
                    $this->cust->update(['login_date'=>date('Y-m-d'),'accessToken'=>md5($post['mobile'].time())],['user_name'=>$post['mobile']]);
                    $result['data']['custNo']           = $custinfo['custNo'];
                    $result['data']['indent']           = $custinfo['indent'];
                    $result['data']['user_name']        = $custinfo['user_name'];
                    $result['data']['mobile']           = $custinfo['mobile'];
                    $result['data']['accessToken']      = md5($post['mobile'].time());
                    $result['data']['user_photo']       = $custinfo['user_photo'];
                    $result['data']['activated']        = $custinfo['activated'];
                    $result['data']['is_identity']      = $custinfo['is_identity'];
                    set_cookie('userId',$custinfo['custNo'],time()+60*60*2);
                }
            }
            echo json_encode($result,true);
        }catch (Exception $e){
            $result['error_message']    = $e->getMessage();
            $result['message']          = $e->getMessage();
            echo json_encode($result,true);
        }
    }

    public function quicklogin(){
        $post = $_POST;
        $result['code']     = '200';
        $result['message']  = 'OK';
        $result['error_code'] = 0;
        $result['time'] = date('Y-m-d H:i:s');
        $result['error_message'] = '';
        try{
            $this->load->model('Sms_model','sms');
            $this->load->model('Cust_model','cust');
            if($post['sign'] != $this->aes->key16aes128ecbDecrypt($post['mobile'])){
                $result['error_code'] = '9999';
                throw new Exception('验签失败');
            }
            $one = $this->sms->get_one(['verifyCode'=>$post['code'],'mobile'=>$post['mobile'],'status'=>'0','type'=>'1']);

            if(empty($one)){
                $result['error_code'] = '9998';
                throw new Exception('验证码错误');
            }else{
                $this->sms->update(['status'=>1],['verifyCode'=>$post['code'],'mobile'=>$post['mobile'],'type'=>'1']);
                $custinfo = $this->cust->get_one(['user_name'=>$post['mobile']]);
                if(empty($custinfo)){
                    if($this->cust->insert(['user_name'=>$post['mobile'],'mobile'=>$post['mobile'],'login_date'=>date('Y-m-d'),'accessToken'=>md5($post['mobile'].time())])){

                        $insert_id = $this->db->insert_id();
                        $result['data']['custNo']       = $insert_id;
                        $result['data']['data']['indent']       = null;
                        $result['data']['user_name']    = $post['mobile'];
                        $result['data']['mobile']       = $post['mobile'];
                        $result['data']['accessToken']  = md5($post['mobile'].$post['code']);
                        $result['data']['user_photo']   = null;
                        $result['data']['activated']    = 1;
                        $result['data']['is_identity']  = 0;
                        set_cookie('userId',$insert_id,time()+60*60*2);
                    }else{
                        $result['error_code'] = '9996';
                        throw new Exception('登录失败');
                    }
                }else{
                    $this->cust->update(['login_date'=>date('Y-m-d'),'accessToken'=>md5($post['mobile'].time())],['user_name'=>$post['mobile']]);
                    $result['data']['custNo']           = $custinfo['custNo'];
                    $result['data']['indent']           = $custinfo['indent'];
                    $result['data']['user_name']        = $custinfo['user_name'];
                    $result['data']['mobile']           = $custinfo['mobile'];
                    $result['data']['accessToken']      = md5($post['mobile'].$post['code']);
                    $result['data']['user_photo']       = $custinfo['user_photo'];
                    $result['data']['activated']        = $custinfo['activated'];
                    $result['data']['is_identity']      = $custinfo['is_identity'];
                    set_cookie('userId',$custinfo['custNo'],time()+60*60*2);
                }
                echo json_encode($result,true);
            }

        }catch(Exception $e){
            $result['error_message'] = $e->getMessage();
            $result['message'] = $e->getMessage();
            echo json_encode($result,true);
        }


    }

}