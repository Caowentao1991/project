<?php
class Audojob_model extends CI_Model
{
    public $db1;
    public $db2;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db1 = $this->load->database('db1',true);
        $this->db2 = $this->load->database('db2',true);

    }

    /**
     * @return mixed
     */
    public function zcl()
    {
        $query = $this->db1->query("SELECT count(*) register
from ".$this->db1->database.".xj_user u
WHERE u.register_time >= curdate()
  and DATE_FORMAT(u.register_time,'%H')< DATE_FORMAT(NOW(),'%H')
  and u.is_effect=1;")->row_array();
        return $query;
    }

    public function sqqk()
    {
        $query = $this->db1->query("SELECT count(a.user_id) apply,
       count(case when a.audit_result=3 then 1 end ) audit,
       concat(left(count(case when a.audit_result=3 then 1 end )/count(a.user_id)*100,5),'%') auditrate
from ".$this->db1->database.".xj_apply a
WHERE a.is_effect=1
  and a.audit_time >=curdate()
  and DATE_FORMAT(a.audit_time,'%H')< DATE_FORMAT(NOW(),'%H');")->row_array();
        return $query;
    }

    public function fdyh()
    {
        $query = $this->db1->query(" select 
        count(DISTINCT a1.user_id) tjapply,
        count(DISTINCT case when a1.audit_result in (3,5,6) then a1.user_id end ) reloan,
        concat(left(count(DISTINCT case when a1.audit_result in (3,5,6) then a1.user_id end )/count(DISTINCT a1.user_id)*100,5),'%') reloanrate
    
   from
 ( select t.user_id,a.audit_time
    from 
    (
      select  r2.contract_id 
          
        from 
           (select  r.scene_custid, min(r.real_date) real_date
              from ".$this->db2->database.".b_repayment_plan r 
             where r.scene_id =100010
               and r.invalid_sign=1
               and r.payment_flag in(1,3)
               and r.real_date <date_sub(curdate(),interval -1 day) 
          group by r.scene_custid )r1   
           join ".$this->db2->database.".b_repayment_plan r2 on r2.scene_custid=r1.scene_custid and r1.real_date = r2.real_date 
     )r3
     join ".$this->db2->database.".b_loan_application ap on r3.contract_id = ap.contract_id 
     join ".$this->db1->database.".xj_transfer t on t.application_id=ap.application_id
     join ".$this->db1->database.".xj_apply a on t.user_id =a.user_id and t.apply_id = a.id 
) r4 
join xj_apply a1 on  r4.user_id =a1.user_id and a1.audit_time>r4.audit_time

where a1.is_effect=1 
  and a1.audit_time >= curdate()
  and a1.audit_time <date_sub(curdate(),interval -1 day);")->row_array();
        return $query;
    }

    public function drfk()
    {
        $query = $this->db1->query("SELECT count(*) transfer, sum(payment_amount) transfermoney 
FROM ".$this->db2->database.".b_payment_list w  
WHERE w.real_pay_date >= curdate()
  and  w.real_pay_date <date_sub(curdate(),interval -1 day) 
  and w.scene_id='100010'  
  and pay_flag=30 
  and invalid_sign=1;")->row_array();
        return $query;
    }


    public function ttbj()
    {
        $query = $this->db1->query("SELECT  concat(left((p1.count-p2.count)/p2.count*100,5),'%') as rate
from
( 
SELECT MAX( m.time) as time,sum(count) as count
from
(
select                       
         case when DATE_FORMAT(u.register_time,'%H') <'08' then '07点'
              when DATE_FORMAT(u.register_time,'%H') <'09' then '08点'
              when DATE_FORMAT(u.register_time,'%H') <'10' then '09点'
              when DATE_FORMAT(u.register_time,'%H') <'11' then '10点'
              when DATE_FORMAT(u.register_time,'%H') <'12' then '11点'
              when DATE_FORMAT(u.register_time,'%H') <'13' then '12点'
              when DATE_FORMAT(u.register_time,'%H') <'14' then '13点'
              when DATE_FORMAT(u.register_time,'%H') <'15' then '14点'
              when DATE_FORMAT(u.register_time,'%H') <'16' then '15点'
              when DATE_FORMAT(u.register_time,'%H') <'17' then '16点'
              when DATE_FORMAT(u.register_time,'%H') <'18' then '17点'
              when DATE_FORMAT(u.register_time,'%H') <'19' then '18点'
              when DATE_FORMAT(u.register_time,'%H') <'20' then '19点'
              when DATE_FORMAT(u.register_time,'%H') <'21' then '20点'
              when DATE_FORMAT(u.register_time,'%H') <'22' then '21点'
              when DATE_FORMAT(u.register_time,'%H') <'23' then '22点'
              when DATE_FORMAT(u.register_time,'%H') <'24' then '23点' end time,
        
          count(DISTINCT u.id) count
         

   from xj_user u
 
  where u.is_effect =1 
    and u.register_time >= curdate()
    and u.register_time < date_sub(curdate(),interval -1 day)

 GROUP BY time
 ORDER BY time
)m
 WHERE m.time < DATE_FORMAT(NOW(),'%H')
)p1

JOIN

(
SELECT MAX( m.time) as time,sum(count) as count
from(
select                       
         case when DATE_FORMAT(u.register_time,'%H') <'08' then '07点'
              when DATE_FORMAT(u.register_time,'%H') <'09' then '08点'
              when DATE_FORMAT(u.register_time,'%H') <'10' then '09点'
              when DATE_FORMAT(u.register_time,'%H') <'11' then '10点'
              when DATE_FORMAT(u.register_time,'%H') <'12' then '11点'
              when DATE_FORMAT(u.register_time,'%H') <'13' then '12点'
              when DATE_FORMAT(u.register_time,'%H') <'14' then '13点'
              when DATE_FORMAT(u.register_time,'%H') <'15' then '14点'
              when DATE_FORMAT(u.register_time,'%H') <'16' then '15点'
              when DATE_FORMAT(u.register_time,'%H') <'17' then '16点'
              when DATE_FORMAT(u.register_time,'%H') <'18' then '17点'
              when DATE_FORMAT(u.register_time,'%H') <'19' then '18点'
              when DATE_FORMAT(u.register_time,'%H') <'20' then '19点'
              when DATE_FORMAT(u.register_time,'%H') <'21' then '20点'
              when DATE_FORMAT(u.register_time,'%H') <'22' then '21点'
              when DATE_FORMAT(u.register_time,'%H') <'23' then '22点'
              when DATE_FORMAT(u.register_time,'%H') <'24' then '23点' end time,
        
          count(DISTINCT u.id) count
         

   from xj_user u
 
  where u.is_effect =1 
    and u.register_time >= date_sub(curdate(),interval 1 day)
    and u.register_time < curdate()

 GROUP BY time
 ORDER BY time
)m
 WHERE m.time < DATE_FORMAT(NOW(),'%H')
)p2 on p1.time=p2.time;")->row_array();
        return $query;
    }

    public function qtbj()
    {
        $query = $this->db1->query("SELECT  p.time,p.rate
from
(
SELECT m.time,concat(left((m.count-n.count)/n.count*100,5),'%') as rate
from
(
 select                       
         case when DATE_FORMAT(u.register_time,'%H') <'08' then '07点'
              when DATE_FORMAT(u.register_time,'%H') <'09' then '08点'
              when DATE_FORMAT(u.register_time,'%H') <'10' then '09点'
              when DATE_FORMAT(u.register_time,'%H') <'11' then '10点'
              when DATE_FORMAT(u.register_time,'%H') <'12' then '11点'
              when DATE_FORMAT(u.register_time,'%H') <'13' then '12点'
              when DATE_FORMAT(u.register_time,'%H') <'14' then '13点'
              when DATE_FORMAT(u.register_time,'%H') <'15' then '14点'
              when DATE_FORMAT(u.register_time,'%H') <'16' then '15点'
              when DATE_FORMAT(u.register_time,'%H') <'17' then '16点'
              when DATE_FORMAT(u.register_time,'%H') <'18' then '17点'
              when DATE_FORMAT(u.register_time,'%H') <'19' then '18点'
              when DATE_FORMAT(u.register_time,'%H') <'20' then '19点'
              when DATE_FORMAT(u.register_time,'%H') <'21' then '20点'
              when DATE_FORMAT(u.register_time,'%H') <'22' then '21点'
              when DATE_FORMAT(u.register_time,'%H') <'23' then '22点' end time,
        
          count(DISTINCT u.id) count
         

   from xj_user u
 
  where u.is_effect =1 
    and u.register_time >= curdate()
    and u.register_time < date_sub(curdate(),interval -1 day)

 GROUP BY time
 ORDER BY time
)m

JOIN

(
 select                       
           case when DATE_FORMAT(u.register_time,'%H') <'08' then '07点'
              when DATE_FORMAT(u.register_time,'%H') <'09' then '08点'
              when DATE_FORMAT(u.register_time,'%H') <'10' then '09点'
              when DATE_FORMAT(u.register_time,'%H') <'11' then '10点'
              when DATE_FORMAT(u.register_time,'%H') <'12' then '11点'
              when DATE_FORMAT(u.register_time,'%H') <'13' then '12点'
              when DATE_FORMAT(u.register_time,'%H') <'14' then '13点'
              when DATE_FORMAT(u.register_time,'%H') <'15' then '14点'
              when DATE_FORMAT(u.register_time,'%H') <'16' then '15点'
              when DATE_FORMAT(u.register_time,'%H') <'17' then '16点'
              when DATE_FORMAT(u.register_time,'%H') <'18' then '17点'
              when DATE_FORMAT(u.register_time,'%H') <'19' then '18点'
              when DATE_FORMAT(u.register_time,'%H') <'20' then '19点'
              when DATE_FORMAT(u.register_time,'%H') <'21' then '20点'
              when DATE_FORMAT(u.register_time,'%H') <'22' then '21点'
              when DATE_FORMAT(u.register_time,'%H') <'23' then '22点' end time,
        
          count(DISTINCT u.id) count
         

   from xj_user u
 
  where u.is_effect =1 
    and u.register_time >= date_sub(curdate(),interval 1 day)
    and u.register_time < curdate()

 GROUP BY time
 ORDER BY time
)n on m.time=n.time
)p
WHERE p.time=DATE_FORMAT(NOW(),'%H')-1;")->row_array();
        return $query;
    }

    /**
     * @return mixed
     */
    public function dyfkqk()
    {
        $query = $this->db1->query("SELECT COUNT(*) bs, SUM(payment_amount) je 
FROM ccx_loan.b_payment_list w  
WHERE w.real_pay_date >=DATE_ADD(CURDATE(),INTERVAL -DAY(CURDATE())+1 DAY)
  AND w.scene_id='100010'  
  AND pay_flag=30 
  AND invalid_sign=1")->row_array();
        return $query;
    }
}