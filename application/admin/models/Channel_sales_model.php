<?php
class Channel_sales_model extends CI_Model
{
    public $table = 'channel_sales';

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix($this->table);
    }

    public function getRow($condition) {
        if (!empty($condition)) {
            $this->db->order_by('id', 'desc');
            $query = $this->db->get_where($this->table, $condition, 1);
            return $query->row_array();
        }
    }

    public function getTripleKill($editer,$where)
    {
        $query = $this->db->query('SELECT SUM(loanAmount)*2 AS amount FROM '.$this->table.' WHERE editer = "'.$editer.'" AND (DAYOFWEEK(DATE_FORMAT(contractInputDate,"%Y-%m-%d")) = 0 || DAYOFWEEK(DATE_FORMAT(contractInputDate,"%Y-%m-%d")) = 6) and '.$where);
        $result = $query->result_array();

        return $result[0]['amount'];
    }

    public function getAll($where = '1',$order = 'id',$orderType = 'DESC')
    {
        $query = $this->db->query("select * from ".$this->table.' where '.$where." order by ".$order." ".$orderType);
        $result = $query->result_array();

        return $result;
    }

    public function getList($page = 1 , $page_limit_count = 10 , $where = '')
    {
        $start = ($page - 1) * $page_limit_count;
        $query = $this->db->query("select * from ".$this->table.$where." order by id DESC limit ".$start.",".$page_limit_count);
        $result = $query->result_array();

        return $result;
    }

    public function getSales($user)
    {
        $query = $this->db->query(
            'SELECT
                c.sales,
                a.id
                FROM '.$this->table.' AS c
                LEFT JOIN pp_admin_user AS a
                ON c.sales = a.username
                WHERE c.role_id = "'.$user.'"'
        );

        $result = $query->result_array();

        return $result;
    }

    public function getListbyType($type)
    {
        $query = $this->db->query('select * from '.$this->table.' where scene_id = "'.$type.'"');

        $result = $query->result_array();

        return $result;
    }

    public function getPrimaryReport($where)
    {
        $query = $this->db->query(
            'SELECT editer,COUNT(IF(contractStatus=0,TRUE,NULL )) AS trueNums,COUNT(IF(contractStatus<>0,TRUE,NULL )) AS falseNums,SUM(loanAmount) AS amount FROM '.$this->table.' WHERE '.$where.' GROUP BY editer'
        );
        $result = $query->result_array();

        return $result;
    }

    public function getCount($where = '1')
    {
        $query = $this->db->query("select count(*) as count from ".$this->table.' where '.$where);
        $result = $query->row_array()['count'];

        return $result;
    }

    public function getbyId($id)
    {
        $query = $this->db->query("select * from ".$this->table." where id = ".$id.' order by id DESC');
        $result = $query->result_array();

        return $result;
    }

    public function getbySaleId($id)
    {
        $query = $this->db->query("select * from ".$this->table." where sales = ".$id);
        $result = $query->result_array();

        return $result;
    }

    public function delbyId($condition)
    {
        $delete = $this->db->delete($this->table, $condition);

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

    public function add($data=array()) {
//        $query = $this->db->query("select count(1) as count from ".$this->table.' where name ="'.$data['name'].'"');
//        if($query->result_array()[0]['count']){
//            return 0;
//        }else{
        $query = $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
//        }
    }
}