/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : tg_vote

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-12-03 08:59:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tg_fans_fans`
-- ----------------------------
DROP TABLE IF EXISTS `tg_fans_fans`;
CREATE TABLE `tg_fans_fans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `open_id` varchar(255) DEFAULT NULL,
  `fans_name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `register_time` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_fans_fans
-- ----------------------------
INSERT INTO `tg_fans_fans` VALUES ('3', 'omCX9s4DUx8FcytRpyt4e791noJM', 'yaoyao', '17703468242', '2016-10-31 16:04:21', null, null);
INSERT INTO `tg_fans_fans` VALUES ('4', 'omCX9s4DUx8FcytRsdfpyt4e791noJM', '田立龙', '15735801141', '2016-11-08 18:12:22', null, null);
INSERT INTO `tg_fans_fans` VALUES ('6', 'oOsrtvmjenbIRM--rwAT_MuUMYFI', '田立龙', '15735801141', '2016-11-08 18:18:14', null, null);
INSERT INTO `tg_fans_fans` VALUES ('7', 'oOsrtvl11r24TKnP7IUrqSExN2Bs', '任勇', '18935423789', '2016-11-08 18:22:33', null, null);
INSERT INTO `tg_fans_fans` VALUES ('10', 'oOsrtvgOa9PpFPqYZmtz4AvC-PuI', '樊俊可', '13080366414', '2016-11-08 18:44:20', null, null);
INSERT INTO `tg_fans_fans` VALUES ('11', 'oOsrtvtyn8msdMqEz-NEwc7wiafE', '', '', '2016-11-08 18:44:23', null, null);
INSERT INTO `tg_fans_fans` VALUES ('12', 'oOsrtvoIZX66Ylz43ka3un2CUn0k', '姚姚～', '17703468242', '2016-11-08 18:44:31', null, null);
INSERT INTO `tg_fans_fans` VALUES ('13', 'oOsrtvnEyAswl9T-s68AK6cRTocM', '', '', '2016-11-08 18:44:46', null, null);
INSERT INTO `tg_fans_fans` VALUES ('14', 'oOsrtvp0qAICRpfK20ISxtx-8VFc', '耿生年', '15735807046', '2016-11-08 18:44:58', null, null);
INSERT INTO `tg_fans_fans` VALUES ('15', '', '', '', '2016-11-08 18:45:05', null, null);
INSERT INTO `tg_fans_fans` VALUES ('16', 'oOsrtvhBVP-bXx3TIjG3xn6NbCHI', '', '', '2016-11-08 18:45:41', null, null);
INSERT INTO `tg_fans_fans` VALUES ('17', 'oOsrtvhMsSXzN9ywzp_5sPeYqyjA', '', '', '2016-11-08 18:45:41', null, null);
INSERT INTO `tg_fans_fans` VALUES ('18', 'oOsrtvulVmOjQ0x9DbNVxhw2hhe0', '', '', '2016-11-08 18:45:45', null, null);
INSERT INTO `tg_fans_fans` VALUES ('19', 'oOsrtvs5JqIHHefp8NaoRzluxKEQ', '', '', '2016-11-08 18:45:52', null, null);
INSERT INTO `tg_fans_fans` VALUES ('20', 'oOsrtvohwKYM6UMxA50WVnbIlJ-k', '', '', '2016-11-08 18:46:00', null, null);
INSERT INTO `tg_fans_fans` VALUES ('21', 'oOsrtvl3LwIamX4s38vbc_sx8gIs', '', '', '2016-11-08 18:46:10', null, null);
INSERT INTO `tg_fans_fans` VALUES ('22', 'oOsrtvh41kx5PJIBtRQgp4lQKAOc', '', '', '2016-11-08 18:46:57', null, null);
INSERT INTO `tg_fans_fans` VALUES ('23', 'oOsrtviTW0UUMDn7YVbF2EjM79-Q', '', '', '2016-11-08 18:47:06', null, null);
INSERT INTO `tg_fans_fans` VALUES ('24', 'oOsrtvuTxb-RnAd8krY-sy_9Cyf8', '', '', '2016-11-08 18:47:22', null, null);
INSERT INTO `tg_fans_fans` VALUES ('25', 'oOsrtvjOE94TDl-tPPLvxOtJaIOQ', '', '', '2016-11-08 18:47:32', null, null);
INSERT INTO `tg_fans_fans` VALUES ('26', 'oOsrtvnoK2GPHwUHwVDmy5EVB3qA', '', '', '2016-11-08 18:47:34', null, null);
INSERT INTO `tg_fans_fans` VALUES ('27', 'oOsrtvv16IryuhPwluWX3aOsvJR4', '赵士琛', '13934204214', '2016-11-08 18:47:54', null, null);
INSERT INTO `tg_fans_fans` VALUES ('28', 'oOsrtvoefvo2DibiM31MgCKNtSBU', '', '', '2016-11-08 18:48:09', null, null);
INSERT INTO `tg_fans_fans` VALUES ('29', 'oOsrtviT6vXitzPYufXdAk30RqkM', '', '', '2016-11-08 18:48:13', null, null);
INSERT INTO `tg_fans_fans` VALUES ('30', 'oOsrtvilCSl5OKkEAhEGtzWrydHI', '', '', '2016-11-08 18:48:14', null, null);
INSERT INTO `tg_fans_fans` VALUES ('31', 'oOsrtvtjl2K1P469hWByoWjA7EyE', '', '', '2016-11-08 18:48:33', null, null);
INSERT INTO `tg_fans_fans` VALUES ('32', 'oOsrtvohwKYM6UMxA50WVnbIlJ-k', '李曦', '15735801636', '2016-11-08 18:49:17', null, null);
INSERT INTO `tg_fans_fans` VALUES ('33', 'oOsrtvilCSl5OKkEAhEGtzWrydHI', '樊晋阳', '15735806812', '2016-11-08 18:49:39', null, null);
INSERT INTO `tg_fans_fans` VALUES ('34', 'oOsrtvnV156wB1R2qDNzQe5fDN-4', '', '', '2016-11-08 18:49:57', null, null);
INSERT INTO `tg_fans_fans` VALUES ('35', 'oOsrtvuTiUX-kUG0zxaFtSZdYQ8s', '', '', '2016-11-08 18:49:57', null, null);
INSERT INTO `tg_fans_fans` VALUES ('36', 'oOsrtvtjl2K1P469hWByoWjA7EyE', '王胤杰', '15735801033', '2016-11-08 18:50:19', null, null);
INSERT INTO `tg_fans_fans` VALUES ('37', 'oOsrtvjrAJZ5giw3TGaLJrdKFX64', '王二小', '18335838888', '2016-11-08 18:53:04', null, null);

-- ----------------------------
-- Table structure for `tg_fans_player`
-- ----------------------------
DROP TABLE IF EXISTS `tg_fans_player`;
CREATE TABLE `tg_fans_player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(255) DEFAULT NULL,
  `head_img` varchar(255) DEFAULT NULL,
  `production_img` varchar(255) DEFAULT NULL,
  `production_introduction` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `personal_introduction` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_fans_player
