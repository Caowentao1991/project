<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('common');
        $this->load->model('Role_model','role');
        $this->load->model('Node_model','node');
        $this->load->model('Access_model','access');
        $this->load->model('admin_model','admin');
        $this->load->model('Channel_sales_model','channel_sales');
        $this->load->library('session');
        $this->load->helper('url');

        if(empty($this->session->get_userdata()['logged_in'])){
            echo 'OUT';die;
        }

    }


}
