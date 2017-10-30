<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends ADMIN_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

    }

    public function index()
    {
        if(empty($this->session->get_userdata()['logged_in'])){
            redirect('/action/login','refresh');
        }
        $userdata = $this->session->userdata();
        $data['username'] = $userdata['adm_username'];
        $data['id']       = $userdata['id'];

        $this->load->view('layout/main',$data);
    }
}