-- ----------------------------
INSERT INTO `tg_fans_player` VALUES ('1', '姚姚', 'http://tp.epokj.com/weixin/web/tg_vote_front/img/dl_photo.png', 'http://tp.epokj.com/weixin/web/tg_vote_front/img/zuopin.png', '没有最好 ，只有更好', '110', '904381790@qq.com', '爱好ui，热爱生活');
INSERT INTO `tg_fans_player` VALUES ('2', '焦焦', 'http://tp.epokj.com/weixin/web/tg_vote_front/img/dl_photo.png', 'http://tp.epokj.com/weixin/web/tg_vote_front/img/zuopin.png', '没有最好 ，只有更好', '120', '904381790@qq.com', '爱好ui，热爱生活');
INSERT INTO `tg_fans_player` VALUES ('3', '田立龙', 'http://tp.epokj.com/weixin/web/tg_vote_back/Public/uploads/2016-11-08/5821a79403275.jpg', 'http://tp.epokj.com/weixin/web/tg_vote_back/Public/uploads/2016-11-08/5821a794087d2.jpg', '可爱的狗狗', '15735801141', '1085731692@qq.com', '测试');
INSERT INTO `tg_fans_player` VALUES ('4', '任勇', 'http://tp.epokj.com/weixin/web/tg_vote_back/Public/uploads/2016-11-08/5821a97a3745d.jpg', 'http://tp.epokj.com/weixin/web/tg_vote_back/Public/uploads/2016-11-08/5821a97a3a06e.JPG', '考虑尽快了解', '15735801124', '1085731692@qq.com', '123456');

