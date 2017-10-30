<?php
class Dailydata_model extends CI_Model
{
    public $table = 'dailydata';

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix($this->table);
    }

    /**
     * @return string
     */
    public function getData()
    {
        $query = $this->db->query('select * from (select * from '.$this->table.' order by time desc limit 15) as f order by f.time asc')->result_array();
        return $query;
    }
}