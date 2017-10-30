<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller
{

    public function subjects(){
        $result = '{"code":200,"message":"OK","data":[{"src":"http://image.sudaizhijia.com/production/20171020/banner/20171020130851-921.jpg","app_url":"http://event.sudaizhijia.com/m/activity6.28.3/index.html","h5_link":"http://event.sudaizhijia.com/m/activity6.28.3/index.html","name":"没有工作也能贷","footer_img_h5_link":""},{"src":"http://image.sudaizhijia.com/production/20171020/banner/20171020130831-706.jpg","app_url":"http://event.sudaizhijia.com/m/activity6.28.5/index.html","h5_link":"http://event.sudaizhijia.com/m/activity6.28.5/index.html","name":"有芝麻分就能贷","footer_img_h5_link":""},{"src":"http://image.sudaizhijia.com/production/20171020/banner/20171020131138-666.jpg","app_url":"http://event.sudaizhijia.com/m/activity6.28.2/index.html","h5_link":"http://event.sudaizhijia.com/m/activity6.28.2/index.html","name":"10分钟下款","footer_img_h5_link":""},{"src":"http://image.sudaizhijia.com/production/20171020/banner/20171020105349-998.jpg","app_url":"http://event.sudaizhijia.com/m/activity6.28.4/index.html","h5_link":"http://event.sudaizhijia.com/m/activity6.28.4/index.html","name":"低息都在这","footer_img_h5_link":""},{"src":"http://image.sudaizhijia.com/production/20171020/banner/20171020131103-318.jpg","app_url":"http://event.sudaizhijia.com/m/activity6.28.1/index.html","h5_link":"http://event.sudaizhijia.com/m/activity6.28.1/index.html","name":"高通过率","footer_img_h5_link":""}],"error_code":0,"error_message":"","time":"2017-10-24 16:23:44"}';
        echo $result;
    }


    public function special(){
        $result = '{"code":200,"message":"OK","data":{"list":[{"src":"http://image.sudaizhijia.com/production/20170809/banner/20170809201629-415.png","app_link":"","h5_link":"","title":"身份证就能贷","id":108,"type_nid":"","payback_type":""},{"src":"http://image.sudaizhijia.com/production/20170809/banner/20170809201621-149.png","app_link":"","h5_link":"","title":"淘宝/京东","id":109,"type_nid":"","payback_type":""},{"src":"http://image.sudaizhijia.com/production/20170809/banner/20170809201611-529.png","app_link":"","h5_link":"","title":"有信用卡就能贷","id":111,"type_nid":"","payback_type":""},{"src":"http://image.sudaizhijia.com/production/20170809/banner/20170809201601-841.png","app_link":"","h5_link":"","title":"代还信用卡","id":112,"type_nid":"creditcard_payback","payback_type":"creditcard_payback"},{"src":"http://image.sudaizhijia.com/production/20170809/banner/20170809201553-641.png","app_link":"","h5_link":"","title":"不查征信","id":114,"type_nid":"","payback_type":""},{"src":"http://image.sudaizhijia.com/production/20170809/banner/20170809201537-819.png","app_link":"","h5_link":"","title":"大额贷款","id":115,"type_nid":"","payback_type":""}],"hot_img":""},"error_code":0,"error_message":"","time":"2017-10-24 16:23:12"}';
        echo $result;
    }
}