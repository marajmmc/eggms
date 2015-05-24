/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : 127.0.0.1:3306
Source Database       : egg_management

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2015-05-22 09:20:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `account_statement`
-- ----------------------------
DROP TABLE IF EXISTS `account_statement`;
CREATE TABLE `account_statement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `account_head_id` int(11) DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `income_date` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `del_status` int(1) NOT NULL,
  `ModifiedBy` int(20) DEFAULT NULL,
  `ModificationDate` datetime DEFAULT NULL,
  `CreatedBy` int(20) DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account_statement
-- ----------------------------
INSERT INTO `account_statement` VALUES ('1', null, '2', '1001.00', '1425232800', 'test1', '1', '0', '0', '1', '2015-03-22 01:31:19', '1', '2015-03-22 01:00:13');
INSERT INTO `account_statement` VALUES ('2', null, '1', '13000.00', '1426960800', 'test', '2', '0', '0', null, null, '1', '2015-03-22 01:41:29');
INSERT INTO `account_statement` VALUES ('3', null, '1', '11500.00', '1423072800', 'test', '2', '0', '0', null, null, '1', '2015-03-22 01:42:55');
INSERT INTO `account_statement` VALUES ('4', null, '2', '100.00', '1431626400', '', '1', '0', '0', null, null, '1', '2015-05-15 11:58:49');
INSERT INTO `account_statement` VALUES ('5', null, '1', '200.00', '1431626400', '', '2', '0', '0', null, null, '1', '2015-05-15 11:59:15');
INSERT INTO `account_statement` VALUES ('6', null, '1', '3322.00', '1431626400', '', '2', '0', '0', null, null, '1', '2015-05-15 12:29:28');

-- ----------------------------
-- Table structure for `bank_statement`
-- ----------------------------
DROP TABLE IF EXISTS `bank_statement`;
CREATE TABLE `bank_statement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `bank_id` varchar(200) DEFAULT NULL,
  `payment_date` int(11) DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `payment_type` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `del_status` int(1) NOT NULL,
  `ModifiedBy` int(20) DEFAULT NULL,
  `ModificationDate` datetime DEFAULT NULL,
  `CreatedBy` int(20) DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bank_statement
-- ----------------------------
INSERT INTO `bank_statement` VALUES ('1', null, '1', '1431976214', '100.00', '1', '', '0', '0', '1', '2015-05-19 01:10:14', '1', '2015-03-19 00:55:05');
INSERT INTO `bank_statement` VALUES ('2', null, '2', '1431976289', '3000.00', '1', '', '0', '0', null, null, '1', '2015-05-19 01:11:29');
INSERT INTO `bank_statement` VALUES ('3', null, '2', '1431976302', '2000.00', '2', '', '0', '0', null, null, '1', '2015-05-19 01:11:42');

