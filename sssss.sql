/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.17 : Database - project
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`project` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `project`;

/*Table structure for table `access` */

DROP TABLE IF EXISTS `access`;

CREATE TABLE `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1292 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `access` */

insert  into `access`(`id`,`role_id`,`node_id`) values (996,41,42),(997,41,41),(998,41,40),(999,41,39),(1000,41,38),(1001,41,37),(1002,41,36),(1003,41,35),(1004,41,34),(1049,45,33),(1050,45,32),(1051,45,31),(1052,45,30),(1053,45,29),(1054,45,43),(1055,45,42),(1056,45,41),(1057,45,40),(1058,45,39),(1059,45,38),(1060,45,37),(1061,45,36),(1062,45,35),(1063,45,34),(1090,37,33),(1091,37,32),(1092,24,33),(1093,24,32),(1094,24,31),(1095,24,30),(1096,24,29),(1099,51,33),(1100,51,32),(1101,53,33),(1102,53,32),(1103,52,33),(1104,52,32),(1105,54,33),(1106,54,32),(1107,27,33),(1108,27,32),(1109,28,33),(1110,28,32),(1115,46,33),(1116,46,32),(1117,26,33),(1118,26,32),(1119,26,31),(1120,26,30),(1121,26,29),(1122,26,42),(1123,26,41),(1124,26,40),(1125,26,39),(1126,26,38),(1127,26,37),(1128,26,36),(1129,26,35),(1130,26,34),(1131,29,33),(1132,29,32),(1133,29,31),(1134,29,30),(1135,29,29),(1140,57,33),(1141,57,32),(1176,58,42),(1177,58,41),(1178,58,40),(1179,58,39),(1180,58,38),(1181,58,37),(1182,58,36),(1183,58,35),(1184,58,34),(1185,58,46),(1186,58,45),(1187,58,44),(1188,25,42),(1189,25,41),(1190,25,40),(1191,25,39),(1192,25,38),(1193,25,37),(1194,25,36),(1195,25,35),(1196,25,34),(1197,25,46),(1198,25,45),(1199,25,44),(1200,40,33),(1201,40,32),(1202,40,31),(1203,40,30),(1204,40,29),(1239,59,33),(1241,60,33),(1242,36,33),(1243,36,32),(1244,36,31),(1245,36,30),(1246,36,29),(1247,36,46),(1248,36,45),(1249,36,44),(1250,39,33),(1251,39,32),(1252,39,31),(1253,39,30),(1254,39,29),(1273,1,33),(1274,1,32),(1275,1,31),(1276,1,30),(1277,1,29),(1278,1,49),(1279,1,42),(1280,1,41),(1281,1,40),(1282,1,39),(1283,1,38),(1284,1,37),(1285,1,36),(1286,1,35),(1287,1,34),(1288,1,46),(1289,1,45),(1290,1,44),(1291,1,50);

/*Table structure for table `config` */

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `signal` varchar(64) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `config` */

insert  into `config`(`id`,`title`,`signal`,`status`) values (1,'权限管理','admin',1),(2,'数据报表','datareport',1),(3,'贷后数据','collection',1),(4,'前台CMS','product',1);

/*Table structure for table `node` */

DROP TABLE IF EXISTS `node`;

CREATE TABLE `node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `function` varchar(50) DEFAULT NULL,
  `pid` smallint(1) DEFAULT NULL,
  `fid` smallint(6) DEFAULT NULL,
  `department` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`class`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `node` */

insert  into `node`(`id`,`name`,`class`,`function`,`pid`,`fid`,`department`) values (29,'注册情况表','DataReport','registerSituation',NULL,NULL,2),(30,'完成申请情况表','DataReport','applySuccess',NULL,NULL,2),(31,'逾期表','DataReport','overdueSituation',NULL,NULL,2),(32,'日报','DataReport','dailyReport',NULL,NULL,2),(33,'周报','DataReport','weeklyReport',NULL,NULL,2),(34,'用户列表','Admin','userList',NULL,NULL,1),(35,'组织机构','Admin','roleList',NULL,NULL,1),(36,'权限管理','Admin','editRole',NULL,NULL,1),(37,'删除用户组','Admin','delRole',NULL,NULL,1),(38,'新增修改用户','Admin','addUser',NULL,NULL,1),(39,'删除用户','Admin','delUser',NULL,NULL,1),(40,'新增部门&&职位','Admin','addRole',NULL,NULL,1),(41,'部门架构','Admin','channelSales',NULL,NULL,1),(42,'添加部门','Admin','addChannelSales',NULL,NULL,1),(44,'数据导出','Collection','export',NULL,NULL,3),(45,'数据导出','Collection','export',NULL,NULL,3),(46,'风险案件上报表导出','Collection','riskCaseUpload',NULL,NULL,3),(47,'催收绩效考核-回单','Collection','repay',NULL,NULL,3),(48,'催收绩效考核-分单及催回','Collection','distributionAndReturn',NULL,NULL,3),(49,'用户编辑','Admin','editUser',NULL,NULL,1),(50,'平台列表','Product','listPage',NULL,NULL,4);

/*Table structure for table `platform` */

DROP TABLE IF EXISTS `platform`;

