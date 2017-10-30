<?php
class Collection_model extends CI_Model
{
    public $db3;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db3 = $this->load->database('db3',true);


    }

    public function getAll($scene_id){
        $query = $this->db3->query("SELECT 
(@rownum:=@rownum+1) as id ,
  name,
  CASE
    SUBSTR(identify FROM 17 FOR 1) & 1 
    WHEN 1 
    THEN '男' 
    WHEN 0 
    THEN '女' 
  END AS gender,
  YEAR('".$date."') - IF(
    LENGTH(identify) = 18,
    SUBSTRING(identify, 7, 4),
    IF(
      LENGTH(identify) = 15,
      CONCAT('19', SUBSTRING(identify, 7, 2)),
      NULL
    )
  ) AS YEAR,
  identify,
  tel,
  if(isnull(risk),'否',risk) risk,
  IF(ISNULL(lostselect), '否', '是') islost,
  lostselect,
  IF(ISNULL(lostselect),'NULL',(SELECT adm_name FROM dun_admin WHERE id = (SELECT aid FROM dun_record re WHERE re.uid = co.id ORDER BY sort_id DESC LIMIT 1))) AS nnnn
FROM
  dun_collection co,(SELECT @rownum:=0) temp
WHERE scene_id = ".$scene_id)->result_array();
        return $query;
    }


    public function getRpay($date){
        $query = $this->db3->query("SELECT m.adm_name 姓名,
      case when m.D1=0 then '' else m.D1 end D1,
      case when m.D2=0 then '' else m.D2 end D2,
      case when m.D3=0 then '' else m.D3 end D3,
      case when m.D4=0 then '' else m.D4 end D4,
      case when m.D5=0 then '' else m.D5 end D5,
      case when m.D6=0 then '' else m.D6 end D6,
      case when m.D7=0 then '' else m.D7 end D7,
      case when m.D8=0 then '' else m.D8 end D8,
      case when m.D9=0 then '' else m.D9 end D9,
      case when m.D10=0 then '' else m.D10 end D10,
      case when m.D11=0 then '' else m.D11 end D11,
      case when m.D12=0 then '' else m.D12 end D12,
      case when m.D13=0 then '' else m.D13 end D13,
      case when m.D14=0 then '' else m.D14 end D14,
      case when m.D15=0 then '' else m.D15 end D15,
      case when m.D16=0 then '' else m.D16 end D16,
      case when m.D17=0 then '' else m.D17 end D17,
      case when m.D18=0 then '' else m.D18 end D18,
      case when m.D19=0 then '' else m.D19 end D19,
      case when m.D20=0 then '' else m.D20 end D20,
      case when m.D21=0 then '' else m.D21 end D21,
      case when m.D22=0 then '' else m.D22 end D22,
      case when m.D23=0 then '' else m.D23 end D23,
      case when m.D24=0 then '' else m.D24 end D24,
      case when m.D25=0 then '' else m.D25 end D25,
      case when m.D26=0 then '' else m.D26 end D26,
      case when m.D27=0 then '' else m.D27 end D27,
      case when m.D28=0 then '' else m.D28 end D28,
      case when m.D29=0 then '' else m.D29 end D29,
      case when m.D30=0 then '' else m.D30 end D30,
      case when m.D31=0 then '' else m.D31 end D31

from
(
SELECT a.adm_name,
       count(case when p.days=1 then 1 end) D1,
       count(case when p.days=2 then 1 end)D2,
       count(case when p.days=3 then 1 end)D3,
       count(case when p.days=4 then 1 end)D4,
       count(case when p.days=5 then 1 end)D5,
       count(case when p.days=6 then 1 end)D6,
       count(case when p.days=7 then 1 end)D7,
       count(case when p.days=8 then 1 end)D8,
       count(case when p.days=9 then 1 end)D9,
       count(case when p.days=10 then 1 end)D10,
       count(case when p.days=11 then 1 end)D11,
       count(case when p.days=12 then 1 end)D12,
       count(case when p.days=13 then 1 end)D13,
       count(case when p.days=14 then 1 end)D14,
       count(case when p.days=15 then 1 end)D15,
       count(case when p.days=16 then 1 end)D16,
       count(case when p.days=17 then 1 end)D17,
       count(case when p.days=18 then 1 end)D18,
       count(case when p.days=19 then 1 end)D19,
       count(case when p.days=20 then 1 end)D20,
       count(case when p.days=21 then 1 end)D21,
       count(case when p.days=22 then 1 end)D22,
       count(case when p.days=23 then 1 end)D23,
       count(case when p.days=24 then 1 end)D24,
       count(case when p.days=25 then 1 end)D25,
       count(case when p.days=26 then 1 end)D26,
       count(case when p.days=27 then 1 end)D27,
       count(case when p.days=28 then 1 end)D28,
       count(case when p.days=29 then 1 end)D29,
       count(case when p.days=30 then 1 end)D30,
       count(case when p.days=31 then 1 end)D31
from tndun.dun_finish_p p
JOIN tndun.dun_admin a on p.aid=a.id
WHERE p.finishTime>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
  and p.finishTime<(
                     SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                 when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                   )

GROUP BY a.adm_name
ORDER BY a.adm_name
)m;

")->result_array();
        return $query;
    }

    public function getDistributionAndReturn($date){
        $query = $this->db3->query("SELECT case when v.id1 is not null then v.id1 else v.id2 end id,
       case when v.area=1 then '杭州' when v.area=2 then '北京' else '其他' end 地区,
       case when v.type=0 then '同牛' else '委外' end 是否委外,
       case when v.adm_name1 is not null then v.adm_name1 else v.adm_name2 end 姓名,
       case when v.roles_name1 is not null then v.roles_name1 else v.roles_name2 end 角色,
       v.quantity_distri 分单数,
       v.amount_distri 分单金额,
       v.amount_back 催回金额,
       concat(left(v.amount_back/v.amount_distri*100,5),'%') 催回率,
       v.penalty_due 罚金总额,
       v.penalty_real 实收罚金,
       concat(left(v.penalty_real/v.penalty_due*100,5),'%') 实收占比

from
(

SELECT x1.id as id1,x1.adm_name as adm_name1,x1.roles_id as roles_id1 ,x1.roles_name as roles_name1,x1.`分单笔数` as quantity_distri,x1.`分单金额` as amount_distri,
       x2.aid as aid2,x2.amount  as amount_back,x2.roles_id as roles_id2,x2.adm_name as adm_name2,x2.roles_name as roles_name2,x2.id as id2,x2.penalty_due ,x2.penalty_real,x1.type,x1.area

FROM

(
 SELECT a.id,
        a.adm_name,
        a.roles_id,
        s.roles_name,
        count(*) 分单笔数,
        sum(l.principal)+sum(l.interest)+sum(l.service_amount) 分单金额,
        a.type,a.area





  FROM tndun.dun_journal l
  JOIN tndun.dun_admin a on l.aid=a.id
  JOIN tndun.dun_roles s on s.id=a.roles_id
  JOIN tndun.dun_collection co on co.scene_custid = l.scene_custid


 WHERE l.timeline >= (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
   and l.timeline <  (
                        SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                    when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                     )
   and co.scene_id = 100010
   and l.days<31

 GROUP BY a.id
 ORDER BY s.roles_name,a.adm_name
)x1


LEFT JOIN 
(
SELECT w1.*,w2.*
from

(
SELECT g.aid,g.amount,a.roles_id,a.adm_name,s.roles_name
from 
(
                SELECT  case when f.aid_finish is not null then f.aid_finish else f.aid_part end aid,
                        ifnull(f.amount_finish,0)+ifnull(f.amount_part,0) as amount
                 from
                    (
                                         SELECT m.aid as aid_finish,n.aid as aid_part,m.adm_name,m.roles_name,m.amount as amount_finish ,n.amount as amount_part

                                          from

                                           (SELECT 
                                                   p.aid,
                                                   a.adm_name,
                                                   a.roles_id,
                                                   s.roles_name,
                                                   sum(p.paymentMoney) amount

       
                                             from  tndun.dun_finish_p p 

                                             JOIN tndun.dun_admin a on p.aid=a.id
                                             JOIN tndun.dun_roles s on s.id=a.roles_id
                                             JOIN ccx_loan.b_repayment_plan c on p.repayment_plan_id=c.repayment_plan_id

                                           WHERE  p.finishTime>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                                              and p.finishTime<(
                                                                 SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                                             when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                                )
                                              and p.scene_id=100010
                                         GROUP BY a.id
                                         ORDER BY s.roles_name,a.adm_name
                           )m

                 left JOIN

                            (
                                           SELECT 
                                                  r.aid,
                                                  a.adm_name,
                                                  a.roles_id,
                                                  s.roles_name,
                                                  sum(r.amount) amount

           
 
                                            from  tndun.dun_part_repayment_record r

                                            JOIN tndun.dun_admin a on r.aid=a.id
                                            JOIN tndun.dun_roles s on s.id=a.roles_id
                                            JOIN ccx_loan.b_repayment_plan c on r.repayment_plan_id=c.repayment_plan_id
                 
                                          WHERE  r.input_time>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                                             and r.input_time<(
                                                               SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                                           when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                               )
                                             and c.scene_id=100010
                                        GROUP BY a.id
                                        ORDER BY s.roles_name,a.adm_name
                            )n on  m.aid=n.aid


                UNION


                                         SELECT m.aid as aid_finish,n.aid as aid_part,m.adm_name,m.roles_name,m.amount as amount_finish ,n.amount as amount_part

                                          from

                                           (SELECT 
                                                   p.aid,
                                                   a.adm_name,
                                                   a.roles_id,
                                                   s.roles_name,
                                                   sum(p.paymentMoney) amount

       
                                             from  tndun.dun_finish_p p 

                                             JOIN tndun.dun_admin a on p.aid=a.id
                                             JOIN tndun.dun_roles s on s.id=a.roles_id
                                             JOIN ccx_loan.b_repayment_plan c on p.repayment_plan_id=c.repayment_plan_id

                                           WHERE  p.finishTime>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY)) 
                                              and p.finishTime< (
                                                                 SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                                             when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                                )
                                              and p.scene_id=100010
                                         GROUP BY a.id
                                         ORDER BY s.roles_name,a.adm_name
                           )m

                 RIGHT JOIN

                            (
                                           SELECT 
                                                  r.aid,
                                                  a.adm_name,
                                                  a.roles_id,
                                                  s.roles_name,
                                                  sum(r.amount) amount

           
 
                                            from  tndun.dun_part_repayment_record r

                                            JOIN tndun.dun_admin a on r.aid=a.id
                                            JOIN tndun.dun_roles s on s.id=a.roles_id
                                            JOIN ccx_loan.b_repayment_plan c on r.repayment_plan_id=c.repayment_plan_id

                                          WHERE  r.input_time>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                                             and r.input_time<(
                                                                SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                                            when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                               )
                                             and c.scene_id=100010
                                        GROUP BY a.id
                                        ORDER BY s.roles_name,a.adm_name
                            )n on  m.aid=n.aid
                )f
)g
JOIN tndun.dun_admin a on g.aid=a.id
JOIN tndun.dun_roles s on s.id=a.roles_id

ORDER BY s.roles_name,a.adm_name

)w1 
LEFT JOIN
(
SELECT case when g.id_finish is not null then g.id_finish 
            else g.id_part end id,
       ifnull(g.penalty_due_finish,0)+ifnull(g.penalty_due_part,0) penalty_due,
       ifnull(g.penalty_due_finish,0)-ifnull(g.penalty_break,0)+ifnull(g.penalty_real,0) penalty_real
       
       
from
(
                 SELECT *
                   from
                       (
                            SELECT a.id as id_finish,ifnull(sum(r.penalty_interest),0)+ifnull(sum(r.penalty_service_amount),0) penalty_due_finish,
                                                     ifnull(sum(r.penalty_interest_breaks),0)+ifnull(sum(r.penalty_service_amount_breaks),0) penalty_break
                              from tndun.dun_finish_p p
                              JOIN tndun.dun_plan pl on pl.repayment_plan_id=p.repayment_plan_id
                              JOIN ccx_loan.b_repayment_plan r on p.repayment_plan_id=r.repayment_plan_id
                              JOIN tndun.dun_admin a on a.id=p.aid
                              JOIN tndun.dun_roles s on s.id=a.roles_id
                             WHERE p.finishTime>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                               and p.finishTime< (
                                                  SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                              when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                  )
                               and pl.status=3
                               and p.scene_id=100010
                          GROUP BY a.id
                       )m

               LEFT JOIN 
                       (
                            SELECT  a.id as id_part,ifnull(sum(r.penalty_interest),0)+ifnull(sum(r.penalty_service_amount),0) penalty_due_part,
                                                    ifnull(sum(r.penalty_interest_part),0)+ifnull(sum(r.penalty_service_amount_part),0) penalty_real

                              from tndun.dun_part_repayment_record p
                              JOIN tndun.dun_plan pl on pl.repayment_plan_id=p.repayment_plan_id
                              JOIN ccx_loan.b_repayment_plan r on p.repayment_plan_id=r.repayment_plan_id
                              JOIN tndun.dun_admin a on a.id=p.aid
                              JOIN tndun.dun_roles s on s.id=a.roles_id
                             WHERE p.input_time>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                               and p.input_time< (
                                                  SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                              when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                 )
                               and pl.status=2
                               and r.scene_id=100010
                          GROUP BY a.id
                       )n on m.id_finish=n.id_part

       UNION


                  SELECT *
                   from
                       (
                            SELECT a.id as id_finish,ifnull(sum(r.penalty_interest),0)+ifnull(sum(r.penalty_service_amount),0) penalty_due_finish,
                                                     ifnull(sum(r.penalty_interest_breaks),0)+ifnull(sum(r.penalty_service_amount_breaks),0) penalty_break
                              from tndun.dun_finish_p p
                              JOIN tndun.dun_plan pl on pl.repayment_plan_id=p.repayment_plan_id
                              JOIN ccx_loan.b_repayment_plan r on p.repayment_plan_id=r.repayment_plan_id
                              JOIN tndun.dun_admin a on a.id=p.aid
                              JOIN tndun.dun_roles s on s.id=a.roles_id
                             WHERE p.finishTime>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                               and p.finishTime< (
                                                  SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                              when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                  )
                               and pl.status=3
                               and p.scene_id=100010
                          GROUP BY a.id
                       )m

               RIGHT JOIN 
                       (
                            SELECT  a.id as id_part,ifnull(sum(r.penalty_interest),0)+ifnull(sum(r.penalty_service_amount),0) penalty_due_part,
                                                    ifnull(sum(r.penalty_interest_part),0)+ifnull(sum(r.penalty_service_amount_part),0) penalty_real

                              from tndun.dun_part_repayment_record p
                              JOIN tndun.dun_plan pl on pl.repayment_plan_id=p.repayment_plan_id
                              JOIN ccx_loan.b_repayment_plan r on p.repayment_plan_id=r.repayment_plan_id
                              JOIN tndun.dun_admin a on a.id=p.aid
                              JOIN tndun.dun_roles s on s.id=a.roles_id
                             WHERE p.input_time>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                               and p.input_time< (
                                                  SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                              when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                 )
                               and pl.status=2
                               and r.scene_id=100010
                          GROUP BY a.id
                       )n on m.id_finish=n.id_part


)g

)w2 on w1.aid=w2.id

)x2 on x1.id=x2.aid



UNION




SELECT x1.id as id1,x1.adm_name as adm_name1,x1.roles_id as roles_id1 ,x1.roles_name as roles_name1,x1.`分单笔数` as quantity_distri,x1.`分单金额` as amount_distri,
       x2.aid as aid2,x2.amount  as amount_back,x2.roles_id as roles_id2,x2.adm_name as adm_name2,x2.roles_name as roles_name2,x2.id as id2,x2.penalty_due ,x2.penalty_real,x1.type,x1.area

FROM

(
 SELECT a.id,
        a.adm_name,
        a.roles_id,
        s.roles_name,
        count(*) 分单笔数,
        sum(l.principal)+sum(l.interest)+sum(l.service_amount) 分单金额,
        a.type,a.area




  FROM tndun.dun_journal l
  JOIN tndun.dun_admin a on l.aid=a.id
  JOIN tndun.dun_roles s on s.id=a.roles_id
  JOIN tndun.dun_collection co on co.scene_custid = l.scene_custid

 WHERE l.timeline >= (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
   and l.timeline <  (
                        SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                    when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                     )
   and co.scene_id = 100010
   and l.days<31


 GROUP BY a.id
 ORDER BY s.roles_name,a.adm_name
)x1


RIGHT JOIN 
(
SELECT w1.*,w2.*
from

(
SELECT g.aid,g.amount,a.roles_id,a.adm_name,s.roles_name
from 
(
                SELECT  case when f.aid_finish is not null then f.aid_finish else f.aid_part end aid,
                        ifnull(f.amount_finish,0)+ifnull(f.amount_part,0) as amount
                 from
                    (
                                         SELECT m.aid as aid_finish,n.aid as aid_part,m.adm_name,m.roles_name,m.amount as amount_finish ,n.amount as amount_part

                                          from

                                           (SELECT 
                                                   p.aid,
                                                   a.adm_name,
                                                   a.roles_id,
                                                   s.roles_name,
                                                   sum(p.paymentMoney) amount

       
                                             from  tndun.dun_finish_p p 

                                             JOIN tndun.dun_admin a on p.aid=a.id
                                             JOIN tndun.dun_roles s on s.id=a.roles_id
                                             JOIN ccx_loan.b_repayment_plan c on p.repayment_plan_id=c.repayment_plan_id

                                           WHERE  p.finishTime>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                                              and p.finishTime< (
                                                                 SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                                             when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                                 )
                                              and p.scene_id=100010
                                         GROUP BY a.id
                                         ORDER BY s.roles_name,a.adm_name
                           )m

                 left JOIN

                            (
                                           SELECT 
                                                  r.aid,
                                                  a.adm_name,
                                                  a.roles_id,
                                                  s.roles_name,
                                                  sum(r.amount) amount

           
 
                                            from  tndun.dun_part_repayment_record r

                                            JOIN tndun.dun_admin a on r.aid=a.id
                                            JOIN tndun.dun_roles s on s.id=a.roles_id
                                            JOIN ccx_loan.b_repayment_plan c on r.repayment_plan_id=c.repayment_plan_id

                                          WHERE  r.input_time>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                                             and r.input_time< (
                                                                SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                                            when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                                )
                                             and c.scene_id=100010
                                        GROUP BY a.id
                                        ORDER BY s.roles_name,a.adm_name
                            )n on  m.aid=n.aid


                UNION


                                         SELECT m.aid as aid_finish,n.aid as aid_part,m.adm_name,m.roles_name,m.amount as amount_finish ,n.amount as amount_part

                                          from

                                           (SELECT 
                                                   p.aid,
                                                   a.adm_name,
                                                   a.roles_id,
                                                   s.roles_name,
                                                   sum(p.paymentMoney) amount

       
                                             from  tndun.dun_finish_p p 

                                             JOIN tndun.dun_admin a on p.aid=a.id
                                             JOIN tndun.dun_roles s on s.id=a.roles_id
                                             JOIN ccx_loan.b_repayment_plan c on p.repayment_plan_id=c.repayment_plan_id

                                           WHERE  p.finishTime>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                                              and p.finishTime< (
                                                                 SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                                             when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                                )
                                              and p.scene_id=100010
                                         GROUP BY a.id
                                         ORDER BY s.roles_name,a.adm_name
                           )m

                 RIGHT JOIN

                            (
                                           SELECT 
                                                  r.aid,
                                                  a.adm_name,
                                                  a.roles_id,
                                                  s.roles_name,
                                                  sum(r.amount) amount

           
 
                                            from  tndun.dun_part_repayment_record r

                                            JOIN tndun.dun_admin a on r.aid=a.id
                                            JOIN tndun.dun_roles s on s.id=a.roles_id
                                            JOIN ccx_loan.b_repayment_plan c on r.repayment_plan_id=c.repayment_plan_id

                                          WHERE  r.input_time>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                                             and r.input_time< (
                                                                SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                                            when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                               )
                                             and c.scene_id=100010
                                        GROUP BY a.id
                                        ORDER BY s.roles_name,a.adm_name
                            )n on  m.aid=n.aid
                )f
)g
JOIN tndun.dun_admin a on g.aid=a.id
JOIN tndun.dun_roles s on s.id=a.roles_id

ORDER BY s.roles_name,a.adm_name

)w1 




LEFT JOIN


(
SELECT case when g.id_finish is not null then g.id_finish 
            else g.id_part end id,
       ifnull(g.penalty_due_finish,0)+ifnull(g.penalty_due_part,0) penalty_due,
       ifnull(g.penalty_due_finish,0)-ifnull(g.penalty_break,0)+ifnull(g.penalty_real,0) penalty_real
       
       
from
(
                 SELECT *
                   from
                       (
                            SELECT a.id as id_finish,ifnull(sum(r.penalty_interest),0)+ifnull(sum(r.penalty_service_amount),0) penalty_due_finish,
                                                     ifnull(sum(r.penalty_interest_breaks),0)+ifnull(sum(r.penalty_service_amount_breaks),0) penalty_break
                              from tndun.dun_finish_p p
                              JOIN tndun.dun_plan pl on pl.repayment_plan_id=p.repayment_plan_id
                              JOIN ccx_loan.b_repayment_plan r on p.repayment_plan_id=r.repayment_plan_id
                              JOIN tndun.dun_admin a on a.id=p.aid
                              JOIN tndun.dun_roles s on s.id=a.roles_id
                             WHERE p.finishTime>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                               and p.finishTime< (
                                                  SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                              when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                  )
                               and pl.status=3
                               and p.scene_id=100010
                          GROUP BY a.id
                       )m

               LEFT JOIN 
                       (
                            SELECT  a.id as id_part,ifnull(sum(r.penalty_interest),0)+ifnull(sum(r.penalty_service_amount),0) penalty_due_part,
                                                    ifnull(sum(r.penalty_interest_part),0)+ifnull(sum(r.penalty_service_amount_part),0) penalty_real

                              from tndun.dun_part_repayment_record p
                              JOIN tndun.dun_plan pl on pl.repayment_plan_id=p.repayment_plan_id
                              JOIN ccx_loan.b_repayment_plan r on p.repayment_plan_id=r.repayment_plan_id
                              JOIN tndun.dun_admin a on a.id=p.aid
                              JOIN tndun.dun_roles s on s.id=a.roles_id
                             WHERE p.input_time>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY)) and p.input_time< (SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                              when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                  )
                               and pl.status=2
                               and r.scene_id=100010
                          GROUP BY a.id
                       )n on m.id_finish=n.id_part

       UNION


                  SELECT *
                   from
                       (
                            SELECT a.id as id_finish,ifnull(sum(r.penalty_interest),0)+ifnull(sum(r.penalty_service_amount),0) penalty_due_finish,
                                                     ifnull(sum(r.penalty_interest_breaks),0)+ifnull(sum(r.penalty_service_amount_breaks),0) penalty_break
                              from tndun.dun_finish_p p
                              JOIN tndun.dun_plan pl on pl.repayment_plan_id=p.repayment_plan_id
                              JOIN ccx_loan.b_repayment_plan r on p.repayment_plan_id=r.repayment_plan_id
                              JOIN tndun.dun_admin a on a.id=p.aid
                              JOIN tndun.dun_roles s on s.id=a.roles_id
                             WHERE p.finishTime>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                               and p.finishTime< (
                                                  SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                              when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                 )
                               and pl.status=3
                               and p.scene_id=100010
                          GROUP BY a.id
                       )m

               RIGHT JOIN 
                       (
                            SELECT  a.id as id_part,ifnull(sum(r.penalty_interest),0)+ifnull(sum(r.penalty_service_amount),0) penalty_due_part,
                                                    ifnull(sum(r.penalty_interest_part),0)+ifnull(sum(r.penalty_service_amount_part),0) penalty_real

                              from tndun.dun_part_repayment_record p
                              JOIN tndun.dun_plan pl on pl.repayment_plan_id=p.repayment_plan_id
                              JOIN ccx_loan.b_repayment_plan r on p.repayment_plan_id=r.repayment_plan_id
                              JOIN tndun.dun_admin a on a.id=p.aid
                              JOIN tndun.dun_roles s on s.id=a.roles_id
                             WHERE p.input_time>=(SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))
                               and p.input_time< (
                                                  SELECT case when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))<>(SELECT '".$date."') then (SELECT '".$date."') 
                                                              when (SELECT DATE_ADD('".$date."',INTERVAL -DAY('".$date."')+1 DAY))=(SELECT '".$date."') then (SELECT DATE_SUB('".$date."',INTERVAL -1 day)) end
                                                  )
                               and pl.status=2
                               and r.scene_id=100010
                          GROUP BY a.id
                       )n on m.id_finish=n.id_part
)g
)w2 on w1.aid=w2.id
)x2 on x1.id=x2.aid
)v
")->result_array();
        return $query;
    }
}