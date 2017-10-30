<?php
class Order_model extends CI_Model
{
    public $table = 'order';

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

    public function getChannelSales($where = '1')
    {
        $_where = '';
        foreach($where as $k=>$v){
            if($k!=count($where)-1){
                $_where .= 'editer = "'.$v['sales'].'" or ';
            }else{
                $_where .= 'editer = "'.$v['sales'].'"';
            }
        }
        $query = $this->db->query("select count(1) as nums,sum(loanAmount) as amount from ".$this->table.' where '.$_where);
        $result = $query->result_array();
        return $result;
    }

    public function getTripleKill($editer,$where)
    {
        $query = $this->db->query('SELECT SUM(loanAmount) AS amount FROM '.$this->table.' WHERE editer = "'.$editer.'" AND (DAYOFWEEK(DATE_FORMAT(contractInputDate,"%Y-%m-%d")) = 0 || DAYOFWEEK(DATE_FORMAT(contractInputDate,"%Y-%m-%d")) = 6) and '.$where);
        $result = $query->result_array();

        return $result[0]['amount'];
    }

    public function getAll($where = '1',$order = 'id',$orderType = 'DESC')
    {
        $query = $this->db->query("select * from ".$this->table.' where '.$where." order by ".$order." ".$orderType);
        $result = $query->result_array();

        return $result;
    }

    public function query($sql)
    {
        $query = $this->db->query($sql);
        $result = $query->result_array();

        return $result[0];
    }

    public function getList($page = 1 , $page_limit_count = 10 , $where = '')
    {
        $start = ($page - 1) * $page_limit_count;
        $query = $this->db->query("select * from ".$this->table.$where." order by id DESC limit ".$start.",".$page_limit_count);
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
            'SELECT
                editer,
                COUNT(1) AS finishOrder,
                ROUND(SUM(IF((installment=10 && provider=\'国投泰康信托\'),loanAmount*0.87,loanAmount-interest)),2) AS finishAmount
                FROM '.$this->table.'
                WHERE '.$where.' GROUP BY editer ORDER BY editer'
        );
        $result = $query->result_array();

        return $result;
    }

    public function getManagePrimaryReport($where)
    {
        $query = $this->db->query(
            'SELECT
                channelManage,
                COUNT(1) AS finishOrder,
                ROUND(SUM(loanAmount-interest),2) AS finishAmount
                FROM '.$this->table.'
                WHERE '.$where.' GROUP BY channelManage ORDER BY editer'
        );
        $result = $query->result_array();

        return $result;
    }

    public function getCount($where)
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

    public function getbyCustName($name)
    {
        $query = $this->db->query("select * from ".$this->table.' where applicationDate >= "2017-03-01" && applicationDate <= "2017-03-31" && channelName LIKE "%营口%" && custName = '.$name.' order by id DESC');
        $result = $query->result_array();

        return $result;
    }

    public function delbyId($id)
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