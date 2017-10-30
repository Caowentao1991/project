<?php
include 'lanewechat.php';
use LaneWeChat\Core\Wechat;
use LaneWeChat\Core\WeChatOAuth;
use LaneWeChat\Core\UserManage;
defined('BASEPATH') OR exit('No direct script access allowed');
class Web_class
{
    function __construct(){

    }

    public function web()
    {
        //第一步，获取CODE
        echo WeChatOAuth::getCode('https://weui.io/', 1, 'snsapi_userinfo');die;
        //此时页面跳转到了http://www.lanecn.com/index.php，code和state在GET参数中。
        $code = $_GET['code'];
        //第二步，获取access_token网页版
        $openId = WeChatOAuth::getAccessTokenAndOpenId($code);
        //第三步，获取用户信息
        $userInfo = UserManage::getUserInfo($openId['openid']);

        return $userInfo;
    }

    public function checkSignature()
    {
        $wechat = new WeChat(WECHAT_TOKEN, TRUE);

        return $wechat->checkSignature();
//        return $wechat->run();
    }

    public function get()
    {
        $code = \LaneWeChat\Core\WeChatOAuth::getCode();
        return $code;
    }
}