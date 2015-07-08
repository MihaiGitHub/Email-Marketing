-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: msmarandache.com.mysql:3306
-- Generation Time: Jul 08, 2015 at 05:28 AM
-- Server version: 5.5.42-MariaDB-1~wheezy
-- PHP Version: 5.4.36-0+deb7u3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `msmarandache_co`
--
CREATE DATABASE `msmarandache_co` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `msmarandache_co`;

-- --------------------------------------------------------

--
-- Table structure for table `adaptive_accounts`
--

CREATE TABLE IF NOT EXISTS `adaptive_accounts` (
  `first_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `verify_sign` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `account_key` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `confirmation_code` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `charset` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adaptive_payments`
--

CREATE TABLE IF NOT EXISTS `adaptive_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `sender_email` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `action_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `payment_request_date` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `reverse_all_parallel_payments_on_error` tinyint(1) DEFAULT NULL,
  `return_url` varchar(0) COLLATE utf8_bin DEFAULT NULL,
  `cancel_url` varchar(0) COLLATE utf8_bin DEFAULT NULL,
  `ipn_notification_url` varchar(0) COLLATE utf8_bin DEFAULT NULL,
  `pay_key` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `memo` text COLLATE utf8_bin,
  `fees_payer` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tracking_id` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `preapproval_key` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `reason_code` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adaptive_payments_preapproval_transactions`
--

CREATE TABLE IF NOT EXISTS `adaptive_payments_preapproval_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `preapproval_key` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `cancel_url` varchar(0) COLLATE utf8_bin DEFAULT NULL,
  `current_number_of_payments` double DEFAULT NULL,
  `current_total_amount_of_all_payments` double DEFAULT NULL,
  `current_period_attempts` double DEFAULT NULL,
  `currency_code` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `date_of_month` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `day_of_week` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `starting_date` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `ending_date` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `max_total_amount_of_all_payments` double DEFAULT NULL,
  `max_amount_per_payment` double DEFAULT NULL,
  `max_number_of_payments` double DEFAULT NULL,
  `payment_period` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `pin_type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `sender_email` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adaptive_payments_transactions`
--

CREATE TABLE IF NOT EXISTS `adaptive_payments_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adaptive_payment_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `id_for_sender` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `status_for_sender` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `refund_amount` double DEFAULT NULL,
  `refund_account_charged` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `receiver` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `invoice_id` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `is_primary_receiver` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_emails`
--

CREATE TABLE IF NOT EXISTS `campaign_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sent` int(11) NOT NULL DEFAULT '0',
  `opened` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2784 ;

--
-- Dumping data for table `campaign_emails`
--

INSERT INTO `campaign_emails` (`id`, `c_id`, `email`, `sent`, `opened`) VALUES
(2772, 'C5596ccc97b0cf4.11671794', 'mihai6744@hotmail.com', 1, 6),
(2773, 'C5596ccc97b0cf4.11671794', 'travelin.man2015@gmail.com', 1, 2),
(2774, 'C5596ccc97b0cf4.11671794', 'xelot00007@yahoo.com', 1, 2),
(2775, 'C5596f9b23b9ca9.67240989', 'mihai6744@hotmail.com', 1, 17),
(2776, 'C5596f9b23b9ca9.67240989', 'travelin.man2015@gmail.com', 1, 14),
(2777, 'C5596f9b23b9ca9.67240989', 'xelot00007@yahoo.com', 1, 6),
(2778, 'C55974d68b0c3f7.89580542', 'mihai6744@hotmail.com', 1, 1),
(2779, 'C55974d68b0c3f7.89580542', 'travelin.man2015@gmail.com', 1, 0),
(2780, 'C55974d68b0c3f7.89580542', 'xelot00007@yahoo.com', 1, 0),
(2781, 'C55974de27d8e38.81511640', 'mihai6744@hotmail.com', 1, 0),
(2782, 'C55974de27d8e38.81511640', 'travelin.man2015@gmail.com', 1, 0),
(2783, 'C55974de27d8e38.81511640', 'xelot00007@yahoo.com', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `campaign_emails_detail`
--

CREATE TABLE IF NOT EXISTS `campaign_emails_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ce_id` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `os` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opened` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=156 ;

--
-- Dumping data for table `campaign_emails_detail`
--

INSERT INTO `campaign_emails_detail` (`id`, `c_id`, `ce_id`, `ip`, `country`, `region`, `city`, `browser`, `os`, `opened`) VALUES
(108, 'C5596ccc97b0cf4.11671794', 2773, '66.249.84.161', '', '', '', 'Firefox', 'Windows XP', '0000-00-00 00:00:00'),
(107, 'C5596ccc97b0cf4.11671794', 2772, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '0000-00-00 00:00:00'),
(106, 'C5596ccc97b0cf4.11671794', 2773, '66.249.84.168', '', '', '', 'Firefox', 'Windows XP', '0000-00-00 00:00:00'),
(105, 'C5596ccc97b0cf4.11671794', 2772, '65.55.129.188', '', '', '', 'Internet Explorer', 'Windows 8.1', '0000-00-00 00:00:00'),
(104, 'C5596ccc97b0cf4.11671794', 2774, '68.104.254.143', '', '', '', 'Firefox', 'Windows 8.1', '0000-00-00 00:00:00'),
(103, 'C5596c5a7cb84f2.54919100', 2769, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '0000-00-00 00:00:00'),
(109, 'C5596ccc97b0cf4.11671794', 2774, '68.104.254.143', '', '', '', 'Chrome', 'Windows 8.1', '0000-00-00 00:00:00'),
(110, 'C5596ccc97b0cf4.11671794', 2772, '65.55.129.188', '', '', '', 'Handheld Browser', 'Android', '0000-00-00 00:00:00'),
(111, 'C5596ccc97b0cf4.11671794', 2772, '65.55.129.188', '', '', '', 'Handheld Browser', 'Android', '0000-00-00 00:00:00'),
(112, 'C5596ccc97b0cf4.11671794', 2772, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '0000-00-00 00:00:00'),
(113, 'C5596c5a7cb84f2.54919100', 2769, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '0000-00-00 00:00:00'),
(114, 'C5596f9b23b9ca9.67240989', 2766, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-01 03:00:00'),
(115, 'C5596f9b23b9ca9.67240989', 2772, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-01 03:00:00'),
(116, 'C5596f9b23b9ca9.67240989', 2769, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-02 03:00:00'),
(117, 'C5596f9b23b9ca9.67240989', 2766, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-02 05:00:00'),
(118, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-03 02:00:00'),
(119, 'C5596f9b23b9ca9.67240989', 2777, '68.104.254.143', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-03 02:00:00'),
(120, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.161', '', '', '', 'Firefox', 'Windows XP', '2015-07-03 02:00:00'),
(121, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-03 14:00:00'),
(122, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-03 14:00:00'),
(123, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.161', '', '', '', 'Firefox', 'Windows XP', '2015-07-03 15:00:00'),
(124, 'C5596f9b23b9ca9.67240989', 2777, '68.104.254.143', '', '', '', 'Firefox', 'Windows 8.1', '2015-07-03 15:00:00'),
(125, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', '', '', '', 'Internet Explorer', 'Windows 8.1', '2015-07-03 15:00:00'),
(126, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.175', '', '', '', 'Firefox', 'Windows XP', '2015-07-03 15:00:00'),
(127, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.168', '', '', '', 'Firefox', 'Windows XP', '2015-07-03 15:00:00'),
(128, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.168', '', '', '', 'Firefox', 'Windows XP', '2015-07-03 16:00:00'),
(129, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-03 19:00:00'),
(130, 'C55974d68b0c3f7.89580542', 2778, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-03 20:00:00'),
(131, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.175', '', '', '', 'Firefox', 'Windows XP', '2015-07-03 22:00:00'),
(132, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-03 22:00:00'),
(133, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-03 22:00:00'),
(134, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.175', '', '', '', 'Firefox', 'Windows XP', '2015-07-03 22:00:00'),
(135, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-03 22:00:00'),
(136, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.161', '', '', '', 'Firefox', 'Windows XP', '2015-07-04 08:00:00'),
(137, 'C5596f9b23b9ca9.67240989', 2777, '68.104.254.143', '', '', '', 'Chrome', 'Windows 8.1', '2015-07-04 09:00:00'),
(138, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', '', '', '', 'Internet Explorer', 'Windows 8.1', '2015-07-04 10:00:00'),
(139, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.175', '', '', '', 'Firefox', 'Windows XP', '2015-07-04 14:00:00'),
(140, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.161', '', '', '', 'Firefox', 'Windows XP', '2015-07-04 14:00:00'),
(141, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.161', 'United States', 'California', 'Mountain View', 'Firefox', 'Windows XP', '2015-07-04 17:00:00'),
(142, 'C5596f9b23b9ca9.67240989', 2777, '68.104.254.143', 'United States', 'Arizona', 'Vail', 'Chrome', 'Windows 8.1', '2015-07-04 17:00:00'),
(143, 'C5596f9b23b9ca9.67240989', 2777, '68.104.254.143', 'United States', 'Arizona', 'Vail', 'Chrome', 'Windows 8.1', '2015-07-04 17:00:00'),
(144, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.161', 'United States', 'California', 'Mountain View', 'Firefox', 'Windows XP', '2015-07-04 18:00:00'),
(145, 'C5596f9b23b9ca9.67240989', 2777, '68.104.254.143', 'United States', 'Arizona', 'Vail', 'Firefox', 'Windows 8.1', '2015-07-04 18:00:00'),
(146, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', 'United States', 'Washington', 'Redmond', 'Internet Explorer', 'Windows 8.1', '2015-07-04 18:00:00'),
(147, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', 'United States', 'Washington', 'Redmond', 'Internet Explorer', 'Windows 8.1', '2015-07-04 18:00:00'),
(148, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', 'United States', 'Washington', 'Redmond', 'Handheld Browser', 'Android', '2015-07-04 18:00:00'),
(149, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.175', 'United States', 'California', 'Mountain View', 'Firefox', 'Windows XP', '2015-07-04 18:00:00'),
(150, 'C5596f9b23b9ca9.67240989', 2776, '66.249.84.175', 'United States', 'California', 'Mountain View', 'Firefox', 'Windows XP', '2015-07-04 20:00:00'),
(151, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', 'United States', 'Washington', 'Redmond', 'Internet Explorer', 'Windows 8.1', '2015-07-04 20:00:00'),
(152, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', 'United States', 'Washington', 'Redmond', 'Internet Explorer', 'Windows 8.1', '2015-07-04 21:00:00'),
(153, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', 'United States', 'Washington', 'Redmond', 'Internet Explorer', 'Windows 8.1', '2015-07-04 22:00:00'),
(154, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', 'United States', 'Washington', 'Redmond', 'Internet Explorer', 'Windows 8.1', '2015-07-04 22:00:00'),
(155, 'C5596f9b23b9ca9.67240989', 2775, '65.55.129.188', 'United States', 'Washington', 'Redmond', 'Chrome', 'Windows 8.1', '2015-07-05 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `subject` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email_from` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email_replyto` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sent` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `list_id`, `subject`, `email_from`, `email_replyto`, `sent`) VALUES
('C559571894bf5e2.20682098', 60, 86, 'Testing', 'asdfasdf', 'mihai.sanfran@gmail.com', '7/2/2015 10:14 AM'),
('C559575e02ce573.72757881', 60, 86, 'Welcome', 'asdfasdf', 'mihai.sanfran@gmail.com', '7/2/2015 10:33 AM'),
('C559576cd136c43.34096974', 60, 86, 'Billions', 'asdfsdf', 'mihai.sanfran@gmail.com', '7/2/2015 10:37 AM'),
('C55957704d4e030.71874901', 60, 86, 'Millions', 'asdfasdf', 'mihai.sanfran@gmail.com', '7/2/2015 10:38 AM'),
('C55957a88148130.30424945', 60, 86, 'Tracker', 'asdfasdf', 'mihai.sanfran@gmail.com', '7/2/2015 10:53 AM'),
('C55958787a0ab91.14463647', 60, 86, 'Tracker bug', 'asdfa', 'mihai.sanfran@gmail.com', '7/2/2015 11:48 AM'),
('C55958c412ade62.86543351', 60, 86, 'Singapore', 'asdfasdf', 'mihai.sanfran@gmail.com', '7/2/2015 12:08 PM'),
('C5595a702bb9ec6.54033692', 60, 86, 'New Tracker', 'asdfasdf', 'mihai.sanfran@gmail.com', '7/2/2015 2:02 PM'),
('C5595a778e2b973.32910530', 60, 86, 'Tracker', 'Mihai.sanfran@gmail.com', 'mihai.sanfran@gmail.com', '7/2/2015 2:04 PM'),
('C5595a85e385ce8.28633805', 60, 86, 'Invisible', 'mihia.asdf', 'mihai.sanfran@gmail.com', '7/2/2015 2:08 PM'),
('C5595a96b085bd6.60074774', 60, 86, 'watchdog', 'asdfasdf', 'mihai.sanfran@gmail.com', '7/2/2015 2:13 PM'),
('C5595b54c170c23.48455971', 60, 86, 'Zombies', 'asdfasf', 'mihai.sanfran@gmail.com', '7/2/2015 3:03 PM'),
('C5595c38c93a1a0.41262723', 60, 86, 'Arrivals', 'asdfadf', 'mihai.sanfran@gmail.com', '7/2/2015 4:04 PM'),
('C5595c461954607.41520348', 60, 86, 'Trial Campaign', 'asdfasdf', 'mihai.sanfran@gmail.com', '7/2/2015 4:08 PM'),
('C5596c41d991862.83917291', 60, 86, 'Arrivals Campaign', 'mihasi', 'mihai.sanfran@gmail.com', '7/3/2015 10:19 AM'),
('C5596c5a7cb84f2.54919100', 60, 86, 'Features Campaign', 'mihais.asdfn', 'mihai.sanfran@gmail.com', '7/3/2015 10:25 AM'),
('C5596ccc97b0cf4.11671794', 60, 86, 'Simple Text', 'mihaisdfa', 'mihai.sanfran@gmail.com', '7/3/2015 10:56 AM'),
('C5596f9b23b9ca9.67240989', 60, 86, 'SMTP set up', 'mihai', 'mihai.sanfran@gmail.com', '7/3/2015 2:08 PM'),
('C55974d68b0c3f7.89580542', 60, 86, '', '', '', '7/3/2015 8:05 PM'),
('C55974de27d8e38.81511640', 60, 86, '', '', '', '7/3/2015 8:07 PM');

-- --------------------------------------------------------

--
-- Table structure for table `disputes`
--

CREATE TABLE IF NOT EXISTS `disputes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `raw_log_id` int(10) DEFAULT NULL,
  `txn_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `case_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `case_type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `case_creation_date` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `payment_date` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `receipt_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `verify_sign` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `payer_email` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `payer_id` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `invoice` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `reason_code` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `custom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `notify_version` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `creation_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ipn_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `txn_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `test_ipn` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `useremail` (`list_id`,`email`),
  KEY `user` (`list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55315 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `list_id`, `email`, `date_added`) VALUES
(55309, 88, ' adecco@asdf.com', '2015-07-06 01:33:52'),
(55308, 88, ' xelot23123@yahoo.com', '2015-07-06 01:33:52'),
(55307, 88, 'mihai123@yahoo.com', '2015-07-06 01:33:52'),
(55310, 88, ' andersone@adf.com', '2015-07-06 01:33:52'),
(55311, 88, 'mihai1232@yahoo.com', '2015-07-06 01:42:35'),
(55312, 88, ' xelo2t23123@yahoo.com', '2015-07-06 01:42:35'),
(55313, 88, ' adecco2@asdf.com', '2015-07-06 01:42:35'),
(55314, 88, ' ande2rsone@adf.com', '2015-07-06 01:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=89 ;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `user_id`, `name`, `created`) VALUES
(48, 59, 'Test List', '04/05/2015'),
(50, 59, 'Another List', '04/12/2015'),
(86, 60, 'My New List', '06/27/2015'),
(88, 60, 'Small List', '07/05/2015');

-- --------------------------------------------------------

--
-- Table structure for table `mass_payments`
--

CREATE TABLE IF NOT EXISTS `mass_payments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `raw_log_id` int(10) DEFAULT NULL,
  `masspay_txn_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `mc_currency` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mc_fee` double DEFAULT NULL,
  `mc_gross` double DEFAULT NULL,
  `receiver_email` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `unique_id` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `creation_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ipn_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `txn_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `test_ipn` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `raw_log_id` int(10) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  `refund_id` int(10) DEFAULT NULL,
  `subscr_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `item_name` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `item_number` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `os0` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on0` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `os1` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on1` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `os2` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on2` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `os3` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on3` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `os4` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on4` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `os5` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on5` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `os6` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on6` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `os7` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on7` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `os8` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on8` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `btn_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `custom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `mc_gross` double DEFAULT NULL,
  `mc_handling` double DEFAULT NULL,
  `mc_shipping` double DEFAULT NULL,
  `creation_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `raw_log_id`, `order_id`, `refund_id`, `subscr_id`, `item_name`, `item_number`, `os0`, `on0`, `os1`, `on1`, `os2`, `on2`, `os3`, `on3`, `os4`, `on4`, `os5`, `on5`, `os6`, `on6`, `os7`, `on7`, `os8`, `on8`, `btn_id`, `quantity`, `custom`, `mc_gross`, `mc_handling`, `mc_shipping`, `creation_timestamp`) VALUES
(1, 1, 1, NULL, '', 'something', 'AK-1234', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 1.67, 1.02, '2015-02-16 00:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `raw_log_id` int(10) DEFAULT NULL,
  `receiver_email` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `payment_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `pending_reason` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payment_date` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `option_name1` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `option_selection1` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `option_name2` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `option_selection2` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `option_name3` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `option_selection3` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `option_name4` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `option_selection4` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `option_name5` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `option_selection5` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `option_name6` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `option_selection6` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `option_name7` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `option_selection7` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `option_name8` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `option_selection8` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `option_name9` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `option_selection9` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `memo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `shipping_method` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `btn_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mc_gross` double DEFAULT NULL,
  `mc_fee` double DEFAULT NULL,
  `mc_shipping` double DEFAULT NULL,
  `mc_handling` double DEFAULT NULL,
  `shipping_discount` double DEFAULT NULL,
  `insurance_amount` double DEFAULT NULL,
  `handling_amount` double DEFAULT NULL,
  `shipping` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `mc_currency` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `txn_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `txn_type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `address_street` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `address_city` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address_state` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `address_zip` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `address_country` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `address_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payer_email` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `payer_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payment_type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `notify_version` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `verify_sign` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `address_name` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `transaction_subject` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `protection_eligibility` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ipn_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `subscr_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `custom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `reason_code` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `contact_phone` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `item_name` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `item_number` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `invoice` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `for_auction` tinyint(10) DEFAULT NULL,
  `auction_buyer_id` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `auction_closing_date` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `auction_multi_item` double DEFAULT NULL,
  `creation_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `address_country_code` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `payer_business_name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `receiver_id` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `test_ipn` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=76 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `raw_log_id`, `receiver_email`, `payment_status`, `pending_reason`, `payment_date`, `option_name1`, `option_selection1`, `option_name2`, `option_selection2`, `option_name3`, `option_selection3`, `option_name4`, `option_selection4`, `option_name5`, `option_selection5`, `option_name6`, `option_selection6`, `option_name7`, `option_selection7`, `option_name8`, `option_selection8`, `option_name9`, `option_selection9`, `memo`, `shipping_method`, `btn_id`, `mc_gross`, `mc_fee`, `mc_shipping`, `mc_handling`, `shipping_discount`, `insurance_amount`, `handling_amount`, `shipping`, `tax`, `mc_currency`, `txn_id`, `txn_type`, `first_name`, `last_name`, `address_street`, `address_city`, `address_state`, `address_zip`, `address_country`, `address_status`, `payer_email`, `payer_status`, `payment_type`, `notify_version`, `verify_sign`, `address_name`, `transaction_subject`, `protection_eligibility`, `ipn_status`, `subscr_id`, `custom`, `reason_code`, `contact_phone`, `item_name`, `item_number`, `invoice`, `for_auction`, `auction_buyer_id`, `auction_closing_date`, `auction_multi_item`, `creation_timestamp`, `address_country_code`, `payer_business_name`, `receiver_id`, `test_ipn`) VALUES
(1, 1, 'seller@paypalsandbox.com', 'Completed', '', '16:55:50 15 Feb 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 12.34, 0.44, 3.02, 2.06, 0, 0, 0, 0, 2.02, 'USD', '392376410', 'cart', 'John', 'Smith', '123, any street', 'San Jose', 'CA', '95131', 'United States', 'confirmed', 'buyer@paypalsandbox.com', 'verified', 'instant', '2.4', 'A3v1jUpCRKF3cMPODyzlgVjuDEtSA6vH-UfyrsqfR2-Xp9.XM0doSPQP', 'John Smith', '', '', 'Invalid', '', 'xyz123', '', '', 'something', 'AK-1234', 'abc1234', 0, '', '', 0, '2015-02-16 00:56:22', 'US', '', 'seller@paypalsa', 1),
(2, 2, 'seller@paypalsandbox.com', 'Completed', '', '17:15:19 15 Feb 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 12.34, 0.44, 0, 0, 0, 0, 0, 3.04, 2.02, 'USD', '294837353', 'web_accept', 'John', 'Smith', '123, any street', 'San Jose', 'CA', '95131', 'United States', 'confirmed', 'myemail@paypalsandbox.com', 'verified', 'instant', '2.1', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AWoS9tLOxbPpA.1spMX5XGj1Y0EH', 'John Smith', '', '', 'Invalid', '', 'xyz123', '', '', 'something', 'AK-1234', 'abc1234', 0, '', '', 0, '2015-02-16 01:15:47', 'US', '', 'seller@paypalsa', 1),
(3, 3, 'travelin.man2015@gmail.com', 'Completed', '', '20:53:50 Feb 15, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '2V655850FT9109943', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AFd.erwt7VoeoUMr85yut0RloHozAJKPDQQmar0i0TDnseqqXj2lQgJF', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 04:53:55', '', '', 'AVCAHSW235QLG', 1),
(4, 4, 'travelin.man2015@gmail.com', 'Completed', '', '21:10:21 Feb 15, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '5AH51465BU328352U', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'Ae-XDUZhrxwaCSsmGO9JpO33K7P1AvgJUJx6g.FOv8-WlqIZFAwQjltR', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 05:10:30', '', '', 'AVCAHSW235QLG', 1),
(5, 5, 'travelin.man2015@gmail.com', 'Completed', '', '21:23:44 Feb 15, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '4PK00241KC748514G', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'Ama2VkZWHBN5P8JFn7fza.xkTMiVAUggTDWVcTIYFJkSlKDcAgdZPrAA', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 05:24:02', '', '', 'AVCAHSW235QLG', 1),
(6, 6, 'travelin.man2015@gmail.com', 'Completed', '', '21:26:24 Feb 15, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '7L553898GN925511H', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AsqAqRC98UGgmCjir0HCuTT6syNdA8JsOgWzqPdjcvTZLV5tHLevCUM8', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 05:26:28', '', '', 'AVCAHSW235QLG', 1),
(7, 7, 'travelin.man2015@gmail.com', 'Completed', '', '10:57:34 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '48877596UK413474X', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AnNMT7nRteKS2auTkxdsRz9rRvvPAVDRWAa5idHa6fxlSx-yabx2ERSp', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 18:57:40', '', '', 'AVCAHSW235QLG', 1),
(8, 8, 'travelin.man2015@gmail.com', 'Completed', '', '11:00:37 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '27D26451RS496462W', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AI36sk2Aln3iC.t.mla1wMizPRcQAClmzriczcrYnF4DFsvMTaFPMWsN', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 19:00:43', '', '', 'AVCAHSW235QLG', 1),
(9, 9, 'travelin.man2015@gmail.com', 'Completed', '', '11:03:03 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '45487810888300158', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AxY4PZnLwHn-wCsVYatnHp9kp4-PACUVRgGPiPUcIhNTl2Vkc3Nhyou-', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 19:03:09', '', '', 'AVCAHSW235QLG', 1),
(10, 10, 'travelin.man2015@gmail.com', 'Completed', '', '11:06:42 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '6BU399303B093304P', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A9LC3Qajo-H2V8mPq4eIktgPvG2RAP1ZnoQ5xNvFLRWylpKL-mHdM-PT', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 19:06:49', '', '', 'AVCAHSW235QLG', 1),
(11, 11, 'travelin.man2015@gmail.com', 'Completed', '', '11:08:52 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '2M843738XT475992D', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AQ.m0SV3BZLs-9FmZWvPFXgfj.pzAZqjWcX0-tvmRT649AIgdaKUpG-p', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 19:08:57', '', '', 'AVCAHSW235QLG', 1),
(12, 12, 'travelin.man2015@gmail.com', 'Completed', '', '11:13:11 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '6EG67312L4803783P', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AQU0e5vuZCvSg-XJploSa.sGUDlpAc-Nw3xYUXC8mYz4fdRa8qQve45p', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 19:13:15', '', '', 'AVCAHSW235QLG', 1),
(13, 13, 'travelin.man2015@gmail.com', 'Completed', '', '11:18:42 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '8NW7213249359380R', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AZ7uj2Hu8SU2YFFc-5vkC9D-LXs3ATYfm1nyCCUIi.Gn9vaQPPHzPdxs', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 19:18:47', '', '', 'AVCAHSW235QLG', 1),
(14, 14, 'travelin.man2015@gmail.com', 'Completed', '', '13:30:15 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '1XB11515DN9471514', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AyaQ3Tug5u8kUuTbQBYRC837GP.mA.trlHN7d2R237g59bH2kFOSH4l-', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 21:30:23', '', '', 'AVCAHSW235QLG', 1),
(15, 15, 'travelin.man2015@gmail.com', 'Completed', '', '13:35:33 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '2A7890669D738894J', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AbVpE46Hdzh6d29Gu3X3iR8qqXBgAmRiUo.57d1TUk1yVVHKjmocJ.JD', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 21:35:46', '', '', 'AVCAHSW235QLG', 1),
(16, 16, 'travelin.man2015@gmail.com', 'Completed', '', '13:39:33 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3074656', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '3W0178813U462161N', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AFgT5txRPJpoPaom.H0IysN0p364AAb8HQudrsMVlchKDfT6ubVO5rZx', '', '', 'Ineligible', 'Invalid', '', '', '', '', '500 Email Credits', '', '', 0, '', '', 0, '2015-02-16 21:39:37', '', '', 'AVCAHSW235QLG', 1),
(17, 17, 'travelin.man2015@gmail.com', 'Completed', '', '14:07:50 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '9HD21974PM004850F', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AuaofqQd2e-2NuLkob0HpzqE3dYDAnjDMbs6ZCrH6w0XJtgqQwlafQvO', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-02-16 22:07:55', '', '', 'AVCAHSW235QLG', 1),
(18, 18, 'travelin.man2015@gmail.com', 'Completed', '', '15:08:27 Feb 16, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075135', 30, 1.17, 0, 0, 0, 0, 0, 0, 0, 'USD', '0EX20152HD142800G', 'web_accept', 'Mariusz', 'Wdowiak', '', '', '', '', '', '', 'mwdowiak33@gmail.com', 'verified', 'instant', '3.8', 'AlFPbbw2kPrbTIUswGLU2BRjFYcxA7LPiosgCBiHSUhnu8fApl.bF.gX', '', '', 'Ineligible', 'Invalid', '', '', '', '', '1000 Email Credits', '', '', 0, '', '', 0, '2015-02-16 23:08:30', '', '', 'AVCAHSW235QLG', 1),
(19, 23, 'travelin.man2015@gmail.com', 'Completed', '', '10:48:19 Mar 07, 2015 PST', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075135', 30, 1.17, 0, 0, 0, 0, 0, 0, 0, 'USD', '3MT88711T6625122Y', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AYkfPMj3Yw-OwsXtwJg49fQYox8cAP4QGG0WN9MjtjrJkxsSdUnu-sey', '', '', 'Ineligible', 'Invalid', '', '', '', '', '1000 Email Credits', '', '', 0, '', '', 0, '2015-03-07 18:48:24', '', '', 'AVCAHSW235QLG', 1),
(20, 24, 'travelin.man2015@gmail.com', 'Completed', '', '11:29:32 Mar 08, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3086050', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '5PL81593L97743514', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A21kmBLyRcQpDSjYvmswlm3ckjahAdN7vo8m150d4S7yM7L2LlZSyHv0', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5 Email Credits', '', '', 0, '', '', 0, '2015-03-08 18:29:37', '', '', 'AVCAHSW235QLG', 1),
(21, 25, 'travelin.man2015@gmail.com', 'Completed', '', '15:11:35 Mar 09, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075135', 30, 1.17, 0, 0, 0, 0, 0, 0, 0, 'USD', '3VF8827099986381H', 'web_accept', 'Mariusz', 'Wdowiak', '', '', '', '', '', '', 'mwdowiak33@gmail.com', 'verified', 'instant', '3.8', 'Alseivcq5qbgooazn1CH.wt3MbptAGrPEVE0yt.p1CzPyak3CdPxT3Z3', '', '', 'Ineligible', 'Invalid', '', '', '', '', '1000 Email Credits', '', '', 0, '', '', 0, '2015-03-09 22:11:40', '', '', 'AVCAHSW235QLG', 1),
(22, 26, 'travelin.man2015@gmail.com', 'Completed', '', '12:15:56 Mar 22, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3086050', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '8AR886938L709434X', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AGu.hbwMxRXoqDiyy-IJNOnULnvNAOJSVLXQj3T6kZ21vF1SyPrTLkSN', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5 Email Credits', '', '', 0, '', '', 0, '2015-03-22 19:16:05', '', '', 'AVCAHSW235QLG', 1),
(23, 27, 'travelin.man2015@gmail.com', 'Completed', '', '12:46:55 Mar 22, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075135', 30, 1.17, 0, 0, 0, 0, 0, 0, 0, 'USD', '4SE51977HY522381P', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AUol0pQ9oicCAA4wZHCA-EKiceopAp97qeTrqFWNAS8x328nIApl6P42', '', '', 'Ineligible', 'Invalid', '', '', '', '', '1000 Email Credits', '', '', 0, '', '', 0, '2015-03-22 19:47:01', '', '', 'AVCAHSW235QLG', 1),
(24, 28, 'travelin.man2015@gmail.com', 'Completed', '', '18:49:30 Apr 04, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '2P8554697P4358438', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'Af9bPdxPdyWIWTj85.qiBq3Qf1iTA7wfVDRl6U7TFgJS7Isk8pbn.7Le', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 01:49:36', '', '', 'AVCAHSW235QLG', 1),
(25, 29, 'travelin.man2015@gmail.com', 'Completed', '', '21:34:17 Apr 04, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '97L6947083452974S', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'Ag4pR9LQv6eZmyD9b7-.KcIQV1SnA2FV4-Ew1jEHCOA-rKfFZf6ll-KJ', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 04:34:22', '', '', 'AVCAHSW235QLG', 1),
(26, 30, 'travelin.man2015@gmail.com', 'Completed', '', '21:36:06 Apr 04, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '3P487665FN9901343', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'Al8LBTdQUzlrupplVx64f1QoH2aVA1SHPetYmkv3bYXvV3QYTOAk4yp2', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 04:36:12', '', '', 'AVCAHSW235QLG', 1),
(27, 31, 'travelin.man2015@gmail.com', 'Completed', '', '21:37:41 Apr 04, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '4K294329W3718200K', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AiPC9BjkCyDFQXbSkoZcgqH3hpacAh2n8xXd3KJDcllzIoF5kyue7.mn', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 04:37:48', '', '', 'AVCAHSW235QLG', 1),
(28, 32, 'travelin.man2015@gmail.com', 'Completed', '', '22:39:02 Apr 04, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '5VD887478S117813G', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AdDpVdAsY.PSjAt6SbAvmj1K35x.', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 05:39:09', '', '', 'AVCAHSW235QLG', 1),
(29, 33, 'travelin.man2015@gmail.com', 'Completed', '', '22:43:55 Apr 04, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '6N574103RR1644017', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A.CSYz4u5IILQm5wM0J0JbJiIcEuAF-6dtzoQkt3X5IeEMeWtS.v1ioX', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 05:43:59', '', '', 'AVCAHSW235QLG', 1),
(30, 34, 'travelin.man2015@gmail.com', 'Completed', '', '22:45:22 Apr 04, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '2DT49663T51938919', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AiPC9BjkCyDFQXbSkoZcgqH3hpacAetzpEIedgm2HqOcZiLBVPG24uES', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 05:45:28', '', '', 'AVCAHSW235QLG', 1),
(31, 35, 'travelin.man2015@gmail.com', 'Completed', '', '22:47:05 Apr 04, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '6G138464G0963144E', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AwD4sJJmdrzDKNGw7KMAMuZSx1AHAv0A23As3xIhvOMDQzj5f3UwBQJE', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 05:47:09', '', '', 'AVCAHSW235QLG', 1),
(32, 36, 'travelin.man2015@gmail.com', 'Completed', '', '22:48:49 Apr 04, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '3WT36229PR472240N', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AeBa5YP.n6khP639B4oz-cTJgsewAFVYBPBzzD-i-tXsD1u6gu434bxk', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 05:48:53', '', '', 'AVCAHSW235QLG', 1),
(33, 37, 'travelin.man2015@gmail.com', 'Completed', '', '22:49:41 Apr 04, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075137', 60, 2.04, 0, 0, 0, 0, 0, 0, 0, 'USD', '8Y2973569K919230E', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AbY9KwD.wRXzsqXgzzaoiRMFiwxr', '', '', 'Ineligible', 'Invalid', '', '', '', '', '2000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 05:49:46', '', '', 'AVCAHSW235QLG', 1),
(34, 38, 'travelin.man2015@gmail.com', 'Completed', '', '09:55:05 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075137', 60, 2.04, 0, 0, 0, 0, 0, 0, 0, 'USD', '6KK77075F67184358', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A.4bKNMhIktwtcg-PxQmviEcm1RsAV.MvVhDT6eH9HjJT.nud5FDgl3r', '', '', 'Ineligible', 'Invalid', '', '', '', '', '2000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 16:55:15', '', '', 'AVCAHSW235QLG', 1),
(35, 39, 'travelin.man2015@gmail.com', 'Completed', '', '10:06:26 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '5DF77039JH525073X', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AwEiTWoCohrcbQwbLrwZJ-2VS1NMA9c72rlS9JcdKSjswtJiLac8pTaw', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:06:37', '', '', 'AVCAHSW235QLG', 1),
(36, 40, 'travelin.man2015@gmail.com', 'Completed', '', '10:08:53 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '6C05820361530691N', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AzW7-2QlleD6xLUXkqJXwZc4AAodAXXUz3X7-5BT6Vi3OKirkeW8wCHX', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:09:07', '', '', 'AVCAHSW235QLG', 1),
(37, 41, 'travelin.man2015@gmail.com', 'Completed', '', '10:10:08 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '3BW52970P5198494G', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A--8MSCLabuvN8L.-MHjxC9uypBtA8y1T5NkQzD-I7DATQ92JgZ3wZ6U', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:10:23', '', '', 'AVCAHSW235QLG', 1),
(38, 42, 'travelin.man2015@gmail.com', 'Completed', '', '10:12:06 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075135', 30, 1.17, 0, 0, 0, 0, 0, 0, 0, 'USD', '37A178936B469734F', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AJax4KwBmLNEF1AwlhmrEb-gwnPZAC4.olKCf0NZoSOOlwIjaVOFeLaa', '', '', 'Ineligible', 'Invalid', '', '', '', '', '1000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:12:12', '', '', 'AVCAHSW235QLG', 1),
(39, 43, 'travelin.man2015@gmail.com', 'Completed', '', '10:14:18 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3086050', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '2ED19167YU113190K', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AiKZhEEPLJjSIccz.2M.tbyW5YFwAj-muqbjJiJDkGpAtamPY5jL8PpK', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:14:27', '', '', 'AVCAHSW235QLG', 1),
(40, 44, 'travelin.man2015@gmail.com', 'Completed', '', '10:16:07 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '33T03269MS138130D', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AI36sk2Aln3iC.t.mla1wMizPRcQAbOijQb5ZP3gAqpbMKcb3oBZEAEZ', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:16:12', '', '', 'AVCAHSW235QLG', 1),
(41, 45, 'travelin.man2015@gmail.com', 'Completed', '', '10:19:03 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '4FA76500M7858311D', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'Ah77rVzWiX5USsnJJ3dBw9oXkmnQA4Kk7bHmEDXw1IcwdM1p4ojlz0Y7', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:19:14', '', '', 'AVCAHSW235QLG', 1),
(42, 46, 'travelin.man2015@gmail.com', 'Completed', '', '10:20:06 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075137', 60, 2.04, 0, 0, 0, 0, 0, 0, 0, 'USD', '0V915778SN347564F', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'ABmLIt-rsw6e4ghb-eEiLg0aJfnSA-9NlKcm4EfcfsV7A6wHR4GHnRfX', '', '', 'Ineligible', 'Invalid', '', '', '', '', '2000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:20:09', '', '', 'AVCAHSW235QLG', 1),
(43, 47, 'travelin.man2015@gmail.com', 'Completed', '', '10:20:59 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '0KF783901P805412W', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'ArbxTA.-geWaVhpfclKxd9TLSrJHATC2Mha3pxerKLnfFdtMFV2SRm9B', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:21:05', '', '', 'AVCAHSW235QLG', 1),
(44, 48, 'travelin.man2015@gmail.com', 'Completed', '', '10:22:13 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '5B341253KX8962027', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AutRq1BFhyAZ0EjiHxEcLnzY5EdDAM-VXliLQZYT2O4NZS9UJSHzQN9t', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:22:20', '', '', 'AVCAHSW235QLG', 1),
(45, 49, 'travelin.man2015@gmail.com', 'Completed', '', '10:24:38 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '7FM905162A813032J', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AfcbDiniZnPaMXTT1-dOGKFE0ivcAt7fTJhPQZcwIuoAuF8MNNFz5pMa', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:24:44', '', '', 'AVCAHSW235QLG', 1),
(46, 50, 'travelin.man2015@gmail.com', 'Completed', '', '10:32:12 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '290307499B0925054', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'Ai.5bQT0IEOAwZz0G2AWlZ32DvJdADlqnSvomWlPnxujrOydyIJ73gmV', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:32:16', '', '', 'AVCAHSW235QLG', 1),
(47, 51, 'travelin.man2015@gmail.com', 'Completed', '', '10:34:03 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '9VB1811728809222R', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AOh0tu.5JUQyG2Aao4MpntBA2sFjAp8FmUPowISBPDjdc.GR1DuSaJ0D', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:34:08', '', '', 'AVCAHSW235QLG', 1),
(48, 52, 'travelin.man2015@gmail.com', 'Completed', '', '10:35:19 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '2E1687344B579951A', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AGs52InFHk3cJ5j80u2Udq.A26J4AADJUIGrpuzzSvA0kueyuZ2e.4pd', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:35:24', '', '', 'AVCAHSW235QLG', 1),
(49, 53, 'travelin.man2015@gmail.com', 'Completed', '', '10:36:31 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '7DJ13237UG178542W', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AiSR2StlHE2eLR.87SGxCbNjllAFAGCXgN3A01jS8P7i26h37mbIqE4Q', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:36:40', '', '', 'AVCAHSW235QLG', 1),
(50, 54, 'travelin.man2015@gmail.com', 'Completed', '', '10:38:51 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '6CY24550Y8744752H', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A4oEGE3xsraq9IjtQ9J3Qb1WhR-kASolKRphQBhXIriJ.b6Z4MqqfCGh', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 17:38:56', '', '', 'AVCAHSW235QLG', 1),
(51, 55, 'travelin.man2015@gmail.com', 'Completed', '', '10:59:55 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '5WK95581BB084552D', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AnrKqMM8aiEjckUOBTYy69ylGVuCAnF1JOxGLgdQsBWnFF.sYv3Sk9fJ', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 18:00:12', '', '', 'AVCAHSW235QLG', 1),
(52, 56, 'travelin.man2015@gmail.com', 'Completed', '', '11:01:39 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '5X603940CP175053H', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-ArPIDOgHiQYwnEUfOg0-rxD3cJYm', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 18:01:43', '', '', 'AVCAHSW235QLG', 1),
(53, 57, 'travelin.man2015@gmail.com', 'Completed', '', '11:06:13 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '39K14044WL2657212', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'ALBe4QrXe2sJhpq1rIN8JxSbK4RZAAc9fabPWe5Uj-DUjh5WZ6qRR52h', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 18:06:23', '', '', 'AVCAHSW235QLG', 1),
(54, 58, 'travelin.man2015@gmail.com', 'Completed', '', '11:30:08 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '9GB67968WN6382503', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AwD4sJJmdrzDKNGw7KMAMuZSx1AHA.cmnSfpPKTQ1qZC7M8El3DLkZJ3', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 18:30:15', '', '', 'AVCAHSW235QLG', 1),
(55, 59, 'travelin.man2015@gmail.com', 'Completed', '', '11:32:59 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '1LW06945NG1276023', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AOH.JxXLRThnyE4tyiz8f.cTKbR2ADOiKrxIoZ-pqV.3K1xp6WmYvEn5', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 18:33:03', '', '', 'AVCAHSW235QLG', 1),
(56, 60, 'travelin.man2015@gmail.com', 'Completed', '', '11:35:52 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '7AU028681A0290601', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AZuRXZRkuk7frhfirfxxTkj0BDJGAQxa5TaFUTOTgTtVuxLCBb-Xr9eg', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 18:35:59', '', '', 'AVCAHSW235QLG', 1),
(57, 61, 'travelin.man2015@gmail.com', 'Completed', '', '12:03:03 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '60F81350RY624374S', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AanfqmupM8NC7KuUqyodVAIKx37YAEVfMuTTLfN.3rOBTr4cpiAJSCTj', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 19:03:07', '', '', 'AVCAHSW235QLG', 1),
(58, 62, 'travelin.man2015@gmail.com', 'Completed', '', '12:18:50 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '4XC85748B2269231S', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AIkKNboJiyuxWLOHUlzTd3lpqCSxAwLjJ9-nbfJ-rrlAHmG.b6bnnU.M', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 19:18:56', '', '', 'AVCAHSW235QLG', 1),
(59, 63, 'travelin.man2015@gmail.com', 'Completed', '', '12:51:42 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '5J761455A3620672R', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AqBqA1nSf.CEBj1d5rbDP.LO-woKAE5WAGoeerN5FJEHuNXv5.S42wmK', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 19:51:50', '', '', 'AVCAHSW235QLG', 1),
(60, 64, 'travelin.man2015@gmail.com', 'Completed', '', '12:56:42 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '5KU58455UA6373037', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AG9doQDYrt5GXRfVDfqE1KJqJ-iz', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 19:56:46', '', '', 'AVCAHSW235QLG', 1),
(61, 65, 'travelin.man2015@gmail.com', 'Completed', '', '12:59:04 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '3F0423144R214811C', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AI36sk2Aln3iC.t.mla1wMizPRcQAhqFwJuGg3Ss3Fle0-A4g1vz-xJX', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 19:59:14', '', '', 'AVCAHSW235QLG', 1),
(62, 66, 'travelin.man2015@gmail.com', 'Completed', '', '13:03:11 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '8B743722U8015872T', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AfX1Hr7AcOmOhMsPp1gZvXsk7Tc1', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 20:03:25', '', '', 'AVCAHSW235QLG', 1),
(63, 67, 'travelin.man2015@gmail.com', 'Completed', '', '13:05:09 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '34T22167PC164300X', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A--8MSCLabuvN8L.-MHjxC9uypBtACp1HPu3ygQ.BLB1YkM2WKBBoPtH', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 20:05:17', '', '', 'AVCAHSW235QLG', 1),
(64, 68, 'travelin.man2015@gmail.com', 'Completed', '', '13:09:05 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '63P02786FL167905F', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AynlJ2zsmflH.74VEfIBZZJsEArxAysyFKcD.JDj4NFNfeWDpa6ejWQS', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 20:09:10', '', '', 'AVCAHSW235QLG', 1),
(65, 69, 'travelin.man2015@gmail.com', 'Completed', '', '13:10:35 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '61F61639VV2010250', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AwixbwddmlL2A43V00B0KjnlYVO8', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 20:10:42', '', '', 'AVCAHSW235QLG', 1),
(66, 70, 'travelin.man2015@gmail.com', 'Completed', '', '13:51:14 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '93V70519M0903222J', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AOh0tu.5JUQyG2Aao4MpntBA2sFjAT9QriG5eZ6ED.4rAtlu03lJyDEP', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 20:51:22', '', '', 'AVCAHSW235QLG', 1),
(67, 71, 'travelin.man2015@gmail.com', 'Completed', '', '14:17:14 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '5N159910FK3513835', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A.7n6Acd75CB8FdbeZyRGF.BoVPlAJUOBewEBn6UBZEZLNBAYUE-HJ.h', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 21:17:22', '', '', 'AVCAHSW235QLG', 1),
(68, 72, 'travelin.man2015@gmail.com', 'Completed', '', '14:27:23 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '06R20316NT026933D', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AQU0e5vuZCvSg-XJploSa.sGUDlpAqk2Xehgx6yYOJG3fLH0xzXoLcSV', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-05 21:27:30', '', '', 'AVCAHSW235QLG', 1),
(69, 73, 'travelin.man2015@gmail.com', 'Completed', '', '17:04:23 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '4DM87885S8697431B', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A--8MSCLabuvN8L.-MHjxC9uypBtArrLCFQi5ikNvz6lKEkaLrC2z7gB', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-06 00:04:29', '', '', 'AVCAHSW235QLG', 1),
(70, 74, 'travelin.man2015@gmail.com', 'Completed', '', '17:56:58 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075139', 100, 3.2, 0, 0, 0, 0, 0, 0, 0, 'USD', '91D75488RB800660X', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A0UjP6ffU-lDlhgfmNPH62qtU3NRAd-G-NKicuB09iArj.ZzEUWU7oww', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5000 Email Credits', '', '', 0, '', '', 0, '2015-04-06 00:57:06', '', '', 'AVCAHSW235QLG', 1),
(71, 75, 'travelin.man2015@gmail.com', 'Completed', '', '18:07:59 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '0N862739GA1745946', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AetgxQBy0AZ.0n-vhqWi-1ShaqpFAjnnA2vvA-Wt5jA2YVuqoR6tOoZP', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-06 01:08:08', '', '', 'AVCAHSW235QLG', 1),
(72, 76, 'travelin.man2015@gmail.com', 'Completed', '', '18:12:17 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075135', 30, 1.17, 0, 0, 0, 0, 0, 0, 0, 'USD', '6NY7459961148702L', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AYC5OHuaKCeGkdR2xQihlGY0ub74AX1cEMWfUO5MmR5lPfMnedhHCDRs', '', '', 'Ineligible', 'Invalid', '', '', '', '', '1000 Email Credits', '', '', 0, '', '', 0, '2015-04-06 01:12:22', '', '', 'AVCAHSW235QLG', 1),
(73, 77, 'travelin.man2015@gmail.com', 'Completed', '', '18:16:58 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075140', 200, 6.1, 0, 0, 0, 0, 0, 0, 0, 'USD', '12495197445399340', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'AJALhkU1nFnTnqDa3WS7TUC30c-8AnYntTkYouvNTjoSdM4Vq4dFyi-L', '', '', 'Ineligible', 'Invalid', '', '', '', '', '10000 Email Credits', '', '', 0, '', '', 0, '2015-04-06 01:17:04', '', '', 'AVCAHSW235QLG', 1),
(74, 78, 'travelin.man2015@gmail.com', 'Completed', '', '18:40:10 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075137', 60, 2.04, 0, 0, 0, 0, 0, 0, 0, 'USD', '0FL92434EA276223X', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'ARzgAgKHDmJxNpJrYmwa7-mE9yWfA0C9eAYVfvYZkmAn2EOBAS40ItA4', '', '', 'Ineligible', 'Invalid', '', '', '', '', '2000 Email Credits', '', '', 0, '', '', 0, '2015-04-06 01:40:16', '', '', 'AVCAHSW235QLG', 1),
(75, 80, 'travelin.man2015@gmail.com', 'Completed', '', '21:36:56 Jul 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3177635', 5, 0.45, 0, 0, 0, 0, 0, 0, 0, 'USD', '7WT024513T4568844', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'A5v94doyzkAL45GWSOpp3GzSpU1aAFMJEv-hM97Ud23v3XTJeAYWggY5', '', '', 'Ineligible', 'Invalid', '', '', '', '', '5 Email Credits', '', '', 0, '', '', 0, '2015-07-06 04:37:01', '', '', 'AVCAHSW235QLG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `raw_log`
--

CREATE TABLE IF NOT EXISTS `raw_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ipn_data_serialized` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=81 ;

--
-- Dumping data for table `raw_log`
--

INSERT INTO `raw_log` (`id`, `created_timestamp`, `ipn_data_serialized`) VALUES
(1, '2015-02-16 00:56:22', 'a:38:{s:17:"residence_country";s:2:"US";s:7:"invoice";s:7:"abc1234";s:12:"address_city";s:8:"San Jose";s:10:"first_name";s:4:"John";s:8:"payer_id";s:13:"TESTBUYERID01";s:6:"mc_fee";s:4:"0.44";s:6:"txn_id";s:9:"392376410";s:14:"receiver_email";s:24:"seller@paypalsandbox.com";s:6:"custom";s:6:"xyz123";s:12:"payment_date";s:24:"16:55:50 15 Feb 2015 PST";s:20:"address_country_code";s:2:"US";s:11:"address_zip";s:5:"95131";s:10:"item_name1";s:9:"something";s:11:"mc_handling";s:4:"2.06";s:12:"mc_handling1";s:4:"1.67";s:3:"tax";s:4:"2.02";s:12:"address_name";s:10:"John Smith";s:9:"last_name";s:5:"Smith";s:11:"receiver_id";s:24:"seller@paypalsandbox.com";s:11:"verify_sign";s:56:"A3v1jUpCRKF3cMPODyzlgVjuDEtSA6vH-UfyrsqfR2-Xp9.XM0doSPQP";s:15:"address_country";s:13:"United States";s:14:"payment_status";s:9:"Completed";s:14:"address_status";s:9:"confirmed";s:8:"business";s:24:"seller@paypalsandbox.com";s:11:"payer_email";s:23:"buyer@paypalsandbox.com";s:14:"notify_version";s:3:"2.4";s:8:"txn_type";s:4:"cart";s:8:"test_ipn";s:1:"1";s:12:"payer_status";s:8:"verified";s:11:"mc_currency";s:3:"USD";s:8:"mc_gross";s:5:"12.34";s:11:"mc_shipping";s:4:"3.02";s:12:"mc_shipping1";s:4:"1.02";s:12:"item_number1";s:7:"AK-1234";s:13:"address_state";s:2:"CA";s:9:"mc_gross1";s:4:"9.34";s:12:"payment_type";s:7:"instant";s:14:"address_street";s:15:"123, any street";}'),
(2, '2015-02-16 01:15:47', 'a:36:{s:17:"residence_country";s:2:"US";s:7:"invoice";s:7:"abc1234";s:12:"address_city";s:8:"San Jose";s:10:"first_name";s:4:"John";s:8:"payer_id";s:13:"TESTBUYERID01";s:8:"shipping";s:4:"3.04";s:6:"mc_fee";s:4:"0.44";s:6:"txn_id";s:9:"294837353";s:14:"receiver_email";s:24:"seller@paypalsandbox.com";s:8:"quantity";s:1:"1";s:6:"custom";s:6:"xyz123";s:12:"payment_date";s:24:"17:15:19 15 Feb 2015 PST";s:20:"address_country_code";s:2:"US";s:11:"address_zip";s:5:"95131";s:3:"tax";s:4:"2.02";s:9:"item_name";s:9:"something";s:12:"address_name";s:10:"John Smith";s:9:"last_name";s:5:"Smith";s:11:"receiver_id";s:24:"seller@paypalsandbox.com";s:11:"item_number";s:7:"AK-1234";s:11:"verify_sign";s:56:"AFcWxV21C7fd0v3bYYYRCpSSRl31AWoS9tLOxbPpA.1spMX5XGj1Y0EH";s:15:"address_country";s:13:"United States";s:14:"payment_status";s:9:"Completed";s:14:"address_status";s:9:"confirmed";s:8:"business";s:24:"seller@paypalsandbox.com";s:11:"payer_email";s:25:"myemail@paypalsandbox.com";s:14:"notify_version";s:3:"2.1";s:8:"txn_type";s:10:"web_accept";s:8:"test_ipn";s:1:"1";s:12:"payer_status";s:8:"verified";s:11:"mc_currency";s:3:"USD";s:8:"mc_gross";s:5:"12.34";s:13:"address_state";s:2:"CA";s:9:"mc_gross1";s:4:"9.34";s:12:"payment_type";s:7:"instant";s:14:"address_street";s:15:"123, any street";}'),
(3, '2015-02-16 04:53:55', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"20:53:50 Feb 15, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AFd.erwt7VoeoUMr85yut0RloHozAJKPDQQmar0i0TDnseqqXj2lQgJF";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"2V655850FT9109943";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"6891049fd0819";}'),
(4, '2015-02-16 05:10:30', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"21:10:21 Feb 15, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"Ae-XDUZhrxwaCSsmGO9JpO33K7P1AvgJUJx6g.FOv8-WlqIZFAwQjltR";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"5AH51465BU328352U";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"1cc3470283a14";}'),
(5, '2015-02-16 05:24:02', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"21:23:44 Feb 15, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"Ama2VkZWHBN5P8JFn7fza.xkTMiVAUggTDWVcTIYFJkSlKDcAgdZPrAA";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"4PK00241KC748514G";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"ad326f4c85ff4";}'),
(6, '2015-02-16 05:26:28', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"21:26:24 Feb 15, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AsqAqRC98UGgmCjir0HCuTT6syNdA8JsOgWzqPdjcvTZLV5tHLevCUM8";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"7L553898GN925511H";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"46a3554546fef";}'),
(7, '2015-02-16 18:57:40', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:57:34 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AnNMT7nRteKS2auTkxdsRz9rRvvPAVDRWAa5idHa6fxlSx-yabx2ERSp";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"48877596UK413474X";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"26a25e282d4e0";}'),
(8, '2015-02-16 19:00:43', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:00:37 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AI36sk2Aln3iC.t.mla1wMizPRcQAClmzriczcrYnF4DFsvMTaFPMWsN";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"27D26451RS496462W";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"7fbc3e3c1cbe9";}'),
(9, '2015-02-16 19:03:09', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:03:03 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AxY4PZnLwHn-wCsVYatnHp9kp4-PACUVRgGPiPUcIhNTl2Vkc3Nhyou-";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"45487810888300158";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"a32250959ffe0";}'),
(10, '2015-02-16 19:06:49', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:06:42 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A9LC3Qajo-H2V8mPq4eIktgPvG2RAP1ZnoQ5xNvFLRWylpKL-mHdM-PT";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"6BU399303B093304P";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"534e30752adba";}'),
(11, '2015-02-16 19:08:57', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:08:52 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AQ.m0SV3BZLs-9FmZWvPFXgfj.pzAZqjWcX0-tvmRT649AIgdaKUpG-p";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"2M843738XT475992D";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"7ca47fe09947e";}'),
(12, '2015-02-16 19:13:15', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:13:11 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AQU0e5vuZCvSg-XJploSa.sGUDlpAc-Nw3xYUXC8mYz4fdRa8qQve45p";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"6EG67312L4803783P";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:12:"a3b2b5288870";}'),
(13, '2015-02-16 19:18:47', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:18:42 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AZ7uj2Hu8SU2YFFc-5vkC9D-LXs3ATYfm1nyCCUIi.Gn9vaQPPHzPdxs";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"8NW7213249359380R";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"66cee960a2f89";}'),
(14, '2015-02-16 21:30:23', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"13:30:15 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AyaQ3Tug5u8kUuTbQBYRC837GP.mA.trlHN7d2R237g59bH2kFOSH4l-";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"1XB11515DN9471514";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"e18d8e769471b";}'),
(15, '2015-02-16 21:35:46', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"13:35:33 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AbVpE46Hdzh6d29Gu3X3iR8qqXBgAmRiUo.57d1TUk1yVVHKjmocJ.JD";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"2A7890669D738894J";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"71f0155346e4f";}'),
(16, '2015-02-16 21:39:37', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"13:39:33 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AFgT5txRPJpoPaom.H0IysN0p364AAb8HQudrsMVlchKDfT6ubVO5rZx";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"3W0178813U462161N";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3074656";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:17:"500 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"55ba252043754";}'),
(17, '2015-02-16 22:07:55', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"14:07:50 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AuaofqQd2e-2NuLkob0HpzqE3dYDAnjDMbs6ZCrH6w0XJtgqQwlafQvO";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"9HD21974PM004850F";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"4ae8d63b6780c";}'),
(18, '2015-02-16 23:08:30', 'a:38:{s:8:"mc_gross";s:5:"30.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"AVELS58W7YF98";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"15:08:27 Feb 16, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:7:"Mariusz";s:6:"mc_fee";s:4:"1.17";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AlFPbbw2kPrbTIUswGLU2BRjFYcxA7LPiosgCBiHSUhnu8fApl.bF.gX";s:11:"payer_email";s:20:"mwdowiak33@gmail.com";s:6:"txn_id";s:17:"0EX20152HD142800G";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075135";s:9:"last_name";s:7:"Wdowiak";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"1.17";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"1000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"30.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"ff9e56896f8df";}'),
(19, '2015-03-07 17:51:34', 'a:0:{}'),
(20, '2015-03-07 18:26:16', 'a:0:{}'),
(21, '2015-03-07 18:26:31', 'a:0:{}'),
(22, '2015-03-07 18:27:09', 'a:0:{}'),
(23, '2015-03-07 18:48:24', 'a:38:{s:8:"mc_gross";s:5:"30.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:48:19 Mar 07, 2015 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"1.17";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AYkfPMj3Yw-OwsXtwJg49fQYox8cAP4QGG0WN9MjtjrJkxsSdUnu-sey";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"3MT88711T6625122Y";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075135";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"1.17";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"1000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"30.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"7bdd6a5e3e206";}'),
(24, '2015-03-08 18:29:37', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:29:32 Mar 08, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A21kmBLyRcQpDSjYvmswlm3ckjahAdN7vo8m150d4S7yM7L2LlZSyHv0";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"5PL81593L97743514";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3086050";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:15:"5 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"759170fd221eb";}'),
(25, '2015-03-09 22:11:40', 'a:38:{s:8:"mc_gross";s:5:"30.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"AVELS58W7YF98";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"15:11:35 Mar 09, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:7:"Mariusz";s:6:"mc_fee";s:4:"1.17";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"Alseivcq5qbgooazn1CH.wt3MbptAGrPEVE0yt.p1CzPyak3CdPxT3Z3";s:11:"payer_email";s:20:"mwdowiak33@gmail.com";s:6:"txn_id";s:17:"3VF8827099986381H";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075135";s:9:"last_name";s:7:"Wdowiak";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"1.17";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"1000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"30.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"9bf594becd37b";}'),
(26, '2015-03-22 19:16:05', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"12:15:56 Mar 22, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AGu.hbwMxRXoqDiyy-IJNOnULnvNAOJSVLXQj3T6kZ21vF1SyPrTLkSN";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"8AR886938L709434X";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3086050";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:15:"5 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"ffb71ae1a40ab";}'),
(27, '2015-03-22 19:47:01', 'a:38:{s:8:"mc_gross";s:5:"30.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"12:46:55 Mar 22, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"1.17";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AUol0pQ9oicCAA4wZHCA-EKiceopAp97qeTrqFWNAS8x328nIApl6P42";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"4SE51977HY522381P";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075135";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"1.17";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"1000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"30.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"86d86f61144ab";}'),
(28, '2015-04-05 01:49:36', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"18:49:30 Apr 04, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"Af9bPdxPdyWIWTj85.qiBq3Qf1iTA7wfVDRl6U7TFgJS7Isk8pbn.7Le";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"2P8554697P4358438";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"41224a8ee8ad6";}'),
(29, '2015-04-05 04:34:22', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"21:34:17 Apr 04, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"Ag4pR9LQv6eZmyD9b7-.KcIQV1SnA2FV4-Ew1jEHCOA-rKfFZf6ll-KJ";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"97L6947083452974S";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"f97a62a6df057";}'),
(30, '2015-04-05 04:36:12', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"21:36:06 Apr 04, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"Al8LBTdQUzlrupplVx64f1QoH2aVA1SHPetYmkv3bYXvV3QYTOAk4yp2";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"3P487665FN9901343";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:12:"a847e6b66650";}'),
(31, '2015-04-05 04:37:48', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"21:37:41 Apr 04, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AiPC9BjkCyDFQXbSkoZcgqH3hpacAh2n8xXd3KJDcllzIoF5kyue7.mn";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"4K294329W3718200K";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"15b407748e933";}'),
(32, '2015-04-05 05:39:09', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"22:39:02 Apr 04, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AFcWxV21C7fd0v3bYYYRCpSSRl31AdDpVdAsY.PSjAt6SbAvmj1K35x.";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"5VD887478S117813G";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"675816fe463eb";}'),
(33, '2015-04-05 05:43:58', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"22:43:55 Apr 04, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A.CSYz4u5IILQm5wM0J0JbJiIcEuAF-6dtzoQkt3X5IeEMeWtS.v1ioX";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"6N574103RR1644017";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:12:"63a7eb1727f9";}'),
(34, '2015-04-05 05:45:28', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"22:45:22 Apr 04, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AiPC9BjkCyDFQXbSkoZcgqH3hpacAetzpEIedgm2HqOcZiLBVPG24uES";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"2DT49663T51938919";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"7489d54a7c7e2";}'),
(35, '2015-04-05 05:47:09', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"22:47:05 Apr 04, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AwD4sJJmdrzDKNGw7KMAMuZSx1AHAv0A23As3xIhvOMDQzj5f3UwBQJE";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"6G138464G0963144E";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"e4f4dd363fe76";}'),
(36, '2015-04-05 05:48:53', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"22:48:49 Apr 04, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AeBa5YP.n6khP639B4oz-cTJgsewAFVYBPBzzD-i-tXsD1u6gu434bxk";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"3WT36229PR472240N";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:12:"531802317c85";}'),
(37, '2015-04-05 05:49:46', 'a:38:{s:8:"mc_gross";s:5:"60.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"22:49:41 Apr 04, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"2.04";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AFcWxV21C7fd0v3bYYYRCpSSRl31AbY9KwD.wRXzsqXgzzaoiRMFiwxr";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"8Y2973569K919230E";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075137";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"2.04";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"2000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"60.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:12:"2af262d26ba0";}'),
(38, '2015-04-05 16:55:15', 'a:38:{s:8:"mc_gross";s:5:"60.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"09:55:05 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"2.04";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A.4bKNMhIktwtcg-PxQmviEcm1RsAV.MvVhDT6eH9HjJT.nud5FDgl3r";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"6KK77075F67184358";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075137";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"2.04";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"2000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"60.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"fc927b843759f";}'),
(39, '2015-04-05 17:06:37', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:06:26 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AwEiTWoCohrcbQwbLrwZJ-2VS1NMA9c72rlS9JcdKSjswtJiLac8pTaw";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"5DF77039JH525073X";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"8552d18f17be5";}');
INSERT INTO `raw_log` (`id`, `created_timestamp`, `ipn_data_serialized`) VALUES
(40, '2015-04-05 17:09:07', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:08:53 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AzW7-2QlleD6xLUXkqJXwZc4AAodAXXUz3X7-5BT6Vi3OKirkeW8wCHX";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"6C05820361530691N";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"ad4b1969a9de9";}'),
(41, '2015-04-05 17:10:23', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:10:08 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A--8MSCLabuvN8L.-MHjxC9uypBtA8y1T5NkQzD-I7DATQ92JgZ3wZ6U";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"3BW52970P5198494G";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"8c9eea5d92afa";}'),
(42, '2015-04-05 17:12:12', 'a:38:{s:8:"mc_gross";s:5:"30.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:12:06 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"1.17";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AJax4KwBmLNEF1AwlhmrEb-gwnPZAC4.olKCf0NZoSOOlwIjaVOFeLaa";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"37A178936B469734F";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075135";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"1.17";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"1000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"30.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"6fd9b21e6dc11";}'),
(43, '2015-04-05 17:14:27', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:14:18 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AiKZhEEPLJjSIccz.2M.tbyW5YFwAj-muqbjJiJDkGpAtamPY5jL8PpK";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"2ED19167YU113190K";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3086050";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:15:"5 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"7fb7473722bb0";}'),
(44, '2015-04-05 17:16:12', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:16:07 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AI36sk2Aln3iC.t.mla1wMizPRcQAbOijQb5ZP3gAqpbMKcb3oBZEAEZ";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"33T03269MS138130D";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"4275328d2d16c";}'),
(45, '2015-04-05 17:19:14', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:19:03 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"Ah77rVzWiX5USsnJJ3dBw9oXkmnQA4Kk7bHmEDXw1IcwdM1p4ojlz0Y7";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"4FA76500M7858311D";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"78ceeb5830c10";}'),
(46, '2015-04-05 17:20:09', 'a:38:{s:8:"mc_gross";s:5:"60.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:20:06 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"2.04";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"ABmLIt-rsw6e4ghb-eEiLg0aJfnSA-9NlKcm4EfcfsV7A6wHR4GHnRfX";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"0V915778SN347564F";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075137";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"2.04";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"2000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"60.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"f20879d16a67c";}'),
(47, '2015-04-05 17:21:05', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:20:59 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"ArbxTA.-geWaVhpfclKxd9TLSrJHATC2Mha3pxerKLnfFdtMFV2SRm9B";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"0KF783901P805412W";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"b4b9f9b6f40d6";}'),
(48, '2015-04-05 17:22:20', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:22:13 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AutRq1BFhyAZ0EjiHxEcLnzY5EdDAM-VXliLQZYT2O4NZS9UJSHzQN9t";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"5B341253KX8962027";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"eda4eb3abc3a1";}'),
(49, '2015-04-05 17:24:44', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:24:38 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AfcbDiniZnPaMXTT1-dOGKFE0ivcAt7fTJhPQZcwIuoAuF8MNNFz5pMa";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"7FM905162A813032J";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"137b256eafd77";}'),
(50, '2015-04-05 17:32:16', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:32:12 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"Ai.5bQT0IEOAwZz0G2AWlZ32DvJdADlqnSvomWlPnxujrOydyIJ73gmV";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"290307499B0925054";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"dceb288d57927";}'),
(51, '2015-04-05 17:34:08', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:34:03 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AOh0tu.5JUQyG2Aao4MpntBA2sFjAp8FmUPowISBPDjdc.GR1DuSaJ0D";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"9VB1811728809222R";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"a102a988630a2";}'),
(52, '2015-04-05 17:35:24', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:35:19 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AGs52InFHk3cJ5j80u2Udq.A26J4AADJUIGrpuzzSvA0kueyuZ2e.4pd";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"2E1687344B579951A";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"9ab4b24ce9f4d";}'),
(53, '2015-04-05 17:36:40', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:36:31 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AiSR2StlHE2eLR.87SGxCbNjllAFAGCXgN3A01jS8P7i26h37mbIqE4Q";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"7DJ13237UG178542W";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"a45175983dd16";}'),
(54, '2015-04-05 17:38:56', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:38:51 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A4oEGE3xsraq9IjtQ9J3Qb1WhR-kASolKRphQBhXIriJ.b6Z4MqqfCGh";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"6CY24550Y8744752H";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"6d6bb7a36f6d9";}'),
(55, '2015-04-05 18:00:12', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"10:59:55 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AnrKqMM8aiEjckUOBTYy69ylGVuCAnF1JOxGLgdQsBWnFF.sYv3Sk9fJ";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"5WK95581BB084552D";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:12:"1db8398da804";}'),
(56, '2015-04-05 18:01:43', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:01:39 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"An5ns1Kso7MWUdW4ErQKJJJ4qi4-ArPIDOgHiQYwnEUfOg0-rxD3cJYm";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"5X603940CP175053H";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"8b054f92234ac";}'),
(57, '2015-04-05 18:06:23', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:06:13 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"ALBe4QrXe2sJhpq1rIN8JxSbK4RZAAc9fabPWe5Uj-DUjh5WZ6qRR52h";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"39K14044WL2657212";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"44e0cb55e1881";}'),
(58, '2015-04-05 18:30:15', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:30:08 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AwD4sJJmdrzDKNGw7KMAMuZSx1AHA.cmnSfpPKTQ1qZC7M8El3DLkZJ3";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"9GB67968WN6382503";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"1b6a217163319";}'),
(59, '2015-04-05 18:33:03', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:32:59 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AOH.JxXLRThnyE4tyiz8f.cTKbR2ADOiKrxIoZ-pqV.3K1xp6WmYvEn5";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"1LW06945NG1276023";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"b2751c91c0fa6";}'),
(60, '2015-04-05 18:35:59', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"11:35:52 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AZuRXZRkuk7frhfirfxxTkj0BDJGAQxa5TaFUTOTgTtVuxLCBb-Xr9eg";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"7AU028681A0290601";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:12:"a4cc9d2d8187";}'),
(61, '2015-04-05 19:03:07', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"12:03:03 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AanfqmupM8NC7KuUqyodVAIKx37YAEVfMuTTLfN.3rOBTr4cpiAJSCTj";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"60F81350RY624374S";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"23f31e57248fa";}'),
(62, '2015-04-05 19:18:56', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"12:18:50 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AIkKNboJiyuxWLOHUlzTd3lpqCSxAwLjJ9-nbfJ-rrlAHmG.b6bnnU.M";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"4XC85748B2269231S";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"8258733c88970";}'),
(63, '2015-04-05 19:51:50', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"12:51:42 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AqBqA1nSf.CEBj1d5rbDP.LO-woKAE5WAGoeerN5FJEHuNXv5.S42wmK";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"5J761455A3620672R";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"67d3f4f4559c3";}'),
(64, '2015-04-05 19:56:46', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"12:56:42 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AFcWxV21C7fd0v3bYYYRCpSSRl31AG9doQDYrt5GXRfVDfqE1KJqJ-iz";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"5KU58455UA6373037";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"e595d3848ffc3";}'),
(65, '2015-04-05 19:59:14', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"12:59:04 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AI36sk2Aln3iC.t.mla1wMizPRcQAhqFwJuGg3Ss3Fle0-A4g1vz-xJX";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"3F0423144R214811C";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"8ec8ae8a42376";}'),
(66, '2015-04-05 20:03:25', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"13:03:11 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AFcWxV21C7fd0v3bYYYRCpSSRl31AfX1Hr7AcOmOhMsPp1gZvXsk7Tc1";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"8B743722U8015872T";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"f93eb7abb7ae5";}'),
(67, '2015-04-05 20:05:17', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"13:05:09 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A--8MSCLabuvN8L.-MHjxC9uypBtACp1HPu3ygQ.BLB1YkM2WKBBoPtH";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"34T22167PC164300X";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"ad56a6a6b9d0e";}'),
(68, '2015-04-05 20:09:10', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"13:09:05 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AynlJ2zsmflH.74VEfIBZZJsEArxAysyFKcD.JDj4NFNfeWDpa6ejWQS";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"63P02786FL167905F";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"ade82630d8fed";}'),
(69, '2015-04-05 20:10:42', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"13:10:35 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AFcWxV21C7fd0v3bYYYRCpSSRl31AwixbwddmlL2A43V00B0KjnlYVO8";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"61F61639VV2010250";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"942c58999383a";}'),
(70, '2015-04-05 20:51:22', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"13:51:14 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AOh0tu.5JUQyG2Aao4MpntBA2sFjAT9QriG5eZ6ED.4rAtlu03lJyDEP";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"93V70519M0903222J";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"520df7b3ed23e";}'),
(71, '2015-04-05 21:17:22', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"14:17:14 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A.7n6Acd75CB8FdbeZyRGF.BoVPlAJUOBewEBn6UBZEZLNBAYUE-HJ.h";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"5N159910FK3513835";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"2dac2e98209ff";}'),
(72, '2015-04-05 21:27:30', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"14:27:23 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AQU0e5vuZCvSg-XJploSa.sGUDlpAqk2Xehgx6yYOJG3fLH0xzXoLcSV";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"06R20316NT026933D";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"e8a9df4abdf31";}'),
(73, '2015-04-06 00:04:29', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"17:04:23 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A--8MSCLabuvN8L.-MHjxC9uypBtArrLCFQi5ikNvz6lKEkaLrC2z7gB";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"4DM87885S8697431B";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"3eeee6e797283";}'),
(74, '2015-04-06 00:57:06', 'a:38:{s:8:"mc_gross";s:6:"100.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"17:56:58 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"3.20";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A0UjP6ffU-lDlhgfmNPH62qtU3NRAd-G-NKicuB09iArj.ZzEUWU7oww";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"91D75488RB800660X";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075139";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"3.20";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"5000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"100.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"79bdd5fd20d44";}');
INSERT INTO `raw_log` (`id`, `created_timestamp`, `ipn_data_serialized`) VALUES
(75, '2015-04-06 01:08:08', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"18:07:59 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AetgxQBy0AZ.0n-vhqWi-1ShaqpFAjnnA2vvA-Wt5jA2YVuqoR6tOoZP";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"0N862739GA1745946";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"832017e727bb6";}'),
(76, '2015-04-06 01:12:21', 'a:38:{s:8:"mc_gross";s:5:"30.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"18:12:17 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"1.17";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AYC5OHuaKCeGkdR2xQihlGY0ub74AX1cEMWfUO5MmR5lPfMnedhHCDRs";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"6NY7459961148702L";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075135";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"1.17";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"1000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"30.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"fc564823cc6a3";}'),
(77, '2015-04-06 01:17:04', 'a:38:{s:8:"mc_gross";s:6:"200.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"18:16:58 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"6.10";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"AJALhkU1nFnTnqDa3WS7TUC30c-8AnYntTkYouvNTjoSdM4Vq4dFyi-L";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"12495197445399340";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075140";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"6.10";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:19:"10000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"200.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:12:"ab9be330b2b7";}'),
(78, '2015-04-06 01:40:16', 'a:38:{s:8:"mc_gross";s:5:"60.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"18:40:10 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"2.04";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"ARzgAgKHDmJxNpJrYmwa7-mE9yWfA0C9eAYVfvYZkmAn2EOBAS40ItA4";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"0FL92434EA276223X";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075137";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"2.04";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"2000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"60.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"8cbc722cb4de6";}'),
(79, '2015-07-06 04:30:45', 'a:0:{}'),
(80, '2015-07-06 04:37:01', 'a:38:{s:8:"mc_gross";s:4:"5.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"21:36:56 Jul 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"0.45";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"A5v94doyzkAL45GWSOpp3GzSpU1aAFMJEv-hM97Ud23v3XTJeAYWggY5";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"7WT024513T4568844";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3177635";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"0.45";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:15:"5 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:4:"5.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"12513d5b15bd3";}');

-- --------------------------------------------------------

--
-- Table structure for table `recurring_payment_profiles`
--

CREATE TABLE IF NOT EXISTS `recurring_payment_profiles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `raw_log_id` int(10) DEFAULT NULL,
  `payment_cycle` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `txn_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `next_payment_date` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `residence_country` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `initial_payment_amount` double DEFAULT NULL,
  `memo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `rp_invoice_id` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `time_created` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `verify_sign` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `period_type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payer_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payer_email` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `receiver_email` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `payer_id` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `product_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `payer_business_name` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `shipping` double DEFAULT NULL,
  `amount_per_cycle` double DEFAULT NULL,
  `profile_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `notify_version` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `outstanding_balance` double DEFAULT NULL,
  `recurring_payment_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `product_name` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `ipn_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `creation_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `test_ipn` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recurring_payments`
--

CREATE TABLE IF NOT EXISTS `recurring_payments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `raw_log_id` int(10) DEFAULT NULL,
  `mc_gross` double DEFAULT NULL,
  `protection_eligibility` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `payment_date` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `payment_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `mc_fee` double DEFAULT NULL,
  `notify_version` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payer_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `verify_sign` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `txn_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payment_type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `receiver_email` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `receiver_id` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `txn_type` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mc_currency` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `residence_country` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `receipt_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `transaction_subject` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `reason_code` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `shipping` double DEFAULT NULL,
  `product_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `time_created` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `rp_invoice_id` varchar(127) COLLATE utf8_bin DEFAULT NULL,
  `ipn_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `creation_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `recurring_payment_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `test_ipn` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE IF NOT EXISTS `refunds` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `raw_log_id` int(10) DEFAULT NULL,
  `ipn_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `mc_gross` double DEFAULT NULL,
  `invoice` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `protection_eligibility` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `payer_id` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `address_street` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `payment_date` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `payment_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `charset` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `address_zip` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `mc_shipping` double DEFAULT NULL,
  `mc_handling` double DEFAULT NULL,
  `shipping` double DEFAULT NULL,
  `first_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `memo` text COLLATE utf8_bin,
  `last_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `mc_fee` double DEFAULT NULL,
  `address_country_code` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `address_name` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `notify_version` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `reason_code` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `custom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `address_country` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `address_city` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `verify_sign` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `payer_email` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `parent_txn_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `contact_phone` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `time_created` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `txn_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payment_type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payer_business_name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `address_state` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `receiver_email` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `receiver_id` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `mc_currency` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `residence_country` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `test_ipn` tinyint(1) DEFAULT '0',
  `transaction_subject` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `rp_invoice_id` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `recurring_payment_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `creation_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_payments`
--

CREATE TABLE IF NOT EXISTS `subscription_payments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `raw_log_id` int(10) DEFAULT NULL,
  `first_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `payer_email` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `memo` text COLLATE utf8_bin,
  `item_name` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `item_number` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `os0` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on0` varchar(65) COLLATE utf8_bin DEFAULT NULL,
  `os1` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `on1` varchar(65) COLLATE utf8_bin DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `payment_date` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `payment_type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `txn_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `mc_gross` double DEFAULT NULL,
  `mc_fee` double DEFAULT NULL,
  `payment_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `pending_reason` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `txn_type` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `mc_currency` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `reason_code` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `custom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `address_country` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `subscr_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payer_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `ipn_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `creation_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `test_ipn` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `raw_log_id` int(10) DEFAULT NULL,
  `custom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `subscr_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `subscr_date` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `subscr_effective` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `btn_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `period1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `period2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `period3` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `amount1` double DEFAULT NULL,
  `amount2` double DEFAULT NULL,
  `amount3` double DEFAULT NULL,
  `mc_amount1` double DEFAULT NULL,
  `mc_amount2` double DEFAULT NULL,
  `mc_amount3` double DEFAULT NULL,
  `memo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `recurring` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `reattempt` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `retry_at` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `recur_times` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `txn_id` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `payer_email` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `residence_country` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `mc_currency` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `verify_sign` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `payer_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `receiver_email` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `payer_id` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `notify_version` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `item_name` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `item_number` varchar(130) COLLATE utf8_bin DEFAULT NULL,
  `ipn_status` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `creation_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `txn_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `test_ipn` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `template_fields`
--

CREATE TABLE IF NOT EXISTS `template_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `field` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `value` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tunique` (`user_id`,`template_id`,`field`),
  KEY `template_id` (`template_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=655 ;

--
-- Dumping data for table `template_fields`
--

INSERT INTO `template_fields` (`id`, `user_id`, `template_id`, `field`, `value`) VALUES
(577, 60, 69, 'block1', '<p>Use this area to offer a short teaser of your email&#39;s content. Text here will show in the preview area of some email clients.</p>\n'),
(578, 60, 69, 'block2', '<p>Email not displaying correctly?<br />\n<a href="#" target="_blank">View it in your browser</a>.</p>\n'),
(579, 60, 69, 'block3', '<p><img src="templates/images/header_placeholder_600px.png" /></p>\n'),
(580, 60, 69, 'block4', '<h1>Designing Your Template</h1>\n\n<h3>Creating a good-looking email is simple</h3>\n\n<p>Customize your template by hovering over the text and clicking. This will activate the style editor. Set your fonts, colors, and styles. After setting your styling is all done you can click here in this area, delete the text, and start adding your own awesome content.<br />\n&nbsp;</p>\n\n<h2>Styling Your Content</h2>\n\n<p>Make your email easy to read</p>\n\n<p>After you enter your content, highlight the text you want to style and select the options you set in the style editor in the &quot;<em>styles</em>&quot; drop down box. Want to <a href="#" target="_blank">get rid of styling on a bit of text</a>, but having trouble doing it? Just use the &quot;<em>remove formatting</em>&quot; button to strip the text of any formatting and reset your style.</p>\n'),
(581, 60, 69, 'block5', '<p><a href="http://facebook.com">Follow on Twitter</a>&nbsp;&nbsp;&nbsp;<a href="#">Friend on Facebook</a></p>\n'),
(582, 60, 1, 'block1', '<h1>Dear Customer</h1>\n\n<p><br />\nI started my business because I thought I had something special to offer that could help others, and that would be profitable for me. I make a product that people want, or offer a service that people need. I am an expert in my field and have done a lot of work honing my skills or enhancing my products.<br />\n<br />\nI want to provide excellent service to you, I really do. But sometimes you make it hard to do that. When you call me on the phone and start screaming at me, or come into my place of business and are ranting and raving, it&rsquo;s really hard to help you. I understand that you&rsquo;re frustrated, but I&rsquo;m really trying my best, and screaming at me definitely doesn&rsquo;t help.<br />\n<br />\nWe all want, and deserve, to make a living, you and me both. I&rsquo;m delighted that I can provide you with something you want or need, and that you&rsquo;re willing to buy it from me. So let&rsquo;s make it work. With so many other things wrong in the world, doing business with each other shouldn&rsquo;t be such hard work. Thank you for listening. Now, let me place that order for you.<br />\n<br />\nHappy to serve you,<br />\n<br />\nYour vendor</p>\n'),
(583, 60, 1, 'block2', '<p><a href="#">Follow on Twitter</a>&nbsp;&nbsp;&nbsp;<a href="#">Friend on Facebook</a></p>\n'),
(584, 60, 5, 'block1', '<p>Mihai Was herer</p>\n'),
(585, 60, 5, 'block2', '<p>Email not displaying correctly?<br />\n<a href="#" target="_blank">View it in your browser</a>.</p>\n'),
(586, 60, 5, 'block3', '<p><img src="https://upload.wikimedia.org/wikipedia/commons/6/60/Singapore_River_top_view.jpg" style="height:675px; width:900px" /></p>\n'),
(587, 60, 5, 'block4', '<p><img src="templates/images/header_placeholder_260px.png" /></p>\n'),
(588, 60, 5, 'block5', '<h3>1111</h3>\n'),
(589, 60, 5, 'block6', '<p><img src="templates/images/header_placeholder_260px.png" /></p>\n'),
(590, 60, 5, 'block7', '<h3>R222222</h3>\n'),
(591, 60, 5, 'block8', '<p><a href="#">Follow on Twitter</a>&nbsp;&nbsp;&nbsp;<a href="#">Friend on Facebook</a></p>\n'),
(592, 60, 73, 'block1', '<p><a href="#" target="_blank"><img alt="Metronic" src="../app/templates/images/logo-2.gif" style="height:19px; width:115px" /></a></p>\n'),
(593, 60, 73, 'block2', '<p><a href="#" target="_blank"><img alt="Promo" src="../app/templates/images/promo.jpg" style="height:auto; width:680px" /></a></p>\n'),
(594, 60, 73, 'block3', '<p>Newest Products</p>\n'),
(595, 60, 73, 'block4', '<p><a href="#" target="_blank"><img alt="Goods 1" src="../app/templates/images/goods1.jpg" style="height:auto; width:272px" /></a></p>\n'),
(596, 60, 73, 'block5', '<p><a href="#" target="_blank">Lorem ipsum dolor sit</a></p>\n'),
(597, 60, 73, 'block6', '<p>$150</p>\n'),
(598, 60, 73, 'block7', '<p><a href="#" target="_blank"><img alt="Goods 2" src="../app/templates/images/goods2.jpg" style="height:auto; width:272px" /></a></p>\n'),
(599, 60, 73, 'block8', '<p><a href="#" target="_blank">Consectetuer sed et diam</a></p>\n'),
(600, 60, 73, 'block9', '<p>$400</p>\n'),
(601, 60, 73, 'block10', '<p><a href="#" target="_blank"><img alt="Goods 3" src="../app/templates/images/goods3.jpg" style="height:auto; width:272px" /></a></p>\n'),
(602, 60, 73, 'block11', '<p><a href="#" target="_blank">Diam nonumy nibh</a></p>\n'),
(603, 60, 73, 'block12', '<p>$320</p>\n'),
(604, 60, 73, 'block13', '<p><a href="#" target="_blank"><img alt="Goods 4" src="../app/templates/images/goods4.jpg" style="height:auto; width:272px" /></a></p>\n'),
(605, 60, 73, 'block14', '<p><a href="#" target="_blank">Nonumy nibh elit</a></p>\n'),
(606, 60, 73, 'block15', '<p>$680</p>\n'),
(607, 60, 73, 'block19', '<p>Need help? Call us!</p>\n'),
(608, 60, 73, 'block20', '<p>873-426-0028</p>\n'),
(609, 60, 73, 'block21', '<p>2015 &copy; Metronic. ALL Rights Reserved.</p>\n'),
(610, 60, 72, 'block1', '<p><a href="#" target="_blank"><img alt="Metronic" src="../app/templates/images/logo-2.gif" style="height:19px; width:115px" /></a></p>\n'),
(611, 60, 72, 'block2', '<p><a href="#" target="_blank"><img alt="Facebook" src="../app/templates/images/facebook-2.gif" style="height:19px; width:10px" /></a></p>\n'),
(612, 60, 72, 'block3', '<p><a href="#" target="_blank"><img alt="Twitter" src="../app/templates/images/twitter-2.gif" style="height:16px; width:19px" /></a></p>\n'),
(613, 60, 72, 'block4', '<p><a href="#" target="_blank"><img alt="Dribbble" src="../app/templates/images/dribbble-2.gif" style="height:19px; width:19px" /></a></p>\n'),
(614, 60, 72, 'block5', '<p>Diam nonumy <strong>nibh elit</strong> dolore amet</p>\n'),
(615, 60, 72, 'block6', '<p>Lorem ipsum dolor sit amet consectetuer sed<br />\ndiam nonumy nibh elit dolore dolor sit.</p>\n'),
(616, 60, 72, 'block7', '<p><a href="#" target="_blank"><img alt="30-DAYS FREE TRIAL" src="../app/templates/images/trial.gif" style="height:55px; width:308px" /></a></p>\n'),
(617, 60, 72, 'block8', '<p><img alt="Metronic" src="../app/templates/images/img1.jpg" style="height:138px; width:185px" /></p>\n'),
(618, 60, 72, 'block9', '<p><a href="#2" target="_blank">UNLIMITED LAYOUTS</a></p>\n'),
(619, 60, 72, 'block10', '<p>Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore. Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore. Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore.</p>\n'),
(620, 60, 72, 'block11', '<p><a href="#" target="_blank"><img alt="Metronic" src="../app/templates/images/img-2.jpg" style="height:138px; width:185px" /></a></p>\n'),
(621, 60, 72, 'block12', '<p><a href="#2" target="_blank">GREAT SUPPORT</a></p>\n'),
(622, 60, 72, 'block13', '<p>Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore. Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore. Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore.</p>\n'),
(623, 60, 71, 'block1', '<p><a href="#" target="_blank"><img alt="Metronic" src="../app/templates/images/logo-2.gif" style="height:19px; width:115px" /></a></p>\n'),
(624, 60, 71, 'block2', '<p><a href="#" target="_blank"><img alt="Facebook" src="../app/templates/images/facebook-2.gif" style="height:19px; width:10px" /></a></p>\n'),
(625, 60, 71, 'block3', '<p><a href="#" target="_blank"><img alt="Twitter" src="../app/templates/images/twitter-2.gif" style="height:16px; width:19px" /></a></p>\n'),
(626, 60, 71, 'block4', '<p><a href="#" target="_blank"><img alt="Dribbble" src="../app/templates/images/dribbble-2.gif" style="height:19px; width:19px" /></a></p>\n'),
(627, 60, 71, 'block5', '<p>Awesome User Expierence</p>\n'),
(628, 60, 71, 'block6', '<p>Lorem ipsum dolor sit amet consectetuer sed<br />\ndiam nonumy nibh elit dolore.</p>\n'),
(629, 60, 71, 'block7', '<p><a href="#" target="_blank"><img alt="30-DAYS FREE TRIAL" src="../app/templates/images/trial.gif" style="height:43px; width:193px" /></a></p>\n'),
(630, 60, 71, 'block8', '<p><a href="#1" target="_blank">UNLIMITED LAYOUTS</a></p>\n'),
(631, 60, 71, 'block9', '<p>Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore</p>\n'),
(632, 60, 71, 'block10', '<p><a href="#2" target="_blank">GREAT SUPPORT</a></p>\n'),
(633, 60, 71, 'block11', '<p>Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore</p>\n'),
(634, 60, 71, 'block12', '<p><a href="#3" target="_blank">CLEAN CODE</a></p>\n'),
(635, 60, 71, 'block13', '<p>Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore</p>\n'),
(636, 60, 71, 'block14', '<p><a href="#PRODUCTS" target="_blank">PRODUCTS</a> &nbsp;&nbsp;&nbsp;&nbsp;<img alt="|" src="../app/templates/images/dot.gif" style="height:9px; width:9px" />&nbsp;&nbsp;&nbsp;&nbsp; <a href="#FEATURES" target="_blank">FEATURES</a> &nbsp;&nbsp;&nbsp;&nbsp;<img alt="|" src="../app/templates/images/dot.gif" style="height:9px; width:9px" />&nbsp;&nbsp;&nbsp;&nbsp; <a href="#LAYOUTS" target="_blank">LAYOUTS</a> &nbsp;&nbsp;&nbsp;&nbsp;<img alt="|" src="../app/templates/images/dot.gif" style="height:9px; width:9px" />&nbsp;&nbsp;&nbsp;&nbsp; <a href="#SUPPORT" target="_blank">SUPPORT</a> &nbsp;&nbsp;&nbsp;&nbsp;<img alt="|" src="../app/templates/images/dot.gif" style="height:9px; width:9px" />&nbsp;&nbsp;&nbsp;&nbsp; <a href="#DISCOVER" target="_blank">DISCOVER</a></p>\n'),
(637, 60, 71, 'block15', '<p>Featured Works</p>\n'),
(638, 60, 71, 'block16', '<p><a href="#" target="_blank"><img alt="Image 1" src="../app/templates/images/img1.jpg" style="height:auto; width:185px" /></a></p>\n'),
(639, 60, 71, 'block17', '<p><a href="#" target="_blank"><img alt="Image 2" src="../app/templates/images/img-2.jpg" style="height:auto; width:185px" /></a></p>\n'),
(640, 60, 71, 'block18', '<p><a href="#" target="_blank"><img alt="Image 3" src="../app/templates/images/img3.jpg" style="height:auto; width:185px" /></a></p>\n'),
(641, 60, 71, 'block19', '<p><a href="#" target="_blank"><img alt="Evernote" src="../app/templates/images/evernote.gif" style="height:auto; width:125px" /></a></p>\n'),
(642, 60, 71, 'block20', '<p><a href="#" target="_blank"><img alt="Pinterest" src="../app/templates/images/pinterest.gif" style="height:auto; width:107px" /></a></p>\n'),
(643, 60, 71, 'block21', '<p><a href="#" target="_blank"><img alt="National Geographic" src="../app/templates/images/ng.gif" style="height:auto; width:100%" /></a></p>\n'),
(644, 60, 71, 'block22', '<p><a href="#" target="_blank"><img alt="Shopify" src="../app/templates/images/shopify.gif" style="height:auto; width:116px" /></a></p>\n'),
(645, 60, 71, 'block23', '<p>2015 &copy; Metronic. ALL Rights Reserved.</p>\n'),
(646, 60, 7, 'block1', '<p>Use this area to offer a short teaser of your email&#39;s content. Text here will show in the preview area of some email clients.</p>\n'),
(647, 60, 7, 'block2', '<p>Email not displaying correctly?<br />\n<a href="#" target="_blank">View it in your browser</a>.</p>\n'),
(648, 60, 7, 'block3', '<p><img src="templates/images/header_placeholder_600px.png" /></p>\n'),
(649, 60, 7, 'block4', '<h1>Designing Your Template</h1>\n\n<h3>Creating a good-looking email is simple</h3>\n\n<p>Customize your template by hovering over the text and clicking. This will activate the style editor. Set your fonts, colors, and styles. After setting your styling is all done you can click here in this area, delete the text, and start adding your own awesome content.<br />\n&nbsp;</p>\n\n<h2>Styling Your Content</h2>\n\n<p>Make your email easy to read</p>\n\n<p>After you enter your content, highlight the text you want to style and select the options you set in the style editor in the &quot;<em>styles</em>&quot; drop down box. Want to <a href="#" target="_blank">get rid of styling on a bit of text</a>, but having trouble doing it? Just use the &quot;<em>remove formatting</em>&quot; button to strip the text of any formatting and reset your style.</p>\n'),
(650, 60, 7, 'block5', '<p><img src="templates/images/header_placeholder_260px.png" /></p>\n'),
(651, 60, 7, 'block6', '<h3>Repeatable Content</h3>\n\n<p><a href="#" target="_blank">Repeatable sections</a> are noted with plus and minus signs so that you can add and subtract content blocks.<br />\n<br />\nYou can also get a little fancy; repeat blocks and remove all text to make image galleries, or do the opposite and remove images for text-only blocks.</p>\n'),
(652, 60, 7, 'block7', '<p><img src="templates/images/header_placeholder_260px.png" /></p>\n'),
(653, 60, 7, 'block8', '<h3>Repeatable Content</h3>\n\n<p><a href="#" target="_blank">Repeatable sections</a> are noted with plus and minus signs so that you can add and subtract content blocks.<br />\n<br />\nYou can also get a little fancy; repeat blocks and remove all text to make image galleries, or do the opposite and remove images for text-only blocks.</p>\n'),
(654, 60, 7, 'block9', '<p><a href="#">Follow on Twitter</a>&nbsp;&nbsp;&nbsp;<a href="#">Friend on Facebook</a></p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `picture` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `saved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `user_id`, `name`, `type`, `picture`, `saved`) VALUES
(1, 60, 'Basic', 'basic', 'basic.png', 1),
(69, 60, 'Basic-1-Column', 'basic', '1-column.png', 1),
(5, 60, 'Basic-1-2-Column', 'basic', '1-2-column.png', 1),
(7, 60, 'Basic-1-1-2-Column', 'basic', '1-1-2-column.png', 1),
(8, 60, 'Basic-1-1-3-Column', 'basic', '1-1-3-column.png', 0),
(70, 60, 'Welcome', 'theme', 'basic.png', 0),
(71, 60, 'Featured', 'theme', 'basic.png', 1),
(72, 60, 'Trial', 'theme', 'basic.png', 1),
(73, 60, 'Arrivals', 'theme', 'basic.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `role` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `emails` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `emails`, `timestamp`) VALUES
(59, 'mihai.sanfran@gmail.com', '0991b5625c1292ded687ab18dd2fd2f1', 'buyer', 1999, '2015-04-10 03:38:23'),
(60, 'admin', 'fe01ce2a7fbac8fafaed7c982a04e229', 'admin', 9766, '2015-07-04 03:07:16'),
(61, '', 'bf2794e53009393650a94ecb2d3f8c16', 'buyer', 0, '2015-07-06 04:30:45'),
(62, 'mihai.sanfran@gmail.com', '5573a3bcfcc68465996f774d7964ecda', 'buyer', 5, '2015-07-06 04:37:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
