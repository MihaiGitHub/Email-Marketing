-- phpMyAdmin SQL Dump
-- version 4.1.14.6
-- http://www.phpmyadmin.net
--
-- Host: db543846776.db.1and1.com
-- Generation Time: Oct 29, 2014 at 12:38 AM
-- Server version: 5.1.73-log
-- PHP Version: 5.4.4-14+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db543846776`
--

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
  `ip` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `country` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `region` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `timeopened` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1427 ;

--
-- Dumping data for table `campaign_emails`
--

INSERT INTO `campaign_emails` (`id`, `c_id`, `email`, `sent`, `opened`, `ip`, `country`, `region`, `timeopened`) VALUES
(1370, 'C54432374c52aa9.03351799', 'xelot00007@yahoo.com', 1, 1, '70.190.102.179', 'United States', 'Arizona', '10/18/2014 7:37 PM'),
(1369, 'C54432374c52aa9.03351799', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/18/2014 9:48 PM'),
(1368, 'C54432374c52aa9.03351799', 'mihai.sanfran@gmail.com', 1, 1, '66.249.83.90', 'United States', 'California', '10/18/2014 9:47 PM'),
(1365, 'C5443205d224bf3.89041242', 'mihai.sanfran@gmail.com', 1, 1, '66.249.83.90', 'United States', 'California', '10/18/2014 7:23 PM'),
(1366, 'C5443205d224bf3.89041242', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/18/2014 7:22 PM'),
(1367, 'C5443205d224bf3.89041242', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1390, 'C5446c2d0a036c8.23172010', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1389, 'C5446c2d0a036c8.23172010', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1388, 'C5446c2d0a036c8.23172010', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1387, 'C5446c241e23073.02901058', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1063, 'C52b647fb873807.86169624', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1064, 'C52b647fb873807.86169624', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1065, 'C52b647fb873807.86169624', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1066, 'C52b647fb873807.86169624', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1067, 'C52b647fb873807.86169624', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1068, 'C52b648934b4fb4.25311577', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1069, 'C52b648934b4fb4.25311577', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1070, 'C52b648934b4fb4.25311577', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1071, 'C52b648934b4fb4.25311577', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1072, 'C52b648934b4fb4.25311577', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1386, 'C5446c241e23073.02901058', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1385, 'C5446c241e23073.02901058', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1379, 'C5445ed14ba9265.48169191', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1380, 'C5445ed14ba9265.48169191', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1381, 'C5445ed14ba9265.48169191', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1382, 'C5445ed14ba9265.48169191', ' xelot00007@yahoo.com', 1, 1, '70.190.102.179', 'United States', 'Arizona', '10/21/2014 8:49 AM'),
(1383, 'C5445ed14ba9265.48169191', 'mihai.sanfran@gmail.com', 1, 2, '64.233.172.90', 'United States', 'California', '10/22/2014 9:38 PM'),
(1384, 'C5445ed14ba9265.48169191', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', 'United States', 'Washington', '10/21/2014 9:13 AM'),
(1402, 'C544806e5d2a519.85527785', 'xelot00007@yahoo.com', 1, 2, '70.190.102.179', 'United States', 'Arizona', '10/22/2014 4:17 PM'),
(1401, 'C544806e5d2a519.85527785', 'vilisei@gmail.com', 1, 0, '', '', '', ''),
(1400, 'C544806e5d2a519.85527785', 'mwdowiak33@gmail.com', 1, 0, '', '', '', ''),
(1399, 'C544806e5d2a519.85527785', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/22/2014 12:37 PM'),
(1398, 'C544806e5d2a519.85527785', 'mihai.sanfran@gmail.com', 1, 1, '64.233.172.90', 'United States', 'California', '10/22/2014 12:36 PM'),
(1397, 'C544806e5d2a519.85527785', 'eli_s85710@yahoo.com', 1, 0, '', '', '', ''),
(1145, 'C52c9f6d82f6b81.68812709', ' amadeusz33@q.com', 1, 0, '', '', '', ''),
(1146, 'C52c9f6d82f6b81.68812709', ' gft33@q.com', 1, 0, '', '', '', ''),
(1147, 'C52c9f6d82f6b81.68812709', ' templarit@q.com', 1, 0, '', '', '', ''),
(1148, 'C52c9f6d82f6b81.68812709', 'mwdowiak33@q.com', 1, 0, '', '', '', ''),
(1149, 'C52c9f6d82f6b81.68812709', 'mwdowiak@philosophyoflife.info', 1, 0, '', '', '', ''),
(1150, 'C52c9f9a9dfa516.88598391', ' amadeusz33@q.com', 1, 0, '', '', '', ''),
(1151, 'C52c9f9a9dfa516.88598391', ' gft33@q.com', 1, 0, '', '', '', ''),
(1152, 'C52c9f9a9dfa516.88598391', ' templarit@q.com', 1, 0, '', '', '', ''),
(1153, 'C52c9f9a9dfa516.88598391', 'mwdowiak33@q.com', 1, 0, '', '', '', ''),
(1154, 'C52c9f9a9dfa516.88598391', 'mwdowiak@philosophyoflife.info', 1, 0, '', '', '', ''),
(1371, 'C544408639d4b72.50314814', 'mwdowiak33@gmail.com', 1, 13, '65.55.129.188', 'United States', 'Washington', '10/19/2014 1:46 PM'),
(1372, 'C544408639d4b72.50314814', 'mwdowiak@snet.net', 1, 4, '24.130.53.197', 'United States', 'California', '10/19/2014 1:29 PM'),
(1373, 'C544413958bcf83.35367558', 'mihai.sanfran@gmail.com', 1, 1, '66.249.83.90', 'United States', 'California', '10/19/2014 4:59 PM'),
(1374, 'C544413958bcf83.35367558', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/19/2014 12:48 PM'),
(1375, 'C544413958bcf83.35367558', 'xelot00007@yahoo.com', 1, 1, '70.190.102.179', 'United States', 'Arizona', '10/19/2014 3:04 PM'),
(1376, 'C5444151f6cae61.20937215', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1377, 'C5444151f6cae61.20937215', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/19/2014 12:48 PM'),
(1378, 'C5444151f6cae61.20937215', 'xelot00007@yahoo.com', 1, 1, '70.190.102.179', 'United States', 'Arizona', '10/19/2014 3:04 PM'),
(1391, 'C5446c2fcde6928.43259872', 'eli_s85710@yahoo.com', 1, 0, '', '', '', ''),
(1392, 'C5446c2fcde6928.43259872', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1393, 'C5446c2fcde6928.43259872', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/21/2014 1:36 PM'),
(1394, 'C5446c2fcde6928.43259872', 'mwdowiak33@gmail.com', 1, 11, '24.130.53.197', 'United States', 'California', '10/25/2014 10:07 AM'),
(1395, 'C5446c2fcde6928.43259872', 'vilisei@gmail.com', 1, 0, '', '', '', ''),
(1396, 'C5446c2fcde6928.43259872', 'xelot00007@yahoo.com', 1, 1, '70.190.102.179', 'United States', 'Arizona', '10/21/2014 4:15 PM'),
(1403, 'C544939e8e144b8.69565771', 'eli_s85710@yahoo.com', 1, 0, '', '', '', ''),
(1404, 'C544939e8e144b8.69565771', 'mihai.sanfran@gmail.com', 1, 1, '66.249.85.45', 'United States', 'Texas', '10/23/2014 10:27 AM'),
(1405, 'C544939e8e144b8.69565771', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/23/2014 10:26 AM'),
(1406, 'C544939e8e144b8.69565771', 'mwdowiak33@gmail.com', 1, 0, '', '', '', ''),
(1407, 'C544939e8e144b8.69565771', 'vilisei@gmail.com', 1, 0, '', '', '', ''),
(1408, 'C544939e8e144b8.69565771', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1409, 'C544a9f262b54a0.99267571', 'eli_s85710@yahoo.com', 1, 1, '72.37.244.36', 'United States', 'Arizona', '10/24/2014 12:01 PM'),
(1410, 'C544a9f262b54a0.99267571', 'mihai.sanfran@gmail.com', 1, 1, '64.233.172.90', 'United States', 'California', '10/24/2014 12:36 PM'),
(1411, 'C544a9f262b54a0.99267571', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', 'United States', 'Washington', '10/24/2014 11:52 AM'),
(1412, 'C544a9f262b54a0.99267571', 'xelot00007@yahoo.com', 1, 2, '70.190.102.179', 'United States', 'Arizona', '10/28/2014 1:41 PM'),
(1413, 'C544ac8e7a4c3e3.35069871', 'eli_s85710@yahoo.com', 1, 0, '', '', '', ''),
(1414, 'C544ac8e7a4c3e3.35069871', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1415, 'C544ac8e7a4c3e3.35069871', 'mihai6744@hotmail.com', 1, 4, '65.55.129.188', 'United States', 'Washington', '10/24/2014 3:15 PM'),
(1416, 'C544ac8e7a4c3e3.35069871', 'xelot00007@yahoo.com', 1, 2, '70.190.102.179', 'United States', 'Arizona', '10/24/2014 3:18 PM'),
(1417, 'C544accbea71e81.97338062', 'eli_s85710@yahoo.com', 1, 0, '', '', '', ''),
(1418, 'C544accbea71e81.97338062', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1419, 'C544accbea71e81.97338062', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/24/2014 3:03 PM'),
(1420, 'C544accbea71e81.97338062', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1421, 'C544ad6dd4598e7.63081989', 'eli_s85710@yahoo.com', 1, 0, '', '', '', ''),
(1422, 'C544ad6dd4598e7.63081989', 'mihai.sanfran@gmail.com', 1, 1, '64.233.172.90', 'United States', 'California', '10/24/2014 5:29 PM'),
(1423, 'C544ad6dd4598e7.63081989', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/24/2014 3:47 PM'),
(1424, 'C544ad6dd4598e7.63081989', 'mwdowiak33@gmail.com', 1, 10, '65.55.129.188', 'United States', 'Washington', '10/26/2014 5:38 PM'),
(1425, 'C544ad6dd4598e7.63081989', 'vilisei@gmail.com', 1, 0, '', '', '', ''),
(1426, 'C544ad6dd4598e7.63081989', 'xelot00007@yahoo.com', 1, 2, '70.190.102.179', 'United States', 'Arizona', '10/24/2014 3:47 PM');

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
('C5446c241e23073.02901058', 5, 36, 'ProfessionaWide', 'Mihai', 'mihai6744@hotmail.com', '10/21/2014 1:29 PM'),
('C5445ed14ba9265.48169191', 3, 31, 'newsletter', 'mihai', 'mihai@hotmail.com', '10/20/2014 10:20 PM'),
('C544806e5d2a519.85527785', 5, 37, 'IT Services', 'TemplarIT', 'mwdowiak33@gmail.com', '10/22/2014 12:35 PM'),
('C52c9f6d82f6b81.68812709', 4, 18, 'Home For Sale', 'Mark', '', ''),
('C52c9f9a9dfa516.88598391', 4, 18, 'Test', 'Mark', '', ''),
('C54432374c52aa9.03351799', 5, 36, 'Sent Test', 'Mihai', 'mihai004@gmail.com', '10/18/2014 10:35 PM'),
('C544408639d4b72.50314814', 4, 39, 'Real Estate', 'Mark', 'mwdowiak33@gmail.com', '10/19/2014 2:52 PM'),
('C544413958bcf83.35367558', 5, 36, 'Newsletter', 'Mihai', 'mihai004@gmail.com', '10/19/2014 3:40 PM'),
('C5444151f6cae61.20937215', 5, 36, 'TemplarIt Solutions', 'Mihai', 'mihai.sanfran@gmail.com', '10/19/2014 12:46 PM'),
('C5446c2d0a036c8.23172010', 5, 36, 'Professional', 'Mihai', 'mwdowiak33@gmail.com', '10/21/2014 1:32 PM'),
('C5446c2fcde6928.43259872', 5, 37, 'IT Services', 'TemplarIT', 'mwdowiak33@gmail.com', '10/21/2014 1:33 PM'),
('C544939e8e144b8.69565771', 5, 37, 'IT Services', 'TemplarIT', 'mwdowiak33@gmail.com', '10/23/2014 10:24 AM'),
('C544a9f262b54a0.99267571', 5, 36, 'International', 'Mihai', 'mihai004@gmail.com', '10/24/2014 11:49 AM'),
('C544ac8e7a4c3e3.35069871', 5, 36, 'Email Subject', 'TemplarIT', 'mwdowiak33@gmail.com', '10/24/2014 2:47 PM'),
('C544accbea71e81.97338062', 5, 36, 'IT Services', 'TemplarIT', 'mwdowiak33@gmail.com', '10/24/2014 3:03 PM'),
('C544ad6dd4598e7.63081989', 5, 37, 'IT Services', 'TemplarIT', 'mwdowiak33@gmail.com', '10/24/2014 3:46 PM');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `useremail` (`list_id`,`email`),
  KEY `user` (`list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26913 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `list_id`, `email`) VALUES
