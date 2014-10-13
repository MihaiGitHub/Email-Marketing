-- phpMyAdmin SQL Dump
-- version 4.1.14.5
-- http://www.phpmyadmin.net
--
-- Host: db543846776.db.1and1.com
-- Generation Time: Oct 13, 2014 at 02:13 PM
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
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `list_id`, `subject`, `email_from`) VALUES
('C52b64d72d4ab55.19650269', 3, 31, 'Email from Mihai', 'Chris Weidman'),
('C52b64df218c185.01292174', 3, 31, 'Email from Mihai', 'Chris Weidman'),
('C52b651f454e787.18728909', 3, 31, 'Emails', 'Chris Weidman'),
('C52b6526e9b62f6.96654976', 3, 31, 'Emails', 'Alexander Gustaffson'),
('C52b652c69c8464.65045700', 3, 31, 'Emails', 'Alexander Gustaffson'),
('C52b657169a3d70.89853669', 3, 31, 'Emails', 'Alexander Gustaffson'),
('C52b65760c28775.23325440', 3, 31, 'Emails', 'Alexander Gustaffson'),
('C52b666aa36ef35.93929223', 3, 31, 'Account Deletion', 'Chris Weidman'),
('C52b667bf3f2303.09376647', 3, 31, 'This is it!', 'Chris Weidman'),
('C52b667f37ae0b4.26191393', 3, 31, 'This is it!', 'Chris Weidman'),
('C52b66ca6648212.00627060', 3, 31, 'aNOTHER tEST', 'Alexander Gustaffson'),
('C52b66e2ce9f306.73469951', 3, 31, 'Last one', 'Chris Weidman'),
('C52c9f3ce1b69d3.02699311', 3, 31, 'Email from Mihai', 'Chris Weidman'),
('C52c9f40ac681a3.48787785', 3, 31, 'Open Me', 'Chris Weidman'),
('C52c9f6d82f6b81.68812709', 4, 18, 'Home For Sale', 'Mark'),
('C52c9f9a9dfa516.88598391', 4, 18, 'Test', 'Mark'),
('C52d21cbe7d63a3.10207041', 3, 31, 'Account Deletion', 'Chris Weidman'),
('C52d6261b33e142.81112149', 3, 31, 'Email from Mihai', 'Alexander Gustaffson'),
('C52d62741b13eb1.66370720', 3, 31, 'Emails', 'Alexander Gustaffson'),
('C52dc2879e1af27.97660099', 3, 31, 'From Mihai', 'Chris Weidman'),
('C52dc2a52c214d8.96901950', 3, 31, 'Open Me', 'Alexander Gustaffson'),
('C52dc2ab9ca5516.62902915', 3, 34, 'Account Deletion', 'Mihai Smarandache'),
('C5439c15b8609a5.33675147', 5, 36, 'Email Subject', 'Mihai'),
('C5439de323f3849.61851197', 5, 36, 'Email Subject', 'Mihai'),
('C5439de383fe8c8.76040797', 5, 36, 'Email Subject', 'Mihai'),
('C543ad5d276bc85.43727913', 5, 36, 'Yahooo!', 'Chris Weidman'),
('C543ad8470f1e85.32180725', 5, 33, 'Yahooo!', 'Chris Weidman'),
('C543ad88cb849a9.18192961', 5, 36, 'Yahooo!', 'Chris Weidman'),
('C543aec5475e3d0.72712654', 5, 36, 'Yahooo!', 'Chris Weidman'),
('C543aecb9becc47.38496073', 5, 36, 'Yahooo!', 'Chris Weidman'),
('C543aef887b6be2.93499167', 5, 36, 'Yahooo!2', 'Chris Weidman'),
('C543af80d5221f8.73134786', 5, 36, 'Yahooo!3', 'Chris Weidman'),
('C543b1c828c6a82.92242842', 5, 33, 'IT Services', 'TemplarIT'),
('C543b258bc179a3.84288648', 5, 36, 'Yahooo!', 'Chris Weidman'),
('C543b2d0db45505.24790862', 5, 37, 'IT Services', 'TemplarIT'),
('C543b324d926b50.96173297', 5, 36, 'IT Services', 'TemplarIT'),
('C543b34025aad66.66717846', 5, 36, 'Yahooo!3', 'Chris Weidman'),
('C543b34a8735278.32653732', 5, 36, 'Yahooo!', 'Chris Weidman'),
('C543b35f2b11763.83285558', 5, 36, 'IP Address Test', 'Chris Weidman'),
('C543b373dbb76e6.74165707', 5, 36, 'IP Address Test2', 'TemplarIT'),
('C543b38044b5a45.95986735', 5, 36, 'IP Address Test3', 'Chris Weidman'),
('C543b3c7bb647a0.91940373', 5, 37, 'IT Services', 'TemplarIT'),
('C543b687fca80d2.11728828', 5, 37, 'IT Services', 'Mihai'),
('C543b6cca908616.36061085', 5, 36, 'Link Test', 'Chris Weidman');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1267 ;

