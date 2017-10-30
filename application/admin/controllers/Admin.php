<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Role_model','role');
        $this->load->model('Node_model','node');
        $this->load->model('Access_model','access');
        $this->load->model('admin_model','admin');
        $this->load->model('config_model');
        $this->load->model('User_config_model','user_config');
        $this->load->model('Channel_sales_model','channel_sales');
        $this->load->library('session');
        $this->load->helper('url');

        if(empty($this->session->get_userdata()['logged_in'])){
            echo 'OUT';die;
        }

    }

    public function addUser()
    {
        $userdata = $this->session->get_userdata();
        $role = $this->role->getAll('1','pid','ASC');
        if(!empty($_GET['id'])){
            $user = $this->admin->getbyId($_GET['id']);
        }else{
            $user[0] = array('roleId'=>0);
        }
        if(!empty($_POST)){
            $return['referer'] = '';
            $return['refresh'] = false;
            $return['state'] = 'faild';
            if($_POST['type']!='add'){
                $id = $_POST['id'];
                $condition = array(
                    'id' => $id,
                );
                unset($_POST['id']);
                unset($_POST['type']);
                $_POST['editer'] = $userdata['adm_username'];
                $_POST['edit_time'] = date('Y-m-d H:i:s');
                if(empty($_POST['password'])){
                    unset($_POST['password']);
                }else{
                    $_POST['password'] = md5($_POST['password']);
                }

                $result = $this->admin->update($_POST,$condition);
                if($result==0){
                    $return['message'] = '修改失败';
                }elseif($result==1){
                    $return['refresh'] = true;
                    $return['state'] = 'success';
                    $return['message'] = '添加成功';
                }
            }else{
                unset($_POST['id']);
                unset($_POST['type']);
                $_POST['create_time'] = date('Y-m-d H:i:s',time());
                $_POST['editer'] = $userdata['adm_username'];
                $_POST['password'] = md5($_POST['password']);
                $result = $this->admin->add($_POST);

                if($result==0){
                    $return['message'] = '该用户已存在';
                }elseif($result>0){
                    $return['refresh'] = true;
                    $return['state'] = 'success';
                    $return['message'] = '添加成功';
                }
            }
            echo json_encode($return);die;
        }
        $return = array(
            'role' => $role,
            'user' => $user[0],
        );
        $this->load->view('admin/userAdd',$return);
    }

    public function editUser()
    {
        if($this->session->get_userdata()['id'] != $this->input->get_post('id')){
            die;
        }
        $userdata = $this->session->get_userdata();
        $role = $this->role->getAll('1','pid','ASC');
        if(!empty($_GET['id'])){
            $user = $this->admin->getbyId($_GET['id']);
        }else{
            $user[0] = array('role_id'=>0);
        }
        if(!empty($_POST)){
            $return['referer'] = '';
            $return['refresh'] = false;
            $return['state'] = 'faild';
            if($_POST['type']!='add'){
                $id = $_POST['id'];
                $condition = array(
                    'id' => $id,
//                    'platform' => $_POST['platform'],
                );
                unset($_POST['id']);
                unset($_POST['type']);
                $_POST['editer'] = $userdata['adm_username'];
                $_POST['edit_time'] = date('Y-m-d H:i:s');
                if(empty($_POST['password'])){
                    unset($_POST['password']);
                }else{
                    $_POST['password'] = md5($_POST['password']);
                }

                $result = $this->admin->update($_POST,$condition);
                if($result==0){
                    $return['message'] = '修改失败';
                }elseif($result==1){
                    $return['refresh'] = true;
                    $return['state'] = 'success';
                    $return['message'] = '修改成功';
                }
            }else{
                unset($_POST['id']);
                unset($_POST['type']);
                $_POST['create_time'] = date('Y-m-d H:i:s',time());
                $_POST['editer'] = $userdata['adm_username'];
                $_POST['password'] = md5($_POST['password']);
                $result = $this->admin->add($_POST);
                if($result==0){
                    $return['message'] = '该用户已存在';
                }elseif($result==1){
                    $return['refresh'] = true;
                    $return['state'] = 'success';
                    $return['message'] = '添加成功';
                }
            }
            echo json_encode($return);die;
        }
        $return = array(
            'role' => $role,
            'user' => $user[0],
        );
        $this->load->view('admin/userEdit',$return);
    }

    public function delUser()
    {
        if(!empty($_GET['id'])){
            $result = $this->admin->delbyId($_GET['id']);
            if($result){
                $return['referer'] = '';
                $return['refresh'] = true;
                $return['state'] = 'success';
                $return['message'] = '删除成功';
            }else{
                $return['referer'] = '';
                $return['refresh'] = false;
                $return['state'] = 'faild';
                $return['message'] = '删除失败';
            }
            echo json_encode($return);die;
        }
    }

    public function userList()
    {
        $list = $this->admin->getAll();
        $role = $this->role->getAll('1','pid','ASC');
        $roleList = array();
        foreach($role as $k=>$v){
            $roleList[$v['id']] = $v;
        }
        $data['list'] = $list;
        $data['roleList'] = $roleList;
        $this->load->view('admin/userList',$data);
    }

    public function roleList()
    {

//        $list = $this->role->getAll('fid = 0','pid','ASC');
//
//        $rebot = array();
//        if(!empty($list)){
//            foreach($list as $k=>$v){
//                if($v['pid']==1){
//                    $rebot[$v['id']][] = $v;
//                }
//            }
//            $flist = $this->role->getAll('fid <> 0','pid','ASC');
//            foreach($flist as $k=>$v){
//                foreach($rebot as $l=>$j){
//                    if($v['fid']==$l){
//                        $rebot[$l][] = $v;
//                    }
//                }
//            }
//        }
//        $data['list'] = $rebot;


        $ids = array();

        $myRole = $this->admin->getbyUser("'".$this->session->userdata('adm_username')."'");

        $group = $this->role->find_ids($myRole['roleId']);

        $list = $this->role->get_tree($fid=0);



        $data = array(
            'list'      =>$list,
            'group'     =>$group,
            'myRole'    =>$myRole['roleId'],

        );
        $this->load->view('admin/roleList',$data);
    }

    public function addRole()
    {
        if(!empty($_POST)){
            $return['referer'] = '';
            $return['refresh'] = false;
            $return['state'] = 'faild';

            unset($_POST['id']);
            unset($_POST['type']);
            $_POST['nodes'] = !empty($_POST['nodes']) ? implode($_POST['nodes'],',') : null;
            $result = $this->role->add($_POST);

            if($result==0){
                $return['message'] = '该用户组已存在';
            }elseif($result==1){
                $return['refresh'] = true;
                $return['state'] = 'success';
                $return['message'] = '添加成功';
            }

            echo json_encode($return);die;
        }
        $myRole = $this->admin->getbyUser("'".$this->session->userdata('adm_username')."'");

        if($myRole['isAdmin'] == 0) {
            $config_list = $this->config_model->get_list($myRole['roleId']);
        }else{
            $config_list = $this->config_model->get_all();
        }

        $this->load->view('admin/roleAdd',['config'=>$config_list]);
    }

    public function addRoleFirst()
    {
        if(!empty($_POST)){
            $return['referer'] = '';
            $return['refresh'] = false;
            $return['state'] = 'faild';

            unset($_POST['id']);
            unset($_POST['type']);
            $_POST['nodes'] = !empty($_POST['nodes']) ? implode($_POST['nodes'],',') : null;
            $result = $this->role->add($_POST);

            if($result==0){
                $return['message'] = '该用户组已存在';
            }elseif($result==1){
                $return['refresh'] = true;
                $return['state'] = 'success';
                $return['message'] = '添加成功';
            }

            echo json_encode($return);die;
        }
        $myRole = $this->admin->getbyUser("'".$this->session->userdata('adm_username')."'");

        if($myRole['isAdmin'] == 0) {
            $config_list = $this->config_model->get_list($myRole['roleId']);
        }else{
            $config_list = $this->config_model->get_all();
        }

        $this->load->view('admin/roleAdd',['config'=>$config_list]);
    }

    public function editRole(){
        if($this->input->get_post('type')=='POST'){
            $id = $this->input->get_post('id');
            $data['name'] = $this->input->get_post('name');
            $data['remark'] = $this->input->get_post('remark');
            $data['status'] = $this->input->get_post('status');
            $data['nodes']  = !empty($_POST['nodes']) ? implode($_POST['nodes'],',') : null;

            $this->role->update($data,['id'=>$id]);
            $access = $this->input->get_post('access');
            $this->access->delbyRole($id);
            if(is_array($access)){

                foreach($access as $k=>$v){
                    $this->access->insert(['role_id'=>$id,'node_id'=>$v]);
                }
            }
            $return['referer'] = '/admin/roleList';
            $return['refresh'] = true;
            $return['state'] = 'success';
            $return['message'] = '添加成功';
            echo json_encode($return);die;
        }
        $id = $this->input->get_post('id');
        if(empty($id)){
            redirect('/admin/roleList');
        }
        $list = $this->role->getbyId($id);
        $result = $this->access->getbyRole($id);

        $access_list = array();
        foreach($result as $k=>$v){
            $access_list[$v['node_id']] = 1;
        }

//        $node = $this->node->getAll(' find_in_set(department,"'.$list[0]['nodes'].'")');
        $node = $this->node->getAll();
        foreach($node as $k=>$v){
            $access[$v['class']][] = array(
                'id' => $v['id'],
                'name' => $v['name'],
                'function' => $v['function'],
                'status' => empty($access_list[$v['id']])?0:1,
            );
        }
        $myRole = $this->admin->getbyUser("'".$this->session->userdata('adm_username')."'");

        if($myRole['isAdmin'] == 0) {
            $config_list = $this->config_model->get_list($myRole['roleId']);
        }else{
            $config_list = $this->config_model->get_all();
        }

        $params = array(
            'userInfo' => $list[0],
            'access' => $access,
            'config'=> $config_list
        );

        $this->load->view('admin/roleEdit',$params);
    }

    public function delRole()
    {
        if(!empty($_GET['id'])){
            $condition = array(
                'roleId' => $_GET['id'],
            );
            $this->admin->update(['roleId'=>''],$condition);
            $result = $this->role->delbyId($_GET['id']);
            if($result){
                $return['referer'] = '';
                $return['refresh'] = true;
                $return['state'] = 'success';
                $return['message'] = '删除成功';
            }else{
                $return['referer'] = '';
                $return['refresh'] = false;
                $return['state'] = 'faild';
                $return['message'] = '删除失败';
            }
            echo json_encode($return);die;
        }
    }

    public function channelSales(){

        $list = $this->channel_sales->getAll();
        $userList = array();
        foreach($list as $k=>$v){
            $manage = getUserName($v['role_id']);
            $user = getUserName($v['sales']);
            $userList[$manage['username']][] = $user['username'];
        }
        $this->load->view('User/channelSales',array('userList'=>$userList));
    }

    public function addChannelSales(){
        if(!empty($_POST)){
            $return['referer'] = '';
            $return['refresh'] = false;
            $return['state'] = 'faild';
            if(!empty($_POST['sales'])){
                $sales = true;
                $user = getUserId($_POST['sales']);
                $_POST['sales'] = $user['id'];
            }else{
                $sales = false;
            }
            if(!empty($_POST['role_id'])){
                $role = true;
                $user = getUserId($_POST['role_id']);
                $_POST['role_id'] = $user['id'];
            }else{
                $role = false;
            }

            if($sales && empty($_POST['sales'])){
                $return['message'] = '办单员不存在';
                echo json_encode($return);die;
            }
            if($role && empty($_POST['role_id'])){
                $return['message'] = '渠道经理不存在';
                echo json_encode($return);die;
            }

            if($_POST['type']!='add'){
                $user = getUserId($_POST['id']);
                $_POST['id'] = $user['id'];
                $field = array(
                    $_POST['field'] => $_POST[$_POST['field']],
                );
                $condition = array(
                    $_POST['field'] => $_POST['id'],
                );
                if($this->channel_sales->getCount($_POST['field'] .'="'. $_POST[$_POST['field']].'"')>=1){
                    $return['message'] = '该用户名已存在';echo json_encode($return);die;
                }
                $result = $this->channel_sales->update($field,$condition);
                if($result==0){
                    $return['message'] = '修改失败';
                }else{
                    $return['refresh'] = true;
                    $return['state'] = 'success';
                    $return['message'] = '修改成功';
                }
            }else{
                if($this->channel_sales->getCount($_POST['field'] .'="'. $_POST[$_POST['field']].'"')>=1){
                    $return['message'] = '该用户名已存在';echo json_encode($return);die;
                }
                $field = array('role_id'=>$_POST['role_id'],'sales'=>$_POST['sales']);
                $result = $this->channel_sales->add($field);
                if($result==1){
                    $return['refresh'] = true;
                    $return['state'] = 'success';
                    $return['message'] = '添加成功';
                }else{
                    $return['message'] = '添加失败';
                }
            }
            echo json_encode($return);die;
        }
        $this->load->view('User/addChannelSales');
    }

    public function delChannelSales(){
        if(!empty($_GET['type'])){
            $user = getUserId($_GET['name']);
            $condition = array(
                $_GET['type'] => $user['id'],
            );
            $result = $this->channel_sales->delbyId($condition);
            if($result){
                $return['referer'] = '';
                $return['refresh'] = true;
                $return['state'] = 'success';
                $return['message'] = '删除成功';
            }else{
                $return['referer'] = '';
                $return['refresh'] = false;
                $return['state'] = 'faild';
                $return['message'] = '删除失败';
            }
            echo json_encode($return);die;
        }
    }

    public function node()
    {
        $list = $this->access->getAll();
        $data['list'] = $list;
        $this->load->view('admin/access',$data);
    }

    public function addNode()
    {
        $this->load->view('admin/addNode',array());
    }

    public function access()
    {
        $list = $this->access->getAll();
        $data['list'] = $list;
        $this->load->view('admin/access',$data);
    }

    public function block()
    {
        $this->load->view('block',array());
    }
}
