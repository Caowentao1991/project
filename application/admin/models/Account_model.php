<?php
class Account_model extends CI_Model
{
    public $table = 'account';

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix($this->table);
    }

    public function getCount()
    {
        $query = $this->db->query("select count(*) as count from ".$this->table);

        $result = $query->row_array();

        return $result;
    }

    public function getbyUid($user)
    {
        $query = $this->db->query("select * from ".$this->table." where uid = ".$user.' order by id ASC');
        $result = $query->result_array();

        return $result;
    }

    public function delbyUid($uid)
    {
        $delete = $this->db->delete($this->table, array('uid' => $uid));

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