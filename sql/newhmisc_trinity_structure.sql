-- phpMyAdmin SQL Dump
-- version 4.6.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2024 at 10:23 AM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newhmisc_trinity`
--
CREATE DATABASE IF NOT EXISTS `newhmisc_trinity` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `newhmisc_trinity`;

-- --------------------------------------------------------

--
-- Table structure for table `0_areas`
--

CREATE TABLE `0_areas` (
  `area_code` int(11) NOT NULL,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_attachments`
--

CREATE TABLE `0_attachments` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type_no` int(11) NOT NULL DEFAULT '0',
  `trans_no` int(11) NOT NULL DEFAULT '0',
  `unique_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `filename` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `filesize` int(11) NOT NULL DEFAULT '0',
  `filetype` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_audit_trail`
--

CREATE TABLE `0_audit_trail` (
  `id` int(11) NOT NULL,
  `type` smallint(6) UNSIGNED NOT NULL DEFAULT '0',
  `trans_no` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user` smallint(6) UNSIGNED NOT NULL DEFAULT '0',
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fiscal_year` int(11) NOT NULL DEFAULT '0',
  `gl_date` date NOT NULL DEFAULT '0000-00-00',
  `gl_seq` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_bank_accounts`
--

CREATE TABLE `0_bank_accounts` (
  `account_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_type` smallint(6) NOT NULL DEFAULT '0',
  `bank_account_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_account_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_address` tinytext COLLATE utf8_unicode_ci,
  `bank_curr_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dflt_curr_act` tinyint(1) NOT NULL DEFAULT '0',
  `id` smallint(6) NOT NULL,
  `bank_charge_act` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_reconciled_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ending_reconcile_balance` double NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_bank_trans`
--

CREATE TABLE `0_bank_trans` (
  `id` int(11) NOT NULL,
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
  `reconciled` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_bom`
--

CREATE TABLE `0_bom` (
  `id` int(11) NOT NULL,
  `parent` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `component` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `workcentre_added` int(11) NOT NULL DEFAULT '0',
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `quantity` double NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_budget_trans`
--

CREATE TABLE `0_budget_trans` (
  `id` int(11) NOT NULL,
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `memo_` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `dimension_id` int(11) DEFAULT '0',
  `dimension2_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_chart_class`
--

CREATE TABLE `0_chart_class` (
  `cid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ctype` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_chart_master`
--

CREATE TABLE `0_chart_master` (
  `account_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_code2` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `account_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_chart_types`
--

CREATE TABLE `0_chart_types` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `class_id` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_comments`
--

CREATE TABLE `0_comments` (
  `type` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `date_` date DEFAULT '0000-00-00',
  `memo_` tinytext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_credit_status`
--

CREATE TABLE `0_credit_status` (
  `id` int(11) NOT NULL,
  `reason_description` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dissallow_invoices` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_crm_categories`
--

CREATE TABLE `0_crm_categories` (
  `id` int(11) NOT NULL COMMENT 'pure technical key',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'contact type e.g. customer',
  `action` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'detailed usage e.g. department',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'for category selector',
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL COMMENT 'usage description',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'nonzero for core system usage',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_crm_contacts`
--

CREATE TABLE `0_crm_contacts` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL DEFAULT '0' COMMENT 'foreign key to crm_persons',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'foreign key to crm_categories',
  `action` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'foreign key to crm_categories',
  `entity_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'entity id in related class table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_crm_persons`
--

CREATE TABLE `0_crm_persons` (
  `id` int(11) NOT NULL,
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
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_currencies`
--

CREATE TABLE `0_currencies` (
  `currency` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `curr_abrev` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `curr_symbol` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `hundreds_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `auto_update` tinyint(1) NOT NULL DEFAULT '1',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_cust_allocations`
--

CREATE TABLE `0_cust_allocations` (
  `id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `amt` double UNSIGNED DEFAULT NULL,
  `date_alloc` date NOT NULL DEFAULT '0000-00-00',
  `trans_no_from` int(11) DEFAULT NULL,
  `trans_type_from` int(11) DEFAULT NULL,
  `trans_no_to` int(11) DEFAULT NULL,
  `trans_type_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_cust_branch`
--

CREATE TABLE `0_cust_branch` (
  `branch_code` int(11) NOT NULL,
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
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_debtors_master`
--

CREATE TABLE `0_debtors_master` (
  `debtor_no` int(11) NOT NULL,
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
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_debtor_trans`
--

CREATE TABLE `0_debtor_trans` (
  `trans_no` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `type` smallint(6) UNSIGNED NOT NULL DEFAULT '0',
  `version` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `debtor_no` int(11) UNSIGNED NOT NULL,
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
  `tax_included` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_debtor_trans_details`
--

CREATE TABLE `0_debtor_trans_details` (
  `id` int(11) NOT NULL,
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
  `src_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_debtor_trans_no`
--

CREATE TABLE `0_debtor_trans_no` (
  `next_ref` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `0_dimensions`
--

CREATE TABLE `0_dimensions` (
  `id` int(11) NOT NULL,
  `reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type_` tinyint(1) NOT NULL DEFAULT '1',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_exchange_rates`
--

CREATE TABLE `0_exchange_rates` (
  `id` int(11) NOT NULL,
  `curr_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rate_buy` double NOT NULL DEFAULT '0',
  `rate_sell` double NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_fiscal_year`
--

CREATE TABLE `0_fiscal_year` (
  `id` int(11) NOT NULL,
  `begin` date DEFAULT '0000-00-00',
  `end` date DEFAULT '0000-00-00',
  `closed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_gl_trans`
--

CREATE TABLE `0_gl_trans` (
  `counter` int(11) NOT NULL,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `type_no` int(11) NOT NULL DEFAULT '0',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `account` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `memo_` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `dimension_id` int(11) NOT NULL DEFAULT '0',
  `dimension2_id` int(11) NOT NULL DEFAULT '0',
  `person_type_id` int(11) DEFAULT NULL,
  `person_id` tinyblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_grn_batch`
--

CREATE TABLE `0_grn_batch` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `purch_order_no` int(11) DEFAULT NULL,
  `reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `loc_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` double DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_grn_items`
--

CREATE TABLE `0_grn_items` (
  `id` int(11) NOT NULL,
  `grn_batch_id` int(11) DEFAULT NULL,
  `po_detail_item` int(11) NOT NULL DEFAULT '0',
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `qty_recd` double NOT NULL DEFAULT '0',
  `quantity_inv` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_groups`
--

CREATE TABLE `0_groups` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_item_codes`
--

CREATE TABLE `0_item_codes` (
  `id` int(11) UNSIGNED NOT NULL,
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category_id` smallint(6) UNSIGNED NOT NULL,
  `quantity` double NOT NULL DEFAULT '1',
  `is_foreign` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_item_tax_types`
--

CREATE TABLE `0_item_tax_types` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `exempt` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_item_tax_type_exemptions`
--

CREATE TABLE `0_item_tax_type_exemptions` (
  `item_tax_type_id` int(11) NOT NULL DEFAULT '0',
  `tax_type_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_item_units`
--

CREATE TABLE `0_item_units` (
  `abbr` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `decimals` tinyint(2) NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_journal`
--

CREATE TABLE `0_journal` (
  `type` smallint(6) NOT NULL DEFAULT '0',
  `trans_no` int(11) NOT NULL DEFAULT '0',
  `tran_date` date DEFAULT '0000-00-00',
  `reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `source_ref` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `event_date` date DEFAULT '0000-00-00',
  `doc_date` date NOT NULL DEFAULT '0000-00-00',
  `currency` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `amount` double NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_locations`
--

CREATE TABLE `0_locations` (
  `loc_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `location_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone2` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fax` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fixed_asset` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_loc_stock`
--

CREATE TABLE `0_loc_stock` (
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `reorder_level` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_payment_terms`
--

CREATE TABLE `0_payment_terms` (
  `terms_indicator` int(11) NOT NULL,
  `terms` char(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `days_before_due` smallint(6) NOT NULL DEFAULT '0',
  `day_in_following_month` smallint(6) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_prices`
--

CREATE TABLE `0_prices` (
  `id` int(11) NOT NULL,
  `stock_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sales_type_id` int(11) NOT NULL DEFAULT '0',
  `curr_abrev` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_printers`
--

CREATE TABLE `0_printers` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `queue` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `port` smallint(11) UNSIGNED NOT NULL,
  `timeout` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_print_profiles`
--

CREATE TABLE `0_print_profiles` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `profile` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `report` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_purch_data`
--

CREATE TABLE `0_purch_data` (
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` double NOT NULL DEFAULT '0',
  `suppliers_uom` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `conversion_factor` double NOT NULL DEFAULT '1',
  `supplier_description` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_purch_orders`
--

CREATE TABLE `0_purch_orders` (
  `order_no` int(11) NOT NULL,
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
  `tax_included` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_purch_order_details`
--

CREATE TABLE `0_purch_order_details` (
  `po_detail_item` int(11) NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `qty_invoiced` double NOT NULL DEFAULT '0',
  `unit_price` double NOT NULL DEFAULT '0',
  `act_price` double NOT NULL DEFAULT '0',
  `std_cost_unit` double NOT NULL DEFAULT '0',
  `quantity_ordered` double NOT NULL DEFAULT '0',
  `quantity_received` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_quick_entries`
--

CREATE TABLE `0_quick_entries` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usage` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_amount` double NOT NULL DEFAULT '0',
  `base_desc` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bal_type` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_quick_entry_lines`
--

CREATE TABLE `0_quick_entry_lines` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `qid` smallint(6) UNSIGNED NOT NULL,
  `amount` double DEFAULT '0',
  `memo` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `dest_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dimension_id` smallint(6) UNSIGNED DEFAULT NULL,
  `dimension2_id` smallint(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_recurrent_invoices`
--

CREATE TABLE `0_recurrent_invoices` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `order_no` int(11) UNSIGNED NOT NULL,
  `debtor_no` int(11) UNSIGNED DEFAULT NULL,
  `group_no` smallint(6) UNSIGNED DEFAULT NULL,
  `days` int(11) NOT NULL DEFAULT '0',
  `monthly` int(11) NOT NULL DEFAULT '0',
  `begin` date NOT NULL DEFAULT '0000-00-00',
  `end` date NOT NULL DEFAULT '0000-00-00',
  `last_sent` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_reflines`
--

CREATE TABLE `0_reflines` (
  `id` int(11) NOT NULL,
  `trans_type` int(11) NOT NULL,
  `prefix` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pattern` varchar(35) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_refs`
--

CREATE TABLE `0_refs` (
  `id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `reference` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_salesman`
--

CREATE TABLE `0_salesman` (
  `salesman_code` int(11) NOT NULL,
  `salesman_name` char(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salesman_phone` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salesman_fax` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salesman_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `provision` double NOT NULL DEFAULT '0',
  `break_pt` double NOT NULL DEFAULT '0',
  `provision2` double NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_sales_orders`
--

CREATE TABLE `0_sales_orders` (
  `order_no` int(11) NOT NULL,
  `trans_type` smallint(6) NOT NULL DEFAULT '30',
  `version` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
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
  `alloc` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_sales_order_details`
--

CREATE TABLE `0_sales_order_details` (
  `id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `trans_type` smallint(6) NOT NULL DEFAULT '30',
  `stk_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  `qty_sent` double NOT NULL DEFAULT '0',
  `unit_price` double NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `invoiced` double NOT NULL DEFAULT '0',
  `discount_percent` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_sales_pos`
--

CREATE TABLE `0_sales_pos` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `pos_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cash_sale` tinyint(1) NOT NULL,
  `credit_sale` tinyint(1) NOT NULL,
  `pos_location` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `pos_account` smallint(6) UNSIGNED NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_sales_types`
--

CREATE TABLE `0_sales_types` (
  `id` int(11) NOT NULL,
  `sales_type` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tax_included` int(1) NOT NULL DEFAULT '0',
  `factor` double NOT NULL DEFAULT '1',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_security_roles`
--

CREATE TABLE `0_security_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sections` text COLLATE utf8_unicode_ci,
  `areas` text COLLATE utf8_unicode_ci,
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_shippers`
--

CREATE TABLE `0_shippers` (
  `shipper_id` int(11) NOT NULL,
  `shipper_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone2` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_sql_trail`
--

CREATE TABLE `0_sql_trail` (
  `id` int(11) UNSIGNED NOT NULL,
  `sql` text COLLATE utf8_unicode_ci NOT NULL,
  `result` tinyint(1) NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_stock_category`
--

CREATE TABLE `0_stock_category` (
  `category_id` int(11) NOT NULL,
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
  `dflt_no_purchase` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_stock_fa_class`
--

CREATE TABLE `0_stock_fa_class` (
  `fa_class_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `long_description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `depreciation_rate` double NOT NULL DEFAULT '0',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_stock_master`
--

CREATE TABLE `0_stock_master` (
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
  `fa_class_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_stock_moves`
--

CREATE TABLE `0_stock_moves` (
  `trans_id` int(11) NOT NULL,
  `trans_no` int(11) NOT NULL DEFAULT '0',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` smallint(6) NOT NULL DEFAULT '0',
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `price` double NOT NULL DEFAULT '0',
  `reference` char(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `qty` double NOT NULL DEFAULT '1',
  `standard_cost` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_suppliers`
--

CREATE TABLE `0_suppliers` (
  `supplier_id` int(11) NOT NULL,
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
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_supp_allocations`
--

CREATE TABLE `0_supp_allocations` (
  `id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `amt` double UNSIGNED DEFAULT NULL,
  `date_alloc` date NOT NULL DEFAULT '0000-00-00',
  `trans_no_from` int(11) DEFAULT NULL,
  `trans_type_from` int(11) DEFAULT NULL,
  `trans_no_to` int(11) DEFAULT NULL,
  `trans_type_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_supp_invoice_items`
--

CREATE TABLE `0_supp_invoice_items` (
  `id` int(11) NOT NULL,
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
  `dimension2_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_supp_trans`
--

CREATE TABLE `0_supp_trans` (
  `trans_no` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `type` smallint(6) UNSIGNED NOT NULL DEFAULT '0',
  `supplier_id` int(11) UNSIGNED NOT NULL,
  `reference` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `supp_reference` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  `ov_amount` double NOT NULL DEFAULT '0',
  `ov_discount` double NOT NULL DEFAULT '0',
  `ov_gst` double NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '1',
  `alloc` double NOT NULL DEFAULT '0',
  `tax_included` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_sys_prefs`
--

CREATE TABLE `0_sys_prefs` (
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `length` smallint(6) DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_tags`
--

CREATE TABLE `0_tags` (
  `id` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_tag_associations`
--

CREATE TABLE `0_tag_associations` (
  `record_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_tax_groups`
--

CREATE TABLE `0_tax_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_tax_group_items`
--

CREATE TABLE `0_tax_group_items` (
  `tax_group_id` int(11) NOT NULL DEFAULT '0',
  `tax_type_id` int(11) NOT NULL DEFAULT '0',
  `tax_shipping` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_tax_types`
--

CREATE TABLE `0_tax_types` (
  `id` int(11) NOT NULL,
  `rate` double NOT NULL DEFAULT '0',
  `sales_gl_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `purchasing_gl_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_trans_tax_details`
--

CREATE TABLE `0_trans_tax_details` (
  `id` int(11) NOT NULL,
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
  `reg_type` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_useronline`
--

CREATE TABLE `0_useronline` (
  `id` int(11) NOT NULL,
  `timestamp` int(15) NOT NULL DEFAULT '0',
  `ip` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_users`
--

CREATE TABLE `0_users` (
  `id` smallint(6) NOT NULL,
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
  `query_size` tinyint(1) UNSIGNED NOT NULL DEFAULT '10',
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
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_voided`
--

CREATE TABLE `0_voided` (
  `type` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00',
  `memo_` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_workcentres`
--

CREATE TABLE `0_workcentres` (
  `id` int(11) NOT NULL,
  `name` char(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_workorders`
--

CREATE TABLE `0_workorders` (
  `id` int(11) NOT NULL,
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
  `additional_costs` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_wo_costing`
--

CREATE TABLE `0_wo_costing` (
  `id` int(11) NOT NULL,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `cost_type` tinyint(1) NOT NULL DEFAULT '0',
  `trans_type` int(11) NOT NULL DEFAULT '0',
  `trans_no` int(11) NOT NULL DEFAULT '0',
  `factor` double NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_wo_issues`
--

CREATE TABLE `0_wo_issues` (
  `issue_no` int(11) NOT NULL,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `reference` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `loc_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workcentre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_wo_issue_items`
--

CREATE TABLE `0_wo_issue_items` (
  `id` int(11) NOT NULL,
  `stock_id` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issue_id` int(11) DEFAULT NULL,
  `qty_issued` double DEFAULT NULL,
  `unit_cost` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_wo_manufacture`
--

CREATE TABLE `0_wo_manufacture` (
  `id` int(11) NOT NULL,
  `reference` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `date_` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0_wo_requirements`
--

CREATE TABLE `0_wo_requirements` (
  `id` int(11) NOT NULL,
  `workorder_id` int(11) NOT NULL DEFAULT '0',
  `stock_id` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `workcentre` int(11) NOT NULL DEFAULT '0',
  `units_req` double NOT NULL DEFAULT '1',
  `unit_cost` double NOT NULL DEFAULT '0',
  `loc_code` char(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `units_issued` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admitfile`
--

CREATE TABLE `admitfile` (
  `id_no` int(11) NOT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm_date` datetime NOT NULL,
  `bed_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `b_p` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `temp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `history` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `complains` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_loc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chief` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_chief` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tests_and_results` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `provisional_diag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `final_diag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_updated` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dis_date` datetime NOT NULL,
  `dis_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm20` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm21` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm22` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm23` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm24` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allbedsfile`
--

CREATE TABLE `allbedsfile` (
  `client_id` int(11) NOT NULL,
  `adm_no` char(100) DEFAULT NULL,
  `bed_no` char(100) NOT NULL,
  `Patients_Name` varchar(100) NOT NULL,
  `Rate` int(11) NOT NULL,
  `visit_no` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appointmentf`
--

CREATE TABLE `appointmentf` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `doctor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adm_date` datetime NOT NULL,
  `dis_date` datetime NOT NULL,
  `ward` text COLLATE utf8_unicode_ci NOT NULL,
  `bed_no` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `other_info` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `app_date` date NOT NULL,
  `image_id` decimal(11,2) NOT NULL,
  `weight` int(10) NOT NULL,
  `temp` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `b_p` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kin` text COLLATE utf8_unicode_ci NOT NULL,
  `kin_tel` text COLLATE utf8_unicode_ci NOT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nextid_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nhif_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subchief` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chief` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sublocation` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointmentf-3`
--

CREATE TABLE `appointmentf-3` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `doctor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adm_date` datetime NOT NULL,
  `dis_date` datetime NOT NULL,
  `ward` text COLLATE utf8_unicode_ci NOT NULL,
  `bed_no` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `other_info` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(10) NOT NULL,
  `sex` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `app_date` date NOT NULL,
  `image_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `temp` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `b_p` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kin` text COLLATE utf8_unicode_ci NOT NULL,
  `kin_tel` text COLLATE utf8_unicode_ci NOT NULL,
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nextid_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nhif_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subchief` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chief` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sublocation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `next_app` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archivedemployees`
--

CREATE TABLE `archivedemployees` (
  `id` bigint(20) NOT NULL,
  `ref_id` bigint(20) NOT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL DEFAULT '',
  `last_name` varchar(100) NOT NULL DEFAULT '',
  `gender` enum('Male','Female') DEFAULT NULL,
  `ssn_num` varchar(100) DEFAULT '',
  `nic_num` varchar(100) DEFAULT '',
  `other_id` varchar(100) DEFAULT '',
  `work_email` varchar(100) DEFAULT NULL,
  `joined_date` datetime DEFAULT NULL,
  `confirmation_date` datetime DEFAULT NULL,
  `supervisor` bigint(20) DEFAULT NULL,
  `department` bigint(20) DEFAULT NULL,
  `termination_date` datetime DEFAULT NULL,
  `notes` text,
  `data` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` varchar(100) NOT NULL,
  `out_dte` date NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auto_diagnosis`
--

CREATE TABLE `auto_diagnosis` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_transact`
--

CREATE TABLE `auto_transact` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_transactx`
--

CREATE TABLE `auto_transactx` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_transact_app`
--

CREATE TABLE `auto_transact_app` (
  `id` int(10) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_transact_disch`
--

CREATE TABLE `auto_transact_disch` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_transact_inv`
--

CREATE TABLE `auto_transact_inv` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_transact_inv2`
--

CREATE TABLE `auto_transact_inv2` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_transact_inv_disch`
--

CREATE TABLE `auto_transact_inv_disch` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_transact_lab`
--

CREATE TABLE `auto_transact_lab` (
  `id` int(10) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_transact_tmp`
--

CREATE TABLE `auto_transact_tmp` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balancesf`
--

CREATE TABLE `balancesf` (
  `id` int(11) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `type` char(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `trans_desc` char(100) NOT NULL,
  `date` datetime NOT NULL,
  `inputby` char(100) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `ref_no` char(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `adm_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bedsfile`
--

CREATE TABLE `bedsfile` (
  `client_id` int(11) NOT NULL,
  `adm_no` char(100) DEFAULT NULL,
  `bed_no` char(100) NOT NULL,
  `Patients_Name` varchar(100) NOT NULL,
  `Next_No` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_appointments`
--

CREATE TABLE `book_appointments` (
  `id` int(11) NOT NULL,
  `department` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patient` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `app_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `today` date NOT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `adm_no` char(100) NOT NULL,
  `Patients_Name` char(120) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `Pay_Account` varchar(255) DEFAULT NULL,
  `adm_date` datetime NOT NULL,
  `disch_date` datetime NOT NULL,
  `bed_no` text NOT NULL,
  `phone` char(100) NOT NULL,
  `city` char(100) NOT NULL,
  `country` char(100) NOT NULL,
  `e_mail` char(100) NOT NULL,
  `doctor` int(50) NOT NULL,
  `age` int(11) NOT NULL,
  `next_add` varchar(200) NOT NULL,
  `remarks` varchar(400) NOT NULL,
  `balance` int(15) NOT NULL,
  `invoices` varchar(200) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `out_days` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clientsfile`
--

CREATE TABLE `clientsfile` (
  `company` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `database` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clock_in`
--

CREATE TABLE `clock_in` (
  `staff_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ok` varchar(20) NOT NULL,
  `work` text NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collection_summary`
--

CREATE TABLE `collection_summary` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `day` decimal(11,2) NOT NULL,
  `night` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `identity` varchar(100) NOT NULL,
  `line` decimal(5,1) NOT NULL,
  `monthly` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `collection_summary2`
--

CREATE TABLE `collection_summary2` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `day` decimal(11,2) NOT NULL,
  `night` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `identity` varchar(100) NOT NULL,
  `line` decimal(5,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `companyfile`
--

CREATE TABLE `companyfile` (
  `id` int(11) NOT NULL,
  `company` char(100) NOT NULL,
  `company_identity` char(100) NOT NULL,
  `address1` char(100) NOT NULL,
  `address2` char(100) NOT NULL,
  `address3` char(100) NOT NULL,
  `address4` varchar(100) NOT NULL,
  `next_sup_inv` int(11) NOT NULL,
  `next_ref` int(11) NOT NULL,
  `next_gop` int(11) NOT NULL,
  `next_fp` int(11) NOT NULL,
  `next_wbc` int(11) NOT NULL,
  `next_anc` int(11) NOT NULL,
  `next_adm` int(11) NOT NULL,
  `next_ip` int(10) NOT NULL,
  `next_stock` int(10) NOT NULL,
  `next_mat` int(10) NOT NULL,
  `next_pn` int(10) NOT NULL,
  `next_rf` int(10) NOT NULL,
  `next_pp` int(10) NOT NULL,
  `next_rct` int(10) NOT NULL,
  `next_journal` int(10) NOT NULL,
  `next_vch` int(11) NOT NULL,
  `nhif_rebate` int(5) NOT NULL,
  `NHIF_ACC` char(10) NOT NULL,
  `debt_control` varchar(100) NOT NULL,
  `cred_control` varchar(100) NOT NULL,
  `supl_control` char(100) NOT NULL,
  `nhif_control` varchar(100) NOT NULL,
  `PAT_CONTROL` char(100) NOT NULL,
  `long_resc_no` int(10) NOT NULL,
  `next_invoice` int(10) NOT NULL,
  `update` date NOT NULL,
  `today` date NOT NULL,
  `adm_today` datetime NOT NULL,
  `dates` date NOT NULL,
  `next_lpo` int(10) NOT NULL,
  `last_date` date NOT NULL,
  `next_hat` int(10) NOT NULL,
  `next_hyp` int(10) NOT NULL,
  `next_dm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companystructures`
--

CREATE TABLE `companystructures` (
  `id` bigint(20) NOT NULL,
  `title` tinytext NOT NULL,
  `description` text NOT NULL,
  `address` text,
  `type` enum('Company','Head Office','Regional Office','Department','Unit','Sub Unit','Other') DEFAULT NULL,
  `country` varchar(2) NOT NULL DEFAULT '0',
  `parent` bigint(20) DEFAULT NULL,
  `timezone` varchar(100) NOT NULL DEFAULT 'Europe/London',
  `heads` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `consumersf`
--

CREATE TABLE `consumersf` (
  `id` int(10) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint(20) NOT NULL,
  `code` char(2) NOT NULL DEFAULT '',
  `namecap` varchar(80) DEFAULT '',
  `name` varchar(80) NOT NULL DEFAULT '',
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `number` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courses2`
--

CREATE TABLE `courses2` (
  `id` int(11) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `number` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courses3`
--

CREATE TABLE `courses3` (
  `id` int(11) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `number` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courses4`
--

CREATE TABLE `courses4` (
  `id` int(11) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `number` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currencytypes`
--

CREATE TABLE `currencytypes` (
  `id` bigint(20) NOT NULL,
  `code` varchar(3) NOT NULL DEFAULT '',
  `name` varchar(70) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `debtorsfile`
--

CREATE TABLE `debtorsfile` (
  `id` int(11) NOT NULL,
  `account_Name` char(120) DEFAULT NULL,
  `telephone_no` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `os_balance` int(11) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `accno` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `debtorstrfile_allocate2`
--

CREATE TABLE `debtorstrfile_allocate2` (
  `id` int(10) NOT NULL,
  `acc_no` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `doc_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `balance` int(10) NOT NULL,
  `inputby` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_items`
--

CREATE TABLE `deleted_items` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `patient` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dent_hdnotef`
--

CREATE TABLE `dent_hdnotef` (
  `id` int(10) NOT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adm_date` date NOT NULL,
  `disch_date` date NOT NULL,
  `tot_amount` int(20) NOT NULL,
  `inv_amount` int(20) NOT NULL,
  `pay_account` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dischargef`
--

CREATE TABLE `dischargef` (
  `id_no` int(10) NOT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm_date` datetime NOT NULL,
  `bed_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `b_p` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `temp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `history` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `complains` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_loc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chief` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_chief` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tests_and_results` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `provisional_diag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `final_diag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_updated` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dis_date` datetime NOT NULL,
  `dis_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm20` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm21` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm22` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm23` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm24` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `out_drug1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `out_drug2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `out_drug3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `out_drug4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `out_drug5` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diseasefile`
--

CREATE TABLE `diseasefile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `drugs_used` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctorsfile`
--

CREATE TABLE `doctorsfile` (
  `id` int(11) NOT NULL,
  `account_Name` char(120) DEFAULT NULL,
  `telephone_no` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `os_balance` int(11) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctorstrfile`
--

CREATE TABLE `doctorstrfile` (
  `account_no` char(100) NOT NULL,
  `account_name` char(100) NOT NULL,
  `date` date NOT NULL,
  `doc_no` char(50) NOT NULL,
  `service` char(100) NOT NULL,
  `type` char(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `ledger` char(50) NOT NULL,
  `invoice_no` char(50) NOT NULL,
  `username` char(50) NOT NULL,
  `others2` char(50) NOT NULL,
  `input_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `company` char(50) NOT NULL,
  `balance` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dtransf`
--

CREATE TABLE `dtransf` (
  `id` int(11) NOT NULL,
  `acc_no` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `doc_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `balance` int(10) NOT NULL,
  `inputby` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dtransf2`
--

CREATE TABLE `dtransf2` (
  `acc_no` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `doc_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `balance` int(10) NOT NULL,
  `inputby` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dtransf2x`
--

CREATE TABLE `dtransf2x` (
  `id` int(11) NOT NULL,
  `acc_no` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `doc_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `balance` int(10) NOT NULL,
  `inputby` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontacts`
--

CREATE TABLE `emergencycontacts` (
  `id` bigint(20) NOT NULL,
  `employee` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  `home_phone` varchar(15) DEFAULT NULL,
  `work_phone` varchar(15) DEFAULT NULL,
  `mobile_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employeecertifications`
--

CREATE TABLE `employeecertifications` (
  `id` bigint(20) NOT NULL,
  `certification_id` bigint(20) DEFAULT NULL,
  `employee` bigint(20) NOT NULL,
  `institute` varchar(400) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employeedependents`
--

CREATE TABLE `employeedependents` (
  `id` bigint(20) NOT NULL,
  `employee` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `relationship` enum('Child','Spouse','Parent','Other') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `id_number` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employeeeducations`
--

CREATE TABLE `employeeeducations` (
  `id` bigint(20) NOT NULL,
  `education_id` bigint(20) DEFAULT NULL,
  `employee` bigint(20) NOT NULL,
  `institute` varchar(400) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employeelanguages`
--

CREATE TABLE `employeelanguages` (
  `id` bigint(20) NOT NULL,
  `language_id` bigint(20) DEFAULT NULL,
  `employee` bigint(20) NOT NULL,
  `reading` enum('Elementary Proficiency','Limited Working Proficiency','Professional Working Proficiency','Full Professional Proficiency','Native or Bilingual Proficiency') DEFAULT NULL,
  `speaking` enum('Elementary Proficiency','Limited Working Proficiency','Professional Working Proficiency','Full Professional Proficiency','Native or Bilingual Proficiency') DEFAULT NULL,
  `writing` enum('Elementary Proficiency','Limited Working Proficiency','Professional Working Proficiency','Full Professional Proficiency','Native or Bilingual Proficiency') DEFAULT NULL,
  `understanding` enum('Elementary Proficiency','Limited Working Proficiency','Professional Working Proficiency','Full Professional Proficiency','Native or Bilingual Proficiency') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employeeleavedays`
--

CREATE TABLE `employeeleavedays` (
  `id` bigint(20) NOT NULL,
  `employee_leave` bigint(20) NOT NULL,
  `leave_date` date DEFAULT NULL,
  `leave_type` enum('Full Day','Half Day - Morning','Half Day - Afternoon','1 Hour - Morning','2 Hours - Morning','3 Hours - Morning','1 Hour - Afternoon','2 Hours - Afternoon','3 Hours - Afternoon') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employeeleavelog`
--

CREATE TABLE `employeeleavelog` (
  `id` bigint(20) NOT NULL,
  `employee_leave` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `data` varchar(500) NOT NULL,
  `status_from` enum('Approved','Pending','Rejected','Cancellation Requested','Cancelled','Processing') DEFAULT 'Pending',
  `status_to` enum('Approved','Pending','Rejected','Cancellation Requested','Cancelled','Processing') DEFAULT 'Pending',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employeeleaves`
--

CREATE TABLE `employeeleaves` (
  `id` bigint(20) NOT NULL,
  `employee` bigint(20) NOT NULL,
  `leave_type` bigint(20) NOT NULL,
  `leave_period` bigint(20) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `details` text,
  `status` enum('Approved','Pending','Rejected','Cancellation Requested','Cancelled','Processing') DEFAULT 'Pending',
  `attachment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) NOT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL DEFAULT '',
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `nationality` bigint(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `marital_status` enum('Married','Single','Divorced','Widowed','Other') DEFAULT NULL,
  `ssn_num` varchar(100) DEFAULT NULL,
  `nic_num` varchar(100) DEFAULT NULL,
  `other_id` varchar(100) DEFAULT NULL,
  `driving_license` varchar(100) DEFAULT NULL,
  `driving_license_exp_date` date DEFAULT NULL,
  `employment_status` bigint(20) DEFAULT NULL,
  `job_title` bigint(20) DEFAULT NULL,
  `pay_grade` bigint(20) DEFAULT NULL,
  `work_station_id` varchar(100) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `country` char(2) DEFAULT NULL,
  `province` bigint(20) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `home_phone` varchar(50) DEFAULT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `work_phone` varchar(50) DEFAULT NULL,
  `work_email` varchar(100) DEFAULT NULL,
  `private_email` varchar(100) DEFAULT NULL,
  `joined_date` date DEFAULT NULL,
  `confirmation_date` date DEFAULT NULL,
  `supervisor` bigint(20) DEFAULT NULL,
  `indirect_supervisors` varchar(250) DEFAULT NULL,
  `department` bigint(20) DEFAULT NULL,
  `custom1` varchar(250) DEFAULT NULL,
  `custom2` varchar(250) DEFAULT NULL,
  `custom3` varchar(250) DEFAULT NULL,
  `custom4` varchar(250) DEFAULT NULL,
  `custom5` varchar(250) DEFAULT NULL,
  `custom6` varchar(250) DEFAULT NULL,
  `custom7` varchar(250) DEFAULT NULL,
  `custom8` varchar(250) DEFAULT NULL,
  `custom9` varchar(250) DEFAULT NULL,
  `custom10` varchar(250) DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `notes` text,
  `status` enum('Active','Terminated') DEFAULT 'Active',
  `ethnicity` bigint(20) DEFAULT NULL,
  `immigration_status` bigint(20) DEFAULT NULL,
  `approver1` bigint(20) DEFAULT NULL,
  `approver2` bigint(20) DEFAULT NULL,
  `approver3` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employeeskills`
--

CREATE TABLE `employeeskills` (
  `id` bigint(20) NOT NULL,
  `skill_id` bigint(20) DEFAULT NULL,
  `employee` bigint(20) NOT NULL,
  `details` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employmentstatus`
--

CREATE TABLE `employmentstatus` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `employee` bigint(20) DEFAULT NULL,
  `file_group` varchar(100) NOT NULL,
  `size` bigint(20) DEFAULT NULL,
  `size_text` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `glaccountsf`
--

CREATE TABLE `glaccountsf` (
  `id` int(11) NOT NULL,
  `account_Name` char(120) DEFAULT NULL,
  `Branch` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `balance` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `glaccounts_sub`
--

CREATE TABLE `glaccounts_sub` (
  `id` int(11) NOT NULL,
  `account_Name` char(120) DEFAULT NULL,
  `Branch` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `balance` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gltransf`
--

CREATE TABLE `gltransf` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `account_name` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `ref_no` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `narration` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(12) NOT NULL,
  `inputby` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `branch` char(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gl_bf`
--

CREATE TABLE `gl_bf` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grnfile`
--

CREATE TABLE `grnfile` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hdnotef`
--

CREATE TABLE `hdnotef` (
  `id` int(11) NOT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adm_date` datetime NOT NULL,
  `disch_date` date NOT NULL,
  `tot_amount` int(20) NOT NULL,
  `inv_amount` int(20) NOT NULL,
  `pay_account` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hdnotef2`
--

CREATE TABLE `hdnotef2` (
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adm_date` date NOT NULL,
  `disch_date` date NOT NULL,
  `tot_amount` int(20) NOT NULL,
  `inv_amount` int(20) NOT NULL,
  `pay_account` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dateh` date DEFAULT NULL,
  `status` enum('Full Day','Half Day') DEFAULT 'Full Day',
  `country` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hosp_clinic`
--

CREATE TABLE `hosp_clinic` (
  `id` int(100) NOT NULL,
  `adm_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `line1` varchar(100) NOT NULL,
  `line2` varchar(100) NOT NULL,
  `line3` varchar(100) NOT NULL,
  `line4` varchar(100) NOT NULL,
  `line5` varchar(100) NOT NULL,
  `line6` varchar(100) NOT NULL,
  `line7` varchar(100) NOT NULL,
  `line8` varchar(100) NOT NULL,
  `line9` varchar(100) NOT NULL,
  `line10` varchar(100) NOT NULL,
  `line11` varchar(100) NOT NULL,
  `line12` varchar(100) NOT NULL,
  `line13` varchar(100) NOT NULL,
  `line14` varchar(100) NOT NULL,
  `line15` varchar(100) NOT NULL,
  `line16` varchar(100) NOT NULL,
  `line17` varchar(100) NOT NULL,
  `line18` varchar(100) NOT NULL,
  `line19` varchar(100) NOT NULL,
  `line20` varchar(100) NOT NULL,
  `line21` varchar(100) NOT NULL,
  `line22` varchar(100) NOT NULL,
  `line23` varchar(100) NOT NULL,
  `line24` varchar(100) NOT NULL,
  `line25` varchar(100) NOT NULL,
  `line26` varchar(100) NOT NULL,
  `line27` varchar(100) NOT NULL,
  `line28` varchar(100) NOT NULL,
  `line29` varchar(100) NOT NULL,
  `line30` varchar(100) NOT NULL,
  `line31` varchar(100) NOT NULL,
  `line32` varchar(100) NOT NULL,
  `line33` varchar(100) NOT NULL,
  `line34` varchar(100) NOT NULL,
  `line35` varchar(100) NOT NULL,
  `line36` varchar(100) NOT NULL,
  `line37` varchar(100) NOT NULL,
  `line38` varchar(100) NOT NULL,
  `line39` varchar(100) NOT NULL,
  `line40` varchar(100) NOT NULL,
  `line41` varchar(100) NOT NULL,
  `line42` varchar(100) NOT NULL,
  `line43` varchar(100) NOT NULL,
  `line44` varchar(100) NOT NULL,
  `line45` varchar(100) NOT NULL,
  `line46` varchar(100) NOT NULL,
  `line47` varchar(100) NOT NULL,
  `line48` varchar(100) NOT NULL,
  `line49` varchar(100) NOT NULL,
  `line50` varchar(100) NOT NULL,
  `line51` varchar(100) NOT NULL,
  `line52` varchar(100) NOT NULL,
  `line53` varchar(100) NOT NULL,
  `line54` varchar(100) NOT NULL,
  `line55` varchar(100) NOT NULL,
  `line56` varchar(100) NOT NULL,
  `line57` varchar(100) NOT NULL,
  `line58` varchar(100) NOT NULL,
  `line59` varchar(100) NOT NULL,
  `line60` varchar(100) NOT NULL,
  `line61` varchar(100) NOT NULL,
  `line62` varchar(100) NOT NULL,
  `line63` varchar(100) NOT NULL,
  `line64` varchar(100) NOT NULL,
  `line65` varchar(100) NOT NULL,
  `line66` varchar(100) NOT NULL,
  `line67` varchar(100) NOT NULL,
  `line68` varchar(100) NOT NULL,
  `line69` varchar(100) NOT NULL,
  `line70` varchar(100) NOT NULL,
  `line71` varchar(100) NOT NULL,
  `line72` varchar(100) NOT NULL,
  `line73` varchar(100) NOT NULL,
  `line74` varchar(100) NOT NULL,
  `line75` varchar(100) NOT NULL,
  `line76` varchar(100) NOT NULL,
  `line77` varchar(100) NOT NULL,
  `line78` varchar(100) NOT NULL,
  `line79` varchar(100) NOT NULL,
  `line80` varchar(100) NOT NULL,
  `line81` varchar(100) NOT NULL,
  `line82` varchar(100) NOT NULL,
  `line83` varchar(100) NOT NULL,
  `line84` varchar(100) NOT NULL,
  `line85` varchar(100) NOT NULL,
  `line86` varchar(100) NOT NULL,
  `line87` varchar(100) NOT NULL,
  `line88` varchar(100) NOT NULL,
  `line89` varchar(100) NOT NULL,
  `line90` varchar(100) NOT NULL,
  `line91` varchar(100) NOT NULL,
  `line92` varchar(100) NOT NULL,
  `line93` varchar(100) NOT NULL,
  `line94` varchar(100) NOT NULL,
  `line95` varchar(100) NOT NULL,
  `line96` varchar(100) NOT NULL,
  `line97` varchar(100) NOT NULL,
  `line98` varchar(100) NOT NULL,
  `line99` varchar(100) NOT NULL,
  `line100` varchar(100) NOT NULL,
  `line101` varchar(100) NOT NULL,
  `line102` varchar(100) NOT NULL,
  `line103` varchar(100) NOT NULL,
  `line104` varchar(100) NOT NULL,
  `line105` varchar(100) NOT NULL,
  `line106` varchar(100) NOT NULL,
  `line107` varchar(100) NOT NULL,
  `line108` varchar(100) NOT NULL,
  `line109` varchar(100) NOT NULL,
  `line110` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `htransf`
--

CREATE TABLE `htransf` (
  `id` int(11) NOT NULL,
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `doc_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(50) NOT NULL,
  `trans_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trans2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ledger` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `others2` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `inputdate` date NOT NULL,
  `qty` int(10) NOT NULL,
  `company` char(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `htransf2`
--

CREATE TABLE `htransf2` (
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `doc_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(50) NOT NULL,
  `trans_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trans2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ledger` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `others2` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `inputdate` date NOT NULL,
  `qty` int(10) NOT NULL,
  `company` char(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `htransf_allocate`
--

CREATE TABLE `htransf_allocate` (
  `id` int(11) NOT NULL,
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `doc_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(50) NOT NULL,
  `trans_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trans2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ledger` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `others2` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `inputdate` date NOT NULL,
  `qty` int(10) NOT NULL,
  `company` char(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invheader`
--

CREATE TABLE `invheader` (
  `id` int(11) NOT NULL,
  `invdate` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `note` char(100) DEFAULT NULL,
  `closed` char(3) DEFAULT 'No',
  `ship_via` char(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invlines`
--

CREATE TABLE `invlines` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `item` char(20) DEFAULT NULL,
  `qty` decimal(8,2) NOT NULL DEFAULT '0.00',
  `unit` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ipmedicalfile`
--

CREATE TABLE `ipmedicalfile` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `doctor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(10) NOT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `temp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `b_p` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sign1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sign2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sign3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `diag1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `diag2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test1_qty` int(10) NOT NULL,
  `test1_cost` int(10) NOT NULL,
  `test2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test2_qty` int(10) NOT NULL,
  `test2_cost` int(10) NOT NULL,
  `test3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test3_qty` int(10) NOT NULL,
  `test3_cost` int(10) NOT NULL,
  `test4` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test4_qty` int(10) NOT NULL,
  `test4_cost` int(10) NOT NULL,
  `test5` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test5_qty` int(10) NOT NULL,
  `test5_cost` int(10) NOT NULL,
  `med1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med1_qty` int(10) NOT NULL,
  `med1_cost` int(10) NOT NULL,
  `med1_dx` int(10) NOT NULL,
  `med2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med2_qty` int(10) NOT NULL,
  `med2_cost` int(10) NOT NULL,
  `med2_dx` int(10) NOT NULL,
  `med3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med3_qty` int(10) NOT NULL,
  `med3_dx` int(10) NOT NULL,
  `med4` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med4_qty` int(10) NOT NULL,
  `med4_dx` int(10) NOT NULL,
  `med5` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med5_qty` int(10) NOT NULL,
  `med5_dx` int(10) NOT NULL,
  `med6` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med6_qty` int(10) NOT NULL,
  `med6_dx` int(10) NOT NULL,
  `med7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `med7_qty` int(10) NOT NULL,
  `med7_dx` int(10) NOT NULL,
  `med7_cost` int(11) NOT NULL,
  `med3_cost` int(10) NOT NULL,
  `med4_cost` int(10) NOT NULL,
  `med5_cost` int(10) NOT NULL,
  `med6_cost` int(10) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `test1_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `test2_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `test3_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `test4_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `test5_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ref_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `med1_dx2` int(10) NOT NULL,
  `med2_dx2` int(10) NOT NULL,
  `med3_dx2` int(10) NOT NULL,
  `med4_dx2` int(10) NOT NULL,
  `med5_dx2` int(10) NOT NULL,
  `med6_dx2` int(10) NOT NULL,
  `med7_dx2` int(10) NOT NULL,
  `drug1_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug2_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug3_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug4_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug5_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug6_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug7_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dose1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_summary` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `next_app` date NOT NULL,
  `reporter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sign4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sign5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diag3` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issues3`
--

CREATE TABLE `issues3` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issues9`
--

CREATE TABLE `issues9` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `item` varchar(200) DEFAULT NULL,
  `item_cd` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobtitles`
--

CREATE TABLE `jobtitles` (
  `id` bigint(20) NOT NULL,
  `code` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `specification` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `journals_tmp`
--

CREATE TABLE `journals_tmp` (
  `id` int(10) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_walkin`
--

CREATE TABLE `lab_walkin` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leavegroupemployees`
--

CREATE TABLE `leavegroupemployees` (
  `id` bigint(20) NOT NULL,
  `employee` bigint(20) NOT NULL,
  `leave_group` bigint(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leavegroups`
--

CREATE TABLE `leavegroups` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leaveperiods`
--

CREATE TABLE `leaveperiods` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leaverules`
--

CREATE TABLE `leaverules` (
  `id` bigint(20) NOT NULL,
  `leave_type` bigint(20) NOT NULL,
  `job_title` bigint(20) DEFAULT NULL,
  `employment_status` bigint(20) DEFAULT NULL,
  `employee` bigint(20) DEFAULT NULL,
  `supervisor_leave_assign` enum('Yes','No') DEFAULT 'Yes',
  `employee_can_apply` enum('Yes','No') DEFAULT 'Yes',
  `apply_beyond_current` enum('Yes','No') DEFAULT 'Yes',
  `leave_accrue` enum('No','Yes') DEFAULT 'No',
  `carried_forward` enum('No','Yes') DEFAULT 'No',
  `default_per_year` decimal(10,3) NOT NULL,
  `carried_forward_percentage` int(11) DEFAULT '0',
  `carried_forward_leave_availability` int(11) DEFAULT '365',
  `propotionate_on_joined_date` enum('No','Yes') DEFAULT 'No',
  `leave_group` bigint(20) DEFAULT NULL,
  `max_carried_forward_amount` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leavetypes`
--

CREATE TABLE `leavetypes` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `supervisor_leave_assign` enum('Yes','No') DEFAULT 'Yes',
  `employee_can_apply` enum('Yes','No') DEFAULT 'Yes',
  `apply_beyond_current` enum('Yes','No') DEFAULT 'Yes',
  `leave_accrue` enum('No','Yes') DEFAULT 'No',
  `carried_forward` enum('No','Yes') DEFAULT 'No',
  `default_per_year` decimal(10,3) NOT NULL,
  `carried_forward_percentage` int(11) DEFAULT '0',
  `carried_forward_leave_availability` int(11) DEFAULT '365',
  `propotionate_on_joined_date` enum('No','Yes') DEFAULT 'No',
  `send_notification_emails` enum('Yes','No') DEFAULT 'Yes',
  `leave_group` bigint(20) DEFAULT NULL,
  `leave_color` varchar(10) DEFAULT NULL,
  `max_carried_forward_amount` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logfile`
--

CREATE TABLE `logfile` (
  `date` datetime NOT NULL,
  `patient` varchar(40) NOT NULL,
  `inputby` varchar(40) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lpo_trans`
--

CREATE TABLE `lpo_trans` (
  `id` int(11) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `type` char(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `trans_desc` char(100) NOT NULL,
  `date` date NOT NULL,
  `inputby` char(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ref_no` char(11) NOT NULL,
  `adm_no` char(100) NOT NULL,
  `vat` int(10) NOT NULL,
  `disc` int(10) NOT NULL,
  `tot_vat` int(10) NOT NULL,
  `tot_disc` int(10) NOT NULL,
  `net_total` int(10) NOT NULL,
  `real_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicalfile`
--

CREATE TABLE `medicalfile` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` text COLLATE utf8_unicode_ci NOT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `doctor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(10) NOT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `temp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `b_p` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sign1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sign2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sign3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `diag1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `diag2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test1_qty` int(10) NOT NULL,
  `test1_cost` int(10) NOT NULL,
  `test2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test2_qty` int(10) NOT NULL,
  `test2_cost` int(10) NOT NULL,
  `test3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test3_qty` int(10) NOT NULL,
  `test3_cost` int(10) NOT NULL,
  `test4` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test4_qty` int(10) NOT NULL,
  `test4_cost` int(10) NOT NULL,
  `test5` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `test5_qty` int(10) NOT NULL,
  `test5_cost` int(10) NOT NULL,
  `med1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med1_qty` int(10) NOT NULL,
  `med1_cost` int(10) NOT NULL,
  `med1_dx` int(10) NOT NULL,
  `med2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med2_qty` int(10) NOT NULL,
  `med2_cost` int(10) NOT NULL,
  `med2_dx` int(10) NOT NULL,
  `med3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med3_qty` int(10) NOT NULL,
  `med3_dx` int(10) NOT NULL,
  `med4` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med4_qty` int(10) NOT NULL,
  `med4_dx` int(10) NOT NULL,
  `med5` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med5_qty` int(10) NOT NULL,
  `med5_dx` int(10) NOT NULL,
  `med6` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `med6_qty` int(10) NOT NULL,
  `med6_dx` int(10) NOT NULL,
  `med7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `med7_qty` int(10) NOT NULL,
  `med7_dx` int(10) NOT NULL,
  `med7_cost` int(11) NOT NULL,
  `med3_cost` int(10) NOT NULL,
  `med4_cost` int(10) NOT NULL,
  `med5_cost` int(10) NOT NULL,
  `med6_cost` int(10) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `test1_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `test2_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `test3_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `test4_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `test5_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ref_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `med1_dx2` int(10) NOT NULL,
  `med2_dx2` int(10) NOT NULL,
  `med3_dx2` int(10) NOT NULL,
  `med4_dx2` int(10) NOT NULL,
  `med5_dx2` int(10) NOT NULL,
  `med6_dx2` int(10) NOT NULL,
  `med7_dx2` int(10) NOT NULL,
  `drug1_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug2_issued` text COLLATE utf8_unicode_ci NOT NULL,
  `drug3_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug4_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug5_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug6_issued` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `drug7_issued` text COLLATE utf8_unicode_ci NOT NULL,
  `dose1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dose7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_summary` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `next_app` datetime NOT NULL,
  `reporter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sign4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sign5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diag3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newprescription`
--

CREATE TABLE `newprescription` (
  `Id` int(11) NOT NULL,
  `PrescId` varchar(20) NOT NULL,
  `TransDate` varchar(20) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `PatId` varchar(20) DEFAULT NULL,
  `OpNo` varchar(20) DEFAULT NULL,
  `IpNo` varchar(20) DEFAULT NULL,
  `PatName` varchar(50) DEFAULT NULL,
  `Temp` varchar(30) DEFAULT NULL,
  `Bp1` varchar(30) DEFAULT NULL,
  `Bp2` varchar(30) DEFAULT NULL,
  `Weight` varchar(30) DEFAULT NULL,
  `RespRate` varchar(30) DEFAULT NULL,
  `PulseRate` varchar(30) DEFAULT NULL,
  `Rbs` varchar(20) NOT NULL,
  `Allergies` text,
  `OtherDetails` text,
  `History` text,
  `Complaint` text,
  `PhyExam` text NOT NULL,
  `Reclab` varchar(10) DEFAULT NULL,
  `LabTests` text,
  `LabResults` text,
  `Recrad` varchar(20) DEFAULT NULL,
  `RadTests` text,
  `RadiologyResults` text,
  `Treatment` text,
  `RecTheatre` varchar(1) DEFAULT NULL,
  `Surgery` text,
  `Diagnosis` text,
  `Prescription` text,
  `Admitted` varchar(5) DEFAULT NULL,
  `WardType` varchar(60) DEFAULT NULL,
  `RoomNo` varchar(10) DEFAULT NULL,
  `BedNo` varchar(20) DEFAULT NULL,
  `AdmDate` varchar(20) DEFAULT NULL,
  `Discharge` varchar(20) DEFAULT NULL,
  `Doctor` varchar(20) DEFAULT NULL,
  `ProgressNotes` text,
  `DoctorNotes` text,
  `NursesNotes` text,
  `RecPharm` varchar(1) NOT NULL,
  `RecNurse` varchar(1) NOT NULL,
  `Status` varchar(11) DEFAULT NULL,
  `Stamp` varchar(10) DEFAULT '',
  `StartTime` varchar(20) NOT NULL,
  `TriageTime` varchar(20) NOT NULL,
  `ConsTime` varchar(20) NOT NULL,
  `LabTime` varchar(20) NOT NULL,
  `RadTime` varchar(20) NOT NULL,
  `PharmTime` varchar(20) NOT NULL,
  `Dept` varchar(30) DEFAULT NULL,
  `DiagCat` varchar(20) DEFAULT NULL,
  `DiagName` text,
  `DayCare` varchar(1) DEFAULT NULL,
  `OldNo` varchar(20) DEFAULT NULL,
  `ReviewDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `next_ancf`
--

CREATE TABLE `next_ancf` (
  `next_adm` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `next_dmf`
--

CREATE TABLE `next_dmf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_fpf`
--

CREATE TABLE `next_fpf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_hatf`
--

CREATE TABLE `next_hatf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_hypf`
--

CREATE TABLE `next_hypf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_invoice`
--

CREATE TABLE `next_invoice` (
  `next_invoice` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `next_ipf`
--

CREATE TABLE `next_ipf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_iprefile`
--

CREATE TABLE `next_iprefile` (
  `next_ref` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `next_issp`
--

CREATE TABLE `next_issp` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_lpo`
--

CREATE TABLE `next_lpo` (
  `next_lpo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_matf`
--

CREATE TABLE `next_matf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_mchf`
--

CREATE TABLE `next_mchf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_opdf`
--

CREATE TABLE `next_opdf` (
  `next_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_opdfile`
--

CREATE TABLE `next_opdfile` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_ovcf`
--

CREATE TABLE `next_ovcf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_pnf`
--

CREATE TABLE `next_pnf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_ppf`
--

CREATE TABLE `next_ppf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_refile`
--

CREATE TABLE `next_refile` (
  `next_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_rff`
--

CREATE TABLE `next_rff` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_staffip`
--

CREATE TABLE `next_staffip` (
  `next_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_staffop`
--

CREATE TABLE `next_staffop` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_transfer`
--

CREATE TABLE `next_transfer` (
  `next_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_wkf`
--

CREATE TABLE `next_wkf` (
  `next_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `next_wkfile`
--

CREATE TABLE `next_wkfile` (
  `next_ref` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(100) NOT NULL,
  `adm_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `payer` varchar(100) NOT NULL,
  `bed` varchar(100) NOT NULL,
  `adm_date` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `line7` varchar(100) NOT NULL,
  `line8` varchar(100) NOT NULL,
  `line9` varchar(100) NOT NULL,
  `line10` varchar(100) NOT NULL,
  `line11` varchar(100) NOT NULL,
  `line12` varchar(100) NOT NULL,
  `line13` varchar(100) NOT NULL,
  `line14` varchar(100) NOT NULL,
  `line15` varchar(100) NOT NULL,
  `line16` varchar(100) NOT NULL,
  `line17` varchar(100) NOT NULL,
  `line18` varchar(100) NOT NULL,
  `line19` varchar(100) NOT NULL,
  `line20` varchar(100) NOT NULL,
  `line21` varchar(100) NOT NULL,
  `line22` varchar(100) NOT NULL,
  `line23` varchar(100) NOT NULL,
  `line24` varchar(100) NOT NULL,
  `line25` varchar(100) NOT NULL,
  `line26` varchar(100) NOT NULL,
  `line27` varchar(100) NOT NULL,
  `line28` varchar(100) NOT NULL,
  `line29` varchar(100) NOT NULL,
  `line30` varchar(100) NOT NULL,
  `line31` varchar(100) NOT NULL,
  `line32` varchar(100) NOT NULL,
  `line33` varchar(100) NOT NULL,
  `line34` varchar(100) NOT NULL,
  `line35` varchar(100) NOT NULL,
  `line36` varchar(100) NOT NULL,
  `line37` varchar(100) NOT NULL,
  `line38` varchar(100) NOT NULL,
  `line39` varchar(100) NOT NULL,
  `line40` varchar(100) NOT NULL,
  `line41` varchar(100) NOT NULL,
  `line42` varchar(100) NOT NULL,
  `line43` varchar(100) NOT NULL,
  `line44` varchar(100) NOT NULL,
  `line45` varchar(100) NOT NULL,
  `line46` varchar(100) NOT NULL,
  `line47` varchar(100) NOT NULL,
  `line48` varchar(100) NOT NULL,
  `line49` varchar(100) NOT NULL,
  `line50` varchar(100) NOT NULL,
  `line51` varchar(100) NOT NULL,
  `line52` varchar(100) NOT NULL,
  `line53` varchar(100) NOT NULL,
  `line54` varchar(100) NOT NULL,
  `line55` varchar(100) NOT NULL,
  `line56` varchar(100) NOT NULL,
  `line57` varchar(100) NOT NULL,
  `line58` varchar(100) NOT NULL,
  `line59` varchar(100) NOT NULL,
  `line60` varchar(100) NOT NULL,
  `line61` varchar(100) NOT NULL,
  `line62` varchar(100) NOT NULL,
  `line63` varchar(100) NOT NULL,
  `line64` varchar(100) NOT NULL,
  `line65` varchar(100) NOT NULL,
  `line66` varchar(100) NOT NULL,
  `line67` varchar(100) NOT NULL,
  `line68` varchar(100) NOT NULL,
  `line69` varchar(100) NOT NULL,
  `line70` varchar(100) NOT NULL,
  `line71` varchar(100) NOT NULL,
  `line72` varchar(100) NOT NULL,
  `line73` varchar(100) NOT NULL,
  `line74` varchar(100) NOT NULL,
  `line75` varchar(100) NOT NULL,
  `line76` varchar(100) NOT NULL,
  `line77` varchar(100) NOT NULL,
  `line78` varchar(100) NOT NULL,
  `line79` varchar(100) NOT NULL,
  `line80` varchar(100) NOT NULL,
  `line81` varchar(100) NOT NULL,
  `line82` varchar(100) NOT NULL,
  `line83` varchar(100) NOT NULL,
  `line84` varchar(100) NOT NULL,
  `line85` varchar(100) NOT NULL,
  `line86` varchar(100) NOT NULL,
  `line87` varchar(100) NOT NULL,
  `line88` varchar(100) NOT NULL,
  `line89` varchar(100) NOT NULL,
  `line90` varchar(100) NOT NULL,
  `line91` varchar(100) NOT NULL,
  `line92` varchar(100) NOT NULL,
  `line93` varchar(100) NOT NULL,
  `line94` varchar(100) NOT NULL,
  `line95` varchar(100) NOT NULL,
  `line96` varchar(100) NOT NULL,
  `line97` varchar(100) NOT NULL,
  `line98` varchar(100) NOT NULL,
  `line99` varchar(100) NOT NULL,
  `line100` varchar(100) NOT NULL,
  `line101` varchar(100) NOT NULL,
  `line102` varchar(100) NOT NULL,
  `line103` varchar(100) NOT NULL,
  `line104` varchar(100) NOT NULL,
  `line105` varchar(100) NOT NULL,
  `line106` varchar(100) NOT NULL,
  `line107` varchar(100) NOT NULL,
  `line108` varchar(100) NOT NULL,
  `line109` varchar(100) NOT NULL,
  `line110` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nutritionf`
--

CREATE TABLE `nutritionf` (
  `id` int(10) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `units` text NOT NULL,
  `search_name` char(200) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `reorder` int(10) NOT NULL,
  `maximum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nut_auto_transact`
--

CREATE TABLE `nut_auto_transact` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opt_hdnotef`
--

CREATE TABLE `opt_hdnotef` (
  `id` int(10) NOT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adm_date` date NOT NULL,
  `disch_date` date NOT NULL,
  `tot_amount` int(20) NOT NULL,
  `inv_amount` int(20) NOT NULL,
  `pay_account` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_notes`
--

CREATE TABLE `patient_notes` (
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `doctor` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payfrequency`
--

CREATE TABLE `payfrequency` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paygrades`
--

CREATE TABLE `paygrades` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `currency` varchar(3) NOT NULL,
  `min_salary` decimal(12,2) DEFAULT '0.00',
  `max_salary` decimal(12,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_doctor_tmp`
--

CREATE TABLE `payment_doctor_tmp` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_petty_inv`
--

CREATE TABLE `payment_petty_inv` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_petty_tmp`
--

CREATE TABLE `payment_petty_tmp` (
  `id` int(11) NOT NULL,
  `location` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_supplier_tmp`
--

CREATE TABLE `payment_supplier_tmp` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_datacash`
--

CREATE TABLE `pay_datacash` (
  `id` int(11) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `type` char(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `trans_desc` char(100) NOT NULL,
  `date` date NOT NULL,
  `inputby` char(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ref_no` char(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `adm_no` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pha_walkin`
--

CREATE TABLE `pha_walkin` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phy_hdnotef`
--

CREATE TABLE `phy_hdnotef` (
  `id` int(10) NOT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adm_date` date NOT NULL,
  `disch_date` date NOT NULL,
  `tot_amount` int(20) NOT NULL,
  `inv_amount` int(20) NOT NULL,
  `pay_account` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pl_summary`
--

CREATE TABLE `pl_summary` (
  `account_name` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(12) NOT NULL,
  `date` date NOT NULL,
  `branch` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `postdated_invf`
--

CREATE TABLE `postdated_invf` (
  `id` int(11) NOT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adm_date` date NOT NULL,
  `disch_date` date NOT NULL,
  `tot_amount` int(20) NOT NULL,
  `inv_amount` int(20) NOT NULL,
  `pay_account` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` bigint(20) NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `code` char(2) NOT NULL DEFAULT '',
  `country` char(2) NOT NULL DEFAULT 'US'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ranges`
--

CREATE TABLE `ranges` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `balance` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `line1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `line2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `flag` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time_a` time(6) NOT NULL,
  `time_b` time(6) NOT NULL,
  `test1_result` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `v1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v9` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v10` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v11` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v12` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v13` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v14` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v15` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v16` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v17` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v18` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v19` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v20` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v21` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v22` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v23` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v24` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v25` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v26` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v27` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v28` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v29` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v30` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v31` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v32` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v33` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v34` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v35` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v36` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v37` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v38` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v39` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v40` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v41` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v42` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v43` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v44` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v45` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v46` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v47` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v48` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v49` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v50` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v51` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v52` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v53` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v54` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v55` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v56` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v57` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receiptf`
--

CREATE TABLE `receiptf` (
  `id` int(11) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `type` char(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `trans_desc` char(100) NOT NULL,
  `date` date NOT NULL,
  `inputby` char(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ref_no` char(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `adm_no` varchar(100) NOT NULL,
  `code` varchar(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return_sales`
--

CREATE TABLE `return_sales` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenuef`
--

CREATE TABLE `revenuef` (
  `id` int(11) NOT NULL,
  `Name` char(120) DEFAULT NULL,
  `cash_rate` int(50) DEFAULT NULL,
  `credit_rate` int(11) NOT NULL,
  `corp_rate` decimal(11,2) NOT NULL,
  `gl_account` varchar(50) NOT NULL,
  `Auto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `revenuef2`
--

CREATE TABLE `revenuef2` (
  `Name` char(120) DEFAULT NULL,
  `cash_rate` int(50) DEFAULT NULL,
  `credit_rate` int(11) NOT NULL,
  `corp_rate` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stockfile`
--

CREATE TABLE `stockfile` (
  `id` int(11) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `credit_price` decimal(11,2) NOT NULL,
  `nhif_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `units` text NOT NULL,
  `search_name` char(200) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `reorder` int(10) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockfile-old`
--

CREATE TABLE `stockfile-old` (
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `credit_price` decimal(11,2) NOT NULL,
  `nhif_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `units` text NOT NULL,
  `search_name` char(200) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `reorder` int(10) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockfile3`
--

CREATE TABLE `stockfile3` (
  `id` int(10) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `units` text NOT NULL,
  `search_name` char(200) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `reorder` int(10) NOT NULL,
  `maximum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockfileop`
--

CREATE TABLE `stockfileop` (
  `id` int(11) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `credit_price` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `units` text NOT NULL,
  `search_name` char(200) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `reorder` int(10) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockfile_bk`
--

CREATE TABLE `stockfile_bk` (
  `id` int(10) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `units` text NOT NULL,
  `search_name` char(200) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `reorder` int(10) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stocklab`
--

CREATE TABLE `stocklab` (
  `id` int(10) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `units` text NOT NULL,
  `search_name` char(200) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `reorder` int(10) NOT NULL,
  `maximum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockt2`
--

CREATE TABLE `stockt2` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `variance` int(11) DEFAULT NULL,
  `varance2` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `ref_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocktake`
--

CREATE TABLE `stocktake` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `variance` int(11) DEFAULT NULL,
  `varance2` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `ref_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_adj`
--

CREATE TABLE `stock_adj` (
  `id` int(10) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `search_id` int(10) NOT NULL,
  `line_no` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_adj2`
--

CREATE TABLE `stock_adj2` (
  `id` int(10) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `search_id` int(10) NOT NULL,
  `line_no` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_adj3`
--

CREATE TABLE `stock_adj3` (
  `id` int(10) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `search_id` int(10) NOT NULL,
  `line_no` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_alloc_rpt`
--

CREATE TABLE `stock_alloc_rpt` (
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `type` char(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `trans_desc` char(100) NOT NULL,
  `date` date NOT NULL,
  `inputby` char(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ref_no` char(11) NOT NULL,
  `adm_no` char(100) NOT NULL,
  `vat` int(10) NOT NULL,
  `disc` int(10) NOT NULL,
  `tot_vat` int(10) NOT NULL,
  `tot_disc` int(10) NOT NULL,
  `net_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_grn_tmp`
--

CREATE TABLE `stock_grn_tmp` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_issc`
--

CREATE TABLE `stock_issc` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_issp`
--

CREATE TABLE `stock_issp` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_issp_long`
--

CREATE TABLE `stock_issp_long` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` int(10) NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adm_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_lpo_tmp`
--

CREATE TABLE `stock_lpo_tmp` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` decimal(11,2) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` decimal(11,2) DEFAULT NULL,
  `gl_account` decimal(11,2) DEFAULT NULL,
  `search_id` int(10) NOT NULL,
  `line_no` int(10) NOT NULL,
  `tot_vat` decimal(11,2) NOT NULL,
  `tot_disc` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_rq`
--

CREATE TABLE `stock_rq` (
  `id` int(6) UNSIGNED NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer`
--

CREATE TABLE `stock_transfer` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` decimal(11,2) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` decimal(11,2) DEFAULT NULL,
  `search_id` int(10) NOT NULL,
  `line_no` int(10) NOT NULL,
  `tot_vat` int(10) NOT NULL,
  `tot_disc` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_transferx`
--

CREATE TABLE `stock_transferx` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` decimal(11,2) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` decimal(11,2) DEFAULT NULL,
  `search_id` int(10) NOT NULL,
  `line_no` int(10) NOT NULL,
  `tot_vat` int(10) NOT NULL,
  `tot_disc` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `batch_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `expiry` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `st_butch_expiryf`
--

CREATE TABLE `st_butch_expiryf` (
  `id` int(11) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `type` char(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `trans_desc` char(100) NOT NULL,
  `date` date NOT NULL,
  `inputby` char(100) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `ref_no` char(110) NOT NULL,
  `adm_no` char(100) NOT NULL,
  `vat` int(10) NOT NULL,
  `disc` int(10) NOT NULL,
  `batch_no` varchar(100) NOT NULL,
  `expiry` date NOT NULL,
  `net_total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `st_categoryf`
--

CREATE TABLE `st_categoryf` (
  `id` int(50) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `st_locationf`
--

CREATE TABLE `st_locationf` (
  `id` int(50) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `st_locationfile`
--

CREATE TABLE `st_locationfile` (
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `st_requestf`
--

CREATE TABLE `st_requestf` (
  `id` int(11) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `type` char(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `trans_desc` char(100) NOT NULL,
  `date` date NOT NULL,
  `inputby` char(100) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `ref_no` char(110) NOT NULL,
  `adm_no` char(100) NOT NULL,
  `vat` int(10) NOT NULL,
  `disc` int(10) NOT NULL,
  `tot_vat` int(10) NOT NULL,
  `tot_disc` int(10) NOT NULL,
  `net_total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `st_trans`
--

CREATE TABLE `st_trans` (
  `id` int(11) NOT NULL,
  `location` char(100) NOT NULL,
  `description` char(100) NOT NULL,
  `type` char(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `trans_desc` char(100) NOT NULL,
  `date` date NOT NULL,
  `inputby` char(100) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `ref_no` char(110) NOT NULL,
  `adm_no` char(100) NOT NULL,
  `vat` int(10) NOT NULL,
  `disc` int(10) NOT NULL,
  `tot_vat` int(10) NOT NULL,
  `tot_disc` int(10) NOT NULL,
  `net_total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `summary2`
--

CREATE TABLE `summary2` (
  `Pay_account` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `inv_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suppliersfile`
--

CREATE TABLE `suppliersfile` (
  `id` int(11) NOT NULL,
  `account_Name` char(120) DEFAULT NULL,
  `telephone_no` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `os_balance` int(11) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplierstrfile`
--

CREATE TABLE `supplierstrfile` (
  `id` int(11) NOT NULL,
  `account_no` char(100) NOT NULL,
  `account_name` char(100) NOT NULL,
  `date` date NOT NULL,
  `doc_no` char(50) NOT NULL,
  `service` char(100) NOT NULL,
  `type` char(50) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `ledger` char(50) NOT NULL,
  `invoice_no` char(50) NOT NULL,
  `username` char(50) NOT NULL,
  `others2` char(50) NOT NULL,
  `input_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `company` char(50) NOT NULL,
  `balance` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_allocate2`
--

CREATE TABLE `suppliers_allocate2` (
  `id` int(10) NOT NULL,
  `account_no` char(100) NOT NULL,
  `account_name` char(100) NOT NULL,
  `date` date NOT NULL,
  `doc_no` char(50) NOT NULL,
  `service` char(100) NOT NULL,
  `type` char(50) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `ledger` char(50) NOT NULL,
  `invoice_no` char(50) NOT NULL,
  `username` char(50) NOT NULL,
  `others2` char(50) NOT NULL,
  `input_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `company` char(50) NOT NULL,
  `balance` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers_allocate2`
--

INSERT INTO `suppliers_allocate2` (`id`, `account_no`, `account_name`, `date`, `doc_no`, `service`, `type`, `amount`, `ledger`, `invoice_no`, `username`, `others2`, `input_date`, `qty`, `company`, `balance`) VALUES
(326, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-01', 'tosheka1', 'BAL B/F AS AT 1ST AUGUST 2020-drinking water', 'INV', '50860.00', 'INV', 'tosheka1', 'GW039', '', '2020-08-01', 50860, 'TOSHEKA GENERAL STORES LTD', '50860.00'),
(339, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-06', '996', 'drinking water', 'INV', '690.00', 'INV', '996', 'GW039', '', '2020-08-06', 0, 'TOSHEKA GENERAL STORES LTD', '690.00'),
(340, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-03', '994', 'drinking water', 'INV', '890.00', 'INV', '994', 'GW039', '', '2020-08-03', 0, 'TOSHEKA GENERAL STORES LTD', '890.00'),
(341, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-10', '999', 'drinking water', 'INV', '890.00', 'INV', '999', 'GW039', '', '2020-08-10', 0, 'TOSHEKA GENERAL STORES LTD', '890.00'),
(342, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-11', '2000', 'drinking water', 'INV', '690.00', 'INV', '2000', 'GW039', '', '2020-08-11', 0, 'TOSHEKA GENERAL STORES LTD', '690.00'),
(343, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-04', '995', 'drinking water', 'INV', '920.00', 'INV', '995', 'GW039', '', '2020-08-04', 0, 'TOSHEKA GENERAL STORES LTD', '920.00'),
(345, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-13', '1002', 'drinking water', 'INV', '660.00', 'INV', '1002', 'GW039', '', '2020-08-13', 0, 'TOSHEKA GENERAL STORES LTD', '660.00'),
(368, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-15', '1004', 'drinking water', 'INV', '690.00', 'INV', '1004', 'GW039', '', '2020-08-15', 0, 'TOSHEKA GENERAL STORES LTD', '690.00'),
(369, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-15', '1005', 'drinking water', 'INV', '200.00', 'INV', '1005', 'GW039', '', '2020-08-15', 0, 'TOSHEKA GENERAL STORES LTD', '200.00'),
(370, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-19', '1007', 'drinking water', 'INV', '890.00', 'INV', '1007', 'GW039', '', '2020-08-19', 0, 'TOSHEKA GENERAL STORES LTD', '890.00'),
(371, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-17', '1006', 'drinking water', 'INV', '1020.00', 'INV', '1006', 'GW039', '', '2020-08-17', 0, 'TOSHEKA GENERAL STORES LTD', '1020.00'),
(372, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-17', '1006', 'drinking water', 'INV', '1020.00', 'INV', '1006', 'GW039', '', '2020-08-17', 0, 'TOSHEKA GENERAL STORES LTD', '1020.00'),
(375, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-22', '7470', 'drinking water', 'INV', '430.00', 'INV', '7470', 'GW039', '', '2020-08-22', 0, 'TOSHEKA GENERAL STORES LTD', '430.00'),
(376, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-24', '1008', 'drinking water', 'INV', '920.00', 'INV', '1008', 'GW039', '', '2020-08-24', 0, 'TOSHEKA GENERAL STORES LTD', '920.00'),
(377, 'PHARMACY', 'TOSHEKA GENERAL STORES LTD', '2020-08-26', '1009', 'drinking water', 'INV', '920.00', 'INV', '1009', 'GW039', '', '2020-08-26', 0, 'TOSHEKA GENERAL STORES LTD', '920.00');

-- --------------------------------------------------------

--
-- Table structure for table `supportedlanguages`
--

CREATE TABLE `supportedlanguages` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `symptomsf`
--

CREATE TABLE `symptomsf` (
  `id` int(10) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `symptomsf`
--

INSERT INTO `symptomsf` (`id`, `name`) VALUES
(1, ''),
(2, 'Loss Of Appetite'),
(3, 'Weight Loss'),
(4, 'Weight Gain'),
(5, 'Dry Mouth'),
(6, 'Fatigue'),
(7, 'Malaise'),
(8, 'Asthenia'),
(9, 'Muscle Weakness'),
(10, 'Pyrexia'),
(11, 'Jaundice'),
(12, 'Pain'),
(13, 'Abdominal Pain'),
(14, 'Chest Pain'),
(15, 'Bruising'),
(16, 'Epistaxis'),
(17, 'Tremor'),
(18, 'Convulsions'),
(19, 'Muscle Cramps'),
(20, 'Tinnitus'),
(21, 'Dizziness / Vertigo'),
(22, 'Syncope'),
(23, 'Hypothermia'),
(24, 'Hyperthermia'),
(25, 'Discharge'),
(26, 'Bleeding'),
(27, 'Swelling'),
(28, 'Deformity'),
(29, 'Sweats'),
(30, 'Chills And Shivering'),
(31, 'Acalculia'),
(32, 'Acrophobia'),
(33, 'Agnosia'),
(34, 'Agoraphobia'),
(35, 'Akathisia'),
(36, 'Akinesia'),
(37, 'Alexia'),
(38, 'Amusia'),
(39, 'Anhedonia'),
(40, 'Anomia'),
(41, 'Anosognosia'),
(42, 'Anxiety'),
(43, 'Apraxia'),
(44, 'Arachnophobia'),
(45, 'Ataxia'),
(46, 'Bradykinesia'),
(47, 'Cataplexy'),
(48, 'Chorea'),
(49, 'Claustrophobia'),
(50, 'Confusion'),
(51, 'Deliberate Self Harm And Drug Overdose'),
(52, 'Depression'),
(53, 'Dysarthria'),
(54, 'Dysdiadochokinesia'),
(55, 'Dysgraphia'),
(56, 'Dystonia'),
(57, 'Euphoria'),
(58, 'Hallucination'),
(59, 'Headache'),
(60, 'Hemiballismus And Ballismus'),
(61, 'Homicidal Ideation'),
(62, 'Insomnia'),
(63, 'Lhermitte\'s Sign (as If An Electrical Sensation Shoots Down Back & Into Arms)'),
(64, 'Mania'),
(65, 'Paralysis'),
(66, 'Paranoia Or Persecution'),
(67, 'Paresthesia'),
(68, 'Phobia (see The List Of Phobias)'),
(69, 'Prosopagnosia'),
(70, 'Sciatica'),
(71, 'Somnolence'),
(72, 'Suicidal Ideation'),
(73, 'Tic'),
(74, 'Tremor'),
(75, 'Amaurosis Fugax  And Amaurosis'),
(76, 'Blurred Vision'),
(77, 'Dalrymple\'s Sign'),
(78, 'Double Vision'),
(79, 'Exophthalmos'),
(80, 'Mydriasis/miosis'),
(81, 'Nystagmus'),
(82, 'Anorexia'),
(83, 'Bloating'),
(84, 'Belching'),
(85, 'Blood In Stool: Melena Hematochezia'),
(86, 'Constipation'),
(87, 'Diarrhea'),
(88, 'Dysphagia'),
(89, 'Dyspepsia'),
(90, 'Flatulence'),
(91, 'Fecal Incontinence'),
(92, 'Haematemesis'),
(93, 'Nausea'),
(94, 'Odynophagia'),
(95, 'Proctalgia Fugax'),
(96, 'Pyrosis'),
(97, 'Rectal Malodor'),
(98, 'Steatorrhea'),
(99, 'Vomiting'),
(100, 'Chest Pain'),
(101, 'Claudication'),
(102, 'Palpitation'),
(103, 'Tachycardia'),
(104, 'Bradycardia'),
(105, 'Arrhythmia'),
(106, 'Dysuria'),
(107, 'Hematuria'),
(108, 'Impotence'),
(109, 'Polyuria'),
(110, 'Retrograde Ejaculation'),
(111, 'Strangury'),
(112, 'Urinary Frequency'),
(113, 'Urinary Incontinence'),
(114, 'Urinary Retention'),
(115, 'Hypoventilation'),
(116, 'Hyperventilation'),
(117, 'Bradypnea'),
(118, 'Apnea'),
(119, 'Cough'),
(120, 'Dyspnea'),
(121, 'Hemoptysis'),
(122, 'Pleuritic Chest Pain'),
(123, 'Sputum Production'),
(124, 'Tachypnea'),
(125, 'Abrasion'),
(126, 'Alopecia'),
(127, 'Anasarca'),
(128, 'Blister'),
(129, 'Edema'),
(130, 'Hirsutism'),
(131, 'Itching'),
(132, 'Laceration'),
(133, 'Paresthesia'),
(134, 'Rash'),
(135, 'Urticaria'),
(136, 'Bloody Show Preceding Onset Of Labour'),
(137, 'Dyspareunia'),
(138, 'Pelvic Pain'),
(139, 'Infertility'),
(140, 'Labour Pains'),
(141, 'Vaginal Bleeding In Early Pregnancy / Miscarriage'),
(142, 'Vaginal Bleeding In Late Pregnancy'),
(143, 'Vaginismus'),
(144, 'Fever'),
(145, 'Swiftnes of neck'),
(146, 'General Malase'),
(147, 'Redness of eye'),
(148, 'Discharge of eye'),
(149, 'Discharge of ear'),
(150, 'Ear pain'),
(151, 'P.U Discharge'),
(152, 'Falling down'),
(153, 'P.U. Bleeding'),
(154, 'P.U. Sporting'),
(155, 'Thurstingness');

-- --------------------------------------------------------

--
-- Table structure for table `systemf2`
--

CREATE TABLE `systemf2` (
  `client_id` int(11) NOT NULL,
  `name` char(120) DEFAULT NULL,
  `password` char(50) NOT NULL,
  `branch` char(50) NOT NULL,
  `reports` enum('y','n') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `systemfile2`
--

CREATE TABLE `systemfile2` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `access_all` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rec` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `vit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `med` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `inve` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pha` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `repo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `acc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sets` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `doc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `anc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nut` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `wbc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dent` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adms` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lab` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `theat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stmt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `paym` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `invo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gl` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `blnc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `in_p` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `reg_stk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `repo_stk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `trans_stk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `co_stk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rec_stk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pds_stk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `users` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `charts` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `receiv` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `payables` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `doc_reg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rev_reg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `diag_reg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `signs_reg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `edit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `systemfile2`
--

INSERT INTO `systemfile2` (`id`, `username`, `password`, `account`, `access_all`, `rec`, `cas`, `vit`, `med`, `inve`, `pha`, `repo`, `acc`, `stk`, `sets`, `doc`, `anc`, `nut`, `wbc`, `dent`, `adms`, `rad`, `lab`, `theat`, `stmt`, `paym`, `invo`, `gl`, `blnc`, `in_p`, `reg_stk`, `repo_stk`, `trans_stk`, `co_stk`, `rec_stk`, `pds_stk`, `users`, `charts`, `receiv`, `payables`, `doc_reg`, `rev_reg`, `diag_reg`, `signs_reg`, `edit`, `name`) VALUES
(2, 'director', 'kisima2030', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 97787),
(3, 'joseph', 'kisima2030', 'CLINICAL', '0724109625', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 0),
(4, 'ANNNDUTA', 'ANN2040', 'NURSING', 'YES', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'NO', 'YES', 'NO', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'no', 'no', 'no', 'yes', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'yes', 'yes', 'NO', 0),
(76, 'FELIXOLUOCH', 'FELIX2040', 'Laboratory', '0716333649', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'NO', 'YES', 'NO', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'YES', 'yes', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'yes', 'YES', 'yes', 'YES', 'YES', 'YES', 'NO', 'NO', 'NO', 'NO', 'YES', 'NO', 'YES', 'YES', 'NO', 0),
(5, 'EDWINKERIO', 'EDWIN2030', 'LABOLATOTY', '0727371356', 'yes', 'yes', 'yes', 'yes', 'yes', 'YES', 'yes', 'yes', 'YES', 'yes', 'YES', 'YES', 'YES', 'yes', 'YES', 'YES', 'YES', 'yes', 'YES', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'yes', 'YES', 'NO', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'yes', 'YES', 0),
(78, 'MARTINWATHUTA', 'martin2025', 'Doctor', '0715400123', 'yes', 'yes', 'yes', 'yes', 'YES', 'yes', 'yes', 'NO', 'NO', 'NO', 'yes', 'yes', 'yes', 'yes', 'NO', 'NO', 'yes', 'yes', 'yes', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'YES', 'YES', 'YES', 0),
(86, 'ANNKARA', 'ANN080', 'Nurses', '0726720226', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'YES', 'yes', 'yes', 'YES', 'YES', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'YES', 'NO', 'NO', 'NO', 'NO', 'YES', 'NO', 'YES', 'YES', 'YES', 0),
(82, 'SCOLAGATWIRI', 'GATWIRI202020', 'Administrator', '0725901939', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'YES', 'yes', 'YES', 'YES', 'yes', 'yes', 'YES', 'YES', 'yes', 'NO', 'NO', 'NO', 'NO', 'NO', 'YES', 'NO', 'yes', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'NO', 0),
(85, 'ENOCHNYANTIO', 'ENOCH2012', 'Nurses', '0711407219', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'NO', 'yes', 'NO', 'yes', 'yes', 'yes', 'yes', 'NO', 'NO', 'yes', 'yes', 'yes', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'yes', 'yes', 'no', 'no', 'yes', 'YES', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'YES', 'YES', 'YES', 0),
(1, 'admin', 'password', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 97787),
(0, 'ETERMUCHIRI', 'PETER2030', 'Doctor', '0702310204', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'yes', 'yes', 'yes', 'YES', 'YES', 'YES', 'yes', 'yes', 'yes', 'yes', 'YES', 'yes', 'YES', 'YES', 'yes', 0),
(81, 'pearl', 'pearl', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 97787);

-- --------------------------------------------------------

--
-- Table structure for table `systemfile27`
--

CREATE TABLE `systemfile27` (
  `id` int(10) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `access_all` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stocks_reg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `db_reg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gl_reg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sup_reg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pat_reg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rev_reg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `doc_reg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bed_reg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_reg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `triage` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `laboratory` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pharmacy` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `accounts` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nurses` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `doctors_p` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `reception` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `systemfile27`
--

INSERT INTO `systemfile27` (`id`, `username`, `password`, `account`, `access_all`, `stocks_reg`, `db_reg`, `gl_reg`, `sup_reg`, `pat_reg`, `rev_reg`, `doc_reg`, `bed_reg`, `user_reg`, `triage`, `laboratory`, `pharmacy`, `accounts`, `nurses`, `doctors_p`, `reception`) VALUES
(1, 'admin', 'pass_1991', 'Administrator', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes'),
(2, 'marion', 'nyabok01', '', '', '', '', '', '', 'yes', '', 'yes', '', '', 'yes', 'yes', 'yes', 'yes', '', 'yes', 'yes'),
(4, 'kevin', 'kevilkevo', '', '', '', '', '', '', 'yes', '', 'yes', '', '', 'yes', 'yes', 'yes', 'yes', '', 'yes', 'yes'),
(5, 'wangari', 'betty2018', '', '', '', '', '', '', 'yes', '', '', '', '', 'yes', '', '', 'yes', '', '', ''),
(6, 'salome', 'sally001', '', '', '', '', '', '', 'yes', '', 'yes', '', '', 'yes', '', '', '', 'yes', '', ''),
(7, 'mwende', 'mwende*', '', '', '', '', '', '', '', '', 'yes', '', '', '', 'yes', '', '', '', 'yes', ''),
(8, 'agnes', 'mweke222', '', '', '', '', '', '', '', '', 'yes', '', '', '', '', '', '', '', 'yes', ''),
(9, 'mary', 'marymary', '', '', '', '', '', '', 'yes', '', 'yes', '', '', 'yes', '', '', '', 'yes', '', ''),
(10, 'jumwa', '001jumwa', '', '', '', '', '', '', 'yes', '', 'yes', '', '', 'yes', '', '', '', 'yes', '', ''),
(11, 'michael', 'mike007', '', '', '', '', '', '', '', '', 'yes', '', '', '', '', '', '', '', 'yes', ''),
(12, 'shadrack', 'omar*00', '', '', '', '', '', '', '', '', 'yes', '', '', '', '', '', '', '', 'yes', ''),
(13, 'sheila', 'sheila2012', '', '', '', '', '', '', 'yes', '', 'yes', '', '', 'yes', '', '', '', 'yes', '', ''),
(14, 'loise', 'ngoiri', 'Administrator', 'yes', '', '', '', '', 'yes', '', 'yes', '', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes'),
(15, 'pearl', 'pearl1000', '', '', '', '', '', '', '', '', 'yes', '', '', '', '', '', '', '', 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_qtys`
--

CREATE TABLE `table_qtys` (
  `qty` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transact_inv_postdated`
--

CREATE TABLE `transact_inv_postdated` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `selected` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(10) NOT NULL,
  `ref_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transact_inv_postdated`
--

INSERT INTO `transact_inv_postdated` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`, `selected`, `invoice_no`, `balance`, `ref_no`) VALUES
(241, 'Lab', 'Consoluntation FEE', 300, 1, 300, 'SYSTEM TESTING PATIENT', '2020-07-02', 'GOP16693', 'NHIF POLICE', '30745', 300, '35453'),
(245, 'Lab', 'FULL HAEMOGRAM', 0, 0, 0, 'SYSTEM TESTING PATIENT', '2020-07-02', 'GOP16693', 'NHIF POLICE', '30745', 0, '35453'),
(246, 'Xra', 'MALARIA B/S', 1000, 1, 1000, 'SYSTEM TESTING PATIENT', '2020-07-02', 'GOP16693', 'NHIF POLICE', '30745', 1000, '35453'),
(250, 'DRUGS', 'normal saline nasal drops', 200, 1, 200, 'SYSTEM TESTING PATIENT', '2020-07-02', 'GOP16693', 'NHIF POLICE', '30745', 200, '35453'),
(320, 'Lab', 'CONSULTATION', 300, 1, 300, 'SYSTEM TESTING PATIENT', '2020-07-28', 'GOP16693', 'NHIF POLICE', '32417', 300, '77777'),
(322, 'Lab', 'MALARIA B/S', 400, 1, 400, 'SYSTEM TESTING PATIENT', '2020-07-28', 'GOP16693', 'NHIF POLICE', '32417', 400, '77777'),
(323, 'Xra', 'PELVIC BONE XRAY', 800, 1, 800, 'SYSTEM TESTING PATIENT', '2020-07-28', 'GOP16693', 'NHIF POLICE', '32417', 800, '77777'),
(347, 'Lab', 'CONSULTATION', 300, 1, 300, 'KIPKEMOI BII ERIC ', '2020-06-29', '11758', 'NHIF POLICE', '33021', 0, ''),
(352, 'Lab', 'H.PYROLI ANTIGEN', 0, 1, 0, 'KIPKEMOI BII ERIC ', '2020-06-29', '11758', 'NHIF POLICE', '33021', 0, ''),
(353, 'Lab', 'STOOL FOR O/C', 300, 1, 300, 'KIPKEMOI BII ERIC ', '2020-06-29', '11758', 'NHIF POLICE', '33021', 0, ''),
(364, 'DRUGS', 'clarithromycin 500mg', 1200, 1, 1200, 'KIPKEMOI BII ERIC ', '2020-06-29', '11758', 'NHIF POLICE', '33021', 0, ''),
(365, 'DRUGS', 'ESOMEPRAZOLE 40MG', 60, 20, 1200, 'KIPKEMOI BII ERIC ', '2020-06-29', '11758', 'NHIF POLICE', '33021', 0, ''),
(366, 'DRUGS', 'Amoxil 500mg caps', 400, 3, 1200, 'KIPKEMOI BII ERIC ', '2020-06-29', '11758', 'NHIF POLICE', '33021', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `by` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `poste` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `employee` bigint(20) DEFAULT NULL,
  `default_module` bigint(20) DEFAULT NULL,
  `user_level` enum('Admin','Employee','Manager','Other') DEFAULT NULL,
  `user_roles` text,
  `last_login` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `login_hash` varchar(64) DEFAULT NULL,
  `lang` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `workdays`
--

CREATE TABLE `workdays` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('Full Day','Half Day','Non-working Day') DEFAULT 'Full Day',
  `country` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xyz`
--

CREATE TABLE `xyz` (
  `id` int(11) NOT NULL,
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `doc_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(50) NOT NULL,
  `trans_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trans2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ledger` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `others2` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `inputdate` date NOT NULL,
  `qty` int(10) NOT NULL,
  `company` char(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xyz`
--

INSERT INTO `xyz` (`id`, `adm_no`, `patients_name`, `date`, `doc_no`, `service`, `type`, `amount`, `trans_type`, `trans2`, `ledger`, `invoice_no`, `username`, `others2`, `inputdate`, `qty`, `company`) VALUES
(11416, 'GOP17500', 'purity ombati ', '2020-08-31', 'K0', 'Adol suppository 125 mg', 'DB', 50, 'yes', 'Pharmacy Drugs', 'DB', '', 'admin', ' \\n', '2020-08-31', 1, ''),
(11415, 'GOP17500', 'purity ombati ', '2020-08-31', 'K0', 'GENTAMYCIN INJECTION', 'DB', 250, 'yes', 'Pharmacy Drugs', 'DB', '', 'admin', ' \\n', '2020-08-31', 1, ''),
(11414, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'BLOOD GROUPING', 'DB', 250, 'Lab', '', 'IP/OPD', '', 'admin', '', '2020-08-31', 1, ''),
(11413, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'MALARIA TEST', 'DB', 150, 'Lab', '', 'IP/OPD', '', 'admin', '', '2020-08-31', 1, ''),
(11412, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'FULL HAEMOGRAM', 'DB', 800, 'Lab', '', 'IP/OPD', '', 'admin', '', '2020-08-31', 1, ''),
(11411, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'BLOOD GROUPING', 'DB', 250, 'OPD', 'Laboratory Services', 'DB', '', 'admin', '', '2020-08-31', 1, ''),
(11410, 'GOP17500', 'purity ombati ', '2020-08-31', 'K38680', 'BLOOD SUGAR', 'DB', 200, 'DB', 'Laboratory Services', 'IP', '', 'admin', '', '2020-08-31', 1, ''),
(11409, 'GOP17500', 'purity ombati ', '2020-08-31', 'K38679', 'ALBUMIN', 'DB', 500, 'DB', 'Laboratory Services', 'IP', '', 'admin', '', '2020-08-31', 1, ''),
(11408, 'GOP17500', 'purity ombati ', '2020-08-31', 'K38678', 'C-REACTIVE PROTEIN', 'DB', 1100, 'DB', 'Laboratory Services', 'IP', '', 'admin', '', '2020-08-31', 1, ''),
(11405, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'Payment', 'RC', -3500, 'RC', 'PHARMACY DRUGS', '', '', 'admin', 'Printed', '0000-00-00', 6, ''),
(11404, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'GENTAMYCIN INJECTION', 'DB', 1500, 'RC', 'PHARMACY DRUGS', 'IP/OPD', '', 'admin', 'Printed', '0000-00-00', 6, ''),
(11403, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'Ceftriaxone 1gm injection', 'DB', 2000, 'RC', 'PHARMACY DRUGS', 'IP/OPD', '', 'admin', 'Printed', '0000-00-00', 5, ''),
(11402, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'Payment', 'RC', -950, 'RC', 'Laboratory Services', '', '', 'admin', 'Printed', '0000-00-00', 1, ''),
(11401, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'MALARIA TEST', 'DB', 150, 'RC', 'Laboratory Services', 'IP/OPD', '', 'admin', 'Printed', '0000-00-00', 1, ''),
(11400, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'FULL HAEMOGRAM', 'DB', 800, 'RC', 'Laboratory Services', 'IP/OPD', '', 'admin', 'Printed', '0000-00-00', 1, ''),
(11399, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'Payment', 'RC', -150, 'RC', 'CONSULTATION INCOME', '', '', 'admin', 'Printed', '0000-00-00', 1, ''),
(11398, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'CONSULTATION', 'DB', 150, 'RC', 'CONSULTATION INCOME', 'IP/OPD', '', 'admin', 'Printed', '0000-00-00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `xyz6`
--

CREATE TABLE `xyz6` (
  `id` int(11) NOT NULL,
  `adm_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `patients_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `doc_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(50) NOT NULL,
  `trans_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trans2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ledger` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `others2` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `inputdate` date NOT NULL,
  `qty` int(10) NOT NULL,
  `company` char(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xyz6`
--

INSERT INTO `xyz6` (`id`, `adm_no`, `patients_name`, `date`, `doc_no`, `service`, `type`, `amount`, `trans_type`, `trans2`, `ledger`, `invoice_no`, `username`, `others2`, `inputdate`, `qty`, `company`) VALUES
(11416, 'GOP17500', 'purity ombati ', '2020-08-31', 'K0', 'Adol suppository 125 mg', 'DB', 50, 'yes', 'Pharmacy Drugs', 'DB', 'K36298', 'admin', ' \\n', '2020-08-31', 1, ''),
(11415, 'GOP17500', 'purity ombati ', '2020-08-31', 'K0', 'GENTAMYCIN INJECTION', 'DB', 250, 'yes', 'Pharmacy Drugs', 'DB', 'K36298', 'admin', ' \\n', '2020-08-31', 1, ''),
(11414, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'BLOOD GROUPING', 'DB', 250, 'Lab', '', 'IP/OPD', 'K36298', 'admin', '', '2020-08-31', 1, ''),
(11413, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'MALARIA TEST', 'DB', 150, 'Lab', '', 'IP/OPD', 'K36298', 'admin', '', '2020-08-31', 1, ''),
(11412, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'FULL HAEMOGRAM', 'DB', 800, 'Lab', '', 'IP/OPD', 'K36298', 'admin', '', '2020-08-31', 1, ''),
(11411, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'BLOOD GROUPING', 'DB', 250, 'OPD', 'Laboratory Services', 'DB', 'K36298', 'admin', '', '2020-08-31', 1, ''),
(11410, 'GOP17500', 'purity ombati ', '2020-08-31', 'K38680', 'BLOOD SUGAR', 'DB', 200, 'DB', 'Laboratory Services', 'IP', 'K36298', 'admin', '', '2020-08-31', 1, ''),
(11409, 'GOP17500', 'purity ombati ', '2020-08-31', 'K38679', 'ALBUMIN', 'DB', 500, 'DB', 'Laboratory Services', 'IP', 'K36298', 'admin', '', '2020-08-31', 1, ''),
(11408, 'GOP17500', 'purity ombati ', '2020-08-31', 'K38678', 'C-REACTIVE PROTEIN', 'DB', 1100, 'DB', 'Laboratory Services', 'IP', 'K36298', 'admin', '', '2020-08-31', 1, ''),
(11405, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'Payment', 'RC', -3500, 'RC', 'PHARMACY DRUGS', '', 'K36298', 'admin', 'Printed', '0000-00-00', 6, ''),
(11404, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'GENTAMYCIN INJECTION', 'DB', 1500, 'RC', 'PHARMACY DRUGS', 'IP/OPD', 'K36298', 'admin', 'Printed', '0000-00-00', 6, ''),
(11403, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'Ceftriaxone 1gm injection', 'DB', 2000, 'RC', 'PHARMACY DRUGS', 'IP/OPD', 'K36298', 'admin', 'Printed', '0000-00-00', 5, ''),
(11402, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'Payment', 'RC', -950, 'RC', 'Laboratory Services', '', 'K36298', 'admin', 'Printed', '0000-00-00', 1, ''),
(11401, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'MALARIA TEST', 'DB', 150, 'RC', 'Laboratory Services', 'IP/OPD', 'K36298', 'admin', 'Printed', '0000-00-00', 1, ''),
(11400, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'FULL HAEMOGRAM', 'DB', 800, 'RC', 'Laboratory Services', 'IP/OPD', 'K36298', 'admin', 'Printed', '0000-00-00', 1, ''),
(11399, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'Payment', 'RC', -150, 'RC', 'CONSULTATION INCOME', '', 'K36298', 'admin', 'Printed', '0000-00-00', 1, ''),
(11398, 'GOP17500', 'purity ombati ', '2020-08-31', '28', 'CONSULTATION', 'DB', 150, 'RC', 'CONSULTATION INCOME', 'IP/OPD', 'K36298', 'admin', 'Printed', '0000-00-00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `z1613983928`
--

CREATE TABLE `z1613983928` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1613983928`
--

INSERT INTO `z1613983928` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-02-21 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1614146499`
--

CREATE TABLE `z1614146499` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1614146499`
--

INSERT INTO `z1614146499` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-02-23 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1614146500`
--

CREATE TABLE `z1614146500` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1614146500`
--

INSERT INTO `z1614146500` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-02-23 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1614146580`
--

CREATE TABLE `z1614146580` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1614146580`
--

INSERT INTO `z1614146580` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-02-23 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1614146993`
--

CREATE TABLE `z1614146993` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1614146993`
--

INSERT INTO `z1614146993` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-02-23 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1614146996`
--

CREATE TABLE `z1614146996` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1614146996`
--

INSERT INTO `z1614146996` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-02-23 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1614147000`
--

CREATE TABLE `z1614147000` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1614147000`
--

INSERT INTO `z1614147000` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-02-23 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1614147004`
--

CREATE TABLE `z1614147004` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1614147004`
--

INSERT INTO `z1614147004` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-02-23 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1614521459`
--

CREATE TABLE `z1614521459` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1614521459`
--

INSERT INTO `z1614521459` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-02-27 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1620920668`
--

CREATE TABLE `z1620920668` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1620920668`
--

INSERT INTO `z1620920668` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-05-12 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1620921344`
--

CREATE TABLE `z1620921344` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1620921344`
--

INSERT INTO `z1620921344` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-05-12 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1623766790`
--

CREATE TABLE `z1623766790` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1623766790`
--

INSERT INTO `z1623766790` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-06-14 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1623766800`
--

CREATE TABLE `z1623766800` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1623766800`
--

INSERT INTO `z1623766800` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-06-14 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1623766869`
--

CREATE TABLE `z1623766869` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1623766869`
--

INSERT INTO `z1623766869` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-06-14 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1631442282`
--

CREATE TABLE `z1631442282` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1631442282`
--

INSERT INTO `z1631442282` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-09-11 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1635412952`
--

CREATE TABLE `z1635412952` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1635412952`
--

INSERT INTO `z1635412952` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-10-27 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1639720545`
--

CREATE TABLE `z1639720545` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1639720545`
--

INSERT INTO `z1639720545` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2021-12-16 21:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `z1677300956`
--

CREATE TABLE `z1677300956` (
  `id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `credit_rate` int(11) DEFAULT NULL,
  `gl_account` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `z1677300956`
--

INSERT INTO `z1677300956` (`id`, `location`, `description`, `sell_price`, `qty`, `credit_rate`, `gl_account`, `date`, `line_no`) VALUES
(1, '', '', 0, 0, 0, 0, '2023-02-24 21:00:00', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `0_areas`
--
ALTER TABLE `0_areas`
  ADD PRIMARY KEY (`area_code`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `0_attachments`
--
ALTER TABLE `0_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_no` (`type_no`,`trans_no`);

--
-- Indexes for table `0_audit_trail`
--
ALTER TABLE `0_audit_trail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Seq` (`fiscal_year`,`gl_date`,`gl_seq`),
  ADD KEY `Type_and_Number` (`type`,`trans_no`);

--
-- Indexes for table `0_bank_accounts`
--
ALTER TABLE `0_bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_account_name` (`bank_account_name`),
  ADD KEY `bank_account_number` (`bank_account_number`),
  ADD KEY `account_code` (`account_code`);

--
-- Indexes for table `0_bank_trans`
--
ALTER TABLE `0_bank_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_act` (`bank_act`,`ref`),
  ADD KEY `type` (`type`,`trans_no`),
  ADD KEY `bank_act_2` (`bank_act`,`reconciled`),
  ADD KEY `bank_act_3` (`bank_act`,`trans_date`);

--
-- Indexes for table `0_bom`
--
ALTER TABLE `0_bom`
  ADD PRIMARY KEY (`parent`,`component`,`workcentre_added`,`loc_code`),
  ADD KEY `component` (`component`),
  ADD KEY `id` (`id`),
  ADD KEY `loc_code` (`loc_code`),
  ADD KEY `parent` (`parent`,`loc_code`),
  ADD KEY `workcentre_added` (`workcentre_added`);

--
-- Indexes for table `0_budget_trans`
--
ALTER TABLE `0_budget_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Account` (`account`,`tran_date`,`dimension_id`,`dimension2_id`);

--
-- Indexes for table `0_chart_class`
--
ALTER TABLE `0_chart_class`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `0_chart_master`
--
ALTER TABLE `0_chart_master`
  ADD PRIMARY KEY (`account_code`),
  ADD KEY `account_name` (`account_name`),
  ADD KEY `accounts_by_type` (`account_type`,`account_code`);

--
-- Indexes for table `0_chart_types`
--
ALTER TABLE `0_chart_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `0_comments`
--
ALTER TABLE `0_comments`
  ADD KEY `type_and_id` (`type`,`id`);

--
-- Indexes for table `0_credit_status`
--
ALTER TABLE `0_credit_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reason_description` (`reason_description`);

--
-- Indexes for table `0_crm_categories`
--
ALTER TABLE `0_crm_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`type`,`action`),
  ADD UNIQUE KEY `type_2` (`type`,`name`);

--
-- Indexes for table `0_crm_contacts`
--
ALTER TABLE `0_crm_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`,`action`);

--
-- Indexes for table `0_crm_persons`
--
ALTER TABLE `0_crm_persons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `0_currencies`
--
ALTER TABLE `0_currencies`
  ADD PRIMARY KEY (`curr_abrev`);

--
-- Indexes for table `0_cust_allocations`
--
ALTER TABLE `0_cust_allocations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trans_type_from` (`person_id`,`trans_type_from`,`trans_no_from`,`trans_type_to`,`trans_no_to`),
  ADD KEY `From` (`trans_type_from`,`trans_no_from`),
  ADD KEY `To` (`trans_type_to`,`trans_no_to`);

--
-- Indexes for table `0_cust_branch`
--
ALTER TABLE `0_cust_branch`
  ADD PRIMARY KEY (`branch_code`,`debtor_no`),
  ADD KEY `branch_ref` (`branch_ref`),
  ADD KEY `group_no` (`group_no`);

--
-- Indexes for table `0_debtors_master`
--
ALTER TABLE `0_debtors_master`
  ADD PRIMARY KEY (`debtor_no`),
  ADD UNIQUE KEY `debtor_ref` (`debtor_ref`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `0_debtor_trans`
--
ALTER TABLE `0_debtor_trans`
  ADD PRIMARY KEY (`type`,`trans_no`,`debtor_no`),
  ADD KEY `debtor_no` (`debtor_no`,`branch_code`),
  ADD KEY `tran_date` (`tran_date`),
  ADD KEY `order_` (`order_`);

--
-- Indexes for table `0_debtor_trans_details`
--
ALTER TABLE `0_debtor_trans_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Transaction` (`debtor_trans_type`,`debtor_trans_no`),
  ADD KEY `src_id` (`src_id`);

--
-- Indexes for table `0_debtor_trans_no`
--
ALTER TABLE `0_debtor_trans_no`
  ADD PRIMARY KEY (`next_ref`);

--
-- Indexes for table `0_dimensions`
--
ALTER TABLE `0_dimensions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference` (`reference`),
  ADD KEY `date_` (`date_`),
  ADD KEY `due_date` (`due_date`),
  ADD KEY `type_` (`type_`);

--
-- Indexes for table `0_exchange_rates`
--
ALTER TABLE `0_exchange_rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `curr_code` (`curr_code`,`date_`);

--
-- Indexes for table `0_fiscal_year`
--
ALTER TABLE `0_fiscal_year`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `begin` (`begin`),
  ADD UNIQUE KEY `end` (`end`);

--
-- Indexes for table `0_gl_trans`
--
ALTER TABLE `0_gl_trans`
  ADD PRIMARY KEY (`counter`),
  ADD KEY `Type_and_Number` (`type`,`type_no`),
  ADD KEY `dimension_id` (`dimension_id`),
  ADD KEY `dimension2_id` (`dimension2_id`),
  ADD KEY `tran_date` (`tran_date`),
  ADD KEY `account_and_tran_date` (`account`,`tran_date`);

--
-- Indexes for table `0_grn_batch`
--
ALTER TABLE `0_grn_batch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_date` (`delivery_date`),
  ADD KEY `purch_order_no` (`purch_order_no`);

--
-- Indexes for table `0_grn_items`
--
ALTER TABLE `0_grn_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grn_batch_id` (`grn_batch_id`);

--
-- Indexes for table `0_groups`
--
ALTER TABLE `0_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `0_item_codes`
--
ALTER TABLE `0_item_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stock_id` (`stock_id`,`item_code`),
  ADD KEY `item_code` (`item_code`);

--
-- Indexes for table `0_item_tax_types`
--
ALTER TABLE `0_item_tax_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `0_item_tax_type_exemptions`
--
ALTER TABLE `0_item_tax_type_exemptions`
  ADD PRIMARY KEY (`item_tax_type_id`,`tax_type_id`);

--
-- Indexes for table `0_item_units`
--
ALTER TABLE `0_item_units`
  ADD PRIMARY KEY (`abbr`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `0_journal`
--
ALTER TABLE `0_journal`
  ADD PRIMARY KEY (`type`,`trans_no`),
  ADD KEY `tran_date` (`tran_date`);

--
-- Indexes for table `0_locations`
--
ALTER TABLE `0_locations`
  ADD PRIMARY KEY (`loc_code`);

--
-- Indexes for table `0_loc_stock`
--
ALTER TABLE `0_loc_stock`
  ADD PRIMARY KEY (`loc_code`,`stock_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `0_payment_terms`
--
ALTER TABLE `0_payment_terms`
  ADD PRIMARY KEY (`terms_indicator`),
  ADD UNIQUE KEY `terms` (`terms`);

--
-- Indexes for table `0_prices`
--
ALTER TABLE `0_prices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `price` (`stock_id`,`sales_type_id`,`curr_abrev`);

--
-- Indexes for table `0_printers`
--
ALTER TABLE `0_printers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `0_print_profiles`
--
ALTER TABLE `0_print_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profile` (`profile`,`report`);

--
-- Indexes for table `0_purch_data`
--
ALTER TABLE `0_purch_data`
  ADD PRIMARY KEY (`supplier_id`,`stock_id`);

--
-- Indexes for table `0_purch_orders`
--
ALTER TABLE `0_purch_orders`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `ord_date` (`ord_date`);

--
-- Indexes for table `0_purch_order_details`
--
ALTER TABLE `0_purch_order_details`
  ADD PRIMARY KEY (`po_detail_item`),
  ADD KEY `order` (`order_no`,`po_detail_item`),
  ADD KEY `itemcode` (`item_code`);

--
-- Indexes for table `0_quick_entries`
--
ALTER TABLE `0_quick_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `description` (`description`);

--
-- Indexes for table `0_quick_entry_lines`
--
ALTER TABLE `0_quick_entry_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `0_recurrent_invoices`
--
ALTER TABLE `0_recurrent_invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `0_reflines`
--
ALTER TABLE `0_reflines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prefix` (`trans_type`,`prefix`);

--
-- Indexes for table `0_refs`
--
ALTER TABLE `0_refs`
  ADD PRIMARY KEY (`id`,`type`),
  ADD KEY `Type_and_Reference` (`type`,`reference`);

--
-- Indexes for table `0_salesman`
--
ALTER TABLE `0_salesman`
  ADD PRIMARY KEY (`salesman_code`),
  ADD UNIQUE KEY `salesman_name` (`salesman_name`);

--
-- Indexes for table `0_sales_orders`
--
ALTER TABLE `0_sales_orders`
  ADD PRIMARY KEY (`trans_type`,`order_no`);

--
-- Indexes for table `0_sales_order_details`
--
ALTER TABLE `0_sales_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sorder` (`trans_type`,`order_no`),
  ADD KEY `stkcode` (`stk_code`);

--
-- Indexes for table `0_sales_pos`
--
ALTER TABLE `0_sales_pos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pos_name` (`pos_name`);

--
-- Indexes for table `0_sales_types`
--
ALTER TABLE `0_sales_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sales_type` (`sales_type`);

--
-- Indexes for table `0_security_roles`
--
ALTER TABLE `0_security_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `0_shippers`
--
ALTER TABLE `0_shippers`
  ADD PRIMARY KEY (`shipper_id`),
  ADD UNIQUE KEY `name` (`shipper_name`);

--
-- Indexes for table `0_sql_trail`
--
ALTER TABLE `0_sql_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0_stock_category`
--
ALTER TABLE `0_stock_category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `0_stock_fa_class`
--
ALTER TABLE `0_stock_fa_class`
  ADD PRIMARY KEY (`fa_class_id`);

--
-- Indexes for table `0_stock_master`
--
ALTER TABLE `0_stock_master`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `0_stock_moves`
--
ALTER TABLE `0_stock_moves`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `type` (`type`,`trans_no`),
  ADD KEY `Move` (`stock_id`,`loc_code`,`tran_date`);

--
-- Indexes for table `0_suppliers`
--
ALTER TABLE `0_suppliers`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `supp_ref` (`supp_ref`);

--
-- Indexes for table `0_supp_allocations`
--
ALTER TABLE `0_supp_allocations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trans_type_from` (`person_id`,`trans_type_from`,`trans_no_from`,`trans_type_to`,`trans_no_to`),
  ADD KEY `From` (`trans_type_from`,`trans_no_from`),
  ADD KEY `To` (`trans_type_to`,`trans_no_to`);

--
-- Indexes for table `0_supp_invoice_items`
--
ALTER TABLE `0_supp_invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Transaction` (`supp_trans_type`,`supp_trans_no`,`stock_id`);

--
-- Indexes for table `0_supp_trans`
--
ALTER TABLE `0_supp_trans`
  ADD PRIMARY KEY (`type`,`trans_no`,`supplier_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `tran_date` (`tran_date`);

--
-- Indexes for table `0_sys_prefs`
--
ALTER TABLE `0_sys_prefs`
  ADD PRIMARY KEY (`name`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `0_tags`
--
ALTER TABLE `0_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`type`,`name`);

--
-- Indexes for table `0_tag_associations`
--
ALTER TABLE `0_tag_associations`
  ADD PRIMARY KEY (`record_id`,`tag_id`);

--
-- Indexes for table `0_tax_groups`
--
ALTER TABLE `0_tax_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `0_tax_group_items`
--
ALTER TABLE `0_tax_group_items`
  ADD PRIMARY KEY (`tax_group_id`,`tax_type_id`);

--
-- Indexes for table `0_tax_types`
--
ALTER TABLE `0_tax_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0_trans_tax_details`
--
ALTER TABLE `0_trans_tax_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Type_and_Number` (`trans_type`,`trans_no`),
  ADD KEY `tran_date` (`tran_date`);

--
-- Indexes for table `0_useronline`
--
ALTER TABLE `0_useronline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timestamp` (`timestamp`),
  ADD KEY `ip` (`ip`);

--
-- Indexes for table `0_users`
--
ALTER TABLE `0_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `0_voided`
--
ALTER TABLE `0_voided`
  ADD UNIQUE KEY `id` (`type`,`id`);

--
-- Indexes for table `0_workcentres`
--
ALTER TABLE `0_workcentres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `0_workorders`
--
ALTER TABLE `0_workorders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wo_ref` (`wo_ref`);

--
-- Indexes for table `0_wo_costing`
--
ALTER TABLE `0_wo_costing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0_wo_issues`
--
ALTER TABLE `0_wo_issues`
  ADD PRIMARY KEY (`issue_no`),
  ADD KEY `workorder_id` (`workorder_id`);

--
-- Indexes for table `0_wo_issue_items`
--
ALTER TABLE `0_wo_issue_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0_wo_manufacture`
--
ALTER TABLE `0_wo_manufacture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workorder_id` (`workorder_id`);

--
-- Indexes for table `0_wo_requirements`
--
ALTER TABLE `0_wo_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workorder_id` (`workorder_id`);

--
-- Indexes for table `appointmentf`
--
ALTER TABLE `appointmentf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archivedemployees`
--
ALTER TABLE `archivedemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_diagnosis`
--
ALTER TABLE `auto_diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_transact`
--
ALTER TABLE `auto_transact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_transact_inv`
--
ALTER TABLE `auto_transact_inv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_transact_tmp`
--
ALTER TABLE `auto_transact_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_summary`
--
ALTER TABLE `collection_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_summary2`
--
ALTER TABLE `collection_summary2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyfile`
--
ALTER TABLE `companyfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companystructures`
--
ALTER TABLE `companystructures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_CompanyStructures_Own` (`parent`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `currencytypes`
--
ALTER TABLE `currencytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CurrencyTypes_code` (`code`);

--
-- Indexes for table `debtorsfile`
--
ALTER TABLE `debtorsfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseasefile`
--
ALTER TABLE `diseasefile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorsfile`
--
ALTER TABLE `doctorsfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtransf`
--
ALTER TABLE `dtransf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtransf2x`
--
ALTER TABLE `dtransf2x`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergencycontacts`
--
ALTER TABLE `emergencycontacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_EmergencyContacts_Employee` (`employee`);

--
-- Indexes for table `employeecertifications`
--
ALTER TABLE `employeecertifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee` (`employee`,`certification_id`),
  ADD KEY `Fk_EmployeeCertifications_Certifications` (`certification_id`);

--
-- Indexes for table `employeedependents`
--
ALTER TABLE `employeedependents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_EmployeeDependents_Employee` (`employee`);

--
-- Indexes for table `employeeeducations`
--
ALTER TABLE `employeeeducations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_EmployeeEducations_Educations` (`education_id`),
  ADD KEY `Fk_EmployeeEducations_Employee` (`employee`);

--
-- Indexes for table `employeelanguages`
--
ALTER TABLE `employeelanguages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee` (`employee`,`language_id`),
  ADD KEY `Fk_EmployeeLanguages_Languages` (`language_id`);

--
-- Indexes for table `employeeleavedays`
--
ALTER TABLE `employeeleavedays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_EmployeeLeaveDays_EmployeeLeaves` (`employee_leave`);

--
-- Indexes for table `employeeleavelog`
--
ALTER TABLE `employeeleavelog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_EmployeeLeaveLog_EmployeeLeaves` (`employee_leave`),
  ADD KEY `Fk_EmployeeLeaveLog_Users` (`user_id`);

--
-- Indexes for table `employeeleaves`
--
ALTER TABLE `employeeleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_EmployeeLeaves_Employee` (`employee`),
  ADD KEY `Fk_EmployeeLeaves_LeaveTypes` (`leave_type`),
  ADD KEY `Fk_EmployeeLeaves_LeavePeriods` (`leave_period`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD KEY `Fk_Employee_Nationality` (`nationality`),
  ADD KEY `Fk_Employee_JobTitle` (`job_title`),
  ADD KEY `Fk_Employee_EmploymentStatus` (`employment_status`),
  ADD KEY `Fk_Employee_Country` (`country`),
  ADD KEY `Fk_Employee_Province` (`province`),
  ADD KEY `Fk_Employee_Supervisor` (`supervisor`),
  ADD KEY `Fk_Employee_CompanyStructures` (`department`),
  ADD KEY `Fk_Employee_PayGrades` (`pay_grade`);

--
-- Indexes for table `employeeskills`
--
ALTER TABLE `employeeskills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee` (`employee`,`skill_id`),
  ADD KEY `Fk_EmployeeSkills_Skills` (`skill_id`);

--
-- Indexes for table `employmentstatus`
--
ALTER TABLE `employmentstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `filename` (`filename`);

--
-- Indexes for table `glaccountsf`
--
ALTER TABLE `glaccountsf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glaccounts_sub`
--
ALTER TABLE `glaccounts_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gltransf`
--
ALTER TABLE `gltransf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gl_bf`
--
ALTER TABLE `gl_bf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hdnotef`
--
ALTER TABLE `hdnotef`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `holidays_dateh_country` (`dateh`,`country`);

--
-- Indexes for table `htransf`
--
ALTER TABLE `htransf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobtitles`
--
ALTER TABLE `jobtitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journals_tmp`
--
ALTER TABLE `journals_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_walkin`
--
ALTER TABLE `lab_walkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavegroupemployees`
--
ALTER TABLE `leavegroupemployees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `LeaveGroupEmployees_employee` (`employee`),
  ADD KEY `Fk_LeaveGroupEmployees_LeaveGroups` (`leave_group`);

--
-- Indexes for table `leavegroups`
--
ALTER TABLE `leavegroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaveperiods`
--
ALTER TABLE `leaveperiods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaverules`
--
ALTER TABLE `leaverules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavetypes`
--
ALTER TABLE `leavetypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `lpo_trans`
--
ALTER TABLE `lpo_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicalfile`
--
ALTER TABLE `medicalfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newprescription`
--
ALTER TABLE `newprescription`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `next_lpo`
--
ALTER TABLE `next_lpo`
  ADD PRIMARY KEY (`next_lpo`);

--
-- Indexes for table `next_opdf`
--
ALTER TABLE `next_opdf`
  ADD PRIMARY KEY (`next_adm`);

--
-- Indexes for table `next_ovcf`
--
ALTER TABLE `next_ovcf`
  ADD PRIMARY KEY (`next_adm`);

--
-- Indexes for table `next_refile`
--
ALTER TABLE `next_refile`
  ADD PRIMARY KEY (`next_ref`);

--
-- Indexes for table `next_transfer`
--
ALTER TABLE `next_transfer`
  ADD PRIMARY KEY (`next_adm`);

--
-- Indexes for table `next_wkfile`
--
ALTER TABLE `next_wkfile`
  ADD PRIMARY KEY (`next_ref`);

--
-- Indexes for table `payfrequency`
--
ALTER TABLE `payfrequency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paygrades`
--
ALTER TABLE `paygrades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_PayGrades_CurrencyTypes` (`currency`);

--
-- Indexes for table `payment_petty_inv`
--
ALTER TABLE `payment_petty_inv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_petty_tmp`
--
ALTER TABLE `payment_petty_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_supplier_tmp`
--
ALTER TABLE `payment_supplier_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_datacash`
--
ALTER TABLE `pay_datacash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pha_walkin`
--
ALTER TABLE `pha_walkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postdated_invf`
--
ALTER TABLE `postdated_invf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Province_Country` (`country`);

--
-- Indexes for table `ranges`
--
ALTER TABLE `ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiptf`
--
ALTER TABLE `receiptf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenuef`
--
ALTER TABLE `revenuef`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockfile`
--
ALTER TABLE `stockfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockfile3`
--
ALTER TABLE `stockfile3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockfileop`
--
ALTER TABLE `stockfileop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockfile_bk`
--
ALTER TABLE `stockfile_bk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocklab`
--
ALTER TABLE `stocklab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockt2`
--
ALTER TABLE `stockt2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocktake`
--
ALTER TABLE `stocktake`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_adj`
--
ALTER TABLE `stock_adj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_adj2`
--
ALTER TABLE `stock_adj2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_adj3`
--
ALTER TABLE `stock_adj3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_grn_tmp`
--
ALTER TABLE `stock_grn_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_issc`
--
ALTER TABLE `stock_issc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_issp`
--
ALTER TABLE `stock_issp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_issp_long`
--
ALTER TABLE `stock_issp_long`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_lpo_tmp`
--
ALTER TABLE `stock_lpo_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_rq`
--
ALTER TABLE `stock_rq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_transfer`
--
ALTER TABLE `stock_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_transferx`
--
ALTER TABLE `stock_transferx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_butch_expiryf`
--
ALTER TABLE `st_butch_expiryf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_categoryf`
--
ALTER TABLE `st_categoryf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_locationf`
--
ALTER TABLE `st_locationf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_requestf`
--
ALTER TABLE `st_requestf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_trans`
--
ALTER TABLE `st_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliersfile`
--
ALTER TABLE `suppliersfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplierstrfile`
--
ALTER TABLE `supplierstrfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supportedlanguages`
--
ALTER TABLE `supportedlanguages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptomsf`
--
ALTER TABLE `symptomsf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemf2`
--
ALTER TABLE `systemf2`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `username` (`name`);

--
-- Indexes for table `systemfile2`
--
ALTER TABLE `systemfile2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemfile27`
--
ALTER TABLE `systemfile27`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transact_inv_postdated`
--
ALTER TABLE `transact_inv_postdated`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `Fk_User_Employee` (`employee`),
  ADD KEY `Fk_User_SupportedLanguages` (`lang`),
  ADD KEY `login_hash_index` (`login_hash`);

--
-- Indexes for table `workdays`
--
ALTER TABLE `workdays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `workdays_name_country` (`name`,`country`);

--
-- Indexes for table `xyz`
--
ALTER TABLE `xyz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xyz6`
--
ALTER TABLE `xyz6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1613983928`
--
ALTER TABLE `z1613983928`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1614146499`
--
ALTER TABLE `z1614146499`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1614146500`
--
ALTER TABLE `z1614146500`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1614146580`
--
ALTER TABLE `z1614146580`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1614146993`
--
ALTER TABLE `z1614146993`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1614146996`
--
ALTER TABLE `z1614146996`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1614147000`
--
ALTER TABLE `z1614147000`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1614147004`
--
ALTER TABLE `z1614147004`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1614521459`
--
ALTER TABLE `z1614521459`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1620920668`
--
ALTER TABLE `z1620920668`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1620921344`
--
ALTER TABLE `z1620921344`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1623766790`
--
ALTER TABLE `z1623766790`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1623766800`
--
ALTER TABLE `z1623766800`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1623766869`
--
ALTER TABLE `z1623766869`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1631442282`
--
ALTER TABLE `z1631442282`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1635412952`
--
ALTER TABLE `z1635412952`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1639720545`
--
ALTER TABLE `z1639720545`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z1677300956`
--
ALTER TABLE `z1677300956`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `0_areas`
--
ALTER TABLE `0_areas`
  MODIFY `area_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `0_attachments`
--
ALTER TABLE `0_attachments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `0_audit_trail`
--
ALTER TABLE `0_audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `0_bank_accounts`
--
ALTER TABLE `0_bank_accounts`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `0_bank_trans`
--
ALTER TABLE `0_bank_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `0_bom`
--
ALTER TABLE `0_bom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `0_budget_trans`
--
ALTER TABLE `0_budget_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `0_credit_status`
--
ALTER TABLE `0_credit_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `0_crm_categories`
--
ALTER TABLE `0_crm_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'pure technical key', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `0_crm_contacts`
--
ALTER TABLE `0_crm_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `0_crm_persons`
--
ALTER TABLE `0_crm_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `0_cust_allocations`
--
ALTER TABLE `0_cust_allocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `0_cust_branch`
--
ALTER TABLE `0_cust_branch`
  MODIFY `branch_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `0_debtors_master`
--
ALTER TABLE `0_debtors_master`
  MODIFY `debtor_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `0_debtor_trans_details`
--
ALTER TABLE `0_debtor_trans_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=869;
--
-- AUTO_INCREMENT for table `0_debtor_trans_no`
--
ALTER TABLE `0_debtor_trans_no`
  MODIFY `next_ref` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `0_dimensions`
--
ALTER TABLE `0_dimensions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `0_exchange_rates`
--
ALTER TABLE `0_exchange_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `0_fiscal_year`
--
ALTER TABLE `0_fiscal_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `0_gl_trans`
--
ALTER TABLE `0_gl_trans`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41350;
--
-- AUTO_INCREMENT for table `0_grn_batch`
--
ALTER TABLE `0_grn_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `0_grn_items`
--
ALTER TABLE `0_grn_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `0_groups`
--
ALTER TABLE `0_groups`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `0_item_codes`
--
ALTER TABLE `0_item_codes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;
--
-- AUTO_INCREMENT for table `0_item_tax_types`
--
ALTER TABLE `0_item_tax_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `0_payment_terms`
--
ALTER TABLE `0_payment_terms`
  MODIFY `terms_indicator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `0_prices`
--
ALTER TABLE `0_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `0_printers`
--
ALTER TABLE `0_printers`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `0_print_profiles`
--
ALTER TABLE `0_print_profiles`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `0_purch_orders`
--
ALTER TABLE `0_purch_orders`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `0_purch_order_details`
--
ALTER TABLE `0_purch_order_details`
  MODIFY `po_detail_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `0_quick_entries`
--
ALTER TABLE `0_quick_entries`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `0_quick_entry_lines`
--
ALTER TABLE `0_quick_entry_lines`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `0_recurrent_invoices`
--
ALTER TABLE `0_recurrent_invoices`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `0_reflines`
--
ALTER TABLE `0_reflines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `0_salesman`
--
ALTER TABLE `0_salesman`
  MODIFY `salesman_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `0_sales_order_details`
--
ALTER TABLE `0_sales_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `0_sales_pos`
--
ALTER TABLE `0_sales_pos`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `0_sales_types`
--
ALTER TABLE `0_sales_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `0_security_roles`
--
ALTER TABLE `0_security_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `0_shippers`
--
ALTER TABLE `0_shippers`
  MODIFY `shipper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `0_sql_trail`
--
ALTER TABLE `0_sql_trail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `0_stock_category`
--
ALTER TABLE `0_stock_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `0_stock_moves`
--
ALTER TABLE `0_stock_moves`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `0_suppliers`
--
ALTER TABLE `0_suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `0_supp_allocations`
--
ALTER TABLE `0_supp_allocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `0_supp_invoice_items`
--
ALTER TABLE `0_supp_invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `0_tags`
--
ALTER TABLE `0_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `0_tax_groups`
--
ALTER TABLE `0_tax_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `0_tax_types`
--
ALTER TABLE `0_tax_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `0_trans_tax_details`
--
ALTER TABLE `0_trans_tax_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `0_useronline`
--
ALTER TABLE `0_useronline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `0_users`
--
ALTER TABLE `0_users`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `0_workcentres`
--
ALTER TABLE `0_workcentres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `0_workorders`
--
ALTER TABLE `0_workorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `0_wo_costing`
--
ALTER TABLE `0_wo_costing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `0_wo_issues`
--
ALTER TABLE `0_wo_issues`
  MODIFY `issue_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `0_wo_issue_items`
--
ALTER TABLE `0_wo_issue_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `0_wo_manufacture`
--
ALTER TABLE `0_wo_manufacture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `0_wo_requirements`
--
ALTER TABLE `0_wo_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `appointmentf`
--
ALTER TABLE `appointmentf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5842;
--
-- AUTO_INCREMENT for table `archivedemployees`
--
ALTER TABLE `archivedemployees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auto_diagnosis`
--
ALTER TABLE `auto_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4286;
--
-- AUTO_INCREMENT for table `auto_transact`
--
ALTER TABLE `auto_transact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35406;
--
-- AUTO_INCREMENT for table `auto_transact_inv`
--
ALTER TABLE `auto_transact_inv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;
--
-- AUTO_INCREMENT for table `auto_transact_tmp`
--
ALTER TABLE `auto_transact_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18320;
--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collection_summary`
--
ALTER TABLE `collection_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collection_summary2`
--
ALTER TABLE `collection_summary2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `companyfile`
--
ALTER TABLE `companyfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companystructures`
--
ALTER TABLE `companystructures`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currencytypes`
--
ALTER TABLE `currencytypes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `debtorsfile`
--
ALTER TABLE `debtorsfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `diseasefile`
--
ALTER TABLE `diseasefile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;
--
-- AUTO_INCREMENT for table `doctorsfile`
--
ALTER TABLE `doctorsfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dtransf`
--
ALTER TABLE `dtransf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21747;
--
-- AUTO_INCREMENT for table `dtransf2x`
--
ALTER TABLE `dtransf2x`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emergencycontacts`
--
ALTER TABLE `emergencycontacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeecertifications`
--
ALTER TABLE `employeecertifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeedependents`
--
ALTER TABLE `employeedependents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeeeducations`
--
ALTER TABLE `employeeeducations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeelanguages`
--
ALTER TABLE `employeelanguages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeeleavedays`
--
ALTER TABLE `employeeleavedays`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeeleavelog`
--
ALTER TABLE `employeeleavelog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeeleaves`
--
ALTER TABLE `employeeleaves`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeeskills`
--
ALTER TABLE `employeeskills`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employmentstatus`
--
ALTER TABLE `employmentstatus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `glaccountsf`
--
ALTER TABLE `glaccountsf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `glaccounts_sub`
--
ALTER TABLE `glaccounts_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `gltransf`
--
ALTER TABLE `gltransf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101005;
--
-- AUTO_INCREMENT for table `gl_bf`
--
ALTER TABLE `gl_bf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `hdnotef`
--
ALTER TABLE `hdnotef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11640;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `htransf`
--
ALTER TABLE `htransf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42203;
--
-- AUTO_INCREMENT for table `jobtitles`
--
ALTER TABLE `jobtitles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journals_tmp`
--
ALTER TABLE `journals_tmp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table `lab_walkin`
--
ALTER TABLE `lab_walkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leavegroupemployees`
--
ALTER TABLE `leavegroupemployees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leavegroups`
--
ALTER TABLE `leavegroups`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leaveperiods`
--
ALTER TABLE `leaveperiods`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leaverules`
--
ALTER TABLE `leaverules`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leavetypes`
--
ALTER TABLE `leavetypes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lpo_trans`
--
ALTER TABLE `lpo_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;
--
-- AUTO_INCREMENT for table `medicalfile`
--
ALTER TABLE `medicalfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7130;
--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newprescription`
--
ALTER TABLE `newprescription`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6053;
--
-- AUTO_INCREMENT for table `next_lpo`
--
ALTER TABLE `next_lpo`
  MODIFY `next_lpo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `next_opdf`
--
ALTER TABLE `next_opdf`
  MODIFY `next_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12233;
--
-- AUTO_INCREMENT for table `next_ovcf`
--
ALTER TABLE `next_ovcf`
  MODIFY `next_adm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1218;
--
-- AUTO_INCREMENT for table `next_refile`
--
ALTER TABLE `next_refile`
  MODIFY `next_ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22266;
--
-- AUTO_INCREMENT for table `next_transfer`
--
ALTER TABLE `next_transfer`
  MODIFY `next_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `next_wkfile`
--
ALTER TABLE `next_wkfile`
  MODIFY `next_ref` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1277;
--
-- AUTO_INCREMENT for table `payfrequency`
--
ALTER TABLE `payfrequency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paygrades`
--
ALTER TABLE `paygrades`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_petty_inv`
--
ALTER TABLE `payment_petty_inv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_petty_tmp`
--
ALTER TABLE `payment_petty_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment_supplier_tmp`
--
ALTER TABLE `payment_supplier_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pay_datacash`
--
ALTER TABLE `pay_datacash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8226;
--
-- AUTO_INCREMENT for table `pha_walkin`
--
ALTER TABLE `pha_walkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `postdated_invf`
--
ALTER TABLE `postdated_invf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ranges`
--
ALTER TABLE `ranges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20216;
--
-- AUTO_INCREMENT for table `receiptf`
--
ALTER TABLE `receiptf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23826;
--
-- AUTO_INCREMENT for table `revenuef`
--
ALTER TABLE `revenuef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stockfile`
--
ALTER TABLE `stockfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1371;
--
-- AUTO_INCREMENT for table `supportedlanguages`
--
ALTER TABLE `supportedlanguages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workdays`
--
ALTER TABLE `workdays`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `companystructures`
--
ALTER TABLE `companystructures`
  ADD CONSTRAINT `Fk_CompanyStructures_Own` FOREIGN KEY (`parent`) REFERENCES `companystructures` (`id`);

--
-- Constraints for table `emergencycontacts`
--
ALTER TABLE `emergencycontacts`
  ADD CONSTRAINT `Fk_EmergencyContacts_Employee` FOREIGN KEY (`employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeecertifications`
--
ALTER TABLE `employeecertifications`
  ADD CONSTRAINT `Fk_EmployeeCertifications_Certifications` FOREIGN KEY (`certification_id`) REFERENCES `certifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_EmployeeCertifications_Employee` FOREIGN KEY (`employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeedependents`
--
ALTER TABLE `employeedependents`
  ADD CONSTRAINT `Fk_EmployeeDependents_Employee` FOREIGN KEY (`employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeeeducations`
--
ALTER TABLE `employeeeducations`
  ADD CONSTRAINT `Fk_EmployeeEducations_Educations` FOREIGN KEY (`education_id`) REFERENCES `educations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_EmployeeEducations_Employee` FOREIGN KEY (`employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeelanguages`
--
ALTER TABLE `employeelanguages`
  ADD CONSTRAINT `Fk_EmployeeLanguages_Employee` FOREIGN KEY (`employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_EmployeeLanguages_Languages` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeeleavedays`
--
ALTER TABLE `employeeleavedays`
  ADD CONSTRAINT `Fk_EmployeeLeaveDays_EmployeeLeaves` FOREIGN KEY (`employee_leave`) REFERENCES `employeeleaves` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeeleavelog`
--
ALTER TABLE `employeeleavelog`
  ADD CONSTRAINT `Fk_EmployeeLeaveLog_EmployeeLeaves` FOREIGN KEY (`employee_leave`) REFERENCES `employeeleaves` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_EmployeeLeaveLog_Users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `employeeleaves`
--
ALTER TABLE `employeeleaves`
  ADD CONSTRAINT `Fk_EmployeeLeaves_Employee` FOREIGN KEY (`employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_EmployeeLeaves_LeavePeriods` FOREIGN KEY (`leave_period`) REFERENCES `leaveperiods` (`id`),
  ADD CONSTRAINT `Fk_EmployeeLeaves_LeaveTypes` FOREIGN KEY (`leave_type`) REFERENCES `leavetypes` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `Fk_Employee_CompanyStructures` FOREIGN KEY (`department`) REFERENCES `companystructures` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_Employee_Country` FOREIGN KEY (`country`) REFERENCES `country` (`code`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_Employee_EmploymentStatus` FOREIGN KEY (`employment_status`) REFERENCES `employmentstatus` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_Employee_JobTitle` FOREIGN KEY (`job_title`) REFERENCES `jobtitles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_Employee_Nationality` FOREIGN KEY (`nationality`) REFERENCES `nationality` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_Employee_PayGrades` FOREIGN KEY (`pay_grade`) REFERENCES `paygrades` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_Employee_Province` FOREIGN KEY (`province`) REFERENCES `province` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_Employee_Supervisor` FOREIGN KEY (`supervisor`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `employeeskills`
--
ALTER TABLE `employeeskills`
  ADD CONSTRAINT `Fk_EmployeeSkills_Employee` FOREIGN KEY (`employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_EmployeeSkills_Skills` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leavegroupemployees`
--
ALTER TABLE `leavegroupemployees`
  ADD CONSTRAINT `Fk_LeaveGroupEmployees_Employee` FOREIGN KEY (`employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_LeaveGroupEmployees_LeaveGroups` FOREIGN KEY (`leave_group`) REFERENCES `leavegroups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paygrades`
--
ALTER TABLE `paygrades`
  ADD CONSTRAINT `Fk_PayGrades_CurrencyTypes` FOREIGN KEY (`currency`) REFERENCES `currencytypes` (`code`);

--
-- Constraints for table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `Fk_Province_Country` FOREIGN KEY (`country`) REFERENCES `country` (`code`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Fk_User_Employee` FOREIGN KEY (`employee`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_User_SupportedLanguages` FOREIGN KEY (`lang`) REFERENCES `supportedlanguages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
