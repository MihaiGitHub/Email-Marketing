-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: db543846776.db.1and1.com
-- Generation Time: Apr 17, 2015 at 12:02 AM
-- Server version: 5.1.73-log
-- PHP Version: 5.4.39-0+deb7u2

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
('C552745afac3844.45085396', 59, 48, 'asdf', 'asdf', 'asdf', '4/9/2015 8:38 PM');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1542 ;

--
-- Dumping data for table `campaign_emails`
--

INSERT INTO `campaign_emails` (`id`, `c_id`, `email`, `sent`, `opened`, `ip`, `country`, `region`, `timeopened`) VALUES
(1541, 'C552745afac3844.45085396', 'xelot00007@yahoo.com', 1, 1, '24.255.2.31', 'United States', 'Arizona', '4/9/2015 10:26 PM');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `useremail` (`list_id`,`email`),
  KEY `user` (`list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54657 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `list_id`, `email`) VALUES
(53724, 48, 'xelot00007@yahoo.com'),
(53725, 48, 'eli_s85710@yahoo.com'),
(53726, 48, 'adrianastanca@yahoo.fr'),
(53727, 48, 'adipablo72@yahoo.com'),
(53728, 48, 'flyhigher26@gmail.com'),
(53729, 48, 'adam.maria40@yahoo.com'),
(53730, 48, 'adipop@popservice.ro'),
(53731, 48, 'adicristescu73@yahoo.com'),
(53732, 48, 'abelean@yahoo.com'),
(53733, 48, 'adriana_decu@yahoo.com'),
(53734, 48, 'info@myhousedeals.com'),
(53735, 48, 'adciubotaru@gmail.com'),
(53736, 48, 'aborza@gmail.com'),
(53737, 48, 'afcgheorghita@yahoo.com'),
(53738, 48, 'adelin_dumitrache@yahoo.com'),
(53739, 48, 'abjorkdahl@eur.ibs-stl.org'),
(53740, 48, 'crsalemi@asu.edu'),
(53741, 48, 'achelariu@aol.com'),
(53742, 48, 'emendoza@fdbhealth.com'),
(53743, 48, 'adrianleu@yahoo.com'),
(53744, 48, 'adrian2011p@yahoo.com'),
(53745, 48, 'adrian_cranta@yahoo.com'),
(53746, 48, 'mihai004@gmail.com'),
(53747, 48, 'adrian.gitu@jurnaltv.md'),
(53748, 48, 'adelabradea@yahoo.com'),
(53749, 48, 'admin@conectii.ro'),
(53750, 48, 'mihai6744@hotmail.com'),
(53751, 48, 'adi_codreanu@yahoo.com'),
(53752, 48, 'ady.serban@yahoo.com'),
(53753, 48, 'adrianagrad81@yahoo.com'),
(53754, 48, 'aidrom@gmail.com'),
(53755, 48, 'adelajaneta@yahoo.com'),
(53756, 48, 'adina_p_2006@yahoo.com'),
(53757, 48, 'adicristi2005@yahoo.com'),
(53758, 48, 'acum@x3m.ro'),
(53759, 48, 'maggietheaggie@gmail.com'),
(53760, 48, 'actualitati@rornet.ro'),
(53761, 48, 'acor@acor.ro'),
(53762, 48, 'adela74sta@gmail.com'),
(53763, 48, 'adrianag@snspa.ro'),
(53764, 48, 'Dan.Falkner@tucsonaz.gov'),
(53765, 48, 'abonamentelumina@gmail.com'),
(53766, 48, 'administrator@cab.ro'),
(53767, 48, 'adrian_d_pop@hotmail.com'),
(53768, 48, 'aemkingserv@yahoo.com'),
(53769, 48, 'actualitateabotosaneana@yahoo.com'),
(53770, 48, 'abarnoschi2002@yahoo.com'),
(53771, 48, 'accraiova@gmail.com'),
(53772, 48, 'a_bursuc91@yahoo.com'),
(53773, 48, 'abrudanelena@yahoo.com'),
(53774, 48, 'mihailiviu@yahoo.com'),
(53775, 48, 'mwdowiak33@gmail.com'),
(53776, 48, 'adrianabarna2007@yahoo.com'),
(53777, 48, 'Thursdivina@gmail.com'),
(53778, 48, 'ager@bimos.ro'),
(53779, 48, 'ad@ear.ro'),
(53780, 48, 'acosmei@gmail.com'),
(53781, 48, 'acdc_vero@yahoo.com'),
(54343, 48, 'reply-446604-618722-f32f160a87c34386830af9b8cceed0'),
(53783, 48, 'adimun11@ymail.com'),
(53784, 48, 'accirstea@yahoo.com'),
(53785, 48, 'adiantihi@yahoo.com'),
(53786, 48, 'adriana_weimer@yahoo.com'),
(53787, 48, 'adela.lupes@gmail.com'),
(53788, 48, 'adv_1950@yahoo.com'),
(53789, 48, 'adelasava2007@yahoo.com'),
(53790, 48, 'a_bilcea@yahoo.com'),
(53791, 48, 'ady_mgg25@yahoo.com'),
(53792, 48, 'adriana.dogaru@rompetrol.com'),
(53793, 48, 'adriancioflanca@gmail.com'),
(53794, 48, 'adriana.tamasanu@gmail.com'),
(53795, 48, 'adi.but@gmail.com'),
(53796, 48, 'a_dar10@yahoo.com'),
(53797, 48, 'abalutactin@yahoo.com'),
(53798, 48, 'adelina.fulga@gmail.com'),
(53799, 48, 'adalachifor@yahoo.com'),
(53800, 48, 'a_bunda@hotmail.com'),
(53801, 48, 'a_cristescu02@yahoo.com'),
(53802, 48, 'ada_kiraly@bjc.ro'),
(53803, 48, 'adrian_erbiceanu@yahoo.ca'),
(53804, 48, 'adriaghe@yahoo.com'),
(53805, 48, 'adriana.seclaman@yahoo.com'),
(53806, 48, '99verma@gmail.com'),
(53807, 48, 'adibulz@yahoo.com'),
(53808, 48, 'adrpopes@yahoo.it'),
(53809, 48, 'abaseacaelena@yahoo.com'),
(53810, 48, 'fsmarandache@gmail.com'),
(53811, 48, 'adella_sit@yahoo.it'),
(53812, 48, 'bwpayne@ebay.com'),
(53813, 48, '_staicu2006@yahoo.com'),
(53814, 48, 'adriana.baghiu@radio-resita.ro'),
(53815, 48, 'adele_mir@yahoo.com'),
(53816, 48, 'adalbertgyuris@hotmail.com'),
(53817, 48, 'afanasiu@yahoo.com'),
(53818, 48, 'bdurfee@resultsdirect.com'),
(53819, 48, 'aarugina@aol.com'),
(53820, 48, 'adi652000@yahoo.com'),
(53821, 48, 'acivica@memorialulsighet.ro'),
(53822, 48, 'ilooktheysmile@yahoo.com'),
(54344, 48, '53zl25w000zg3wgtrx71x8f6au3qq9q2ipia8gu3dkmg1st@re'),
(53824, 48, 'acrmontreal@yahoo.ca'),
(53825, 48, 'abalutactin@k.ro'),
(53826, 48, 'agaz@chem.ubbcluj.ro'),
(53827, 48, 'adina.stoicescu@gmail.com'),
(53828, 48, 'Kylejbollinger@gmail.com'),
(53829, 48, 'do-not-reply@stackoverflow.com'),
(53830, 48, 'adamek_bogdan@yahoo.com'),
(53831, 48, 'acondeescu@yahoo.com'),
(53832, 48, 'actualitati@srr.ro'),
(53833, 48, 'aionel1@gmail.com'),
(53834, 48, 'adinaelenaromanescu@gmail.com'),
(53835, 48, 'adrian.vlaicu@cfrcalatori.ro'),
(53836, 48, 'ady_m7@yahoo.com'),
(53837, 48, 'adi.ianc@yahoo.com'),
(53838, 48, 'adelaliculescu@yahoo.com'),
(53839, 48, 'adrian.samarescu@tiparg.ro'),
(53840, 48, 'agendaculturala@yahoo.com'),
(53841, 48, 'a-ioan@t-online.de'),
(53842, 48, 'adrianasora62@yahoo.com'),
(53843, 48, 'abejan@acpub.duke.edu'),
(53844, 48, 'adinaprovimi@yahoo.com'),
(53845, 48, 'Charles.Patterson@tucsonaz.gov'),
(53846, 48, 'adrianbotez@cox.net'),
(53847, 48, 'adigiurgea@gmail.com'),
(53848, 48, 'adrianacazacu05@gmail.com'),
(53849, 48, 'gracefeng1984@163.com'),
(53850, 48, 'aculintanase2005@yahoo.com'),
(53851, 48, 'adrian.halpert@click.ro'),
(53852, 48, 'advertising@bucurestiwww.ro'),
(53853, 48, 'adrian.crupa@uaic.ro'),
(53854, 48, 'Adrian.biro@dedalusart.ro'),
(54341, 48, 'CXTSoftware-CXTS0299@applications.recruiterbox.com'),
(53856, 48, 'adig@bjc.ro'),
(53857, 48, 'aariam_a@yahoo.com'),
(53858, 48, 'diyang@ebay.com'),
(53859, 48, 'ady_speeder@yahoo.com'),
(53860, 48, 'afish@netvision.net.il'),
(53861, 48, 'adinamutar@enational.ro'),
(53862, 48, 'ajay.shinde@gmail.com'),
(53863, 48, '_livescu@yahoo.com'),
(53864, 48, 'adriana7st@yahoo.com'),
(54342, 48, 'adelina_dumitrescu2005@yahoo.com'),
(53866, 48, 'adoina73a@yahoo.com'),
(53867, 48, 'abipaun@yahoo.com'),
(53868, 48, 'adrian.enculescu@ziuaonline.ro'),
(53869, 48, 'adrianpaparuz10@yahoo.com'),
(53870, 48, 'agency@mcppress.ro'),
(53871, 48, 'a.zultner@yahoo.de'),
(53872, 48, 'adriana.iordache@casoc.ro'),
(53873, 48, 'aclau44@gmail.com'),
(53874, 48, 'a.costache@media-consulta.com'),
(53875, 48, 'ada_cecilia2005@yahoo.com'),
(53876, 48, 'adumitrache@hotmail.com'),
(53877, 48, 'adelaschindler@yahoo.com'),
(53878, 48, 'tucsongov@gmail.com'),
(53879, 48, '1945ioan@gmail.com'),
(53880, 48, 'ed.broussard@mudano.com'),
(53881, 48, 'adienamil1@yahoo.com'),
(53882, 48, 'acolada@editurapleiade.eu'),
(53883, 48, 'a.florea@xnet.ro'),
(53884, 48, 'a_ardelean@yahoo.com'),
(53885, 48, 'adrian.dinu@adevarulholding.ro'),
(53886, 48, 'adi_korek@yahoo.com'),
(53887, 48, 'achimstoian@yahoo.com'),
(53888, 48, 'adi_stoica2005@yahoo.com'),
(53889, 48, 'adriana.pirvan@yahoo.com'),
(53890, 48, 'aacupsa@yahoo.com'),
(53891, 48, 'adip@roedu.net'),
(53892, 48, 'jreddy.sovereigntec@gmail.com'),
(53893, 48, 'a.cujba@mail.ru'),
(53894, 48, 'adinadinitoiu@yahoo.com'),
(53895, 48, 'abogdanandrei@yahoo.com'),
(53896, 48, '20office@radiocraiova.ro'),
(53897, 48, 'adamant40@verizon.net'),
(53898, 48, 'deonoiliver@gmail.com'),
(53899, 48, 'Luke.Shea@CyberCoders.com'),
(53900, 48, 'achizitii@hasdeu.md'),
(53901, 48, 'adinacristiana74@yahoo.com'),
(53902, 48, 'AgoraRomanaLatina@hotmail.com'),
(53903, 48, 'aculina@rambler.ru'),
(53904, 48, 'adinablu@yahoo.com'),
(53905, 48, 'abca@magnolia.ro'),
(53906, 48, 'ady_stan2005@yahoo.com'),
(53907, 48, 'adrianvlad@ambra.ro'),
(53908, 48, 'Adriana.Radovici@piraeusbank.ro'),
(53909, 48, 'adrianciomaga@yahoo.com'),
(53910, 48, 'adrianabucur@yahoo.com'),
(53911, 48, 'acta.iassy.comp@gmail.com'),
(53912, 48, 'adibumb@yahoo.com'),
(53913, 48, 'adrian.scheul@gmail.com'),
(53914, 48, 'adrianaichim@yahoo.fr'),
(53915, 48, 'agoraromagnalatina@hotmail.com'),
(53916, 48, 'careers@t2000inc.com'),
(53917, 48, 'ada_elli_stuparu@yahoo.com'),
(53918, 48, 'admin@versul.ro'),
(53919, 48, 'jobs@fusionspim.com'),
(53920, 48, 'AB.Fodorac@t-online.de'),
(53921, 48, 'afloarei_anca_cjneamt@yahoo.com'),
(53922, 48, 'a_florina@yahoo.com'),
(53923, 48, 'adiss_adina31@yahoo.com'),
(53924, 48, 'agneta_ct@yahoo.com'),
(53925, 48, 'aer2629@yahoo.com'),
(53926, 48, 'a.lesenciuc@yahoo.fr'),
(53927, 48, 'adrian.cioroianu@gmail.com'),
(53928, 48, 'a_u_ro@yahoo.com'),
(53929, 48, 'adilutza78@gmail.com'),
(53930, 48, 'adella4you@yahoo.com'),
(53931, 48, 'adryan_1980@yahoo.com'),
(53932, 48, 'adrianluca@gmail.com'),
(53933, 48, 'adina_dumitresch@hotmail.com'),
(53934, 48, 'acf@infoiasi.ro'),
(53935, 48, 'actualitati@radiotimisoara.ro'),
(53936, 48, 'adrian1803@gmail.com'),
(53937, 48, 'adafaur@yahoo.com'),
(53938, 48, 'mark801@gmail.com'),
(53939, 48, 'ad.sumus@laposte.net'),
(53940, 48, 'adildiko@yahoo.com'),
(53941, 48, 'adrian.halpert@adevarul.ro'),
(53942, 48, 'fbvkv-4146383596@job.craigslist.org'),
(53943, 48, 'love3_forlife@yahoo.com'),
(53944, 48, 'agathe_h@yahoo.com'),
(53945, 48, 'adrianromila@yahoo.com'),
(53946, 48, 'adrianbanuta@yahoo.com'),
(53947, 48, 'adybindila@yahoo.com'),
(53948, 48, 'adinutzalovin@yahoo.com'),
(53949, 48, 'adytza75@yahoo.co.uk'),
(53950, 48, 'adi_calota@hotmail.com'),
(53951, 48, 'adriana.teodorescu0@gmail.com'),
(53952, 48, '12-stringer@cox.net'),
(53953, 48, 'adumitrescu@incsmps.ro'),
(53954, 48, 'rbrown@education.com'),
(53955, 48, 'jobs@ispot.com'),
(53956, 48, 'adrianl@arcim.ro'),
(53957, 48, 'adrian.rusu@cna.ro'),
(53958, 48, 'adi.lacraru@distins.ro'),
(53959, 48, 'agiu_elena@yahoo.com'),
(53960, 48, 'Cristina.Polsgrove@tucsonaz.gov'),
(53961, 48, 'acr_delia@yahoo.com'),
(53962, 48, 'adimitea@yahoo.com'),
(53963, 48, 'adrian_dichiseni@yahoo.com'),
(53964, 48, 'adabija@yahoo.com'),
(53965, 48, 'adrian_botez_senior@yahoo.com'),
(53966, 48, 'adrianmesescu@yahoo.com'),
(53967, 48, 'mihai.sanfran@gmail.com'),
(53968, 48, 'adriana_andreca@yahoo.com'),
(53969, 48, 'adriannita2010@yahoo.com'),
(53970, 48, 'aecksteinul@yahoo.com'),
(53971, 48, 'adiluc@rdslink.ro'),
(53972, 48, 'Kim.Beth@tucsonaz.gov'),
(53973, 48, 'adrian_pantazi@yahoo.com'),
(53974, 48, 'ACsaftari@providence.on.ca'),
(53975, 48, 'achelariu@verizon.net'),
(53976, 48, 'adlerrbert@googlemail.com'),
(53977, 48, 'ktakeda9+g4w@indeedemail.com'),
(53978, 48, 'adri98bej@yahoo.com'),
(53979, 48, 'adelaimoldovan@yahoo.com'),
(53980, 48, 'acristi@xnet.ro'),
(53981, 48, 'aida_bicu@yahoo.com'),
(53982, 48, 'aditaciobanu@gmail.com'),
(53983, 48, 'aiosif@zappmobile.ro'),
(53984, 48, 'adela.nagy@yahoo.com'),
(53985, 48, 'Lwyge21@yahoo.com.hk'),
(53986, 48, 'acsoftware2006@yahoo.com'),
(53987, 48, 'adrianapetrescu2003@yahoo.com'),
(53988, 48, 'aiftinca@acad.ro'),
(53989, 48, 'adclinci@yahoo.com'),
(53990, 48, 'adaionescumail@yahoo.com'),
(53991, 48, 'a_alexandru_avram@yahoo.com'),
(53992, 48, 'adela.adriana.moscu@gmail.com'),
(53993, 48, 'Adrian.Cosmescu@bnro.ro'),
(53994, 48, 'Christopher.Salemi@asu.edu'),
(53995, 48, 'adriachim@yahoo.com'),
(53996, 48, '1010surdu@rambler.ru'),
(53997, 48, 'a_creanga@hotmail.com'),
(53998, 48, 'adaselena@mail.ru'),
(53999, 48, 'ady_bazavan@yahoo.com'),
(54000, 48, 'magarc33@asu.edu'),
(54001, 48, 'adrian.nita7@gmail.com'),
(54002, 48, '2s4xxx4x@facebookmail.com'),
(54003, 48, 'agachecatinca@hotmail.com'),
(54004, 48, 'adonaida@yahoo.com'),
(54005, 48, 'adimelicovici10@yahoo.co.uk'),
(54006, 48, 'adriana1stoica@yahoo.com'),
(54007, 48, 'adriana.luca@ei.com.ro'),
(54008, 48, 'aiosif@yahoo.com'),
(54009, 48, 'a.b.r@iname.com'),
(54010, 48, 'adrian_ioan_niculescu@yahoo.com'),
(54011, 48, 'acionchin@yahoo.it'),
(54012, 48, 'adnanmehmeti2001@yahoo.com'),
(54013, 48, '3valmont@gmail.com'),
(54014, 48, 'adina_cutea@yahoo.com'),
(54015, 48, 'adriana_bursuc@yahoo.com'),
(54016, 48, 'adelina@citynews.ro'),
(54017, 48, 'Estella_clinton@yahoo.com'),
(54018, 48, 'adrian.sorescu@energrom.com'),
(54019, 48, '10.nsavescu@nyc.rr.com'),
(54020, 48, 'adinadiana07@yahoo.com'),
(54021, 48, 'adina_ungur@yahoo.fr'),
(54022, 48, 'adrianagiju@yahoo.com'),
(54023, 48, 'ademzaplluzha@hotmail.com'),
(54024, 48, 'adinaion333@yahoo.com'),
(54025, 48, 'nilesh.soni@rw.altisource.com'),
(54026, 48, 'acidor14@gmail.com'),
(54027, 48, 'actualitatimuzicale@hotmail.com'),
(54028, 48, 'adalcisamitu@yahoo.fr'),
(54029, 48, 'ada_raluca2000@yahoo.com'),
(54030, 48, 'adelaida_cotelici@yahoo.com'),
(54031, 48, 'adriansilvan@hotmail.com'),
(54573, 50, 'adriana.teodorescu0@gmail.com'),
(54572, 50, 'adi_calota@hotmail.com'),
(54571, 50, 'adytza75@yahoo.co.uk'),
(54570, 50, 'adinutzalovin@yahoo.com'),
(54569, 50, 'adybindila@yahoo.com'),
(54568, 50, 'adrianbanuta@yahoo.com'),
(54567, 50, 'adrianromila@yahoo.com'),
(54566, 50, 'agathe_h@yahoo.com'),
(54565, 50, 'love3_forlife@yahoo.com'),
(54564, 50, 'fbvkv-4146383596@job.craigslist.org'),
(54563, 50, 'adrian.halpert@adevarul.ro'),
(54562, 50, 'adildiko@yahoo.com'),
(54561, 50, 'ad.sumus@laposte.net'),
(54560, 50, 'mark801@gmail.com'),
(54559, 50, 'adafaur@yahoo.com'),
(54558, 50, 'adrian1803@gmail.com'),
(54557, 50, 'actualitati@radiotimisoara.ro'),
(54556, 50, 'acf@infoiasi.ro'),
(54555, 50, 'adina_dumitresch@hotmail.com'),
(54554, 50, 'adrianluca@gmail.com'),
(54553, 50, 'adryan_1980@yahoo.com'),
(54552, 50, 'adella4you@yahoo.com'),
(54551, 50, 'adilutza78@gmail.com'),
(54550, 50, 'a_u_ro@yahoo.com'),
(54549, 50, 'adrian.cioroianu@gmail.com'),
(54548, 50, 'a.lesenciuc@yahoo.fr'),
(54547, 50, 'aer2629@yahoo.com'),
(54546, 50, 'agneta_ct@yahoo.com'),
(54545, 50, 'adiss_adina31@yahoo.com'),
(54544, 50, 'a_florina@yahoo.com'),
(54543, 50, 'afloarei_anca_cjneamt@yahoo.com'),
(54542, 50, 'AB.Fodorac@t-online.de'),
(54541, 50, 'jobs@fusionspim.com'),
(54540, 50, 'admin@versul.ro'),
(54539, 50, 'ada_elli_stuparu@yahoo.com'),
(54538, 50, 'careers@t2000inc.com'),
(54537, 50, 'agoraromagnalatina@hotmail.com'),
(54536, 50, 'adrianaichim@yahoo.fr'),
(54535, 50, 'adrian.scheul@gmail.com'),
(54534, 50, 'adibumb@yahoo.com'),
(54533, 50, 'acta.iassy.comp@gmail.com'),
(54532, 50, 'adrianabucur@yahoo.com'),
(54531, 50, 'adrianciomaga@yahoo.com'),
(54530, 50, 'Adriana.Radovici@piraeusbank.ro'),
(54529, 50, 'adrianvlad@ambra.ro'),
(54528, 50, 'ady_stan2005@yahoo.com'),
(54527, 50, 'abca@magnolia.ro'),
(54526, 50, 'adinablu@yahoo.com'),
(54525, 50, 'aculina@rambler.ru'),
(54524, 50, 'AgoraRomanaLatina@hotmail.com'),
(54523, 50, 'adinacristiana74@yahoo.com'),
(54522, 50, 'achizitii@hasdeu.md'),
(54521, 50, 'Luke.Shea@CyberCoders.com'),
(54520, 50, 'deonoiliver@gmail.com'),
(54519, 50, 'adamant40@verizon.net'),
(54518, 50, '20office@radiocraiova.ro'),
(54517, 50, 'abogdanandrei@yahoo.com'),
(54516, 50, 'adinadinitoiu@yahoo.com'),
(54515, 50, 'a.cujba@mail.ru'),
(54514, 50, 'jreddy.sovereigntec@gmail.com'),
(54513, 50, 'adip@roedu.net'),
(54512, 50, 'aacupsa@yahoo.com'),
(54511, 50, 'adriana.pirvan@yahoo.com'),
(54510, 50, 'adi_stoica2005@yahoo.com'),
(54509, 50, 'achimstoian@yahoo.com'),
(54508, 50, 'adi_korek@yahoo.com'),
(54507, 50, 'adrian.dinu@adevarulholding.ro'),
(54506, 50, 'a_ardelean@yahoo.com'),
(54505, 50, 'a.florea@xnet.ro'),
(54504, 50, 'acolada@editurapleiade.eu'),
(54503, 50, 'adienamil1@yahoo.com'),
(54502, 50, 'ed.broussard@mudano.com'),
(54501, 50, '1945ioan@gmail.com'),
(54500, 50, 'tucsongov@gmail.com'),
(54499, 50, 'adelaschindler@yahoo.com'),
(54498, 50, 'adumitrache@hotmail.com'),
(54497, 50, 'ada_cecilia2005@yahoo.com'),
(54496, 50, 'a.costache@media-consulta.com'),
(54495, 50, 'aclau44@gmail.com'),
(54494, 50, 'adriana.iordache@casoc.ro'),
(54493, 50, 'a.zultner@yahoo.de'),
(54492, 50, 'agency@mcppress.ro'),
(54491, 50, 'adrianpaparuz10@yahoo.com'),
(54490, 50, 'adrian.enculescu@ziuaonline.ro'),
(54489, 50, 'abipaun@yahoo.com'),
(54488, 50, 'adoina73a@yahoo.com'),
(54487, 50, '53zl25w000zg3wgtrx71x8f6au3qq9q2ipia8gu3dkmg1st@re'),
(54486, 50, 'adriana7st@yahoo.com'),
(54485, 50, '_livescu@yahoo.com'),
(54484, 50, 'ajay.shinde@gmail.com'),
(54483, 50, 'adinamutar@enational.ro'),
(54482, 50, 'afish@netvision.net.il'),
(54481, 50, 'ady_speeder@yahoo.com'),
(54480, 50, 'diyang@ebay.com'),
(54479, 50, 'aariam_a@yahoo.com'),
(54478, 50, 'adig@bjc.ro'),
(54477, 50, 'reply-446604-618722-f32f160a87c34386830af9b8cceed0'),
(54476, 50, 'Adrian.biro@dedalusart.ro'),
(54475, 50, 'adrian.crupa@uaic.ro'),
(54474, 50, 'advertising@bucurestiwww.ro'),
(54473, 50, 'adrian.halpert@click.ro'),
(54472, 50, 'aculintanase2005@yahoo.com'),
(54471, 50, 'gracefeng1984@163.com'),
(54470, 50, 'adrianacazacu05@gmail.com'),
(54469, 50, 'adigiurgea@gmail.com'),
(54468, 50, 'adrianbotez@cox.net'),
(54467, 50, 'xelot00007@yahoo.com'),
(54466, 50, 'Charles.Patterson@tucsonaz.gov'),
(54465, 50, 'adinaprovimi@yahoo.com'),
(54464, 50, 'abejan@acpub.duke.edu'),
(54463, 50, 'adrianasora62@yahoo.com'),
(54462, 50, 'a-ioan@t-online.de'),
(54461, 50, 'agendaculturala@yahoo.com'),
(54460, 50, 'adrian.samarescu@tiparg.ro'),
(54459, 50, 'adelaliculescu@yahoo.com'),
(54458, 50, 'adi.ianc@yahoo.com'),
(54457, 50, 'ady_m7@yahoo.com'),
(54456, 50, 'adrian.vlaicu@cfrcalatori.ro'),
(54455, 50, 'adinaelenaromanescu@gmail.com'),
(54454, 50, 'aionel1@gmail.com'),
(54453, 50, 'actualitati@srr.ro'),
(54452, 50, 'acondeescu@yahoo.com'),
(54451, 50, 'adamek_bogdan@yahoo.com'),
(54450, 50, 'do-not-reply@stackoverflow.com'),
(54449, 50, 'Kylejbollinger@gmail.com'),
(54448, 50, 'adina.stoicescu@gmail.com'),
(54447, 50, 'agaz@chem.ubbcluj.ro'),
(54446, 50, 'abalutactin@k.ro'),
(54445, 50, 'acrmontreal@yahoo.ca'),
(54444, 50, 'adelina_dumitrescu2005@yahoo.com'),
(54443, 50, 'ilooktheysmile@yahoo.com'),
(54442, 50, 'acivica@memorialulsighet.ro'),
(54441, 50, 'adi652000@yahoo.com'),
(54440, 50, 'aarugina@aol.com'),
(54439, 50, 'bdurfee@resultsdirect.com'),
(54438, 50, 'afanasiu@yahoo.com'),
(54437, 50, 'adalbertgyuris@hotmail.com'),
(54436, 50, 'adele_mir@yahoo.com'),
(54435, 50, 'adriana.baghiu@radio-resita.ro'),
(54434, 50, '_staicu2006@yahoo.com'),
(54433, 50, 'bwpayne@ebay.com'),
(54432, 50, 'adella_sit@yahoo.it'),
(54431, 50, 'fsmarandache@gmail.com'),
(54430, 50, 'abaseacaelena@yahoo.com'),
(54429, 50, 'adrpopes@yahoo.it'),
(54428, 50, 'adibulz@yahoo.com'),
(54427, 50, '99verma@gmail.com'),
(54426, 50, 'adriana.seclaman@yahoo.com'),
(54425, 50, 'adriaghe@yahoo.com'),
(54424, 50, 'adrian_erbiceanu@yahoo.ca'),
(54423, 50, 'ada_kiraly@bjc.ro'),
(54422, 50, 'a_cristescu02@yahoo.com'),
(54421, 50, 'a_bunda@hotmail.com'),
(54420, 50, 'adalachifor@yahoo.com'),
(54419, 50, 'adelina.fulga@gmail.com'),
(54418, 50, 'abalutactin@yahoo.com'),
(54417, 50, 'a_dar10@yahoo.com'),
(54416, 50, 'adi.but@gmail.com'),
(54415, 50, 'adriana.tamasanu@gmail.com'),
(54414, 50, 'adriancioflanca@gmail.com'),
(54413, 50, 'adriana.dogaru@rompetrol.com'),
(54412, 50, 'ady_mgg25@yahoo.com'),
(54411, 50, 'a_bilcea@yahoo.com'),
(54410, 50, 'adelasava2007@yahoo.com'),
(54409, 50, 'adv_1950@yahoo.com'),
(54408, 50, 'adela.lupes@gmail.com'),
(54407, 50, 'adriana_weimer@yahoo.com'),
(54406, 50, 'adiantihi@yahoo.com'),
(54405, 50, 'accirstea@yahoo.com'),
(54404, 50, 'adimun11@ymail.com'),
(54403, 50, 'CXTSoftware-CXTS0299@applications.recruiterbox.com'),
(54402, 50, 'acdc_vero@yahoo.com'),
(54401, 50, 'acosmei@gmail.com'),
(54400, 50, 'ad@ear.ro'),
(54399, 50, 'ager@bimos.ro'),
(54398, 50, 'Thursdivina@gmail.com'),
(54397, 50, 'adrianabarna2007@yahoo.com'),
(54396, 50, 'mwdowiak33@gmail.com'),
(54395, 50, 'mihailiviu@yahoo.com'),
(54394, 50, 'eli_s85710@yahoo.com'),
(54393, 50, 'abrudanelena@yahoo.com'),
(54392, 50, 'a_bursuc91@yahoo.com'),
(54391, 50, 'accraiova@gmail.com'),
(54390, 50, 'abarnoschi2002@yahoo.com'),
(54389, 50, 'actualitateabotosaneana@yahoo.com'),
(54388, 50, 'aemkingserv@yahoo.com'),
(54387, 50, 'adrian_d_pop@hotmail.com'),
(54386, 50, 'administrator@cab.ro'),
(54385, 50, 'abonamentelumina@gmail.com'),
(54384, 50, 'Dan.Falkner@tucsonaz.gov'),
(54383, 50, 'adrianag@snspa.ro'),
(54382, 50, 'adela74sta@gmail.com'),
(54381, 50, 'acor@acor.ro'),
(54380, 50, 'actualitati@rornet.ro'),
(54379, 50, 'maggietheaggie@gmail.com'),
(54378, 50, 'acum@x3m.ro'),
(54377, 50, 'adicristi2005@yahoo.com'),
(54376, 50, 'adina_p_2006@yahoo.com'),
(54375, 50, 'adelajaneta@yahoo.com'),
(54374, 50, 'aidrom@gmail.com'),
(54373, 50, 'adrianagrad81@yahoo.com'),
(54372, 50, 'ady.serban@yahoo.com'),
(54371, 50, 'adi_codreanu@yahoo.com'),
(54370, 50, 'mihai6744@hotmail.com'),
(54369, 50, 'admin@conectii.ro'),
(54368, 50, 'adelabradea@yahoo.com'),
(54367, 50, 'adrian.gitu@jurnaltv.md'),
(54366, 50, 'mihai004@gmail.com'),
(54365, 50, 'adrian_cranta@yahoo.com'),
(54364, 50, 'adrian2011p@yahoo.com'),
(54363, 50, 'adrianleu@yahoo.com'),
(54362, 50, 'emendoza@fdbhealth.com'),
(54361, 50, 'achelariu@aol.com'),
(54360, 50, 'crsalemi@asu.edu'),
(54359, 50, 'abjorkdahl@eur.ibs-stl.org'),
(54358, 50, 'adelin_dumitrache@yahoo.com'),
(54357, 50, 'afcgheorghita@yahoo.com'),
(54356, 50, 'aborza@gmail.com'),
(54355, 50, 'adciubotaru@gmail.com'),
(54354, 50, 'info@myhousedeals.com'),
(54353, 50, 'adriana_decu@yahoo.com'),
(54352, 50, 'abelean@yahoo.com'),
(54351, 50, 'adicristescu73@yahoo.com'),
(54350, 50, 'adipop@popservice.ro'),
(54349, 50, 'adam.maria40@yahoo.com'),
(54348, 50, 'flyhigher26@gmail.com'),
(54347, 50, 'adipablo72@yahoo.com'),
(54346, 50, 'adrianastanca@yahoo.fr'),
(54345, 50, 'summer@yahoo.com'),
(54574, 50, '12-stringer@cox.net'),
(54575, 50, 'adumitrescu@incsmps.ro'),
(54576, 50, 'rbrown@education.com'),
(54577, 50, 'jobs@ispot.com'),
(54578, 50, 'adrianl@arcim.ro'),
(54579, 50, 'adrian.rusu@cna.ro'),
(54580, 50, 'adi.lacraru@distins.ro'),
(54581, 50, 'agiu_elena@yahoo.com'),
(54582, 50, 'Cristina.Polsgrove@tucsonaz.gov'),
(54583, 50, 'acr_delia@yahoo.com'),
(54584, 50, 'adimitea@yahoo.com'),
(54585, 50, 'adrian_dichiseni@yahoo.com'),
(54586, 50, 'adabija@yahoo.com'),
(54587, 50, 'adrian_botez_senior@yahoo.com'),
(54588, 50, 'adrianmesescu@yahoo.com'),
(54589, 50, 'mihai.sanfran@gmail.com'),
(54590, 50, 'adriana_andreca@yahoo.com'),
(54591, 50, 'adriannita2010@yahoo.com'),
(54592, 50, 'aecksteinul@yahoo.com'),
(54593, 50, 'adiluc@rdslink.ro'),
(54594, 50, 'Kim.Beth@tucsonaz.gov'),
(54595, 50, 'adrian_pantazi@yahoo.com'),
(54596, 50, 'ACsaftari@providence.on.ca'),
(54597, 50, 'achelariu@verizon.net'),
(54598, 50, 'adlerrbert@googlemail.com'),
(54599, 50, 'ktakeda9+g4w@indeedemail.com'),
(54600, 50, 'adri98bej@yahoo.com'),
(54601, 50, 'adelaimoldovan@yahoo.com'),
(54602, 50, 'acristi@xnet.ro'),
(54603, 50, 'aida_bicu@yahoo.com'),
(54604, 50, 'aditaciobanu@gmail.com'),
(54605, 50, 'aiosif@zappmobile.ro'),
(54606, 50, 'adela.nagy@yahoo.com'),
(54607, 50, 'Lwyge21@yahoo.com.hk'),
(54608, 50, 'acsoftware2006@yahoo.com'),
(54609, 50, 'adrianapetrescu2003@yahoo.com'),
(54610, 50, 'aiftinca@acad.ro'),
(54611, 50, 'adclinci@yahoo.com'),
(54612, 50, 'adaionescumail@yahoo.com'),
(54613, 50, 'a_alexandru_avram@yahoo.com'),
(54614, 50, 'adela.adriana.moscu@gmail.com'),
(54615, 50, 'Adrian.Cosmescu@bnro.ro'),
(54616, 50, 'Christopher.Salemi@asu.edu'),
(54617, 50, 'adriachim@yahoo.com'),
(54618, 50, '1010surdu@rambler.ru'),
(54619, 50, 'a_creanga@hotmail.com'),
(54620, 50, 'adaselena@mail.ru'),
(54621, 50, 'ady_bazavan@yahoo.com'),
(54622, 50, 'magarc33@asu.edu'),
(54623, 50, 'adrian.nita7@gmail.com'),
(54624, 50, '2s4xxx4x@facebookmail.com'),
(54625, 50, 'agachecatinca@hotmail.com'),
(54626, 50, 'adonaida@yahoo.com'),
(54627, 50, 'adimelicovici10@yahoo.co.uk'),
(54628, 50, 'adriana1stoica@yahoo.com'),
(54629, 50, 'adriana.luca@ei.com.ro'),
(54630, 50, 'aiosif@yahoo.com'),
(54631, 50, 'a.b.r@iname.com'),
(54632, 50, 'adrian_ioan_niculescu@yahoo.com'),
(54633, 50, 'acionchin@yahoo.it'),
(54634, 50, 'adnanmehmeti2001@yahoo.com'),
(54635, 50, '3valmont@gmail.com'),
(54636, 50, 'adina_cutea@yahoo.com'),
(54637, 50, 'adriana_bursuc@yahoo.com'),
(54638, 50, 'adelina@citynews.ro'),
(54639, 50, 'Estella_clinton@yahoo.com'),
(54640, 50, 'adrian.sorescu@energrom.com'),
(54641, 50, '10.nsavescu@nyc.rr.com'),
(54642, 50, 'adinadiana07@yahoo.com'),
(54643, 50, 'adina_ungur@yahoo.fr'),
(54644, 50, 'adrianagiju@yahoo.com'),
(54645, 50, 'ademzaplluzha@hotmail.com'),
(54646, 50, 'adinaion333@yahoo.com'),
(54647, 50, 'nilesh.soni@rw.altisource.com'),
(54648, 50, 'acidor14@gmail.com'),
(54649, 50, 'actualitatimuzicale@hotmail.com'),
(54650, 50, 'adalcisamitu@yahoo.fr'),
(54651, 50, 'ada_raluca2000@yahoo.com'),
(54652, 50, 'adelaida_cotelici@yahoo.com'),
(54653, 50, 'adriansilvan@hotmail.com'),
(54654, 51, 'jr_fsu@yahoo.com'),
(54655, 51, 'elositodepelucheelbronx79@gmail.com'),
(54656, 51, 'travelin.man2015@gmail.com');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `user_id`, `name`, `created`) VALUES
(48, 59, 'Test List', '04/05/2015'),
(50, 59, 'Another List', '04/12/2015'),
(51, 60, 'Employees', '04/16/2015'),
(52, 60, 'Customers', '04/16/2015');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=75 ;

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
(74, 78, 'travelin.man2015@gmail.com', 'Completed', '', '18:40:10 Apr 05, 2015 PDT', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Default', '3075137', 60, 2.04, 0, 0, 0, 0, 0, 0, 0, 'USD', '0FL92434EA276223X', 'web_accept', 'Mihai', 'Smarandache', '', '', '', '', '', '', 'mihai.sanfran@gmail.com', 'verified', 'instant', '3.8', 'ARzgAgKHDmJxNpJrYmwa7-mE9yWfA0C9eAYVfvYZkmAn2EOBAS40ItA4', '', '', 'Ineligible', 'Invalid', '', '', '', '', '2000 Email Credits', '', '', 0, '', '', 0, '2015-04-06 01:40:16', '', '', 'AVCAHSW235QLG', 1);

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
-- Table structure for table `raw_log`
--

CREATE TABLE IF NOT EXISTS `raw_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ipn_data_serialized` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=79 ;

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
(78, '2015-04-06 01:40:16', 'a:38:{s:8:"mc_gross";s:5:"60.00";s:22:"protection_eligibility";s:10:"Ineligible";s:8:"payer_id";s:13:"BL5JEN2YBC2WC";s:3:"tax";s:4:"0.00";s:12:"payment_date";s:25:"18:40:10 Apr 05, 2015 PDT";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:10:"first_name";s:5:"Mihai";s:6:"mc_fee";s:4:"2.04";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:8:"verified";s:8:"business";s:26:"travelin.man2015@gmail.com";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"ARzgAgKHDmJxNpJrYmwa7-mE9yWfA0C9eAYVfvYZkmAn2EOBAS40ItA4";s:11:"payer_email";s:23:"mihai.sanfran@gmail.com";s:6:"txn_id";s:17:"0FL92434EA276223X";s:12:"payment_type";s:7:"instant";s:6:"btn_id";s:7:"3075137";s:9:"last_name";s:11:"Smarandache";s:14:"receiver_email";s:26:"travelin.man2015@gmail.com";s:11:"payment_fee";s:4:"2.04";s:17:"shipping_discount";s:4:"0.00";s:16:"insurance_amount";s:4:"0.00";s:11:"receiver_id";s:13:"AVCAHSW235QLG";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:18:"2000 Email Credits";s:8:"discount";s:4:"0.00";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:15:"shipping_method";s:7:"Default";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"60.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"8cbc722cb4de6";}');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=305 ;

--
-- Dumping data for table `template_fields`
--

INSERT INTO `template_fields` (`id`, `user_id`, `template_id`, `field`, `value`) VALUES
(304, 59, 1, '0', 'Suspendisse imperdiet ullamcorper est at interdssssssm. Suspendisse at felis nunc. Integer eu felis lacus, <br />\n				id blandit augue. <a href="./" style="color: #cc0000; text-decoration: none;">Mauris commodo hendrerit risus</a>, quis vehicula mi adipiscing...	');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `emails`, `timestamp`) VALUES
(59, 'mihai.sanfran@gmail.com', '0991b5625c1292ded687ab18dd2fd2f1', 'buyer', 1999, '2015-04-10 03:38:23'),
(60, 'admin', 'fe01ce2a7fbac8fafaed7c982a04e229', 'admin', 1000, '2015-04-17 04:20:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
