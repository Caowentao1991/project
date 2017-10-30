<?php
class Config_model extends CI_Model
{
    public $table = 'config';

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix($this->table);
    }


    public function get_list($id)
    {
       $query = $this->db->query('select * from '.$this->table.' where find_in_set(id,(select nodes from role where id = '.$id.'))');

       return $query->result_array();
    }
    public function get_all()
    {
        $query = $this->db->query('select * from '.$this->table);

        return $query->result_array();
    }







}