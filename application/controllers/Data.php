<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function activeuser(){
        $result['code']     = 200;
        $result['message']  = 'OK';
        $result['error_code'] = 0;
        $result['data']       = [];
        $result['time'] = date('Y-m-d H:i:s');
        $result['error_message'] = '';
        echo json_encode($result,true);
    }
}