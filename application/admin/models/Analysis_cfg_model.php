<?php
class Analysis_cfg_model extends CI_Model{

	public $table = 'analysis_config';

	public function __construct(){
		parent::__construct();
		$this->table = $this->db->dbprefix($this->table);
	}

	public function getAll($where = '1',$order = 'id',$orderType = 'DESC'){
	 	
        $query = $this->db->query("select * from ".$this->table.' where '.$where." order by ".$order." ".$orderType);
        $result = $query->result_array();

        return $result;
    }

    public function delById($id){

    	$result = $this->db->delete($this->table,array('id' => $id));
    	return $result;
    }

    public function add($data){

    	$insert = $this->db->insert($this->table,$data);
        if($insert == true){
            $result = 1;
        }else{
            $result = 0;
        }
    	return $result;
    }

    public function getCurrent($id){
    	$query = $this->db->query("select * from ".$this->table." where id = ".$id);
    	$result = $query->row_array();

    	return $result;
    }

    public function update($data, $condition) {
        $query = $this->db->update($this->table, $data, $condition);
        return $this->db->affected_rows();
    }
}
?>