-- ----------------------------
-- Table structure for `tg_organization_department`
-- ----------------------------
DROP TABLE IF EXISTS `tg_organization_department`;
CREATE TABLE `tg_organization_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '部门表',
  `number` varchar(11) DEFAULT NULL COMMENT '部门编号',
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tg_organization_department_self_fk` (`parent_id`) USING BTREE,
  CONSTRAINT `tg_organization_department_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `tg_organization_department` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tg_organization_department
-- ----------------------------
INSERT INTO `tg_organization_department` VALUES ('1', '01', '总经办', '总经办', null);
INSERT INTO `tg_organization_department` VALUES ('2', '02', '人力行政部', '', '1');
INSERT INTO `tg_organization_department` VALUES ('3', '03', '财务部', '', '1');
INSERT INTO `tg_organization_department` VALUES ('4', '04', '市场部', '', '1');
INSERT INTO `tg_organization_department` VALUES ('5', '05', '实训部', '', '1');
INSERT INTO `tg_organization_department` VALUES ('6', '06', '院校合作部', '', '4');
INSERT INTO `tg_organization_department` VALUES ('7', '07', '咨询部', '', '4');
INSERT INTO `tg_organization_department` VALUES ('8', '08', '地推部', '', '4');
INSERT INTO `tg_organization_department` VALUES ('9', '09', '实训督导部', '', '5');
INSERT INTO `tg_organization_department` VALUES ('10', '10', '讲师部', '', '5');
INSERT INTO `tg_organization_department` VALUES ('11', '11', '就业督导部', '', '5');

-- ----------------------------
-- Table structure for `tg_organization_employee`
-- ----------------------------
DROP TABLE IF EXISTS `tg_organization_employee`;
CREATE TABLE `tg_organization_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_number` varchar(255) DEFAULT NULL COMMENT '工号 入职年月',
  `name` varchar(255) NOT NULL,
  `hiredate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `position_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tg_position_employee_fk` (`position_id`) USING BTREE,
  KEY `tg_employee_user_fk` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tg_organization_employee
-- ----------------------------
INSERT INTO `tg_organization_employee` VALUES ('1', '2016101701001', '王斌', '2016-10-17', '0', '1', '2');
INSERT INTO `tg_organization_employee` VALUES ('2', '2016101702001', '史鹏', '2016-10-17', '0', '2', '3');
INSERT INTO `tg_organization_employee` VALUES ('3', '2016101703001', '兰小倩', '2016-10-17', '0', '4', '4');
INSERT INTO `tg_organization_employee` VALUES ('4', '2016101704001', '迟磊', '2016-10-17', '0', '6', '5');
INSERT INTO `tg_organization_employee` VALUES ('5', '2016101705001', '赵士琛', '2016-10-17', '0', '7', '6');
INSERT INTO `tg_organization_employee` VALUES ('6', '2016101706001', '常青', '2016-10-17', '0', '8', '7');
INSERT INTO `tg_organization_employee` VALUES ('7', '2016101710001', '范光磊', '2016-10-17', '0', '18', '8');
INSERT INTO `tg_organization_employee` VALUES ('10', '2016101711001', '高栋芳', '2016-10-17', '0', '13', '9');
INSERT INTO `tg_organization_employee` VALUES ('11', '2016101709001', '刘晶', '2016-10-17', '0', '11', '10');
INSERT INTO `tg_organization_employee` VALUES ('12', '2016101710002', '司健民', '2016-10-17', '1', '18', '11');

-- ----------------------------
-- Table structure for `tg_organization_position`
-- ----------------------------
DROP TABLE IF EXISTS `tg_organization_position`;
CREATE TABLE `tg_organization_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `duty` varchar(255) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `t_organization_department_position_fk` (`department_id`) USING BTREE,
  KEY `t_organization_position_self_fk` (`parent_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tg_organization_position
-- ----------------------------
INSERT INTO `tg_organization_position` VALUES ('1', '总经理', '', '1', '0', '1');
INSERT INTO `tg_organization_position` VALUES ('2', '人力资源经理', '', '2', '1', '2');
INSERT INTO `tg_organization_position` VALUES ('3', '人力资源员工', '', '2', '2', '3');
INSERT INTO `tg_organization_position` VALUES ('4', '财务经理', '', '3', '1', '5');
INSERT INTO `tg_organization_position` VALUES ('5', '财务专员', '', '3', '4', '6');
INSERT INTO `tg_organization_position` VALUES ('6', '市场经理', '', '4', '1', '7');
INSERT INTO `tg_organization_position` VALUES ('7', '实训经理', '', '5', '1', '8');
INSERT INTO `tg_organization_position` VALUES ('8', '院校合作经理', '', '6', '6', '9');
INSERT INTO `tg_organization_position` VALUES ('9', '咨询部经理', '', '7', '6', '10');
INSERT INTO `tg_organization_position` VALUES ('10', '地推经理', '', '8', '6', '11');
INSERT INTO `tg_organization_position` VALUES ('11', '实训督导经理', '', '9', '7', '12');
INSERT INTO `tg_organization_position` VALUES ('12', '讲师', '', '10', '7', '13');
INSERT INTO `tg_organization_position` VALUES ('13', '就业经理', '', '11', '7', '14');
INSERT INTO `tg_organization_position` VALUES ('14', '院校合作专员', '', '6', '8', '15');
INSERT INTO `tg_organization_position` VALUES ('15', '咨询专员', '', '7', '9', '16');
INSERT INTO `tg_organization_position` VALUES ('16', '地推专员', '', '8', '10', '17');
INSERT INTO `tg_organization_position` VALUES ('17', '实训督导专员', '', '9', '11', '18');
INSERT INTO `tg_organization_position` VALUES ('18', 'php讲师', '', '10', '12', '19');
INSERT INTO `tg_organization_position` VALUES ('19', '天猫讲师', '', '10', '12', '20');
INSERT INTO `tg_organization_position` VALUES ('20', '网络营销讲师', '', '10', '12', '21');
INSERT INTO `tg_organization_position` VALUES ('21', '就业专员', '', '11', '13', '22');

