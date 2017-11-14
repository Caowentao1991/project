<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cust extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
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
                'mobile'        =>substr($one['mobile'],0,3).'****'.substr($one['mobile'],7,4),
                'realname'      =>'',
                'sex'           =>'男',
                'userAccount'   =>'0.00',
                'userScore'     =>0,
                'user_photo'    =>$one['user_photo'],
                'user_sign'     =>0,
                'username'      =>substr($one['mobile'],0,3).'****'.substr($one['mobile'],7,4)
            ];
            $result['time'] = date('Y-m-d H:i:s');
            $result['error_message'] = '';
            echo json_encode($result,true);
        }
    }

}