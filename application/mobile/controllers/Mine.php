<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mine extends CI_Controller {

    public function index(){

        $this->load->view('Mine/index');
    }

    public function Mine_change_indent(){

        $this->load->view('Mine/mine_change_indent');
    }

    public function Mine_personal_setup(){

        $this->load->view('Mine/mine_personal_setup');
    }

    public function Mine_aboutour(){

        $this->load->view('Mine/mine_aboutour');
    }
    public function Mine_changemima2(){

        $this->load->view('Mine/mine_changemima2');
    }

    public function Cooperation(){

        $this->load->view('Mine/cooperation');
    }
    public function Mine_changemima3(){

        $this->load->view('Mine/mine_changemima3');
    }

}
