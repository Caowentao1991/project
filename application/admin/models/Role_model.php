<?php
class Role_model extends CI_Model
{
    public $table = 'role';

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix($this->table);
    }

    public function getAll($where = '1',$order = 'id',$orderType = 'DESC')
    {
        $query = $this->db->query("select * from ".$this->table.' where '.$where." order by ".$order." ".$orderType);
        $result = $query->result_array();

        return $result;
    }

    public function getList($page = 1 , $page_limit_count = 10 , $where = '')
    {
        $start = ($page - 1) * $page_limit_count;
        $query = $this->db->query("select * from ".$this->table.$where." order by id DESC limit ".$start.",".$page_limit_count);
        $result = $query->result_array();

        return $result;
    }

    public function getListbyType($type)
    {
        $query = $this->db->query('select * from '.$this->table.' where scene_id = "'.$type.'"');

        $result = $query->result_array();

        return $result;
    }

    public function getCount()
    {
        $query = $this->db->query("select count(*) as count from ".$this->table);
        $result = $query->row_array()['count'];

        return $result;
    }

    public function getbyId($id)
    {
        $query = $this->db->query("select * from ".$this->table." where id = ".$id.' order by id DESC');
        $result = $query->result_array();

        return $result;
    }

    public function delbyId($id)
    {
        $delete = $this->db->delete($this->table, array('id' => $id));

        return $delete;
    }

    public function insert($data=array()) {
        $query = $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function update($data, $condition) {
        $query = $this->db->update($this->table, $data, $condition);
        return $this->db->affected_rows();
    }

    public function add($data=array()) {
        $query = $this->db->query("select count(1) as count from ".$this->table.' where name ="'.$data['name'].'"');
        if($query->result_array()[0]['count']){
            return 0;
        }else{
            $query = $this->db->insert($this->table, $data);
            return $this->db->affected_rows();
        }
    }


    // 获取ids，分类下所有的子分类的ids,用于查询分类以及子分类下内容
    function find_ids($fid=0){
        $tmp = array($fid);
        $list = $this->db->query('select * from role where fid = '.$fid)->result_array();
        foreach ($list as $k => $v) {
            if ($more = $this->find_ids($v['id'])) {
                $tmp = array_merge($tmp,$more);
            }else{
                array_push($tmp, $v['id']);
            }
        }
        return $tmp;
    }

    // 获取分类信息
    public function get_ctypes($fid){
        $query = $this->db->query('select *,(select count(id) from role b where b.fid = a.id) as more from role a where fid = '.$fid);
        return $query->result_array();
    }

    // 返回多层递归体
    public function get_tree($fid = 0){
        $ctypes = $this->get_ctypes($fid);
        foreach ($ctypes as $k => $v) {
            if ($v['more'] > 0) {
                $ctypes[$k]['more'] = $this->get_tree($v['id']);
            }
        }
        return $ctypes;
    }
}