-- phpMyAdmin SQL Dump
-- version 4.1.14.5
-- http://www.phpmyadmin.net
--
-- Host: db543846776.db.1and1.com
-- Generation Time: Oct 19, 2014 at 11:17 PM
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
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `subject` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email_from` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email_replyto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sent` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `list_id`, `subject`, `email_from`, `email_replyto`, `sent`) VALUES
('C52b64d72d4ab55.19650269', 3, 31, 'Email from Mihai', 'Chris Weidman', '', ''),
('C52b666aa36ef35.93929223', 3, 31, 'Account Deletion', 'Chris Weidman', '', ''),
('C52b667bf3f2303.09376647', 3, 31, 'This is it!', 'Chris Weidman', '', ''),
('C52b66e2ce9f306.73469951', 3, 31, 'Last one', 'Chris Weidman', '', ''),
('C52c9f40ac681a3.48787785', 3, 31, 'Open Me', 'Chris Weidman', '', ''),
('C52c9f6d82f6b81.68812709', 4, 18, 'Home For Sale', 'Mark', '', ''),
('C52c9f9a9dfa516.88598391', 4, 18, 'Test', 'Mark', '', ''),
('C52d62741b13eb1.66370720', 3, 31, 'Emails', 'Alexander Gustaffson', '', ''),
('C52dc2879e1af27.97660099', 3, 31, 'From Mihai', 'Chris Weidman', '', ''),
('C54432374c52aa9.03351799', 5, 36, 'Sent Test', 'Mihai', 'mihai004@gmail.com', '10/18/2014 10:35 PM'),
('C544408639d4b72.50314814', 4, 39, 'Real Estate', 'Mark', 'mwdowiak33@gmail.com', '10/19/2014 2:52 PM'),
('C544413958bcf83.35367558', 5, 36, 'Newsletter', 'Mihai', 'mihai004@gmail.com', '10/19/2014 3:40 PM'),
('C5444151f6cae61.20937215', 5, 36, 'TemplarIt Solutions', 'Mihai', 'mihai.sanfran@gmail.com', '10/19/2014 12:46 PM');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_emails`
--

CREATE TABLE IF NOT EXISTS `campaign_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sent` int(11) NOT NULL DEFAULT '0',
  `opened` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `region` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `timeopened` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1379 ;

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
(1077, 'C52b64d72d4ab55.19650269', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1076, 'C52b64d72d4ab55.19650269', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1075, 'C52b64d72d4ab55.19650269', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1074, 'C52b64d72d4ab55.19650269', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1073, 'C52b64d72d4ab55.19650269', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
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
(1108, 'C52b666aa36ef35.93929223', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1109, 'C52b666aa36ef35.93929223', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1110, 'C52b666aa36ef35.93929223', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1111, 'C52b666aa36ef35.93929223', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1112, 'C52b666aa36ef35.93929223', 'mihai6744@hotmail.com', 1, 1, '24.251.46.139', 'United States', 'Arizona', '12/21/2013 9:14 PM'),
(1113, 'C52b667bf3f2303.09376647', ' mihailiviu@yahoo.com', 0, 0, '', '', '', ''),
(1114, 'C52b667bf3f2303.09376647', ' xelot00007@yahoo.com', 0, 0, '', '', '', ''),
(1115, 'C52b667bf3f2303.09376647', ' ilooktheysmile@yahoo.com', 0, 0, '', '', '', ''),
(1116, 'C52b667bf3f2303.09376647', ' mihai004@gmail.com', 0, 0, '', '', '', ''),
(1117, 'C52b667bf3f2303.09376647', 'mihai6744@hotmail.com', 0, 0, '', '', '', ''),
(1128, 'C52b66e2ce9f306.73469951', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1129, 'C52b66e2ce9f306.73469951', ' xelot00007@yahoo.com', 1, 1, '24.251.46.139', '', '', '12/21/2013 9:45 PM'),
(1130, 'C52b66e2ce9f306.73469951', ' ilooktheysmile@yahoo.com', 1, 1, '24.251.46.139', 'United States', 'Arizona', '12/21/2013 9:50 PM'),
(1131, 'C52b66e2ce9f306.73469951', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1132, 'C52b66e2ce9f306.73469951', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', '', '', '12/21/2013 10:09 PM'),
(1139, 'C52c9f40ac681a3.48787785', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1140, 'C52c9f40ac681a3.48787785', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1141, 'C52c9f40ac681a3.48787785', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1142, 'C52c9f40ac681a3.48787785', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1143, 'C52c9f40ac681a3.48787785', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1144, 'C52c9f40ac681a3.48787785', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
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
(1167, 'C52d62741b13eb1.66370720', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1168, 'C52d62741b13eb1.66370720', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1169, 'C52d62741b13eb1.66370720', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1170, 'C52d62741b13eb1.66370720', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1171, 'C52d62741b13eb1.66370720', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1172, 'C52d62741b13eb1.66370720', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1173, 'C52dc2879e1af27.97660099', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1174, 'C52dc2879e1af27.97660099', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1175, 'C52dc2879e1af27.97660099', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1176, 'C52dc2879e1af27.97660099', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1177, 'C52dc2879e1af27.97660099', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1178, 'C52dc2879e1af27.97660099', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1371, 'C544408639d4b72.50314814', 'mwdowiak33@gmail.com', 1, 13, '65.55.129.188', 'United States', 'Washington', '10/19/2014 1:46 PM'),
(1372, 'C544408639d4b72.50314814', 'mwdowiak@snet.net', 1, 4, '24.130.53.197', 'United States', 'California', '10/19/2014 1:29 PM'),
(1373, 'C544413958bcf83.35367558', 'mihai.sanfran@gmail.com', 1, 1, '66.249.83.90', 'United States', 'California', '10/19/2014 4:59 PM'),
(1374, 'C544413958bcf83.35367558', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/19/2014 12:48 PM'),
(1375, 'C544413958bcf83.35367558', 'xelot00007@yahoo.com', 1, 1, '70.190.102.179', 'United States', 'Arizona', '10/19/2014 3:04 PM'),
(1376, 'C5444151f6cae61.20937215', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1377, 'C5444151f6cae61.20937215', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/19/2014 12:48 PM'),
(1378, 'C5444151f6cae61.20937215', 'xelot00007@yahoo.com', 1, 1, '70.190.102.179', 'United States', 'Arizona', '10/19/2014 3:04 PM');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `useremail` (`list_id`,`email`),
  KEY `user` (`list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=26910 ;

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
(26897, 37, 'vilisei@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `created` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

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
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `picture` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `user_id`, `name`, `type`, `picture`) VALUES
(1, 3, 'Newsletter', '', 'lcolumn.png'),
(2, 3, 'Basic', '', 'basic.png'),
(5, 3, 'Real Estate', 'real estate', 'realestate.jpg'),
(7, 3, 'Tech Simple', 'tech', 'nocolumn.png'),
(8, 3, 'Tech Full', 'tech', '3column.png'),
(9, 3, 'Tech Column', 'tech', 'rcolumn.png'),
(10, 3, 'Professional', 'responsive', 'professional.jpg'),
(11, 3, 'Professional_wide', 'responsive', 'Professional_wide.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `template_fields`
--

CREATE TABLE IF NOT EXISTS `template_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `field` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `value` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tunique` (`user_id`,`template_id`,`field`),
  KEY `template_id` (`template_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=248 ;

--
-- Dumping data for table `template_fields`
--

INSERT INTO `template_fields` (`id`, `user_id`, `template_id`, `field`, `value`) VALUES
(75, 3, 1, '24', 'I52943033a54d3.jpg'),
(63, 3, 1, '1', 'The Elegant Email Company			22222					'),
(76, 3, 1, '25', 'I5294303fd70fe.jpg'),
(77, 5, 1, '24', 'I526c5ee040428.jpg'),
(78, 5, 1, '18', 'change the text						'),
(79, 3, 1, '0', '100_0324.jpg'),
(80, 3, 1, 'A529430cdbb864.jpg', '100_0324.jpg'),
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
(102, 3, 9, '2', 'Main Featu555re Story							'),
(103, 3, 9, '3', 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis se5555m nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio t non							'),
(104, 3, 9, '4', '333Second feature							'),
(105, 3, 9, '5', 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sol4444licitudin, lorem quisn							'),
(106, 3, 9, '6', 'Third feat4444ure							'),
(107, 3, 9, '7', 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Ae3333nean sollicitudin, lorem quisn							'),
(108, 3, 9, '8', 'SPECIAL 333COLUMN							'),
(109, 3, 9, '9', 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum au2222ctor, nisi elit consequat ipsum,							'),
(110, 3, 7, '2', 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum5555 auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. <br />\n<br><br><br />\nMauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.<br />\n<br><br><br />\nOn behalf of the Company<br><br />\nName Surname							'),
(111, 5, 1, '-1', 'dsdfsdf<br />\n												tempor pulvinar erat ut blandit. Nam et erat diam, vel egestas enim									'),
(112, 5, 1, '-9', 'The Elegant Email Co55555								'),
(113, 5, 1, 'A54188fef7ed81.jpg', 'd8f66fc900e09de67ea298c1512d854d.jpg'),
(114, 4, 1, '-9', 'The Elegant Email Company						'),
(116, 5, 2, '-9', 'TEMPLAR IT provides Information Technology services to residential and business customers offering affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and <br><br><br><br><br><br><br />\n<br><br><br><br><br><br><br />\n<a href="http://www.templarit.com/"><br><br><br />\nTemplar IT</a><br><br><br />\n<br><br><br />\n<br><br><br />\n<br />\n<br />\n<br />\nknowledge.â€‹ As a result, we deliver wide <br />\n<br />\n<br />\n<br />\n<br />\nrange of IT services and products for small and medium size environments including server-desktop virtualization and cloud solutions.http://www.templarit.com/																																																										'),
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
(182, 5, 9, '8', 'http://www.templarit.com/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

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
