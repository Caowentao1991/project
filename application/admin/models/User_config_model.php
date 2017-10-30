<?php
class User_config_model extends CI_Model
{
    public $table = 'user_config';

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

    public function getbyUser($user)
    {
        $query = $this->db->query("select * from ".$this->table.' where username = "'.$user.'"');
        $result = $query->result_array();

        return $result[0];
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
//        $query = $this->db->query("select count(1) as count from ".$this->table.' where name ="'.$data['name'].'"');
//        if($query->result_array()[0]['count']){
//            return 0;
//        }else{
        $query = $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
//        }
    }
}