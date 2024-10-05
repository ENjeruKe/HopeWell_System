# MySQL dump of database 'selfcare_demo' on host 'localhost'
# Backup Date and Time: 2019-08-06 12:38
# Built by FrontAccounting 2.4.7000
# http://frontaccounting.com
# Company: CHIROMO LANE MEDICAL CENTRE
# User: Administrator

# Compatibility: 2.4.1

# Comment:
# today

USE `kisima`;
SET NAMES latin1;


### Structure of table `0_areas` ###

## ## DROP TABLE IF EXISTS `0_areas`;

CREATE TABLE IF NOT EXISTS `0_areas` (
  `area_code` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`area_code`),
  UNIQUE KEY `description` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_areas` ###

INSERT INTO `0_areas` VALUES
('3', 'Globaltest', '0');

### Structure of table `0_attachments` ###

## DROP TABLE IF EXISTS `0_attachments`;

CREATE TABLE IF NOT EXISTS `0_attachments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type_no` int(11) NOT NULL DEFAULT '0',
  `trans_no` int(11) NOT NULL DEFAULT '0',
  `unique_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `filename` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `filesize` int(11) NOT NULL DEFAULT '0',
  `filetype` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `type_no` (`type_no`,`trans_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_attachments` ###


### Structure of table `0_audit_trail` ###

## DROP TABLE IF EXISTS `0_audit_trail`;

CREATE TABLE IF NOT EXISTS `0_audit_trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) unsigned NOT NULL DEFAULT '0',
  `trans_no` int(11) unsigned NOT NULL DEFAULT '0',
  `user` smallint(6) unsigned NOT NULL DEFAULT '0',
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fiscal_year` int(11) NOT NULL DEFAULT '0',
  `gl_date` date NOT NULL DEFAULT '0000-00-00',
  `gl_seq` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Seq` (`fiscal_year`,`gl_date`,`gl_seq`),
  KEY `Type_and_Number` (`type`,`trans_no`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_audit_trail` ###

INSERT INTO `0_audit_trail` VALUES
('1', '18', '1', '1', '2018-05-05 14:08:02', NULL, '1', '2018-05-05', '0'),
('2', '25', '1', '1', '2018-05-05 14:08:14', NULL, '1', '2018-05-05', '1'),
('3', '30', '1', '1', '2018-05-05 14:09:54', NULL, '1', '2018-05-10', '0'),
('4', '13', '1', '1', '2018-05-05 14:09:55', NULL, '1', '2018-05-10', '13'),
('5', '10', '1', '1', '2018-05-05 14:09:55', NULL, '1', '2018-05-10', '14'),
('6', '12', '1', '1', '2018-05-05 14:09:55', NULL, '1', '2018-05-10', '15'),
('7', '29', '1', '1', '2018-05-05 14:18:49', 'Quick production.', '1', '2018-05-05', '2'),
('8', '18', '2', '1', '2018-05-05 14:22:32', NULL, '1', '2018-05-05', '0'),
('9', '25', '2', '1', '2018-05-05 14:22:32', NULL, '1', '2018-05-05', '3'),
('10', '20', '1', '1', '2018-05-05 14:22:32', NULL, '1', '2018-05-05', '4'),
('11', '30', '2', '1', '2018-05-07 07:55:15', NULL, '1', '2018-05-07', '0'),
('12', '13', '2', '1', '2018-05-07 07:55:16', NULL, '1', '2018-05-07', '7'),
('13', '10', '2', '1', '2018-05-07 07:55:16', NULL, '1', '2018-05-07', '8'),
('14', '12', '2', '1', '2018-05-07 07:55:16', NULL, '1', '2018-05-07', '9'),
('15', '30', '3', '1', '2018-05-07 08:08:24', NULL, '1', '2018-05-07', '0'),
('16', '30', '4', '1', '2018-05-07 09:18:44', NULL, '1', '2018-05-07', '0'),
('17', '30', '5', '1', '2018-05-07 11:42:41', NULL, '1', '2018-05-07', '0'),
('18', '13', '3', '1', '2018-05-07 11:42:41', NULL, '1', '2018-05-07', '10'),
('19', '10', '3', '1', '2018-05-07 11:42:41', NULL, '1', '2018-05-07', '11'),
('20', '30', '6', '1', '2018-05-07 14:02:35', NULL, '1', '2018-05-07', '0'),
('21', '30', '7', '1', '2018-05-07 14:05:38', NULL, '1', '2018-05-07', '0'),
('22', '13', '4', '1', '2018-05-07 14:05:38', NULL, '1', '2018-05-07', '0'),
('23', '10', '4', '1', '2018-05-07 14:05:38', NULL, '1', '2018-05-07', '0'),
('24', '12', '3', '1', '2018-05-07 14:05:38', NULL, '1', '2018-05-07', '0'),
('25', '26', '1', '1', '2018-05-07 15:59:34', NULL, '1', '2018-05-07', NULL),
('26', '29', '1', '1', '2018-05-07 15:59:01', 'Production.', '1', '2018-05-07', '5'),
('27', '26', '1', '1', '2018-05-07 15:59:34', 'Released.', '1', '2018-05-07', '6'),
('28', '1', '1', '1', '2018-05-07 16:01:00', NULL, '1', '2018-05-07', '12'),
('29', '30', '8', '1', '2019-01-21 11:13:06', NULL, '2', '2019-01-21', '0'),
('30', '13', '5', '1', '2019-01-21 11:13:06', NULL, '2', '2019-01-21', '0'),
('31', '10', '5', '1', '2019-01-21 11:13:06', NULL, '2', '2019-01-21', '0'),
('32', '12', '4', '1', '2019-01-21 11:13:06', NULL, '2', '2019-01-21', '0'),
('33', '18', '3', '1', '2019-01-21 11:14:14', NULL, '2', '2019-01-21', '0'),
('34', '25', '3', '1', '2019-01-21 11:14:14', NULL, '2', '2019-01-21', '0'),
('35', '20', '2', '1', '2019-01-21 11:14:14', NULL, '2', '2019-01-21', '0'),
('36', '0', '1', '1', '2019-01-21 11:15:35', NULL, '1', '2018-12-31', '16'),
('37', '0', '2', '1', '2019-06-30 17:10:50', NULL, '2', '2019-06-30', '0'),
('38', '30', '9', '1', '2019-06-30 18:14:03', NULL, '2', '2019-06-30', '0'),
('39', '13', '6', '1', '2019-06-30 18:14:03', NULL, '2', '2019-06-30', '0'),
('40', '10', '6', '1', '2019-06-30 18:14:03', NULL, '2', '2019-06-30', '0'),
('41', '12', '5', '1', '2019-06-30 18:14:03', NULL, '2', '2019-06-30', '0'),
('42', '30', '10', '1', '2019-06-30 18:38:23', NULL, '2', '2019-06-30', '0'),
('43', '13', '7', '1', '2019-06-30 18:38:23', NULL, '2', '2019-06-30', '0'),
('44', '10', '7', '1', '2019-06-30 18:38:23', NULL, '2', '2019-06-30', '0'),
('45', '12', '6', '1', '2019-06-30 18:38:23', NULL, '2', '2019-06-30', '0'),
('46', '30', '11', '1', '2019-06-30 18:38:24', NULL, '2', '2019-06-30', '0'),
('47', '30', '12', '1', '2019-07-03 08:25:29', NULL, '2', '2019-07-03', '0'),
('48', '13', '8', '1', '2019-07-03 08:25:29', NULL, '2', '2019-07-03', '0'),
('49', '10', '8', '1', '2019-07-03 08:25:29', NULL, '2', '2019-07-03', '0'),
('50', '18', '4', '1', '2019-07-03 08:51:28', NULL, '2', '2019-07-03', '0'),
('51', '25', '4', '1', '2019-07-03 08:51:28', NULL, '2', '2019-07-03', '0'),
('52', '0', '3', '1', '2019-07-03 09:06:10', NULL, '2', '2019-07-03', '0'),
('53', '18', '5', '1', '2019-07-03 09:13:25', NULL, '2', '2019-07-03', '0'),
('54', '25', '5', '1', '2019-07-03 09:13:25', NULL, '2', '2019-07-03', '0'),
('55', '20', '3', '1', '2019-07-03 09:28:11', NULL, '2', '2019-07-03', '0'),
('56', '30', '13', '1', '2019-07-03 09:30:42', NULL, '2', '2019-07-03', '0'),
('57', '13', '9', '1', '2019-07-03 09:30:42', NULL, '2', '2019-07-03', '0'),
('58', '10', '9', '1', '2019-07-03 09:30:42', NULL, '2', '2019-07-03', '0'),
('59', '12', '7', '1', '2019-07-03 09:30:42', NULL, '2', '2019-07-03', '0'),
('60', '18', '6', '1', '2019-07-19 08:43:11', NULL, '2', '2019-07-19', '0'),
('61', '25', '6', '1', '2019-07-19 08:43:11', NULL, '2', '2019-07-19', '0'),
('62', '20', '4', '1', '2019-07-19 08:43:11', NULL, '2', '2019-07-19', '0'),
('63', '18', '7', '1', '2019-07-19 08:47:19', NULL, '2', '2019-07-19', '0'),
('64', '25', '7', '1', '2019-07-19 08:47:19', NULL, '2', '2019-07-19', '0'),
('65', '20', '5', '1', '2019-07-19 08:47:19', NULL, '2', '2019-07-19', '0'),
('66', '18', '8', '1', '2019-07-19 08:55:03', NULL, '2', '2019-07-19', '0'),
('67', '25', '8', '1', '2019-07-19 08:55:03', NULL, '2', '2019-07-19', '0'),
('68', '20', '6', '1', '2019-07-19 08:55:03', NULL, '2', '2019-07-19', '0'),
('69', '22', '1', '1', '2019-07-19 08:58:51', NULL, '2', '2019-07-19', '0'),
('70', '18', '9', '1', '2019-07-19 09:06:51', NULL, '2', '2019-07-19', '0'),
('71', '25', '9', '1', '2019-07-19 09:06:51', NULL, '2', '2019-07-19', '0'),
('72', '20', '7', '1', '2019-07-19 09:06:51', NULL, '2', '2019-07-19', '0'),
('73', '0', '4', '1', '2019-07-20 20:13:35', NULL, '2', '2019-07-20', '0'),
('74', '2', '1', '1', '2019-07-20 20:20:10', NULL, '2', '2019-07-20', NULL),
('75', '2', '1', '1', '2019-07-20 20:20:10', NULL, '2', '2019-07-20', '0'),
('76', '1', '2', '1', '2019-07-22 14:03:49', NULL, '2', '2019-07-22', '0'),
('77', '18', '10', '1', '2019-08-04 18:57:28', NULL, '2', '2019-08-04', '0'),
('78', '25', '10', '1', '2019-08-04 18:57:28', NULL, '2', '2019-08-04', '0'),
('79', '20', '8', '1', '2019-08-04 18:57:28', NULL, '2', '2019-08-04', '0'),
('80', '16', '1', '1', '2019-08-05 11:47:16', NULL, '2', '2019-08-05', '0'),
('81', '1', '3', '1', '2019-08-05 11:59:27', NULL, '2', '2019-08-05', NULL),
('82', '1', '3', '1', '2019-08-05 11:59:27', NULL, '2', '2019-08-05', '0'),
('83', '1', '4', '1', '2019-08-06 15:03:59', NULL, '2', '2019-08-06', NULL),
('84', '1', '4', '1', '2019-08-06 15:03:59', NULL, '2', '2019-08-06', '0'),
('85', '2', '2', '1', '2019-08-06 15:07:36', NULL, '2', '2019-08-06', NULL),
('86', '2', '2', '1', '2019-08-06 15:07:36', NULL, '2', '2019-08-06', '0'),
('87', '0', '5', '1', '2019-08-06 15:10:38', NULL, '2', '2019-08-06', NULL),
('88', '0', '5', '1', '2019-08-06 15:10:38', NULL, '2', '2019-08-06', '0'),
('89', '4', '1', '1', '2019-08-06 15:10:38', NULL, '2', '2019-08-06', '0'),
('90', '0', '6', '1', '2019-08-06 15:14:27', NULL, '2', '2019-08-06', '0');

### Structure of table `0_bank_accounts` ###

## DROP TABLE IF EXISTS `0_bank_accounts`;

CREATE TABLE IF NOT EXISTS `0_bank_accounts` (
  `account_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_type` smallint(6) NOT NULL DEFAULT '0',
  `bank_account_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_account_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_address` tinytext COLLATE utf8_unicode_ci,
  `bank_curr_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_curr_act` tinyint(1) NOT NULL DEFAULT '0',
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `bank_charge_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_reconciled_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ending_reconcile_balance` double NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `bank_account_name` (`bank_account_name`),
  KEY `bank_account_number` (`bank_account_number`),
  KEY `account_code` (`account_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_bank_accounts` ###

INSERT INTO `0_bank_accounts` VALUES
('1060', '0', 'Current account', 'N/A', 'N/A', NULL, 'USD', '1', '1', '5690', '0000-00-00 00:00:00', '0', '0'),
('1065', '3', 'Petty Cash account', 'N/A', 'N/A', NULL, 'USD', '0', '2', '5690', '2019-08-05 00:00:00', '4900000', '0');

### Structure of table `0_bank_trans` ###

## DROP TABLE IF EXISTS `0_bank_trans`;

CREATE TABLE IF NOT EXISTS `0_bank_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) DEFAULT NULL,
  `trans_no` int(11) DEFAULT NULL,
  `bank_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ref` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans_date` date NOT NULL DEFAULT '0000-00-00',
  `amount` double DEFAULT NULL,
  `dimension_id` int(11) NOT NULL DEFAULT '0',
  `dimension2_id` int(11) NOT NULL DEFAULT '0',
  `person_type_id` int(11) NOT NULL DEFAULT '0',
  `person_id` tinyblob,
  `reconciled` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_act` (`bank_act`,`ref`),
  KEY `type` (`type`,`trans_no`),
  KEY `bank_act_2` (`bank_act`,`reconciled`),
  KEY `bank_act_3` (`bank_act`,`trans_date`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_bank_trans` ###

INSERT INTO `0_bank_trans` VALUES
('1', '12', '1', '2', '001/2018', '2018-05-10', '6240', '0', '0', '2', '1', '2019-08-05'),
('2', '12', '2', '2', '002/2018', '2018-05-07', '300', '0', '0', '2', '1', '2019-08-05'),
('3', '12', '3', '2', '003/2018', '2018-05-07', '0', '0', '0', '2', '1', NULL),
('4', '1', '1', '1', '001/2018', '2018-05-07', '-5', '0', '0', '0', 'Goods received', NULL),
('5', '12', '4', '2', '001/2019', '2019-01-21', '1250', '0', '0', '2', '1', '2019-08-05'),
('6', '0', '2', '2', '001/2019', '2019-06-30', '-9000', '0', '0', '0', NULL, '2019-08-05'),
('7', '12', '5', '2', '002/2019', '2019-06-30', '3000000', '0', '0', '2', '3', '2019-08-05'),
('8', '12', '6', '2', '003/2019', '2019-06-30', '5000000', '0', '0', '2', '3', '2019-08-05'),
('9', '12', '7', '2', '004/2019', '2019-07-03', '50000', '0', '0', '2', '3', '2019-08-05'),
('10', '22', '1', '2', '001/2019', '2019-07-19', '-265000', '0', '0', '3', '6', '2019-08-05'),
('11', '2', '1', '1', '001/2019', '2019-07-20', '34000', '0', '0', '2', '3', NULL),
('12', '1', '2', '2', '001/2019', '2019-07-22', '-60000', '0', '0', '4', '1', '2019-08-05'),
('13', '1', '3', '2', '002/2019', '2019-08-05', '-30000', '0', '0', '3', '6', NULL),
('14', '1', '4', '2', '003/2019', '2019-08-06', '-65000', '0', '0', '3', '3', NULL),
('15', '2', '2', '2', '002/2019', '2019-08-06', '70000', '0', '0', '2', '4', NULL),
('16', '4', '1', '2', '001/2019', '2019-08-06', '-698790', '0', '0', '0', 'From Petty Cash account To Current account', NULL),
('17', '4', '1', '1', '001/2019', '2019-08-06', '698000', '0', '0', '0', 'From Petty Cash account To Current account', NULL);

### Structure of table `0_bom` ###

## DROP TABLE IF EXISTS `0_bom`;

CREATE TABLE IF NOT EXISTS `0_bom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `component` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `workcentre_added` int(11) NOT NULL DEFAULT '0',
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `quantity` double NOT NULL DEFAULT '1',
  PRIMARY KEY (`parent`,`component`,`workcentre_added`,`loc_code`),
  KEY `component` (`component`),
  KEY `id` (`id`),
  KEY `loc_code` (`loc_code`),
  KEY `parent` (`parent`,`loc_code`),
  KEY `workcentre_added` (`workcentre_added`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_bom` ###

INSERT INTO `0_bom` VALUES
('1', '201', '101', '1', 'DEF', '1'),
('2', '201', '102', '1', 'DEF', '1'),
('3', '201', '103', '1', 'DEF', '1'),
('4', '201', '301', '1', 'DEF', '1');

### Structure of table `0_budget_trans` ###

## DROP TABLE IF EXISTS `0_budget_trans`;

CREATE TABLE IF NOT EXISTS `0_budget_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `memo_` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `dimension_id` int(11) DEFAULT '0',
  `dimension2_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Account` (`account`,`tran_date`,`dimension_id`,`dimension2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_budget_trans` ###


### Structure of table `0_chart_class` ###

## DROP TABLE IF EXISTS `0_chart_class`;

CREATE TABLE IF NOT EXISTS `0_chart_class` (
  `cid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ctype` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_chart_class` ###

INSERT INTO `0_chart_class` VALUES
('1', 'Assets', '1', '0'),
('2', 'Liabilities', '2', '0'),
('3', 'Income', '4', '0'),
('4', 'Costs', '6', '0'),
('5', 'Controls', '3', '0');

### Structure of table `0_chart_master` ###

## DROP TABLE IF EXISTS `0_chart_master`;

CREATE TABLE IF NOT EXISTS `0_chart_master` (
  `account_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_code2` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`account_code`),
  KEY `account_name` (`account_name`),
  KEY `accounts_by_type` (`account_type`,`account_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_chart_master` ###

INSERT INTO `0_chart_master` VALUES
('0001', '0001-2', 'test liabilities', '4', '0'),
('1060', '', 'Checking Account', '1', '0'),
('1065', '', 'Petty Cash', '1', '0'),
('1066', '', 'CASH COLLECTION A/C', '1', '0'),
('1200', '', 'Accounts Receivables', '1', '0'),
('1205', '', 'Allowance for doubtful accounts', '1', '0'),
('1510', '', 'Inventory', '2', '0'),
('1520', '', 'Stocks of Raw Materials', '2', '0'),
('1530', '', 'Stocks of Work In Progress', '2', '0'),
('1540', '', 'Stocks of Finished Goods', '2', '0'),
('1550', '', 'Goods Received Clearing account', '2', '0'),
('1820', '', 'Office Furniture &amp; Equipment', '3', '0'),
('1825', '', 'Accum. Amort. -Furn. &amp; Equip.', '3', '0'),
('1840', '', 'Vehicle', '3', '0'),
('1845', '', 'Accum. Amort. -Vehicle', '3', '0'),
('2100', '', 'Accounts Payable', '4', '0'),
('2105', '', 'Deferred Income', '4', '0'),
('2110', '', 'Accrued Income Tax - Federal', '4', '0'),
('2120', '', 'Accrued Income Tax - State', '4', '0'),
('2130', '', 'Accrued Franchise Tax', '4', '0'),
('2140', '', 'Accrued Real &amp; Personal Prop Tax', '4', '0'),
('2150', '', 'Sales Tax', '4', '0'),
('2160', '', 'Accrued Use Tax Payable', '4', '0'),
('2210', '', 'Accrued Wages', '4', '0'),
('2220', '', 'Accrued Comp Time', '4', '0'),
('2230', '', 'Accrued Holiday Pay', '4', '0'),
('2240', '', 'Accrued Vacation Pay', '4', '0'),
('2310', '', 'Accr. Benefits - 401K', '4', '0'),
('2320', '', 'Accr. Benefits - Stock Purchase', '4', '0'),
('2330', '', 'Accr. Benefits - Med, Den', '4', '0'),
('2340', '', 'Accr. Benefits - Payroll Taxes', '4', '0'),
('2350', '', 'Accr. Benefits - Credit Union', '4', '0'),
('2360', '', 'Accr. Benefits - Savings Bond', '4', '0'),
('2370', '', 'Accr. Benefits - Garnish', '4', '0'),
('2380', '', 'Accr. Benefits - Charity Cont.', '4', '0'),
('2620', '', 'Bank Loans', '5', '0'),
('2680', '', 'Loans from Shareholders', '5', '0'),
('3350', '', 'Common Shares', '6', '0'),
('3590', '', 'Retained Earnings - prior years', '7', '0'),
('4010', '', 'Sales', '8', '0'),
('4011', '4011', 'Xray Income', '8', '0'),
('4012', '4012', 'ART THERAPY', '8', '0'),
('4013', '4013', 'BED CHARGES', '8', '0'),
('4014', '', 'Laboratory Services', '8', '0'),
('4015', '', 'Inpatient Income', '14', '0'),
('4016', '', 'CONSULTATION INCOME', '8', '0'),
('4017', '', 'Procedure Income', '8', '0'),
('4018', '', 'Pharmacy Drugs', '8', '0'),
('4418', '', 'NHIF CONTROL', '14', '0'),
('4430', '', 'Shipping &amp; Handling', '9', '0'),
('4440', '', 'Interest', '9', '0'),
('4450', '', 'Foreign Exchange Gain', '9', '0'),
('4500', '', 'Prompt Payment Discounts', '9', '0'),
('4510', '', 'Discounts Given', '9', '0'),
('5010', '', 'Cost of Goods Sold - Retail', '10', '0'),
('5020', '', 'Material Usage Varaiance', '10', '0'),
('5030', '', 'Consumable Materials', '10', '0'),
('5040', '', 'Purchase price Variance', '10', '0'),
('5050', '', 'Purchases of materials', '10', '0'),
('5060', '', 'Discounts Received', '10', '0'),
('5100', '', 'Freight', '10', '0'),
('5410', '', 'Wages &amp; Salaries', '11', '0'),
('5420', '', 'Wages - Overtime', '11', '0'),
('5430', '', 'Benefits - Comp Time', '11', '0'),
('5440', '', 'Benefits - Payroll Taxes', '11', '0'),
('5450', '', 'Benefits - Workers Comp', '11', '0'),
('5460', '', 'Benefits - Pension', '11', '0'),
('5470', '', 'Benefits - General Benefits', '11', '0'),
('5510', '', 'Inc Tax Exp - Federal', '11', '0'),
('5520', '', 'Inc Tax Exp - State', '11', '0'),
('5530', '', 'Taxes - Real Estate', '11', '0'),
('5540', '', 'Taxes - Personal Property', '11', '0'),
('5550', '', 'Taxes - Franchise', '11', '0'),
('5560', '', 'Taxes - Foreign Withholding', '11', '0'),
('5610', '', 'Accounting &amp; Legal', '12', '0'),
('5615', '', 'Advertising &amp; Promotions', '12', '0'),
('5620', '', 'Bad Debts', '12', '0'),
('5660', '', 'Amortization Expense', '12', '0'),
('5685', '', 'Insurance', '12', '0'),
('5690', '', 'Interest &amp; Bank Charges', '12', '0'),
('5700', '', 'Office Supplies', '12', '0'),
('5760', '', 'Rent', '12', '0'),
('5765', '', 'Repair &amp; Maintenance', '12', '0'),
('5780', '', 'Telephone', '12', '0'),
('5785', '', 'Travel &amp; Entertainment', '12', '0'),
('5790', '', 'Utilities', '12', '0'),
('5795', '', 'Registrations', '12', '0'),
('5800', '', 'Licenses', '12', '0'),
('5810', '', 'Foreign Exchange Loss', '12', '0'),
('6000', '6000', 'Yellow Page Advertising', '13', '0'),
('6001', '6001', 'Website Maintenance', '13', '0'),
('6002', '6002', 'Internet Advertising', '13', '0'),
('6003', '6003', 'Direct Mailing', '13', '0'),
('6004', '6004', 'Client Reminders', '13', '0'),
('6005', '6005', 'Memorial Contributions', '13', '0'),
('6006', '6006', 'Sponsored Events', '13', '0'),
('6007', '6007', 'Marketing Consultant Fees', '13', '0'),
('6008', '6008', 'Advertising &amp; Promotion - Other', '13', '0'),
('9990', '', 'Year Profit/Loss', '12', '0');

### Structure of table `0_chart_types` ###

## DROP TABLE IF EXISTS `0_chart_types`;

CREATE TABLE IF NOT EXISTS `0_chart_types` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `class_id` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_chart_types` ###

INSERT INTO `0_chart_types` VALUES
('1', 'Current Assets', '1', '', '0'),
('10', 'Cost of Goods Sold', '4', '', '0'),
('11', 'Payroll Expenses', '4', '', '0'),
('12', 'General &amp; Administrative expenses', '4', '', '0'),
('13', 'Adverrtising &amp; Promotion Expense', '4', '12', '0'),
('14', 'Controls', '5', '', '0'),
('2', 'Inventory Assets', '1', '', '0'),
('3', 'Capital Assets', '1', '', '0'),
('4', 'Current Liabilities', '2', '', '0'),
('5', 'Long Term Liabilities', '2', '', '0'),
('6', 'Share Capital', '2', '', '0'),
('7', 'Retained Earnings', '2', '', '0'),
('8', 'Hospital Income', '3', '', '0'),
('9', 'Other Revenue', '3', '', '0');

### Structure of table `0_comments` ###

## DROP TABLE IF EXISTS `0_comments`;

CREATE TABLE IF NOT EXISTS `0_comments` (
  `type` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `date_` date DEFAULT '0000-00-00',
  `memo_` tinytext COLLATE utf8_unicode_ci,
  KEY `type_and_id` (`type`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_comments` ###

INSERT INTO `0_comments` VALUES
('12', '1', '2018-05-10', 'Cash invoice 1'),
('12', '2', '2018-05-07', 'Cash invoice 2'),
('13', '4', '2018-05-07', 'Recurrent Invoice covers period 04/01/2018 - 04/07/2018.'),
('10', '4', '2018-05-07', 'Recurrent Invoice covers period 04/01/2018 - 04/07/2018.'),
('12', '3', '2018-05-07', 'Cash invoice 4'),
('12', '4', '2019-01-21', 'Default #5'),
('0', '1', '2018-12-31', 'Closing Year'),
('0', '2', '2019-06-30', 'Kjhg'),
('12', '5', '2019-06-30', 'Default #6'),
('12', '6', '2019-06-30', 'Default #7'),
('12', '7', '2019-07-03', 'Default #9'),
('40', '2', '2019-07-19', 'Doctors'),
('16', '1', '2019-08-05', 'Vehicle transferred to Bustani to help in office errands.'),
('4', '1', '2019-08-06', 'fund transfer');

### Structure of table `0_credit_status` ###

## DROP TABLE IF EXISTS `0_credit_status`;

CREATE TABLE IF NOT EXISTS `0_credit_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reason_description` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dissallow_invoices` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `reason_description` (`reason_description`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_credit_status` ###

INSERT INTO `0_credit_status` VALUES
('1', 'Good History', '0', '0'),
('3', 'No more work until payment received', '1', '0'),
('4', 'In liquidation', '1', '0');

### Structure of table `0_crm_categories` ###

## DROP TABLE IF EXISTS `0_crm_categories`;

CREATE TABLE IF NOT EXISTS `0_crm_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'pure technical key',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'contact type e.g. customer',
  `action` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'detailed usage e.g. department',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'for category selector',
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL COMMENT 'usage description',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'nonzero for core system usage',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`,`action`),
  UNIQUE KEY `type_2` (`type`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_crm_categories` ###

INSERT INTO `0_crm_categories` VALUES
('1', 'cust_branch', 'general', 'General', 'General contact data for customer branch (overrides company setting)', '1', '0'),
('2', 'cust_branch', 'invoice', 'Invoices', 'Invoice posting (overrides company setting)', '1', '0'),
('3', 'cust_branch', 'order', 'Orders', 'Order confirmation (overrides company setting)', '1', '0'),
('4', 'cust_branch', 'delivery', 'Deliveries', 'Delivery coordination (overrides company setting)', '1', '0'),
('5', 'customer', 'general', 'General', 'General contact data for customer', '1', '0'),
('6', 'customer', 'order', 'Orders', 'Order confirmation', '1', '0'),
('7', 'customer', 'delivery', 'Deliveries', 'Delivery coordination', '1', '0'),
('8', 'customer', 'invoice', 'Invoices', 'Invoice posting', '1', '0'),
('9', 'supplier', 'general', 'General', 'General contact data for supplier', '1', '0'),
('10', 'supplier', 'order', 'Orders', 'Order confirmation', '1', '0'),
('11', 'supplier', 'delivery', 'Deliveries', 'Delivery coordination', '1', '0'),
('12', 'supplier', 'invoice', 'Invoices', 'Invoice posting', '1', '0');

### Structure of table `0_crm_contacts` ###

## DROP TABLE IF EXISTS `0_crm_contacts`;

CREATE TABLE IF NOT EXISTS `0_crm_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL DEFAULT '0' COMMENT 'foreign key to crm_persons',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'foreign key to crm_categories',
  `action` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'foreign key to crm_categories',
  `entity_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'entity id in related class table',
  PRIMARY KEY (`id`),
  KEY `type` (`type`,`action`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_crm_contacts` ###

INSERT INTO `0_crm_contacts` VALUES
('4', '2', 'supplier', 'general', '2'),
('5', '3', 'cust_branch', 'general', '1'),
('7', '3', 'customer', 'general', '1'),
('8', '1', 'supplier', 'general', '1'),
('9', '4', 'cust_branch', 'general', '2'),
('10', '4', 'customer', 'general', '2'),
('11', '5', 'supplier', 'general', '3'),
('12', '6', 'supplier', 'general', '4'),
('13', '7', 'supplier', 'general', '5'),
('14', '8', 'cust_branch', 'general', '3'),
('15', '8', 'customer', 'general', '3'),
('16', '9', 'supplier', 'general', '6'),
('17', '10', 'cust_branch', 'general', '4'),
('18', '10', 'customer', 'general', '4'),
('19', '11', 'cust_branch', 'general', '5'),
('20', '11', 'customer', 'general', '5');

### Structure of table `0_crm_persons` ###

## DROP TABLE IF EXISTS `0_crm_persons`;

CREATE TABLE IF NOT EXISTS `0_crm_persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name2` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` tinytext COLLATE utf8_unicode_ci,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ref` (`ref`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_crm_persons` ###

INSERT INTO `0_crm_persons` VALUES
('1', 'Dino Saurius', 'John Doe', NULL, 'N/A', NULL, NULL, NULL, NULL, NULL, '', '0'),
('2', 'Beefeater', 'Joe Oversea', NULL, 'N/A', NULL, NULL, NULL, NULL, NULL, '', '0'),
('3', 'Donald Easter', 'Donald Easter LLC', NULL, 'N/A', NULL, NULL, NULL, NULL, NULL, '', '0'),
('4', 'MoneyMaker', 'MoneyMaker Ltd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0'),
('5', 'PSL', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0'),
('6', 'PSL', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0'),
('7', 'PSL', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0'),
('8', 'NHIF', 'National Health Insurance Fund', NULL, 'Nairobi', '0710958791', NULL, NULL, NULL, NULL, '', '0'),
('9', 'DR.WERE', 'DR. WERE', NULL, NULL, '0729446243', '0205065321', '-', 'wereben@yahoo.com', 'C', '', '0'),
('10', 'MADISON', 'MADISON INSURANCE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0'),
('11', 'CASH', 'CASH PAYING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0');

### Structure of table `0_currencies` ###

## DROP TABLE IF EXISTS `0_currencies`;

CREATE TABLE IF NOT EXISTS `0_currencies` (
  `currency` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `curr_abrev` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `curr_symbol` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `hundreds_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `auto_update` tinyint(1) NOT NULL DEFAULT '1',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`curr_abrev`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_currencies` ###

INSERT INTO `0_currencies` VALUES
('Euro', 'EUR', 'â‚¬', 'Europe', 'Cents', '1', '0'),
('Kenya Shilling', 'Ksh', 'Ksh', 'Kenya', 'Ksh', '0', '0'),
('US Dollars', 'USD', '$', 'United States', 'Cents', '1', '0');

### Structure of table `0_cust_allocations` ###

## DROP TABLE IF EXISTS `0_cust_allocations`;

CREATE TABLE IF NOT EXISTS `0_cust_allocations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) DEFAULT NULL,
  `amt` double unsigned DEFAULT NULL,
  `date_alloc` date NOT NULL DEFAULT '0000-00-00',
  `trans_no_from` int(11) DEFAULT NULL,
  `trans_type_from` int(11) DEFAULT NULL,
  `trans_no_to` int(11) DEFAULT NULL,
  `trans_type_to` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trans_type_from` (`person_id`,`trans_type_from`,`trans_no_from`,`trans_type_to`,`trans_no_to`),
  KEY `From` (`trans_type_from`,`trans_no_from`),
  KEY `To` (`trans_type_to`,`trans_no_to`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_cust_allocations` ###

INSERT INTO `0_cust_allocations` VALUES
('1', '1', '6240', '2018-05-10', '1', '12', '1', '10'),
('2', '1', '300', '2018-05-07', '2', '12', '2', '10'),
('3', '1', '0', '2018-05-07', '3', '12', '4', '10'),
('4', '1', '1250', '2019-01-21', '4', '12', '5', '10'),
('5', '3', '30000', '2019-06-30', '5', '12', '6', '10'),
('6', '3', '50000', '2019-06-30', '6', '12', '7', '10'),
('7', '3', '50000', '2019-07-03', '7', '12', '9', '10');

### Structure of table `0_cust_branch` ###

## DROP TABLE IF EXISTS `0_cust_branch`;

CREATE TABLE IF NOT EXISTS `0_cust_branch` (
  `branch_code` int(11) NOT NULL AUTO_INCREMENT,
  `debtor_no` int(11) NOT NULL DEFAULT '0',
  `br_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `branch_ref` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `br_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `area` int(11) DEFAULT NULL,
  `salesman` int(11) NOT NULL DEFAULT '0',
  `default_location` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tax_group_id` int(11) DEFAULT NULL,
  `sales_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sales_discount_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `receivables_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `payment_discount_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `default_ship_via` int(11) NOT NULL DEFAULT '1',
  `br_post_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `group_no` int(11) NOT NULL DEFAULT '0',
  `notes` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `bank_account` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`branch_code`,`debtor_no`),
  KEY `branch_ref` (`branch_ref`),
  KEY `group_no` (`group_no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_cust_branch` ###

INSERT INTO `0_cust_branch` VALUES
('1', '1', 'Donald Easter LLC', 'Donald Easter', 'N/A', '1', '1', 'DEF', '1', '', '4510', '1200', '4500', '1', 'N/A', '0', '', NULL, '0'),
('2', '2', 'MoneyMaker Ltd.', 'MoneyMaker', '', '1', '1', 'DEF', '2', '', '4510', '1200', '4500', '1', '', '0', '', NULL, '0'),
('3', '3', 'National Health Insurance Fund', 'NHIF', 'Nairobi', '1', '1', 'DEF', '1', '', '4510', '1200', '4500', '1', 'Nairobi', '0', '', NULL, '0'),
('4', '4', 'MADISON INSURANCE', 'MADISON', '', '1', '1', 'DEF', '1', '', '4510', '1200', '4500', '1', '', '0', '', NULL, '0'),
('5', '5', 'CASH PAYING', 'CASH', '', '1', '1', 'DEF', '1', '', '4510', '1200', '4500', '1', '', '0', '', NULL, '0');

### Structure of table `0_debtor_trans` ###

## DROP TABLE IF EXISTS `0_debtor_trans`;

CREATE TABLE IF NOT EXISTS `0_debtor_trans` (
  `trans_no` int(11) unsigned NOT NULL DEFAULT '0',
  `type` smallint(6) unsigned NOT NULL DEFAULT '0',
  `version` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `debtor_no` int(11) unsigned NOT NULL,
  `branch_code` int(11) NOT NULL DEFAULT '-1',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  `reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tpe` int(11) NOT NULL DEFAULT '0',
  `order_` int(11) NOT NULL DEFAULT '0',
  `ov_amount` double NOT NULL DEFAULT '0',
  `ov_gst` double NOT NULL DEFAULT '0',
  `ov_freight` double NOT NULL DEFAULT '0',
  `ov_freight_tax` double NOT NULL DEFAULT '0',
  `ov_discount` double NOT NULL DEFAULT '0',
  `alloc` double NOT NULL DEFAULT '0',
  `prep_amount` double NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '1',
  `ship_via` int(11) DEFAULT NULL,
  `dimension_id` int(11) NOT NULL DEFAULT '0',
  `dimension2_id` int(11) NOT NULL DEFAULT '0',
  `payment_terms` int(11) DEFAULT NULL,
  `tax_included` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`type`,`trans_no`,`debtor_no`),
  KEY `debtor_no` (`debtor_no`,`branch_code`),
  KEY `tran_date` (`tran_date`),
  KEY `order_` (`order_`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_debtor_trans` ###

INSERT INTO `0_debtor_trans` VALUES
('0', '0', '0', '3', '3', '2019-07-20', '2019-07-20', 'O116', '0', '0', '115202', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('0', '0', '0', '10', '10', '2019-07-20', '2019-07-20', '123', '0', '0', '1200', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1', '2', '0', '3', '3', '2019-07-20', '0000-00-00', '001/2019', '0', '0', '34000', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', NULL, '0'),
('2', '2', '0', '4', '4', '2019-08-06', '0000-00-00', '002/2019', '0', '0', '70000', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', NULL, '0'),
('0', '3', '0', '3', '3', '2019-07-20', '2019-07-20', 'O117', '0', '0', '115202', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('0', '10', '0', '2', '2', '2019-07-24', '2019-07-24', '1896', '0', '0', '1500', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1', '10', '0', '1', '1', '2018-05-10', '2018-05-05', '001/2018', '1', '1', '6240', '0', '0', '0', '0', '6240', '0', '1', '1', '0', '0', '4', '1'),
('2', '10', '0', '1', '1', '2018-05-07', '2018-05-07', '002/2018', '1', '2', '300', '0', '0', '0', '0', '300', '0', '1', '1', '0', '0', '4', '1'),
('3', '10', '0', '2', '2', '2018-05-07', '2018-06-17', '003/2018', '1', '5', '267.14', '0', '0', '0', '0', '0', '0', '1.123', '1', '1', '0', '1', '1'),
('4', '10', '0', '1', '1', '2018-05-07', '2018-05-07', '004/2018', '1', '7', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '4', '1'),
('5', '10', '0', '1', '1', '2019-01-21', '2019-01-21', '001/2019', '1', '8', '1250', '0', '0', '0', '0', '1250', '0', '1', '1', '0', '0', '4', '1'),
('6', '10', '0', '3', '3', '2019-06-30', '2019-06-30', '002/2019', '1', '9', '30000', '0', '0', '0', '0', '30000', '0', '100', '1', '0', '0', '4', '1'),
('7', '10', '0', '3', '3', '2019-06-30', '2019-06-30', '003/2019', '1', '10', '50000', '0', '0', '0', '0', '50000', '0', '100', '1', '0', '0', '4', '1'),
('8', '10', '0', '3', '3', '2019-07-03', '2019-08-30', '004/2019', '1', '12', '15500', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '2', '1'),
('9', '10', '0', '3', '3', '2019-07-03', '2019-07-03', '005/2019', '1', '13', '50000', '0', '0', '0', '0', '50000', '0', '1', '1', '0', '0', '4', '1'),
('1883', '10', '0', '2', '2', '2019-07-24', '2019-07-24', '1895', '0', '0', '1500', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1885', '10', '0', '1', '1', '2019-07-23', '2019-07-23', 'O123', '0', '0', '500900', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1886', '10', '0', '1', '1', '2019-07-23', '2019-07-23', 'O124', '0', '0', '500900', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1887', '10', '0', '1', '1', '2019-07-23', '2019-07-23', 'O125', '0', '0', '500900', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1894', '10', '0', '2', '2', '2019-07-24', '2019-07-24', '1883', '0', '0', '1500', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1928', '10', '0', '6', '6', '2019-08-06', '2019-08-06', '1928', '0', '0', '36000', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1929', '10', '0', '6', '6', '2019-08-06', '2019-08-06', '1929', '0', '0', '36000', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1930', '10', '0', '6', '6', '2019-08-06', '2019-08-06', '1930', '0', '0', '36000', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1931', '10', '0', '3', '3', '2019-08-06', '2019-08-06', '1931', '0', '0', '36000', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1883000', '10', '0', '2', '2', '2019-07-24', '2019-07-24', '1898', '0', '0', '1500', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1883000', '10', '0', '4', '4', '2019-07-24', '2019-07-24', '1899', '0', '0', '2760', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1884000', '10', '0', '4', '4', '2019-07-24', '2019-07-24', '1902', '0', '0', '1300', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1', '12', '0', '1', '1', '2018-05-10', '0000-00-00', '001/2018', '0', '0', '6240', '0', '0', '0', '0', '6240', '0', '1', '0', '0', '0', NULL, '0'),
('2', '12', '0', '1', '1', '2018-05-07', '0000-00-00', '002/2018', '0', '0', '300', '0', '0', '0', '0', '300', '0', '1', '0', '0', '0', NULL, '0'),
('3', '12', '0', '1', '1', '2018-05-07', '0000-00-00', '003/2018', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', NULL, '0'),
('4', '12', '0', '1', '1', '2019-01-21', '0000-00-00', '001/2019', '0', '0', '1250', '0', '0', '0', '0', '1250', '0', '1', '0', '0', '0', NULL, '0'),
('5', '12', '0', '3', '3', '2019-06-30', '0000-00-00', '002/2019', '0', '0', '30000', '0', '0', '0', '0', '30000', '0', '100', '0', '0', '0', NULL, '0'),
('6', '12', '0', '3', '3', '2019-06-30', '0000-00-00', '003/2019', '0', '0', '50000', '0', '0', '0', '0', '50000', '0', '100', '0', '0', '0', NULL, '0'),
('7', '12', '0', '3', '3', '2019-07-03', '0000-00-00', '004/2019', '0', '0', '50000', '0', '0', '0', '0', '50000', '0', '1', '0', '0', '0', NULL, '0'),
('1', '13', '1', '1', '1', '2018-05-10', '2018-05-05', 'auto', '1', '1', '6240', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '4', '1'),
('2', '13', '1', '1', '1', '2018-05-07', '2018-05-07', 'auto', '1', '2', '300', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '4', '1'),
('3', '13', '1', '2', '2', '2018-05-07', '2018-06-17', 'auto', '1', '5', '267.14', '0', '0', '0', '0', '0', '0', '1.123', '1', '1', '0', '1', '1'),
('4', '13', '1', '1', '1', '2018-05-07', '2018-05-07', 'auto', '1', '7', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '4', '1'),
('5', '13', '1', '1', '1', '2019-01-21', '2019-01-21', 'auto', '1', '8', '1250', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '4', '1'),
('6', '13', '1', '3', '3', '2019-06-30', '2019-06-30', 'auto', '1', '9', '30000', '0', '0', '0', '0', '0', '0', '100', '1', '0', '0', '4', '1'),
('7', '13', '1', '3', '3', '2019-06-30', '2019-06-30', 'auto', '1', '10', '50000', '0', '0', '0', '0', '0', '0', '100', '1', '0', '0', '4', '1'),
('8', '13', '1', '3', '3', '2019-07-03', '2019-08-30', 'auto', '1', '12', '15500', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '2', '1'),
('9', '13', '1', '3', '3', '2019-07-03', '2019-07-03', 'auto', '1', '13', '50000', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '4', '1'),
('1880', '1880', '0', '3', '3', '2019-07-20', '2019-07-20', 'O118', '0', '0', '115202', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1881', '1881', '0', '3', '3', '2019-07-22', '2019-07-22', 'O119', '0', '0', '184102', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1882', '1882', '0', '1', '1', '2019-07-22', '2019-07-22', 'O120', '0', '0', '488900', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1883', '1883', '0', '1', '1', '2019-07-22', '2019-07-22', 'O121', '0', '0', '488900', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0'),
('1884', '1884', '0', '1', '1', '2019-07-23', '2019-07-23', 'O122', '0', '0', '500900', '0', '0', '0', '0', '0', '0', '1', NULL, '0', '0', NULL, '0');

### Structure of table `0_debtor_trans_details` ###

## DROP TABLE IF EXISTS `0_debtor_trans_details`;

CREATE TABLE IF NOT EXISTS `0_debtor_trans_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debtor_trans_no` int(11) DEFAULT NULL,
  `debtor_trans_type` int(11) DEFAULT NULL,
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `unit_price` double NOT NULL DEFAULT '0',
  `unit_tax` double NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `discount_percent` double NOT NULL DEFAULT '0',
  `standard_cost` double NOT NULL DEFAULT '0',
  `qty_done` double NOT NULL DEFAULT '0',
  `src_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Transaction` (`debtor_trans_type`,`debtor_trans_no`),
  KEY `src_id` (`src_id`)
) ENGINE=InnoDB AUTO_INCREMENT=776 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_debtor_trans_details` ###

INSERT INTO `0_debtor_trans_details` VALUES
('1', '1', '13', '101', 'iPad Air 2 16GB', '300', '14.29', '20', '0', '200', '20', '1'),
('2', '1', '13', '301', 'Support', '80', '3.81', '3', '0', '0', '3', '2'),
('3', '1', '10', '101', 'iPad Air 2 16GB', '300', '14.2855', '20', '0', '200', '0', '1'),
('4', '1', '10', '301', 'Support', '80', '3.81', '3', '0', '0', '0', '2'),
('5', '2', '13', '101', 'iPad Air 2 16GB', '300', '14.29', '1', '0', '200', '1', '3'),
('6', '2', '10', '101', 'iPad Air 2 16GB', '300', '14.29', '1', '0', '200', '0', '5'),
('7', '3', '13', '102', 'iPhone 6 64GB', '222.62', '0', '1', '0', '150', '1', '7'),
('8', '3', '13', '103', 'iPhone Cover Case', '44.52', '0', '1', '0', '10', '1', '8'),
('9', '3', '10', '102', 'iPhone 6 64GB', '222.62', '0', '1', '0', '150', '0', '7'),
('10', '3', '10', '103', 'iPhone Cover Case', '44.52', '0', '1', '0', '10', '0', '8'),
('11', '4', '13', '202', 'Maintenance', '0', '0', '5', '0', '0', '5', '10'),
('12', '4', '10', '202', 'Maintenance', '0', '0', '5', '0', '0', '0', '11'),
('13', '5', '13', '102', 'iPhone 6 64GB', '250', '11.904', '5', '0', '150', '5', '11'),
('14', '5', '10', '102', 'iPhone 6 64GB', '250', '11.904', '5', '0', '150', '0', '13'),
('15', '6', '13', '202', 'Maintenance', '30000', '1428.57', '1', '0', '0', '1', '12'),
('16', '6', '10', '202', 'Maintenance', '30000', '1428.57', '1', '0', '0', '0', '15'),
('17', '7', '13', '301', 'Support', '50000', '2380.95', '1', '0', '0', '1', '13'),
('18', '7', '10', '301', 'Support', '50000', '2380.95', '1', '0', '0', '0', '17'),
('19', '8', '13', '301', 'Support', '13000', '619.05', '1', '0', '0', '1', '15'),
('20', '8', '13', '102', 'iPhone 6 64GB', '250', '11.905', '10', '0', '150', '10', '16'),
('21', '8', '10', '301', 'Support', '13000', '619.05', '1', '0', '0', '0', '19'),
('22', '8', '10', '102', 'iPhone 6 64GB', '250', '11.905', '10', '0', '150', '0', '20'),
('23', '9', '13', 'GL001', 'Gloves Pair', '500', '0', '100', '0', '300', '100', '17'),
('24', '9', '10', 'GL001', 'Gloves Pair', '500', '0', '100', '0', '300', '0', '23'),
('25', NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', '0'),
('26', '1880', '1880', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('27', '1880', '1880', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('28', '1880', '1880', 'TRF', 'Oxygen Administration Per HOUR', '250', '0', '24', '0', '0', '24', '10'),
('29', '1880', '1880', 'TRF', 'DOCTORS FEE', '25000', '0', '1', '0', '0', '1', '10'),
('30', '1880', '1880', 'TRF', 'Nursing Fee', '2000', '0', '2', '0', '0', '2', '10'),
('31', '1880', '1880', 'TRF', 'Insurance Consultation', '1000', '0', '1', '0', '0', '1', '10'),
('32', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('33', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('34', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('35', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('36', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('37', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('38', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('39', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('40', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('41', '1880', '1880', 'TRF', 'DOCTORS FEE', '-25000', '0', '1', '0', '0', '1', '10'),
('42', '1880', '1880', 'TRF', 'Daily Bed Charges', '-2500', '0', '10', '0', '0', '10', '10'),
('43', '1880', '1880', 'TRF', 'Daily Bed Charges', '2500', '0', '10', '0', '0', '10', '10'),
('44', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('45', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('46', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('47', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('48', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('49', '1880', '1880', 'TRF', 'Bs for malaria', '100', '0', '2', '0', '0', '2', '10'),
('50', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('51', '1880', '1880', 'TRF', 'Paracetamol BP 500mg Tablets', '1', '0', '2', '0', '0', '2', '10'),
('52', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('53', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('54', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('55', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('56', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('57', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('58', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('59', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('60', '1880', '1880', 'TRF', 'CHEQUES', '-50000', '0', '0', '0', '0', '0', '10'),
('61', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('62', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('63', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('64', '1880', '1880', 'TRF', 'Stitching', '2000', '0', '2', '0', '0', '2', '10'),
('65', '1880', '1880', 'TRF', 'M-PESA', '-3355', '0', '0', '0', '0', '0', '10'),
('66', '1880', '1880', 'TRF', 'Albendazole Tablets USP 400mg', '30', '0', '1', '0', '0', '1', '10'),
('67', '1880', '1880', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('68', '1880', '1880', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '3', '0', '0', '3', '10'),
('69', '1880', '1880', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('70', '1880', '1880', 'TRF', 'Aminophyllin Injection BP 250mg / 10ml', '100', '0', '1', '0', '0', '1', '10'),
('71', '1880', '1880', 'TRF', 'Albendazole Tablets USP 400mg', '30', '0', '2', '0', '0', '2', '10'),
('72', '1880', '1880', 'TRF', 'Deworming &amp; vitamin A', '500', '0', '1', '0', '0', '1', '10'),
('73', '1880', '1880', 'TRF', 'GLOVES', '315', '0', '1', '0', '0', '1', '10'),
('74', '1880', '1880', 'TRF', 'Suture Pack', '3000', '0', '1', '0', '0', '1', '10'),
('75', '1880', '1880', 'TRF', 'Nursing Fee', '2000', '0', '2', '0', '0', '2', '10'),
('76', '1880', '1880', 'TRF', 'DOCTORS FEE', '25000', '0', '1', '0', '0', '1', '10'),
('77', '1880', '1880', 'TRF', 'CHEQUES', '-43000', '0', '0', '0', '0', '0', '10'),
('78', '1880', '1880', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('79', '1881', '1881', 'TRF', 'bloodgrouping', '200', '0', '1', '0', '0', '1', '10'),
('80', '1881', '1881', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('81', '1881', '1881', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('82', '1881', '1881', 'TRF', 'Lab UECS', '1500', '0', '1', '0', '0', '1', '10'),
('83', '1881', '1881', 'TRF', 'Amoxicilline BP 250 mg/5ml 100ml', '150', '0', '3', '0', '0', '3', '10'),
('84', '1881', '1881', 'TRF', 'Paracetamol BP 500mg Tablets', '1', '0', '2', '0', '0', '2', '10'),
('85', '1881', '1881', 'TRF', 'Clotrimazole Pessaries 200mg', '50', '0', '17', '0', '0', '17', '10'),
('86', '1881', '1881', 'TRF', 'Nursing Fee', '2000', '0', '1', '0', '0', '1', '10'),
('87', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '2000', '0', '1', '0', '0', '1', '10'),
('88', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('89', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('90', '1881', '1881', 'TRF', 'M-PESA', '-102', '0', '0', '0', '0', '0', '10'),
('91', '1881', '1881', 'TRF', 'DR FEE', '25000', '0', '1', '0', '0', '1', '10'),
('92', '1881', '1881', 'TRF', 'injection', '200', '0', '10', '0', '0', '10', '10'),
('93', '1881', '1881', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('94', '1881', '1881', 'TRF', 'suturing under local ANAESTHESIA', '1500', '0', '1', '0', '0', '1', '10'),
('95', '1881', '1881', 'TRF', 'CHEQUES', '-20000', '0', '0', '0', '0', '0', '10'),
('96', '1881', '1881', 'TRF', 'M-PESA', '-6000', '0', '0', '0', '0', '0', '10'),
('97', '1881', '1881', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('98', '1881', '1881', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('99', '1881', '1881', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('100', '1881', '1881', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('101', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('102', '1881', '1881', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('103', '1881', '1881', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('104', '1881', '1881', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('105', '1881', '1881', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('106', '1881', '1881', 'TRF', 'ESR', '200', '0', '1', '0', '0', '1', '10'),
('107', '1881', '1881', 'TRF', 'PSA levels', '2200', '0', '1', '0', '0', '1', '10'),
('108', '1881', '1881', 'TRF', 'Blood Sugar', '100', '0', '1', '0', '0', '1', '10'),
('109', '1881', '1881', 'TRF', 'Full Haemogram', '500', '0', '1', '0', '0', '1', '10'),
('110', '1881', '1881', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('111', '1881', '1881', 'TRF', 'Acetaminophen Suppositories USP 250', '30', '0', '3', '0', '0', '3', '10'),
('112', '1881', '1881', 'TRF', 'Dicl/Par/Chlo 50/325/250mg Tablets', '10', '0', '3', '0', '0', '3', '10'),
('113', '1881', '1881', 'TRF', 'Stomacid', '2', '0', '2', '0', '0', '2', '10'),
('114', '1881', '1881', 'TRF', 'Cash Receipts', '-4224', '0', '0', '0', '0', '0', '10'),
('115', '1881', '1881', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('116', '1881', '1881', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('117', '1881', '1881', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('118', '1881', '1881', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('119', '1881', '1881', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('120', '1881', '1881', 'TRF', 'M-PESA', '-3350', '0', '0', '0', '0', '0', '10'),
('121', '1881', '1881', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('122', '1881', '1881', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('123', '1881', '1881', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('124', '1881', '1881', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('125', '1881', '1881', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('126', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('127', '1881', '1881', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('128', '1881', '1881', 'TRF', 'Blood Transfusion', '1500', '0', '1', '0', '0', '1', '10'),
('129', '1881', '1881', 'TRF', 'Oxygen Administration Per HOUR', '250', '0', '48', '0', '0', '48', '10'),
('130', '1881', '1881', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('131', '1881', '1881', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('132', '1881', '1881', 'TRF', 'Oxygen Administration Per HOUR', '250', '0', '24', '0', '0', '24', '10'),
('133', '1881', '1881', 'TRF', 'DOCTORS FEE', '25000', '0', '1', '0', '0', '1', '10'),
('134', '1881', '1881', 'TRF', 'Nursing Fee', '2000', '0', '2', '0', '0', '2', '10'),
('135', '1881', '1881', 'TRF', 'Insurance Consultation', '1000', '0', '1', '0', '0', '1', '10'),
('136', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('137', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('138', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('139', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('140', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('141', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('142', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('143', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('144', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('145', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('146', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('147', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('148', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('149', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('150', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('151', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('152', '1881', '1881', 'TRF', 'Cash Receipts', '-200000', '0', '0', '0', '0', '0', '10'),
('153', '1881', '1881', 'TRF', 'Daily Bed Charges', '6000', '0', '10', '0', '0', '10', '10'),
('154', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('155', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('156', '1881', '1881', 'TRF', 'DOCTORS FEE', '-25000', '0', '1', '0', '0', '1', '10'),
('157', '1881', '1881', 'TRF', 'Daily Bed Charges', '-2500', '0', '10', '0', '0', '10', '10'),
('158', '1881', '1881', 'TRF', 'Daily Bed Charges', '2500', '0', '10', '0', '0', '10', '10'),
('159', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('160', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('161', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('162', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('163', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('164', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('165', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('166', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('167', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('168', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('169', '1881', '1881', 'TRF', 'Bs for malaria', '100', '0', '2', '0', '0', '2', '10'),
('170', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('171', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('172', '1881', '1881', 'TRF', 'Paracetamol BP 500mg Tablets', '1', '0', '2', '0', '0', '2', '10'),
('173', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('174', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('175', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('176', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('177', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('178', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('179', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('180', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('181', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('182', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('183', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('184', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('185', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('186', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('187', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('188', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('189', '1881', '1881', 'TRF', 'CHEQUES', '-50000', '0', '0', '0', '0', '0', '10'),
('190', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('191', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('192', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('193', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('194', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('195', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('196', '1881', '1881', 'TRF', 'Cash Receipts', '-1900', '0', '0', '0', '0', '0', '10'),
('197', '1881', '1881', 'TRF', 'Stitching', '2000', '0', '2', '0', '0', '2', '10'),
('198', '1881', '1881', 'TRF', 'M-PESA', '-3355', '0', '0', '0', '0', '0', '10'),
('199', '1881', '1881', 'TRF', 'Albendazole Tablets USP 400mg', '30', '0', '1', '0', '0', '1', '10'),
('200', '1881', '1881', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('201', '1881', '1881', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '3', '0', '0', '3', '10'),
('202', '1881', '1881', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('203', '1881', '1881', 'TRF', 'Aminophyllin Injection BP 250mg / 10ml', '100', '0', '1', '0', '0', '1', '10'),
('204', '1881', '1881', 'TRF', 'Albendazole Tablets USP 400mg', '30', '0', '2', '0', '0', '2', '10'),
('205', '1881', '1881', 'TRF', 'Aminosidine syrup 60ml', '200', '0', '1', '0', '0', '1', '10'),
('206', '1881', '1881', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('207', '1881', '1881', 'TRF', 'Deworming &amp; vitamin A', '500', '0', '1', '0', '0', '1', '10'),
('208', '1881', '1881', 'TRF', 'GLOVES', '315', '0', '1', '0', '0', '1', '10'),
('209', '1881', '1881', 'TRF', 'Suture Pack', '3000', '0', '1', '0', '0', '1', '10'),
('210', '1881', '1881', 'TRF', 'Nursing Fee', '2000', '0', '2', '0', '0', '2', '10'),
('211', '1881', '1881', 'TRF', 'DOCTORS FEE', '25000', '0', '1', '0', '0', '1', '10'),
('212', '1881', '1881', 'TRF', 'CHEQUES', '-43000', '0', '0', '0', '0', '0', '10'),
('213', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('214', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('215', '1881', '1881', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('216', '1881', '1881', 'TRF', 'Baby Weighing', '100', '0', '1', '0', '0', '1', '10'),
('217', '1881', '1881', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('218', '1881', '1881', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('219', '1881', '1881', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('220', '1881', '1881', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('221', '1881', '1881', 'TRF', 'CRP Cash', '2000', '0', '1', '0', '0', '1', '10'),
('222', '1882', '1882', 'TRF', 'bloodgrouping', '200', '0', '1', '0', '0', '1', '10'),
('223', '1882', '1882', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('224', '1882', '1882', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('225', '1882', '1882', 'TRF', 'Lab UECS', '1500', '0', '1', '0', '0', '1', '10'),
('226', '1882', '1882', 'TRF', 'Amoxicilline BP 250 mg/5ml 100ml', '150', '0', '3', '0', '0', '3', '10'),
('227', '1882', '1882', 'TRF', 'Paracetamol BP 500mg Tablets', '1', '0', '2', '0', '0', '2', '10'),
('228', '1882', '1882', 'TRF', 'Clotrimazole Pessaries 200mg', '50', '0', '17', '0', '0', '17', '10'),
('229', '1882', '1882', 'TRF', 'Nursing Fee', '2000', '0', '1', '0', '0', '1', '10'),
('230', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '2000', '0', '1', '0', '0', '1', '10'),
('231', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('232', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('233', '1882', '1882', 'TRF', 'M-PESA', '-102', '0', '0', '0', '0', '0', '10'),
('234', '1882', '1882', 'TRF', 'DR FEE', '25000', '0', '1', '0', '0', '1', '10'),
('235', '1882', '1882', 'TRF', 'injection', '200', '0', '10', '0', '0', '10', '10'),
('236', '1882', '1882', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('237', '1882', '1882', 'TRF', 'suturing under local ANAESTHESIA', '1500', '0', '1', '0', '0', '1', '10'),
('238', '1882', '1882', 'TRF', 'CHEQUES', '-20000', '0', '0', '0', '0', '0', '10'),
('239', '1882', '1882', 'TRF', 'M-PESA', '-6000', '0', '0', '0', '0', '0', '10'),
('240', '1882', '1882', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('241', '1882', '1882', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('242', '1882', '1882', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('243', '1882', '1882', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('244', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('245', '1882', '1882', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('246', '1882', '1882', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('247', '1882', '1882', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('248', '1882', '1882', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('249', '1882', '1882', 'TRF', 'ESR', '200', '0', '1', '0', '0', '1', '10'),
('250', '1882', '1882', 'TRF', 'PSA levels', '2200', '0', '1', '0', '0', '1', '10'),
('251', '1882', '1882', 'TRF', 'Blood Sugar', '100', '0', '1', '0', '0', '1', '10'),
('252', '1882', '1882', 'TRF', 'Full Haemogram', '500', '0', '1', '0', '0', '1', '10'),
('253', '1882', '1882', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('254', '1882', '1882', 'TRF', 'Acetaminophen Suppositories USP 250', '30', '0', '3', '0', '0', '3', '10'),
('255', '1882', '1882', 'TRF', 'Dicl/Par/Chlo 50/325/250mg Tablets', '10', '0', '3', '0', '0', '3', '10'),
('256', '1882', '1882', 'TRF', 'Stomacid', '2', '0', '2', '0', '0', '2', '10'),
('257', '1882', '1882', 'TRF', 'Cash Receipts', '-4224', '0', '0', '0', '0', '0', '10'),
('258', '1882', '1882', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('259', '1882', '1882', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('260', '1882', '1882', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('261', '1882', '1882', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('262', '1882', '1882', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('263', '1882', '1882', 'TRF', 'M-PESA', '-3350', '0', '0', '0', '0', '0', '10'),
('264', '1882', '1882', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('265', '1882', '1882', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('266', '1882', '1882', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('267', '1882', '1882', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('268', '1882', '1882', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('269', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('270', '1882', '1882', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('271', '1882', '1882', 'TRF', 'Blood Transfusion', '1500', '0', '1', '0', '0', '1', '10'),
('272', '1882', '1882', 'TRF', 'Oxygen Administration Per HOUR', '250', '0', '48', '0', '0', '48', '10'),
('273', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('274', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('275', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('276', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('277', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('278', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('279', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('280', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('281', '1882', '1882', 'TRF', 'Cash Receipts', '-200000', '0', '0', '0', '0', '0', '10'),
('282', '1882', '1882', 'TRF', 'Daily Bed Charges', '6000', '0', '10', '0', '0', '10', '10'),
('283', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('284', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('285', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('286', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('287', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('288', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('289', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('290', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('291', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('292', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('293', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('294', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('295', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('296', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('297', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('298', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('299', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('300', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('301', '1882', '1882', 'TRF', 'Cash Receipts', '-1900', '0', '0', '0', '0', '0', '10'),
('302', '1882', '1882', 'TRF', 'Aminosidine syrup 60ml', '200', '0', '1', '0', '0', '1', '10'),
('303', '1882', '1882', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('304', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('305', '1882', '1882', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('306', '1882', '1882', 'TRF', 'Baby Weighing', '100', '0', '1', '0', '0', '1', '10'),
('307', '1882', '1882', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('308', '1882', '1882', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('309', '1882', '1882', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('310', '1882', '1882', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('311', '1882', '1882', 'TRF', 'CRP Cash', '2000', '0', '1', '0', '0', '1', '10'),
('312', '1882', '1882', 'TRF', 'CRP Cash', '420000', '0', '1', '0', '0', '1', '10'),
('313', '1883', '1883', 'TRF', 'bloodgrouping', '200', '0', '1', '0', '0', '1', '10'),
('314', '1883', '1883', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('315', '1883', '1883', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('316', '1883', '1883', 'TRF', 'Lab UECS', '1500', '0', '1', '0', '0', '1', '10'),
('317', '1883', '1883', 'TRF', 'Amoxicilline BP 250 mg/5ml 100ml', '150', '0', '3', '0', '0', '3', '10'),
('318', '1883', '1883', 'TRF', 'Paracetamol BP 500mg Tablets', '1', '0', '2', '0', '0', '2', '10'),
('319', '1883', '1883', 'TRF', 'Clotrimazole Pessaries 200mg', '50', '0', '17', '0', '0', '17', '10'),
('320', '1883', '1883', 'TRF', 'Nursing Fee', '2000', '0', '1', '0', '0', '1', '10'),
('321', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '2000', '0', '1', '0', '0', '1', '10'),
('322', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('323', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('324', '1883', '1883', 'TRF', 'M-PESA', '-102', '0', '0', '0', '0', '0', '10'),
('325', '1883', '1883', 'TRF', 'DR FEE', '25000', '0', '1', '0', '0', '1', '10'),
('326', '1883', '1883', 'TRF', 'injection', '200', '0', '10', '0', '0', '10', '10'),
('327', '1883', '1883', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('328', '1883', '1883', 'TRF', 'suturing under local ANAESTHESIA', '1500', '0', '1', '0', '0', '1', '10'),
('329', '1883', '1883', 'TRF', 'CHEQUES', '-20000', '0', '0', '0', '0', '0', '10'),
('330', '1883', '1883', 'TRF', 'M-PESA', '-6000', '0', '0', '0', '0', '0', '10'),
('331', '1883', '1883', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('332', '1883', '1883', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('333', '1883', '1883', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('334', '1883', '1883', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('335', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('336', '1883', '1883', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('337', '1883', '1883', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('338', '1883', '1883', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('339', '1883', '1883', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('340', '1883', '1883', 'TRF', 'ESR', '200', '0', '1', '0', '0', '1', '10'),
('341', '1883', '1883', 'TRF', 'PSA levels', '2200', '0', '1', '0', '0', '1', '10'),
('342', '1883', '1883', 'TRF', 'Blood Sugar', '100', '0', '1', '0', '0', '1', '10'),
('343', '1883', '1883', 'TRF', 'Full Haemogram', '500', '0', '1', '0', '0', '1', '10'),
('344', '1883', '1883', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('345', '1883', '1883', 'TRF', 'Acetaminophen Suppositories USP 250', '30', '0', '3', '0', '0', '3', '10'),
('346', '1883', '1883', 'TRF', 'Dicl/Par/Chlo 50/325/250mg Tablets', '10', '0', '3', '0', '0', '3', '10'),
('347', '1883', '1883', 'TRF', 'Stomacid', '2', '0', '2', '0', '0', '2', '10'),
('348', '1883', '1883', 'TRF', 'Cash Receipts', '-4224', '0', '0', '0', '0', '0', '10'),
('349', '1883', '1883', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('350', '1883', '1883', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('351', '1883', '1883', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('352', '1883', '1883', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('353', '1883', '1883', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('354', '1883', '1883', 'TRF', 'M-PESA', '-3350', '0', '0', '0', '0', '0', '10'),
('355', '1883', '1883', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('356', '1883', '1883', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('357', '1883', '1883', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('358', '1883', '1883', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('359', '1883', '1883', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('360', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('361', '1883', '1883', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('362', '1883', '1883', 'TRF', 'Blood Transfusion', '1500', '0', '1', '0', '0', '1', '10'),
('363', '1883', '1883', 'TRF', 'Oxygen Administration Per HOUR', '250', '0', '48', '0', '0', '48', '10'),
('364', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('365', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('366', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('367', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('368', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('369', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('370', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('371', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('372', '1883', '1883', 'TRF', 'Cash Receipts', '-200000', '0', '0', '0', '0', '0', '10'),
('373', '1883', '1883', 'TRF', 'Daily Bed Charges', '6000', '0', '10', '0', '0', '10', '10'),
('374', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('375', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('376', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('377', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('378', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('379', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('380', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('381', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('382', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('383', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('384', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('385', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('386', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('387', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('388', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('389', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('390', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('391', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('392', '1883', '1883', 'TRF', 'Cash Receipts', '-1900', '0', '0', '0', '0', '0', '10'),
('393', '1883', '1883', 'TRF', 'Aminosidine syrup 60ml', '200', '0', '1', '0', '0', '1', '10'),
('394', '1883', '1883', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('395', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('396', '1883', '1883', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('397', '1883', '1883', 'TRF', 'Baby Weighing', '100', '0', '1', '0', '0', '1', '10'),
('398', '1883', '1883', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('399', '1883', '1883', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('400', '1883', '1883', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('401', '1883', '1883', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('402', '1883', '1883', 'TRF', 'CRP Cash', '2000', '0', '1', '0', '0', '1', '10'),
('403', '1883', '1883', 'TRF', 'CRP Cash', '420000', '0', '1', '0', '0', '1', '10'),
('404', '1884', '1884', 'TRF', 'bloodgrouping', '200', '0', '1', '0', '0', '1', '10'),
('405', '1884', '1884', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('406', '1884', '1884', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('407', '1884', '1884', 'TRF', 'Lab UECS', '1500', '0', '1', '0', '0', '1', '10'),
('408', '1884', '1884', 'TRF', 'Amoxicilline BP 250 mg/5ml 100ml', '150', '0', '3', '0', '0', '3', '10'),
('409', '1884', '1884', 'TRF', 'Paracetamol BP 500mg Tablets', '1', '0', '2', '0', '0', '2', '10'),
('410', '1884', '1884', 'TRF', 'Clotrimazole Pessaries 200mg', '50', '0', '17', '0', '0', '17', '10'),
('411', '1884', '1884', 'TRF', 'Nursing Fee', '2000', '0', '1', '0', '0', '1', '10'),
('412', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '2000', '0', '1', '0', '0', '1', '10'),
('413', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('414', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('415', '1884', '1884', 'TRF', 'M-PESA', '-102', '0', '0', '0', '0', '0', '10'),
('416', '1884', '1884', 'TRF', 'DR FEE', '25000', '0', '1', '0', '0', '1', '10'),
('417', '1884', '1884', 'TRF', 'injection', '200', '0', '10', '0', '0', '10', '10'),
('418', '1884', '1884', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('419', '1884', '1884', 'TRF', 'suturing under local ANAESTHESIA', '1500', '0', '1', '0', '0', '1', '10'),
('420', '1884', '1884', 'TRF', 'CHEQUES', '-20000', '0', '0', '0', '0', '0', '10'),
('421', '1884', '1884', 'TRF', 'M-PESA', '-6000', '0', '0', '0', '0', '0', '10'),
('422', '1884', '1884', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('423', '1884', '1884', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('424', '1884', '1884', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('425', '1884', '1884', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('426', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('427', '1884', '1884', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('428', '1884', '1884', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('429', '1884', '1884', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('430', '1884', '1884', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('431', '1884', '1884', 'TRF', 'ESR', '200', '0', '1', '0', '0', '1', '10'),
('432', '1884', '1884', 'TRF', 'PSA levels', '2200', '0', '1', '0', '0', '1', '10'),
('433', '1884', '1884', 'TRF', 'Blood Sugar', '100', '0', '1', '0', '0', '1', '10'),
('434', '1884', '1884', 'TRF', 'Full Haemogram', '500', '0', '1', '0', '0', '1', '10'),
('435', '1884', '1884', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('436', '1884', '1884', 'TRF', 'Acetaminophen Suppositories USP 250', '30', '0', '3', '0', '0', '3', '10'),
('437', '1884', '1884', 'TRF', 'Dicl/Par/Chlo 50/325/250mg Tablets', '10', '0', '3', '0', '0', '3', '10'),
('438', '1884', '1884', 'TRF', 'Stomacid', '2', '0', '2', '0', '0', '2', '10'),
('439', '1884', '1884', 'TRF', 'Cash Receipts', '-4224', '0', '0', '0', '0', '0', '10'),
('440', '1884', '1884', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('441', '1884', '1884', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('442', '1884', '1884', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('443', '1884', '1884', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('444', '1884', '1884', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('445', '1884', '1884', 'TRF', 'M-PESA', '-3350', '0', '0', '0', '0', '0', '10'),
('446', '1884', '1884', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('447', '1884', '1884', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('448', '1884', '1884', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('449', '1884', '1884', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('450', '1884', '1884', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('451', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('452', '1884', '1884', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('453', '1884', '1884', 'TRF', 'Blood Transfusion', '1500', '0', '1', '0', '0', '1', '10'),
('454', '1884', '1884', 'TRF', 'Oxygen Administration Per HOUR', '250', '0', '48', '0', '0', '48', '10'),
('455', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('456', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('457', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('458', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('459', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('460', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('461', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('462', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('463', '1884', '1884', 'TRF', 'Cash Receipts', '-200000', '0', '0', '0', '0', '0', '10'),
('464', '1884', '1884', 'TRF', 'Daily Bed Charges', '6000', '0', '10', '0', '0', '10', '10'),
('465', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('466', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('467', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('468', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('469', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('470', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('471', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('472', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('473', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('474', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('475', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('476', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('477', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('478', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('479', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('480', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('481', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('482', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('483', '1884', '1884', 'TRF', 'Cash Receipts', '-1900', '0', '0', '0', '0', '0', '10'),
('484', '1884', '1884', 'TRF', 'Aminosidine syrup 60ml', '200', '0', '1', '0', '0', '1', '10'),
('485', '1884', '1884', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('486', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('487', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('488', '1884', '1884', 'TRF', 'Baby Weighing', '100', '0', '1', '0', '0', '1', '10'),
('489', '1884', '1884', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('490', '1884', '1884', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('491', '1884', '1884', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('492', '1884', '1884', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('493', '1884', '1884', 'TRF', 'CRP Cash', '2000', '0', '1', '0', '0', '1', '10'),
('494', '1884', '1884', 'TRF', 'CRP Cash', '420000', '0', '1', '0', '0', '1', '10'),
('495', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('496', '1884', '1884', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('497', '1885', '1885', 'TRF', 'bloodgrouping', '200', '0', '1', '0', '0', '1', '10'),
('498', '1885', '1885', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('499', '1885', '1885', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('500', '1885', '1885', 'TRF', 'Lab UECS', '1500', '0', '1', '0', '0', '1', '10'),
('501', '1885', '1885', 'TRF', 'Amoxicilline BP 250 mg/5ml 100ml', '150', '0', '3', '0', '0', '3', '10'),
('502', '1885', '1885', 'TRF', 'Paracetamol BP 500mg Tablets', '1', '0', '2', '0', '0', '2', '10'),
('503', '1885', '1885', 'TRF', 'Clotrimazole Pessaries 200mg', '50', '0', '17', '0', '0', '17', '10'),
('504', '1885', '1885', 'TRF', 'Nursing Fee', '2000', '0', '1', '0', '0', '1', '10'),
('505', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '2000', '0', '1', '0', '0', '1', '10'),
('506', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('507', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('508', '1885', '1885', 'TRF', 'M-PESA', '-102', '0', '0', '0', '0', '0', '10'),
('509', '1885', '1885', 'TRF', 'DR FEE', '25000', '0', '1', '0', '0', '1', '10'),
('510', '1885', '1885', 'TRF', 'injection', '200', '0', '10', '0', '0', '10', '10'),
('511', '1885', '1885', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('512', '1885', '1885', 'TRF', 'suturing under local ANAESTHESIA', '1500', '0', '1', '0', '0', '1', '10'),
('513', '1885', '1885', 'TRF', 'CHEQUES', '-20000', '0', '0', '0', '0', '0', '10'),
('514', '1885', '1885', 'TRF', 'M-PESA', '-6000', '0', '0', '0', '0', '0', '10'),
('515', '1885', '1885', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('516', '1885', '1885', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('517', '1885', '1885', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('518', '1885', '1885', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('519', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('520', '1885', '1885', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('521', '1885', '1885', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('522', '1885', '1885', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('523', '1885', '1885', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('524', '1885', '1885', 'TRF', 'ESR', '200', '0', '1', '0', '0', '1', '10'),
('525', '1885', '1885', 'TRF', 'PSA levels', '2200', '0', '1', '0', '0', '1', '10'),
('526', '1885', '1885', 'TRF', 'Blood Sugar', '100', '0', '1', '0', '0', '1', '10'),
('527', '1885', '1885', 'TRF', 'Full Haemogram', '500', '0', '1', '0', '0', '1', '10'),
('528', '1885', '1885', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('529', '1885', '1885', 'TRF', 'Acetaminophen Suppositories USP 250', '30', '0', '3', '0', '0', '3', '10'),
('530', '1885', '1885', 'TRF', 'Dicl/Par/Chlo 50/325/250mg Tablets', '10', '0', '3', '0', '0', '3', '10'),
('531', '1885', '1885', 'TRF', 'Stomacid', '2', '0', '2', '0', '0', '2', '10'),
('532', '1885', '1885', 'TRF', 'Cash Receipts', '-4224', '0', '0', '0', '0', '0', '10'),
('533', '1885', '1885', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('534', '1885', '1885', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('535', '1885', '1885', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('536', '1885', '1885', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('537', '1885', '1885', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('538', '1885', '1885', 'TRF', 'M-PESA', '-3350', '0', '0', '0', '0', '0', '10'),
('539', '1885', '1885', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('540', '1885', '1885', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('541', '1885', '1885', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('542', '1885', '1885', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('543', '1885', '1885', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('544', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('545', '1885', '1885', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('546', '1885', '1885', 'TRF', 'Blood Transfusion', '1500', '0', '1', '0', '0', '1', '10'),
('547', '1885', '1885', 'TRF', 'Oxygen Administration Per HOUR', '250', '0', '48', '0', '0', '48', '10'),
('548', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('549', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('550', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('551', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('552', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('553', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('554', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('555', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('556', '1885', '1885', 'TRF', 'Cash Receipts', '-200000', '0', '0', '0', '0', '0', '10'),
('557', '1885', '1885', 'TRF', 'Daily Bed Charges', '6000', '0', '10', '0', '0', '10', '10'),
('558', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('559', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('560', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('561', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('562', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('563', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('564', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('565', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('566', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10');
INSERT INTO `0_debtor_trans_details` VALUES
('567', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('568', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('569', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('570', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('571', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('572', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('573', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('574', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('575', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('576', '1885', '1885', 'TRF', 'Cash Receipts', '-1900', '0', '0', '0', '0', '0', '10'),
('577', '1885', '1885', 'TRF', 'Aminosidine syrup 60ml', '200', '0', '1', '0', '0', '1', '10'),
('578', '1885', '1885', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('579', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('580', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('581', '1885', '1885', 'TRF', 'Baby Weighing', '100', '0', '1', '0', '0', '1', '10'),
('582', '1885', '1885', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('583', '1885', '1885', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('584', '1885', '1885', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('585', '1885', '1885', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('586', '1885', '1885', 'TRF', 'CRP Cash', '2000', '0', '1', '0', '0', '1', '10'),
('587', '1885', '1885', 'TRF', 'CRP Cash', '420000', '0', '1', '0', '0', '1', '10'),
('588', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('589', '1885', '1885', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('590', '1886', '1886', 'TRF', 'bloodgrouping', '200', '0', '1', '0', '0', '1', '10'),
('591', '1886', '1886', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('592', '1886', '1886', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('593', '1886', '1886', 'TRF', 'Lab UECS', '1500', '0', '1', '0', '0', '1', '10'),
('594', '1886', '1886', 'TRF', 'Amoxicilline BP 250 mg/5ml 100ml', '150', '0', '3', '0', '0', '3', '10'),
('595', '1886', '1886', 'TRF', 'Paracetamol BP 500mg Tablets', '1', '0', '2', '0', '0', '2', '10'),
('596', '1886', '1886', 'TRF', 'Clotrimazole Pessaries 200mg', '50', '0', '17', '0', '0', '17', '10'),
('597', '1886', '1886', 'TRF', 'Nursing Fee', '2000', '0', '1', '0', '0', '1', '10'),
('598', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '2000', '0', '1', '0', '0', '1', '10'),
('599', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('600', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('601', '1886', '1886', 'TRF', 'M-PESA', '-102', '0', '0', '0', '0', '0', '10'),
('602', '1886', '1886', 'TRF', 'DR FEE', '25000', '0', '1', '0', '0', '1', '10'),
('603', '1886', '1886', 'TRF', 'injection', '200', '0', '10', '0', '0', '10', '10'),
('604', '1886', '1886', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('605', '1886', '1886', 'TRF', 'suturing under local ANAESTHESIA', '1500', '0', '1', '0', '0', '1', '10'),
('606', '1886', '1886', 'TRF', 'CHEQUES', '-20000', '0', '0', '0', '0', '0', '10'),
('607', '1886', '1886', 'TRF', 'M-PESA', '-6000', '0', '0', '0', '0', '0', '10'),
('608', '1886', '1886', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('609', '1886', '1886', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('610', '1886', '1886', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('611', '1886', '1886', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('612', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('613', '1886', '1886', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('614', '1886', '1886', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('615', '1886', '1886', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('616', '1886', '1886', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('617', '1886', '1886', 'TRF', 'ESR', '200', '0', '1', '0', '0', '1', '10'),
('618', '1886', '1886', 'TRF', 'PSA levels', '2200', '0', '1', '0', '0', '1', '10'),
('619', '1886', '1886', 'TRF', 'Blood Sugar', '100', '0', '1', '0', '0', '1', '10'),
('620', '1886', '1886', 'TRF', 'Full Haemogram', '500', '0', '1', '0', '0', '1', '10'),
('621', '1886', '1886', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('622', '1886', '1886', 'TRF', 'Acetaminophen Suppositories USP 250', '30', '0', '3', '0', '0', '3', '10'),
('623', '1886', '1886', 'TRF', 'Dicl/Par/Chlo 50/325/250mg Tablets', '10', '0', '3', '0', '0', '3', '10'),
('624', '1886', '1886', 'TRF', 'Stomacid', '2', '0', '2', '0', '0', '2', '10'),
('625', '1886', '1886', 'TRF', 'Cash Receipts', '-4224', '0', '0', '0', '0', '0', '10'),
('626', '1886', '1886', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('627', '1886', '1886', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('628', '1886', '1886', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('629', '1886', '1886', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('630', '1886', '1886', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('631', '1886', '1886', 'TRF', 'M-PESA', '-3350', '0', '0', '0', '0', '0', '10'),
('632', '1886', '1886', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('633', '1886', '1886', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('634', '1886', '1886', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('635', '1886', '1886', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('636', '1886', '1886', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('637', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('638', '1886', '1886', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('639', '1886', '1886', 'TRF', 'Blood Transfusion', '1500', '0', '1', '0', '0', '1', '10'),
('640', '1886', '1886', 'TRF', 'Oxygen Administration Per HOUR', '250', '0', '48', '0', '0', '48', '10'),
('641', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('642', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('643', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('644', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('645', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('646', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('647', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('648', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('649', '1886', '1886', 'TRF', 'Cash Receipts', '-200000', '0', '0', '0', '0', '0', '10'),
('650', '1886', '1886', 'TRF', 'Daily Bed Charges', '6000', '0', '10', '0', '0', '10', '10'),
('651', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('652', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('653', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('654', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('655', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('656', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('657', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('658', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('659', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('660', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('661', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('662', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('663', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('664', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('665', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('666', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('667', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('668', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('669', '1886', '1886', 'TRF', 'Cash Receipts', '-1900', '0', '0', '0', '0', '0', '10'),
('670', '1886', '1886', 'TRF', 'Aminosidine syrup 60ml', '200', '0', '1', '0', '0', '1', '10'),
('671', '1886', '1886', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('672', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('673', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('674', '1886', '1886', 'TRF', 'Baby Weighing', '100', '0', '1', '0', '0', '1', '10'),
('675', '1886', '1886', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('676', '1886', '1886', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('677', '1886', '1886', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('678', '1886', '1886', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('679', '1886', '1886', 'TRF', 'CRP Cash', '2000', '0', '1', '0', '0', '1', '10'),
('680', '1886', '1886', 'TRF', 'CRP Cash', '420000', '0', '1', '0', '0', '1', '10'),
('681', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('682', '1886', '1886', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('683', '1887', '10', 'TRF', 'bloodgrouping', '200', '0', '1', '0', '0', '1', '10'),
('684', '1887', '10', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('685', '1887', '10', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('686', '1887', '10', 'TRF', 'Lab UECS', '1500', '0', '1', '0', '0', '1', '10'),
('687', '1887', '10', 'TRF', 'Amoxicilline BP 250 mg/5ml 100ml', '150', '0', '3', '0', '0', '3', '10'),
('688', '1887', '10', 'TRF', 'Paracetamol BP 500mg Tablets', '1', '0', '2', '0', '0', '2', '10'),
('689', '1887', '10', 'TRF', 'Clotrimazole Pessaries 200mg', '50', '0', '17', '0', '0', '17', '10'),
('690', '1887', '10', 'TRF', 'Nursing Fee', '2000', '0', '1', '0', '0', '1', '10'),
('691', '1887', '10', 'TRF', 'DAILY BED CHARGE', '2000', '0', '1', '0', '0', '1', '10'),
('692', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('693', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('694', '1887', '10', 'TRF', 'M-PESA', '-102', '0', '0', '0', '0', '0', '10'),
('695', '1887', '10', 'TRF', 'DR FEE', '25000', '0', '1', '0', '0', '1', '10'),
('696', '1887', '10', 'TRF', 'injection', '200', '0', '10', '0', '0', '10', '10'),
('697', '1887', '10', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('698', '1887', '10', 'TRF', 'suturing under local ANAESTHESIA', '1500', '0', '1', '0', '0', '1', '10'),
('699', '1887', '10', 'TRF', 'CHEQUES', '-20000', '0', '0', '0', '0', '0', '10'),
('700', '1887', '10', 'TRF', 'M-PESA', '-6000', '0', '0', '0', '0', '0', '10'),
('701', '1887', '10', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('702', '1887', '10', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('703', '1887', '10', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('704', '1887', '10', 'TRF', ' culture and sensitivity', '1000', '0', '1', '0', '0', '1', '10'),
('705', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('706', '1887', '10', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('707', '1887', '10', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('708', '1887', '10', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('709', '1887', '10', 'TRF', 'Genexpert', '3000', '0', '1', '0', '0', '1', '10'),
('710', '1887', '10', 'TRF', 'ESR', '200', '0', '1', '0', '0', '1', '10'),
('711', '1887', '10', 'TRF', 'PSA levels', '2200', '0', '1', '0', '0', '1', '10'),
('712', '1887', '10', 'TRF', 'Blood Sugar', '100', '0', '1', '0', '0', '1', '10'),
('713', '1887', '10', 'TRF', 'Full Haemogram', '500', '0', '1', '0', '0', '1', '10'),
('714', '1887', '10', 'TRF', 'BS for Malaria', '100', '0', '1', '0', '0', '1', '10'),
('715', '1887', '10', 'TRF', 'Acetaminophen Suppositories USP 250', '30', '0', '3', '0', '0', '3', '10'),
('716', '1887', '10', 'TRF', 'Dicl/Par/Chlo 50/325/250mg Tablets', '10', '0', '3', '0', '0', '3', '10'),
('717', '1887', '10', 'TRF', 'Stomacid', '2', '0', '2', '0', '0', '2', '10'),
('718', '1887', '10', 'TRF', 'Cash Receipts', '-4224', '0', '0', '0', '0', '0', '10'),
('719', '1887', '10', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('720', '1887', '10', 'TRF', 'CHEQUES', '-10000', '0', '0', '0', '0', '0', '10'),
('721', '1887', '10', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('722', '1887', '10', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('723', '1887', '10', 'TRF', 'Blood Transfusion', '1500', '0', '2', '0', '0', '2', '10'),
('724', '1887', '10', 'TRF', 'M-PESA', '-3350', '0', '0', '0', '0', '0', '10'),
('725', '1887', '10', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('726', '1887', '10', 'TRF', 'Cash Receipts', '-10000', '0', '0', '0', '0', '0', '10'),
('727', '1887', '10', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('728', '1887', '10', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('729', '1887', '10', 'TRF', 'M-PESA', '-500', '0', '0', '0', '0', '0', '10'),
('730', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('731', '1887', '10', 'TRF', 'Dialysis', '7500', '0', '1', '0', '0', '1', '10'),
('732', '1887', '10', 'TRF', 'Blood Transfusion', '1500', '0', '1', '0', '0', '1', '10'),
('733', '1887', '10', 'TRF', 'Oxygen Administration Per HOUR', '250', '0', '48', '0', '0', '48', '10'),
('734', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('735', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('736', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('737', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('738', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('739', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('740', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('741', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('742', '1887', '10', 'TRF', 'Cash Receipts', '-200000', '0', '0', '0', '0', '0', '10'),
('743', '1887', '10', 'TRF', 'Daily Bed Charges', '6000', '0', '10', '0', '0', '10', '10'),
('744', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('745', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('746', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('747', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('748', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('749', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('750', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('751', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('752', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('753', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('754', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('755', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('756', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('757', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('758', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('759', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('760', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('761', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('762', '1887', '10', 'TRF', 'Cash Receipts', '-1900', '0', '0', '0', '0', '0', '10'),
('763', '1887', '10', 'TRF', 'Aminosidine syrup 60ml', '200', '0', '1', '0', '0', '1', '10'),
('764', '1887', '10', 'TRF', 'Albendazole Suspension 100mg/5ml 20ml', '50', '0', '1', '0', '0', '1', '10'),
('765', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('766', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('767', '1887', '10', 'TRF', 'Baby Weighing', '100', '0', '1', '0', '0', '1', '10'),
('768', '1887', '10', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('769', '1887', '10', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('770', '1887', '10', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('771', '1887', '10', 'TRF', 'STOOL ROUTINE', '1200', '0', '1', '0', '0', '1', '10'),
('772', '1887', '10', 'TRF', 'CRP Cash', '2000', '0', '1', '0', '0', '1', '10'),
('773', '10', '1887', 'TRF', 'CRP Cash', '420000', '0', '1', '0', '0', '1', '10'),
('774', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10'),
('775', '1887', '10', 'TRF', 'DAILY BED CHARGE', '6000', '0', '1', '0', '0', '1', '10');

### Structure of table `0_debtor_trans_no` ###

## DROP TABLE IF EXISTS `0_debtor_trans_no`;

CREATE TABLE IF NOT EXISTS `0_debtor_trans_no` (
  `next_ref` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`next_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=1932 DEFAULT CHARSET=utf8 ;

### Data of table `0_debtor_trans_no` ###

INSERT INTO `0_debtor_trans_no` VALUES
('1000'),
('1001'),
('1002'),
('1003'),
('1004'),
('1005'),
('1006'),
('1007'),
('1008'),
('1009'),
('1010'),
('1011'),
('1012'),
('1013'),
('1014'),
('1015'),
('1016'),
('1017'),
('1018'),
('1019'),
('1020'),
('1021'),
('1022'),
('1023'),
('1024'),
('1025'),
('1026'),
('1027'),
('1028'),
('1029'),
('1030'),
('1031'),
('1032'),
('1033'),
('1034'),
('1035'),
('1036'),
('1037'),
('1038'),
('1039'),
('1040'),
('1041'),
('1042'),
('1043'),
('1044'),
('1045'),
('1046'),
('1047'),
('1048'),
('1049'),
('1050'),
('1051'),
('1052'),
('1053'),
('1054'),
('1055'),
('1056'),
('1057'),
('1058'),
('1059'),
('1060'),
('1061'),
('1062'),
('1063'),
('1064'),
('1065'),
('1066'),
('1067'),
('1068'),
('1069'),
('1070'),
('1071'),
('1072'),
('1073'),
('1074'),
('1075'),
('1076'),
('1077'),
('1078'),
('1079'),
('1080'),
('1081'),
('1082'),
('1083'),
('1084'),
('1085'),
('1086'),
('1087'),
('1088'),
('1089'),
('1090'),
('1091'),
('1092'),
('1093'),
('1094'),
('1095'),
('1096'),
('1097'),
('1098'),
('1099'),
('1100'),
('1101'),
('1102'),
('1103'),
('1104'),
('1105'),
('1106'),
('1107'),
('1108'),
('1109'),
('1110'),
('1111'),
('1112'),
('1113'),
('1114'),
('1115'),
('1116'),
('1117'),
('1118'),
('1119'),
('1120'),
('1121'),
('1122'),
('1123'),
('1124'),
('1125'),
('1126'),
('1127'),
('1128'),
('1129'),
('1130'),
('1131'),
('1132'),
('1133'),
('1134'),
('1135'),
('1136'),
('1137'),
('1138'),
('1139'),
('1140'),
('1141'),
('1142'),
('1143'),
('1144'),
('1145'),
('1146'),
('1147'),
('1148'),
('1149'),
('1150'),
('1151'),
('1152'),
('1153'),
('1154'),
('1155'),
('1156'),
('1157'),
('1158'),
('1159'),
('1160'),
('1161'),
('1162'),
('1163'),
('1164'),
('1165'),
('1166'),
('1167'),
('1168'),
('1169'),
('1170'),
('1171'),
('1172'),
('1173'),
('1174'),
('1175'),
('1176'),
('1177'),
('1178'),
('1179'),
('1180'),
('1181'),
('1182'),
('1183'),
('1184'),
('1185'),
('1186'),
('1187'),
('1188'),
('1189'),
('1190'),
('1191'),
('1192'),
('1193'),
('1194'),
('1195'),
('1196'),
('1197'),
('1198'),
('1199'),
('1200'),
('1201'),
('1202'),
('1203'),
('1204'),
('1205'),
('1206'),
('1207'),
('1208'),
('1209'),
('1210'),
('1211'),
('1212'),
('1213'),
('1214'),
('1215'),
('1216'),
('1217'),
('1218'),
('1219'),
('1220'),
('1221'),
('1222'),
('1223'),
('1224'),
('1225'),
('1226'),
('1227'),
('1228'),
('1229'),
('1230'),
('1231'),
('1232'),
('1233'),
('1234'),
('1235'),
('1236'),
('1237'),
('1238'),
('1239'),
('1240'),
('1241'),
('1242'),
('1243'),
('1244'),
('1245'),
('1246'),
('1247'),
('1248'),
('1249'),
('1250'),
('1251'),
('1252'),
('1253'),
('1254'),
('1255'),
('1256'),
('1257'),
('1258'),
('1259'),
('1260'),
('1261'),
('1262'),
('1263'),
('1264'),
('1265'),
('1266'),
('1267'),
('1268'),
('1269'),
('1270'),
('1271'),
('1272'),
('1273'),
('1274'),
('1275'),
('1276'),
('1277'),
('1278'),
('1279'),
('1280'),
('1281'),
('1282'),
('1283'),
('1284'),
('1285'),
('1286'),
('1287'),
('1288'),
('1289'),
('1290'),
('1291'),
('1292'),
('1293'),
('1294'),
('1295'),
('1296'),
('1297'),
('1298'),
('1299'),
('1300'),
('1301'),
('1302'),
('1303'),
('1304'),
('1305'),
('1306'),
('1307'),
('1308'),
('1309'),
('1310'),
('1311'),
('1312'),
('1313'),
('1314'),
('1315'),
('1316'),
('1317'),
('1318'),
('1319'),
('1320'),
('1321'),
('1322'),
('1323'),
('1324'),
('1325'),
('1326'),
('1327'),
('1328'),
('1329'),
('1330'),
('1331'),
('1332'),
('1333'),
('1334'),
('1335'),
('1336'),
('1337'),
('1338'),
('1339'),
('1340'),
('1341'),
('1342'),
('1343'),
('1344'),
('1345'),
('1346'),
('1347'),
('1348'),
('1349'),
('1350'),
('1351'),
('1352'),
('1353'),
('1354'),
('1355'),
('1356'),
('1357'),
('1358'),
('1359'),
('1360'),
('1361'),
('1362'),
('1363'),
('1364'),
('1365'),
('1366'),
('1367'),
('1368'),
('1369'),
('1370'),
('1371'),
('1372'),
('1373'),
('1374'),
('1375'),
('1376'),
('1377'),
('1378'),
('1379'),
('1380'),
('1381'),
('1382'),
('1383'),
('1384'),
('1385'),
('1386'),
('1387'),
('1388'),
('1389'),
('1390'),
('1391'),
('1392'),
('1393'),
('1394'),
('1395'),
('1396'),
('1397'),
('1398'),
('1399'),
('1400'),
('1401'),
('1402'),
('1403'),
('1404'),
('1405'),
('1406'),
('1407'),
('1408'),
('1409'),
('1410'),
('1411'),
('1412'),
('1413'),
('1414'),
('1415'),
('1416'),
('1417'),
('1418'),
('1419'),
('1420'),
('1421'),
('1422'),
('1423'),
('1424'),
('1425'),
('1426'),
('1427'),
('1428'),
('1429'),
('1430'),
('1431'),
('1432'),
('1433'),
('1434'),
('1435'),
('1436'),
('1437'),
('1438'),
('1439'),
('1440'),
('1441'),
('1442'),
('1443'),
('1444'),
('1445'),
('1446'),
('1447'),
('1448'),
('1449'),
('1450'),
('1451'),
('1452'),
('1453'),
('1454'),
('1455'),
('1456'),
('1457'),
('1458'),
('1459'),
('1460'),
('1461'),
('1462'),
('1463'),
('1464'),
('1465'),
('1466'),
('1467'),
('1468'),
('1469'),
('1470'),
('1471'),
('1472'),
('1473'),
('1474'),
('1475'),
('1476'),
('1477'),
('1478'),
('1479'),
('1480'),
('1481'),
('1482'),
('1483'),
('1484'),
('1485'),
('1486'),
('1487'),
('1488'),
('1489'),
('1490'),
('1491'),
('1492'),
('1493'),
('1494'),
('1495'),
('1496'),
('1497'),
('1498'),
('1499'),
('1500'),
('1501'),
('1502'),
('1503'),
('1504'),
('1505'),
('1506'),
('1507'),
('1508'),
('1509'),
('1510'),
('1511'),
('1512'),
('1513'),
('1514'),
('1515'),
('1516'),
('1517'),
('1518'),
('1519'),
('1520'),
('1521'),
('1522'),
('1523'),
('1524'),
('1525'),
('1526'),
('1527'),
('1528'),
('1529'),
('1530'),
('1531'),
('1532'),
('1533'),
('1534'),
('1535'),
('1536'),
('1537'),
('1538'),
('1539'),
('1540'),
('1541'),
('1542'),
('1543'),
('1544'),
('1545'),
('1546'),
('1547'),
('1548'),
('1549'),
('1550'),
('1551'),
('1552'),
('1553'),
('1554'),
('1555'),
('1556'),
('1557'),
('1558'),
('1559'),
('1560'),
('1561'),
('1562'),
('1563'),
('1564'),
('1565'),
('1566'),
('1567'),
('1568'),
('1569'),
('1570'),
('1571'),
('1572'),
('1573'),
('1574'),
('1575'),
('1576'),
('1577'),
('1578'),
('1579'),
('1580'),
('1581'),
('1582'),
('1583'),
('1584'),
('1585'),
('1586'),
('1587'),
('1588'),
('1589'),
('1590'),
('1591'),
('1592'),
('1593'),
('1594'),
('1595'),
('1596'),
('1597'),
('1598'),
('1599'),
('1600'),
('1601'),
('1602'),
('1603'),
('1604'),
('1605'),
('1606'),
('1607'),
('1608'),
('1609'),
('1610'),
('1611'),
('1612'),
('1613'),
('1614'),
('1615'),
('1616'),
('1617'),
('1618'),
('1619'),
('1620'),
('1621'),
('1622'),
('1623'),
('1624'),
('1625'),
('1626'),
('1627'),
('1628'),
('1629'),
('1630'),
('1631'),
('1632'),
('1633'),
('1634'),
('1635'),
('1636'),
('1637'),
('1638'),
('1639'),
('1640'),
('1641'),
('1642'),
('1643'),
('1644'),
('1645'),
('1646'),
('1647'),
('1648'),
('1649'),
('1650'),
('1651'),
('1652'),
('1653'),
('1654'),
('1655'),
('1656'),
('1657'),
('1658'),
('1659'),
('1660'),
('1661'),
('1662'),
('1663'),
('1664'),
('1665'),
('1666'),
('1667'),
('1668'),
('1669'),
('1670'),
('1671'),
('1672'),
('1673'),
('1674'),
('1675'),
('1676'),
('1677'),
('1678'),
('1679'),
('1680'),
('1681'),
('1682'),
('1683'),
('1684'),
('1685'),
('1686'),
('1687'),
('1688'),
('1689'),
('1690'),
('1691'),
('1692'),
('1693'),
('1694'),
('1695'),
('1696'),
('1697'),
('1698'),
('1699'),
('1700'),
('1701'),
('1702'),
('1703'),
('1704'),
('1705'),
('1706'),
('1707'),
('1708'),
('1709'),
('1710'),
('1711'),
('1712'),
('1713'),
('1714'),
('1715'),
('1716'),
('1717'),
('1718'),
('1719'),
('1720'),
('1721'),
('1722'),
('1723'),
('1724'),
('1725'),
('1726'),
('1727'),
('1728'),
('1729'),
('1730'),
('1731'),
('1732'),
('1733'),
('1734'),
('1735'),
('1736'),
('1737'),
('1738'),
('1739'),
('1740'),
('1741'),
('1742'),
('1743'),
('1744'),
('1745'),
('1746'),
('1747'),
('1748'),
('1749'),
('1750'),
('1751'),
('1752'),
('1753'),
('1754'),
('1755'),
('1756'),
('1757'),
('1758'),
('1759'),
('1760'),
('1761'),
('1762'),
('1763'),
('1764'),
('1765'),
('1766'),
('1767'),
('1768'),
('1769'),
('1770'),
('1771'),
('1772'),
('1773'),
('1774'),
('1775'),
('1776'),
('1777'),
('1778'),
('1779'),
('1780'),
('1781'),
('1782'),
('1783'),
('1784'),
('1785'),
('1786'),
('1787'),
('1788'),
('1789'),
('1790'),
('1791'),
('1792'),
('1793'),
('1794'),
('1795'),
('1796'),
('1797'),
('1798'),
('1799'),
('1800'),
('1801'),
('1802'),
('1803'),
('1804'),
('1805'),
('1806'),
('1807'),
('1808'),
('1809'),
('1810'),
('1811'),
('1812'),
('1813'),
('1814'),
('1815'),
('1816'),
('1817'),
('1818'),
('1819'),
('1820'),
('1821'),
('1822'),
('1823'),
('1824'),
('1825'),
('1826'),
('1827'),
('1828'),
('1829'),
('1830'),
('1831'),
('1832'),
('1833'),
('1834'),
('1835'),
('1836'),
('1837'),
('1838'),
('1839'),
('1840'),
('1841'),
('1842'),
('1843'),
('1844'),
('1845'),
('1846'),
('1847'),
('1848'),
('1849'),
('1850'),
('1851'),
('1852'),
('1853'),
('1854'),
('1855'),
('1856'),
('1857'),
('1858'),
('1859'),
('1860'),
('1861'),
('1862'),
('1863'),
('1864'),
('1865'),
('1866'),
('1867'),
('1868'),
('1869'),
('1870'),
('1871'),
('1872'),
('1873'),
('1874'),
('1875'),
('1876'),
('1877'),
('1878'),
('1879'),
('1880'),
('1881'),
('1882'),
('1883'),
('1884'),
('1885'),
('1886'),
('1887'),
('1888'),
('1889'),
('1890'),
('1891'),
('1892'),
('1893'),
('1894'),
('1895'),
('1896'),
('1897'),
('1898'),
('1899'),
('1900'),
('1901'),
('1902'),
('1903'),
('1904'),
('1905'),
('1906'),
('1907'),
('1908'),
('1909'),
('1910'),
('1911'),
('1912'),
('1913'),
('1914'),
('1915'),
('1916'),
('1917'),
('1918'),
('1919'),
('1920'),
('1921'),
('1922'),
('1923'),
('1924'),
('1925'),
('1926'),
('1927'),
('1928'),
('1929'),
('1930'),
('1931');

### Structure of table `0_debtors_master` ###

## DROP TABLE IF EXISTS `0_debtors_master`;

CREATE TABLE IF NOT EXISTS `0_debtors_master` (
  `debtor_no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `debtor_ref` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8_unicode_ci,
  `tax_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `curr_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sales_type` int(11) NOT NULL DEFAULT '1',
  `dimension_id` int(11) NOT NULL DEFAULT '0',
  `dimension2_id` int(11) NOT NULL DEFAULT '0',
  `credit_status` int(11) NOT NULL DEFAULT '0',
  `payment_terms` int(11) DEFAULT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `pymt_discount` double NOT NULL DEFAULT '0',
  `credit_limit` float NOT NULL DEFAULT '1000',
  `notes` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`debtor_no`),
  UNIQUE KEY `debtor_ref` (`debtor_ref`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_debtors_master` ###

INSERT INTO `0_debtors_master` VALUES
('1', 'Donald Easter LLC', 'Donald Easter', 'N/A', '123456789', 'USD', '1', '0', '0', '1', '4', '0', '0', '1000', '', '0'),
('2', 'MoneyMaker Ltd.', 'MoneyMaker', 'N/A', '54354333', 'EUR', '1', '1', '0', '1', '1', '0', '0', '1000', '', '0'),
('3', 'National Health Insurance Fund', 'NHIF', 'Nairobi', '', 'Ksh', '1', '0', '0', '1', '4', '0', '0', '500000', '', '0'),
('4', 'MADISON INSURANCE', 'MADISON', NULL, '', 'Ksh', '3', '0', '0', '1', '4', '0', '0', '1000', '', '0'),
('5', 'CASH PAYING', 'CASH', NULL, '', 'Ksh', '3', '0', '0', '1', '4', '0', '0', '1000', '', '0'),
('6', '', '', NULL, '', '', '1', '0', '0', '0', NULL, '0', '0', '1000', '', '0');

### Structure of table `0_dimensions` ###

## DROP TABLE IF EXISTS `0_dimensions`;

CREATE TABLE IF NOT EXISTS `0_dimensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type_` tinyint(1) NOT NULL DEFAULT '1',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `reference` (`reference`),
  KEY `date_` (`date_`),
  KEY `due_date` (`due_date`),
  KEY `type_` (`type_`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_dimensions` ###

INSERT INTO `0_dimensions` VALUES
('1', '001/2018', 'Cost Centre', '1', '0', '2018-05-05', '2018-05-25'),
('2', '001/2019', 'Doctors', '1', '0', '2019-07-19', '2019-08-08');

### Structure of table `0_exchange_rates` ###

## DROP TABLE IF EXISTS `0_exchange_rates`;

CREATE TABLE IF NOT EXISTS `0_exchange_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curr_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rate_buy` double NOT NULL DEFAULT '0',
  `rate_sell` double NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `curr_code` (`curr_code`,`date_`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_exchange_rates` ###

INSERT INTO `0_exchange_rates` VALUES
('1', 'EUR', '1.123', '1.123', '2018-05-07'),
('2', 'Ksh', '1', '1', '2019-06-30'),
('3', 'Ksh', '1', '1', '2019-07-03'),
('4', 'Ksh', '1', '1', '2019-07-19'),
('5', 'USD', '1', '1', '2019-08-05'),
('6', 'USD', '1', '1', '2019-08-06');

### Structure of table `0_fiscal_year` ###

## DROP TABLE IF EXISTS `0_fiscal_year`;

CREATE TABLE IF NOT EXISTS `0_fiscal_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begin` date DEFAULT '0000-00-00',
  `end` date DEFAULT '0000-00-00',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `begin` (`begin`),
  UNIQUE KEY `end` (`end`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_fiscal_year` ###

INSERT INTO `0_fiscal_year` VALUES
('1', '2018-01-01', '2018-12-31', '1'),
('2', '2019-01-01', '2019-12-31', '0');

### Structure of table `0_gl_trans` ###

## DROP TABLE IF EXISTS `0_gl_trans`;

CREATE TABLE IF NOT EXISTS `0_gl_trans` (
  `counter` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `type_no` int(11) NOT NULL DEFAULT '0',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `memo_` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `dimension_id` int(11) NOT NULL DEFAULT '0',
  `dimension2_id` int(11) NOT NULL DEFAULT '0',
  `person_type_id` int(11) DEFAULT NULL,
  `person_id` tinyblob,
  PRIMARY KEY (`counter`),
  KEY `Type_and_Number` (`type`,`type_no`),
  KEY `dimension_id` (`dimension_id`),
  KEY `dimension2_id` (`dimension2_id`),
  KEY `tran_date` (`tran_date`),
  KEY `account_and_tran_date` (`account`,`tran_date`)
) ENGINE=InnoDB AUTO_INCREMENT=415 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_gl_trans` ###

INSERT INTO `0_gl_trans` VALUES
('1', '25', '1', '2018-05-05', '1510', '101', '20000', '0', '0', NULL, NULL),
('2', '25', '1', '2018-05-05', '1510', '102', '15000', '0', '0', NULL, NULL),
('3', '25', '1', '2018-05-05', '1510', '103', '1000', '0', '0', NULL, NULL),
('4', '25', '1', '2018-05-05', '1550', '', '-36000', '0', '0', NULL, NULL),
('5', '13', '1', '2018-05-10', '5010', '', '4000', '0', '0', NULL, NULL),
('6', '13', '1', '2018-05-10', '1510', '', '-4000', '0', '0', NULL, NULL),
('7', '10', '1', '2018-05-10', '4010', '', '-5714.29', '0', '0', NULL, NULL),
('8', '10', '1', '2018-05-10', '4010', '', '-228.57', '0', '0', NULL, NULL),
('9', '10', '1', '2018-05-10', '1200', '', '6240', '0', '0', '2', '1'),
('10', '10', '1', '2018-05-10', '2150', '', '-297.14', '0', '0', NULL, NULL),
('11', '12', '1', '2018-05-10', '1065', '', '6240', '0', '0', NULL, NULL),
('12', '12', '1', '2018-05-10', '1200', '', '-6240', '0', '0', '2', '1'),
('13', '29', '1', '2018-05-05', '1510', '1 * iPad Air 2 16GB', '-400', '0', '0', NULL, NULL),
('14', '29', '1', '2018-05-05', '1510', '1 * iPhone 6 64GB', '-300', '0', '0', NULL, NULL),
('15', '29', '1', '2018-05-05', '1510', '1 * iPhone Cover Case', '-20', '0', '0', NULL, NULL),
('16', '29', '1', '2018-05-05', '1530', '1 * Support', '720', '0', '0', NULL, NULL),
('17', '26', '1', '2018-05-05', '1530', '', '-720', '0', '0', NULL, NULL),
('18', '26', '1', '2018-05-05', '1510', '', '720', '0', '0', NULL, NULL),
('19', '25', '2', '2018-05-05', '1510', '101', '3000', '0', '0', NULL, NULL),
('20', '25', '2', '2018-05-05', '1550', '', '-3000', '0', '0', NULL, NULL),
('21', '20', '1', '2018-05-05', '2150', '', '150', '0', '0', NULL, NULL),
('22', '20', '1', '2018-05-05', '2100', '', '-3150', '0', '0', '3', '1'),
('23', '20', '1', '2018-05-05', '1550', '', '3000', '0', '0', NULL, NULL),
('24', '13', '2', '2018-05-07', '5010', '', '200', '0', '0', NULL, NULL),
('25', '13', '2', '2018-05-07', '1510', '', '-200', '0', '0', NULL, NULL),
('26', '10', '2', '2018-05-07', '4010', '', '-285.71', '0', '0', NULL, NULL),
('27', '10', '2', '2018-05-07', '1200', '', '300', '0', '0', '2', '1'),
('28', '10', '2', '2018-05-07', '2150', '', '-14.29', '0', '0', NULL, NULL),
('29', '12', '2', '2018-05-07', '1065', '', '300', '0', '0', NULL, NULL),
('30', '12', '2', '2018-05-07', '1200', '', '-300', '0', '0', '2', '1'),
('31', '13', '3', '2018-05-07', '5010', '', '150', '1', '0', NULL, NULL),
('32', '13', '3', '2018-05-07', '1510', '', '-150', '0', '0', NULL, NULL),
('33', '13', '3', '2018-05-07', '5010', '', '10', '1', '0', NULL, NULL),
('34', '13', '3', '2018-05-07', '1510', '', '-10', '0', '0', NULL, NULL),
('35', '10', '3', '2018-05-07', '4010', '', '-250', '1', '0', NULL, NULL),
('36', '10', '3', '2018-05-07', '4010', '', '-50', '1', '0', NULL, NULL),
('37', '10', '3', '2018-05-07', '1200', '', '300', '0', '0', '2', '2'),
('38', '12', '3', '2018-05-07', '1065', '', '0', '0', '0', NULL, NULL),
('39', '1', '1', '2018-05-07', '5010', '', '5', '1', '0', NULL, NULL),
('40', '1', '1', '2018-05-07', '1060', '', '-5', '0', '0', NULL, NULL),
('41', '13', '5', '2019-01-21', '5010', '', '750', '0', '0', NULL, NULL),
('42', '13', '5', '2019-01-21', '1510', '', '-750', '0', '0', NULL, NULL),
('43', '10', '5', '2019-01-21', '4010', '', '-1190.48', '0', '0', NULL, NULL),
('44', '10', '5', '2019-01-21', '1200', '', '1250', '0', '0', '2', '1'),
('45', '10', '5', '2019-01-21', '2150', '', '-59.52', '0', '0', NULL, NULL),
('46', '12', '4', '2019-01-21', '1065', '', '1250', '0', '0', NULL, NULL),
('47', '12', '4', '2019-01-21', '1200', '', '-1250', '0', '0', '2', '1'),
('48', '25', '3', '2019-01-21', '1510', '102', '900', '0', '0', NULL, NULL),
('49', '25', '3', '2019-01-21', '1550', '', '-900', '0', '0', NULL, NULL),
('50', '20', '2', '2019-01-21', '2150', '', '45', '0', '0', NULL, NULL),
('51', '20', '2', '2019-01-21', '2100', '', '-945', '0', '0', '3', '1'),
('52', '20', '2', '2019-01-21', '1550', '', '900', '0', '0', NULL, NULL),
('53', '0', '1', '2018-12-31', '3590', 'Closing Year', '-2163.57', '0', '0', NULL, NULL),
('54', '0', '1', '2018-12-31', '9990', 'Closing Year', '2163.57', '0', '0', NULL, NULL),
('55', '0', '2', '2019-06-30', '1065', 'KJIU', '-9000', '1', '0', NULL, NULL),
('56', '0', '2', '2019-06-30', '5780', 'lkklhu', '9000', '1', '0', NULL, NULL),
('57', '10', '6', '2019-06-30', '4010', '', '-2857143', '0', '0', NULL, NULL),
('58', '10', '6', '2019-06-30', '1200', '', '3000000', '0', '0', '2', '3'),
('59', '10', '6', '2019-06-30', '2150', '', '-142857', '0', '0', NULL, NULL),
('60', '12', '5', '2019-06-30', '1065', '', '3000000', '0', '0', NULL, NULL),
('61', '12', '5', '2019-06-30', '1200', '', '-3000000', '0', '0', '2', '3'),
('62', '10', '7', '2019-06-30', '4010', '', '-4761905', '0', '0', NULL, NULL),
('63', '10', '7', '2019-06-30', '1200', '', '5000000', '0', '0', '2', '3'),
('64', '10', '7', '2019-06-30', '2150', '', '-238095', '0', '0', NULL, NULL),
('65', '12', '6', '2019-06-30', '1065', '', '5000000', '0', '0', NULL, NULL),
('66', '12', '6', '2019-06-30', '1200', '', '-5000000', '0', '0', '2', '3'),
('67', '13', '8', '2019-07-03', '5010', '', '1500', '0', '0', NULL, NULL),
('68', '13', '8', '2019-07-03', '1510', '', '-1500', '0', '0', NULL, NULL),
('69', '10', '8', '2019-07-03', '4010', '', '-12380.95', '0', '0', NULL, NULL),
('70', '10', '8', '2019-07-03', '4010', '', '-2380.95', '0', '0', NULL, NULL),
('71', '10', '8', '2019-07-03', '1200', '', '15500', '0', '0', '2', '3'),
('72', '10', '8', '2019-07-03', '2150', '', '-738.1', '0', '0', NULL, NULL),
('73', '25', '4', '2019-07-03', '1510', 'GL001', '6000', '0', '0', NULL, NULL),
('74', '25', '4', '2019-07-03', '1550', '', '-6000', '0', '0', NULL, NULL),
('75', '0', '3', '2019-07-03', '1065', 'office rent advance', '-3000', '0', '0', NULL, NULL),
('76', '0', '3', '2019-07-03', '5760', 'office rent advance', '3000', '0', '0', NULL, NULL),
('77', '25', '5', '2019-07-03', '1510', 'GL001', '30000', '0', '0', NULL, NULL),
('78', '25', '5', '2019-07-03', '1510', '103', '10000', '0', '0', NULL, NULL),
('79', '25', '5', '2019-07-03', '1510', '102', '300000', '0', '0', NULL, NULL),
('80', '25', '5', '2019-07-03', '1550', '', '-340000', '0', '0', NULL, NULL),
('81', '20', '3', '2019-07-03', '5060', '', '0', '0', '0', NULL, NULL),
('82', '20', '3', '2019-07-03', '2100', '', '-382000', '0', '0', '3', '1'),
('83', '20', '3', '2019-07-03', '1550', '', '20000', '0', '0', NULL, NULL),
('84', '20', '3', '2019-07-03', '1550', '', '15000', '0', '0', NULL, NULL),
('85', '20', '3', '2019-07-03', '1550', '', '1000', '0', '0', NULL, NULL),
('86', '20', '3', '2019-07-03', '1550', '', '6000', '0', '0', NULL, NULL),
('87', '20', '3', '2019-07-03', '1550', '', '30000', '0', '0', NULL, NULL),
('88', '20', '3', '2019-07-03', '1550', '', '10000', '0', '0', NULL, NULL),
('89', '20', '3', '2019-07-03', '1550', '', '300000', '0', '0', NULL, NULL),
('90', '13', '9', '2019-07-03', '5030', '', '30000', '0', '0', NULL, NULL),
('91', '13', '9', '2019-07-03', '1510', '', '-30000', '0', '0', NULL, NULL),
('92', '10', '9', '2019-07-03', '4010', '', '-50000', '0', '0', NULL, NULL),
('93', '10', '9', '2019-07-03', '1200', '', '50000', '0', '0', '2', '3'),
('94', '12', '7', '2019-07-03', '1065', '', '50000', '0', '0', NULL, NULL),
('95', '12', '7', '2019-07-03', '1200', '', '-50000', '0', '0', '2', '3'),
('96', '20', '4', '2019-07-19', '2100', '', '-250000', '0', '0', '3', '6'),
('97', '20', '4', '2019-07-19', '5010', '', '200000', '2', '0', NULL, NULL),
('98', '20', '4', '2019-07-19', '5010', '', '50000', '2', '0', NULL, NULL),
('99', '25', '7', '2019-07-19', '1510', 'GL001', '15000', '0', '0', NULL, NULL),
('100', '25', '7', '2019-07-19', '1550', '', '-15000', '2', '0', NULL, NULL),
('101', '20', '5', '2019-07-19', '2100', '', '-15000', '0', '0', '3', '6'),
('102', '20', '5', '2019-07-19', '1550', '', '15000', '2', '0', NULL, NULL),
('103', '20', '6', '2019-07-19', '2100', '', '-20000', '0', '0', '3', '6'),
('104', '20', '6', '2019-07-19', '4010', '', '20000', '2', '0', NULL, NULL),
('105', '22', '1', '2019-07-19', '2100', '', '265000', '0', '0', '3', '6'),
('106', '22', '1', '2019-07-19', '1065', '', '-265000', '0', '0', NULL, NULL),
('107', '20', '7', '2019-07-19', '2100', '', '-20000', '0', '0', '3', '6'),
('108', '20', '7', '2019-07-19', '4010', '', '20000', '2', '0', NULL, NULL),
('109', '0', '4', '2019-07-20', '1820', 'Office Desk', '-120000', '0', '0', NULL, NULL),
('110', '0', '4', '2019-07-20', '1510', 'Office Desk', '120000', '0', '0', NULL, NULL),
('111', '2', '1', '2019-07-20', '1200', 'IP 895543', '-34000', '0', '0', '2', '3'),
('112', '2', '1', '2019-07-20', '1060', '', '34000', '0', '0', NULL, NULL),
('113', '0', '0', '0000-00-00', '', '', '0', '0', '0', NULL, NULL),
('114', '0', '0', '0000-00-00', '', '', '0', '0', '0', NULL, NULL),
('117', '10', '8', '2019-07-22', '4014', 'STOOL ROUTINE-IP30-Sally Sa Sally', '-1200', '0', '0', '0', '0'),
('118', '10', '14', '2019-07-22', '4015', 'STOOL ROUTINE-IP30-Sally Sa Sally', '1200', '0', '0', '0', '0'),
('119', '10', '10', '2019-07-22', '4014', 'CRP Cash-IP30-Sally Sa Sally', '-2000', '0', '0', '0', '0'),
('120', '10', '10', '2019-07-22', '4015', 'CRP Cash-IP30-Sally Sa Sally', '2000', '0', '0', '0', '0'),
('121', '10', '10', '2019-07-22', '1200', 'TRF Dan Teddy Wanuiti', '184102', '0', '0', '2', '0'),
('122', '10', '10', '2019-07-22', '4015', 'TRF Dan Teddy Wanuiti', '-184102', '0', '0', '0', '0'),
('123', '1', '2', '2019-07-22', '5410', 'Benard Were', '30000', '0', '0', NULL, NULL),
('124', '1', '2', '2019-07-22', '5410', 'Evans Bwire', '15000', '0', '0', NULL, NULL),
('125', '1', '2', '2019-07-22', '5420', 'Robert Kagendo', '15000', '0', '0', NULL, NULL),
('126', '1', '2', '2019-07-22', '1065', '', '-60000', '0', '0', NULL, NULL),
('127', '10', '10', '2019-07-22', '4014', 'CRP Cash-IP30-Sally Sa Sally', '-420000', '0', '0', '0', '0'),
('128', '10', '10', '2019-07-22', '4015', 'CRP Cash-IP30-Sally Sa Sally', '420000', '0', '0', '0', '0'),
('129', '10', '10', '2019-07-22', '1200', 'TRF Sally Sa Sally', '488900', '0', '0', '2', '0'),
('130', '10', '10', '2019-07-22', '4015', 'TRF Sally Sa Sally', '-488900', '0', '0', '0', '0'),
('131', '10', '1883', '2019-07-22', '1200', 'TRF Sally Sa Sally', '488900', '0', '0', '2', '0'),
('132', '10', '1883', '2019-07-22', '4015', 'TRF Sally Sa Sally', '-488900', '0', '0', '0', '0'),
('133', '10', '1884', '2019-07-23', '1200', 'TRF Sally Sa Sally', '500900', '0', '0', '2', '3'),
('134', '10', '1884', '2019-07-23', '4015', 'TRF Sally Sa Sally', '-500900', '0', '0', '2', '3'),
('135', '10', '1885', '2019-07-23', '1200', 'TRF Sally Sa Sally', '500900', '0', '0', '2', '3'),
('136', '10', '1885', '2019-07-23', '4015', 'TRF Sally Sa Sally', '-500900', '0', '0', '2', '3'),
('137', '10', '1886', '2019-07-23', '1200', 'TRF Sally Sa Sally', '500900', '0', '0', '2', '3'),
('138', '10', '1886', '2019-07-23', '4015', 'TRF Sally Sa Sally', '-500900', '0', '0', '2', '3'),
('139', '10', '1887', '2019-07-23', '1200', 'TRF Sally Sa Sally', '500900', '0', '0', '2', '3'),
('140', '10', '1887', '2019-07-23', '4015', 'TRF Sally Sa Sally', '-500900', '0', '0', '2', '3'),
('141', '10', '1888', '2019-07-23', '4014', 'STOOL ROUTINE-IP30-Sally Sa Sally', '-1200', '0', '0', '2', '3'),
('142', '10', '1888', '2019-07-23', '4015', 'STOOL ROUTINE-IP30-Sally Sa Sally', '1200', '0', '0', '2', '3'),
('143', '12', '24', '2019-07-23', '1066', 'Sally Sa Sally', '150', '0', '0', '2', '3'),
('144', '12', '24', '2019-07-23', '4015', 'Sally Sa Sally', '-150', '0', '0', '2', '3'),
('145', '12', '25', '2019-07-23', '1066', 'Sally Sa Sally', '200', '0', '0', '0', '0'),
('146', '12', '25', '2019-07-23', '4015', 'Sally Sa Sally', '-200', '0', '0', '0', '0'),
('147', '10', '1889', '2019-07-23', '4014', 'CRP Cash-IP30-Sally Sa Sally', '-20000', '0', '0', '0', '0'),
('148', '10', '1889', '2019-07-23', '4015', 'CRP Cash-IP30-Sally Sa Sally', '20000', '0', '0', '0', '0'),
('149', '10', '1890', '2019-07-23', '4014', 'CRP Cash-IP30-Sally Sa Sally', '-6000', '0', '0', '0', '0'),
('150', '10', '1890', '2019-07-23', '4015', 'CRP Cash-IP30-Sally Sa Sally', '6000', '0', '0', '0', '0'),
('151', '10', '1891', '2019-07-23', '4014', 'CRP Cash-IP30-Sally Sa Sally', '0', '0', '0', '0', '0'),
('152', '10', '1891', '2019-07-23', '4015', 'CRP Cash-IP30-Sally Sa Sally', '-2000', '0', '0', '0', '0'),
('155', '10', '1893', '2019-07-23', '4014', 'STOOL ROUTINE-IP30-Sally Sa Sally', '2400', '0', '0', '0', '0'),
('156', '10', '1893', '2019-07-23', '4015', 'STOOL ROUTINE-IP30-Sally Sa Sally', '-2400', '0', '0', '0', '0'),
('157', '12', '1881', '2019-07-23', '1200', 'CONSULTATION FEE :-: John Teddy Waliono', '500', '0', '0', '0', '0'),
('158', '12', '1881', '2019-07-23', '1200', 'CONSULTATION FEE :-: John Teddy Waliono', '500', '0', '0', '0', '0'),
('159', '12', '1883', '2019-07-24', '1200', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '0', '0'),
('160', '12', '1883', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '0', '0'),
('161', '12', '1883', '2019-07-24', '1200', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '0', '0'),
('162', '12', '1883', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '0', '0'),
('163', '12', '1883', '2019-07-24', '1200', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '0', '0'),
('164', '12', '1883', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '0', '0'),
('165', '12', '1883', '2019-07-24', '1200', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '0', '0'),
('166', '12', '1883', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '0', '0'),
('167', '12', '1883', '2019-07-24', '1200', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '0', '0'),
('168', '12', '1883', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '0', '0'),
('169', '12', '1883', '2019-07-24', '1200', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '0', '0'),
('170', '12', '1883', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '0', '0'),
('171', '12', '1883', '2019-07-24', '1200', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '0', '0'),
('172', '12', '1883', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '0', '0'),
('173', '12', '1883', '2019-07-24', '1200', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '0', '0'),
('174', '12', '1883', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '0', '0'),
('175', '12', '1883', '2019-07-24', '1200', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '0', '0'),
('176', '12', '1883', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '0', '0'),
('177', '12', '1883', '2019-07-24', '1200', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '0', '0'),
('178', '12', '1883', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '0', '0'),
('179', '12', '1883', '2019-07-24', '1200', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '0', '0'),
('180', '12', '1883', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '0', '0'),
('181', '12', '1883', '2019-07-24', '1200', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '0', '0'),
('182', '12', '1883', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '0', '0'),
('183', '12', '1883', '2019-07-24', '1200', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '0', '0'),
('184', '12', '1883', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '0', '0'),
('185', '12', '1883', '2019-07-24', '1200', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '0', '0'),
('186', '12', '1883', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '0', '0'),
('187', '10', '1894', '2019-07-24', '1200', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '0', '0'),
('188', '10', '1894', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '0', '0'),
('189', '10', '1883', '2019-07-24', '1200', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '0', '0'),
('190', '10', '1883', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '0', '0'),
('191', '10', '1883', '2019-07-24', '1200', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '0', '0'),
('192', '10', '1883', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '0', '0'),
('193', '10', '1883', '2019-07-24', '1200', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '0', '0'),
('194', '10', '1883', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '0', '0'),
('195', '10', '1883', '2019-07-24', '1200', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '0', '0'),
('196', '10', '1883', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '0', '0'),
('197', '10', '1883', '2019-07-24', '1200', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '0', '0'),
('198', '10', '1883', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '0', '0'),
('199', '10', '0', '2019-07-24', '1200', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '0', '0'),
('200', '10', '0', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '0', '0'),
('201', '10', '0', '2019-07-24', '1200', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '0', '0'),
('202', '10', '0', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '0', '0'),
('203', '10', '0', '2019-07-24', '1200', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '0', '0'),
('204', '10', '0', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '0', '0'),
('205', '10', '0', '2019-07-24', '1200', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '0', '0'),
('206', '10', '0', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '0', '0'),
('207', '10', '0', '2019-07-24', '1200', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '0', '0'),
('208', '10', '0', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '0', '0'),
('209', '10', '1883', '2019-07-24', '1200', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '0', '0'),
('210', '10', '1883', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '0', '0'),
('211', '10', '1883', '2019-07-24', '1200', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '0', '0'),
('212', '10', '1883', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '0', '0'),
('213', '10', '1883', '2019-07-24', '1200', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '0', '0'),
('214', '10', '1883', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '0', '0'),
('215', '10', '1883', '2019-07-24', '1200', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '0', '0'),
('216', '10', '1883', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '0', '0'),
('217', '10', '1883', '2019-07-24', '1200', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '0', '0'),
('218', '10', '1883', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '0', '0'),
('219', '10', '1883000', '2019-07-24', '1200', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '0', '0'),
('220', '10', '1883000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '0', '0'),
('221', '10', '1883000', '2019-07-24', '1200', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '0', '0'),
('222', '10', '1883000', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '0', '0'),
('223', '10', '1883000', '2019-07-24', '1200', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '0', '0'),
('224', '10', '1883000', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '0', '0'),
('225', '10', '1883000', '2019-07-24', '1200', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '0', '0'),
('226', '10', '1883000', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '0', '0'),
('227', '10', '1883000', '2019-07-24', '1200', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '0', '0'),
('228', '10', '1883000', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '0', '0'),
('229', '10', '1883000', '2019-07-24', '1066', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '0', '0'),
('230', '10', '1883000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '0', '0'),
('231', '10', '1883000', '2019-07-24', '1066', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '0', '0'),
('232', '10', '1883000', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '0', '0'),
('233', '10', '1883000', '2019-07-24', '1066', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '0', '0'),
('234', '10', '1883000', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '0', '0'),
('235', '10', '1883000', '2019-07-24', '1066', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '0', '0'),
('236', '10', '1883000', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '0', '0'),
('237', '10', '1883000', '2019-07-24', '1066', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '0', '0'),
('238', '10', '1883000', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '0', '0'),
('239', '12', '1883000', '2019-07-24', '1066', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '0', '0'),
('240', '12', '1883000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '0', '0'),
('241', '12', '1883000', '2019-07-24', '1066', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '0', '0'),
('242', '12', '1883000', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '0', '0'),
('243', '12', '1883000', '2019-07-24', '1066', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '0', '0'),
('244', '12', '1883000', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '0', '0'),
('245', '12', '1883000', '2019-07-24', '1066', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '0', '0'),
('246', '12', '1883000', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '0', '0'),
('247', '12', '1883000', '2019-07-24', '1066', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '0', '0'),
('248', '12', '1883000', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '0', '0'),
('249', '12', '1883000', '2019-07-24', '1066', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '2', '3'),
('250', '12', '1883000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '2', '3'),
('251', '12', '1883000', '2019-07-24', '1066', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '2', '3'),
('252', '12', '1883000', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '2', '3'),
('253', '12', '1883000', '2019-07-24', '1066', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '2', '3'),
('254', '12', '1883000', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '2', '3'),
('255', '12', '1883000', '2019-07-24', '1066', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '2', '3'),
('256', '12', '1883000', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '2', '3'),
('257', '12', '1883000', '2019-07-24', '1066', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '2', '3'),
('258', '12', '1883000', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '2', '3'),
('259', '10', '1883000', '2019-07-24', '1200', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '2', '3'),
('260', '10', '1883000', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '2', '3'),
('261', '10', '1883000', '2019-07-24', '1200', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '2', '3'),
('262', '10', '1883000', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '2', '3'),
('263', '10', '1883000', '2019-07-24', '1200', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '2', '3'),
('264', '10', '1883000', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '2', '3'),
('265', '10', '1883000', '2019-07-24', '1200', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '2', '3'),
('266', '10', '1883000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '2', '3'),
('267', '10', '1883000', '2019-07-24', '1200', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '2', '3'),
('268', '10', '1883000', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '2', '3'),
('269', '10', '1883000', '2019-07-24', '1200', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '2', '4'),
('270', '10', '1883000', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '2', '4'),
('271', '10', '1883000', '2019-07-24', '1200', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '2', '4'),
('272', '10', '1883000', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '2', '4'),
('273', '10', '1883000', '2019-07-24', '1200', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '2', '4'),
('274', '10', '1883000', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '2', '4'),
('275', '10', '1883000', '2019-07-24', '1200', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '2', '4'),
('276', '10', '1883000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '2', '4'),
('277', '10', '1883000', '2019-07-24', '1200', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '2', '4'),
('278', '10', '1883000', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '2', '4'),
('279', '10', '1883000', '2019-07-24', '1200', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '2', '4'),
('280', '10', '1883000', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '2', '4'),
('281', '10', '1883000', '2019-07-24', '1200', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '2', '4'),
('282', '10', '1883000', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '2', '4'),
('283', '10', '1883000', '2019-07-24', '1200', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '2', '4'),
('284', '10', '1883000', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '2', '4'),
('285', '10', '1883000', '2019-07-24', '1200', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '2', '4'),
('286', '10', '1883000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '2', '4'),
('287', '10', '1883000', '2019-07-24', '1200', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '2', '4'),
('288', '10', '1883000', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '2', '4'),
('289', '12', '1883000', '2019-07-24', '1066', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '2', '0'),
('290', '12', '1883000', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '2', '0'),
('291', '12', '1883000', '2019-07-24', '1066', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '2', '0'),
('292', '12', '1883000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '2', '0'),
('293', '12', '1883000', '2019-07-24', '1066', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '2', '0'),
('294', '12', '1883000', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '2', '0'),
('295', '12', '1883000', '2019-07-24', '1066', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '2', '0'),
('296', '12', '1883000', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '2', '0'),
('297', '12', '1883000', '2019-07-24', '1066', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '2', '0'),
('298', '12', '1883000', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '2', '0'),
('299', '12', '1883000', '2019-07-24', '1066', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '300', '0', '0', '2', '5'),
('300', '12', '1883000', '2019-07-24', '4014', 'ASOT :-: ROSMARY  MUKUDI SITWAYE', '-300', '0', '0', '2', '5'),
('301', '12', '1883000', '2019-07-24', '1066', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '500', '0', '0', '2', '5'),
('302', '12', '1883000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ROSMARY  MUKUDI SITWAYE', '-500', '0', '0', '2', '5'),
('303', '12', '1883000', '2019-07-24', '1066', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '200', '0', '0', '2', '5'),
('304', '12', '1883000', '2019-07-24', '4014', 'bloodgrouping :-: ROSMARY  MUKUDI SITWAYE', '-200', '0', '0', '2', '5'),
('305', '12', '1883000', '2019-07-24', '1066', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '260', '0', '0', '2', '5'),
('306', '12', '1883000', '2019-07-24', '4014', ' P24 markers :-: ROSMARY  MUKUDI SITWAYE', '-260', '0', '0', '2', '5'),
('307', '12', '1883000', '2019-07-24', '1066', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '1500', '0', '0', '2', '5'),
('308', '12', '1883000', '2019-07-24', '4017', 'Blood Transfusion :-: ROSMARY  MUKUDI SITWAYE', '-1500', '0', '0', '2', '5'),
('309', '10', '1884000', '2019-07-24', '1200', 'HVS/GRAM STAINING :-: ken itoko Bosire ofweneke', '300', '0', '0', '2', '4'),
('310', '10', '1884000', '2019-07-24', '4014', 'HVS/GRAM STAINING :-: ken itoko Bosire ofweneke', '-300', '0', '0', '2', '4'),
('311', '10', '1884000', '2019-07-24', '1200', 'bloodgrouping :-: ken itoko Bosire ofweneke', '200', '0', '0', '2', '4'),
('312', '10', '1884000', '2019-07-24', '4014', 'bloodgrouping :-: ken itoko Bosire ofweneke', '-200', '0', '0', '2', '4'),
('313', '10', '1884000', '2019-07-24', '1200', 'ASOT :-: ken itoko Bosire ofweneke', '300', '0', '0', '2', '4'),
('314', '10', '1884000', '2019-07-24', '4014', 'ASOT :-: ken itoko Bosire ofweneke', '-300', '0', '0', '2', '4'),
('315', '10', '1884000', '2019-07-24', '1200', 'CONSULTATION FEE :-: ken itoko Bosire ofweneke', '500', '0', '0', '2', '4'),
('316', '10', '1884000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ken itoko Bosire ofweneke', '-500', '0', '0', '2', '4'),
('317', '12', '1884000', '2019-07-24', '1066', 'HVS/GRAM STAINING :-: ken itoko Bosire ofweneke', '300', '0', '0', '2', '5'),
('318', '12', '1884000', '2019-07-24', '4014', 'HVS/GRAM STAINING :-: ken itoko Bosire ofweneke', '-300', '0', '0', '2', '5'),
('319', '12', '1884000', '2019-07-24', '1066', 'bloodgrouping :-: ken itoko Bosire ofweneke', '200', '0', '0', '2', '5'),
('320', '12', '1884000', '2019-07-24', '4014', 'bloodgrouping :-: ken itoko Bosire ofweneke', '-200', '0', '0', '2', '5'),
('321', '12', '1884000', '2019-07-24', '1066', 'ASOT :-: ken itoko Bosire ofweneke', '300', '0', '0', '2', '5'),
('322', '12', '1884000', '2019-07-24', '4014', 'ASOT :-: ken itoko Bosire ofweneke', '-300', '0', '0', '2', '5'),
('323', '12', '1884000', '2019-07-24', '1066', 'CONSULTATION FEE :-: ken itoko Bosire ofweneke', '500', '0', '0', '2', '5'),
('324', '12', '1884000', '2019-07-24', '4016', 'CONSULTATION FEE :-: ken itoko Bosire ofweneke', '-500', '0', '0', '2', '5'),
('325', '10', '1903', '2019-07-24', '4011', 'Xray Fingers-IP30-Sally Sa Sally', '-1000', '0', '0', '0', '0'),
('326', '10', '1903', '2019-07-24', '4015', 'Xray Fingers-IP30-Sally Sa Sally', '1000', '0', '0', '0', '0'),
('327', '12', '26', '2019-07-24', '1066', 'RCT- Sally Sa Sally', '1000', '0', '0', '0', '0'),
('328', '12', '26', '2019-07-24', '4015', 'RCT- Sally Sa Sally', '-1000', '0', '0', '0', '0'),
('329', '12', '27', '2019-07-24', '1066', 'RCT- Test Of  Last Billing', '6000', '0', '0', '2', '4'),
('330', '12', '27', '2019-07-24', '4015', 'RCT- Test Of  Last Billing', '-6000', '0', '0', '2', '4'),
('331', '12', '28', '2019-07-24', '1066', 'RCT- In Patient test', '3000', '0', '0', '2', '5'),
('332', '12', '28', '2019-07-24', '4015', 'RCT- In Patient test', '-3000', '0', '0', '2', '5'),
('333', '10', '1904', '2019-07-24', '4011', 'xray Clavicle-IP28-Test Of  Last Billing', '-2000', '0', '0', '2', NULL),
('334', '10', '1904', '2019-07-24', '4015', 'xray Clavicle-IP28-Test Of  Last Billing', '2000', '0', '0', '2', NULL),
('335', '10', '1905', '2019-07-24', '4011', 'xray Clavicle-IP28-Test Of  Last Billing', '1000', '0', '0', '2', NULL),
('336', '10', '1905', '2019-07-24', '4015', 'xray Clavicle-IP28-Test Of  Last Billing', '-1000', '0', '0', '2', NULL),
('337', '10', '1906', '2019-07-24', '4011', 'xray Clavicle-IP30-Sally Sa Sally', '-6000', '0', '0', '2', NULL),
('338', '10', '1906', '2019-07-24', '4015', 'xray Clavicle-IP30-Sally Sa Sally', '6000', '0', '0', '2', NULL),
('339', '10', '1907', '2019-07-24', '4011', 'xray Lumbar spine-IP30-Sally Sa Sally', '1600', '0', '0', '2', NULL),
('340', '10', '1907', '2019-07-24', '4015', 'xray Lumbar spine-IP30-Sally Sa Sally', '-1600', '0', '0', '2', NULL),
('341', '10', '1908', '2019-07-24', '4011', 'xray Lumbar spine-IP30-Sally Sa Sally', '-8000', '0', '0', '2', NULL),
('342', '10', '1908', '2019-07-24', '4015', 'xray Lumbar spine-IP30-Sally Sa Sally', '8000', '0', '0', '2', NULL),
('343', '10', '1909', '2019-07-24', '4011', 'xray Lumbar spine-IP30-Sally Sa Sally', '-1600', '0', '0', '2', NULL),
('344', '10', '1909', '2019-07-24', '4015', 'xray Lumbar spine-IP30-Sally Sa Sally', '1600', '0', '0', '2', NULL),
('345', '10', '1910', '2019-07-24', '4011', 'xray FOOT-IP30-Sally Sa Sally', '-1000', '0', '0', '2', NULL),
('346', '10', '1910', '2019-07-24', '4015', 'xray FOOT-IP30-Sally Sa Sally', '1000', '0', '0', '2', NULL),
('347', '10', '1911', '2019-07-24', '4011', 'X-ray hand-IP27-In Patient test', '-3000', '0', '0', '2', NULL),
('348', '10', '1911', '2019-07-24', '4015', 'X-ray hand-IP27-In Patient test', '3000', '0', '0', '2', NULL),
('349', '10', '1912', '2019-07-24', '4011', 'Skull X-ray-IP42-Dan  Teddy Wanuiti', '-8000', '0', '0', '2', '3'),
('350', '10', '1912', '2019-07-24', '4015', 'Skull X-ray-IP42-Dan  Teddy Wanuiti', '8000', '0', '0', '2', '3'),
('351', '10', '1913', '2019-07-24', '4011', 'xray Lumbar spine-IP30-Sally Sa Sally', '-4800', '0', '0', '2', '1'),
('352', '10', '1913', '2019-07-24', '4015', 'xray Lumbar spine-IP30-Sally Sa Sally', '4800', '0', '0', '2', '1'),
('353', '12', '17', '2019-07-29', '1066', 'Testicular Ultrasound :-: BENARD WERE MUKUDI', '2000', '0', '0', '2', '5'),
('354', '12', '17', '2019-07-29', '4017', 'Testicular Ultrasound :-: BENARD WERE MUKUDI', '-2000', '0', '0', '2', '5'),
('355', '12', '17', '2019-07-29', '1066', 'Aminosidine syrup 60ml :-: BENARD WERE MUKUDI', '2600', '0', '0', '2', '5'),
('356', '12', '17', '2019-07-29', '4018', 'Aminosidine syrup 60ml :-: BENARD WERE MUKUDI', '-2600', '0', '0', '2', '5'),
('357', '25', '10', '2019-08-04', '1510', '008', '2000000', '0', '0', NULL, NULL),
('358', '25', '10', '2019-08-04', '1550', '', '-2000000', '2', '0', NULL, NULL),
('359', '20', '8', '2019-08-04', '2100', '', '-2000000', '0', '0', '3', '6'),
('360', '20', '8', '2019-08-04', '1550', '', '2000000', '2', '0', NULL, NULL),
('361', '10', '1914', '2019-08-05', '4018', 'Amoxycillin/Clavulanic Acid Tablets 625mg-', '-600', '0', '0', '2', '3'),
('362', '10', '1915', '2019-08-05', '4018', 'Amoxycillin/Clavulanic Acid Tablets 625mg-', '-600', '0', '0', '2', '3'),
('363', '10', '1915', '2019-08-05', '4418', 'Amoxycillin/Clavulanic Acid Tablets 625mg-', '600', '0', '0', '2', '3'),
('364', '10', '1916', '2019-08-05', '4018', 'Multivitamins Tablets-', '-1500', '0', '0', '2', '3'),
('365', '10', '1916', '2019-08-05', '4418', 'Multivitamins Tablets-', '1500', '0', '0', '2', '3'),
('366', '10', '1917', '2019-08-05', '4018', 'Levofloxacin Tabs 500mg-', '-100', '0', '0', '2', '3'),
('367', '10', '1918', '2019-08-05', '4018', 'Stomacid-', '-2000', '0', '0', '2', '3'),
('368', '10', '1919', '2019-08-05', '4018', 'Amlodipine Tablets 5mg-', '-100', '0', '0', '2', '3'),
('369', '10', '1920', '2019-08-05', '4018', 'Hemotons 250ml-', '-1200', '0', '0', '2', '3'),
('370', '10', '1921', '2019-08-05', '4018', 'Fluconazole Tablets 200mg-', '-300', '0', '0', '2', '3'),
('371', '10', '1921', '2019-08-05', '4018', 'Ceftriaxone 1g-', '-1000', '0', '0', '2', '3'),
('372', '10', '1921', '2019-08-05', '4018', 'Aminosidine syrup 60ml-', '-5200', '0', '0', '2', '3'),
('373', '10', '1922', '2019-08-05', '4018', 'Amlodipine Tablets 5mg-', '-1000', '0', '0', '2', '3'),
('374', '10', '1922', '2019-08-05', '4418', 'Amlodipine Tablets 5mg-', '1000', '0', '0', '2', '3'),
('375', '10', '1922', '2019-08-05', '4018', 'Meloxicam BP 15mg-', '-200', '0', '0', '2', '3'),
('376', '10', '1922', '2019-08-05', '4418', 'Meloxicam BP 15mg-', '200', '0', '0', '2', '3'),
('377', '10', '1922', '2019-08-05', '4018', 'Amoxycillin 500mg Capsules-', '-420', '0', '0', '2', '3'),
('378', '10', '1922', '2019-08-05', '4418', 'Amoxycillin 500mg Capsules-', '420', '0', '0', '2', '3'),
('379', '1', '3', '2019-08-05', '5700', 'Stationery supplys.', '30000', '2', '0', NULL, NULL),
('380', '1', '3', '2019-08-05', '1065', '', '-30000', '0', '0', NULL, NULL),
('381', '10', '1923', '2019-08-05', '4018', 'Amoxycillin 500mg Capsules-', '-1050', '0', '0', '2', '3'),
('382', '10', '1923', '2019-08-05', '4015', 'Amoxycillin 500mg Capsules-', '1050', '0', '0', '2', '3'),
('383', '10', '1923', '2019-08-05', '4018', 'Amoxycillin/Clavulanic Acid Tablets 375mg-', '-200', '0', '0', '2', '3'),
('384', '10', '1923', '2019-08-05', '4015', 'Amoxycillin/Clavulanic Acid Tablets 375mg-', '200', '0', '0', '2', '3'),
('385', '10', '1924', '2019-08-05', '4018', 'Promethazine Hydrochloride Tablets 25mg-', '-100', '0', '0', '2', '3'),
('386', '10', '1924', '2019-08-05', '4015', 'Promethazine Hydrochloride Tablets 25mg-', '100', '0', '0', '2', '3'),
('387', '10', '1924', '2019-08-05', '4018', 'Atenolol Tablets BP 50mg-', '-120', '0', '0', '2', '3'),
('388', '10', '1924', '2019-08-05', '4015', 'Atenolol Tablets BP 50mg-', '120', '0', '0', '2', '3'),
('389', '10', '1925', '2019-08-05', '4018', 'Aminosidine syrup 60ml-Dan  Teddy Wanuiti', '-5200', '0', '0', '2', '3'),
('390', '10', '1925', '2019-08-05', '4015', 'Aminosidine syrup 60ml-Dan  Teddy Wanuiti', '5200', '0', '0', '2', '3'),
('391', '10', '1925', '2019-08-05', '4018', 'Clotrimazole Mouth Paint-Dan  Teddy Wanuiti', '-500', '0', '0', '2', '3'),
('392', '10', '1925', '2019-08-05', '4015', 'Clotrimazole Mouth Paint-Dan  Teddy Wanuiti', '500', '0', '0', '2', '3'),
('393', '10', '1926', '2019-08-05', '4017', 'Dr.Colins-IP42-Dan  Teddy Wanuiti', '-0', '0', '0', '2', '3'),
('394', '10', '1926', '2019-08-05', '4015', 'Dr.Colins-IP42-Dan  Teddy Wanuiti', '0', '0', '0', '2', '3'),
('395', '10', '1927', '2019-08-05', '4017', 'Dr.Colins-IP42-Dan  Teddy Wanuiti', '-0', '0', '0', '2', '3'),
('396', '10', '1927', '2019-08-05', '4015', 'Dr.Colins-IP42-Dan  Teddy Wanuiti', '0', '0', '0', '2', '3'),
('398', '10', '1929', '2019-08-06', '1200', 'TRF ', '36000', '0', '0', '2', '3'),
('399', '10', '1929', '0000-00-00', '4418', 'TRF ', '-36000', '0', '0', '2', '3'),
('400', '10', '1930', '2019-08-06', '1200', 'NHIF CR -Sally Sa Sally', '36000', '0', '0', '2', '3'),
('401', '10', '1930', '0000-00-00', '4418', 'NHIF CR Sally Sa Sally', '-36000', '0', '0', '2', '3'),
('402', '10', '1931', '2019-08-06', '1200', 'NHIF CR -Sally Sa Sally', '36000', '0', '0', '2', '3'),
('403', '10', '1931', '0000-00-00', '4418', 'NHIF CR -Sally Sa Sally', '-36000', '0', '0', '2', '3'),
('404', '1', '4', '2019-08-06', '2100', 'IT Support Invoices I996, I00998, I66642', '65000', '0', '0', '3', '3'),
('405', '1', '4', '2019-08-06', '1065', '', '-65000', '0', '0', NULL, NULL),
('406', '2', '2', '2019-08-06', '1200', 'Patient Invoices O0001,O0002,O0003', '-70000', '0', '0', '2', '4'),
('407', '2', '2', '2019-08-06', '1065', '', '70000', '0', '0', NULL, NULL),
('408', '4', '1', '2019-08-06', '1065', 'From Petty Cash account To Current account', '-698790', '0', '0', NULL, NULL),
('409', '0', '5', '2019-08-06', '1065', 'Exchange Variance', '3000', '0', '0', NULL, NULL),
('410', '0', '5', '2019-08-06', '4450', 'Exchange Variance', '-3000', '0', '0', NULL, NULL),
('411', '4', '1', '2019-08-06', '5690', 'From Petty Cash account To Current account', '790', '0', '0', NULL, NULL),
('412', '4', '1', '2019-08-06', '1060', 'From Petty Cash account To Current account', '698000', '0', '0', NULL, NULL),
('413', '0', '6', '2019-08-06', '1066', 'Daily banking', '-60000', '0', '0', NULL, NULL),
('414', '0', '6', '2019-08-06', '1065', 'Banking', '60000', '0', '0', NULL, NULL);

### Structure of table `0_grn_batch` ###

## DROP TABLE IF EXISTS `0_grn_batch`;

CREATE TABLE IF NOT EXISTS `0_grn_batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `purch_order_no` int(11) DEFAULT NULL,
  `reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `loc_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` double DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `delivery_date` (`delivery_date`),
  KEY `purch_order_no` (`purch_order_no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_grn_batch` ###

INSERT INTO `0_grn_batch` VALUES
('1', '1', '1', '001/2018', '2018-05-05', 'DEF', '1'),
('2', '1', '2', 'auto', '2018-05-05', 'DEF', '1'),
('3', '1', '3', 'auto', '2019-01-21', 'DEF', '1'),
('4', '1', '4', '001/2019', '2019-07-03', 'DEF', '1'),
('5', '1', '5', '002/2019', '2019-07-03', 'DEF', '1'),
('6', '6', '6', 'auto', '2019-07-19', 'DEF', '1'),
('7', '6', '7', 'auto', '2019-07-19', 'DEF', '1'),
('8', '6', '8', 'auto', '2019-07-19', 'DEF', '1'),
('9', '6', '9', 'auto', '2019-07-19', 'DEF', '1'),
('10', '6', '10', 'auto', '2019-08-04', '001', '1');

### Structure of table `0_grn_items` ###

## DROP TABLE IF EXISTS `0_grn_items`;

CREATE TABLE IF NOT EXISTS `0_grn_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grn_batch_id` int(11) DEFAULT NULL,
  `po_detail_item` int(11) NOT NULL DEFAULT '0',
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `qty_recd` double NOT NULL DEFAULT '0',
  `quantity_inv` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `grn_batch_id` (`grn_batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_grn_items` ###

INSERT INTO `0_grn_items` VALUES
('1', '1', '1', '101', 'iPad Air 2 16GB', '100', '100'),
('2', '1', '2', '102', 'iPhone 6 64GB', '100', '100'),
('3', '1', '3', '103', 'iPhone Cover Case', '100', '100'),
('4', '2', '4', '101', 'iPad Air 2 16GB', '15', '15'),
('5', '3', '5', '102', 'iPhone 6 64GB', '6', '6'),
('6', '4', '6', 'GL001', 'Gloves Pair', '20', '20'),
('7', '5', '7', 'GL001', 'Gloves Pair', '100', '100'),
('8', '5', '8', '103', 'iPhone Cover Case', '1000', '1000'),
('9', '5', '9', '102', 'iPhone 6 64GB', '2000', '2000'),
('10', '6', '10', '202', 'Maintenance', '1', '1'),
('11', '6', '11', '301', 'Support', '1', '1'),
('12', '7', '12', 'GL001', 'Gloves Pair', '1', '1'),
('13', '8', '13', '009', 'Doctors fee', '1', '1'),
('14', '9', '14', '009', 'Doctors fee - IRENE KATE IP 099/2019', '1', '1'),
('15', '10', '15', '008', 'Kbb 676l Honda', '1', '1');

### Structure of table `0_groups` ###

## DROP TABLE IF EXISTS `0_groups`;

CREATE TABLE IF NOT EXISTS `0_groups` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_groups` ###

INSERT INTO `0_groups` VALUES
('1', 'Small', '0'),
('2', 'Medium', '0'),
('3', 'Large', '0');

### Structure of table `0_item_codes` ###

## DROP TABLE IF EXISTS `0_item_codes`;

CREATE TABLE IF NOT EXISTS `0_item_codes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category_id` smallint(6) unsigned NOT NULL,
  `quantity` double NOT NULL DEFAULT '1',
  `is_foreign` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `stock_id` (`stock_id`,`item_code`),
  KEY `item_code` (`item_code`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_item_codes` ###

INSERT INTO `0_item_codes` VALUES
('1', '101', '101', 'iPad Air 2 16GB', '1', '1', '0', '0'),
('2', '102', '102', 'iPhone 6 64GB', '1', '1', '0', '0'),
('3', '103', '103', 'iPhone Cover Case', '1', '1', '0', '0'),
('4', '201', '201', 'AP Surf Set', '3', '1', '0', '0'),
('5', '301', '301', 'Support', '4', '1', '0', '0'),
('6', '501', '102', 'iPhone Pack', '1', '1', '0', '0'),
('7', '501', '103', 'iPhone Pack', '1', '1', '0', '0'),
('8', '202', '202', 'Maintenance', '4', '1', '0', '0'),
('9', 'GL001', 'GL001', 'Gloves Pair', '1', '1', '0', '0'),
('11', '009', '009', 'Doctors fee', '4', '1', '0', '0'),
('12', '008', '008', 'Kbb 676l Honda', '5', '1', '0', '0'),
('13', '0002', '0002', 'Ambulance KCT9986V', '5', '1', '0', '0');

### Structure of table `0_item_tax_type_exemptions` ###

## DROP TABLE IF EXISTS `0_item_tax_type_exemptions`;

CREATE TABLE IF NOT EXISTS `0_item_tax_type_exemptions` (
  `item_tax_type_id` int(11) NOT NULL DEFAULT '0',
  `tax_type_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_tax_type_id`,`tax_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_item_tax_type_exemptions` ###


### Structure of table `0_item_tax_types` ###

## DROP TABLE IF EXISTS `0_item_tax_types`;

CREATE TABLE IF NOT EXISTS `0_item_tax_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `exempt` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_item_tax_types` ###

INSERT INTO `0_item_tax_types` VALUES
('1', 'Regular', '0', '0');

### Structure of table `0_item_units` ###

## DROP TABLE IF EXISTS `0_item_units`;

CREATE TABLE IF NOT EXISTS `0_item_units` (
  `abbr` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `decimals` tinyint(2) NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`abbr`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_item_units` ###

INSERT INTO `0_item_units` VALUES
('each', 'Each', '0', '0'),
('hr', 'Hours', '0', '0');

### Structure of table `0_journal` ###

## DROP TABLE IF EXISTS `0_journal`;

CREATE TABLE IF NOT EXISTS `0_journal` (
  `type` smallint(6) NOT NULL DEFAULT '0',
  `trans_no` int(11) NOT NULL DEFAULT '0',
  `tran_date` date DEFAULT '0000-00-00',
  `reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `source_ref` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `event_date` date DEFAULT '0000-00-00',
  `doc_date` date NOT NULL DEFAULT '0000-00-00',
  `currency` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `amount` double NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '1',
  PRIMARY KEY (`type`,`trans_no`),
  KEY `tran_date` (`tran_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_journal` ###

INSERT INTO `0_journal` VALUES
('0', '1', '2018-12-31', '001/2012', '', '2018-12-31', '2018-12-31', 'USD', '2163.57', '1'),
('0', '2', '2019-06-30', '001/2019', '0009986', '2019-06-30', '2019-06-30', 'USD', '9000', '1'),
('0', '3', '2019-07-03', '002/2019', '', '2019-07-03', '2019-07-03', 'Ksh', '3000', '1'),
('0', '4', '2019-07-20', '003/2019', '333421', '2019-07-20', '2019-07-20', 'Ksh', '120000', '1'),
('0', '5', '2019-08-06', '004/2019', '', '2019-08-06', '2019-08-06', 'Ksh', '-3000', '1'),
('0', '6', '2019-08-06', '005/2019', '000987', '2019-08-06', '2019-08-06', 'Ksh', '60000', '1');

### Structure of table `0_loc_stock` ###

## DROP TABLE IF EXISTS `0_loc_stock`;

CREATE TABLE IF NOT EXISTS `0_loc_stock` (
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `reorder_level` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`loc_code`,`stock_id`),
  KEY `stock_id` (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_loc_stock` ###

INSERT INTO `0_loc_stock` VALUES
('001', '0002', '0'),
('001', '008', '0'),
('001', '009', '0'),
('001', '101', '0'),
('001', '102', '0'),
('001', '103', '0'),
('001', '201', '0'),
('001', '202', '0'),
('001', '301', '0'),
('001', 'GL001', '0'),
('002', '0002', '0'),
('002', '008', '0'),
('002', '009', '0'),
('002', '101', '0'),
('002', '102', '0'),
('002', '103', '0'),
('002', '201', '0'),
('002', '202', '0'),
('002', '301', '0'),
('002', 'GL001', '0'),
('DEF', '0002', '0'),
('DEF', '008', '0'),
('DEF', '009', '0'),
('DEF', '101', '0'),
('DEF', '102', '0'),
('DEF', '103', '0'),
('DEF', '201', '0'),
('DEF', '202', '0'),
('DEF', '301', '0'),
('DEF', 'GL001', '20');

### Structure of table `0_locations` ###

## DROP TABLE IF EXISTS `0_locations`;

CREATE TABLE IF NOT EXISTS `0_locations` (
  `loc_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `location_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone2` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fax` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fixed_asset` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`loc_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_locations` ###

INSERT INTO `0_locations` VALUES
('001', 'main store', '', '0729446243', '', '', '', 'admin', '1', '0'),
('002', 'Bustani', '', '', '', '', '', 'Admin', '1', '0'),
('DEF', 'Default', 'N/A', '', '', '', '', '', '0', '0');

### Structure of table `0_payment_terms` ###

## DROP TABLE IF EXISTS `0_payment_terms`;

CREATE TABLE IF NOT EXISTS `0_payment_terms` (
  `terms_indicator` int(11) NOT NULL AUTO_INCREMENT,
  `terms` char(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `days_before_due` smallint(6) NOT NULL DEFAULT '0',
  `day_in_following_month` smallint(6) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`terms_indicator`),
  UNIQUE KEY `terms` (`terms`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_payment_terms` ###

INSERT INTO `0_payment_terms` VALUES
('1', 'Due 15th Of the Following Month', '0', '17', '0'),
('2', 'Due By End Of The Following Month', '0', '30', '0'),
('3', 'Payment due within 10 days', '10', '0', '0'),
('4', 'Cash Only', '0', '0', '0'),
('5', 'Prepaid', '-1', '0', '0'),
('6', '', '0', '0', '0');

### Structure of table `0_prices` ###

## DROP TABLE IF EXISTS `0_prices`;

CREATE TABLE IF NOT EXISTS `0_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sales_type_id` int(11) NOT NULL DEFAULT '0',
  `curr_abrev` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `price` (`stock_id`,`sales_type_id`,`curr_abrev`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_prices` ###

INSERT INTO `0_prices` VALUES
('1', '101', '1', 'Ksh', '500'),
('2', '102', '1', 'Ksh', '250'),
('3', '103', '1', 'USD', '50'),
('4', 'GL001', '1', 'Ksh', '500');

### Structure of table `0_print_profiles` ###

## DROP TABLE IF EXISTS `0_print_profiles`;

CREATE TABLE IF NOT EXISTS `0_print_profiles` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `profile` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `report` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profile` (`profile`,`report`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_print_profiles` ###

INSERT INTO `0_print_profiles` VALUES
('1', 'Out of office', NULL, '0'),
('2', 'Sales Department', NULL, '0'),
('3', 'Central', NULL, '2'),
('4', 'Sales Department', '104', '2'),
('5', 'Sales Department', '105', '2'),
('6', 'Sales Department', '107', '2'),
('7', 'Sales Department', '109', '2'),
('8', 'Sales Department', '110', '2'),
('9', 'Sales Department', '201', '2');

### Structure of table `0_printers` ###

## DROP TABLE IF EXISTS `0_printers`;

CREATE TABLE IF NOT EXISTS `0_printers` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `queue` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `port` smallint(11) unsigned NOT NULL,
  `timeout` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_printers` ###

INSERT INTO `0_printers` VALUES
('1', 'QL500', 'Label printer', 'QL500', 'server', '127', '20'),
('2', 'Samsung', 'Main network printer', 'scx4521F', 'server', '515', '5'),
('3', 'Local', 'Local print server at user IP', 'lp', '', '515', '10');

### Structure of table `0_purch_data` ###

## DROP TABLE IF EXISTS `0_purch_data`;

CREATE TABLE IF NOT EXISTS `0_purch_data` (
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` double NOT NULL DEFAULT '0',
  `suppliers_uom` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `conversion_factor` double NOT NULL DEFAULT '1',
  `supplier_description` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`supplier_id`,`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_purch_data` ###

INSERT INTO `0_purch_data` VALUES
('1', '101', '200', '', '1', 'iPad Air 2 16GB'),
('1', '102', '150', '', '1', 'iPhone 6 64GB'),
('1', '103', '10', '', '1', 'iPhone Cover Case'),
('1', 'GL001', '300', '', '1', 'Gloves Pair'),
('6', '008', '2000000', '', '1', 'Kbb 676l Honda'),
('6', '009', '20000', '', '1', 'Doctors fee - IRENE KATE IP 099/2019'),
('6', '202', '200000', '', '1', 'Maintenance'),
('6', '301', '50000', '', '1', 'Support'),
('6', 'GL001', '15000', '', '1', 'Gloves Pair');

### Structure of table `0_purch_order_details` ###

## DROP TABLE IF EXISTS `0_purch_order_details`;

CREATE TABLE IF NOT EXISTS `0_purch_order_details` (
  `po_detail_item` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `qty_invoiced` double NOT NULL DEFAULT '0',
  `unit_price` double NOT NULL DEFAULT '0',
  `act_price` double NOT NULL DEFAULT '0',
  `std_cost_unit` double NOT NULL DEFAULT '0',
  `quantity_ordered` double NOT NULL DEFAULT '0',
  `quantity_received` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`po_detail_item`),
  KEY `order` (`order_no`,`po_detail_item`),
  KEY `itemcode` (`item_code`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_purch_order_details` ###

INSERT INTO `0_purch_order_details` VALUES
('1', '1', '101', 'iPad Air 2 16GB', '2018-05-15', '100', '200', '200', '200', '100', '100'),
('2', '1', '102', 'iPhone 6 64GB', '2018-05-15', '100', '150', '150', '150', '100', '100'),
('3', '1', '103', 'iPhone Cover Case', '2018-05-15', '100', '10', '10', '10', '100', '100'),
('4', '2', '101', 'iPad Air 2 16GB', '2018-05-05', '15', '200', '200', '200', '15', '15'),
('5', '3', '102', 'iPhone 6 64GB', '2019-01-21', '6', '150', '150', '150', '6', '6'),
('6', '4', 'GL001', 'Gloves Pair', '2019-07-03', '20', '300', '300', '300', '20', '20'),
('7', '5', 'GL001', 'Gloves Pair', '2019-07-03', '100', '300', '300', '300', '100', '100'),
('8', '5', '103', 'iPhone Cover Case', '2019-07-03', '1000', '10', '10', '10', '1000', '1000'),
('9', '5', '102', 'iPhone 6 64GB', '2019-07-03', '2000', '150', '150', '150', '2000', '2000'),
('10', '6', '202', 'Maintenance', '2019-07-19', '1', '200000', '200000', '0', '1', '1'),
('11', '6', '301', 'Support', '2019-07-19', '1', '50000', '50000', '0', '1', '1'),
('12', '7', 'GL001', 'Gloves Pair', '2019-07-19', '1', '15000', '15000', '1000', '1', '1'),
('13', '8', '009', 'Doctors fee', '2019-07-19', '1', '20000', '20000', '0', '1', '1'),
('14', '9', '009', 'Doctors fee - IRENE KATE IP 099/2019', '2019-07-19', '1', '20000', '20000', '0', '1', '1'),
('15', '10', '008', 'Kbb 676l Honda', '2019-08-04', '1', '2000000', '2000000', '2000000', '1', '1');

### Structure of table `0_purch_orders` ###

## DROP TABLE IF EXISTS `0_purch_orders`;

CREATE TABLE IF NOT EXISTS `0_purch_orders` (
  `order_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `comments` tinytext COLLATE utf8_unicode_ci,
  `ord_date` date NOT NULL DEFAULT '0000-00-00',
  `reference` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `requisition_no` tinytext COLLATE utf8_unicode_ci,
  `into_stock_location` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `total` double NOT NULL DEFAULT '0',
  `prep_amount` double NOT NULL DEFAULT '0',
  `alloc` double NOT NULL DEFAULT '0',
  `tax_included` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_no`),
  KEY `ord_date` (`ord_date`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_purch_orders` ###

INSERT INTO `0_purch_orders` VALUES
('1', '1', NULL, '2018-05-05', '001/2018', NULL, 'DEF', 'N/A', '37800', '0', '0', '0'),
('2', '1', NULL, '2018-05-05', 'auto', 'rr4', 'DEF', 'N/A', '3150', '0', '0', '0'),
('3', '1', NULL, '2019-01-21', 'auto', 'asd5', 'DEF', 'N/A', '945', '0', '0', '0'),
('4', '1', NULL, '2019-07-03', 'auto', NULL, 'DEF', 'N/A', '6300', '0', '0', '0'),
('5', '1', NULL, '2019-07-03', 'auto', NULL, 'DEF', 'N/A', '340000', '0', '0', '0'),
('6', '6', NULL, '2019-07-19', 'auto', '00098', 'DEF', 'N/A', '250000', '0', '0', '0'),
('7', '6', NULL, '2019-07-19', 'auto', '09998', 'DEF', 'N/A', '15000', '0', '0', '0'),
('8', '6', NULL, '2019-07-19', 'auto', '0991', 'DEF', 'N/A', '20000', '0', '0', '0'),
('9', '6', NULL, '2019-07-19', 'auto', '0098', 'DEF', 'N/A', '20000', '0', '0', '0'),
('10', '6', NULL, '2019-08-04', 'auto', 'ouyu87', '001', 'khjjkh', '2000000', '0', '0', '0');

### Structure of table `0_quick_entries` ###

## DROP TABLE IF EXISTS `0_quick_entries`;

CREATE TABLE IF NOT EXISTS `0_quick_entries` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usage` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_amount` double NOT NULL DEFAULT '0',
  `base_desc` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bal_type` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `description` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_quick_entries` ###

INSERT INTO `0_quick_entries` VALUES
('1', '1', 'Maintenance', NULL, '0', 'Amount', '0'),
('2', '4', 'Phone', NULL, '0', 'Amount', '0'),
('3', '2', 'Cash Sales', 'Retail sales without invoice', '0', 'Amount', '0');

### Structure of table `0_quick_entry_lines` ###

## DROP TABLE IF EXISTS `0_quick_entry_lines`;

CREATE TABLE IF NOT EXISTS `0_quick_entry_lines` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `qid` smallint(6) unsigned NOT NULL,
  `amount` double DEFAULT '0',
  `memo` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `dest_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dimension_id` smallint(6) unsigned DEFAULT NULL,
  `dimension2_id` smallint(6) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qid` (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_quick_entry_lines` ###

INSERT INTO `0_quick_entry_lines` VALUES
('1', '1', '0', '', 't-', '1', '0', '0'),
('2', '2', '0', '', 't-', '1', '0', '0'),
('3', '3', '0', '', 't-', '1', '0', '0'),
('4', '3', '0', '', '=', '4010', '0', '0'),
('5', '1', '0', '', '=', '5765', '0', '0'),
('6', '2', '0', '', '=', '5780', '0', '0');

### Structure of table `0_recurrent_invoices` ###

## DROP TABLE IF EXISTS `0_recurrent_invoices`;

CREATE TABLE IF NOT EXISTS `0_recurrent_invoices` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `order_no` int(11) unsigned NOT NULL,
  `debtor_no` int(11) unsigned DEFAULT NULL,
  `group_no` smallint(6) unsigned DEFAULT NULL,
  `days` int(11) NOT NULL DEFAULT '0',
  `monthly` int(11) NOT NULL DEFAULT '0',
  `begin` date NOT NULL DEFAULT '0000-00-00',
  `end` date NOT NULL DEFAULT '0000-00-00',
  `last_sent` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_recurrent_invoices` ###

INSERT INTO `0_recurrent_invoices` VALUES
('1', 'Weekly Maintenance', '6', '1', '1', '7', '0', '2018-04-01', '2020-05-07', '2018-04-08');

### Structure of table `0_reflines` ###

## DROP TABLE IF EXISTS `0_reflines`;

CREATE TABLE IF NOT EXISTS `0_reflines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_type` int(11) NOT NULL,
  `prefix` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pattern` varchar(35) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `prefix` (`trans_type`,`prefix`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_reflines` ###

INSERT INTO `0_reflines` VALUES
('1', '0', '', '{001}/{YYYY}', '', '1', '0'),
('2', '1', '', '{001}/{YYYY}', '', '1', '0'),
('3', '2', '', '{001}/{YYYY}', '', '1', '0'),
('4', '4', '', '{001}/{YYYY}', '', '1', '0'),
('5', '10', '', '{001}/{YYYY}', '', '1', '0'),
('6', '11', '', '{001}/{YYYY}', '', '1', '0'),
('7', '12', '', '{001}/{YYYY}', '', '1', '0'),
('8', '13', '', '{001}/{YYYY}', '', '1', '0'),
('9', '16', '', '{001}/{YYYY}', '', '1', '0'),
('10', '17', '', '{001}/{YYYY}', '', '1', '0'),
('11', '18', '', '{001}/{YYYY}', '', '1', '0'),
('12', '20', '', '{001}/{YYYY}', '', '1', '0'),
('13', '21', '', '{001}/{YYYY}', '', '1', '0'),
('14', '22', '', '{001}/{YYYY}', '', '1', '0'),
('15', '25', '', '{001}/{YYYY}', '', '1', '0'),
('16', '26', '', '{001}/{YYYY}', '', '1', '0'),
('17', '28', '', '{001}/{YYYY}', '', '1', '0'),
('18', '29', '', '{001}/{YYYY}', '', '1', '0'),
('19', '30', '', '{001}/{YYYY}', '', '1', '0'),
('20', '32', '', '{001}/{YYYY}', '', '1', '0'),
('21', '35', '', '{001}/{YYYY}', '', '1', '0'),
('22', '40', '', '{001}/{YYYY}', '', '1', '0');

### Structure of table `0_refs` ###

## DROP TABLE IF EXISTS `0_refs`;

CREATE TABLE IF NOT EXISTS `0_refs` (
  `id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `reference` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`type`),
  KEY `Type_and_Reference` (`type`,`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_refs` ###

INSERT INTO `0_refs` VALUES
('2', '0', '001/2019'),
('3', '0', '002/2019'),
('4', '0', '003/2019'),
('5', '0', '005/2019'),
('6', '0', '005/2019'),
('1', '1', '001/2018'),
('2', '1', '001/2019'),
('3', '1', '002/2019'),
('4', '1', '003/2019'),
('1', '2', '001/2019'),
('2', '2', '002/2019'),
('1', '4', '001/2019'),
('1', '10', '001/2018'),
('5', '10', '001/2019'),
('2', '10', '002/2018'),
('6', '10', '002/2019'),
('3', '10', '003/2018'),
('7', '10', '003/2019'),
('4', '10', '004/2018'),
('8', '10', '004/2019'),
('9', '10', '005/2019'),
('10', '10', '1885'),
('1', '12', '001/2018'),
('4', '12', '001/2019'),
('2', '12', '002/2018'),
('5', '12', '002/2019'),
('3', '12', '003/2018'),
('6', '12', '003/2019'),
('7', '12', '004/2019'),
('1', '16', '001/2019'),
('1', '18', '001/2018'),
('1', '20', '001/2018'),
('2', '20', '001/2019'),
('3', '20', '002/2019'),
('4', '20', '003/2019'),
('5', '20', '004/2019'),
('6', '20', '005/2019'),
('7', '20', '006/2019'),
('8', '20', '007/2019'),
('1', '22', '001/2019'),
('1', '25', '001/2018'),
('4', '25', '001/2019'),
('5', '25', '002/2019'),
('1', '26', '001/2018'),
('2', '26', '002/2018'),
('3', '26', '003/2018'),
('3', '30', '001/2018'),
('4', '30', '002/2018'),
('6', '30', '003/2018'),
('11', '30', '003/2019'),
('1', '40', '001/2018'),
('2', '40', '001/2019');

### Structure of table `0_sales_order_details` ###

## DROP TABLE IF EXISTS `0_sales_order_details`;

CREATE TABLE IF NOT EXISTS `0_sales_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `trans_type` smallint(6) NOT NULL DEFAULT '30',
  `stk_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `qty_sent` double NOT NULL DEFAULT '0',
  `unit_price` double NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `invoiced` double NOT NULL DEFAULT '0',
  `discount_percent` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sorder` (`trans_type`,`order_no`),
  KEY `stkcode` (`stk_code`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_sales_order_details` ###

INSERT INTO `0_sales_order_details` VALUES
('1', '1', '30', '101', 'iPad Air 2 16GB', '20', '300', '20', '0', '0'),
('2', '1', '30', '301', 'Support', '3', '80', '3', '0', '0'),
('3', '2', '30', '101', 'iPad Air 2 16GB', '1', '300', '1', '0', '0'),
('4', '3', '30', '102', 'iPhone 6 64GB', '0', '250', '1', '0', '0'),
('5', '3', '30', '103', 'iPhone Cover Case', '0', '50', '1', '0', '0'),
('6', '4', '30', '101', 'iPad Air 2 16GB', '0', '267.14', '1', '0', '0'),
('7', '5', '30', '102', 'iPhone 6 64GB', '1', '222.62', '1', '0', '0'),
('8', '5', '30', '103', 'iPhone Cover Case', '1', '44.52', '1', '0', '0'),
('9', '6', '30', '202', 'Maintenance', '0', '90', '5', '0', '0'),
('10', '7', '30', '202', 'Maintenance', '5', '0', '5', '0', '0'),
('11', '8', '30', '102', 'iPhone 6 64GB', '5', '250', '5', '0', '0'),
('12', '9', '30', '202', 'Maintenance', '1', '30000', '1', '0', '0'),
('13', '10', '30', '301', 'Support', '1', '50000', '1', '0', '0'),
('14', '11', '30', '301', 'Support', '0', '50000', '1', '0', '0'),
('15', '12', '30', '301', 'Support', '1', '13000', '1', '0', '0'),
('16', '12', '30', '102', 'iPhone 6 64GB', '10', '250', '10', '0', '0'),
('17', '13', '30', 'GL001', 'Gloves Pair', '100', '500', '100', '0', '0');

### Structure of table `0_sales_orders` ###

## DROP TABLE IF EXISTS `0_sales_orders`;

CREATE TABLE IF NOT EXISTS `0_sales_orders` (
  `order_no` int(11) NOT NULL,
  `trans_type` smallint(6) NOT NULL DEFAULT '30',
  `version` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `debtor_no` int(11) NOT NULL DEFAULT '0',
  `branch_code` int(11) NOT NULL DEFAULT '0',
  `reference` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `customer_ref` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `comments` tinytext COLLATE utf8_unicode_ci,
  `ord_date` date NOT NULL DEFAULT '0000-00-00',
  `order_type` int(11) NOT NULL DEFAULT '0',
  `ship_via` int(11) NOT NULL DEFAULT '0',
  `delivery_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliver_to` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `freight_cost` double NOT NULL DEFAULT '0',
  `from_stk_loc` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `payment_terms` int(11) DEFAULT NULL,
  `total` double NOT NULL DEFAULT '0',
  `prep_amount` double NOT NULL DEFAULT '0',
  `alloc` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`trans_type`,`order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_sales_orders` ###

INSERT INTO `0_sales_orders` VALUES
('1', '30', '1', '0', '1', '1', 'auto', '', NULL, '2018-05-10', '1', '1', 'N/A', NULL, NULL, 'Donald Easter LLC', '0', 'DEF', '2018-05-05', '4', '6240', '0', '0'),
('2', '30', '1', '0', '1', '1', 'auto', '', NULL, '2018-05-07', '1', '1', 'N/A', NULL, NULL, 'Donald Easter LLC', '0', 'DEF', '2018-05-07', '4', '300', '0', '0'),
('3', '30', '0', '0', '1', '1', '001/2018', '', NULL, '2018-05-07', '1', '1', 'N/A', NULL, NULL, 'Donald Easter LLC', '0', 'DEF', '2018-05-08', '4', '300', '0', '0'),
('4', '30', '0', '0', '2', '2', '002/2018', '', NULL, '2018-05-07', '1', '1', 'N/A', NULL, NULL, 'MoneyMaker Ltd.', '0', 'DEF', '2018-05-08', '1', '267.14', '0', '0'),
('5', '30', '1', '0', '2', '2', 'auto', '', NULL, '2018-05-07', '1', '1', 'N/A', NULL, NULL, 'MoneyMaker Ltd.', '0', 'DEF', '2018-06-17', '1', '267.14', '0', '0'),
('6', '30', '0', '1', '1', '1', '003/2018', '', NULL, '2018-05-07', '1', '1', 'N/A', NULL, NULL, 'Donald Easter LLC', '0', 'DEF', '2018-05-08', '4', '450', '0', '0'),
('7', '30', '1', '0', '1', '1', 'auto', '', 'Recurrent Invoice covers period 04/01/2018 - 04/07/2018.', '2018-05-07', '1', '1', 'N/A', NULL, NULL, 'Donald Easter LLC', '0', 'DEF', '2018-05-07', '4', '0', '0', '0'),
('8', '30', '1', '0', '1', '1', 'auto', '', NULL, '2019-01-21', '1', '1', 'N/A', NULL, NULL, 'Donald Easter LLC', '0', 'DEF', '2019-01-21', '4', '1250', '0', '0'),
('9', '30', '1', '0', '3', '3', 'auto', '', NULL, '2019-06-30', '1', '1', 'Nairobi', '0710958791', NULL, 'National Health Insurance Fund', '0', 'DEF', '2019-06-30', '4', '30000', '0', '0'),
('10', '30', '1', '0', '3', '3', 'auto', '', NULL, '2019-06-30', '1', '1', 'Nairobi', '0710958791', NULL, 'National Health Insurance Fund', '0', 'DEF', '2019-06-30', '4', '50000', '0', '0'),
('11', '30', '0', '0', '3', '3', '003/2019', '', NULL, '2019-06-30', '1', '1', 'Nairobi', '0710958791', NULL, 'National Health Insurance Fund', '0', 'DEF', '2019-06-30', '4', '50000', '0', '0'),
('12', '30', '1', '0', '3', '3', 'auto', '', NULL, '2019-07-03', '1', '1', 'Nairobi', '0710958791', NULL, 'National Health Insurance Fund', '0', 'DEF', '2019-08-30', '2', '15500', '0', '0'),
('13', '30', '1', '0', '3', '3', 'auto', '', NULL, '2019-07-03', '1', '1', 'Nairobi', '0710958791', NULL, 'National Health Insurance Fund', '0', 'DEF', '2019-07-03', '4', '50000', '0', '0');

### Structure of table `0_sales_pos` ###

## DROP TABLE IF EXISTS `0_sales_pos`;

CREATE TABLE IF NOT EXISTS `0_sales_pos` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cash_sale` tinyint(1) NOT NULL,
  `credit_sale` tinyint(1) NOT NULL,
  `pos_location` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `pos_account` smallint(6) unsigned NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pos_name` (`pos_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_sales_pos` ###

INSERT INTO `0_sales_pos` VALUES
('1', 'Default', '1', '1', 'DEF', '2', '0');

### Structure of table `0_sales_types` ###

## DROP TABLE IF EXISTS `0_sales_types`;

CREATE TABLE IF NOT EXISTS `0_sales_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_type` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tax_included` int(1) NOT NULL DEFAULT '0',
  `factor` double NOT NULL DEFAULT '1',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sales_type` (`sales_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_sales_types` ###

INSERT INTO `0_sales_types` VALUES
('1', 'Retail', '1', '1', '0'),
('2', 'Wholesale', '0', '0.7', '0'),
('3', 'Patient Invoices', '0', '1', '0');

### Structure of table `0_salesman` ###

## DROP TABLE IF EXISTS `0_salesman`;

CREATE TABLE IF NOT EXISTS `0_salesman` (
  `salesman_code` int(11) NOT NULL AUTO_INCREMENT,
  `salesman_name` char(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salesman_phone` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salesman_fax` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salesman_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `provision` double NOT NULL DEFAULT '0',
  `break_pt` double NOT NULL DEFAULT '0',
  `provision2` double NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`salesman_code`),
  UNIQUE KEY `salesman_name` (`salesman_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_salesman` ###

INSERT INTO `0_salesman` VALUES
('1', 'Sales Person', '', '', '', '5', '1000', '4', '0');

### Structure of table `0_security_roles` ###

## DROP TABLE IF EXISTS `0_security_roles`;

CREATE TABLE IF NOT EXISTS `0_security_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sections` text COLLATE utf8_unicode_ci,
  `areas` text COLLATE utf8_unicode_ci,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_security_roles` ###

INSERT INTO `0_security_roles` VALUES
('1', 'Inquiries', 'Inquiries', '768;2816;3072;3328;5632;5888;8192;8448;10752;11008;13312;15872;16128', '257;258;259;260;513;514;515;516;517;518;519;520;521;522;523;524;525;773;774;2822;3073;3075;3076;3077;3329;3330;3331;3332;3333;3334;3335;5377;5633;5640;5889;5890;5891;7937;7938;7939;7940;8193;8194;8450;8451;10497;10753;11009;11010;11012;13313;13315;15617;15618;15619;15620;15621;15622;15623;15624;15625;15626;15873;15882;16129;16130;16131;16132;775', '0'),
('2', 'System Administrator', 'System Administrator', '256;512;768;2816;3072;3328;5376;5632;5888;7936;8192;8448;9216;9472;9728;10496;10752;11008;13056;13312;15616;15872;16128', '257;258;259;260;513;514;515;516;517;518;519;520;521;522;523;524;525;526;769;770;771;772;773;774;775;2817;2818;2819;2820;2821;2822;2823;3073;3074;3082;3075;3076;3077;3078;3079;3080;3081;3329;3330;3331;3332;3333;3334;3335;5377;5633;5634;5635;5636;5637;5641;5638;5639;5640;5889;5890;5891;7937;7938;7939;7940;8193;8194;8195;8196;8197;8449;8450;8451;9217;9218;9220;9473;9474;9475;9476;9729;10497;10753;10754;10755;10756;10757;11009;11010;11011;11012;13057;13313;13314;13315;15617;15618;15619;15620;15621;15622;15623;15624;15628;15625;15626;15627;15630;15629;15873;15874;15875;15876;15877;15878;15879;15880;15883;15881;15882;15884;16129;16130;16131;16132', '0'),
('3', 'Salesman', 'Salesman', '768;3072;5632;8192;15872', '773;774;3073;3075;3081;5633;8194;15873;775', '0'),
('4', 'Stock Manager', 'Stock Manager', '768;2816;3072;3328;5632;5888;8192;8448;10752;11008;13312;15872;16128', '2818;2822;3073;3076;3077;3329;3330;3330;3330;3331;3331;3332;3333;3334;3335;5633;5640;5889;5890;5891;8193;8194;8450;8451;10753;11009;11010;11012;13313;13315;15882;16129;16130;16131;16132;775', '0'),
('5', 'Production Manager', 'Production Manager', '512;768;2816;3072;3328;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '521;523;524;2818;2819;2820;2821;2822;2823;3073;3074;3076;3077;3078;3079;3080;3081;3329;3330;3330;3330;3331;3331;3332;3333;3334;3335;5633;5640;5640;5889;5890;5891;8193;8194;8196;8197;8450;8451;10753;10755;11009;11010;11012;13313;13315;15617;15619;15620;15621;15624;15624;15876;15877;15880;15882;16129;16130;16131;16132;775', '0'),
('6', 'Purchase Officer', 'Purchase Officer', '512;768;2816;3072;3328;5376;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '521;523;524;2818;2819;2820;2821;2822;2823;3073;3074;3076;3077;3078;3079;3080;3081;3329;3330;3330;3330;3331;3331;3332;3333;3334;3335;5377;5633;5635;5640;5640;5889;5890;5891;8193;8194;8196;8197;8449;8450;8451;10753;10755;11009;11010;11012;13313;13315;15617;15619;15620;15621;15624;15624;15876;15877;15880;15882;16129;16130;16131;16132;775', '0'),
('7', 'AR Officer', 'AR Officer', '512;768;2816;3072;3328;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '521;523;524;771;773;774;2818;2819;2820;2821;2822;2823;3073;3073;3074;3075;3076;3077;3078;3079;3080;3081;3081;3329;3330;3330;3330;3331;3331;3332;3333;3334;3335;5633;5633;5634;5637;5638;5639;5640;5640;5889;5890;5891;8193;8194;8194;8196;8197;8450;8451;10753;10755;11009;11010;11012;13313;13315;15617;15619;15620;15621;15624;15624;15873;15876;15877;15878;15880;15882;16129;16130;16131;16132;775', '0'),
('8', 'AP Officer', 'AP Officer', '512;768;2816;3072;3328;5376;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '257;258;259;260;521;523;524;769;770;771;772;773;774;2818;2819;2820;2821;2822;2823;3073;3074;3082;3076;3077;3078;3079;3080;3081;3329;3330;3331;3332;3333;3334;3335;5377;5633;5635;5640;5889;5890;5891;7937;7938;7939;7940;8193;8194;8196;8197;8449;8450;8451;10497;10753;10755;11009;11010;11012;13057;13313;13315;15617;15619;15620;15621;15624;15876;15877;15880;15882;16129;16130;16131;16132;775', '0'),
('9', 'Accountant', 'New Accountant', '512;768;2816;3072;3328;5376;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '257;258;259;260;521;523;524;771;772;773;774;2818;2819;2820;2821;2822;2823;3073;3074;3075;3076;3077;3078;3079;3080;3081;3329;3330;3331;3332;3333;3334;3335;5377;5633;5634;5635;5637;5638;5639;5640;5889;5890;5891;7937;7938;7939;7940;8193;8194;8196;8197;8449;8450;8451;10497;10753;10755;11009;11010;11012;13313;13315;15617;15618;15619;15620;15621;15624;15873;15876;15877;15878;15880;15882;16129;16130;16131;16132;775', '0'),
('10', 'Sub Admin', 'Sub Admin', '512;768;2816;3072;3328;5376;5632;5888;8192;8448;10752;11008;13312;15616;15872;16128', '257;258;259;260;521;523;524;771;772;773;774;2818;2819;2820;2821;2822;2823;3073;3074;3082;3075;3076;3077;3078;3079;3080;3081;3329;3330;3331;3332;3333;3334;3335;5377;5633;5634;5635;5637;5638;5639;5640;5889;5890;5891;7937;7938;7939;7940;8193;8194;8196;8197;8449;8450;8451;10497;10753;10755;11009;11010;11012;13057;13313;13315;15617;15619;15620;15621;15624;15873;15874;15876;15877;15878;15879;15880;15882;16129;16130;16131;16132;775', '0');

### Structure of table `0_shippers` ###

## DROP TABLE IF EXISTS `0_shippers`;

CREATE TABLE IF NOT EXISTS `0_shippers` (
  `shipper_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipper_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone2` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shipper_id`),
  UNIQUE KEY `name` (`shipper_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_shippers` ###

INSERT INTO `0_shippers` VALUES
('1', 'Default', '', '', '', '', '0');

### Structure of table `0_sql_trail` ###

## DROP TABLE IF EXISTS `0_sql_trail`;

CREATE TABLE IF NOT EXISTS `0_sql_trail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sql` text COLLATE utf8_unicode_ci NOT NULL,
  `result` tinyint(1) NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_sql_trail` ###


### Structure of table `0_stock_category` ###

## DROP TABLE IF EXISTS `0_stock_category`;

CREATE TABLE IF NOT EXISTS `0_stock_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_tax_type` int(11) NOT NULL DEFAULT '1',
  `dflt_units` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'each',
  `dflt_mb_flag` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'B',
  `dflt_sales_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_cogs_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_inventory_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_adjustment_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_wip_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_dim1` int(11) DEFAULT NULL,
  `dflt_dim2` int(11) DEFAULT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  `dflt_no_sale` tinyint(1) NOT NULL DEFAULT '0',
  `dflt_no_purchase` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `description` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_stock_category` ###

INSERT INTO `0_stock_category` VALUES
('1', 'Components', '1', 'each', 'B', '4010', '5010', '1510', '5040', '1530', '0', '0', '0', '0', '0'),
('2', 'Charges', '1', 'each', 'D', '4010', '5010', '1510', '5040', '1530', '0', '0', '0', '0', '0'),
('3', 'Systems', '1', 'each', 'M', '4010', '5010', '1510', '5040', '1530', '0', '0', '0', '0', '0'),
('4', 'Services', '1', 'hr', 'D', '4010', '5010', '1510', '5040', '1530', '0', '0', '0', '0', '0'),
('5', 'Vehicles', '1', 'each', 'F', '4010', '5010', '1510', '5040', '1530', '0', '0', '0', '0', '0');

### Structure of table `0_stock_fa_class` ###

## DROP TABLE IF EXISTS `0_stock_fa_class`;

CREATE TABLE IF NOT EXISTS `0_stock_fa_class` (
  `fa_class_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `long_description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `depreciation_rate` double NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fa_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_stock_fa_class` ###

INSERT INTO `0_stock_fa_class` VALUES
('Mov', '001', 'Movable Assets', '', '5', '0');

### Structure of table `0_stock_master` ###

## DROP TABLE IF EXISTS `0_stock_master`;

CREATE TABLE IF NOT EXISTS `0_stock_master` (
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `tax_type_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `long_description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `units` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'each',
  `mb_flag` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'B',
  `sales_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cogs_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inventory_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `adjustment_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `wip_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dimension_id` int(11) DEFAULT NULL,
  `dimension2_id` int(11) DEFAULT NULL,
  `purchase_cost` double NOT NULL DEFAULT '0',
  `material_cost` double NOT NULL DEFAULT '0',
  `labour_cost` double NOT NULL DEFAULT '0',
  `overhead_cost` double NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  `no_sale` tinyint(1) NOT NULL DEFAULT '0',
  `no_purchase` tinyint(1) NOT NULL DEFAULT '0',
  `editable` tinyint(1) NOT NULL DEFAULT '0',
  `depreciation_method` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  `depreciation_rate` double NOT NULL DEFAULT '0',
  `depreciation_factor` double NOT NULL DEFAULT '1',
  `depreciation_start` date NOT NULL DEFAULT '0000-00-00',
  `depreciation_date` date NOT NULL DEFAULT '0000-00-00',
  `fa_class_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_stock_master` ###

INSERT INTO `0_stock_master` VALUES
('0002', '5', '1', 'Ambulance KCT9986V', 'Abulance', 'each', 'F', '4010', '5010', '1510', '5040', '1530', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'S', '5', '0', '2019-08-01', '2019-08-01', 'Mov'),
('008', '5', '1', 'Kbb 676l Honda', 'popi', 'each', 'F', '4010', '5010', '1510', '5040', '1530', '0', '0', '2000000', '2000000', '0', '0', '0', '0', '0', '0', 'S', '5', '0', '2019-08-04', '2019-08-04', 'Mov'),
('009', '4', '1', 'Doctors fee', '', 'hr', 'D', '4010', '4510', '1510', '5040', '1530', '0', '0', '20000', '0', '0', '0', '0', '0', '0', '1', '', '0', '0', '0000-00-00', '0000-00-00', ''),
('101', '1', '1', 'iPad Air 2 16GB', '', 'each', 'B', '4010', '5010', '1510', '5040', '1530', '0', '0', '200', '200', '0', '0', '0', '0', '0', '0', 'S', '0', '1', '0000-00-00', '0000-00-00', ''),
('102', '1', '1', 'iPhone 6 64GB', '', 'each', 'B', '4010', '5010', '1510', '5040', '1530', '0', '0', '150', '150', '0', '0', '0', '0', '0', '0', 'S', '0', '1', '0000-00-00', '0000-00-00', ''),
('103', '1', '1', 'iPhone Cover Case', '', 'each', 'B', '4010', '5010', '1510', '5040', '1530', '0', '0', '10', '10', '0', '0', '0', '0', '0', '0', 'S', '0', '1', '0000-00-00', '0000-00-00', ''),
('201', '3', '1', 'AP Surf Set', '', 'each', 'M', '4010', '5010', '1510', '5040', '1530', '0', '0', '0', '360', '0', '0', '0', '0', '0', '0', 'S', '0', '1', '0000-00-00', '0000-00-00', ''),
('202', '4', '1', 'Maintenance', '', 'hr', 'D', '4010', '5010', '1510', '5040', '1530', '0', '0', '200000', '0', '0', '0', '0', '0', '0', '1', 'S', '0', '1', '0000-00-00', '0000-00-00', ''),
('301', '4', '1', 'Support', '', 'hr', 'D', '4010', '5010', '1510', '5040', '1530', '0', '0', '50000', '0', '0', '0', '0', '0', '0', '0', 'S', '0', '1', '0000-00-00', '0000-00-00', ''),
('GL001', '1', '1', 'Gloves Pair', 'Gloves Pair', 'each', 'B', '4010', '5030', '1510', '1510', '1530', '0', '0', '15000', '1000', '0', '0', '0', '0', '0', '0', '', '0', '0', '0000-00-00', '0000-00-00', '');

### Structure of table `0_stock_moves` ###

## DROP TABLE IF EXISTS `0_stock_moves`;

CREATE TABLE IF NOT EXISTS `0_stock_moves` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_no` int(11) NOT NULL DEFAULT '0',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` smallint(6) NOT NULL DEFAULT '0',
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `price` double NOT NULL DEFAULT '0',
  `reference` char(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `qty` double NOT NULL DEFAULT '1',
  `standard_cost` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`trans_id`),
  KEY `type` (`type`,`trans_no`),
  KEY `Move` (`stock_id`,`loc_code`,`tran_date`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_stock_moves` ###

INSERT INTO `0_stock_moves` VALUES
('1', '1', '101', '25', 'DEF', '2018-05-05', '200', '', '100', '200'),
('2', '1', '102', '25', 'DEF', '2018-05-05', '150', '', '100', '150'),
('3', '1', '103', '25', 'DEF', '2018-05-05', '10', '', '100', '10'),
('4', '1', '101', '13', 'DEF', '2018-05-10', '300', 'auto', '-20', '200'),
('5', '1', '301', '13', 'DEF', '2018-05-10', '80', 'auto', '-3', '0'),
('6', '1', '101', '29', 'DEF', '2018-05-05', '200', '001/2018', '-2', '200'),
('7', '1', '102', '29', 'DEF', '2018-05-05', '150', '001/2018', '-2', '150'),
('8', '1', '103', '29', 'DEF', '2018-05-05', '10', '001/2018', '-2', '10'),
('9', '1', '301', '29', 'DEF', '2018-05-05', '0', '001/2018', '-2', '0'),
('10', '1', '201', '26', 'DEF', '2018-05-05', '0', '001/2018', '2', '360'),
('11', '2', '101', '25', 'DEF', '2018-05-05', '200', '', '15', '200'),
('12', '2', '101', '13', 'DEF', '2018-05-07', '300', 'auto', '-1', '200'),
('13', '3', '102', '13', 'DEF', '2018-05-07', '222.62', 'auto', '-1', '150'),
('14', '3', '103', '13', 'DEF', '2018-05-07', '44.52', 'auto', '-1', '10'),
('15', '4', '202', '13', 'DEF', '2018-05-07', '0', 'auto', '-5', '0'),
('16', '5', '102', '13', 'DEF', '2019-01-21', '250', 'auto', '-5', '150'),
('17', '3', '102', '25', 'DEF', '2019-01-21', '150', '', '6', '150'),
('18', '6', '202', '13', 'DEF', '2019-06-30', '30000', 'auto', '-1', '0'),
('19', '7', '301', '13', 'DEF', '2019-06-30', '50000', 'auto', '-1', '0'),
('20', '8', '301', '13', 'DEF', '2019-07-03', '13000', 'auto', '-1', '0'),
('21', '8', '102', '13', 'DEF', '2019-07-03', '250', 'auto', '-10', '150'),
('22', '4', 'GL001', '25', 'DEF', '2019-07-03', '300', '', '20', '300'),
('23', '5', 'GL001', '25', 'DEF', '2019-07-03', '300', '', '100', '300'),
('24', '5', '103', '25', 'DEF', '2019-07-03', '10', '', '1000', '10'),
('25', '5', '102', '25', 'DEF', '2019-07-03', '150', '', '2000', '150'),
('26', '9', 'GL001', '13', 'DEF', '2019-07-03', '500', 'auto', '-100', '300'),
('27', '6', '202', '25', 'DEF', '2019-07-19', '200000', '', '1', '0'),
('28', '6', '301', '25', 'DEF', '2019-07-19', '50000', '', '1', '0'),
('29', '7', 'GL001', '25', 'DEF', '2019-07-19', '15000', '', '1', '1000'),
('30', '8', '009', '25', 'DEF', '2019-07-19', '20000', '', '1', '0'),
('31', '9', '009', '25', 'DEF', '2019-07-19', '20000', '', '1', '0'),
('32', '10', '008', '25', '001', '2019-08-04', '2000000', '', '1', '2000000'),
('33', '1', '008', '16', '001', '2019-08-05', '0', '001/2019', '-1', '0'),
('34', '1', '008', '16', '002', '2019-08-05', '0', '001/2019', '1', '0');

### Structure of table `0_supp_allocations` ###

## DROP TABLE IF EXISTS `0_supp_allocations`;

CREATE TABLE IF NOT EXISTS `0_supp_allocations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) DEFAULT NULL,
  `amt` double unsigned DEFAULT NULL,
  `date_alloc` date NOT NULL DEFAULT '0000-00-00',
  `trans_no_from` int(11) DEFAULT NULL,
  `trans_type_from` int(11) DEFAULT NULL,
  `trans_no_to` int(11) DEFAULT NULL,
  `trans_type_to` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trans_type_from` (`person_id`,`trans_type_from`,`trans_no_from`,`trans_type_to`,`trans_no_to`),
  KEY `From` (`trans_type_from`,`trans_no_from`),
  KEY `To` (`trans_type_to`,`trans_no_to`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_supp_allocations` ###

INSERT INTO `0_supp_allocations` VALUES
('1', '6', '250000', '2019-07-19', '1', '22', '4', '20'),
('2', '6', '15000', '2019-07-19', '1', '22', '5', '20');

### Structure of table `0_supp_invoice_items` ###

## DROP TABLE IF EXISTS `0_supp_invoice_items`;

CREATE TABLE IF NOT EXISTS `0_supp_invoice_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supp_trans_no` int(11) DEFAULT NULL,
  `supp_trans_type` int(11) DEFAULT NULL,
  `gl_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grn_item_id` int(11) DEFAULT NULL,
  `po_detail_item_id` int(11) DEFAULT NULL,
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `quantity` double NOT NULL DEFAULT '0',
  `unit_price` double NOT NULL DEFAULT '0',
  `unit_tax` double NOT NULL DEFAULT '0',
  `memo_` tinytext COLLATE utf8_unicode_ci,
  `dimension_id` int(11) NOT NULL DEFAULT '0',
  `dimension2_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Transaction` (`supp_trans_type`,`supp_trans_no`,`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_supp_invoice_items` ###

INSERT INTO `0_supp_invoice_items` VALUES
('1', '1', '20', '0', '4', '4', '101', 'iPad Air 2 16GB', '15', '200', '10', NULL, '0', '0'),
('2', '2', '20', '0', '5', '5', '102', 'iPhone 6 64GB', '6', '150', '7.5', NULL, '0', '0'),
('3', '3', '20', '0', '1', '1', '101', 'iPad Air 2 16GB', '100', '200', '0', NULL, '0', '0'),
('4', '3', '20', '0', '2', '2', '102', 'iPhone 6 64GB', '100', '150', '0', NULL, '0', '0'),
('5', '3', '20', '0', '3', '3', '103', 'iPhone Cover Case', '100', '10', '0', NULL, '0', '0'),
('6', '3', '20', '0', '6', '6', 'GL001', 'Gloves Pair', '20', '300', '0', NULL, '0', '0'),
('7', '3', '20', '0', '7', '7', 'GL001', 'Gloves Pair', '100', '300', '0', NULL, '0', '0'),
('8', '3', '20', '0', '8', '8', '103', 'iPhone Cover Case', '1000', '10', '0', NULL, '0', '0'),
('9', '3', '20', '0', '9', '9', '102', 'iPhone 6 64GB', '2000', '150', '0', NULL, '0', '0'),
('10', '4', '20', '0', '10', '10', '202', 'Maintenance', '1', '200000', '0', NULL, '0', '0'),
('11', '4', '20', '0', '11', '11', '301', 'Support', '1', '50000', '0', NULL, '0', '0'),
('12', '5', '20', '0', '12', '12', 'GL001', 'Gloves Pair', '1', '15000', '0', NULL, '0', '0'),
('13', '6', '20', '0', '13', '13', '009', 'Doctors fee', '1', '20000', '0', NULL, '0', '0'),
('14', '7', '20', '0', '14', '14', '009', 'Doctors fee - IRENE KATE IP 099/2019', '1', '20000', '0', NULL, '0', '0'),
('15', '8', '20', '0', '15', '15', '008', 'Kbb 676l Honda', '1', '2000000', '0', NULL, '0', '0');

### Structure of table `0_supp_trans` ###

## DROP TABLE IF EXISTS `0_supp_trans`;

CREATE TABLE IF NOT EXISTS `0_supp_trans` (
  `trans_no` int(11) unsigned NOT NULL DEFAULT '0',
  `type` smallint(6) unsigned NOT NULL DEFAULT '0',
  `supplier_id` int(11) unsigned NOT NULL,
  `reference` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `supp_reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  `ov_amount` double NOT NULL DEFAULT '0',
  `ov_discount` double NOT NULL DEFAULT '0',
  `ov_gst` double NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '1',
  `alloc` double NOT NULL DEFAULT '0',
  `tax_included` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type`,`trans_no`,`supplier_id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `tran_date` (`tran_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_supp_trans` ###

INSERT INTO `0_supp_trans` VALUES
('3', '1', '6', '002/2019', '', '2019-08-05', '0000-00-00', '-30000', '0', '0', '1', '0', '0'),
('4', '1', '3', '003/2019', '', '2019-08-06', '0000-00-00', '-65000', '0', '0', '1', '0', '0'),
('1', '20', '1', '001/2018', 'rr4', '2018-05-05', '2018-05-15', '3000', '0', '150', '1', '0', '0'),
('2', '20', '1', '001/2019', 'asd5', '2019-01-21', '2019-01-31', '900', '0', '45', '1', '0', '0'),
('3', '20', '1', '002/2019', '00098876', '2019-07-03', '2019-07-03', '382000', '0', '0', '1', '0', '0'),
('4', '20', '6', '003/2019', '00098', '2019-07-19', '2019-08-17', '250000', '0', '0', '1', '250000', '0'),
('5', '20', '6', '004/2019', '09998', '2019-07-19', '2019-08-17', '15000', '0', '0', '1', '15000', '0'),
('6', '20', '6', '005/2019', '0991', '2019-07-19', '2019-08-17', '20000', '0', '0', '1', '0', '0'),
('7', '20', '6', '006/2019', '0098', '2019-07-19', '2019-08-17', '20000', '0', '0', '1', '0', '0'),
('8', '20', '6', '007/2019', 'ouyu87', '2019-08-04', '2019-09-17', '2000000', '0', '0', '1', '0', '0'),
('1', '22', '6', '001/2019', '', '2019-07-19', '2019-07-19', '-265000', '0', '0', '1', '265000', '0');

### Structure of table `0_suppliers` ###

## DROP TABLE IF EXISTS `0_suppliers`;

CREATE TABLE IF NOT EXISTS `0_suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supp_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `supp_ref` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `supp_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `gst_no` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `supp_account_no` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_account` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `curr_code` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_terms` int(11) DEFAULT NULL,
  `tax_included` tinyint(1) NOT NULL DEFAULT '0',
  `dimension_id` int(11) DEFAULT '0',
  `dimension2_id` int(11) DEFAULT '0',
  `tax_group_id` int(11) DEFAULT NULL,
  `credit_limit` double NOT NULL DEFAULT '0',
  `purchase_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `payable_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `payment_discount_account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `notes` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`supplier_id`),
  KEY `supp_ref` (`supp_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_suppliers` ###

INSERT INTO `0_suppliers` VALUES
('1', 'Dino Saurius Inc.', 'Dino Saurius', 'N/A', '', '987654321', '', '', '', '', 'USD', '3', '0', '0', '0', '1', '0', '', '2100', '5060', '', '0'),
('2', 'Beefeater Ltd.', 'Beefeater', 'N/A', '', '67565590', '', '', '', '', 'Ksh', '4', '0', '0', '0', '1', '0', '', '2100', '5060', '', '0'),
('3', 'Paltech System Consultants', 'PSL', '', '', '', '', '', '', '', 'USD', '4', '0', '0', '0', '1', '0', '', '2100', '5060', '', '0'),
('6', 'DR. WERE BENARD', 'DR.WERE', '', '', '-', '', '-', '-', 'EQUITY BANK - KIMATHI STREET', 'Ksh', '1', '0', '2', '0', '2', '99999999', '4010', '2100', '3350', '', '0');

### Structure of table `0_sys_prefs` ###

## DROP TABLE IF EXISTS `0_sys_prefs`;

CREATE TABLE IF NOT EXISTS `0_sys_prefs` (
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `length` smallint(6) DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`),
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_sys_prefs` ###

INSERT INTO `0_sys_prefs` VALUES
('accounts_alpha', 'glsetup.general', 'tinyint', '1', '0'),
('accumulate_shipping', 'glsetup.customer', 'tinyint', '1', '0'),
('add_pct', 'setup.company', 'int', '5', '-1'),
('allow_negative_prices', 'glsetup.inventory', 'tinyint', '1', '1'),
('allow_negative_stock', 'glsetup.inventory', 'tinyint', '1', '0'),
('alternative_tax_include_on_docs', 'setup.company', 'tinyint', '1', ''),
('auto_curr_reval', 'setup.company', 'smallint', '6', '1'),
('bank_charge_act', 'glsetup.general', 'varchar', '15', '5690'),
('barcodes_on_stock', 'setup.company', 'tinyint', '1', '0'),
('base_sales', 'setup.company', 'int', '11', '1'),
('bcc_email', 'setup.company', 'varchar', '100', ''),
('company_logo_report', 'setup.company', 'tinyint', '1', '1'),
('coy_logo', 'setup.company', 'varchar', '100', 'chiromo.png'),
('coy_name', 'setup.company', 'varchar', '60', 'CHIROMO LANE MEDICAL CENTER'),
('coy_no', 'setup.company', 'varchar', '25', ''),
('creditors_act', 'glsetup.purchase', 'varchar', '15', '2100'),
('curr_default', 'setup.company', 'char', '3', 'Ksh'),
('debtors_act', 'glsetup.sales', 'varchar', '15', '1200'),
('default_adj_act', 'glsetup.items', 'varchar', '15', '5040'),
('default_cogs_act', 'glsetup.items', 'varchar', '15', '5010'),
('default_credit_limit', 'glsetup.customer', 'int', '11', '1000'),
('default_delivery_required', 'glsetup.sales', 'smallint', '6', '1'),
('default_dim_required', 'glsetup.dims', 'int', '11', '20'),
('default_inv_sales_act', 'glsetup.items', 'varchar', '15', '4010'),
('default_inventory_act', 'glsetup.items', 'varchar', '15', '1510'),
('default_loss_on_asset_disposal_act', 'glsetup.items', 'varchar', '15', '5660'),
('default_prompt_payment_act', 'glsetup.sales', 'varchar', '15', '4500'),
('default_quote_valid_days', 'glsetup.sales', 'smallint', '6', '30'),
('default_receival_required', 'glsetup.purchase', 'smallint', '6', '10'),
('default_sales_act', 'glsetup.sales', 'varchar', '15', '4010'),
('default_sales_discount_act', 'glsetup.sales', 'varchar', '15', '4510'),
('default_wip_act', 'glsetup.items', 'varchar', '15', '1530'),
('default_workorder_required', 'glsetup.manuf', 'int', '11', '20'),
('deferred_income_act', 'glsetup.sales', 'varchar', '15', '2105'),
('depreciation_period', 'glsetup.company', 'tinyint', '1', '1'),
('domicile', 'setup.company', 'varchar', '55', ''),
('email', 'setup.company', 'varchar', '100', ''),
('exchange_diff_act', 'glsetup.general', 'varchar', '15', '4450'),
('f_year', 'setup.company', 'int', '11', '2'),
('fax', 'setup.company', 'varchar', '30', ''),
('freight_act', 'glsetup.customer', 'varchar', '15', '4430'),
('gl_closing_date', 'setup.closing_date', 'date', '8', ''),
('grn_clearing_act', 'glsetup.purchase', 'varchar', '15', '1550'),
('gst_no', 'setup.company', 'varchar', '25', ''),
('legal_text', 'glsetup.customer', 'tinytext', '0', ''),
('loc_notification', 'glsetup.inventory', 'tinyint', '1', '0'),
('login_tout', 'setup.company', 'smallint', '6', '600'),
('no_customer_list', 'setup.company', 'tinyint', '1', '0'),
('no_item_list', 'setup.company', 'tinyint', '1', '0'),
('no_supplier_list', 'setup.company', 'tinyint', '1', '0'),
('no_zero_lines_amount', 'glsetup.sales', 'tinyint', '1', '1'),
('past_due_days', 'glsetup.general', 'int', '11', '30'),
('phone', 'setup.company', 'varchar', '30', ''),
('po_over_charge', 'glsetup.purchase', 'int', '11', '10'),
('po_over_receive', 'glsetup.purchase', 'int', '11', '10'),
('postal_address', 'setup.company', 'tinytext', '0', 'N/A'),
('print_dialog_direct', 'setup.company', 'tinyint', '1', '0'),
('print_invoice_no', 'glsetup.sales', 'tinyint', '1', '0'),
('print_item_images_on_quote', 'glsetup.inventory', 'tinyint', '1', '0'),
('profit_loss_year_act', 'glsetup.general', 'varchar', '15', '9990'),
('pyt_discount_act', 'glsetup.purchase', 'varchar', '15', '5060'),
('ref_no_auto_increase', 'setup.company', 'tinyint', '1', '0'),
('retained_earnings_act', 'glsetup.general', 'varchar', '15', '3590'),
('round_to', 'setup.company', 'int', '5', '1'),
('shortname_name_in_list', 'setup.company', 'tinyint', '1', ''),
('show_po_item_codes', 'glsetup.purchase', 'tinyint', '1', '0'),
('suppress_tax_rates', 'setup.company', 'tinyint', '1', ''),
('tax_algorithm', 'glsetup.customer', 'tinyint', '1', '1'),
('tax_last', 'setup.company', 'int', '11', '1'),
('tax_prd', 'setup.company', 'int', '11', '1'),
('time_zone', 'setup.company', 'tinyint', '1', '1'),
('use_dimension', 'setup.company', 'tinyint', '1', '1'),
('use_fixed_assets', 'setup.company', 'tinyint', '1', '1'),
('use_manufacturing', 'setup.company', 'tinyint', '1', '1'),
('version_id', 'system', 'varchar', '11', '2.4.1');

### Structure of table `0_tag_associations` ###

## DROP TABLE IF EXISTS `0_tag_associations`;

CREATE TABLE IF NOT EXISTS `0_tag_associations` (
  `record_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`record_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_tag_associations` ###


### Structure of table `0_tags` ###

## DROP TABLE IF EXISTS `0_tags`;

CREATE TABLE IF NOT EXISTS `0_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_tags` ###


### Structure of table `0_tax_group_items` ###

## DROP TABLE IF EXISTS `0_tax_group_items`;

CREATE TABLE IF NOT EXISTS `0_tax_group_items` (
  `tax_group_id` int(11) NOT NULL DEFAULT '0',
  `tax_type_id` int(11) NOT NULL DEFAULT '0',
  `tax_shipping` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tax_group_id`,`tax_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_tax_group_items` ###

INSERT INTO `0_tax_group_items` VALUES
('1', '2', '0');

### Structure of table `0_tax_groups` ###

## DROP TABLE IF EXISTS `0_tax_groups`;

CREATE TABLE IF NOT EXISTS `0_tax_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_tax_groups` ###

INSERT INTO `0_tax_groups` VALUES
('1', 'Tax', '0'),
('2', 'Tax Exempt', '0');

### Structure of table `0_tax_types` ###

## DROP TABLE IF EXISTS `0_tax_types`;

CREATE TABLE IF NOT EXISTS `0_tax_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` double NOT NULL DEFAULT '0',
  `sales_gl_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `purchasing_gl_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_tax_types` ###

INSERT INTO `0_tax_types` VALUES
('1', '5', '2150', '2150', 'Tax', '0'),
('2', '0', '1510', '5060', 'VAT Exempted', '0');

### Structure of table `0_trans_tax_details` ###

## DROP TABLE IF EXISTS `0_trans_tax_details`;

CREATE TABLE IF NOT EXISTS `0_trans_tax_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_type` smallint(6) DEFAULT NULL,
  `trans_no` int(11) DEFAULT NULL,
  `tran_date` date NOT NULL,
  `tax_type_id` int(11) NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '0',
  `ex_rate` double NOT NULL DEFAULT '1',
  `included_in_price` tinyint(1) NOT NULL DEFAULT '0',
  `net_amount` double NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `memo` tinytext COLLATE utf8_unicode_ci,
  `reg_type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Type_and_Number` (`trans_type`,`trans_no`),
  KEY `tran_date` (`tran_date`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_trans_tax_details` ###

INSERT INTO `0_trans_tax_details` VALUES
('1', '13', '1', '2018-05-10', '1', '5', '1', '1', '5942.86', '297.14', 'auto', NULL),
('2', '10', '1', '2018-05-10', '1', '5', '1', '1', '5942.86', '297.14', '001/2018', '0'),
('3', '20', '1', '2018-05-05', '1', '5', '1', '0', '3000', '150', 'rr4', '1'),
('4', '13', '2', '2018-05-07', '1', '5', '1', '1', '285.71', '14.29', 'auto', NULL),
('5', '10', '2', '2018-05-07', '1', '5', '1', '1', '285.71', '14.29', '002/2018', '0'),
('6', '13', '3', '2018-05-07', '0', '0', '1.123', '1', '267.14', '0', 'auto', NULL),
('7', '10', '3', '2018-05-07', '0', '0', '1.123', '1', '267.14', '0', '003/2018', '0'),
('8', '13', '5', '2019-01-21', '1', '5', '1', '1', '1190.48', '59.52', 'auto', NULL),
('9', '10', '5', '2019-01-21', '1', '5', '1', '1', '1190.48', '59.52', '001/2019', '0'),
('10', '20', '2', '2019-01-21', '1', '5', '1', '0', '900', '45', 'asd5', '1'),
('11', '13', '6', '2019-06-30', '1', '5', '100', '1', '28571.43', '1428.57', 'auto', NULL),
('12', '10', '6', '2019-06-30', '1', '5', '100', '1', '28571.43', '1428.57', '002/2019', '0'),
('13', '13', '7', '2019-06-30', '1', '5', '100', '1', '47619.05', '2380.95', 'auto', NULL),
('14', '10', '7', '2019-06-30', '1', '5', '100', '1', '47619.05', '2380.95', '003/2019', '0'),
('15', '13', '8', '2019-07-03', '1', '5', '1', '1', '14761.9', '738.1', 'auto', NULL),
('16', '10', '8', '2019-07-03', '1', '5', '1', '1', '14761.9', '738.1', '004/2019', '0'),
('17', '20', '3', '2019-07-03', '2', '0', '1', '0', '382000', '0', '00098876', '1'),
('18', '13', '9', '2019-07-03', '2', '0', '1', '1', '50000', '0', 'auto', NULL),
('19', '10', '9', '2019-07-03', '2', '0', '1', '1', '50000', '0', '005/2019', '0'),
('20', '20', '4', '2019-07-19', '0', '0', '1', '0', '250000', '0', '00098', '1'),
('21', '20', '5', '2019-07-19', '0', '0', '1', '0', '15000', '0', '09998', '1'),
('22', '20', '6', '2019-07-19', '0', '0', '1', '0', '20000', '0', '0991', '1'),
('23', '20', '7', '2019-07-19', '0', '0', '1', '0', '20000', '0', '0098', '1'),
('24', '20', '8', '2019-08-04', '0', '0', '1', '0', '2000000', '0', 'ouyu87', '1');

### Structure of table `0_useronline` ###

## DROP TABLE IF EXISTS `0_useronline`;

CREATE TABLE IF NOT EXISTS `0_useronline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` int(15) NOT NULL DEFAULT '0',
  `ip` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `timestamp` (`timestamp`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_useronline` ###


### Structure of table `0_users` ###

## DROP TABLE IF EXISTS `0_users`;

CREATE TABLE IF NOT EXISTS `0_users` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `real_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `role_id` int(11) NOT NULL DEFAULT '1',
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_format` tinyint(1) NOT NULL DEFAULT '0',
  `date_sep` tinyint(1) NOT NULL DEFAULT '0',
  `tho_sep` tinyint(1) NOT NULL DEFAULT '0',
  `dec_sep` tinyint(1) NOT NULL DEFAULT '0',
  `theme` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `page_size` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A4',
  `prices_dec` smallint(6) NOT NULL DEFAULT '2',
  `qty_dec` smallint(6) NOT NULL DEFAULT '2',
  `rates_dec` smallint(6) NOT NULL DEFAULT '4',
  `percent_dec` smallint(6) NOT NULL DEFAULT '1',
  `show_gl` tinyint(1) NOT NULL DEFAULT '1',
  `show_codes` tinyint(1) NOT NULL DEFAULT '0',
  `show_hints` tinyint(1) NOT NULL DEFAULT '0',
  `last_visit_date` datetime DEFAULT NULL,
  `query_size` tinyint(1) unsigned NOT NULL DEFAULT '10',
  `graphic_links` tinyint(1) DEFAULT '1',
  `pos` smallint(6) DEFAULT '1',
  `print_profile` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rep_popup` tinyint(1) DEFAULT '1',
  `sticky_doc_date` tinyint(1) DEFAULT '0',
  `startup_tab` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `transaction_days` smallint(6) NOT NULL DEFAULT '30',
  `save_report_selections` smallint(6) NOT NULL DEFAULT '0',
  `use_date_picker` tinyint(1) NOT NULL DEFAULT '1',
  `def_print_destination` tinyint(1) NOT NULL DEFAULT '0',
  `def_print_orientation` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_users` ###

INSERT INTO `0_users` VALUES
('1', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Administrator', '2', '', 'adm@example.com', 'C', '0', '0', '0', '0', 'dropdown', 'Letter', '2', '2', '4', '1', '1', '0', '0', '2019-08-06 11:51:44', '40', '1', '1', '', '1', '0', 'system', '30', '0', '1', '0', '0', '0'),
('2', 'were', 'af2a819071ff3bb5732a683dfec96666', 'benard were', '9', '0000', '9999', 'C', '0', '0', '0', '0', 'canvas', 'Letter', '2', '2', '4', '1', '1', '0', '0', '2019-07-20 14:49:46', '10', '1', '1', '', '1', '0', 'orders', '30', '0', '1', '0', '0', '0');

### Structure of table `0_voided` ###

## DROP TABLE IF EXISTS `0_voided`;

CREATE TABLE IF NOT EXISTS `0_voided` (
  `type` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  `memo_` tinytext COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`type`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_voided` ###


### Structure of table `0_wo_costing` ###

## DROP TABLE IF EXISTS `0_wo_costing`;

CREATE TABLE IF NOT EXISTS `0_wo_costing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `cost_type` tinyint(1) NOT NULL DEFAULT '0',
  `trans_type` int(11) NOT NULL DEFAULT '0',
  `trans_no` int(11) NOT NULL DEFAULT '0',
  `factor` double NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_wo_costing` ###


### Structure of table `0_wo_issue_items` ###

## DROP TABLE IF EXISTS `0_wo_issue_items`;

CREATE TABLE IF NOT EXISTS `0_wo_issue_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issue_id` int(11) DEFAULT NULL,
  `qty_issued` double DEFAULT NULL,
  `unit_cost` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_wo_issue_items` ###


### Structure of table `0_wo_issues` ###

## DROP TABLE IF EXISTS `0_wo_issues`;

CREATE TABLE IF NOT EXISTS `0_wo_issues` (
  `issue_no` int(11) NOT NULL AUTO_INCREMENT,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `reference` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `loc_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workcentre_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`issue_no`),
  KEY `workorder_id` (`workorder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_wo_issues` ###


### Structure of table `0_wo_manufacture` ###

## DROP TABLE IF EXISTS `0_wo_manufacture`;

CREATE TABLE IF NOT EXISTS `0_wo_manufacture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  KEY `workorder_id` (`workorder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_wo_manufacture` ###

INSERT INTO `0_wo_manufacture` VALUES
('1', '001/2018', '1', '2', '2018-05-05');

### Structure of table `0_wo_requirements` ###

## DROP TABLE IF EXISTS `0_wo_requirements`;

CREATE TABLE IF NOT EXISTS `0_wo_requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `workcentre` int(11) NOT NULL DEFAULT '0',
  `units_req` double NOT NULL DEFAULT '1',
  `unit_cost` double NOT NULL DEFAULT '0',
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `units_issued` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `workorder_id` (`workorder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_wo_requirements` ###

INSERT INTO `0_wo_requirements` VALUES
('1', '1', '101', '1', '1', '200', 'DEF', '2'),
('2', '1', '102', '1', '1', '150', 'DEF', '2'),
('3', '1', '103', '1', '1', '10', 'DEF', '2'),
('4', '1', '301', '1', '1', '0', 'DEF', '2'),
('5', '2', '101', '1', '1', '200', 'DEF', '0'),
('6', '2', '102', '1', '1', '150', 'DEF', '0'),
('7', '2', '103', '1', '1', '10', 'DEF', '0'),
('8', '2', '301', '1', '1', '0', 'DEF', '0');

### Structure of table `0_workcentres` ###

## DROP TABLE IF EXISTS `0_workcentres`;

CREATE TABLE IF NOT EXISTS `0_workcentres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_workcentres` ###

INSERT INTO `0_workcentres` VALUES
('1', 'Work Centre', '', '0');

### Structure of table `0_workorders` ###

## DROP TABLE IF EXISTS `0_workorders`;

CREATE TABLE IF NOT EXISTS `0_workorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wo_ref` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `loc_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `units_reqd` double NOT NULL DEFAULT '1',
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `required_by` date NOT NULL DEFAULT '0000-00-00',
  `released_date` date NOT NULL DEFAULT '0000-00-00',
  `units_issued` double NOT NULL DEFAULT '0',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `released` tinyint(1) NOT NULL DEFAULT '0',
  `additional_costs` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `wo_ref` (`wo_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

### Data of table `0_workorders` ###

INSERT INTO `0_workorders` VALUES
('1', '001/2018', 'DEF', '2', '201', '2018-05-05', '0', '2018-05-05', '2018-05-05', '2', '1', '1', '0'),
('2', '002/2018', 'DEF', '5', '201', '2018-05-07', '2', '2018-05-27', '2018-05-07', '0', '0', '1', '0'),
('3', '003/2018', 'DEF', '5', '201', '2018-05-07', '2', '2018-05-27', '0000-00-00', '0', '0', '0', '0');