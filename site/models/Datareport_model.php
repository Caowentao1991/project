<?php
class Datareport_model extends CI_Model
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

    public function registerinfo($date = '',$place= '')
    {
        $day = empty($date) ? "'".date('Y-m-d')."'" : "'".$date."'";
        $exday = empty($date) ? "'".date("Y-m-d",strtotime("-1 day"))."'" : "'".date("Y-m-d",(strtotime($date) - 3600*24))."'";
        $sql = empty($place) ? '' : ' and u.tg_location like '."'%".$place."%'";
        $register = $this->db1->query("select 
   count(distinct u.id) register
   from  ".$this->db1->database.".xj_user u  
  where u.register_time >=".$exday."
    and u.register_time < ".$day."
    and u.is_effect =1".$sql)->row_array();

        $place  = $this->db1->query("select  
       case when u.login_origin =2  then  'APP:IOS' 
            when u.login_origin =3  then  'APP:ANDROID'  
            when (u.login_origin =1 and( u.tg_location in('wtnsu','wtnsu1','wtnsu?10000skip=true','wtnd','wtnsu/','wtnkj','null','wyxd','wyxdhttps', 'yxdx','') or u.tg_location is null)) then '微信'
            else  '外部渠道' end place,
       count(distinct u.id) amount
   from  ".$this->db1->database.".xj_user u  
  where u.register_time >=".$exday."
    and u.register_time < ".$day."
    and u.is_effect =1".$sql."
GROUP BY place;")->result_array();
        if(empty($sql)) {
            $outplace = $this->db1->query("SELECT 
       
    u.tg_location place, count(DISTINCT u.id ) amount
    
  from  " . $this->db1->database . ".xj_user u  
where u.is_effect =1 
   and u.login_origin =1
   and u.tg_location  not in  ('wtnsu','wtnsu1','wtnsu?10000skip=true','wtnd','wtnkj','','wtnsu/','null','wyxd','yxdx','wyxdhttps') 
   and u.tg_location is not null
   and u.register_time >=" . $exday . "
   and u.register_time < " . $day . $sql . "   
GROUP BY u.tg_location 
ORDER BY amount desc limit 10;")->result_array();
        }else{
            $outplace = array();
        }


        $result = array(
            'register'=>$register,
            'place'   =>$place,
            'outplace'=>$outplace
        );
        return $result;
    }

    /**
     * @return mixed
     */
    public function finish($date = '',$place = '',$flag = false)
    {
        $exday = empty($date) ? "'".date("Y-m-d",strtotime("-1 day"))."'" : "'".date("Y-m-d",(strtotime($date) - 3600*24))."'";
        $sql = empty($place) ? '' : ' and u.tg_location like '."'%".$place."%'";

        $query1 = $this->db1->query("SELECT COUNT(*)  finish,       
      COUNT(CASE WHEN a4.audit_result = 3 THEN 1 END )pass,    
      COUNT(CASE WHEN a4.audit_result = 4 THEN 1 END ) refused,
      concat(left(count(case when a4.audit_result =3 then 1 else null end )/(count(case when a4.audit_result in (3,5,6)  then 1 end )+count(case when a4.audit_result =4 then 1 end ))*100,5),'%') passrate,
      COUNT(CASE WHEN t.into_account_result IN (1,2,3,4) THEN a4.user_id END ) getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      SUM(CASE WHEN t.into_account_result IN (2,4) THEN t.actual_amount  END ) transfermoney,
      AVG ( CASE WHEN  t.into_account_result IN (2,4) THEN t.actual_amount  END) avgmoney
FROM
(
 SELECT a2.user_id 
 FROM 
 (
 SELECT a.user_id                                         
  FROM ".$this->db1->database.".xj_apply a
 LEFT JOIN ".$this->db1->database.".xj_user u ON a.user_id =u.id 
 WHERE DATE_FORMAT(a.audit_time,'%Y-%m-%d')=".$exday." 
   AND DATE_FORMAT(u.register_time,'%Y-%m-%d')=".$exday.$sql." 
 )a1
  LEFT JOIN ".$this->db1->database.".xj_apply a2 ON a1.user_id=a2.user_id
 WHERE DATE_FORMAT(a2.audit_time,'%Y-%m-%d')=".$exday." 
 GROUP BY a2.user_id HAVING COUNT(a2.user_id)=1
)a3
LEFT JOIN ".$this->db1->database.".xj_apply a4 ON a4.user_id=a3.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t ON t.user_id=a4.user_id AND t.apply_id=a4.id
LEFT JOIN ".$this->db2->database.".b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ".$this->db2->database.".b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=".$exday." 
 AND  a4.is_effect=1");

        $firstblood = $query1->row_array();
        $this->db->close();
        $query2 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a4.audit_result = 3 then 1 end )pass,    
      count(case when a4.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a4.audit_result =3 then 1 else null end )/(count(case when a4.audit_result in (3,5,6)  then 1 end )+count(case when a4.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a4.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
(
 SELECT a2.user_id 
 from 
 (
 SELECT a.user_id                                         
  from ".$this->db1->database.".xj_apply a
 left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
 where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=".$exday." 
   and DATE_FORMAT(u.register_time,'%Y-%m-%d')=".$exday.$sql." 
 )a1
  LEFT JOIN ".$this->db1->database.".xj_apply a2 on a1.user_id=a2.user_id
 where DATE_FORMAT(a2.audit_time,'%Y-%m-%d')=".$exday." 
 GROUP BY a2.user_id HAVING count(a2.user_id)>1
)a3
LEFT JOIN ".$this->db1->database.".xj_apply a4 on a4.user_id=a3.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a4.user_id and t.apply_id=a4.id
LEFT JOIN ".$this->db2->database.".b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ".$this->db2->database.".b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=".$exday." 
 and  a4.is_effect=1;");

        $doublekill = $query2->row_array();
        $this->db->close();

        $query3 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a6.audit_result = 3 then 1 end )pass,    
      count(case when a6.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a6.audit_result =3 then 1 else null end )/(count(case when a6.audit_result in (3,5,6)  then 1 end )+count(case when a6.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a6.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=".$exday." 
    and u.register_time <".$exday.$sql." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
   
 )a3
   JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time >=".$exday." 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=".$exday." 
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a5.user_id=a6.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a6.user_id and t.apply_id=a6.id
LEFT JOIN ".$this->db2->database.".b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ".$this->db2->database.".b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a6.audit_time,'%Y-%m-%d')=".$exday."; ");
        $triplekill = $query3->row_array();
        $this->db->close();
        $query4 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a6.audit_result = 3 then 1 end )pass,    
      count(case when a6.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a6.audit_result =3 then 1 else null end )/(count(case when a6.audit_result in (3,5,6)  then 1 end )+count(case when a6.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a6.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=".$exday." 
    and u.register_time <".$exday.$sql." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
   
 )a3
   JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time >=".$exday." 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=".$exday." 
GROUP BY a4.user_id HAVING count(a4.user_id)>1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a5.user_id=a6.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a6.user_id and t.apply_id=a6.id
LEFT JOIN ".$this->db2->database.".b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ".$this->db2->database.".b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a6.audit_time,'%Y-%m-%d')=".$exday."; ");
        $ultrakill = $query4->row_array();
        $this->db->close();

        $query5 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end ) pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end ) getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM 
(
SELECT a10.user_id,a10.audit_result
from
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
from
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=".$exday." 
    and u.register_time <".$exday." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <".$exday." 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=".$exday." 
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < ".$exday." 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result in (4,5,6)
)a8
LEFT JOIN ".$this->db1->database.".xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on a9.user_id=t.user_id and t.apply_id=a9.id
LEFT JOIN ".$this->db2->database.".b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ".$this->db2->database.".b_payment_list w on w.contract_id=ap.contract_id
WHERE  DATE_FORMAT(a9.audit_time,'%Y-%m-%d')=".$exday." 
   and a9.is_effect=1;");

        $rampage = $query5->row_array();
        $this->db->close();


        $queryextra = $this->db1->query("SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM 
(
SELECT a10.user_id,a10.audit_result
from
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
from
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=".$exday." 
    and u.register_time <".$exday.$sql." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <".$exday." 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=".$exday." 
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < ".$exday." 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result =3
)a8
LEFT JOIN ".$this->db1->database.".xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on a9.user_id=t.user_id and t.apply_id=a9.id
LEFT JOIN ".$this->db2->database.".b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ".$this->db2->database.".b_payment_list w on w.contract_id=ap.contract_id
WHERE  DATE_FORMAT(a9.audit_time,'%Y-%m-%d')=".$exday." 
   and a9.is_effect=1;");

        $extra = $queryextra->row_array();
        $this->db->close();

        $query6 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
from
(
SELECT a10.user_id,a10.audit_result
from
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
from
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=".$exday." 
    and u.register_time <".$exday.$sql." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <".$exday." 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=".$exday." 
GROUP BY a4.user_id HAVING count(a4.user_id)>1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < ".$exday." 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result =3
)a8 
LEFT JOIN ".$this->db1->database.".xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a9.user_id and t.apply_id=a9.id
LEFT JOIN ".$this->db2->database.".b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ".$this->db2->database.".b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a9.audit_time,'%Y-%m-%d')=".$exday." 
  and a9.is_effect=1;");

        $godlike = $query6->row_array();
        $this->db->close();
        $query7 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
from
(
SELECT a10.user_id , a10.audit_result
from
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
from
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=".$exday." 
    and u.register_time <".$exday.$sql." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <".$exday." 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=".$exday." 
GROUP BY a4.user_id HAVING count(a4.user_id)>1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < ".$exday." 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result in (4,5,6)
)a8 
LEFT JOIN ".$this->db1->database.".xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a9.user_id and t.apply_id=a9.id
LEFT JOIN ".$this->db2->database.".b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ".$this->db2->database.".b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a9.audit_time,'%Y-%m-%d')=".$exday." 
  and a9.is_effect=1;");

        $holyshit = $query7->row_array();


        $this->db->close();
        $query8 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a.audit_result = 3 then 1 end )pass,    
      count(case when a.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a.audit_result =3 then 1 else null end )/count(case when a.audit_time is not null then 1 end )*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM ".$this->db1->database.".xj_apply a 
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a.user_id and t.apply_id=a.id
LEFT JOIN ".$this->db2->database.".b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ".$this->db2->database.".b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a.audit_time,'%Y-%m-%d')=".$exday." -- T
 and  a.is_effect=1;");
        $total = $query8->row_array();

        $firstblood['title'] = '新用户首借';
        $firstblood['status'] = '1';
        $firstblood['subtitle'] = '当日申请次数=1';

        $doublekill['title'] = '新用户首借';
        $doublekill['status'] = '2';
        $doublekill['subtitle'] = '当日申请次数>1';

        $triplekill['title'] = '老用户首借';
        $triplekill['status'] = '1';
        $triplekill['subtitle'] = '当日申请次数=1';

        $ultrakill['title'] = '老用户首借';
        $ultrakill['status'] = '2';
        $ultrakill['subtitle'] = '当日申请次数>1';

        $rampage['title'] = '老用户复借';
        $rampage['status'] = '1';
        $rampage['subtitle'] = '当日申请次数=1,上次拒绝';

        $holyshit['title'] = '老用户复借';
        $holyshit['status'] = '2';
        $holyshit['subtitle'] = '当日申请次数>1,上次拒绝';

        $extra['title'] = '老用户复借';
        $extra['status'] = '1';
        $extra['subtitle'] = '当日申请次数=1,上次通过';

        $godlike['title'] = '老用户复借';
        $godlike['status'] = '2';
        $godlike['subtitle'] = '当日申请次数>1,上次通过';

        $total['title'] = '总计';
        $total['status'] = '0';
        $total['subtitle'] = '总计';



        $result = array(
            'one'   =>$firstblood,
            'two'   =>$doublekill,
            'three' =>$triplekill,
            'four'  =>$ultrakill,
            'five'  =>$rampage,
            'seven' =>$holyshit,
            'extra' => $extra,
            'six'   =>$godlike,
            'total' =>$total

        );
        if($flag){
            $result = array(
                'one'   =>$firstblood,
                'three' =>$triplekill,
                'five'  =>$rampage,
                'extra' => $extra,
            );
        }
        return $result;
    }
    /**
     * @return mixed
     */
    public function overDue($date)
    {
        $day = empty($date) ? "'".date('Y-m-d')."'" : "'".$date."'";
        $exday = empty($date) ? "'".date("Y-m-d",strtotime("-1 day"))."'" : "'".date("Y-m-d",(strtotime($date) - 3600*24))."'";

        $data1 = $this->db1->query("select concat(round( ( count(*)-count(case when  r.payment_flag =1 then 1 end ))/count(*)*100,2),'%') as d1

  from ".$this->db2->database.".b_repayment_plan r 
LEFT JOIN ".$this->db2->database.".b_loan_application ap on r.contract_id=ap.contract_id 
LEFT JOIN credit_vetting.b_loan_application a  on ap.applyID=a.application_uuid
LEFT JOIN credit_vetting.b_yqb_fengkong  yqb on a.application_uuid =yqb.order_id
   
where  r.invalid_sign =1
  and r.due_date >=".$exday."
  and r.due_date < ".$day."
  and r.scene_id =100010")->row_array();

        $data2 = $this->db1->query("  select 
       count(*) havetopay,
       count( case when r.payment_flag=1 then 1 end ) normalpay
    
  from ".$this->db2->database.".b_repayment_plan r 
where r.invalid_sign =1
  and r.due_date >=date_sub(".$day.",interval extract(day from ".$day.") - 1 day)
  and r.due_date < ".$day."    
  and r.scene_id =100010;")->row_array();

        $data3 = $this->db1->query("select 
  count( case when r.payment_flag=3 then 1 end ) overduepay
    
  from ".$this->db2->database.".b_repayment_plan r 
where r.due_date >=date_sub(".$day.",interval extract(day from ".$day.") - 1 day)
  and r.due_date < ".$exday."    
   and r.real_date <".$day."   
  and r.scene_id =100010;")->row_array();

        $data4 = $this->db1->query("select 
        count(case when  r.payment_flag =2  then  1 end ) +
        count(case when  r.real_date > ".$exday." and  r.payment_flag =3 then 1 end ) overdue,
                                      
        concat(left((count(case when  r.payment_flag =2  then  1 end ) +
        count(case when  r.real_date > ".$exday." and  r.payment_flag =3 then 1 end ))/count(*)*100,5),'%') overduerate
                                       
  from ".$this->db2->database.".b_repayment_plan r 
where r.scene_id =100010 
 and r.invalid_sign =1
 and r.due_date >=date_sub(".$day.",interval extract(day from ".$day.") - 1 day)
 and r.due_date < ".$exday.";")->row_array();


        return array_merge($data1,$data2,$data3,$data4);

    }

    /**
     * @return mixed
     */
    public function moneyRate($date)
    {
        $day = empty($date) ? "'".date('Y-m-d')."'" : "'".$date."'";
        $exday = empty($date) ? "'".date("Y-m-d",strtotime("-1 day"))."'" : "'".date("Y-m-d",(strtotime($date) - 3600*24))."'";

        $query = $this->db1->query("SELECT 
               payment_amount ed,count(*) bs
        FROM ".$this->db2->database.".b_payment_list w  
        WHERE w.creat_date >=".$exday." 
          and w.creat_date <".$day."  
          and w.scene_id='100010'  
        and pay_flag=30 
        and invalid_sign=1
        group by  payment_amount;");

                return $query->result_array();
    }

    /**
     * @return mixed
     */
    public function transfer($date)
    {
        $day = empty($date) ? "'".date('Y-m-d')."'" : "'".$date."'";
        $firstday = empty($date) ? "'".date('Y-m-01', strtotime(date("Y-m-d")))."'" : "'".date('Y-m-01', strtotime($date))."'";

        $query = $this->db1->query("SELECT count(*) tAmount, sum(payment_amount) tMoney ,avg(payment_amount) tAve
FROM ".$this->db2->database.".b_payment_list w  
WHERE w.real_pay_date >= ".$firstday." 
  and  w.real_pay_date < ".$day."
 and w.scene_id='100010'  
and w.pay_flag=30 
and w.pay_flag=30 
and w.invalid_sign=1;");

        return $query->row_array();
    }

    public function registerinfoWeek($dateEnd = '',$dateStart = '',$place= '')
    {
        set_time_limit(0);
        $sql = empty($place) ? '' : ' and u.tg_location like '."'%".$place."%'";

        $register = $this->db1->query("select 
   count(distinct u.id) register
   from  ".$this->db1->database.".xj_user u  
  where date_format(u.register_time,'%Y-%m-%d') >=".'"'.$dateStart.'"'."
    and date_format(u.register_time,'%Y-%m-%d') <= ".'"'.$dateEnd.'"'."
    and u.is_effect =1".$sql)->row_array();

        $place  = $this->db1->query("select  
       case when u.login_origin =2  then  'APP:IOS' 
            when u.login_origin =3  then  'APP:ANDROID'  
            when (u.login_origin =1 and( u.tg_location in('wtnsu','wtnsu1','wtnsu?10000skip=true','wtnd','wtnsu/','wtnkj','null','wyxd','yxdx','') or u.tg_location is null)) then '微信'
            else  '外部渠道' end place,
       count(distinct u.id) amount
   from  ".$this->db1->database.".xj_user u  
  where date_format( u.register_time,'%Y-%m-%d') >=".'"'.$dateStart.'"'."
    and date_format(u.register_time,'%Y-%m-%d') <= ".'"'.$dateEnd.'"'."
    and u.is_effect =1".$sql."
GROUP BY place;")->result_array();
        if(empty($sql)) {
            $outplace = $this->db1->query("SELECT 
       
    u.tg_location place, count(DISTINCT u.id ) amount
    
  from  " . $this->db1->database . ".xj_user u  
where u.is_effect =1 
   and u.login_origin =1
   and u.tg_location  not in  ('wtnsu','wtnsu1','wtnsu?10000skip=true','wtnd','wtnkj','','wtnsu/','null','wyxd','yxdx','wyxdhttps') 
   and u.tg_location is not null
   and date_format(u.register_time,'%Y-%m-%d') >=".'"'.$dateStart.'"'. "
   and date_format(u.register_time,'%Y-%m-%d') <= " .'"'.$dateEnd.'"'. "   
GROUP BY u.tg_location 
ORDER BY amount desc limit 10;")->result_array();
        }else{
            $outplace = array();
        }


        $result = array(
            'register'=>$register,
            'place'   =>$place,
            'outplace'=>$outplace
        );
        return $result;
    }

    /**
     * @return mixed
     */
    public function finishWeek($dateEnd = '',$dateStart = '',$place = '')
    {
        set_time_limit(0);
        $sql = empty($place) ? '' : ' and u.tg_location like '."'%".$place."%'";

        $query1 = $this->db1->query("SELECT COUNT(*)  finish,       
      COUNT(CASE WHEN a4.audit_result = 3 THEN 1 END )pass,    
      COUNT(CASE WHEN a4.audit_result = 4 THEN 1 END ) refused,
      concat(left(count(case when a4.audit_result =3 then 1 else null end )/(count(case when a4.audit_result in (3,5,6)  then 1 end )+count(case when a4.audit_result =4 then 1 end ))*100,5),'%') passrate,
      COUNT(CASE WHEN t.into_account_result IN (1,2,3,4) THEN a4.user_id END ) getmoney,
      COUNT(CASE WHEN t.into_account_result IN (2,4) THEN a4.user_id END ) transfer, 
      SUM(CASE WHEN t.into_account_result IN (2,4) THEN t.actual_amount  END ) transfermoney,
      AVG ( CASE WHEN  t.into_account_result IN (2,4) THEN t.actual_amount  END) avgmoney
FROM
(
 SELECT a2.user_id 
 FROM 
 (
 SELECT a.user_id                                         
  FROM ".$this->db1->database.".xj_apply a
 LEFT JOIN ".$this->db1->database.".xj_user u ON a.user_id =u.id 
    where date_format(a.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'."
    and date_format(a.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."
    and u.register_time>=".'"'.$dateStart.'"'."
 )a1
  LEFT JOIN ".$this->db1->database.".xj_apply a2 ON a1.user_id=a2.user_id
    where date_format(a2.audit_time,'%Y-%m-%d') >=".'"'.$dateStart.'"'."
    and date_format(a2.audit_time,'%Y-%m-%d') <=".'"'.$dateEnd.'"'."
 GROUP BY a2.user_id HAVING COUNT(a2.user_id)=1
)a3
LEFT JOIN ".$this->db1->database.".xj_apply a4 ON a4.user_id=a3.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t ON t.user_id=a4.user_id AND t.apply_id=a4.id
WHERE date_format(a4.audit_time,'%Y-%m-%d') >=".'"'.$dateStart.'"'."
  and date_format(a4.audit_time,'%Y-%m-%d') <=".'"'.$dateEnd.'"'."
 AND  a4.is_effect=1");

        $firstblood = $query1->row_array();
        $this->db->close();
        $query2 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a4.audit_result = 3 then 1 end )pass,    
      count(case when a4.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a4.audit_result =3 then 1 else null end )/(count(case when a4.audit_result in (3,5,6)  then 1 end )+count(case when a4.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a4.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a4.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
(
 SELECT a2.user_id 
 from 
 (
 SELECT a.user_id                                         
  from ".$this->db1->database.".xj_apply a
 left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
 where date_format(a.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
   and date_format(a.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'." 
   and u.register_time>=".'"'.$dateStart.'"'." 
 )a1
  LEFT JOIN ".$this->db1->database.".xj_apply a2 on a1.user_id=a2.user_id
 where date_format(a2.audit_time,'%Y-%m-%d') >=".'"'.$dateStart.'"'." 
   and date_format(a2.audit_time,'%Y-%m-%d') <=".'"'.$dateEnd.'"'."  
 GROUP BY a2.user_id HAVING count(a2.user_id)>1
)a3
LEFT JOIN ".$this->db1->database.".xj_apply a4 on a4.user_id=a3.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a4.user_id and t.apply_id=a4.id
WHERE date_format(a4.audit_time,'%Y-%m-%d') >=".'"'.$dateStart.'"'." 
  and date_format(a4.audit_time,'%Y-%m-%d') <=".'"'.$dateEnd.'"'."  
 and  a4.is_effect=1;");

        $doublekill = $query2->row_array();
        $this->db->close();

        $query3 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a6.audit_result = 3 then 1 end )pass,    
      count(case when a6.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a6.audit_result =3 then 1 else null end )/(count(case when a6.audit_result in (3,5,6)  then 1 end )+count(case when a6.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a6.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a6.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where date_format(a.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
    and date_format(a.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
    and u.register_time <".'"'.$dateStart.'"'."  
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
   
 )a3
   JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where date_format(a3.audit_time,'%Y-%m-%d') >=".'"'.$dateStart.'"'." 
    and date_format(a4.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'."  
    and date_format(a4.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."   
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a5.user_id=a6.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a6.user_id and t.apply_id=a6.id
WHERE date_format(a6.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
  and date_format(a6.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."; ");
        $triplekill = $query3->row_array();
        $this->db->close();
        $query4 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a6.audit_result = 3 then 1 end )pass,    
      count(case when a6.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a6.audit_result =3 then 1 else null end )/(count(case when a6.audit_result in (3,5,6)  then 1 end )+count(case when a6.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a6.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a6.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where date_format(a.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
    and date_format(a.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
    and u.register_time <".'"'.$dateStart.'"'."  
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
   
 )a3
   JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where date_format(a3.audit_time,'%Y-%m-%d') >=".'"'.$dateStart.'"'." 
    and date_format(a4.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'."  
    and date_format(a4.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
GROUP BY a4.user_id HAVING count(a4.user_id)>1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a5.user_id=a6.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a6.user_id and t.apply_id=a6.id
WHERE date_format(a6.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
  and date_format(a6.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."; ");
        $ultrakill = $query4->row_array();
        $this->db->close();

        $query5 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end ) pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end ) getmoney,
      count(case when t.into_account_result in (2,4) then a9.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM 
(
SELECT a10.user_id,a10.audit_result
from
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
from
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where date_format(a.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'."  
    and date_format(a.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."   
    and u.register_time <".'"'.$dateStart.'"'." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <".'"'.$dateStart.'"'." 
    and date_format(a4.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'."  
    and date_format(a4.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < ".'"'.$dateStart.'"'." 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result in (4,5,6)
)a8
LEFT JOIN ".$this->db1->database.".xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on a9.user_id=t.user_id and t.apply_id=a9.id
WHERE  date_format(a9.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
   and date_format(a9.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
   and a9.is_effect=1;");
        $rampage = $query5->row_array();
        $this->db->close();


        $queryextra = $this->db1->query("SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a9.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM 
(
SELECT a10.user_id,a10.audit_result
from
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
from
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where date_format(a.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'."  
    and date_format(a.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
    and u.register_time <".'"'.$dateStart.'"'." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <".'"'.$dateStart.'"'."  
    and date_format(a4.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'."  
    and date_format(a4.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < ".'"'.$dateStart.'"'."  
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result =3
)a8
LEFT JOIN ".$this->db1->database.".xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on a9.user_id=t.user_id and t.apply_id=a9.id
WHERE  date_format(a9.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
   and date_format(a9.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
   and a9.is_effect=1;");
        $extra = $queryextra->row_array();

        $this->db->close();

        $query6 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a9.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
from
(
SELECT a10.user_id,a10.audit_result
from
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
from
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where date_format(a.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
    and date_format(a.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
    and u.register_time <".'"'.$dateStart.'"'." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <".'"'.$dateStart.'"'." 
    and date_format(a4.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
    and date_format(a4.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
GROUP BY a4.user_id HAVING count(a4.user_id)>1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < ".'"'.$dateStart.'"'." 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result =3
)a8 
LEFT JOIN ".$this->db1->database.".xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a9.user_id and t.apply_id=a9.id
WHERE date_format(a9.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
  and date_format(a9.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
  and a9.is_effect=1;");
        $godlike = $query6->row_array();
        $this->db->close();
        $query7 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a9.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
from
(
SELECT a10.user_id,a10.audit_result
from
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
from
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where date_format(a.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
    and date_format(a.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
    and u.register_time <".'"'.$dateStart.'"'." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <".'"'.$dateStart.'"'." 
    and date_format(a4.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
    and date_format(a4.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'." 
GROUP BY a4.user_id HAVING count(a4.user_id)>1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < ".'"'.$dateStart.'"'." 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result in (4,5,6)
)a8 
LEFT JOIN ".$this->db1->database.".xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a9.user_id and t.apply_id=a9.id
WHERE date_format(a9.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
  and date_format(a9.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
  and a9.is_effect=1;");
        $holyshit = $query7->row_array();


        $this->db->close();
        $query8 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a.audit_result = 3 then 1 end )pass,    
      count(case when a.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a.audit_result =3 then 1 else null end )/count(case when a.audit_time is not null then 1 end )*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM ".$this->db1->database.".xj_apply a 
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a.user_id and t.apply_id=a.id
WHERE date_format(a.audit_time,'%Y-%m-%d')>=".'"'.$dateStart.'"'." 
  and date_format(a.audit_time,'%Y-%m-%d')<=".'"'.$dateEnd.'"'."  
 and  a.is_effect=1;");
        $total = $query8->row_array();

        $firstblood['title'] = '新用户首借';
        $firstblood['status'] = '1';
        $firstblood['subtitle'] = '当日申请次数=1';

        $doublekill['title'] = '新用户首借';
        $doublekill['status'] = '2';
        $doublekill['subtitle'] = '当日申请次数>1';

        $triplekill['title'] = '老用户首借';
        $triplekill['status'] = '1';
        $triplekill['subtitle'] = '当日申请次数=1';

        $ultrakill['title'] = '老用户首借';
        $ultrakill['status'] = '2';
        $ultrakill['subtitle'] = '当日申请次数>1';

        $rampage['title'] = '老用户复借';
        $rampage['status'] = '1';
        $rampage['subtitle'] = '当日申请次数=1,上次拒绝';

        $holyshit['title'] = '老用户复借';
        $holyshit['status'] = '2';
        $holyshit['subtitle'] = '当日申请次数>1,上次拒绝';

        $extra['title'] = '老用户复借';
        $extra['status'] = '1';
        $extra['subtitle'] = '当日申请次数=1,上次通过';

        $godlike['title'] = '老用户复借';
        $godlike['status'] = '2';
        $godlike['subtitle'] = '当日申请次数>1,上次通过';


        $total['title'] = '总计';
        $total['status'] = '0';
        $total['subtitle'] = '总计';




        $result = array(
            'one'   =>$firstblood,
            'two'   =>$doublekill,
            'three' =>$triplekill,
            'four'  =>$ultrakill,
            'five'  =>$rampage,
            'seven' =>$holyshit,
            'extra' => $extra,
            'six'   =>$godlike,
            'total' =>$total

        );
        return $result;
    }
    /**
     * @return mixed
     */
    public function overDueWeek($dateEnd = '',$dateStart = '')
    {
        set_time_limit(0);
        $data1 = $this->db1->query("select count(*) havetopay,
       count( case when r.payment_flag=1 then 1 end ) normalpay,
       count( case when r.payment_flag=3  and DATE_FORMAT(r.real_date,'%Y-%m-%d') <= ".'"'.$dateEnd.'"'." then 1 end ) overduepay,
       count(case when  r.payment_flag =2  then  1 end ) +
       count(case when  DATE_FORMAT(r.real_date,'%Y-%m-%d') >".'"'.$dateEnd.'"'." and  r.payment_flag =3 then 1 end )overdue
    
  from ".$this->db2->database.".b_repayment_plan r 
where r.invalid_sign =1
  and DATE_FORMAT(r.due_date,'%Y-%m-%d') >=".'"'.$dateStart.'"'." 
  and DATE_FORMAT(r.due_date,'%Y-%m-%d') <= ".'"'.$dateEnd.'"'."
  and r.scene_id =100010;")->row_array();

        return $data1;

    }


    /**
     * @return mixed
     */
    public function moneyRateWeek($dateEnd = '',$dateStart = '')
    {
        set_time_limit(0);
        $query = $this->db1->query("SELECT 
               payment_amount ed,count(*) bs
        FROM ".$this->db2->database.".b_payment_list w  
        WHERE DATE_FORMAT(w.creat_date,'%Y-%m-%d') >=".'"'.$dateStart.'"'."
          and DATE_FORMAT(w.creat_date,'%Y-%m-%d') <=".'"'.$dateEnd.'"'."  
          and w.scene_id='100010'  
        and pay_flag=30 
        and invalid_sign=1
        group by  payment_amount;");
        return $query->result_array();
    }


    /**
     * @return mixed
     */
    public function registerSituationPart($dateEnd = '',$dateStart = '',$place = '')
    {
        $sql = empty($place) ? '' : ' and u.tg_location like '."'%".$place."%'";


        $query = $this->db1->query("select  
       case when u.login_origin =1  then  'H5' 
            when u.login_origin =2  then  'APP:IOS' 
            when u.login_origin =3  then  'APP:安卓' end source ,
       case when (u.login_origin =1 and (u.tg_location='' or u.tg_location is null)) then '微信自然流'     
            when (u.login_origin =2 and (u.tg_location='' or u.tg_location is null)) then 'IOS'
            when (u.login_origin =3 and (u.tg_location='' or u.tg_location is null)) then '自然流'
            else  u.tg_location end place,   
       count(DISTINCT u.id) regAmount,
       count(case when a.audit_time is not null then 1 end ) finAmount,
       count(case when a.audit_result in (3,5,6) then 1 else null end ) passAmount,
       concat(left(count(case when a.audit_time is not null then 1 end )/count(DISTINCT u.id )*100,5),'%') finRate,
       concat(left(count(case when a.audit_result in (3,5,6) then 1 else null end )/count(case when a.audit_time is not null then 1 end )*100,5),'%') passRate
       

 from  ".$this->db1->database.".xj_user u  
LEFT JOIN ".$this->db1->database.".xj_apply a on a.user_id=u.id
  where u.register_time >=".'"'.$dateStart.'"'."
    and u.register_time < ".'"'.$dateEnd.'"'.$sql."
    and u.is_effect =1
GROUP BY source,place
ORDER BY source,regAmount desc;");
        return $query->result_array();
    }

    public function registerSituationTotal($dateEnd = '',$dateStart = '',$place = '')
    {

        $sql = empty($place) ? '' : ' and u.tg_location like '."'%".$place."%'";

        $query = $this->db1->query("select  
       
       count(DISTINCT u.id) regAmount,
       count(case when a.audit_time is not null then 1 end ) finAmount,
       count(case when a.audit_result in (3,5,6) then 1 else null end ) passAmount,
       concat(left(count(case when a.audit_time is not null then 1 end )/count(DISTINCT u.id )*100,5),'%') finRate,
       concat(left(count(case when a.audit_result in (3,5,6) then 1 else null end )/count(case when a.audit_time is not null then 1 end )*100,5),'%') passRate
       

 from  ".$this->db1->database.".xj_user u  
LEFT JOIN ".$this->db1->database.".xj_apply a on a.user_id=u.id
  where u.register_time >=".'"'.$dateStart.'"'."
    and u.register_time < ".'"'.$dateEnd.'"'.$sql."
    and u.is_effect =1;");
        return $query->row_array();
    }


    /**
     * @return mixed
     */
    public function applySuccess($dateEnd = '',$dateStart = '',$place = '')
    {

        $sql = empty($place) ? '' : ' and u.tg_location like '."'%".$place."%'";

        $query1 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a4.audit_result = 3 then 1 end )pass,    
      count(case when a4.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a4.audit_result =3 then 1 else null end )/(count(case when a4.audit_result in (3,5,6)  then 1 end )+count(case when a4.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a4.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a4.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
(
 SELECT a2.user_id 
 from 
 (
 SELECT a.user_id                                         
  from ".$this->db1->database.".xj_apply a
 left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
 where a.audit_time>=".'"'.$dateStart.'"'."
   and a.audit_time<".'"'.$dateEnd.'"'."
   and u.register_time>=".'"'.$dateStart.'"'."
 )a1
  LEFT JOIN ".$this->db1->database.".xj_apply a2 on a1.user_id=a2.user_id
 where a2.audit_time >=".'"'.$dateStart.'"'."
   and a2.audit_time <".'"'.$dateEnd.'"'."
 GROUP BY a2.user_id HAVING count(a2.user_id)=1
)a3
LEFT JOIN ".$this->db1->database.".xj_apply a4 on a4.user_id=a3.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a4.user_id and t.apply_id=a4.id
LEFT JOIN ".$this->db1->database.".xj_user u on u.id=a4.user_id
WHERE a4.audit_time >=".'"'.$dateStart.'"'."
  and a4.audit_time <".'"'.$dateEnd.'"'." 
  and a4.is_effect=1
  ".$sql."
 ");

        $firstblood = $query1->row_array();
        $this->db->close();
        $query2 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a4.audit_result = 3 then 1 end )pass,    
      count(case when a4.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a4.audit_result =3 then 1 else null end )/(count(case when a4.audit_result in (3,5,6)  then 1 end )+count(case when a4.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a4.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a4.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
(
 SELECT a2.user_id 
 from 
 (
 SELECT a.user_id                                         
  from ".$this->db1->database.".xj_apply a
 left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
 where a.audit_time>=".'"'.$dateStart.'"'." 
   and a.audit_time<".'"'.$dateEnd.'"'." 
   and u.register_time>=".'"'.$dateStart.'"'." 
 )a1
  LEFT JOIN ".$this->db1->database.".xj_apply a2 on a1.user_id=a2.user_id
 where a2.audit_time >=".'"'.$dateStart.'"'." 
   and a2.audit_time <".'"'.$dateEnd.'"'."  
 GROUP BY a2.user_id HAVING count(a2.user_id)>1
)a3
LEFT JOIN ".$this->db1->database.".xj_apply a4 on a4.user_id=a3.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a4.user_id and t.apply_id=a4.id
LEFT JOIN ".$this->db1->database.".xj_user u on u.id=a4.user_id
WHERE a4.audit_time >=".'"'.$dateStart.'"'."
  and a4.audit_time <".'"'.$dateEnd.'"'." 
  and a4.is_effect=1
  ".$sql." 
 ");

        $doublekill = $query2->row_array();
        $this->db->close();

        $query3 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a6.audit_result = 3 then 1 end )pass,    
      count(case when a6.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a6.audit_result =3 then 1 else null end )/(count(case when a6.audit_result in (3,5,6)  then 1 end )+count(case when a6.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a6.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a6.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where a.audit_time>=".'"'.$dateStart.'"'." 
    and a.audit_time<".'"'.$dateEnd.'"'."  
    and u.register_time <".'"'.$dateStart.'"'."  
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
   
 )a3
   JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time >=".'"'.$dateStart.'"'." 
    and a4.audit_time>=".'"'.$dateStart.'"'."  
    and a4.audit_time<".'"'.$dateEnd.'"'."   
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a5.user_id=a6.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a6.user_id and t.apply_id=a6.id
LEFT JOIN ".$this->db1->database.".xj_user u on u.id=a6.user_id
WHERE a6.audit_time >=".'"'.$dateStart.'"'."
  and a6.audit_time <".'"'.$dateEnd.'"'." 
  and a6.is_effect=1
  ".$sql." 
");
        $triplekill = $query3->row_array();
        $this->db->close();
        $query4 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a6.audit_result = 3 then 1 end )pass,    
      count(case when a6.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a6.audit_result =3 then 1 else null end )/(count(case when a6.audit_result in (3,5,6)  then 1 end )+count(case when a6.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a6.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a6.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where a.audit_time>=".'"'.$dateStart.'"'." 
    and a.audit_time<".'"'.$dateEnd.'"'."  
    and u.register_time <".'"'.$dateStart.'"'."  
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
   
 )a3
   JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time >=".'"'.$dateStart.'"'." 
    and a4.audit_time>=".'"'.$dateStart.'"'."  
    and a4.audit_time<".'"'.$dateEnd.'"'."  
GROUP BY a4.user_id HAVING count(a4.user_id)>1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a5.user_id=a6.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a6.user_id and t.apply_id=a6.id
LEFT JOIN ".$this->db1->database.".xj_user u on u.id=a6.user_id
WHERE a6.audit_time >=".'"'.$dateStart.'"'."
  and a6.audit_time <".'"'.$dateEnd.'"'." 
  and a6.is_effect=1
  ".$sql." 
");
        $ultrakill = $query4->row_array();
        $this->db->close();

        $query5 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a9.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM 
(
SELECT a10.user_id,a10.audit_result
from
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
from
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where a.audit_time>=".'"'.$dateStart.'"'." 
    and a.audit_time<".'"'.$dateEnd.'"'."  
    and u.register_time <".'"'.$dateStart.'"'." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <".'"'.$dateStart.'"'."
    and a4.audit_time>=".'"'.$dateStart.'"'."  
    and a4.audit_time<".'"'.$dateEnd.'"'." 
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < ".'"'.$dateStart.'"'."
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result in (4,5,6)
)a8
LEFT JOIN ".$this->db1->database.".xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on a9.user_id=t.user_id and t.apply_id=a9.id
LEFT JOIN ".$this->db1->database.".xj_user u on u.id=a9.user_id
WHERE  a9.audit_time >=".'"'.$dateStart.'"'."
  and  a9.audit_time <".'"'.$dateEnd.'"'."
  and  a9.is_effect=1
  ".$sql." 
");

        $rampage = $query5->row_array();
        $this->db->close();


        $queryextra = $this->db1->query("SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a9.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM 
(
SELECT a10.user_id,a10.audit_result
from
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
from
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from ".$this->db1->database.".xj_apply a
  left join ".$this->db1->database.".xj_user u on a.user_id =u.id 
  where a.audit_time>=".'"'.$dateStart.'"'."  
    and a.audit_time<".'"'.$dateEnd.'"'."  
    and u.register_time <".'"'.$dateStart.'"'." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <".'"'.$dateStart.'"'."  
    and a4.audit_time>=".'"'.$dateStart.'"'."  
    and a4.audit_time<".'"'.$dateEnd.'"'."  
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < ".'"'.$dateStart.'"'."  
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result =3
)a8
LEFT JOIN ".$this->db1->database.".xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t on a9.user_id=t.user_id and t.apply_id=a9.id
LEFT JOIN ".$this->db1->database.".xj_user u on u.id=a9.user_id
WHERE  a9.audit_time >=".'"'.$dateStart.'"'."
  and  a9.audit_time <".'"'.$dateEnd.'"'." 
  and  a9.is_effect=1".$sql);
        $extra = $queryextra->row_array();

        $this->db->close();

        $query6 = $this->db1->query("SELECT COUNT(*)  finish,       
      COUNT(CASE WHEN a9.audit_result = 3 THEN 1 END )pass,    
      COUNT(CASE WHEN a9.audit_result = 4 THEN 1 END ) refused,
       concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      COUNT(CASE WHEN t.into_account_result IN (1,2,3,4) THEN a9.user_id END )getmoney,
      COUNT(CASE WHEN t.into_account_result IN (2,4) THEN a9.user_id END ) transfer, 
      SUM(CASE WHEN t.into_account_result IN (2,4) THEN t.actual_amount  END ) transfermoney,
      AVG ( CASE WHEN  t.into_account_result IN (2,4) THEN t.actual_amount  END) avgmoney
FROM
(
SELECT a10.user_id,a10.audit_result
FROM
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
FROM
(
SELECT a4.user_id
FROM
 (
 SELECT a2.user_id,MIN(a2.audit_time) AS audit_time
 FROM 
  (
  SELECT a.user_id                            
   FROM ".$this->db1->database.".xj_apply a
  LEFT JOIN ".$this->db1->database.".xj_user u ON a.user_id =u.id 
  WHERE a.audit_time>=".'"'.$dateStart.'"'." 
    AND a.audit_time<".'"'.$dateEnd.'"'."  
    AND u.register_time <".'"'.$dateStart.'"'." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 ON a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 ON a3.user_id=a4.user_id
  WHERE a3.audit_time <".'"'.$dateStart.'"'." 
    AND a4.audit_time>=".'"'.$dateStart.'"'." 
    AND a4.audit_time<".'"'.$dateEnd.'"'."  
GROUP BY a4.user_id HAVING COUNT(a4.user_id)>1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 ON a6.user_id=a5.user_id
WHERE a6.audit_time < ".'"'.$dateStart.'"'." 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result =3
)a8 
LEFT JOIN ".$this->db1->database.".xj_apply a9 ON a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t ON t.user_id=a9.user_id AND t.apply_id=a9.id
LEFT JOIN ".$this->db1->database.".xj_user u ON u.id=a9.user_id
WHERE a9.audit_time >=".'"'.$dateStart.'"'."
  AND  a9.audit_time <".'"'.$dateEnd.'"'." 
  AND  a9.is_effect=1".$sql);

        $godlike = $query6->row_array();
        $this->db->close();
        $query7 = $this->db1->query("SELECT COUNT(*)  finish,       
      COUNT(CASE WHEN a9.audit_result = 3 THEN 1 END )pass,    
      COUNT(CASE WHEN a9.audit_result = 4 THEN 1 END ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      COUNT(CASE WHEN t.into_account_result IN (1,2,3,4) THEN a9.user_id END )getmoney,
      COUNT(CASE WHEN t.into_account_result IN (2,4) THEN a9.user_id END ) transfer, 
      SUM(CASE WHEN t.into_account_result IN (2,4) THEN t.actual_amount  END ) transfermoney,
      AVG ( CASE WHEN  t.into_account_result IN (2,4) THEN t.actual_amount  END) avgmoney
FROM
(
SELECT a10.user_id,a10.audit_result
FROM
(
SELECT a6.user_id,MAX(a6.audit_time) as audit_time
FROM
(
SELECT a4.user_id
FROM
 (
 SELECT a2.user_id,MIN(a2.audit_time) AS audit_time
 FROM 
  (
  SELECT a.user_id                            
   FROM ".$this->db1->database.".xj_apply a
  LEFT JOIN ".$this->db1->database.".xj_user u ON a.user_id =u.id 
  WHERE a.audit_time>=".'"'.$dateStart.'"'." 
    AND a.audit_time<".'"'.$dateEnd.'"'."  
    AND u.register_time <".'"'.$dateStart.'"'." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN ".$this->db1->database.".xj_apply a2 ON a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN ".$this->db1->database.".xj_apply a4 ON a3.user_id=a4.user_id
  WHERE a3.audit_time <".'"'.$dateStart.'"'." 
    AND a4.audit_time>=".'"'.$dateStart.'"'." 
    AND a4.audit_time<".'"'.$dateEnd.'"'." 
GROUP BY a4.user_id HAVING COUNT(a4.user_id)>1
)a5
LEFT JOIN ".$this->db1->database.".xj_apply a6 ON a6.user_id=a5.user_id
WHERE a6.audit_time < ".'"'.$dateStart.'"'." 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result IN (4,5,6)
)a8 
LEFT JOIN ".$this->db1->database.".xj_apply a9 ON a8.user_id=a9.user_id
LEFT JOIN ".$this->db1->database.".xj_transfer t ON t.user_id=a9.user_id AND t.apply_id=a9.id
LEFT JOIN ".$this->db1->database.".xj_user u ON u.id=a9.user_id
WHERE a9.audit_time >=".'"'.$dateStart.'"'."
  AND  a9.audit_time <".'"'.$dateEnd.'"'." 
  AND  a9.is_effect=1
  ".$sql." 
");

        $holyshit = $query7->row_array();


        $this->db->close();
        $query8 = $this->db1->query("SELECT count(*)  finish,       
      count(case when a4.audit_result = 3 then 1 end )pass,    
      count(case when a4.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a4.audit_result =3 then 1 else null end )/count(case when a4.audit_time is not null then 1 end )*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a4.user_id end )getmoney,
      count(case when t.into_account_result in (2,4) then a4.user_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
FROM
".$this->db1->database.".xj_apply a4 
LEFT JOIN ".$this->db1->database.".xj_transfer t on t.user_id=a4.user_id and t.apply_id=a4.id
LEFT JOIN ".$this->db1->database.".xj_user u on u.id=a4.user_id
WHERE a4.audit_time >=".'"'.$dateStart.'"'."
  and a4.audit_time <".'"'.$dateEnd.'"'." 
  and a4.is_effect=1
  ".$sql);
        $total = $query8->row_array();

        $firstblood['title'] = '新用户首借';
        $firstblood['status'] = '1';
        $firstblood['subtitle'] = '当日申请次数=1';

        $doublekill['title'] = '新用户首借';
        $doublekill['status'] = '2';
        $doublekill['subtitle'] = '当日申请次数>1';

        $triplekill['title'] = '老用户首借';
        $triplekill['status'] = '1';
        $triplekill['subtitle'] = '当日申请次数=1';

        $ultrakill['title'] = '老用户首借';
        $ultrakill['status'] = '2';
        $ultrakill['subtitle'] = '当日申请次数>1';

        $rampage['title'] = '老用户复借';
        $rampage['status'] = '1';
        $rampage['subtitle'] = '当日申请次数=1,上次拒绝';

        $holyshit['title'] = '老用户复借';
        $holyshit['status'] = '2';
        $holyshit['subtitle'] = '当日申请次数>1,上次拒绝';

        $extra['title'] = '老用户复借';
        $extra['status'] = '1';
        $extra['subtitle'] = '当日申请次数=1,上次通过';

        $godlike['title'] = '老用户复借';
        $godlike['status'] = '2';
        $godlike['subtitle'] = '当日申请次数>1,上次通过';


        $total['title'] = '总计';
        $total['status'] = '0';
        $total['subtitle'] = '总计';




        $result = array(
            'one'   =>$firstblood,
            'two'   =>$doublekill,
            'three' =>$triplekill,
            'four'  =>$ultrakill,
            'five'  =>$rampage,
            'seven' =>$holyshit,
            'extra' => $extra,
            'six'   =>$godlike,
            'total' =>$total

        );
        return $result;
    }


    /**
     * @return mixed
     */
    public function finishoverdueSituation($dateEnd = '',$dateStart = '',$place = '')
    {
        $sql = empty($place) ? '' : ' and u.tg_location like '."'%".$place."%'";

        $query = $this->db1->query("select 
       case when u.login_origin =1  then  'H5' 
            when u.login_origin =2  then  'APP:IOS' 
            when u.login_origin =3  then  'APP:安卓' end source ,
       case when (u.login_origin =1 and (u.tg_location='' or u.tg_location is null)) then '微信自然流'     
            when (u.login_origin =2 and (u.tg_location='' or u.tg_location is null)) then 'IOS'
            when (u.login_origin =3 and (u.tg_location='' or u.tg_location is null)) then '自然流'
            else  u.tg_location end place,   


       count(*) havetopay,

       count( case when r.payment_flag=1 then 1 end ) normalpay,
       concat(left(count(case when r.payment_flag =1 then 1 end )/count(*)*100,5 ),'%') normalpayrate,

       count( case when r.payment_flag=3 and r.real_date >=r.due_date then 1 end ) overduepay,
       concat(left(count(case when r.payment_flag =3 then 1 end )/count(*)*100,5 ),'%') overduepayrate,

       count( case when r.payment_flag=2 then 1 end ) overdue,
       concat(left(count(case when r.payment_flag=2 then 1 end )/count(*)*100,5),'%') overdueratea,
       concat(left(sum(case when r.payment_flag =2 then r.capital end )/sum(r.capital)*100,5),'%') overduerateb
       
       
      
       
       
  from ".$this->db2->database.".b_repayment_plan r 


, ".$this->db2->database.".b_loan_application ap 
, ".$this->db1->database.".xj_transfer t 
, ".$this->db1->database.".xj_user u 

where r.invalid_sign =1
  and r.due_date >=".'"'.$dateStart.'"'." 
  and r.due_date < ".'"'.$dateEnd.'"'." 
  and r.scene_id =100010 
  and r.contract_id=ap.contract_id
  and t.application_id=ap.application_id
  and t.user_id=u.id
  ".$sql."

GROUP BY  source,place
ORDER BY  source");

        return $query->result_array();
    }
}