(26892, 37, 'mwdowiak33@gmail.com'),
(26899, 39, 'mwdowiak@snet.net'),
(26898, 39, 'mwdowiak33@gmail.com'),
(26896, 37, 'eli_s85710@yahoo.com'),
(26895, 37, 'mihai.sanfran@gmail.com'),
(26868, 31, ' mihailiviu@yahoo.com'),
(26869, 31, ' xelot00007@yahoo.com'),
(26870, 31, ' ilooktheysmile@yahoo.com'),
(26871, 31, ' mihai004@gmail.com'),
(26894, 37, 'xelot00007@yahoo.com'),
(26867, 31, 'mihai6744@hotmail.com'),
(26883, 31, 'mihai.sanfran@gmail.com'),
(26885, 34, 'xelot00007@yahoo.com'),
(26886, 34, 'mihai6744@hotmail.com'),
(26893, 37, 'mihai6744@hotmail.com'),
(26888, 36, 'mihai6744@hotmail.com'),
(26889, 36, 'mihai.sanfran@gmail.com'),
(26890, 36, 'xelot00007@yahoo.com'),
(26897, 37, 'vilisei@gmail.com'),
(26912, 36, 'vilisei@gmail.com');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `user_id`, `name`, `created`) VALUES
(31, 3, 'Test List', '10/10/2013'),
(39, 4, 'Test', '10/19/2014'),
(37, 5, 'TemplarIT', '10/12/2014'),
(34, 3, 'Small List', '01/19/2014'),
(36, 5, 'International', '10/11/2014');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=299 ;

