<?php
class Tag_model extends CI_Model
{
    public $table = 'tag';

    public function get_all($where=false,$fields='*',$order=false,$table=FALSE){
        if (!$table) {
            $table = $this->table;
        }
        $this->db->select($fields)->from($table);
        if ($where) {
            $this->db->where($where);
        }
        if ($order) {
            if (is_array($order)) {
                foreach ($order as $k => $v){
                    $this->db->order_by($k,$v);
                }
            }else if(is_string($order)){
                $this->db->order_by($order);
            }
        }else{
            if ($this->db->field_exists('sort_id',$table)) {
                $this->db->order_by('sort_id','desc');
            }else{
                $this->db->order_by('id','desc');
            }
        }
        $query =$this->db->get();
        return $query->result_array();
    }

}