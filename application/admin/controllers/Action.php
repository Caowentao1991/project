<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('admin_model','admin');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('common');

    }


    public function index(){

        if(empty($this->session->get_userdata()['logged_in'])){
            redirect('/action/login','refresh');
        }

        $userdata = $this->session->get_userdata();
        $this->load->view('index/index',array('userinfo'=>$userdata));
    }

    public function login(){

        if(!empty($_POST)){

            $name = $_POST['admin'];
            $password = $_POST['password'];
            $r = $this->admin->dologin($name,$password);

            if(!empty($r)){

                if(!empty($_POST['url'])){
                    redirect($_POST['url'],'refresh');
                }else{
                    redirect(site_url('layout/index'),'refresh');
                }
            }else{
                redirect(site_url('action/login'),'refresh');
            }
        }

        $this->load->view('login');
    }

    public function logout(){
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $info = $this->session->get_userdata();

        $this->admin->update(['logout_time' => date('Y-m-d H:i:s',time())],['id' => $info['id']]);
        $this->session->sess_destroy();

        //清除cookie
        setcookie("ci_session","",time()-1);
        echo json_encode(array(
            'referer' => 'http://'.$_SERVER['HTTP_HOST'].'/admin',
            'refresh' => true,
            'state' => 'success',
            'message' => '提交成功',
        ));
    }

    public function selectUserByCity(){
        $city = $_POST['city'];
        $r = $this->admin->getAll('city = "'.$city.'"');
        echo json_encode($r);
    }

    /**
     *
     */
    public function saveDailyData()
    {
        set_time_limit(0);
        $date = !isset($_GET['date']) ? date('Y-m-d',time()-60*60*24) :$_GET['date'];
        $file_path = '/dailydata.php';

        $this->load->model('datareport_model', 'datareport');

        $items = $this->datareport->finish($date,'',true);
        $data = '$config["date"]["'.$date.'"] = '."'".json_encode($items)."';";
        write_config( $file_path, "\n".$data ,'a');




//        if ( $items ) {
//            foreach ( $items as $k=>$item ){
//                $id		= $item['id'];
//
//                $data .= "\n\t\t\t" . $id . " => array(";
//                $data .= "'id'=>{$id}, ";
//                $data .= "'parent_id'=>{$item['parent_id']}, ";
//                $data .= "'has_child'=>'{$item['has_child']}', ";
//                $data .= "'name'=>'{$item['name']}', ";
//                $data .= "'sort'=>{$item['sort']}, ";
//                $data .= "'is_display'=>'{$item['is_display']}', ";
//                $data .= "'intro'=>'{$item['intro']}'";
//                $data .= "),";
//            }
//        }
//        $data .= "\n\t\t);";



    }

    public function test()
    {

        $this->load->config('dailydata');
        $date = $this->config->item('date');
        var_dump($date['2017-06-07']);die;

    }

    /**
     * @return object
     */
    public function saveData()
    {

        set_time_limit(0);
        $date = !isset($_GET['date']) ? date('Y-m-d') :$_GET['date'];
        $this->load->model('datareport_model', 'datareport');
        $this->load->model('dailydata_model', 'dailydata');

        $items = $this->datareport->finish($date, '', true);
        $this->db->query('insert into dailydata set time = ' . "'" . date("Y-m-d",(strtotime($date) - 3600*24)) . "'" . ',jsonData = ' . "'" . json_encode($items) . "'");

    }
}
