<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function index(){
        $this->load->view('Product');
    }
    public function result()
    {
        $this->load->view('product/result');
    }
}