-- ----------------------------
-- Table structure for `division_list`
-- ----------------------------
DROP TABLE IF EXISTS `division_list`;
CREATE TABLE `division_list` (
  `divid` varchar(6) NOT NULL,
  `divname` varchar(255) DEFAULT NULL,
  `divnameeng` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`divid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of division_list
-- ----------------------------
INSERT INTO `division_list` VALUES ('10', 'বরিশাল', 'Barishal');
INSERT INTO `division_list` VALUES ('20', 'চট্টগ্রাম', 'Chittagong');
INSERT INTO `division_list` VALUES ('30', 'ঢাকা', 'Dhaka');
INSERT INTO `division_list` VALUES ('40', 'খুলনা', 'Khulna');
INSERT INTO `division_list` VALUES ('50', 'রাজশাহী', 'Rajshahi');
INSERT INTO `division_list` VALUES ('55', 'রংপুর', 'Rangpur');
INSERT INTO `division_list` VALUES ('60', 'সিলেট', 'Sylhet');

-- ----------------------------
-- Table structure for `employee_info`
-- ----------------------------
DROP TABLE IF EXISTS `employee_info`;
CREATE TABLE `employee_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `employee_name` varchar(200) DEFAULT NULL,
  `mobile_number` varchar(200) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text,
  `status` int(1) NOT NULL,
  `del_status` int(1) NOT NULL,
  `ModifiedBy` int(20) DEFAULT NULL,
  `ModificationDate` datetime DEFAULT NULL,
  `CreatedBy` int(20) DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee_info
-- ----------------------------
INSERT INTO `employee_info` VALUES ('1', '1', 'Supplier', 'Pothik', '019146190311', 'marajmmc@gmail.com', 'dhaka', '0', '0', null, null, null, '2015-01-06 00:44:54');
INSERT INTO `employee_info` VALUES ('2', '1', 'Ishita Tarafder', 'Pothik BD - Supplier', '01931430458', 'maraj_mmc@yahoo.com', 'Mirpur -10', '0', '0', null, '2015-01-21 21:25:23', null, '2015-01-21 21:24:59');

-- ----------------------------
-- Table structure for `setup_account_head`
-- ----------------------------
DROP TABLE IF EXISTS `setup_account_head`;
CREATE TABLE `setup_account_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `account_name` varchar(200) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `del_status` int(1) NOT NULL,
  `ModifiedBy` int(20) DEFAULT NULL,
  `ModificationDate` datetime DEFAULT NULL,
  `CreatedBy` int(20) DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setup_account_head
-- ----------------------------
INSERT INTO `setup_account_head` VALUES ('1', null, 'House Rent ', '2', '', '0', '0', null, null, '1', '2015-03-18 23:58:31');
INSERT INTO `setup_account_head` VALUES ('2', null, 'Loan', '1', '', '0', '0', null, null, '1', '2015-03-22 00:52:12');

-- ----------------------------
-- Table structure for `setup_bank_info`
-- ----------------------------
DROP TABLE IF EXISTS `setup_bank_info`;
CREATE TABLE `setup_bank_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `del_status` int(1) NOT NULL,
  `ModifiedBy` int(20) DEFAULT NULL,
  `ModificationDate` datetime DEFAULT NULL,
  `CreatedBy` int(20) DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setup_bank_info
-- ----------------------------
INSERT INTO `setup_bank_info` VALUES ('1', null, 'DBBL', 'DBBL-101', 'test', '0', '0', '1', '2015-03-18 23:45:14', '1', '2015-03-18 23:43:22');
INSERT INTO `setup_bank_info` VALUES ('2', null, 'City Bank', 'cb101', '', '0', '0', null, null, '1', '2015-05-19 01:11:14');

-- ----------------------------
-- Table structure for `supplier_info`
-- ----------------------------
DROP TABLE IF EXISTS `supplier_info`;
CREATE TABLE `supplier_info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `shop_id` int(20) DEFAULT NULL,
  `supplier_name` varchar(200) DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text,
  `type` int(1) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `del_status` int(1) NOT NULL,
  `ModifiedBy` int(20) DEFAULT NULL,
  `ModificationDate` datetime DEFAULT NULL,
  `CreatedBy` int(20) DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of supplier_info
-- ----------------------------
INSERT INTO `supplier_info` VALUES ('1', '1', 'Supplier', 'Pothik', '019146190311', 'marajmmc@gmail.com', 'dhaka', '1', '0', '0', '1', '2015-03-19 00:25:17', null, '2015-01-06 00:44:54');
INSERT INTO `supplier_info` VALUES ('2', '1', 'Ishita Tarafder', 'Pothik BD - Supplier', '01931430458', 'maraj_mmc@yahoo.com', 'Mirpur -10', '2', '0', '0', '1', '2015-03-19 00:25:24', null, '2015-01-21 21:24:59');
INSERT INTO `supplier_info` VALUES ('3', '1', 'Abdullah', '', '01931430458', '', '', '1', '0', '0', null, null, '1', '2015-03-19 00:26:54');

-- ----------------------------
-- Table structure for `sys_module_task`
-- ----------------------------
DROP TABLE IF EXISTS `sys_module_task`;
CREATE TABLE `sys_module_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` enum('TASK','MODULE') NOT NULL,
  `parent` tinyint(4) DEFAULT NULL,
  `controller_name` varchar(100) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `order` tinyint(3) NOT NULL DEFAULT '0',
  `status` enum('ACTIVE','IN-ACTIVE','DELETED') DEFAULT 'ACTIVE',
  `created_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `a` (`controller_name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_module_task
-- ----------------------------
INSERT INTO `sys_module_task` VALUES ('1', 'ব্যবহারকারী', 'TASK', '0', 'users', null, '0', 'ACTIVE', '1410098355');
INSERT INTO `sys_module_task` VALUES ('2', 'Setup', 'MODULE', '0', '', null, '0', 'ACTIVE', '1419701197');
INSERT INTO `sys_module_task` VALUES ('3', 'Create Employee', 'TASK', '2', 'create_employee', null, '0', 'ACTIVE', '1419701237');
INSERT INTO `sys_module_task` VALUES ('4', 'Create Bank', 'TASK', '2', 'create_bank', null, '2', 'ACTIVE', '1419879409');
INSERT INTO `sys_module_task` VALUES ('5', 'Create Supplier', 'TASK', '2', 'supplier', null, '3', 'ACTIVE', '1420169824');
INSERT INTO `sys_module_task` VALUES ('6', 'Create SMS Template', 'TASK', '2', 'create_sms_template', null, '5', 'IN-ACTIVE', '1420199503');
INSERT INTO `sys_module_task` VALUES ('7', 'Create Account Head', 'TASK', '2', 'create_account_head', null, '1', 'ACTIVE', '1420479645');
INSERT INTO `sys_module_task` VALUES ('8', 'Account', 'MODULE', '0', '', null, '0', 'ACTIVE', '1426247903');
INSERT INTO `sys_module_task` VALUES ('9', 'Income Adds', 'TASK', '8', 'income_adds', null, '1', 'ACTIVE', '1426247952');
INSERT INTO `sys_module_task` VALUES ('10', 'Expenditure Adds', 'TASK', '8', 'expenditure_adds', null, '2', 'ACTIVE', '1426247997');
INSERT INTO `sys_module_task` VALUES ('11', 'Bank Statement Entry', 'TASK', '8', 'bank_statement_entry', null, '3', 'ACTIVE', '1426248030');
INSERT INTO `sys_module_task` VALUES ('12', 'Report', 'MODULE', '0', '', null, '0', 'ACTIVE', '1426967660');
INSERT INTO `sys_module_task` VALUES ('13', 'Account Statement', 'TASK', '12', 'report_account_statement', null, '0', 'ACTIVE', '1426967719');
INSERT INTO `sys_module_task` VALUES ('14', 'Bank Statement', 'TASK', '12', 'report_bank_statement', null, '1', 'ACTIVE', '1426967759');
INSERT INTO `sys_module_task` VALUES ('15', 'Income Report', 'TASK', '12', 'report_income', null, '1', 'ACTIVE', '1431800303');
INSERT INTO `sys_module_task` VALUES ('16', 'Expanse Report', 'TASK', '12', 'report_expanse', null, '4', 'ACTIVE', '1431973268');

-- ----------------------------
-- Table structure for `sys_task_access`
-- ----------------------------
DROP TABLE IF EXISTS `sys_task_access`;
CREATE TABLE `sys_task_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `view` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `add` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `edit` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `delete` enum('NO','YES') NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_task_access
-- ----------------------------
INSERT INTO `sys_task_access` VALUES ('1', '7', '61', 'YES', 'YES', 'YES', 'YES');
INSERT INTO `sys_task_access` VALUES ('2', '7', '62', 'YES', 'YES', 'YES', 'YES');
INSERT INTO `sys_task_access` VALUES ('3', '2', '68', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('4', '3', '68', 'YES', 'YES', 'YES', 'YES');
INSERT INTO `sys_task_access` VALUES ('5', '2', '69', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('6', '3', '69', 'YES', 'YES', 'YES', 'YES');
INSERT INTO `sys_task_access` VALUES ('7', '2', '70', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('8', '3', '70', 'YES', 'YES', 'YES', 'YES');
INSERT INTO `sys_task_access` VALUES ('9', '2', '71', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('10', '3', '71', 'YES', 'YES', 'YES', 'YES');
INSERT INTO `sys_task_access` VALUES ('11', '2', '72', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('12', '3', '72', 'YES', 'YES', 'YES', 'YES');
INSERT INTO `sys_task_access` VALUES ('13', '2', '13', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('14', '3', '13', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('15', '2', '7', 'YES', 'YES', 'YES', 'NO');
INSERT INTO `sys_task_access` VALUES ('16', '3', '7', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('17', '2', '4', 'YES', 'YES', 'YES', 'YES');
INSERT INTO `sys_task_access` VALUES ('18', '3', '4', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('19', '2', '5', 'YES', 'YES', 'YES', 'NO');
INSERT INTO `sys_task_access` VALUES ('20', '3', '5', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('21', '2', '6', 'YES', 'YES', 'YES', 'NO');
INSERT INTO `sys_task_access` VALUES ('22', '3', '6', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('23', '2', '9', 'YES', 'YES', 'YES', 'NO');
INSERT INTO `sys_task_access` VALUES ('24', '3', '9', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('25', '2', '10', 'YES', 'YES', 'YES', 'NO');
INSERT INTO `sys_task_access` VALUES ('26', '3', '10', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('27', '2', '11', 'YES', 'YES', 'YES', 'NO');
INSERT INTO `sys_task_access` VALUES ('28', '3', '11', 'NO', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('29', '2', '15', 'YES', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('30', '3', '15', 'YES', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('31', '2', '16', 'YES', 'NO', 'NO', 'NO');
INSERT INTO `sys_task_access` VALUES ('32', '3', '16', 'YES', 'NO', 'NO', 'NO');

-- ----------------------------
-- Table structure for `sys_user`
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_group` int(11) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `status` enum('ACTIVE','IN-ACTIVE','DELETE') DEFAULT 'ACTIVE',
  `created_date` int(11) DEFAULT NULL,
  `ques_id` int(11) DEFAULT NULL,
  `ques_ans` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES ('1', 'super', '202cb962ac59075b964b07152d234b70', '1', null, '1', 'ACTIVE', null, null, null);
INSERT INTO `sys_user` VALUES ('2', 'admin', '202cb962ac59075b964b07152d234b70', '2', '01946190311', '1', 'ACTIVE', '1419698669', null, null);

-- ----------------------------
-- Table structure for `sys_user_group`
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_group`;
CREATE TABLE `sys_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `status` enum('ACTIVE','IN-ACTIVE','DELETE') DEFAULT 'ACTIVE',
  `created_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user_group
-- ----------------------------
INSERT INTO `sys_user_group` VALUES ('1', 'Super Admin', 'ACTIVE', null);
INSERT INTO `sys_user_group` VALUES ('2', 'Admin', 'ACTIVE', '1417281666');
INSERT INTO `sys_user_group` VALUES ('3', 'Shop User', 'ACTIVE', null);

-- ----------------------------
-- Table structure for `sys_user_info`
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_info`;
CREATE TABLE `sys_user_info` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `center_id` int(11) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `email_address` varchar(30) DEFAULT NULL,
  `contact_number` varchar(16) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `profile_image` varchar(50) DEFAULT NULL,
  `modify_date` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `login_status` int(1) DEFAULT NULL,
  `is_setup` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user_info
-- ----------------------------
INSERT INTO `sys_user_info` VALUES ('1', null, 'Kamrul Hasan', 'saj696@gmail.com', '01713311266', 'শ্রীপল্লী, মুন্সিগঞ্জ, ঢাকা, বাংলাদেশ', '1-1411884733.jpg', '1411884764', null, null, '1');
INSERT INTO `sys_user_info` VALUES ('2', null, 'Amin', null, null, null, null, null, null, null, '1');

-- ----------------------------
-- Table structure for `zilla_list`
-- ----------------------------
DROP TABLE IF EXISTS `zilla_list`;
CREATE TABLE `zilla_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zillaid` varchar(6) NOT NULL DEFAULT '',
  `divid` varchar(6) DEFAULT NULL,
  `zillaname` varchar(255) DEFAULT NULL,
  `zillanameeng` varchar(255) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `divid` (`divid`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zilla_list
-- ----------------------------
INSERT INTO `zilla_list` VALUES ('1', '01', '40', 'বাগেরহাট', 'BAGERHAT', '0');
INSERT INTO `zilla_list` VALUES ('2', '03', '20', 'বান্দরবান', 'BANDARBAN', '0');
INSERT INTO `zilla_list` VALUES ('3', '04', '10', 'বরগুনা', 'BARGUNA', '0');
INSERT INTO `zilla_list` VALUES ('4', '06', '10', 'বরিশাল', 'BARISAL', '0');
INSERT INTO `zilla_list` VALUES ('5', '09', '10', 'ভোলা', 'BHOLA', '0');
INSERT INTO `zilla_list` VALUES ('6', '10', '50', 'বগুড়া', 'BOGRA', '0');
INSERT INTO `zilla_list` VALUES ('7', '12', '20', 'ব্রাক্ষ্মণবাড়িয়া', 'BRAHMANBARIA', '0');
INSERT INTO `zilla_list` VALUES ('8', '13', '20', 'চাঁদপুর', 'CHANDPUR', '0');
INSERT INTO `zilla_list` VALUES ('9', '15', '20', 'চট্রগ্রাম', 'CHITTAGONG', '0');
INSERT INTO `zilla_list` VALUES ('10', '18', '40', 'চুয়াডাঙ্গা', 'CHUADANGA', '0');
INSERT INTO `zilla_list` VALUES ('11', '19', '20', 'কুমিল্লা', 'COMILLA', '0');
INSERT INTO `zilla_list` VALUES ('12', '22', '20', 'কক্সবাজার', 'COX\'S BAZAR', '0');
INSERT INTO `zilla_list` VALUES ('13', '26', '30', 'ঢাকা', 'DHAKA', '0');
INSERT INTO `zilla_list` VALUES ('14', '27', '50', 'দিনাজপুর', 'DINAJPUR', '0');
INSERT INTO `zilla_list` VALUES ('15', '29', '30', 'ফরিদপুর', 'FARIDPUR', '0');
INSERT INTO `zilla_list` VALUES ('16', '30', '20', 'ফেনী', 'FENI', '0');
INSERT INTO `zilla_list` VALUES ('17', '32', '50', 'গাইবান্ধা', 'GAIBANDHA', '0');
INSERT INTO `zilla_list` VALUES ('18', '33', '30', 'গাজীপুর', 'GAZIPUR', '0');
INSERT INTO `zilla_list` VALUES ('19', '35', '30', 'গোপালগঞ্জ', 'GOPALGANJ', '0');
INSERT INTO `zilla_list` VALUES ('20', '36', '60', 'হবিগঞ্জ', 'HABIGANJ', '0');
INSERT INTO `zilla_list` VALUES ('21', '38', '50', 'জয়পুরহাট', 'JOYPURHAT', '0');
INSERT INTO `zilla_list` VALUES ('22', '39', '30', 'জামালপুর', 'JAMALPUR', '0');
INSERT INTO `zilla_list` VALUES ('23', '41', '40', 'যশোর', 'JESSORE', '0');
INSERT INTO `zilla_list` VALUES ('24', '42', '10', 'ঝালকাঠী', 'JHALOKATI', '0');
INSERT INTO `zilla_list` VALUES ('25', '44', '40', 'ঝিনাইদহ', 'JHENAIDAH', '0');
INSERT INTO `zilla_list` VALUES ('26', '46', '20', 'খাগড়াছড়ি', 'KHAGRACHHARI', '0');
INSERT INTO `zilla_list` VALUES ('27', '47', '40', 'খুলনা', 'KHULNA', '0');
INSERT INTO `zilla_list` VALUES ('28', '48', '30', 'কিশোরগঞ্জ', 'KISHOREGONJ', '0');
INSERT INTO `zilla_list` VALUES ('29', '49', '50', 'কুড়িগ্রাম', 'KURIGRAM', '0');
INSERT INTO `zilla_list` VALUES ('30', '50', '40', 'কুষ্টিয়া', 'KUSHTIA', '0');
INSERT INTO `zilla_list` VALUES ('31', '51', '20', 'লক্ষ্মীপুর', 'LAKSHMIPUR', '0');
INSERT INTO `zilla_list` VALUES ('32', '52', '50', 'লালমনিরহাট', 'LALMONIRHAT', '0');
INSERT INTO `zilla_list` VALUES ('33', '54', '30', 'মাদারীপুর', 'MADARIPUR', '0');
INSERT INTO `zilla_list` VALUES ('34', '55', '40', 'মাগুরা', 'MAGURA', '0');
INSERT INTO `zilla_list` VALUES ('35', '56', '30', 'মানিকগঞ্জ', 'MANIKGANJ', '0');
INSERT INTO `zilla_list` VALUES ('36', '57', '40', 'মেহেরপুর', 'MEHERPUR', '0');
INSERT INTO `zilla_list` VALUES ('37', '58', '60', 'মৌলভীবাজার', 'MAULVIBAZAR', '0');
INSERT INTO `zilla_list` VALUES ('38', '59', '30', 'মুন্সীগঞ্জ', 'MUNSHIGANJ', '0');
INSERT INTO `zilla_list` VALUES ('39', '61', '30', 'ময়মনসিংহ', 'MYMENSINGH', '0');
INSERT INTO `zilla_list` VALUES ('40', '64', '50', 'নওগাঁ', 'NAOGAON', '0');
INSERT INTO `zilla_list` VALUES ('41', '65', '40', 'নড়াইল', 'NARAIL', '0');
INSERT INTO `zilla_list` VALUES ('42', '67', '30', 'নারায়নগঞ্জ', 'NARAYANGANJ', '0');
INSERT INTO `zilla_list` VALUES ('43', '68', '30', 'নরসিংদী', 'NARSINGDI', '0');
INSERT INTO `zilla_list` VALUES ('44', '69', '50', 'নাটোর', 'NATORE', '0');
INSERT INTO `zilla_list` VALUES ('45', '70', '50', 'চাঁপাই নবাবগঞ্জ', 'CHAPAI NABABGANJ', '0');
INSERT INTO `zilla_list` VALUES ('46', '72', '30', 'নেত্রকোণা', 'NETRAKONA', '0');
INSERT INTO `zilla_list` VALUES ('47', '73', '50', 'নীলফামারী', 'NILPHAMARI ZILA', '0');
INSERT INTO `zilla_list` VALUES ('48', '75', '20', 'নোয়াখালী', 'NOAKHALI', '0');
INSERT INTO `zilla_list` VALUES ('49', '76', '50', 'পাবনা', 'PABNA', '0');
INSERT INTO `zilla_list` VALUES ('50', '77', '50', 'পঞ্চগড়', 'PANCHAGARH', '0');
INSERT INTO `zilla_list` VALUES ('51', '78', '10', 'পটুয়াখালী', 'PATUAKHALI', '0');
INSERT INTO `zilla_list` VALUES ('52', '79', '10', 'পিরোজপুর', 'PIROJPUR', '0');
INSERT INTO `zilla_list` VALUES ('53', '81', '50', 'রাজশাহী', 'RAJSHAHI', '0');
INSERT INTO `zilla_list` VALUES ('54', '82', '30', 'রাজবাড়ী', 'RAJBARI', '0');
INSERT INTO `zilla_list` VALUES ('55', '84', '20', 'রাঙ্গামাটি', 'RANGAMATI', '0');
INSERT INTO `zilla_list` VALUES ('56', '85', '50', 'রংপুর', 'RANGPUR', '0');
INSERT INTO `zilla_list` VALUES ('57', '86', '30', 'শরিয়তপুর', 'SHARIATPUR', '0');
INSERT INTO `zilla_list` VALUES ('58', '87', '40', 'সাতক্ষীরা', 'SATKHIRA', '0');
INSERT INTO `zilla_list` VALUES ('59', '88', '50', 'সিরাজগঞ্জ', 'SIRAJGANJ', '0');
INSERT INTO `zilla_list` VALUES ('60', '89', '30', 'শেরপুর', 'SHERPUR', '0');
INSERT INTO `zilla_list` VALUES ('61', '90', '60', 'সুনামগঞ্জ', 'SUNAMGANJ', '0');
INSERT INTO `zilla_list` VALUES ('62', '91', '60', 'সিলেট', 'SYLHET', '0');
INSERT INTO `zilla_list` VALUES ('63', '93', '30', 'টাঙ্গাইল', 'TANGAIL', '0');
INSERT INTO `zilla_list` VALUES ('64', '94', '50', 'ঠাকুরগাঁও', 'THAKURGAON', '0');
INSERT INTO `zilla_list` VALUES ('65', '95', '55', 'DINAJPUR\r\n', 'DINAJPUR\r\n', '1');
INSERT INTO `zilla_list` VALUES ('66', '96', '55', 'GAIBANDHA', 'GAIBANDHA', '1');
INSERT INTO `zilla_list` VALUES ('67', '97', '55', 'KURIGRAM', 'KURIGRAM', '1');
INSERT INTO `zilla_list` VALUES ('68', '98', '55', 'LALMONIRHAT', 'LALMONIRHAT', '1');
INSERT INTO `zilla_list` VALUES ('69', '99', '55', 'NILPHAMARI', 'NILPHAMARI', '0');
INSERT INTO `zilla_list` VALUES ('70', '100', '55', 'PANCHAGARH', 'PANCHAGARH', '1');
INSERT INTO `zilla_list` VALUES ('71', '101', '55', 'RANGPUR', 'RANGPUR', '1');
INSERT INTO `zilla_list` VALUES ('72', '102', '55', 'THAKURGAON', 'THAKURGAON', '1');
