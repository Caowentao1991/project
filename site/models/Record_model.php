<?php
class Record_model extends CI_Model
{
    public $table = 'record';

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix($this->table);
    }

    public function getDetail(){
        $query = $this->db->query('
            SELECT jy_record.id,jy_record.phone,jy_record.alipay,jy_platform.platform,jy_product.product,jy_record.invest_time,jy_record.create_time,jy_record.audit
            FROM
            (
                jy_record
                LEFT JOIN jy_platform
                ON jy_record.plat=jy_platform.id
            )
            LEFT JOIN jy_product
            ON jy_record.product=jy_product.id
        ');
        $result = $query->result_array();

        return $result;
    }

    public function getAll($where = '1')
    {
        $query = $this->db->query("select * from ".$this->table.' where '.$where." order by id DESC");
        $result = $query->result_array();

        return $result;
    }

    public function getList()
    {
        $query = $this->db->query("select * from ".$this->table);

        $result = $query->result_array();

        return $result;
    }

    public function getListbyType($type)
    {
        $query = $this->db->query('select * from '.$this->table.' where uid = "'.$type.'"');

        $result = $query->result_array();

        return $result;
    }

    public function getCount()
    {
        $query = $this->db->query("select count(*) as count from ".$this->table);

        $result = $query->row_array();

        return $result;
    }

    public function getbyUid($user)
    {
        $query = $this->db->query("select * from ".$this->table." where uid = ".$user.' order by id DESC');
        $result = $query->result_array();

        return $result;
    }

    public function delbyUid($id)
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