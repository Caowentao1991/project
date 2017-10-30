<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Role_model', 'role');
        $this->load->model('Node_model', 'node');
        $this->load->model('Access_model', 'access');
        $this->load->model('admin_model', 'admin');
        $this->load->model('config_model');
        $this->load->model('User_config_model', 'user_config');
        $this->load->model('Channel_sales_model', 'channel_sales');
        $this->load->library('session');
        $this->load->helper('url');

        if (empty($this->session->get_userdata()['logged_in'])) {
            echo 'OUT';
            die;
        }

    }

    public function export()
    {
        $this->load->view('collection/export');
    }

    public function riskCaseUpload(){
        ini_set('memory_limit',-1);
        set_time_limit(0);
        $this->load->model('Collection_model','Collection');
        $scene_id = $this->input->get_post('scene_id');
        if(empty($scene_id)){
            echo 'OUT';
        }
        $list = $this->Collection->getAll($scene_id);
        if(empty($list)){
            echo '<script language="javascript" type="text/javascript">alert("原始数据为空");window.opener=null;window.open("","_self");window.close();</script>';die;
        }
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
        $fields = array(
            'id'=>'ID',
            'name'=>'姓名',
            'gender'=>'性别',
            'identify'=>'证件号码',
            'tel'=>'手机号码',
            'residence'=>'用户属地',
            'risk'=>'风险等级',
            'islost'=>'是否失联',
            'lostselect'=>'失联等级',
            'nnnn'=>'定级经办'
        );

        $col = 0;
        foreach ($fields as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
        $row = 2;
        foreach($list as $key => $data)
        {
            $col = 0;
            foreach ($fields as $k => $field)
            {

                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row," ".(empty($data[$k])?'':$data[$k]));
                $col++;
            }

            $row++;
        }

        $objPHPExcel->setActiveSheetIndex(0);
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
        $area = $scene_id == '100001' ? '手机分期' : '现金贷';
        //发送标题强制用户下载文件
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=风险案件上报表('.$area.')'.date('Y-m-d').'.xls');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
    }

    public function repay(){

        $this->load->model('Collection_model','Collection');
        if($this->input->get_post('getDate')){
            $params['date'] = $this->input->get_post('getDate');
            $return = array(
                "referer" => "collection/repay?".http_build_query($params),
                "refresh" => true,
                "state"   => "success",
                "message" => "提交成功"
            );
            echo json_encode($return);die;
        }elseif($this->input->get_post('date')) {
            $date = $this->input->get_post('date');
        }else{
            $date = date('Y-m-d');
        }
        $result = $this->Collection->getRpay($date);

        $this->load->view('collection/repay',['result'=>$result]);
    }

    public function distributionAndReturn(){

        $this->load->model('Collection_model','Collection');
        if($this->input->get_post('getDate')){
            $params['date'] = $this->input->get_post('getDate');
            $return = array(
                "referer" => "collection/distributionAndReturn?".http_build_query($params),
                "refresh" => true,
                "state"   => "success",
                "message" => "提交成功"
            );
            echo json_encode($return);die;
        }elseif($this->input->get_post('date')) {
            $date = $this->input->get_post('date');
        }else{
            $date = date('Y-m-d');
        }
        $result = $this->Collection->getDistributionAndReturn($date);

        $this->load->view('collection/distributionAndReturn',['result'=>$result]);
    }

}