<?php

Class Acl {
    private $CI;
    private $url_model;  // 当前模型
    private $url_method; // 当前方法

    public function __construct()
    {
        $this->CI =&get_instance();
        $this->url_model = $this->CI->router->class;
        $this->url_method = $this->CI->router->method;
        $this->CI->load->database();
    }
    
    public function authority(){

        set_time_limit(0);
        if (!($this->url_method == 'login' || $this->url_method == 'logout' || $this->url_model == 'audojob' || $this->url_model == 'cronseting')) {
            if (empty($this->CI->session->get_userdata()['logged_in'])) {
                redirect('/action/login');
            } else {
                $userdata = $this->CI->session->get_userdata();
            }

            $this->CI->load->model('Role_model', 'role');
            $this->CI->load->model('Node_model', 'node');
            $this->CI->load->model('Access_model', 'access');
            $access = $this->CI->access->getbyRole($userdata['role_result']);

            if (!empty($access)) {
                $where = '';
                foreach ($access as $k => $v) {
                    if ((count($access) - 1) == $k) {
                        $where .= 'id = ' . $v['node_id'];
                    } else {
                        $where .= 'id = ' . $v['node_id'] . ' or ';
                    }
                }
                $node = $this->CI->node->getAll($where);
                $nodeList = array();
                foreach ($node as $k => $v) {
                    $nodeList[strtolower($v['class'])][strtolower($v['function'])] = 1;
                }
            }

            if (empty($nodeList[strtolower($this->url_model)][strtolower($this->url_method)])
                && strtolower($this->url_model) != 'layout'
                && strtolower($this->url_model) != 'action'
            ) {

                echo "<script>alert('无访问权限');window.location.href = '/admin/index.php/layout/index'</script>";
                die;
            }
        }

    }

}