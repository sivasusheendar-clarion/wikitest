/*
SQLyog Community Edition- MySQL GUI v8.05 
MySQL - 5.5.27 : Database - clarioncb_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

USE `clarioncb_db`;

/*Table structure for table `fi_client_custom` */

DROP TABLE IF EXISTS `fi_client_custom`;

CREATE TABLE `fi_client_custom` (
  `client_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`client_custom_id`),
  KEY `client_id` (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fi_client_custom` */

/*Table structure for table `fi_client_notes` */

DROP TABLE IF EXISTS `fi_client_notes`;

CREATE TABLE `fi_client_notes` (
  `client_note_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `client_note_date` date NOT NULL,
  `client_note` longtext NOT NULL,
  PRIMARY KEY (`client_note_id`),
  KEY `client_id` (`client_id`,`client_note_date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fi_client_notes` */

/*Table structure for table `fi_clients` */

DROP TABLE IF EXISTS `fi_clients`;

CREATE TABLE `fi_clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_date_created` datetime NOT NULL,
  `client_date_modified` datetime NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_address_1` varchar(100) DEFAULT '',
  `client_address_2` varchar(100) DEFAULT '',
  `client_city` varchar(45) DEFAULT '',
  `client_state` varchar(35) DEFAULT '',
  `client_zip` varchar(15) DEFAULT '',
  `client_country` varchar(35) DEFAULT '',
  `client_phone` varchar(20) DEFAULT '',
  `client_fax` varchar(20) DEFAULT '',
  `client_mobile` varchar(20) DEFAULT '',
  `client_email` varchar(100) DEFAULT '',
  `client_web` varchar(100) DEFAULT '',
  `client_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`client_id`),
  KEY `client_active` (`client_active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_clients` */

/*Table structure for table `fi_custom_fields` */

DROP TABLE IF EXISTS `fi_custom_fields`;

CREATE TABLE `fi_custom_fields` (
  `custom_field_id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_field_table` varchar(35) NOT NULL,
  `custom_field_label` varchar(64) NOT NULL,
  `custom_field_column` varchar(64) NOT NULL,
  PRIMARY KEY (`custom_field_id`),
  KEY `custom_field_table` (`custom_field_table`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fi_custom_fields` */

/*Table structure for table `fi_email_templates` */

DROP TABLE IF EXISTS `fi_email_templates`;

CREATE TABLE `fi_email_templates` (
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_template_title` varchar(255) NOT NULL,
  `email_template_body` longtext NOT NULL,
  PRIMARY KEY (`email_template_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fi_email_templates` */

/*Table structure for table `fi_import_details` */

DROP TABLE IF EXISTS `fi_import_details`;

CREATE TABLE `fi_import_details` (
  `import_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `import_id` int(11) NOT NULL,
  `import_lang_key` varchar(35) NOT NULL,
  `import_table_name` varchar(35) NOT NULL,
  `import_record_id` int(11) NOT NULL,
  PRIMARY KEY (`import_detail_id`),
  KEY `import_id` (`import_id`,`import_record_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_import_details` */

/*Table structure for table `fi_imports` */

DROP TABLE IF EXISTS `fi_imports`;

CREATE TABLE `fi_imports` (
  `import_id` int(11) NOT NULL AUTO_INCREMENT,
  `import_date` datetime NOT NULL,
  PRIMARY KEY (`import_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_imports` */

/*Table structure for table `fi_invoice_amounts` */

DROP TABLE IF EXISTS `fi_invoice_amounts`;

CREATE TABLE `fi_invoice_amounts` (
  `invoice_amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `invoice_item_subtotal` decimal(10,2) DEFAULT '0.00',
  `invoice_item_tax_total` decimal(10,2) DEFAULT '0.00',
  `invoice_tax_total` decimal(10,2) DEFAULT '0.00',
  `invoice_total` decimal(10,2) DEFAULT '0.00',
  `invoice_paid` decimal(10,2) DEFAULT '0.00',
  `invoice_balance` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`invoice_amount_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `invoice_paid` (`invoice_paid`,`invoice_balance`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_invoice_amounts` */

/*Table structure for table `fi_invoice_custom` */

DROP TABLE IF EXISTS `fi_invoice_custom`;

CREATE TABLE `fi_invoice_custom` (
  `invoice_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_custom_id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fi_invoice_custom` */

/*Table structure for table `fi_invoice_groups` */

DROP TABLE IF EXISTS `fi_invoice_groups`;

CREATE TABLE `fi_invoice_groups` (
  `invoice_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_group_name` varchar(50) NOT NULL DEFAULT '',
  `invoice_group_prefix` varchar(10) NOT NULL DEFAULT '',
  `invoice_group_next_id` int(11) NOT NULL,
  `invoice_group_left_pad` int(2) NOT NULL DEFAULT '0',
  `invoice_group_prefix_year` int(1) NOT NULL DEFAULT '0',
  `invoice_group_prefix_month` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`invoice_group_id`),
  KEY `invoice_group_next_id` (`invoice_group_next_id`),
  KEY `invoice_group_left_pad` (`invoice_group_left_pad`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `fi_invoice_groups` */

insert  into `fi_invoice_groups`(`invoice_group_id`,`invoice_group_name`,`invoice_group_prefix`,`invoice_group_next_id`,`invoice_group_left_pad`,`invoice_group_prefix_year`,`invoice_group_prefix_month`) values (1,'Invoice Default','',1,0,0,0),(2,'Quote Default','QUO',1,0,0,0);

/*Table structure for table `fi_invoice_item_amounts` */

DROP TABLE IF EXISTS `fi_invoice_item_amounts`;

CREATE TABLE `fi_invoice_item_amounts` (
  `item_amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_subtotal` decimal(10,2) NOT NULL,
  `item_tax_total` decimal(10,2) NOT NULL,
  `item_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_amount_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_invoice_item_amounts` */

/*Table structure for table `fi_invoice_items` */

DROP TABLE IF EXISTS `fi_invoice_items`;

CREATE TABLE `fi_invoice_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `item_tax_rate_id` int(11) NOT NULL DEFAULT '0',
  `item_date_added` date NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_description` longtext NOT NULL,
  `item_quantity` decimal(10,2) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_order` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`),
  KEY `invoice_id` (`invoice_id`,`item_tax_rate_id`,`item_date_added`,`item_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_invoice_items` */

/*Table structure for table `fi_invoice_tax_rates` */

DROP TABLE IF EXISTS `fi_invoice_tax_rates`;

CREATE TABLE `fi_invoice_tax_rates` (
  `invoice_tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `tax_rate_id` int(11) NOT NULL,
  `include_item_tax` int(1) NOT NULL DEFAULT '0',
  `invoice_tax_rate_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`invoice_tax_rate_id`),
  KEY `invoice_id` (`invoice_id`,`tax_rate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fi_invoice_tax_rates` */

/*Table structure for table `fi_invoices` */

DROP TABLE IF EXISTS `fi_invoices`;

CREATE TABLE `fi_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_group_id` int(11) NOT NULL,
  `invoice_date_created` date NOT NULL,
  `invoice_date_modified` datetime NOT NULL,
  `invoice_date_due` date NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `invoice_terms` longtext NOT NULL,
  `invoice_url_key` char(32) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  UNIQUE KEY `invoice_url_key` (`invoice_url_key`),
  KEY `user_id` (`user_id`,`client_id`,`invoice_group_id`,`invoice_date_created`,`invoice_date_due`,`invoice_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_invoices` */

/*Table structure for table `fi_invoices_recurring` */

DROP TABLE IF EXISTS `fi_invoices_recurring`;

CREATE TABLE `fi_invoices_recurring` (
  `invoice_recurring_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `recur_start_date` date NOT NULL,
  `recur_end_date` date NOT NULL,
  `recur_frequency` char(2) NOT NULL,
  `recur_next_date` date NOT NULL,
  PRIMARY KEY (`invoice_recurring_id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_invoices_recurring` */

/*Table structure for table `fi_merchant_responses` */

DROP TABLE IF EXISTS `fi_merchant_responses`;

CREATE TABLE `fi_merchant_responses` (
  `merchant_response_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `merchant_response_date` date NOT NULL,
  `merchant_response_driver` varchar(35) NOT NULL,
  `merchant_response` varchar(255) NOT NULL,
  `merchant_response_reference` varchar(255) NOT NULL,
  PRIMARY KEY (`merchant_response_id`),
  KEY `merchant_response_date` (`merchant_response_date`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_merchant_responses` */

/*Table structure for table `fi_payment_custom` */

DROP TABLE IF EXISTS `fi_payment_custom`;

CREATE TABLE `fi_payment_custom` (
  `payment_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  PRIMARY KEY (`payment_custom_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fi_payment_custom` */

/*Table structure for table `fi_payment_methods` */

DROP TABLE IF EXISTS `fi_payment_methods`;

CREATE TABLE `fi_payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method_name` varchar(35) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_payment_methods` */

/*Table structure for table `fi_payments` */

DROP TABLE IF EXISTS `fi_payments`;

CREATE TABLE `fi_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL DEFAULT '0',
  `payment_date` date NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `payment_note` longtext NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `payment_method_id` (`payment_method_id`),
  KEY `payment_amount` (`payment_amount`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_payments` */

/*Table structure for table `fi_quote_amounts` */

DROP TABLE IF EXISTS `fi_quote_amounts`;

CREATE TABLE `fi_quote_amounts` (
  `quote_amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `quote_item_subtotal` decimal(10,2) NOT NULL,
  `quote_item_tax_total` decimal(10,2) NOT NULL,
  `quote_tax_total` decimal(10,2) NOT NULL,
  `quote_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`quote_amount_id`),
  KEY `quote_id` (`quote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_quote_amounts` */

/*Table structure for table `fi_quote_custom` */

DROP TABLE IF EXISTS `fi_quote_custom`;

CREATE TABLE `fi_quote_custom` (
  `quote_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  PRIMARY KEY (`quote_custom_id`),
  KEY `quote_id` (`quote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fi_quote_custom` */

/*Table structure for table `fi_quote_item_amounts` */

DROP TABLE IF EXISTS `fi_quote_item_amounts`;

CREATE TABLE `fi_quote_item_amounts` (
  `item_amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_subtotal` decimal(10,2) NOT NULL,
  `item_tax_total` decimal(10,2) NOT NULL,
  `item_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_amount_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_quote_item_amounts` */

/*Table structure for table `fi_quote_items` */

DROP TABLE IF EXISTS `fi_quote_items`;

CREATE TABLE `fi_quote_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `item_tax_rate_id` int(11) NOT NULL,
  `item_date_added` date NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_description` longtext NOT NULL,
  `item_quantity` decimal(10,2) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_order` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`),
  KEY `quote_id` (`quote_id`,`item_date_added`,`item_order`),
  KEY `item_tax_rate_id` (`item_tax_rate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_quote_items` */

/*Table structure for table `fi_quote_tax_rates` */

DROP TABLE IF EXISTS `fi_quote_tax_rates`;

CREATE TABLE `fi_quote_tax_rates` (
  `quote_tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `tax_rate_id` int(11) NOT NULL,
  `include_item_tax` int(1) NOT NULL DEFAULT '0',
  `quote_tax_rate_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`quote_tax_rate_id`),
  KEY `quote_id` (`quote_id`),
  KEY `tax_rate_id` (`tax_rate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_quote_tax_rates` */

/*Table structure for table `fi_quotes` */

DROP TABLE IF EXISTS `fi_quotes`;

CREATE TABLE `fi_quotes` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_group_id` int(11) NOT NULL,
  `quote_date_created` date NOT NULL,
  `quote_date_modified` datetime NOT NULL,
  `quote_date_expires` date NOT NULL,
  `quote_number` varchar(20) NOT NULL,
  `quote_url_key` char(32) NOT NULL,
  PRIMARY KEY (`quote_id`),
  KEY `user_id` (`user_id`,`client_id`,`invoice_group_id`,`quote_date_created`,`quote_date_expires`,`quote_number`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_quotes` */

/*Table structure for table `fi_settings` */

DROP TABLE IF EXISTS `fi_settings`;

CREATE TABLE `fi_settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` longtext NOT NULL,
  PRIMARY KEY (`setting_id`),
  KEY `setting_key` (`setting_key`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `fi_settings` */

insert  into `fi_settings`(`setting_id`,`setting_key`,`setting_value`) values (1,'default_language','english'),(2,'date_format','m/d/Y'),(3,'currency_symbol','$'),(4,'currency_symbol_placement','before'),(5,'invoices_due_after','30'),(6,'quotes_expire_after','15'),(7,'default_invoice_group','1'),(8,'default_quote_group','2'),(9,'default_invoice_template','default_invoice'),(10,'default_quote_template','default_quote'),(11,'thousands_separator',','),(12,'decimal_point','.'),(13,'cron_key','NPgVhcCrwCqnk71F'),(14,'tax_rate_decimal_places','2');

/*Table structure for table `fi_tax_rates` */

DROP TABLE IF EXISTS `fi_tax_rates`;

CREATE TABLE `fi_tax_rates` (
  `tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_rate_name` varchar(25) NOT NULL,
  `tax_rate_percent` decimal(5,2) NOT NULL,
  PRIMARY KEY (`tax_rate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_tax_rates` */

/*Table structure for table `fi_user_clients` */

DROP TABLE IF EXISTS `fi_user_clients`;

CREATE TABLE `fi_user_clients` (
  `user_client_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`user_client_id`),
  KEY `user_id` (`user_id`,`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fi_user_clients` */

/*Table structure for table `fi_user_custom` */

DROP TABLE IF EXISTS `fi_user_custom`;

CREATE TABLE `fi_user_custom` (
  `user_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_custom_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fi_user_custom` */

/*Table structure for table `fi_users` */

DROP TABLE IF EXISTS `fi_users`;

CREATE TABLE `fi_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(1) NOT NULL DEFAULT '0',
  `user_date_created` datetime NOT NULL,
  `user_date_modified` datetime NOT NULL,
  `user_name` varchar(100) DEFAULT '',
  `user_company` varchar(100) DEFAULT '',
  `user_address_1` varchar(100) DEFAULT '',
  `user_address_2` varchar(100) DEFAULT '',
  `user_city` varchar(45) DEFAULT '',
  `user_state` varchar(35) DEFAULT '',
  `user_zip` varchar(15) DEFAULT '',
  `user_country` varchar(35) DEFAULT '',
  `user_phone` varchar(20) DEFAULT '',
  `user_fax` varchar(20) DEFAULT '',
  `user_mobile` varchar(20) DEFAULT '',
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_web` varchar(100) DEFAULT '',
  `user_psalt` char(22) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fi_users` */

/*Table structure for table `fi_versions` */

DROP TABLE IF EXISTS `fi_versions`;

CREATE TABLE `fi_versions` (
  `version_id` int(11) NOT NULL AUTO_INCREMENT,
  `version_date_applied` varchar(14) NOT NULL,
  `version_file` varchar(45) NOT NULL,
  `version_sql_errors` int(2) NOT NULL,
  PRIMARY KEY (`version_id`),
  KEY `version_date_applied` (`version_date_applied`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `fi_versions` */

insert  into `fi_versions`(`version_id`,`version_date_applied`,`version_file`,`version_sql_errors`) values (1,'1375079835','000_1.0.sql',0),(2,'1375079837','001_1.0.1.sql',0),(3,'1375079837','002_1.0.2.sql',0),(4,'1375079837','003_1.0.3.sql',0),(5,'1375079837','004_1.0.4.sql',0),(6,'1375079837','005_1.0.5.sql',0),(7,'1375079838','006_1.0.6.sql',0),(8,'1375079838','007_1.0.7.sql',0),(9,'1375079838','008_1.0.8.sql',0),(10,'1375079838','009_1.0.9.sql',0),(11,'1375079838','010_1.1.0.sql',0),(12,'1375079838','011_1.1.1.sql',0),(13,'1375079838','012_1.1.2.sql',0),(14,'1375079838','013_1.1.3.sql',0),(15,'1375079838','014_1.1.4.sql',0),(16,'1375079839','015_1.1.5.sql',0),(17,'1375079839','016_1.1.6.sql',0),(18,'1375079839','017_1.1.7.sql',0),(19,'1375079839','018_1.1.8.sql',0),(20,'1375079839','019_1.1.9.sql',0),(21,'1375079839','020_1.2.0.sql',0),(22,'1375079839','021_1.2.1.sql',0),(23,'1375079839','022_1.2.2.sql',0),(24,'1375079840','023_1.2.3.sql',0),(25,'1375079840','024_1.2.4.sql',0),(26,'1375079840','025_1.2.5.sql',0),(27,'1375079840','026_1.2.6.sql',0),(28,'1375079840','027_1.2.7.sql',0),(29,'1375079840','028_1.2.8.sql',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