-- ----------------------------
-- Table structure for `tg_privilege_menu`
-- ----------------------------
DROP TABLE IF EXISTS `tg_privilege_menu`;
CREATE TABLE `tg_privilege_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `target_href` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_privilege_menu
-- ----------------------------
INSERT INTO `tg_privilege_menu` VALUES ('1', '首页', '', null);
INSERT INTO `tg_privilege_menu` VALUES ('2', '首页管理', '', '1');
INSERT INTO `tg_privilege_menu` VALUES ('3', '首页管理', 'Index/index', '2');
INSERT INTO `tg_privilege_menu` VALUES ('4', '系统管理', '', null);
INSERT INTO `tg_privilege_menu` VALUES ('5', '权限管理', '', '4');
INSERT INTO `tg_privilege_menu` VALUES ('6', '菜单管理', 'SysMenu/index', '5');
INSERT INTO `tg_privilege_menu` VALUES ('7', '角色管理', 'SysRole/index', '5');
INSERT INTO `tg_privilege_menu` VALUES ('8', '用户管理', 'SysUser/index', '5');
INSERT INTO `tg_privilege_menu` VALUES ('9', '投票管理', null, null);
INSERT INTO `tg_privilege_menu` VALUES ('10', '投票管理', null, '9');
INSERT INTO `tg_privilege_menu` VALUES ('11', '主题管理', 'VoteTheme/index', '10');
INSERT INTO `tg_privilege_menu` VALUES ('12', '规则管理', 'VoteRule/index', '10');
INSERT INTO `tg_privilege_menu` VALUES ('13', '奖品级别管理', 'VotePrizeLevel/index', '10');
INSERT INTO `tg_privilege_menu` VALUES ('14', '活动管理', 'VoteActivity/index', '10');
INSERT INTO `tg_privilege_menu` VALUES ('15', '奖品管理', 'VotePrize/PrizeIndex', '10');
INSERT INTO `tg_privilege_menu` VALUES ('16', '粉丝管理', '', '9');
INSERT INTO `tg_privilege_menu` VALUES ('17', '粉丝管理', 'VoteFans/FansIndex', '16');

-- ----------------------------
-- Table structure for `tg_privilege_role`
-- ----------------------------
DROP TABLE IF EXISTS `tg_privilege_role`;
CREATE TABLE `tg_privilege_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `about` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_privilege_role
-- ----------------------------

