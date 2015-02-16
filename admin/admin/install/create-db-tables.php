<?php
require_once('../config.php');
require_once('../../includes/database.class.php');

// Configure new database object
$db = new Database($db_host, $db_username, $db_password, $db_database, $db_table_prefix);
$db -> connect();

// If there was a problem connecting to the database display error information and exit script.
if(count($db -> errors) > 0)
{
	foreach($db -> errors as $error) echo $error . '<br />';
	echo '<br /><a href="index.php">Go Back</a>';
	exit();
}

// Create adaptive_accounts table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "adaptive_accounts` (
		  `first_name` varchar(75) collate utf8_bin default NULL,
		  `last_name` varchar(75) collate utf8_bin default NULL,
		  `verify_sign` varchar(255) collate utf8_bin default NULL,
		  `account_key` varchar(100) collate utf8_bin default NULL,
		  `confirmation_code` varchar(100) collate utf8_bin default NULL,
		  `id` int(11) NOT NULL auto_increment,
		  `charset` varchar(25) collate utf8_bin default NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create adaptive_payments table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "adaptive_payments` (
		  `id` int(11) NOT NULL auto_increment,
		  `transaction_type` varchar(100) collate utf8_bin default NULL,
		  `status` varchar(30) collate utf8_bin default NULL,
		  `sender_email` varchar(127) collate utf8_bin default NULL,
		  `action_type` varchar(50) collate utf8_bin default NULL,
		  `payment_request_date` varchar(50) collate utf8_bin default NULL,
		  `reverse_all_parallel_payments_on_error` tinyint(1) default NULL,
		  `return_url` varchar(0) collate utf8_bin default NULL,
		  `cancel_url` varchar(0) collate utf8_bin default NULL,
		  `ipn_notification_url` varchar(0) collate utf8_bin default NULL,
		  `pay_key` varchar(127) collate utf8_bin default NULL,
		  `memo` text collate utf8_bin,
		  `fees_payer` varchar(50) collate utf8_bin default NULL,
		  `tracking_id` varchar(127) collate utf8_bin default NULL,
		  `preapproval_key` varchar(127) collate utf8_bin default NULL,
		  `reason_code` varchar(50) collate utf8_bin default NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create adaptive_payments_preapproval_transactions table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "adaptive_payments_preapproval_transactions` (
		  `id` int(11) NOT NULL auto_increment,
		  `transaction_type` varchar(127) collate utf8_bin default NULL,
		  `preapproval_key` varchar(127) collate utf8_bin default NULL,
		  `approved` tinyint(1) default NULL,
		  `cancel_url` varchar(0) collate utf8_bin default NULL,
		  `current_number_of_payments` double default NULL,
		  `current_total_amount_of_all_payments` double default NULL,
		  `current_period_attempts` double default NULL,
		  `currency_code` varchar(5) collate utf8_bin default NULL,
		  `date_of_month` varchar(2) collate utf8_bin default NULL,
		  `day_of_week` varchar(25) collate utf8_bin default NULL,
		  `starting_date` varchar(25) collate utf8_bin default NULL,
		  `ending_date` varchar(25) collate utf8_bin default NULL,
		  `max_total_amount_of_all_payments` double default NULL,
		  `max_amount_per_payment` double default NULL,
		  `max_number_of_payments` double default NULL,
		  `payment_period` varchar(35) collate utf8_bin default NULL,
		  `pin_type` varchar(25) collate utf8_bin default NULL,
		  `sender_email` varchar(127) collate utf8_bin default NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create adaptive_payments_transactions table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "adaptive_payments_transactions` (
		  `id` int(11) NOT NULL auto_increment,
		  `adaptive_payment_id` int(11) default NULL,
		  `transaction_id` varchar(35) collate utf8_bin default NULL,
		  `status` varchar(50) collate utf8_bin default NULL,
		  `id_for_sender` varchar(50) collate utf8_bin default NULL,
		  `status_for_sender` varchar(50) collate utf8_bin default NULL,
		  `refund_amount` double default NULL,
		  `refund_account_charged` varchar(127) collate utf8_bin default NULL,
		  `receiver` varchar(127) collate utf8_bin default NULL,
		  `invoice_id` varchar(127) collate utf8_bin default NULL,
		  `amount` double default NULL,
		  `is_primary_receiver` tinyint(1) default NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create disputes table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "disputes` (
		  `id` int(10) NOT NULL auto_increment,
		  `raw_log_id` int(10) default NULL, 
		  `txn_id` varchar(25) collate utf8_bin default NULL,
		  `case_id` varchar(25) collate utf8_bin default NULL,
		  `case_type` varchar(25) collate utf8_bin default NULL,
		  `case_creation_date` varchar(100) collate utf8_bin default NULL,
		  `payment_date` varchar(100) collate utf8_bin default NULL,
		  `receipt_id` varchar(25) collate utf8_bin default NULL,
		  `verify_sign` varchar(255) collate utf8_bin default NULL,
		  `payer_email` varchar(127) collate utf8_bin default NULL,
		  `payer_id` varchar(20) collate utf8_bin default NULL,
		  `invoice` varchar(127) collate utf8_bin default NULL,
		  `reason_code` varchar(25) collate utf8_bin default NULL,
		  `custom` varchar(255) collate utf8_bin default NULL,
		  `notify_version` varchar(25) collate utf8_bin default NULL,
		  `creation_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
		  `ipn_status` varchar(25) collate utf8_bin default NULL,
		  `txn_type` varchar(50) collate utf8_bin default NULL,
		  `test_ipn` tinyint(1) default '0',
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create ipn_log table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "raw_log` (
		  `id` int(10) NOT NULL auto_increment,
		  `created_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
		  `ipn_data_serialized` text collate utf8_bin,
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create mass_payments table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "mass_payments` (
		  `id` int(10) NOT NULL auto_increment,
		  `raw_log_id` int(10) default NULL, 
		  `masspay_txn_id` varchar(25) collate utf8_bin default NULL,
		  `mc_currency` varchar(50) collate utf8_bin default NULL,
		  `mc_fee` double default NULL,
		  `mc_gross` double default NULL,
		  `receiver_email` varchar(127) collate utf8_bin default NULL,
		  `status` varchar(25) collate utf8_bin default NULL,
		  `unique_id` varchar(20) collate utf8_bin default NULL,
		  `creation_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
		  `ipn_status` varchar(25) collate utf8_bin default NULL,
		  `txn_type` varchar(50) collate utf8_bin default NULL,
		  `test_ipn` tinyint(1) default '0',
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create orders table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "orders` (
		  `id` int(10) unsigned NOT NULL auto_increment,
		  `raw_log_id` int(10) default NULL, 
		  `receiver_email` varchar(127) collate utf8_bin default NULL,
		  `payment_status` varchar(25) collate utf8_bin default NULL,
		  `pending_reason` varchar(25) collate utf8_bin default NULL,
		  `payment_date` varchar(100) collate utf8_bin default NULL,
		  `option_name1` varchar(64) collate utf8_bin default NULL,
		  `option_selection1` varchar(200) collate utf8_bin default NULL,
		  `option_name2` varchar(64) collate utf8_bin default NULL,
		  `option_selection2` varchar(200) collate utf8_bin default NULL,
		  `option_name3` varchar(64) collate utf8_bin default NULL,
		  `option_selection3` varchar(200) collate utf8_bin default NULL,
		  `option_name4` varchar(64) collate utf8_bin default NULL,
		  `option_selection4` varchar(200) collate utf8_bin default NULL,
		  `option_name5` varchar(64) collate utf8_bin default NULL,
		  `option_selection5` varchar(200) collate utf8_bin default NULL,
		  `option_name6` varchar(64) collate utf8_bin default NULL,
		  `option_selection6` varchar(200) collate utf8_bin default NULL,
		  `option_name7` varchar(64) collate utf8_bin default NULL,
		  `option_selection7` varchar(200) collate utf8_bin default NULL,
		  `option_name8` varchar(64) collate utf8_bin default NULL,
		  `option_selection8` varchar(200) collate utf8_bin default NULL,
		  `option_name9` varchar(64) collate utf8_bin default NULL,
		  `option_selection9` varchar(200) collate utf8_bin default NULL,
		  `memo` varchar(255) collate utf8_bin default NULL,
		  `shipping_method` varchar(100) collate utf8_bin default NULL,
		  `btn_id` varchar(50) collate utf8_bin default NULL,
		  `mc_gross` double default NULL,
		  `mc_fee` double default NULL, 
		  `mc_shipping` double default NULL, 
		  `mc_handling` double default NULL, 
		  `shipping_discount` double default NULL,
		  `insurance_amount` double default NULL,
		  `handling_amount` double default NULL, 
		  `shipping` double default NULL, 
		  `tax` double default NULL,
		  `mc_currency` varchar(10) collate utf8_bin default NULL,
		  `txn_id` varchar(25) collate utf8_bin default NULL,
		  `txn_type` varchar(25) collate utf8_bin default NULL,
		  `first_name` varchar(75) collate utf8_bin default NULL,
		  `last_name` varchar(75) collate utf8_bin default NULL,
		  `address_street` varchar(200) collate utf8_bin default NULL,
		  `address_city` varchar(50) collate utf8_bin default NULL,
		  `address_state` varchar(40) collate utf8_bin default NULL,
		  `address_zip` varchar(20) collate utf8_bin default NULL,
		  `address_country` varchar(64) collate utf8_bin default NULL,
		  `address_status` varchar(25) collate utf8_bin default NULL,
		  `payer_email` varchar(127) collate utf8_bin default NULL,
		  `payer_status` varchar(25) collate utf8_bin default NULL,
		  `payment_type` varchar(25) collate utf8_bin default NULL,
		  `notify_version` varchar(50) collate utf8_bin default NULL,
		  `verify_sign` varchar(255) collate utf8_bin default NULL,
		  `address_name` varchar(130) collate utf8_bin default NULL,
		  `transaction_subject` varchar(150) collate utf8_bin default NULL,
		  `protection_eligibility` varchar(50) collate utf8_bin default NULL,
		  `ipn_status` varchar(25) collate utf8_bin default NULL,
		  `subscr_id` varchar(25) collate utf8_bin default NULL,
		  `custom` varchar(255) collate utf8_bin default NULL,
		  `reason_code` varchar(25) collate utf8_bin default NULL,
		  `contact_phone` varchar(25) collate utf8_bin default NULL,
		  `item_name` varchar(127) collate utf8_bin default NULL,
		  `item_number` varchar(127) collate utf8_bin default NULL,
		  `invoice` varchar(127) collate utf8_bin default NULL,
		  `for_auction` tinyint(10) default NULL,
		  `auction_buyer_id` varchar(75) collate utf8_bin default NULL,
		  `auction_closing_date` varchar(100) collate utf8_bin default NULL,
		  `auction_multi_item` double default NULL,
		  `creation_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
		  `address_country_code` varchar(2) collate utf8_bin default NULL,
		  `payer_business_name` varchar(150) collate utf8_bin default NULL,
		  `receiver_id` varchar(15) collate utf8_bin default NULL,
		  `test_ipn` tinyint(1) default '0',
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create order_items table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "order_items` (
		  `id` int(10) NOT NULL auto_increment,
		  `raw_log_id` int(10) default NULL, 
		  `order_id` int(10) default NULL,
		  `refund_id` int(10) default NULL,
		  `subscr_id` varchar(25) collate utf8_bin default NULL,
		  `item_name` varchar(130) collate utf8_bin default NULL,
		  `item_number` varchar(130) collate utf8_bin default NULL,
		  `os0` varchar(200) collate utf8_bin default NULL,
		  `on0` varchar(75) collate utf8_bin default NULL,
		  `os1` varchar(200) collate utf8_bin default NULL,
		  `on1` varchar(75) collate utf8_bin default NULL, 
		  `os2` varchar(200) collate utf8_bin default NULL,
		  `on2` varchar(75) collate utf8_bin default NULL,
		  `os3` varchar(200) collate utf8_bin default NULL,
		  `on3` varchar(75) collate utf8_bin default NULL,
		  `os4` varchar(200) collate utf8_bin default NULL,
		  `on4` varchar(75) collate utf8_bin default NULL,
		  `os5` varchar(200) collate utf8_bin default NULL,
		  `on5` varchar(75) collate utf8_bin default NULL,
		  `os6` varchar(200) collate utf8_bin default NULL,
		  `on6` varchar(75) collate utf8_bin default NULL,
		  `os7` varchar(200) collate utf8_bin default NULL,
		  `on7` varchar(75) collate utf8_bin default NULL,
		  `os8` varchar(200) collate utf8_bin default NULL,
		  `on8` varchar(75) collate utf8_bin default NULL,
		  `btn_id` varchar(50) collate utf8_bin default NULL,
		  `quantity` double default NULL,
		  `custom` varchar(255) collate utf8_bin default NULL,
		  `mc_gross` double default NULL,
		  `mc_handling` double default NULL,
		  `mc_shipping` double default NULL,
		  `creation_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create recurring_payments table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "recurring_payments` (
		  `id` int(10) NOT NULL auto_increment,
		  `raw_log_id` int(10) default NULL, 
		  `mc_gross` double default NULL,
		  `protection_eligibility` varchar(50) collate utf8_bin default NULL,
		  `payment_date` varchar(100) collate utf8_bin default NULL,
		  `payment_status` varchar(25) collate utf8_bin default NULL,
		  `mc_fee` double default NULL,
		  `notify_version` varchar(25) collate utf8_bin default NULL,
		  `payer_status` varchar(25) collate utf8_bin default NULL,
		  `currency_code` varchar(10) collate utf8_bin default NULL,
		  `verify_sign` varchar(255) collate utf8_bin default NULL,
		  `amount` double default NULL,
		  `txn_id` varchar(25) collate utf8_bin default NULL,
		  `payment_type` varchar(25) collate utf8_bin default NULL,
		  `receiver_email` varchar(130) collate utf8_bin default NULL,
		  `receiver_id` varchar(15) collate utf8_bin default NULL,
		  `txn_type` varchar(100) collate utf8_bin default NULL,
		  `mc_currency` varchar(25) collate utf8_bin default NULL,
		  `residence_country` varchar(2) collate utf8_bin default NULL,
		  `receipt_id` varchar(50) collate utf8_bin default NULL,
		  `transaction_subject` varchar(150) collate utf8_bin default NULL,
		  `reason_code` varchar(25) collate utf8_bin default NULL,
		  `shipping` double default NULL,
		  `product_type` varchar(50) collate utf8_bin default NULL,
		  `time_created` varchar(100) collate utf8_bin default NULL,
		  `rp_invoice_id` varchar(127) collate utf8_bin default NULL,
		  `ipn_status` varchar(25) collate utf8_bin default NULL,
		  `creation_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
		  `recurring_payment_id` varchar(50) collate utf8_bin default NULL,
		  `test_ipn` tinyint(1) default '0',
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create recurring_payment_profiles table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "recurring_payment_profiles` (
		  `id` int(10) NOT NULL auto_increment,
		  `raw_log_id` int(10) default NULL, 
		  `payment_cycle` varchar(50) collate utf8_bin default NULL,
		  `txn_type` varchar(50) collate utf8_bin default NULL,
		  `last_name` varchar(75) collate utf8_bin default NULL,
		  `first_name` varchar(75) collate utf8_bin default NULL,
		  `next_payment_date` varchar(100) collate utf8_bin default NULL,
		  `residence_country` varchar(2) collate utf8_bin default NULL,
		  `initial_payment_amount` double default NULL,
		  `memo` varchar(255) collate utf8_bin default NULL,
		  `rp_invoice_id` varchar(127) collate utf8_bin default NULL,
		  `currency_code` varchar(10) collate utf8_bin default NULL,
		  `time_created` varchar(100) collate utf8_bin default NULL,
		  `verify_sign` varchar(255) collate utf8_bin default NULL,
		  `period_type` varchar(25) collate utf8_bin default NULL,
		  `payer_status` varchar(25) collate utf8_bin default NULL,
		  `payer_email` varchar(130) collate utf8_bin default NULL,
		  `receiver_email` varchar(130) collate utf8_bin default NULL,
		  `payer_id` varchar(20) collate utf8_bin default NULL,
		  `product_type` varchar(50) collate utf8_bin default NULL,
		  `payer_business_name` varchar(130) collate utf8_bin default NULL,
		  `shipping` double default NULL,
		  `amount_per_cycle` double default NULL,
		  `profile_status` varchar(25) collate utf8_bin default NULL,
		  `notify_version` varchar(25) collate utf8_bin default NULL,
		  `amount` double default NULL,
		  `outstanding_balance` double default NULL,
		  `recurring_payment_id` varchar(50) collate utf8_bin default NULL,
		  `product_name` varchar(130) collate utf8_bin default NULL,
		  `ipn_status` varchar(25) collate utf8_bin default NULL,
		  `creation_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
		  `test_ipn` tinyint(1) default '0',
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create subscriptions table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "subscriptions` (
		  `id` int(10) NOT NULL auto_increment,
		  `raw_log_id` int(10) default NULL, 
		  `custom` varchar(255) collate utf8_bin default NULL,
		  `subscr_id` varchar(25) collate utf8_bin default NULL,
		  `subscr_date` varchar(100) collate utf8_bin default NULL,
		  `subscr_effective` varchar(100) collate utf8_bin default NULL,
		  `btn_id` varchar(50) collate utf8_bin default NULL,
		  `period1` varchar(50) collate utf8_bin default NULL,
		  `period2` varchar(50) collate utf8_bin default NULL,
		  `period3` varchar(50) collate utf8_bin default NULL,
		  `amount1` double default NULL,
		  `amount2` double default NULL,
		  `amount3` double default NULL,
		  `mc_amount1` double default NULL,
		  `mc_amount2` double default NULL,
		  `mc_amount3` double default NULL,
		  `memo` varchar(255) collate utf8_bin default NULL,
		  `recurring` varchar(10) collate utf8_bin default NULL,
		  `reattempt` varchar(10) collate utf8_bin default NULL,
		  `retry_at` varchar(100) collate utf8_bin default NULL,
		  `recur_times` varchar(25) collate utf8_bin default NULL,
		  `username` varchar(70) collate utf8_bin default NULL,
		  `password` varchar(30) collate utf8_bin default NULL,
		  `txn_id` varchar(25) collate utf8_bin default NULL,
		  `payer_email` varchar(130) collate utf8_bin default NULL,
		  `residence_country` varchar(2) collate utf8_bin default NULL,
		  `mc_currency` varchar(10) collate utf8_bin default NULL,
		  `verify_sign` varchar(255) collate utf8_bin default NULL,
		  `payer_status` varchar(25) collate utf8_bin default NULL,
		  `first_name` varchar(75) collate utf8_bin default NULL,
		  `last_name` varchar(75) collate utf8_bin default NULL,
		  `receiver_email` varchar(130) collate utf8_bin default NULL,
		  `payer_id` varchar(15) collate utf8_bin default NULL,
		  `notify_version` varchar(25) collate utf8_bin default NULL,
		  `item_name` varchar(130) collate utf8_bin default NULL,
		  `item_number` varchar(130) collate utf8_bin default NULL,
		  `ipn_status` varchar(25) collate utf8_bin default NULL,
		  `creation_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
		  `txn_type` varchar(50) collate utf8_bin default NULL,
		  `test_ipn` tinyint(1) default '0',
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create subscription_payments table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "subscription_payments` (
		  `id` int(10) NOT NULL auto_increment,
		  `raw_log_id` int(10) default NULL, 
		  `first_name` varchar(75) collate utf8_bin default NULL,
		  `last_name` varchar(75) collate utf8_bin default NULL,
		  `payer_email` varchar(130) collate utf8_bin default NULL,
		  `memo` text collate utf8_bin,
		  `item_name` varchar(130) collate utf8_bin default NULL,
		  `item_number` varchar(130) collate utf8_bin default NULL,
		  `os0` varchar(200) collate utf8_bin default NULL,
		  `on0` varchar(65) collate utf8_bin default NULL,
		  `os1` varchar(200) collate utf8_bin default NULL,
		  `on1` varchar(65) collate utf8_bin default NULL,
		  `quantity` double default NULL,
		  `payment_date` varchar(100) collate utf8_bin default NULL,
		  `payment_type` varchar(25) collate utf8_bin default NULL,
		  `txn_id` varchar(25) collate utf8_bin default NULL,
		  `mc_gross` double default NULL,
		  `mc_fee` double default NULL,
		  `payment_status` varchar(25) collate utf8_bin default NULL,
		  `pending_reason` varchar(25) collate utf8_bin default NULL,
		  `txn_type` varchar(30) collate utf8_bin default NULL,
		  `tax` double default NULL,
		  `mc_currency` varchar(25) collate utf8_bin default NULL,
		  `reason_code` varchar(25) collate utf8_bin default NULL,
		  `custom` varchar(255) collate utf8_bin default NULL,
		  `address_country` varchar(50) collate utf8_bin default NULL,
		  `subscr_id` varchar(25) collate utf8_bin default NULL,
		  `payer_status` varchar(25) collate utf8_bin default NULL,
		  `ipn_status` varchar(25) collate utf8_bin default NULL,
		  `creation_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
		  `test_ipn` tinyint(1) default '0',
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Create refunds table
$sql = "CREATE TABLE IF NOT EXISTS `" . $db_table_prefix . "refunds` (
		  `id` int(10) NOT NULL auto_increment,
		  `raw_log_id` int(10) default NULL, 
		  `ipn_status` varchar(25) collate utf8_bin default NULL,
		  `mc_gross` double default NULL,
		  `invoice` varchar(130) collate utf8_bin default NULL,
		  `protection_eligibility` varchar(50) collate utf8_bin default NULL,
		  `payer_id` varchar(15) collate utf8_bin default NULL,
		  `address_street` varchar(200) collate utf8_bin default NULL,
		  `payment_date` varchar(100) collate utf8_bin default NULL,
		  `payment_status` varchar(25) collate utf8_bin default NULL,
		  `charset` varchar(25) collate utf8_bin default NULL,
		  `address_zip` varchar(20) collate utf8_bin default NULL,
		  `mc_shipping` double default NULL,
		  `mc_handling` double default NULL, 
		  `shipping` double default NULL, 
		  `first_name` varchar(75) collate utf8_bin default NULL,
		  `memo` text collate utf8_bin,
		  `last_name` varchar(75) collate utf8_bin default NULL,
		  `product_name` varchar(255) collate utf8_bin default NULL,
		  `mc_fee` double default NULL,
		  `address_country_code` varchar(2) collate utf8_bin default NULL,
		  `address_name` varchar(130) collate utf8_bin default NULL,
		  `notify_version` varchar(25) collate utf8_bin default NULL,
		  `reason_code` varchar(25) collate utf8_bin default NULL,
		  `custom` varchar(255) collate utf8_bin default NULL,
		  `address_country` varchar(64) collate utf8_bin default NULL,
		  `address_city` varchar(50) collate utf8_bin default NULL,
		  `verify_sign` varchar(255) collate utf8_bin default NULL,
		  `payer_email` varchar(130) collate utf8_bin default NULL,
		  `parent_txn_id` varchar(25) collate utf8_bin default NULL,
		  `contact_phone` varchar(25) collate utf8_bin default NULL,
		  `time_created` varchar(100) collate utf8_bin default NULL,
		  `txn_id` varchar(25) collate utf8_bin default NULL,
		  `payment_type` varchar(25) collate utf8_bin default NULL,
		  `payer_business_name` varchar(150) collate utf8_bin default NULL,
		  `address_state` varchar(40) collate utf8_bin default NULL,
		  `receiver_email` varchar(130) collate utf8_bin default NULL,
		  `receiver_id` varchar(15) collate utf8_bin default NULL,
		  `mc_currency` varchar(10) collate utf8_bin default NULL,
		  `residence_country` varchar(2) collate utf8_bin default NULL,
		  `test_ipn` tinyint(1) default '0',
		  `transaction_subject` varchar(150) collate utf8_bin default NULL,
		  `rp_invoice_id` varchar(130) collate utf8_bin default NULL,
		  `recurring_payment_id` varchar(50) collate utf8_bin default NULL,
		  `creation_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1";

$db -> query($sql);

// Check for errors
if(count($db -> errors) > 0)
{
	foreach($db -> errors as $error) echo $error . '<br />';
	exit();
}
else
{
	echo 'Database tables created successfully.';
	echo '<br /><a href="index.php?tables_created=1">Continue</a>';
	header('Location: index.php?tables_created=1');
}

$db -> close();
?>