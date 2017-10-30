<?php
class Product_model extends CI_Model
{
    public $table = 'product';

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix($this->table);
    }

    public function getAll($where = '1')
    {
        $query = $this->db->query("select * from ".$this->table.' where '.$where);
        $result = $query->result_array();

        return $result;
    }


    public function get_one($where,$fields = "*",$table=FALSE){
        if (!$table) {
            $table = $this->table;
        }
        if (!$where) {
            return FALSE;
        }
        $this->db->select($fields)->from($table);
        if (!is_numeric($where)) {
            $this->db->where($where);
        }else{
            $this->db->where('id',$where);
        }

        $query = $this->db->get();
        $row = $query->row_array();
        return $row;
    }

    public function get_one_adv($where,$fields = "*",$table=FALSE){
        if (!$table) {
            $table = $this->table;
        }
        if (!$where) {
            return FALSE;
        }
        $this->db->select($fields)->from($table);
        $this->db->join('platform', 'platform.platform_id = '.$this->table.'.platform_id');
        if (!is_numeric($where)) {
            $this->db->where($where);
        }else{
            $this->db->where('id',$where);
        }

        $query = $this->db->get();
        $row = $query->row_array();
        return $row;
    }

    public function getList($limit)
    {
        $query = $this->db->query("select * from ".$this->table." order by id DESC limit 0,".$limit);

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

        $result = $query->row_array();

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
}