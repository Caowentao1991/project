<?php
class Invest_model extends CI_Model
{
	private $table = 'invest';
	
	public function __construct()
	{
		parent::__construct();
		$this->table = $this->db->dbprefix($this->table);
	}

	public function select()
	{
		$query = $this->db->query("select * from ".$this->table);
		$result = $query->result_array();
		var_dump($result);die;
		return $result;
	}

	public function insert($data)
	{
		$this->db->insert($this->table,$data);
		return $this->db->affected_rows();
	}
}