<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audojob extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('audojob_model','audojob');

    }

    /**
     * @return object
     */
    public function dailyReport()
    {
        $hour = date('H',time());
        $minute = date('i',time());
        if($minute == '01') {
            if ($hour >='08' && $hour <='21') {
                $result1 = $this->audojob->zcl();
                $result2 = $this->audojob->sqqk();
                $result3 = $this->audojob->fdyh();
                $result4 = $this->audojob->drfk();
                $result5 = $this->audojob->ttbj();
                $result6 = $this->audojob->qtbj();
                $result7 = $this->audojob->dyfkqk();
                $result4['transfermoney'] = is_null($result4['transfermoney']) ? 0 : $result4['transfermoney'];

                $url = 'https://oapi.dingtalk.com/robot/send?access_token=f7912c27912b2df22b4e8cf88cf7a2fb5c6cf2cbf3f7785e5288c17a0ebca1bf';

                $params = "{
            'msgtype':'markdown',
            'markdown':{
              'title':'当日统计',
              'text' : ' - **当日注册情况**\n\n > 当日注册量：" . $result1['register'] . "\n\n > 截至目前较前日注册量累计增幅：".$result5['rate']."\n\n > 较前日同时段注册量增幅：".$result6['time']." ".$result6['rate']."\n\n - **当日申请情况**\n\n > 当日总申请量：" . $result2['apply'] . "\n\n > 当日审核通过量：" . $result2['audit'] . "\n\n > 当日审核通过率：" . $result2['auditrate'] . "\n\n - **当日复贷用户申请情况** \n\n > 当日复借提交申请人数：" . $result3['tjapply'] . "\n\n > 复借申请通过人数：" . $result3['reloan'] . "\n\n > 复借通过率：" . $result3['reloanrate'] . "\n\n - **当日放款情况**\n\n > 当日放款笔数：" . $result4['transfer'] . "\n\n > 当日放款金额：" . $result4['transfermoney'] . "\n\n - **当月放款情况** \n\n > 放款笔数：".$result7['bs']."\n\n > 放款金额：".$result7['je']."'}}";


                $res = curl_api($url, $params, 'POST', 'JSON');
                $this->log->write_log('debug', 'dingtalk************' . $res . '************', true);
            }
        }elseif($hour == '00' && $minute == '05'){
            set_time_limit(0);
            $date = !isset($_GET['date']) ? date('Y-m-d') :$_GET['date'];
            $this->load->model('datareport_model', 'datareport');
            $this->load->model('dailydata_model', 'dailydata');

            $items = $this->datareport->finish($date, '', true);
            $this->db->query('insert into dailydata set time = ' . "'" . date("Y-m-d",(strtotime($date) - 3600*24)) . "'" . ',jsonData = ' . "'" . json_encode($items) . "'");

        }
        $this->log->write_log('debug', 'dingtalk************' . 'test' . '************', true);
    }

}