-- ----------------------------
-- Table structure for `tg_privilege_role_menu`
-- ----------------------------
DROP TABLE IF EXISTS `tg_privilege_role_menu`;
CREATE TABLE `tg_privilege_role_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_privilege_role_menu
-- ----------------------------
INSERT INTO `tg_privilege_role_menu` VALUES ('65', '13', '1');
INSERT INTO `tg_privilege_role_menu` VALUES ('66', '13', '2');
INSERT INTO `tg_privilege_role_menu` VALUES ('67', '13', '3');
INSERT INTO `tg_privilege_role_menu` VALUES ('68', '13', '4');
INSERT INTO `tg_privilege_role_menu` VALUES ('69', '13', '12');
INSERT INTO `tg_privilege_role_menu` VALUES ('70', '13', '13');
INSERT INTO `tg_privilege_role_menu` VALUES ('71', '13', '14');
INSERT INTO `tg_privilege_role_menu` VALUES ('72', '13', '15');
INSERT INTO `tg_privilege_role_menu` VALUES ('76', '13', '45');
INSERT INTO `tg_privilege_role_menu` VALUES ('77', '13', '81');
INSERT INTO `tg_privilege_role_menu` VALUES ('78', '13', '82');
INSERT INTO `tg_privilege_role_menu` VALUES ('79', '13', '83');
INSERT INTO `tg_privilege_role_menu` VALUES ('80', '13', '84');
INSERT INTO `tg_privilege_role_menu` VALUES ('81', '13', '85');
INSERT INTO `tg_privilege_role_menu` VALUES ('82', '13', '86');
INSERT INTO `tg_privilege_role_menu` VALUES ('99', '13', '123');
INSERT INTO `tg_privilege_role_menu` VALUES ('100', '13', '125');
INSERT INTO `tg_privilege_role_menu` VALUES ('161', '12', '1');
INSERT INTO `tg_privilege_role_menu` VALUES ('162', '12', '2');
INSERT INTO `tg_privilege_role_menu` VALUES ('163', '12', '3');
INSERT INTO `tg_privilege_role_menu` VALUES ('164', '12', '4');
INSERT INTO `tg_privilege_role_menu` VALUES ('165', '12', '12');
INSERT INTO `tg_privilege_role_menu` VALUES ('166', '12', '13');
INSERT INTO `tg_privilege_role_menu` VALUES ('167', '12', '14');
INSERT INTO `tg_privilege_role_menu` VALUES ('168', '12', '45');
INSERT INTO `tg_privilege_role_menu` VALUES ('181', '12', '87');
INSERT INTO `tg_privilege_role_menu` VALUES ('182', '12', '88');
INSERT INTO `tg_privilege_role_menu` VALUES ('191', '14', '1');
INSERT INTO `tg_privilege_role_menu` VALUES ('192', '14', '2');
INSERT INTO `tg_privilege_role_menu` VALUES ('193', '14', '3');
INSERT INTO `tg_privilege_role_menu` VALUES ('194', '14', '4');
INSERT INTO `tg_privilege_role_menu` VALUES ('195', '14', '12');
INSERT INTO `tg_privilege_role_menu` VALUES ('196', '14', '13');
INSERT INTO `tg_privilege_role_menu` VALUES ('197', '14', '14');
INSERT INTO `tg_privilege_role_menu` VALUES ('203', '14', '121');
INSERT INTO `tg_privilege_role_menu` VALUES ('204', '14', '122');
INSERT INTO `tg_privilege_role_menu` VALUES ('206', '14', '124');
INSERT INTO `tg_privilege_role_menu` VALUES ('207', '14', '123');
INSERT INTO `tg_privilege_role_menu` VALUES ('208', '14', '125');
INSERT INTO `tg_privilege_role_menu` VALUES ('209', '14', '126');
INSERT INTO `tg_privilege_role_menu` VALUES ('210', '14', '127');

-- ----------------------------
-- Table structure for `tg_privilege_user`
-- ----------------------------
DROP TABLE IF EXISTS `tg_privilege_user`;
CREATE TABLE `tg_privilege_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_privilege_user
-- ----------------------------
INSERT INTO `tg_privilege_user` VALUES ('1', 'admin', '96e79218965eb72c92a549dd5a330112', '1');

-- ----------------------------
-- Table structure for `tg_privilege_user_role`
-- ----------------------------
DROP TABLE IF EXISTS `tg_privilege_user_role`;
CREATE TABLE `tg_privilege_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_privilege_user_role
-- ----------------------------

-- ----------------------------
-- Table structure for `tg_vote_activity`
-- ----------------------------
DROP TABLE IF EXISTS `tg_vote_activity`;
CREATE TABLE `tg_vote_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_id` int(11) DEFAULT NULL,
  `rule_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `logo_img` varchar(255) DEFAULT NULL,
  `ewm_img` varchar(255) DEFAULT NULL,
  `zbf` varchar(255) DEFAULT NULL COMMENT '主办方',
  `zzf1` varchar(255) DEFAULT '赞助方',
  `zzf2` varchar(255) DEFAULT NULL,
  `zzf3` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_vote_activity
-- ----------------------------
INSERT INTO `tg_vote_activity` VALUES ('1', '1', '1', '2016-10-31 16:52:34', '2016-11-12 19:52:38', 'http://tp.epokj.com/weixin/web/tg_vote_front/img/wx_top.png', 'http://tp.epokj.com/weixin/web/tg_vote_front/img/ewm.png', '山西农大信息学院艺术系', '山西优逸客科技有限公司', '无2', '无3', '1');