CREATE TABLE `platform` (
  `platform_id` int(11) NOT NULL AUTO_INCREMENT,
  `platform_name` varchar(64) DEFAULT NULL,
  `status` smallint(1) DEFAULT '1',
  PRIMARY KEY (`platform_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `platform` */

insert  into `platform`(`platform_id`,`platform_name`,`status`) values (1,'微米贷',1);

/*Table structure for table `process` */

DROP TABLE IF EXISTS `process`;

CREATE TABLE `process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL COMMENT '申请流程名称',
  `img` varchar(255) DEFAULT NULL COMMENT '申请流程图片',
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `process` */

insert  into `process`(`id`,`name`,`img`,`status`) values (1,'个人信息','161116202218_756.png',1),(2,'实名认证','161116202526_216.png',1),(3,'银行卡认证','161116202809_290.png',1),(4,'运营商授权','161116202837_272.png',1),(5,'芝麻信用','161116202918_471.png',1),(6,'人脸识别','161116202453_630.png',1);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `platform_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `platform_product_name` varchar(64) DEFAULT NULL COMMENT '产品名称',
  `platform_id` int(11) DEFAULT NULL COMMENT '对应平台ID',
  `product_introduct` varchar(255) DEFAULT NULL COMMENT '产品优势',
  `apply_condition` text COMMENT '申请条件',
  `guide` text COMMENT '新手指引',
  `process` varchar(255) DEFAULT NULL COMMENT '流程',
  `loan_type` varchar(64) DEFAULT NULL,
  `target_customer` varchar(64) DEFAULT NULL,
  `monitorial_mode` varchar(64) DEFAULT NULL,
  `presenting_mode` varchar(64) DEFAULT NULL,
  `service_amount` varchar(64) DEFAULT NULL,
  `actual_amount` varchar(64) DEFAULT NULL,
  `repayment_approach` varchar(64) DEFAULT NULL,
  `repayment_method` varchar(64) DEFAULT NULL,
  `early_repayment` varchar(32) DEFAULT NULL,
  `overdue_algorithm` varchar(32) DEFAULT NULL,
  `is_credit` varchar(32) DEFAULT NULL,
  `is_upamount` varchar(32) DEFAULT NULL,
  `loan_detail` text COMMENT '审核细节',
  `tag_name` text COMMENT '标签',
  `h5_link` varchar(255) DEFAULT NULL COMMENT '静态页面链接',
  `news_link` varchar(255) DEFAULT NULL COMMENT '产品攻略链接',
  `product_logo` varchar(255) DEFAULT NULL COMMENT '产品logo地址',
  `success_count` varchar(255) DEFAULT NULL COMMENT '产品人气',
  `success_rate` varchar(255) DEFAULT NULL COMMENT '通过率(暂定)',
  `fast_speed` varchar(255) DEFAULT NULL COMMENT '放款速度',
  `pass_rate` varchar(255) DEFAULT NULL COMMENT '下款概率',
  `pay_method` int(1) DEFAULT '1' COMMENT '还款方式 1.一次性还款(元) 2.每期利息(元)',
  `interest_alg_num` int(1) DEFAULT '1' COMMENT '利息参考方式 1.参考月利率 2.参考日利率',
  `interest_rate` decimal(3,3) DEFAULT '0.000' COMMENT '利息率(百分比)',
  `loan_term` text COMMENT '借款期数',
  `loan_money` text COMMENT '借款金额',
  `avg_quota` varchar(64) DEFAULT NULL COMMENT '平均额度',
  `create_time` date DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`platform_product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `product` */

insert  into `product`(`platform_product_id`,`platform_product_name`,`platform_id`,`product_introduct`,`apply_condition`,`guide`,`process`,`loan_type`,`target_customer`,`monitorial_mode`,`presenting_mode`,`service_amount`,`actual_amount`,`repayment_approach`,`repayment_method`,`early_repayment`,`overdue_algorithm`,`is_credit`,`is_upamount`,`loan_detail`,`tag_name`,`h5_link`,`news_link`,`product_logo`,`success_count`,`success_rate`,`fast_speed`,`pass_rate`,`pay_method`,`interest_alg_num`,`interest_rate`,`loan_term`,`loan_money`,`avg_quota`,`create_time`,`status`) values (1,'微米贷',1,'凭芝麻分，秒借5000元','1.18-35周岁<br>2.需要芝麻信用分（600以上）<br>3.客服电话：400-028-8888','1.手机号码实名使用6个月以上<br>2.无不良信用记录<br>3.以上仅是速贷之家为您提供的申请建议，不作为必然参照','1,2,3,4,5','借现金','上班族\\学生党\\生意人\\自由职业','全自动审批','银行卡','6%','非全额到账，扣除服务费和利息','APP还款','一次性还款','可以，利息全收','日息1%','否','能','[{\"title\":\"贷款类型\",\"content\":\"借现金\"},{\"title\":\"面向人群\",\"content\":\"上班族\\\\学生党\\\\生意人\\\\自由职业\"},{\"title\":\"审核方式\",\"content\":\"全自动审批\"},{\"title\":\"到账方式\",\"content\":\"银行卡\"},{\"title\":\"服务费\",\"content\":\"6%\"},{\"title\":\"实际到账\",\"content\":\"非全额到账，扣除服务费和利息\"},{\"title\":\"还款途径\",\"content\":\"APP还款\"},{\"title\":\"还款方式\",\"content\":\"一次性还款\"},{\"title\":\"提前还款\",\"content\":\"可以，利息全收\"},{\"title\":\"逾期算法\",\"content\":\"日息1%\"},{\"title\":\"要查征信\",\"content\":\"否\"},{\"title\":\"能否提额\",\"content\":\"能\"},{\"title\":\"所属平台\",\"content\":\"微米贷\"}]','1,2,3',NULL,NULL,'20170926152401-858.png','71000','0.36','0.2','0.62',1,2,'0.040','14天,21天,1个月','500元,1000元,1500元,2000元,3000元,4000元,5000元,6000元,7000元,8000元,9000元,10000元','3464','2017-10-30',1),(2,'微米贷',1,'凭芝麻分，秒借5000元',NULL,'1.手机号码实名使用6个月以上<br>2.无不良信用记录<br>3.以上仅是速贷之家为您提供的申请建议，不作为必然参照','1,2,3,4,5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[{\"title\":\"贷款类型\",\"content\":\"借现金\"},{\"title\":\"面向人群\",\"content\":\"上班族\\\\学生党\\\\生意人\\\\自由职业\"},{\"title\":\"审核方式\",\"content\":\"全自动审批\"},{\"title\":\"到账方式\",\"content\":\"银行卡\"},{\"title\":\"服务费\",\"content\":\"6%\"},{\"title\":\"实际到账\",\"content\":\"非全额到账，扣除服务费和利息\"},{\"title\":\"还款途径\",\"content\":\"APP还款\"},{\"title\":\"还款方式\",\"content\":\"一次性还款\"},{\"title\":\"提前还款\",\"content\":\"可以，利息全收\"},{\"title\":\"逾期算法\",\"content\":\"日息1%\"},{\"title\":\"要查征信\",\"content\":\"否\"},{\"title\":\"能否提额\",\"content\":\"能\"},{\"title\":\"所属平台\",\"content\":\"微米贷\"}]',NULL,NULL,NULL,'20170926152401-858.png','71000','0.36','0.2','0.62',1,1,'0.040','14天,21天,1个月','500元,1000元,1500元,2000元,3000元,4000元,5000元,6000元,7000元,8000元,9000元,10000元','3464',NULL,1);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `fid` smallint(6) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `nodes` varchar(255) DEFAULT NULL,
  `isAdmin` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `role` */

insert  into `role`(`id`,`fid`,`name`,`pid`,`status`,`remark`,`nodes`,`isAdmin`) values (1,0,'超级管理员',0,1,'admin','1,2,3',1),(24,45,'运营部',2,1,'运营部','1,2',0),(25,45,'催收部',2,1,'催收部','1,3',0),(26,24,'运营总监',3,1,'运营总监','1,2',0),(27,45,'财务部',2,1,'财务部','2',0),(28,45,'IT部',2,1,'IT部','2',0),(29,26,'运营专员',4,1,'运营专员','2',0),(36,25,'催收主管',3,1,'催收主管','1,2,3',0),(39,45,'产品部',2,1,'产品部','1,2,3',0),(40,39,'产品经理',3,1,'产品经理','2',0),(46,1,'北京分公司',1,1,'北京分公司','1,2',0),(50,37,'前手组小弟',5,1,'',NULL,0),(53,51,'中手组小弟',5,1,'','2',0),(54,52,'后手组小弟',5,1,'','2',0),(56,27,'会计',3,1,'','2',0),(57,45,'运营外围部门',2,1,'除运营部门外所有用户','2',0),(59,57,'zijinfang',3,1,'资金方，只有周报查看权限','2',0),(60,45,'zifang',2,1,'888888','2',0);

/*Table structure for table `tag` */

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL COMMENT '名称',
  `font_color` varchar(32) DEFAULT NULL COMMENT '字体颜色',
  `boder_color` varchar(32) DEFAULT NULL COMMENT '边框颜色',
  `bg_color` varchar(32) DEFAULT NULL COMMENT '背景颜色',
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tag` */

insert  into `tag`(`id`,`name`,`font_color`,`boder_color`,`bg_color`,`status`) values (1,'实名手机','b39832','e3cd84','fef8de',1),(2,'芝麻信用','b39833','e3ce84','fef8de',1),(3,'一次还清','e25a5a','f5c2c2','fbe8e8',1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL,
  `ip` varchar(64) DEFAULT NULL,
  `loginTime` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `editer` varchar(32) DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`city`,`roleId`,`ip`,`loginTime`,`logout_time`,`create_time`,`editer`,`edit_time`,`status`) values (1,'admin','e10adc3949ba59abbe56e057f20f883e','杭州',1,'127.0.0.1','2017-10-24 05:47:36','2017-10-23 02:02:34','2017-10-19 19:52:40','admin','2017-10-23 02:00:23',1),(3,'lujicai','00b7691d86d96aebd21dd9e138f90840',NULL,26,'172.18.0.14','2017-10-16 15:20:09','2017-07-11 14:33:46','2017-06-20 07:28:26','admin','2017-10-16 17:45:23',1),(5,'caiwandong','00b7691d86d96aebd21dd9e138f90840',NULL,36,'172.18.0.16','2017-09-12 14:34:21','2017-08-31 11:31:51','2017-06-21 06:41:25','admin','2017-10-16 17:46:32',1),(10,'chanpin','f379eaf3c831b04de153469d1bec345e',NULL,40,'172.18.0.16','2017-08-25 09:35:14',NULL,'2017-06-30 18:27:42','admin','2017-08-24 18:19:44',1),(11,'fengzhiliang','670b14728ad9902aecba32e22fa4f6bd',NULL,46,'172.18.0.11','2017-07-11 14:33:54','2017-07-11 14:34:07','2017-07-11 14:33:03','admin',NULL,1),(15,'lingyayan','d0970714757783e6cf17b26fb8e2298f',NULL,29,'172.18.0.14','2017-10-16 17:41:12',NULL,'2017-07-31 16:46:50','admin','2017-10-16 17:55:18',1),(16,'xiazhaomin','00b7691d86d96aebd21dd9e138f90840',NULL,29,'172.18.0.16','2017-08-31 09:11:12',NULL,'2017-08-01 13:38:49','admin','2017-10-16 17:51:11',1),(17,'tongniuBI','f379eaf3c831b04de153469d1bec345e',NULL,57,'172.18.0.14','2017-10-19 14:31:32','2017-09-08 11:25:30','2017-08-11 09:57:10','admin','2017-08-11 10:42:45',1),(18,'lijie','96e79218965eb72c92a549dd5a330112',NULL,36,'172.18.0.16','2017-09-17 10:43:34','2017-09-05 11:37:29','2017-08-30 10:40:30','admin','2017-08-30 10:43:45',1),(19,'luxiaoming','96e79218965eb72c92a549dd5a330112',NULL,36,'172.18.0.16','2017-09-07 15:55:44','2017-08-30 10:49:47','2017-08-30 10:42:52','admin','2017-08-30 10:43:33',1),(20,'liuwei','e10adc3949ba59abbe56e057f20f883e',NULL,40,'172.18.0.15','2017-10-09 11:52:37',NULL,'2017-08-31 14:02:33','admin','2017-08-31 14:02:40',1),(21,'tongniuBI-02','21218cca77804d2ba1922c33e0151105',NULL,59,'172.18.0.14','2017-10-17 15:23:10',NULL,'2017-09-27 14:25:06','admin',NULL,1),(24,'chenmin','d0970714757783e6cf17b26fb8e2298f',NULL,29,NULL,NULL,NULL,'2017-10-16 17:55:00','admin',NULL,1),(25,'yunying','d0970714757783e6cf17b26fb8e2298f',NULL,26,'172.18.0.14','2017-10-19 16:15:17',NULL,'2017-10-16 17:57:24','admin',NULL,1);

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `auto_conversion_rate` */

/*!50106 DROP EVENT IF EXISTS `auto_conversion_rate`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`db_rw_it2`@`%` EVENT `auto_conversion_rate` ON SCHEDULE EVERY 1 DAY STARTS '2017-08-30 03:00:00' ON COMPLETION PRESERVE ENABLE DO BEGIN                CALL auto_conversion_rate(DATE_ADD(CURDATE(),INTERVAL -DAY(CURDATE())+1 DAY),CURDATE());             END */$$
DELIMITER ;

/* Event structure for event `auto_scene_stock` */

/*!50106 DROP EVENT IF EXISTS `auto_scene_stock`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`db_rw_it2`@`%` EVENT `auto_scene_stock` ON SCHEDULE EVERY 1 DAY STARTS '2017-08-26 01:00:01' ON COMPLETION PRESERVE ENABLE DO BEGIN                CALL auto_scene_stock('2016-12-01',CURDATE());      END */$$
DELIMITER ;

/* Event structure for event `auto_scene_stock_sc` */

/*!50106 DROP EVENT IF EXISTS `auto_scene_stock_sc`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`db_rw_it2`@`%` EVENT `auto_scene_stock_sc` ON SCHEDULE EVERY 1 DAY STARTS '2017-08-28 00:00:01' ON COMPLETION PRESERVE ENABLE DO begin                CALL auto_scene_stock_sc('100001');       CALL auto_scene_stock_sc('100005');       CALL auto_scene_stock_sc('100006');       CALL auto_scene_stock_sc('100007');       CALL auto_scene_stock_sc('100008');       CALL auto_scene_stock_sc('100009');     end */$$
DELIMITER ;

/* Event structure for event `dailydata` */

/*!50106 DROP EVENT IF EXISTS `dailydata`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`db_rw_it2`@`%` EVENT `dailydata` ON SCHEDULE EVERY 1 DAY STARTS '2017-07-06 00:00:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
	    CALL apply_1(DATE_SUB(CURDATE(), INTERVAL 1 DAY));
	    CALL apply_2(DATE_SUB(CURDATE(), INTERVAL 1 DAY));
	    CALL apply_3(DATE_SUB(CURDATE(), INTERVAL 1 DAY));
	    CALL apply_4(DATE_SUB(CURDATE(), INTERVAL 1 DAY));
	    CALL apply_5(DATE_SUB(CURDATE(), INTERVAL 1 DAY));
	    CALL apply_6(DATE_SUB(CURDATE(), INTERVAL 1 DAY));
	    CALL apply_7(DATE_SUB(CURDATE(), INTERVAL 1 DAY));
	    CALL apply_8(DATE_SUB(CURDATE(), INTERVAL 1 DAY));
	    CALL apply_9(DATE_SUB(CURDATE(), INTERVAL 1 DAY));
	    
	END */$$
DELIMITER ;

/* Procedure structure for procedure `apply_1` */

/*!50003 DROP PROCEDURE IF EXISTS  `apply_1` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `apply_1`(in str_date date)
BEGIN
  #Routine body goes here...
  DECLARE finish_decimal DECIMAL(16,2);
  DECLARE pass_decimal DECIMAL(16,2);
  DECLARE refused_decimal DECIMAL(16,2);
  DECLARE passrate_decimal VARCHAR(64);
  DECLARE getmoney_decimal DECIMAL(16,2);
  DECLARE transfer_decimal DECIMAL(16,2);
  DECLARE transfermoney_decimal DECIMAL(16,2);
  DECLARE avgmoney_decimal DECIMAL(16,2);
  DECLARE t_error INTEGER DEFAULT 0 ;
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET t_error = 1 ;
  
  SELECT 
    COUNT(*) finish,
    COUNT(
      CASE
        WHEN a4.audit_result = 3 
        THEN 1 
      END
    ) pass,
    COUNT(
      CASE
        WHEN a4.audit_result = 4 
        THEN 1 
      END
    ) refused,
    CONCAT(
      LEFT(
        COUNT(
          CASE
            WHEN a4.audit_result = 3 
            THEN 1 
            ELSE NULL 
          END
        ) / (
          COUNT(
            CASE
              WHEN a4.audit_result IN (3, 5, 6) 
              THEN 1 
            END
          ) + COUNT(
            CASE
              WHEN a4.audit_result = 4 
              THEN 1 
            END
          )
        ) * 100,
        5
      ),
      '%'
    ) passrate,
    COUNT(
      CASE
        WHEN t.into_account_result IN (1, 2, 3, 4) 
        THEN a4.user_id 
      END
    ) getmoney,
    COUNT(
      CASE
        WHEN t.into_account_result IN (2, 4) 
        THEN a4.user_id 
      END
    ) transfer,
    SUM(
      CASE
        WHEN t.into_account_result IN (2, 4) 
        THEN t.actual_amount 
      END
    ) transfermoney,
    AVG (
      CASE
        WHEN t.into_account_result IN (2, 4) 
        THEN t.actual_amount 
      END
    ) avgmoney INTO finish_decimal,
    pass_decimal,
    refused_decimal,
    passrate_decimal,
    getmoney_decimal,
    transfer_decimal,
    transfermoney_decimal,
    avgmoney_decimal 
  FROM
    (SELECT 
      a2.user_id 
    FROM
      (SELECT 
        a.user_id 
      FROM
        cashloan.xj_apply a 
        LEFT JOIN cashloan.xj_user u 
          ON a.user_id = u.id 
      WHERE DATE_FORMAT(a.audit_time, '%Y-%m-%d') = str_date 
        AND DATE_FORMAT(u.register_time, '%Y-%m-%d') = str_date ) a1 
      LEFT JOIN cashloan.xj_apply a2 
        ON a1.user_id = a2.user_id 
    WHERE DATE_FORMAT(a2.audit_time, '%Y-%m-%d') = str_date  
    GROUP BY a2.user_id 
    HAVING COUNT(a2.user_id) = 1) a3 
    LEFT JOIN cashloan.xj_apply a4 
      ON a4.user_id = a3.user_id 
    LEFT JOIN cashloan.xj_transfer t 
      ON t.user_id = a4.user_id 
      AND t.apply_id = a4.id 
  WHERE DATE_FORMAT(a4.audit_time, '%Y-%m-%d') = str_date  
    AND a4.is_effect = 1;
    /*开启事务*/
    START TRANSACTION ;
  INSERT INTO project.`finish` (
    finish,
    pass,
    refused,
    passrate,
    getmoney,
    transfer,
    transfermoney,
    avgmoney,
    `day`,
    `type`
  ) 
  VALUES
    (
      finish_decimal,
      pass_decimal,
      refused_decimal,
      passrate_decimal,
      getmoney_decimal,
      transfer_decimal,
      transfermoney_decimal,
      avgmoney_decimal,
      str_date,
      1
    ) ;
  IF t_error = 1 
  THEN ROLLBACK ;
  ELSE COMMIT ;
  END IF ;
  #RETURN 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `apply_2` */

/*!50003 DROP PROCEDURE IF EXISTS  `apply_2` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `apply_2`(in str_date date)
BEGIN
  #Routine body goes here...
  DECLARE finish_decimal DECIMAL(16,2);
  DECLARE pass_decimal DECIMAL(16,2);
  DECLARE refused_decimal DECIMAL(16,2);
  DECLARE passrate_decimal VARCHAR(64);
  DECLARE getmoney_decimal DECIMAL(16,2);
  DECLARE transfer_decimal DECIMAL(16,2);
  DECLARE transfermoney_decimal DECIMAL(16,2);
  DECLARE avgmoney_decimal DECIMAL(16,2);
  #DECLARE str_date VARCHAR (10) ;
  DECLARE t_error INTEGER DEFAULT 0 ;
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET t_error = 1 ;
  #SET str_date = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ;
  SELECT count(*)  finish,       
      count(case when a4.audit_result = 3 then 1 end )pass,    
      count(case when a4.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a4.audit_result =3 then 1 else null end )/(count(case when a4.audit_result in (3,5,6)  then 1 end )+count(case when a4.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a4.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
      INTO finish_decimal,
    pass_decimal,
    refused_decimal,
    passrate_decimal,
    getmoney_decimal,
    transfer_decimal,
    transfermoney_decimal,
    avgmoney_decimal 
FROM
(
 SELECT a2.user_id 
 from 
 (
 SELECT a.user_id                                         
  from cashloan.xj_apply a
 left join cashloan.xj_user u on a.user_id =u.id 
 where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=str_date 
   and DATE_FORMAT(u.register_time,'%Y-%m-%d')= str_date
 )a1
  LEFT JOIN cashloan.xj_apply a2 on a1.user_id=a2.user_id
 where DATE_FORMAT(a2.audit_time,'%Y-%m-%d')=str_date 
 GROUP BY a2.user_id HAVING count(a2.user_id)>1
)a3
LEFT JOIN cashloan.xj_apply a4 on a4.user_id=a3.user_id
LEFT JOIN cashloan.xj_transfer t on t.user_id=a4.user_id and t.apply_id=a4.id
LEFT JOIN ccx_loan.b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ccx_loan.b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=str_date 
 and  a4.is_effect=1;
 
 
    /*开启事务*/
    START TRANSACTION ;
  INSERT INTO project.`finish` (
    finish,
    pass,
    refused,
    passrate,
    getmoney,
    transfer,
    transfermoney,
    avgmoney,
    `day`,
    `type`
  ) 
  VALUES
    (
      finish_decimal,
      pass_decimal,
      refused_decimal,
      passrate_decimal,
      getmoney_decimal,
      transfer_decimal,
      transfermoney_decimal,
      avgmoney_decimal,
      str_date,
      2
    ) ;
  IF t_error = 1 
  THEN ROLLBACK ;
  ELSE COMMIT ;
  END IF ;
  #RETURN 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `apply_3` */

/*!50003 DROP PROCEDURE IF EXISTS  `apply_3` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `apply_3`(IN str_date DATE)
BEGIN
  #Routine body goes here...
  DECLARE finish_decimal DECIMAL(16,2);
  DECLARE pass_decimal DECIMAL(16,2);
  DECLARE refused_decimal DECIMAL(16,2);
  DECLARE passrate_decimal VARCHAR(64);
  DECLARE getmoney_decimal DECIMAL(16,2);
  DECLARE transfer_decimal DECIMAL(16,2);
  DECLARE transfermoney_decimal DECIMAL(16,2);
  DECLARE avgmoney_decimal DECIMAL(16,2);
  #DECLARE str_date VARCHAR (10) ;
  DECLARE t_error INTEGER DEFAULT 0 ;
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET t_error = 1 ;
  #SET str_date = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ;
  SELECT count(*)  finish,       
      count(case when a6.audit_result = 3 then 1 end )pass,    
      count(case when a6.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a6.audit_result =3 then 1 else null end )/(count(case when a6.audit_result in (3,5,6)  then 1 end )+count(case when a6.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a6.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
      INTO finish_decimal,
    pass_decimal,
    refused_decimal,
    passrate_decimal,
    getmoney_decimal,
    transfer_decimal,
    transfermoney_decimal,
    avgmoney_decimal 
FROM
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from cashloan.xj_apply a
  left join cashloan.xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=str_date 
    and u.register_time <str_date 
  GROUP BY a.user_id
  )a1
 LEFT JOIN cashloan.xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
   
 )a3
   JOIN cashloan.xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time >=str_date 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=str_date 
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN cashloan.xj_apply a6 on a5.user_id=a6.user_id
LEFT JOIN cashloan.xj_transfer t on t.user_id=a6.user_id and t.apply_id=a6.id
LEFT JOIN ccx_loan.b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ccx_loan.b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a6.audit_time,'%Y-%m-%d')=str_date; 
 
 
    /*开启事务*/
    START TRANSACTION ;
  INSERT INTO project.`finish` (
    finish,
    pass,
    refused,
    passrate,
    getmoney,
    transfer,
    transfermoney,
    avgmoney,
    `day`,
    `type`
  ) 
  VALUES
    (
      finish_decimal,
      pass_decimal,
      refused_decimal,
      passrate_decimal,
      getmoney_decimal,
      transfer_decimal,
      transfermoney_decimal,
      avgmoney_decimal,
      str_date,
      3
    ) ;
  IF t_error = 1 
  THEN ROLLBACK ;
  ELSE COMMIT ;
  END IF ;
  #RETURN 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `apply_4` */

/*!50003 DROP PROCEDURE IF EXISTS  `apply_4` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `apply_4`(IN str_date DATE)
BEGIN
  #Routine body goes here...
  DECLARE finish_decimal DECIMAL(16,2);
  DECLARE pass_decimal DECIMAL(16,2);
  DECLARE refused_decimal DECIMAL(16,2);
  DECLARE passrate_decimal VARCHAR(64);
  DECLARE getmoney_decimal DECIMAL(16,2);
  DECLARE transfer_decimal DECIMAL(16,2);
  DECLARE transfermoney_decimal DECIMAL(16,2);
  DECLARE avgmoney_decimal DECIMAL(16,2);
  #DECLARE str_date VARCHAR (10) ;
  DECLARE t_error INTEGER DEFAULT 0 ;
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET t_error = 1 ;
  #SET str_date = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ;
  SELECT count(*)  finish,       
      count(case when a6.audit_result = 3 then 1 end )pass,    
      count(case when a6.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a6.audit_result =3 then 1 else null end )/(count(case when a6.audit_result in (3,5,6)  then 1 end )+count(case when a6.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a6.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
      INTO finish_decimal,
    pass_decimal,
    refused_decimal,
    passrate_decimal,
    getmoney_decimal,
    transfer_decimal,
    transfermoney_decimal,
    avgmoney_decimal 
FROM
(
SELECT a4.user_id
from
 (
 SELECT a2.user_id,MIN(a2.audit_time) as audit_time
 from 
  (
  SELECT a.user_id                            
   from cashloan.xj_apply a
  left join cashloan.xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=str_date 
    and u.register_time <str_date
  GROUP BY a.user_id
  )a1
 LEFT JOIN cashloan.xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
   
 )a3
   JOIN cashloan.xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time >=str_date 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=str_date 
GROUP BY a4.user_id HAVING count(a4.user_id)>1
)a5
LEFT JOIN cashloan.xj_apply a6 on a5.user_id=a6.user_id
LEFT JOIN cashloan.xj_transfer t on t.user_id=a6.user_id and t.apply_id=a6.id
LEFT JOIN ccx_loan.b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ccx_loan.b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a6.audit_time,'%Y-%m-%d')=str_date; 
 
 
    /*开启事务*/
    START TRANSACTION ;
  INSERT INTO project.`finish` (
    finish,
    pass,
    refused,
    passrate,
    getmoney,
    transfer,
    transfermoney,
    avgmoney,
    `day`,
    `type`
  ) 
  VALUES
    (
      finish_decimal,
      pass_decimal,
      refused_decimal,
      passrate_decimal,
      getmoney_decimal,
      transfer_decimal,
      transfermoney_decimal,
      avgmoney_decimal,
      str_date,
      4
    ) ;
  IF t_error = 1 
  THEN ROLLBACK ;
  ELSE COMMIT ;
  END IF ;
  #RETURN 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `apply_5` */

/*!50003 DROP PROCEDURE IF EXISTS  `apply_5` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `apply_5`(in str_date date)
BEGIN
  #Routine body goes here...
  DECLARE finish_decimal DECIMAL(16,2);
  DECLARE pass_decimal DECIMAL(16,2);
  DECLARE refused_decimal DECIMAL(16,2);
  DECLARE passrate_decimal VARCHAR(64);
  DECLARE getmoney_decimal DECIMAL(16,2);
  DECLARE transfer_decimal DECIMAL(16,2);
  DECLARE transfermoney_decimal DECIMAL(16,2);
  DECLARE avgmoney_decimal DECIMAL(16,2);
  #DECLARE str_date VARCHAR (10) ;
  DECLARE t_error INTEGER DEFAULT 0 ;
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET t_error = 1 ;
  #SET str_date = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ;
  SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end ) pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end ) getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
      INTO finish_decimal,
    pass_decimal,
    refused_decimal,
    passrate_decimal,
    getmoney_decimal,
    transfer_decimal,
    transfermoney_decimal,
    avgmoney_decimal 
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
   from cashloan.xj_apply a
  left join cashloan.xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=str_date 
    and u.register_time <str_date 
  GROUP BY a.user_id
  )a1
 LEFT JOIN cashloan.xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN cashloan.xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <str_date 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=str_date 
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN cashloan.xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < str_date 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result in (4,5,6)
)a8
LEFT JOIN cashloan.xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN cashloan.xj_transfer t on a9.user_id=t.user_id and t.apply_id=a9.id
LEFT JOIN ccx_loan.b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ccx_loan.b_payment_list w on w.contract_id=ap.contract_id
WHERE  DATE_FORMAT(a9.audit_time,'%Y-%m-%d')=str_date  and a9.is_effect=1;
 
 
    /*开启事务*/
    START TRANSACTION ;
  INSERT INTO project.`finish` (
    finish,
    pass,
    refused,
    passrate,
    getmoney,
    transfer,
    transfermoney,
    avgmoney,
    `day`,
    `type`
  ) 
  VALUES
    (
      finish_decimal,
      pass_decimal,
      refused_decimal,
      passrate_decimal,
      getmoney_decimal,
      transfer_decimal,
      transfermoney_decimal,
      avgmoney_decimal,
      str_date,
      5
    ) ;
  IF t_error = 1 
  THEN ROLLBACK ;
  ELSE COMMIT ;
  END IF ;
  #RETURN 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `apply_6` */

/*!50003 DROP PROCEDURE IF EXISTS  `apply_6` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `apply_6`(IN str_date DATE)
BEGIN
  #Routine body goes here...
  DECLARE finish_decimal DECIMAL(16,2);
  DECLARE pass_decimal DECIMAL(16,2);
  DECLARE refused_decimal DECIMAL(16,2);
  DECLARE passrate_decimal VARCHAR(64);
  DECLARE getmoney_decimal DECIMAL(16,2);
  DECLARE transfer_decimal DECIMAL(16,2);
  DECLARE transfermoney_decimal DECIMAL(16,2);
  DECLARE avgmoney_decimal DECIMAL(16,2);
  #DECLARE str_date VARCHAR (10) ;
  DECLARE t_error INTEGER DEFAULT 0 ;
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET t_error = 1 ;
  #SET str_date = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ;
SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
      INTO finish_decimal,
    pass_decimal,
    refused_decimal,
    passrate_decimal,
    getmoney_decimal,
    transfer_decimal,
    transfermoney_decimal,
    avgmoney_decimal 
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
   from cashloan.xj_apply a
  left join cashloan.xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=str_date 
    and u.register_time <".$exday.$sql." 
  GROUP BY a.user_id
  )a1
 LEFT JOIN cashloan.xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN cashloan.xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <str_date 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=str_date 
GROUP BY a4.user_id HAVING count(a4.user_id)>1
)a5
LEFT JOIN cashloan.xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < str_date 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result in (4,5,6)
)a8 
LEFT JOIN cashloan.xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN cashloan.xj_transfer t on t.user_id=a9.user_id and t.apply_id=a9.id
LEFT JOIN ccx_loan.b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ccx_loan.b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a9.audit_time,'%Y-%m-%d')=str_date  and a9.is_effect=1;
 
 
    /*开启事务*/
    START TRANSACTION ;
  INSERT INTO project.`finish` (
    finish,
    pass,
    refused,
    passrate,
    getmoney,
    transfer,
    transfermoney,
    avgmoney,
    `day`,
    `type`
  ) 
  VALUES
    (
      finish_decimal,
      pass_decimal,
      refused_decimal,
      passrate_decimal,
      getmoney_decimal,
      transfer_decimal,
      transfermoney_decimal,
      avgmoney_decimal,
      str_date,
      6
    ) ;
  IF t_error = 1 
  THEN ROLLBACK ;
  ELSE COMMIT ;
  END IF ;
  #RETURN 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `apply_7` */

/*!50003 DROP PROCEDURE IF EXISTS  `apply_7` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `apply_7`(IN str_date DATE)
BEGIN
  #Routine body goes here...
  DECLARE finish_decimal DECIMAL(16,2);
  DECLARE pass_decimal DECIMAL(16,2);
  DECLARE refused_decimal DECIMAL(16,2);
  DECLARE passrate_decimal VARCHAR(64);
  DECLARE getmoney_decimal DECIMAL(16,2);
  DECLARE transfer_decimal DECIMAL(16,2);
  DECLARE transfermoney_decimal DECIMAL(16,2);
  DECLARE avgmoney_decimal DECIMAL(16,2);
  #DECLARE str_date VARCHAR (10) ;
  DECLARE t_error INTEGER DEFAULT 0 ;
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET t_error = 1 ;
  #SET str_date = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ;
SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
      INTO finish_decimal,
    pass_decimal,
    refused_decimal,
    passrate_decimal,
    getmoney_decimal,
    transfer_decimal,
    transfermoney_decimal,
    avgmoney_decimal 
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
   from cashloan.xj_apply a
  left join cashloan.xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=str_date
    and u.register_time <str_date
  GROUP BY a.user_id
  )a1
 LEFT JOIN cashloan.xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN cashloan.xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <str_date
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=str_date
GROUP BY a4.user_id HAVING count(a4.user_id)=1
)a5
LEFT JOIN cashloan.xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < str_date
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result =3
)a8
LEFT JOIN cashloan.xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN cashloan.xj_transfer t on a9.user_id=t.user_id and t.apply_id=a9.id
LEFT JOIN ccx_loan.b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ccx_loan.b_payment_list w on w.contract_id=ap.contract_id
WHERE  DATE_FORMAT(a9.audit_time,'%Y-%m-%d')=str_date and a9.is_effect=1;
 
 
    /*开启事务*/
    START TRANSACTION ;
  INSERT INTO project.`finish` (
    finish,
    pass,
    refused,
    passrate,
    getmoney,
    transfer,
    transfermoney,
    avgmoney,
    `day`,
    `type`
  ) 
  VALUES
    (
      finish_decimal,
      pass_decimal,
      refused_decimal,
      passrate_decimal,
      getmoney_decimal,
      transfer_decimal,
      transfermoney_decimal,
      avgmoney_decimal,
      str_date,
      7
    ) ;
  IF t_error = 1 
  THEN ROLLBACK ;
  ELSE COMMIT ;
  END IF ;
  #RETURN 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `apply_8` */

/*!50003 DROP PROCEDURE IF EXISTS  `apply_8` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `apply_8`(IN str_date DATE)
BEGIN
  #Routine body goes here...
  DECLARE finish_decimal DECIMAL(16,2);
  DECLARE pass_decimal DECIMAL(16,2);
  DECLARE refused_decimal DECIMAL(16,2);
  DECLARE passrate_decimal VARCHAR(64);
  DECLARE getmoney_decimal DECIMAL(16,2);
  DECLARE transfer_decimal DECIMAL(16,2);
  DECLARE transfermoney_decimal DECIMAL(16,2);
  DECLARE avgmoney_decimal DECIMAL(16,2);
  #DECLARE str_date VARCHAR (10) ;
  DECLARE t_error INTEGER DEFAULT 0 ;
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET t_error = 1 ;
  #SET str_date = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ;
SELECT count(*)  finish,       
      count(case when a9.audit_result = 3 then 1 end )pass,    
      count(case when a9.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a9.audit_result =3 then 1 else null end )/(count(case when a9.audit_result in (3,5,6)  then 1 end )+count(case when a9.audit_result =4 then 1 end ))*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a9.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
      INTO finish_decimal,
    pass_decimal,
    refused_decimal,
    passrate_decimal,
    getmoney_decimal,
    transfer_decimal,
    transfermoney_decimal,
    avgmoney_decimal 
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
   from cashloan.xj_apply a
  left join cashloan.xj_user u on a.user_id =u.id 
  where DATE_FORMAT(a.audit_time,'%Y-%m-%d')=str_date 
    and u.register_time <str_date 
  GROUP BY a.user_id
  )a1
 LEFT JOIN cashloan.xj_apply a2 on a2.user_id=a1.user_id
 GROUP BY a2.user_id 
 )a3
  LEFT JOIN cashloan.xj_apply a4 on a3.user_id=a4.user_id
  where a3.audit_time <str_date 
    and DATE_FORMAT(a4.audit_time,'%Y-%m-%d')=str_date 
GROUP BY a4.user_id HAVING count(a4.user_id)>1
)a5
LEFT JOIN cashloan.xj_apply a6 on a6.user_id=a5.user_id
where a6.audit_time < str_date 
GROUP BY a6.user_id
)a7 
LEFT JOIN cashloan.xj_apply a10 on a10.user_id = a7.user_id and a10.audit_time = a7.audit_time
WHERE a10.audit_result =3
)a8 
LEFT JOIN cashloan.xj_apply a9 on a8.user_id=a9.user_id
LEFT JOIN cashloan.xj_transfer t on t.user_id=a9.user_id and t.apply_id=a9.id
LEFT JOIN ccx_loan.b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ccx_loan.b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a9.audit_time,'%Y-%m-%d')=str_date and a9.is_effect=1;
 
 
    /*开启事务*/
    START TRANSACTION ;
  INSERT INTO project.`finish` (
    finish,
    pass,
    refused,
    passrate,
    getmoney,
    transfer,
    transfermoney,
    avgmoney,
    `day`,
    `type`
  ) 
  VALUES
    (
      finish_decimal,
      pass_decimal,
      refused_decimal,
      passrate_decimal,
      getmoney_decimal,
      transfer_decimal,
      transfermoney_decimal,
      avgmoney_decimal,
      str_date,
      8
    ) ;
  IF t_error = 1 
  THEN ROLLBACK ;
  ELSE COMMIT ;
  END IF ;
  #RETURN 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `apply_9` */

/*!50003 DROP PROCEDURE IF EXISTS  `apply_9` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `apply_9`(IN str_date DATE)
BEGIN
  #Routine body goes here...
  DECLARE finish_decimal DECIMAL(16,2);
  DECLARE pass_decimal DECIMAL(16,2);
  DECLARE refused_decimal DECIMAL(16,2);
  DECLARE passrate_decimal VARCHAR(64);
  DECLARE getmoney_decimal DECIMAL(16,2);
  DECLARE transfer_decimal DECIMAL(16,2);
  DECLARE transfermoney_decimal DECIMAL(16,2);
  DECLARE avgmoney_decimal DECIMAL(16,2);
  #DECLARE str_date VARCHAR (10) ;
  DECLARE t_error INTEGER DEFAULT 0 ;
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET t_error = 1 ;
  #SET str_date = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ;
SELECT count(*)  finish,       
      count(case when a.audit_result = 3 then 1 end )pass,    
      count(case when a.audit_result = 4 then 1 end ) refused,
      concat(left(count(case when a.audit_result =3 then 1 else null end )/count(case when a.audit_time is not null then 1 end )*100,5),'%') passrate,
      count(case when t.into_account_result in (1,2,3,4) then a.user_id end )getmoney,
      count( case when w.pay_flag=30 then w.contract_id end ) transfer, 
      sum(case when t.into_account_result in (2,4) then t.actual_amount  end ) transfermoney,
      avg ( case when  t.into_account_result in (2,4) then t.actual_amount  end) avgmoney
      INTO finish_decimal,
    pass_decimal,
    refused_decimal,
    passrate_decimal,
    getmoney_decimal,
    transfer_decimal,
    transfermoney_decimal,
    avgmoney_decimal 
FROM cashloan.xj_apply a 
LEFT JOIN cashloan.xj_transfer t on t.user_id=a.user_id and t.apply_id=a.id
LEFT JOIN ccx_loan.b_loan_application ap on ap.application_id=t.application_id
LEFT JOIN ccx_loan.b_payment_list w on w.contract_id=ap.contract_id
WHERE DATE_FORMAT(a.audit_time,'%Y-%m-%d')=str_date 
 and  a.is_effect=1; 
 
    /*开启事务*/
    START TRANSACTION ;
  INSERT INTO project.`finish` (
    finish,
    pass,
    refused,
    passrate,
    getmoney,
    transfer,
    transfermoney,
    avgmoney,
    `day`,
    `type`
  ) 
  VALUES
    (
      finish_decimal,
      pass_decimal,
      refused_decimal,
      passrate_decimal,
      getmoney_decimal,
      transfer_decimal,
      transfermoney_decimal,
      avgmoney_decimal,
      str_date,
      9
    ) ;
  IF t_error = 1 
  THEN ROLLBACK ;
  ELSE COMMIT ;
  END IF ;
  #RETURN 0;
END */$$
DELIMITER ;

/* Procedure structure for procedure `auto_conversion_rate` */

/*!50003 DROP PROCEDURE IF EXISTS  `auto_conversion_rate` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `auto_conversion_rate`(IN str_date DATE,IN end_date DATE)
BEGIN
  DECLARE vlocation_register VARCHAR(40);
  DECLARE vorigin_register VARCHAR(40); 
  DECLARE vcnt_register BIGINT(15);
  DECLARE vbasic_info BIGINT(15);
  DECLARE vjob_info BIGINT(15);
  DECLARE vcontact_info BIGINT(15);
  DECLARE vcard_cer_complete BIGINT(15);
  DECLARE vcard_cer_sucess BIGINT(15);
  DECLARE voperator_cer_complete BIGINT(15);
  DECLARE voperator_cer_sucess BIGINT(15);
  DECLARE voperator_cer_fail BIGINT(15);
  DECLARE voperator_cer_process BIGINT(15);
  DECLARE vcnt_audit BIGINT(15);
  DECLARE vcnt_audit_pass BIGINT(15);
  DECLARE vcnt_audit_refuse BIGINT(15);
  DECLARE vcnt_audit_process BIGINT(15);
  DECLARE vcnt_withdrawal BIGINT(15);
  DECLARE vamount_actual_sum DECIMAL(20,2);
  DECLARE vamount_actual_avg DECIMAL(20,2);
  DECLARE vcnt_pay BIGINT(15);
  DECLARE vamount_pay_sum DECIMAL(20,2);
  DECLARE vamount_pay_avg DECIMAL(20,2);
    -- 遍历数据结束标志
  DECLARE done INT DEFAULT FALSE;
	DECLARE cur_account CURSOR FOR 
	                                      SELECT  
                                                  u.tg_location AS location_register,
                                                  u.login_origin AS origin_register,
                                                  COUNT(DISTINCT u.mobile ) cnt_register,
                                                  COUNT( DISTINCT CASE WHEN u.address IS NOT NULL THEN u.mobile END ) basic_info,
                                                  COUNT( DISTINCT CASE WHEN ( ui.company_address IS NOT NULL  OR ui.job IN('自由职业者','家庭主妇','退休人员','失业人员')) THEN u.mobile  END ) job_info,  
                                                  COUNT(DISTINCT CASE WHEN ui.r_mobile3 IS NOT NULL THEN u.mobile  END ) contact_info,        
                                                  COUNT(DISTINCT CASE WHEN u.cardpassed=3  THEN u.mobile  END ) card_cer_sucess,
                                                  COUNT(DISTINCT CASE WHEN u.cardpassed IN (3,4)  THEN u.mobile  END )card_cer_complete,
                                                  COUNT(DISTINCT CASE WHEN u.mobilepassed IN (3,5) THEN u.mobile END ) operator_cer_sucess,
                                                  COUNT(DISTINCT CASE WHEN u.mobilepassed IN(3,4,5) THEN u.mobile END ) operator_cer_complete,   
                                                  COUNT(DISTINCT CASE WHEN u.mobilepassed=4 THEN u.mobile END ) operator_cer_fail,
                                                  COUNT(DISTINCT CASE WHEN u.mobilepassed=2 THEN u.mobile END ) operator_cer_process,
                                                  COUNT(DISTINCT CASE WHEN a.audit_time IS NOT NULL  THEN u.mobile  END) cnt_audit,
                                                 --  count(  case when a.audit_time is not null  then u.mobile  end) 完成申请订单量,
                                                  COUNT(DISTINCT CASE WHEN a.audit_result =3 THEN u.mobile END ) cnt_audit_pass,
                                                  COUNT(DISTINCT CASE WHEN a.audit_result =4 THEN u.mobile END ) cnt_audit_refuse,
                                                  COUNT(DISTINCT CASE WHEN a.audit_result =2 THEN u.mobile END ) cnt_audit_process,     
                                                  COUNT(DISTINCT CASE WHEN t.into_account_result IN (1,2,3,4) THEN u.mobile END ) cnt_withdrawal,
                                                  SUM( CASE WHEN t.into_account_result IN (1,2,3,4) THEN  t.actual_amount END ) amount_actual_sum,
                                                  AVG (CASE WHEN t.into_account_result IN (1,2,3,4) THEN t.actual_amount END ) amount_actual_avg,
                                               --   count(DISTINCT case when ap.application_date is not null then u.mobile end)申请提现,
                                               --   SUM( case when ap.application_date is not null then  ap.order_amount end ) 授信金额,
                                               --   avg (case when ap.application_date is not null then ap.order_amount end ) 平均授信额度,
                                                  COUNT( DISTINCT CASE WHEN w.pay_flag=30 THEN ap.scene_custid END ) cnt_pay,
                                                  SUM( CASE WHEN w.pay_flag=30 THEN w.payment_amount END ) amount_pay_sum,
                                                  AVG( CASE WHEN w.pay_flag=30 THEN w.payment_amount END ) amount_pay_avg
 
              
                                           FROM cashloan.xj_user u
                                           LEFT JOIN cashloan.xj_user_info  ui ON u.id = ui.user_id 
                                           LEFT JOIN ( SELECT a1.user_id ,a1.id,a1.audit_time, a1.audit_result FROM cashloan.xj_apply a1 GROUP BY a1.user_id ) a ON a.user_id = u.id 
                                           LEFT JOIN cashloan.xj_transfer t ON t.user_id = u.id AND t.apply_id = a.id 
                                           LEFT JOIN ccx_loan.b_loan_application ap ON ap.application_id=t.application_id
                                           LEFT JOIN ccx_loan.b_payment_list w ON w.contract_id=ap.contract_id 
                                      WHERE u.is_effect =1 
                                      AND u.register_time >=str_date
                                      AND u.register_time < end_date
                                   GROUP BY   u.tg_location,u.login_origin
                                   ORDER BY   COUNT(DISTINCT u.mobile ) DESC ;
	
   
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN cur_account;
	REPEAT
		FETCH cur_account INTO 
                                              vlocation_register,
                                              vorigin_register,
                                              vcnt_register,
                                              vbasic_info,
                                              vjob_info,
                                              vcontact_info,
                                              vcard_cer_complete,
                                              vcard_cer_sucess,
                                              voperator_cer_complete,
                                              voperator_cer_sucess,
                                              voperator_cer_fail,
                                              voperator_cer_process,
                                              vcnt_audit,
                                              vcnt_audit_pass,
                                              vcnt_audit_refuse,
                                              vcnt_audit_process,
                                              vcnt_withdrawal,
                                              vamount_actual_sum,
                                              vamount_actual_avg,
                                              vcnt_pay,
                                              vamount_pay_sum,
                                              vamount_pay_avg;
		IF NOT done THEN                                         
                  INSERT INTO project.auto_conversion_rate (
                                              location_register,
                                              origin_register,
                                              cnt_register,
                                              basic_info,
                                              job_info,
                                              contact_info,
                                              card_cer_complete,
                                              card_cer_sucess,
                                              operator_cer_complete,
                                              operator_cer_sucess,
                                              operator_cer_fail,
                                              operator_cer_process,
                                              cnt_audit,
                                              cnt_audit_pass,
                                              cnt_audit_refuse,
                                              cnt_audit_process,
                                              cnt_withdrawal,
                                              amount_actual_sum,
                                              amount_actual_avg,
                                              cnt_pay,
                                              amount_pay_sum,
                                              amount_pay_avg
                              ) 
                         VALUES
                              ( 
                                              vlocation_register,
                                              vorigin_register,
                                              vcnt_register,
                                              vbasic_info,
                                              vjob_info,
                                              vcontact_info,
                                              vcard_cer_complete,
                                              vcard_cer_sucess,
                                              voperator_cer_complete,
                                              voperator_cer_sucess,
                                              voperator_cer_fail,
                                              voperator_cer_process,
                                              vcnt_audit,
                                              vcnt_audit_pass,
                                              vcnt_audit_refuse,
                                              vcnt_audit_process,
                                              vcnt_withdrawal,
                                              vamount_actual_sum,
                                              vamount_actual_avg,
                                              vcnt_pay,
                                              vamount_pay_sum,
                                              vamount_pay_avg
                                         ) ;
		END IF;
 	  UNTIL done END REPEAT;
	  CLOSE cur_account;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `auto_overall_data` */

/*!50003 DROP PROCEDURE IF EXISTS  `auto_overall_data` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `auto_overall_data`()
BEGIN
  DECLARE vcreat_month1 VARCHAR(20) DEFAULT NULL;
  DECLARE vcreat_month2 VARCHAR(20) DEFAULT NULL;
  DECLARE vcreat_month3 VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_register BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_audit BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_loan BIGINT(15) DEFAULT NULL;
  DECLARE vamount_loan DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_avg_loan DECIMAL(20,2);
  DECLARE done INT DEFAULT FALSE;
	DECLARE cur_account1 CURSOR FOR 
	                                                SELECT   DATE_FORMAT(u.register_time,'%Y-%m') creat_month,
                                                           COUNT(DISTINCT u.id) quantity_register
                                                      FROM cashloan.xj_user u
                                                     WHERE u.is_effect=1
                                                       AND u.register_time<CURDATE()
                                                  GROUP BY creat_month;
	
    DECLARE cur_account2 CURSOR FOR 
	                                                SELECT   DATE_FORMAT(a.audit_time,'%Y-%m') audit_month,
                                                           COUNT(*) AS quantity_audit
                                                     FROM  cashloan.xj_apply a
                                                     WHERE a.is_effect=1
                                                       AND a.audit_time<CURDATE()
                                                  GROUP BY DATE_FORMAT(a.audit_time,'%Y-%m');
	    DECLARE cur_account3 CURSOR FOR 
                                                  SELECT DATE_FORMAT(w.real_pay_date,'%Y-%m') real_pay_month, 
   	                                                     count(*) as quantity_loan,
                                                         sum(w.payment_amount) as amount_loan,
                                                         avg(w.payment_amount) as amount_avg_loan
	                                                  from ccx_loan.b_payment_list w 
	                                                 WHERE w.invalid_sign=1
 	                                                   and w.pay_flag=30
 	                                                   and w.scene_id=100010
	                                              GROUP BY DATE_FORMAT(w.real_pay_date,'%Y-%m');
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN cur_account1;
	REPEAT
		FETCH cur_account1 INTO 
                                              vcreat_month1,
                                              vquantity_register;
		IF NOT done THEN                                         
                  INSERT INTO project.auto_overall_data
                                          (
                                              creat_month,
                                              quantity_register
                                           ) 
                         VALUES
                                        ( 
                                             vcreat_month1,
                                             vquantity_register
                                         ) ;
		END IF;
 	  UNTIL done END REPEAT;
	  CLOSE cur_account1;
	SET done = 0;
	OPEN cur_account2; 
	              REPEAT
		                FETCH cur_account2 INTO 	vcreat_month2,vquantity_audit;
		            IF NOT done THEN
                    UPDATE project.auto_overall_data SET audit_month=vcreat_month2,quantity_audit=vquantity_audit
                                                
               WHERE creat_month=vcreat_month2;
	END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account2;
	SET done = 0;
	OPEN cur_account3; 
	              REPEAT
		                FETCH cur_account3 INTO 	vcreat_month3,vquantity_loan,vamount_loan,vamount_avg_loan;
		            IF NOT done THEN
                    UPDATE project.auto_overall_data SET quantity_loan=vquantity_loan,amount_loan=vamount_loan,amount_avg_loan=vamount_avg_loan
                                                
               WHERE creat_month=vcreat_month3;
	END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account3;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `auto_overall_data1` */

/*!50003 DROP PROCEDURE IF EXISTS  `auto_overall_data1` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `auto_overall_data1`()
BEGIN
  DECLARE vcreat_month1 VARCHAR(20) DEFAULT NULL;
  DECLARE vcreat_month2 VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_register BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_audit BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_loan BIGINT(15) DEFAULT NULL;
  DECLARE vamount_loan DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_pay_avg DECIMAL(20,2);
  DECLARE done INT DEFAULT FALSE;
	DECLARE cur_account1 CURSOR FOR 
	                                                SELECT   DATE_FORMAT(u.register_time,'%Y-%m') creat_month,
                                                           COUNT(DISTINCT u.id) quantity_register
                                                      FROM cashloan.xj_user u
                                                     WHERE u.is_effect=1
                                                       AND u.register_time<CURDATE()
                                                  GROUP BY creat_month;
	
    DECLARE cur_account2 CURSOR FOR 
	                                                SELECT   DATE_FORMAT(a.audit_time,'%Y-%m') audit_month,
                                                           COUNT(*) as quantity_audit
                                                     FROM  cashloan.xj_apply a
                                                     WHERE a.is_effect=1
                                                       AND a.audit_time<CURDATE()
                                                  GROUP BY DATE_FORMAT(a.audit_time,'%Y-%m');
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN cur_account1;
	REPEAT
		FETCH cur_account1 INTO 
                                              vcreat_month1,
                                              vquantity_register;
		IF NOT done THEN                                         
                  INSERT INTO project.auto_overall_data
                                          (
                                              creat_month,
                                              quantity_register
                                           ) 
                         VALUES
                                        ( 
                                             vcreat_month1,
                                             vquantity_register
                                         ) ;
		END IF;
 	  UNTIL done END REPEAT;
	  CLOSE cur_account1;
	SET done = 0;
	OPEN cur_account2; 
	              REPEAT
		                FETCH cur_account2 INTO 	vcreat_month2,vquantity_audit;
		            IF NOT done THEN
                    UPDATE project.auto_overall_data SET audit_month=vcreat_month2,quantity_audit=vquantity_audit
                                                
               WHERE creat_month=vcreat_month2;
	END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account2;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `auto_reloan` */

/*!50003 DROP PROCEDURE IF EXISTS  `auto_reloan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `auto_reloan`()
BEGIN
  DECLARE vscene_custid BIGINT(20);
  DECLARE vcontract_id BIGINT(20); 
  DECLARE vrownum BIGINT(20);
   DECLARE vwy BIGINT(20); 
  DECLARE done INT DEFAULT FALSE;
	DECLARE cur_account CURSOR FOR 
	                                 SELECT a.scene_custid,a.contract_id,case when @mid=a.scene_custid then @row:=@row+1 else @row:=1 end rownum,@mid:=a.scene_custid 
                                     from 
                                  (SELECT ap.scene_custid,w.contract_id
                                          from ccx_loan.b_payment_list w 
                                          JOIN ccx_loan.b_loan_application ap on w.contract_id=ap.contract_id
                                          WHERE w.scene_id=100010
                                            and w.pay_flag=30
                                          ORDER BY ap.scene_custid
                                           )a
                                          ORDER BY a.scene_custid,a.contract_id;
	
   
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN cur_account;
	REPEAT
		FETCH cur_account INTO 
                                             vscene_custid,
                                             vcontract_id,
                                             vrownum,
                                             vwy;
                                              
		IF NOT done THEN                                         
                  INSERT INTO project.auto_reloan (
                                               scene_custid,
                                               contract_id,
                                               rownum
                              ) 
                         VALUES
                              ( 
                                               vscene_custid,
                                               vcontract_id,
                                               vrownum
                                         ) ;
		END IF;
 	  UNTIL done END REPEAT;
	  CLOSE cur_account;
    
    END */$$
DELIMITER ;

/* Procedure structure for procedure `auto_scene_stock` */

/*!50003 DROP PROCEDURE IF EXISTS  `auto_scene_stock` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `auto_scene_stock`(IN str_date DATE,IN end_date DATE)
BEGIN
	DECLARE vcreat_date1 VARCHAR(20);
	DECLARE vcreat_date2 VARCHAR(20);
	DECLARE vcreat_date3 VARCHAR(20);
	DECLARE vcreat_date4 VARCHAR(20);
	DECLARE vcreat_date5 VARCHAR(20);
  DECLARE vscene_id1 BIGINT(15);
  DECLARE vscene_id2 BIGINT(15);
  DECLARE vquantity_loan_thmon BIGINT(15) DEFAULT NULL;
  DECLARE vamount_loan_thmon DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_repayment_complete BIGINT(15) DEFAULT NULL;
  DECLARE vamount_repayment_complete DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_overdue_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_overdue_stock BIGINT(15) DEFAULT NULL;
  DECLARE vamount_overdue_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_overdue_stock DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_stock_thmon BIGINT(15) DEFAULT NULL;
  DECLARE vamount_stock_thmon DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_M0 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M1 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M2 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M3 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M4 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M5 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M6 BIGINT(15) DEFAULT NULL;
  
  DECLARE vquantity_overdue_stock_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M0_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M1_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M2_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M3_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M4_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M5_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M6_rate VARCHAR(20) DEFAULT NULL;
  
  DECLARE vamount_M0 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M1 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M2 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M3 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M4 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M5 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M6 DECIMAL(20,2) DEFAULT NULL;
  
  DECLARE vamount_overdue_stock_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M0_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M1_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M2_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M3_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M4_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M5_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M6_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_reloan BIGINT(15) DEFAULT NULL;
  DECLARE vamount_reloan DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_audit BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_passed BIGINT(15) DEFAULT NULL;
  DECLARE vpassed_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_loan_total BIGINT(15) DEFAULT NULL;
  DECLARE vamount_loan_total DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_stock_total BIGINT(15) DEFAULT NULL;
  DECLARE vamount_stock_total DECIMAL(20,2) DEFAULT NULL;
    -- 遍历数据结束标志
  DECLARE done INT DEFAULT FALSE;
	DECLARE cur_account1 CURSOR FOR 
	             SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                      w.scene_id,
                     -- --------（此处不能用w.payment_amount,否则二期重复）
                     COUNT(DISTINCT w.contract_id) quantity_loan_thmon,#放款数
                     SUM(r.capital) amount_loan_thmon,#放款金额
       
                     COUNT(DISTINCT CASE WHEN dict.item_name ='合同结束' THEN w.contract_id END) quantity_repayment_complete ,#结清件数
                     IFNULL(SUM(CASE WHEN r.payment_flag IN (1,3) THEN r.capital END),0) amount_repayment_complete,#结清金额
                 --  concat(left((count(DISTINCT w.contract_id)- count(DISTINCT case when r.term=1 and r.payment_flag =1 then w.contract_id end))/count(DISTINCT w.contract_id)*100,5),'%') 首逾率,
                     CONCAT(LEFT(COUNT(DISTINCT CASE WHEN r.payment_flag IN (2,3) THEN w.contract_id END)/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_overdue_rate ,#首逾率（件数）
                     COUNT(DISTINCT CASE WHEN r.payment_flag =2 THEN w.contract_id END) quantity_overdue_stock ,#在库逾期件数
                     CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag IN (2,3) THEN r.capital END),0)/IFNULL(SUM(r.capital),0)*100,5),'%') amount_overdue_rate,#首逾率（金额）
                     IFNULL(SUM(CASE WHEN r.payment_flag =2 THEN r.capital END),0) amount_overdue_stock,#在库逾期金额
                     COUNT(DISTINCT w.contract_id)-COUNT(DISTINCT CASE WHEN dict.item_name ='合同结束' THEN w.contract_id END) quantity_stock_thmon,
                     SUM(r.capital)-IFNULL(SUM(CASE WHEN r.payment_flag IN (1,3) THEN r.capital END),0) amount_stock_thmon,
                   
                  --   count(DISTINCT w.contract_id)-count(DISTINCT case when r.term=ap.installmentCount and r.payment_flag in (1,3) then w.contract_id end) 在库件数,
                  --   sum(r.capital)-ifnull(sum(case when r.term=ap.installmentCount and r.payment_flag in (1,3) then r.capital end),0) 在库金额,
                    COUNT(DISTINCT CASE WHEN  dict.item_name <>'合同结束' THEN w.contract_id END) 
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=0 THEN w.contract_id END )quantity_M0,
                    COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=0 THEN w.contract_id END )
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=31 THEN w.contract_id END ) quantity_M1,
                    COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=31 THEN w.contract_id END )
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=61 THEN w.contract_id END ) quantity_M2,
                    COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=61  THEN w.contract_id END )
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=91  THEN w.contract_id END ) quantity_M3,
                    COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=91 THEN w.contract_id END )
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=121 AND 150 THEN w.contract_id END ) quantity_M4, 
                    COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=121 THEN w.contract_id END ) 
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=151 THEN w.contract_id END ) quantity_M5,
                    COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=151 THEN w.contract_id END ) quantity_M6,
                    CONCAT(LEFT(COUNT(DISTINCT CASE WHEN r.payment_flag =2 THEN w.contract_id END)/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_overdue_stock_rate,
                    CONCAT(LEFT((COUNT(DISTINCT CASE WHEN  dict.item_name <>'合同结束' THEN w.contract_id END) 
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=0 THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M0_rate,       
                    CONCAT(LEFT((COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=0 THEN w.contract_id END )
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=31 THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M1_rate,
                    CONCAT(LEFT((COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=31 THEN w.contract_id END )
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=61 THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M2_rate,
                    CONCAT(LEFT((COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=61  THEN w.contract_id END )
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=91  THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M3_rate,
                    CONCAT(LEFT((COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=91 THEN w.contract_id END )
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=121 AND 150 THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M4_rate, 
                    CONCAT(LEFT((COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=121 THEN w.contract_id END ) 
                  - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=151 THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M5_rate,
                    CONCAT(LEFT(COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=151 THEN w.contract_id END )/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M6_rate,
                    IFNULL(SUM(CASE WHEN r.payment_flag =0 THEN r.capital END),0) amount_M0,
                    IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 0 AND 30 THEN r.capital END ),0) amount_M1,
                    IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 31 AND 60 THEN r.capital END ),0) amount_M2,
                    IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 61 AND 90 THEN r.capital END ),0) amount_M3,
                    IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 91 AND 120 THEN r.capital END ),0) amount_M4, 
                    IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 121 AND 150 THEN r.capital END ),0) amount_M5,
                    IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >150 THEN r.capital END ),0) amount_M6,
                CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 THEN r.capital END),0)/SUM(r.capital)*100,5),'%') amount_overdue_stock_rate,
                CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =0 THEN r.capital END),0)/SUM(r.capital)*100,5),'%') amount_M0_rate,
                CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 0 AND 30 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M1_rate,
                CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 31 AND 60 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M2_rate,
                CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 61 AND 90 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M3_rate,
                CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 91 AND 120 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M4_rate, 
                CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 121 AND 150 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M5_rate,
                CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >150 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M6_rate
               FROM ccx_loan.b_payment_list w 
               JOIN ccx_loan.b_repayment_plan r ON w.contract_id=r.contract_id 
               JOIN ccx_loan.b_loan_application ap  ON ap.contract_id=w.contract_id
               JOIN ccx_loan.b_contract c ON w.contract_id=c.contract_id
               JOIN ccx_loan.sys_dictionary_item dict ON dict.item_code =c.contract_status
             WHERE  w.creat_date >= str_date 
                AND  w.creat_date < end_date
                AND w.scene_id='100010'  
                AND w.pay_flag=30 
                AND r.invalid_sign=1
                  -- and ap.installmentCount in (1,2)
                  -- and w.contract_id in (34968,34982,34954)
 
              GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m');
	
    DECLARE cur_account2 CURSOR FOR 
            SELECT DATE_FORMAT(m.creat_date,'%Y-%m') creat_date,
                   m.scene_id,
                   COUNT(m.contract_id) quantity_reloan,
                  SUM(m.payment_amount) amount_reloan
             FROM
                   (
                     SELECT ap.scene_custid,ap.contract_id,ap.application_date,w.creat_date,w.payment_amount,w.scene_id
                     FROM ccx_loan.b_loan_application ap 
                     JOIN ccx_loan.b_payment_list w ON w.contract_id=ap.contract_id 
                    WHERE ap.scene_id='100010'
                      AND ap.application_status<>200518
                      AND w.pay_flag=30
                   )m
                LEFT JOIN 
                 (
                    SELECT ap2.scene_custid,ap2.contract_id,ap2.application_date
                     FROM
                     (
                       SELECT ap1.scene_custid ,MIN(ap1.application_date) AS application_date
                         FROM ccx_loan.b_loan_application ap1 
                        WHERE ap1.scene_id='100010'
                          AND ap1.application_status<>200518
                     GROUP BY ap1.scene_custid
                       )ap3
                          JOIN ccx_loan.b_loan_application ap2 ON ap3.scene_custid=ap2.scene_custid AND ap3.application_date = ap2.application_date
     
                 )n ON m.scene_custid=n.scene_custid
                 WHERE m.application_date > n.application_date
               GROUP BY DATE_FORMAT(m.creat_date,'%Y-%m')
               ORDER BY creat_date;
DECLARE cur_account3 CURSOR FOR 
               SELECT DATE_FORMAT(a.audit_time,'%Y-%m') audit_date,
                      COUNT(CASE WHEN a.audit_time IS NOT NULL THEN 1 END ) quantity_audit,
                      COUNT(CASE WHEN a.audit_result IN (3,5,6) THEN 1 END) quantity_passed,
                      CONCAT(LEFT(COUNT(CASE WHEN a.audit_result IN (3,5,6) THEN 1 ELSE NULL END )/COUNT(CASE WHEN a.audit_time IS NOT NULL THEN 1 END )*100,5),'%') passed_rate
       
                FROM  cashloan.xj_apply a
                LEFT JOIN cashloan.xj_transfer t ON t.user_id = a.user_id AND a.id = t.apply_id
                WHERE a.audit_time >= str_date
                  AND a.audit_time < end_date
                  AND a.is_effect=1
               GROUP BY DATE_FORMAT(a.audit_time,'%Y-%m');
DECLARE cur_account4 CURSOR FOR 
                        SELECT o.creat_date,
                             --  o.count as quantity_loan_thmon,
                               (SELECT SUM(COUNT)
                                     FROM 
                                         (SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                                           COUNT(DISTINCT w.contract_id) AS COUNT
                                            FROM ccx_loan.b_payment_list w
                                           WHERE w.scene_id=100010
                                           AND w.pay_flag=30
                                             AND w.invalid_sign=1
                                           GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')   
                                          )i
                                      WHERE i.creat_date<=o.creat_date   
                                ) AS quantity_loan_total,
                            --    o.amount as amount_loan_thmonth,
                                (SELECT SUM(amount)
                                    FROM 
                                   (SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                                     SUM(w.payment_amount) AS amount
                                     FROM ccx_loan.b_payment_list w
                                       WHERE w.scene_id=100010
                                       AND w.pay_flag=30
                                         AND w.invalid_sign=1
                                    GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')   
                                   )X
                                   WHERE x.creat_date<=o.creat_date   
                                ) AS amount_loan_total
                         FROM
                       (
                           SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                                  COUNT(DISTINCT w.contract_id) AS COUNT,
                                  SUM(w.payment_amount) AS amount
                           FROM ccx_loan.b_payment_list w
                          WHERE w.scene_id=100010
                            AND w.pay_flag=30
                            AND w.invalid_sign=1
                          GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')
                       )o; 
DECLARE cur_account5 CURSOR FOR 
                  SELECT creat_date,
                         -- count as quantity_stock_thmon,
                         ( SELECT SUM(COUNT)
                           FROM 
                           (
                            SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                 
                            COUNT(DISTINCT w.contract_id)-COUNT(DISTINCT CASE WHEN dict.item_name ='合同结束' THEN w.contract_id END) COUNT
                 
                            FROM ccx_loan.b_payment_list w 
                            JOIN ccx_loan.b_repayment_plan r ON w.contract_id=r.contract_id 
                            JOIN ccx_loan.b_loan_application ap  ON ap.contract_id=w.contract_id
                            JOIN ccx_loan.b_contract c ON c.contract_id=w.contract_id
                            JOIN ccx_loan.sys_dictionary_item dict ON dict.item_code =c.contract_status
               
                          WHERE  w.creat_date >= str_date 
                            AND  w.creat_date < end_date
                             AND w.scene_id='100010'  
                             AND w.pay_flag=30 
                             AND r.invalid_sign=1
                  -- and ap.installmentCount in (1,2)
                  -- and w.contract_id in (34968,34982,34954)
 
                          GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')
                             )i
                           WHERE i.creat_date<=o.creat_date
                        ) AS quantity_stock_total,
                     --   o.amount,
                        ( SELECT SUM(amount)
                           FROM 
                           (
                            SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                                   SUM(r.capital)-IFNULL(SUM(CASE WHEN r.payment_flag IN (1,3) THEN r.capital END),0) amount
                 
                            FROM ccx_loan.b_payment_list w 
                            JOIN ccx_loan.b_repayment_plan r ON w.contract_id=r.contract_id 
                            JOIN ccx_loan.b_loan_application ap  ON ap.contract_id=w.contract_id
                            JOIN ccx_loan.b_contract c ON c.contract_id=w.contract_id
                            JOIN ccx_loan.sys_dictionary_item dict ON dict.item_code =c.contract_status
               
                          WHERE  w.creat_date >= str_date 
                            AND  w.creat_date < end_date
                             AND w.scene_id='100010'  
                             AND w.pay_flag=30 
                             AND r.invalid_sign=1
                  -- and ap.installmentCount in (1,2)
                  -- and w.contract_id in (34968,34982,34954)
 
                          GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')
                             )X
                           WHERE x.creat_date<=o.creat_date
                        ) AS amount_stock_total
                        FROM
                        (
                         SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                 
                                COUNT(DISTINCT w.contract_id)-COUNT(DISTINCT CASE WHEN dict.item_name ='合同结束' THEN w.contract_id END) COUNT,
                                SUM(r.capital)-IFNULL(SUM(CASE WHEN r.payment_flag IN (1,3) THEN r.capital END),0) amount
                 
                         FROM ccx_loan.b_payment_list w 
                         JOIN ccx_loan.b_repayment_plan r ON w.contract_id=r.contract_id 
                         JOIN ccx_loan.b_loan_application ap  ON ap.contract_id=w.contract_id
                         join ccx_loan.b_contract c on c.contract_id=w.contract_id
                         JOIN ccx_loan.sys_dictionary_item dict ON dict.item_code =c.contract_status
               
                       WHERE  w.creat_date >= str_date 
                         AND  w.creat_date < end_date
                          AND w.scene_id='100010'  
                          AND w.pay_flag=30 
                          AND r.invalid_sign=1
                  -- and ap.installmentCount in (1,2)
                  -- and w.contract_id in (34968,34982,34954)
 
                   GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')
                       )o;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN cur_account1;
	REPEAT
		FETCH cur_account1 INTO 
                                              vcreat_date1,
                                              vscene_id1,
                                              vquantity_loan_thmon,
                                              vamount_loan_thmon,
                                              vquantity_repayment_complete,
                                              vamount_repayment_complete,
                                              vquantity_overdue_rate,
                                              vquantity_overdue_stock,
                                              vamount_overdue_rate,
                                              vamount_overdue_stock,
                                              vquantity_stock_thmon,
                                              vamount_stock_thmon,
                                              vquantity_M0,
                                              vquantity_M1,
                                              vquantity_M2,
                                              vquantity_M3,
                                              vquantity_M4,
                                              vquantity_M5,
                                              vquantity_M6,
                                              vquantity_overdue_stock_rate,
                                              vquantity_M0_rate,
                                              vquantity_M1_rate,
                                              vquantity_M2_rate,
                                              vquantity_M3_rate,
                                              vquantity_M4_rate,
                                              vquantity_M5_rate,
                                              vquantity_M6_rate,
                                              vamount_M0,
                                              vamount_M1,
                                              vamount_M2,
                                              vamount_M3,
                                              vamount_M4,
                                              vamount_M5,
                                              vamount_M6,
                                              vamount_overdue_stock_rate,
                                              vamount_M0_rate,
                                              vamount_M1_rate,
                                              vamount_M2_rate,
                                              vamount_M3_rate,
                                              vamount_M4_rate,
                                              vamount_M5_rate,
                                              vamount_M6_rate;
		IF NOT done THEN                                         
                  INSERT INTO project.auto_scene_stock (
                                              creat_date,
                                              scene_id,
                                              quantity_loan_thmon,
                                              amount_loan_thmon,
                                              quantity_repayment_complete,
                                              amount_repayment_complete,
                                              quantity_overdue_rate,
                                              quantity_overdue_stock,
                                              amount_overdue_rate,
                                              amount_overdue_stock,
                                              quantity_stock_thmon,
                                              amount_stock_thmon,
                                              quantity_M0,
                                              quantity_M1,
                                              quantity_M2,
                                              quantity_M3,
                                              quantity_M4,
                                              quantity_M5,
                                              quantity_M6,
                                              quantity_overdue_stock_rate,
                                              quantity_M0_rate,
                                              quantity_M1_rate,
                                              quantity_M2_rate,
                                              quantity_M3_rate,
                                              quantity_M4_rate,
                                              quantity_M5_rate,
                                              quantity_M6_rate,
                                              amount_M0,
                                              amount_M1,
                                              amount_M2,
                                              amount_M3,
                                              amount_M4,
                                              amount_M5,
                                              amount_M6,
                                              amount_overdue_stock_rate,
                                              amount_M0_rate,
                                              amount_M1_rate,
                                              amount_M2_rate,
                                              amount_M3_rate,
                                              amount_M4_rate,
                                              amount_M5_rate,
                                              amount_M6_rate
                              ) 
                         VALUES
                              ( 
                                              vcreat_date1,
                                              vscene_id1,
                                              vquantity_loan_thmon,
                                              vamount_loan_thmon,
                                              vquantity_repayment_complete,
                                              vamount_repayment_complete,
                                              vquantity_overdue_rate,
                                              vquantity_overdue_stock,
                                              vamount_overdue_rate,
                                              vamount_overdue_stock,
                                              vquantity_stock_thmon,
                                              vamount_stock_thmon,
                                              vquantity_M0,
                                              vquantity_M1,
                                              vquantity_M2,
                                              vquantity_M3,
                                              vquantity_M4,
                                              vquantity_M5,
                                              vquantity_M6,
                                              vquantity_overdue_stock_rate,
                                              vquantity_M0_rate,
                                              vquantity_M1_rate,
                                              vquantity_M2_rate,
                                              vquantity_M3_rate,
                                              vquantity_M4_rate,
                                              vquantity_M5_rate,
                                              vquantity_M6_rate,
                                              vamount_M0,
                                              vamount_M1,
                                              vamount_M2,
                                              vamount_M3,
                                              vamount_M4,
                                              vamount_M5,
                                              vamount_M6,
                                              vamount_overdue_stock_rate,
                                              vamount_M0_rate,
                                              vamount_M1_rate,
                                              vamount_M2_rate,
                                              vamount_M3_rate,
                                              vamount_M4_rate,
                                              vamount_M5_rate,
                                              vamount_M6_rate
                                         ) ;
		END IF;
 	  UNTIL done END REPEAT;
	  CLOSE cur_account1;
	SET done = 0;
	OPEN cur_account2; 
	              REPEAT
		                FETCH cur_account2 INTO 	vcreat_date2,vscene_id2,vquantity_reloan,vamount_reloan;
		            IF NOT done THEN
                    UPDATE project.auto_scene_stock SET quantity_reloan=vquantity_reloan
                                                
               WHERE creat_date=vcreat_date2
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
                AND scene_id=vscene_id2  ;
	END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account2;
	SET done = 0;
OPEN cur_account2;
	            REPEAT
	               	FETCH cur_account2 INTO 	vcreat_date2,vscene_id2,vquantity_reloan,vamount_reloan;
		          IF NOT done THEN
              UPDATE project.auto_scene_stock SET amount_reloan=vamount_reloan
                                                
            WHERE creat_date=vcreat_date2
              AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
              AND scene_id=vscene_id2  ;
	END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account2;
SET done = 0;
	OPEN cur_account3;
	          REPEAT
	            	FETCH cur_account3 INTO 	vcreat_date3,vquantity_audit,vquantity_passed,vpassed_rate;
	         	IF NOT done THEN
          UPDATE project.auto_scene_stock SET quantity_audit=vquantity_audit
                                                
           WHERE creat_date=vcreat_date3
             AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d');
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account3;
SET done = 0;
	OPEN cur_account3;
	         REPEAT
	               	FETCH cur_account3 INTO 	vcreat_date3,vquantity_audit,vquantity_passed,vpassed_rate;
		       IF NOT done THEN
                  UPDATE project.auto_scene_stock SET quantity_passed=vquantity_passed
                                                
               WHERE creat_date=vcreat_date3
                 AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d');
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account3;
SET done = 0;
	OPEN cur_account3;
	             REPEAT
		                 FETCH cur_account3 INTO 	vcreat_date3,vquantity_audit,vquantity_passed,vpassed_rate;
	           	IF NOT done THEN
                     UPDATE project.auto_scene_stock SET passed_rate=vpassed_rate
                                                
              WHERE creat_date=vcreat_date3
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d');
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account3;
SET done = 0;
	OPEN cur_account4;
	             REPEAT
		                 FETCH cur_account4 INTO 	vcreat_date4,vquantity_loan_total,vamount_loan_total;
	           	IF NOT done THEN
                     UPDATE project.auto_scene_stock SET quantity_loan_total=vquantity_loan_total
                                                
              WHERE creat_date=vcreat_date4
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d');
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account4;
SET done = 0;
	OPEN cur_account4;
	             REPEAT
		                 FETCH cur_account4 INTO 	vcreat_date4,vquantity_loan_total,vamount_loan_total;
	           	IF NOT done THEN
                     UPDATE project.auto_scene_stock SET amount_loan_total=vamount_loan_total
                                                
              WHERE creat_date=vcreat_date4
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d');
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account4;
SET done = 0;
	OPEN cur_account5;
	             REPEAT
		                 FETCH cur_account5 INTO 	vcreat_date5,vquantity_stock_total,vamount_stock_total;
	           	IF NOT done THEN
                     UPDATE project.auto_scene_stock SET quantity_stock_total=vquantity_stock_total
                                                
              WHERE creat_date=vcreat_date5
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d');
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account5;
SET done = 0;
	OPEN cur_account5;
	             REPEAT
		                 FETCH cur_account5 INTO 	vcreat_date5,vquantity_stock_total,vamount_stock_total;
	           	IF NOT done THEN
                     UPDATE project.auto_scene_stock SET amount_stock_total=vamount_stock_total
                                                
              WHERE creat_date=vcreat_date5
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d');
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account5;
END */$$
DELIMITER ;

/* Procedure structure for procedure `auto_scene_stock_sc` */

/*!50003 DROP PROCEDURE IF EXISTS  `auto_scene_stock_sc` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `auto_scene_stock_sc`(IN id_scene INT )
BEGIN
	DECLARE vcreat_date1 VARCHAR(20);
	DECLARE vcreat_date2 VARCHAR(20);
	DECLARE vcreat_date3 VARCHAR(20);
	DECLARE vcreat_date4 VARCHAR(20);
	DECLARE vcreat_date5 VARCHAR(20);
  DECLARE vscene_id1 BIGINT(15);
  DECLARE vscene_id2 BIGINT(15);
  DECLARE vscene_id3 BIGINT(15);
  DECLARE vscene_id4 BIGINT(15);
  DECLARE vscene_id5 BIGINT(15);
  DECLARE vquantity_loan_thmon BIGINT(15) DEFAULT NULL;
  DECLARE vamount_loan_thmon DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_repayment_complete BIGINT(15) DEFAULT NULL;
  DECLARE vamount_repayment_complete DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_overdue_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_overdue_stock BIGINT(15) DEFAULT NULL;
  DECLARE vamount_overdue_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_overdue_stock DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_stock_thmon BIGINT(15) DEFAULT NULL;
  DECLARE vamount_stock_thmon DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_M0 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M1 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M2 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M3 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M4 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M5 BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_M6 BIGINT(15) DEFAULT NULL;
  
  DECLARE vquantity_overdue_stock_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M0_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M1_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M2_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M3_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M4_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M5_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_M6_rate VARCHAR(20) DEFAULT NULL;
  
  DECLARE vamount_M0 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M1 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M2 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M3 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M4 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M5 DECIMAL(20,2) DEFAULT NULL;
  DECLARE vamount_M6 DECIMAL(20,2) DEFAULT NULL;
  
  DECLARE vamount_overdue_stock_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M0_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M1_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M2_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M3_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M4_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M5_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vamount_M6_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_reloan BIGINT(15) DEFAULT NULL;
  DECLARE vamount_reloan DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_audit BIGINT(15) DEFAULT NULL;
  DECLARE vquantity_passed BIGINT(15) DEFAULT NULL;
  DECLARE vpassed_rate VARCHAR(20) DEFAULT NULL;
  DECLARE vquantity_loan_total BIGINT(15) DEFAULT NULL;
  DECLARE vamount_loan_total DECIMAL(20,2) DEFAULT NULL;
  DECLARE vquantity_stock_total BIGINT(15) DEFAULT NULL;
  DECLARE vamount_stock_total DECIMAL(20,2) DEFAULT NULL;
    -- 遍历数据结束标志
  DECLARE done INT DEFAULT FALSE;
	DECLARE cur_account1 CURSOR FOR 
	             -- -------------------------------------------------------------当月放款户数，金额
SELECT  
        DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
        w.scene_id,
         -- --------（此处不能用w.payment_amount,否则二期重复）
       COUNT(DISTINCT w.contract_id) quantity_loan_thmon,
       SUM(r.capital) amount_loan_thmon,
       
       COUNT(DISTINCT CASE WHEN dict.item_name ='合同结束' THEN w.contract_id END) quantity_repayment_complete,
       IFNULL(SUM(CASE WHEN r.payment_flag IN (1,3) THEN r.capital END),0) amount_repayment_complete,
       CONCAT(LEFT(COUNT(DISTINCT CASE WHEN r.term=1 AND r.payment_flag =2 THEN w.contract_id END)/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_overdue_rate,
       COUNT(DISTINCT CASE WHEN r.payment_flag =2 THEN w.contract_id END) quantity_overdue_stock,
       CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.term=1 AND r.payment_flag =2 THEN r.capital END),0)/SUM(r.capital)*100,5),'%') amount_overdue_rate,
       IFNULL(SUM(CASE WHEN r.payment_flag =2 THEN r.capital END),0) amount_overdue_stock,    
       COUNT(DISTINCT w.contract_id)-COUNT(DISTINCT CASE WHEN dict.item_name ='合同结束' THEN w.contract_id END) quantity_stock_thmon,
       SUM(r.capital)-IFNULL(SUM(CASE WHEN r.payment_flag IN (1,3) THEN r.capital END),0) amount_stock_thmon,
     --  concat(left((count(DISTINCT w.contract_id)- count(DISTINCT case when r.term=1 and r.payment_flag =1 then w.contract_id end))/count(DISTINCT w.contract_id)*100,5),'%') 首逾率,
 --  count(DISTINCT w.contract_id)-count(DISTINCT case when r.term=ap.installmentCount and r.payment_flag in (1,3) then w.contract_id end) 在库件数,
    --   sum(r.capital)-ifnull(sum(case when r.term=ap.installmentCount and r.payment_flag in (1,3) then r.capital end),0) 在库金额,
  COUNT(DISTINCT CASE WHEN  dict.item_name <>'合同结束' THEN w.contract_id END) 
- COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=0 THEN w.contract_id END )quantity_M0,
 COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=0 THEN w.contract_id END )
-COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=31 THEN w.contract_id END )quantity_M1,
 COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=31 THEN w.contract_id END )
-COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=61 THEN w.contract_id END ) quantity_M2,
 COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=61  THEN w.contract_id END )
-COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=91  THEN w.contract_id END ) quantity_M3,
 COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=91 THEN w.contract_id END )
-COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=121 AND 150 THEN w.contract_id END ) quantity_M4, 
 COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=121 THEN w.contract_id END ) 
-COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=151 THEN w.contract_id END ) quantity_M5,
 COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=151 THEN w.contract_id END ) quantity_M6 , 
     --  count(DISTINCT case when r.term=1 and  r.payment_flag =2 then w.contract_id end) 首逾件数,
       CONCAT(LEFT(COUNT(DISTINCT CASE WHEN r.payment_flag =2 THEN w.contract_id END)/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_overdue_stock_rate,
       CONCAT(LEFT((COUNT(DISTINCT CASE WHEN  dict.item_name <>'合同结束' THEN w.contract_id END) 
       - COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=0 THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M0_rate,
        CONCAT(LEFT((COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=0 THEN w.contract_id END )
       -COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=31 THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M1_rate,
        CONCAT(LEFT(  (COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=31 THEN w.contract_id END )
       -COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=61 THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M2_rate,
       CONCAT(LEFT(  ( COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=61  THEN w.contract_id END )
       -COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=91  THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M3_rate,
       CONCAT(LEFT(  (COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=91 THEN w.contract_id END )
       -COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=121 AND 150 THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M4_rate, 
       CONCAT(LEFT(  (COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=121 THEN w.contract_id END ) 
       -COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=151 THEN w.contract_id END ))/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M5_rate,
        CONCAT(LEFT(  COUNT(DISTINCT CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >=151 THEN w.contract_id END )/COUNT(DISTINCT w.contract_id)*100,5),'%') quantity_M6_rate ,
      IFNULL(SUM(CASE WHEN r.payment_flag=0 THEN r.capital END),0) amount_M0,
      IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 0 AND 30 THEN r.capital END ),0) amount_M1,
      IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 31 AND 60 THEN r.capital END ),0) amount_M2,
      IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 61 AND 90 THEN r.capital END ),0) amount_M3,
      IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 91 AND 120 THEN r.capital END ),0) amount_M4, 
      IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 121 AND 150 THEN r.capital END ),0) amount_M5,
      IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >150 THEN r.capital END ),0) amount_M6,
    --   sum(case when r.term=1 and r.payment_flag =2 then r.capital end) 首逾金额,
      CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 THEN r.capital END),0)/SUM(r.capital)*100,5),'%') amount_overdue_stock_rate,
      CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag=0 THEN r.capital END),0)/SUM(r.capital)*100,5),'%') amount_M0_rate,
      CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 0 AND 30 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M1_rate,
      CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 31 AND 60 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M2_rate,
      CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 61 AND 90 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M3_rate,
      CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 91 AND 120 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M4_rate, 
      CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) BETWEEN 121 AND 150 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M5_rate,
      CONCAT(LEFT(IFNULL(SUM(CASE WHEN r.payment_flag =2 AND DATEDIFF(CURDATE(),r.due_date) >150 THEN r.capital END ),0)/SUM(r.capital)*100,5),'%') amount_M6_rate
     
    
FROM ccx_loan.b_payment_list w 
JOIN ccx_loan.b_repayment_plan r ON w.contract_id=r.contract_id 
JOIN ccx_loan.b_loan_application ap  ON ap.contract_id=w.contract_id
JOIN ccx_loan.b_contract c ON w.contract_id=c.contract_id
JOIN ccx_loan.sys_dictionary_item dict ON dict.item_code =c.contract_status
JOIN ccx_loan.b_scene sc ON sc.scene_id=w.scene_id 
WHERE  w.creat_date >='2016-09-01' 
 -- and  w.creat_date <'2017-07-27'
  AND sc.scene_id =id_scene
AND w.pay_flag=30 
AND r.invalid_sign=1
GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')
ORDER BY DATE_FORMAT(w.creat_date,'%Y-%m');
    DECLARE cur_account2 CURSOR FOR 
            SELECT DATE_FORMAT(m.creat_date,'%Y-%m') creat_date,
                   m.scene_id,
                   COUNT(m.contract_id) quantity_reloan,
                  SUM(m.payment_amount) amount_reloan
             FROM
                   (
                     SELECT ap.scene_custid,ap.contract_id,ap.application_date,w.creat_date,w.payment_amount,w.scene_id
                     FROM ccx_loan.b_loan_application ap 
                     JOIN ccx_loan.b_payment_list w ON w.contract_id=ap.contract_id 
                    WHERE ap.scene_id =id_scene
                      AND ap.application_status<>200518
                      AND w.pay_flag=30
                   )m
                LEFT JOIN 
                 (
                    SELECT ap2.scene_custid,ap2.contract_id,ap2.application_date
                     FROM
                     (
                       SELECT ap1.scene_custid ,MIN(ap1.application_date) AS application_date
                         FROM ccx_loan.b_loan_application ap1 
                        WHERE ap1.scene_id =id_scene
                          AND ap1.application_status<>200518
                     GROUP BY ap1.scene_custid
                       )ap3
                          JOIN ccx_loan.b_loan_application ap2 ON ap3.scene_custid=ap2.scene_custid AND ap3.application_date = ap2.application_date
     
                 )n ON m.scene_custid=n.scene_custid
                 WHERE m.application_date > n.application_date
               GROUP BY DATE_FORMAT(m.creat_date,'%Y-%m')
               ORDER BY creat_date;
DECLARE cur_account3 CURSOR FOR 
               SELECT DATE_FORMAT(ap.application_date,'%Y-%m') audit_date,
                      ap.scene_id,
                      COUNT(*) quantity_audit,
                      COUNT(CASE WHEN ap.application_status <>200504 THEN 1 END) quantity_passed,
                      CONCAT(LEFT(COUNT(CASE WHEN ap.application_status <>200504 THEN 1 END)/COUNT(*)*100,5),'%') passed_rate
       
                FROM ccx_loan.b_loan_application ap 
                JOIN ccx_loan.b_scene sc ON sc.scene_id=ap.scene_id 
         WHERE  ap.scene_id =id_scene
               GROUP BY DATE_FORMAT(ap.application_date,'%Y-%m')
               ORDER BY DATE_FORMAT(ap.application_date,'%Y-%m');
DECLARE cur_account4 CURSOR FOR 
                        SELECT o.creat_date,
                               o.scene_id,
                             --  o.count as quantity_loan_thmon,
                               (SELECT SUM(COUNT)
                                     FROM 
                                         (SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                                           COUNT(DISTINCT w.contract_id) AS COUNT
                                            FROM ccx_loan.b_payment_list w
                                           WHERE w.scene_id =id_scene
                                           AND w.pay_flag=30
                                             AND w.invalid_sign=1
                                           GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')   
                                          )i
                                      WHERE i.creat_date<=o.creat_date   
                                ) AS quantity_loan_total,
                            --    o.amount as amount_loan_thmonth,
                                (SELECT SUM(amount)
                                    FROM 
                                   (SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                                     SUM(w.payment_amount) AS amount
                                     FROM ccx_loan.b_payment_list w
                                       WHERE w.scene_id =id_scene
                                       AND w.pay_flag=30
                                         AND w.invalid_sign=1
                                    GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')   
                                   )X
                                   WHERE x.creat_date<=o.creat_date   
                                ) AS amount_loan_total
                         FROM
                       (
                           SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                                  w.scene_id,
                                  COUNT(DISTINCT w.contract_id) AS COUNT,
                                  SUM(w.payment_amount) AS amount
                           FROM ccx_loan.b_payment_list w
                          WHERE w.scene_id =id_scene
                            AND w.pay_flag=30
                            AND w.invalid_sign=1
                          GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')
                       )o; 
DECLARE cur_account5 CURSOR FOR 
                  SELECT o.creat_date,
                         o.scene_id,
                         -- count as quantity_stock_thmon,
                         ( SELECT SUM(COUNT)
                           FROM 
                           (
                            SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                 
                            COUNT(DISTINCT w.contract_id)-COUNT(DISTINCT CASE WHEN dict.item_name ='合同结束' THEN w.contract_id END) COUNT
                 
                            FROM ccx_loan.b_payment_list w 
                            JOIN ccx_loan.b_repayment_plan r ON w.contract_id=r.contract_id 
                            JOIN ccx_loan.b_loan_application ap  ON ap.contract_id=w.contract_id
                            JOIN ccx_loan.b_contract c ON c.contract_id=w.contract_id
                            JOIN ccx_loan.sys_dictionary_item dict ON dict.item_code =c.contract_status
               
                          WHERE   w.scene_id=id_scene  
                             AND w.pay_flag=30 
                             AND r.invalid_sign=1
                  -- and ap.installmentCount in (1,2)
                  -- and w.contract_id in (34968,34982,34954)
 
                          GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')
                             )i
                           WHERE i.creat_date<=o.creat_date
                        ) AS quantity_stock_total,
                     --   o.amount,
                        ( SELECT SUM(amount)
                           FROM 
                           (
                            SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                                   SUM(r.capital)-IFNULL(SUM(CASE WHEN r.payment_flag IN (1,3) THEN r.capital END),0) amount
                 
                            FROM ccx_loan.b_payment_list w 
                            JOIN ccx_loan.b_repayment_plan r ON w.contract_id=r.contract_id 
                            JOIN ccx_loan.b_loan_application ap  ON ap.contract_id=w.contract_id
                            JOIN ccx_loan.b_contract c ON c.contract_id=w.contract_id
                            JOIN ccx_loan.sys_dictionary_item dict ON dict.item_code =c.contract_status
               
                          WHERE  w.scene_id=id_scene  
                             AND w.pay_flag=30 
                             AND r.invalid_sign=1
                  -- and ap.installmentCount in (1,2)
                  -- and w.contract_id in (34968,34982,34954)
 
                          GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')
                             )X
                           WHERE x.creat_date<=o.creat_date
                        ) AS amount_stock_total
                        FROM
                        (
                         SELECT DATE_FORMAT(w.creat_date,'%Y-%m') creat_date,
                                w.scene_id,
                 
                                COUNT(DISTINCT w.contract_id)-COUNT(DISTINCT CASE WHEN dict.item_name ='合同结束' THEN w.contract_id END) COUNT,
                                SUM(r.capital)-IFNULL(SUM(CASE WHEN r.payment_flag IN (1,3) THEN r.capital END),0) amount
                 
                         FROM ccx_loan.b_payment_list w 
                         JOIN ccx_loan.b_repayment_plan r ON w.contract_id=r.contract_id 
                         JOIN ccx_loan.b_loan_application ap  ON ap.contract_id=w.contract_id
                         JOIN ccx_loan.b_contract c ON c.contract_id=w.contract_id
                         JOIN ccx_loan.sys_dictionary_item dict ON dict.item_code =c.contract_status
               
                       WHERE   w.scene_id=id_scene 
                          AND w.pay_flag=30 
                          AND r.invalid_sign=1
                  -- and ap.installmentCount in (1,2)
                  -- and w.contract_id in (34968,34982,34954)
 
                   GROUP BY DATE_FORMAT(w.creat_date,'%Y-%m')
                       )o;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN cur_account1;
	REPEAT
		FETCH cur_account1 INTO 
                                              vcreat_date1,
                                              vscene_id1,
                                              vquantity_loan_thmon,
                                              vamount_loan_thmon,
                                              vquantity_repayment_complete,
                                              vamount_repayment_complete,
                                              vquantity_overdue_rate,
                                              vquantity_overdue_stock,
                                              vamount_overdue_rate,
                                              vamount_overdue_stock,
                                              vquantity_stock_thmon,
                                              vamount_stock_thmon,
                                              vquantity_M0,
                                              vquantity_M1,
                                              vquantity_M2,
                                              vquantity_M3,
                                              vquantity_M4,
                                              vquantity_M5,
                                              vquantity_M6,
                                              vquantity_overdue_stock_rate,
                                              vquantity_M0_rate,
                                              vquantity_M1_rate,
                                              vquantity_M2_rate,
                                              vquantity_M3_rate,
                                              vquantity_M4_rate,
                                              vquantity_M5_rate,
                                              vquantity_M6_rate,
                                              vamount_M0,
                                              vamount_M1,
                                              vamount_M2,
                                              vamount_M3,
                                              vamount_M4,
                                              vamount_M5,
                                              vamount_M6,
                                              vamount_overdue_stock_rate,
                                              vamount_M0_rate,
                                              vamount_M1_rate,
                                              vamount_M2_rate,
                                              vamount_M3_rate,
                                              vamount_M4_rate,
                                              vamount_M5_rate,
                                              vamount_M6_rate;
		IF NOT done THEN                                         
                  INSERT INTO project.auto_scene_stock_sc (
                                              creat_date,
                                              scene_id,
                                              quantity_loan_thmon,
                                              amount_loan_thmon,
                                              quantity_repayment_complete,
                                              amount_repayment_complete,
                                              quantity_overdue_rate,
                                              quantity_overdue_stock,
                                              amount_overdue_rate,
                                              amount_overdue_stock,
                                              quantity_stock_thmon,
                                              amount_stock_thmon,
                                              quantity_M0,
                                              quantity_M1,
                                              quantity_M2,
                                              quantity_M3,
                                              quantity_M4,
                                              quantity_M5,
                                              quantity_M6,
                                              quantity_overdue_stock_rate,
                                              quantity_M0_rate,
                                              quantity_M1_rate,
                                              quantity_M2_rate,
                                              quantity_M3_rate,
                                              quantity_M4_rate,
                                              quantity_M5_rate,
                                              quantity_M6_rate,
                                              amount_M0,
                                              amount_M1,
                                              amount_M2,
                                              amount_M3,
                                              amount_M4,
                                              amount_M5,
                                              amount_M6,
                                              amount_overdue_stock_rate,
                                              amount_M0_rate,
                                              amount_M1_rate,
                                              amount_M2_rate,
                                              amount_M3_rate,
                                              amount_M4_rate,
                                              amount_M5_rate,
                                              amount_M6_rate
                              ) 
                         VALUES
                              ( 
                                              vcreat_date1,
                                              vscene_id1,
                                              vquantity_loan_thmon,
                                              vamount_loan_thmon,
                                              vquantity_repayment_complete,
                                              vamount_repayment_complete,
                                              vquantity_overdue_rate,
                                              vquantity_overdue_stock,
                                              vamount_overdue_rate,
                                              vamount_overdue_stock,
                                              vquantity_stock_thmon,
                                              vamount_stock_thmon,
                                              vquantity_M0,
                                              vquantity_M1,
                                              vquantity_M2,
                                              vquantity_M3,
                                              vquantity_M4,
                                              vquantity_M5,
                                              vquantity_M6,
                                              vquantity_overdue_stock_rate,
                                              vquantity_M0_rate,
                                              vquantity_M1_rate,
                                              vquantity_M2_rate,
                                              vquantity_M3_rate,
                                              vquantity_M4_rate,
                                              vquantity_M5_rate,
                                              vquantity_M6_rate,
                                              vamount_M0,
                                              vamount_M1,
                                              vamount_M2,
                                              vamount_M3,
                                              vamount_M4,
                                              vamount_M5,
                                              vamount_M6,
                                              vamount_overdue_stock_rate,
                                              vamount_M0_rate,
                                              vamount_M1_rate,
                                              vamount_M2_rate,
                                              vamount_M3_rate,
                                              vamount_M4_rate,
                                              vamount_M5_rate,
                                              vamount_M6_rate
                                         ) ;
		END IF;
 	  UNTIL done END REPEAT;
	  CLOSE cur_account1;
	SET done = 0;
	OPEN cur_account2; 
	              REPEAT
		                FETCH cur_account2 INTO 	vcreat_date2,vscene_id2,vquantity_reloan,vamount_reloan;
		            IF NOT done THEN
                    UPDATE project.auto_scene_stock_sc SET quantity_reloan=vquantity_reloan
                                                
               WHERE creat_date=vcreat_date2
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
                AND scene_id=vscene_id2  ;
	END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account2;
	SET done = 0;
OPEN cur_account2;
	            REPEAT
	               	FETCH cur_account2 INTO 	vcreat_date2,vscene_id2,vquantity_reloan,vamount_reloan;
		          IF NOT done THEN
              UPDATE project.auto_scene_stock_sc SET amount_reloan=vamount_reloan
                                                
            WHERE creat_date=vcreat_date2
              AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
              AND scene_id=vscene_id2  ;
	END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account2;
SET done = 0;
	OPEN cur_account3;
	          REPEAT
	            	FETCH cur_account3 INTO 	vcreat_date3,vscene_id3,vquantity_audit,vquantity_passed,vpassed_rate;
	         	IF NOT done THEN
          UPDATE project.auto_scene_stock_sc SET quantity_audit=vquantity_audit
                                                
           WHERE creat_date=vcreat_date3
             AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
             AND scene_id=vscene_id3 ;
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account3;
SET done = 0;
	OPEN cur_account3;
	         REPEAT
	               	FETCH cur_account3 INTO 	vcreat_date3,vscene_id3,vquantity_audit,vquantity_passed,vpassed_rate;
		       IF NOT done THEN
                  UPDATE project.auto_scene_stock_sc SET quantity_passed=vquantity_passed
                                                
               WHERE creat_date=vcreat_date3
                 AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
                 AND scene_id=vscene_id3;
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account3;
SET done = 0;
	OPEN cur_account3;
	             REPEAT
		                 FETCH cur_account3 INTO 	vcreat_date3,vscene_id3,vquantity_audit,vquantity_passed,vpassed_rate;
	           	IF NOT done THEN
                     UPDATE project.auto_scene_stock_sc SET passed_rate=vpassed_rate
                                                
              WHERE creat_date=vcreat_date3
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
                AND scene_id=vscene_id3;
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account3;
SET done = 0;
	OPEN cur_account4;
	             REPEAT
		                 FETCH cur_account4 INTO 	vcreat_date4,vscene_id4,vquantity_loan_total,vamount_loan_total;
	           	IF NOT done THEN
                     UPDATE project.auto_scene_stock_sc SET quantity_loan_total=vquantity_loan_total
                                                
              WHERE creat_date=vcreat_date4
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
                AND scene_id=vscene_id4;
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account4;
SET done = 0;
	OPEN cur_account4;
	             REPEAT
		                 FETCH cur_account4 INTO 	vcreat_date4,vscene_id4,vquantity_loan_total,vamount_loan_total;
	           	IF NOT done THEN
                     UPDATE project.auto_scene_stock_sc SET amount_loan_total=vamount_loan_total
                                                
              WHERE creat_date=vcreat_date4
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
                AND scene_id=vscene_id4;
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account4;
SET done = 0;
	OPEN cur_account5;
	             REPEAT
		                 FETCH cur_account5 INTO 	vcreat_date5,vscene_id5,vquantity_stock_total,vamount_stock_total;
	           	IF NOT done THEN
                     UPDATE project.auto_scene_stock_sc SET quantity_stock_total=vquantity_stock_total
                                                
              WHERE creat_date=vcreat_date5
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
                AND scene_id=vscene_id5;
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account5;
SET done = 0;
	OPEN cur_account5;
	             REPEAT
		                 FETCH cur_account5 INTO 	vcreat_date5,vscene_id5,vquantity_stock_total,vamount_stock_total;
	           	IF NOT done THEN
                     UPDATE project.auto_scene_stock_sc SET amount_stock_total=vamount_stock_total
                                                
              WHERE creat_date=vcreat_date5
                AND DATE_FORMAT(creation_time,'%Y-%m-%d')=DATE_FORMAT(CURDATE(),'%Y-%m-%d')
                AND scene_id=vscene_id5;
		END IF;
 	UNTIL done END REPEAT;
	CLOSE cur_account5;
END */$$
DELIMITER ;

/* Procedure structure for procedure `auto_time_reloan` */

/*!50003 DROP PROCEDURE IF EXISTS  `auto_time_reloan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`db_rw_it2`@`%` PROCEDURE `auto_time_reloan`()
BEGIN
  DECLARE vid_cust BIGINT(15);
  DECLARE vid_contract BIGINT(15);
  DECLARE vrownum BIGINT(15);
  
    -- 遍历数据结束标志
  DECLARE done INT DEFAULT FALSE;
	DECLARE cur_account CURSOR FOR 
	                                     SELECT m.scene_custid AS id_cust,m.contract_id AS id_contract,m.rownum
	                                     FROM
	                                     ( 
	                                                    SELECT a.scene_custid ,a.contract_id ,b.rownum AS rownum
  	                                                     FROM 
   	                                                  (
    	                                                     SELECT ap.scene_custid,w.contract_id
    	                                                      FROM ccx_loan.b_payment_list w 
    	                                                     JOIN ccx_loan.b_loan_application ap ON w.contract_id=ap.contract_id
    	                                                     WHERE w.scene_id=100010
    	                                                     ORDER BY ap.scene_custid
    	                                                   )a
  	                                            INNER JOIN 
  	                                              (
   	                                                 SELECT a.scene_custid,a.contract_id,CASE WHEN @mid=a.scene_custid THEN @row:=@row+1 ELSE @row:=1 END rownum,@mid:=a.scene_custid 
   	                                                    FROM 
    	                                                   (SELECT ap.scene_custid,w.contract_id
   	                                                     FROM ccx_loan.b_payment_list w 
   	                                                     JOIN ccx_loan.b_loan_application ap ON w.contract_id=ap.contract_id
   	                                                    WHERE w.scene_id=100010
   	                                                 ORDER BY ap.scene_custid
   	                                                    )a
   	                                               ORDER BY a.scene_custid,a.contract_id
  	                                               ) b ON b.scene_custid=a.scene_custid AND b.contract_id=a.contract_id
	                                        )m;
	
   
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN cur_account;
	REPEAT
		FETCH cur_account INTO 
                                           vid_cust,
                                           vid_contract,
                                           vrownum;
		IF NOT done THEN                                         
                  INSERT INTO project.auto_time_reloan
                                   (
                                           id_cust,
                                           id_contract,
                                           rownum
                                   ) 
                         VALUES
                                ( 
                                           vid_cust,
                                           vid_contract,
                                           vrownum
                                 ) ;
		END IF;
 	  UNTIL done END REPEAT;
	  CLOSE cur_account;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
