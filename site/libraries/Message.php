<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Message
{

    public $sms_mername;
    public $sms_keycode;
    public $sms_url;
    public $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->helper('common');
        $this->sms_mername = "tongniu";
        $this->sms_keycode = 'sdfjio235415asdf';
        $this->sms_url = "http://sms.taicredit.com:9111/index.php/message/";
    }

    public function sendmessage($mobile,$content,$ssid)
    {
        $normal_data = array(
            'mername' => $this->sms_mername,
            'keycode' => $this->sms_keycode,
            'business_type' => '1',
            'mobile' => $mobile,
            'content' => $content,
            'ssid' => $ssid
        );

        $normal_data['mername'] = base64_encode(urlencode($normal_data['mername']));
        $normal_data['keycode'] = base64_encode(urlencode($normal_data['keycode']));
        $normal_data['mobile'] = base64_encode(urlencode($normal_data['mobile']));
        $normal_data['content'] = base64_encode(urlencode($normal_data['content']));

        $url = $this->sms_url.'sendSmsSingle?';
        foreach ($normal_data as $k=>$v) {
            $url .= $k."=".$v."&";
        }
        $response = $this->curl_get($url);
        $response = json_decode($response, true);
        return $response;
    }



    public  function curl_get($url){

        $testurl = $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $testurl);
        //参数为1表示传输数据，为0表示直接输出显示。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //参数为0表示不带头文件，为1表示带头文件
        curl_setopt($ch, CURLOPT_HEADER,0);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


}