--
-- Dumping data for table `template_fields`
--

INSERT INTO `template_fields` (`id`, `user_id`, `template_id`, `field`, `value`) VALUES
(117, 3, 2, '-9', 'SMITH							tempor pulvinar erat ut blandit. Nam et erat diam, vel egestas enim.									'),
(90, 4, 6, '1', 'INFORMATION ABOUT TEMPLAR IT							'),
(91, 4, 6, '4', 'Best IT solutions on the market							'),
(92, 4, 6, '2', 'I am testing this particular template.						'),
(93, 4, 6, '3', 'TEMPLAR IT provides Information Technology services to residential and business customers.  We offer affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.  As a result, we are proud to offer wide range of services for home and small to medium size business environments.<br />\n						'),
(94, 4, 6, '5', 'TEMPLAR IT provides Information Technology services to residential and business customers.  We offer affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.  As a result, we are proud to offer wide range of services for home and small to medium size business environments.<br />\n							'),
(95, 3, 7, '1', 'Hello Mihai Smarandache,				'),
(166, 5, 8, '-2', 'http://www.templarit.com/'),
(165, 5, 8, '-1', 'http://www.templarit.com/'),
(101, 3, 9, '1', '444NEWSLETTER							'),
(102, 3, 9, '2', 'I545076a1b625b.jpg'),
(103, 3, 9, '3', 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis se5555m nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio t non							'),
(104, 3, 9, '4', '333Second feature							'),
(105, 3, 9, '5', 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sol4444licitudin, lorem quisn							'),
(106, 3, 9, '6', 'Third feat4444ure							'),
(107, 3, 9, '7', 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Ae3333nean sollicitudin, lorem quisn							'),
(108, 3, 9, '8', 'SPECIAL 333COLUMN							'),
(109, 3, 9, '9', 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum au2222ctor, nisi elit consequat ipsum,							'),
(110, 3, 7, '2', 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum5555 auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. <br />\n<br><br><br />\nMauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.<br />\n<br><br><br />\nOn behalf of the Company<br><br />\nName Surname							'),
(116, 5, 2, '-9', 'TEMPLAR IT provides Information Technology services to residential and business customers offering affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and <br />\n<br><br><br><br><br><br><br><br><br />\n<a href="http://www.templarit.com/"><br><br><br><br><br />\nTemplar IT</a><br><br><br><br><br />\n<br><br><br><br><br />\n<br><br><br><br><br />\n<br><br><br />\n<br><br><br />\n<br><br><br />\nknowledge.â€‹ As a result, we deliver wide <br><br><br />\n<br><br><br />\n<br><br><br />\n<br><br><br />\n<br><br><br />\nrange of IT services and products for small and medium size environments including server-desktop virtualization and cloud solutions.http://www.templarit.com/																																																																			'),
(118, 5, 2, 'A543ad83c8f78a.txt', 'emails.txt'),
(164, 5, 8, '0', 'http://www.templarit.com/'),
(159, 5, 8, '-7', 'TEMPLAR IT provides Information Technology services to residential and business customers offering affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.â€‹ As a result, we deliver wide range of IT services and products for small and medium size environments including server-desktop virtualization and cloud solutions.																'),
(160, 5, 8, '-6', 'IT SUPPORT															'),
(161, 5, 8, '-5', 'NETWORK SUPPORT														'),
(162, 5, 8, '-4', 'WEB DEVELOPMENT															'),
(163, 5, 8, '-3', 'Templar IT Solutions LLC, 2942 N 24th St., Suite 114-514, Phoenix, AZ, 85016| Tel: 860-478-7583 | ITsupport@templarit.net														'),
(123, 5, 7, '-9', 'TemplarIT					'),
(124, 5, 7, '-5', 'http://www.templarit.com/'),
(125, 5, 7, '-8', 'TemplarIT Solutions		'),
(126, 5, 7, '-7', 'TEMPLAR IT provides Information Technology services to residential and business customers offering affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.â€‹ As a result, we deliver wide range of IT services and products for small and medium size environments including server-desktop virtualization and cloud solutions.'),
(127, 5, 7, '-6', 'Templar IT Solutions LLC, 2942 N 24th St., Suite 114-514, Phoenix, AZ, 85016| Tel: 860-478-7583 | ITsupport@templarit.net					'),
(135, 5, 7, 'A543c77bcaa7e4.jpg', '0a843a_f887ec247009487d9500967e38cbec86.jpg_srz_p_988_491_75_22_0.50_1.20_0.00_jpg_srz.jpg'),
(158, 5, 8, '-8', 'IT SERVICES'),
(157, 5, 8, '1', 'I543cad34d0925.jpg'),
(156, 5, 8, '-9', 'TemplarIT												'),
(167, 5, 9, '-9', 'Templar IT				'),
(168, 5, 9, '-8', '											'),
(169, 5, 9, '2', 'I543f3700e0b68.jpg'),
(170, 5, 9, '-7', 'IT Services					'),
(171, 5, 9, '-6', 'TEMPLAR IT provides Information Technology services to residential and business customers offering affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.â€‹ As a result, we deliver wide range of IT services and products for small and medium size environments including server-desktop virtualization and cloud solutions.							'),
(172, 5, 9, '-5', 'Network Support				'),
(173, 5, 9, '-3', 'Web Development				'),
(174, 5, 9, '-4', 'Residential and business solutions including: network design, implementation, administration, and security.							'),
(175, 5, 9, '-2', 'Design and development of business websites, logos, and custom build web applications.â€‹							'),
(176, 5, 9, '1', 'Templar IT Solutions LLC, 2942 N 24th St., Suite 114-514, Phoenix, AZ, 85016| Tel: 860-478-7583 | ITsupport@templarit.net								'),
(177, 5, 9, '-1', 'IT SUPPORT						'),
(178, 5, 9, '0', 'Management and installation of home/business computers, remote assistance, and managed IT services.â€‹						'),
(179, 5, 9, '5', 'http://www.templarit.com/'),
(180, 5, 9, '6', 'http://www.templarit.com/'),
(181, 5, 9, '7', 'http://www.templarit.com/'),
(182, 5, 9, '8', 'http://www.templarit.com/'),
(248, 5, 11, '-5', '<em>Copyright Â© 2014 TemplarIT, All rights reserved.777</em>	'),
(249, 5, 11, '-6', 'As the year comes to a close, I''d like to take the opportunity to thank you, Generitech''s loyal supporters, for your continued commitment to experiencing the difference with our powerful products and solutions.<br><br>I''ve learned a lot from your feedback this year, and from the countless surveys and polls Generitech has conducted. I''ve learned that you''re leaders in your industries. Your innovation is both groundbreaking and wave-making. I''ve learned that streamlining your company''s communication efforts is your #1 priority.<br><br>I hope that our tools and solutions have improved the way you do business this year. I hope that our around-the-clock support team has impressed you with their knowledge and friendliness. I hope that your company''s messaging and support streams improved when you partnered with Generitech. I hope that you''ve taken advantage of our Leadership Summits, Tools Expos and free whitepapers. If not, I hope you''ll get involved in the new year, and I look forward to hearing your feedback.<br><br>Follow us on Twitter at <a href="#">@genitech</a>, and let us know how we''re doing.<br><br>Thanks for a great year.<br><br><br>22Sincerely,<br><br>Gary Terry<br><em>President, Generitech Solutions</em><br><br>	888	'),
(250, 5, 11, '-8', '<br><h1>A Letter From The President</h1>		'),
(251, 5, 11, '-9', 'Use this ar5555ea to offer a short preview of your email''s content.	'),
(252, 5, 10, '-5', 'I544807b099310.png'),
(253, 5, 10, '-6', '<em>Copyright 44444Â© 2014 Ramada Investments LLC, All rights reserved.</em>	'),
(254, 5, 10, '-7', '<strong>Dear Generitech Customers</strong>,<br><br>As the year comes to a close, I''d like to take the opportunity to thank you, Generitech''s loyal supporters, for your continued commitment to experiencing the difference with our powerful products and solutions.<br><br>I''ve learned a lot from your feedback this year, and from the countless surveys and polls Generitech has conducted. I''ve learned that you''re leaders in your industries. Your innovation is both groundbreaking and wave-making. I''ve learned that streamlining your company''s communication efforts is your #1 priority.<br><br>I hope that our tools and solutions have improved the way you do business this year. I hope that our around-the-clock support team has impressed you with their knowledge and friendliness. I hope that your company''s messaging and support streams improved when you partnered with Generitech. I hope that you''ve taken advantage of our Leadership Summits, Tools Expos and free whitepapers. If not, I hope you''ll get involved in the new year, and I look fo33333333rward to hearing your feedback.<br><br>Follow us on Twitter at <a href="#">@generitech</a>, and let us know how we''re doing.<br><br>Thanks for a great year.<br><br><br>Sincerely,<br><br>Gary Terry<br><em>President, Generitech Solutions</em><br><br>	'),
(255, 5, 10, '-8', '<h1>A Letter From The President</h1>		'),
(256, 5, 11, '-4', 'I544807d0a46e0.png'),
(260, 3, 10, '-5', 'I5445ee64cc0f8.JPG'),
(261, 5, 11, '-7', '<h3>Dear Generitech Customers,</h3>		'),
(262, 5, 10, '-9', 'Use this area to offer a short preview of your email''s conwwwtent.	'),
(294, 5, 1, '-2', ''),
(295, 5, 1, '-3', ''),
(296, 5, 1, '-4', 'Do you have a home full of devices that seem to have their own agenda?  Now all of your devices can work together in seamless, wireless state so your family can enjoy their favorites at the same time on one network. <br />\n <br />\nSmart Home Network is the all-in-one solution that powers the connected homes of today and tomorrow.  It smoothly connects all your devices, so everyone can enjoy their favorite activities.'),
(293, 5, 1, '9', 'https://www.facebook.com/TemplarIT.au'),
(291, 5, 1, '-5', '<strong class="subtitle" style="display: block; font-size: 11px; font-family: Verdana; text-transform: uppercase; margin: 0 0 10px 0;">All-in-One Smart Home Solution</strong><br />\n	'),
(292, 5, 1, '8', 'http://www.templarit.com/'),
(288, 5, 1, '4', 'Design and development of business websites, logos, and custom build web applications.â€‹'),
(289, 5, 1, '-7', '<strong class="subtitle" style="display: block; font-size: 11px; font-family: Verdana; text-transform: uppercase; margin: 0 0 10px 0;">OVERVIEW</strong><br />\n	'),
(290, 5, 1, '-6', 'TEMPLAR IT provides Information Technology services to residential and business customers offering affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.â€‹ As a result, we deliver wide range of IT services and products for small and medium size environments including server-desktop virtualization and cloud solutions.'),
(287, 5, 1, '3', 'WEB DEVELOPMENT<br />\n	'),
(283, 5, 1, '-1', 'IT SUPPORT'),
(284, 5, 1, '0', 'Management and installation of home/business computers, remote assistance, and managed IT services.â€‹'),
(285, 5, 1, '1', 'NETWORK SUPPORT'),
(286, 5, 1, '2', 'Residential and business solutions including: network design, implementation, administration, and security'),
(281, 5, 1, '-9', 'Templar IT Solutions'),
(282, 5, 1, '-8', '<br />\n		<div class="list" style="color: #cc0000; text-transform: uppercase; font-family: Verdana; font-size: 11px; text-decoration: none;"><br />\n			<strong class="subtitle" style="display: block; font-size: 11px; font-family: Verdana; text-transform: uppercase; margin: 0 0 10px 0;"><br />\n			<br><br />\n		<div class="list" style="color: #cc0000; text-transform: uppercase; font-family: Verdana; font-size: 11px; text-decoration: none;"><br><br />\n			<strong class="subtitle" style="display: block; font-size: 11px; font-family: Verdana; text-transform: uppercase; margin: 0 0 10px 0;"><br><br />\n			<img src="images/bullet.gif" alt="" style="border: 0;">it support<br><img src="images/bullet.gif" alt="" style="border: 0;">network support<br><img src="images/bullet.gif" alt="" style="border: 0;">web development<br><img src="images/bullet.gif" alt="" style="border: 0;">about templar it<br></strong><br><br />\n		</div><br><br />\n				</strong><br />\n		</div><br />\n	'),
(297, 5, 1, '7', 'I544ad6bdabc4a.jpg'),
(298, 5, 1, '6', 'I544ad6c6c2ec0.jpg');

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
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `user_id`, `name`, `type`, `picture`) VALUES
(1, 3, 'Elegant Email', 'Newsletter', 'lcolumn.png'),
(2, 3, 'Simple Text', 'Basic', 'basic.png'),
(5, 3, 'Featured Homes', 'Real Estate', 'realestate.jpg'),
(7, 3, 'Tech Simple', 'Technology', 'nocolumn.png'),
(8, 3, 'Tech Full', 'Technology', '3column.png'),
(9, 3, 'Tech Column', 'Technology', 'rcolumn.png'),
(10, 3, 'Professional', 'Responsive', 'professional.jpg'),
(11, 3, 'Professional Wide', 'Responsive', 'Professional_wide.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `timestamp`) VALUES
(4, 'mark', 'ea82410c7a9991816b5eeeebe195e20a', '2013-09-23 04:21:02'),
(3, 'smith', 'a66e44736e753d4533746ced572ca821', '2013-08-10 23:36:14'),
(5, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '2013-10-11 05:29:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
