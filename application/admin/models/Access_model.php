<?php
class Access_model extends CI_Model
{
    public $table = 'access';

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix($this->table);
    }

    public function getAll($where = '1')
    {
        $query = $this->db->query("select * from ".$this->table.' where '.$where." order by id DESC");
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

    public function getbyRole($id)
    {
        $query = $this->db->query("select * from ".$this->table." where role_id = ".$id.' order by id DESC');
        $result = $query->result_array();

        return $result;
    }

    public function delbyId($id)
    {
        $delete = $this->db->delete($this->table, array('id' => $id));

        return $delete;
    }

    public function delbyRole($id)
    {
        $delete = $this->db->delete($this->table, array('role_id' => $id));

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
//        $query = $this->db->query("select count(1) as count from ".$this->table.' where platform ="'.$data['platform'].'"');
        $query = $this->db->query("select count(1) as count from ".$this->table.' where 1');
        if($query->result_array()[0]['count']){
            return 0;
        }else{
            $query = $this->db->insert($this->table, $data);
            return $this->db->affected_rows();
        }
    }
}