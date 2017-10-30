<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class userlib {
    public $user;
    public $input;
    public $session;

    function __construct() {
        $CI = &get_instance();
        $CI->load->model('user_model','user');
        $CI->load->library('session');
        $this->user = $CI->user;
        $this->input = $CI->input;
        $this->session = $CI->session;
    }

    public function getUserInfo()
    {
        return array(
            'ip_address' => isset($this->session->userdata['ip_address'])?$this->session->userdata['ip_address']:'',
            'user_data' => isset($this->session->userdata['user_data'])?$this->session->userdata['user_data']:'',
            'uid' => isset($this->session->userdata['uid'])?$this->session->userdata['uid']:'',
            'username' => isset($this->session->userdata['username'])?$this->session->userdata['username']:'',
            'status' => isset($this->session->userdata['status'])?$this->session->userdata['status']:'',
        );
    }

    public function identify($data)
    {
        $info = $this->user->get_one($data);

        $data = array(
            'uid'  => $info['id'],
            'username'  => $info['telphone'],
            'status'    => 1
        );

        $this->session->set_userdata($data);
    }

    public function checklogin()
    {
        if(isset($this->session->userdata['status'])){
            $status = $this->session->userdata['status'];
            if($status){
                return true;
            }else{
                return false;
            }
        }
    }

    public function login($data){
        $zd = isset($data['zd'])?1:0;
        $info = $this->user->getbyUser($data['user']);
        if(empty($info)){
            $vdata['code'] = 1;
            $vdata['msg'] = "该手机号未注册";
        }else{
            if($info['status']){
                if(md5($data['password'])!=$info['password']){
                    $vdata['code'] = 2;
                    $vdata['msg'] = "密码错误";
                }else{
                    $vdata['code'] = 3;
                    $vdata['msg'] = "登录成功，欢迎光临！";

                    $data = array(
                        'uid'  => $info['id'],
                        'username'  => $info['user'],
                        'status'    => 1
                    );

                    $this->session->set_userdata($data);
                    $salt = 'caichulaishishabi';
                    $userinfo = serialize(['uid'=>$data['uid'],'username'=>$data['username']]);
                    $this->input->set_cookie("userinfo",base64_encode($userinfo),60*60*24+60*60*7*$zd);
                    $this->input->set_cookie("_info",md5($userinfo.$salt),60*60*24+60*60*7*$zd);
                }
            }else{
                $vdata['code'] = 4;
                $vdata['msg'] = "账号异常或被禁用";
            }
        }

        return $vdata;
    }
}