-- ----------------------------
-- Table structure for `tg_vote_activity_player`
-- ----------------------------
DROP TABLE IF EXISTS `tg_vote_activity_player`;
CREATE TABLE `tg_vote_activity_player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_vote_activity_player
-- ----------------------------
INSERT INTO `tg_vote_activity_player` VALUES ('1', '1', '1');
INSERT INTO `tg_vote_activity_player` VALUES ('2', '2', '1');
INSERT INTO `tg_vote_activity_player` VALUES ('3', '3', '1');
INSERT INTO `tg_vote_activity_player` VALUES ('5', '4', '1');

-- ----------------------------
-- Table structure for `tg_vote_activity_prize`
-- ----------------------------
DROP TABLE IF EXISTS `tg_vote_activity_prize`;
CREATE TABLE `tg_vote_activity_prize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `prize_id` int(11) NOT NULL,
  `prize_num` int(11) DEFAULT NULL,
  `prize_level_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_vote_activity_prize
-- ----------------------------
INSERT INTO `tg_vote_activity_prize` VALUES ('1', '1', '1', '1', '1');
INSERT INTO `tg_vote_activity_prize` VALUES ('2', '1', '2', '1', '2');

-- ----------------------------
-- Table structure for `tg_vote_prize`
-- ----------------------------
DROP TABLE IF EXISTS `tg_vote_prize`;
CREATE TABLE `tg_vote_prize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prize_name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `prize_level_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_vote_prize
-- ----------------------------
INSERT INTO `tg_vote_prize` VALUES ('1', '尼康COOLPIX P530 数码相机', 'img/award.png', '无', '1');
INSERT INTO `tg_vote_prize` VALUES ('2', '尼康COOLPIX P990 数码相机', 'img/award.png', '无', '2');

-- ----------------------------
-- Table structure for `tg_vote_prize_level`
-- ----------------------------
DROP TABLE IF EXISTS `tg_vote_prize_level`;
CREATE TABLE `tg_vote_prize_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prize_level_name` varchar(255) DEFAULT NULL,
  `proportion` int(11) DEFAULT NULL COMMENT '比重',
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_vote_prize_level
-- ----------------------------
INSERT INTO `tg_vote_prize_level` VALUES ('1', '最佳人气奖奖品 ', '1', '无');
INSERT INTO `tg_vote_prize_level` VALUES ('2', '最佳创意奖奖品', '2', '无');

-- ----------------------------
-- Table structure for `tg_vote_rule`
-- ----------------------------
DROP TABLE IF EXISTS `tg_vote_rule`;
CREATE TABLE `tg_vote_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(255) NOT NULL,
  `rule_content` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `day_maxnum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_vote_rule
-- ----------------------------
INSERT INTO `tg_vote_rule` VALUES ('1', '普通投票', '01  微信搜索“山西优逸客UI实训”或“sx-uek” 或扫描下方二维码关注优逸客官方微信公众平台<br>02  非会员每台设备每天限制投票1次； 注册会员每台设备每天可投票3次； ', '无', '3');

-- ----------------------------
-- Table structure for `tg_vote_theme`
-- ----------------------------
DROP TABLE IF EXISTS `tg_vote_theme`;
CREATE TABLE `tg_vote_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_vote_theme
-- ----------------------------
INSERT INTO `tg_vote_theme` VALUES ('1', '普通投票主题', '无');

