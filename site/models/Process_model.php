<?php
class Process_model extends CI_Model
{
    public $table = 'process';

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix($this->table);
    }

    public function get_process($list){
        $return = $this->db->query('select name,img from '.$this->table.' where find_in_set(id,'.'"'.$list.'")')->result_array();

            return $return;

    }
}