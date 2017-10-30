<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataReport extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('admin_model', 'admin');
        $this->load->model('datareport_model', 'datareport');
        $this->load->model('dailydata_model', 'dailydata');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('common');
    }


    public function registerSituation()
    {
        set_time_limit(0);
        $params = array('choiceDay'=>'','choiceWeek'=>'','place'=>'');
        $data = array('today'=>'','yestoday'=>'','place'=>'');

        if($this->input->get_post('dayNum')){
            $params['choiceDay']    = $this->input->get_post('dayNum');
            $params['place']        = $this->input->get_post('place');
            $return = array(
                "referer" => "DataReport/registerSituation?".http_build_query($params),
                "refresh" => true,
                "state"   => "success",
                "message" => "提交成功"
            );
            echo json_encode($return);die;

        }else if($this->input->get_post('weekNum')) {
            $params['choiceWeek'] = $this->input->get_post('weekNum');
            $params['place'] = $this->input->get_post('place');
            $return = array(
                "referer" => "DataReport/registerSituation?" . http_build_query($params),
                "refresh" => true,
                "state" => "success",
                "message" => "提交成功"
            );
            echo json_encode($return);die;

        }else if($this->input->get_post('choiceDay')) {

            $data['today'] = $this->input->get_post('choiceDay');
            $data['yestoday'] = date('Y-m-d', strtotime($data['today'].'-1 day'));
            $data['place']    = $this->input->get_post('place');
            $result['part'] = $this->datareport->registerSituationPart($data['today'], $data['yestoday'], $data['place']);
            $result['total'] = $this->datareport->registerSituationTotal($data['today'], $data['yestoday'], $data['place']);

        }else if($this->input->get_post('choiceWeek')) {
            $data['today'] = weekdayAdv($this->input->get_post('choiceWeek'))['end'];
            $data['yestoday'] = weekdayAdv($this->input->get_post('choiceWeek'))['start'];

            $data['place']    = $this->input->get_post('place');
            $result['part'] = $this->datareport->registerSituationPart($data['today'], $data['yestoday'], $data['place']);
            $result['total'] = $this->datareport->registerSituationTotal($data['today'], $data['yestoday'], $data['place']);

        }else {
            $data['today'] = date('Y-m-d');
            $data['yestoday'] = date('Y-m-d', strtotime('-1 day'));
            $result['part'] = $this->datareport->registerSituationPart($data['today'], $data['yestoday'], $data['place']);
            $result['total'] = $this->datareport->registerSituationTotal($data['today'], $data['yestoday'], $data['place']);
        }



        $this->load->view('datareport/registerSituation',$result);
    }

    public function applySuccess()
    {
        set_time_limit(0);
        $params = array();
        $data   = array();


        if($this->input->get_post('dayStart')&&$this->input->get_post('dayEnd')) {
            $params['choiceStart'] = $this->input->get_post('dayStart');
            $params['choiceEnd'] = $this->input->get_post('dayEnd');
            $params['place'] = $this->input->get_post('place');
            $return = array(
                "referer" => "DataReport/applySuccess?" . http_build_query($params),
                "refresh" => true,
                "state" => "success",
                "message" => "提交成功"
            );
            echo json_encode($return);
            die;
        }else if($this->input->get_post('choiceStart')){
            $data['today'] = $this->input->get_post('choiceEnd');
            $data['yestoday'] = $this->input->get_post('choiceStart');
            $data['place'] = $this->input->get_post('place');

            $result['finish']    = $this->datareport->applySuccess($data['today'],$data['yestoday'],$data['place']);
        }else{
            $data['today'] = date('Y-m-d');
            $data['yestoday'] = date('Y-m-d', strtotime('-1 day'));
            $result['finish']    = $this->datareport->applySuccess($data['today'],$data['yestoday'],'');
        }


        $this->load->view('datareport/applySuccess',$result);
    }

    public function overdueSituation()
    {
        set_time_limit(0);
        $params = array();
        $data   = array();


        if($this->input->get_post('dayStart')&&$this->input->get_post('dayEnd')) {
            $params['choiceStart'] = $this->input->get_post('dayStart');
            $params['choiceEnd'] = $this->input->get_post('dayEnd');
            $params['place'] = $this->input->get_post('place');
            $return = array(
                "referer" => "DataReport/overdueSituation?" . http_build_query($params),
                "refresh" => true,
                "state" => "success",
                "message" => "提交成功"
            );
            echo json_encode($return);
            die;
        }else if($this->input->get_post('choiceStart')){
            $data['today'] = $this->input->get_post('choiceEnd');
            $data['yestoday'] = $this->input->get_post('choiceStart');
            $data['place'] = $this->input->get_post('place');

            $result['overdue'] = $this->datareport->finishoverdueSituation($data['today'],$data['yestoday'],'');
        }else{
            $data['today'] = date('Y-m-d');
            $data['yestoday'] = date('Y-m-d', strtotime('-1 day'));
            $result['overdue'] = $this->datareport->finishoverdueSituation($data['today'],$data['yestoday'],'');
        }


        $this->load->view('datareport/overdueSituation',$result);
    }

    public function dailyReport()
    {
        set_time_limit(0);
        $params = array('date'=>'','place'=>'');
        $total = '';

        $this->load->config('dailydata');

        $data['area'] = array();
        $data['finally'] = array();






        if($this->input->get_post('registerTime')) {
            $params['date'] = $this->input->get_post('registerTime');
            $params['place'] = $this->input->get_post('place');
            $return = array(
                "referer" => "DataReport/dailyReport?".http_build_query($params),
                "refresh" => true,
                "state"   => "success",
                "message" => "提交成功"
            );
            echo json_encode($return);die;
        }elseif($this->input->get_post('date')&&empty($this->input->get_post('place'))) {
            $params['date'] = $this->input->get_post('date');
            $params['place'] = $this->input->get_post('place');
            $data = $this->datareport->registerinfo($params['date'], $params['place']);
            $data['moneyRate'] = $this->datareport->moneyRate($params['date']);

            $data['overDue']   = $this->datareport->overDue($params['date']);
            $data['finish']    = $this->datareport->finish($params['date'],$params['place']);
            $data['area'] = $this->dailydata->getData();
            $data['transfer']   = $this->datareport->transfer($params['date']);
        }elseif($this->input->get_post('date')&&!empty($this->input->get_post('place'))){
            $params['date'] = $this->input->get_post('date');
            $params['place'] = $this->input->get_post('place');
            $data = $this->datareport->registerinfo($params['date'], $params['place']);
            $data['moneyRate'] = '';
            $data['overDue']   = '';
            $data['finish']    = '';
            $data['transfer']   = $this->datareport->transfer($params['date']);
        }else{
            $data = $this->datareport->registerinfo($params['date'], $params['place']);
            $data['moneyRate'] = $this->datareport->moneyRate($params['date']);

            $data['overDue']   = $this->datareport->overDue($params['date']);
            $data['finish']    = $this->datareport->finish($params['date'],$params['place']);
            $data['area'] = $this->dailydata->getData();
            $data['transfer']   = $this->datareport->transfer($params['date']);

        }

        if(!empty($data['area'])){
            foreach ($data['area'] as $k=>$v){

                $decode = json_decode($v['jsonData'],true);
                $data['finally']['day'][] = $v['time'];
                $data['finally']['one'][] = $decode['one']['finish'];
                $data['finally']['two'][] = $decode['three']['finish'];
                $data['finally']['three'][] = $decode['five']['finish'];
                $data['finally']['four'][] = $decode['extra']['finish'];
            }
        }

        $this->load->view('datareport/dailyreport',$data);
    }

    public function weeklyReport()
    {
        set_time_limit(0);
        $params = array('week'=>'','place'=>'');
        $week   = thisweek();
        if($this->input->get_post('registerTime')) {
            $params['week'] = $this->input->get_post('registerTime');
            $params['place'] = $this->input->get_post('place');
            $return = array(
                "referer" => "DataReport/weeklyReport?".http_build_query($params),
                "refresh" => true,
                "state"   => "success",
                "message" => "提交成功"
            );
            echo json_encode($return);die;
        }elseif($this->input->get_post('week')&&empty($this->input->get_post('place'))) {

            $params['week'] = $this->input->get_post('week');
            $params['place'] = $this->input->get_post('place');

            $week = weekday($params['week']);

            $data = $this->datareport->registerinfoWeek($week['end'],$week['start'], $params['place']);
            $data['moneyRate'] = $this->datareport->moneyRateWeek($week['end'],$week['start']);
            $data['overDue']   = $this->datareport->overDueWeek($week['end'],$week['start']);
            $data['finish']    = $this->datareport->finishWeek($week['end'],$week['start'],$params['place']);
        }elseif($this->input->get_post('week')&&!empty($this->input->get_post('place'))){
            $params['week'] = $this->input->get_post('week');
            $params['place'] = $this->input->get_post('place');

            $week = weekday($params['week']);

            $data = $this->datareport->registerinfoWeek($week['end'],$week['start'], $params['place']);
            $data['moneyRate'] = '';
            $data['overDue']   = '';
            $data['finish']    = '';
        }else{

            $data = $this->datareport->registerinfoWeek($week['end'],$week['start'], $params['place']);
            $data['moneyRate'] = $this->datareport->moneyRateWeek($week['end'],$week['start']);
            $data['overDue']   = $this->datareport->overDueWeek($week['end'],$week['start']);
            $data['finish']    = $this->datareport->finishWeek($week['end'],$week['start'],$params['place']);
        }

        $this->load->view('datareport/weeklyreport',$data);
    }

    public function channelCost()
    {
        $this->load->view();
    }

    public function afterLoanOverdue()
    {
        $this->load->view();
    }
}