--
-- Dumping data for table `campaign_emails`
--

INSERT INTO `campaign_emails` (`id`, `c_id`, `email`, `sent`, `opened`, `ip`, `country`, `region`, `timeopened`) VALUES
(1102, 'C52b657169a3d70.89853669', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1098, 'C52b657169a3d70.89853669', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1099, 'C52b657169a3d70.89853669', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1101, 'C52b657169a3d70.89853669', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1100, 'C52b657169a3d70.89853669', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1097, 'C52b652c69c8464.65045700', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1093, 'C52b652c69c8464.65045700', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1094, 'C52b652c69c8464.65045700', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1096, 'C52b652c69c8464.65045700', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1095, 'C52b652c69c8464.65045700', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1092, 'C52b6526e9b62f6.96654976', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1088, 'C52b6526e9b62f6.96654976', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1091, 'C52b6526e9b62f6.96654976', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1090, 'C52b6526e9b62f6.96654976', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1089, 'C52b6526e9b62f6.96654976', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1087, 'C52b651f454e787.18728909', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1083, 'C52b651f454e787.18728909', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1086, 'C52b651f454e787.18728909', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1085, 'C52b651f454e787.18728909', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1084, 'C52b651f454e787.18728909', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1082, 'C52b64df218c185.01292174', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1078, 'C52b64df218c185.01292174', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1081, 'C52b64df218c185.01292174', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1080, 'C52b64df218c185.01292174', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1079, 'C52b64df218c185.01292174', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
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
(1103, 'C52b65760c28775.23325440', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1104, 'C52b65760c28775.23325440', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1105, 'C52b65760c28775.23325440', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1106, 'C52b65760c28775.23325440', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1107, 'C52b65760c28775.23325440', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
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
(1118, 'C52b667f37ae0b4.26191393', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1119, 'C52b667f37ae0b4.26191393', ' xelot00007@yahoo.com', 1, 1, '24.251.46.139', 'United States', 'Arizona', '12/21/2013 9:19 PM'),
(1120, 'C52b667f37ae0b4.26191393', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1121, 'C52b667f37ae0b4.26191393', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1122, 'C52b667f37ae0b4.26191393', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '12/21/2013 9:18 PM'),
(1123, 'C52b66ca6648212.00627060', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1124, 'C52b66ca6648212.00627060', ' xelot00007@yahoo.com', 1, 2, '24.251.46.139', '', '', '12/21/2013 9:40 PM'),
(1125, 'C52b66ca6648212.00627060', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1126, 'C52b66ca6648212.00627060', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1127, 'C52b66ca6648212.00627060', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', 'United States', 'Washington', '12/21/2013 9:39 PM'),
(1128, 'C52b66e2ce9f306.73469951', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1129, 'C52b66e2ce9f306.73469951', ' xelot00007@yahoo.com', 1, 1, '24.251.46.139', '', '', '12/21/2013 9:45 PM'),
(1130, 'C52b66e2ce9f306.73469951', ' ilooktheysmile@yahoo.com', 1, 1, '24.251.46.139', 'United States', 'Arizona', '12/21/2013 9:50 PM'),
(1131, 'C52b66e2ce9f306.73469951', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1132, 'C52b66e2ce9f306.73469951', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', '', '', '12/21/2013 10:09 PM'),
(1133, 'C52c9f3ce1b69d3.02699311', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1134, 'C52c9f3ce1b69d3.02699311', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1135, 'C52c9f3ce1b69d3.02699311', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1136, 'C52c9f3ce1b69d3.02699311', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1137, 'C52c9f3ce1b69d3.02699311', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1138, 'C52c9f3ce1b69d3.02699311', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
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
(1155, 'C52d21cbe7d63a3.10207041', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1156, 'C52d21cbe7d63a3.10207041', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1157, 'C52d21cbe7d63a3.10207041', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1158, 'C52d21cbe7d63a3.10207041', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1159, 'C52d21cbe7d63a3.10207041', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1160, 'C52d21cbe7d63a3.10207041', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1161, 'C52d6261b33e142.81112149', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1162, 'C52d6261b33e142.81112149', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1163, 'C52d6261b33e142.81112149', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1164, 'C52d6261b33e142.81112149', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1165, 'C52d6261b33e142.81112149', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1166, 'C52d6261b33e142.81112149', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
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
(1179, 'C52dc2a52c214d8.96901950', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1180, 'C52dc2a52c214d8.96901950', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1181, 'C52dc2a52c214d8.96901950', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1182, 'C52dc2a52c214d8.96901950', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1183, 'C52dc2a52c214d8.96901950', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1184, 'C52dc2a52c214d8.96901950', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1185, 'C52dc2ab9ca5516.62902915', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1186, 'C52dc2ab9ca5516.62902915', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1187, 'C5439c15b8609a5.33675147', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1188, 'C5439c15b8609a5.33675147', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1189, 'C5439c15b8609a5.33675147', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1190, 'C5439de323f3849.61851197', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1191, 'C5439de323f3849.61851197', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1192, 'C5439de323f3849.61851197', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1193, 'C5439de383fe8c8.76040797', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1194, 'C5439de383fe8c8.76040797', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1195, 'C5439de383fe8c8.76040797', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1196, 'C543ad5d276bc85.43727913', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1197, 'C543ad5d276bc85.43727913', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1198, 'C543ad5d276bc85.43727913', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1199, 'C543ad8470f1e85.32180725', 'mynewemail@yahoo.com', 1, 0, '', '', '', ''),
(1200, 'C543ad8470f1e85.32180725', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1201, 'C543ad8470f1e85.32180725', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1202, 'C543ad8470f1e85.32180725', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1203, 'C543ad8470f1e85.32180725', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1204, 'C543ad8470f1e85.32180725', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1205, 'C543ad8470f1e85.32180725', 'mwdowiak333@q.com', 1, 0, '', '', '', ''),
(1206, 'C543ad88cb849a9.18192961', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1207, 'C543ad88cb849a9.18192961', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1208, 'C543ad88cb849a9.18192961', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1209, 'C543aec5475e3d0.72712654', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1210, 'C543aec5475e3d0.72712654', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1211, 'C543aec5475e3d0.72712654', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1212, 'C543aecb9becc47.38496073', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1213, 'C543aecb9becc47.38496073', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1214, 'C543aecb9becc47.38496073', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1215, 'C543aef887b6be2.93499167', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1216, 'C543aef887b6be2.93499167', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1217, 'C543aef887b6be2.93499167', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1218, 'C543af80d5221f8.73134786', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1219, 'C543af80d5221f8.73134786', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1220, 'C543af80d5221f8.73134786', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1221, 'C543b1c828c6a82.92242842', ' ilooktheysmile@yahoo.com', 1, 0, '', '', '', ''),
(1222, 'C543b1c828c6a82.92242842', ' mihai004@gmail.com', 1, 0, '', '', '', ''),
(1223, 'C543b1c828c6a82.92242842', ' mihailiviu@yahoo.com', 1, 0, '', '', '', ''),
(1224, 'C543b1c828c6a82.92242842', ' xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1225, 'C543b1c828c6a82.92242842', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1226, 'C543b1c828c6a82.92242842', 'mwdowiak333@gmail.com', 1, 0, '', '', '', ''),
(1227, 'C543b1c828c6a82.92242842', 'mwdowiak333@q.com', 1, 0, '', '', '', ''),
(1228, 'C543b1c828c6a82.92242842', 'mynewemail@yahoo.com', 1, 0, '', '', '', ''),
(1229, 'C543b258bc179a3.84288648', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1230, 'C543b258bc179a3.84288648', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1231, 'C543b258bc179a3.84288648', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1232, 'C543b2d0db45505.24790862', 'mihai.sanfran@gmail.com', 1, 3, '64.233.172.90', 'United States', 'California', '10/12/2014 7:01 PM'),
(1233, 'C543b2d0db45505.24790862', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', 'United States', 'Washington', '10/13/2014 10:38 AM'),
(1234, 'C543b2d0db45505.24790862', 'mwdowiak333@gmail.com', 1, 0, '', '', '', ''),
(1235, 'C543b2d0db45505.24790862', 'xelot00007@yahoo.com', 1, 1, '70.190.102.179', 'United States', 'Arizona', '10/12/2014 6:47 PM'),
(1236, 'C543b324d926b50.96173297', 'mihai.sanfran@gmail.com', 1, 2, '64.233.172.90', 'United States', 'California', '10/12/2014 7:08 PM'),
(1237, 'C543b324d926b50.96173297', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/13/2014 10:38 AM'),
(1238, 'C543b324d926b50.96173297', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1239, 'C543b34025aad66.66717846', 'mihai.sanfran@gmail.com', 1, 1, '64.233.172.90', '', '', '10/12/2014 10:09 PM'),
(1240, 'C543b34025aad66.66717846', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', 'United States', 'Washington', '10/13/2014 10:38 AM'),
(1241, 'C543b34025aad66.66717846', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1242, 'C543b34a8735278.32653732', 'mihai.sanfran@gmail.com', 1, 1, '64.233.172.90', 'United States', 'California', '10/12/2014 7:11 PM'),
(1243, 'C543b34a8735278.32653732', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', 'United States', 'Washington', '10/13/2014 10:37 AM'),
(1244, 'C543b34a8735278.32653732', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1245, 'C543b35f2b11763.83285558', 'mihai.sanfran@gmail.com', 1, 1, '64.233.172.90', 'United States', 'California', '10/12/2014 7:17 PM'),
(1246, 'C543b35f2b11763.83285558', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', 'United States', 'Washington', '10/13/2014 10:37 AM'),
(1247, 'C543b35f2b11763.83285558', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1248, 'C543b373dbb76e6.74165707', 'mihai.sanfran@gmail.com', 1, 1, '', 'United States', 'California', '10/12/2014 7:22 PM'),
(1249, 'C543b373dbb76e6.74165707', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', 'United States', 'Washington', '10/13/2014 10:37 AM'),
(1250, 'C543b373dbb76e6.74165707', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1251, 'C543b38044b5a45.95986735', 'mihai.sanfran@gmail.com', 1, 0, '', '', '', ''),
(1252, 'C543b38044b5a45.95986735', 'mihai6744@hotmail.com', 1, 1, '65.55.129.188', 'United States', 'Washington', '10/13/2014 10:37 AM'),
(1253, 'C543b38044b5a45.95986735', 'xelot00007@yahoo.com', 1, 0, '', '', '', ''),
(1254, 'C543b3c7bb647a0.91940373', 'eli_s85710@yahoo.com', 1, 0, '', '', '', ''),
(1255, 'C543b3c7bb647a0.91940373', 'mihai.sanfran@gmail.com', 1, 1, '64.233.172.90', 'United States', 'California', '10/12/2014 7:47 PM'),
(1256, 'C543b3c7bb647a0.91940373', 'mihai6744@hotmail.com', 1, 0, '', '', '', ''),
(1257, 'C543b3c7bb647a0.91940373', 'mwdowiak333@gmail.com', 1, 0, '', '', '', ''),
(1258, 'C543b3c7bb647a0.91940373', 'xelot00007@yahoo.com', 1, 1, '70.190.102.179', 'United States', 'Arizona', '10/12/2014 10:09 PM'),
(1259, 'C543b687fca80d2.11728828', 'eli_s85710@yahoo.com', 1, 0, '', '', '', ''),
(1260, 'C543b687fca80d2.11728828', 'mihai.sanfran@gmail.com', 1, 3, '64.233.172.90', 'United States', 'California', '10/12/2014 11:12 PM'),
(1261, 'C543b687fca80d2.11728828', 'mihai6744@hotmail.com', 1, 3, '65.55.129.188', 'United States', 'Washington', '10/13/2014 10:37 AM'),
(1262, 'C543b687fca80d2.11728828', 'mwdowiak333@gmail.com', 1, 0, '', '', '', ''),
(1263, 'C543b687fca80d2.11728828', 'xelot00007@yahoo.com', 1, 2, '70.190.102.179', 'United States', 'Arizona', '10/12/2014 10:53 PM'),
(1264, 'C543b6cca908616.36061085', 'mihai.sanfran@gmail.com', 1, 2, '64.233.172.90', 'United States', 'California', '10/12/2014 11:25 PM'),
(1265, 'C543b6cca908616.36061085', 'mihai6744@hotmail.com', 1, 2, '65.55.129.188', 'United States', 'Washington', '10/13/2014 10:37 AM'),
(1266, 'C543b6cca908616.36061085', 'xelot00007@yahoo.com', 1, 1, '70.190.102.179', 'United States', 'Arizona', '10/12/2014 11:10 PM');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=26897 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `list_id`, `email`) VALUES
(26892, 37, 'mwdowiak333@gmail.com'),
(26808, 18, 'mwdowiak33@q.com'),
(26809, 18, ' amadeusz33@q.com'),
(26810, 18, ' gft33@q.com'),
(26811, 18, ' templarit@q.com'),
(26884, 18, 'mwdowiak@philosophyoflife.info'),
(26821, 0, 'asdf'),
(26896, 37, 'eli_s85710@yahoo.com'),
(26895, 37, 'mihai.sanfran@gmail.com'),
(26868, 31, ' mihailiviu@yahoo.com'),
(26869, 31, ' xelot00007@yahoo.com'),
(26870, 31, ' ilooktheysmile@yahoo.com'),
(26871, 31, ' mihai004@gmail.com'),
(26872, 32, 'mihai6744@hotmail.com'),
(26873, 32, ' mihailiviu@yahoo.com'),
(26874, 32, ' xelot00007@yahoo.com'),
(26875, 32, ' ilooktheysmile@yahoo.com'),
(26876, 32, ' mihai004@gmail.com'),
(26894, 37, 'xelot00007@yahoo.com'),
(26842, 0, 'mihai6744@hotmail.com'),
(26843, 0, ' mihailiviu@yahoo.com'),
(26844, 0, ' xelot00007@yahoo.com'),
(26845, 0, ' ilooktheysmile@yahoo.com'),
(26846, 0, ' chiwun402@hotmail.com'),
(26847, 0, ' mihai004@gmail.com'),
(26867, 31, 'mihai6744@hotmail.com'),
(26883, 31, 'mihai.sanfran@gmail.com'),
(26885, 34, 'xelot00007@yahoo.com'),
(26886, 34, 'mihai6744@hotmail.com'),
(26893, 37, 'mihai6744@hotmail.com'),
(26888, 36, 'mihai6744@hotmail.com'),
(26889, 36, 'mihai.sanfran@gmail.com'),
(26890, 36, 'xelot00007@yahoo.com');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `user_id`, `name`, `created`) VALUES
(31, 3, 'Test List', '10/10/2013'),
(18, 4, 'Test', '0000-00-00'),
(32, 3, 'nEW lIST', '10/19/2013'),
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
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `user_id`, `name`, `type`) VALUES
(1, 3, 'Newsletter', ''),
(2, 3, 'Basic', ''),
(3, 3, 'Modern', 'tech'),
(4, 3, 'Modern Left', 'tech'),
(5, 3, 'Real Estate', 'real estate'),
(6, 3, 'Modern Right', 'tech'),
(7, 3, 'Tech Simple', 'tech'),
(8, 3, 'Tech Full', 'tech'),
(9, 3, 'Tech Column', 'tech');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=135 ;

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
(82, 3, 5, '1', 'MAIN TITLE	22						'),
(83, 3, 5, '3', '22Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer egestas, libero eget viverra nonummy, turpis diam scelerisque dui, eu tempor quam leo quis justo. Sed velit magna, vestibulum nec, aliquam a, placerat eget, odio. Sed mbattis, ipsum in sodales vestibulum, sem mi egestas felis, et adipiscing ante enim id metus. Etiam elit dui, congue quis, interdum in, venenatis ac, orci. Vivamus vulputate. Nullam ante. Aliquam ornare, nisl at consequat laoreet, orci sem cursus purus, a pulvinar diam sem ut metus. Donec eu erat non lorem lacinia commodo. Nunc bibendum. Aliquam euismod odio a nulla euismod rutrum. Proin lobortis leo. Maecenas non ante. Nam nibh. Morbi interdum elit non augue.							'),
(84, 4, 5, '7', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer egestas, libero eget viverra nonummy, turpis diam scelerisque dui, eu tempor quam leo quis justo. Sed velit magna, vestibulum nec, aliquam a, placerat eget, odio. Sed mbattis, ipsum in sodales vestibulum, sem mi egestas felis, et adipiscing ante enim id metus. Etiam elit dui, congue quis, interdum in, venenatis ac, orci. Vivamus vulputate. Nullam ante. Aliquam ornare, nisl at consequat laoreet, orci sem cursus purus, a pulvinar diam sem ut metus. Donec eu erat non lorem lacinia commodo. Nunc bibendum. Aliquam euismod odio a nulla euismod rutrum. Proin lobortis leo. Maecenas non ante. Nam nibh. Morbi interdum elit non augue.							'),
(85, 4, 5, '1', 'HOME FOR SALE						'),
(86, 4, 5, '4', 'HOME 2							'),
(87, 4, 5, '2', 'HOME 1							'),
(88, 4, 5, '5', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer egestas, libero eget viverra nonummy, turpis diam scelerisque dui, eu tempor quam leo quis justo. Sed velit magna, vestibulum nec, aliquam a, placerat eget, odio. Sed mbattis, ipsum in sodales vestibulum, sem mi egestas felis, et adipiscing ante enim id metus. Etiam elit dui, congue quis, interdum in, venenatis ac, orci. Vivamus vulputate. Nullam ante. Aliquam ornare, nisl at consequat laoreet, orci sem cursus purus, a pulvinar diam sem ut metus. Donec eu erat non lorem lacinia commodo. Nunc bibendum. Aliquam euismod odio a nulla euismod rutrum. Proin lobortis leo. Maecenas non ante. Nam nibh. Morbi interdum elit non augue.							'),
(89, 4, 5, '6', 'HOME 3						'),
(90, 4, 6, '1', 'INFORMATION ABOUT TEMPLAR IT							'),
(91, 4, 6, '4', 'Best IT solutions on the market							'),
(92, 4, 6, '2', 'I am testing this particular template.						'),
(93, 4, 6, '3', 'TEMPLAR IT provides Information Technology services to residential and business customers.  We offer affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.  As a result, we are proud to offer wide range of services for home and small to medium size business environments.<br />\n						'),
(94, 4, 6, '5', 'TEMPLAR IT provides Information Technology services to residential and business customers.  We offer affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.  As a result, we are proud to offer wide range of services for home and small to medium size business environments.<br />\n							'),
(95, 3, 7, '1', 'Hello Mihai Smarandache,				'),
(96, 3, 8, '1', 'Mihai Smarandache													'),
(97, 3, 8, '2', 'Lorem Ipsum. Proin gravida nibh vel  auctor aliquet. Aenean sollicitudin,  lorem quis bibendum 5555auctor, nisi elit consequat ipsum, nec sagittis sem	4444													'),
(98, 3, 8, '3', 'UPCOMIN4G 2							'),
(99, 3, 8, '4', '1UPCOMING 3							'),
(100, 3, 8, '5', '23UPCOMING 4							'),
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
(116, 5, 2, '-9', 'TEMPLAR IT provides Information Technology services to residential and business customers offering affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.â€‹ As a result, we deliver wide range of IT services and products for small and medium size environments including server-desktop virtualization and cloud solutions.							'),
(118, 5, 2, 'A543ad83c8f78a.txt', 'emails.txt'),
(119, 5, 8, '9', 'I543b300d75228.jpg'),
(120, 5, 8, '-9', 'TemplarIT										'),
(121, 5, 8, '-8', 'IT Services										'),
(122, 5, 8, '-7', 'TEMPLAR IT provides Information Technology services to residential and business customers offering affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.â€‹ As a result, we deliver wide range of IT services and products for small and medium size environments including server-desktop virtualization and cloud solutions.<br />\n 			'),
(123, 5, 7, '-9', 'TemplarIT					'),
(124, 5, 7, '-5', 'https://github.com/MihaiGitHub'),
(125, 5, 7, '-8', 'TemplarIT Solutions		'),
(126, 5, 7, '-7', 'TEMPLAR IT provides Information Technology services to residential and business customers offering affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.â€‹ As a result, we deliver wide range of IT services and products for small and medium size environments including server-desktop virtualization and cloud solutions.'),
(127, 5, 7, '-6', 'Templar IT Solutions LLC, 2942 N 24th St., Suite 114-514, Phoenix, AZ, 85016| Tel: 860-478-7583 | ITsupport@templarit.net					'),
(128, 5, 5, '-7', '999Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer egestas, libero eget viverra nonummy, turpis diam scelerisque dui, eu tempor quam leo quis justo. Sed velit magna, vestibulum nec, aliquam a, placerat eget, odio. Sed mbattis, ipsum in sodales vestibulum, sem mi egestas felis, et adipiscing ante enim id metus. Etiam elit dui, congue quis, interdum in, venenatis ac, orci. Vivamus vulputate. Nullam ante. Aliquam ornare, nisl at consequat laoreet, orci sem cursus purus, a pulvinar diam sem ut metus. Donec eu erat non lorem lacinia commodo. Nunc bibendum. Aliquam euismod odio a nulla euismod rutrum. Proin lobortis leo. Maecenas non ante. Nam nibh. Morbi interdum elit non augue.							'),
(129, 5, 7, 'A543b2cd8222a7.jpg', '857691_10100306648555908_1737751185_o.jpg'),
(130, 5, 8, '-6', 'IT Support					'),
(131, 5, 8, '-5', 'network support					'),
(132, 5, 8, '-4', 'web development							'),
(133, 5, 8, '-3', 'Templar IT Solutions LLC, 2942 N 24th St., Suite 114-514, Phoenix, AZ, 85016| Tel: 860-478-7583 | ITsupport@templarit.net				'),
(134, 5, 8, 'A543b3237b90c4.jpg', '0a843a_f887ec247009487d9500967e38cbec86.jpg_srz_p_988_491_75_22_0.50_1.20_0.00_jpg_srz.jpg');

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
