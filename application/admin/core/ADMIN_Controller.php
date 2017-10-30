<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ADMIN_Controller extends CI_Controller
{
    protected $layout = 'layout/main';
    private $js_files = array();
    private $css_files = array();

    public function __construct()
    {
        parent::__construct();
    }
    public function add_js()
    {
        //添加js文件
    }
    public function add_css(){
        //添加css文件
    }
    //file 表示是否使用渲染子视图文件，viewData表示的是子视图中渲染数据，$layout表示父视图中使用的全局数据
    protected function render($file = NULL, &$viewData = array(), $layoutData = array())
    {
        if( !is_null($file) ) {
            $data['content'] = $this->load->view($file, $viewData, TRUE);
            $data['layout'] = $layoutData;
            $this->load->view($this->layout, $data);
        } else {
            $this->load->view($this->layout, $viewData);
        }
        $viewData = array();
    }
}