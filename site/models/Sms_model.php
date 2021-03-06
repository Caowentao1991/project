<?php
class Sms_model extends CI_Model
{
    public $table = 'sms';

    public function insert($data=array()) {
        $query = $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
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
        $this->db->order_by('id desc');
        $query = $this->db->get();
        $row = $query->row_array();
        return $row;
    }

    public function update($data, $condition) {
        $query = $this->db->update($this->table, $data, $condition);
        return $this->db->affected_rows();
    }
}