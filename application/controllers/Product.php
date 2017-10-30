<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function recommends()
    {
        $this->load->model('Product_model','product');
        $result = array();
        $result['code']     = '200';
        $result['message']  = 'OK';
        $result['error_code'] = 0;
        $result['time'] = date('Y-m-d H:i:s');
        $result['error_message'] = '';
        $list = $this->product->getAll();

        foreach ($list as $key => $value){
            $money_rate = explode(',',str_replace('元','',$value['loan_money']));
            $list[$key]['loan_max'] = max($money_rate) >= 10000 ? max($money_rate) / 10000 . '万' : max($money_rate);
            $list[$key]['loan_min'] = min($money_rate) >= 10000 ? min($money_rate) / 10000 . '万' : min($money_rate);
            $list[$key]['terminal_type'] = '0';
            $list[$key]['success_rate'] = $value['success_rate'] * 100 . '%';
            $list[$key]['product_logo'] = base_url().'static/Main/upload/product/'.$value['product_logo'];
        }
        $result['data']['list'] = $list;

        echo json_encode($result);
    }



    public function online(){
        $result = '{"code":200,"message":"OK","data":[{"platform_product_id":350,"platform_id":285,"platform_product_name":"借吧","product_logo":"http://image.sudaizhijia.com/production/20171024/platform/20171024145141-559.png","product_introduct":"10分钟放款，解决年轻人的贷款问题","update_date":"10月24日","create_date":"2017-10-24 16:06:37","tag_name":[{"name":"实名手机","font_color":"b39832","boder_color":"e3cd84","bg_color":"fef8de"},{"name":"一次还清","font_color":"e25a5a","boder_color":"f5c2c2","bg_color":"fbe8e8"}],"product_conduct":"通过筛选，成功入驻速贷之家"},{"platform_product_id":348,"platform_id":283,"platform_product_name":"钞好借","product_logo":"http://image.sudaizhijia.com/production/20171023/platform/20171023114600-422.png","product_introduct":"门槛更低、审核更快、有芝麻分就能下款","update_date":"10月23日","create_date":"2017-10-23 11:56:51","tag_name":[{"name":"实名手机","font_color":"b39832","boder_color":"e3cd84","bg_color":"fef8de"},{"name":"芝麻信用","font_color":"b39833","boder_color":"e3ce84","bg_color":"fef8de"},{"name":"一次还清","font_color":"e25a5a","boder_color":"f5c2c2","bg_color":"fbe8e8"}],"product_conduct":"通过筛选，成功入驻速贷之家"},{"platform_product_id":347,"platform_id":282,"platform_product_name":"小额通","product_logo":"http://image.sudaizhijia.com/production/20171020/platform/20171020142746-777.png","product_introduct":"5分钟审核，30秒放款","update_date":"10月20日","create_date":"2017-10-20 14:46:40","tag_name":[{"name":"实名手机","font_color":"b39832","boder_color":"e3cd84","bg_color":"fef8de"},{"name":"芝麻信用","font_color":"b39833","boder_color":"e3ce84","bg_color":"fef8de"},{"name":"一次还清","font_color":"e25a5a","boder_color":"f5c2c2","bg_color":"fbe8e8"}],"product_conduct":"通过筛选，成功入驻速贷之家"},{"platform_product_id":344,"platform_id":279,"platform_product_name":"极速分期","product_logo":"http://image.sudaizhijia.com/production/20171017/platform/20171017152057-183.png","product_introduct":"极速到账急您所急","update_date":"10月17日","create_date":"2017-10-17 15:36:30","tag_name":[{"name":"实名手机","font_color":"b39832","boder_color":"e3cd84","bg_color":"fef8de"},{"name":"一次还清","font_color":"e25a5a","boder_color":"f5c2c2","bg_color":"fbe8e8"}],"product_conduct":"通过筛选，成功入驻速贷之家"},{"platform_product_id":343,"platform_id":278,"platform_product_name":"信用白卡","product_logo":"http://image.sudaizhijia.com/production/20171017/platform/20171017131301-653.png","product_introduct":"最高1万，审核2分钟，放款3分钟","update_date":"10月17日","create_date":"2017-10-17 13:24:25","tag_name":[{"name":"实名手机","font_color":"b39832","boder_color":"e3cd84","bg_color":"fef8de"},{"name":"芝麻信用","font_color":"b39833","boder_color":"e3ce84","bg_color":"fef8de"},{"name":"一次还清","font_color":"e25a5a","boder_color":"f5c2c2","bg_color":"fbe8e8"}],"product_conduct":"通过筛选，成功入驻速贷之家"},{"platform_product_id":342,"platform_id":277,"platform_product_name":"易秒花","product_logo":"http://image.sudaizhijia.com/production/20171016/platform/20171016173238-854.png","product_introduct":"易秒花-秒借秒批用钱更方便","update_date":"10月16日","create_date":"2017-10-16 17:41:31","tag_name":[{"name":"实名手机","font_color":"b39832","boder_color":"e3cd84","bg_color":"fef8de"},{"name":"淘宝|京东","font_color":"b39731","boder_color":"e3cd84","bg_color":"fef8de"},{"name":"分期还款","font_color":"e25a5a","boder_color":"f5c2c3","bg_color":"fbe8e8"}],"product_conduct":"通过筛选，成功入驻速贷之家"},{"platform_product_id":340,"platform_id":275,"platform_product_name":"百胜钱包","product_logo":"http://image.sudaizhijia.com/production/20171013/platform/20171013164614-970.png","product_introduct":"急用钱找百胜高效，快速，简便，大额","update_date":"10月13日","create_date":"2017-10-13 16:51:13","tag_name":[{"name":"实名手机","font_color":"b39832","boder_color":"e3cd84","bg_color":"fef8de"},{"name":"芝麻信用","font_color":"b39833","boder_color":"e3ce84","bg_color":"fef8de"},{"name":"一次还清","font_color":"e25a5a","boder_color":"f5c2c2","bg_color":"fbe8e8"}],"product_conduct":"通过筛选，成功入驻速贷之家"},{"platform_product_id":338,"platform_id":273,"platform_product_name":"幸福钱包","product_logo":"http://image.sudaizhijia.com/production/20171019/platform/20171019172652-298.png","product_introduct":"幸福钱包，不为小钱而烦恼","update_date":"10月12日","create_date":"2017-10-12 18:03:32","tag_name":[{"name":"实名手机","font_color":"b39832","boder_color":"e3cd84","bg_color":"fef8de"},{"name":"芝麻信用","font_color":"b39833","boder_color":"e3ce84","bg_color":"fef8de"},{"name":"一次还清","font_color":"e25a5a","boder_color":"f5c2c2","bg_color":"fbe8e8"}],"product_conduct":"通过筛选，成功入驻速贷之家"}],"error_code":0,"error_message":"","time":"2017-10-24 16:20:57"}';

        echo $result;
    }

    public function calculator (){
        $result = array();
        $result['code']  = '200';

        $productId = $this->input->get_post('productId');
        if(is_null($productId)){
            $result['code']  = '300';
            $result['error_code'] = 1;
            $result['error_message'] = 'productId不存在';
            echo json_encode($result);
            die;
        }
        $this->load->model('Product_model','product');
        $this->load->model('Platform_model','platform');

        $one = $this->product->get_one(['platform_product_id'=>$productId],['avg_quota','interest_alg_num','interest_rate','loan_money','loan_term','pay_method','platform_id']);

        if(empty($one)){
            $result['code']  = '300';
            $result['error_code'] = 1;
            $result['error_message'] = 'product不存在';
            echo json_encode($result);
            die;
        }

        $money_rate     = explode(',',str_replace('元','',$one['loan_money']));
        $period_rate    = array();

        $one['loan_money'] = explode(',',$one['loan_money']);
        $one['loan_term']  = explode(',',$one['loan_term']);


        foreach ($one['loan_term'] as $k=>$v){
            if(strpos($v,'天')){
                $period_rate[] = str_replace('天','',$v) * 1;
            }else if(strpos($v,'个月')){
                $period_rate[] = str_replace('个月','',$v) * 30;
            }
        }

        $one['loan_min']   = (float)min($money_rate);
        $one['loan_max']   = (float)max($money_rate);
        $one['period_min'] = min($period_rate);
        $one['period_max'] = max($period_rate);

        $result['data'] = $one;
        $result['message']  = 'OK';
        $result['error_code'] = 0;
        $result['time'] = date('Y-m-d H:i:s');
        $result['error_message'] = '';
        echo json_encode($result);


    }

    public function detail () {
        $result = array();
        $result['code']  = '200';

        $productId = $this->input->get_post('productId');
        if(is_null($productId)){
            $result['code']  = '300';
            $result['error_code'] = 1;
            $result['error_message'] = 'productId不存在';
            echo json_encode($result);
            die;
        }
        $this->load->model('Product_model','product');
        $this->load->model('Platform_model','platform');
        $this->load->model('Tag_model','tag');

        $one = $this->product->get_one(['platform_product_id'=>$productId],['fast_speed','pass_rate','platform_id','platform_product_id','platform_product_name','product_logo','tag_name','success_count']);

        if(empty($one)){
            $result['code']  = '300';
            $result['error_code'] = 1;
            $result['error_message'] = 'product不存在';
            echo json_encode($result);
            die;
        }
        $return = $one;
        $return['platform_name']   = $this->platform->get_one(['platform_id'=>$one['platform_id']],['platform_name']);
        $return['tag_name']        = $this->tag->get_all(['id in '.$one['tag_name']]);
        $return['product_logo']    = base_url().'static/Main/upload/product/'.$one['product_logo'];
        $return['banner_img']      = '';
        $return['success_count']   = ($one['success_count'] / 10000) . '万';
        $return['pass_rate']       = ($one['pass_rate'] * 100) . '%';
        //下款概率
        if($one['pass_rate'] <= 0.15){
            $return['pass_num'] = '凑合';
            $return['pass_width'] = 50;
        }else if($one['pass_rate'] <= 0.2){
            $return['pass_num'] = '普通';
            $return['pass_width'] = 70;
        }else if($one['pass_rate'] <= 0.35){
            $return['pass_num'] = '较好';
            $return['pass_width'] = 80;
        }else if($one['pass_rate'] <= 0.4){
            $return['pass_num'] = '良好';
            $return['pass_width'] = 120;
        }else if($one['pass_rate'] <= 0.55){
            $return['pass_num'] = '优秀';
            $return['pass_width'] = 180;
        }else{
            $return['pass_num'] = '爆款!';
            $return['pass_width'] = 208;
        }
        //放款速度
        if($one['fast_speed'] >= 6){
            $return['fast_num'] = '凑合';
            $return['fast_width'] = 50;
        }else if($one['fast_speed'] >= 5){
            $return['fast_num'] = '普通';
            $return['fast_width'] = 70;
        }else if($one['fast_speed'] >= 4){
            $return['fast_num'] = '较好';
            $return['fast_width'] = 80;
        }else if($one['fast_speed'] >= 3){
            $return['fast_num'] = '良好';
            $return['fast_width'] = 120;
        }else if($one['fast_speed'] >= 2){
            $return['fast_num'] = '优秀';
            $return['fast_width'] = 180;
        }else{
            $return['fast_num'] = '爆款!';
            $return['fast_width'] = 208;
        }
        //产品人气
        if($one['success_count'] <= 5){
            $return['success_num'] = '凑合';
            $return['success_width'] = 50;
        }else if($one['success_count'] <= 6){
            $return['success_num'] = '普通';
            $return['success_width'] = 70;
        }else if($one['pass_rate'] <= 7){
            $return['success_num'] = '较好';
            $return['success_width'] = 80;
        }else if($one['pass_rate'] <= 8){
            $return['success_num'] = '良好';
            $return['success_width'] = 120;
        }else if($one['pass_rate'] <= 9){
            $return['success_num'] = '优秀';
            $return['success_width'] = 180;
        }else{
            $return['success_num'] = '爆款!';
            $return['success_width'] = 208;
        }


        $result['data'] = $return;
        $result['message']  = 'OK';
        $result['error_code'] = 0;
        $result['time'] = date('Y-m-d H:i:s');
        $result['error_message'] = '';
        echo json_encode($result);

    }

    public function particular (){
        $result = array();
        $result['code']  = '200';

        $productId = $this->input->get_post('productId');
        if(is_null($productId)){
            $result['code']  = '300';
            $result['error_code'] = 1;
            $result['error_message'] = 'productId不存在';
            echo json_encode($result);
            die;
        }
        $this->load->model('Product_model','product');
        $this->load->model('Platform_model','platform');
        $this->load->model('Process_model','process');
        $this->load->model('Tag_model','tag');

        $one = $this->product->get_one_adv(
            ['platform_product_id'=>$productId],
            [   'apply_condition',
                'guide',
                'process',
                'product_introduct',
                'loan_detail',
                'platform_name',
                'loan_type',
                'target_customer',
                'monitorial_mode',
                'presenting_mode',
                'service_amount',
                'actual_amount',
                'repayment_approach',
                'repayment_method',
                'early_repayment',
                'overdue_algorithm',
                'is_credit',
                'is_upamount']
        );
        if(empty($one)){
            $result['code']  = '300';
            $result['error_code'] = 1;
            $result['error_message'] = 'product不存在';
            echo json_encode($result);
            die;
        }
        $return = $one;
        $return['process'] = $this->process->get_process($one['process']);
        foreach ($return['process'] as $k=>$v){
            $return['process'][$k]['img'] = base_url().'static/Main/img/'.$v['img'];
        }
        $return['loan_detail'] = array(
            ['title'=>'贷款类型','content'=>$one['loan_type']],
            ['title'=>'面向人群','content'=>$one['target_customer']],
            ['title'=>'审核方式','content'=>$one['monitorial_mode']],
            ['title'=>'到账方式','content'=>$one['presenting_mode']],
            ['title'=>'服务费','content'=>$one['service_amount']],
            ['title'=>'实际到账','content'=>$one['actual_amount']],
            ['title'=>'还款途径','content'=>$one['repayment_approach']],
            ['title'=>'还款方式','content'=>$one['repayment_method']],
            ['title'=>'提前还款','content'=>$one['early_repayment']],
            ['title'=>'逾期算法','content'=>$one['overdue_algorithm']],
            ['title'=>'要查征信','content'=>$one['is_credit']],
            ['title'=>'能否提额','content'=>$one['is_upamount']],
            ['title'=>'所属平台','content'=>$one['platform_name']]);
        $result['data'] = $return;
        $result['message']  = 'OK';
        $result['error_code'] = 0;
        $result['time'] = date('Y-m-d H:i:s');
        $result['error_message'] = '';
        echo json_encode($result);
    }

}