-- ----------------------------
-- Table structure for `tg_vote_voterecord`
-- ----------------------------
DROP TABLE IF EXISTS `tg_vote_voterecord`;
CREATE TABLE `tg_vote_voterecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fans_id` int(11) DEFAULT NULL,
  `vote_time` datetime DEFAULT NULL,
  `activity_player_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=213 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_vote_voterecord
-- ----------------------------
INSERT INTO `tg_vote_voterecord` VALUES ('1', '1', '2016-10-31 18:06:39', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('2', '1', '2016-10-12 18:06:57', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('3', '3', '2016-10-31 19:02:29', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('4', '3', '2016-10-31 19:02:48', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('5', '0', '2016-10-31 19:02:59', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('6', '0', '2016-10-31 19:03:05', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('7', '0', '2016-10-31 19:03:57', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('8', '0', '2016-10-31 19:04:22', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('9', '3', '2016-10-31 19:06:15', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('10', '3', '2016-10-31 19:06:19', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('11', '3', '2016-10-31 19:06:23', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('12', '6', '2016-11-08 18:19:14', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('13', '6', '2016-11-08 18:19:31', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('14', '7', '2016-11-08 18:23:13', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('15', '7', '2016-11-08 18:23:23', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('16', '7', '2016-11-08 18:23:51', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('17', '7', '2016-11-08 18:24:41', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('18', '7', '2016-11-08 18:24:58', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('19', '7', '2016-11-08 18:25:16', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('20', '7', '2016-11-08 18:25:30', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('21', '7', '2016-11-08 18:26:39', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('22', '7', '2016-11-08 18:26:52', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('23', '6', '2016-11-08 18:33:35', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('24', '6', '2016-11-08 18:33:52', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('25', '10', '2016-11-08 18:45:04', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('26', '10', '2016-11-08 18:45:22', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('27', '10', '2016-11-08 18:45:23', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('28', '13', '2016-11-08 18:45:28', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('29', '13', '2016-11-08 18:45:44', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('30', '13', '2016-11-08 18:45:56', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('31', '14', '2016-11-08 18:46:12', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('32', '18', '2016-11-08 18:46:18', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('33', '7', '2016-11-08 18:46:20', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('34', '18', '2016-11-08 18:46:20', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('35', '14', '2016-11-08 18:46:22', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('36', '11', '2016-11-08 18:46:27', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('37', '18', '2016-11-08 18:46:28', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('38', '12', '2016-11-08 18:46:29', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('39', '18', '2016-11-08 18:46:32', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('40', '7', '2016-11-08 18:46:36', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('41', '12', '2016-11-08 18:46:38', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('42', '12', '2016-11-08 18:46:42', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('43', '7', '2016-11-08 18:46:42', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('44', '18', '2016-11-08 18:46:47', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('45', '17', '2016-11-08 18:46:50', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('46', '16', '2016-11-08 18:46:55', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('47', '20', '2016-11-08 18:46:58', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('48', '17', '2016-11-08 18:46:59', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('49', '18', '2016-11-08 18:47:00', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('50', '18', '2016-11-08 18:47:01', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('51', '18', '2016-11-08 18:47:04', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('52', '12', '2016-11-08 18:47:07', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('53', '19', '2016-11-08 18:47:12', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('54', '17', '2016-11-08 18:47:13', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('55', '0', '2016-11-08 18:47:13', '0');
INSERT INTO `tg_vote_voterecord` VALUES ('56', '18', '2016-11-08 18:47:15', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('57', '14', '2016-11-08 18:47:18', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('58', '19', '2016-11-08 18:47:26', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('59', '19', '2016-11-08 18:47:27', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('60', '14', '2016-11-08 18:47:30', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('61', '17', '2016-11-08 18:47:31', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('62', '14', '2016-11-08 18:47:32', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('63', '21', '2016-11-08 18:47:36', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('64', '17', '2016-11-08 18:47:41', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('65', '19', '2016-11-08 18:47:42', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('66', '22', '2016-11-08 18:47:44', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('67', '21', '2016-11-08 18:47:45', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('68', '7', '2016-11-08 18:47:52', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('69', '17', '2016-11-08 18:47:53', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('70', '18', '2016-11-08 18:47:53', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('71', '22', '2016-11-08 18:48:00', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('72', '23', '2016-11-08 18:48:00', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('73', '12', '2016-11-08 18:48:00', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('74', '19', '2016-11-08 18:48:02', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('75', '17', '2016-11-08 18:48:08', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('76', '0', '2016-11-08 18:48:18', '0');
INSERT INTO `tg_vote_voterecord` VALUES ('77', '23', '2016-11-08 18:48:19', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('78', '19', '2016-11-08 18:48:20', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('79', '23', '2016-11-08 18:48:25', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('80', '23', '2016-11-08 18:48:34', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('81', '19', '2016-11-08 18:48:35', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('82', '0', '2016-11-08 18:48:35', '0');
INSERT INTO `tg_vote_voterecord` VALUES ('83', '25', '2016-11-08 18:48:35', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('84', '18', '2016-11-08 18:48:36', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('85', '0', '2016-11-08 18:48:36', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('86', '18', '2016-11-08 18:48:38', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('87', '18', '2016-11-08 18:48:39', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('88', '18', '2016-11-08 18:48:39', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('89', '18', '2016-11-08 18:48:40', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('90', '18', '2016-11-08 18:48:41', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('91', '18', '2016-11-08 18:48:41', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('92', '18', '2016-11-08 18:48:41', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('93', '18', '2016-11-08 18:48:42', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('94', '18', '2016-11-08 18:48:42', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('95', '18', '2016-11-08 18:48:43', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('96', '18', '2016-11-08 18:48:44', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('97', '0', '2016-11-08 18:48:45', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('98', '25', '2016-11-08 18:48:52', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('99', '18', '2016-11-08 18:48:52', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('100', '26', '2016-11-08 18:48:55', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('101', '18', '2016-11-08 18:48:56', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('102', '14', '2016-11-08 18:49:00', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('103', '0', '2016-11-08 18:49:10', '0');
INSERT INTO `tg_vote_voterecord` VALUES ('104', '26', '2016-11-08 18:49:13', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('105', '0', '2016-11-08 18:49:19', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('106', '26', '2016-11-08 18:49:23', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('107', '25', '2016-11-08 18:49:27', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('108', '0', '2016-11-08 18:49:32', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('109', '26', '2016-11-08 18:49:41', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('110', '31', '2016-11-08 18:49:42', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('111', '0', '2016-11-08 18:49:48', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('112', '22', '2016-11-08 18:49:57', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('113', '20', '2016-11-08 18:49:57', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('114', '31', '2016-11-08 18:50:01', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('115', '20', '2016-11-08 18:50:13', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('116', '29', '2016-11-08 18:50:17', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('117', '27', '2016-11-08 18:50:20', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('118', '29', '2016-11-08 18:50:26', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('119', '29', '2016-11-08 18:50:30', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('120', '20', '2016-11-08 18:50:30', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('121', '29', '2016-11-08 18:50:31', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('122', '29', '2016-11-08 18:50:32', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('123', '29', '2016-11-08 18:50:32', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('124', '29', '2016-11-08 18:50:34', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('125', '29', '2016-11-08 18:50:34', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('126', '29', '2016-11-08 18:50:34', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('127', '29', '2016-11-08 18:50:35', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('128', '20', '2016-11-08 18:50:35', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('129', '27', '2016-11-08 18:50:35', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('130', '29', '2016-11-08 18:50:35', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('131', '29', '2016-11-08 18:50:36', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('132', '29', '2016-11-08 18:50:37', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('133', '29', '2016-11-08 18:50:37', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('134', '29', '2016-11-08 18:50:38', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('135', '25', '2016-11-08 18:50:38', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('136', '29', '2016-11-08 18:50:45', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('137', '20', '2016-11-08 18:50:48', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('138', '25', '2016-11-08 18:50:49', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('139', '12', '2016-11-08 18:50:49', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('140', '25', '2016-11-08 18:50:51', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('141', '27', '2016-11-08 18:50:51', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('142', '14', '2016-11-08 18:50:58', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('143', '29', '2016-11-08 18:51:00', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('144', '35', '2016-11-08 18:51:00', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('145', '29', '2016-11-08 18:51:01', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('146', '25', '2016-11-08 18:51:03', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('147', '16', '2016-11-08 18:51:05', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('148', '14', '2016-11-08 18:51:08', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('149', '22', '2016-11-08 18:51:13', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('150', '35', '2016-11-08 18:51:14', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('151', '35', '2016-11-08 18:51:16', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('152', '24', '2016-11-08 18:51:16', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('153', '0', '2016-11-08 18:51:17', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('154', '14', '2016-11-08 18:51:17', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('155', '30', '2016-11-08 18:51:18', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('156', '16', '2016-11-08 18:51:20', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('157', '29', '2016-11-08 18:51:21', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('158', '29', '2016-11-08 18:51:22', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('159', '29', '2016-11-08 18:51:22', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('160', '35', '2016-11-08 18:51:26', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('161', '25', '2016-11-08 18:51:29', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('162', '0', '2016-11-08 18:51:30', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('163', '35', '2016-11-08 18:51:30', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('164', '24', '2016-11-08 18:51:33', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('165', '14', '2016-11-08 18:51:34', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('166', '30', '2016-11-08 18:51:35', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('167', '24', '2016-11-08 18:51:39', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('168', '30', '2016-11-08 18:51:39', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('169', '30', '2016-11-08 18:51:41', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('170', '30', '2016-11-08 18:51:41', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('171', '30', '2016-11-08 18:51:44', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('172', '30', '2016-11-08 18:51:44', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('173', '30', '2016-11-08 18:51:44', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('174', '30', '2016-11-08 18:51:46', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('175', '30', '2016-11-08 18:51:47', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('176', '25', '2016-11-08 18:51:48', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('177', '30', '2016-11-08 18:51:49', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('178', '14', '2016-11-08 18:51:49', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('179', '24', '2016-11-08 18:51:49', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('180', '14', '2016-11-08 18:51:57', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('181', '24', '2016-11-08 18:51:58', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('182', '30', '2016-11-08 18:51:58', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('183', '0', '2016-11-08 18:52:01', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('184', '25', '2016-11-08 18:52:05', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('185', '25', '2016-11-08 18:54:17', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('186', '37', '2016-11-08 18:55:06', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('187', '37', '2016-11-08 18:55:20', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('188', '37', '2016-11-08 18:55:21', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('189', '37', '2016-11-08 18:55:32', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('190', '37', '2016-11-08 18:55:41', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('191', '37', '2016-11-08 18:55:43', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('192', '37', '2016-11-08 18:55:53', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('193', '37', '2016-11-08 18:56:09', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('194', '37', '2016-11-08 18:56:18', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('195', '37', '2016-11-08 18:56:27', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('196', '37', '2016-11-08 18:56:43', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('197', '37', '2016-11-08 18:56:54', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('198', '35', '2016-11-08 18:59:02', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('199', '35', '2016-11-08 18:59:20', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('200', '15', '2016-11-08 18:59:45', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('201', '35', '2016-11-08 19:01:52', '1');
INSERT INTO `tg_vote_voterecord` VALUES ('202', '35', '2016-11-08 19:02:03', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('203', '35', '2016-11-08 19:02:12', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('204', '28', '2016-11-08 19:02:27', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('205', '35', '2016-11-08 19:02:28', '3');
INSERT INTO `tg_vote_voterecord` VALUES ('206', '35', '2016-11-08 19:02:39', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('207', '28', '2016-11-08 19:02:45', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('208', '35', '2016-11-08 19:02:52', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('209', '35', '2016-11-08 19:02:56', '5');
INSERT INTO `tg_vote_voterecord` VALUES ('210', '12', '2016-11-11 18:49:22', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('211', '12', '2016-11-11 18:49:32', '2');
INSERT INTO `tg_vote_voterecord` VALUES ('212', '12', '2016-11-11 18:51:37', '2');
