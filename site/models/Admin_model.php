<?php
class Admin_model extends CI_Model
{
    public $table = 'user';

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix($this->table);
    }

    //验证登录用户名是否存在


    public function dologin($user_name,$password)
    {
        $query = $this->db->query("select * from ".$this->table." where username = '".$user_name."'");

        $result = $query->row();
        if(!empty($result) && $result->password == md5($password) && $result->status == 1)
        {
            $this->load->library('session');
            //登录成功将信息保存到session中
            $this->update(['loginTime' => date('Y-m-d H:i:s',time()),'ip'=>$_SERVER["REMOTE_ADDR"]],['id' => $result->id]);

            $newdata = array(
                'id' => $result->id,
                'adm_username'  => $result->username,
                'role_result' => $result->roleId,
                'logged_in' => TRUE,
                'ip' => $result->ip,
                'login_time' => $result->loginTime,
                'logout_time' => $result->logout_time,
                'city' => $result->city
            );
            $this->session->set_userdata($newdata);

            return true;
        }else{
            return false;
        }
    }

    public function getAdminList($page = 1 , $page_limit_count = 10)
    {
        $start = ($page - 1) * $page_limit_count;

        $query = $this->db->query("select ad.*,ro.role_name from ".$this->table." as ad left join ".$this->db->dbprefix('role')." as ro on ro.id = ad.role_id  limit ".$start.",".$page_limit_count);

        $result = $query->result_array();

        return $result;
    }

    public function delbyId($id)
    {
        $delete = $this->db->delete($this->table, array('id' => $id));

        return $delete;
    }

    public function getbyId($id)
    {
        $query = $this->db->query("select * from ".$this->table." where id = ".$id.' order by id DESC');
        $result = $query->result_array();

        return $result;
    }

    public function getAll($where = '1',$order = 'id',$orderType = 'DESC')
    {
        $query = $this->db->query("select * from ".$this->table.' where '.$where." order by ".$order." ".$orderType);
        $result = $query->result_array();

        return $result;
    }

    public function getCount()
    {
        $query = $this->db->query("select count(*) as count from ".$this->table);

        $result = $query->row();

        return $result->count;
    }

    public function getbyUser($user)
    {
        $query = $this->db->query("select *,(select isAdmin from role b where a.roleId= b.id) isAdmin from ".$this->table." a where username = ".$user);

        $result = $query->row_array();

        return $result;
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
        $query = $this->db->query("select count(1) as count from ".$this->table.' where username ="'.$data['username'].'"');
        if($query->result_array()[0]['count']){
            return 0;
        }else{
            $query = $this->db->insert($this->table, $data);
            return $this->db->insert_id();;
        }
    }
}