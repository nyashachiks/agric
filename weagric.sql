-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 07:40 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfgmbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation_codes`
--

CREATE TABLE `activation_codes` (
  `user_id` int(11) NOT NULL,
  `activated_by_uid` int(11) NOT NULL,
  `receipt_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activation_codes`
--

INSERT INTO `activation_codes` (`user_id`, `activated_by_uid`, `receipt_no`) VALUES
(65, 2, 'RTP2050'),
(66, 2, 'BFP2005'),
(71, 32, '1234'),
(67, 2, '244644'),
(68, 2, '36987'),
(75, 2, 'R12345'),
(76, 2, 'R000001'),
(77, 2, 'R000002'),
(70, 5, ''),
(78, 77, ''),
(79, 76, ''),
(81, 77, ''),
(80, 76, ''),
(82, 77, ''),
(83, 2, 'R000003'),
(84, 2, 'R000004'),
(85, 2, 'R000005');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) UNSIGNED NOT NULL,
  `budget_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `budget_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 1, 'Seeding', 1451318492, 1451457870),
(3, 1, ' Cultivating First Quarter', 1451402622, 1454596275),
(4, 1, 'Harvesting', 1454594004, 1454594004),
(5, 1, 'Cultivating Second Quater', 1454664664, 1454664664),
(6, 1, 'Harvesting', 1455785656, 1455785656);

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `province` text NOT NULL,
  `district` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `province`, `district`, `phone`, `created_at`, `updated_at`, `country_id`) VALUES
(0, '200 CCT way, Eastlea\r\nZvishavane', 'Midlands', 'Gokwe South', '049289', NULL, 1502096035, 246),
(7, '123', 'Bulawayo', 'Bulawayo', '9988', 1447141296, 1447141296, 246),
(8, '123', 'Harare', 'Harare', '9988', 1447141386, 1447141386, 246),
(9, '123', 'Harare', 'Harare', '9988', 1447141462, 1447141462, 246),
(10, '23 Hillside', 'Midlands', 'Chirumanzu', '09', 1447334672, 1447334672, 246),
(11, '636', 'Bulawayo', 'Bulawayo', '09254103', 1447335774, 1447335774, 246),
(12, '45', 'Bulawayo', 'Bulawayo', '26777600900', 1447336057, 1447336057, 246),
(13, '399', 'Harare', 'Harare', '263778566766', 1447336308, 1447336308, 246),
(14, '399', 'Harare', 'Harare', '263', 1447336329, 1447336329, 246),
(15, '636', 'Bulawayo', 'Bulawayo', '09', 1448877681, 1448877681, 246),
(16, '636', 'Bulawayo', 'Bulawayo', '09', 1448877715, 1448877715, 246),
(17, '636', 'Bulawayo', 'Bulawayo', '09', 1448877752, 1448877752, 246),
(18, '636 mahatshula ', 'Bulawayo', 'Bulawayo', '09', 1448877809, 1448877809, 246),
(19, '636 mahatshula ', 'Bulawayo', 'Bulawayo', '09', 1448877850, 1448877850, 246),
(20, '636', 'Bulwayo', 'Bulawayo', '09', 1448878034, 1448878034, 246),
(21, 'Cnr 1st and Second street,\r\nCity Centre', 'Midlands', 'Gweru', '09', 1448941572, 1448941572, 246),
(22, 'Remembrance Drive,\r\nMbare', 'Harare', 'Harare', '09', 1448941805, 1448941805, 246),
(25, '125 Folyjon Crescent ', 'Harare', 'Harare', '04499936', 1449133748, 1449133748, 246),
(26, '10 Townsend Road,\r\nSuburbs', 'Bulawayo', 'Bulawayo', '09254103', 1449482258, 1449482258, 246),
(27, '636 mahatshula', 'Bulawayo', 'Bulawayo', '0773', 1450699293, 1450699293, 246),
(28, '636 Mahatshula', 'Bulawayo', 'Bulawayo', '09', 1451909170, 1451909170, 246),
(29, '401 Winford flat', 'Harare', 'Harare', '09', 1451910339, 1451910339, 246),
(30, '401 winford flat', 'Harare', 'Harare', '09', 1451910485, 0, 246),
(31, '1670 Malbelreign', 'Harare', 'Harare', '044009', 1451915076, 1451915076, 246),
(32, '125 Beatris', 'Harare', 'Harare', '0775009236', 1454911795, 1454911795, 246),
(33, '1 Kenilworth Road,\r\nNewlands', 'Harare', 'Harare', '0772200300', 1454917476, 1454917476, 246),
(34, '256 Mvurwi', 'Masvingo', 'Chivi', '0772200300', 1454940005, 1503917240, 252),
(35, 'Between 1st and Main Street', 'Midlands', 'Gweru', '04499936', 1454942840, 1454942840, 246),
(36, '2556 stand, Mvurwi', 'Mashonaland Central', 'Mazowe', '0772200300', 1455008151, 1455008151, 246),
(37, '23 Kenil Worth Road,\r\nNewlands', 'Harare', 'Harare', '04499999', 1455027933, 1455027933, 246),
(38, '455 Mvuma,\nMvuma', 'Masvingo', 'Masvingo', '0775009237', 1455031451, 1455031451, 246),
(39, '455 Mvurwi', 'Mazowe', 'Mashonaland Central', '07777777', 1455031670, 1455031670, 246),
(40, '1 Kenilworth Road,\r\nNewlands', 'Harare', 'Harare', '04499936', 1455107193, 1455107193, 246),
(41, '1 Kenilworth Rd,\r\nNewlands', 'Harare', 'Harare', '04499936', 1455170879, 1455170879, 246),
(42, 'Karoi', 'Mashonaland West', 'Hurungwe', '07777777', 1455171192, 1455171192, 246),
(43, '25 Kenilworth Road,\r\nNewlands', 'Harare', 'Harare', '04499936', 1455196198, 1455196198, 246),
(44, '25 Kenilworth Road,\r\nNewlands', 'Harare', 'Harare', '04499936', 1455196275, 1455196275, 246),
(45, '234 Mufakose', 'Harare', 'Harare', '0772200300', 1455280907, 1455280907, 246),
(46, '123 Folyjon', 'Harare', 'Harare', '04 678 999', 1455281047, 1455281047, 246),
(47, '234 Beatris', 'Masvingo', 'Bikita', '04 678 999', 1455282286, 1455282286, 246),
(48, '256 Chihota', 'Masvingo', 'Chiredzi', '04499936', 1455283438, 1455283438, 246),
(49, '23 Glenara Road,\r\nHighlands', 'Mashonaland Central', 'Mazowe', '776009236', 1455693531, 1455693531, 246),
(50, '23 Bindura Drive', 'Mashonaland Central', 'Bindura', '04499936', 1455694723, 1455694723, 246),
(51, 'Beatris ', 'Harare', 'Harare', '0773304935', 1455551242, 1455551242, 246),
(52, '200 Lobengula Street', 'Bulawayo', 'Bulawayo', '772271681', 1455617478, 1455617478, 246),
(53, '280 Mbeu', 'Mashonaland West', 'Chegutu', '772271681', 1455617644, 1455617644, 246),
(54, '1 Kenilworth Road,\r\nNewlands', 'Harare', 'Harare', '0772560448', 1455630094, 1455630094, 246),
(55, '2 Caledonia', 'Harare', 'Harare', '0772560448', 1455630343, 1455630343, 246),
(56, '1 Caledonia Farm', 'Harare', 'Harare', '0775009236', NULL, NULL, 246),
(57, '125 Flojon Crescent,\r\nGlenlorne', 'Matabeleland North', 'Binga', '0776009236', 1455700321, 1455700321, 246),
(59, '125 Flojon Crescent,\r\nGlenlorne', 'Mashonaland Central', 'Shambva', '0776009236', 1455700361, 1455700361, 246),
(60, '23 Bumburwi\nChihota', 'Mashonaland East', 'Marondera', '04499936', 1455700667, 1455700667, 246),
(61, '23 Bumburwi\nChihota', 'Mashonaland East', 'Marondera', '04499936', 1455700704, 1455700704, 246),
(62, '23 Bumburwi', 'Mashonaland West', 'Kadoma', '04499936', 1455701362, 1455701362, 246),
(63, '23 Bumburwi', 'Mashonaland West', 'Kadoma', '04499936', 1455701371, 1455701371, 246),
(64, '90 Bindura Road', 'Mashonaland Central', 'Bindura', '04499936', 1455728800, 1455728800, 246),
(65, '1 Kenilworth Rd\nNewlands', 'Harare', 'Harare', '0775009236', 1455729138, 1455729138, 246),
(66, '1 Kenilworth Rd\nNewlands', 'Harare', 'Harare', '0775009236', 1455729153, 1455729153, 246),
(67, '56 Masvingo', 'Masvingo', 'Masvingo', '0772200300', 1455729235, 1455729235, 246),
(68, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455729392, 1455729392, 246),
(69, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455729409, 1455729409, 246),
(70, '1 Kenilworth Rd Newlands', 'Manicaland', 'Buhera', '0775009236', 1455729440, 1455729440, 246),
(71, '1 Kenilworth Rd Newlands', 'Manicaland', 'Buhera', '0775009236', 1455729457, 1455729457, 246),
(72, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455729633, 1455729633, 246),
(73, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455729683, 1455729683, 246),
(74, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455729694, 1455729694, 246),
(75, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455729715, 1455729715, 246),
(76, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455729799, 1455729799, 246),
(77, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455729909, 1455729909, 246),
(78, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455730253, 1455730253, 246),
(79, '56 Bumburwi', 'Mashonaland East', 'Marondera', '04 678 999', 1455730471, 1455730471, 246),
(80, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455730604, 1455730604, 246),
(81, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0775009236', 1455730634, 1455730634, 246),
(82, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0773304935', 1455731055, 1455731055, 246),
(83, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0772560448', 1455773524, 1455773524, 246),
(84, '4 Kenilworth Road,\r\nNwelands', 'Harare', 'Harare', '04499936', 1455774640, 1455774640, 246),
(85, 'Plot 678 Marondera Drive', 'Mashonaland East', 'Marondera', '07777777', 1455774739, 1455774739, 246),
(86, '7 Kenilworth Road,\r\nnewlands', 'Harare', 'Harare', '04499936', 1455775280, 1455775280, 246),
(87, 'Bindura Drive', 'Mashonaland Central', 'Bindura', '0772200300', 1455775353, 1455775353, 246),
(88, 'Bindura Drive', 'Mashonaland Central', 'Bindura', '0772200300', 1455775400, 1455775400, 246),
(89, 'Bindura Drive', 'Mashonaland Central', 'Bindura', '0772200300', 1455775707, 1455775707, 246),
(90, '12 Marandaro Rd Cranborne', 'Harare', 'Harare', '0772560448', 1455776214, 1455776214, 246),
(91, '6 Kenilworth Marondera', 'Mashonaland East', 'Chikomba', '04499936', 1455777127, 1455777127, 246),
(92, 'Guruve drive', 'Manicaland', 'Chimanimani', '04499936', 1455780551, 1455780551, 246),
(93, '2 Herbert Lane Strathaven', 'Harare', 'Harare', '04333212', 1455782895, 1455782895, 246),
(94, 'Plot 5123 Norton', 'Harare', 'Harare', '05522345', 1455783111, 1455783111, 246),
(95, 'erte', 'Bulawayo', 'Bulawayo', '4', 1457447168, 1457447168, 246),
(96, '89 Harare Drive', 'Bulawayo', 'Bulawayo', '0974103', 1457505977, 1457505977, 246),
(97, '567 Marondera', 'Mashonaland West', 'Kadoma', '04499936', 1457506713, 1457506713, 246),
(98, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0772560448', 1457507090, 1457507090, 246),
(99, '89 Byo Drive', 'Bulawayo', 'Bulawayo', '0772200300', 1457507172, 1457507172, 246),
(100, '237 Parklands Road,\r\nKhumalo', 'Bulawayo', 'Bulawayo', '09', 1457512999, 1457512999, 246),
(101, '1 Kenilworth Rd Newlands', 'Harare', 'Harare', '0772560448', 1457529948, 1457529948, 246),
(102, 'Plot 857\r\nBeatrice', 'Masvingo', 'Gutu', '09254103', 1457598654, 1503917276, 252),
(103, '900 Ruwa Drive', 'Mashonaland East', 'Chikomba', '067 8899', 1457599203, 1457599203, 246),
(104, '34 Everlyn Court', 'Harare', 'Harare', '04499936', 1457689105, 1457689105, 246),
(105, '67 Binga ', 'Matabeleland North', 'Binga', '04499936', 1457689225, 1457689225, 246),
(106, '4706 Springvale Park\r\nRuwa', 'Harare', 'Harare', '', 1458027831, 1458027831, 246),
(107, 'Harare\r\nZW', 'Masvingo', 'Chivi', '', 1463474432, 1463474432, 246),
(108, 'Harare\r\nZW', 'Masvingo', 'Chivi', '', 1463474568, 1463474568, 246),
(109, '24 Ceres Road, Avondale\r\n', 'Harare', 'Harare', '00000', 1464955310, 1464955310, 246),
(110, '23 Glen Eagles\r\n', 'Harare', 'Harare', '', 1464955317, 1464955317, 246),
(111, '12 Avondale Road,\r\nAvondale\r\n', 'Harare', 'Harare', '04 782345', 1464955332, 1464955332, 246),
(112, '34 Emganwini Road,\r\nEmakhandeni', 'Bulawayo', 'Bulawayo', '', 1464960761, 1464960761, 246),
(113, '10 Townsend Road Surburbs,\r\n', 'Bulawayo', 'Bulawayo', '', 1465567100, 1465567100, 246),
(114, '2 Braemar Road,\r\nMount Pleasant', 'Harare', 'Harare', '', 1465567225, 1465567225, 246),
(115, '6 Ceres Road,\r\nAvondale ', 'Harare', 'Harare', '', 1465567261, 1465567261, 246),
(116, '1 Kenilworth Rd, Newlands,\r\nHarare', 'Harare', 'Harare', '+2634782747', 1466499759, 1466499759, 246),
(117, '1 Kenilworth Rd, Newlands, Harare', 'Harare', 'Harare', '+2634782747', 1466499892, 1466499892, 246),
(118, '300 Streetwize\r\nHarare', 'Harare', 'Harare', '', 1466595297, 1466595297, 246),
(119, '200 Choto Road\r\nZengeza\r\nChitungwiza', 'Harare', 'Harare', '', 1467873955, 1467873955, 246),
(120, '200 Choto Road\r\nZengeza\r\nChitungwiza', 'Harare', 'Harare', '', 1467873981, 1467873981, 246),
(121, '200 Choto Road\r\nZengeza\r\nChitungwiza', 'Harare', 'Harare', '', 1467874006, 1467874006, 246),
(122, '100 Marondera Way\r\nRuwa', 'Harare', 'Harare', '+263712600600', 1467874106, 1467874106, 246),
(123, '100 Marondera Way\r\nRuwa', 'Harare', 'Harare', '+263712600600', 1467874189, 1467874189, 246),
(124, '1 Kenilworth Rd Newlands', 'Mashonaland Central', 'Mazowe', '+2634782747', 1467875654, 1467875654, 246),
(125, '1234 Magava Rd', 'Mashonaland Central', 'Mazowe', '+2634782750', 1467875892, 1467875892, 246),
(126, '200 Gondohwe Street\r\nBelgravia\r\nHarare', 'Harare', 'Harare', '', 1468826503, 1468826503, 246),
(127, '800 Varyl Street\r\nMbudzi\r\nHarare', 'Harare', 'Harare', '', 1468826548, 1468826548, 246),
(128, '6405 Gleneagles Road\r\nHarare', 'Harare', 'Harare', '', 1468837532, 1468837532, 246),
(129, 'Harare\r\nZW', 'Harare', 'Harare', '', 1469517882, 1469517882, 246),
(130, '27 Guruve East', 'Mashonaland Central', 'Guruve', '782', 1470745955, 1470745955, 246),
(131, '1 Kenilworth Rd Newlands, Harare', 'Harare', 'Harare', '+2634782747', 1471440862, 1471440862, 246),
(132, '8545 Chirunge Rd, Beatrice', 'Mashonaland East', 'Seke', '+2634782747', 1471441043, 1471441043, 246),
(133, '8545 Chirunge Rd, Beatrice', '0', 'Seke', '+2634782747', 1471441142, 1504518830, 246),
(134, '5758 Magwegwe West, Bulawayo', 'Bulawayo', 'Bulawayo', '+2639420650', 1471445088, 1471445088, 246),
(135, '1 Plumtree Road Marula', 'Matabeleland South', 'Bulilimamangwe', '+263739123650', 1471445206, 1471445206, 246),
(136, '200 Street Name\r\n', 'Harare', 'Harare', '04200500', 1471503354, 1471503354, 246),
(137, '137 Nielborth Rd Highlands', 'Manicaland', 'Nyanga', '+2634782747', 1471503669, 1471503669, 246),
(138, '4 Blakes Estate,\r\nEmganwinwi', 'Bulawayo', 'Bulawayo', '0924001', 1471506069, 1471506069, 246),
(139, '2001 grey estate,mpandawana', 'Harare', 'Harare', '09240023', 1471506468, 1471506468, 246),
(140, '134 Nyamandlovu', 'Matebeleland North', 'Umguza', '+2634782747', 1471508032, 1471508032, 246),
(141, '141 Southern Lowlands', 'Matabeleland South', 'Insiza', '+2634782747', 1471508918, 1471508918, 246),
(142, '160 Eastern Highlands', 'Manicaland', 'Nyanga', '+2634782747', 1471509130, 1471509130, 246),
(143, '25 Reward Lane', 'Masvingo', 'Zaka', '+263782747', 1471509292, 1471509292, 246),
(144, '17 Gweru Highway,', 'Midlands', 'Shurugwi', '+2634782747', 1471513077, 1471513077, 246),
(145, 'Box 235, Seke', 'Mashonaland East', 'Seke', '+2634782747', 1471513194, 1471513194, 246),
(146, '146 Matopos turn off,', 'Matabeleland South', 'Matobo', '+2634782747', 1471524809, 1471524809, 246),
(147, '23123 Domboshawa Rd, ', 'Mashonaland East', 'Chikomba', '+2634782747', 1471524922, 1471524922, 246),
(148, '31 Mulandy Square,\r\nMukoba', 'Midlands', 'Gweru', '900121', 1473153366, 1473153366, 246),
(149, '123 Musasa Drive', 'Midlands', 'Gokwe South', '90', 1473168778, 1473168778, 246),
(150, '55 Silobela Township', 'Matebeleland North', 'Lupane', '90', 1473169120, 1473169120, 246),
(151, '5513 Adnae Lyn Road', 'Harare', 'Harare', '90', 1473169135, 1473169135, 246),
(152, '56 Sugar Loaf Road', 'Masvingo', 'Chiredzi', '1', 1473230105, 1473230105, 246),
(153, '35 Kumbulani Avenue\r\n', 'Matabeleland South', 'Gwanda', '1', 1473230127, 1473230127, 246),
(154, '98 Box 34', 'Masvingo', 'Mwenezi', '1', 1473230145, 1473230145, 246),
(155, '35 Mayenza Road', 'Manicaland', 'Chipinge', '1', 1473230203, 1473230203, 246),
(156, '84 Culsito Road', 'Masvingo ', 'Chiredzi', '1', 1473230227, 1473230227, 246),
(157, '90 Fire road,\r\nEmakhandeni', 'Matabeleland South', 'Beitbridge', '1', 1473230270, 1473230270, 246),
(158, '76 Hlalapanzi Road,\r\nMakokoba', 'Bulawayo', 'Bulawayo', '12', 1473230720, 1473230720, 246),
(159, 'flat newlands', 'Harare', 'Harare', '121', 1473233492, 1473667614, 246),
(160, '3 George Edwin RD', 'Midlands', 'Chirumanzu', '09', 1473668540, 1473687977, 246),
(161, '7 Landas Idwin,\r\n', 'Midlands', 'Kwekwe', '0923566', 1474371870, 1474371870, 246),
(162, '67 Harare Road', 'Manicaland', 'Buhera', '0923566', 1474372009, 1474372009, 246),
(163, '90 Fairway Drive', 'Manicaland', 'Chimanimani', '982832', 1474372760, 1474372760, 246),
(164, '56 Chikanga', 'Manicaland', 'Chipinge', '', 1474389808, 1474389808, 246),
(165, 'Box 345 ', 'Mashonaland West', 'Kadoma', '0772271681', 1476227423, 1476227423, 246),
(166, '1045 Mt Pleasant Heights', 'Manicaland', 'Makoni', '+263782382370', 1476972262, 1476972262, 246),
(167, '636 Box 24', 'Matabeleland South', 'Bulilimamangwe', '0977343712', 1480317787, 1480317787, 246),
(168, '38 Fallon Avenue, ', 'Manicaland', 'Nyanga', '04 448029', 1484038364, 1484038364, 246),
(169, '8 Sparrow Avenue,\r\n', 'Masvingo', 'Bikita', '', 1484041293, 1484041293, 246),
(170, '3 Raven Avenue, Ascot', 'Masvingo', 'Chiredzi', '0772887738', 1484041579, 1484041579, 246),
(171, '21 Masvingo Road,', 'Masvingo', 'Chivi', '0772887738', 1484042824, 1484042824, 246),
(172, '172 Greendale Road', 'Masvingo', 'Gutu', '04448029', 1493386827, 1493386827, 246),
(173, '1 Kenilworth Road,\r\nSunnyside', 'Bulawayo', 'Bulawayo', '448448', 1498744586, 1498744586, 246),
(174, '38 Burnish Road', 'Masvingo', 'Zaka', '049049', 1498818824, 1498818824, 246),
(175, '34 Enterprise Road, Newlands', 'Mashonaland West', 'Kadoma', '049049', 1498829823, 1498829823, 246),
(176, '51 Kelsway Road', 'Mashonaland West', 'Chegutu', '0490490', 1498830709, 1498830709, 246),
(177, 'Plot 38, Chivhu Road', 'Masvingo', 'Gutu', '047048', 1499065599, 1499065599, 246),
(178, '23 Baobab Road', 'Matabeleland South', 'Beitbridge', '76935', 1499084547, 1499084547, 246),
(179, '445 Banket', 'Mashonaland West', 'Makonde', '06722977', 1499084769, 1499084769, 246),
(180, 'Orange Groove', 'Matabeleland South', 'Beitbridge', '0692248', 1499089081, 1499089081, 246),
(181, 'Plot 234 Beitbridge Highway', 'Matabeleland South', 'Beitbridge', '049289', 1499237686, 1499237686, 246),
(182, 'Plot 669 Bikita District', 'Masvingo', 'Bikita', '06722977', 1499238007, 1499238007, 246),
(183, 'P Bag 5808, Esigodini', 'Bulawayo', 'Bulawayo', '', 1499264892, 1499264892, 246),
(184, 'P Bag 8062, KweKwe. ', 'Midlands', 'Kwekwe', '', 1499265013, 1499265013, 246),
(185, 'Lusaka,\r\nHighfield', 'Harare', 'Harare', '', 1499265130, 1499265130, 246),
(186, 'Makokoba', 'Bulawayo', 'Bulawayo', '', 1499265337, 1499265337, 246),
(187, '28 Kubango Street, Mazowe', 'Mashonaland Central', 'Mazowe', '048029', 1500542101, 1500542101, 246),
(188, '28 Cary Street, Masvingo', 'Masvingo', 'Masvingo', '7489239', 1500542268, 1500542268, 246),
(189, '21 Lion Drive', 'Masvingo', 'Chiredzi', '829843', 1500543108, 1500543108, 246),
(190, '200 CCT way, Beitbridge', 'Matabeleland South', 'Beitbridge', '02920240', 1500635180, 1500635180, 246),
(191, '', 'Harare', 'Harare', '', 1501511042, 1501511042, 246),
(192, '123', 'Harare', 'Harare', '9988', 1447141386, 1447141386, 246),
(195, '789 Tete', 'Tete', 'Cidade de Tete', '+258823059135', 1501744134, 1501744134, 150),
(196, '10 Jason Moyo Street\r\nHarare', 'Maputo', 'Maputo', '', 1502272436, 1502272436, 150),
(197, '10 Jason Moyo Street\r\nHarare', 'Maputo', 'Maputo', '', 1502272459, 1502272459, 150),
(198, '10 Jason Moyo Street\r\nHarare', 'Maputo', 'Maputo', '', 1502272503, 1502272503, 150),
(199, 'Maputo', 'Maputo', 'Matola', '+258843650854', 1502272765, 1502272765, 150),
(200, '30 L Takawira Street\r\nHarare', 'Harare', 'Harare', '', 1502272935, 1502272935, 150),
(201, '6405 Glenview 8\r\nHarare', 'Maputo', 'Maputo', '', 1502273264, 1502273264, 150),
(202, 'Av. Ahmed Sekou Toure 1905', 'Maputo', 'Matola', '+258848870782', 1502279926, 1502279926, 150),
(203, '3 hughson wynd, mount pleasant, harare', 'Mashonaland East', 'Marondera', '773782077', 1502351641, 1502351641, 246),
(204, '', 'Mashonaland East', 'Marondera', '', 1502353918, 1502353918, 246),
(205, 'Magwa Village\r\nMasvingo', 'Masvingo', 'Masvingo', '', 1503316756, 1503316756, 246),
(206, '40 J Moyo Avenue\r\nHarare\r\n', 'Harare', 'Harare', '', 1503923886, 1503923886, 252),
(207, '8756 Glen View 8 Harare', 'Harare', 'Harare', '', 1503930398, 1503930398, 252),
(208, '456 Mvurwi Mazowe', 'Mashonaland Central', 'Mazowe', '', 1503988481, 1503988481, 252),
(209, '45 Manyuchi Farm Mt Darwin', 'Mashonaland Central', 'Mazowe', '', 1503988666, 1503988666, 252),
(210, '23 Macheke Farm Macheke', 'Mashonaland East', 'Marondera', '', 1503988809, 1503988809, 252),
(211, '34 Muredzi Farm Chiredzi', 'Masvingo', 'Masvingo', '', 1503990137, 1503990137, 252),
(212, '23 Mvurwi', 'Mashonaland Central', 'Mazowe', '0775011647', 1504515780, 1504515780, 252),
(213, 'Harare\r\nZimbabwe', 'Harare', 'Harare', '', 1517900002, 1517900002, 252),
(214, 'Harare\r\nZimbabwe', 'Harare', 'Harare', '', 1517900003, 1517900003, 252),
(215, 'Harare\r\nZimbabwe', 'Harare', 'Harare', '', 1517900043, 1517900043, 252),
(216, 'Harare\r\nZimbabwe', '0', '0', '', 1517900054, 1517900054, 252),
(217, '126 Townsend road, ', 'Bulawayo', 'Bulawayo', '+0444444', 1517900853, 1517900853, 252),
(218, '12 Townssend', 'Bulawayo', 'Bulawayo', '+0444444', 1517901343, 1517901343, 252),
(219, '2 June Drive', 'Harare', 'Harare', '+09999999', 1517902762, 1517902762, 252),
(220, '988 leander avenue', 'Harare', '0', '', 1517910390, 1517910390, 252),
(221, '1234', '0', '0', '', 1517910404, 1517910404, 252),
(222, 'Feldmannweg', 'Harare', '0', '+263772651784', 1518080752, 1518080752, 252),
(223, '21 lockview', '0', '0', '', 1518080887, 1518080887, 252),
(224, 'mutangi rutal area\r\nnemangwe\r\n', 'Harare', 'Harare', '+263772651784', 1518081181, 1518081181, 252),
(225, '21 flamelilly Kesington Bulawayo', 'Bulawayo', 'Bulawayo', '+2639201201', 1518081327, 1518081327, 252),
(226, '23 petunia Road', 'Manicaland', '0', '', 1518082265, 1518082265, 252),
(227, '19 kirkman road madaledale\r\n', 'Harare', 'Harare', '+2634772586', 1518082274, 1518082274, 252),
(228, 'xxxxx', 'Harare', 'Harare', '+263773132288', 1518092392, 1518092392, 252),
(229, 'ytd', 'Harare', 'Harare', '231', 1518092849, 1518092849, 252),
(230, 'tyombgyl', 'Harare', 'Harare', '+263772651784', 1518095882, 1518095882, 252),
(231, '83Pendennis Road Mt Pleasant', 'Harare', '0', '+263735925707', 1518419623, 1518419623, 252),
(232, '16 Adlyn, Marlborough', '0', '0', '04211378', 1518439592, 1518439592, 252),
(233, '5564 Zimre Park Ruwa', '0', '0', '', 1518526198, 1518526198, 252),
(234, '84 taormina ave ', '', '0', NULL, 1536314321, 1536314321, 252),
(235, '84 taormina ave ', '', '0', NULL, 1536314489, 1536314489, 252),
(236, '84 taormina ave ', '', '0', NULL, 1536314552, 1536314552, 252),
(237, '84 taormina ave ', '', '0', NULL, 1536314563, 1536314563, 252),
(238, '84 taormina ave ', '', '0', NULL, 1536314574, 1536314574, 252),
(239, '84 taormina ave ', '', '0', NULL, 1536314594, 1536314594, 252),
(240, '8376 hjdjgf', '', '0', NULL, 1536314705, 1536314705, 252),
(241, '8376 hjdjgf', '', '0', NULL, 1536314827, 1536314827, 252),
(242, '8376 hjdjgf', '', '0', NULL, 1536314958, 1536314958, 252),
(243, '84 taormina ', '', '0', NULL, 1536315898, 1536315898, 252),
(244, '84 taormina ', '', '0', NULL, 1536316183, 1536316183, 252),
(245, '84 taormina ', '', '0', NULL, 1536316197, 1536316197, 252),
(246, '84 taormina ', '', '0', NULL, 1536316208, 1536316208, 252),
(247, '84 taormina ', 'Manicaland', 'Chipinge', NULL, 1536316237, 1536316237, 252),
(248, '84 taormina ', '', '0', NULL, 1536316244, 1536316244, 252),
(249, '84 taormina ', '', '0', NULL, 1536316256, 1536316256, 252),
(250, '84 taormina ', '', '0', NULL, 1536316267, 1536316267, 252),
(251, '84 taormina ', '', '0', NULL, 1536316291, 1536316291, 252),
(252, '84 taormina ', 'Manicaland', 'Mutare', NULL, 1536316358, 1536316358, 252),
(253, '84 taormina ', 'Manicaland', 'Mutare', NULL, 1536316580, 1536316580, 252),
(254, '84 taormina ', '', '0', NULL, 1536316605, 1536316605, 252),
(255, '84 taormina ', 'Mashonaland Central', 'Mbire', NULL, 1536316641, 1536316641, 252),
(256, '84 taormina ', 'Midlands', 'Shurugwi', NULL, 1536659996, 1536659996, 252),
(257, '84 taormina ', 'Midlands', 'Shurugwi', NULL, 1536660152, 1536660152, 252),
(258, '84 taormina ', '', '0', NULL, 1536660223, 1536660223, 252),
(259, '84 taormina ', '', '0', NULL, 1536661058, 1536661058, 252),
(260, '84 taormina ', '', '0', NULL, 1536661085, 1536661085, 252),
(261, '84 taormina ', '', '0', NULL, 1536661200, 1536661200, 252),
(262, '84 taormina ', '', '0', NULL, 1536661219, 1536661219, 252),
(263, '84 taormina ', '', '0', NULL, 1536662493, 1536662493, 252),
(264, '84 taormina ', '', '0', NULL, 1536662514, 1536662514, 252),
(265, '84 taormina ', '', '0', NULL, 1536662673, 1536662673, 252),
(266, '84 taormina ', '', '0', NULL, 1536662691, 1536662691, 252),
(267, '84 taormina ', '', '0', NULL, 1536662863, 1536662863, 252),
(268, '84 taormina ', '', '0', NULL, 1536662881, 1536662881, 252),
(269, '84 taormina ', '', '0', NULL, 1536662954, 1536662954, 252),
(270, '84 taormina ', '', '0', NULL, 1536662986, 1536662986, 252),
(271, '84 taormina ', '', '0', NULL, 1536663081, 1536663081, 252),
(272, '84 taormina ', '', '0', NULL, 1536663153, 1536663153, 252),
(273, '84 taormina ', '', '0', NULL, 1536663505, 1536663505, 252),
(274, '84 taormina ', '', '0', NULL, 1536663562, 1536663562, 252),
(275, '84 taormina ', '', '0', NULL, 1536663619, 1536663619, 252),
(276, '84 taormina ', '', '0', NULL, 1536663843, 1536663843, 252),
(277, '84 taormina ', '', '0', NULL, 1536664514, 1536664514, 252),
(278, '84 taormina ', '', '0', NULL, 1536664853, 1536664853, 252),
(279, '84 taormina ', '', '0', NULL, 1536664881, 1536664881, 252),
(280, '84 taormina ', '', '0', NULL, 1536664976, 1536664976, 252),
(281, '73 frt', 'Matabeleland North', 'Lupane', NULL, 1536668323, 1536668323, 252),
(282, '73 frt', 'Matabeleland North', 'Lupane', NULL, 1536668832, 1536668832, 252),
(283, '73 frt', '', '0', NULL, 1536668844, 1536668844, 252),
(284, '73 frt', '', '0', NULL, 1536668858, 1536668858, 252),
(285, '73 frt', '', '0', NULL, 1536668899, 1536668899, 252),
(286, '73 frt', '', '0', NULL, 1536668910, 1536668910, 252),
(287, '73 frt', '', '0', NULL, 1536668968, 1536668968, 252),
(288, '73 frt', '', '0', NULL, 1536668982, 1536668982, 252),
(449, '884', 'Manicaland', 'Chipinge', NULL, 1537868246, 1537868246, 252),
(450, '884', 'Manicaland', 'Chipinge', NULL, 1537868290, 1537868290, 252),
(451, '884', 'Manicaland', 'Chimanimani', NULL, 1537868674, 1537868674, 252),
(452, '884', 'Manicaland', 'Chipinge', '0718299280', 1537869418, 1537869418, 252),
(453, '884', 'Harare', 'Harare', '0718464410', 1537869719, 1537869719, 252),
(454, '884', 'Midlands', '', '0718864410', 1537879343, 1537879343, 252),
(455, '884', 'Mashonaland Central', 'Mazowe', '0718874410', 1537881837, 1537881837, 252),
(456, '884', 'Mashonaland Central', 'Mazowe', '0718774410', 1537881912, 1537881912, 252),
(457, '884', 'Mashonaland Central', 'Mazowe', '0718774419', 1537882549, 1537882549, 252),
(458, '884', 'Mashonaland East', '', '0718774419', 1537882598, 1537882598, 252),
(459, '884', 'Harare', '', '0718774719', 1537882898, 1537882898, 252),
(460, '884', 'Mashonaland East', '', '0718774419', 1537883481, 1537883481, 252),
(461, '884', 'Manicaland', '', '0718974719', 1537883507, 1537883507, 252),
(462, '884', '', '', '0718994719', 1537883806, 1537883806, 252),
(463, '884', '', '', '0718994719', 1537883837, 1537883837, 252),
(464, '884', 'Mashonaland Central', '', '0718994719', 1537883901, 1537883901, 252),
(466, '884', 'Mashonaland Central', '', '0718998719', 1537884017, 1537884017, 252),
(468, '84 taormin aave ', 'Harare', 'Harare', '0782356449', 1539586775, 1539586775, 252),
(471, '84 taormina', 'Manicaland', 'Chimanimani', '0784516374', 1539634172, 1539634172, 252),
(472, '84 taormina', 'Manicaland', 'Mutare', '0784556384', 1539675698, 1539675698, 252),
(473, '84 taormina', 'Harare', 'Harare', '0784856384', 1539676449, 1539676449, 252),
(474, '84 taormina', 'Mashonaland Central', 'Mukumbura', '0786856384', 1539676604, 1539676604, 252),
(475, '84 taormina', 'Midlands', 'Zvishavane', '0786856384', 1539676720, 1539676720, 252),
(476, '84 taormina', 'Mashonaland West', 'Kadoma', '0786856388', 1539676761, 1539676761, 252),
(477, '84 taormina', 'Mashonaland West', 'Hurungwe', '0786856388', 1539676879, 1539676879, 252),
(478, '84 taormina', 'Matabeleland North', 'Umguza', '0786896388', 1539676905, 1539676905, 252),
(479, '84 taormina', 'Mashonaland East', 'Mudzi', '0786898388', 1539677086, 1539677086, 252),
(480, '84 taormina', 'Manicaland', 'Chipinge', '0786898488', 1539677283, 1539677283, 252),
(481, '84 taormina', 'Mashonaland West', 'Hurungwe', '0786898489', 1539677514, 1539677514, 252),
(482, '84 taormina', 'Mashonaland Central', 'Mazowe', '0786898788', 1539678329, 1539678329, 252),
(483, '84 taormina', 'Mashonaland East', 'Chikomba', '0786898758', 1539678359, 1539678359, 252),
(484, '84 taormina', 'Mashonaland Central', 'Mazowe', '0786798458', 1539679344, 1539679344, 252),
(485, '84 taormina', 'Bulawayo', 'Bulawayo', '0786398458', 1539679372, 1539679372, 252),
(486, '84 taormina', 'Bulawayo', 'Bulawayo', '0786398458', 1539679386, 1539679386, 252),
(487, '84 taormina', 'Mashonaland Central', 'Mbire', '0786498458', 1539679406, 1539679406, 252),
(488, '84 taormina', 'Masvingo', 'Mwenezi', '0786492458', 1539679558, 1539679558, 252),
(489, '1234', 'Harare', 'Harare', '0784516363', 1539851021, 1539851021, 252),
(490, '84', 'Bulawayo', 'Bulawayo', '0784516369', 1539851648, 1539851648, 252),
(491, '84 taormina ave', 'Harare', 'Harare', '0784517861', 1539867376, 1539867376, 252),
(492, '84 taormina ave', 'Bulawayo', 'Bulawayo', '0784517867', 1539867416, 1539867416, 252),
(493, '84 taormina ave', 'Mashonaland East', 'Murehwa', '0784517867', 1539868120, 1539868120, 252),
(494, '84 taormina ave', 'Harare', 'Harare', '0784517867', 1539868213, 1539868213, 252),
(495, '84 taormina ave', 'Harare', 'Harare', '0784517867', 1539868486, 1539868486, 252),
(496, '84 taormina ave', 'Harare', 'Harare', '0784517867', 1539868549, 1539868549, 252),
(497, '84 taormina ave', 'Harare', 'Harare', '0784517867', 1539868611, 1539868611, 252),
(498, '84 taormina ave', 'Harare', 'Harare', '0784517867', 1539868658, 1539868658, 252),
(499, '84 taormina ave', 'Manicaland', '', '0784517867', 1539868728, 1539868728, 252),
(500, '84 taormina ave', 'Harare', '', '0784517867', 1539868783, 1539868783, 252),
(501, '84 taormina ave', 'Harare', '', '0784517867', 1539868957, 1539868957, 252),
(502, '84 taormina ave', 'Matabeleland North', 'Tsholotsho', '0784517867', 1539868982, 1539868982, 252),
(503, 'payment ave', 'Harare', '', '0734516361', 1539941934, 1539941934, 252),
(504, 'payment ave', 'Masvingo', 'Masvingo', '0734516461', 1539943804, 1539943804, 252),
(505, 'pay ave', 'Midlands', 'Gweru', '0784516368', 1539950359, 1539950359, 252),
(506, '84 payme', 'Manicaland', 'Chipinge', '0784156361', 1539950720, 1539950720, 252),
(507, '2 Kalamba Road,\r\nMarondera', 'Mashonaland East', 'Marondera', '+26377600000', 1541584439, 1541584439, 252),
(508, '2 Kalamba Road,\r\nMarondera', 'Mashonaland East', 'Marondera', '+26377600000', 1541584575, 1541584575, 252),
(509, '1 Kenilworth Road,\r\nNewlands', 'Manicaland', 'Chimanimani', '0775431280', 1541752940, 1541752940, 252),
(510, '2 Kenilworth Road,\r\nNewlands', 'Harare', 'Harare', '0775431281', 1541754582, 1541754582, 252),
(511, '28 ', 'Midlands', 'Mberengwa', '0775824535', 1542111407, 1542111407, 252),
(512, '28', 'Matabeleland South', 'Umzingwane', '0775824535', 1542111446, 1542111446, 252),
(513, '84', 'Harare', 'Harare', '0773100200', 1543389743, 1543389743, 252),
(514, 'gmbtest3', 'Mashonaland West', 'Kadoma', '0772355001', 1543499671, 1543499671, 252),
(516, '1 promjo avenue', 'Harare', 'Harare', '0771111111', 1543839302, 1543839302, 252),
(517, '1 Glenlorne', 'Harare', 'Harare', '0777777111', 1544433531, 1544433531, 252),
(518, 'PLOT 8 URONGA SOUTH BINDURA', 'Mashonaland Central', 'Bindura', '0716587644', 1544779358, 1544779358, 252),
(519, 'Bindura', 'Mashonaland Central', 'Bindura', '0700000000', 1544795835, 1544795835, 252),
(520, '84 Taormina ave malborough', 'Harare', 'Harare', '0719387579', 1582483041, 1582483041, 252),
(521, '84 Taormina ave malborough', 'Midlands', 'Mberengwa', '0719387579', 1582483163, 1582483163, 252),
(522, '84 Taormina ave malborough', 'Bulawayo', 'Bulawayo', '0719387571', 1582483252, 1582483252, 252),
(523, '84 Taormina ave malborough', 'Bulawayo', 'Bulawayo', '0719387571', 1582483758, 1582483758, 252),
(524, '84 Taormina ave malborough', 'Bulawayo', 'Bulawayo', '0719387574', 1582483804, 1582483804, 252);

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `id` int(11) UNSIGNED NOT NULL,
  `farmer_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`id`, `farmer_id`, `bank_name`, `branch_name`, `account_number`, `account_name`, `created_at`, `updated_at`) VALUES
(1, NULL, '63-158354-3-a50', 'Male', '02 may 1995', '02 may 1995', 1536662986, 1536662986),
(2, NULL, '63-158354-3-a50', 'Male', '02 may 1995', '02 may 1995', 1536663081, 1536663081),
(3, NULL, '63-158354-3-a50', 'Male', '02 may 1995', '02 may 1995', 1536663153, 1536663153),
(4, NULL, '63-158354-3-a50', 'Male', '02 may 1995', '02 may 1995', 1536664881, 1536664881),
(5, NULL, '63-158354-2-3x50', 'Male', '12 may 1568', '12 may 1568', 1536668323, 1536668323),
(6, NULL, '63-158354-2-3x50', 'Male', '12 may 1568', '12 may 1568', 1536668858, 1536668858),
(7, NULL, '63-158354-2-3a55', 'Male', '02/05/1995', '02/05/1995', 1536733523, 1536733523),
(8, 10, 'Allied Bank                                                 ', '19507', '13453657338', 'cbz', 1537771612, 1537771612),
(9, 83, 'Agribank                                                    ', '10102', '11642783348', 'Sheila Sithole', 1537774173, 1537774173),
(10, 103, 'Agribank                                                    ', '10000', '11642783348', 'Sheila Sithole', 1537778611, 1537778611),
(11, 104, 'Agribank                                                    ', '10000', '11642783348', 'promise', 1537779324, 1537779324),
(12, 105, 'Agribank                                                    ', '10102', '11642783348', 'promise', 1537780767, 1537780767),
(13, 106, 'Agribank                                                    ', '10101', '11642783348', 'promise', 1537781038, 1537781038),
(14, 107, 'Agribank                                                    ', '10000', '435678798409309', 'cz', 1537781571, 1537781571),
(15, 108, 'Agribank                                                    ', '10101', '435678798409309', 'cz', 1537781778, 1537781778),
(16, 109, 'Agribank                                                    ', '10101', '435678798409309', 'cz', 1537783339, 1537783339),
(17, 110, 'Agribank                                                    ', '10101', '435678798409309', 'cz', 1537783731, 1537783731),
(18, 150, 'Agribank                                                    ', '10101', '435678798409309', 'cz', 1537784138, 1537784138),
(19, 152, 'Agribank                                                    ', '10000', '435678798409309', 'cbz', 1537784873, 1537784873),
(20, 153, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537785892, 1537785892),
(21, 159, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537791239, 1537791239),
(22, 161, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537791593, 1537791593),
(23, 162, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537792235, 1537792235),
(24, 166, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537793569, 1537793569),
(25, 167, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537793668, 1537793668),
(26, 170, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537793979, 1537793979),
(27, 171, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537794250, 1537794250),
(28, 172, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537794446, 1537794446),
(29, 175, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537795281, 1537795281),
(30, 176, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537795373, 1537795373),
(31, 177, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537795894, 1537795894),
(32, 178, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537795936, 1537795936),
(33, 179, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537796003, 1537796003),
(34, 180, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537796085, 1537796085),
(35, 181, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537796566, 1537796566),
(36, 182, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537797581, 1537797581),
(37, 183, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537797658, 1537797658),
(38, 184, 'Agribank                                                    ', '10101', '435678798409309', 'cbz', 1537797789, 1537797789),
(39, 185, 'Agribank                                                    ', '10000', '435678798409309', 'cbz', 1537798052, 1537798052),
(40, 186, 'Agribank                                                    ', '10000', '435678798409309', 'cbz', 1537798160, 1537798160),
(41, 187, 'Agribank                                                    ', '10000', '435678798409309', 'cbz', 1537799299, 1537799299),
(42, 188, 'Agribank                                                    ', '10101', '1427832409087', 'cbz', 1537813315, 1537813315),
(43, 189, 'Agribank                                                    ', '10000', '1427832409087', 'cbz', 1537815677, 1537815677),
(44, 190, 'Agribank                                                    ', '10000', '234567845', 'cbz', 1537858951, 1537858951),
(45, 191, 'Agribank                                                    ', '10102', '234567845', 'cbz', 1537859087, 1537859087),
(46, 192, 'Agribank                                                    ', '10102', '234567845', 'cbz', 1537859648, 1537859648),
(47, 193, 'Agribank                                                    ', '10000', '234567845', 'cbz', 1537861417, 1537861417),
(48, 194, 'Agribank                                                    ', '10000', '234567845', 'cbz', 1537861569, 1537861569),
(49, 195, 'Agribank                                                    ', '10000', '234567845', 'cbz', 1537861773, 1537861773),
(50, 196, 'Agribank                                                    ', '10000', '234567845', 'cbz', 1537862061, 1537862061),
(51, 197, 'Agribank                                                    ', '10000', '234567845', 'cbz', 1537862120, 1537862120),
(52, 198, 'Agribank                                                    ', '10000', '234567845', 'cbz', 1537862202, 1537862202),
(53, 199, 'Agribank                                                    ', '10000', '234567845', 'cbz', 1537862306, 1537862306),
(54, 200, 'Agribank                                                    ', '10101', '234567845', 'cbz', 1537862462, 1537862462),
(55, 201, 'Agribank                                                    ', '10101', '234567845', 'cbz', 1537863788, 1537863788),
(56, 202, 'Agribank                                                    ', '10101', '234567845', 'cbz', 1537865086, 1537865086),
(57, 203, 'Agribank                                                    ', '10101', '234567845', 'cbz', 1537865988, 1537865988),
(58, 204, 'Agribank                                                    ', '10000', '43287904865743625', 'cbz', 1537866484, 1537866484),
(59, 205, 'Agribank                                                    ', '10000', '43287904865743625', 'cbz', 1537868246, 1537868246),
(60, 206, 'Agribank                                                    ', '10000', '43287904865743625', 'cbz', 1537868291, 1537868291),
(61, 207, 'Agribank                                                    ', '10000', '43287904865743625', 'cbz', 1537869418, 1537869418),
(62, 208, 'Agribank                                                    ', '10000', '43287904865743625', 'cbz', 1537869719, 1537869719),
(63, 209, 'Agribank                                                    ', '10000', '43287904865743625', 'cbz', 1537879344, 1537879344),
(64, 210, 'Agribank                                                    ', '10000', '43287904865743625', 'cbz', 1537881837, 1537881837),
(65, 211, 'Agribank                                                    ', '10000', '43287904865743625', 'cbz', 1537881913, 1537881913),
(66, 212, 'Agribank                                                    ', '10000', '43287904865743625', 'cbz', 1537882549, 1537882549),
(67, 213, 'Agribank                                                    ', '10101', '43287904865743625', 'cbz', 1537882898, 1537882898),
(68, 214, 'Agribank                                                    ', '10101', '43287904865743625', 'cbz', 1537883507, 1537883507),
(69, 215, 'Agribank                                                    ', '10101', '43287904865743625', 'cbz', 1537883806, 1537883806),
(71, 217, 'Agribank                                                    ', '10101', '43287904865743625', 'cbz', 1537884017, 1537884017),
(76, 222, 'Agribank                                                    ', '10000', '87764532456', 'cash', 1539675698, 1539675698),
(78, 224, 'Agribank                                                    ', '10102', '87764532456', 'cash', 1539676604, 1539676604),
(79, 225, 'Agribank                                                    ', '10102', '87764532456', 'cash', 1539676761, 1539676761),
(81, 227, 'Agribank                                                    ', '10000', '87764532456', 'cash', 1539677086, 1539677086),
(82, 228, 'Agribank                                                    ', '10102', '87764532456', 'cash', 1539677284, 1539677284),
(86, 237, 'Agribank                                                    ', '10000', '12453758609', 'cash', 1539851021, 1539851021),
(87, 238, 'Agribank                                                    ', '10000', '12453758609', 'cbz', 1539851648, 1539851648),
(88, 239, 'Agribank                                                    ', '10111', '12453758609', 'cash', 1539867416, 1539867416),
(89, 240, 'Agribank                                                    ', '10101', '12453758609', 'cash', 1539941934, 1539941934),
(90, 241, 'Agribank                                                    ', '10101', '12453758609', 'cash', 1539943804, 1539943804),
(91, 242, 'Agribank                                                    ', '10000', '12453758609', 'cbz', 1539950359, 1539950359),
(92, 243, 'Agribank                                                    ', '10000', '12453758609', 'Cash', 1539950720, 1539950720),
(93, 245, 'FBC BANK LTD                                                ', '8102', '100034567', 'Svodesai T Sithole', 1541754583, 1541754583),
(94, 246, 'Agribank                                                    ', '10115', '12453758609', 'Cash', 1543389744, 1543389744),
(98, 250, 'Agribank                                                    ', '10000', '100', 'Tarsith', 1544433531, 1544433531),
(99, 251, 'Agribank                                                    ', '10111', '12324345656', 'cbz', 1544779358, 1544779358),
(100, 252, 'Agribank                                                    ', '10000', '161015', 'AMON BAMU', 1544795835, 1544795835),
(101, 255, 'Agribank                                                    ', '10102', '45743458', '43244546790', 1582483804, 1582483804);

-- --------------------------------------------------------

--
-- Table structure for table `basicformulas`
--

CREATE TABLE `basicformulas` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_variablecost_stage_id` int(11) DEFAULT NULL,
  `product_variablecost_id` int(11) DEFAULT NULL,
  `expectedquantity` double NOT NULL,
  `unitprice` double NOT NULL,
  `measurementunits` varchar(255) NOT NULL,
  `affectedbytargetyield` tinyint(1) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) UNSIGNED NOT NULL,
  `productoffer_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `price` mediumtext NOT NULL,
  `quantity` mediumtext NOT NULL,
  `total` mediumtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `productoffer_id`, `buyer_id`, `price`, `quantity`, `total`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 15, 53, '0.5', '1000', '500', 'straight', '', 1475048480, 1475048480),
(3, 15, 53, '0.5', '60', '30', 'straight', '', 1453985831, 1453985831),
(4, 3, 53, '5', '40', '200', 'straight', '', 1453989535, 1453989535),
(5, 12, 53, '1', '50', '50', 'straight', '', 1453989560, 1453989560),
(6, 3, 53, '5', '200', '1000', 'straight', '', 1461852029, 1461852029),
(7, 12, 53, '1', '1000', '1000', 'straight', '', 1461852050, 1461852050),
(8, 12, 53, '1', '2000', '2000', 'straight', '', 1475071317, 1475071317),
(9, 3, 53, '5', '500', '2500', 'straight', '', 1475071344, 1475071344),
(10, 6, 29, '5', '250', '1250', 'straight', '', 1475478863, 1475478863),
(11, 11, 29, '2', '40', '80', 'straight', '', 1476189501, 1476189501),
(12, 7, 29, '90', '2000', '180000', 'straight', '', 1476344962, 1476344962),
(13, 14, 17, '0.5', '10000', '5000', 'straight', '', 1476952853, 1476952853),
(14, 8, 17, '1', '200', '200', 'straight', '', 1477653045, 1477653045),
(15, 12, 29, '1', '100', '100', 'straight', '', 1477897878, 1477897878),
(16, 11, 29, '2', '40', '80', 'straight', '', 1477898013, 1477898013),
(17, 11, 29, '2', '50', '100', 'straight', '', 1477899310, 1477899310),
(18, 20, 47, '0.20', '5', '1', 'straight', '', 1484290918, 1484290918),
(19, 20, 47, '0.20', '25', '5', 'straight', '', 1484293601, 1484293601),
(20, 20, 47, '0.20', '25', '5', 'straight', '', 1484293882, 1484293882),
(21, 20, 47, '0.20', '25', '5', 'straight', '', 1484315692, 1484315692),
(22, 15, 2, '0.5', '20', '10', 'straight', '', 1484547973, 1484547973),
(23, 22, 32, '0.8', '40', '32', 'straight', '', 1493720438, 1493720438),
(24, 22, 47, '0.8', '20', '16', 'straight', '', 1494832017, 1494832017),
(25, 22, 47, '0.8', '20', '16', 'straight', '', 1495089445, 1495089445),
(26, 15, 2, '0.5', '1000', '500', 'straight', '', 1495089446, 1495089446),
(27, 20, 29, '0.20', '20', '4', 'straight', '', 1495199219, 1495199219),
(28, 15, 29, '0.5', '30', '15', 'straight', '', 1495621457, 1495621457),
(29, 15, 29, '0.5', '200', '100', 'straight', '', 1498724153, 1498724153),
(30, 12, 29, '1', '360', '360', 'straight', '', 1499077760, 1499077760),
(31, 12, 2, '1', '150', '150', 'straight', '', 1499239937, 1499239937),
(32, 11, 29, '2', '20', '40', 'straight', '', 1499948249, 1499948249),
(33, 11, 29, '2', '30', '60', 'straight', '', 1499951839, 1499951839),
(34, 12, 29, '1', '25', '25', 'straight', '', 1500450233, 1500450233),
(35, 22, 2, '0.8', '120', '96', 'straight', '', 1500880444, 1500880444),
(36, 22, 2, '0.8', '10', '8', 'straight', '', 1501744003, 1501744003),
(37, 22, 2, '0.8', '20', '16', 'straight', '', 1501767755, 1501767755),
(38, 22, 2, '0.8', '20', '16', 'straight', '', 1501833601, 1501833601),
(39, 22, 2, '0.8', '20', '16', 'straight', '', 1502132774, 1502132774),
(40, 21, 2, '500.00', '1', '500', 'straight', '', 1502178578, 1502178578),
(41, 22, 2, '0.8', '20', '16', 'straight', '', 1502183220, 1502183220),
(42, 22, 2, '0.8', '10', '8', 'straight', '', 1502197872, 1502197872),
(43, 7, 60, '90', '90', '8100', 'straight', '', 1502285979, 1502285979),
(44, 22, 2, '0.8', '50', '40', 'straight', '', 1502878239, 1502878239),
(45, 22, 24, '0.8', '100', '80', 'straight', '', 1504514695, 1504514695),
(46, 22, 38, '0.8', '100', '80', 'straight', '', 1517922458, 1517922458),
(47, 24, 81, '1', '100', '100', 'straight', '', 1518083193, 1518083193),
(48, 24, 77, '1', '120', '120', 'straight', '', 1518527411, 1518527411),
(49, 23, 77, '1', '10', '10', 'straight', '', 1518594066, 1518594066),
(50, 24, 77, '1', '100', '100', 'straight', '', 1518612803, 1518612803),
(51, 26, 5, '1', '20', '20', 'straight', '', 1532502351, 1532502351),
(52, 22, 5, '0.8', '10', '8', 'straight', '', 1532502543, 1532502543),
(53, 26, 2, '1', '1000', '1000', 'straight', '', 1535967003, 1535967003),
(54, 26, 2, '1', '1000', '1000', 'straight', '', 1582654147, 1582654147),
(55, 26, 2, '1', '1000', '1000', 'straight', '', 1582654226, 1582654226),
(56, 26, 2, '1', '20', '20', 'straight', '', 1582655562, 1582655562),
(57, 26, 2, '1', '20', '20', 'straight', '', 1582655714, 1582655714),
(58, 25, 2, '1', '20', '20', 'straight', '', 1582655833, 1582655833);

-- --------------------------------------------------------

--
-- Table structure for table `bids2`
--

CREATE TABLE `bids2` (
  `id` int(11) UNSIGNED NOT NULL,
  `productoffer_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `price` mediumtext NOT NULL,
  `quantity` mediumtext NOT NULL,
  `total` mediumtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bids2`
--

INSERT INTO `bids2` (`id`, `productoffer_id`, `buyer_id`, `price`, `quantity`, `total`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '3.20', '12', '', 'straight', 'accepted', 1449152233, 1449152233),
(2, 3, 2, '4.50', '7', '', 'bid', 'pending', 1449152616, 1449152616),
(3, 2, 1, '5', '20', '', 'bid', 'pending', 1449215001, 1449215001),
(4, 2, 1, '6', '20', '', 'straight', 'accepted', 1449221105, 1449221105),
(5, 2, 1, '26', '3', '', 'bid', '', 1449223876, 1449223876),
(6, 1, 2, '4', '10', '', 'straight', '', 1449570638, 1449570638),
(7, 1, 2, '4', '10', '', 'straight', '', 1449579811, 1449579811),
(8, 4, 2, '0.5', '10', '', 'straight', '', 1449581049, 1449581049),
(9, 1, 2, '4', '10', '', 'straight', '', 1449581279, 1449581279),
(10, 1, 2, '4', '10', '', 'straight', '', 1449581306, 1449581306),
(11, 4, 2, '0.5', '25', '', 'straight', '', 1449581648, 1449581648),
(12, 4, 2, '0.5', '5', '', 'straight', '', 1449581775, 1449581775),
(13, 4, 2, '0.5', '5', '', 'straight', '', 1449582344, 1449582344),
(14, 4, 2, '0.5', '5', '', 'straight', '', 1449582374, 1449582374),
(15, 4, 2, '0.5', '5', '', 'straight', '', 1449584591, 1449584591),
(16, 4, 2, '0.5', '5', '', 'straight', '', 1449584612, 1449584612),
(17, 4, 2, '0.5', '5', '', 'straight', '', 1449584838, 1449584838),
(18, 4, 2, '0.5', '5', '', 'straight', '', 1449584933, 1449584933),
(19, 4, 2, '0.5', '5', '', 'straight', '', 1449584961, 1449584961),
(20, 4, 2, '0.5', '5', '', 'straight', '', 1449585006, 1449585006),
(21, 4, 2, '0.5', '5', '', 'straight', '', 1449585131, 1449585131),
(22, 4, 2, '0.5', '5', '', 'straight', '', 1449585335, 1449585335),
(23, 4, 2, '0.5', '5', '', 'straight', '', 1449585659, 1449585659),
(24, 4, 2, '0.5', '5', '', 'straight', '', 1449585686, 1449585686),
(25, 4, 2, '0.5', '5', '', 'straight', '', 1449585821, 1449585821),
(26, 4, 2, '0.5', '5', '', 'straight', '', 1449585909, 1449585909),
(27, 4, 2, '0.5', '5', '', 'straight', '', 1449585920, 1449585920),
(28, 1, 2, '4', '10', '', 'straight', '', 1449644180, 1449644180),
(29, 1, 2, '4', '10', '', 'straight', '', 1449644271, 1449644271),
(30, 1, 2, '4', '10', '', 'straight', '', 1449644400, 1449644400),
(31, 3, 2, '5', '5', '', 'straight', '', 1449644848, 1449644848),
(32, 3, 2, '5', '5', '', 'straight', '', 1449657096, 1449657096),
(33, 3, 2, '5', '5', '', 'straight', '', 1449657151, 1449657151),
(34, 3, 2, '5', '5', '', 'straight', '', 1449657460, 1449657460),
(35, 1, 2, '4', '10', '40', 'straight', '', 1449664357, 1449664357),
(36, 1, 2, '4', '10', '40', 'straight', '', 1449672565, 1449672565),
(37, 3, 2, '5', '5', '25', 'straight', '', 1449687259, 1449687259),
(38, 3, 2, '5', '5', '25', 'straight', '', 1449729076, 1449729076),
(39, 1, 2, '4', '20', '80', 'straight', '', 1449738958, 1449738958),
(40, 0, 1, '0.20', '20', '4', 'straight', '', 1449743564, 1451999741),
(41, 2, 1, '2', '20', '40', 'straight', '', 1449748825, 1449748825),
(42, 0, 1, '0.20', '20', '4', 'straight', '', 1449752939, 1451999741),
(43, 0, 1, '0.20', '20', '4', 'straight', '', 1449753813, 1451999741),
(44, 1, 2, '4', '10', '40', 'straight', '', 1449826800, 1449826800),
(45, 0, 1, '0.20', '38', '7.6000000000000005', 'straight', '', 1450170102, 1451999741),
(46, 0, 1, '0.20', '38', '7.6000000000000005', 'straight', '', 1450170141, 1451999741),
(47, 0, 1, '0.20', '30.4', '6.08', 'straight', '', 1450170154, 1451999741),
(48, 1, 2, '4', '20', '80', 'straight', '', 1450679805, 1450679805),
(49, 8, 2, '1', '20', '20', 'straight', '', 1452177006, 1452177006),
(50, 8, 2, '1', '10', '10', 'straight', '', 1454922713, 1454922713),
(51, 8, 2, '1', '10', '10', 'straight', '', 1454922751, 1454922751),
(52, 8, 2, '1', '15', '15', 'straight', '', 1454922770, 1454922770),
(53, 2, 11, '2', '30', '60', 'straight', '', 1455171905, 1455171905),
(54, 8, 2, '1', '25', '25', 'straight', '', 1455199463, 1455199463),
(55, 11, 16, '2', '10', '20', 'straight', '', 1455529575, 1455529575),
(56, 11, 16, '2', '10', '20', 'straight', '', 1455529945, 1455529945),
(57, 8, 2, '1', '20', '20', 'straight', '', 1455537016, 1455537016),
(58, 12, 2, '1', '20', '20', 'straight', '', 1455537856, 1455537856),
(59, 2, 18, '2', '20', '40', 'straight', '', 1455630544, 1455630544),
(60, 12, 2, '1', '20', '20', 'straight', '', 1455692384, 1455692384),
(61, 12, 2, '1', '20', '20', 'straight', '', 1455701035, 1455701035),
(62, 2, 19, '2', '40', '80', 'straight', '', 1455701988, 1455701988),
(63, 13, 2, '4', '10', '40', 'straight', '', 1455702348, 1455702348),
(64, 13, 2, '4', '20', '80', 'straight', '', 1455702489, 1455702489),
(65, 2, 19, '2', '30', '60', 'straight', '', 1455702691, 1455702691),
(66, 13, 2, '4', '10', '40', 'straight', '', 1455703643, 1455703643),
(67, 13, 2, '4', '10', '40', 'straight', '', 1455705483, 1455705483),
(68, 15, 2, '2', '100', '200', 'straight', '', 1455705957, 1455705957),
(69, 7, 19, '90', '60', '5400', 'straight', '', 1455730850, 1455730850),
(70, 18, 19, '3.50', '12.5', '43.75', 'straight', '', 1455774506, 1455774506),
(71, 7, 22, '90', '60', '5400', 'straight', '', 1455776934, 1455776934),
(72, 15, 23, '2', '300', '600', 'straight', '', 1455783908, 1455783908),
(73, 15, 2, '2', '20', '40', 'straight', '', 1457506145, 1457506145),
(74, 6, 10, '5', '20', '100', 'straight', '', 1458297503, 1458297503),
(75, 6, 10, '5', '20', '100', 'straight', '', 1458303861, 1458303861),
(76, 1, 2, '4', '15', '60', 'straight', '', 1459504865, 1459504865),
(77, 1, 2, '4', '20', '80', 'straight', '', 1463732699, 1463732699),
(78, 1, 2, '4', '25', '100', 'straight', '', 1463739988, 1463739988),
(79, 3, 2, '5', '25', '125', 'straight', '', 1463740609, 1463740609),
(80, 8, 2, '1', '10', '10', 'straight', '', 1463748422, 1463748422),
(81, 1, 2, '4', '38', '152', 'straight', '', 1464961736, 1464961736),
(82, 1, 2, '4', '10', '40', 'straight', '', 1465199211, 1465199211),
(83, 3, 2, '5', '5', '25', 'straight', '', 1465476308, 1465476308),
(84, 3, 2, '5', '5', '25', 'straight', '', 1466070048, 1466070048),
(85, 3, 29, '5', '5', '25', 'straight', '', 1466500632, 1466500632),
(86, 1, 2, '4', '18', '72', 'straight', '', 1466511102, 1466511102),
(87, 1, 2, '4', '22', '88', 'straight', '', 1466589229, 1466589229),
(88, 27, 2, '2.50', '10', '25', 'straight', '', 1466690390, 1466690390),
(89, 27, 29, '2.50', '200', '500', 'straight', '', 1466691566, 1466691566),
(90, 27, 2, '2.50', '40', '100', 'straight', '', 1466764403, 1466764403),
(91, 29, 2, '25', '25', '625', 'straight', '', 1466765212, 1466765212),
(92, 20, 17, '5', '20', '100', 'straight', '', 1467796951, 1467796951),
(93, 29, 17, '24', '25', '600', 'straight', '', 1467802392, 1467802392),
(94, 27, 31, '2.50', '20', '50', 'straight', '', 1467874313, 1467874313),
(95, 27, 32, '2.50', '25', '62.5', 'straight', '', 1467876752, 1467876752),
(96, 30, 2, '1.25', '25', '31.25', 'straight', '', 1467886750, 1467886750),
(97, 30, 2, '1.25', '10', '12.5', 'straight', '', 1467899811, 1467899811),
(98, 29, 2, '24', '25', '600', 'straight', '', 1467959362, 1467959362),
(99, 27, 29, '2.50', '100', '250', 'straight', '', 1468574764, 1468574764),
(100, 30, 2, '1.25', '20', '25', 'straight', '', 1468824543, 1468824543),
(101, 30, 29, '1.25', '10', '12.5', 'straight', '', 1468839679, 1468839679),
(102, 27, 29, '2.50', '40', '100', 'straight', '', 1468839984, 1468839984),
(103, 30, 29, '1.25', '5', '6.25', 'straight', '', 1468911995, 1468911995),
(104, 27, 29, '2.50', '10', '25', 'straight', '', 1468913470, 1468913470),
(105, 30, 2, '1.25', '20', '25', 'straight', '', 1468928889, 1468928889),
(106, 6, 29, '5', '20', '100', 'straight', '', 1468934459, 1468934459),
(107, 30, 29, '1.25', '5', '6.25', 'straight', '', 1468945951, 1468945951),
(108, 30, 29, '1.25', '15', '18.75', 'straight', '', 1469000247, 1469000247),
(109, 25, 29, '0.5', '10', '5', 'straight', '', 1469025133, 1469025133),
(110, 14, 11, '0.5', '5', '2.5', 'straight', '', 1469210976, 1469210976),
(111, 30, 2, '1.25', '20', '25', 'straight', '', 1470572362, 1470572362),
(112, 30, 2, '1.25', '20', '25', 'straight', '', 1470658135, 1470658135),
(113, 30, 2, '1.25', '20', '25', 'straight', '', 1470738361, 1470738361),
(114, 29, 2, '24', '20', '480', 'straight', '', 1470738652, 1470738652),
(115, 30, 2, '1.25', '20', '25', 'straight', '', 1470739251, 1470739251),
(116, 27, 2, '2.50', '10', '25', 'straight', '', 1470741962, 1470741962),
(117, 29, 2, '24', '20', '480', 'straight', '', 1470742162, 1470742162),
(118, 27, 2, '2.50', '20', '50', 'straight', '', 1470745442, 1470745442),
(119, 27, 2, '2.50', '20', '50', 'straight', '', 1470749587, 1470749587),
(120, 27, 2, '2.50', '10', '25', 'straight', '', 1470813594, 1470813594),
(121, 27, 2, '2.50', '15', '37.5', 'straight', '', 1470814058, 1470814058),
(122, 27, 2, '2.50', '10', '25', 'straight', '', 1470817825, 1470817825),
(123, 27, 2, '2.50', '15', '37.5', 'straight', '', 1470818682, 1470818682),
(124, 30, 2, '1.25', '10', '12.5', 'straight', '', 1470820275, 1470820275),
(125, 30, 2, '1.25', '4000', '5000', 'straight', '', 1470822733, 1470822733),
(126, 29, 2, '24', '20', '480', 'straight', '', 1470825285, 1470825285),
(127, 30, 2, '1.25', '100', '125', 'straight', '', 1470830343, 1470830343),
(128, 30, 2, '9.99', '20', '199.8', 'straight', '', 1470836466, 1470836466),
(129, 30, 2, '9.99', '20', '199.8', 'straight', '', 1470836545, 1470836545),
(130, 30, 2, '9.99', '20', '199.8', 'straight', '', 1470837500, 1470837500),
(131, 30, 2, '9.99', '20', '199.8', 'straight', '', 1470837810, 1470837810),
(132, 29, 2, '24', '20', '480', 'straight', '', 1470838072, 1470838072),
(133, 30, 2, '9.99', '40', '399.6', 'straight', '', 1470838567, 1470838567),
(134, 30, 2, '9.99', '40', '399.6', 'straight', '', 1470839493, 1470839493),
(135, 30, 2, '9.99', '60', '599.4', 'straight', '', 1470839620, 1470839620),
(136, 30, 2, '9.99', '60', '599.4', 'straight', '', 1470840096, 1470840096),
(137, 28, 29, '0.50', '20', '10', 'straight', '', 1471419162, 1471419162),
(138, 19, 29, '12', '40', '480', 'straight', '', 1471419821, 1471419821),
(139, 28, 2, '0.50', '2000', '1000', 'straight', '', 1471420031, 1471420031),
(140, 28, 29, '0.50', '100', '50', 'straight', '', 1471426583, 1471426583),
(141, 30, 29, '9.99', '100', '999', 'straight', '', 1471442023, 1471442023),
(142, 18, 29, '3.50', '100', '350', 'straight', '', 1471508146, 1471508146),
(143, 32, 40, '0.23', '25', '5.75', 'straight', '', 1471514470, 1471514470),
(144, 33, 38, '3', '20', '60', 'straight', '', 1471523418, 1471523418),
(145, 35, 29, '5', '100', '500', 'straight', '', 1471526209, 1471526209);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) UNSIGNED NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_address` varchar(255) NOT NULL,
  `bank_city` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `swift_code` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `bank_name`, `bank_address`, `bank_city`, `branch_name`, `swift_code`, `created_at`, `updated_at`) VALUES
(1, '10000', 'Agribank                                                    ', '17 Nelson Mandela             ', '                                   ', 'Agribank Hurudza House                  ', '           ', 0, 0),
(2, '10101', 'Agribank                                                    ', '17 Nelson Mandela Avenue      ', 'Harare                             ', 'Agribank Nelson Mandela                 ', 'AGRZZWHA   ', 0, 0),
(3, '10102', 'Agribank                                                    ', '17 Nelson Mandela Avenue      ', 'Harare                             ', 'Agribank HQ                             ', 'AGRZZWHA   ', 0, 0),
(4, '10111', 'Agribank                                                    ', 'Westgate Shopping Center      ', 'Harare                             ', 'Agribank Westgate                       ', 'AGRZZWHA   ', 0, 0),
(5, '10114', 'Agribank                                                    ', '17 Nelson Mandela Avenue      ', 'Harare                             ', 'Agribank Human Resources                ', 'AGRZZWHA   ', 0, 0),
(6, '10115', 'Agribank                                                    ', '17 Nelson Mandela Avenue      ', 'Harare                             ', 'Agribank Treasury                       ', 'AGRZZWHA   ', 0, 0),
(7, '10304', 'Agribank                                                    ', 'Herbert Chitepo               ', 'Bulawayo                           ', 'Agribank Herbert Chitepo                ', 'AGRZZWHA   ', 0, 0),
(8, '10502', 'Agribank                                                    ', 'Chegutu                       ', 'Chegutu                            ', 'Agribank Chegutu                        ', 'AGRZZWHA   ', 0, 0),
(9, '10505', 'Agribank                                                    ', 'Chinhoyi                      ', 'Chinhoyi                           ', 'Agribank Chinhoyi                       ', 'AGRZZWHA   ', 0, 0),
(10, '10506', 'Agribank                                                    ', 'Gweru                         ', 'Gweru                              ', 'Agribank Gweru                          ', 'AGRZZWHA   ', 0, 0),
(11, '10507', 'Agribank                                                    ', 'Marondera                     ', 'Marondera                          ', 'Agribank Marondera                      ', 'AGRZZWHA   ', 0, 0),
(12, '10508', 'Agribank                                                    ', 'Masvingo                      ', 'Masvingo                           ', 'Agribank Masvingo                       ', 'AGRZZWHA   ', 0, 0),
(13, '10509', 'Agribank                                                    ', 'Mutare                        ', 'Mutare                             ', 'Agribank Mutare                         ', 'AGRZZWHA   ', 0, 0),
(14, '10510', 'Agribank                                                    ', 'Mvurwi                        ', 'Mvurwi                             ', 'Agribank Mvurwi                         ', 'AGRZZWHA   ', 0, 0),
(15, '10512', 'Agribank                                                    ', 'Gokwe                         ', 'Gokwe                              ', 'Agribank Gokwe                          ', 'AGRZZWHA   ', 0, 0),
(16, '10513', 'Agribank                                                    ', 'Karoi                         ', 'Karoi                              ', 'Agribank Karoi                          ', 'AGRZZWHA   ', 0, 0),
(17, '10516', 'Agribank                                                    ', 'Gwanda                        ', 'Gwanda                             ', 'Agribank Gwanda                         ', 'AGRZZWHA   ', 0, 0),
(18, '10517', 'Agribank                                                    ', 'Norton                        ', 'Norton                             ', 'Agribank Norton                         ', 'AGRZZWHA   ', 0, 0),
(19, '10518', 'Agribank                                                    ', 'Chiredzi                      ', 'Chiredzi                           ', 'Agribank Chiredzi                       ', 'AGRZZWHA   ', 0, 0),
(20, '10519', 'Agribank                                                    ', 'Guruve                        ', 'Guruve                             ', 'Agribank Guruve                         ', 'AGRZZWHA   ', 0, 0),
(21, '10520', 'Agribank                                                    ', 'Murambinda                    ', 'Murambinda                         ', 'Agribank Murambinda                     ', 'AGRZZWHA   ', 0, 0),
(22, '10521', 'Agribank                                                    ', 'Hauna                         ', 'Hauna                              ', 'Agribak Hauna                           ', 'AGRZZWHA   ', 0, 0),
(23, '10530', 'Agribank                                                    ', 'Bindura                       ', 'Bindura                            ', 'Agribank Bindura                        ', 'AGRZZWHA   ', 0, 0),
(24, '11101', 'NMB Bank                                                    ', 'Angwa City, Julius Nyerere  ', 'Harare                             ', 'Angwa City                              ', 'NMBLZWHX   ', 0, 0),
(25, '11102', 'NMB Bank                                                    ', 'Bulawayo                      ', 'Bulawayo                           ', 'Bulawayo B MBch                         ', 'NMBLZWHX   ', 0, 0),
(26, '11103', 'NMB Bank                                                    ', 'Eastgate Shopping Center      ', 'Harare                             ', 'EastGate                                ', 'NMBLZWHX   ', 0, 0),
(27, '11104', 'NMB Bank                                                    ', 'Card Centre                   ', 'Harare                             ', 'Card Centre                             ', 'NMBLZWHX   ', 0, 0),
(28, '11105', 'NMB Bank                                                    ', 'Borrowdale                    ', 'Harare                             ', 'Borrowdale                              ', 'NMBLZWHX   ', 0, 0),
(29, '11106', 'NMB Bank                                                    ', 'Msasa                         ', 'Harare                             ', 'Msasa                                   ', 'NMBLZWHX   ', 0, 0),
(30, '11107', 'NMB Bank                                                    ', 'Southerton                    ', 'Harare                             ', 'Southerton                              ', 'NMBLZWHX   ', 0, 0),
(31, '11108', 'NMB Bank                                                    ', '9 Plymouth Road.Southerton.   ', 'Harare                             ', 'Southerton                              ', '           ', 0, 0),
(32, '11109', 'NMB Bank                                                    ', 'Bulawayo                      ', 'Bulawayo                           ', 'Bulawayo B MBch                         ', 'NMBLZWHX   ', 0, 0),
(33, '113100', 'CBZ Bank Main Account                                       ', '                              ', '                                   ', '                                        ', '           ', 0, 0),
(34, '11311', 'NMB Bank                                                    ', 'Mutare                        ', 'Mutare                             ', 'Mutare B MBch                           ', 'NMBLZWHX   ', 0, 0),
(35, '11521', 'NMB Bank                                                    ', 'Harare                        ', 'Gweru                              ', 'Gweru                                   ', 'NMBLZWHX   ', 0, 0),
(36, '12100', 'Kingdom Bank                                                ', 'Graniteside                   ', 'Harare                             ', 'Cash Centre Graniteside                 ', 'KFISZWHA   ', 0, 0),
(37, '12101', 'Kingdom Bank                                                ', 'Head Office                   ', 'Harare                             ', 'Head Office                             ', 'KFISZWHA   ', 0, 0),
(38, '12106', 'Kingdom Bank                                                ', 'Graniteside                   ', 'Harare                             ', 'CashCentre Graniteside                  ', 'KFISZWHA   ', 0, 0),
(39, '12108', 'Kingdom Bank                                                ', 'Angwa St                      ', 'Harare                             ', 'Angwa St                                ', 'KFISZWHA   ', 0, 0),
(40, '12109', 'Kingdom Bank                                                ', 'Hyber                         ', 'Harare                             ', 'Hyber                                   ', 'KFISZWHA   ', 0, 0),
(41, '12112', 'Kingdom Bank                                                ', 'Kenneth Kaunda Ave            ', 'Harare                             ', 'Kenneth Kaunda Ave                      ', 'KFISZWHA   ', 0, 0),
(42, '12114', 'Kingdom Bank                                                ', 'Avondale                      ', 'Harare                             ', 'Avondale                                ', 'KFISZWHA   ', 0, 0),
(43, '12116', 'Kingdom Bank                                                ', 'KAM                           ', 'Harare                             ', 'KAM                                     ', 'KFISZWHA   ', 0, 0),
(44, '12117', 'Kingdom Bank                                                ', 'TBA                           ', 'Harare                             ', 'TBA                                     ', 'KFISZWHA   ', 0, 0),
(45, '12124', 'Kingdom Bank                                                ', 'Pioneer Hse                   ', 'Harare                             ', 'Pioneer Hse                             ', 'KFISZWHA   ', 0, 0),
(46, '12131', 'Kingdom Bank                                                ', 'First St Branch               ', 'Harare                             ', 'First St Branch                         ', 'KFISZWHA   ', 0, 0),
(47, '12137', 'Kingdom Bank                                                ', 'High Glen                     ', 'Harare                             ', 'High Glen                               ', 'KFISZWHA   ', 0, 0),
(48, '12138', 'Kingdom Bank                                                ', 'DCZ                           ', 'Harare                             ', 'DCZ                                     ', 'KFISZWHA   ', 0, 0),
(49, '12141', 'Kingdom Bank                                                ', 'S.Machel Avenue               ', 'Harare                             ', 'S.Machel Avenue                         ', 'KFISZWHA   ', 0, 0),
(50, '12142', 'Kingdom Bank                                                ', 'Westgate                      ', 'Harare                             ', 'Westgate                                ', 'KFISZWHA   ', 0, 0),
(51, '12145', 'Kingdom Bank                                                ', 'CrownPlaza                    ', 'Harare                             ', 'CrownPlaza                              ', 'KFISZWHA   ', 0, 0),
(52, '12146', 'Kingdom Bank                                                ', 'Ruwa                          ', 'Harare                             ', 'Ruwa                                    ', 'KFISZWHA   ', 0, 0),
(53, '12147', 'Kingdom Bank                                                ', 'Borrowdale                    ', 'Harare                             ', 'Borrowdale                              ', 'KFISZWHA   ', 0, 0),
(54, '12148', 'Kingdom Bank                                                ', 'Msasa Jaggers                 ', 'Harare                             ', 'Msasa Jaggers                           ', 'KFISZWHA   ', 0, 0),
(55, '12149', 'Kingdom Bank                                                ', 'Graniteside                   ', 'Harare                             ', 'Graniteside                             ', 'KFISZWHA   ', 0, 0),
(56, '12156', 'Kingdom Bank                                                ', 'Chitungwiza                   ', 'Harare                             ', 'Chitungwiza                             ', 'KFISZWHA   ', 0, 0),
(57, '12306', 'Kingdom Bank                                                ', 'J/Moyo                        ', 'Bulawayo                           ', 'J/Moyo                                  ', 'KFISZWHA   ', 0, 0),
(58, '12309', 'Kingdom Bank                                                ', 'Hyber                         ', 'Bulawayo                           ', 'Hyber                                   ', 'KFISZWHA   ', 0, 0),
(59, '12324', 'Kingdom Bank                                                ', 'KAM                           ', 'Bulawayo                           ', 'KAM                                     ', 'KFISZWHA   ', 0, 0),
(60, '12325', 'Kingdom Bank                                                ', 'TBA                           ', 'Bulawayo                           ', 'TBA                                     ', 'KFISZWHA   ', 0, 0),
(61, '12333', 'Kingdom Bank                                                ', 'Bambanani                     ', 'Bulawayo                           ', 'Bambanani                               ', 'KFISZWHA   ', 0, 0),
(62, '12339', 'Kingdom Bank                                                ', 'Belmont                       ', 'Bulawayo                           ', 'Belmont                                 ', 'KFISZWHA   ', 0, 0),
(63, '12507', 'Kingdom Bank                                                ', 'Mutare                        ', 'Mutare                             ', 'Mutare                                  ', 'KFISZWHA   ', 0, 0),
(64, '12511', 'Kingdom Bank                                                ', 'Sakubva                       ', 'Mutare                             ', 'Sakubva                                 ', 'KFISZWHA   ', 0, 0),
(65, '12513', 'Kingdom Bank                                                ', 'Ruwa                          ', 'Harare                             ', 'Ruwa                                    ', 'KFISZWHA   ', 0, 0),
(66, '12521', 'Kingdom Bank                                                ', 'Masvingo                      ', 'Masvingo                           ', 'Masvingo                                ', 'KFISZWHA   ', 0, 0),
(67, '12532', 'Kingdom Bank                                                ', 'Mutare                        ', 'Mutare                             ', 'Mutare                                  ', 'KFISZWHA   ', 0, 0),
(68, '12535', 'Kingdom Bank                                                ', 'Victoria Falls                ', 'VictoriaFa                         ', 'Victoria Falls                          ', 'KFISZWHA   ', 0, 0),
(69, '12551', 'Kingdom Bank                                                ', 'Gweru                         ', 'Gweru                              ', 'Gweru                                   ', 'KFISZWHA   ', 0, 0),
(70, '12552', 'Kingdom Bank                                                ', 'Chipinge                      ', 'Chipinge                           ', 'Chipinge                                ', 'KFISZWHA   ', 0, 0),
(71, '13000', 'Capital Bank                                                ', 'Head Office                   ', 'Harare                             ', 'Head Office                             ', 'CBBLZWHX   ', 0, 0),
(72, '13101', 'CFX Bank                                                    ', 'FX House, Samora Machel Av    ', 'Harare  ', 'Harare Branch    ', '', 0, 0),
(73, '13102', 'CFX Bank                                                    ', 'First St, Harare', 'Harare                             ', 'First St Branch                         ', '           ', 0, 0),
(74, '13301', 'CFX Bank                                                    ', 'Machipisa Shopping Center     ', 'Harare                             ', 'Machipisa Branch                        ', '           ', 0, 0),
(75, '13303', 'CFX Bank                                                    ', 'Mbare, Harare      ', 'Harare                             ', 'Mbare Branch                            ', '           ', 0, 0),
(76, '13305', 'CFX Bank                                                    ', 'Bulawayo                      ', 'Bulawayo                           ', '                                        ', '           ', 0, 0),
(77, '13506', 'CFX Bank                                                    ', 'Gweru                         ', 'Gweru                              ', 'Gweru Branch                            ', '           ', 0, 0),
(78, '13507', 'CFX Bank                                                    ', 'Masvingo                      ', 'Masvingo                           ', 'Masvingo Branch                         ', '           ', 0, 0),
(79, '13508', 'CFX Bank                                                    ', 'Mutare                        ', 'Mutare                             ', 'Mutare Branch                           ', '           ', 0, 0),
(80, '138', 'POSB                                                        ', 'Causeway Building Corner Third', 'Harare                             ', 'Causeway                                ', '           ', 0, 0),
(81, '16101', 'Royal Bank                                                  ', 'Westend                       ', 'Harare                             ', 'Westend Baalch                          ', 'ROYBZWHA   ', 0, 0),
(82, '16102', 'Royal Bank                                                  ', 'Lobengula Mall                ', 'Bulawayo                           ', 'Lobengula Mall Baalch                   ', 'ROYBZWHA   ', 0, 0),
(83, '16202', 'Royal Bank                                                  ', 'Karoi                         ', 'Karoi                              ', 'Karoi Baalch                            ', 'ROYBZWHA   ', 0, 0),
(84, '16301', 'Royal Bank                                                  ', 'Chegutu                       ', 'Chegutu                            ', 'Chegutu Baalch                          ', 'ROYBZWHA   ', 0, 0),
(85, '16302', 'Royal Bank                                                  ', 'Gwanda                        ', 'Gwanda                             ', 'Gwanda Baalch                           ', 'ROYBZWHA   ', 0, 0),
(86, '16325', 'Royal Bank                                                  ', 'Chipinge                      ', 'Chipinge                           ', 'Chipinge Baalch                         ', 'ROYBZWHA   ', 0, 0),
(87, '16351', 'Royal Bank                                                  ', 'Nyanga                        ', 'Nyanga                             ', 'Nyanga Baalch                           ', 'ROYBZWHA   ', 0, 0),
(88, '16352', 'Stanbic Bank                                                ', 'N Mandela                     ', 'Harare                             ', 'N Mandela Branch                        ', 'SBICZWHX   ', 0, 0),
(89, '18101', 'MBCA Bank                                                   ', 'Jason Moyo                    ', 'Harare                             ', 'Jason Moyo Branch                       ', 'MBCAZWHX   ', 0, 0),
(90, '18302', 'MBCA Bank                                                   ', 'Bulawayo                      ', 'Bulawayo                           ', 'Bulawayo Branch                         ', 'MBCAZWHX   ', 0, 0),
(91, '18503', 'MBCA Bank                                                   ', 'Mutare                        ', 'Mutare                             ', 'Mutare Branch                           ', 'MBCAZWHX   ', 0, 0),
(92, '19101', 'Allied Bank                                                 ', 'Robert Mugabe                 ', 'Harare                             ', 'Robert Mugabe                           ', 'ZABCZWHA   ', 0, 0),
(93, '19102', 'Allied Bank                                                 ', 'Southerton                    ', 'Harare                             ', 'Southerton                              ', 'ZABCZWHA   ', 0, 0),
(94, '19103', 'Allied Bank                                                 ', 'Heritage House                ', 'Harare                             ', 'Heritage House                          ', 'ZABCZWHA   ', 0, 0),
(95, '19105', 'Allied Bank                                                 ', 'Arundel                       ', 'Harare                             ', 'Arundel                                 ', 'ZABCZWHA   ', 0, 0),
(96, '19108', 'Allied Bank                                                 ', 'Travel Centre                 ', 'Harare                             ', 'Travel Centre                           ', 'ZABCZWHA   ', 0, 0),
(97, '19109', 'Allied Bank                                                 ', 'Supreme Banking               ', 'Harare                             ', 'Supreme Banking                         ', 'ZABCZWHA   ', 0, 0),
(98, '19111', 'Allied Bank                                                 ', 'Millenium Agency              ', 'Harare                             ', 'Millenium Agency                        ', 'ZABCZWHA   ', 0, 0),
(99, '19112', 'Allied Bank                                                 ', 'Travel Centre                 ', 'Harare                             ', 'Travel Centre                           ', 'ZABCZWHA   ', 0, 0),
(100, '19301', 'Allied Bank                                                 ', 'Leopold Takawira Bulawayo     ', 'Bulawayo                           ', 'Leopold Takawira Bulawayo               ', 'ZABCZWHA   ', 0, 0),
(101, '19302', 'Allied Bank                                                 ', 'Bulawayo Southend             ', 'Bulawayo                           ', 'Bulawayo Southend                       ', 'ZABCZWHA   ', 0, 0),
(102, '19304', 'Allied Bank                                                 ', 'Fife Street Bulawayo          ', 'Bulawayo                           ', 'Fife Street Bulawayo                    ', 'ZABCZWHA   ', 0, 0),
(103, '19306', 'Allied Bank                                                 ', 'Ascot Agency Bulawayo         ', 'Bulawayo                           ', 'Ascot Agency Bulawayo                   ', 'ZABCZWHA   ', 0, 0),
(104, '19307', 'Allied Bank                                                 ', 'Lobengula Bulawayo            ', 'Bulawayo                           ', 'Lobengula Bulawayo                      ', 'ZABCZWHA   ', 0, 0),
(105, '19501', 'Allied Bank                                                 ', 'Gweru                         ', 'Gweru                              ', 'Gweru                                   ', 'ZABCZWHA   ', 0, 0),
(106, '19502', 'Allied Bank                                                 ', 'Kadoma                        ', 'Kadoma                             ', 'Kadoma                                  ', 'ZABCZWHA   ', 0, 0),
(107, '19503', 'Allied Bank                                                 ', 'Chegutu                       ', 'Chegutu                            ', 'Chegutu                                 ', 'ZABCZWHA   ', 0, 0),
(108, '19504', 'Allied Bank                                                 ', 'Kwekwe                        ', 'Kwekwe                             ', 'Kwekwe                                  ', 'ZABCZWHA   ', 0, 0),
(109, '19505', 'Allied Bank                                                 ', 'Mutare                        ', 'Mutare                             ', 'Mutare                                  ', 'ZABCZWHA   ', 0, 0),
(110, '19506', 'Allied Bank                                                 ', 'Chinhoyi                      ', 'Chinhoyi                           ', 'Chinhoyi                                ', 'ZABCZWHA   ', 0, 0),
(111, '19507', 'Allied Bank                                                 ', 'Rusape                        ', 'Rusape                             ', 'Rusape                                  ', 'ZABCZWHA   ', 0, 0),
(112, '19508', 'Allied Bank                                                 ', 'Gwanda                        ', 'Gwande                             ', 'Gwanda                                  ', 'ZABCZWHA   ', 0, 0),
(113, '19509', 'Allied Bank                                                 ', 'Nyanga                        ', 'Nyanga                             ', 'Nyanga Branch                           ', 'ZABCZWHA   ', 0, 0),
(114, '19510', 'Allied Bank                                                 ', 'Karoi                         ', 'Karoi                              ', 'Karoi Branch                            ', 'ZABCZWHA   ', 0, 0),
(115, '19511', 'Allied Bank                                                 ', 'Chipinge                      ', 'Chipinge                           ', 'Chipinge                                ', 'ZABCZWHA   ', 0, 0),
(116, '19512', 'Allied Bank                                                 ', 'Hwange                        ', 'Hwange                             ', 'Hwange Branch                           ', 'ZABCZWHA   ', 0, 0),
(117, '19513', 'Allied Bank                                                 ', 'Chitungwiza                   ', 'Harare                             ', 'Chitungwiza Branch                      ', 'ZABCZWHA   ', 0, 0),
(118, '19514', 'Allied Bank                                                 ', 'Mutare                        ', 'Mutare                             ', 'Mutare Branch                           ', 'ZABCZWHA   ', 0, 0),
(119, '19517', 'Allied Bank                                                 ', 'Checheche                     ', 'Checheche                          ', 'Checheche Branch                        ', 'ZABCZWHA   ', 0, 0),
(120, '19518', 'Allied Bank                                                 ', 'Victoria Falls                ', 'Victoria F                         ', 'Victoria Falls Branch                   ', 'ZABCZWHA   ', 0, 0),
(121, '20000', 'Steward Bank                                                ', 'Kwame Nkrumah Avenue          ', 'Harare                             ', 'Kwame Nkrumah Branch                    ', 'TNLBZWHX   ', 0, 0),
(122, '20102', 'Steward Bank                                                ', 'N Mandela                     ', 'Harare                             ', 'N Mandela                               ', 'TNLBZWHX   ', 0, 0),
(123, '20103', 'Steward Bank                                                ', 'J Nyerere Way                 ', 'Harare                             ', 'J Nyerere Branch                        ', 'TNLBZWHX   ', 0, 0),
(124, '20104', 'Steward Bank                                                ', 'Chinhoyi Street               ', 'Harare                             ', 'Chinhoyi Street Branch                  ', 'TNLBZWHX   ', 0, 0),
(125, '20105', 'Steward Bank                                                ', 'G Silundika                   ', 'Harare                             ', 'G Silundika Branch                      ', 'TNLBZWHX   ', 0, 0),
(126, '20106', 'Steward Bank                                                ', 'Southerton                    ', 'Harare                             ', 'Southerton Branch                       ', 'TNLBZWHX   ', 0, 0),
(127, '20107', 'Steward Bank                                                ', 'Chitungwiza                   ', 'Harare                             ', 'Chitungwiza Branch                      ', 'TNLBZWHX   ', 0, 0),
(128, '20108', 'Steward Bank                                                ', 'Highglen                      ', 'Harare                             ', 'Highglen Branch                         ', 'TNLBZWHX   ', 0, 0),
(129, '20109', 'Steward Bank                                                ', 'Joina City                    ', 'Harare                             ', 'Joina City Branch                       ', 'TNLBZWHX   ', 0, 0),
(130, '20110', 'Steward Bank                                                ', 'Harare Showgrounds            ', 'Harare                             ', 'Harare Showgrounds Branch               ', 'TNLBZWHX   ', 0, 0),
(131, '20111', 'Steward Bank                                                ', 'Avondale                      ', 'Harare                             ', 'Avondale Branch                         ', 'TNLBZWHX   ', 0, 0),
(132, '20112', 'Steward Bank                                                ', 'Fourth Street                 ', 'Harare                             ', 'Fourth Street Branch                    ', 'TNLBZWHX   ', 0, 0),
(133, '20113', 'Steward Bank                                                ', 'Meikles Hotel, 3rd &  J Moyo', 'Harare', 'Meikles Branch', 'TNLBZWHX   ', 0, 0),
(134, '20114', 'Steward Bank                                                ', 'Greatermans                   ', 'Harare                             ', 'Greatermans Branch                      ', 'TNLBZWHX   ', 0, 0),
(135, '20115', 'Steward Bank                                                ', 'First Street                  ', 'Harare                             ', 'First Street Branch                     ', 'TNLBZWHX   ', 0, 0),
(136, '20116', 'Steward Bank                                                ', 'Borrowdale                    ', 'Harare                             ', 'Borrowdale Branch                       ', 'TNLBZWHX   ', 0, 0),
(137, '20117', 'Steward Bank                                                ', '9th Ave Byo                   ', 'Bulawayo                           ', '9th Ave Branch                          ', 'TNLBZWHX   ', 0, 0),
(138, '20301', 'Steward Bank                                                ', 'Lobengula                     ', 'Bulawayo                           ', 'Lobengula Branch                        ', 'TNLBZWHX   ', 0, 0),
(139, '20302', 'Steward Bank                                                ', '8th Ave Byo                   ', 'Bulawayo                           ', '8th Ave Branch                          ', 'TNLBZWHX   ', 0, 0),
(140, '20303', 'Steward Bank                                                ', 'Gweru                         ', 'Gweru                              ', 'Gweru Branch                            ', 'TNLBZWHX   ', 0, 0),
(141, '20501', 'Steward Bank                                                ', 'KWEKWE                        ', 'Kwekwe                             ', 'Kwekwe branch                           ', 'TNLBZWHX   ', 0, 0),
(142, '20502', 'Steward Bank                                                ', 'Zvishavane                    ', 'Zvishavane                         ', 'Zvishavane Branch                       ', 'TNLBZWHX   ', 0, 0),
(143, '20503', 'Steward Bank                                                ', 'Kadoma                        ', 'Kadoma                             ', 'Kadoma Branch                           ', 'TNLBZWHX   ', 0, 0),
(144, '20504', 'Steward Bank                                                ', 'Masvingo ZF                   ', 'Masvingo                           ', 'Masvingo Branch                         ', 'TNLBZWHX   ', 0, 0),
(145, '20505', 'Steward Bank                                                ', 'Rusape                        ', 'Rusape                             ', 'Rusape Branch                           ', 'TNLBZWHX   ', 0, 0),
(146, '20506', 'Steward Bank                                                ', 'Bindura                       ', 'Bindura                            ', 'Bindura Branch                          ', 'TNLBZWHX   ', 0, 0),
(147, '20507', 'Steward Bank                                                ', 'Karoi                         ', 'Karoi                              ', 'Karoi Branch                            ', 'TNLBZWHX   ', 0, 0),
(148, '20508', 'Steward Bank                                                ', 'Masvingo SE                   ', 'Masvingo                           ', 'Masvingo SE Branch                      ', 'TNLBZWHX   ', 0, 0),
(149, '20509', 'Steward Bank                                                ', 'Ngezi                         ', 'Ngezi                              ', 'Ngezi Branch                            ', 'TNLBZWHX   ', 0, 0),
(150, '20510', 'Steward Bank                                                ', 'Hwange                        ', 'Hwange                             ', 'Hwange Branch                           ', 'TNLBZWHX   ', 0, 0),
(151, '20511', 'Steward Bank                                                ', 'Mutare                        ', 'Mutare                             ', 'Mutare Branch                           ', 'TNLBZWHX   ', 0, 0),
(152, '20512', 'Steward Bank                                                ', 'Chivhu                        ', 'Chivhu                             ', 'Chivhu Branch                           ', 'TNLBZWHX   ', 0, 0),
(153, '20513', 'Steward Bank                                                ', 'Gokwe                         ', 'Gokwe                              ', 'Gokwe Branch                            ', 'TNLBZWHX   ', 0, 0),
(154, '20514', 'Steward Bank                                                ', 'Gwanda                        ', 'Gwanda                             ', 'Gwanda Branch                           ', 'TNLBZWHX   ', 0, 0),
(155, '20515', 'Steward Bank                                                ', 'Chinhoyi                      ', 'Chinhoyi                           ', 'Chinhoyi Branch                         ', 'TNLBZWHX   ', 0, 0),
(156, '20516', 'Steward Bank                                                ', 'Mvurwi                        ', 'Mvurwi                             ', 'Mvurwi Branch                           ', 'TNLBZWHX   ', 0, 0),
(157, '20517', 'Steward Bank                                                ', 'Beitbridge                    ', 'Beitbridge                         ', 'Beitbridge Branch                       ', 'TNLBZWHX   ', 0, 0),
(158, '20520', 'Steward Bank                                                ', 'Chegutu                       ', 'Chegutu                            ', 'Chegutu Branch                          ', 'TNLBZWHX   ', 0, 0),
(159, '20524', 'Steward Bank                                                ', 'Triangle                      ', 'Triangle                           ', 'Triangle Branch                         ', 'TNLBZWHX   ', 0, 0),
(160, '20526', 'Steward Bank                                                ', 'Mvuma                         ', 'Mvuma                              ', 'Mvuma Branch                            ', 'TNLBZWHX   ', 0, 0),
(161, '21021', 'BancABC                                                     ', 'Head Office                   ', 'Harare                             ', 'Head Office                             ', 'FMBZZWHX   ', 0, 0),
(162, '21108', 'BancABC                                                     ', 'Msasa                         ', 'Harare                             ', 'Msasa                                   ', 'FMBZZWHX   ', 0, 0),
(163, '21109', 'BancABC                                                     ', 'TSF Gleneagles Rd Southerton  ', 'Harare                             ', 'TSF                                     ', 'FMBZZWHX   ', 0, 0),
(164, '21110', 'BancABC                                                     ', 'Belgravia                     ', 'Harare                             ', 'Belgravia                               ', 'FMBZZWHX   ', 0, 0),
(165, '21115', 'BancABC                                                     ', 'Graniteside                   ', 'Harare                             ', 'Graniteside                             ', 'FMBZZWHX   ', 0, 0),
(166, '2112', 'Barclays                                                    ', 'Cnr First St & J/Moyo Ave.    ', 'Harare                             ', 'Head Office Branch                      ', 'BARCZWHX   ', 0, 0),
(167, '21120', 'BancABC                                                     ', '1 Endeavour Crescent Mt Pleasa', '                                   ', 'Head Office                             ', '           ', 0, 0),
(168, '21125', 'BancABC                                                     ', 'Heritage                      ', '                                   ', 'Heritage                                ', 'FMBZZWHX   ', 0, 0),
(169, '2119', 'Barclays                                                    ', 'Westgate                      ', 'Harare                             ', 'Westgate Branch                         ', 'BARCZWHX   ', 0, 0),
(170, '2121', 'Barclays                                                    ', 'R Mugabe Rd                   ', 'Harare                             ', 'Robert Mugabe Branch                    ', 'BARCZWHX   ', 0, 0),
(171, '2128', 'Barclays                                                    ', 'Birmingham Rd                 ', 'Harare                             ', 'Birmingham Branch                       ', 'BARCZWHX   ', 0, 0),
(172, '21301', 'BancABC                                                     ', 'Jason Moyo Bulawayo           ', 'Bulawayo                           ', 'Jason Moyo                              ', 'FMBZZWHX   ', 0, 0),
(173, '2132', 'Barclays                                                    ', 'N Mandela Hre Branch          ', 'Harare                             ', 'N Mandela Hre Branch                    ', 'BARCZWHX   ', 0, 0),
(174, '2133', 'Barclays                                                    ', 'Kurima Hse                    ', 'Harare                             ', 'Kurima Hse Branch                       ', 'BARCZWHX   ', 0, 0),
(175, '2136', 'Barclays                                                    ', 'Chitungwiza                   ', 'Harare                             ', 'Chitungwiza Branch                      ', 'BARCZWHX   ', 0, 0),
(176, '2143', 'Barclays                                                    ', 'Highlands                     ', 'Harare                             ', 'Highlands Branch                        ', 'BARCZWHX   ', 0, 0),
(177, '2144', 'Barclays                                                    ', 'Pearl Hse                     ', 'Harare                             ', 'Pearl Branch                            ', 'BARCZWHX   ', 0, 0),
(178, '2147', 'Barclays                                                    ', 'Borrowdale                    ', 'Harare                             ', 'Central Services                        ', 'BARCZWHX   ', 0, 0),
(179, '2149', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Foreign Exchange Cent                   ', 'BARCZWHX   ', 0, 0),
(180, '2150', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Operations Centre                       ', 'BARCZWHX   ', 0, 0),
(181, '21504', 'BancABC                                                     ', 'Manica Centre Mutare          ', 'Mutare                             ', 'Manica Centre                           ', 'FMBZZWHX   ', 0, 0),
(182, '21505', 'BancABC                                                     ', 'Hwange                        ', 'Hwange                             ', 'Hwange                                  ', 'FMBZZWHX   ', 0, 0),
(183, '21506', 'BancABC                                                     ', 'Chiredzi                      ', 'Chiredzi                           ', 'Chiredzi                                ', 'FMBZZWHX   ', 0, 0),
(184, '21507', 'BancABC                                                     ', 'Kwekwe                        ', 'Kwekwe                             ', 'Kwekwe                                  ', 'FMBZZWHX   ', 0, 0),
(185, '21509', 'BancABC                                                     ', 'Ngezi                         ', 'Ngezi                              ', 'Ngezi                                   ', 'FMBZZWHX   ', 0, 0),
(186, '21510', 'BancABC                                                     ', 'Gweru                         ', 'Gweru                              ', 'Gweru                                   ', 'FMBZZWHX   ', 0, 0),
(187, '21511', 'BancABC                                                     ', 'Beitbridge                    ', 'Beitbridge                         ', 'Beitbridge                              ', 'FMBZZWHX   ', 0, 0),
(188, '21512', 'BancABC                                                     ', 'Zvishavane                    ', 'Zvishavane                         ', 'Zvishavane                              ', 'FMBZZWHX   ', 0, 0),
(189, '21513', 'BancABC                                                     ', 'Checheche                     ', 'Checheche                          ', 'Checheche                               ', 'FMBZZWHX   ', 0, 0),
(190, '21514', 'BancABC                                                     ', 'Chimanimani/Hotsprings        ', 'Chimaniman                         ', 'Hotsprings                              ', 'FMBZZWHX   ', 0, 0),
(191, '21515', 'BancABC                                                     ', 'Redcliff                      ', 'Kwekwe                             ', 'Redcliff                                ', 'FMBZZWHX   ', 0, 0),
(192, '21516', 'BancABC                                                     ', 'Victoria Falls                ', 'Vic falls                          ', 'Victoria Falls                          ', 'FMBZZWHX   ', 0, 0),
(193, '21518', 'BancABC                                                     ', 'Triangle                      ', 'Triangle                           ', 'Triangle                                ', 'FMBZZWHX   ', 0, 0),
(194, '21519', 'BancABC                                                     ', 'Masvingo                      ', 'Masvingo                           ', 'Masvingo                                ', 'FMBZZWHX   ', 0, 0),
(195, '2152', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'University                              ', 'BARCZWHX   ', 0, 0),
(196, '2153', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Central Cash Depot                      ', 'BARCZWHX   ', 0, 0),
(197, '2154', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Barclaycard Centre                      ', 'BARCZWHX   ', 0, 0),
(198, '2155', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Small Business Centre                   ', 'BARCZWHX   ', 0, 0),
(199, '2156', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Fcda Centre Branch                      ', 'BARCZWHX   ', 0, 0),
(200, '2157', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Harare                                  ', 'BARCZWHX   ', 0, 0),
(201, '2163', 'Barclays                                                    ', 'Highfield                     ', 'Harare                             ', 'Highfield Branch                        ', 'BARCZWHX   ', 0, 0),
(202, '2164', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Fincor Finance                          ', 'BARCZWHX   ', 0, 0),
(203, '2171', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Accounting                              ', 'BARCZWHX   ', 0, 0),
(204, '2172', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Administative                           ', 'BARCZWHX   ', 0, 0),
(205, '2173', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Internal Audit                          ', 'BARCZWHX   ', 0, 0),
(206, '2174', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Prestige Banking                        ', 'BARCZWHX   ', 0, 0),
(207, '2175', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Corporate Banking                       ', 'BARCZWHX   ', 0, 0),
(208, '2176', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Information Systems De                  ', 'BARCZWHX   ', 0, 0),
(209, '2177', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Mechant Banking                         ', 'BARCZWHX   ', 0, 0),
(210, '2178', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Chief Executives                        ', 'BARCZWHX   ', 0, 0),
(211, '2179', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Risk Management Divisi                  ', 'BARCZWHX   ', 0, 0),
(212, '2180', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Legal Department                        ', 'BARCZWHX   ', 0, 0),
(213, '2181', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Training Centre                         ', 'BARCZWHX   ', 0, 0),
(214, '2182', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Projects Office                         ', 'BARCZWHX   ', 0, 0),
(215, '2183', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Loans Processing                        ', 'BARCZWHX   ', 0, 0),
(216, '2184', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Operational Risk Manag                  ', 'BARCZWHX   ', 0, 0),
(217, '2185', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Marketing Department                    ', 'BARCZWHX   ', 0, 0),
(218, '2186', 'Barclays                                                    ', 'Msasa                         ', 'Harare                             ', 'Msasa Branch                            ', 'BARCZWHX   ', 0, 0),
(219, '2187', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Sme Centre                              ', 'BARCZWHX   ', 0, 0),
(220, '2189', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Premier Branch                          ', 'BARCZWHX   ', 0, 0),
(221, '2190', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Avondale                                ', 'BARCZWHX   ', 0, 0),
(222, '2191', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'West End                                ', 'BARCZWHX   ', 0, 0),
(223, '2197', 'Barclays                                                    ', 'Harare                        ', 'Harare                             ', 'Bureau De Change                        ', 'BARCZWHX   ', 0, 0),
(224, '2199', 'Barclays                                                    ', 'Crissps Road                  ', 'Harare                             ', 'Crissps Road Branch                     ', 'BARCZWHX   ', 0, 0),
(225, '22022', 'ZB BUILDING SOCIETY                                         ', 'Harare                        ', 'Harare                             ', '                                        ', 'ZBCOZWHX   ', 0, 0),
(226, '22101', 'Capital Bank                                                ', 'Harare                        ', 'Harare                             ', 'Harare Branch                           ', 'CBBLZWHX   ', 0, 0),
(227, '22103', 'Capital Bank                                                ', 'Broadlands                    ', 'Harare                             ', 'Broadlands                              ', 'CBBLZWHX   ', 0, 0),
(228, '22301', 'Capital Bank                                                ', 'Bulawayo                      ', 'Bulawayo                           ', 'Bulawayo                                ', 'CBBLZWHX   ', 0, 0),
(229, '23', 'CBZ                                                         ', 'jason kalunde                 ', 'Harare                             ', 'Harare                                  ', 'CBBLZWHX   ', 0, 0),
(230, '2307', 'Barclays                                                    ', 'Main St                       ', 'Bulawayo                           ', 'Main St Branch                          ', 'BARCZWHX   ', 0, 0),
(231, '2322', 'Barclays                                                    ', 'J Moyo St Byo                 ', 'Bulawayo                           ', 'Jason Moyo Branch                       ', 'BARCZWHX   ', 0, 0),
(232, '2326', 'Barclays                                                    ', 'Belmont                       ', 'Bulawayo                           ', 'Belmont Branch                          ', 'BARCZWHX   ', 0, 0);
INSERT INTO `branches` (`id`, `branch_code`, `bank_name`, `bank_address`, `bank_city`, `branch_name`, `swift_code`, `created_at`, `updated_at`) VALUES
(233, '2335', 'Barclays                                                    ', 'Nkulumane                     ', 'Bulawayo                           ', 'Nkulumane Branch                        ', 'BARCZWHX   ', 0, 0),
(234, '2342', 'Barclays                                                    ', 'L Takawira Byo                ', 'Bulawayo                           ', 'L. Takawira Branch                      ', 'BARCZWHX   ', 0, 0),
(235, '2358', 'Barclays                                                    ', 'Bulawayo                      ', 'Bulawayo                           ', 'Savings Centre                          ', 'BARCZWHX   ', 0, 0),
(236, '2360', 'Barclays                                                    ', 'Bulawayo                      ', 'Bulawayo                           ', 'Bulawayo Central Data                   ', 'BARCZWHX   ', 0, 0),
(237, '2396', 'Barclays                                                    ', 'Bulawayo Affuent              ', 'Bulawayo                           ', 'Affluent Branch                         ', 'BARCZWHX   ', 0, 0),
(238, '24', 'NMB                                                         ', 'FIRST STREET                  ', 'HARARE                             ', 'AVONDALE                                ', '           ', 0, 0),
(239, '24000', 'CABS BUILDING SOCIETY                                       ', 'First Street                  ', 'Harare                             ', 'CABS Centre                             ', 'CABSZWHA   ', 0, 0),
(240, '24001', 'CABS BUILDING SOCIETY                                       ', 'Fourth Street & Central Avenue', 'Harare                             ', 'First Street Branch                     ', 'CABSZWHA   ', 0, 0),
(241, '24002', 'CABS BUILDING SOCIETY                                       ', 'Jason Moyo & Leorpold Takawira', 'Harare                             ', 'Fourth Street Branch                    ', 'CABSZWHA   ', 0, 0),
(242, '24003', 'CABS BUILDING SOCIETY                                       ', '2nd Floor, SSC, 2nd Street  ', 'Harare                             ', 'Jason Moyo & Leorpold Takawira          ', 'CABSZWHA   ', 0, 0),
(243, '24024', 'FBC Building Society                                        ', 'Harare                        ', 'Harare                             ', 'Harare                                  ', 'FBCPZWHA   ', 0, 0),
(244, '25000', 'POSB                                                        ', 'Cnr 3rd & Central Avenue, Box', 'Harare                             ', 'Harare                                  ', '', 0, 0),
(245, '2509', 'Barclays                                                    ', 'Masvingo                      ', 'Masvingo                           ', 'Masvingo Branch                         ', 'BARCZWHX   ', 0, 0),
(246, '2510', 'Barclays                                                    ', 'Kadoma                        ', 'Kadoma                             ', 'Kadoma Branch                           ', 'BARCZWHX   ', 0, 0),
(247, '2511', 'Barclays                                                    ', 'Gweru                         ', 'Gweru                              ', 'Gweru Branch                            ', 'BARCZWHX   ', 0, 0),
(248, '2513', 'Barclays                                                    ', 'Mutare                        ', 'Mutare                             ', 'Mutare Branch                           ', 'BARCZWHX   ', 0, 0),
(249, '2516', 'Barclays                                                    ', 'Kwekwe                        ', 'Kwekwe                             ', 'Kwekwe Branch                           ', 'BARCZWHX   ', 0, 0),
(250, '2518', 'Barclays                                                    ', 'Bindura                       ', 'Bindura                            ', 'Bindura Branch                          ', 'BARCZWHX   ', 0, 0),
(251, '2519', 'Barclays                                                    ', 'Gwanda                        ', 'Gwanda                             ', 'Gwanda Branch                           ', 'BARCZWHX   ', 0, 0),
(252, '2520', 'Barclays                                                    ', 'Gokwe                         ', 'Gokwe                              ', 'Gokwe Branch                            ', 'BARCZWHX   ', 0, 0),
(253, '2524', 'Barclays                                                    ', 'Zvishavane                    ', 'Zvishavane                         ', 'Zvishavane Branch                       ', 'BARCZWHX   ', 0, 0),
(254, '2525', 'Barclays                                                    ', 'Chinhoyi                      ', 'Chinhoyi                           ', 'Chinhoyi Branch                         ', 'BARCZWHX   ', 0, 0),
(255, '2527', 'Barclays                                                    ', 'Marondera                     ', 'Marondera                          ', 'Marondera Branch                        ', 'BARCZWHX   ', 0, 0),
(256, '2529', 'Barclays                                                    ', 'Chegutu                       ', 'Chegutu                            ', 'Chegutu Branch                          ', 'BARCZWHX   ', 0, 0),
(257, '2531', 'Barclays                                                    ', 'Rusape                        ', 'Rusape                             ', 'Rusape Branch                           ', 'BARCZWHX   ', 0, 0),
(258, '2535', 'Barclays                                                    ', 'Hwange                        ', 'Hwange                             ', 'Hwange Branch                           ', 'BARCZWHX   ', 0, 0),
(259, '2536', 'Barclays                                                    ', 'Kariba                        ', 'Kariba                             ', 'Kariba Branch                           ', 'BARCZWHX   ', 0, 0),
(260, '2539', 'Barclays                                                    ', 'Redcliff                      ', 'Redcliff                           ', 'Redcliff Branch                         ', 'BARCZWHX   ', 0, 0),
(261, '2545', 'Barclays                                                    ', 'Mhangura                      ', 'Mhangura                           ', 'Mhangura Branch                         ', 'BARCZWHX   ', 0, 0),
(262, '2548', 'Barclays                                                    ', 'Norton                        ', 'Norton                             ', 'Norton Branch                           ', 'BARCZWHX   ', 0, 0),
(263, '2592', 'Barclays                                                    ', 'Triangle                      ', 'Triangle                           ', 'Triangle Branch                         ', 'BARCZWHX   ', 0, 0),
(264, '2593', 'Barclays                                                    ', 'Beit Bridge                   ', 'Beit Bridg                         ', 'Beit Bridge Branch                      ', 'BARCZWHX   ', 0, 0),
(265, '2594', 'Barclays                                                    ', 'Karoi                         ', 'Karoi                              ', 'Karoi Branch                            ', 'BARCZWHX   ', 0, 0),
(266, '2595', 'Barclays                                                    ', 'Chiredzi                      ', 'Chiredzi                           ', 'Chiredzi Branch                         ', 'BARCZWHX   ', 0, 0),
(267, '2596', 'Barclays                                                    ', 'Chipinge                      ', 'Chipinge                           ', 'Chipinge Branch                         ', 'BARCZWHX   ', 0, 0),
(268, '2598', 'Barclays                                                    ', 'Victoria Falls                ', 'Victoria F                         ', 'Victoria Falls Branch                   ', 'BARCZWHX   ', 0, 0),
(269, '26000', 'ECOBANK                                                     ', 'Samora Machel                 ', 'Harare                             ', 'Samora Machel                           ', 'ECOCZWHX   ', 0, 0),
(270, '26100', 'ECOBANK                                                     ', 'Anlaby House, Nelson Mandela', 'Harare                             ', 'Nelson Mandela                          ', 'ECOCZWHX   ', 0, 0),
(271, '29001', 'Tetrad Investment Bank                                      ', 'Norfolk Rd, Mt Pleasant Business Park', 'Harare                             ', 'Tetrad Paynet ', 'TTSLZWHX', 0, 0),
(272, '29099', 'Tetrad Investment Bank                                      ', 'Norfolk Rd, Mt Pleasant Business Park', 'Harare                             ', 'Tetrad Emali  ', 'TTSLZWHX', 0, 0),
(273, '31000', 'African Century Bank                                        ', '                              ', 'Harare                             ', 'Harare', '           ', 0, 0),
(274, '3101', 'Stanbic Bank                                                ', 'Park Lane                     ', 'Harare                             ', 'Park Lane Branch                        ', 'SBICZWHX   ', 0, 0),
(275, '3102', 'Stanbic Bank                                                ', 'Belgravia                     ', 'Harare                             ', 'Belgravia Branch                        ', 'SBICZWHX   ', 0, 0),
(276, '3103', 'Stanbic Bank                                                ', 'Borrowdale                    ', 'Harare                             ', 'Borrowdale Branch                       ', 'SBICZWHX   ', 0, 0),
(277, '3104', 'Stanbic Bank                                                ', 'Msasa                         ', 'Harare                             ', 'Msasa Branch                            ', 'SBICZWHX   ', 0, 0),
(278, '3108', 'Stanbic Bank                                                ', 'Central Avenue                ', 'Harare                             ', 'Central West Branch                     ', 'SBICZWHX   ', 0, 0),
(279, '3109', 'Stanbic Bank                                                ', 'Westgate Shopping Complex     ', 'Harare                             ', 'Westgate Branch                         ', 'SBICZWHX   ', 0, 0),
(280, '3110', 'Stanbic Bank                                                ', 'S Machel avenue               ', 'Harare                             ', 'S Machel Branch                         ', 'SBICZWHX   ', 0, 0),
(281, '3115', 'Stanbic Bank                                                ', 'Southerton                    ', 'Harare                             ', 'Southerton Branch                       ', 'SBICZWHX   ', 0, 0),
(282, '3120', 'Stanbic Bank                                                ', 'Social Security Building, 2nd Street Harare  ', 'Harare                             ', 'Minerva', 'SBICZWHX   ', 0, 0),
(283, '3125', 'Stanbic Bank                                                ', 'Main St Byo                   ', 'Bulawayo                           ', 'Main St Branch                          ', 'SBICZWHX   ', 0, 0),
(284, '3302', 'Stanbic Bank                                                ', 'Belmont                       ', 'Bulawayo                           ', 'Belmont Branch                          ', 'SBICZWHX   ', 0, 0),
(285, '3303', 'Stanbic Bank                                                ', 'Chegutu                       ', 'Chegutu                            ', 'Chegutu Branch                          ', 'SBICZWHX   ', 0, 0),
(286, '33157', 'Econet (Ecocash)                                            ', 'Econet Wireless, 1906 Borrowdale Road ', 'Harare', 'Harare', '', 0, 0),
(287, '3503', 'Stanbic Bank                                                ', 'Mutare                        ', 'Mutare                             ', 'Mutare Branch                           ', 'SBICZWHX   ', 0, 0),
(288, '3504', 'Stanbic Bank                                                ', 'Kwekwe                        ', 'Kwekwe                             ', 'Kwekwe Branch                           ', 'SBICZWHX   ', 0, 0),
(289, '3507', 'Stanbic Bank                                                ', 'Mutare                        ', 'Mutare                             ', 'Mutare Branch                           ', 'SBICZWHX   ', 0, 0),
(290, '3508', 'Stanbic Bank                                                ', 'Chegutu                       ', 'Chegutu                            ', 'Chegutu Branch                          ', 'SBICZWHX   ', 0, 0),
(291, '3509', 'Stanbic Bank                                                ', 'Chitungwiza                   ', 'Harare                             ', 'Chitungwiza Branch                      ', 'SBICZWHX   ', 0, 0),
(292, '3515', 'Standard Bank                                               ', 'Avondale  Shopping Center     ', 'Harare                             ', 'Stanchart Avondale                      ', 'SCBLZWHX   ', 0, 0),
(293, '4000', 'ZB Bank                                                     ', '                              ', 'Harare                             ', 'Head Office                             ', 'ZBCOZWHX   ', 0, 0),
(294, '4090', 'ZB Bank                                                     ', 'Rotten Row                    ', 'Harare                             ', 'Rotten Row Branch                       ', 'ZBCOZWHX   ', 0, 0),
(295, '4112', 'ZB Bank                                                     ', 'First St/Speke Avenue         ', 'Harare                             ', 'First St Branch                         ', 'ZBCOZWHX   ', 0, 0),
(296, '4113', 'ZB Bank                                                     ', '21 Natal Road Avondale Harare ', 'Harare                             ', 'Avondale Branch                         ', '           ', 0, 0),
(297, '4116', 'ZB Bank                                                     ', 'Highlands                     ', 'Harare                             ', 'Highlands Branch                        ', 'ZBCOZWHX   ', 0, 0),
(298, '4118', 'ZB Bank                                                     ', 'Chisipite                     ', 'Harare                             ', 'Chisipite Branch                        ', 'ZBCOZWHX   ', 0, 0),
(299, '4119', 'ZB Bank                                                     ', 'Rotten Row                    ', 'Harare                             ', 'Retail Recoveries                       ', 'ZBCOZWHX   ', 0, 0),
(300, '4120', 'ZB Bank                                                     ', 'Graniteside                   ', 'Harare                             ', 'Graniteside Branch                      ', 'ZBCOZWHX   ', 0, 0),
(301, '4125', 'ZB Bank                                                     ', 'Union Ave/First St            ', 'Harare                             ', 'Union Ave Branch                        ', 'ZBCOZWHX   ', 0, 0),
(302, '4127', 'ZB Bank                                                     ', 'Angwa City                    ', 'Harare                             ', 'Angwa City  Branch                      ', 'ZBCOZWHX   ', 0, 0),
(303, '4129', 'ZB Bank                                                     ', 'Borrowdale                    ', 'Harare                             ', 'Borrowdale Branch                       ', 'ZBCOZWHX   ', 0, 0),
(304, '4130', 'ZB Bank                                                     ', 'Anlaby House, Angwa Street', 'Harare                             ', 'Angwa St Branch                         ', 'ZBCOZWHX   ', 0, 0),
(305, '4134', 'ZB Bank                                                     ', 'Msasa                         ', 'Harare                             ', 'Msasa Branch                            ', 'ZBCOZWHX   ', 0, 0),
(306, '4135', 'ZB Bank                                                     ', 'Westgate Shopping Complex     ', 'Harare                             ', 'Westgate Branch                         ', 'ZBCOZWHX   ', 0, 0),
(307, '4139', 'ZB Bank                                                     ', 'Birmingham                    ', 'Harare                             ', 'Birmingham Branch                       ', 'ZBCOZWHX   ', 0, 0),
(308, '4140', 'ZB Bank                                                     ', 'S Machel Avenue               ', 'Harare                             ', 'S Machel Branch                         ', 'ZBCOZWHX   ', 0, 0),
(309, '4143', 'ZB Bank                                                     ', 'Harare International Airport', 'Harare                             ', 'Airport Branch', 'ZBCOZWHX   ', 0, 0),
(310, '4144', 'ZB Bank                                                     ', 'Rotten Row                    ', 'Harare                             ', 'Rotten Row Branch                       ', 'ZBCOZWHX   ', 0, 0),
(311, '4149', 'ZB Bank                                                     ', 'Rotten Row                    ', 'Harare                             ', 'Corporate Recoveries                    ', 'ZBCOZWHX   ', 0, 0),
(312, '4151', 'ZB Bank                                                     ', 'West End                      ', 'Harare                             ', 'West End Branch                         ', 'ZBCOZWHX   ', 0, 0),
(313, '4157', 'ZB Bank                                                     ', 'Douglas Rd, Workington      ', 'Harare                             ', 'Douglas Rd Branch                       ', 'ZBCOZWHX   ', 0, 0),
(314, '4171', 'ZB Bank                                                     ', 'Rotten Row                    ', 'Harare                             ', 'Inter Fin & Capital                     ', 'ZBCOZWHX   ', 0, 0),
(315, '4180', 'ZB Bank                                                     ', 'Rotten Row                    ', 'Harare                             ', 'Central Admin                           ', 'ZBCOZWHX   ', 0, 0),
(316, '4184', 'ZB Bank                                                     ', 'Rotten Row                    ', 'Harare                             ', 'Blocked Acc                             ', 'ZBCOZWHX   ', 0, 0),
(317, '4185', 'ZB Bank                                                     ', 'Rotten Row                    ', 'Harare                             ', 'International                           ', 'ZBCOZWHX   ', 0, 0),
(318, '4302', 'ZB Bank                                                     ', 'Fife St                       ', 'Harare                             ', 'Fife St Branch                          ', 'ZBCOZWHX   ', 0, 0),
(319, '4303', 'ZB Bank                                                     ', 'Central Byo                   ', 'Bulawayo                           ', 'Central Byo Branch                      ', 'ZBCOZWHX   ', 0, 0),
(320, '4304', 'ZB Bank                                                     ', 'Belmont                       ', 'Bulawayo                           ', 'Belmont Branch                          ', 'ZBCOZWHX   ', 0, 0),
(321, '4307', 'ZB Bank                                                     ', 'J Moyo St Byo                 ', 'Bulawayo                           ', 'J Moyo St Branch                        ', 'ZBCOZWHX   ', 0, 0),
(322, '4308', 'ZB Bank                                                     ', 'J Moyo St Byo                 ', 'Bulawayo                           ', 'Inter Division                          ', 'ZBCOZWHX   ', 0, 0),
(323, '4440', 'ZB Bank                                                     ', 'Samora                        ', 'Bulawayo                           ', 'Samora Byo Branch                       ', 'ZBCOZWHX   ', 0, 0),
(324, '4511', 'ZB Bank                                                     ', 'Plumtree                      ', 'Plumtree                           ', 'Plumtree Branch                         ', 'ZBCOZWHX   ', 0, 0),
(325, '4515', 'ZB Bank                                                     ', 'Victoria Falls Branch         ', 'Victoria F                         ', 'Victoria Falls Branch                   ', 'ZBCOZWHX   ', 0, 0),
(326, '4527', 'ZB Bank                                                     ', 'Juliasdale Branch             ', 'Nyanga                             ', 'Juliasdale Branch                       ', 'ZBCOZWHX   ', 0, 0),
(327, '4528', 'ZB Bank                                                     ', 'Marondera                     ', 'Marondera                          ', 'Marondera Branch                        ', 'ZBCOZWHX   ', 0, 0),
(328, '4532', 'ZB Bank                                                     ', 'Mutare                        ', 'Mutare                             ', 'Mutare Branch                           ', 'ZBCOZWHX   ', 0, 0),
(329, '4537', 'ZB Bank                                                     ', 'Gweru                         ', 'Gweru                              ', 'Gweru Branch                            ', 'ZBCOZWHX   ', 0, 0),
(330, '4552', 'ZB Bank                                                     ', 'Chitungwiza                   ', 'Harare                             ', 'Chitungwiza Branch                      ', 'ZBCOZWHX   ', 0, 0),
(331, '4555', 'ZB Bank                                                     ', 'Beit Bridge                   ', 'Beit Bridg                         ', 'Beitbridge Branch                       ', 'ZBCOZWHX   ', 0, 0),
(332, '4556', 'ZB Bank                                                     ', 'Kwekwe                        ', 'Kwekwe                             ', 'Kwekwe branch                           ', 'ZBCOZWHX   ', 0, 0),
(333, '4558', 'ZB Bank                                                     ', 'Kadoma                        ', 'Kadoma                             ', 'Kadoma Branch                           ', 'ZBCOZWHX   ', 0, 0),
(334, '4560', 'ZB Bank                                                     ', 'Sanyati                       ', 'Sanyati                            ', 'Sanyati Branch                          ', 'ZBCOZWHX   ', 0, 0),
(335, '4561', 'ZB Bank                                                     ', 'Mupandawana Gutu              ', 'Masvingo                           ', 'Mupandawana Gutu Branch                 ', 'ZBCOZWHX   ', 0, 0),
(336, '4563', 'ZB Bank                                                     ', 'Murombedzi                    ', 'Murombedzi                         ', 'Murombedzi Branch                       ', 'ZBCOZWHX   ', 0, 0),
(337, '4564', 'ZB Bank                                                     ', 'Masvingo                      ', 'Masvingo T                         ', 'Masvingo Branch                         ', 'ZBCOZWHX   ', 0, 0),
(338, '4565', 'ZB Bank                                                     ', 'Chinhoyi                      ', 'Chinhoyi                           ', 'Chinhoyi Branch                         ', 'ZBCOZWHX   ', 0, 0),
(339, '4566', 'ZB Bank                                                     ', 'Mt Darwin                     ', 'Mt Darwin                          ', 'Mt Darwin Branch                        ', 'ZBCOZWHX   ', 0, 0),
(340, '4568', 'ZB Bank                                                     ', 'Triangle                      ', 'Triangle                           ', 'Triangle Branch                         ', 'ZBCOZWHX   ', 0, 0),
(341, '5101', 'Standard Bank                                               ', 'PBC Hre City                  ', 'Harare                             ', 'Stanchart PBC Hre City                  ', 'SCBLZWHX   ', 0, 0),
(342, '5102', 'Standard Bank                                               ', 'Westgate                      ', 'Harare                             ', 'Stanchart Westgate                      ', 'SCBLZWHX   ', 0, 0),
(343, '5110', 'Standard Bank                                               ', 'International                 ', 'Harare                             ', 'Stanchart International                 ', 'SCBLZWHX   ', 0, 0),
(344, '5113', 'Standard Bank                                               ', 'Old Mutual Centre, 3rd Street', 'Harare                             ', 'Stanchart Old Mutual Centre ', 'SCBLZWHX   ', 0, 0),
(345, '5116', 'Standard Bank                                               ', 'Speke Ave                     ', 'Harare                             ', 'Stanchart Speke Ave                     ', 'SCBLZWHX   ', 0, 0),
(346, '5120', 'Standard Bank                                               ', 'Karigamombe                   ', 'Harare                             ', 'Stanchart Karigamombe                   ', 'SCBLZWHX   ', 0, 0),
(347, '5124', 'Standard Bank                                               ', 'Borrowdale                    ', 'Harare                             ', 'Stanchart Borrowdale                    ', 'SCBLZWHX   ', 0, 0),
(348, '5128', 'Standard Bank                                               ', 'R Mugabe Rd                   ', 'Harare                             ', 'Stanchart R Mugabe                      ', 'SCBLZWHX   ', 0, 0),
(349, '5132', 'Standard Bank                                               ', 'West End                      ', 'Harare                             ', 'Stanchart West End                      ', 'SCBLZWHX   ', 0, 0),
(350, '5136', 'Standard Bank                                               ', 'Africa Unity Square, Cnr 2nd ', 'Harare                             ', 'Stanchart Africa Unity', 'SCBLZWHX   ', 0, 0),
(351, '5140', 'Standard Bank                                               ', 'Southerton                    ', 'Harare                             ', 'Stanchart Southerton                    ', 'SCBLZWHX   ', 0, 0),
(352, '5148', 'Standard Bank                                               ', 'Baker Ave                     ', 'Harare                             ', 'Stanchart Baker Ave                     ', 'SCBLZWHX   ', 0, 0),
(353, '5152', 'Standard Bank                                               ', 'Highlands                     ', 'Harare                             ', 'Stanchart Highlands                     ', 'SCBLZWHX   ', 0, 0),
(354, '5156', 'Standard Bank                                               ', 'Crissps Rd                    ', 'Harare                             ', 'Stanchart Crissps Rd                    ', 'SCBLZWHX   ', 0, 0),
(355, '5160', 'Standard Bank                                               ', 'International                 ', 'Harare                             ', 'Stanchart International                 ', 'SCBLZWHX   ', 0, 0),
(356, '5173', 'Standard Bank                                               ', 'Blocked Funds                 ', 'Harare                             ', 'Stanchart Blocked Funds                 ', 'SCBLZWHX   ', 0, 0),
(357, '5183', 'Standard Bank                                               ', 'Crissps Rd                    ', 'Harare                             ', 'Stanchart Crissps Rd                    ', 'SCBLZWHX   ', 0, 0),
(358, '5185', 'Standard Bank                                               ', 'Central Waste                 ', 'Harare                             ', 'Stanchart Central Waste                 ', 'SCBLZWHX   ', 0, 0),
(359, '5195', 'Standard Bank                                               ', 'Belmont                       ', 'Bulawayo                           ', 'Stanchart Belmont                       ', 'SCBLZWHX   ', 0, 0),
(360, '5305', 'Standard Bank                                               ', 'Main St Byo                   ', 'Bulawayo                           ', 'Stanchart Main St                       ', 'SCBLZWHX   ', 0, 0),
(361, '5337', 'Standard Bank                                               ', 'J Moyo St Byo                 ', 'Bulawayo                           ', 'Stanchart J Moyo St                     ', 'SCBLZWHX   ', 0, 0),
(362, '5338', 'Standard Bank                                               ', 'Chivhu                        ', 'Chivhu                             ', 'Stanchart Chivhu                        ', 'SCBLZWHX   ', 0, 0),
(363, '5501', 'Standard Bank                                               ', 'Bindura                       ', 'Bindura                            ', 'Stanchart Bindura                       ', 'SCBLZWHX   ', 0, 0),
(364, '5502', 'Standard Bank                                               ', 'Masvingo                      ', 'Masvingo                           ', 'Stanchart Masvingo                      ', 'SCBLZWHX   ', 0, 0),
(365, '5505', 'Standard Bank                                               ', 'Kadoma                        ', 'Kadoma                             ', 'Stanchart Kadoma                        ', 'SCBLZWHX   ', 0, 0),
(366, '5507', 'Standard Bank                                               ', 'kadoma                        ', 'kadoma                             ', 'Stanchart Kadoma                        ', 'SCBLZWHX   ', 0, 0),
(367, '5508', 'Standard Bank                                               ', 'Gweru                         ', 'Gweru                              ', 'Stanchart Gweru                         ', 'SCBLZWHX   ', 0, 0),
(368, '5509', 'Standard Bank                                               ', 'Chegutu                       ', 'Chegutu                            ', 'Stanchart Chegutu                       ', 'SCBLZWHX   ', 0, 0),
(369, '5511', 'Standard Bank                                               ', 'Karoi                         ', 'Karoi                              ', 'Stanchart Karoi                         ', 'SCBLZWHX   ', 0, 0),
(370, '5513', 'Standard Bank                                               ', 'Chipinge                      ', 'Chipinge                           ', 'Stanchart Chipinge                      ', 'SCBLZWHX   ', 0, 0),
(371, '5517', 'Standard Bank                                               ', 'Redcliff                      ', 'Redcliff                           ', 'Stanchart Redcliff                      ', 'SCBLZWHX   ', 0, 0),
(372, '5521', 'Standard Bank                                               ', 'Kwekwe                        ', 'Kwekwe                             ', 'Stanchart Kwekwe                        ', 'SCBLZWHX   ', 0, 0),
(373, '5525', 'Standard Bank                                               ', 'Shurugwi                      ', 'Shurugwi                           ', 'Stanchart Shurugwi                      ', 'SCBLZWHX   ', 0, 0),
(374, '5529', 'Standard Bank                                               ', 'Zvishavane                    ', 'Zvishavane                         ', 'Stanchart Zvishavane                    ', 'SCBLZWHX   ', 0, 0),
(375, '5533', 'Standard Bank                                               ', 'Chinhoyi                      ', 'Chinhoyi                           ', 'Stanchart Chinhoyi                      ', 'SCBLZWHX   ', 0, 0),
(376, '5537', 'Standard Bank                                               ', 'Mutare                        ', 'Mutare                             ', 'Stanchart Mutare                        ', 'SCBLZWHX   ', 0, 0),
(377, '5541', 'Standard Bank                                               ', 'Marondera                     ', 'Marondera                          ', 'Stanchart Marondera                     ', 'SCBLZWHX   ', 0, 0),
(378, '5544', 'Standard Bank                                               ', 'Hwange                        ', 'Hwange                             ', 'Stanchart Hwange                        ', 'SCBLZWHX   ', 0, 0),
(379, '5545', 'Standard Bank                                               ', 'Victoria Falls                ', 'Victoria F                         ', 'Stanchart Victoria Falls                ', 'SCBLZWHX   ', 0, 0),
(380, '5549', 'Standard Bank                                               ', 'Mvurwi                        ', 'Mvurwi                             ', 'Stanchart Mvurwi                        ', 'SCBLZWHX   ', 0, 0),
(381, '5553', 'Standard Bank                                               ', 'Gwanda                        ', 'Gwanda                             ', 'Stanchart Gwanda                        ', 'SCBLZWHX   ', 0, 0),
(382, '5557', 'Standard Bank                                               ', 'Marondera                     ', 'Marondera                          ', 'Stanchart Marondera                     ', 'SCBLZWHX   ', 0, 0),
(383, '5558', 'Standard Bank                                               ', 'Rusape                        ', 'Rusape                             ', 'Stanchart Rusape                        ', 'SCBLZWHX   ', 0, 0),
(384, '5561', 'Standard Bank                                               ', 'Nyanga                        ', 'Nyanga                             ', 'Stanchart Nyanga                        ', 'SCBLZWHX   ', 0, 0),
(385, '5563', 'Standard Bank                                               ', 'Mhangura                      ', 'Mhangura                           ', 'Stanchart Mhangura                      ', 'SCBLZWHX   ', 0, 0),
(386, '5565', 'Standard Bank                                               ', 'Chitungwiza                   ', 'Chitungwiz                         ', 'Stanchart Chitungwiza                   ', 'SCBLZWHX   ', 0, 0),
(387, '5567', 'Standard Bank                                               ', 'Beit Bridge                   ', 'Beitbridge                         ', 'Stanchart Beit Bridge                   ', 'SCBLZWHX   ', 0, 0),
(388, '5569', 'Standard Bank                                               ', 'Mutoko                        ', 'Mutoko                             ', 'Stanchart Mutoko                        ', 'SCBLZWHX   ', 0, 0),
(389, '5571', 'Standard Bank                                               ', 'Chiredzi                      ', 'Chiredzi                           ', 'Stanchart Chiredzi                      ', 'SCBLZWHX   ', 0, 0),
(390, '5573', 'Steward Bank                                                ', 'Harare                        ', 'Harare                             ', 'Harare                                  ', 'TNLBZWHX   ', 0, 0),
(391, '6000', 'CBZ Bank                                                    ', 'Nelson Mandela                ', 'Harare                             ', 'CBZ Nelson Mandela                      ', 'COBZZWHA   ', 0, 0),
(392, '6011', 'CBZ Bank                                                    ', 'Union Ave                     ', 'Harare                             ', 'CBZ Head office                         ', 'COBZZWHA   ', 0, 0),
(393, '6012', 'CBZ Bank                                                    ', '8th Street                    ', 'Harare                             ', 'CBZ 8th Street                          ', 'COBZZWHA   ', 0, 0),
(394, '6013', 'CBZ Bank                                                    ', 'Mutare                        ', 'Mutare                             ', 'CBZ Mutare                              ', 'COBZZWHA   ', 0, 0),
(395, '6014', 'CBZ Bank                                                    ', 'Kwekwe                        ', 'Kwekwe                             ', 'CBZ Kwekwe                              ', 'COBZZWHA   ', 0, 0),
(396, '6015', 'CBZ Bank                                                    ', 'Makoni, Chitungwiza         ', 'Harare                             ', 'CBZ Makoni                              ', 'COBZZWHA   ', 0, 0),
(397, '6017', 'CBZ Bank                                                    ', 'Gokwe                         ', 'Gokwe                              ', 'CBZ Gokwe                               ', 'COBZZWHA   ', 0, 0),
(398, '6018', 'CBZ Bank                                                    ', 'Gweru                         ', 'Gweru                              ', 'CBZ Gweru                               ', 'COBZZWHA   ', 0, 0),
(399, '6021', 'CBZ Bank                                                    ', 'Second St                     ', 'Harare                             ', 'CBZ Second St                           ', 'COBZZWHA   ', 0, 0),
(400, '6023', 'CBZ Bank                                                    ', 'Southerton                    ', 'Harare                             ', 'CBZ Southerton                          ', 'COBZZWHA   ', 0, 0),
(401, '6027', 'CBZ Bank                                                    ', 'Bulawayo                      ', 'Bulawayo                           ', 'CBZ Bulawayo                            ', 'COBZZWHA   ', 0, 0),
(402, '6034', 'CBZ Bank                                                    ', 'Harare                        ', 'Harare                             ', 'CBZ Private Cash depot                  ', 'COBZZWHA   ', 0, 0),
(403, '6044', 'CBZ Bank                                                    ', 'Harare                        ', 'Harare                             ', 'CBZ Private Banking                     ', 'COBZZWHA   ', 0, 0),
(404, '6066', 'CBZ Bank                                                    ', 'Harare                        ', 'Harare                             ', 'CBZ Treasury                            ', 'COBZZWHA   ', 0, 0),
(405, '6087', 'CBZ Bank                                                    ', 'Chimanimani                   ', 'Chimaniman                         ', 'CBZ Chimanimani                         ', 'COBZZWHA   ', 0, 0),
(406, '6088', 'CBZ Bank                                                    ', 'Tsholotsho                    ', 'Tsholotsho                         ', 'CBZ Tsholotsho                          ', 'COBZZWHA   ', 0, 0),
(407, '6089', 'CBZ Bank                                                    ', 'Highfield                     ', 'Highfield                          ', 'CBZ Highfield                           ', 'COBZZWHA   ', 0, 0),
(408, '6090', 'CBZ                                                         ', 'Corner Paisley/Highfield Roads', 'Harare                             ', 'CBZ Highfield                           ', 'COBZZWHA   ', 0, 0),
(409, '6091', 'CBZ Bank                                                    ', 'Chitungwiza - town Centre     ', 'Chitungwiz                         ', 'CBZ Chitungwiza                         ', 'COBZZWHA   ', 0, 0),
(410, '6092', 'CBZ Bank                                                    ', 'Nembudziya                    ', 'Nembudziya                         ', 'CBZ Nembudziya                          ', 'COBZZWHA   ', 0, 0),
(411, '6095', 'CBZ Bank                                                    ', 'Kariba                        ', 'Kariba                             ', 'CBZ Kariba                              ', 'COBZZWHA   ', 0, 0),
(412, '6096', 'CBZ Bank                                                    ', 'Chirundu                      ', 'Chirundu                           ', 'CBZ Chirundu                            ', 'COBZZWHA   ', 0, 0),
(413, '6097', 'CBZ Bank                                                    ', 'Karoi                         ', 'Karoi                              ', 'CBZ Karoi                               ', 'COBZZWHA   ', 0, 0),
(414, '6098', 'CBZ Bank                                                    ', 'Chinhoyi                      ', 'Chinhoyi                           ', 'CBZ Chinhoyi                            ', 'COBZZWHA   ', 0, 0),
(415, '6099', 'CBZ Bank                                                    ', 'Nyika                         ', 'Nyika                              ', 'CBZ Nyika                               ', 'COBZZWHA   ', 0, 0),
(416, '6100', 'CBZ Bank                                                    ', 'Muzarabani                    ', 'Muzarabani                         ', 'CBZ Muzarabani                          ', 'COBZZWHA   ', 0, 0),
(417, '6101', 'CBZ Bank                                                    ', 'Chipinge                      ', 'Chipinge                           ', 'CBZ Chipinge                            ', 'COBZZWHA   ', 0, 0),
(418, '6102', 'CBZ Bank                                                    ', 'Rusape                        ', 'Rusape                             ', 'CBZ Rusape                              ', 'COBZZWHA   ', 0, 0),
(419, '6103', 'CBZ Bank                                                    ', 'J Nyerere Way                 ', 'Harare                             ', 'CBZ J Nyerere Way                       ', 'COBZZWHA   ', 0, 0),
(420, '6104', 'CBZ Bank                                                    ', 'Victoria Falls                ', 'Victoria F                         ', 'CBZ Victoria Falls                      ', 'COBZZWHA   ', 0, 0),
(421, '6105', 'CBZ Bank                                                    ', 'Murehwa                       ', 'Murehwa                            ', 'CBZ Murehwa                             ', 'COBZZWHA   ', 0, 0),
(422, '6107', 'CBZ Bank                                                    ', 'Victoria Falls                ', 'Victoria F                         ', 'CBZ Victoria Falls                      ', 'COBZZWHA   ', 0, 0),
(423, '63943', 'Renaissance                                                 ', 'Harare                        ', 'Harare                             ', 'Harare                                  ', '           ', 0, 0),
(424, '6504', 'CBZ Bank                                                    ', 'Chitungwiza                   ', 'Harare                             ', 'CBZ Chitungwiza                         ', 'COBZZWHA   ', 0, 0),
(425, '6520', 'CBZ Bank                                                    ', 'Gutu                          ', 'Gutu                               ', 'CBZ Gutu                                ', 'COBZZWHA   ', 0, 0),
(426, '6681', 'CBZ Bank                                                    ', 'R. Mugabe                     ', 'Harare                             ', 'CBZ R. Mugabe                           ', 'COBZZWHA   ', 0, 0),
(427, '8101', 'FBC BANK LTD                                                ', 'S Machel Avenue               ', 'Harare                             ', 'Samora Branch                           ', 'FBCPZWHA   ', 0, 0),
(428, '8102', 'FBC BANK LTD                                                ', 'Nelson Mandela Avenue         ', 'Harare                             ', 'FBC Centre-Nelson Mandela               ', '           ', 0, 0),
(429, '8103', 'FBC BANK LTD                                                ', 'Birmingham Rd                 ', 'Harare                             ', 'Birmingham                              ', 'FBCPZWHA   ', 0, 0),
(430, '8104', 'FBC BANK LTD                                                ', 'Belgravia Shopping Center 2nd ', 'Harare                             ', 'Belgravia Branch                        ', 'FBCPZWHA   ', 0, 0),
(431, '8106', 'FBC BANK LTD                                                ', 'Batanai Gardens, Jason Moyo/First Street', 'Harare                             ', 'First street Branch ', 'FBCPZWHA   ', 0, 0),
(432, '8121', 'FBC BANK LTD                                                ', 'Msasa                         ', 'Harare                             ', 'Msasa Branch                            ', 'FBCPZWHA   ', 0, 0),
(433, '8305', 'FBC BANK LTD                                                ', 'Jason Moyo Avenue             ', 'Harare                             ', 'Jason Moyo Branch                       ', 'FBCPZWHA   ', 0, 0),
(434, '8307', 'FBC BANK LTD                                                ', 'Bulawayo                      ', 'Bulawayo                           ', 'Byo Private Banking                     ', 'FBCPZWHA   ', 0, 0),
(435, '8400', 'Royal Bank                                                  ', 'Head Office                   ', 'Harare                             ', 'Head Office Branch                      ', 'ROYBZWHA   ', 0, 0),
(436, '8505', 'FBC BANK LTD                                                ', 'Belmont, Bulawayo           ', 'Bulawayo                           ', 'Belmont Branch                          ', 'FBCPZWHA   ', 0, 0),
(437, '8508', 'FBC BANK LTD                                                ', 'Zvishavane                    ', 'Zvishavane                         ', 'Zvishavane Branch                       ', 'FBCPZWHA   ', 0, 0),
(438, '8509', 'FBC BANK LTD                                                ', 'Mutare                        ', 'Mutare                             ', 'Mutare Branch                           ', 'FBCPZWHA   ', 0, 0),
(439, '8510', 'FBC BANK LTD                                                ', 'Gweru                         ', 'Gweru                              ', 'Gweru                                   ', 'FBCPZWHA   ', 0, 0),
(440, '8511', 'FBC BANK LTD                                                ', 'Chinhoyi                      ', 'Chinhoyi                           ', 'Chinhoyi                                ', 'FBCPZWHA   ', 0, 0),
(441, '8512', 'FBC BANK LTD                                                ', 'Victoria Falls                ', 'Harare                             ', 'Vic Falls Branch                        ', 'FBCPZWHA   ', 0, 0),
(442, '8513', 'FBC BANK LTD                                                ', 'Kwekwe                        ', 'Kwekwe                             ', 'Kwekwe Branch                           ', 'FBCPZWHA   ', 0, 0),
(443, '8514', 'FBC BANK LTD                                                ', 'Masvingo                      ', 'Masvingo                           ', 'Masvingo Branch                         ', 'FBCPZWHA   ', 0, 0),
(444, '9100', 'Metropolitan Bank                                           ', 'Main Street, Bulawayo', 'Bulawayo                           ', 'Main Branch                             ', 'MBOZZWHA   ', 0, 0),
(445, '9101', 'Metropolitan Bank                                           ', 'Fife Avenue                   ', 'Harare                             ', 'Fife Avenue Branch                      ', 'MBOZZWHA   ', 0, 0),
(446, '9102', 'Metropolitan Bank                                           ', 'Begravia Shopping Center      ', 'Harare                             ', 'Belgravia  Branch                       ', 'MBOZZWHA   ', 0, 0),
(447, '9103', 'Metropolitan Bank                                           ', 'Machipisa                     ', 'Harare                             ', 'Machipisa Branch                        ', 'MBOZZWHA   ', 0, 0),
(448, '9104', 'Metropolitan Bank                                           ', 'Jason Moyo Avenue             ', 'Harare                             ', 'Jason Moyo Branch                       ', 'MBOZZWHA   ', 0, 0),
(449, '9105', 'Metropolitan Bank                                           ', 'Sam Nujoma St                 ', 'Harare                             ', 'Sam Nujoma Branch                       ', 'MBOZZWHA   ', 0, 0),
(450, '9106', 'Metropolitan Bank                                           ', 'Kwame Nkrumah Avenue          ', 'Harare                             ', 'Kwame Nkrumah Branch                    ', 'MBOZZWHA   ', 0, 0),
(451, '9107', 'Metropolitan Bank                                           ', 'Southerton                    ', 'Harare                             ', 'Southerton Branch                       ', 'MBOZZWHA   ', 0, 0),
(452, '9108', 'Metropolitan Bank                                           ', 'Mbare, Harare', 'Harare                             ', 'Mbare Branch                            ', 'MBOZZWHA   ', 0, 0),
(453, '9109', 'Metropolitan Bank                                           ', 'Bulawayo                      ', 'Bulawayo                           ', 'Bulawayo Branch                         ', 'MBOZZWHA   ', 0, 0),
(454, '9201', 'Metropolitan Bank                                           ', 'Victoria Falls                ', 'Victoria F                         ', 'Victorial Falls Branch                  ', 'MBOZZWHA   ', 0, 0),
(455, '9301', 'Metropolitan Bank                                           ', 'Mrewa Center                  ', 'Mrewa                              ', 'Mrewa Branch                            ', 'MBOZZWHA   ', 0, 0),
(456, '9502', 'Metropolitan Bank                                           ', 'Machipisa Shopping Center     ', 'Harare                             ', 'Machipisa                               ', 'MBOZZWHA   ', 0, 0),
(457, '9503', 'Metropolitan Bank                                           ', 'Head Office                   ', 'Harare                             ', 'Head Office                             ', 'MBOZZWHA   ', 0, 0),
(458, '9504', 'Metropolitan Bank                                           ', 'Hotsprings                    ', 'Chimaniman                         ', 'Hotsprings Branch                       ', 'MBOZZWHA   ', 0, 0),
(459, '9505', 'Metropolitan Bank                                           ', 'Masvingo                      ', 'Masvingo                           ', 'Masvingo Branch                         ', 'MBOZZWHA   ', 0, 0),
(460, '9506', 'Metropolitan Bank                                           ', 'Mutoko                        ', 'Mutoko                             ', 'Mutoko Branch                           ', 'MBOZZWHA   ', 0, 0),
(461, '9507', 'Metropolitan Bank                                           ', 'Kwekwe                        ', 'Kwekwe                             ', 'Kwekwe Branch                           ', 'MBOZZWHA   ', 0, 0),
(462, '9508', 'Metropolitan Bank                                           ', 'Chipinge                      ', 'Chipinge                           ', 'Chipinge Branch                         ', 'MBOZZWHA   ', 0, 0),
(463, '9509', 'Metropolitan Bank                                           ', 'Bubi                          ', 'Bubi                               ', 'Bubi Branch                             ', 'MBOZZWHA   ', 0, 0),
(464, '9510', 'Metropolitan Bank                                           ', 'Beitbridge                    ', 'Beitbridge                         ', 'Beitbridge Branch                       ', 'MBOZZWHA   ', 0, 0),
(465, '9511', 'Metropolitan Bank                                           ', 'Gweru                         ', 'Gweru                              ', 'Gweru Branch                            ', 'MBOZZWHA   ', 0, 0);
INSERT INTO `branches` (`id`, `branch_code`, `bank_name`, `bank_address`, `bank_city`, `branch_name`, `swift_code`, `created_at`, `updated_at`) VALUES
(466, '9512', 'Metropolitan Bank                                           ', 'Chinhoyi                      ', 'Chinhoyi                           ', 'Chinhoyi Branch                         ', 'MBOZZWHA   ', 0, 0),
(467, '9513', 'Metropolitan Bank                                           ', 'Gwanda                        ', 'Gwanda                             ', 'Gwanda Branch                           ', 'MBOZZWHA   ', 0, 0),
(468, '9514', 'Metropolitan Bank                                           ', 'Chitungwiza Makoni            ', 'Chitungwiz                         ', 'Chitungwiza Makoni Branch               ', 'MBOZZWHA   ', 0, 0),
(469, '9517', 'Metropolitan Bank                                           ', 'Masvingo Main                 ', 'Masvingo                           ', 'Masvingo Main Branch                    ', 'MBOZZWHA   ', 0, 0),
(470, '9518', 'NMB Bank                                                    ', 'Unity Court                   ', 'Harare                             ', 'Unity Court                             ', 'NMBLZWHX   ', 0, 0),
(471, 'F230', 'First National Building Society            ', 'Harare                        ', 'Harare                             ', 'Harare                                  ', '           ', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `soiltype` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `name`, `product`, `region`, `soiltype`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Maize Budget', '45', '3', '2', 2, 1451295733, 1451295891),
(2, 'Sugar Beans', '33', '2', '2', 2, 1454865744, 1454865744),
(3, 'Cabbage Budget', '51', '3', '3', 2, 1454865978, 1454865978);

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'test', 1472548442, 1472548442),
(2, 'Floors', 1472560418, 1472560418),
(3, 'New Product', 1472622457, 1472622457),
(4, 'Test', 1472622708, 1472622708);

-- --------------------------------------------------------

--
-- Table structure for table `campaign_users`
--

CREATE TABLE `campaign_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campaign_users`
--

INSERT INTO `campaign_users` (`id`, `campaign_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1472552585, NULL),
(2, 1, 1, 1472553264, NULL),
(3, 1, 1, 1472612308, NULL),
(4, 1, 4, 1472612309, NULL),
(5, 1, 1, 1472612448, NULL),
(6, 1, 4, 1472612448, NULL),
(7, 3, 1, 1472622463, NULL),
(8, 3, 4, 1472622463, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) UNSIGNED NOT NULL,
  `mid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'byo', 1, 1447060554, 1447060554),
(2, 'Byo', 2, 1447139192, 1447139192),
(3, 'Byo', 3, 1447139220, 1447139220),
(4, 'yy', 4, 1447139943, 1447139943),
(5, 'yy', 5, 1447140002, 1447140002),
(6, 'yy', 6, 1447140022, 1447140022),
(7, 'Hre', 7, 1447141296, 1447141296),
(8, 'Hre', 8, 1447141386, 1447141386),
(9, 'Hre', 9, 1447141462, 1447141462),
(10, 'byo', 10, 1447334672, 1447334672),
(11, 'Byo', 11, 1447335774, 1447335774),
(12, 'Byo', 12, 1447336057, 1447336057),
(13, 'hahra', 13, 1447336308, 1447336308),
(14, 'hahra', 14, 1447336328, 1447336328),
(15, 'Bulawayo', 15, 1448877681, 1448877681),
(16, 'Bulawayo', 16, 1448877715, 1448877715),
(17, 'Bulawayo', 17, 1448877752, 1448877752),
(18, 'Bulawayo', 18, 1448877809, 1448877809),
(19, 'Bulawayo', 19, 1448877850, 1448877850),
(20, 'Bulawayo', 20, 1448878034, 1448878034),
(21, 'Gweru', 21, 1448941572, 1448941572),
(22, 'Harare', 22, 1448941805, 1448941805),
(23, 'Bulawayo', 23, 1448950593, 1448950593),
(24, 'Bulawayo', 24, 1448951495, 1448951495),
(25, 'Bulawayo', 25, 1449133748, 1449133748),
(26, 'Bulawayo', 26, 1449482257, 1449482257),
(27, 'Bulawayp', 27, 1450699293, 1450699293),
(28, 'undefined', 34, 1454681276, 1454681276),
(29, 'undefined', 35, 1454681385, 1454681385);

-- --------------------------------------------------------

--
-- Table structure for table `cocodes`
--

CREATE TABLE `cocodes` (
  `id` int(11) UNSIGNED NOT NULL,
  `co_code` varchar(255) NOT NULL,
  `co_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cocodes`
--

INSERT INTO `cocodes` (`id`, `co_code`, `co_name`, `city`, `currency`, `created_at`, `updated_at`) VALUES
(1, '1000', 'GMB Strategic Grain Reserve', 'Harare', 'USD', 1539595774, 1539595774),
(2, '2000', 'GMB Commercial', 'Harare', 'USD', 1539595804, 1539595804);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '23rd Global Systems', 1473153366, NULL),
(2, 'TestCompany', 1473168778, NULL),
(3, 'TestCompany', 1473169120, NULL),
(4, 'TestC1', 1473169135, NULL),
(5, 'AAA', 1473230106, NULL),
(6, 'AAA', 1473230127, NULL),
(7, '', 1473230145, NULL),
(8, '', 1473230203, NULL),
(9, 'AAA', 1473230227, NULL),
(10, 'AAA', 1473230270, NULL),
(11, 'AAA', 1473230720, NULL),
(12, 'bbbb', 1473233492, NULL),
(13, 'GlobalTech', 1474372009, NULL),
(14, 'Springware Technologies', 1502272935, NULL),
(15, 'GMB Test', 1518082265, NULL),
(16, 'gmb', 1518082274, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `condtions`
--

CREATE TABLE `condtions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `condtions`
--

INSERT INTO `condtions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Irrigation', 'Land is under irrigation', 1477920405, 1477920405);

-- --------------------------------------------------------

--
-- Table structure for table `contractapplications`
--

CREATE TABLE `contractapplications` (
  `id` int(11) UNSIGNED NOT NULL,
  `farm_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `size` double NOT NULL,
  `measure_unit` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contractapplications`
--

INSERT INTO `contractapplications` (`id`, `farm_id`, `farmer_id`, `season_id`, `year`, `product_id`, `project_id`, `size`, `measure_unit`, `status`, `created_at`, `updated_at`) VALUES
(3, 71, 57, 1, '2017', 7, 2, 20, 'Acres', 'Closed', 1487924738, 1487924752),
(4, 49, 24, 2, '2017', 7, 2, 5, 'Acres', 'Closed', 1490013287, 1490018071),
(5, 50, 29, 1, '2017', 1, 1, 50, 'Hectares', 'Closed', 1493377830, 1501831774),
(6, 1, 2, 2, '2017', 7, 2, 2, 'Hectares', 'Closed', 1493378034, 1493378208),
(7, 50, 29, 1, '2017', 1, 3, 25, 'Hectares', 'Open', 1493378611, 1493378611),
(8, 50, 29, 1, '2017', 1, 3, 100, 'Hectares', 'Closed', 1493386268, 1493386330),
(9, 50, 29, 1, '2017', 1, 3, 25, 'Hectares', 'Closed', 1493661965, 1493662081),
(10, 50, 29, 1, '2017', 1, 1, 50, 'Hectares', 'Closed', 1495621265, 1498750859),
(11, 50, 29, 1, '2017', 11, 5, 100, 'Hectares', 'Closed', 1498723143, 1498723376),
(12, 50, 29, 2, '2017', 11, 5, 20, 'Hectares', 'Closed', 1498729509, 1498729577),
(13, 54, 38, 1, '2017', 1, 1, 20, 'Acres', 'Closed', 1498751114, 1498751133),
(14, 50, 29, 1, '2017', 11, 5, 50, 'Hectares', 'Closed', 1499240518, 1499240932),
(15, 50, 29, 1, '2017', 1, 1, 20, 'Hectares', 'Open', 1499952246, 1499952246),
(16, 50, 29, 1, '2017', 1, 1, 12, 'Hectares', 'Closed', 1500450429, 1500879759),
(17, 50, 29, 1, '2017', 11, 5, 12, 'Hectares', 'Closed', 1500450652, 1500450707),
(18, 50, 29, 2, '2017', 11, 8, 22, 'Hectares', 'Closed', 1500461058, 1500633770),
(19, 53, 32, 1, '2017', 11, 8, 20, 'Hectares', 'Closed', 1500634642, 1518612410),
(20, 85, 32, 2, '2019', 5, 11, 20, 'Hectares', 'Closed', 1500639668, 1500639742),
(21, 85, 32, 2, '2017', 5, 11, 40, 'Hectares', 'Closed', 1500640316, 1500640362),
(22, 53, 32, 2, '2017', 11, 8, 100, 'Hectares', 'Closed', 1500640532, 1518592316),
(23, 50, 29, 1, '2017', 1, 3, 20, 'Hectares', 'Closed', 1500879678, 1518526797),
(24, 50, 29, 1, '2017', 1, 3, 10, 'Hectares', 'Closed', 1500880582, 1500880697),
(25, 71, 57, 2, '2017', 1, 4, 20, 'Hectares', 'Closed', 1500885334, 1502130971),
(26, 75, 57, 2, '2017', 11, 5, 4, 'Hectares', 'Closed', 1500886144, 1500887357),
(27, 60, 38, 2, '2018', 11, 5, 243, 'Hectares', 'Closed', 1500888515, 1500888562),
(28, 85, 32, 2, '2017', 5, 11, 13, 'Hectares', 'Closed', 1500888823, 1500888955),
(29, 81, 57, 2, '2017', 11, 5, 20, 'Hectares', 'Closed', 1500992408, 1500992696),
(30, 67, 17, 2, '2017', 46, 2, 20, 'Hectares', 'Closed', 1501682591, 1501682704),
(31, 59, 38, 2, '2017', 11, 5, 2, 'Hectares', 'Closed', 1501744371, 1501744475),
(32, 54, 38, 2, '2017', 7, 6, 12, 'Hectares', 'Closed', 1501768313, 1501768408),
(33, 54, 38, 2, '2017', 1, 1, 12, 'Hectares', 'Closed', 1501834508, 1501834624),
(34, 60, 38, 2, '2018', 1, 3, 107, 'Hectares', 'Closed', 1501845708, 1501845758),
(35, 60, 38, 2, '2017', 11, 5, 23, 'Hectares', 'Closed', 1501854029, 1501854686),
(36, 58, 38, 1, '2017', 1, 4, 3, 'Hectares', 'Closed', 1501854353, 1518519792),
(37, 59, 38, 1, '2017', 1, 3, 41, 'Hectares', 'Closed', 1502128835, 1502129054),
(38, 54, 38, 2, '2018', 11, 5, 3, 'Acres', 'Closed', 1502178748, 1502178799),
(39, 55, 38, 2, '2018', 1, 1, 12, 'Hectares', 'Closed', 1502183454, 1502183542),
(40, 59, 38, 2, '2018', 1, 3, 15, 'Hectares', 'Closed', 1502268482, 1502268652),
(41, 58, 38, 2, '2017', 1, 1, 10, 'Acres', 'Closed', 1502880563, 1502880638),
(42, 54, 38, 2, '2017', 46, 2, 30, 'Hectares', 'Closed', 1504516841, 1518506730),
(43, 55, 38, 2, '2017', 45, 2, 25, 'Hectares', 'Closed', 1504517130, 1504517392),
(44, 88, 78, 2, '2018', 1, 1, 100, 'Hectares', 'Closed', 1518081244, 1518082646),
(45, 89, 79, 2, '2018', 1, 1, 10, 'Hectares', 'Closed', 1518081431, 1518082673),
(46, 90, 82, 2, '2018', 1, 1, 200, 'Hectares', 'Closed', 1518092974, 1518414955),
(47, 91, 78, 2, '2018', 1, 1, 300, 'Hectares', 'Closed', 1518096231, 1518096392);

-- --------------------------------------------------------

--
-- Table structure for table `contractortrackers`
--

CREATE TABLE `contractortrackers` (
  `id` int(11) NOT NULL,
  `contracttracker_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractortrackers`
--

INSERT INTO `contractortrackers` (`id`, `contracttracker_id`, `notes`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '  	\n    ', '0000-00-00', 'Complete', 1500881097, 1500881097),
(2, 1, '  	\n    ', '0000-00-00', 'Complete', 1500881101, 1500881101),
(3, 2, '  	\n Impressed', '2017-08-04', 'Complete', 1501859361, 1501859361),
(4, 2, '  	\n    Done  in record time.', '2017-08-07', 'Complete', 1501860253, 1501860253);

-- --------------------------------------------------------

--
-- Table structure for table `contractquantities`
--

CREATE TABLE `contractquantities` (
  `id` int(11) UNSIGNED NOT NULL,
  `contractapplication_id` int(11) NOT NULL,
  `projectStagesTasksVariableCost_id` int(11) NOT NULL,
  `quantities` double NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contractquantities`
--

INSERT INTO `contractquantities` (`id`, `contractapplication_id`, `projectStagesTasksVariableCost_id`, `quantities`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 8, 1487924750, 1487924750),
(2, 3, 2, 50, 1487924750, 1487924750),
(3, 3, 3, 50, 1487924750, 1487924750),
(4, 3, 4, 23, 1487924751, 1487924751),
(5, 3, 5, 4, 1487924751, 1487924751),
(6, 3, 6, 34, 1487924751, 1487924751),
(7, 4, 1, 8, 1490018065, 1490018065),
(8, 4, 2, 50, 1490018065, 1490018065),
(9, 4, 3, 50, 1490018066, 1490018066),
(10, 4, 4, 23, 1490018066, 1490018066),
(11, 4, 5, 4, 1490018066, 1490018066),
(12, 4, 6, 34, 1490018066, 1490018066),
(13, 6, 1, 8, 1493378181, 1493378181),
(14, 6, 2, 50, 1493378181, 1493378181),
(15, 6, 3, 50, 1493378181, 1493378181),
(16, 6, 4, 23, 1493378181, 1493378181),
(17, 6, 5, 4, 1493378181, 1493378181),
(18, 6, 6, 34, 1493378181, 1493378181),
(26, 7, 7, 9, 1493384988, 1493384988),
(27, 7, 8, 4500, 1493384988, 1493384988),
(28, 7, 9, 10, 1493384988, 1493384988),
(29, 7, 10, 7500, 1493384988, 1493384988),
(30, 7, 11, 10, 1493384988, 1493384988),
(31, 7, 12, 5000, 1493384988, 1493384988),
(32, 7, 13, 45, 1493384988, 1493384988),
(33, 8, 7, 9, 1493386299, 1493386299),
(34, 8, 8, 20000, 1493386299, 1493386299),
(35, 8, 9, 10, 1493386299, 1493386299),
(36, 8, 10, 30000, 1493386299, 1493386299),
(37, 8, 11, 10, 1493386299, 1493386299),
(38, 8, 12, 20000, 1493386299, 1493386299),
(39, 8, 13, 45, 1493386300, 1493386300),
(40, 9, 7, 10, 1493662076, 1493662076),
(41, 9, 8, 5000, 1493662076, 1493662076),
(42, 9, 9, 10, 1493662076, 1493662076),
(43, 9, 10, 7500, 1493662076, 1493662076),
(44, 9, 11, 10, 1493662076, 1493662076),
(45, 9, 12, 5000, 1493662076, 1493662076),
(46, 9, 13, 45, 1493662076, 1493662076),
(47, 11, 14, 10, 1498723366, 1498723366),
(48, 11, 15, 10, 1498723366, 1498723366),
(49, 11, 16, 100000, 1498723367, 1498723367),
(50, 11, 17, 10, 1498723367, 1498723367),
(51, 11, 18, 20, 1498723367, 1498723367),
(52, 11, 19, 10, 1498723367, 1498723367),
(53, 12, 14, 9, 1498729573, 1498729573),
(54, 12, 15, 9, 1498729573, 1498729573),
(55, 12, 16, 18000, 1498729573, 1498729573),
(56, 12, 17, 9, 1498729573, 1498729573),
(57, 12, 18, 20, 1498729573, 1498729573),
(58, 12, 19, 10, 1498729573, 1498729573),
(65, 14, 14, 9, 1499240926, 1499240926),
(66, 14, 15, 9, 1499240926, 1499240926),
(67, 14, 16, 48000, 1499240926, 1499240926),
(68, 14, 17, 10, 1499240927, 1499240927),
(69, 14, 18, 20, 1499240927, 1499240927),
(70, 14, 19, 7, 1499240927, 1499240927),
(71, 17, 14, 10, 1500450703, 1500450703),
(72, 17, 15, 10, 1500450703, 1500450703),
(73, 17, 16, 12000, 1500450703, 1500450703),
(74, 17, 17, 10, 1500450703, 1500450703),
(75, 17, 18, 20, 1500450703, 1500450703),
(76, 17, 19, 10, 1500450703, 1500450703),
(77, 18, 24, 10, 1500633752, 1500633752),
(78, 18, 25, 2200, 1500633752, 1500633752),
(79, 18, 26, 10, 1500633752, 1500633752),
(80, 18, 27, 4400, 1500633753, 1500633753),
(81, 18, 28, 10, 1500633753, 1500633753),
(82, 18, 29, 10, 1500633753, 1500633753),
(83, 18, 30, 1100, 1500633753, 1500633753),
(84, 18, 31, 10, 1500633753, 1500633753),
(85, 20, 61, 10, 1500639738, 1500639738),
(86, 20, 62, 100, 1500639738, 1500639738),
(87, 20, 63, 10, 1500639738, 1500639738),
(88, 20, 64, 150, 1500639738, 1500639738),
(89, 20, 65, 15, 1500639738, 1500639738),
(90, 20, 66, 10, 1500639738, 1500639738),
(91, 20, 67, 100, 1500639738, 1500639738),
(92, 21, 61, 10, 1500640347, 1500640347),
(93, 21, 62, 100, 1500640347, 1500640347),
(94, 21, 63, 10, 1500640347, 1500640347),
(95, 21, 64, 150, 1500640347, 1500640347),
(96, 21, 65, 15, 1500640347, 1500640347),
(97, 21, 66, 10, 1500640347, 1500640347),
(98, 21, 67, 100, 1500640347, 1500640347),
(107, 16, 49, 15, 1500879753, 1500879753),
(108, 16, 50, 200, 1500879753, 1500879753),
(109, 16, 51, 15, 1500879753, 1500879753),
(110, 16, 52, 200, 1500879753, 1500879753),
(111, 24, 7, 10, 1500880693, 1500880693),
(112, 24, 8, 2000, 1500880693, 1500880693),
(113, 24, 9, 10, 1500880693, 1500880693),
(114, 24, 10, 3000, 1500880693, 1500880693),
(115, 24, 11, 9, 1500880693, 1500880693),
(116, 24, 12, 1800, 1500880693, 1500880693),
(117, 24, 13, 45, 1500880693, 1500880693),
(118, 26, 14, 10, 1500887345, 1500887345),
(119, 26, 15, 10, 1500887345, 1500887345),
(120, 26, 16, 4000, 1500887345, 1500887345),
(121, 26, 17, 10, 1500887345, 1500887345),
(122, 26, 18, 20, 1500887345, 1500887345),
(123, 26, 19, 10, 1500887345, 1500887345),
(124, 27, 14, 10, 1500888559, 1500888559),
(125, 27, 15, 10, 1500888559, 1500888559),
(126, 27, 16, 243000, 1500888559, 1500888559),
(127, 27, 17, 10, 1500888559, 1500888559),
(128, 27, 18, 20, 1500888559, 1500888559),
(129, 27, 19, 10, 1500888559, 1500888559),
(130, 28, 61, 10, 1500888948, 1500888948),
(131, 28, 62, 100, 1500888948, 1500888948),
(132, 28, 63, 10, 1500888948, 1500888948),
(133, 28, 64, 150, 1500888949, 1500888949),
(134, 28, 65, 15, 1500888949, 1500888949),
(135, 28, 66, 10, 1500888949, 1500888949),
(136, 28, 67, 100, 1500888949, 1500888949),
(137, 29, 14, 10, 1500992675, 1500992675),
(138, 29, 15, 10, 1500992675, 1500992675),
(139, 29, 16, 20000, 1500992675, 1500992675),
(140, 29, 17, 10, 1500992675, 1500992675),
(141, 29, 18, 20, 1500992675, 1500992675),
(142, 29, 19, 10, 1500992675, 1500992675),
(143, 30, 1, 8, 1501682694, 1501682694),
(144, 30, 2, 50, 1501682694, 1501682694),
(145, 30, 3, 50, 1501682695, 1501682695),
(146, 30, 4, 23, 1501682695, 1501682695),
(147, 30, 5, 4, 1501682695, 1501682695),
(148, 30, 6, 34, 1501682695, 1501682695),
(149, 31, 14, 10, 1501744468, 1501744468),
(150, 31, 15, 10, 1501744468, 1501744468),
(151, 31, 16, 2000, 1501744468, 1501744468),
(152, 31, 17, 10, 1501744468, 1501744468),
(153, 31, 18, 20, 1501744468, 1501744468),
(154, 31, 19, 10, 1501744468, 1501744468),
(155, 32, 53, 10, 1501768392, 1501768392),
(156, 32, 54, 10, 1501768392, 1501768392),
(157, 32, 55, 200, 1501768392, 1501768392),
(158, 32, 56, 20, 1501768392, 1501768392),
(159, 5, 49, 15, 1501831766, 1501831766),
(160, 5, 50, 200, 1501831766, 1501831766),
(161, 5, 51, 15, 1501831766, 1501831766),
(162, 5, 52, 200, 1501831766, 1501831766),
(163, 33, 49, 15, 1501834605, 1501834605),
(164, 33, 50, 200, 1501834605, 1501834605),
(165, 33, 51, 15, 1501834605, 1501834605),
(166, 33, 52, 200, 1501834606, 1501834606),
(167, 34, 7, 7, 1501845755, 1501845755),
(168, 34, 8, 1300, 1501845755, 1501845755),
(169, 34, 9, 10, 1501845755, 1501845755),
(170, 34, 10, 32100, 1501845755, 1501845755),
(171, 34, 11, 10, 1501845756, 1501845756),
(172, 34, 12, 45, 1501845756, 1501845756),
(173, 34, 13, 45, 1501845756, 1501845756),
(174, 35, 14, 10, 1501854680, 1501854680),
(175, 35, 15, 10, 1501854680, 1501854680),
(176, 35, 16, 23000, 1501854680, 1501854680),
(177, 35, 17, 10, 1501854680, 1501854680),
(178, 35, 18, 20, 1501854680, 1501854680),
(179, 35, 19, 10, 1501854680, 1501854680),
(180, 37, 7, 10, 1502129027, 1502129027),
(181, 37, 8, 8200, 1502129027, 1502129027),
(182, 37, 9, 10, 1502129027, 1502129027),
(183, 37, 10, 12300, 1502129027, 1502129027),
(184, 37, 11, 10, 1502129028, 1502129028),
(185, 37, 12, 8200, 1502129028, 1502129028),
(186, 37, 13, 45, 1502129028, 1502129028),
(187, 25, 46, 5, 1502130964, 1502130964),
(188, 25, 47, 100, 1502130964, 1502130964),
(189, 25, 48, 5, 1502130964, 1502130964),
(190, 25, 57, 15, 1502130964, 1502130964),
(191, 25, 58, 200, 1502130964, 1502130964),
(192, 25, 59, 10, 1502130964, 1502130964),
(193, 25, 60, 300, 1502130964, 1502130964),
(194, 38, 14, 10, 1502178787, 1502178787),
(195, 38, 15, 10, 1502178787, 1502178787),
(196, 38, 16, 1210, 1502178787, 1502178787),
(197, 38, 17, 10, 1502178787, 1502178787),
(198, 38, 18, 20, 1502178787, 1502178787),
(199, 38, 19, 10, 1502178788, 1502178788),
(200, 39, 49, 15, 1502183512, 1502183512),
(201, 39, 50, 200, 1502183512, 1502183512),
(202, 39, 51, 15, 1502183512, 1502183512),
(203, 39, 52, 200, 1502183512, 1502183512),
(204, 40, 7, 10, 1502268645, 1502268645),
(205, 40, 8, 3000, 1502268645, 1502268645),
(206, 40, 9, 10, 1502268645, 1502268645),
(207, 40, 10, 4500, 1502268645, 1502268645),
(208, 40, 11, 10, 1502268645, 1502268645),
(209, 40, 12, 3000, 1502268645, 1502268645),
(210, 40, 13, 45, 1502268645, 1502268645),
(211, 41, 49, 15, 1502880632, 1502880632),
(212, 41, 50, 200, 1502880632, 1502880632),
(213, 41, 51, 15, 1502880632, 1502880632),
(214, 41, 52, 200, 1502880632, 1502880632),
(215, 43, 1, 8, 1504517386, 1504517386),
(216, 43, 2, 40, 1504517386, 1504517386),
(217, 43, 3, 40, 1504517386, 1504517386),
(218, 43, 4, 12, 1504517386, 1504517386),
(219, 43, 5, 4, 1504517386, 1504517386),
(220, 43, 6, 23, 1504517386, 1504517386),
(233, 44, 49, 15, 1518082640, 1518082640),
(234, 44, 50, 200, 1518082640, 1518082640),
(235, 44, 51, 15, 1518082640, 1518082640),
(236, 44, 52, 200, 1518082640, 1518082640),
(237, 45, 49, 15, 1518082668, 1518082668),
(238, 45, 50, 200, 1518082668, 1518082668),
(239, 45, 51, 15, 1518082668, 1518082668),
(240, 45, 52, 200, 1518082668, 1518082668),
(247, 47, 49, 15, 1518096387, 1518096387),
(248, 47, 50, 200, 1518096387, 1518096387),
(249, 47, 51, 15, 1518096387, 1518096387),
(250, 47, 52, 200, 1518096387, 1518096387),
(251, 46, 49, 15, 1518414950, 1518414950),
(252, 46, 50, 200, 1518414950, 1518414950),
(253, 46, 51, 15, 1518414951, 1518414951),
(254, 46, 52, 200, 1518414951, 1518414951),
(255, 42, 1, 8, 1518506726, 1518506726),
(256, 42, 2, 50, 1518506726, 1518506726),
(257, 42, 3, 50, 1518506726, 1518506726),
(258, 42, 4, 23, 1518506726, 1518506726),
(259, 42, 5, 4, 1518506726, 1518506726),
(260, 42, 6, 34, 1518506726, 1518506726),
(261, 36, 46, 5, 1518519788, 1518519788),
(262, 36, 47, 100, 1518519788, 1518519788),
(263, 36, 48, 5, 1518519788, 1518519788),
(264, 36, 57, 15, 1518519788, 1518519788),
(265, 36, 58, 200, 1518519788, 1518519788),
(266, 36, 59, 10, 1518519788, 1518519788),
(267, 36, 60, 300, 1518519788, 1518519788),
(268, 23, 7, 10, 1518526786, 1518526786),
(269, 23, 8, 4000, 1518526786, 1518526786),
(270, 23, 9, 10, 1518526786, 1518526786),
(271, 23, 10, 6000, 1518526786, 1518526786),
(272, 23, 11, 10, 1518526786, 1518526786),
(273, 23, 12, 4000, 1518526786, 1518526786),
(274, 23, 13, 45, 1518526786, 1518526786),
(275, 22, 24, 10, 1518592282, 1518592282),
(276, 22, 25, 10000, 1518592282, 1518592282),
(277, 22, 26, 10, 1518592282, 1518592282),
(278, 22, 27, 20000, 1518592282, 1518592282),
(279, 22, 28, 10, 1518592282, 1518592282),
(280, 22, 29, 10, 1518592282, 1518592282),
(281, 22, 30, 5000, 1518592282, 1518592282),
(282, 22, 31, 10, 1518592282, 1518592282),
(283, 19, 24, 10, 1518612397, 1518612397),
(284, 19, 25, 2000, 1518612397, 1518612397),
(285, 19, 26, 10, 1518612397, 1518612397),
(286, 19, 27, 4000, 1518612397, 1518612397),
(287, 19, 28, 10, 1518612397, 1518612397),
(288, 19, 29, 10, 1518612397, 1518612397),
(289, 19, 30, 1000, 1518612397, 1518612397),
(290, 19, 31, 10, 1518612397, 1518612397);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) UNSIGNED NOT NULL,
  `contractapplication_id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `loan_amount` double NOT NULL,
  `balance_brought_forward` double NOT NULL,
  `amount_paid` double NOT NULL,
  `balance_carried_forward` double NOT NULL,
  `date_paid` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `contractapplication_id`, `contractor_id`, `loan_amount`, `balance_brought_forward`, `amount_paid`, `balance_carried_forward`, `date_paid`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(16, 3, 47, 1822, 1822, 0, 1822, '2017-02-24', 'Approved', '', 1487924752, 1487924791),
(17, 4, 47, 1822, 1822, 0, 1822, '2017-03-20', 'Pending', 'Pending', 1490018071, 1490018071),
(18, 6, 5, 1822, 1822, 0, 1822, '2017-04-28', 'Pending', 'Pending', 1493378208, 1493378208),
(19, 8, 38, 190092.5, 190092.5, 0, 190092.5, '2017-04-28', 'Approved', '', 1493386330, 1493386428),
(20, 9, 32, 47593.75, 47593.75, 0, 47593.75, '2017-05-01', 'Approved', '', 1493662081, 1493662150),
(21, 11, 32, 125285, 125285, 0, 125285, '2017-06-29', 'Approved', '', 1498723376, 1498729394),
(22, 12, 32, 22777.5, 22777.5, 0, 22777.5, '2017-06-29', 'Approved', '', 1498729577, 1498729621),
(23, 10, 32, 0, 0, 0, 0, '2017-06-29', 'Approved', '', 1498750859, 1500879917),
(24, 13, 32, 0, 0, 0, 0, '2017-06-29', 'Approved', '', 1498751133, 1498751198),
(25, 14, 32, 60277, 60277, 0, 60277, '2017-07-05', 'Approved', '', 1499240932, 1499241147),
(26, 17, 32, 15285, 15285, 0, 15285, '2017-07-19', 'Approved', '', 1500450707, 1500450775),
(27, 18, 32, 7817.5, 7817.5, 0, 7817.5, '2017-07-21', 'Approved', '', 1500633770, 1500879901),
(28, 20, 5, 348, 348, 0, 348, '2017-07-21', 'Approved', '', 1500639742, 1500639828),
(29, 21, 5, 348, 348, 0, 348, '2017-07-21', 'Approved', '', 1500640362, 1500640481),
(30, 22, 5, 35312.5, 35312.5, 0, 35312.5, '2017-07-21', 'Declined', '', 1500640558, 1500640576),
(31, 16, 32, 949, 949, 0, 949, '2017-07-24', 'Approved', '', 1500879759, 1500879889),
(32, 24, 32, 18592.5, 18592.5, 0, 18592.5, '2017-07-24', 'Approved', '', 1500880697, 1500880742),
(33, 26, 32, 5285, 5285, 0, 5285, '2017-07-24', 'Approved', '', 1500887357, 1500887504),
(34, 27, 32, 304035, 304035, 0, 304035, '2017-07-24', 'Approved', '', 1500888562, 1500888596),
(35, 28, 57, 348, 348, 0, 348, '2017-07-24', 'Approved', '', 1500888955, 1500888981),
(36, 29, 32, 25285, 25285, 0, 25285, '2017-07-25', 'Approved', '', 1500992696, 1500992721),
(37, 30, 2, 1822, 1822, 0, 1822, '2017-08-02', 'Approved', 'On point', 1501682704, 1501854975),
(38, 31, 47, 2785, 2785, 0, 2785, '2017-08-03', 'Approved', 'Everything is order.', 1501744475, 1501744819),
(39, 32, 32, 684, 684, 0, 684, '2017-08-03', 'Approved', 'All is fine.', 1501768408, 1501768542),
(40, 5, 32, 949, 949, 0, 949, '2017-08-04', 'Approved', 'Correct', 1501831774, 1501831833),
(41, 33, 32, 949, 949, 0, 949, '2017-08-04', 'Pending', 'Pending', 1501834624, 1501834624),
(42, 34, 32, 99752.5, 99752.5, 0, 99752.5, '2017-08-04', 'Approved', '', 1501845758, 1501845784),
(43, 35, 32, 29035, 29035, 0, 29035, '2017-08-04', 'Approved', 'I like this deal.', 1501854686, 1501855041),
(44, 37, 32, 77993.75, 77993.75, 0, 77993.75, '2017-08-07', 'Pending', 'Pending', 1502129054, 1502129054),
(45, 25, 32, 710.5, 710.5, 0, 710.5, '2017-08-07', 'Approved', 'All papers are in order', 1502130971, 1502133769),
(46, 38, 32, 1797.5, 1797.5, 0, 1797.5, '2017-08-08', 'Pending', 'Pending', 1502178799, 1502178799),
(47, 39, 32, 949, 949, 0, 949, '2017-08-08', 'Pending', 'Pending', 1502183542, 1502183542),
(48, 40, 32, 28593.75, 28593.75, 0, 28593.75, '2017-08-09', 'Approved', 'Everything is in order.', 1502268652, 1502268747),
(49, 41, 32, 949, 949, 0, 949, '2017-08-16', 'Pending', 'Pending', 1502880638, 1502880638),
(50, 43, 32, 1216, 1216, 0, 1216, '2017-09-04', 'Approved', '', 1504517391, 1504517709),
(51, 42, 32, 1822, 1822, 0, 1822, '2018-02-07', 'Declined', 'Not satisfactory', 1517995546, 1517995737),
(52, 44, 81, 949, 949, 0, 949, '2018-02-08', 'Approved', '', 1518082646, 1518084363),
(53, 45, 80, 949, 949, 0, 949, '2018-02-08', 'Approved', '', 1518082672, 1518084343),
(54, 47, 77, 949, 949, 0, 949, '2018-02-08', 'Pending', 'Pending', 1518096392, 1518096392),
(55, 46, 77, 949, 949, 0, 949, '2018-02-12', 'Pending', 'Pending', 1518414955, 1518414955),
(56, 42, 77, 1822, 1822, 0, 1822, '2018-02-13', 'Approved', '', 1518506730, 1518526697),
(57, 36, 77, 710.5, 710.5, 0, 710.5, '2018-02-13', 'Approved', 'Meets minimum requirements', 1518519792, 1518526666),
(58, 23, 77, 38093.75, 38093.75, 0, 38093.75, '2018-02-13', 'Approved', '', 1518526797, 1518526940),
(59, 22, 77, 35312.5, 35312.5, 0, 35312.5, '2018-02-14', 'Pending', 'Pending', 1518592316, 1518592316),
(60, 19, 77, 7112.5, 7112.5, 0, 7112.5, '2018-02-14', 'Pending', 'Pending', 1518612409, 1518612409);

-- --------------------------------------------------------

--
-- Table structure for table `contractstarts`
--

CREATE TABLE `contractstarts` (
  `id` int(11) UNSIGNED NOT NULL,
  `contract_id` int(11) NOT NULL,
  `startdate` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contractstarts`
--

INSERT INTO `contractstarts` (`id`, `contract_id`, `startdate`, `created_at`, `updated_at`) VALUES
(1, 8, 1493386542, 1493386542, 1493386542),
(2, 9, 1493586000, 1493662176, 1493662176),
(3, 9, 1498724464, 1498724464, 1498724464),
(4, 12, 1498770000, 1498731097, 1498731097),
(5, 11, 1498856400, 1498731259, 1498731259),
(6, 13, 1498770000, 1498751247, 1498751247),
(7, 14, 1499979600, 1499952427, 1499952427),
(8, 17, 1500411600, 1500450882, 1500450882),
(9, 3, 1500670800, 1500557081, 1500557081),
(10, 3, 1500557155, 1500557155, 1500557155),
(11, 24, 1500843600, 1500880925, 1500880925),
(12, 32, 1502917200, 1501768661, 1501768661),
(13, 20, 1502744400, 1501834663, 1501834663),
(14, 35, 1502312400, 1501858891, 1501858891),
(15, 21, 1502398800, 1502129278, 1502129278),
(16, 20, 1502917200, 1502183619, 1502183619),
(17, 20, 1502917200, 1502268851, 1502268851),
(18, 20, 1502917200, 1502880719, 1502880719),
(19, 8, 1510866000, 1504518151, 1504518151),
(20, 30, 1507669200, 1507555904, 1507555904),
(21, 44, 1518037200, 1518084468, 1518084468),
(22, 45, 1518037200, 1518084532, 1518084532),
(23, 42, 1519768800, 1518593064, 1518593064);

-- --------------------------------------------------------

--
-- Table structure for table `contracttrackers`
--

CREATE TABLE `contracttrackers` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_stage_task_id` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `notes` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `picture_saved_as` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contracttrackers`
--

INSERT INTO `contracttrackers` (`id`, `project_stage_task_id`, `enddate`, `notes`, `picture`, `picture_saved_as`, `created_at`, `updated_at`, `status`) VALUES
(1, 7, 1493758800, 'Going according to plan', 'index.jpg', '3b261766cb987ebe0b298fe803e63b5b.jpg', 1493662371, 1493662371, 'Complete'),
(2, 17, 1501794000, 'Finished the task', 'plough.jpg', '20be207128d70258530f3f69de60f838.jpg', 1501859175, 1501859175, 'Work In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `contract_disburses`
--

CREATE TABLE `contract_disburses` (
  `id` int(11) UNSIGNED NOT NULL,
  `contractquantities_id` int(11) NOT NULL,
  `userdisbursed` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `quantities` double NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contract_disburses`
--

INSERT INTO `contract_disburses` (`id`, `contractquantities_id`, `userdisbursed`, `date`, `quantities`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2016-01-01', 1, 1488373590, 1488373590),
(2, 2, 1, '2016-01-01', 1, 1488373590, 1488373590),
(3, 3, 1, '2016-01-01', 1, 1488373590, 1488373590),
(4, 4, 1, '2016-01-01', 1, 1488373590, 1488373590),
(5, 5, 1, '2016-01-01', 1, 1488373590, 1488373590),
(6, 6, 1, '2016-01-01', 1, 1488373590, 1488373590),
(7, 1, 1, '2016-01-01', 3, 1488440616, 1488440616),
(8, 2, 1, '2016-01-01', 2, 1488440616, 1488440616),
(9, 3, 1, '2016-01-01', 1, 1488440616, 1488440616),
(10, 4, 1, '2016-01-01', 1, 1488440616, 1488440616),
(11, 5, 1, '2016-01-01', 1, 1488440616, 1488440616),
(12, 6, 1, '2016-01-01', 1, 1488440616, 1488440616),
(13, 1, 1, '2016-01-01', 1, 1488441687, 1488441687),
(14, 2, 1, '2016-01-01', 1, 1488441687, 1488441687),
(15, 3, 1, '2016-01-01', 1, 1488441687, 1488441687),
(16, 4, 1, '2016-01-01', 1, 1488441687, 1488441687),
(17, 5, 1, '2016-01-01', 1, 1488441687, 1488441687),
(18, 6, 1, '2016-01-01', 1, 1488441688, 1488441688),
(19, 1, 1, '2016-01-01', 1, 1488442007, 1488442007),
(20, 2, 1, '2016-01-01', 1, 1488442007, 1488442007),
(21, 3, 1, '2016-01-01', 1, 1488442007, 1488442007),
(22, 4, 1, '2016-01-01', 1, 1488442007, 1488442007),
(23, 5, 1, '2016-01-01', 1, 1488442007, 1488442007),
(24, 6, 1, '2016-01-01', 1, 1488442008, 1488442008),
(25, 1, 1, '2016-01-01', 1, 1488976831, 1488976831),
(26, 2, 1, '2016-01-01', 3, 1488976831, 1488976831),
(27, 3, 1, '2016-01-01', 1, 1488976831, 1488976831),
(28, 4, 1, '2016-01-01', 1, 1488976831, 1488976831),
(29, 5, 1, '2016-01-01', 1, 1488976831, 1488976831),
(30, 6, 1, '2016-01-01', 1, 1488976831, 1488976831),
(31, 40, 32, NULL, 5, 1498723642, 1498723642),
(32, 41, 32, NULL, 500, 1498723642, 1498723642),
(33, 42, 32, NULL, 9, 1498723642, 1498723642),
(34, 43, 32, NULL, 6500, 1498723642, 1498723642),
(35, 44, 32, NULL, 8, 1498723642, 1498723642),
(36, 47, 32, NULL, 10, 1498725024, 1498725024),
(37, 48, 32, NULL, 10, 1498725024, 1498725024),
(38, 49, 32, NULL, 100000, 1498725024, 1498725024),
(39, 53, 32, NULL, 9, 1498729778, 1498729778),
(40, 54, 32, NULL, 9, 1498729778, 1498729778),
(41, 55, 32, NULL, 18000, 1498729778, 1498729778),
(42, 56, 32, NULL, 9, 1498729778, 1498729778),
(43, 57, 32, NULL, 18, 1498729778, 1498729778),
(44, 65, 32, NULL, 8, 1499241265, 1499241265),
(45, 66, 32, NULL, 9, 1499241265, 1499241265),
(46, 67, 32, NULL, 47000, 1499241265, 1499241265),
(47, 71, 32, NULL, 10, 1500451071, 1500451071),
(48, 72, 32, NULL, 10, 1500451071, 1500451071),
(49, 73, 32, NULL, 12000, 1500451071, 1500451071),
(50, 77, 32, NULL, 10, 1500633846, 1500633846),
(51, 78, 32, NULL, 2200, 1500633846, 1500633846),
(52, 79, 32, NULL, 10, 1500633846, 1500633846),
(53, 80, 32, NULL, 4400, 1500633846, 1500633846),
(54, 81, 32, NULL, 10, 1500633846, 1500633846),
(55, 82, 32, NULL, 10, 1500633846, 1500633846),
(56, 83, 32, NULL, 1100, 1500633846, 1500633846),
(57, 84, 32, NULL, 10, 1500633846, 1500633846),
(58, 85, 5, NULL, 10, 1500639791, 1500639791),
(59, 86, 5, NULL, 100, 1500639791, 1500639791),
(60, 87, 5, NULL, 10, 1500639791, 1500639791),
(61, 88, 5, NULL, 150, 1500639791, 1500639791),
(62, 89, 5, NULL, 15, 1500639791, 1500639791),
(63, 90, 5, NULL, 10, 1500639791, 1500639791),
(64, 91, 5, NULL, 100, 1500639791, 1500639791),
(65, 99, 5, NULL, 10, 1500640663, 1500640663),
(66, 100, 5, NULL, 10000, 1500640663, 1500640663),
(67, 101, 5, NULL, 10, 1500640663, 1500640663),
(68, 102, 5, NULL, 20000, 1500640663, 1500640663),
(69, 103, 5, NULL, 10, 1500640663, 1500640663),
(70, 104, 5, NULL, 10, 1500640663, 1500640663),
(71, 105, 5, NULL, 5000, 1500640663, 1500640663),
(72, 106, 5, NULL, 10, 1500640663, 1500640663),
(73, 107, 32, NULL, 15, 1500880056, 1500880056),
(74, 108, 32, NULL, 200, 1500880056, 1500880056),
(75, 109, 32, NULL, 15, 1500880056, 1500880056),
(76, 110, 32, NULL, 200, 1500880056, 1500880056),
(77, 115, 32, NULL, 9, 1500880850, 1500880850),
(78, 116, 32, NULL, 1800, 1500880850, 1500880850),
(79, 117, 32, NULL, 45, 1500880850, 1500880850),
(80, 118, 32, NULL, 10, 1500887633, 1500887633),
(81, 119, 32, NULL, 10, 1500887633, 1500887633),
(82, 120, 32, NULL, 4000, 1500887633, 1500887633),
(83, 121, 32, NULL, 10, 1500887633, 1500887633),
(84, 122, 32, NULL, 20, 1500887633, 1500887633),
(85, 123, 32, NULL, 10, 1500887633, 1500887633),
(86, 124, 32, NULL, 10, 1500888681, 1500888681),
(87, 125, 32, NULL, 10, 1500888681, 1500888681),
(88, 126, 32, NULL, 243000, 1500888681, 1500888681),
(89, 130, 57, NULL, 10, 1500889378, 1500889378),
(90, 131, 57, NULL, 100, 1500889378, 1500889378),
(91, 132, 57, NULL, 10, 1500889378, 1500889378),
(92, 133, 57, NULL, 150, 1500889378, 1500889378),
(93, 134, 57, NULL, 15, 1500889378, 1500889378),
(94, 135, 57, NULL, 10, 1500889378, 1500889378),
(95, 136, 57, NULL, 100, 1500889378, 1500889378),
(96, 159, 32, NULL, 10, 1501831948, 1501831948),
(97, 160, 32, NULL, 70, 1501831948, 1501831948),
(98, 167, 32, NULL, 2, 1501845851, 1501845851),
(99, 168, 32, NULL, 50, 1501845851, 1501845851),
(100, 169, 32, NULL, 7, 1501845851, 1501845851),
(101, 170, 32, NULL, 1100, 1501845851, 1501845851),
(102, 171, 32, NULL, 6, 1501845851, 1501845851),
(103, 172, 32, NULL, 10, 1501845851, 1501845851),
(104, 174, 32, NULL, 10, 1501855295, 1501855295),
(105, 204, 32, NULL, 10, 1502269049, 1502269049),
(106, 205, 32, NULL, 3000, 1502269049, 1502269049),
(107, 211, 32, NULL, 15, 1504517219, 1504517219),
(108, 212, 32, NULL, 200, 1504517220, 1504517220),
(109, 213, 32, NULL, 15, 1504517220, 1504517220),
(110, 214, 32, NULL, 200, 1504517220, 1504517220),
(111, 215, 32, NULL, 8, 1504517967, 1504517967),
(112, 216, 32, NULL, 40, 1504517967, 1504517967),
(113, 217, 32, NULL, 40, 1504517967, 1504517967),
(114, 218, 32, NULL, 12, 1504517967, 1504517967),
(115, 219, 32, NULL, 4, 1504517968, 1504517968),
(116, 220, 32, NULL, 23, 1504517968, 1504517968),
(117, 33, 38, NULL, 9, 1517925780, 1517925780),
(118, 34, 38, NULL, 20000, 1517925780, 1517925780),
(119, 92, 5, NULL, 10, 1517925787, 1517925787),
(120, 93, 5, NULL, 100, 1517925787, 1517925787),
(121, 94, 5, NULL, 10, 1517925787, 1517925787),
(122, 95, 5, NULL, 150, 1517925787, 1517925787),
(123, 233, 81, NULL, 15, 1518082775, 1518082775),
(124, 234, 81, NULL, 200, 1518082775, 1518082775),
(125, 235, 81, NULL, 15, 1518082775, 1518082775),
(126, 236, 81, NULL, 200, 1518082775, 1518082775),
(127, 237, 80, NULL, 15, 1518082775, 1518082775),
(128, 238, 80, NULL, 200, 1518082775, 1518082775),
(129, 239, 80, NULL, 15, 1518082775, 1518082775),
(130, 240, 80, NULL, 200, 1518082775, 1518082775),
(131, 247, 77, NULL, 15, 1518096436, 1518096436),
(132, 248, 77, NULL, 200, 1518096436, 1518096436),
(133, 249, 77, NULL, 15, 1518096436, 1518096436),
(134, 250, 77, NULL, 200, 1518096436, 1518096436),
(135, 261, 77, NULL, 5, 1518519872, 1518519872),
(136, 262, 77, NULL, 100, 1518519872, 1518519872),
(137, 263, 77, NULL, 5, 1518519872, 1518519872),
(138, 264, 77, NULL, 15, 1518519872, 1518519872),
(139, 265, 77, NULL, 200, 1518519872, 1518519872),
(140, 266, 77, NULL, 10, 1518519872, 1518519872),
(141, 267, 77, NULL, 300, 1518519872, 1518519872),
(142, 268, 77, NULL, 10, 1518527023, 1518527023),
(143, 269, 77, NULL, 4000, 1518527024, 1518527024),
(144, 270, 77, NULL, 10, 1518527024, 1518527024),
(145, 271, 77, NULL, 6000, 1518527024, 1518527024),
(146, 272, 77, NULL, 10, 1518527024, 1518527024),
(147, 283, 77, NULL, 10, 1518612525, 1518612525),
(148, 284, 77, NULL, 2000, 1518612525, 1518612525);

-- --------------------------------------------------------

--
-- Table structure for table `conversions`
--

CREATE TABLE `conversions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` mediumtext NOT NULL,
  `measurement_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversions`
--

INSERT INTO `conversions` (`id`, `name`, `quantity`, `measurement_id`, `created_at`, `updated_at`) VALUES
(1, 'Tonne 1000kg', '1000', 2, 1448903171, 1448903171),
(2, 'Bucket 20kg', '20', 2, 1448903205, 1448903205),
(3, 'Gallon 3.8l', '3.8', 1, 1448903242, 1448903242),
(4, 'Box 5kg', '5', 2, 1448903277, 1448903306),
(5, 'Box 10kg', '10', 2, 1448903331, 1448903331),
(6, 'Box 15 kg', '15', 2, 1448903360, 1448903360),
(7, 'Box 20kg', '20', 2, 1448903387, 1448903387),
(8, 'Pocket 5kg', '5', 2, 1448903414, 1448903414),
(9, 'Pocket 10kg', '10', 2, 1448903452, 1448903452),
(10, 'Pocket 15kg', '15', 2, 1448903478, 1448903478),
(11, 'Pocket 20kg', '20', 2, 1448903502, 1448903502),
(12, 'Punnet 250g', '0.25', 2, 1448903554, 1448903554),
(13, 'Punnet 500g', '0.5', 2, 1448903590, 1448903590),
(14, 'Sack 25kg', '25', 2, 1448903635, 1448903635),
(15, 'Sack 50kg', '50', 2, 1448903663, 1448903663);

-- --------------------------------------------------------

--
-- Table structure for table `correctivemeasures`
--

CREATE TABLE `correctivemeasures` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `disease_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `correctivemeasures`
--

INSERT INTO `correctivemeasures` (`id`, `description`, `disease_id`, `created_at`, `updated_at`) VALUES
(1, 'Treat by watering with water and compound d mixture.  5ml of compound d to 5 litres of water.', 1, 1458219730, 1458219730),
(2, 'Add growth enhancers to soil.', 2, 1458282357, 1458282357),
(3, 'Remove dead wood, mummified fruit and cankers from trees to reduce spread of disease; burn any prunings that have been made from the tree; disease can be controlled by applying fungicides from silver tip to harvest.', 3, 1493381988, 1493381988),
(4, 'Plant resistant varieties where possible; remove nearby red cedar; if growing susceptible varieties in proximity to red cedar follow a fungicide program.', 4, 1493382398, 1493382398),
(5, 'The most effective method of controlling the disease is to plant resistant hybrids; application of appropriate fungicides may provide some degree on control and reduce disease severity; fungicides are most effective when the amount of secondary inoculum is still low, generally when plants only have a few rust pustules per leaf.', 5, 1493383036, 1493383036),
(6, 'Grow available resistant varieties and hybrids. Follow crop rotation with non host crops. Use suitable systemic fungicide for both seed treatment and foliar spray. Keep the fields free from weeds. Drying seeds before sowing reduces the disease incidence.', 6, 1493383589, 1493383589),
(7, 'Remove all the infected plant parts and destroy them. Remember, do not compost any infected plant, as the disease can still be spread by the wind. Spray infected plants with fungicides. Effective fungicides for powdery mildew treatments or cures include sulfur, lime-sulfur, neem oil, and potassium bicarbonate. ', 7, 1500532676, 1500532676),
(8, 'There is no resistance to Citrus Black Spot and once a tree has been infected there is no known cure causing tree removal to be the best option. Both Federal and State governments have recommended the following preventative measures. To control Guignardia citriparpa fungicides like copper and/or strobilurins should be applied monthly from early May to the middle of September (in the northern hemisphere). Applications of the fungicides are recommended in early April (northern hemisphere) if that month has experienced more rainfall than usual resulting in the ideal conditions for citrus black spot to form.', 8, 1500534637, 1500534637),
(9, 'Copper sprays and Serenade® are somewhat effective at halting the spread of symptoms.', 9, 1500544039, 1500544039),
(10, 'Remove and destroy infected leaves (be sure to wash your hands afterwards).\nOnce blight is present and progresses, it becomes more resistant to biofungicide and fungicide. Treat it as soon as possible and on a schedule.\nOrganic fungicides. Treat organically with copper spray.\nChemical fungicides. Some gardeners prefer chemical fungicides. Check labels these have longer wait times before you can harvest tomatoes safely.', 10, 1500544661, 1500544661),
(11, 'Plant guava m well drained fields. Avoid flooding the guava field while applying irrigation. Apply 15 g Bavistin to each plant trunks in 2 litre of water.\r\n(i) Uproot and burn the wilted trees along with all roots.\r\n(ii) Drench the soil in the pit with 2 percent formalin solution and cover with sarkanda and old wetted gunny bags. Expose the soil for 14 days and replant healthy guava plants.', 11, 1500558545, 1500558545),
(12, 'Control measures are needed in commercial guava production. The use of resistant cultivars provides the most efficient tactic in disease management. Additional cultural control tactics used to aide in disease management include disease monitoring and the use of micro-irrigation.  Timely applications shortly before and during flowering and fruit development are crucial for disease management; subsequent applications may alleviate pre-harvest and post-harvest disease on fruit.', 12, 1500644681, 1500644681),
(13, 'Conidia are produced under conditions of high humidity and can be dispersed by wind. a solution is to reduce humidity to avoid this fungi from growing.', 13, 1500646769, 1500646769);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, '', 'Afghanistan', 1503912483, 1503912483),
(2, '', 'Albania', 1503912485, 1503912485),
(3, '', 'Algeria', 1503912487, 1503912487),
(4, '', 'American Samoa', 1503912491, 1503912491),
(5, '', 'Angola', 1503912491, 1503912491),
(6, '', 'Anguilla', 1503912492, 1503912492),
(7, '', 'Antartica', 1503912493, 1503912493),
(8, '', 'Antigua and Barbuda', 1503912493, 1503912493),
(9, '', 'Argentina', 1503912493, 1503912493),
(10, '', 'Armenia', 1503912495, 1503912495),
(11, '', 'Aruba', 1503912496, 1503912496),
(12, '', 'Ashmore and Cartier Island', 1503912496, 1503912496),
(13, '', 'Australia', 1503912496, 1503912496),
(14, '', 'Austria', 1503912496, 1503912496),
(15, '', 'Azerbaijan', 1503912497, 1503912497),
(16, '', 'Bahamas', 1503912502, 1503912502),
(17, '', 'Bahrain', 1503912503, 1503912503),
(18, '', 'Bangladesh', 1503912504, 1503912504),
(19, '', 'Barbados', 1503912508, 1503912508),
(20, '', 'Belarus', 1503912509, 1503912509),
(21, '', 'Belgium', 1503912509, 1503912509),
(22, '', 'Belize', 1503912510, 1503912510),
(23, '', 'Benin', 1503912510, 1503912510),
(24, '', 'Bermuda', 1503912511, 1503912511),
(25, '', 'Bhutan', 1503912512, 1503912512),
(26, '', 'Bolivia', 1503912513, 1503912513),
(27, '', 'Bosnia and Herzegovina', 1503912514, 1503912514),
(28, '', 'Botswana', 1503912514, 1503912514),
(29, '', 'Brazil', 1503912514, 1503912514),
(30, '', 'British Virgin Islands', 1503912516, 1503912516),
(31, '', 'Brunei', 1503912516, 1503912516),
(32, '', 'Bulgaria', 1503912517, 1503912517),
(33, '', 'Burkina Faso', 1503912519, 1503912519),
(34, '', 'Burma', 1503912523, 1503912523),
(35, '', 'Burundi', 1503912523, 1503912523),
(36, '', 'Cambodia', 1503912525, 1503912525),
(37, '', 'Cameroon', 1503912527, 1503912527),
(38, '', 'Canada', 1503912528, 1503912528),
(39, '', 'Cape Verde', 1503912529, 1503912529),
(40, '', 'Cayman Islands', 1503912530, 1503912530),
(41, '', 'Central African Republic', 1503912531, 1503912531),
(42, '', 'Chad', 1503912532, 1503912532),
(43, '', 'Chile', 1503912534, 1503912534),
(44, '', 'China', 1503912535, 1503912535),
(45, '', 'Christmas Island', 1503912537, 1503912537),
(46, '', 'Clipperton Island', 1503912537, 1503912537),
(47, '', 'Cocos (Keeling) Islands', 1503912537, 1503912537),
(48, '', 'Colombia', 1503912537, 1503912537),
(49, '', 'Comoros', 1503912540, 1503912540),
(50, '', 'Congo, Democratic Republic of the', 1503912540, 1503912540),
(51, '', 'Congo, Republic of the', 1503912541, 1503912541),
(52, '', 'Cook Islands', 1503912541, 1503912541),
(53, '', 'Costa Rica', 1503912542, 1503912542),
(54, '', 'Cote d\'Ivoire', 1503912543, 1503912543),
(55, '', 'Croatia', 1503912547, 1503912547),
(56, '', 'Cuba', 1503912548, 1503912548),
(57, '', 'Cyprus', 1503912550, 1503912550),
(58, '', 'Czeck Republic', 1503912550, 1503912550),
(59, '', 'Denmark', 1503912551, 1503912551),
(60, '', 'Djibouti', 1503912553, 1503912553),
(61, '', 'Dominica', 1503912553, 1503912553),
(62, '', 'Dominican Republic', 1503912553, 1503912553),
(63, '', 'Ecuador', 1503912556, 1503912556),
(64, '', 'Egypt', 1503912558, 1503912558),
(65, '', 'El Salvador', 1503912559, 1503912559),
(66, '', 'Equatorial Guinea', 1503912560, 1503912560),
(67, '', 'Eritrea', 1503912561, 1503912561),
(68, '', 'Estonia', 1503912562, 1503912562),
(69, '', 'Ethiopia', 1503912563, 1503912563),
(70, '', 'Europa Island', 1503912563, 1503912563),
(71, '', 'Falkland Islands (Islas Malvinas)', 1503912564, 1503912564),
(72, '', 'Faroe Islands', 1503912564, 1503912564),
(73, '', 'Fiji', 1503912564, 1503912564),
(74, '', 'Finland', 1503912565, 1503912565),
(75, '', 'France', 1503912565, 1503912565),
(76, '', 'French Guiana', 1503912566, 1503912566),
(77, '', 'French Polynesia', 1503912566, 1503912566),
(78, '', 'French Southern and Antarctic Lands', 1503912567, 1503912567),
(79, '', 'Gabon', 1503912567, 1503912567),
(80, '', 'Gambia, The', 1503912568, 1503912568),
(81, '', 'Gaza Strip', 1503912568, 1503912568),
(82, '', 'Georgia', 1503912568, 1503912568),
(83, '', 'Germany', 1503912572, 1503912572),
(84, '', 'Ghana', 1503912573, 1503912573),
(85, '', 'Gibraltar', 1503912573, 1503912573),
(86, '', 'Glorioso Islands', 1503912573, 1503912573),
(87, '', 'Greece', 1503912574, 1503912574),
(88, '', 'Greenland', 1503912576, 1503912576),
(89, '', 'Grenada', 1503912577, 1503912577),
(90, '', 'Guadeloupe', 1503912577, 1503912577),
(91, '', 'Guam', 1503912578, 1503912578),
(92, '', 'Guatemala', 1503912578, 1503912578),
(93, '', 'Guernsey', 1503912580, 1503912580),
(94, '', 'Guinea', 1503912580, 1503912580),
(95, '', 'Guinea-Bissau', 1503912583, 1503912583),
(96, '', 'Guyana', 1503912584, 1503912584),
(97, '', 'Haiti', 1503912585, 1503912585),
(98, '', 'Heard Island and McDonald Islands', 1503912585, 1503912585),
(99, '', 'Holy See (Vatican City)', 1503912585, 1503912585),
(100, '', 'Honduras', 1503912586, 1503912586),
(101, '', 'Hong Kong', 1503912587, 1503912587),
(102, '', 'Howland Island', 1503912587, 1503912587),
(103, '', 'Hungary', 1503912587, 1503912587),
(104, '', 'Iceland', 1503912590, 1503912590),
(105, '', 'India', 1503912594, 1503912594),
(106, '', 'Indonesia', 1503912598, 1503912598),
(107, '', 'Iran', 1503912601, 1503912601),
(108, '', 'Iraq', 1503912602, 1503912602),
(109, '', 'Ireland', 1503912604, 1503912604),
(110, '', 'Ireland, Northern', 1503912606, 1503912606),
(111, '', 'Israel', 1503912608, 1503912608),
(112, '', 'Italy', 1503912609, 1503912609),
(113, '', 'Jamaica', 1503912610, 1503912610),
(114, '', 'Jan Mayen', 1503912611, 1503912611),
(115, '', 'Japan', 1503912611, 1503912611),
(116, '', 'Jarvis Island', 1503912614, 1503912614),
(117, '', 'Jersey', 1503912614, 1503912614),
(118, '', 'Johnston Atoll', 1503912614, 1503912614),
(119, '', 'Jordan', 1503912614, 1503912614),
(120, '', 'Juan de Nova Island', 1503912615, 1503912615),
(121, '', 'Kazakhstan', 1503912615, 1503912615),
(122, '', 'Kenya', 1503912616, 1503912616),
(123, '', 'Kiribati', 1503912616, 1503912616),
(124, '', 'Korea, North', 1503912618, 1503912618),
(125, '', 'Korea, South', 1503912619, 1503912619),
(126, '', 'Kuwait', 1503912620, 1503912620),
(127, '', 'Kyrgyzstan', 1503912620, 1503912620),
(128, '', 'Laos', 1503912621, 1503912621),
(129, '', 'Latvia', 1503912622, 1503912622),
(130, '', 'Lebanon', 1503912624, 1503912624),
(131, '', 'Lesotho', 1503912624, 1503912624),
(132, '', 'Liberia', 1503912625, 1503912625),
(133, '', 'Libya', 1503912626, 1503912626),
(134, '', 'Liechtenstein', 1503912628, 1503912628),
(135, '', 'Lithuania', 1503912629, 1503912629),
(136, '', 'Luxembourg', 1503912634, 1503912634),
(137, '', 'Macau', 1503912634, 1503912634),
(138, '', 'Macedonia, Former Yugoslav Republic of', 1503912634, 1503912634),
(139, '', 'Madagascar', 1503912645, 1503912645),
(140, '', 'Malawi', 1503912645, 1503912645),
(141, '', 'Malaysia', 1503912647, 1503912647),
(142, '', 'Maldives', 1503912648, 1503912648),
(143, '', 'Mali', 1503912650, 1503912650),
(144, '', 'Malta', 1503912650, 1503912650),
(145, '', 'Man, Isle of', 1503912651, 1503912651),
(146, '', 'Marshall Islands', 1503912651, 1503912651),
(147, '', 'Martinique', 1503912653, 1503912653),
(148, '', 'Mauritania', 1503912653, 1503912653),
(149, '', 'Mauritius', 1503912654, 1503912654),
(150, '', 'Mayotte', 1503912655, 1503912655),
(151, '', 'Mexico', 1503912655, 1503912655),
(152, '', 'Micronesia, Federated States of', 1503912658, 1503912658),
(153, '', 'Midway Islands', 1503912658, 1503912658),
(154, '', 'Moldova', 1503912658, 1503912658),
(155, '', 'Monaco', 1503912659, 1503912659),
(156, '', 'Mongolia', 1503912659, 1503912659),
(157, '', 'Montserrat', 1503912661, 1503912661),
(158, '', 'Morocco', 1503912661, 1503912661),
(159, '', 'Mozambique', 1503912664, 1503912664),
(160, '', 'Namibia', 1503912665, 1503912665),
(161, '', 'Nauru', 1503912666, 1503912666),
(162, '', 'Nepal', 1503912667, 1503912667),
(163, '', 'Netherlands', 1503912668, 1503912668),
(164, '', 'Netherlands Antilles', 1503912669, 1503912669),
(165, '', 'New Caledonia', 1503912670, 1503912670),
(166, '', 'New Zealand', 1503912670, 1503912670),
(167, '', 'Nicaragua', 1503912681, 1503912681),
(168, '', 'Niger', 1503912682, 1503912682),
(169, '', 'Nigeria', 1503912682, 1503912682),
(170, '', 'Niue', 1503912685, 1503912685),
(171, '', 'Norfolk Island', 1503912685, 1503912685),
(172, '', 'Northern Mariana Islands', 1503912685, 1503912685),
(173, '', 'Norway', 1503912686, 1503912686),
(174, '', 'Oman', 1503912687, 1503912687),
(175, '', 'Pakistan', 1503912688, 1503912688),
(176, '', 'Palau', 1503912688, 1503912688),
(177, '', 'Panama', 1503912690, 1503912690),
(178, '', 'Papua New Guinea', 1503912691, 1503912691),
(179, '', 'Paraguay', 1503912692, 1503912692),
(180, '', 'Peru', 1503912693, 1503912693),
(181, '', 'Philippines', 1503912695, 1503912695),
(182, '', 'Pitcaim Islands', 1503912705, 1503912705),
(183, '', 'Poland', 1503912705, 1503912705),
(184, '', 'Portugal', 1503912706, 1503912706),
(185, '', 'Puerto Rico', 1503912708, 1503912708),
(186, '', 'Qatar', 1503912714, 1503912714),
(187, '', 'Reunion', 1503912714, 1503912714),
(188, '', 'Romainia', 1503912715, 1503912715),
(189, '', 'Russia', 1503912717, 1503912717),
(190, '', 'Rwanda', 1503912724, 1503912724),
(191, '', 'Saint Helena', 1503912724, 1503912724),
(192, '', 'Saint Kitts and Nevis', 1503912725, 1503912725),
(193, '', 'Saint Lucia', 1503912725, 1503912725),
(194, '', 'Saint Pierre and Miquelon', 1503912726, 1503912726),
(195, '', 'Saint Vincent and the Grenadines', 1503912726, 1503912726),
(196, '', 'Samoa', 1503912727, 1503912727),
(197, '', 'San Marino', 1503912727, 1503912727),
(198, '', 'Sao Tome and Principe', 1503912728, 1503912728),
(199, '', 'Saudi Arabia', 1503912728, 1503912728),
(200, '', 'Scotland', 1503912729, 1503912729),
(201, '', 'Senegal', 1503912731, 1503912731),
(202, '', 'Seychelles', 1503912732, 1503912732),
(203, '', 'Sierra Leone', 1503912734, 1503912734),
(204, '', 'Singapore', 1503912734, 1503912734),
(205, '', 'Slovakia', 1503912734, 1503912734),
(206, '', 'Slovenia', 1503912735, 1503912735),
(207, '', 'Solomon Islands', 1503912746, 1503912746),
(208, '', 'Somalia', 1503912747, 1503912747),
(209, '', 'South Africa', 1503912748, 1503912748),
(210, '', 'South Georgia and South Sandwich Islands', 1503912749, 1503912749),
(211, '', 'Spain', 1503912750, 1503912750),
(212, '', 'Spratly Islands', 1503912751, 1503912751),
(213, '', 'Sri Lanka', 1503912751, 1503912751),
(214, '', 'Sudan', 1503912752, 1503912752),
(215, '', 'Suriname', 1503912754, 1503912754),
(216, '', 'Svalbard', 1503912755, 1503912755),
(217, '', 'Swaziland', 1503912756, 1503912756),
(218, '', 'Sweden', 1503912757, 1503912757),
(219, '', 'Switzerland', 1503912759, 1503912759),
(220, '', 'Syria', 1503912761, 1503912761),
(221, '', 'Taiwan', 1503912762, 1503912762),
(222, '', 'Tajikistan', 1503912764, 1503912764),
(223, '', 'Tanzania', 1503912764, 1503912764),
(224, '', 'Thailand', 1503912766, 1503912766),
(225, '', 'Tobago', 1503912770, 1503912770),
(226, '', 'Toga', 1503912770, 1503912770),
(227, '', 'Tokelau', 1503912771, 1503912771),
(228, '', 'Tonga', 1503912771, 1503912771),
(229, '', 'Trinidad', 1503912771, 1503912771),
(230, '', 'Tunisia', 1503912772, 1503912772),
(231, '', 'Turkey', 1503912773, 1503912773),
(232, '', 'Turkmenistan', 1503912778, 1503912778),
(233, '', 'Tuvalu', 1503912778, 1503912778),
(234, '', 'Uganda', 1503912778, 1503912778),
(235, '', 'Ukraine', 1503912782, 1503912782),
(236, '', 'United Arab Emirates', 1503912783, 1503912783),
(237, '', 'United Kingdom', 1503912784, 1503912784),
(238, '', 'Uruguay', 1503912795, 1503912795),
(239, '', 'USA', 1503912796, 1503912796),
(240, '', 'Uzbekistan', 1503912800, 1503912800),
(241, '', 'Vanuatu', 1503912802, 1503912802),
(242, '', 'Venezuela', 1503912803, 1503912803),
(243, '', 'Vietnam', 1503912805, 1503912805),
(244, '', 'Virgin Islands', 1503912810, 1503912810),
(245, '', 'Wales', 1503912810, 1503912810),
(246, '', 'Wallis and Futuna', 1503912812, 1503912812),
(247, '', 'West Bank', 1503912812, 1503912812),
(248, '', 'Western Sahara', 1503912812, 1503912812),
(249, '', 'Yemen', 1503912812, 1503912812),
(250, '', 'Yugoslavia', 1503912813, 1503912813),
(251, '', 'Zambia', 1503912813, 1503912813),
(252, '', 'Zimbabwe', 1503912814, 1503912814);

-- --------------------------------------------------------

--
-- Table structure for table `depots`
--

CREATE TABLE `depots` (
  `id` int(11) UNSIGNED NOT NULL,
  `plant` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depots`
--

INSERT INTO `depots` (`id`, `plant`, `short_name`, `name`, `city`, `created_at`, `updated_at`) VALUES
(1, 'DURA', 'DURA', 'DURA HEAD OFFICE', 'Harare', 0, 0),
(2, 'EE01', 'MARO', 'MARONDERA', 'Marondera', 0, 0),
(3, 'EE02', 'SADZ', 'SADZA', 'Sadza', 0, 0),
(4, 'EE03', 'WEDZ', 'WEDZA', 'Wedza', 0, 0),
(5, 'EE04', 'CHIV', 'CHIVHU', 'Chivhu', 0, 0),
(6, 'EE05', 'MURE', 'MUREHWA', 'Murehwa', 0, 0),
(7, 'EE06', 'MUTAW', 'MUTAWATAWA', 'Mutawatawa', 0, 0),
(8, 'EE07', 'MUTOK', 'MUTOKO', 'Mutoko', 0, 0),
(9, 'EE08', 'KOTW', 'KOTWA', 'Kotwa', 0, 0),
(10, 'EM01', 'B/BRIDGE', 'BAZELEYBRIDGE', 'Bazeleybridge', 0, 0),
(11, 'EM02', 'BUHE', 'BUHERA', 'Buhera', 0, 0),
(12, 'EM03', 'CHIEND', 'CHIENDAMBUYA', 'Chiendambuya', 0, 0),
(13, 'EM04', 'CHINY', 'CHINYUDZE', 'Headlands', 0, 0),
(14, 'EM05', 'CHIMAN', 'CHIMANIMANI', 'Chimanimani', 0, 0),
(15, 'EM06', 'CHIP', 'CHIPINGE', 'Chipinge', 0, 0),
(16, 'EM07', 'DEVED', 'DEVEDZO', 'Devedzo', 0, 0),
(17, 'EM08', 'MIDSABI', 'MIDDLE SABI', 'Chipangai', 0, 0),
(18, 'EM09', 'MTRE GRAIN', 'MUTARE GRAIN', 'Mutare', 0, 0),
(19, 'EM10', 'NYAN', 'NYANGA', 'Nyanga', 0, 0),
(20, 'EM11', 'RUAP', 'RUSAPE', 'Rusape', 0, 0),
(21, 'EM12', 'T/MILLS', 'TIMBERMILLS', 'Headlands', 0, 0),
(22, 'EM13', 'MUTAS', 'MUTASA', 'Mutasa', 0, 0),
(23, 'EM14', 'MASV', 'MASVOSVA', 'Masvosva', 0, 0),
(24, 'EV01', 'CHIV', 'CHIVI', 'Chivi', 0, 0),
(25, 'EV02', 'GUTU', 'GUTU', 'Chartsworth, Gutu', 0, 0),
(26, 'EV03', 'JERE', 'JERERA', 'Jerera', 0, 0),
(27, 'EV04', 'MASV', 'MASVINGO', 'Masvingo', 0, 0),
(28, 'EV05', 'NANDI/CHIREDZI', 'NANDI/CHIREDZI', 'Chiredzi', 0, 0),
(29, 'EV06', 'NYIKA', 'NYIKA', 'Masvingo', 0, 0),
(30, 'EV07', 'RUTENG', 'RUTENGA', 'Mwenezi', 0, 0),
(31, 'NC01', 'BIND', 'BINDURA', 'Bindura', 0, 0),
(32, 'NC02', 'CENT', 'CENTENARY', 'Centenary', 0, 0),
(33, 'NC03', 'CHIW', 'CHIWESHE', 'Chiweshe', 0, 0),
(34, 'NC04', 'CHIW', 'CONCESSION', 'Concession', 0, 0),
(35, 'NC05', 'GLEN', 'GLENDALE', 'Glendale', 0, 0),
(36, 'NC06', 'GURUVE', 'GURUVE', 'Guruve', 0, 0),
(37, 'NC07', 'KACHU', 'KACHUTA', 'Guruve', 0, 0),
(38, 'NC08', 'MT. DARW', 'MT. DARWIN', 'Guruve', 0, 0),
(39, 'NC09', 'MVURWI', 'MVURWI', 'Mvurwi', 0, 0),
(40, 'NC10', 'RUSH', 'RUSHINGA', 'Rushinga', 0, 0),
(41, 'NC11', 'RUSH', 'KAMUTSENZERE', 'Kamutsenzere', 0, 0),
(42, 'NC12', 'RUSH', 'SHAMVA', 'Shamva', 0, 0),
(43, 'NH01', 'ASPIN', 'ASPINDALE', 'Harare', 0, 0),
(44, 'NH02', 'CHIT', 'CHITUNGWIZA', 'Harare', 0, 0),
(45, 'NW01', 'CHEG', 'CHEGUTU', 'Chegutu', 0, 0),
(46, 'NW02', 'KADO', 'KADOMA', 'Kadoma', 0, 0),
(47, 'NW03', 'SANYA', 'SA', 'Sanyathi', 0, 0),
(48, 'NW04', 'MHOND/MUBA', 'MHONDORO/MUBAYIRA', 'Mubayira', 0, 0),
(49, 'NW05', 'MAMINA', 'MAMINA', 'Kadoma', 0, 0),
(50, 'NW06', 'KARIBA', 'KARIBA', 'Kariba', 0, 0),
(51, 'NW07', 'KAROI', 'KAROI', 'Karoi', 0, 0),
(52, 'NW08', 'CHINH', 'CHINHOYI', 'Karoi', 0, 0),
(53, 'NW09', 'BANK', 'BANKET', 'Banket', 0, 0),
(54, 'NW10', 'RAFFI', 'RAFFINGORA', 'Raffingora', 0, 0),
(55, 'NW11', 'VUTI', 'VUTI', 'VUTI', 0, 0),
(56, 'NW12', 'LIONS', 'LIONS DEN', 'Chinhoyi', 0, 0),
(57, 'NW13', 'MAGUN', 'MAGUNJE', 'Magunje', 0, 0),
(58, 'NW14', 'MHANGU', 'MHANGURA', 'Mhangura', 0, 0),
(59, 'NW15', 'DOMA', 'DOMA', 'Mhangura', 0, 0),
(60, 'NW16', 'MUDZIM', 'MUDZIMU', 'Magunje', 0, 0),
(61, 'NW17', 'MUKWI', 'MUKWICHI', 'Karoi', 0, 0),
(62, 'NW18', 'MURO', 'MUROMBEDZI', 'Murombedzi', 0, 0),
(63, 'NW19', 'NORT', 'NORTON', 'Norton', 0, 0),
(64, 'P001', '', '', '', 0, 0),
(65, 'P002', '', '', '', 0, 0),
(66, 'P003', '', '', '', 0, 0),
(67, 'P004', '', '', '', 0, 0),
(68, 'P005', '', '', '', 0, 0),
(69, 'P006', '', '', '', 0, 0),
(70, 'P007', '', '', '', 0, 0),
(71, 'P008', '', '', '', 0, 0),
(72, 'P009', '', '', '', 0, 0),
(73, 'SB01', 'BYO', 'BULAWAYO', 'Bulawayo', 0, 0),
(74, 'SD01', 'CHARA', 'CHARANDURA', 'Charandura', 0, 0),
(75, 'SD02', 'GOKW', 'GOKWE', 'Gokwe', 0, 0),
(76, 'SD03', 'GWER', 'GWERU', 'Gweru', 0, 0),
(77, 'SD04', 'KWEK', 'KWEKWE', 'Gweru', 0, 0),
(78, 'SD05', 'MANO', 'MANOTI', 'Gokwe', 0, 0),
(79, 'SD06', 'MATA', 'MATAGA', 'Mataga', 0, 0),
(80, 'SD07', 'NEMBU', 'NEMBUDZIYA', 'Gokwe', 0, 0),
(81, 'SD08', 'TONGO', 'TONGOGARA', 'Shurugwi', 0, 0),
(82, 'SD09', 'ZHOM', 'ZHOMBE', 'Kwekwe', 0, 0),
(83, 'SD10', 'ZHISH', 'ZVISHAVANE', 'Zvishavane', 0, 0),
(84, 'SN01', 'BINGA', 'BINGA', 'Binga', 0, 0),
(85, 'SN02', 'HWAN', 'HWANGE', 'Hwange', 0, 0),
(86, 'SN03', 'LUPN', 'LUPANE', 'Lupane', 0, 0),
(87, 'SN04', 'LUSU', 'LUSULU', 'Lusulu', 0, 0),
(88, 'SN05', 'NKAY', 'NKAYI', 'Nkayi', 0, 0),
(89, 'SN06', 'TSHO', 'TSHOLOTSHO', 'Tsholotsho', 0, 0),
(90, 'SS01', 'BEIT', 'BEITBRIDGE', 'Beitbridge', 0, 0),
(91, 'SS02', 'FILA', 'FILABUSI', 'Filabusi', 0, 0),
(92, 'SS03', 'GWAN', 'GWANDA', 'Gwanda', 0, 0),
(93, 'SS04', 'MAPHI', 'MAPHISA', 'Maphisa', 0, 0),
(94, 'SS05', 'PLUM', 'PLUMTREE', 'Bulawayo', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `description`, `product_id`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 'Wilting', 'The plant is wilting ', 7, 'f4770329661b74534975488fdb980ef4.jpg', 1458205916, 1458205916),
(2, 'Stunted growth', 'Plant is not growing', 7, 'a2a6a9b7d57531ca2b84178e2ce5e15b.JPG', 1458282135, 1458282135),
(3, 'Black rot', 'Spores can overwinter in twigs or fruit remaining on the tree and spread during rainfall.\r\nPurple flecks or circular lesions which are brown in the centre and purple at margin; red flecks, purple lesions and/or brown black rings on fruit.', 1, '84fee1088e3884abcfe292841e465aa4.jpg', 1493381718, 1493381718),
(4, 'Cedar apple rust', 'Bright orange or yellow patches on top side of leaves surrounded by a red band and small black spots in the center. Fungus requires two hosts to complete lifecycle; forms galls on Eastern red cedar and spores are carried by wind to apple.', 1, '789316e7e75ff2af8a77fc9521060809.jpg', 1493382101, 1493382101),
(5, 'Common rust', 'Disease is spread by wind-borne spores; some of the most popularly grown sweet corn varieties have little or no resistance to the disease.  Oval or elongated cinnamon brown pustules on upper and lower surfaces of leaves.', 45, '00ed1cc7993e0aacf5e07fc3be61b48d.jpg', 1493382902, 1493382902),
(6, 'Downy Mildew Disease', 'Symptoms of all maize downy mildew pathogens are similar although may vary depends on cultivar, age and climate. The disease is both air and seed born. The pathogen have several alternative hosts. ', 45, '430525c5c130bab2e5dc1a1083a8d415.JPG', 1493383517, 1493383517),
(7, 'Powdery Mildew', 'Infected shoot tips curl and are covered with white sporulation. White sporulation can be removed with the fingers', 4, '92e2578a2e8eb127919d3d6ee4cb95df.jpg', 1500468885, 1500468885),
(8, 'Citrus black spot', 'Citrus black spot is a fungal disease marked by dark necrotic spots or blotches on the rinds of fruit. It produces early fruit drop, reduces crop yields and, if not controlled, renders the highly blemished fruit unmarketable.', 11, '2dc45f64a55c870d13b449f13931aecc.jpg', 1500534081, 1500534081),
(9, 'Septoria Leaf Spot', 'It forms spots on the leaves, which eventually turn yellow and die off, it also forms fruiting bodies that look like tiny filaments coming from the spots.', 74, '825596a8a2a3d42f79a13029c48db9f4.jpg', 1500543917, 1500543917),
(10, 'Early Blight', 'Tomato blight, in its different forms, is a disease that attacks a plant’s foliage, stems, and even fruit.\r\nAffected plants underproduce. Leaves may drop, leaving fruit open to sunscald.', 74, 'f5562e015bbf00f5970ce542ebe0cd57.jpg', 1500544456, 1500544456),
(11, 'Guava wilt', 'Wilting on the leaves that are located at branched tip in the upper canopy appear. Wilt and dried of all leaves occur just within 2 to 4 weeks and cause the tree to look scorched. The fruit development is detained and mummified on the tree.', 5, '914280cbfc94138f2ae18649c221e413.jpg', 1500557842, 1500557842),
(12, 'Anthracnose', 'This disease can cause considerable postharvest losses and can affect young developing flowers and fruit. It has been reported in all guava-growing areas around the world where high rainfall and humidity are present.', 5, 'edf54dd27e2372f73bbc766ed2338729.jpg', 1500644473, 1500644473),
(13, 'Base (butt) rot', ' A grey to black rot of the soft butt tissue develops, leaving stringy fibers and a cavity at the base of the stem. If affected material is planted, partial decay of the butt severely reduces plant growth.', 15, '13a8676ac45969f67357c03dc9a07038.jpg', 1500645862, 1500646040);

-- --------------------------------------------------------

--
-- Table structure for table `diseasesymptoms`
--

CREATE TABLE `diseasesymptoms` (
  `id` int(11) UNSIGNED NOT NULL,
  `disease_id` int(11) NOT NULL,
  `symptom_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diseasesymptoms`
--

INSERT INTO `diseasesymptoms` (`id`, `disease_id`, `symptom_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1458288208, 1458288208),
(2, 1, 4, 1458288558, 1458288558),
(3, 2, 3, 1458288572, 1458288572),
(4, 1, 3, 1458288584, 1458288584),
(5, 2, 2, 1458288607, 1458288607),
(7, 3, 5, 1493381813, 1493381813),
(8, 3, 6, 1493381821, 1493381821),
(9, 3, 1, 1493381841, 1493381841),
(10, 4, 4, 1493382221, 1493382221),
(11, 4, 7, 1493382249, 1493382249),
(12, 4, 9, 1493382296, 1493382296),
(13, 5, 4, 1493383092, 1493383092),
(14, 5, 10, 1493383102, 1493383102),
(15, 5, 11, 1493383110, 1493383110),
(16, 6, 12, 1493383780, 1493383780),
(17, 6, 13, 1493383793, 1493383793),
(19, 6, 14, 1493383805, 1493383805),
(20, 6, 15, 1500469040, 1500469040),
(21, 7, 16, 1500469052, 1500469052),
(22, 6, 17, 1500469063, 1500469063),
(23, 6, 18, 1500469074, 1500469074),
(24, 7, 18, 1500532748, 1500532748),
(25, 7, 17, 1500532832, 1500532832),
(26, 7, 15, 1500532892, 1500532892),
(27, 8, 19, 1500534101, 1500534101),
(28, 8, 20, 1500534306, 1500534306),
(29, 8, 22, 1500534321, 1500534321),
(30, 8, 23, 1500534337, 1500534337),
(31, 8, 24, 1500534346, 1500534346),
(32, 9, 25, 1500543993, 1500543993),
(33, 9, 26, 1500544005, 1500544005),
(34, 10, 27, 1500544770, 1500544770),
(35, 10, 28, 1500544780, 1500544780),
(36, 10, 29, 1500544789, 1500544789),
(37, 11, 1, 1500558240, 1500558240),
(38, 11, 2, 1500558252, 1500558252),
(39, 11, 3, 1500558265, 1500558265),
(40, 11, 3, 1500558265, 1500558265),
(41, 11, 4, 1500558279, 1500558279),
(42, 12, 5, 1500644582, 1500644582),
(43, 12, 30, 1500644593, 1500644593),
(44, 13, 31, 1500646242, 1500646242),
(45, 13, 19, 1500850678, 1500850678);

-- --------------------------------------------------------

--
-- Table structure for table `districts_list`
--

CREATE TABLE `districts_list` (
  `id` int(11) UNSIGNED NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts_list`
--

INSERT INTO `districts_list` (`id`, `province_id`, `name`) VALUES
(1, 4444, 'Bulawayo'),
(2, 4445, 'Harare'),
(3, 4446, 'Buhera'),
(4, 4446, 'Chimanimani'),
(5, 4446, 'Chipinge'),
(6, 4446, 'Makoni'),
(7, 4446, 'Mutare'),
(8, 4446, 'Mutasa'),
(9, 4446, 'Nyanga'),
(10, 4447, 'Bindura'),
(11, 4447, 'Guruve'),
(12, 4447, 'Mazowe'),
(13, 4447, 'Mbire'),
(14, 4447, 'Mukumbura'),
(15, 4447, 'Muzarabani'),
(16, 4447, 'Rushinga'),
(17, 4447, 'Shambva'),
(18, 4448, 'Chikomba'),
(19, 4448, 'Goromonzi'),
(20, 4448, 'Marondera'),
(21, 4448, 'Mudzi'),
(22, 4448, 'Murehwa'),
(23, 4448, 'Mutoko'),
(24, 4448, 'Seke'),
(25, 4448, 'Uzumba-Maramba-Pfungwe'),
(26, 4449, 'Chegutu'),
(27, 4449, 'Hurungwe'),
(28, 4449, 'Kadoma'),
(29, 4449, 'Kariba'),
(30, 4449, 'Makonde'),
(31, 4449, 'Zvimba'),
(32, 4450, 'Bikita'),
(33, 4450, 'Chiredzi'),
(34, 4450, 'Chivi'),
(35, 4450, 'Gutu'),
(36, 4450, 'Masvingo'),
(37, 4450, 'Mwenezi'),
(38, 4450, 'Zaka'),
(39, 4451, 'Binga'),
(40, 4451, 'Bubi'),
(41, 4451, 'Hwange'),
(42, 4451, 'Lupane'),
(43, 4451, 'Nkayi'),
(44, 4451, 'Tsholotsho'),
(45, 4451, 'Umguza'),
(46, 4452, 'Beitbridge'),
(47, 4452, 'Bulilimamangwe'),
(48, 4452, 'Gwanda'),
(49, 4452, 'Insiza'),
(50, 4452, 'Matobo'),
(51, 4452, 'Umzingwane'),
(52, 4453, 'Chirumanzu'),
(53, 4453, 'Gokwe North'),
(54, 4453, 'Gokwe South'),
(55, 4453, 'Gweru'),
(56, 4453, 'Kwekwe'),
(57, 4453, 'Mberengwa'),
(58, 4453, 'Shurugwi'),
(59, 4453, 'Zvishavane'),
(60, 4448, 'Hwedza'),
(61, 2471, 'Ancuabe'),
(62, 2471, 'Balama'),
(63, 2471, 'Chiúre'),
(64, 2471, 'Ibo'),
(65, 2471, 'Macomia'),
(66, 2471, 'Mecúfi'),
(67, 2471, 'Meluco'),
(68, 2471, 'Mocímboa da Praia'),
(69, 2471, 'Montepuez'),
(70, 2471, 'Mueda'),
(71, 2471, 'Muidumbe'),
(72, 2471, 'Namuno'),
(73, 2471, 'Nangade'),
(74, 2471, 'Palma'),
(75, 2471, 'Pemba-Metuge'),
(76, 2471, 'Quissanga'),
(77, 2472, 'Bilene Macia'),
(78, 2472, 'Chibuto'),
(79, 2472, 'Chicualacuala'),
(80, 2472, 'Chigubo'),
(81, 2472, 'Chókwè'),
(82, 2472, 'Guijá'),
(83, 2472, 'Mabalane'),
(84, 2472, 'Manjacaze'),
(85, 2472, 'Massangena'),
(86, 2472, 'Massingir'),
(87, 2472, 'Xai-Xai'),
(88, 2473, 'Funhalouro'),
(89, 2473, 'Govuro'),
(90, 2473, 'Homoine'),
(91, 2473, 'Inharrime'),
(92, 2473, 'Inhassoro'),
(93, 2473, 'Jangamo'),
(94, 2473, 'Mabote'),
(95, 2473, 'Massinga'),
(96, 2473, 'Morrumbene'),
(97, 2473, 'Panda'),
(98, 2473, 'Vilanculos'),
(99, 2473, 'Zavala'),
(100, 2474, 'Báruè'),
(101, 2474, 'Gondola'),
(102, 2474, 'Guro'),
(103, 2474, 'Machaze'),
(104, 2474, 'Macossa'),
(105, 2474, 'Manica'),
(106, 2474, 'Mossurize'),
(107, 2474, 'Sussundenga'),
(108, 2474, 'Tambara'),
(109, 4454, 'Maputo'),
(110, 2475, 'Boane'),
(111, 2475, 'Magude'),
(112, 2475, 'Manhiça'),
(113, 2475, 'Marracuene'),
(114, 2475, 'Matutuíne'),
(115, 2475, 'Moamba'),
(116, 2475, 'Namaacha'),
(117, 2476, 'Angoche'),
(118, 2476, 'Eráti'),
(119, 2476, 'Lalaua'),
(120, 2476, 'Malema'),
(121, 2476, 'Meconta'),
(122, 2476, 'Mecubúri'),
(123, 2476, 'Memba'),
(124, 2476, 'Mogincual'),
(125, 2476, 'Mogovolas'),
(126, 2476, 'Moma'),
(127, 2476, 'Monapo'),
(128, 2476, 'Mossuril'),
(129, 2476, 'Muecate'),
(130, 2476, 'Murrupula'),
(131, 2476, 'Nacala-a-Velha'),
(132, 2476, 'Nacarôa'),
(133, 2476, 'Nampula'),
(134, 2476, 'Ribáuè'),
(135, 2477, 'Cuamba'),
(136, 2477, 'Lago'),
(137, 2477, 'Lichinga'),
(138, 2477, 'Majune'),
(139, 2477, 'Mandimba'),
(140, 2477, 'Marrupa'),
(141, 2477, 'Maúa'),
(142, 2477, 'Mavagoago'),
(143, 2477, 'Mecanhelas'),
(144, 2477, 'Mecula'),
(145, 2477, 'Metarica'),
(146, 2477, 'Muembe'),
(147, 2477, 'N gauma'),
(148, 2477, 'Nipepe'),
(149, 2477, 'Sanga'),
(150, 2478, 'Buzi'),
(151, 2478, 'Caia'),
(152, 2478, 'Chemba'),
(153, 2478, 'Cheringoma'),
(154, 2478, 'Chibabava'),
(155, 2478, 'Dondo'),
(156, 2478, 'Gorongosa'),
(157, 2478, 'Marromeu'),
(158, 2478, 'Machanga'),
(159, 2478, 'Maringué'),
(160, 2478, 'Muanza'),
(161, 2478, 'Nhamatanda'),
(162, 2479, 'Angónia'),
(163, 2479, 'Cahora-Bassa'),
(164, 2479, 'Changara'),
(165, 2479, 'Chifunde'),
(166, 2479, 'Chiuta'),
(167, 2479, 'Macanga'),
(168, 2479, 'Magoé'),
(169, 2479, 'Marávia'),
(170, 2479, 'Moatize'),
(171, 2479, 'Mutarara'),
(172, 2479, 'Tsangano'),
(173, 2479, 'Zumbo'),
(174, 2480, 'Alto Molocue'),
(175, 2480, 'Chinde'),
(176, 2480, 'Gilé'),
(177, 2480, 'Gurué'),
(178, 2480, 'Ile'),
(179, 2480, 'Inhassunge'),
(180, 2480, 'Lugela'),
(181, 2480, 'Maganja da Costa'),
(182, 2480, 'Milange'),
(183, 2480, 'Mocuba'),
(184, 2480, 'Mopeia'),
(185, 2480, 'Morrumbala'),
(186, 2480, 'Namacurra'),
(187, 2480, 'Namarroi'),
(188, 2480, 'Nicoadala'),
(189, 2480, 'Pebane'),
(190, 1284, 'Adansi North'),
(191, 1284, 'Adansi South'),
(192, 1284, 'Afigya-Kwabre'),
(193, 1284, 'Ahafo Ano North'),
(194, 1284, 'Ahafo Ano South'),
(195, 1284, 'Amansie Central'),
(196, 1284, 'Amansie West'),
(197, 1284, 'Asante Akim Central Municipal'),
(198, 1284, 'Asante Akim North'),
(199, 1284, 'Asante Akim South'),
(200, 1284, 'Asokore Mampong Municipal'),
(201, 1284, 'Atwima Kwanwoma'),
(202, 1284, 'Atwima Mponua'),
(203, 1284, 'Atwima Nwabiagya'),
(204, 1284, 'Bekwai Municipal'),
(205, 1284, 'Bosome Freho'),
(206, 1284, 'Botsomtwe'),
(207, 1284, 'Ejisu-Juaben Municipal'),
(208, 1284, 'Ejura - Sekyedumase'),
(209, 1284, 'Kumasi Metropolitan'),
(210, 1284, 'Kumawu'),
(211, 1284, 'Kwabre East'),
(212, 1284, 'Mampong Municipal'),
(213, 1284, 'Obuasi Municipal'),
(214, 1284, 'Offinso North'),
(215, 1284, 'Offinso South Municipal'),
(216, 1284, 'Sekyere Afram Plains'),
(217, 1284, 'Sekyere Central'),
(218, 1284, 'Sekyere East'),
(219, 1284, 'Sekyere South'),
(220, 1285, 'Asunafo North Municipal'),
(221, 1285, 'Asunafo South'),
(222, 1285, 'Asutifi'),
(223, 1285, 'Asutifi South'),
(224, 1285, 'Atebubu-Amantin'),
(225, 1285, 'Banda'),
(226, 1285, 'Berekum Municipal'),
(227, 1285, 'Dormaa East'),
(228, 1285, 'Dormaa Municipal'),
(229, 1285, 'Dormaa West'),
(230, 1285, 'Jaman North'),
(231, 1285, 'Jaman South'),
(232, 1285, 'Kintampo North Municipal'),
(233, 1285, 'Kintampo South'),
(234, 1285, 'Nkoranza North'),
(235, 1285, 'Nkoranza South Municipal'),
(236, 1285, 'Pru'),
(237, 1285, 'Sene'),
(238, 1285, 'Sene West'),
(239, 1285, 'Sunyani Municipal'),
(240, 1285, 'Sunyani West'),
(241, 1285, 'Tain'),
(242, 1285, 'Tano North'),
(243, 1285, 'Tano South'),
(244, 1285, 'Techiman Municipal'),
(245, 1285, 'Techiman North'),
(246, 1285, 'Wenchi Municipal'),
(247, 1286, 'Abura/Asebu/Kwamankese'),
(248, 1286, 'Agona East'),
(249, 1286, 'Agona West Municipal'),
(250, 1286, 'Ajumako/Enyan/Essiam'),
(251, 1286, 'Asikuma/Odoben/Brakwa'),
(252, 1286, 'Assin North Municipal'),
(253, 1286, 'Assin South'),
(254, 1286, 'Awutu-Senya'),
(255, 1286, 'Awutu Senya East'),
(256, 1286, 'Cape Coast Metropolitan'),
(257, 1286, 'Effutu Municipal'),
(258, 1286, 'Ekumfi'),
(259, 1286, 'Gomoa East'),
(260, 1286, 'Gomoa West'),
(261, 1286, 'Komenda/Edina/Eguafo/Abirem Municipal'),
(262, 1286, 'Mfantsiman Municipal'),
(263, 1286, 'Twifo-Ati Mokwa'),
(264, 1286, 'Twifo/Heman/Lower Denkyira'),
(265, 1286, 'Upper Denkyira East Municipal'),
(266, 1286, 'Upper Denkyira West'),
(267, 1287, 'Akuapim South'),
(268, 1287, 'Akuapim North'),
(269, 1287, 'Akyemansa'),
(270, 1287, 'Asuogyaman'),
(271, 1287, 'Ayensuano'),
(272, 1287, 'Atiwa'),
(273, 1287, 'Birim Central Municipal'),
(274, 1287, 'Birim North'),
(275, 1287, 'Birim South'),
(276, 1287, 'Denkyembour'),
(277, 1287, 'East Akim Municipal'),
(278, 1287, 'Fanteakwa'),
(279, 1287, 'Kwaebibirem'),
(280, 1287, 'Kwahu Afram Plains North'),
(281, 1287, 'Kwahu Afram Plains South'),
(282, 1287, 'Kwahu East'),
(283, 1287, 'Kwahu South'),
(284, 1287, 'Kwahu West Municipal'),
(285, 1287, 'Lower Manya Krobo'),
(286, 1287, 'New-Juaben Municipal'),
(287, 1287, 'Nsawam Adoagyire Municipal'),
(288, 1287, 'Suhum Municipal'),
(289, 1287, 'Upper Manya Krobo'),
(290, 1287, 'Upper West Akim'),
(291, 1287, 'West Akim Municipal'),
(292, 1287, 'Yilo Krobo Municipal'),
(293, 1288, 'Accra Metropolitan'),
(294, 1288, 'Ada West'),
(295, 1288, 'Adenta Municipal'),
(296, 1288, 'Ashaiman Municipal'),
(297, 1288, 'Ada East'),
(298, 1288, 'Ga Central'),
(299, 1288, 'Ga East Municipal'),
(300, 1288, 'Ga South Municipal'),
(301, 1288, 'Ga West Municipal'),
(302, 1288, 'Kpone Katamanso'),
(303, 1288, 'La Dade Kotopon Municipal'),
(304, 1288, 'La Nkwantanang Madina'),
(305, 1288, 'Ledzokuku-Krowor Municipal'),
(306, 1288, 'Ningo Prampram'),
(307, 1288, 'Shai Osudoku'),
(308, 1288, 'Tema Metropolitan'),
(309, 1289, 'Bole'),
(310, 1289, 'Bunkpurugu-Yunyoo'),
(311, 1289, 'Central Gonja'),
(312, 1289, 'Chereponi'),
(313, 1289, 'East Gonja'),
(314, 1289, 'East Mamprusi'),
(315, 1289, 'Gushegu'),
(316, 1289, 'Karaga'),
(317, 1289, 'Kpandai'),
(318, 1289, 'Kumbungu'),
(319, 1289, 'Mamprugo Moaduri'),
(320, 1289, 'Mion'),
(321, 1289, 'Nanumba North'),
(322, 1289, 'Nanumba South'),
(323, 1289, 'North Gonja'),
(324, 1289, 'Saboba'),
(325, 1289, 'Sagnarigu'),
(326, 1289, 'Savelugu-Nanton'),
(327, 1289, 'Sawla-Tuna-Kalba'),
(328, 1289, 'Tamale Metropolitan'),
(329, 1289, 'Tatale Sangule'),
(330, 1289, 'Tolon'),
(331, 1289, 'West Gonja'),
(332, 1289, 'West Mamprusi'),
(333, 1289, 'Yendi Municipal'),
(334, 1289, 'Zabzugu'),
(335, 1290, 'Bawku Municipal'),
(336, 1290, 'Bawku West'),
(337, 1290, 'Binduri'),
(338, 1290, 'Bolgatanga Municipal'),
(339, 1290, 'Bongo'),
(340, 1290, 'Builsa'),
(341, 1290, 'Builsa South'),
(342, 1290, 'Garu-Tempane'),
(343, 1290, 'Kassena Nankana East'),
(344, 1290, 'Kassena Nankana West'),
(345, 1290, 'Nabdam'),
(346, 1290, 'Pusiga'),
(347, 1290, 'Talensi'),
(348, 1291, 'Daffiama Bussie Issa'),
(349, 1291, 'Jirapa'),
(350, 1291, 'Lambussie Karni'),
(351, 1291, 'Lawra'),
(352, 1291, 'Nadowli'),
(353, 1291, 'Nandom'),
(354, 1291, 'Sissala East'),
(355, 1291, 'Sissala West'),
(356, 1291, 'Wa East'),
(357, 1291, 'Wa Municipal'),
(358, 1291, 'Wa West'),
(359, 1292, 'Adaklu'),
(360, 1292, 'Afadjato South'),
(361, 1292, 'Agotime Ziope'),
(362, 1292, 'Akatsi North'),
(363, 1292, 'Akatsi South'),
(364, 1292, 'Biakoye'),
(365, 1292, 'Central Tongu'),
(366, 1292, 'Ho Municipal'),
(367, 1292, 'Ho West'),
(368, 1292, 'Hohoe Municipal'),
(369, 1292, 'Jasikan'),
(370, 1292, 'Kadjebi'),
(371, 1292, 'Keta Municipal'),
(372, 1292, 'Ketu North'),
(373, 1292, 'Ketu South Municipal'),
(374, 1292, 'Kpando Municipal'),
(375, 1292, 'Krachi East'),
(376, 1292, 'Krachi Nchumuru'),
(377, 1292, 'Krachi West'),
(378, 1292, 'Nkwanta North'),
(379, 1292, 'Nkwanta South'),
(380, 1292, 'North Dayi'),
(381, 1292, 'North Tongu'),
(382, 1292, 'South Dayi'),
(383, 1292, 'South Tongu'),
(384, 1293, 'Ahanta West'),
(385, 1293, 'Aowin/Suaman'),
(386, 1293, 'Bia'),
(387, 1293, 'Bia East'),
(388, 1293, 'Bibiani/Anhwiaso/Bekwai'),
(389, 1293, 'Bodi'),
(390, 1293, 'Ellembele'),
(391, 1293, 'Jomoro'),
(392, 1293, 'Juabeso'),
(393, 1293, 'Mpohor'),
(394, 1293, 'Mpohor/Wassa East'),
(395, 1293, 'Nzema East Municipal'),
(396, 1293, 'Prestea-Huni Valley'),
(397, 1293, 'Sefwi Akontombra'),
(398, 1293, 'Sefwi-Wiawso'),
(399, 1293, 'Sekondi Takoradi Metropolitan Assembly'),
(400, 1293, 'Shama'),
(401, 1293, 'Suaman'),
(402, 1293, 'Tarkwa-Nsuaem Municipal'),
(403, 1293, 'Wasa Amenfi East'),
(404, 1293, 'Wasa Amenfi West'),
(405, 1293, 'Wassa Amenfi Central');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `saved_as` varchar(255) NOT NULL,
  `actual_name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `description`, `saved_as`, `actual_name`, `created_at`, `updated_at`) VALUES
(10, 2, 'Certifcate', 'c01413e1a9c7eb1447100738492b39f6.pdf', 'Certficate.pdf', 1455773936, 1455773936),
(11, 22, 'Test doc', '7f919624bc7d6d84e74ecb0197136a44.txt', 'test.txt', 1455776455, 1455776455),
(12, 23, 'CR14', '78e94bf8e23ed146fd11c4945f7df130.pdf', 'Certficate.pdf', 1455785047, 1455785047),
(13, 2, 'My production budget', 'dcedb59a2797f50d4d772fb110f0647f.pdf', 'production.pdf', 1463473099, 1463473099),
(14, 26, 'Take a look\r\nat my curriculum CV.\r\nIt will make you salivate!', '0eb7186f8329abbc87e3ad1ad8b75a54.pdf', 'production.pdf', 1463474638, 1463474638),
(16, 9, 'AGRICULTURAL_FINANCE_ACT_18_02', 'fd4b0a26ec40efd0718bc0f012b9e453.pdf', 'AGRICULTURAL_FINANCE_ACT_18_02.pdf', 1471505052, 1471505052),
(17, 9, 'AGRICULTURAL_MARKETING_AUTHORITY_ACT_18_04', '4d28e68b6e28ecd693a5c74fd5840df1.pdf', 'AGRICULTURAL_MARKETING_AUTHORITY_ACT_18_04.pdf', 1471505069, 1471505069),
(18, 9, 'AGRICULTURAL_PRODUCTS_MARKETING_ACT_18_22', '8fb09fc654d1d4760998229f47595a30.pdf', 'AGRICULTURAL_PRODUCTS_MARKETING_ACT_18_22.pdf', 1471505084, 1471505084),
(19, 9, 'GRAIN_MARKETING_ACT_18_14', '6b951bdc72a57c74f1d410c966a0c3b3.pdf', 'GRAIN_MARKETING_ACT_18_14.pdf', 1471505100, 1471505100),
(20, 53, 'test', '68f2bdf9d41d51e0b5b8d5cdd88a758d.pdf', 'AndARMarker.pdf', 1475146825, 1475146825),
(21, 2, 'Life cycle of crops.', 'cfa709a4d7c2f9f0fb7049dae436d76b.docx', 'Workflow.docx', 1493386686, 1493386686),
(22, 57, 'optimization of appicatios', '7567aa30456e54b0dda5f2b30e176153.pdf', 'Seo-2017-Search-Engine-.pdf', 1493387056, 1493387056),
(23, 2, 'test pdf', '3de74d2b2ea9aa2dbe5eb64c81bb48ec.pdf', 'test.pdf', 1582477569, 1582477569);

-- --------------------------------------------------------

--
-- Table structure for table `dropdowns`
--

CREATE TABLE `dropdowns` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `mainmenu_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dropdowns`
--

INSERT INTO `dropdowns` (`id`, `name`, `url`, `mainmenu_id`, `created_at`, `updated_at`, `position`, `visible`) VALUES
(2, 'Structure', 'structure/index', 6, 1449050516, 1450706995, 1, 1),
(3, 'Organisation', 'group/index', 6, 1449050553, 1450706995, 5, 1),
(4, 'Roles', 'role/index', 6, 1449050600, 1450878862, 0, 1),
(5, 'Role Permission', 'permission/index', 6, 1449050638, 1450878879, 3, 1),
(6, 'Menu Items', 'mainmenu/index', 6, 1449051642, 1450878890, 2, 1),
(7, 'Users', 'user/index', 6, 1449138659, 1450878899, 4, 1),
(9, 'Market', 'market/index', 6, 1450879189, 1450879189, 0, 1),
(10, 'Measurement', 'measurement/index', 6, 1450879233, 1468997987, 0, 1),
(11, 'Product', 'product/index', 6, 1450879259, 1450879259, 0, 1),
(12, 'Product Type', 'producttype/index', 6, 1450879342, 1450879342, 0, 1),
(13, 'Budgets', 'budget/viewindex', 7, 1458636826, 1458636826, 0, 1),
(14, 'Diseases', 'disease/search', 7, 1458636885, 1458636885, 0, 1),
(21, 'Create new disease', 'disease/create', 7, 1464946260, 1464946260, 0, 1),
(22, 'Disease symptoms', 'diseasesymptom', 6, 1464946605, 1464946605, 0, 1),
(23, 'Manage disease symptoms', 'diseasesymptom', 7, 1464946691, 1464946691, 0, 1),
(24, 'Apply for Contract', 'contractapplication/create', 7, 1468830780, 1468830780, 0, 1),
(25, 'View My Contract Applications', 'contractapplication/index_mine', 7, 1468835663, 1468997941, 0, 1),
(26, 'Create Farmer', 'farmer/register', 13, 1468916647, 1539865968, 0, 1),
(30, 'My Contracts History', 'contract/index_mine', 7, 1468999600, 1471430386, 0, 1),
(31, 'Add Farm', 'farm/create', 13, 1469096961, 1531490576, 0, 1),
(33, 'Buy Agricultural Produce', 'productoffer', 15, 1469434344, 1540981884, 0, 0),
(34, 'Sell Agricultural Produce', 'productoffer/index_mine', 15, 1469434357, 1540981904, 0, 0),
(35, 'My profile', 'user/edit', 16, 1469435235, 1474363341, 0, 1),
(36, 'My documents', 'document/index', 16, 1469435257, 1473257994, 1, 1),
(39, 'My skills', 'labor/indexmine', 16, 1469436239, 1473257994, 2, 1),
(45, 'Stop Order Create', 'stoporder/create', 18, 1471426565, 1539852556, 0, 1),
(46, 'Stop Order List', 'stoporder', 18, 1471426584, 1540977553, 0, 1),
(50, 'Company Users', 'user/companyUsers', 16, 1473168309, 1473257994, 3, 1),
(51, 'Edit profile', 'user/edit', 16, 1473664876, 1474626404, 0, 1),
(52, 'My farms', 'farm/indexmine', 16, 1473926003, 1474626380, 0, 1),
(66, 'Buy Raw Materials', 'rawmaterial/offer', 15, 1495088207, 1540981913, 0, 0),
(67, 'Sell Raw Materials', 'rawmaterial/offer/index_mine', 15, 1495088268, 1540981932, 0, 0),
(73, 'Activate users', 'user/farmers', 6, 1503317284, 1503317284, 0, 1),
(74, 'Available grades', 'grades', 20, 1532676818, 1532676818, 0, 1),
(75, 'Available grains', 'grains', 20, 1532676859, 1532676859, 0, 1),
(76, 'Grain receipts', 'grainreceipts', 20, 1532676875, 1532676875, 0, 1),
(77, 'Stop Order Facilities', 'stopcode', 18, 1540977473, 1540977497, 0, 1),
(78, 'Farmer List', 'user_profile/', 13, 1540981275, 1540981275, 0, 1),
(79, 'Farm List', 'farm/', 13, 1542105934, 1542105934, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `farmguides`
--

CREATE TABLE `farmguides` (
  `id` int(11) UNSIGNED NOT NULL,
  `activity_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farmguides`
--

INSERT INTO `farmguides` (`id`, `activity_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Run plough through field', 1454678087, 1454678087),
(4, 2, 'Drop seeds', 1454680794, 1454680794),
(5, 3, 'Water the plants on daily basis.', 1454766422, 1454918528),
(6, 5, 'Water every three days', 1454766536, 1454766536),
(7, 4, 'Clean up all  available Silos', 1454766751, 1454862789),
(8, 6, 'Run Harvester through field', 1455785719, 1455785719),
(9, 5, 'You should weed your plants every 4 weeks', 1466591940, 1466591940);

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `arable_size` double NOT NULL,
  `soil` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `units` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `user_id`, `name`, `type`, `arable_size`, `soil`, `size`, `units`, `product_id`, `address_id`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(2, 83, 'murehwa', '', 0, '', 30, 'Acres', 0, 512, '-17', '30', 1542111446, 1542111446);

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `id` int(11) NOT NULL,
  `iso` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`id`, `iso`, `country`, `code`) VALUES
(213, 'AL', 'Albania', '355\r'),
(214, 'DZ', 'Algeria', '213\r'),
(215, 'AD', 'Andorra', '376\r'),
(216, 'AO', 'Angola', '244\r'),
(217, 'AI', 'Anguilla', '1264\r'),
(218, 'AG', 'Antigua an', '1268\r'),
(219, 'AR', 'Argentina', '54\r'),
(220, 'AM', 'Armenia', '374\r'),
(221, 'AW', 'Aruba', '297\r'),
(222, 'AU', 'Australia', '61\r'),
(223, 'AT', 'Austria', '43\r'),
(224, 'AZ', 'Azerbaijan', '994\r'),
(225, 'BS', 'Bahamas', '1242\r'),
(226, 'BH', 'Bahrain', '973\r'),
(227, 'BD', 'Bangladesh', '880\r'),
(228, 'BB', 'Barbados', '1246\r'),
(229, 'BY', 'Belarus', '375\r'),
(230, 'BE', 'Belgium', '32\r'),
(231, 'BZ', 'Belize', '501\r'),
(232, 'BJ', 'Benin', '229\r'),
(233, 'BM', 'Bermuda', '1441\r'),
(234, 'BT', 'Bhutan', '975\r'),
(235, 'BO', 'Bolivia', '591\r'),
(236, 'BA', 'Bosnia and', '387\r'),
(237, 'BW', 'Botswana', '267\r'),
(238, 'BR', 'Brazil', '55\r'),
(239, 'BN', 'Brunei', '673\r'),
(240, 'BG', 'Bulgaria', '359\r'),
(241, 'BF', 'Burkina Fa', '226\r'),
(242, 'BI', 'Burundi', '257\r'),
(243, 'KH', 'Cambodia', '855\r'),
(244, 'CM', 'Cameroon', '237\r'),
(245, 'CA', 'Canada', '1\r'),
(246, 'CV', 'Cape Verde', '238\r'),
(247, 'KY', 'Cayman Isl', '1345\r'),
(248, 'CF', 'Central Af', '236\r'),
(249, 'TD', 'Chad', '235\r'),
(250, 'CL', 'Chile', '56\r'),
(251, 'CN', 'China', '86\r'),
(252, 'CO', 'Colombia', '57\r'),
(253, 'KM', 'Comoros', '269\r'),
(254, 'CK', 'Cook Islan', '682\r'),
(255, 'CR', 'Costa Rica', '506\r'),
(256, 'HR', 'Croatia', '385\r'),
(257, 'CU', 'Cuba', '53\r'),
(258, 'CY', 'Cyprus', '357\r'),
(259, 'CZ', 'Czech Repu', '420\r'),
(260, 'CD', 'Democratic', '243\r'),
(261, 'DK', 'Denmark', '45\r'),
(262, 'DJ', 'Djibouti', '253\r'),
(263, 'DM', 'Dominica', '1767\r'),
(264, 'DO', 'Dominican ', '1809\r'),
(265, 'TL', 'East Timor', '670\r'),
(266, 'EC', 'Ecuador', '593\r'),
(267, 'EG', 'Egypt', '20\r'),
(268, 'SV', 'El Salvado', '503\r'),
(269, 'GQ', 'Equatorial', '240\r'),
(270, 'EE', 'Estonia', '372\r'),
(271, 'ET', 'Ethiopia', '251\r'),
(272, 'FO', 'Faroe Isla', '298\r'),
(273, 'FJ', 'Fiji', '679\r'),
(274, 'FI', 'Finland', '358\r'),
(275, 'FR', 'France', '33\r'),
(276, 'GF', 'French Gui', '594\r'),
(277, 'PF', 'French Pol', '689\r'),
(278, 'GA', 'Gabon', '241\r'),
(279, 'GM', 'Gambia', '220\r'),
(280, 'GE', 'Georgia', '995\r'),
(281, 'DE', 'Germany', '49\r'),
(282, 'GH', 'Ghana', '233\r'),
(283, 'GI', 'Gibraltar', '350\r'),
(284, 'GR', 'Greece', '30\r'),
(285, 'GL', 'Greenland', '299\r'),
(286, 'GD', 'Grenada', '1473\r'),
(287, 'GP', 'Guadeloupe', '590\r'),
(288, 'GU', 'Guam', '1671\r'),
(289, 'GT', 'Guatemala', '502\r'),
(290, 'GN', 'Guinea', '224\r'),
(291, 'GW', 'Guinea-Bis', '245\r'),
(292, 'GY', 'Guyana', '592\r'),
(293, 'HT', 'Haiti', '509\r'),
(294, 'HN', 'Honduras', '504\r'),
(295, 'HK', 'Hong Kong', '852\r'),
(296, 'HU', 'Hungary', '36\r'),
(297, 'IS', 'Iceland', '354\r'),
(298, 'IN', 'India', '91\r'),
(299, 'ID', 'Indonesia', '62\r'),
(300, 'IR', 'Iran', '98\r'),
(301, 'IQ', 'Iraq', '964\r'),
(302, 'IE', 'Ireland', '353\r'),
(303, 'IL', 'Israel', '972\r'),
(304, 'IT', 'Italy', '39\r'),
(305, 'CI', 'Ivory Coas', '225\r'),
(306, 'JM', 'Jamaica', '1876\r'),
(307, 'JP', 'Japan', '81\r'),
(308, 'JO', 'Jordan', '962\r'),
(309, 'KZ', 'Kazakhstan', '7\r'),
(310, 'KE', 'Kenya', '254\r'),
(311, 'KI', 'Kiribati', '686\r'),
(312, 'KW', 'Kuwait', '965\r'),
(313, 'KG', 'Kyrgyzstan', '996\r'),
(314, 'LA', 'Laos', '856\r'),
(315, 'LV', 'Latvia', '371\r'),
(316, 'LB', 'Lebanon', '961\r'),
(317, 'LS', 'Lesotho', '266\r'),
(318, 'LR', 'Liberia', '231\r'),
(319, 'LY', 'Libya', '218\r'),
(320, 'LI', 'Liechtenst', '423\r'),
(321, 'LT', 'Lithuania', '370\r'),
(322, 'LU', 'Luxembourg', '352\r'),
(323, 'MO', 'Macau', '853\r'),
(324, 'MK', 'Macedonia', '389\r'),
(325, 'MG', 'Madagascar', '261\r'),
(326, 'MW', 'Malawi', '265\r'),
(327, 'MY', 'Malaysia', '60\r'),
(328, 'MV', 'Maldives', '960\r'),
(329, 'ML', 'Mali', '223\r'),
(330, 'MT', 'Malta', '356\r'),
(331, 'MQ', 'Martinique', '596\r'),
(332, 'MR', 'Mauritania', '222\r'),
(333, 'MU', 'Mauritius', '230\r'),
(334, 'YT', 'Mayotte', '269\r'),
(335, 'MX', 'Mexico', '52\r'),
(336, 'MD', 'Moldova', '373\r'),
(337, 'MC', 'Monaco', '377\r'),
(338, 'MN', 'Mongolia', '976\r'),
(339, 'ME', 'Montenegro', '382\r'),
(340, 'MS', 'Montserrat', '1664\r'),
(341, 'MA', 'Morocco', '212\r'),
(342, 'MZ', 'Mozambique', '258\r'),
(343, 'MM', 'Myanmar', '95\r'),
(344, 'NA', 'Namibia', '264\r'),
(345, 'NP', 'Nepal', '977\r'),
(346, 'NL', 'Netherland', '31\r'),
(347, 'AN', 'Netherland', '599\r'),
(348, 'NC', 'New Caledo', '687\r'),
(349, 'NZ', 'New Zealan', '64\r'),
(350, 'NI', 'Nicaragua', '505\r'),
(351, 'NE', 'Niger', '227\r'),
(352, 'NG', 'Nigeria', '234\r'),
(353, 'NO', 'Norway', '47\r'),
(354, 'OM', 'Oman', '968\r'),
(355, 'PK', 'Pakistan', '92\r'),
(356, 'PW', 'Palau', '680\r'),
(357, 'PS', 'Palestinia', '970\r'),
(358, 'PA', 'Panama', '507\r'),
(359, 'PG', 'Papua New ', '675\r'),
(360, 'PY', 'Paraguay', '595\r'),
(361, 'PE', 'Peru', '51\r'),
(362, 'PH', 'Philippine', '63\r'),
(363, 'PL', 'Poland', '48\r'),
(364, 'PT', 'Portugal', '351\r'),
(365, 'PR', 'Puerto Ric', '1787\r'),
(366, 'QA', 'Qatar', '974\r'),
(367, 'CG', 'Republic O', '242\r'),
(368, 'RO', 'Romania', '40\r'),
(369, 'RU', 'Russia', '7\r'),
(370, 'RW', 'Rwanda', '250\r'),
(371, 'RE', 'Réunion Is', '262\r'),
(372, 'KN', 'Saint Kitt', '1869\r'),
(373, 'LC', 'Saint Luci', '1758\r'),
(374, 'VC', 'Saint Vinc', '1784\r'),
(375, 'WS', 'Samoa', '685\r'),
(376, 'ST', 'Sao Tome a', '239\r'),
(377, 'SA', 'Saudi Arab', '966\r'),
(378, 'SN', 'Senegal', '221\r'),
(379, 'RS', 'Serbia', '381\r'),
(380, 'SC', 'Seychelles', '248\r'),
(381, 'SL', 'Sierra Leo', '232\r'),
(382, 'SG', 'Singapore', '65\r'),
(383, 'SK', 'Slovakia', '421\r'),
(384, 'SI', 'Slovenia', '386\r'),
(385, 'SB', 'Solomon Is', '677\r'),
(386, 'SO', 'Somalia', '252\r'),
(387, 'ZA', 'South Afri', '27\r'),
(388, 'KR', 'South Kore', '82\r'),
(389, 'SS', 'South Suda', '211\r'),
(390, 'ES', 'Spain', '34\r'),
(391, 'LK', 'Sri Lanka', '94\r'),
(392, 'SD', 'Sudan', '249\r'),
(393, 'SR', 'Suriname', '597\r'),
(394, 'SZ', 'Swaziland', '268\r'),
(395, 'SE', 'Sweden', '46\r'),
(396, 'CH', 'Switzerlan', '41\r'),
(397, 'SY', 'Syria', '963\r'),
(398, 'TW', 'Taiwan', '886\r'),
(399, 'TJ', 'Tajikistan', '992\r'),
(400, 'TZ', 'Tanzania', '255\r'),
(401, 'TH', 'Thailand', '66\r'),
(402, 'TG', 'Togo', '228\r'),
(403, 'TO', 'Tonga', '676\r'),
(404, 'TT', 'Trinidad a', '1868\r'),
(405, 'TN', 'Tunisia', '216\r'),
(406, 'TR', 'Turkey', '90\r'),
(407, 'TM', 'Turkmenist', '993\r'),
(408, 'TC', 'Turks and ', '1649\r'),
(409, 'UG', 'Uganda', '256\r'),
(410, 'UA', 'Ukraine', '380\r'),
(411, 'AE', 'United Ara', '971\r'),
(412, 'GB', 'United Kin', '44\r'),
(413, 'US', 'United Sta', '1\r'),
(414, 'UY', 'Uruguay', '598\r'),
(415, 'UZ', 'Uzbekistan', '998\r'),
(416, 'VU', 'Vanuatu', '678\r'),
(417, 'VE', 'Venezuela', '58\r'),
(418, 'VN', 'Vietnam', '84\r'),
(419, 'VG', 'Virgin Isl', '1340\r'),
(420, 'VI', 'Virgin Isl', '1284\r'),
(421, 'YE', 'Yemen', '967\r'),
(422, 'ZM', 'Zambia', '260\r'),
(423, 'ZW', 'Zimbabwe', '263\r');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'A', 'Grade A', 1532675475, 1532675475),
(2, 'D', 'Grade D', 1532675481, 1532675481),
(3, 'B', 'Grade B', 1532675488, 1532675488),
(4, 'C', 'Grade C', 1532675497, 1532675497),
(5, 'E', 'Grade E', 1532675504, 1532675504);

-- --------------------------------------------------------

--
-- Table structure for table `gradingcriterias`
--

CREATE TABLE `gradingcriterias` (
  `id` int(11) UNSIGNED NOT NULL,
  `crit_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gradingcriterias`
--

INSERT INTO `gradingcriterias` (`id`, `crit_name`, `short_name`, `created_at`, `updated_at`) VALUES
(1, 'Foreign matter, % m/m', 'foreign', 1532677965, 1532677965),
(2, 'Inorganic matter, % m/m', 'inorganic', 1532677975, 1532677975),
(3, 'Broken grains, % m/m', 'broken', 1532677983, 1532677983),
(4, 'Pest damaged grains, % m/m', 'pestdamaged', 1532677996, 1532677996),
(5, 'Rotten & Diseased grains, % m/m ', 'rotten', 1532678004, 1532678004),
(6, 'Discoloured grains, % m/m ', 'discolored', 1532678017, 1532678017),
(7, 'Moisture, % m/m', 'moisture', 1532678025, 1532678025),
(8, 'Immature/Shrivelled grains, % m/m', 'immature', 1532678043, 1532678043),
(9, 'Filth, % m/m', 'filth', 1532678060, 1532678060);

-- --------------------------------------------------------

--
-- Table structure for table `gradings`
--

CREATE TABLE `gradings` (
  `id` int(11) UNSIGNED NOT NULL,
  `inspection_lot` varchar(255) NOT NULL,
  `material_id` int(11) NOT NULL,
  `quality_score` int(11) NOT NULL,
  `valuation_code` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `plant` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `vendor_number` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grainreceipts`
--

CREATE TABLE `grainreceipts` (
  `id` int(11) UNSIGNED NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `grain_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `received_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grainreceipts`
--

INSERT INTO `grainreceipts` (`id`, `farmer_id`, `grain_id`, `qty`, `grade_id`, `value`, `received_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2000', 3, '150000', 5, 1532676022, 1532676022),
(2, 1, 1, '10000', 1, '12500.20', 5, 1532676041, 1532676041),
(3, 1, 1, '2000', 3, '250000', 2, 1532682590, 1532682590),
(4, 1, 1, '2000', 3, '250000', 2, 1532682675, 1532682675),
(5, 1, 2, '120', 3, '23500', 2, 1532682759, 1532682759),
(6, 1, 3, '2000', 4, '25000', 2, 1532683084, 1532683084);

-- --------------------------------------------------------

--
-- Table structure for table `grainreceiptsdata`
--

CREATE TABLE `grainreceiptsdata` (
  `id` int(11) UNSIGNED NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grainreceiptsdata`
--

INSERT INTO `grainreceiptsdata` (`id`, `receipt_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'moisture', '0.12', NULL, NULL),
(2, 1, 'foreign', '2.5', NULL, NULL),
(3, 4, '1', '0.12', 1532682675, NULL),
(4, 4, '1', '1.3', 1532682675, NULL),
(5, 4, '1', '5.6', 1532682675, NULL),
(6, 4, '1', '7.6', 1532682675, NULL),
(7, 4, '1', '5.6', 1532682675, NULL),
(8, 4, '1', '0.02', 1532682675, NULL),
(9, 4, '1', '0.05', 1532682675, NULL),
(10, 4, '1', '2', 1532682675, NULL),
(11, 5, 'foreign', '8', 1532682760, NULL),
(12, 5, 'inorganic', '9', 1532682760, NULL),
(13, 5, 'broken', '10', 1532682760, NULL),
(14, 5, 'pestdamaged', '11', 1532682760, NULL),
(15, 5, 'discolored', '19', 1532682760, NULL),
(16, 6, 'foreign', '0.12', 1532683084, NULL),
(17, 6, 'broken', '15', 1532683085, NULL),
(18, 6, 'discolored', '44', 1532683085, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grains`
--

CREATE TABLE `grains` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grains`
--

INSERT INTO `grains` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Maize', 'Maize', 1532675566, 1532675566),
(2, 'Sorghum', 'Sorghum', 1532675574, 1532675574),
(3, 'Rapoko', 'Rapoko', 1532675582, 1532675582),
(4, 'Millet', 'Millet', 1532675588, 1532675588),
(5, 'Barley', 'Barley for beer manufacture', 1532675603, 1532675603),
(6, 'Hops', 'Hops for lager beer', 1532675614, 1532675614);

-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

CREATE TABLE `inputs` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `cost_per_unit` mediumtext NOT NULL,
  `quantity` mediumtext NOT NULL,
  `total_cost` mediumtext NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inputs`
--

INSERT INTO `inputs` (`id`, `name`, `activity_id`, `unit`, `cost_per_unit`, `quantity`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 'Seed', 2, 'Acre', '1.40', '23.00', '32.20', 1454662711, 1454918390),
(2, 'Hoes', 2, 'Square Kilometer', '2.00', '25.00', '50.00', 1454865495, 1455014472),
(3, 'Fertilizer', 2, 'Square Kilometer', '3.50', '20.00', '70.00', 1455012146, 1455012146),
(4, 'Combine Harvester', 6, 'Acre', '2.00', '12.00', '24.00', 1455785696, 1455785696);

-- --------------------------------------------------------

--
-- Table structure for table `labors`
--

CREATE TABLE `labors` (
  `id` int(11) UNSIGNED NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `rate` double NOT NULL,
  `rate_time` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `laborer_id` int(11) NOT NULL,
  `saved_as` varchar(255) NOT NULL,
  `actual_name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labors`
--

INSERT INTO `labors` (`id`, `skill_name`, `rate`, `rate_time`, `description`, `laborer_id`, `saved_as`, `actual_name`, `created_at`, `updated_at`) VALUES
(6, 'Electrician', 4, '1', 'Wiring ', 2, 'da290a154a21a12961214837b27dc0f8.pdf', 'Curriculum Vitae for Sithole Svodesai.pdf', 1451831012, 1451831012),
(11, 'Carpenter', 3, '2', 'Repairs', 2, '5e2fe77458d44d10a1413ba1b750ec61.txt', 'testsmartfarmer.txt', 1454503017, 1454503017),
(12, 'Unskilled Laborer', 5, '2', 'All jobs', 2, '562421755192c500beb5f6ea34f03d4b.pdf', 'Curriculum Vitae for Sithole Svodesai.pdf', 1454503214, 1454503214),
(13, 'Planting', 23, '2', 'Planting seeds', 2, 'af996f505ec7d8ac6d071d1f1a55cb13.txt', 'testsmart.txt', 1454523715, 1454523715),
(14, 'Capentry', 4, '2', 'Repairing wooden items.', 10, 'cafb8779f6560115ea7410310faf3d72.doc', 'Training.doc', 1455132975, 1455132975),
(15, 'Planter', 2, '1', 'Seed planting expertise', 11, 'c3919720c4d8d6bae52870123a6cba3f.doc', 'activity model.doc', 1455171538, 1455171538),
(16, 'Driver', 6, '1', 'Heavy Vehicles', 22, '744ba291aa9bc03ee0d8d3bd5596e157.txt', 'test.txt', 1455776401, 1455776401);

-- --------------------------------------------------------

--
-- Table structure for table `linktables`
--

CREATE TABLE `linktables` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `condition_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `soiltype` int(11) NOT NULL,
  `variablecost_id` int(11) NOT NULL,
  `unitprice` double NOT NULL,
  `qty` double NOT NULL,
  `affectedbytargetyield` tinyint(1) NOT NULL,
  `todo` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loanid` int(11) NOT NULL,
  `issue_date` varchar(20) NOT NULL,
  `agronomist` varchar(255) NOT NULL,
  `farmer` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loanid`, `issue_date`, `agronomist`, `farmer`, `amount`, `status`) VALUES
(7001, '2017-01-25', 'Cephas Magava', 'Svodesai Sithole', '4751.50', 'Paid up'),
(7002, '2016-10-30', 'Cephas Magava', 'Nongai Gahlana', '850.00', '1'),
(7003, '2016-10-30', 'Sifelani Mtetwa', 'Nongai Gahlana', '22100.00', '0'),
(7004, '2016-10-30', 'Cephas Magava', 'Petunia Mureyi', '725.50', '2'),
(7005, '2016-10-30', 'Cainos Mugari', 'Gareth Takanai', '3000.00', '1'),
(7006, '2016-10-30', 'Cephas Magava', 'Nongai Gahlana', '1200.00', '1'),
(7007, '2016-10-30', 'Cainos Mugari', 'Sibongile Charumbira', '1700.00', '-1'),
(7008, '2016-10-30', 'Cephas Magava', 'Oswald Chamuteru', '1500.00', '2'),
(7009, '2016-10-30', 'Sadaat Khan', 'Regina Mundondo', '930.00', '1'),
(7010, '2016-10-30', 'Cephas Magava', 'Nongai Gahlana', '1000.00', '2'),
(7011, '2016-10-30', 'Sadaat Khan', 'Nongai Gahlana', '812.00', '1'),
(7012, '2016-10-30', 'Cephas Magava', 'Nongai Gahlana', '9623.50', '1');

-- --------------------------------------------------------

--
-- Table structure for table `logistics`
--

CREATE TABLE `logistics` (
  `id` int(11) UNSIGNED NOT NULL,
  `equipmentname` varchar(255) NOT NULL,
  `capacity` double NOT NULL,
  `rateperhour` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logistics`
--

INSERT INTO `logistics` (`id`, `equipmentname`, `capacity`, `rateperhour`, `description`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, ' Trucks', 2000, 5.3, 'A big pick up truck', 2, 1451468048, 1454320893),
(2, 'Harvester', 1000, 5, 'Harvests all crops', 2, 1454053636, 1454053636),
(3, 'Hoes', 12, 5, 'For cultivating', 2, 1454310103, 1454310103),
(4, ' Harvester', 23, 44, 'Harvests and tills land', 10, 1455137430, 1455137500),
(5, ' Tractor', 45, 7, 'Medium sized tractor', 11, 1455171320, 1455171337),
(6, 'Tractor', 2, 30, 'Tractor available for hire at $30 per hire. Can do 2 Hectares per hour. Farmer to supply their own diesel. 10 Liters per hectare.', 17, 1467801968, 1467801968),
(7, ' Tractor', 2, 30, 'these are big enough tractors that can cover a  large space. ', 57, 1484043880, 1484043894);

-- --------------------------------------------------------

--
-- Table structure for table `mainmenus`
--

CREATE TABLE `mainmenus` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `position` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `aligned` varchar(50) NOT NULL,
  `visible` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mainmenus`
--

INSERT INTO `mainmenus` (`id`, `name`, `url`, `position`, `created_at`, `updated_at`, `aligned`, `visible`, `icon`) VALUES
(6, 'Administrator', '#', '3', 1449050386, 1455094177, 'Right', 1, 'fa-cogs'),
(7, 'Agronomy', '#', '5', 1458636791, 1473256732, 'Left', 1, 'fa-newspaper-o'),
(13, 'Farmer Management', '#', '7', 1468916600, 1531490381, 'Left', 1, 'fa-group'),
(15, 'Markets', '#', '4', 1469434330, 1540981848, 'Left', 0, 'fa-shopping-cart'),
(16, 'Profile', '#', '2', 1469435211, 1469435211, 'Right', 1, 'fa-user'),
(18, 'Stop orders', '#', '9', 1471266814, 1473256732, 'Left', 1, 'fa-clone'),
(19, 'Dashboard', 'dashboard', '0', 1474373886, 1503318577, 'Left', 1, 'fa-home'),
(20, 'Grading', '#', '0', 1532676780, 1532676780, 'Left', 1, 'fa-file');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenus2`
--

CREATE TABLE `mainmenus2` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `position` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `aligned` varchar(50) NOT NULL,
  `visible` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mainmenus2`
--

INSERT INTO `mainmenus2` (`id`, `name`, `url`, `position`, `created_at`, `updated_at`, `aligned`, `visible`, `icon`) VALUES
(6, 'Administrator', '#', '2', 1449050386, 1455094177, 'Right', 1, 'fa-cogs'),
(7, 'Agronomy', '#', '2', 1458636791, 1473256732, 'Left', 1, 'fa-newspaper-o'),
(8, 'Services', '#', '4', 1458637297, 1473256732, 'Left', 1, 'fa-tasks'),
(13, 'Import Permits', '#', '5', 1468916600, 1473256732, 'Left', 1, 'fa-suitcase'),
(14, 'Reports', '#', '6', 1468916613, 1473256732, 'Left', 1, 'fa-area-chart'),
(15, 'Markets', '#', '0', 1469434330, 1473256732, 'Left', 1, 'fa-shopping-cart'),
(16, 'Profile', '#', '0', 1469435211, 1469435211, 'Right', 1, 'fa-user'),
(17, 'Contracts', '#', '1', 1469443176, 1473256732, 'Left', 1, 'fa-exchange'),
(18, 'Stop orders', '#', '3', 1471266814, 1473256732, 'Left', 1, 'fa-clone');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `address_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `name`, `location`, `address_id`, `created_at`, `updated_at`) VALUES
(2, 'Kombayi', 'Vegetable market based in gweru', 21, 1448941572, 1448941572),
(3, 'Mbare Musika', 'Vegetable market', 22, 1448941805, 1448941805),
(4, 'Kudzanayi', 'Fresh fruit and vegetables market', 35, 1454942842, 1454942842),
(5, 'Esigodini Market', 'Mixed product market located at Esigodhini.', 183, 1499264892, 1499264892),
(6, 'Kwekwe Agriculture Market', 'Agriculture produce market in Kwekwe centre', 184, 1499265013, 1499265013),
(7, 'Highfield Agriculture Market', 'Agriculture Market in Highfield Lusaka ', 185, 1499265130, 1499265130),
(8, 'Emkambo', 'Mixed product market', 186, 1499265337, 1499265337);

-- --------------------------------------------------------

--
-- Table structure for table `market_places`
--

CREATE TABLE `market_places` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `zoom` int(11) NOT NULL,
  `html` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market_places`
--

INSERT INTO `market_places` (`id`, `title`, `lat`, `lon`, `zoom`, `html`) VALUES
(1, 'Mbare Musika', -17.8597, 31.0382, 14, '<h5>Mbare Musika</h5>'),
(2, 'Kudzanayi Market', -19.4514, 29.8152, 14, '<h5>Kudzanayi Market</h5>'),
(3, 'Emkambo', -20.1373, 28.5734, 14, '<h5>Emkambo</h5>'),
(4, 'Bindura Agriculture Market', -17.3013, 31.3198, 14, '<h5>Bindura Agriculture Market </h5>'),
(5, 'Market  Street', -20.1512, 28.5861, 14, '<h5>Market  Street </h5>'),
(6, 'Chegutu Roadside Market', -18.138, 30.1474, 14, '<h5>Chegutu Roadside Market</h5>'),
(7, 'Chinhoyi Agriculture Market', -17.3653, 30.1936, 14, '<h5>Chinhoyi Agriculture Market</h5>'),
(8, 'Chinhoyi Agriculture Market', -18.0198, 30.1936, 14, '<h5>Chinhoyi Agriculture Market</h5>'),
(9, 'Guzha Market Chikwanha', -18.0198, 31.0679, 14, '<h5>Guzha Market – Chikwanha </h5>'),
(10, 'Gokwe South Markets', -18.211, 28.4864, 14, '<h5>Bomba, Njelele, Machengere, Gawa and Munegiwa Markets </h5>'),
(11, 'Esigodini Market', -20.2907, 28.9383, 14, 'h5>Esigodini Market </h5>'),
(12, 'Highfield Lusaka Agriculture Market', -17.8817, 30.9819, 14, '<h5>Lusaka Agriculture Market</h5>'),
(13, 'Kwekwe Agriculture Market', -18.9201, 29.8237, 14, '<h5>Kwekwe Agriculture Market</h5>'),
(14, 'Sakubva Agriculture Market', -18.9767, 32.6693, 14, '<h5>Sakubva Agriculture Market</h5>'),
(15, 'Masvingo Markets', -20.0957, 31.6152, 14, '<h5>Bikita, Garikai, Nyika and Tafara Markets</h5>'),
(16, 'Zvishavane Markets', -20.3139, 30.055, 14, '<h5>Hama maoko and Mandava Agriculture Markets</h5>');

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `code`, `description`, `created_at`, `updated_at`) VALUES
(1, '00', 'Yellow Maize', 0, 0),
(2, '01', 'White Maize', 0, 0),
(3, '02', 'Coffee', 0, 0),
(4, '03', 'Rice', 0, 0),
(5, '04', 'White Sorghum', 0, 0),
(6, '05', 'Sunflower', 0, 0),
(7, '06', 'Shelled ground Nuts', 0, 0),
(8, '07', 'Unshelled ground Nut', 0, 0),
(9, '08', 'Wheat', 0, 0),
(10, '09', 'Soya Beans', 0, 0),
(11, '10', 'Sugar Beans', 0, 0),
(12, '11', 'Mhunga', 0, 0),
(13, '12', 'Edible Beans', 0, 0),
(14, '13', 'Rapoko', 0, 0),
(15, '14', 'Nyimo', 0, 0),
(16, '15', 'Butter Beans', 0, 0),
(17, '16', 'Red Sorghum', 0, 0),
(18, '17', 'Maize Seed', 0, 0),
(19, '18', 'Sorghum Seed', 0, 0),
(20, '19', 'Ground Nut Seed', 0, 0),
(21, '20', 'Sunflower Seed', 0, 0),
(22, '21', 'Fertilizer', 0, 0),
(23, '22', 'Popcorn', 0, 0),
(24, '23', 'Nyemba', 0, 0),
(25, '24', 'Maize Meal', 0, 0),
(26, '25', 'Services', 0, 0),
(27, '26', 'Grain Bags', 0, 0),
(28, '27', 'Silo Nyemba', 0, 0),
(29, '28', 'Processed Coffee', 0, 0),
(30, '29', 'Silo Nuts', 0, 0),
(31, '30', 'Packaging Material', 0, 0),
(32, '31', 'Storage Goods', 0, 0),
(33, '32', 'Silo Coffee', 0, 0),
(34, '33', 'Silo Rice', 0, 0),
(35, '34', 'Processed G/Nuts', 0, 0),
(36, '35', 'Silo Beans', 0, 0),
(37, '36', 'Silo Nyimo', 0, 0),
(38, '37', 'Silo Popcorn', 0, 0),
(39, '38', 'Sugar Beans Seed', 0, 0),
(40, '39', 'Soya Beans Seed', 0, 0),
(41, '40', 'Pesticides', 0, 0),
(42, '41', 'Wheat Seed', 0, 0),
(43, '42', 'Millet Seed', 0, 0),
(44, '43', 'Cotton Seed', 0, 0),
(45, '44', 'Tobacco Seed', 0, 0),
(46, '45', 'Vegetable Seed', 0, 0),
(47, '46', 'Salt', 0, 0),
(48, '47', 'Flour', 0, 0),
(49, '48', 'Silo Bread', 0, 0),
(50, '49', 'Baking Products', 0, 0),
(51, '50', 'Maputi', 0, 0),
(52, '51', 'Pet Foods', 0, 0),
(53, '5100', 'Stationery', 0, 0),
(54, '52', 'Protein', 0, 0),
(55, '5200', 'General Hardware', 0, 0),
(56, '5201', 'Plumbing Hardware', 0, 0),
(57, '5202', 'Painting Material', 0, 0),
(58, '5203', 'Tools', 0, 0),
(59, '5204', 'Building Materials', 0, 0),
(60, '5205', 'Tiles', 0, 0),
(61, '5206', 'Carpentry', 0, 0),
(62, '5207', 'Doors & Locksets', 0, 0),
(63, '5208', 'Bolts, Nuts & Screws', 0, 0),
(64, '5209', 'Fencing Material', 0, 0),
(65, '5210', 'Door & Window Frames', 0, 0),
(66, '53', 'Additives', 0, 0),
(67, '5300', 'Chains', 0, 0),
(68, '5302', 'Milling Spares', 0, 0),
(69, '5303', 'Taperlock and Sprock', 0, 0),
(70, '5304', 'Engine Spares', 0, 0),
(71, '5305', 'Plant Spares', 0, 0),
(72, '5306', 'Sewing Machine Spare', 0, 0),
(73, '5307', 'Vee Belts', 0, 0),
(74, '5308', 'Electrical', 0, 0),
(75, '5309', 'Iron and Steel', 0, 0),
(76, '5310', 'NSF Plant spares', 0, 0),
(77, '54', 'Antibiotics', 0, 0),
(78, '55', 'Amino Acids', 0, 0),
(79, '5521', 'Welding', 0, 0),
(80, '5522', 'Bearings', 0, 0),
(81, '5528', 'Hammer Mill', 0, 0),
(82, '56', 'Poultry Feeds', 0, 0),
(83, '57', 'Cattle Feeds', 0, 0),
(84, '5700', 'Medical', 0, 0),
(85, '58', 'Pig Feeds', 0, 0),
(86, '59', 'Nyemba seed', 0, 0),
(87, '5900', 'Shoes', 0, 0),
(88, '5901', 'Miscellaneous', 0, 0),
(89, '5902', 'Dustcoats', 0, 0),
(90, '5903', 'Protective Clothing', 0, 0),
(91, '5904', 'Uniforms', 0, 0),
(92, '60', 'Soya Chunks', 0, 0),
(93, '6000', 'Fumigants', 0, 0),
(94, '61', 'Jam', 0, 0),
(95, '6100', 'Fumigation Sheets', 0, 0),
(96, '6150', 'Computer Accessories', 0, 0),
(97, '62', 'Dried Kapenta', 0, 0),
(98, '6200', 'Fuel & Lubricants', 0, 0),
(99, '63', 'Dovi', 0, 0),
(100, '6300', 'Assets', 0, 0),
(101, '64', 'POTATOE SEED', 0, 0),
(102, '6400', 'Cellphone', 0, 0),
(103, '6401', 'Weigbridge Spares', 0, 0),
(104, '6402', 'Tractor Spares', 0, 0),
(105, '6403', 'Stacker Machine Spar', 0, 0),
(106, '6404', 'Loco Spares', 0, 0),
(107, '6405', 'Electrical Motors Sp', 0, 0),
(108, '6406', 'Ground Nut Spares', 0, 0),
(109, '65', 'COFFEE SEED', 0, 0),
(110, '66', 'Trail Materials', 0, 0),
(111, '67', 'Pearl Millet Meal', 0, 0),
(112, '68', 'Sorghum Meal', 0, 0),
(113, '69', 'Sheep Feeds', 0, 0),
(114, '7010', 'Cereal Prouducts', 0, 0),
(115, '7020', 'Legume Products', 0, 0),
(116, '7024', 'Printing Costs', 0, 0),
(117, '7030', 'Audit Fees', 0, 0),
(118, '7031', 'Conferences & Semina', 0, 0),
(119, '7032', 'Prof  Service - Exec', 0, 0),
(120, '7033', 'Cleaning & Sanitatio', 0, 0),
(121, '7034', 'Staff Welfare', 0, 0),
(122, '7035', ' Uniforms Accesories', 0, 0),
(123, '7036', 'Generator Spares', 0, 0),
(124, '7037', 'Motor General', 0, 0),
(125, '7038', 'Subscriptions', 0, 0),
(126, '7039', 'Teas & Refreshments', 0, 0),
(127, '7040', 'Mineral Sources', 0, 0),
(128, '7041', 'Staff Training', 0, 0),
(129, '7045', 'Advertising', 0, 0),
(130, '7046', 'Donations', 0, 0),
(131, '7047', 'Legal Fees & Costs', 0, 0),
(132, '7048', 'Software and Licence', 0, 0),
(133, '7049', 'Hatchery', 0, 0),
(134, '7050', 'Supp Amino Acid Sour', 0, 0),
(135, '7060', 'Vitamin Sources', 0, 0),
(136, '7070', 'Feed Additives', 0, 0),
(137, '7080', 'Animal Protein Sourc', 0, 0),
(138, '7090', 'Beef Feeds', 0, 0),
(139, '7100', 'Dairy Feeds', 0, 0),
(140, '7110', 'Dog Feeds', 0, 0),
(141, '7120', 'Main Roughage S', 0, 0),
(142, '7121', 'Chemicals', 0, 0),
(143, '7122', 'Laboratory Consumabl', 0, 0),
(144, '7123', 'Amajuba Sales', 0, 0),
(145, '7124', 'Extruder Spares', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`id`, `name`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Base Liquid', 'Litre', 1448878363, 1448878363),
(2, 'Base Solid', 'Kilogram', 1448878392, 1448878392),
(3, 'Head', 'Head', 1448878452, 1448878791),
(4, 'Bundle', 'Bundle', 1448878472, 1448878804),
(11, 'Animal', 'Each', 1448878726, 1448891588);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`type`, `name`, `migration`) VALUES
('app', 'default', '001_create_countries'),
('app', 'default', '002_create_cities'),
('app', 'default', '003_create_addresses'),
('app', 'default', '004_create_users'),
('package', 'auth', '001_auth_create_usertables'),
('package', 'auth', '002_auth_create_grouptables'),
('package', 'auth', '003_auth_create_roletables'),
('package', 'auth', '004_auth_create_permissiontables'),
('package', 'auth', '005_auth_create_authdefaults'),
('package', 'auth', '006_auth_add_authactions'),
('package', 'auth', '007_auth_add_permissionsfilter'),
('package', 'auth', '008_auth_create_providers'),
('package', 'auth', '009_auth_create_oauth2tables'),
('package', 'auth', '010_auth_fix_jointables'),
('app', 'default', '005_create_farms'),
('app', 'default', '006_create_subscriptions'),
('app', 'default', '005_create_markets'),
('app', 'default', '007_create_productoffers'),
('app', 'default', '008_create_bids'),
('app', 'default', '009_create_transactions'),
('app', 'default', '010_create_bids'),
('app', 'default', '011_create_sales'),
('app', 'default', '012_create_transactions'),
('app', 'default', '018_create_activities'),
('app', 'default', '019_create_inputs'),
('app', 'default', '020_create_farmguides'),
('app', 'default', '015_create_logistics'),
('app', 'default', '016_create_labors'),
('app', 'default', '017_create_budgets'),
('app', 'default', '021_add_imagename_to_productoffer'),
('app', 'default', '022_add_offerdesc_to_productoffer'),
('app', 'default', '023_create_permits'),
('app', 'default', '024_add_comments_to_stoporders'),
('app', 'default', '025_add_doc_name_to_stoporders'),
('app', 'default', '026_create_campaigns'),
('app', 'default', '027_create_campaign_users'),
('app', 'default', '028_create_companies'),
('app', 'default', '026_add_icon_to_mainmenu'),
('app', 'default', '027_create_market_places'),
('app', 'default', '029_create_variablecosts'),
('app', 'default', '030_create_product_variablecosts'),
('app', 'default', '031_create_stages'),
('app', 'default', '032_create_product_variablecost_stages'),
('app', 'default', '033_create_todos'),
('app', 'default', '034_create_targetyields'),
('app', 'default', '035_create_product_variablecost_stage_targetyields'),
('app', 'default', '036_create_product_variablecost_complexformulas'),
('app', 'default', '037_create_basicformulas'),
('app', 'default', '038_create_units'),
('app', 'default', '039_create_regions'),
('app', 'default', '040_create_condtions'),
('app', 'default', '041_create_region_conditions'),
('app', 'default', '042_create_region_condition_products'),
('app', 'default', '043_create_masters'),
('app', 'default', '044_create_parents'),
('app', 'default', '045_create_children'),
('app', 'default', '046_create_runningtables'),
('app', 'default', '047_create_soiltypes'),
('app', 'default', '048_create_linktables'),
('app', 'default', '049_create_projects'),
('app', 'default', '050_create_project_regions'),
('app', 'default', '051_create_project_stages'),
('app', 'default', '052_create_project_conditions'),
('app', 'default', '053_create_project_soiltypes'),
('app', 'default', '054_create_project_variablecosts'),
('app', 'default', '056_create_project_stage_tasks'),
('app', 'default', '057_create_project_stage_task_variablecosts'),
('app', 'default', '058_create_contractquantities'),
('app', 'default', '059_create_contractstarts'),
('app', 'default', '060_create_contracttrackers'),
('app', 'default', '028_create_profilepics'),
('app', 'default', '055_create_tasks'),
('app', 'default', '056_create_contractortrackers'),
('app', 'default', '057_create_project_stages'),
('app', 'default', '058_create_students'),
('app', 'default', '059_create_contract_disburses'),
('app', 'default', '060_create_vids'),
('app', 'default', '061_create_stakeholder_tradingdetails'),
('app', 'default', '062_create_stakeholder_products'),
('app', 'default', '063_create_project_filtered_tasks'),
('app', 'default', '064_create_project_filtered_resources'),
('app', 'default', '063_create_provinces'),
('app', 'default', '064_create_districts'),
('app', 'default', '065_seed_loans'),
('app', 'default', '066_activated_users_mod'),
('app', 'default', '067_activated_users_mod2'),
('app', 'default', '070_create_grainreceipts'),
('app', 'default', '071_create_grains'),
('app', 'default', '072_create_grades'),
('app', 'default', '073_create_gradingcriterias'),
('app', 'default', '074_create_grainreceiptsdata'),
('app', 'default', '075_create_soapplications'),
('app', 'default', '076_create_user_profiles'),
('app', 'default', '077_create_branches'),
('app', 'default', '078_create_branches'),
('app', 'default', '079_create_branches'),
('app', 'default', '080_create_stop_orders'),
('app', 'default', '081_create_stoporders'),
('app', 'default', '082_create_stop_orders'),
('app', 'default', '083_create_stoporders'),
('app', 'default', '084_create_stoporders'),
('app', 'default', '088_create_depots');

-- --------------------------------------------------------

--
-- Table structure for table `nasty_tricks`
--

CREATE TABLE `nasty_tricks` (
  `target` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `measure` varchar(255) NOT NULL,
  `approved` varchar(20) NOT NULL,
  `disbursed` varchar(20) NOT NULL,
  `unitprice` varchar(20) NOT NULL,
  `linetotal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasty_tricks`
--

INSERT INTO `nasty_tricks` (`target`, `item`, `measure`, `approved`, `disbursed`, `unitprice`, `linetotal`) VALUES
(16, 'Labour', 'labour hours', '8', '7', '5', '40'),
(16, 'Fertilizer and lime', 'kilograms', '50', '8', '7', '350'),
(16, 'Seeds', 'kilograms', '50', '5', '3', '150'),
(16, 'Labour', 'labour hours', '23', '5', '34', '782'),
(16, 'Seeds', 'kilograms', '4', '5', '23', '92'),
(16, 'Fertilizer and lime', 'kilograms', '34', '5', '12', '408'),
(25, 'Labour', 'labour hours', '9', '8', '2.5', '22.5'),
(25, 'Labour', 'labour hours', '9', '9', '2.5', '22.5'),
(25, 'Seeds', 'kilograms', '48000', '47000', '1.25', '60000'),
(25, 'Labour', 'labour hours', '10', '0', '2.5', '25'),
(25, 'Fertilizer and lime', 'kilograms', '20', '0', '10', '200'),
(25, 'Labour', 'labour hours', '7', '0', '1', '7'),
(27, 'Labour', 'labour hours', '10', '10', '1.25', '12.5'),
(27, 'Fertilizer and lime', 'kilograms', '2200', '2200', '1.05', '2310'),
(27, 'Labour', 'labour hours', '10', '10', '1.25', '12.5'),
(27, 'Seeds', 'kilograms', '4400', '4400', '1', '4400'),
(27, 'Labour', 'labour hours', '10', '10', '1.25', '12.5'),
(27, 'Labour', 'labour hours', '10', '10', '1.25', '12.5'),
(27, 'Fertilizer and lime', 'kilograms', '1100', '1100', '0.95', '1045'),
(27, 'Labour', 'labour hours', '10', '10', '1.25', '12.5'),
(34, 'Labour', 'labour hours', '10', '10', '2.5', '25'),
(34, 'Labour', 'labour hours', '10', '10', '2.5', '25'),
(34, 'Seeds', 'kilograms', '243000', '243000', '1.25', '303750'),
(34, 'Labour', 'labour hours', '10', '0', '2.5', '25'),
(34, 'Fertilizer and lime', 'kilograms', '20', '0', '10', '200'),
(34, 'Labour', 'labour hours', '10', '0', '1', '10'),
(25, 'Labour', 'labour hours', '5', '0', '2.3', '11.5'),
(25, 'Fertilizer and lime', 'kilograms', '100', '0', '0.7', '70'),
(25, 'Seeds', 'kilograms', '5', '0', '2', '10'),
(25, 'Labour', 'labour hours', '15', '0', '2.2', '33'),
(25, 'Seeds', 'kilograms', '200', '0', '1.7', '340'),
(25, 'Labour', 'labour hours', '10', '0', '0.6', '6'),
(25, 'Fertilizer and lime', 'kilograms', '300', '0', '0.8', '240'),
(12, 'Labour', 'labour hours', '10', '0', '2.5', '25'),
(12, 'Labour', 'labour hours', '10', '0', '1.5', '15'),
(12, 'Fertilizer and lime', 'kilograms', '200', '0', '3.1', '620'),
(12, 'Labour', 'labour hours', '20', '0', '1.2', '24'),
(13, 'Labour', 'labour hours', '10', '10', '1.7', '17'),
(13, 'Fertilizer and lime', 'kilograms', '100', '100', '0.6', '60'),
(13, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(13, 'Seeds', 'kilograms', '150', '150', '0.9', '135'),
(13, 'Labour', 'labour hours', '15', '15', '1.6', '24'),
(13, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(13, 'Fertilizer and lime', 'kilograms', '100', '100', '0.8', '80'),
(38, 'Labour', 'labour hours', '10', '0', '2.5', '25'),
(38, 'Labour', 'labour hours', '10', '0', '2.5', '25'),
(38, 'Seeds', 'kilograms', '1210', '0', '1.25', '1512.5'),
(38, 'Labour', 'labour hours', '10', '0', '2.5', '25'),
(38, 'Fertilizer and lime', 'kilograms', '20', '0', '10', '200'),
(38, 'Labour', 'labour hours', '10', '0', '1', '10'),
(39, 'Labour', 'labour hours', '15', '0', '2.1', '31.5'),
(39, 'Seeds', 'kilograms', '200', '0', '2.2', '440'),
(39, 'Labour', 'labour hours', '15', '0', '2.5', '37.5'),
(39, 'Seeds', 'kilograms', '200', '0', '2.2', '440'),
(16, 'Labour', 'labour hours', '10', '10', '1.7', '17'),
(16, 'Fertilizer and lime', 'kilograms', '100', '100', '0.6', '60'),
(16, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(16, 'Seeds', 'kilograms', '150', '150', '0.9', '135'),
(16, 'Labour', 'labour hours', '15', '15', '1.6', '24'),
(16, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(16, 'Fertilizer and lime', 'kilograms', '100', '100', '0.8', '80'),
(40, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(40, 'Fertilizer and lime', 'kilograms', '3000', '0', '2.5', '7500'),
(40, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(40, 'Seeds', 'kilograms', '4500', '0', '3', '13500'),
(40, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(40, 'Fertilizer and lime', 'kilograms', '3000', '0', '2.5', '7500'),
(40, 'Labour', 'labour hours', '45', '0', '1.25', '56.25'),
(17, 'Labour', 'labour hours', '10', '10', '1.7', '17'),
(17, 'Fertilizer and lime', 'kilograms', '100', '100', '0.6', '60'),
(17, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(17, 'Seeds', 'kilograms', '150', '150', '0.9', '135'),
(17, 'Labour', 'labour hours', '15', '15', '1.6', '24'),
(17, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(17, 'Fertilizer and lime', 'kilograms', '100', '100', '0.8', '80'),
(35, 'Labour', 'labour hours', '10', '10', '1.7', '17'),
(35, 'Fertilizer and lime', 'kilograms', '100', '100', '0.6', '60'),
(35, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(35, 'Seeds', 'kilograms', '150', '150', '0.9', '135'),
(35, 'Labour', 'labour hours', '15', '15', '1.6', '24'),
(35, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(35, 'Fertilizer and lime', 'kilograms', '100', '100', '0.8', '80'),
(14, 'Labour', 'labour hours', '10', '10', '2.5', '25'),
(14, 'Labour', 'labour hours', '10', '0', '2.5', '25'),
(14, 'Seeds', 'kilograms', '23000', '0', '1.25', '28750'),
(14, 'Labour', 'labour hours', '10', '0', '2.5', '25'),
(14, 'Fertilizer and lime', 'kilograms', '20', '0', '10', '200'),
(14, 'Labour', 'labour hours', '10', '0', '1', '10'),
(48, 'Labour', 'labour hours', '10', '10', '1.25', '12.5'),
(48, 'Fertilizer and lime', 'kilograms', '3000', '3000', '2.5', '7500'),
(48, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(48, 'Seeds', 'kilograms', '4500', '0', '3', '13500'),
(48, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(48, 'Fertilizer and lime', 'kilograms', '3000', '0', '2.5', '7500'),
(48, 'Labour', 'labour hours', '45', '0', '1.25', '56.25'),
(49, 'Labour', 'labour hours', '15', '15', '2.1', '31.5'),
(49, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(49, 'Labour', 'labour hours', '15', '15', '2.5', '37.5'),
(49, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(41, 'Labour', 'labour hours', '15', '0', '2.1', '31.5'),
(41, 'Seeds', 'kilograms', '200', '0', '2.2', '440'),
(41, 'Labour', 'labour hours', '15', '0', '2.5', '37.5'),
(41, 'Seeds', 'kilograms', '200', '0', '2.2', '440'),
(43, 'Labour', 'labour hours', '8', '0', '5', '40'),
(43, 'Fertilizer and lime', 'kilograms', '40', '0', '7', '280'),
(43, 'Seeds', 'kilograms', '40', '0', '3', '120'),
(43, 'Labour', 'labour hours', '12', '0', '34', '408'),
(43, 'Seeds', 'kilograms', '4', '0', '23', '92'),
(43, 'Fertilizer and lime', 'kilograms', '23', '0', '12', '276'),
(8, 'Labour', 'labour hours', '9', '0', '1.25', '11.25'),
(8, 'Fertilizer and lime', 'kilograms', '20000', '0', '2.5', '50000'),
(8, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(8, 'Seeds', 'kilograms', '30000', '0', '3', '90000'),
(8, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(8, 'Fertilizer and lime', 'kilograms', '20000', '0', '2.5', '50000'),
(8, 'Labour', 'labour hours', '45', '0', '1.25', '56.25'),
(30, 'Labour', 'labour hours', '8', '0', '5', '40'),
(30, 'Fertilizer and lime', 'kilograms', '50', '0', '7', '350'),
(30, 'Seeds', 'kilograms', '50', '0', '3', '150'),
(30, 'Labour', 'labour hours', '23', '0', '34', '782'),
(30, 'Seeds', 'kilograms', '4', '0', '23', '92'),
(30, 'Fertilizer and lime', 'kilograms', '34', '0', '12', '408'),
(37, 'Labour', 'labour hours', '8', '0', '5', '40'),
(37, 'Fertilizer and lime', 'kilograms', '50', '0', '7', '350'),
(37, 'Seeds', 'kilograms', '50', '0', '3', '150'),
(37, 'Labour', 'labour hours', '23', '0', '34', '782'),
(37, 'Seeds', 'kilograms', '4', '0', '23', '92'),
(37, 'Fertilizer and lime', 'kilograms', '34', '0', '12', '408'),
(20, 'Labour', 'labour hours', '8', '0', '5', '40'),
(20, 'Fertilizer and lime', 'kilograms', '50', '0', '7', '350'),
(20, 'Seeds', 'kilograms', '50', '0', '3', '150'),
(20, 'Labour', 'labour hours', '23', '0', '34', '782'),
(20, 'Seeds', 'kilograms', '4', '0', '23', '92'),
(20, 'Fertilizer and lime', 'kilograms', '34', '0', '12', '408'),
(50, 'Labour', 'labour hours', '8', '8', '5', '40'),
(50, 'Fertilizer and lime', 'kilograms', '40', '40', '7', '280'),
(50, 'Seeds', 'kilograms', '40', '40', '3', '120'),
(50, 'Labour', 'labour hours', '12', '12', '34', '408'),
(50, 'Seeds', 'kilograms', '4', '4', '23', '92'),
(50, 'Fertilizer and lime', 'kilograms', '23', '23', '12', '276'),
(29, 'Labour', 'labour hours', '10', '0', '1.7', '17'),
(29, 'Fertilizer and lime', 'kilograms', '100', '0', '0.6', '60'),
(29, 'Labour', 'labour hours', '10', '0', '1.6', '16'),
(29, 'Seeds', 'kilograms', '150', '0', '0.9', '135'),
(29, 'Labour', 'labour hours', '15', '0', '1.6', '24'),
(29, 'Labour', 'labour hours', '10', '0', '1.6', '16'),
(29, 'Fertilizer and lime', 'kilograms', '100', '0', '0.8', '80'),
(52, 'Labour', 'labour hours', '15', '15', '2.1', '31.5'),
(52, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(52, 'Labour', 'labour hours', '15', '15', '2.5', '37.5'),
(52, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(44, 'Labour', 'labour hours', '15', '15', '2.1', '31.5'),
(44, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(44, 'Labour', 'labour hours', '15', '15', '2.5', '37.5'),
(44, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(53, 'Labour', 'labour hours', '15', '15', '2.1', '31.5'),
(53, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(53, 'Labour', 'labour hours', '15', '15', '2.5', '37.5'),
(53, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(21, 'Labour', 'labour hours', '15', '15', '2.1', '31.5'),
(21, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(21, 'Labour', 'labour hours', '15', '15', '2.5', '37.5'),
(21, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(45, 'Labour', 'labour hours', '15', '15', '2.1', '31.5'),
(45, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(45, 'Labour', 'labour hours', '15', '15', '2.5', '37.5'),
(45, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(47, 'Labour', 'labour hours', '15', '0', '2.1', '31.5'),
(47, 'Seeds', 'kilograms', '200', '0', '2.2', '440'),
(47, 'Labour', 'labour hours', '15', '0', '2.5', '37.5'),
(47, 'Seeds', 'kilograms', '200', '0', '2.2', '440'),
(46, 'Labour', 'labour hours', '15', '0', '2.1', '31.5'),
(46, 'Seeds', 'kilograms', '200', '0', '2.2', '440'),
(46, 'Labour', 'labour hours', '15', '0', '2.5', '37.5'),
(46, 'Seeds', 'kilograms', '200', '0', '2.2', '440'),
(56, 'Labour', 'labour hours', '8', '0', '5', '40'),
(56, 'Fertilizer and lime', 'kilograms', '50', '0', '7', '350'),
(56, 'Seeds', 'kilograms', '50', '0', '3', '150'),
(56, 'Labour', 'labour hours', '23', '0', '34', '782'),
(56, 'Seeds', 'kilograms', '4', '0', '23', '92'),
(56, 'Fertilizer and lime', 'kilograms', '34', '0', '12', '408'),
(36, 'Labour', 'labour hours', '5', '0', '2.3', '11.5'),
(36, 'Fertilizer and lime', 'kilograms', '100', '0', '0.7', '70'),
(36, 'Seeds', 'kilograms', '5', '0', '2', '10'),
(36, 'Labour', 'labour hours', '15', '0', '2.2', '33'),
(36, 'Seeds', 'kilograms', '200', '0', '1.7', '340'),
(36, 'Labour', 'labour hours', '10', '0', '0.6', '6'),
(36, 'Fertilizer and lime', 'kilograms', '300', '0', '0.8', '240'),
(57, 'Labour', 'labour hours', '5', '0', '2.3', '11.5'),
(57, 'Fertilizer and lime', 'kilograms', '100', '0', '0.7', '70'),
(57, 'Seeds', 'kilograms', '5', '0', '2', '10'),
(57, 'Labour', 'labour hours', '15', '0', '2.2', '33'),
(57, 'Seeds', 'kilograms', '200', '0', '1.7', '340'),
(57, 'Labour', 'labour hours', '10', '0', '0.6', '6'),
(57, 'Fertilizer and lime', 'kilograms', '300', '0', '0.8', '240'),
(54, 'Labour', 'labour hours', '15', '15', '2.1', '31.5'),
(54, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(54, 'Labour', 'labour hours', '15', '15', '2.5', '37.5'),
(54, 'Seeds', 'kilograms', '200', '200', '2.2', '440'),
(18, 'Labour', 'labour hours', '10', '10', '1.7', '17'),
(18, 'Fertilizer and lime', 'kilograms', '100', '100', '0.6', '60'),
(18, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(18, 'Seeds', 'kilograms', '150', '150', '0.9', '135'),
(18, 'Labour', 'labour hours', '15', '15', '1.6', '24'),
(18, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(18, 'Fertilizer and lime', 'kilograms', '100', '100', '0.8', '80'),
(15, 'Labour', 'labour hours', '10', '10', '1.7', '17'),
(15, 'Fertilizer and lime', 'kilograms', '100', '100', '0.6', '60'),
(15, 'Labour', 'labour hours', '10', '10', '1.6', '16'),
(15, 'Seeds', 'kilograms', '150', '150', '0.9', '135'),
(15, 'Labour', 'labour hours', '15', '0', '1.6', '24'),
(15, 'Labour', 'labour hours', '10', '0', '1.6', '16'),
(15, 'Fertilizer and lime', 'kilograms', '100', '0', '0.8', '80'),
(22, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(22, 'Fertilizer and lime', 'kilograms', '10000', '0', '1.05', '10500'),
(22, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(22, 'Seeds', 'kilograms', '20000', '0', '1', '20000'),
(22, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(22, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(22, 'Fertilizer and lime', 'kilograms', '5000', '0', '0.95', '4750'),
(22, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(58, 'Labour', 'labour hours', '10', '10', '1.25', '12.5'),
(58, 'Fertilizer and lime', 'kilograms', '4000', '4000', '2.5', '10000'),
(58, 'Labour', 'labour hours', '10', '10', '1.25', '12.5'),
(58, 'Seeds', 'kilograms', '6000', '6000', '3', '18000'),
(58, 'Labour', 'labour hours', '10', '10', '1.25', '12.5'),
(58, 'Fertilizer and lime', 'kilograms', '4000', '0', '2.5', '10000'),
(58, 'Labour', 'labour hours', '45', '0', '1.25', '56.25'),
(19, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(19, 'Fertilizer and lime', 'kilograms', '2000', '0', '1.05', '2100'),
(19, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(19, 'Seeds', 'kilograms', '4000', '0', '1', '4000'),
(19, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(19, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(19, 'Fertilizer and lime', 'kilograms', '1000', '0', '0.95', '950'),
(19, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(60, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(60, 'Fertilizer and lime', 'kilograms', '2000', '0', '1.05', '2100'),
(60, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(60, 'Seeds', 'kilograms', '4000', '0', '1', '4000'),
(60, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(60, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(60, 'Fertilizer and lime', 'kilograms', '1000', '0', '0.95', '950'),
(60, 'Labour', 'labour hours', '10', '0', '1.25', '12.5'),
(42, 'Labour', 'labour hours', '8', '0', '5', '40'),
(42, 'Fertilizer and lime', 'kilograms', '50', '0', '7', '350'),
(42, 'Seeds', 'kilograms', '50', '0', '3', '150'),
(42, 'Labour', 'labour hours', '23', '0', '34', '782'),
(42, 'Seeds', 'kilograms', '4', '0', '23', '92'),
(42, 'Fertilizer and lime', 'kilograms', '34', '0', '12', '408'),
(23, 'Labour', 'labour hours', '8', '0', '5', '40'),
(23, 'Fertilizer and lime', 'kilograms', '50', '0', '7', '350'),
(23, 'Seeds', 'kilograms', '50', '0', '3', '150'),
(23, 'Labour', 'labour hours', '23', '0', '34', '782'),
(23, 'Seeds', 'kilograms', '4', '0', '23', '92'),
(23, 'Fertilizer and lime', 'kilograms', '34', '0', '12', '408');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) UNSIGNED NOT NULL,
  `mid` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paymentterms`
--

CREATE TABLE `paymentterms` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymentterms`
--

INSERT INTO `paymentterms` (`id`, `code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'N120', 'Net due in 120+ days', 1539775172, 1539775172),
(2, 'NT00', 'Net due upon receipt', 1539775196, 1539775196),
(3, 'NT30', 'Net due in 30 days', 1539775226, 1539775226),
(4, 'NT45', 'Net due in 45 days', 1539775247, 1539775247),
(5, 'NT50', 'Net due in 50 days', 1539775272, 1539775272),
(6, 'NT60', 'Net due in 60 days', 1539775320, 1539775320),
(7, 'NT90', 'Net due in 90 days', 1539775344, 1539775344);

-- --------------------------------------------------------

--
-- Table structure for table `permits`
--

CREATE TABLE `permits` (
  `id` int(11) UNSIGNED NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `commodity` varchar(255) NOT NULL,
  `certification` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `qty_applied` int(11) NOT NULL,
  `qty_approved` int(11) NOT NULL,
  `approv_date` varchar(255) NOT NULL,
  `approv_user_id` int(11) DEFAULT NULL,
  `measurement_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permits`
--

INSERT INTO `permits` (`id`, `applicant_id`, `doc_name`, `status`, `commodity`, `certification`, `comment`, `qty_applied`, `qty_approved`, `approv_date`, `approv_user_id`, `measurement_id`, `created_at`, `updated_at`) VALUES
(1, 2, '1_2_Naartjies.jpg', -1, 'Cabbages', 'ISO9001', 'This is a test\r\nThis and that mate', 50000, 200, '1468419140', 2, 3, 1468418138, 1468419140),
(2, 2, '2_2_pineaple.jpg', 1, 'Used clothes bales', 'None', 'Matches all requirements', 5, 3, '1468481289', 2, 4, 1468480240, 1468481290),
(7, 2, '7_2_apples.jpg', 1, 'Cotton Seed', 'ISO9001', 'For regulation purposes', 17000, 10000, '1471253554', 5, 2, 1468568024, 1471253554),
(8, 2, '8_2_lemons.jpg', 1, 'Beans', 'SAZ', 'Meets requirements', 5000, 4500, '1468568582', 2, 2, 1468568507, 1468568583),
(9, 36, '9_36_sweet_potatoes.jpg', 1, 'Maize grain', 'ISO9001', 'Documents are satisfactory', 200, 100, '1471253244', 5, 2, 1471253148, 1471253244),
(10, 2, '10_2_Naartjies.jpg', -1, 'Maize meal', 'SAZ', 'Missing paperwork', 5000, 0, '1471256251', 5, 2, 1471253859, 1471256251),
(11, 2, '11_2_potatoes.jpg', 0, 'Maize', 'ISO9001', NULL, 2000, 0, '', NULL, 2, 1471256166, 1471256166),
(12, 29, '12_29_27e38bc835bcea4926d1a8fd77d0fc3d.jpg', 1, 'Maize (Grade A)', 'ISO9001', 'Exceeding limit', 2000, 1000, '1471416281', 5, 2, 1471416086, 1471416281),
(13, 2, '13_2_testpdf.pdf', 0, 'Mango', 'ISO9001', NULL, 500, 0, '', NULL, 11, 1471437344, 1471437344),
(14, 38, '14_38_Telephone_Extension_List.pdf', 1, 'Maize (Grade B)', 'ISO9001', 'Because reasons', 16000, 10000, '1471444490', 5, 2, 1471444206, 1471444490),
(15, 29, '15_29_zhanje.jpg', 1, 'Maize (Grade B)', 'ISO9001', 'Not to exceed limit', 2000, 1000, '1471515157', 5, 2, 1471515016, 1471515157),
(16, 29, '16_29_AGRICULTURAL_FINANCE_ACT_18_02.pdf', 1, 'Maize (Grade A)', 'ISO9001', 'Exceeds required amount', 22000, 10000, '1471527198', 5, 2, 1471527107, 1471527198),
(17, 29, '17_29_27e38bc835bcea4926d1a8fd77d0fc3d.jpg', 0, 'Maze', 'ISO9001', NULL, 100, 0, '', NULL, 2, 1472033036, 1472033036),
(18, 17, '18_17_IMG_3051.PNG', 0, 'Maize', 'SAZ', NULL, 20, 0, '', NULL, 11, 1476227696, 1476227696),
(19, 17, '19_17_protect_directives_d-10-02_app1_1336416932541_eng.jpg', 0, 'Wheat', 'ISO9001', NULL, 10000, 0, '', NULL, 2, 1477487491, 1477487491),
(20, 17, '20_17_Wheat.jpg', 0, 'Wheat', 'ISO9001', NULL, 10000, 0, '', NULL, 2, 1477487559, 1477487559),
(21, 2, '21_2_20_17_Wheat.jpg', 0, 'Grain', 'ISO9001', NULL, 10, 0, '', NULL, 4, 1477489126, 1477489126),
(22, 2, '22_2_20_17_Wheat.jpg', 0, 'Grain', 'ISO9001', NULL, 10, 0, '', NULL, 4, 1477489220, 1477489220),
(23, 57, '23_57_a.pdf', 0, 'Maize', 'SAZ', NULL, 100, 0, '', NULL, 2, 1484043322, 1484043322);

-- --------------------------------------------------------

--
-- Table structure for table `productoffers`
--

CREATE TABLE `productoffers` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `price` mediumtext NOT NULL,
  `offer_description` text NOT NULL,
  `quanity` mediumtext NOT NULL,
  `min_quantity` mediumtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `quantity_left` mediumint(9) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `image_name` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productoffers`
--

INSERT INTO `productoffers` (`id`, `product_id`, `farmer_id`, `market_id`, `price`, `offer_description`, `quanity`, `min_quantity`, `status`, `product_status`, `quantity_left`, `count`, `created_at`, `updated_at`, `image_name`) VALUES
(1, 4, 4, 3, '4', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '40', '10', 'closed', 'Ungraded', 10000, 17, 1449067661, 1466589229, '335f66567d2f34708e9f030d336f8ee1.jpg'),
(2, 4, 2, 3, '2', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '100', '20', 'open', 'Passed', 10000, 5, 1449136532, 1464961613, '8246450646ae22ed627dedd20ff32308.jpg'),
(3, 7, 4, 2, '5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '25', '5', 'closed', 'Failed', 10000, 10, 1449152434, 1466500632, 'b0e4865cc3ec52f2df972370c0bcb48e.jpg'),
(6, 6, 2, 2, '5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '100', '20', 'open', 'Passed', 9750, 4, 1450169535, 1475478863, '7d7d2eba930087fcd9ad2a7848e8a917.jpg'),
(7, 2, 2, 2, '90', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '70', '60', 'open', 'Passed', 7910, 4, 1451999473, 1502285979, '50c65cc72c2ffb9315fa6d1f64395e9c.jpg'),
(8, 11, 4, 3, '1', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '100', '10', 'open', 'Failed', 9800, 8, 1452176817, 1477653045, '03a6b8ed4b83ff39c2e4a6f14a623ce6.jpg'),
(9, 10, 2, 3, '23', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '45', '5', 'open', 'Passed', 10000, 0, 1454491528, 1464688704, 'c717ac7761cfd73a78feb9de62b2e7e3.jpg'),
(10, 9, 2, 3, '3', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '50', '5', 'open', 'Failed', 10000, 0, 1454866121, 1464688718, '6819ddb5e3c3604792860f69c2d34a51.jpg'),
(11, 4, 2, 2, '2', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '45', '5', 'open', 'Passed', 9820, 7, 1454917618, 1499951839, '44ac649fc962783fde9de7612f207d03.jpg'),
(12, 13, 4, 4, '1', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '50', '5', 'open', 'Failed', 9365, 7, 1455171726, 1500450233, 'c55fa0bc8a4547e65414d259d3045004.png'),
(14, 15, 2, 2, '0.5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '5', '2', 'open', 'Failed', 0, 2, 1455553448, 1476952853, NULL),
(15, 8, 4, 3, '0.5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '90', '5', 'closed', 'Passed', 8750, 22, 1449223730, 1498724154, '27e38bc835bcea4926d1a8fd77d0fc3d.jpg'),
(18, 1, 17, 2, '50', 'Granny Smith Large', '200', '10', 'open', 'Ungraded', 200, 0, 1477899734, 1477899734, 'dab25108c9c4ea9fe248abc5f0aa52cb.jpg'),
(19, 46, 2, 2, '10', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '100', '1', 'open', 'Ungraded', 100, 0, 1478073255, 1500539781, '23cb4dcc6d134ac36086b3cef86a0474.jpg'),
(20, 45, 2, 3, '0.20', 'nice freash maize', '100', '1', 'open', 'Ungraded', 0, 5, 1478688901, 1495199219, '4a1d9dec03b7379d3dc437c3f874009a.jpg'),
(21, 74, 57, 3, '500.00', '2 tonnes of tomatoes up for grabs. first byer gets wheelbarrow', '2', '1', 'open', 'Ungraded', 1, 1, 1484042212, 1502178578, '3d6d90b92f96502b0a5534a96f377ed7.jpg'),
(22, 1, 29, 3, '0.8', 'Fresh ripe apples', '1000', '10', 'open', 'Ungraded', 440, 14, 1493720408, 1532502543, '57d5c5dd79f1ad8ebb7660aa5f4c962c.jpg'),
(23, 1, 78, 3, '1', 'fresh maize available at your door step at reasonable prices', '100', '10', 'open', 'Ungraded', 90, 1, 1518081609, 1518594066, '27acd45077ce4ae916d292622073f016.jpg'),
(24, 1, 79, 8, '1', 'A- grade quality maize ', '500', '50', 'open', 'Ungraded', 180, 3, 1518081911, 1518612804, 'c201a3e5a2f5c1a6c00418ecb60c0366.JPG'),
(25, 1, 81, 2, '1', 'fresh maize for sale', '100', '10', 'open', 'Ungraded', 80, 1, 1518083113, 1582655833, '72ca6a0e5243c0f6d7b31f4d33a7a065.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productoffers21`
--

CREATE TABLE `productoffers21` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `price` mediumtext NOT NULL,
  `offer_description` text NOT NULL,
  `quanity` mediumtext NOT NULL,
  `min_quantity` mediumtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `quantity_left` mediumint(9) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `image_name` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productoffers21`
--

INSERT INTO `productoffers21` (`id`, `product_id`, `farmer_id`, `market_id`, `price`, `offer_description`, `quanity`, `min_quantity`, `status`, `product_status`, `quantity_left`, `count`, `created_at`, `updated_at`, `image_name`) VALUES
(1, 4, 4, 3, '4', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '40', '10', 'closed', 'Ungraded', 10000, 17, 1449067661, 1466589229, '335f66567d2f34708e9f030d336f8ee1.jpg'),
(2, 4, 2, 3, '2', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '100', '20', 'open', 'Passed', 10000, 5, 1449136532, 1464961613, '8246450646ae22ed627dedd20ff32308.jpg'),
(3, 7, 4, 2, '5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '25', '5', 'closed', 'Failed', 10000, 10, 1449152434, 1466500632, 'b0e4865cc3ec52f2df972370c0bcb48e.jpg'),
(4, 8, 4, 3, '0.5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '90', '5', 'closed', 'Passed', 10000, 18, 1449223730, 1449585920, NULL),
(6, 6, 2, 2, '5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '100', '20', 'open', 'Passed', 10000, 3, 1450169535, 1468934459, '7d7d2eba930087fcd9ad2a7848e8a917.jpg'),
(7, 2, 2, 2, '90', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '70', '60', 'open', 'Passed', 10000, 2, 1451999473, 1464689001, '50c65cc72c2ffb9315fa6d1f64395e9c.jpg'),
(8, 11, 4, 3, '1', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '100', '10', 'open', 'Failed', 10000, 7, 1452176817, 1464954006, '03a6b8ed4b83ff39c2e4a6f14a623ce6.jpg'),
(9, 10, 2, 3, '23', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '45', '5', 'open', 'Passed', 10000, 0, 1454491528, 1464688704, 'c717ac7761cfd73a78feb9de62b2e7e3.jpg'),
(10, 9, 2, 3, '3', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '50', '5', 'open', 'Failed', 10000, 0, 1454866121, 1464688718, '6819ddb5e3c3604792860f69c2d34a51.jpg'),
(11, 4, 2, 2, '2', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '45', '5', 'open', 'Passed', 10000, 2, 1454917618, 1464688748, '44ac649fc962783fde9de7612f207d03.jpg'),
(12, 13, 4, 4, '1', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '50', '5', 'open', 'Failed', 10000, 3, 1455171726, 1464954146, 'c55fa0bc8a4547e65414d259d3045004.png'),
(14, 15, 2, 2, '0.5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '5', '2', 'open', 'Failed', 10000, 1, 1455553448, 1469210976, '27e38bc835bcea4926d1a8fd77d0fc3d.jpg'),
(18, 6, 2, 3, '3.50', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '25.5', '5.5', 'open', 'Ungraded', 9900, 2, 1455774352, 1471508146, '96c77fddb911d64474af741a69f43788.jpg'),
(25, 1, 2, 3, '0.5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '20', '5', 'open', 'Ungraded', 10000, 1, 1463653319, 1469025133, 'd56ff348028ed19c52af6fbe5c16f38f.jpg'),
(27, 1, 28, 4, '2.50', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '600', '10', 'open', 'Failed', 10000, 15, 1464961252, 1470818682, '35e0b78d004bcd51123beef70935e5c5.jpg'),
(28, 8, 17, 2, '0.50', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '2 Tonnes', '1 Bucket', 'open', 'Passed', 7880, 3, 1465286891, 1471426583, 'f9c2039131a63b2d29135749cdd7496a.jpg'),
(29, 1, 29, 2, '24', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '120', '20', 'open', 'Passed', 9960, 7, 1466765144, 1470838072, 'bb3cc494264d659120f4a00114418bf3.jpg'),
(30, 1, 32, 3, '9.99', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '200', '20', 'open', 'Ungraded', 5520, 24, 1467876425, 1471442023, '9c6558560ea420b9c6b1c94de449f750.jpg'),
(31, 15, 29, 3, '5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '100', '10', 'open', 'Ungraded', 100, 0, 1471428859, 1471428859, 'c80e1c9d560f7b17df5897332e1dc203.jpg'),
(32, 1, 2, 3, '0.23', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '100', '10', 'open', 'Ungraded', 75, 1, 1471436690, 1471514470, 'add52c57d24094c7d32729f9be1d68bd.jpg'),
(33, 15, 29, 4, '3', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '100', '10', 'open', 'Ungraded', 80, 1, 1471441855, 1471523418, '98f14df93cda9bc243484407611ff03e.jpg'),
(34, 8, 40, 4, '5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '1000', '100', 'open', 'Ungraded', 1000, 0, 1471514292, 1471514292, '41b61602584c89f1db8d1d002563a6cd.jpg'),
(35, 8, 41, 3, '5', 'We have very juicy lemons suitable for creating lemonades, and ice tea. Our lemons are not just like others. They are unique and you will have to see for yourself!', '1000', '50', 'open', 'Ungraded', 900, 1, 1471526134, 1471526209, '93cb86b4f7fc78734f6fb48a42e40696.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `measurement_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `measurement_id`, `producttype_id`, `created_at`, `updated_at`) VALUES
(1, 'Maize', 2, 7, 1448886194, 1448886712),
(2, 'Avocado Pears', 2, 7, 1448886480, 1448886480),
(3, 'Bananas', 2, 7, 1448886508, 1448886508),
(4, 'Sorghum', 2, 7, 1448886537, 1448903736),
(5, 'Guava', 2, 7, 1448886574, 1448903750),
(6, 'Lemons', 2, 7, 1448886605, 1448886605),
(7, 'Millet', 2, 7, 1448886631, 1448886631),
(8, 'Wheat', 2, 8, 1448886672, 1448903772),
(9, 'Nartjies', 2, 7, 1448886774, 1448886774),
(10, 'Nectarines', 2, 7, 1448886909, 1448886909),
(11, 'Rice', 2, 2, 1448886946, 1448886946),
(12, 'Paw paw ', 2, 7, 1448886979, 1448886979),
(13, 'Rapoko', 2, 7, 1448887016, 1448887016),
(14, 'Pears', 2, 7, 1448887034, 1448887034),
(15, 'Pineapple', 2, 7, 1448887071, 1448887071),
(16, 'Strawberries', 2, 7, 1448887100, 1448903794),
(17, 'Boabab Fruit', 2, 8, 1448887621, 1448903839),
(18, 'Nyii', 2, 8, 1448887644, 1448903842),
(19, 'Masawu', 2, 8, 1448887669, 1448903968),
(20, 'Matohwe', 2, 8, 1448887693, 1448903848),
(21, 'Tsubvu', 2, 8, 1448887716, 1448887716),
(22, 'Cassava', 2, 3, 1448887742, 1448887742),
(23, 'Madhumbe', 2, 3, 1448887773, 1448887773),
(24, 'Potatoes', 2, 3, 1448887794, 1448887794),
(25, 'Sweet Potatoes', 2, 3, 1448887820, 1448903853),
(26, 'Cucumber', 2, 2, 1448888439, 1448888439),
(27, 'Horned Cucumber', 2, 2, 1448888475, 1448903978),
(28, 'Butternut', 2, 2, 1448888499, 1448888499),
(29, 'Jamsquash', 2, 2, 1448888527, 1448888527),
(30, 'Pumpkin', 2, 2, 1448888551, 1448888551),
(31, 'Watermelon', 2, 2, 1448888588, 1448888588),
(32, 'Mapudzi', 2, 2, 1448888619, 1448888619),
(33, 'Beans Dried', 2, 9, 1448888643, 1448903860),
(34, 'Cow Peas', 2, 9, 1448888688, 1448903985),
(35, 'Groundnuts Dried Shelled', 2, 9, 1448888727, 1448903990),
(36, 'Groundnuts Dried Unshelled', 2, 9, 1448888761, 1448904001),
(37, 'Groundnuts Fresh', 2, 9, 1448888796, 1448904006),
(38, 'Roundnuts Dried Shelled', 2, 9, 1448888876, 1448904012),
(39, 'Roundnuts Dried Unshelled', 2, 9, 1448888907, 1448904019),
(40, 'Roundnuts Fresh', 2, 9, 1448888932, 1448904046),
(41, 'Sorghum Red', 2, 6, 1448888973, 1448904051),
(42, 'Sorghum White', 2, 6, 1448889005, 1448904065),
(43, 'Rapoko', 2, 6, 1448889035, 1448904072),
(44, 'Popcorn', 2, 6, 1448889065, 1448904077),
(45, 'Maize Fresh', 2, 6, 1448889112, 1448904084),
(46, 'Maize Dried', 2, 6, 1448889144, 1448889144),
(47, 'Rice', 2, 6, 1448889167, 1448904091),
(48, 'Sweet Reed', 4, 6, 1448889235, 1448889235),
(49, 'Sugar Cane', 4, 6, 1448889274, 1448889274),
(50, 'Baby Marrow', 2, 5, 1448889648, 1448889648),
(51, 'Cabbage', 3, 5, 1448889715, 1448889715),
(52, 'Broccoli', 3, 5, 1448889753, 1448889753),
(53, 'Carrots', 2, 5, 1448889785, 1448889785),
(54, 'Cauliflower', 3, 5, 1448889813, 1448889813),
(55, 'Chilli Pepper', 2, 5, 1448889857, 1448889857),
(56, 'Egg Plant', 2, 5, 1448889895, 1448889895),
(57, 'Garlic', 2, 5, 1448889931, 1448889931),
(58, 'Ginger', 2, 5, 1448889962, 1448889962),
(59, 'Beans Green', 2, 9, 1448890004, 1448890004),
(60, 'Green Pepper', 2, 5, 1448890082, 1448890082),
(61, 'Leafy Vegetables', 4, 5, 1448890117, 1448890117),
(62, 'Lettuce', 3, 5, 1448890142, 1448890142),
(63, 'Mufushwa', 2, 5, 1448890202, 1448904095),
(64, 'Mushroom', 2, 5, 1448890299, 1448904103),
(65, 'Nyevhe', 4, 5, 1448890319, 1448890319),
(66, 'Okra', 2, 5, 1448890349, 1448890349),
(67, 'Onion ', 2, 5, 1448890390, 1448890390),
(68, 'Onion Shallots', 4, 5, 1448890434, 1448890434),
(69, 'Peas Fresh Shelled', 2, 9, 1448890464, 1448890464),
(70, 'Peas Fresh Unshelled', 2, 9, 1448890497, 1448890497),
(71, 'Peas Dried Shelled', 2, 9, 1448890527, 1448890579),
(72, 'Peas Dried Unshelled', 2, 9, 1448890560, 1448890560),
(73, 'Pumpkin Leaves', 4, 5, 1448890611, 1448890611),
(74, 'Cassava', 2, 5, 1448890638, 1448890638),
(75, 'Cattle', 11, 1, 1448890850, 1448890850),
(76, 'Goat', 11, 1, 1448890874, 1448890874),
(77, 'Sheep', 11, 1, 1448890897, 1448890897),
(78, 'Pig', 11, 1, 1448890920, 1448890920),
(79, 'Chickens', 11, 1, 1448890975, 1448890975);

-- --------------------------------------------------------

--
-- Table structure for table `producttypes`
--

CREATE TABLE `producttypes` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producttypes`
--

INSERT INTO `producttypes` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Livestock', 'These are farm animals regarded as an asset', 1448877493, 1448877493),
(2, 'Gourd', 'A fleshy, typically large fruit with a hard skin, some varieties of which are edible.', 1448877547, 1448877657),
(3, 'Tuber', 'A much thickened underground part of a stem or rhizome, serving as a food reserve and bearing buds from which new plants arise.', 1448877632, 1448877632),
(5, 'Vegetable', 'A plant or part of a plant used as food', 1448877724, 1448877767),
(6, 'Cereal', 'A grain used for food.', 1448877793, 1448877793),
(7, 'Fruit', 'The sweet and fleshy product of a tree or other plant that contains seed and can be eaten as food.', 1448877869, 1448877869),
(8, 'Indigenous Fruit', 'Fruit originating or occurring naturally in Zimbabwe.', 1448877952, 1448877952),
(9, 'Legumes', 'A leguminous plant, especially one grown as a crop.', 1448887264, 1448887264);

-- --------------------------------------------------------

--
-- Table structure for table `product_variablecost_complexformulas`
--

CREATE TABLE `product_variablecost_complexformulas` (
  `id` int(11) UNSIGNED NOT NULL,
  `affectedhectars` double NOT NULL,
  `rate` double NOT NULL,
  `denominator` double NOT NULL,
  `price` double NOT NULL,
  `product_variablecost_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_variablecost_stages`
--

CREATE TABLE `product_variablecost_stages` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_variablecost_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_variablecost_stage_targetyields`
--

CREATE TABLE `product_variablecost_stage_targetyields` (
  `id` int(11) UNSIGNED NOT NULL,
  `value` double NOT NULL,
  `targetyield_id` int(11) NOT NULL,
  `product_variablecost_stage_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profilepics`
--

CREATE TABLE `profilepics` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `saved_as` varchar(255) NOT NULL,
  `actual_name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profilepics`
--

INSERT INTO `profilepics` (`id`, `user_id`, `saved_as`, `actual_name`, `created_at`, `updated_at`) VALUES
(1, 53, '32013228f94fbf32b7f27026533d6580.pdf', 'vLab Systems Contractor Agreement - Alvin 1.pdf', 1474965300, 1474965300),
(2, 53, '6c1ff87fb66fdc66e7cc3ad14d8d776a.jpg', 'aroverview.jpg', 1474969651, 1474969651),
(3, 53, 'f00d64569e71eedb0531b82ad0255166.PNG', 'domestos.PNG', 1474979923, 1474979923),
(4, 53, 'a94c6e2d0b60a7901b2bcf6bda3f64aa.PNG', 'domestos.PNG', 1474979936, 1474979936),
(5, 2, '7fb9ad4d9b199016735cc2b6ff3c27d7.JPG', 'WIN_20160608_105502.JPG', 1474982355, 1474982355),
(6, 2, '036493a302bf4761296d95fb4fcbfc66.JPG', 'WIN_20160608_105447.JPG', 1474982944, 1474982944),
(7, 2, '968bd4b4f7f5817baa5c826e2b6855a9.JPG', 'WIN_20160924_053251.JPG', 1474982965, 1474982965),
(8, 2, 'be2b657a3b336f975d6290ff2a98902a.JPG', 'WIN_20160608_105447.JPG', 1474982985, 1474982985),
(9, 53, '017323427de0027ca1eb9e7fdcdfa7c3.jpg', 'suit.jpg', 1475137795, 1475137795),
(10, 53, '1e819845ef6f0ef0471f565681e1c741.jpg', 'woman.jpg', 1475145137, 1475145137),
(11, 53, '34ebea75d7fa40c07ef218ddbf203eaf.jpg', 'suit.jpg', 1475146064, 1475146064),
(12, 53, '30e89ba7ff3ece32be5ab8d81acd71a4.jpg', 'woman.jpg', 1475147822, 1475147822),
(13, 42, '1675d704d5a20581909fc4ebaf7cf861.jpg', 'suit.jpg', 1475151271, 1475151271),
(14, 42, '5ed9aa592907fe13a8f5162b521f6094.jpg', 'woman.jpg', 1475152814, 1475152814),
(15, 42, 'ee0072ba27ecffbfaa5a35285a09fd97.jpg', 'suit.jpg', 1475156691, 1475156691),
(16, 29, '36de26b245951f0f7a34695675a97c60.jpg', 'Nyasha In Blue (3).jpg', 1493385283, 1493385283),
(17, 57, '4a6684424e57eda282eade23277e0f12.jpg', 'image.jpg', 1498733497, 1498733497),
(18, 2, '6c407578b1ab4ef6dfbbe9279b4e6aab.png', 'logo-1.png', 1500536030, 1500536030),
(19, 2, 'b98b4ceff5a3a34034c7395252c43aee.png', 'logo-1 (1).png', 1500536400, 1500536400),
(20, 2, 'e0a304e874824507e9592e6fdcba83c7.jpg', 'Untitled-1.jpg', 1500890121, 1500890121),
(21, 2, 'd4d62468e6a782a9da1cc60d84a8ea1f.jpg', 'bfp.jpg', 1500890365, 1500890365),
(22, 58, '3deb89541f1d598b059c34e3c983ba13.jpg', '20170701_131319.jpg', 1502120360, 1502120360),
(23, 2, '8c861f3cd6b59cbc8de72d8ff135a5bf.png', 'support_2.png', 1532503699, 1532503699);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `expected_yield` mediumint(9) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `product_id`, `name`, `expected_yield`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apples_Region_3', 20, 1487079853, NULL),
(2, 45, 'Maize Fresh_Region 4', 35, 1487754736, NULL),
(3, 1, 'Apples R2', 10, 1493378075, NULL),
(4, 1, 'Apples Rekai Tangwena district', 13, 1493387503, 0),
(5, 11, 'Oranges R2', 8, 1498722605, NULL),
(6, 7, 'Mango_Region_1', 3, 1498803684, NULL),
(7, 3, 'Bananas_R3', 21, 1498814220, NULL),
(8, 11, 'Oranges Region 3', 12, 1500460362, NULL),
(9, 15, 'Pine Apple Region 4', 40, 1500467942, NULL),
(10, 46, 'Maize Dried Region 4', 500, 1500468953, NULL),
(11, 5, 'Guava Regions 2', 30, 1500538601, NULL),
(12, 74, 'Tomatoes ', 40, 1500539193, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_conditions`
--

CREATE TABLE `project_conditions` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `condition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_conditions`
--

INSERT INTO `project_conditions` (`id`, `project_id`, `condition_id`) VALUES
(10, 1, 2),
(11, 2, 2),
(12, 3, 2),
(13, 4, 2),
(14, 5, 2),
(15, 6, 2),
(16, 7, 2),
(17, 8, 2),
(18, 9, 2),
(19, 10, 2),
(20, 11, 2),
(21, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_filtered_resources`
--

CREATE TABLE `project_filtered_resources` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `variablecost_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_filtered_resources`
--

INSERT INTO `project_filtered_resources` (`id`, `project_id`, `variablecost_id`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 1486547886, NULL),
(7, 1, 2, 1486547887, NULL),
(8, 2, 1, 1486559882, NULL),
(9, 3, 1, 1486643191, NULL),
(10, 3, 2, 1486643191, NULL),
(11, 4, 1, 1487075752, NULL),
(12, 4, 2, 1487075752, NULL),
(13, 2, 2, 1487754798, NULL),
(14, 2, 3, 1487754798, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_filtered_tasks`
--

CREATE TABLE `project_filtered_tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_filtered_tasks`
--

INSERT INTO `project_filtered_tasks` (`id`, `project_id`, `task_id`, `created_at`, `updated_at`) VALUES
(5, 1, 12, 1486547886, NULL),
(6, 1, 13, 1486547886, NULL),
(7, 2, 14, 1486559882, NULL),
(8, 2, 15, 1486559882, NULL),
(9, 3, 14, 1486643191, NULL),
(10, 3, 15, 1486643191, NULL),
(11, 4, 14, 1487075751, NULL),
(12, 4, 15, 1487075751, NULL),
(13, 1, 14, 1487079865, NULL),
(14, 2, 16, 1487754798, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_regions`
--

CREATE TABLE `project_regions` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_regions`
--

INSERT INTO `project_regions` (`id`, `project_id`, `region_id`) VALUES
(10, 1, 2),
(11, 2, 4),
(12, 3, 2),
(13, 4, 2),
(14, 5, 2),
(15, 6, 2),
(16, 7, 3),
(17, 8, 3),
(18, 9, 2),
(19, 10, 2),
(20, 11, 2),
(21, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_soiltypes`
--

CREATE TABLE `project_soiltypes` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `soiltype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_soiltypes`
--

INSERT INTO `project_soiltypes` (`id`, `project_id`, `soiltype_id`) VALUES
(10, 1, 5),
(11, 2, 6),
(12, 3, 5),
(13, 4, 5),
(14, 5, 5),
(15, 6, 5),
(16, 7, 5),
(17, 8, 5),
(18, 9, 5),
(19, 10, 5),
(20, 11, 5),
(21, 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `project_stages`
--

CREATE TABLE `project_stages` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `prefix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_stages`
--

INSERT INTO `project_stages` (`id`, `project_id`, `stage_id`, `position`, `prefix`) VALUES
(1, 1, 5, NULL, NULL),
(2, 1, 6, NULL, NULL),
(3, 2, 11, NULL, NULL),
(4, 2, 12, NULL, NULL),
(5, 3, 5, 0, NULL),
(6, 3, 6, 1, NULL),
(7, 3, 7, 2, NULL),
(8, 3, 8, 3, NULL),
(9, 4, 11, NULL, NULL),
(10, 4, 12, NULL, NULL),
(11, 4, 13, NULL, NULL),
(13, 5, 5, 0, NULL),
(14, 5, 6, 1, NULL),
(15, 5, 7, 2, NULL),
(16, 5, 8, 3, NULL),
(17, 5, 9, 4, NULL),
(18, 7, 5, NULL, NULL),
(19, 7, 7, NULL, NULL),
(20, 7, 8, NULL, NULL),
(21, 8, 5, 0, NULL),
(22, 8, 6, 1, NULL),
(23, 8, 7, 2, NULL),
(24, 8, 8, 3, NULL),
(25, 9, 11, NULL, NULL),
(26, 9, 12, NULL, NULL),
(27, 9, 13, NULL, NULL),
(28, 9, 14, NULL, NULL),
(29, 10, 5, NULL, NULL),
(30, 10, 6, NULL, NULL),
(31, 10, 7, NULL, NULL),
(32, 10, 8, NULL, NULL),
(33, 10, 10, NULL, NULL),
(34, 6, 5, NULL, NULL),
(35, 6, 8, NULL, NULL),
(36, 11, 11, NULL, NULL),
(37, 11, 12, NULL, NULL),
(38, 11, 13, NULL, NULL),
(39, 11, 14, NULL, NULL),
(40, 12, 6, NULL, NULL),
(41, 12, 7, NULL, NULL),
(42, 12, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_stage_tasks`
--

CREATE TABLE `project_stage_tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_stage_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `duration` double DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `prefix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_stage_tasks`
--

INSERT INTO `project_stage_tasks` (`id`, `project_stage_id`, `task_id`, `duration`, `created_at`, `updated_at`, `position`, `prefix`) VALUES
(1, 1, 14, 0, 1487079876, NULL, NULL, NULL),
(2, 2, 14, 0, 1487079876, NULL, NULL, NULL),
(3, 3, 15, 5, 1487754840, NULL, NULL, NULL),
(4, 3, 16, 4, 1487754840, NULL, NULL, NULL),
(5, 4, 14, 3, 1487754840, NULL, NULL, NULL),
(6, 4, 15, 2, 1487754840, NULL, NULL, NULL),
(7, 5, 14, 3, 1493378184, 1493378451, 0, 0),
(8, 5, 15, 2, 1493378184, 1493378530, 1, 7),
(9, 6, 16, 2, 1493378184, 1493378530, 2, 8),
(10, 7, 17, 1, 1493378184, 1493378530, 3, 9),
(11, 8, 18, 5, 1493378184, 1493378530, 4, 10),
(12, 9, 14, 5, 1493387566, NULL, NULL, NULL),
(13, 10, 15, 4, 1493387566, NULL, NULL, NULL),
(15, 11, 17, 3, 1493387566, NULL, NULL, NULL),
(17, 13, 14, 2, 1498722670, 1498722911, 0, 0),
(18, 14, 15, 4, 1498722670, 1498722911, 1, 17),
(19, 15, 16, 4, 1498722670, 1498722911, 2, 18),
(20, 15, 17, 4, 1498722670, 1498722911, 3, 19),
(21, 16, 18, 2, 1498722670, 1498722911, 4, 20),
(22, 18, 14, 2, 1498814314, NULL, NULL, NULL),
(23, 19, 16, 5, 1498814314, NULL, NULL, NULL),
(24, 20, 18, 2, 1498814314, NULL, NULL, NULL),
(25, 21, 14, 2, 1500460492, 1500460868, 1, 0),
(26, 22, 15, 3, 1500460492, 1500460868, 2, 25),
(27, 22, 16, 4, 1500460492, 1500460868, 3, 26),
(28, 23, 17, 1, 1500460492, 1500460868, 4, 27),
(29, 24, 18, 3, 1500460492, 1500460868, 0, 28),
(30, 25, 14, 0, 1500468064, NULL, NULL, NULL),
(31, 26, 15, 0, 1500468064, NULL, NULL, NULL),
(32, 27, 16, 0, 1500468064, NULL, NULL, NULL),
(33, 28, 18, 0, 1500468064, NULL, NULL, NULL),
(34, 29, 14, 0, 1500470787, NULL, NULL, NULL),
(35, 30, 15, 0, 1500470787, NULL, NULL, NULL),
(36, 31, 16, 0, 1500470787, NULL, NULL, NULL),
(37, 30, 17, 0, 1500470787, NULL, NULL, NULL),
(38, 32, 18, 0, 1500470787, NULL, NULL, NULL),
(39, 34, 16, 2, 1500537182, NULL, NULL, NULL),
(40, 34, 14, 2, 1500537287, NULL, NULL, NULL),
(41, 35, 18, 2, 1500537336, NULL, NULL, NULL),
(42, 36, 14, 2, 1500538701, NULL, NULL, NULL),
(43, 37, 15, 3, 1500538701, NULL, NULL, NULL),
(44, 38, 16, 1, 1500538701, NULL, NULL, NULL),
(45, 39, 17, 2, 1500538701, NULL, NULL, NULL),
(46, 40, 14, 3, 1500539262, NULL, NULL, NULL),
(47, 40, 15, 3, 1500539262, NULL, NULL, NULL),
(48, 41, 16, 2, 1500539262, NULL, NULL, NULL),
(49, 42, 17, 2, 1500539262, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_stage_task_variablecosts`
--

CREATE TABLE `project_stage_task_variablecosts` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_stage_task_id` int(11) NOT NULL,
  `variablecost_id` int(11) NOT NULL,
  `unitprice` double NOT NULL,
  `qty` double NOT NULL,
  `pertonner` tinyint(1) NOT NULL,
  `notes` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_stage_task_variablecosts`
--

INSERT INTO `project_stage_task_variablecosts` (`id`, `project_stage_task_id`, `variablecost_id`, `unitprice`, `qty`, `pertonner`, `notes`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 5, 8, 0, '', 1487754978, NULL),
(2, 3, 2, 7, 50, 0, '', 1487754978, NULL),
(3, 4, 3, 3, 50, 0, '', 1487754978, NULL),
(4, 5, 1, 34, 23, 0, '', 1487754978, NULL),
(5, 5, 3, 23, 4, 0, '', 1487754979, NULL),
(6, 6, 2, 12, 34, 0, '', 1487754979, NULL),
(7, 7, 1, 1.25, 10, 0, 'Manpower', 1493378379, NULL),
(8, 7, 2, 2.5, 200, 1, 'Apply fertilizer', 1493378379, NULL),
(9, 8, 1, 1.25, 10, 0, 'Test', 1493378379, NULL),
(10, 8, 3, 3, 300, 1, 'Test', 1493378379, NULL),
(11, 9, 1, 1.25, 10, 0, 'test', 1493378379, NULL),
(12, 10, 2, 2.5, 200, 1, 'affects yield', 1493378379, NULL),
(13, 11, 1, 1.25, 45, 0, 'test', 1493378379, NULL),
(14, 17, 1, 2.5, 10, 0, 'test', 1498722802, NULL),
(15, 18, 1, 2.5, 10, 0, 'test', 1498722803, NULL),
(16, 18, 3, 1.25, 1000, 1, 'test', 1498722803, NULL),
(17, 19, 1, 2.5, 10, 0, '', 1498722803, NULL),
(18, 20, 2, 10, 20, 0, '', 1498722803, NULL),
(19, 21, 1, 1, 10, 0, '', 1498722803, NULL),
(20, 22, 1, 1.5, 12, 0, '', 1498814388, NULL),
(21, 22, 2, 2, 13, 0, '', 1498814388, NULL),
(22, 23, 1, 2, 13, 0, '', 1498814388, NULL),
(23, 24, 1, 1, 50, 0, '', 1498814388, NULL),
(24, 25, 1, 1.25, 10, 0, 'labour', 1500460734, NULL),
(25, 25, 2, 1.05, 100, 1, 'fertilizer', 1500460734, NULL),
(26, 26, 1, 1.25, 10, 0, 'labour', 1500460734, NULL),
(27, 26, 3, 1, 200, 1, 'seeds', 1500460734, NULL),
(28, 27, 1, 1.25, 10, 0, 'labour', 1500460734, NULL),
(29, 28, 1, 1.25, 10, 0, 'labour', 1500460734, NULL),
(30, 28, 2, 0.95, 50, 1, 'fertilizer', 1500460734, NULL),
(31, 29, 1, 1.25, 10, 0, 'labour', 1500460734, NULL),
(32, 30, 1, 2, 20, 0, 'labor for fertilizer', 1500468848, NULL),
(33, 30, 2, 0, 100, 0, 'fertilizer', 1500468848, NULL),
(34, 31, 1, 1.2, 20, 0, 'labour for plantation.', 1500468848, NULL),
(35, 31, 3, 0, 50, 0, 'seeds for plantation.', 1500468848, NULL),
(36, 32, 1, 1.2, 15, 0, 'Labour for weeding', 1500468848, NULL),
(37, 33, 1, 1.5, 20, 0, '', 1500468848, NULL),
(38, 34, 1, 1.2, 30, 0, '', 1500471812, NULL),
(39, 34, 2, 0.6, 100, 0, '', 1500471812, NULL),
(40, 35, 1, 1.2, 20, 0, '', 1500471812, NULL),
(41, 35, 3, 0.9, 100, 0, '', 1500471812, NULL),
(42, 36, 1, 0.9, 20, 0, '', 1500471812, NULL),
(43, 37, 1, 0.7, 10, 0, '', 1500471812, NULL),
(44, 37, 2, 0.9, 100, 0, '', 1500471812, NULL),
(45, 38, 1, 1.1, 20, 0, '', 1500471813, NULL),
(46, 12, 1, 2.3, 5, 0, '			labour added	\r\n			', 1500536660, NULL),
(47, 12, 2, 0.7, 100, 0, '				\r\n		fertilizes	', 1500536660, NULL),
(48, 12, 3, 2, 5, 0, '				\r\n			', 1500536660, NULL),
(49, 1, 1, 2.1, 15, 0, '		Labour for preparation		\r\n			', 1500536989, NULL),
(50, 1, 3, 2.2, 200, 0, '				\r\n		seeds to beready by preparation	', 1500536989, NULL),
(51, 2, 1, 2.5, 15, 0, '			labour for swing	\r\n			', 1500537079, NULL),
(52, 2, 3, 2.2, 200, 0, '		seeds for plantation		\r\n			', 1500537079, NULL),
(53, 39, 1, 2.5, 10, 0, '				labour for weeding orange plantations\r\n			', 1500537182, NULL),
(54, 40, 1, 1.5, 10, 0, '		Labour for fertilization		\r\n			', 1500537287, NULL),
(55, 40, 2, 3.1, 200, 0, '	fertilizer required for plantation.			\r\n			', 1500537287, NULL),
(56, 41, 1, 1.2, 20, 0, '				\r\nLabour for harvest.			', 1500537336, NULL),
(57, 13, 1, 2.2, 15, 0, '		Labour for plantation		\r\n			', 1500537520, NULL),
(58, 13, 3, 1.7, 200, 0, '	seeds for plantation..\r\n			\r\n			', 1500537520, NULL),
(59, 15, 1, 0.6, 10, 0, '				\r\n			', 1500537694, NULL),
(60, 15, 2, 0.8, 300, 0, '				\r\n			', 1500537694, NULL),
(61, 42, 1, 1.7, 10, 0, '', 1500539086, NULL),
(62, 42, 2, 0.6, 100, 0, '', 1500539086, NULL),
(63, 43, 1, 1.6, 10, 0, '', 1500539086, NULL),
(64, 43, 3, 0.9, 150, 0, '', 1500539086, NULL),
(65, 44, 1, 1.6, 15, 0, '', 1500539086, NULL),
(66, 45, 1, 1.6, 10, 0, '', 1500539086, NULL),
(67, 45, 2, 0.8, 100, 0, '', 1500539086, NULL),
(68, 46, 1, 1.5, 10, 0, '', 1500539493, NULL),
(69, 46, 2, 1.1, 50, 0, '', 1500539493, NULL),
(70, 47, 1, 1.6, 10, 0, '', 1500539493, NULL),
(71, 47, 3, 2.6, 30, 0, '', 1500539494, NULL),
(72, 48, 1, 1.6, 15, 0, '', 1500539494, NULL),
(73, 49, 1, 1.6, 10, 0, '', 1500539494, NULL),
(74, 49, 2, 0.9, 50, 0, '', 1500539494, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_variablecosts`
--

CREATE TABLE `project_variablecosts` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `variable_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `unitprice` double NOT NULL,
  `qty` double NOT NULL,
  `pertonne` tinyint(1) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `notes` text NOT NULL,
  `duration` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provinces_list`
--

CREATE TABLE `provinces_list` (
  `id` int(11) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces_list`
--

INSERT INTO `provinces_list` (`id`, `country_id`, `name`) VALUES
(1, 1, 'Badakhshan'),
(2, 1, 'Badghis'),
(3, 1, 'Baghlan'),
(4, 1, 'Balkh'),
(5, 1, 'Bamian'),
(6, 1, 'Farah'),
(7, 1, 'Faryab'),
(8, 1, 'Ghazni'),
(9, 1, 'Ghowr'),
(10, 1, 'Helmand'),
(11, 1, 'Herat'),
(12, 1, 'Jowzjan'),
(13, 1, 'Kabol'),
(14, 1, 'Kandahar'),
(15, 1, 'Kapisa'),
(16, 1, 'Konar'),
(17, 1, 'Kondoz'),
(18, 1, 'Laghman'),
(19, 1, 'Lowgar'),
(20, 1, 'Nangarhar'),
(21, 1, 'Nimruz'),
(22, 1, 'Oruzgan'),
(23, 1, 'Paktia'),
(24, 1, 'Paktika'),
(25, 1, 'Parvan'),
(26, 1, 'Samangan'),
(27, 1, 'Sar-e Pol'),
(28, 1, 'Takhar'),
(29, 1, 'Vardak'),
(30, 1, 'Zabol'),
(31, 2, 'Berat'),
(32, 2, 'Bulqize'),
(33, 2, 'Delvine'),
(34, 2, 'Devoll (Bilisht)'),
(35, 2, 'Diber (Peshkopi)'),
(36, 2, 'Durres'),
(37, 2, 'Elbasan'),
(38, 2, 'Fier'),
(39, 2, 'Gjirokaster'),
(40, 2, 'Gramsh'),
(41, 2, 'Has (Krume)'),
(42, 2, 'Kavaje'),
(43, 2, 'Kolonje (Erseke)'),
(44, 2, 'Korce'),
(45, 2, 'Kruje'),
(46, 2, 'Kucove'),
(47, 2, 'Kukes'),
(48, 2, 'Kurbin'),
(49, 2, 'Lezhe'),
(50, 2, 'Librazhd'),
(51, 2, 'Lushnje'),
(52, 2, 'Malesi e Madhe (Koplik)'),
(53, 2, 'Mallakaster (Ballsh)'),
(54, 2, 'Mat (Burrel)'),
(55, 2, 'Mirdite (Rreshen)'),
(56, 2, 'Peqin'),
(57, 2, 'Permet'),
(58, 2, 'Pogradec'),
(59, 2, 'Puke'),
(60, 2, 'Sarande'),
(61, 2, 'Shkoder'),
(62, 2, 'Skrapar (Corovode)'),
(63, 2, 'Tepelene'),
(64, 2, 'Tirane (Tirana)'),
(65, 2, 'Tirane (Tirana)'),
(66, 2, 'Tropoje (Bajram Curri)'),
(67, 2, 'Vlore'),
(68, 3, 'Adrar'),
(69, 3, 'Ain Defla'),
(70, 3, 'Ain Temouchent'),
(71, 3, 'Alger'),
(72, 3, 'Annaba'),
(73, 3, 'Batna'),
(74, 3, 'Bechar'),
(75, 3, 'Bejaia'),
(76, 3, 'Biskra'),
(77, 3, 'Blida'),
(78, 3, 'Bordj Bou Arreridj'),
(79, 3, 'Bouira'),
(80, 3, 'Boumerdes'),
(81, 3, 'Chlef'),
(82, 3, 'Constantine'),
(83, 3, 'Djelfa'),
(84, 3, 'El Bayadh'),
(85, 3, 'El Oued'),
(86, 3, 'El Tarf'),
(87, 3, 'Ghardaia'),
(88, 3, 'Guelma'),
(89, 3, 'Illizi'),
(90, 3, 'Jijel'),
(91, 3, 'Khenchela'),
(92, 3, 'Laghouat'),
(93, 3, 'M\'Sila'),
(94, 3, 'Mascara'),
(95, 3, 'Medea'),
(96, 3, 'Mila'),
(97, 3, 'Mostaganem'),
(98, 3, 'Naama'),
(99, 3, 'Oran'),
(100, 3, 'Ouargla'),
(101, 3, 'Oum el Bouaghi'),
(102, 3, 'Relizane'),
(103, 3, 'Saida'),
(104, 3, 'Setif'),
(105, 3, 'Sidi Bel Abbes'),
(106, 3, 'Skikda'),
(107, 3, 'Souk Ahras'),
(108, 3, 'Tamanghasset'),
(109, 3, 'Tebessa'),
(110, 3, 'Tiaret'),
(111, 3, 'Tindouf'),
(112, 3, 'Tipaza'),
(113, 3, 'Tissemsilt'),
(114, 3, 'Tizi Ouzou'),
(115, 3, 'Tlemcen'),
(116, 4, 'Eastern'),
(117, 4, 'Manu\'a'),
(118, 4, 'Rose Island'),
(119, 4, 'Swains Island'),
(120, 4, 'Western'),
(121, 5, 'Andorra la Vella'),
(122, 5, 'Bengo'),
(123, 5, 'Benguela'),
(124, 5, 'Bie'),
(125, 5, 'Cabinda'),
(126, 5, 'Canillo'),
(127, 5, 'Cuando Cubango'),
(128, 5, 'Cuanza Norte'),
(129, 5, 'Cuanza Sul'),
(130, 5, 'Cunene'),
(131, 5, 'Encamp'),
(132, 5, 'Escaldes-Engordany'),
(133, 5, 'Huambo'),
(134, 5, 'Huila'),
(135, 5, 'La Massana'),
(136, 5, 'Luanda'),
(137, 5, 'Lunda Norte'),
(138, 5, 'Lunda Sul'),
(139, 5, 'Malanje'),
(140, 5, 'Moxico'),
(141, 5, 'Namibe'),
(142, 5, 'Ordino'),
(143, 5, 'Sant Julia de Loria'),
(144, 5, 'Uige'),
(145, 5, 'Zaire'),
(146, 6, 'Anguilla'),
(147, 7, 'Antartica'),
(148, 8, 'Barbuda'),
(149, 8, 'Redonda'),
(150, 8, 'Saint George'),
(151, 8, 'Saint John'),
(152, 8, 'Saint Mary'),
(153, 8, 'Saint Paul'),
(154, 8, 'Saint Peter'),
(155, 8, 'Saint Philip'),
(156, 9, 'Antartica e Islas del Atlantico Sur'),
(157, 9, 'Buenos Aires'),
(158, 9, 'Buenos Aires Capital Federal'),
(159, 9, 'Catamarca'),
(160, 9, 'Chaco'),
(161, 9, 'Chubut'),
(162, 9, 'Cordoba'),
(163, 9, 'Corrientes'),
(164, 9, 'Entre Rios'),
(165, 9, 'Formosa'),
(166, 9, 'Jujuy'),
(167, 9, 'La Pampa'),
(168, 9, 'La Rioja'),
(169, 9, 'Mendoza'),
(170, 9, 'Misiones'),
(171, 9, 'Neuquen'),
(172, 9, 'Rio Negro'),
(173, 9, 'Salta'),
(174, 9, 'San Juan'),
(175, 9, 'San Luis'),
(176, 9, 'Santa Cruz'),
(177, 9, 'Santa Fe'),
(178, 9, 'Santiago del Estero'),
(179, 9, 'Tierra del Fuego'),
(180, 9, 'Tucuman'),
(181, 10, 'Aragatsotn'),
(182, 10, 'Ararat'),
(183, 10, 'Armavir'),
(184, 10, 'Geghark\'unik\''),
(185, 10, 'Kotayk\''),
(186, 10, 'Lorri'),
(187, 10, 'Shirak'),
(188, 10, 'Syunik\''),
(189, 10, 'Tavush'),
(190, 10, 'Vayots\' Dzor'),
(191, 10, 'Yerevan'),
(192, 11, 'Aruba'),
(193, 12, 'Ashmore and Cartier Island'),
(194, 13, 'Australian Capital Territory'),
(195, 13, 'New South Wales'),
(196, 13, 'Northern Territory'),
(197, 13, 'Queensland'),
(198, 13, 'South Australia'),
(199, 13, 'Tasmania'),
(200, 13, 'Victoria'),
(201, 13, 'Western Australia'),
(202, 14, 'Burgenland'),
(203, 14, 'Kaernten'),
(204, 14, 'Niederoesterreich'),
(205, 14, 'Oberoesterreich'),
(206, 14, 'Salzburg'),
(207, 14, 'Steiermark'),
(208, 14, 'Tirol'),
(209, 14, 'Vorarlberg'),
(210, 14, 'Wien'),
(211, 15, 'Abseron Rayonu'),
(212, 15, 'Agcabadi Rayonu'),
(213, 15, 'Agdam Rayonu'),
(214, 15, 'Agdas Rayonu'),
(215, 15, 'Agstafa Rayonu'),
(216, 15, 'Agsu Rayonu'),
(217, 15, 'Ali Bayramli Sahari'),
(218, 15, 'Astara Rayonu'),
(219, 15, 'Baki Sahari'),
(220, 15, 'Balakan Rayonu'),
(221, 15, 'Barda Rayonu'),
(222, 15, 'Beylaqan Rayonu'),
(223, 15, 'Bilasuvar Rayonu'),
(224, 15, 'Cabrayil Rayonu'),
(225, 15, 'Calilabad Rayonu'),
(226, 15, 'Daskasan Rayonu'),
(227, 15, 'Davaci Rayonu'),
(228, 15, 'Fuzuli Rayonu'),
(229, 15, 'Gadabay Rayonu'),
(230, 15, 'Ganca Sahari'),
(231, 15, 'Goranboy Rayonu'),
(232, 15, 'Goycay Rayonu'),
(233, 15, 'Haciqabul Rayonu'),
(234, 15, 'Imisli Rayonu'),
(235, 15, 'Ismayilli Rayonu'),
(236, 15, 'Kalbacar Rayonu'),
(237, 15, 'Kurdamir Rayonu'),
(238, 15, 'Lacin Rayonu'),
(239, 15, 'Lankaran Rayonu'),
(240, 15, 'Lankaran Sahari'),
(241, 15, 'Lerik Rayonu'),
(242, 15, 'Masalli Rayonu'),
(243, 15, 'Mingacevir Sahari'),
(244, 15, 'Naftalan Sahari'),
(245, 15, 'Naxcivan Muxtar Respublikasi'),
(246, 15, 'Neftcala Rayonu'),
(247, 15, 'Oguz Rayonu'),
(248, 15, 'Qabala Rayonu'),
(249, 15, 'Qax Rayonu'),
(250, 15, 'Qazax Rayonu'),
(251, 15, 'Qobustan Rayonu'),
(252, 15, 'Quba Rayonu'),
(253, 15, 'Qubadli Rayonu'),
(254, 15, 'Qusar Rayonu'),
(255, 15, 'Saatli Rayonu'),
(256, 15, 'Sabirabad Rayonu'),
(257, 15, 'Saki Rayonu'),
(258, 15, 'Saki Sahari'),
(259, 15, 'Salyan Rayonu'),
(260, 15, 'Samaxi Rayonu'),
(261, 15, 'Samkir Rayonu'),
(262, 15, 'Samux Rayonu'),
(263, 15, 'Siyazan Rayonu'),
(264, 15, 'Sumqayit Sahari'),
(265, 15, 'Susa Rayonu'),
(266, 15, 'Susa Sahari'),
(267, 15, 'Tartar Rayonu'),
(268, 15, 'Tovuz Rayonu'),
(269, 15, 'Ucar Rayonu'),
(270, 15, 'Xacmaz Rayonu'),
(271, 15, 'Xankandi Sahari'),
(272, 15, 'Xanlar Rayonu'),
(273, 15, 'Xizi Rayonu'),
(274, 15, 'Xocali Rayonu'),
(275, 15, 'Xocavand Rayonu'),
(276, 15, 'Yardimli Rayonu'),
(277, 15, 'Yevlax Rayonu'),
(278, 15, 'Yevlax Sahari'),
(279, 15, 'Zangilan Rayonu'),
(280, 15, 'Zaqatala Rayonu'),
(281, 15, 'Zardab Rayonu'),
(282, 16, 'Acklins and Crooked Islands'),
(283, 16, 'Bimini'),
(284, 16, 'Cat Island'),
(285, 16, 'Exuma'),
(286, 16, 'Freeport'),
(287, 16, 'Fresh Creek'),
(288, 16, 'Governor\'s Harbour'),
(289, 16, 'Green Turtle Cay'),
(290, 16, 'Harbour Island'),
(291, 16, 'High Rock'),
(292, 16, 'Inagua'),
(293, 16, 'Kemps Bay'),
(294, 16, 'Long Island'),
(295, 16, 'Marsh Harbour'),
(296, 16, 'Mayaguana'),
(297, 16, 'New Providence'),
(298, 16, 'Nicholls Town and Berry Islands'),
(299, 16, 'Ragged Island'),
(300, 16, 'Rock Sound'),
(301, 16, 'San Salvador and Rum Cay'),
(302, 16, 'Sandy Point'),
(303, 17, 'Al Hadd'),
(304, 17, 'Al Manamah'),
(305, 17, 'Al Mintaqah al Gharbiyah'),
(306, 17, 'Al Mintaqah al Wusta'),
(307, 17, 'Al Mintaqah ash Shamaliyah'),
(308, 17, 'Al Muharraq'),
(309, 17, 'Ar Rifa\' wa al Mintaqah al Janubiyah'),
(310, 17, 'Jidd Hafs'),
(311, 17, 'Juzur Hawar'),
(312, 17, 'Madinat \'Isa'),
(313, 17, 'Madinat Hamad'),
(314, 17, 'Sitrah'),
(315, 18, 'Barguna'),
(316, 18, 'Barisal'),
(317, 18, 'Bhola'),
(318, 18, 'Jhalokati'),
(319, 18, 'Patuakhali'),
(320, 18, 'Pirojpur'),
(321, 18, 'Bandarban'),
(322, 18, 'Brahmanbaria'),
(323, 18, 'Chandpur'),
(324, 18, 'Chittagong'),
(325, 18, 'Comilla'),
(326, 18, 'Cox\'s Bazar'),
(327, 18, 'Feni'),
(328, 18, 'Khagrachari'),
(329, 18, 'Lakshmipur'),
(330, 18, 'Noakhali'),
(331, 18, 'Rangamati'),
(332, 18, 'Dhaka'),
(333, 18, 'Faridpur'),
(334, 18, 'Gazipur'),
(335, 18, 'Gopalganj'),
(336, 18, 'Jamalpur'),
(337, 18, 'Kishoreganj'),
(338, 18, 'Madaripur'),
(339, 18, 'Manikganj'),
(340, 18, 'Munshiganj'),
(341, 18, 'Mymensingh'),
(342, 18, 'Narayanganj'),
(343, 18, 'Narsingdi'),
(344, 18, 'Netrokona'),
(345, 18, 'Rajbari'),
(346, 18, 'Shariatpur'),
(347, 18, 'Sherpur'),
(348, 18, 'Tangail'),
(349, 18, 'Bagerhat'),
(350, 18, 'Chuadanga'),
(351, 18, 'Jessore'),
(352, 18, 'Jhenaidah'),
(353, 18, 'Khulna'),
(354, 18, 'Kushtia'),
(355, 18, 'Magura'),
(356, 18, 'Meherpur'),
(357, 18, 'Narail'),
(358, 18, 'Satkhira'),
(359, 18, 'Bogra'),
(360, 18, 'Dinajpur'),
(361, 18, 'Gaibandha'),
(362, 18, 'Jaipurhat'),
(363, 18, 'Kurigram'),
(364, 18, 'Lalmonirhat'),
(365, 18, 'Naogaon'),
(366, 18, 'Natore'),
(367, 18, 'Nawabganj'),
(368, 18, 'Nilphamari'),
(369, 18, 'Pabna'),
(370, 18, 'Panchagarh'),
(371, 18, 'Rajshahi'),
(372, 18, 'Rangpur'),
(373, 18, 'Sirajganj'),
(374, 18, 'Thakurgaon'),
(375, 18, 'Habiganj'),
(376, 18, 'Maulvi bazar'),
(377, 18, 'Sunamganj'),
(378, 18, 'Sylhet'),
(379, 19, 'Bridgetown'),
(380, 19, 'Christ Church'),
(381, 19, 'Saint Andrew'),
(382, 19, 'Saint George'),
(383, 19, 'Saint James'),
(384, 19, 'Saint John'),
(385, 19, 'Saint Joseph'),
(386, 19, 'Saint Lucy'),
(387, 19, 'Saint Michael'),
(388, 19, 'Saint Peter'),
(389, 19, 'Saint Philip'),
(390, 19, 'Saint Thomas'),
(391, 20, 'Brestskaya (Brest)'),
(392, 20, 'Homyel\'skaya (Homyel\')'),
(393, 20, 'Horad Minsk'),
(394, 20, 'Hrodzyenskaya (Hrodna)'),
(395, 20, 'Mahilyowskaya (Mahilyow)'),
(396, 20, 'Minskaya'),
(397, 20, 'Vitsyebskaya (Vitsyebsk)'),
(398, 21, 'Antwerpen'),
(399, 21, 'Brabant Wallon'),
(400, 21, 'Brussels Capitol Region'),
(401, 21, 'Hainaut'),
(402, 21, 'Liege'),
(403, 21, 'Limburg'),
(404, 21, 'Luxembourg'),
(405, 21, 'Namur'),
(406, 21, 'Oost-Vlaanderen'),
(407, 21, 'Vlaams Brabant'),
(408, 21, 'West-Vlaanderen'),
(409, 22, 'Belize'),
(410, 22, 'Cayo'),
(411, 22, 'Corozal'),
(412, 22, 'Orange Walk'),
(413, 22, 'Stann Creek'),
(414, 22, 'Toledo'),
(415, 23, 'Alibori'),
(416, 23, 'Atakora'),
(417, 23, 'Atlantique'),
(418, 23, 'Borgou'),
(419, 23, 'Collines'),
(420, 23, 'Couffo'),
(421, 23, 'Donga'),
(422, 23, 'Littoral'),
(423, 23, 'Mono'),
(424, 23, 'Oueme'),
(425, 23, 'Plateau'),
(426, 23, 'Zou'),
(427, 24, 'Devonshire'),
(428, 24, 'Hamilton'),
(429, 24, 'Hamilton'),
(430, 24, 'Paget'),
(431, 24, 'Pembroke'),
(432, 24, 'Saint George'),
(433, 24, 'Saint Georges'),
(434, 24, 'Sandys'),
(435, 24, 'Smiths'),
(436, 24, 'Southampton'),
(437, 24, 'Warwick'),
(438, 25, 'Bumthang'),
(439, 25, 'Chhukha'),
(440, 25, 'Chirang'),
(441, 25, 'Daga'),
(442, 25, 'Geylegphug'),
(443, 25, 'Ha'),
(444, 25, 'Lhuntshi'),
(445, 25, 'Mongar'),
(446, 25, 'Paro'),
(447, 25, 'Pemagatsel'),
(448, 25, 'Punakha'),
(449, 25, 'Samchi'),
(450, 25, 'Samdrup Jongkhar'),
(451, 25, 'Shemgang'),
(452, 25, 'Tashigang'),
(453, 25, 'Thimphu'),
(454, 25, 'Tongsa'),
(455, 25, 'Wangdi Phodrang'),
(456, 26, 'Beni'),
(457, 26, 'Chuquisaca'),
(458, 26, 'Cochabamba'),
(459, 26, 'La Paz'),
(460, 26, 'Oruro'),
(461, 26, 'Pando'),
(462, 26, 'Potosi'),
(463, 26, 'Santa Cruz'),
(464, 26, 'Tarija'),
(465, 27, 'Federation of Bosnia and Herzegovina'),
(466, 27, 'Republika Srpska'),
(467, 28, 'Central'),
(468, 28, 'Chobe'),
(469, 28, 'Francistown'),
(470, 28, 'Gaborone'),
(471, 28, 'Ghanzi'),
(472, 28, 'Kgalagadi'),
(473, 28, 'Kgatleng'),
(474, 28, 'Kweneng'),
(475, 28, 'Lobatse'),
(476, 28, 'Ngamiland'),
(477, 28, 'North-East'),
(478, 28, 'Selebi-Pikwe'),
(479, 28, 'South-East'),
(480, 28, 'Southern'),
(481, 29, 'Acre'),
(482, 29, 'Alagoas'),
(483, 29, 'Amapa'),
(484, 29, 'Amazonas'),
(485, 29, 'Bahia'),
(486, 29, 'Ceara'),
(487, 29, 'Distrito Federal'),
(488, 29, 'Espirito Santo'),
(489, 29, 'Goias'),
(490, 29, 'Maranhao'),
(491, 29, 'Mato Grosso'),
(492, 29, 'Mato Grosso do Sul'),
(493, 29, 'Minas Gerais'),
(494, 29, 'Para'),
(495, 29, 'Paraiba'),
(496, 29, 'Parana'),
(497, 29, 'Pernambuco'),
(498, 29, 'Piaui'),
(499, 29, 'Rio de Janeiro'),
(500, 29, 'Rio Grande do Norte'),
(501, 29, 'Rio Grande do Sul'),
(502, 29, 'Rondonia'),
(503, 29, 'Roraima'),
(504, 29, 'Santa Catarina'),
(505, 29, 'Sao Paulo'),
(506, 29, 'Sergipe'),
(507, 29, 'Tocantins'),
(508, 30, 'Anegada'),
(509, 30, 'Jost Van Dyke'),
(510, 30, 'Tortola'),
(511, 30, 'Virgin Gorda'),
(512, 31, 'Belait'),
(513, 31, 'Brunei and Muara'),
(514, 31, 'Temburong'),
(515, 31, 'Tutong'),
(516, 32, 'Blagoevgrad'),
(517, 32, 'Burgas'),
(518, 32, 'Dobrich'),
(519, 32, 'Gabrovo'),
(520, 32, 'Khaskovo'),
(521, 32, 'Kurdzhali'),
(522, 32, 'Kyustendil'),
(523, 32, 'Lovech'),
(524, 32, 'Montana'),
(525, 32, 'Pazardzhik'),
(526, 32, 'Pernik'),
(527, 32, 'Pleven'),
(528, 32, 'Plovdiv'),
(529, 32, 'Razgrad'),
(530, 32, 'Ruse'),
(531, 32, 'Shumen'),
(532, 32, 'Silistra'),
(533, 32, 'Sliven'),
(534, 32, 'Smolyan'),
(535, 32, 'Sofiya'),
(536, 32, 'Sofiya-Grad'),
(537, 32, 'Stara Zagora'),
(538, 32, 'Turgovishte'),
(539, 32, 'Varna'),
(540, 32, 'Veliko Turnovo'),
(541, 32, 'Vidin'),
(542, 32, 'Vratsa'),
(543, 32, 'Yambol'),
(544, 33, 'Bale'),
(545, 33, 'Bam'),
(546, 33, 'Banwa'),
(547, 33, 'Bazega'),
(548, 33, 'Bougouriba'),
(549, 33, 'Boulgou'),
(550, 33, 'Boulkiemde'),
(551, 33, 'Comoe'),
(552, 33, 'Ganzourgou'),
(553, 33, 'Gnagna'),
(554, 33, 'Gourma'),
(555, 33, 'Houet'),
(556, 33, 'Ioba'),
(557, 33, 'Kadiogo'),
(558, 33, 'Kenedougou'),
(559, 33, 'Komandjari'),
(560, 33, 'Kompienga'),
(561, 33, 'Kossi'),
(562, 33, 'Koupelogo'),
(563, 33, 'Kouritenga'),
(564, 33, 'Kourweogo'),
(565, 33, 'Leraba'),
(566, 33, 'Loroum'),
(567, 33, 'Mouhoun'),
(568, 33, 'Nahouri'),
(569, 33, 'Namentenga'),
(570, 33, 'Naumbiel'),
(571, 33, 'Nayala'),
(572, 33, 'Oubritenga'),
(573, 33, 'Oudalan'),
(574, 33, 'Passore'),
(575, 33, 'Poni'),
(576, 33, 'Samentenga'),
(577, 33, 'Sanguie'),
(578, 33, 'Seno'),
(579, 33, 'Sissili'),
(580, 33, 'Soum'),
(581, 33, 'Sourou'),
(582, 33, 'Tapoa'),
(583, 33, 'Tuy'),
(584, 33, 'Yagha'),
(585, 33, 'Yatenga'),
(586, 33, 'Ziro'),
(587, 33, 'Zondomo'),
(588, 33, 'Zoundweogo'),
(589, 34, 'Ayeyarwady'),
(590, 34, 'Bago'),
(591, 34, 'Chin State'),
(592, 34, 'Kachin State'),
(593, 34, 'Kayah State'),
(594, 34, 'Kayin State'),
(595, 34, 'Magway'),
(596, 34, 'Mandalay'),
(597, 34, 'Mon State'),
(598, 34, 'Rakhine State'),
(599, 34, 'Sagaing'),
(600, 34, 'Shan State'),
(601, 34, 'Tanintharyi'),
(602, 34, 'Yangon'),
(603, 35, 'Bubanza'),
(604, 35, 'Bujumbura'),
(605, 35, 'Bururi'),
(606, 35, 'Cankuzo'),
(607, 35, 'Cibitoke'),
(608, 35, 'Gitega'),
(609, 35, 'Karuzi'),
(610, 35, 'Kayanza'),
(611, 35, 'Kirundo'),
(612, 35, 'Makamba'),
(613, 35, 'Muramvya'),
(614, 35, 'Muyinga'),
(615, 35, 'Mwaro'),
(616, 35, 'Ngozi'),
(617, 35, 'Rutana'),
(618, 35, 'Ruyigi'),
(619, 36, 'Banteay Mean Cheay'),
(620, 36, 'Batdambang'),
(621, 36, 'Kampong Cham'),
(622, 36, 'Kampong Chhnang'),
(623, 36, 'Kampong Spoe'),
(624, 36, 'Kampong Thum'),
(625, 36, 'Kampot'),
(626, 36, 'Kandal'),
(627, 36, 'Kaoh Kong'),
(628, 36, 'Keb'),
(629, 36, 'Kracheh'),
(630, 36, 'Mondol Kiri'),
(631, 36, 'Otdar Mean Cheay'),
(632, 36, 'Pailin'),
(633, 36, 'Phnum Penh'),
(634, 36, 'Pouthisat'),
(635, 36, 'Preah Seihanu (Sihanoukville)'),
(636, 36, 'Preah Vihear'),
(637, 36, 'Prey Veng'),
(638, 36, 'Rotanah Kiri'),
(639, 36, 'Siem Reab'),
(640, 36, 'Stoeng Treng'),
(641, 36, 'Svay Rieng'),
(642, 36, 'Takev'),
(643, 37, 'Adamaoua'),
(644, 37, 'Centre'),
(645, 37, 'Est'),
(646, 37, 'Extreme-Nord'),
(647, 37, 'Littoral'),
(648, 37, 'Nord'),
(649, 37, 'Nord-Ouest'),
(650, 37, 'Ouest'),
(651, 37, 'Sud'),
(652, 37, 'Sud-Ouest'),
(653, 38, 'Alberta'),
(654, 38, 'British Columbia'),
(655, 38, 'Manitoba'),
(656, 38, 'New Brunswick'),
(657, 38, 'Newfoundland'),
(658, 38, 'Northwest Territories'),
(659, 38, 'Nova Scotia'),
(660, 38, 'Nunavut'),
(661, 38, 'Ontario'),
(662, 38, 'Prince Edward Island'),
(663, 38, 'Quebec'),
(664, 38, 'Saskatchewan'),
(665, 38, 'Yukon Territory'),
(666, 39, 'Boa Vista'),
(667, 39, 'Brava'),
(668, 39, 'Maio'),
(669, 39, 'Mosteiros'),
(670, 39, 'Paul'),
(671, 39, 'Porto Novo'),
(672, 39, 'Praia'),
(673, 39, 'Ribeira Grande'),
(674, 39, 'Sal'),
(675, 39, 'Santa Catarina'),
(676, 39, 'Santa Cruz'),
(677, 39, 'Sao Domingos'),
(678, 39, 'Sao Filipe'),
(679, 39, 'Sao Nicolau'),
(680, 39, 'Sao Vicente'),
(681, 39, 'Tarrafal'),
(682, 40, 'Creek'),
(683, 40, 'Eastern'),
(684, 40, 'Midland'),
(685, 40, 'South Town'),
(686, 40, 'Spot Bay'),
(687, 40, 'Stake Bay'),
(688, 40, 'West End'),
(689, 40, 'Western'),
(690, 41, 'Bamingui-Bangoran'),
(691, 41, 'Bangui'),
(692, 41, 'Basse-Kotto'),
(693, 41, 'Gribingui'),
(694, 41, 'Haut-Mbomou'),
(695, 41, 'Haute-Kotto'),
(696, 41, 'Haute-Sangha'),
(697, 41, 'Kemo-Gribingui'),
(698, 41, 'Lobaye'),
(699, 41, 'Mbomou'),
(700, 41, 'Nana-Mambere'),
(701, 41, 'Ombella-Mpoko'),
(702, 41, 'Ouaka'),
(703, 41, 'Ouham'),
(704, 41, 'Ouham-Pende'),
(705, 41, 'Sangha'),
(706, 41, 'Vakaga'),
(707, 42, 'Batha'),
(708, 42, 'Biltine'),
(709, 42, 'Borkou-Ennedi-Tibesti'),
(710, 42, 'Chari-Baguirmi'),
(711, 42, 'Guera'),
(712, 42, 'Kanem'),
(713, 42, 'Lac'),
(714, 42, 'Logone Occidental'),
(715, 42, 'Logone Oriental'),
(716, 42, 'Mayo-Kebbi'),
(717, 42, 'Moyen-Chari'),
(718, 42, 'Ouaddai'),
(719, 42, 'Salamat'),
(720, 42, 'Tandjile'),
(721, 43, 'Aisen del General Carlos Ibanez del Campo'),
(722, 43, 'Antofagasta'),
(723, 43, 'Araucania'),
(724, 43, 'Atacama'),
(725, 43, 'Bio-Bio'),
(726, 43, 'Coquimbo'),
(727, 43, 'Libertador General Bernardo O\'Higgins'),
(728, 43, 'Los Lagos'),
(729, 43, 'Magallanes y de la Antartica Chilena'),
(730, 43, 'Maule'),
(731, 43, 'Region Metropolitana (Santiago)'),
(732, 43, 'Tarapaca'),
(733, 43, 'Valparaiso'),
(734, 44, 'Anhui'),
(735, 44, 'Beijing'),
(736, 44, 'Chongqing'),
(737, 44, 'Fujian'),
(738, 44, 'Gansu'),
(739, 44, 'Guangdong'),
(740, 44, 'Guangxi'),
(741, 44, 'Guizhou'),
(742, 44, 'Hainan'),
(743, 44, 'Hebei'),
(744, 44, 'Heilongjiang'),
(745, 44, 'Henan'),
(746, 44, 'Hubei'),
(747, 44, 'Hunan'),
(748, 44, 'Jiangsu'),
(749, 44, 'Jiangxi'),
(750, 44, 'Jilin'),
(751, 44, 'Liaoning'),
(752, 44, 'Nei Mongol'),
(753, 44, 'Ningxia'),
(754, 44, 'Qinghai'),
(755, 44, 'Shaanxi'),
(756, 44, 'Shandong'),
(757, 44, 'Shanghai'),
(758, 44, 'Shanxi'),
(759, 44, 'Sichuan'),
(760, 44, 'Tianjin'),
(761, 44, 'Xinjiang'),
(762, 44, 'Xizang (Tibet)'),
(763, 44, 'Yunnan'),
(764, 44, 'Zhejiang'),
(765, 45, 'Christmas Island'),
(766, 46, 'Clipperton Island'),
(767, 47, 'Direction Island'),
(768, 47, 'Home Island'),
(769, 47, 'Horsburgh Island'),
(770, 47, 'North Keeling Island'),
(771, 47, 'South Island'),
(772, 47, 'West Island'),
(773, 48, 'Amazonas'),
(774, 48, 'Antioquia'),
(775, 48, 'Arauca'),
(776, 48, 'Atlantico'),
(777, 48, 'Bolivar'),
(778, 48, 'Boyaca'),
(779, 48, 'Caldas'),
(780, 48, 'Caqueta'),
(781, 48, 'Casanare'),
(782, 48, 'Cauca'),
(783, 48, 'Cesar'),
(784, 48, 'Choco'),
(785, 48, 'Cordoba'),
(786, 48, 'Cundinamarca'),
(787, 48, 'Distrito Capital de Santa Fe de Bogota'),
(788, 48, 'Guainia'),
(789, 48, 'Guaviare'),
(790, 48, 'Huila'),
(791, 48, 'La Guajira'),
(792, 48, 'Magdalena'),
(793, 48, 'Meta'),
(794, 48, 'Narino'),
(795, 48, 'Norte de Santander'),
(796, 48, 'Putumayo'),
(797, 48, 'Quindio'),
(798, 48, 'Risaralda'),
(799, 48, 'San Andres y Providencia'),
(800, 48, 'Santander'),
(801, 48, 'Sucre'),
(802, 48, 'Tolima'),
(803, 48, 'Valle del Cauca'),
(804, 48, 'Vaupes'),
(805, 48, 'Vichada'),
(806, 49, 'Anjouan (Nzwani)'),
(807, 49, 'Domoni'),
(808, 49, 'Fomboni'),
(809, 49, 'Grande Comore (Njazidja)'),
(810, 49, 'Moheli (Mwali)'),
(811, 49, 'Moroni'),
(812, 49, 'Moutsamoudou'),
(813, 50, 'Bandundu'),
(814, 50, 'Bas-Congo'),
(815, 50, 'Equateur'),
(816, 50, 'Kasai-Occidental'),
(817, 50, 'Kasai-Oriental'),
(818, 50, 'Katanga'),
(819, 50, 'Kinshasa'),
(820, 50, 'Maniema'),
(821, 50, 'Nord-Kivu'),
(822, 50, 'Orientale'),
(823, 50, 'Sud-Kivu'),
(824, 51, 'Bouenza'),
(825, 51, 'Brazzaville'),
(826, 51, 'Cuvette'),
(827, 51, 'Kouilou'),
(828, 51, 'Lekoumou'),
(829, 51, 'Likouala'),
(830, 51, 'Niari'),
(831, 51, 'Plateaux'),
(832, 51, 'Pool'),
(833, 51, 'Sangha'),
(834, 52, 'Aitutaki'),
(835, 52, 'Atiu'),
(836, 52, 'Avarua'),
(837, 52, 'Mangaia'),
(838, 52, 'Manihiki'),
(839, 52, 'Manuae'),
(840, 52, 'Mauke'),
(841, 52, 'Mitiaro'),
(842, 52, 'Nassau Island'),
(843, 52, 'Palmerston'),
(844, 52, 'Penrhyn'),
(845, 52, 'Pukapuka'),
(846, 52, 'Rakahanga'),
(847, 52, 'Rarotonga'),
(848, 52, 'Suwarrow'),
(849, 52, 'Takutea'),
(850, 53, 'Alajuela'),
(851, 53, 'Cartago'),
(852, 53, 'Guanacaste'),
(853, 53, 'Heredia'),
(854, 53, 'Limon'),
(855, 53, 'Puntarenas'),
(856, 53, 'San Jose'),
(857, 54, 'Abengourou'),
(858, 54, 'Abidjan'),
(859, 54, 'Aboisso'),
(860, 54, 'Adiake\''),
(861, 54, 'Adzope'),
(862, 54, 'Agboville'),
(863, 54, 'Agnibilekrou'),
(864, 54, 'Ale\'pe\''),
(865, 54, 'Bangolo'),
(866, 54, 'Beoumi'),
(867, 54, 'Biankouma'),
(868, 54, 'Bocanda'),
(869, 54, 'Bondoukou'),
(870, 54, 'Bongouanou'),
(871, 54, 'Bouafle'),
(872, 54, 'Bouake'),
(873, 54, 'Bouna'),
(874, 54, 'Boundiali'),
(875, 54, 'Dabakala'),
(876, 54, 'Dabon'),
(877, 54, 'Daloa'),
(878, 54, 'Danane'),
(879, 54, 'Daoukro'),
(880, 54, 'Dimbokro'),
(881, 54, 'Divo'),
(882, 54, 'Duekoue'),
(883, 54, 'Ferkessedougou'),
(884, 54, 'Gagnoa'),
(885, 54, 'Grand Bassam'),
(886, 54, 'Grand-Lahou'),
(887, 54, 'Guiglo'),
(888, 54, 'Issia'),
(889, 54, 'Jacqueville'),
(890, 54, 'Katiola'),
(891, 54, 'Korhogo'),
(892, 54, 'Lakota'),
(893, 54, 'Man'),
(894, 54, 'Mankono'),
(895, 54, 'Mbahiakro'),
(896, 54, 'Odienne'),
(897, 54, 'Oume'),
(898, 54, 'Sakassou'),
(899, 54, 'San-Pedro'),
(900, 54, 'Sassandra'),
(901, 54, 'Seguela'),
(902, 54, 'Sinfra'),
(903, 54, 'Soubre'),
(904, 54, 'Tabou'),
(905, 54, 'Tanda'),
(906, 54, 'Tiassale'),
(907, 54, 'Tiebissou'),
(908, 54, 'Tingrela'),
(909, 54, 'Touba'),
(910, 54, 'Toulepleu'),
(911, 54, 'Toumodi'),
(912, 54, 'Vavoua'),
(913, 54, 'Yamoussoukro'),
(914, 54, 'Zuenoula'),
(915, 55, 'Bjelovarsko-Bilogorska Zupanija'),
(916, 55, 'Brodsko-Posavska Zupanija'),
(917, 55, 'Dubrovacko-Neretvanska Zupanija'),
(918, 55, 'Istarska Zupanija'),
(919, 55, 'Karlovacka Zupanija'),
(920, 55, 'Koprivnicko-Krizevacka Zupanija'),
(921, 55, 'Krapinsko-Zagorska Zupanija'),
(922, 55, 'Licko-Senjska Zupanija'),
(923, 55, 'Medimurska Zupanija'),
(924, 55, 'Osjecko-Baranjska Zupanija'),
(925, 55, 'Pozesko-Slavonska Zupanija'),
(926, 55, 'Primorsko-Goranska Zupanija'),
(927, 55, 'Sibensko-Kninska Zupanija'),
(928, 55, 'Sisacko-Moslavacka Zupanija'),
(929, 55, 'Splitsko-Dalmatinska Zupanija'),
(930, 55, 'Varazdinska Zupanija'),
(931, 55, 'Viroviticko-Podravska Zupanija'),
(932, 55, 'Vukovarsko-Srijemska Zupanija'),
(933, 55, 'Zadarska Zupanija'),
(934, 55, 'Zagreb'),
(935, 55, 'Zagrebacka Zupanija'),
(936, 56, 'Camaguey'),
(937, 56, 'Ciego de Avila'),
(938, 56, 'Cienfuegos'),
(939, 56, 'Ciudad de La Habana'),
(940, 56, 'Granma'),
(941, 56, 'Guantanamo'),
(942, 56, 'Holguin'),
(943, 56, 'Isla de la Juventud'),
(944, 56, 'La Habana'),
(945, 56, 'Las Tunas'),
(946, 56, 'Matanzas'),
(947, 56, 'Pinar del Rio'),
(948, 56, 'Sancti Spiritus'),
(949, 56, 'Santiago de Cuba'),
(950, 56, 'Villa Clara'),
(951, 57, 'Famagusta'),
(952, 57, 'Kyrenia'),
(953, 57, 'Larnaca'),
(954, 57, 'Limassol'),
(955, 57, 'Nicosia'),
(956, 57, 'Paphos'),
(957, 58, 'Brnensky'),
(958, 58, 'Budejovicky'),
(959, 58, 'Jihlavsky'),
(960, 58, 'Karlovarsky'),
(961, 58, 'Kralovehradecky'),
(962, 58, 'Liberecky'),
(963, 58, 'Olomoucky'),
(964, 58, 'Ostravsky'),
(965, 58, 'Pardubicky'),
(966, 58, 'Plzensky'),
(967, 58, 'Praha'),
(968, 58, 'Stredocesky'),
(969, 58, 'Ustecky'),
(970, 58, 'Zlinsky'),
(971, 59, 'Arhus'),
(972, 59, 'Bornholm'),
(973, 59, 'Fredericksberg'),
(974, 59, 'Frederiksborg'),
(975, 59, 'Fyn'),
(976, 59, 'Kobenhavn'),
(977, 59, 'Kobenhavns'),
(978, 59, 'Nordjylland'),
(979, 59, 'Ribe'),
(980, 59, 'Ringkobing'),
(981, 59, 'Roskilde'),
(982, 59, 'Sonderjylland'),
(983, 59, 'Storstrom'),
(984, 59, 'Vejle'),
(985, 59, 'Vestsjalland'),
(986, 59, 'Viborg'),
(987, 60, '\'Ali Sabih'),
(988, 60, 'Dikhil'),
(989, 60, 'Djibouti'),
(990, 60, 'Obock'),
(991, 60, 'Tadjoura'),
(992, 61, 'Saint Andrew'),
(993, 61, 'Saint David'),
(994, 61, 'Saint George'),
(995, 61, 'Saint John'),
(996, 61, 'Saint Joseph'),
(997, 61, 'Saint Luke'),
(998, 61, 'Saint Mark'),
(999, 61, 'Saint Patrick'),
(1000, 61, 'Saint Paul'),
(1001, 61, 'Saint Peter'),
(1002, 62, 'Azua'),
(1003, 62, 'Baoruco'),
(1004, 62, 'Barahona'),
(1005, 62, 'Dajabon'),
(1006, 62, 'Distrito Nacional'),
(1007, 62, 'Duarte'),
(1008, 62, 'El Seibo'),
(1009, 62, 'Elias Pina'),
(1010, 62, 'Espaillat'),
(1011, 62, 'Hato Mayor'),
(1012, 62, 'Independencia'),
(1013, 62, 'La Altagracia'),
(1014, 62, 'La Romana'),
(1015, 62, 'La Vega'),
(1016, 62, 'Maria Trinidad Sanchez'),
(1017, 62, 'Monsenor Nouel'),
(1018, 62, 'Monte Cristi'),
(1019, 62, 'Monte Plata'),
(1020, 62, 'Pedernales'),
(1021, 62, 'Peravia'),
(1022, 62, 'Puerto Plata'),
(1023, 62, 'Salcedo'),
(1024, 62, 'Samana'),
(1025, 62, 'San Cristobal'),
(1026, 62, 'San Juan'),
(1027, 62, 'San Pedro de Macoris'),
(1028, 62, 'Sanchez Ramirez'),
(1029, 62, 'Santiago'),
(1030, 62, 'Santiago Rodriguez'),
(1031, 62, 'Valverde'),
(1032, 63, 'Azuay'),
(1033, 63, 'Bolivar'),
(1034, 63, 'Canar'),
(1035, 63, 'Carchi'),
(1036, 63, 'Chimborazo'),
(1037, 63, 'Cotopaxi'),
(1038, 63, 'El Oro'),
(1039, 63, 'Esmeraldas'),
(1040, 63, 'Galapagos'),
(1041, 63, 'Guayas'),
(1042, 63, 'Imbabura'),
(1043, 63, 'Loja'),
(1044, 63, 'Los Rios'),
(1045, 63, 'Manabi'),
(1046, 63, 'Morona-Santiago'),
(1047, 63, 'Napo'),
(1048, 63, 'Orellana'),
(1049, 63, 'Pastaza'),
(1050, 63, 'Pichincha'),
(1051, 63, 'Sucumbios'),
(1052, 63, 'Tungurahua'),
(1053, 63, 'Zamora-Chinchipe'),
(1054, 64, 'Ad Daqahliyah'),
(1055, 64, 'Al Bahr al Ahmar'),
(1056, 64, 'Al Buhayrah'),
(1057, 64, 'Al Fayyum'),
(1058, 64, 'Al Gharbiyah'),
(1059, 64, 'Al Iskandariyah'),
(1060, 64, 'Al Isma\'iliyah'),
(1061, 64, 'Al Jizah'),
(1062, 64, 'Al Minufiyah'),
(1063, 64, 'Al Minya'),
(1064, 64, 'Al Qahirah'),
(1065, 64, 'Al Qalyubiyah'),
(1066, 64, 'Al Wadi al Jadid'),
(1067, 64, 'As Suways'),
(1068, 64, 'Ash Sharqiyah'),
(1069, 64, 'Aswan'),
(1070, 64, 'Asyut'),
(1071, 64, 'Bani Suwayf'),
(1072, 64, 'Bur Sa\'id'),
(1073, 64, 'Dumyat'),
(1074, 64, 'Janub Sina\''),
(1075, 64, 'Kafr ash Shaykh'),
(1076, 64, 'Matruh'),
(1077, 64, 'Qina'),
(1078, 64, 'Shamal Sina\''),
(1079, 64, 'Suhaj'),
(1080, 65, 'Ahuachapan'),
(1081, 65, 'Cabanas'),
(1082, 65, 'Chalatenango'),
(1083, 65, 'Cuscatlan'),
(1084, 65, 'La Libertad'),
(1085, 65, 'La Paz'),
(1086, 65, 'La Union'),
(1087, 65, 'Morazan'),
(1088, 65, 'San Miguel'),
(1089, 65, 'San Salvador'),
(1090, 65, 'San Vicente'),
(1091, 65, 'Santa Ana'),
(1092, 65, 'Sonsonate'),
(1093, 65, 'Usulutan'),
(1094, 66, 'Annobon'),
(1095, 66, 'Bioko Norte'),
(1096, 66, 'Bioko Sur'),
(1097, 66, 'Centro Sur'),
(1098, 66, 'Kie-Ntem'),
(1099, 66, 'Litoral'),
(1100, 66, 'Wele-Nzas'),
(1101, 67, 'Akale Guzay'),
(1102, 67, 'Barka'),
(1103, 67, 'Denkel'),
(1104, 67, 'Hamasen'),
(1105, 67, 'Sahil'),
(1106, 67, 'Semhar'),
(1107, 67, 'Senhit'),
(1108, 67, 'Seraye'),
(1109, 68, 'Harjumaa (Tallinn)'),
(1110, 68, 'Hiiumaa (Kardla)'),
(1111, 68, 'Ida-Virumaa (Johvi)'),
(1112, 68, 'Jarvamaa (Paide)'),
(1113, 68, 'Jogevamaa (Jogeva)'),
(1114, 68, 'Laane-Virumaa (Rakvere)'),
(1115, 68, 'Laanemaa (Haapsalu)'),
(1116, 68, 'Parnumaa (Parnu)'),
(1117, 68, 'Polvamaa (Polva)'),
(1118, 68, 'Raplamaa (Rapla)'),
(1119, 68, 'Saaremaa (Kuessaare)'),
(1120, 68, 'Tartumaa (Tartu)'),
(1121, 68, 'Valgamaa (Valga)'),
(1122, 68, 'Viljandimaa (Viljandi)'),
(1123, 68, 'Vorumaa (Voru)'),
(1124, 69, 'Adis Abeba (Addis Ababa)'),
(1125, 69, 'Afar'),
(1126, 69, 'Amara'),
(1127, 69, 'Dire Dawa'),
(1128, 69, 'Gambela Hizboch'),
(1129, 69, 'Hareri Hizb'),
(1130, 69, 'Oromiya'),
(1131, 69, 'Sumale'),
(1132, 69, 'Tigray'),
(1133, 69, 'YeDebub Biheroch Bihereseboch na Hizboch'),
(1134, 70, 'Europa Island'),
(1135, 71, 'Falkland Islands (Islas Malvinas)'),
(1136, 72, 'Bordoy'),
(1137, 72, 'Eysturoy'),
(1138, 72, 'Mykines'),
(1139, 72, 'Sandoy'),
(1140, 72, 'Skuvoy'),
(1141, 72, 'Streymoy'),
(1142, 72, 'Suduroy'),
(1143, 72, 'Tvoroyri'),
(1144, 72, 'Vagar'),
(1145, 73, 'Central'),
(1146, 73, 'Eastern'),
(1147, 73, 'Northern'),
(1148, 73, 'Rotuma'),
(1149, 73, 'Western'),
(1150, 74, 'Aland'),
(1151, 74, 'Etela-Suomen Laani'),
(1152, 74, 'Ita-Suomen Laani'),
(1153, 74, 'Lansi-Suomen Laani'),
(1154, 74, 'Lappi'),
(1155, 74, 'Oulun Laani'),
(1156, 75, 'Alsace'),
(1157, 75, 'Aquitaine'),
(1158, 75, 'Auvergne'),
(1159, 75, 'Basse-Normandie'),
(1160, 75, 'Bourgogne'),
(1161, 75, 'Bretagne'),
(1162, 75, 'Centre'),
(1163, 75, 'Champagne-Ardenne'),
(1164, 75, 'Corse'),
(1165, 75, 'Franche-Comte'),
(1166, 75, 'Haute-Normandie'),
(1167, 75, 'Ile-de-France'),
(1168, 75, 'Languedoc-Roussillon'),
(1169, 75, 'Limousin'),
(1170, 75, 'Lorraine'),
(1171, 75, 'Midi-Pyrenees'),
(1172, 75, 'Nord-Pas-de-Calais'),
(1173, 75, 'Pays de la Loire'),
(1174, 75, 'Picardie'),
(1175, 75, 'Poitou-Charentes'),
(1176, 75, 'Provence-Alpes-Cote d\'Azur'),
(1177, 75, 'Rhone-Alpes'),
(1178, 76, 'French Guiana'),
(1179, 77, 'Archipel des Marquises'),
(1180, 77, 'Archipel des Tuamotu'),
(1181, 77, 'Archipel des Tubuai'),
(1182, 77, 'Iles du Vent'),
(1183, 77, 'Iles Sous-le-Vent'),
(1184, 78, 'Adelie Land'),
(1185, 78, 'Ile Crozet'),
(1186, 78, 'Iles Kerguelen'),
(1187, 78, 'Iles Saint-Paul et Amsterdam'),
(1188, 79, 'Estuaire'),
(1189, 79, 'Haut-Ogooue'),
(1190, 79, 'Moyen-Ogooue'),
(1191, 79, 'Ngounie'),
(1192, 79, 'Nyanga'),
(1193, 79, 'Ogooue-Ivindo'),
(1194, 79, 'Ogooue-Lolo'),
(1195, 79, 'Ogooue-Maritime'),
(1196, 79, 'Woleu-Ntem'),
(1197, 80, 'Banjul'),
(1198, 80, 'Central River'),
(1199, 80, 'Lower River'),
(1200, 80, 'North Bank'),
(1201, 80, 'Upper River'),
(1202, 80, 'Western'),
(1203, 81, 'Gaza Strip'),
(1204, 82, 'Abashis'),
(1205, 82, 'Abkhazia or Ap\'khazet\'is Avtonomiuri Respublika (Sokhumi)'),
(1206, 82, 'Adigenis'),
(1207, 82, 'Ajaria or Acharis Avtonomiuri Respublika (Bat\'umi)'),
(1208, 82, 'Akhalgoris'),
(1209, 82, 'Akhalk\'alak\'is'),
(1210, 82, 'Akhalts\'ikhis'),
(1211, 82, 'Akhmetis'),
(1212, 82, 'Ambrolauris'),
(1213, 82, 'Aspindzis'),
(1214, 82, 'Baghdat\'is'),
(1215, 82, 'Bolnisis'),
(1216, 82, 'Borjomis'),
(1217, 82, 'Ch\'khorotsqus'),
(1218, 82, 'Ch\'okhatauris'),
(1219, 82, 'Chiat\'ura'),
(1220, 82, 'Dedop\'listsqaros'),
(1221, 82, 'Dmanisis'),
(1222, 82, 'Dushet\'is'),
(1223, 82, 'Gardabanis'),
(1224, 82, 'Gori'),
(1225, 82, 'Goris'),
(1226, 82, 'Gurjaanis'),
(1227, 82, 'Javis'),
(1228, 82, 'K\'arelis'),
(1229, 82, 'K\'ut\'aisi'),
(1230, 82, 'Kaspis'),
(1231, 82, 'Kharagaulis'),
(1232, 82, 'Khashuris'),
(1233, 82, 'Khobis'),
(1234, 82, 'Khonis'),
(1235, 82, 'Lagodekhis'),
(1236, 82, 'Lanch\'khut\'is'),
(1237, 82, 'Lentekhis'),
(1238, 82, 'Marneulis'),
(1239, 82, 'Martvilis'),
(1240, 82, 'Mestiis'),
(1241, 82, 'Mts\'khet\'is'),
(1242, 82, 'Ninotsmindis'),
(1243, 82, 'Onis'),
(1244, 82, 'Ozurget\'is'),
(1245, 82, 'P\'ot\'i'),
(1246, 82, 'Qazbegis'),
(1247, 82, 'Qvarlis'),
(1248, 82, 'Rust\'avi'),
(1249, 82, 'Sach\'kheris'),
(1250, 82, 'Sagarejos'),
(1251, 82, 'Samtrediis'),
(1252, 82, 'Senakis'),
(1253, 82, 'Sighnaghis'),
(1254, 82, 'T\'bilisi'),
(1255, 82, 'T\'elavis'),
(1256, 82, 'T\'erjolis'),
(1257, 82, 'T\'et\'ritsqaros'),
(1258, 82, 'T\'ianet\'is'),
(1259, 82, 'Tqibuli'),
(1260, 82, 'Ts\'ageris'),
(1261, 82, 'Tsalenjikhis'),
(1262, 82, 'Tsalkis'),
(1263, 82, 'Tsqaltubo'),
(1264, 82, 'Vanis'),
(1265, 82, 'Zestap\'onis'),
(1266, 82, 'Zugdidi'),
(1267, 82, 'Zugdidis'),
(1268, 83, 'Baden-Wuerttemberg'),
(1269, 83, 'Bayern'),
(1270, 83, 'Berlin'),
(1271, 83, 'Brandenburg'),
(1272, 83, 'Bremen'),
(1273, 83, 'Hamburg'),
(1274, 83, 'Hessen'),
(1275, 83, 'Mecklenburg-Vorpommern'),
(1276, 83, 'Niedersachsen'),
(1277, 83, 'Nordrhein-Westfalen'),
(1278, 83, 'Rheinland-Pfalz'),
(1279, 83, 'Saarland'),
(1280, 83, 'Sachsen'),
(1281, 83, 'Sachsen-Anhalt'),
(1282, 83, 'Schleswig-Holstein'),
(1283, 83, 'Thueringen'),
(1284, 84, 'Ashanti'),
(1285, 84, 'Brong-Ahafo'),
(1286, 84, 'Central Ghana'),
(1287, 84, 'Eastern Ghana'),
(1288, 84, 'Greater Accra'),
(1289, 84, 'Northern Ghana'),
(1290, 84, 'Upper East'),
(1291, 84, 'Upper West'),
(1292, 84, 'Volta'),
(1293, 84, 'Western Ghana'),
(1294, 85, 'Gibraltar'),
(1295, 86, 'Ile du Lys'),
(1296, 86, 'Ile Glorieuse'),
(1297, 87, 'Aitolia kai Akarnania'),
(1298, 87, 'Akhaia'),
(1299, 87, 'Argolis'),
(1300, 87, 'Arkadhia'),
(1301, 87, 'Arta'),
(1302, 87, 'Attiki'),
(1303, 87, 'Ayion Oros (Mt. Athos)'),
(1304, 87, 'Dhodhekanisos'),
(1305, 87, 'Drama'),
(1306, 87, 'Evritania'),
(1307, 87, 'Evros'),
(1308, 87, 'Evvoia'),
(1309, 87, 'Florina'),
(1310, 87, 'Fokis'),
(1311, 87, 'Fthiotis'),
(1312, 87, 'Grevena'),
(1313, 87, 'Ilia'),
(1314, 87, 'Imathia'),
(1315, 87, 'Ioannina'),
(1316, 87, 'Irakleion'),
(1317, 87, 'Kardhitsa'),
(1318, 87, 'Kastoria'),
(1319, 87, 'Kavala'),
(1320, 87, 'Kefallinia'),
(1321, 87, 'Kerkyra'),
(1322, 87, 'Khalkidhiki'),
(1323, 87, 'Khania'),
(1324, 87, 'Khios'),
(1325, 87, 'Kikladhes'),
(1326, 87, 'Kilkis'),
(1327, 87, 'Korinthia'),
(1328, 87, 'Kozani'),
(1329, 87, 'Lakonia'),
(1330, 87, 'Larisa'),
(1331, 87, 'Lasithi'),
(1332, 87, 'Lesvos'),
(1333, 87, 'Levkas'),
(1334, 87, 'Magnisia'),
(1335, 87, 'Messinia'),
(1336, 87, 'Pella'),
(1337, 87, 'Pieria'),
(1338, 87, 'Preveza'),
(1339, 87, 'Rethimni'),
(1340, 87, 'Rodhopi'),
(1341, 87, 'Samos'),
(1342, 87, 'Serrai'),
(1343, 87, 'Thesprotia'),
(1344, 87, 'Thessaloniki'),
(1345, 87, 'Trikala'),
(1346, 87, 'Voiotia'),
(1347, 87, 'Xanthi'),
(1348, 87, 'Zakinthos'),
(1349, 88, 'Avannaa (Nordgronland)'),
(1350, 88, 'Kitaa (Vestgronland)'),
(1351, 88, 'Tunu (Ostgronland)'),
(1352, 89, 'Carriacou and Petit Martinique'),
(1353, 89, 'Saint Andrew'),
(1354, 89, 'Saint David'),
(1355, 89, 'Saint George'),
(1356, 89, 'Saint John'),
(1357, 89, 'Saint Mark'),
(1358, 89, 'Saint Patrick'),
(1359, 90, 'Basse-Terre'),
(1360, 90, 'Grande-Terre'),
(1361, 90, 'Iles de la Petite Terre'),
(1362, 90, 'Iles des Saintes'),
(1363, 90, 'Marie-Galante'),
(1364, 91, 'Guam'),
(1365, 92, 'Alta Verapaz'),
(1366, 92, 'Baja Verapaz'),
(1367, 92, 'Chimaltenango'),
(1368, 92, 'Chiquimula'),
(1369, 92, 'El Progreso'),
(1370, 92, 'Escuintla'),
(1371, 92, 'Guatemala'),
(1372, 92, 'Huehuetenango'),
(1373, 92, 'Izabal'),
(1374, 92, 'Jalapa'),
(1375, 92, 'Jutiapa'),
(1376, 92, 'Peten'),
(1377, 92, 'Quetzaltenango'),
(1378, 92, 'Quiche'),
(1379, 92, 'Retalhuleu'),
(1380, 92, 'Sacatepequez'),
(1381, 92, 'San Marcos'),
(1382, 92, 'Santa Rosa'),
(1383, 92, 'Solola'),
(1384, 92, 'Suchitepequez'),
(1385, 92, 'Totonicapan'),
(1386, 92, 'Zacapa'),
(1387, 93, 'Castel'),
(1388, 93, 'Forest'),
(1389, 93, 'St. Andrew'),
(1390, 93, 'St. Martin'),
(1391, 93, 'St. Peter Port'),
(1392, 93, 'St. Pierre du Bois'),
(1393, 93, 'St. Sampson'),
(1394, 93, 'St. Saviour'),
(1395, 93, 'Torteval'),
(1396, 93, 'Vale'),
(1397, 94, 'Beyla'),
(1398, 94, 'Boffa'),
(1399, 94, 'Boke'),
(1400, 94, 'Conakry'),
(1401, 94, 'Coyah'),
(1402, 94, 'Dabola'),
(1403, 94, 'Dalaba'),
(1404, 94, 'Dinguiraye'),
(1405, 94, 'Dubreka'),
(1406, 94, 'Faranah'),
(1407, 94, 'Forecariah'),
(1408, 94, 'Fria'),
(1409, 94, 'Gaoual'),
(1410, 94, 'Gueckedou'),
(1411, 94, 'Kankan'),
(1412, 94, 'Kerouane'),
(1413, 94, 'Kindia'),
(1414, 94, 'Kissidougou'),
(1415, 94, 'Koubia'),
(1416, 94, 'Koundara'),
(1417, 94, 'Kouroussa'),
(1418, 94, 'Labe'),
(1419, 94, 'Lelouma'),
(1420, 94, 'Lola'),
(1421, 94, 'Macenta'),
(1422, 94, 'Mali'),
(1423, 94, 'Mamou'),
(1424, 94, 'Mandiana'),
(1425, 94, 'Nzerekore'),
(1426, 94, 'Pita'),
(1427, 94, 'Siguiri'),
(1428, 94, 'Telimele'),
(1429, 94, 'Tougue'),
(1430, 94, 'Yomou'),
(1431, 95, 'Bafata'),
(1432, 95, 'Biombo'),
(1433, 95, 'Bissau'),
(1434, 95, 'Bolama-Bijagos'),
(1435, 95, 'Cacheu'),
(1436, 95, 'Gabu'),
(1437, 95, 'Oio'),
(1438, 95, 'Quinara'),
(1439, 95, 'Tombali'),
(1440, 96, 'Barima-Waini'),
(1441, 96, 'Cuyuni-Mazaruni'),
(1442, 96, 'Demerara-Mahaica'),
(1443, 96, 'East Berbice-Corentyne'),
(1444, 96, 'Essequibo Islands-West Demerara'),
(1445, 96, 'Mahaica-Berbice'),
(1446, 96, 'Pomeroon-Supenaam'),
(1447, 96, 'Potaro-Siparuni'),
(1448, 96, 'Upper Demerara-Berbice'),
(1449, 96, 'Upper Takutu-Upper Essequibo'),
(1450, 97, 'Artibonite'),
(1451, 97, 'Centre'),
(1452, 97, 'Grand\'Anse'),
(1453, 97, 'Nord'),
(1454, 97, 'Nord-Est'),
(1455, 97, 'Nord-Ouest'),
(1456, 97, 'Ouest'),
(1457, 97, 'Sud'),
(1458, 97, 'Sud-Est'),
(1459, 98, 'Heard Island and McDonald Islands'),
(1460, 99, 'Holy See (Vatican City)'),
(1461, 100, 'Atlantida'),
(1462, 100, 'Choluteca'),
(1463, 100, 'Colon'),
(1464, 100, 'Comayagua'),
(1465, 100, 'Copan'),
(1466, 100, 'Cortes'),
(1467, 100, 'El Paraiso'),
(1468, 100, 'Francisco Morazan'),
(1469, 100, 'Gracias a Dios'),
(1470, 100, 'Intibuca'),
(1471, 100, 'Islas de la Bahia'),
(1472, 100, 'La Paz'),
(1473, 100, 'Lempira'),
(1474, 100, 'Ocotepeque'),
(1475, 100, 'Olancho'),
(1476, 100, 'Santa Barbara'),
(1477, 100, 'Valle'),
(1478, 100, 'Yoro'),
(1479, 101, 'Hong Kong'),
(1480, 102, 'Howland Island'),
(1481, 103, 'Bacs-Kiskun'),
(1482, 103, 'Baranya'),
(1483, 103, 'Bekes'),
(1484, 103, 'Bekescsaba'),
(1485, 103, 'Borsod-Abauj-Zemplen'),
(1486, 103, 'Budapest'),
(1487, 103, 'Csongrad'),
(1488, 103, 'Debrecen'),
(1489, 103, 'Dunaujvaros'),
(1490, 103, 'Eger'),
(1491, 103, 'Fejer'),
(1492, 103, 'Gyor'),
(1493, 103, 'Gyor-Moson-Sopron'),
(1494, 103, 'Hajdu-Bihar'),
(1495, 103, 'Heves'),
(1496, 103, 'Hodmezovasarhely'),
(1497, 103, 'Jasz-Nagykun-Szolnok'),
(1498, 103, 'Kaposvar'),
(1499, 103, 'Kecskemet'),
(1500, 103, 'Komarom-Esztergom'),
(1501, 103, 'Miskolc'),
(1502, 103, 'Nagykanizsa'),
(1503, 103, 'Nograd'),
(1504, 103, 'Nyiregyhaza'),
(1505, 103, 'Pecs'),
(1506, 103, 'Pest'),
(1507, 103, 'Somogy'),
(1508, 103, 'Sopron'),
(1509, 103, 'Szabolcs-Szatmar-Bereg'),
(1510, 103, 'Szeged'),
(1511, 103, 'Szekesfehervar'),
(1512, 103, 'Szolnok'),
(1513, 103, 'Szombathely'),
(1514, 103, 'Tatabanya'),
(1515, 103, 'Tolna'),
(1516, 103, 'Vas'),
(1517, 103, 'Veszprem'),
(1518, 103, 'Veszprem'),
(1519, 103, 'Zala'),
(1520, 103, 'Zalaegerszeg'),
(1521, 104, 'Akranes'),
(1522, 104, 'Akureyri'),
(1523, 104, 'Arnessysla'),
(1524, 104, 'Austur-Bardhastrandarsysla'),
(1525, 104, 'Austur-Hunavatnssysla'),
(1526, 104, 'Austur-Skaftafellssysla'),
(1527, 104, 'Borgarfjardharsysla'),
(1528, 104, 'Dalasysla'),
(1529, 104, 'Eyjafjardharsysla'),
(1530, 104, 'Gullbringusysla'),
(1531, 104, 'Hafnarfjordhur'),
(1532, 104, 'Husavik'),
(1533, 104, 'Isafjordhur'),
(1534, 104, 'Keflavik'),
(1535, 104, 'Kjosarsysla'),
(1536, 104, 'Kopavogur'),
(1537, 104, 'Myrasysla'),
(1538, 104, 'Neskaupstadhur'),
(1539, 104, 'Nordhur-Isafjardharsysla'),
(1540, 104, 'Nordhur-Mulasys-la'),
(1541, 104, 'Nordhur-Thingeyjarsysla'),
(1542, 104, 'Olafsfjordhur'),
(1543, 104, 'Rangarvallasysla'),
(1544, 104, 'Reykjavik'),
(1545, 104, 'Saudharkrokur'),
(1546, 104, 'Seydhisfjordhur'),
(1547, 104, 'Siglufjordhur'),
(1548, 104, 'Skagafjardharsysla'),
(1549, 104, 'Snaefellsnes-og Hnappadalssysla'),
(1550, 104, 'Strandasysla'),
(1551, 104, 'Sudhur-Mulasysla'),
(1552, 104, 'Sudhur-Thingeyjarsysla'),
(1553, 104, 'Vesttmannaeyjar'),
(1554, 104, 'Vestur-Bardhastrandarsysla'),
(1555, 104, 'Vestur-Hunavatnssysla'),
(1556, 104, 'Vestur-Isafjardharsysla'),
(1557, 104, 'Vestur-Skaftafellssysla'),
(1558, 105, 'Andaman and Nicobar Islands'),
(1559, 105, 'Andhra Pradesh'),
(1560, 105, 'Arunachal Pradesh'),
(1561, 105, 'Assam'),
(1562, 105, 'Bihar'),
(1563, 105, 'Chandigarh'),
(1564, 105, 'Chhattisgarh'),
(1565, 105, 'Dadra and Nagar Haveli'),
(1566, 105, 'Daman and Diu'),
(1567, 105, 'Delhi'),
(1568, 105, 'Goa'),
(1569, 105, 'Gujarat'),
(1570, 105, 'Haryana'),
(1571, 105, 'Himachal Pradesh'),
(1572, 105, 'Jammu and Kashmir'),
(1573, 105, 'Jharkhand'),
(1574, 105, 'Karnataka'),
(1575, 105, 'Kerala'),
(1576, 105, 'Lakshadweep'),
(1577, 105, 'Madhya Pradesh'),
(1578, 105, 'Maharashtra'),
(1579, 105, 'Manipur'),
(1580, 105, 'Meghalaya'),
(1581, 105, 'Mizoram'),
(1582, 105, 'Nagaland'),
(1583, 105, 'Orissa'),
(1584, 105, 'Pondicherry'),
(1585, 105, 'Punjab'),
(1586, 105, 'Rajasthan'),
(1587, 105, 'Sikkim'),
(1588, 105, 'Tamil Nadu'),
(1589, 105, 'Tripura'),
(1590, 105, 'Uttar Pradesh'),
(1591, 105, 'Uttaranchal'),
(1592, 105, 'West Bengal'),
(1593, 106, 'Aceh'),
(1594, 106, 'Bali'),
(1595, 106, 'Banten'),
(1596, 106, 'Bengkulu'),
(1597, 106, 'East Timor'),
(1598, 106, 'Gorontalo'),
(1599, 106, 'Irian Jaya'),
(1600, 106, 'Jakarta Raya'),
(1601, 106, 'Jambi'),
(1602, 106, 'Jawa Barat'),
(1603, 106, 'Jawa Tengah'),
(1604, 106, 'Jawa Timur'),
(1605, 106, 'Kalimantan Barat'),
(1606, 106, 'Kalimantan Selatan'),
(1607, 106, 'Kalimantan Tengah'),
(1608, 106, 'Kalimantan Timur'),
(1609, 106, 'Kepulauan Bangka Belitung'),
(1610, 106, 'Lampung'),
(1611, 106, 'Maluku'),
(1612, 106, 'Maluku Utara'),
(1613, 106, 'Nusa Tenggara Barat'),
(1614, 106, 'Nusa Tenggara Timur'),
(1615, 106, 'Riau'),
(1616, 106, 'Sulawesi Selatan'),
(1617, 106, 'Sulawesi Tengah'),
(1618, 106, 'Sulawesi Tenggara'),
(1619, 106, 'Sulawesi Utara'),
(1620, 106, 'Sumatera Barat'),
(1621, 106, 'Sumatera Selatan'),
(1622, 106, 'Sumatera Utara'),
(1623, 106, 'Yogyakarta'),
(1624, 107, 'Ardabil'),
(1625, 107, 'Azarbayjan-e Gharbi'),
(1626, 107, 'Azarbayjan-e Sharqi'),
(1627, 107, 'Bushehr'),
(1628, 107, 'Chahar Mahall va Bakhtiari'),
(1629, 107, 'Esfahan'),
(1630, 107, 'Fars'),
(1631, 107, 'Gilan'),
(1632, 107, 'Golestan'),
(1633, 107, 'Hamadan'),
(1634, 107, 'Hormozgan'),
(1635, 107, 'Ilam'),
(1636, 107, 'Kerman'),
(1637, 107, 'Kermanshah'),
(1638, 107, 'Khorasan'),
(1639, 107, 'Khuzestan'),
(1640, 107, 'Kohgiluyeh va Buyer Ahmad'),
(1641, 107, 'Kordestan'),
(1642, 107, 'Lorestan'),
(1643, 107, 'Markazi'),
(1644, 107, 'Mazandaran'),
(1645, 107, 'Qazvin'),
(1646, 107, 'Qom'),
(1647, 107, 'Semnan'),
(1648, 107, 'Sistan va Baluchestan'),
(1649, 107, 'Tehran'),
(1650, 107, 'Yazd'),
(1651, 107, 'Zanjan'),
(1652, 108, 'Al Anbar'),
(1653, 108, 'Al Basrah'),
(1654, 108, 'Al Muthanna'),
(1655, 108, 'Al Qadisiyah'),
(1656, 108, 'An Najaf'),
(1657, 108, 'Arbil'),
(1658, 108, 'As Sulaymaniyah'),
(1659, 108, 'At Ta\'mim'),
(1660, 108, 'Babil'),
(1661, 108, 'Baghdad'),
(1662, 108, 'Dahuk'),
(1663, 108, 'Dhi Qar'),
(1664, 108, 'Diyala'),
(1665, 108, 'Karbala\''),
(1666, 108, 'Maysan'),
(1667, 108, 'Ninawa'),
(1668, 108, 'Salah ad Din'),
(1669, 108, 'Wasit'),
(1670, 109, 'Carlow'),
(1671, 109, 'Cavan'),
(1672, 109, 'Clare'),
(1673, 109, 'Cork'),
(1674, 109, 'Donegal'),
(1675, 109, 'Dublin'),
(1676, 109, 'Galway'),
(1677, 109, 'Kerry'),
(1678, 109, 'Kildare'),
(1679, 109, 'Kilkenny'),
(1680, 109, 'Laois'),
(1681, 109, 'Leitrim'),
(1682, 109, 'Limerick'),
(1683, 109, 'Longford'),
(1684, 109, 'Louth'),
(1685, 109, 'Mayo'),
(1686, 109, 'Meath'),
(1687, 109, 'Monaghan'),
(1688, 109, 'Offaly'),
(1689, 109, 'Roscommon'),
(1690, 109, 'Sligo'),
(1691, 109, 'Tipperary'),
(1692, 109, 'Waterford'),
(1693, 109, 'Westmeath'),
(1694, 109, 'Wexford'),
(1695, 109, 'Wicklow'),
(1696, 110, 'Antrim'),
(1697, 110, 'Ards'),
(1698, 110, 'Armagh'),
(1699, 110, 'Ballymena'),
(1700, 110, 'Ballymoney'),
(1701, 110, 'Banbridge'),
(1702, 110, 'Belfast'),
(1703, 110, 'Carrickfergus'),
(1704, 110, 'Castlereagh'),
(1705, 110, 'Coleraine'),
(1706, 110, 'Cookstown'),
(1707, 110, 'Craigavon'),
(1708, 110, 'Derry'),
(1709, 110, 'Down'),
(1710, 110, 'Dungannon'),
(1711, 110, 'Fermanagh'),
(1712, 110, 'Larne'),
(1713, 110, 'Limavady'),
(1714, 110, 'Lisburn'),
(1715, 110, 'Magherafelt'),
(1716, 110, 'Moyle'),
(1717, 110, 'Newry and Mourne'),
(1718, 110, 'Newtownabbey'),
(1719, 110, 'North Down'),
(1720, 110, 'Omagh'),
(1721, 110, 'Strabane'),
(1722, 111, 'Central'),
(1723, 111, 'Haifa'),
(1724, 111, 'Jerusalem'),
(1725, 111, 'Northern'),
(1726, 111, 'Southern'),
(1727, 111, 'Tel Aviv'),
(1728, 112, 'Abruzzo'),
(1729, 112, 'Basilicata'),
(1730, 112, 'Calabria'),
(1731, 112, 'Campania'),
(1732, 112, 'Emilia-Romagna'),
(1733, 112, 'Friuli-Venezia Giulia'),
(1734, 112, 'Lazio'),
(1735, 112, 'Liguria'),
(1736, 112, 'Lombardia'),
(1737, 112, 'Marche'),
(1738, 112, 'Molise'),
(1739, 112, 'Piemonte'),
(1740, 112, 'Puglia'),
(1741, 112, 'Sardegna'),
(1742, 112, 'Sicilia'),
(1743, 112, 'Toscana'),
(1744, 112, 'Trentino-Alto Adige'),
(1745, 112, 'Umbria'),
(1746, 112, 'Valle d\'Aosta'),
(1747, 112, 'Veneto'),
(1748, 113, 'Clarendon'),
(1749, 113, 'Hanover'),
(1750, 113, 'Kingston'),
(1751, 113, 'Manchester'),
(1752, 113, 'Portland'),
(1753, 113, 'Saint Andrew'),
(1754, 113, 'Saint Ann'),
(1755, 113, 'Saint Catherine'),
(1756, 113, 'Saint Elizabeth'),
(1757, 113, 'Saint James'),
(1758, 113, 'Saint Mary'),
(1759, 113, 'Saint Thomas'),
(1760, 113, 'Trelawny'),
(1761, 113, 'Westmoreland'),
(1762, 114, 'Jan Mayen'),
(1763, 115, 'Aichi'),
(1764, 115, 'Akita'),
(1765, 115, 'Aomori'),
(1766, 115, 'Chiba'),
(1767, 115, 'Ehime'),
(1768, 115, 'Fukui'),
(1769, 115, 'Fukuoka'),
(1770, 115, 'Fukushima'),
(1771, 115, 'Gifu'),
(1772, 115, 'Gumma'),
(1773, 115, 'Hiroshima'),
(1774, 115, 'Hokkaido'),
(1775, 115, 'Hyogo'),
(1776, 115, 'Ibaraki'),
(1777, 115, 'Ishikawa'),
(1778, 115, 'Iwate'),
(1779, 115, 'Kagawa'),
(1780, 115, 'Kagoshima'),
(1781, 115, 'Kanagawa'),
(1782, 115, 'Kochi'),
(1783, 115, 'Kumamoto'),
(1784, 115, 'Kyoto'),
(1785, 115, 'Mie'),
(1786, 115, 'Miyagi'),
(1787, 115, 'Miyazaki'),
(1788, 115, 'Nagano'),
(1789, 115, 'Nagasaki'),
(1790, 115, 'Nara'),
(1791, 115, 'Niigata'),
(1792, 115, 'Oita'),
(1793, 115, 'Okayama'),
(1794, 115, 'Okinawa'),
(1795, 115, 'Osaka'),
(1796, 115, 'Saga'),
(1797, 115, 'Saitama'),
(1798, 115, 'Shiga'),
(1799, 115, 'Shimane'),
(1800, 115, 'Shizuoka'),
(1801, 115, 'Tochigi'),
(1802, 115, 'Tokushima'),
(1803, 115, 'Tokyo'),
(1804, 115, 'Tottori'),
(1805, 115, 'Toyama'),
(1806, 115, 'Wakayama'),
(1807, 115, 'Yamagata'),
(1808, 115, 'Yamaguchi'),
(1809, 115, 'Yamanashi'),
(1810, 116, 'Jarvis Island'),
(1811, 117, 'Jersey'),
(1812, 118, 'Johnston Atoll'),
(1813, 119, '\'Amman'),
(1814, 119, 'Ajlun'),
(1815, 119, 'Al \'Aqabah'),
(1816, 119, 'Al Balqa\''),
(1817, 119, 'Al Karak'),
(1818, 119, 'Al Mafraq'),
(1819, 119, 'At Tafilah'),
(1820, 119, 'Az Zarqa\''),
(1821, 119, 'Irbid'),
(1822, 119, 'Jarash'),
(1823, 119, 'Ma\'an'),
(1824, 119, 'Madaba'),
(1825, 120, 'Juan de Nova Island'),
(1826, 121, 'Almaty'),
(1827, 121, 'Aqmola'),
(1828, 121, 'Aqtobe'),
(1829, 121, 'Astana'),
(1830, 121, 'Atyrau'),
(1831, 121, 'Batys Qazaqstan'),
(1832, 121, 'Bayqongyr'),
(1833, 121, 'Mangghystau'),
(1834, 121, 'Ongtustik Qazaqstan'),
(1835, 121, 'Pavlodar'),
(1836, 121, 'Qaraghandy'),
(1837, 121, 'Qostanay'),
(1838, 121, 'Qyzylorda'),
(1839, 121, 'Shyghys Qazaqstan'),
(1840, 121, 'Soltustik Qazaqstan'),
(1841, 121, 'Zhambyl'),
(1842, 122, 'Central'),
(1843, 122, 'Coast'),
(1844, 122, 'Eastern'),
(1845, 122, 'Nairobi Area'),
(1846, 122, 'North Eastern'),
(1847, 122, 'Nyanza'),
(1848, 122, 'Rift Valley'),
(1849, 122, 'Western'),
(1850, 123, 'Abaiang'),
(1851, 123, 'Abemama'),
(1852, 123, 'Aranuka'),
(1853, 123, 'Arorae'),
(1854, 123, 'Banaba'),
(1855, 123, 'Banaba'),
(1856, 123, 'Beru'),
(1857, 123, 'Butaritari'),
(1858, 123, 'Central Gilberts'),
(1859, 123, 'Gilbert Islands'),
(1860, 123, 'Kanton'),
(1861, 123, 'Kiritimati'),
(1862, 123, 'Kuria'),
(1863, 123, 'Line Islands'),
(1864, 123, 'Line Islands'),
(1865, 123, 'Maiana'),
(1866, 123, 'Makin'),
(1867, 123, 'Marakei'),
(1868, 123, 'Nikunau'),
(1869, 123, 'Nonouti'),
(1870, 123, 'Northern Gilberts'),
(1871, 123, 'Onotoa'),
(1872, 123, 'Phoenix Islands'),
(1873, 123, 'Southern Gilberts'),
(1874, 123, 'Tabiteuea'),
(1875, 123, 'Tabuaeran'),
(1876, 123, 'Tamana'),
(1877, 123, 'Tarawa'),
(1878, 123, 'Tarawa'),
(1879, 123, 'Teraina'),
(1880, 124, 'Chagang-do (Chagang Province)'),
(1881, 124, 'Hamgyong-bukto (North Hamgyong Province)'),
(1882, 124, 'Hamgyong-namdo (South Hamgyong Province)'),
(1883, 124, 'Hwanghae-bukto (North Hwanghae Province)'),
(1884, 124, 'Hwanghae-namdo (South Hwanghae Province)'),
(1885, 124, 'Kaesong-si (Kaesong City)'),
(1886, 124, 'Kangwon-do (Kangwon Province)'),
(1887, 124, 'Namp\'o-si (Namp\'o City)'),
(1888, 124, 'P\'yongan-bukto (North P\'yongan Province)'),
(1889, 124, 'P\'yongan-namdo (South P\'yongan Province)'),
(1890, 124, 'P\'yongyang-si (P\'yongyang City)'),
(1891, 124, 'Yanggang-do (Yanggang Province)'),
(1892, 125, 'Ch\'ungch\'ong-bukto'),
(1893, 125, 'Ch\'ungch\'ong-namdo'),
(1894, 125, 'Cheju-do'),
(1895, 125, 'Cholla-bukto'),
(1896, 125, 'Cholla-namdo'),
(1897, 125, 'Inch\'on-gwangyoksi'),
(1898, 125, 'Kangwon-do'),
(1899, 125, 'Kwangju-gwangyoksi'),
(1900, 125, 'Kyonggi-do'),
(1901, 125, 'Kyongsang-bukto'),
(1902, 125, 'Kyongsang-namdo'),
(1903, 125, 'Pusan-gwangyoksi'),
(1904, 125, 'Soul-t\'ukpyolsi'),
(1905, 125, 'Taegu-gwangyoksi'),
(1906, 125, 'Taejon-gwangyoksi'),
(1907, 125, 'Ulsan-gwangyoksi'),
(1908, 126, 'Al \'Asimah'),
(1909, 126, 'Al Ahmadi'),
(1910, 126, 'Al Farwaniyah'),
(1911, 126, 'Al Jahra\''),
(1912, 126, 'Hawalli'),
(1913, 127, 'Batken Oblasty'),
(1914, 127, 'Bishkek Shaary'),
(1915, 127, 'Chuy Oblasty (Bishkek)'),
(1916, 127, 'Jalal-Abad Oblasty'),
(1917, 127, 'Naryn Oblasty'),
(1918, 127, 'Osh Oblasty'),
(1919, 127, 'Talas Oblasty'),
(1920, 127, 'Ysyk-Kol Oblasty (Karakol)'),
(1921, 128, 'Attapu'),
(1922, 128, 'Bokeo'),
(1923, 128, 'Bolikhamxai'),
(1924, 128, 'Champasak'),
(1925, 128, 'Houaphan'),
(1926, 128, 'Khammouan'),
(1927, 128, 'Louangnamtha'),
(1928, 128, 'Louangphabang'),
(1929, 128, 'Oudomxai'),
(1930, 128, 'Phongsali'),
(1931, 128, 'Salavan'),
(1932, 128, 'Savannakhet'),
(1933, 128, 'Viangchan'),
(1934, 128, 'Viangchan'),
(1935, 128, 'Xaignabouli'),
(1936, 128, 'Xaisomboun'),
(1937, 128, 'Xekong'),
(1938, 128, 'Xiangkhoang'),
(1939, 129, 'Aizkraukles Rajons'),
(1940, 129, 'Aluksnes Rajons'),
(1941, 129, 'Balvu Rajons'),
(1942, 129, 'Bauskas Rajons'),
(1943, 129, 'Cesu Rajons'),
(1944, 129, 'Daugavpils'),
(1945, 129, 'Daugavpils Rajons'),
(1946, 129, 'Dobeles Rajons'),
(1947, 129, 'Gulbenes Rajons'),
(1948, 129, 'Jekabpils Rajons'),
(1949, 129, 'Jelgava'),
(1950, 129, 'Jelgavas Rajons'),
(1951, 129, 'Jurmala'),
(1952, 129, 'Kraslavas Rajons'),
(1953, 129, 'Kuldigas Rajons'),
(1954, 129, 'Leipaja'),
(1955, 129, 'Liepajas Rajons'),
(1956, 129, 'Limbazu Rajons'),
(1957, 129, 'Ludzas Rajons'),
(1958, 129, 'Madonas Rajons'),
(1959, 129, 'Ogres Rajons'),
(1960, 129, 'Preilu Rajons'),
(1961, 129, 'Rezekne'),
(1962, 129, 'Rezeknes Rajons'),
(1963, 129, 'Riga'),
(1964, 129, 'Rigas Rajons'),
(1965, 129, 'Saldus Rajons'),
(1966, 129, 'Talsu Rajons'),
(1967, 129, 'Tukuma Rajons'),
(1968, 129, 'Valkas Rajons'),
(1969, 129, 'Valmieras Rajons'),
(1970, 129, 'Ventspils'),
(1971, 129, 'Ventspils Rajons'),
(1972, 130, 'Beyrouth'),
(1973, 130, 'Ech Chimal'),
(1974, 130, 'Ej Jnoub'),
(1975, 130, 'El Bekaa'),
(1976, 130, 'Jabal Loubnane'),
(1977, 131, 'Berea'),
(1978, 131, 'Butha-Buthe'),
(1979, 131, 'Leribe'),
(1980, 131, 'Mafeteng'),
(1981, 131, 'Maseru'),
(1982, 131, 'Mohales Hoek'),
(1983, 131, 'Mokhotlong'),
(1984, 131, 'Qacha\'s Nek'),
(1985, 131, 'Quthing'),
(1986, 131, 'Thaba-Tseka'),
(1987, 132, 'Bomi'),
(1988, 132, 'Bong'),
(1989, 132, 'Grand Bassa'),
(1990, 132, 'Grand Cape Mount'),
(1991, 132, 'Grand Gedeh'),
(1992, 132, 'Grand Kru'),
(1993, 132, 'Lofa'),
(1994, 132, 'Margibi'),
(1995, 132, 'Maryland'),
(1996, 132, 'Montserrado'),
(1997, 132, 'Nimba'),
(1998, 132, 'River Cess'),
(1999, 132, 'Sinoe'),
(2000, 133, 'Ajdabiya'),
(2001, 133, 'Al \'Aziziyah'),
(2002, 133, 'Al Fatih'),
(2003, 133, 'Al Jabal al Akhdar'),
(2004, 133, 'Al Jufrah'),
(2005, 133, 'Al Khums'),
(2006, 133, 'Al Kufrah'),
(2007, 133, 'An Nuqat al Khams'),
(2008, 133, 'Ash Shati\''),
(2009, 133, 'Awbari'),
(2010, 133, 'Az Zawiyah'),
(2011, 133, 'Banghazi'),
(2012, 133, 'Darnah'),
(2013, 133, 'Ghadamis'),
(2014, 133, 'Gharyan'),
(2015, 133, 'Misratah'),
(2016, 133, 'Murzuq'),
(2017, 133, 'Sabha'),
(2018, 133, 'Sawfajjin'),
(2019, 133, 'Surt'),
(2020, 133, 'Tarabulus'),
(2021, 133, 'Tarhunah'),
(2022, 133, 'Tubruq'),
(2023, 133, 'Yafran'),
(2024, 133, 'Zlitan'),
(2025, 134, 'Balzers'),
(2026, 134, 'Eschen'),
(2027, 134, 'Gamprin'),
(2028, 134, 'Mauren'),
(2029, 134, 'Planken'),
(2030, 134, 'Ruggell'),
(2031, 134, 'Schaan'),
(2032, 134, 'Schellenberg'),
(2033, 134, 'Triesen'),
(2034, 134, 'Triesenberg'),
(2035, 134, 'Vaduz'),
(2036, 135, 'Akmenes Rajonas'),
(2037, 135, 'Alytaus Rajonas'),
(2038, 135, 'Alytus'),
(2039, 135, 'Anyksciu Rajonas'),
(2040, 135, 'Birstonas'),
(2041, 135, 'Birzu Rajonas'),
(2042, 135, 'Druskininkai'),
(2043, 135, 'Ignalinos Rajonas'),
(2044, 135, 'Jonavos Rajonas'),
(2045, 135, 'Joniskio Rajonas'),
(2046, 135, 'Jurbarko Rajonas'),
(2047, 135, 'Kaisiadoriu Rajonas'),
(2048, 135, 'Kaunas'),
(2049, 135, 'Kauno Rajonas'),
(2050, 135, 'Kedainiu Rajonas'),
(2051, 135, 'Kelmes Rajonas'),
(2052, 135, 'Klaipeda'),
(2053, 135, 'Klaipedos Rajonas'),
(2054, 135, 'Kretingos Rajonas'),
(2055, 135, 'Kupiskio Rajonas'),
(2056, 135, 'Lazdiju Rajonas'),
(2057, 135, 'Marijampole'),
(2058, 135, 'Marijampoles Rajonas'),
(2059, 135, 'Mazeikiu Rajonas'),
(2060, 135, 'Moletu Rajonas'),
(2061, 135, 'Neringa Pakruojo Rajonas'),
(2062, 135, 'Palanga'),
(2063, 135, 'Panevezio Rajonas'),
(2064, 135, 'Panevezys'),
(2065, 135, 'Pasvalio Rajonas'),
(2066, 135, 'Plunges Rajonas'),
(2067, 135, 'Prienu Rajonas'),
(2068, 135, 'Radviliskio Rajonas'),
(2069, 135, 'Raseiniu Rajonas'),
(2070, 135, 'Rokiskio Rajonas'),
(2071, 135, 'Sakiu Rajonas'),
(2072, 135, 'Salcininku Rajonas'),
(2073, 135, 'Siauliai'),
(2074, 135, 'Siauliu Rajonas'),
(2075, 135, 'Silales Rajonas'),
(2076, 135, 'Silutes Rajonas'),
(2077, 135, 'Sirvintu Rajonas'),
(2078, 135, 'Skuodo Rajonas'),
(2079, 135, 'Svencioniu Rajonas'),
(2080, 135, 'Taurages Rajonas'),
(2081, 135, 'Telsiu Rajonas'),
(2082, 135, 'Traku Rajonas'),
(2083, 135, 'Ukmerges Rajonas'),
(2084, 135, 'Utenos Rajonas'),
(2085, 135, 'Varenos Rajonas'),
(2086, 135, 'Vilkaviskio Rajonas'),
(2087, 135, 'Vilniaus Rajonas'),
(2088, 135, 'Vilnius'),
(2089, 135, 'Zarasu Rajonas'),
(2090, 136, 'Diekirch'),
(2091, 136, 'Grevenmacher'),
(2092, 136, 'Luxembourg'),
(2093, 137, 'Macau');
INSERT INTO `provinces_list` (`id`, `country_id`, `name`) VALUES
(2094, 138, 'Aracinovo'),
(2095, 138, 'Bac'),
(2096, 138, 'Belcista'),
(2097, 138, 'Berovo'),
(2098, 138, 'Bistrica'),
(2099, 138, 'Bitola'),
(2100, 138, 'Blatec'),
(2101, 138, 'Bogdanci'),
(2102, 138, 'Bogomila'),
(2103, 138, 'Bogovinje'),
(2104, 138, 'Bosilovo'),
(2105, 138, 'Brvenica'),
(2106, 138, 'Cair (Skopje)'),
(2107, 138, 'Capari'),
(2108, 138, 'Caska'),
(2109, 138, 'Cegrane'),
(2110, 138, 'Centar (Skopje)'),
(2111, 138, 'Centar Zupa'),
(2112, 138, 'Cesinovo'),
(2113, 138, 'Cucer-Sandevo'),
(2114, 138, 'Debar'),
(2115, 138, 'Delcevo'),
(2116, 138, 'Delogozdi'),
(2117, 138, 'Demir Hisar'),
(2118, 138, 'Demir Kapija'),
(2119, 138, 'Dobrusevo'),
(2120, 138, 'Dolna Banjica'),
(2121, 138, 'Dolneni'),
(2122, 138, 'Dorce Petrov (Skopje)'),
(2123, 138, 'Drugovo'),
(2124, 138, 'Dzepciste'),
(2125, 138, 'Gazi Baba (Skopje)'),
(2126, 138, 'Gevgelija'),
(2127, 138, 'Gostivar'),
(2128, 138, 'Gradsko'),
(2129, 138, 'Ilinden'),
(2130, 138, 'Izvor'),
(2131, 138, 'Jegunovce'),
(2132, 138, 'Kamenjane'),
(2133, 138, 'Karbinci'),
(2134, 138, 'Karpos (Skopje)'),
(2135, 138, 'Kavadarci'),
(2136, 138, 'Kicevo'),
(2137, 138, 'Kisela Voda (Skopje)'),
(2138, 138, 'Klecevce'),
(2139, 138, 'Kocani'),
(2140, 138, 'Konce'),
(2141, 138, 'Kondovo'),
(2142, 138, 'Konopiste'),
(2143, 138, 'Kosel'),
(2144, 138, 'Kratovo'),
(2145, 138, 'Kriva Palanka'),
(2146, 138, 'Krivogastani'),
(2147, 138, 'Krusevo'),
(2148, 138, 'Kuklis'),
(2149, 138, 'Kukurecani'),
(2150, 138, 'Kumanovo'),
(2151, 138, 'Labunista'),
(2152, 138, 'Lipkovo'),
(2153, 138, 'Lozovo'),
(2154, 138, 'Lukovo'),
(2155, 138, 'Makedonska Kamenica'),
(2156, 138, 'Makedonski Brod'),
(2157, 138, 'Mavrovi Anovi'),
(2158, 138, 'Meseista'),
(2159, 138, 'Miravci'),
(2160, 138, 'Mogila'),
(2161, 138, 'Murtino'),
(2162, 138, 'Negotino'),
(2163, 138, 'Negotino-Poloska'),
(2164, 138, 'Novaci'),
(2165, 138, 'Novo Selo'),
(2166, 138, 'Oblesevo'),
(2167, 138, 'Ohrid'),
(2168, 138, 'Orasac'),
(2169, 138, 'Orizari'),
(2170, 138, 'Oslomej'),
(2171, 138, 'Pehcevo'),
(2172, 138, 'Petrovec'),
(2173, 138, 'Plasnia'),
(2174, 138, 'Podares'),
(2175, 138, 'Prilep'),
(2176, 138, 'Probistip'),
(2177, 138, 'Radovis'),
(2178, 138, 'Rankovce'),
(2179, 138, 'Resen'),
(2180, 138, 'Rosoman'),
(2181, 138, 'Rostusa'),
(2182, 138, 'Samokov'),
(2183, 138, 'Saraj'),
(2184, 138, 'Sipkovica'),
(2185, 138, 'Sopiste'),
(2186, 138, 'Sopotnika'),
(2187, 138, 'Srbinovo'),
(2188, 138, 'Star Dojran'),
(2189, 138, 'Staravina'),
(2190, 138, 'Staro Nagoricane'),
(2191, 138, 'Stip'),
(2192, 138, 'Struga'),
(2193, 138, 'Strumica'),
(2194, 138, 'Studenicani'),
(2195, 138, 'Suto Orizari (Skopje)'),
(2196, 138, 'Sveti Nikole'),
(2197, 138, 'Tearce'),
(2198, 138, 'Tetovo'),
(2199, 138, 'Topolcani'),
(2200, 138, 'Valandovo'),
(2201, 138, 'Vasilevo'),
(2202, 138, 'Veles'),
(2203, 138, 'Velesta'),
(2204, 138, 'Vevcani'),
(2205, 138, 'Vinica'),
(2206, 138, 'Vitoliste'),
(2207, 138, 'Vranestica'),
(2208, 138, 'Vrapciste'),
(2209, 138, 'Vratnica'),
(2210, 138, 'Vrutok'),
(2211, 138, 'Zajas'),
(2212, 138, 'Zelenikovo'),
(2213, 138, 'Zileno'),
(2214, 138, 'Zitose'),
(2215, 138, 'Zletovo'),
(2216, 138, 'Zrnovci'),
(2217, 139, 'Antananarivo'),
(2218, 139, 'Antsiranana'),
(2219, 139, 'Fianarantsoa'),
(2220, 139, 'Mahajanga'),
(2221, 139, 'Toamasina'),
(2222, 139, 'Toliara'),
(2223, 140, 'Balaka'),
(2224, 140, 'Blantyre'),
(2225, 140, 'Chikwawa'),
(2226, 140, 'Chiradzulu'),
(2227, 140, 'Chitipa'),
(2228, 140, 'Dedza'),
(2229, 140, 'Dowa'),
(2230, 140, 'Karonga'),
(2231, 140, 'Kasungu'),
(2232, 140, 'Likoma'),
(2233, 140, 'Lilongwe'),
(2234, 140, 'Machinga (Kasupe)'),
(2235, 140, 'Mangochi'),
(2236, 140, 'Mchinji'),
(2237, 140, 'Mulanje'),
(2238, 140, 'Mwanza'),
(2239, 140, 'Mzimba'),
(2240, 140, 'Nkhata Bay'),
(2241, 140, 'Nkhotakota'),
(2242, 140, 'Nsanje'),
(2243, 140, 'Ntcheu'),
(2244, 140, 'Ntchisi'),
(2245, 140, 'Phalombe'),
(2246, 140, 'Rumphi'),
(2247, 140, 'Salima'),
(2248, 140, 'Thyolo'),
(2249, 140, 'Zomba'),
(2250, 141, 'Johor'),
(2251, 141, 'Kedah'),
(2252, 141, 'Kelantan'),
(2253, 141, 'Labuan'),
(2254, 141, 'Melaka'),
(2255, 141, 'Negeri Sembilan'),
(2256, 141, 'Pahang'),
(2257, 141, 'Perak'),
(2258, 141, 'Perlis'),
(2259, 141, 'Pulau Pinang'),
(2260, 141, 'Sabah'),
(2261, 141, 'Sarawak'),
(2262, 141, 'Selangor'),
(2263, 141, 'Terengganu'),
(2264, 141, 'Wilayah Persekutuan'),
(2265, 142, 'Alifu'),
(2266, 142, 'Baa'),
(2267, 142, 'Dhaalu'),
(2268, 142, 'Faafu'),
(2269, 142, 'Gaafu Alifu'),
(2270, 142, 'Gaafu Dhaalu'),
(2271, 142, 'Gnaviyani'),
(2272, 142, 'Haa Alifu'),
(2273, 142, 'Haa Dhaalu'),
(2274, 142, 'Kaafu'),
(2275, 142, 'Laamu'),
(2276, 142, 'Lhaviyani'),
(2277, 142, 'Maale'),
(2278, 142, 'Meemu'),
(2279, 142, 'Noonu'),
(2280, 142, 'Raa'),
(2281, 142, 'Seenu'),
(2282, 142, 'Shaviyani'),
(2283, 142, 'Thaa'),
(2284, 142, 'Vaavu'),
(2285, 143, 'Gao'),
(2286, 143, 'Kayes'),
(2287, 143, 'Kidal'),
(2288, 143, 'Koulikoro'),
(2289, 143, 'Mopti'),
(2290, 143, 'Segou'),
(2291, 143, 'Sikasso'),
(2292, 143, 'Tombouctou'),
(2293, 144, 'Valletta'),
(2294, 145, 'Man, Isle of'),
(2295, 146, 'Ailinginae'),
(2296, 146, 'Ailinglaplap'),
(2297, 146, 'Ailuk'),
(2298, 146, 'Arno'),
(2299, 146, 'Aur'),
(2300, 146, 'Bikar'),
(2301, 146, 'Bikini'),
(2302, 146, 'Bokak'),
(2303, 146, 'Ebon'),
(2304, 146, 'Enewetak'),
(2305, 146, 'Erikub'),
(2306, 146, 'Jabat'),
(2307, 146, 'Jaluit'),
(2308, 146, 'Jemo'),
(2309, 146, 'Kili'),
(2310, 146, 'Kwajalein'),
(2311, 146, 'Lae'),
(2312, 146, 'Lib'),
(2313, 146, 'Likiep'),
(2314, 146, 'Majuro'),
(2315, 146, 'Maloelap'),
(2316, 146, 'Mejit'),
(2317, 146, 'Mili'),
(2318, 146, 'Namorik'),
(2319, 146, 'Namu'),
(2320, 146, 'Rongelap'),
(2321, 146, 'Rongrik'),
(2322, 146, 'Toke'),
(2323, 146, 'Ujae'),
(2324, 146, 'Ujelang'),
(2325, 146, 'Utirik'),
(2326, 146, 'Wotho'),
(2327, 146, 'Wotje'),
(2328, 147, 'Martinique'),
(2329, 148, 'Adrar'),
(2330, 148, 'Assaba'),
(2331, 148, 'Brakna'),
(2332, 148, 'Dakhlet Nouadhibou'),
(2333, 148, 'Gorgol'),
(2334, 148, 'Guidimaka'),
(2335, 148, 'Hodh Ech Chargui'),
(2336, 148, 'Hodh El Gharbi'),
(2337, 148, 'Inchiri'),
(2338, 148, 'Nouakchott'),
(2339, 148, 'Tagant'),
(2340, 148, 'Tiris Zemmour'),
(2341, 148, 'Trarza'),
(2342, 149, 'Agalega Islands'),
(2343, 149, 'Black River'),
(2344, 149, 'Cargados Carajos Shoals'),
(2345, 149, 'Flacq'),
(2346, 149, 'Grand Port'),
(2347, 149, 'Moka'),
(2348, 149, 'Pamplemousses'),
(2349, 149, 'Plaines Wilhems'),
(2350, 149, 'Port Louis'),
(2351, 149, 'Riviere du Rempart'),
(2352, 149, 'Rodrigues'),
(2353, 149, 'Savanne'),
(2354, 150, 'Mayotte'),
(2355, 151, 'Aguascalientes'),
(2356, 151, 'Baja California'),
(2357, 151, 'Baja California Sur'),
(2358, 151, 'Campeche'),
(2359, 151, 'Chiapas'),
(2360, 151, 'Chihuahua'),
(2361, 151, 'Coahuila de Zaragoza'),
(2362, 151, 'Colima'),
(2363, 151, 'Distrito Federal'),
(2364, 151, 'Durango'),
(2365, 151, 'Guanajuato'),
(2366, 151, 'Guerrero'),
(2367, 151, 'Hidalgo'),
(2368, 151, 'Jalisco'),
(2369, 151, 'Mexico'),
(2370, 151, 'Michoacan de Ocampo'),
(2371, 151, 'Morelos'),
(2372, 151, 'Nayarit'),
(2373, 151, 'Nuevo Leon'),
(2374, 151, 'Oaxaca'),
(2375, 151, 'Puebla'),
(2376, 151, 'Queretaro de Arteaga'),
(2377, 151, 'Quintana Roo'),
(2378, 151, 'San Luis Potosi'),
(2379, 151, 'Sinaloa'),
(2380, 151, 'Sonora'),
(2381, 151, 'Tabasco'),
(2382, 151, 'Tamaulipas'),
(2383, 151, 'Tlaxcala'),
(2384, 151, 'Veracruz-Llave'),
(2385, 151, 'Yucatan'),
(2386, 151, 'Zacatecas'),
(2387, 152, 'Chuuk (Truk)'),
(2388, 152, 'Kosrae'),
(2389, 152, 'Pohnpei'),
(2390, 152, 'Yap'),
(2391, 153, 'Midway Islands'),
(2392, 154, 'Balti'),
(2393, 154, 'Cahul'),
(2394, 154, 'Chisinau'),
(2395, 154, 'Chisinau'),
(2396, 154, 'Dubasari'),
(2397, 154, 'Edinet'),
(2398, 154, 'Gagauzia'),
(2399, 154, 'Lapusna'),
(2400, 154, 'Orhei'),
(2401, 154, 'Soroca'),
(2402, 154, 'Tighina'),
(2403, 154, 'Ungheni'),
(2404, 155, 'Fontvieille'),
(2405, 155, 'La Condamine'),
(2406, 155, 'Monaco-Ville'),
(2407, 155, 'Monte-Carlo'),
(2408, 156, 'Arhangay'),
(2409, 156, 'Bayan-Olgiy'),
(2410, 156, 'Bayanhongor'),
(2411, 156, 'Bulgan'),
(2412, 156, 'Darhan'),
(2413, 156, 'Dornod'),
(2414, 156, 'Dornogovi'),
(2415, 156, 'Dundgovi'),
(2416, 156, 'Dzavhan'),
(2417, 156, 'Erdenet'),
(2418, 156, 'Govi-Altay'),
(2419, 156, 'Hentiy'),
(2420, 156, 'Hovd'),
(2421, 156, 'Hovsgol'),
(2422, 156, 'Omnogovi'),
(2423, 156, 'Ovorhangay'),
(2424, 156, 'Selenge'),
(2425, 156, 'Suhbaatar'),
(2426, 156, 'Tov'),
(2427, 156, 'Ulaanbaatar'),
(2428, 156, 'Uvs'),
(2429, 157, 'Saint Anthony'),
(2430, 157, 'Saint Georges'),
(2431, 157, 'Saint Peter\'s'),
(2432, 158, 'Agadir'),
(2433, 158, 'Al Hoceima'),
(2434, 158, 'Azilal'),
(2435, 158, 'Ben Slimane'),
(2436, 158, 'Beni Mellal'),
(2437, 158, 'Boulemane'),
(2438, 158, 'Casablanca'),
(2439, 158, 'Chaouen'),
(2440, 158, 'El Jadida'),
(2441, 158, 'El Kelaa des Srarhna'),
(2442, 158, 'Er Rachidia'),
(2443, 158, 'Essaouira'),
(2444, 158, 'Fes'),
(2445, 158, 'Figuig'),
(2446, 158, 'Guelmim'),
(2447, 158, 'Ifrane'),
(2448, 158, 'Kenitra'),
(2449, 158, 'Khemisset'),
(2450, 158, 'Khenifra'),
(2451, 158, 'Khouribga'),
(2452, 158, 'Laayoune'),
(2453, 158, 'Larache'),
(2454, 158, 'Marrakech'),
(2455, 158, 'Meknes'),
(2456, 158, 'Nador'),
(2457, 158, 'Ouarzazate'),
(2458, 158, 'Oujda'),
(2459, 158, 'Rabat-Sale'),
(2460, 158, 'Safi'),
(2461, 158, 'Settat'),
(2462, 158, 'Sidi Kacem'),
(2463, 158, 'Tan-Tan'),
(2464, 158, 'Tanger'),
(2465, 158, 'Taounate'),
(2466, 158, 'Taroudannt'),
(2467, 158, 'Tata'),
(2468, 158, 'Taza'),
(2469, 158, 'Tetouan'),
(2470, 158, 'Tiznit'),
(2471, 159, 'Cabo Delgado'),
(2472, 159, 'Gaza'),
(2473, 159, 'Inhambane'),
(2474, 159, 'Manica'),
(2475, 159, 'Maputo'),
(2476, 159, 'Nampula'),
(2477, 159, 'Niassa'),
(2478, 159, 'Sofala'),
(2479, 159, 'Tete'),
(2480, 159, 'Zambezia'),
(2481, 160, 'Caprivi'),
(2482, 160, 'Erongo'),
(2483, 160, 'Hardap'),
(2484, 160, 'Karas'),
(2485, 160, 'Khomas'),
(2486, 160, 'Kunene'),
(2487, 160, 'Ohangwena'),
(2488, 160, 'Okavango'),
(2489, 160, 'Omaheke'),
(2490, 160, 'Omusati'),
(2491, 160, 'Oshana'),
(2492, 160, 'Oshikoto'),
(2493, 160, 'Otjozondjupa'),
(2494, 161, 'Aiwo'),
(2495, 161, 'Anabar'),
(2496, 161, 'Anetan'),
(2497, 161, 'Anibare'),
(2498, 161, 'Baiti'),
(2499, 161, 'Boe'),
(2500, 161, 'Buada'),
(2501, 161, 'Denigomodu'),
(2502, 161, 'Ewa'),
(2503, 161, 'Ijuw'),
(2504, 161, 'Meneng'),
(2505, 161, 'Nibok'),
(2506, 161, 'Uaboe'),
(2507, 161, 'Yaren'),
(2508, 162, 'Bagmati'),
(2509, 162, 'Bheri'),
(2510, 162, 'Dhawalagiri'),
(2511, 162, 'Gandaki'),
(2512, 162, 'Janakpur'),
(2513, 162, 'Karnali'),
(2514, 162, 'Kosi'),
(2515, 162, 'Lumbini'),
(2516, 162, 'Mahakali'),
(2517, 162, 'Mechi'),
(2518, 162, 'Narayani'),
(2519, 162, 'Rapti'),
(2520, 162, 'Sagarmatha'),
(2521, 162, 'Seti'),
(2522, 163, 'Drenthe'),
(2523, 163, 'Flevoland'),
(2524, 163, 'Friesland'),
(2525, 163, 'Gelderland'),
(2526, 163, 'Groningen'),
(2527, 163, 'Limburg'),
(2528, 163, 'Noord-Brabant'),
(2529, 163, 'Noord-Holland'),
(2530, 163, 'Overijssel'),
(2531, 163, 'Utrecht'),
(2532, 163, 'Zeeland'),
(2533, 163, 'Zuid-Holland'),
(2534, 164, 'Netherlands Antilles'),
(2535, 165, 'Iles Loyaute'),
(2536, 165, 'Nord'),
(2537, 165, 'Sud'),
(2538, 166, 'Akaroa'),
(2539, 166, 'Amuri'),
(2540, 166, 'Ashburton'),
(2541, 166, 'Bay of Islands'),
(2542, 166, 'Bruce'),
(2543, 166, 'Buller'),
(2544, 166, 'Chatham Islands'),
(2545, 166, 'Cheviot'),
(2546, 166, 'Clifton'),
(2547, 166, 'Clutha'),
(2548, 166, 'Cook'),
(2549, 166, 'Dannevirke'),
(2550, 166, 'Egmont'),
(2551, 166, 'Eketahuna'),
(2552, 166, 'Ellesmere'),
(2553, 166, 'Eltham'),
(2554, 166, 'Eyre'),
(2555, 166, 'Featherston'),
(2556, 166, 'Franklin'),
(2557, 166, 'Golden Bay'),
(2558, 166, 'Great Barrier Island'),
(2559, 166, 'Grey'),
(2560, 166, 'Hauraki Plains'),
(2561, 166, 'Hawera'),
(2562, 166, 'Hawke\'s Bay'),
(2563, 166, 'Heathcote'),
(2564, 166, 'Hikurangi'),
(2565, 166, 'Hobson'),
(2566, 166, 'Hokianga'),
(2567, 166, 'Horowhenua'),
(2568, 166, 'Hurunui'),
(2569, 166, 'Hutt'),
(2570, 166, 'Inangahua'),
(2571, 166, 'Inglewood'),
(2572, 166, 'Kaikoura'),
(2573, 166, 'Kairanga'),
(2574, 166, 'Kiwitea'),
(2575, 166, 'Lake'),
(2576, 166, 'Mackenzie'),
(2577, 166, 'Malvern'),
(2578, 166, 'Manaia'),
(2579, 166, 'Manawatu'),
(2580, 166, 'Mangonui'),
(2581, 166, 'Maniototo'),
(2582, 166, 'Marlborough'),
(2583, 166, 'Masterton'),
(2584, 166, 'Matamata'),
(2585, 166, 'Mount Herbert'),
(2586, 166, 'Ohinemuri'),
(2587, 166, 'Opotiki'),
(2588, 166, 'Oroua'),
(2589, 166, 'Otamatea'),
(2590, 166, 'Otorohanga'),
(2591, 166, 'Oxford'),
(2592, 166, 'Pahiatua'),
(2593, 166, 'Paparua'),
(2594, 166, 'Patea'),
(2595, 166, 'Piako'),
(2596, 166, 'Pohangina'),
(2597, 166, 'Raglan'),
(2598, 166, 'Rangiora'),
(2599, 166, 'Rangitikei'),
(2600, 166, 'Rodney'),
(2601, 166, 'Rotorua'),
(2602, 166, 'Runanga'),
(2603, 166, 'Saint Kilda'),
(2604, 166, 'Silverpeaks'),
(2605, 166, 'Southland'),
(2606, 166, 'Stewart Island'),
(2607, 166, 'Stratford'),
(2608, 166, 'Strathallan'),
(2609, 166, 'Taranaki'),
(2610, 166, 'Taumarunui'),
(2611, 166, 'Taupo'),
(2612, 166, 'Tauranga'),
(2613, 166, 'Thames-Coromandel'),
(2614, 166, 'Tuapeka'),
(2615, 166, 'Vincent'),
(2616, 166, 'Waiapu'),
(2617, 166, 'Waiheke'),
(2618, 166, 'Waihemo'),
(2619, 166, 'Waikato'),
(2620, 166, 'Waikohu'),
(2621, 166, 'Waimairi'),
(2622, 166, 'Waimarino'),
(2623, 166, 'Waimate'),
(2624, 166, 'Waimate West'),
(2625, 166, 'Waimea'),
(2626, 166, 'Waipa'),
(2627, 166, 'Waipawa'),
(2628, 166, 'Waipukurau'),
(2629, 166, 'Wairarapa South'),
(2630, 166, 'Wairewa'),
(2631, 166, 'Wairoa'),
(2632, 166, 'Waitaki'),
(2633, 166, 'Waitomo'),
(2634, 166, 'Waitotara'),
(2635, 166, 'Wallace'),
(2636, 166, 'Wanganui'),
(2637, 166, 'Waverley'),
(2638, 166, 'Westland'),
(2639, 166, 'Whakatane'),
(2640, 166, 'Whangarei'),
(2641, 166, 'Whangaroa'),
(2642, 166, 'Woodville'),
(2643, 167, 'Atlantico Norte'),
(2644, 167, 'Atlantico Sur'),
(2645, 167, 'Boaco'),
(2646, 167, 'Carazo'),
(2647, 167, 'Chinandega'),
(2648, 167, 'Chontales'),
(2649, 167, 'Esteli'),
(2650, 167, 'Granada'),
(2651, 167, 'Jinotega'),
(2652, 167, 'Leon'),
(2653, 167, 'Madriz'),
(2654, 167, 'Managua'),
(2655, 167, 'Masaya'),
(2656, 167, 'Matagalpa'),
(2657, 167, 'Nueva Segovia'),
(2658, 167, 'Rio San Juan'),
(2659, 167, 'Rivas'),
(2660, 168, 'Agadez'),
(2661, 168, 'Diffa'),
(2662, 168, 'Dosso'),
(2663, 168, 'Maradi'),
(2664, 168, 'Niamey'),
(2665, 168, 'Tahoua'),
(2666, 168, 'Tillaberi'),
(2667, 168, 'Zinder'),
(2668, 169, 'Abia'),
(2669, 169, 'Abuja Federal Capital Territory'),
(2670, 169, 'Adamawa'),
(2671, 169, 'Akwa Ibom'),
(2672, 169, 'Anambra'),
(2673, 169, 'Bauchi'),
(2674, 169, 'Bayelsa'),
(2675, 169, 'Benue'),
(2676, 169, 'Borno'),
(2677, 169, 'Cross River'),
(2678, 169, 'Delta'),
(2679, 169, 'Ebonyi'),
(2680, 169, 'Edo'),
(2681, 169, 'Ekiti'),
(2682, 169, 'Enugu'),
(2683, 169, 'Gombe'),
(2684, 169, 'Imo'),
(2685, 169, 'Jigawa'),
(2686, 169, 'Kaduna'),
(2687, 169, 'Kano'),
(2688, 169, 'Katsina'),
(2689, 169, 'Kebbi'),
(2690, 169, 'Kogi'),
(2691, 169, 'Kwara'),
(2692, 169, 'Lagos'),
(2693, 169, 'Nassarawa'),
(2694, 169, 'Niger'),
(2695, 169, 'Ogun'),
(2696, 169, 'Ondo'),
(2697, 169, 'Osun'),
(2698, 169, 'Oyo'),
(2699, 169, 'Plateau'),
(2700, 169, 'Rivers'),
(2701, 169, 'Sokoto'),
(2702, 169, 'Taraba'),
(2703, 169, 'Yobe'),
(2704, 169, 'Zamfara'),
(2705, 170, 'Niue'),
(2706, 171, 'Norfolk Island'),
(2707, 172, 'Northern Islands'),
(2708, 172, 'Rota'),
(2709, 172, 'Saipan'),
(2710, 172, 'Tinian'),
(2711, 173, 'Akershus'),
(2712, 173, 'Aust-Agder'),
(2713, 173, 'Buskerud'),
(2714, 173, 'Finnmark'),
(2715, 173, 'Hedmark'),
(2716, 173, 'Hordaland'),
(2717, 173, 'More og Romsdal'),
(2718, 173, 'Nord-Trondelag'),
(2719, 173, 'Nordland'),
(2720, 173, 'Oppland'),
(2721, 173, 'Oslo'),
(2722, 173, 'Ostfold'),
(2723, 173, 'Rogaland'),
(2724, 173, 'Sogn og Fjordane'),
(2725, 173, 'Sor-Trondelag'),
(2726, 173, 'Telemark'),
(2727, 173, 'Troms'),
(2728, 173, 'Vest-Agder'),
(2729, 173, 'Vestfold'),
(2730, 174, 'Ad Dakhiliyah'),
(2731, 174, 'Al Batinah'),
(2732, 174, 'Al Wusta'),
(2733, 174, 'Ash Sharqiyah'),
(2734, 174, 'Az Zahirah'),
(2735, 174, 'Masqat'),
(2736, 174, 'Musandam'),
(2737, 174, 'Zufar'),
(2738, 175, 'Balochistan'),
(2739, 175, 'Federally Administered Tribal Areas'),
(2740, 175, 'Islamabad Capital Territory'),
(2741, 175, 'North-West Frontier Province'),
(2742, 175, 'Punjab'),
(2743, 175, 'Sindh'),
(2744, 176, 'Aimeliik'),
(2745, 176, 'Airai'),
(2746, 176, 'Angaur'),
(2747, 176, 'Hatobohei'),
(2748, 176, 'Kayangel'),
(2749, 176, 'Koror'),
(2750, 176, 'Melekeok'),
(2751, 176, 'Ngaraard'),
(2752, 176, 'Ngarchelong'),
(2753, 176, 'Ngardmau'),
(2754, 176, 'Ngatpang'),
(2755, 176, 'Ngchesar'),
(2756, 176, 'Ngeremlengui'),
(2757, 176, 'Ngiwal'),
(2758, 176, 'Palau Island'),
(2759, 176, 'Peleliu'),
(2760, 176, 'Sonsoral'),
(2761, 176, 'Tobi'),
(2762, 177, 'Bocas del Toro'),
(2763, 177, 'Chiriqui'),
(2764, 177, 'Cocle'),
(2765, 177, 'Colon'),
(2766, 177, 'Darien'),
(2767, 177, 'Herrera'),
(2768, 177, 'Los Santos'),
(2769, 177, 'Panama'),
(2770, 177, 'San Blas'),
(2771, 177, 'Veraguas'),
(2772, 178, 'Bougainville'),
(2773, 178, 'Central'),
(2774, 178, 'Chimbu'),
(2775, 178, 'East New Britain'),
(2776, 178, 'East Sepik'),
(2777, 178, 'Eastern Highlands'),
(2778, 178, 'Enga'),
(2779, 178, 'Gulf'),
(2780, 178, 'Madang'),
(2781, 178, 'Manus'),
(2782, 178, 'Milne Bay'),
(2783, 178, 'Morobe'),
(2784, 178, 'National Capital'),
(2785, 178, 'New Ireland'),
(2786, 178, 'Northern'),
(2787, 178, 'Sandaun'),
(2788, 178, 'Southern Highlands'),
(2789, 178, 'West New Britain'),
(2790, 178, 'Western'),
(2791, 178, 'Western Highlands'),
(2792, 179, 'Alto Paraguay'),
(2793, 179, 'Alto Parana'),
(2794, 179, 'Amambay'),
(2795, 179, 'Asuncion (city)'),
(2796, 179, 'Boqueron'),
(2797, 179, 'Caaguazu'),
(2798, 179, 'Caazapa'),
(2799, 179, 'Canindeyu'),
(2800, 179, 'Central'),
(2801, 179, 'Concepcion'),
(2802, 179, 'Cordillera'),
(2803, 179, 'Guaira'),
(2804, 179, 'Itapua'),
(2805, 179, 'Misiones'),
(2806, 179, 'Neembucu'),
(2807, 179, 'Paraguari'),
(2808, 179, 'Presidente Hayes'),
(2809, 179, 'San Pedro'),
(2810, 180, 'Amazonas'),
(2811, 180, 'Ancash'),
(2812, 180, 'Apurimac'),
(2813, 180, 'Arequipa'),
(2814, 180, 'Ayacucho'),
(2815, 180, 'Cajamarca'),
(2816, 180, 'Callao'),
(2817, 180, 'Cusco'),
(2818, 180, 'Huancavelica'),
(2819, 180, 'Huanuco'),
(2820, 180, 'Ica'),
(2821, 180, 'Junin'),
(2822, 180, 'La Libertad'),
(2823, 180, 'Lambayeque'),
(2824, 180, 'Lima'),
(2825, 180, 'Loreto'),
(2826, 180, 'Madre de Dios'),
(2827, 180, 'Moquegua'),
(2828, 180, 'Pasco'),
(2829, 180, 'Piura'),
(2830, 180, 'Puno'),
(2831, 180, 'San Martin'),
(2832, 180, 'Tacna'),
(2833, 180, 'Tumbes'),
(2834, 180, 'Ucayali'),
(2835, 181, 'Abra'),
(2836, 181, 'Agusan del Norte'),
(2837, 181, 'Agusan del Sur'),
(2838, 181, 'Aklan'),
(2839, 181, 'Albay'),
(2840, 181, 'Angeles'),
(2841, 181, 'Antique'),
(2842, 181, 'Aurora'),
(2843, 181, 'Bacolod'),
(2844, 181, 'Bago'),
(2845, 181, 'Baguio'),
(2846, 181, 'Bais'),
(2847, 181, 'Basilan'),
(2848, 181, 'Basilan City'),
(2849, 181, 'Bataan'),
(2850, 181, 'Batanes'),
(2851, 181, 'Batangas'),
(2852, 181, 'Batangas City'),
(2853, 181, 'Benguet'),
(2854, 181, 'Bohol'),
(2855, 181, 'Bukidnon'),
(2856, 181, 'Bulacan'),
(2857, 181, 'Butuan'),
(2858, 181, 'Cabanatuan'),
(2859, 181, 'Cadiz'),
(2860, 181, 'Cagayan'),
(2861, 181, 'Cagayan de Oro'),
(2862, 181, 'Calbayog'),
(2863, 181, 'Caloocan'),
(2864, 181, 'Camarines Norte'),
(2865, 181, 'Camarines Sur'),
(2866, 181, 'Camiguin'),
(2867, 181, 'Canlaon'),
(2868, 181, 'Capiz'),
(2869, 181, 'Catanduanes'),
(2870, 181, 'Cavite'),
(2871, 181, 'Cavite City'),
(2872, 181, 'Cebu'),
(2873, 181, 'Cebu City'),
(2874, 181, 'Cotabato'),
(2875, 181, 'Dagupan'),
(2876, 181, 'Danao'),
(2877, 181, 'Dapitan'),
(2878, 181, 'Davao City Davao'),
(2879, 181, 'Davao del Sur'),
(2880, 181, 'Davao Oriental'),
(2881, 181, 'Dipolog'),
(2882, 181, 'Dumaguete'),
(2883, 181, 'Eastern Samar'),
(2884, 181, 'General Santos'),
(2885, 181, 'Gingoog'),
(2886, 181, 'Ifugao'),
(2887, 181, 'Iligan'),
(2888, 181, 'Ilocos Norte'),
(2889, 181, 'Ilocos Sur'),
(2890, 181, 'Iloilo'),
(2891, 181, 'Iloilo City'),
(2892, 181, 'Iriga'),
(2893, 181, 'Isabela'),
(2894, 181, 'Kalinga-Apayao'),
(2895, 181, 'La Carlota'),
(2896, 181, 'La Union'),
(2897, 181, 'Laguna'),
(2898, 181, 'Lanao del Norte'),
(2899, 181, 'Lanao del Sur'),
(2900, 181, 'Laoag'),
(2901, 181, 'Lapu-Lapu'),
(2902, 181, 'Legaspi'),
(2903, 181, 'Leyte'),
(2904, 181, 'Lipa'),
(2905, 181, 'Lucena'),
(2906, 181, 'Maguindanao'),
(2907, 181, 'Mandaue'),
(2908, 181, 'Manila'),
(2909, 181, 'Marawi'),
(2910, 181, 'Marinduque'),
(2911, 181, 'Masbate'),
(2912, 181, 'Mindoro Occidental'),
(2913, 181, 'Mindoro Oriental'),
(2914, 181, 'Misamis Occidental'),
(2915, 181, 'Misamis Oriental'),
(2916, 181, 'Mountain'),
(2917, 181, 'Naga'),
(2918, 181, 'Negros Occidental'),
(2919, 181, 'Negros Oriental'),
(2920, 181, 'North Cotabato'),
(2921, 181, 'Northern Samar'),
(2922, 181, 'Nueva Ecija'),
(2923, 181, 'Nueva Vizcaya'),
(2924, 181, 'Olongapo'),
(2925, 181, 'Ormoc'),
(2926, 181, 'Oroquieta'),
(2927, 181, 'Ozamis'),
(2928, 181, 'Pagadian'),
(2929, 181, 'Palawan'),
(2930, 181, 'Palayan'),
(2931, 181, 'Pampanga'),
(2932, 181, 'Pangasinan'),
(2933, 181, 'Pasay'),
(2934, 181, 'Puerto Princesa'),
(2935, 181, 'Quezon'),
(2936, 181, 'Quezon City'),
(2937, 181, 'Quirino'),
(2938, 181, 'Rizal'),
(2939, 181, 'Romblon'),
(2940, 181, 'Roxas'),
(2941, 181, 'Samar'),
(2942, 181, 'San Carlos (in Negros Occidental)'),
(2943, 181, 'San Carlos (in Pangasinan)'),
(2944, 181, 'San Jose'),
(2945, 181, 'San Pablo'),
(2946, 181, 'Silay'),
(2947, 181, 'Siquijor'),
(2948, 181, 'Sorsogon'),
(2949, 181, 'South Cotabato'),
(2950, 181, 'Southern Leyte'),
(2951, 181, 'Sultan Kudarat'),
(2952, 181, 'Sulu'),
(2953, 181, 'Surigao'),
(2954, 181, 'Surigao del Norte'),
(2955, 181, 'Surigao del Sur'),
(2956, 181, 'Tacloban'),
(2957, 181, 'Tagaytay'),
(2958, 181, 'Tagbilaran'),
(2959, 181, 'Tangub'),
(2960, 181, 'Tarlac'),
(2961, 181, 'Tawitawi'),
(2962, 181, 'Toledo'),
(2963, 181, 'Trece Martires'),
(2964, 181, 'Zambales'),
(2965, 181, 'Zamboanga'),
(2966, 181, 'Zamboanga del Norte'),
(2967, 181, 'Zamboanga del Sur'),
(2968, 182, 'Pitcaim Islands'),
(2969, 183, 'Dolnoslaskie'),
(2970, 183, 'Kujawsko-Pomorskie'),
(2971, 183, 'Lodzkie'),
(2972, 183, 'Lubelskie'),
(2973, 183, 'Lubuskie'),
(2974, 183, 'Malopolskie'),
(2975, 183, 'Mazowieckie'),
(2976, 183, 'Opolskie'),
(2977, 183, 'Podkarpackie'),
(2978, 183, 'Podlaskie'),
(2979, 183, 'Pomorskie'),
(2980, 183, 'Slaskie'),
(2981, 183, 'Swietokrzyskie'),
(2982, 183, 'Warminsko-Mazurskie'),
(2983, 183, 'Wielkopolskie'),
(2984, 183, 'Zachodniopomorskie'),
(2985, 184, 'Acores (Azores)'),
(2986, 184, 'Aveiro'),
(2987, 184, 'Beja'),
(2988, 184, 'Braga'),
(2989, 184, 'Braganca'),
(2990, 184, 'Castelo Branco'),
(2991, 184, 'Coimbra'),
(2992, 184, 'Evora'),
(2993, 184, 'Faro'),
(2994, 184, 'Guarda'),
(2995, 184, 'Leiria'),
(2996, 184, 'Lisboa'),
(2997, 184, 'Madeira'),
(2998, 184, 'Portalegre'),
(2999, 184, 'Porto'),
(3000, 184, 'Santarem'),
(3001, 184, 'Setubal'),
(3002, 184, 'Viana do Castelo'),
(3003, 184, 'Vila Real'),
(3004, 184, 'Viseu'),
(3005, 185, 'Adjuntas'),
(3006, 185, 'Aguada'),
(3007, 185, 'Aguadilla'),
(3008, 185, 'Aguas Buenas'),
(3009, 185, 'Aibonito'),
(3010, 185, 'Anasco'),
(3011, 185, 'Arecibo'),
(3012, 185, 'Arroyo'),
(3013, 185, 'Barceloneta'),
(3014, 185, 'Barranquitas'),
(3015, 185, 'Bayamon'),
(3016, 185, 'Cabo Rojo'),
(3017, 185, 'Caguas'),
(3018, 185, 'Camuy'),
(3019, 185, 'Canovanas'),
(3020, 185, 'Carolina'),
(3021, 185, 'Catano'),
(3022, 185, 'Cayey'),
(3023, 185, 'Ceiba'),
(3024, 185, 'Ciales'),
(3025, 185, 'Cidra'),
(3026, 185, 'Coamo'),
(3027, 185, 'Comerio'),
(3028, 185, 'Corozal'),
(3029, 185, 'Culebra'),
(3030, 185, 'Dorado'),
(3031, 185, 'Fajardo'),
(3032, 185, 'Florida'),
(3033, 185, 'Guanica'),
(3034, 185, 'Guayama'),
(3035, 185, 'Guayanilla'),
(3036, 185, 'Guaynabo'),
(3037, 185, 'Gurabo'),
(3038, 185, 'Hatillo'),
(3039, 185, 'Hormigueros'),
(3040, 185, 'Humacao'),
(3041, 185, 'Isabela'),
(3042, 185, 'Jayuya'),
(3043, 185, 'Juana Diaz'),
(3044, 185, 'Juncos'),
(3045, 185, 'Lajas'),
(3046, 185, 'Lares'),
(3047, 185, 'Las Marias'),
(3048, 185, 'Las Piedras'),
(3049, 185, 'Loiza'),
(3050, 185, 'Luquillo'),
(3051, 185, 'Manati'),
(3052, 185, 'Maricao'),
(3053, 185, 'Maunabo'),
(3054, 185, 'Mayaguez'),
(3055, 185, 'Moca'),
(3056, 185, 'Morovis'),
(3057, 185, 'Naguabo'),
(3058, 185, 'Naranjito'),
(3059, 185, 'Orocovis'),
(3060, 185, 'Patillas'),
(3061, 185, 'Penuelas'),
(3062, 185, 'Ponce'),
(3063, 185, 'Quebradillas'),
(3064, 185, 'Rincon'),
(3065, 185, 'Rio Grande'),
(3066, 185, 'Sabana Grande'),
(3067, 185, 'Salinas'),
(3068, 185, 'San German'),
(3069, 185, 'San Juan'),
(3070, 185, 'San Lorenzo'),
(3071, 185, 'San Sebastian'),
(3072, 185, 'Santa Isabel'),
(3073, 185, 'Toa Alta'),
(3074, 185, 'Toa Baja'),
(3075, 185, 'Trujillo Alto'),
(3076, 185, 'Utuado'),
(3077, 185, 'Vega Alta'),
(3078, 185, 'Vega Baja'),
(3079, 185, 'Vieques'),
(3080, 185, 'Villalba'),
(3081, 185, 'Yabucoa'),
(3082, 185, 'Yauco'),
(3083, 186, 'Ad Dawhah'),
(3084, 186, 'Al Ghuwayriyah'),
(3085, 186, 'Al Jumayliyah'),
(3086, 186, 'Al Khawr'),
(3087, 186, 'Al Wakrah'),
(3088, 186, 'Ar Rayyan'),
(3089, 186, 'Jarayan al Batinah'),
(3090, 186, 'Madinat ash Shamal'),
(3091, 186, 'Umm Salal'),
(3092, 187, 'Reunion'),
(3093, 188, 'Alba'),
(3094, 188, 'Arad'),
(3095, 188, 'Arges'),
(3096, 188, 'Bacau'),
(3097, 188, 'Bihor'),
(3098, 188, 'Bistrita-Nasaud'),
(3099, 188, 'Botosani'),
(3100, 188, 'Braila'),
(3101, 188, 'Brasov'),
(3102, 188, 'Bucuresti'),
(3103, 188, 'Buzau'),
(3104, 188, 'Calarasi'),
(3105, 188, 'Caras-Severin'),
(3106, 188, 'Cluj'),
(3107, 188, 'Constanta'),
(3108, 188, 'Covasna'),
(3109, 188, 'Dimbovita'),
(3110, 188, 'Dolj'),
(3111, 188, 'Galati'),
(3112, 188, 'Giurgiu'),
(3113, 188, 'Gorj'),
(3114, 188, 'Harghita'),
(3115, 188, 'Hunedoara'),
(3116, 188, 'Ialomita'),
(3117, 188, 'Iasi'),
(3118, 188, 'Maramures'),
(3119, 188, 'Mehedinti'),
(3120, 188, 'Mures'),
(3121, 188, 'Neamt'),
(3122, 188, 'Olt'),
(3123, 188, 'Prahova'),
(3124, 188, 'Salaj'),
(3125, 188, 'Satu Mare'),
(3126, 188, 'Sibiu'),
(3127, 188, 'Suceava'),
(3128, 188, 'Teleorman'),
(3129, 188, 'Timis'),
(3130, 188, 'Tulcea'),
(3131, 188, 'Vaslui'),
(3132, 188, 'Vilcea'),
(3133, 188, 'Vrancea'),
(3134, 189, 'Adygeya (Maykop)'),
(3135, 189, 'Aginskiy Buryatskiy (Aginskoye)'),
(3136, 189, 'Altay (Gorno-Altaysk)'),
(3137, 189, 'Altayskiy (Barnaul)'),
(3138, 189, 'Amurskaya (Blagoveshchensk)'),
(3139, 189, 'Arkhangel\'skaya'),
(3140, 189, 'Astrakhanskaya'),
(3141, 189, 'Bashkortostan (Ufa)'),
(3142, 189, 'Belgorodskaya'),
(3143, 189, 'Bryanskaya'),
(3144, 189, 'Buryatiya (Ulan-Ude)'),
(3145, 189, 'Chechnya (Groznyy)'),
(3146, 189, 'Chelyabinskaya'),
(3147, 189, 'Chitinskaya'),
(3148, 189, 'Chukotskiy (Anadyr\')'),
(3149, 189, 'Chuvashiya (Cheboksary)'),
(3150, 189, 'Dagestan (Makhachkala)'),
(3151, 189, 'Evenkiyskiy (Tura)'),
(3152, 189, 'Ingushetiya (Nazran\')'),
(3153, 189, 'Irkutskaya'),
(3154, 189, 'Ivanovskaya'),
(3155, 189, 'Kabardino-Balkariya (Nal\'chik)'),
(3156, 189, 'Kaliningradskaya'),
(3157, 189, 'Kalmykiya (Elista)'),
(3158, 189, 'Kaluzhskaya'),
(3159, 189, 'Kamchatskaya (Petropavlovsk-Kamchatskiy)'),
(3160, 189, 'Karachayevo-Cherkesiya (Cherkessk)'),
(3161, 189, 'Kareliya (Petrozavodsk)'),
(3162, 189, 'Kemerovskaya'),
(3163, 189, 'Khabarovskiy'),
(3164, 189, 'Khakasiya (Abakan)'),
(3165, 189, 'Khanty-Mansiyskiy (Khanty-Mansiysk)'),
(3166, 189, 'Kirovskaya'),
(3167, 189, 'Komi (Syktyvkar)'),
(3168, 189, 'Komi-Permyatskiy (Kudymkar)'),
(3169, 189, 'Koryakskiy (Palana)'),
(3170, 189, 'Kostromskaya'),
(3171, 189, 'Krasnodarskiy'),
(3172, 189, 'Krasnoyarskiy'),
(3173, 189, 'Kurganskaya'),
(3174, 189, 'Kurskaya'),
(3175, 189, 'Leningradskaya'),
(3176, 189, 'Lipetskaya'),
(3177, 189, 'Magadanskaya'),
(3178, 189, 'Mariy-El (Yoshkar-Ola)'),
(3179, 189, 'Mordoviya (Saransk)'),
(3180, 189, 'Moskovskaya'),
(3181, 189, 'Moskva (Moscow)'),
(3182, 189, 'Murmanskaya'),
(3183, 189, 'Nenetskiy (Nar\'yan-Mar)'),
(3184, 189, 'Nizhegorodskaya'),
(3185, 189, 'Novgorodskaya'),
(3186, 189, 'Novosibirskaya'),
(3187, 189, 'Omskaya'),
(3188, 189, 'Orenburgskaya'),
(3189, 189, 'Orlovskaya (Orel)'),
(3190, 189, 'Penzenskaya'),
(3191, 189, 'Permskaya'),
(3192, 189, 'Primorskiy (Vladivostok)'),
(3193, 189, 'Pskovskaya'),
(3194, 189, 'Rostovskaya'),
(3195, 189, 'Ryazanskaya'),
(3196, 189, 'Sakha (Yakutsk)'),
(3197, 189, 'Sakhalinskaya (Yuzhno-Sakhalinsk)'),
(3198, 189, 'Samarskaya'),
(3199, 189, 'Sankt-Peterburg (Saint Petersburg)'),
(3200, 189, 'Saratovskaya'),
(3201, 189, 'Severnaya Osetiya-Alaniya [North Ossetia] (Vladikavkaz)'),
(3202, 189, 'Smolenskaya'),
(3203, 189, 'Stavropol\'skiy'),
(3204, 189, 'Sverdlovskaya (Yekaterinburg)'),
(3205, 189, 'Tambovskaya'),
(3206, 189, 'Tatarstan (Kazan\')'),
(3207, 189, 'Taymyrskiy (Dudinka)'),
(3208, 189, 'Tomskaya'),
(3209, 189, 'Tul\'skaya'),
(3210, 189, 'Tverskaya'),
(3211, 189, 'Tyumenskaya'),
(3212, 189, 'Tyva (Kyzyl)'),
(3213, 189, 'Udmurtiya (Izhevsk)'),
(3214, 189, 'Ul\'yanovskaya'),
(3215, 189, 'Ust\'-Ordynskiy Buryatskiy (Ust\'-Ordynskiy)'),
(3216, 189, 'Vladimirskaya'),
(3217, 189, 'Volgogradskaya'),
(3218, 189, 'Vologodskaya'),
(3219, 189, 'Voronezhskaya'),
(3220, 189, 'Yamalo-Nenetskiy (Salekhard)'),
(3221, 189, 'Yaroslavskaya'),
(3222, 189, 'Yevreyskaya'),
(3223, 190, 'Butare'),
(3224, 190, 'Byumba'),
(3225, 190, 'Cyangugu'),
(3226, 190, 'Gikongoro'),
(3227, 190, 'Gisenyi'),
(3228, 190, 'Gitarama'),
(3229, 190, 'Kibungo'),
(3230, 190, 'Kibuye'),
(3231, 190, 'Kigali Rurale'),
(3232, 190, 'Kigali-ville'),
(3233, 190, 'Ruhengeri'),
(3234, 190, 'Umutara'),
(3235, 191, 'Ascension'),
(3236, 191, 'Saint Helena'),
(3237, 191, 'Tristan da Cunha'),
(3238, 192, 'Christ Church Nichola Town'),
(3239, 192, 'Saint Anne Sandy Point'),
(3240, 192, 'Saint George Basseterre'),
(3241, 192, 'Saint George Gingerland'),
(3242, 192, 'Saint James Windward'),
(3243, 192, 'Saint John Capisterre'),
(3244, 192, 'Saint John Figtree'),
(3245, 192, 'Saint Mary Cayon'),
(3246, 192, 'Saint Paul Capisterre'),
(3247, 192, 'Saint Paul Charlestown'),
(3248, 192, 'Saint Peter Basseterre'),
(3249, 192, 'Saint Thomas Lowland'),
(3250, 192, 'Saint Thomas Middle Island'),
(3251, 192, 'Trinity Palmetto Point'),
(3252, 193, 'Anse-la-Raye'),
(3253, 193, 'Castries'),
(3254, 193, 'Choiseul'),
(3255, 193, 'Dauphin'),
(3256, 193, 'Dennery'),
(3257, 193, 'Gros Islet'),
(3258, 193, 'Laborie'),
(3259, 193, 'Micoud'),
(3260, 193, 'Praslin'),
(3261, 193, 'Soufriere'),
(3262, 193, 'Vieux Fort'),
(3263, 194, 'Miquelon'),
(3264, 194, 'Saint Pierre'),
(3265, 195, 'Charlotte'),
(3266, 195, 'Grenadines'),
(3267, 195, 'Saint Andrew'),
(3268, 195, 'Saint David'),
(3269, 195, 'Saint George'),
(3270, 195, 'Saint Patrick'),
(3271, 196, 'A\'ana'),
(3272, 196, 'Aiga-i-le-Tai'),
(3273, 196, 'Atua'),
(3274, 196, 'Fa\'asaleleaga'),
(3275, 196, 'Gaga\'emauga'),
(3276, 196, 'Gagaifomauga'),
(3277, 196, 'Palauli'),
(3278, 196, 'Satupa\'itea'),
(3279, 196, 'Tuamasaga'),
(3280, 196, 'Va\'a-o-Fonoti'),
(3281, 196, 'Vaisigano'),
(3282, 197, 'Acquaviva'),
(3283, 197, 'Borgo Maggiore'),
(3284, 197, 'Chiesanuova'),
(3285, 197, 'Domagnano'),
(3286, 197, 'Faetano'),
(3287, 197, 'Fiorentino'),
(3288, 197, 'Monte Giardino'),
(3289, 197, 'San Marino'),
(3290, 197, 'Serravalle'),
(3291, 198, 'Principe'),
(3292, 198, 'Sao Tome'),
(3293, 199, '\'Asir'),
(3294, 199, 'Al Bahah'),
(3295, 199, 'Al Hudud ash Shamaliyah'),
(3296, 199, 'Al Jawf'),
(3297, 199, 'Al Madinah'),
(3298, 199, 'Al Qasim'),
(3299, 199, 'Ar Riyad'),
(3300, 199, 'Ash Sharqiyah (Eastern Province)'),
(3301, 199, 'Ha\'il'),
(3302, 199, 'Jizan'),
(3303, 199, 'Makkah'),
(3304, 199, 'Najran'),
(3305, 199, 'Tabuk'),
(3306, 200, 'Aberdeen City'),
(3307, 200, 'Aberdeenshire'),
(3308, 200, 'Angus'),
(3309, 200, 'Argyll and Bute'),
(3310, 200, 'City of Edinburgh'),
(3311, 200, 'Clackmannanshire'),
(3312, 200, 'Dumfries and Galloway'),
(3313, 200, 'Dundee City'),
(3314, 200, 'East Ayrshire'),
(3315, 200, 'East Dunbartonshire'),
(3316, 200, 'East Lothian'),
(3317, 200, 'East Renfrewshire'),
(3318, 200, 'Eilean Siar (Western Isles)'),
(3319, 200, 'Falkirk'),
(3320, 200, 'Fife'),
(3321, 200, 'Glasgow City'),
(3322, 200, 'Highland'),
(3323, 200, 'Inverclyde'),
(3324, 200, 'Midlothian'),
(3325, 200, 'Moray'),
(3326, 200, 'North Ayrshire'),
(3327, 200, 'North Lanarkshire'),
(3328, 200, 'Orkney Islands'),
(3329, 200, 'Perth and Kinross'),
(3330, 200, 'Renfrewshire'),
(3331, 200, 'Shetland Islands'),
(3332, 200, 'South Ayrshire'),
(3333, 200, 'South Lanarkshire'),
(3334, 200, 'Stirling'),
(3335, 200, 'The Scottish Borders'),
(3336, 200, 'West Dunbartonshire'),
(3337, 200, 'West Lothian'),
(3338, 201, 'Dakar'),
(3339, 201, 'Diourbel'),
(3340, 201, 'Fatick'),
(3341, 201, 'Kaolack'),
(3342, 201, 'Kolda'),
(3343, 201, 'Louga'),
(3344, 201, 'Saint-Louis'),
(3345, 201, 'Tambacounda'),
(3346, 201, 'Thies'),
(3347, 201, 'Ziguinchor'),
(3348, 202, 'Anse aux Pins'),
(3349, 202, 'Anse Boileau'),
(3350, 202, 'Anse Etoile'),
(3351, 202, 'Anse Louis'),
(3352, 202, 'Anse Royale'),
(3353, 202, 'Baie Lazare'),
(3354, 202, 'Baie Sainte Anne'),
(3355, 202, 'Beau Vallon'),
(3356, 202, 'Bel Air'),
(3357, 202, 'Bel Ombre'),
(3358, 202, 'Cascade'),
(3359, 202, 'Glacis'),
(3360, 202, 'Grand\' Anse (on Mahe)'),
(3361, 202, 'Grand\' Anse (on Praslin)'),
(3362, 202, 'La Digue'),
(3363, 202, 'La Riviere Anglaise'),
(3364, 202, 'Mont Buxton'),
(3365, 202, 'Mont Fleuri'),
(3366, 202, 'Plaisance'),
(3367, 202, 'Pointe La Rue'),
(3368, 202, 'Port Glaud'),
(3369, 202, 'Saint Louis'),
(3370, 202, 'Takamaka'),
(3371, 203, 'Eastern'),
(3372, 203, 'Northern'),
(3373, 203, 'Southern'),
(3374, 203, 'Western'),
(3375, 204, 'Singapore'),
(3376, 205, 'Banskobystricky'),
(3377, 205, 'Bratislavsky'),
(3378, 205, 'Kosicky'),
(3379, 205, 'Nitriansky'),
(3380, 205, 'Presovsky'),
(3381, 205, 'Trenciansky'),
(3382, 205, 'Trnavsky'),
(3383, 205, 'Zilinsky'),
(3384, 206, 'Ajdovscina'),
(3385, 206, 'Beltinci'),
(3386, 206, 'Bled'),
(3387, 206, 'Bohinj'),
(3388, 206, 'Borovnica'),
(3389, 206, 'Bovec'),
(3390, 206, 'Brda'),
(3391, 206, 'Brezice'),
(3392, 206, 'Brezovica'),
(3393, 206, 'Cankova-Tisina'),
(3394, 206, 'Celje'),
(3395, 206, 'Cerklje na Gorenjskem'),
(3396, 206, 'Cerknica'),
(3397, 206, 'Cerkno'),
(3398, 206, 'Crensovci'),
(3399, 206, 'Crna na Koroskem'),
(3400, 206, 'Crnomelj'),
(3401, 206, 'Destrnik-Trnovska Vas'),
(3402, 206, 'Divaca'),
(3403, 206, 'Dobrepolje'),
(3404, 206, 'Dobrova-Horjul-Polhov Gradec'),
(3405, 206, 'Dol pri Ljubljani'),
(3406, 206, 'Domzale'),
(3407, 206, 'Dornava'),
(3408, 206, 'Dravograd'),
(3409, 206, 'Duplek'),
(3410, 206, 'Gorenja Vas-Poljane'),
(3411, 206, 'Gorisnica'),
(3412, 206, 'Gornja Radgona'),
(3413, 206, 'Gornji Grad'),
(3414, 206, 'Gornji Petrovci'),
(3415, 206, 'Grosuplje'),
(3416, 206, 'Hodos Salovci'),
(3417, 206, 'Hrastnik'),
(3418, 206, 'Hrpelje-Kozina'),
(3419, 206, 'Idrija'),
(3420, 206, 'Ig'),
(3421, 206, 'Ilirska Bistrica'),
(3422, 206, 'Ivancna Gorica'),
(3423, 206, 'Izola'),
(3424, 206, 'Jesenice'),
(3425, 206, 'Jursinci'),
(3426, 206, 'Kamnik'),
(3427, 206, 'Kanal'),
(3428, 206, 'Kidricevo'),
(3429, 206, 'Kobarid'),
(3430, 206, 'Kobilje'),
(3431, 206, 'Kocevje'),
(3432, 206, 'Komen'),
(3433, 206, 'Koper'),
(3434, 206, 'Kozje'),
(3435, 206, 'Kranj'),
(3436, 206, 'Kranjska Gora'),
(3437, 206, 'Krsko'),
(3438, 206, 'Kungota'),
(3439, 206, 'Kuzma'),
(3440, 206, 'Lasko'),
(3441, 206, 'Lenart'),
(3442, 206, 'Lendava'),
(3443, 206, 'Litija'),
(3444, 206, 'Ljubljana'),
(3445, 206, 'Ljubno'),
(3446, 206, 'Ljutomer'),
(3447, 206, 'Logatec'),
(3448, 206, 'Loska Dolina'),
(3449, 206, 'Loski Potok'),
(3450, 206, 'Luce'),
(3451, 206, 'Lukovica'),
(3452, 206, 'Majsperk'),
(3453, 206, 'Maribor'),
(3454, 206, 'Medvode'),
(3455, 206, 'Menges'),
(3456, 206, 'Metlika'),
(3457, 206, 'Mezica'),
(3458, 206, 'Miren-Kostanjevica'),
(3459, 206, 'Mislinja'),
(3460, 206, 'Moravce'),
(3461, 206, 'Moravske Toplice'),
(3462, 206, 'Mozirje'),
(3463, 206, 'Murska Sobota'),
(3464, 206, 'Muta'),
(3465, 206, 'Naklo'),
(3466, 206, 'Nazarje'),
(3467, 206, 'Nova Gorica'),
(3468, 206, 'Novo Mesto'),
(3469, 206, 'Odranci'),
(3470, 206, 'Ormoz'),
(3471, 206, 'Osilnica'),
(3472, 206, 'Pesnica'),
(3473, 206, 'Piran'),
(3474, 206, 'Pivka'),
(3475, 206, 'Podcetrtek'),
(3476, 206, 'Podvelka-Ribnica'),
(3477, 206, 'Postojna'),
(3478, 206, 'Preddvor'),
(3479, 206, 'Ptuj'),
(3480, 206, 'Puconci'),
(3481, 206, 'Race-Fram'),
(3482, 206, 'Radece'),
(3483, 206, 'Radenci'),
(3484, 206, 'Radlje ob Dravi'),
(3485, 206, 'Radovljica'),
(3486, 206, 'Ravne-Prevalje'),
(3487, 206, 'Ribnica'),
(3488, 206, 'Rogasevci'),
(3489, 206, 'Rogaska Slatina'),
(3490, 206, 'Rogatec'),
(3491, 206, 'Ruse'),
(3492, 206, 'Semic'),
(3493, 206, 'Sencur'),
(3494, 206, 'Sentilj'),
(3495, 206, 'Sentjernej'),
(3496, 206, 'Sentjur pri Celju'),
(3497, 206, 'Sevnica'),
(3498, 206, 'Sezana'),
(3499, 206, 'Skocjan'),
(3500, 206, 'Skofja Loka'),
(3501, 206, 'Skofljica'),
(3502, 206, 'Slovenj Gradec'),
(3503, 206, 'Slovenska Bistrica'),
(3504, 206, 'Slovenske Konjice'),
(3505, 206, 'Smarje pri Jelsah'),
(3506, 206, 'Smartno ob Paki'),
(3507, 206, 'Sostanj'),
(3508, 206, 'Starse'),
(3509, 206, 'Store'),
(3510, 206, 'Sveti Jurij'),
(3511, 206, 'Tolmin'),
(3512, 206, 'Trbovlje'),
(3513, 206, 'Trebnje'),
(3514, 206, 'Trzic'),
(3515, 206, 'Turnisce'),
(3516, 206, 'Velenje'),
(3517, 206, 'Velike Lasce'),
(3518, 206, 'Videm'),
(3519, 206, 'Vipava'),
(3520, 206, 'Vitanje'),
(3521, 206, 'Vodice'),
(3522, 206, 'Vojnik'),
(3523, 206, 'Vrhnika'),
(3524, 206, 'Vuzenica'),
(3525, 206, 'Zagorje ob Savi'),
(3526, 206, 'Zalec'),
(3527, 206, 'Zavrc'),
(3528, 206, 'Zelezniki'),
(3529, 206, 'Ziri'),
(3530, 206, 'Zrece'),
(3531, 207, 'Bellona'),
(3532, 207, 'Central'),
(3533, 207, 'Choiseul (Lauru)'),
(3534, 207, 'Guadalcanal'),
(3535, 207, 'Honiara'),
(3536, 207, 'Isabel'),
(3537, 207, 'Makira'),
(3538, 207, 'Malaita'),
(3539, 207, 'Rennell'),
(3540, 207, 'Temotu'),
(3541, 207, 'Western'),
(3542, 208, 'Awdal'),
(3543, 208, 'Bakool'),
(3544, 208, 'Banaadir'),
(3545, 208, 'Bari'),
(3546, 208, 'Bay'),
(3547, 208, 'Galguduud'),
(3548, 208, 'Gedo'),
(3549, 208, 'Hiiraan'),
(3550, 208, 'Jubbada Dhexe'),
(3551, 208, 'Jubbada Hoose'),
(3552, 208, 'Mudug'),
(3553, 208, 'Nugaal'),
(3554, 208, 'Sanaag'),
(3555, 208, 'Shabeellaha Dhexe'),
(3556, 208, 'Shabeellaha Hoose'),
(3557, 208, 'Sool'),
(3558, 208, 'Togdheer'),
(3559, 208, 'Woqooyi Galbeed'),
(3560, 209, 'Eastern Cape'),
(3561, 209, 'Free State'),
(3562, 209, 'Gauteng'),
(3563, 209, 'KwaZulu-Natal'),
(3564, 209, 'Mpumalanga'),
(3565, 209, 'North-West'),
(3566, 209, 'Northern Cape'),
(3567, 209, 'Northern Province'),
(3568, 209, 'Western Cape'),
(3569, 210, 'Bird Island'),
(3570, 210, 'Bristol Island'),
(3571, 210, 'Clerke Rocks'),
(3572, 210, 'Montagu Island'),
(3573, 210, 'Saunders Island'),
(3574, 210, 'South Georgia'),
(3575, 210, 'Southern Thule'),
(3576, 210, 'Traversay Islands'),
(3577, 211, 'Andalucia'),
(3578, 211, 'Aragon'),
(3579, 211, 'Asturias'),
(3580, 211, 'Baleares (Balearic Islands)'),
(3581, 211, 'Canarias (Canary Islands)'),
(3582, 211, 'Cantabria'),
(3583, 211, 'Castilla y Leon'),
(3584, 211, 'Castilla-La Mancha'),
(3585, 211, 'Cataluna'),
(3586, 211, 'Ceuta'),
(3587, 211, 'Communidad Valencian'),
(3588, 211, 'Extremadura'),
(3589, 211, 'Galicia'),
(3590, 211, 'Islas Chafarinas'),
(3591, 211, 'La Rioja'),
(3592, 211, 'Madrid'),
(3593, 211, 'Melilla'),
(3594, 211, 'Murcia'),
(3595, 211, 'Navarra'),
(3596, 211, 'Pais Vasco (Basque Country)'),
(3597, 211, 'Penon de Alhucemas'),
(3598, 211, 'Penon de Velez de la Gomera'),
(3599, 212, 'Spratly Islands'),
(3600, 213, 'Central'),
(3601, 213, 'Eastern'),
(3602, 213, 'North Central'),
(3603, 213, 'North Eastern'),
(3604, 213, 'North Western'),
(3605, 213, 'Northern'),
(3606, 213, 'Sabaragamuwa'),
(3607, 213, 'Southern'),
(3608, 213, 'Uva'),
(3609, 213, 'Western'),
(3610, 214, 'A\'ali an Nil'),
(3611, 214, 'Al Bahr al Ahmar'),
(3612, 214, 'Al Buhayrat'),
(3613, 214, 'Al Jazirah'),
(3614, 214, 'Al Khartum'),
(3615, 214, 'Al Qadarif'),
(3616, 214, 'Al Wahdah'),
(3617, 214, 'An Nil al Abyad'),
(3618, 214, 'An Nil al Azraq'),
(3619, 214, 'Ash Shamaliyah'),
(3620, 214, 'Bahr al Jabal'),
(3621, 214, 'Gharb al Istiwa\'iyah'),
(3622, 214, 'Gharb Bahr al Ghazal'),
(3623, 214, 'Gharb Darfur'),
(3624, 214, 'Gharb Kurdufan'),
(3625, 214, 'Janub Darfur'),
(3626, 214, 'Janub Kurdufan'),
(3627, 214, 'Junqali'),
(3628, 214, 'Kassala'),
(3629, 214, 'Nahr an Nil'),
(3630, 214, 'Shamal Bahr al Ghazal'),
(3631, 214, 'Shamal Darfur'),
(3632, 214, 'Shamal Kurdufan'),
(3633, 214, 'Sharq al Istiwa\'iyah'),
(3634, 214, 'Sinnar'),
(3635, 214, 'Warab'),
(3636, 215, 'Brokopondo'),
(3637, 215, 'Commewijne'),
(3638, 215, 'Coronie'),
(3639, 215, 'Marowijne'),
(3640, 215, 'Nickerie'),
(3641, 215, 'Para'),
(3642, 215, 'Paramaribo'),
(3643, 215, 'Saramacca'),
(3644, 215, 'Sipaliwini'),
(3645, 215, 'Wanica'),
(3646, 216, 'Barentsoya'),
(3647, 216, 'Bjornoya'),
(3648, 216, 'Edgeoya'),
(3649, 216, 'Hopen'),
(3650, 216, 'Kvitoya'),
(3651, 216, 'Nordaustandet'),
(3652, 216, 'Prins Karls Forland'),
(3653, 216, 'Spitsbergen'),
(3654, 217, 'Hhohho'),
(3655, 217, 'Lubombo'),
(3656, 217, 'Manzini'),
(3657, 217, 'Shiselweni'),
(3658, 218, 'Blekinge'),
(3659, 218, 'Dalarnas'),
(3660, 218, 'Gavleborgs'),
(3661, 218, 'Gotlands'),
(3662, 218, 'Hallands'),
(3663, 218, 'Jamtlands'),
(3664, 218, 'Jonkopings'),
(3665, 218, 'Kalmar'),
(3666, 218, 'Kronobergs'),
(3667, 218, 'Norrbottens'),
(3668, 218, 'Orebro'),
(3669, 218, 'Ostergotlands'),
(3670, 218, 'Skane'),
(3671, 218, 'Sodermanlands'),
(3672, 218, 'Stockholms'),
(3673, 218, 'Uppsala'),
(3674, 218, 'Varmlands'),
(3675, 218, 'Vasterbottens'),
(3676, 218, 'Vasternorrlands'),
(3677, 218, 'Vastmanlands'),
(3678, 218, 'Vastra Gotalands'),
(3679, 219, 'Aargau'),
(3680, 219, 'Ausser-Rhoden'),
(3681, 219, 'Basel-Landschaft'),
(3682, 219, 'Basel-Stadt'),
(3683, 219, 'Bern'),
(3684, 219, 'Fribourg'),
(3685, 219, 'Geneve'),
(3686, 219, 'Glarus'),
(3687, 219, 'Graubunden'),
(3688, 219, 'Inner-Rhoden'),
(3689, 219, 'Jura'),
(3690, 219, 'Luzern'),
(3691, 219, 'Neuchatel'),
(3692, 219, 'Nidwalden'),
(3693, 219, 'Obwalden'),
(3694, 219, 'Sankt Gallen'),
(3695, 219, 'Schaffhausen'),
(3696, 219, 'Schwyz'),
(3697, 219, 'Solothurn'),
(3698, 219, 'Thurgau'),
(3699, 219, 'Ticino'),
(3700, 219, 'Uri'),
(3701, 219, 'Valais'),
(3702, 219, 'Vaud'),
(3703, 219, 'Zug'),
(3704, 219, 'Zurich'),
(3705, 220, 'Al Hasakah'),
(3706, 220, 'Al Ladhiqiyah'),
(3707, 220, 'Al Qunaytirah'),
(3708, 220, 'Ar Raqqah'),
(3709, 220, 'As Suwayda\''),
(3710, 220, 'Dar\'a'),
(3711, 220, 'Dayr az Zawr'),
(3712, 220, 'Dimashq'),
(3713, 220, 'Halab'),
(3714, 220, 'Hamah'),
(3715, 220, 'Hims'),
(3716, 220, 'Idlib'),
(3717, 220, 'Rif Dimashq'),
(3718, 220, 'Tartus'),
(3719, 221, 'Chang-hua'),
(3720, 221, 'Chi-lung'),
(3721, 221, 'Chia-i'),
(3722, 221, 'Chia-i'),
(3723, 221, 'Chung-hsing-hsin-ts\'un'),
(3724, 221, 'Hsin-chu'),
(3725, 221, 'Hsin-chu'),
(3726, 221, 'Hua-lien'),
(3727, 221, 'I-lan'),
(3728, 221, 'Kao-hsiung'),
(3729, 221, 'Kao-hsiung'),
(3730, 221, 'Miao-li'),
(3731, 221, 'Nan-t\'ou'),
(3732, 221, 'P\'eng-hu'),
(3733, 221, 'P\'ing-tung'),
(3734, 221, 'T\'ai-chung'),
(3735, 221, 'T\'ai-chung'),
(3736, 221, 'T\'ai-nan'),
(3737, 221, 'T\'ai-nan'),
(3738, 221, 'T\'ai-pei'),
(3739, 221, 'T\'ai-pei'),
(3740, 221, 'T\'ai-tung'),
(3741, 221, 'T\'ao-yuan'),
(3742, 221, 'Yun-lin'),
(3743, 222, 'Viloyati Khatlon'),
(3744, 222, 'Viloyati Leninobod'),
(3745, 222, 'Viloyati Mukhtori Kuhistoni Badakhshon'),
(3746, 223, 'Arusha'),
(3747, 223, 'Dar es Salaam'),
(3748, 223, 'Dodoma'),
(3749, 223, 'Iringa'),
(3750, 223, 'Kagera'),
(3751, 223, 'Kigoma'),
(3752, 223, 'Kilimanjaro'),
(3753, 223, 'Lindi'),
(3754, 223, 'Mara'),
(3755, 223, 'Mbeya'),
(3756, 223, 'Morogoro'),
(3757, 223, 'Mtwara'),
(3758, 223, 'Mwanza'),
(3759, 223, 'Pemba North'),
(3760, 223, 'Pemba South'),
(3761, 223, 'Pwani'),
(3762, 223, 'Rukwa'),
(3763, 223, 'Ruvuma'),
(3764, 223, 'Shinyanga'),
(3765, 223, 'Singida'),
(3766, 223, 'Tabora'),
(3767, 223, 'Tanga'),
(3768, 223, 'Zanzibar Central/South'),
(3769, 223, 'Zanzibar North'),
(3770, 223, 'Zanzibar Urban/West'),
(3771, 224, 'Amnat Charoen'),
(3772, 224, 'Ang Thong'),
(3773, 224, 'Buriram'),
(3774, 224, 'Chachoengsao'),
(3775, 224, 'Chai Nat'),
(3776, 224, 'Chaiyaphum'),
(3777, 224, 'Chanthaburi'),
(3778, 224, 'Chiang Mai'),
(3779, 224, 'Chiang Rai'),
(3780, 224, 'Chon Buri'),
(3781, 224, 'Chumphon'),
(3782, 224, 'Kalasin'),
(3783, 224, 'Kamphaeng Phet'),
(3784, 224, 'Kanchanaburi'),
(3785, 224, 'Khon Kaen'),
(3786, 224, 'Krabi'),
(3787, 224, 'Krung Thep Mahanakhon (Bangkok)'),
(3788, 224, 'Lampang'),
(3789, 224, 'Lamphun'),
(3790, 224, 'Loei'),
(3791, 224, 'Lop Buri'),
(3792, 224, 'Mae Hong Son'),
(3793, 224, 'Maha Sarakham'),
(3794, 224, 'Mukdahan'),
(3795, 224, 'Nakhon Nayok'),
(3796, 224, 'Nakhon Pathom'),
(3797, 224, 'Nakhon Phanom'),
(3798, 224, 'Nakhon Ratchasima'),
(3799, 224, 'Nakhon Sawan'),
(3800, 224, 'Nakhon Si Thammarat'),
(3801, 224, 'Nan'),
(3802, 224, 'Narathiwat'),
(3803, 224, 'Nong Bua Lamphu'),
(3804, 224, 'Nong Khai'),
(3805, 224, 'Nonthaburi'),
(3806, 224, 'Pathum Thani'),
(3807, 224, 'Pattani'),
(3808, 224, 'Phangnga'),
(3809, 224, 'Phatthalung'),
(3810, 224, 'Phayao'),
(3811, 224, 'Phetchabun'),
(3812, 224, 'Phetchaburi'),
(3813, 224, 'Phichit'),
(3814, 224, 'Phitsanulok'),
(3815, 224, 'Phra Nakhon Si Ayutthaya'),
(3816, 224, 'Phrae'),
(3817, 224, 'Phuket'),
(3818, 224, 'Prachin Buri'),
(3819, 224, 'Prachuap Khiri Khan'),
(3820, 224, 'Ranong'),
(3821, 224, 'Ratchaburi'),
(3822, 224, 'Rayong'),
(3823, 224, 'Roi Et'),
(3824, 224, 'Sa Kaeo'),
(3825, 224, 'Sakon Nakhon'),
(3826, 224, 'Samut Prakan'),
(3827, 224, 'Samut Sakhon'),
(3828, 224, 'Samut Songkhram'),
(3829, 224, 'Sara Buri'),
(3830, 224, 'Satun'),
(3831, 224, 'Sing Buri'),
(3832, 224, 'Sisaket'),
(3833, 224, 'Songkhla'),
(3834, 224, 'Sukhothai'),
(3835, 224, 'Suphan Buri'),
(3836, 224, 'Surat Thani'),
(3837, 224, 'Surin'),
(3838, 224, 'Tak'),
(3839, 224, 'Trang'),
(3840, 224, 'Trat'),
(3841, 224, 'Ubon Ratchathani'),
(3842, 224, 'Udon Thani'),
(3843, 224, 'Uthai Thani'),
(3844, 224, 'Uttaradit'),
(3845, 224, 'Yala'),
(3846, 224, 'Yasothon'),
(3847, 225, 'Tobago'),
(3848, 226, 'De La Kara'),
(3849, 226, 'Des Plateaux'),
(3850, 226, 'Des Savanes'),
(3851, 226, 'Du Centre'),
(3852, 226, 'Maritime'),
(3853, 227, 'Atafu'),
(3854, 227, 'Fakaofo'),
(3855, 227, 'Nukunonu'),
(3856, 228, 'Ha\'apai'),
(3857, 228, 'Tongatapu'),
(3858, 228, 'Vava\'u'),
(3859, 229, 'Arima'),
(3860, 229, 'Caroni'),
(3861, 229, 'Mayaro'),
(3862, 229, 'Nariva'),
(3863, 229, 'Port-of-Spain'),
(3864, 229, 'Saint Andrew'),
(3865, 229, 'Saint David'),
(3866, 229, 'Saint George'),
(3867, 229, 'Saint Patrick'),
(3868, 229, 'San Fernando'),
(3869, 229, 'Victoria'),
(3870, 230, 'Ariana'),
(3871, 230, 'Beja'),
(3872, 230, 'Ben Arous'),
(3873, 230, 'Bizerte'),
(3874, 230, 'El Kef'),
(3875, 230, 'Gabes'),
(3876, 230, 'Gafsa'),
(3877, 230, 'Jendouba'),
(3878, 230, 'Kairouan'),
(3879, 230, 'Kasserine'),
(3880, 230, 'Kebili'),
(3881, 230, 'Mahdia'),
(3882, 230, 'Medenine'),
(3883, 230, 'Monastir'),
(3884, 230, 'Nabeul'),
(3885, 230, 'Sfax'),
(3886, 230, 'Sidi Bou Zid'),
(3887, 230, 'Siliana'),
(3888, 230, 'Sousse'),
(3889, 230, 'Tataouine'),
(3890, 230, 'Tozeur'),
(3891, 230, 'Tunis'),
(3892, 230, 'Zaghouan'),
(3893, 231, 'Adana'),
(3894, 231, 'Adiyaman'),
(3895, 231, 'Afyon'),
(3896, 231, 'Agri'),
(3897, 231, 'Aksaray'),
(3898, 231, 'Amasya'),
(3899, 231, 'Ankara'),
(3900, 231, 'Antalya'),
(3901, 231, 'Ardahan'),
(3902, 231, 'Artvin'),
(3903, 231, 'Aydin'),
(3904, 231, 'Balikesir'),
(3905, 231, 'Bartin'),
(3906, 231, 'Batman'),
(3907, 231, 'Bayburt'),
(3908, 231, 'Bilecik'),
(3909, 231, 'Bingol'),
(3910, 231, 'Bitlis'),
(3911, 231, 'Bolu'),
(3912, 231, 'Burdur'),
(3913, 231, 'Bursa'),
(3914, 231, 'Canakkale'),
(3915, 231, 'Cankiri'),
(3916, 231, 'Corum'),
(3917, 231, 'Denizli'),
(3918, 231, 'Diyarbakir'),
(3919, 231, 'Duzce'),
(3920, 231, 'Edirne'),
(3921, 231, 'Elazig'),
(3922, 231, 'Erzincan'),
(3923, 231, 'Erzurum'),
(3924, 231, 'Eskisehir'),
(3925, 231, 'Gaziantep'),
(3926, 231, 'Giresun'),
(3927, 231, 'Gumushane'),
(3928, 231, 'Hakkari'),
(3929, 231, 'Hatay'),
(3930, 231, 'Icel'),
(3931, 231, 'Igdir'),
(3932, 231, 'Isparta'),
(3933, 231, 'Istanbul'),
(3934, 231, 'Izmir'),
(3935, 231, 'Kahramanmaras'),
(3936, 231, 'Karabuk'),
(3937, 231, 'Karaman'),
(3938, 231, 'Kars'),
(3939, 231, 'Kastamonu'),
(3940, 231, 'Kayseri'),
(3941, 231, 'Kilis'),
(3942, 231, 'Kirikkale'),
(3943, 231, 'Kirklareli'),
(3944, 231, 'Kirsehir'),
(3945, 231, 'Kocaeli'),
(3946, 231, 'Konya'),
(3947, 231, 'Kutahya'),
(3948, 231, 'Malatya'),
(3949, 231, 'Manisa'),
(3950, 231, 'Mardin'),
(3951, 231, 'Mugla'),
(3952, 231, 'Mus'),
(3953, 231, 'Nevsehir'),
(3954, 231, 'Nigde'),
(3955, 231, 'Ordu'),
(3956, 231, 'Osmaniye'),
(3957, 231, 'Rize'),
(3958, 231, 'Sakarya'),
(3959, 231, 'Samsun'),
(3960, 231, 'Sanliurfa'),
(3961, 231, 'Siirt'),
(3962, 231, 'Sinop'),
(3963, 231, 'Sirnak'),
(3964, 231, 'Sivas'),
(3965, 231, 'Tekirdag'),
(3966, 231, 'Tokat'),
(3967, 231, 'Trabzon'),
(3968, 231, 'Tunceli'),
(3969, 231, 'Usak'),
(3970, 231, 'Van'),
(3971, 231, 'Yalova'),
(3972, 231, 'Yozgat'),
(3973, 231, 'Zonguldak'),
(3974, 232, 'Ahal Welayaty'),
(3975, 232, 'Balkan Welayaty'),
(3976, 232, 'Dashhowuz Welayaty'),
(3977, 232, 'Lebap Welayaty'),
(3978, 232, 'Mary Welayaty'),
(3979, 233, 'Tuvalu'),
(3980, 234, 'Adjumani'),
(3981, 234, 'Apac'),
(3982, 234, 'Arua'),
(3983, 234, 'Bugiri'),
(3984, 234, 'Bundibugyo'),
(3985, 234, 'Bushenyi'),
(3986, 234, 'Busia'),
(3987, 234, 'Gulu'),
(3988, 234, 'Hoima'),
(3989, 234, 'Iganga'),
(3990, 234, 'Jinja'),
(3991, 234, 'Kabale'),
(3992, 234, 'Kabarole'),
(3993, 234, 'Kalangala'),
(3994, 234, 'Kampala'),
(3995, 234, 'Kamuli'),
(3996, 234, 'Kapchorwa'),
(3997, 234, 'Kasese'),
(3998, 234, 'Katakwi'),
(3999, 234, 'Kibale'),
(4000, 234, 'Kiboga'),
(4001, 234, 'Kisoro'),
(4002, 234, 'Kitgum'),
(4003, 234, 'Kotido'),
(4004, 234, 'Kumi'),
(4005, 234, 'Lira'),
(4006, 234, 'Luwero'),
(4007, 234, 'Masaka'),
(4008, 234, 'Masindi'),
(4009, 234, 'Mbale'),
(4010, 234, 'Mbarara'),
(4011, 234, 'Moroto'),
(4012, 234, 'Moyo'),
(4013, 234, 'Mpigi'),
(4014, 234, 'Mubende'),
(4015, 234, 'Mukono'),
(4016, 234, 'Nakasongola'),
(4017, 234, 'Nebbi'),
(4018, 234, 'Ntungamo'),
(4019, 234, 'Pallisa'),
(4020, 234, 'Rakai'),
(4021, 234, 'Rukungiri'),
(4022, 234, 'Sembabule'),
(4023, 234, 'Soroti'),
(4024, 234, 'Tororo'),
(4025, 235, 'Avtonomna Respublika Krym (Simferopol\')'),
(4026, 235, 'Cherkas\'ka (Cherkasy)'),
(4027, 235, 'Chernihivs\'ka (Chernihiv)'),
(4028, 235, 'Chernivets\'ka (Chernivtsi)'),
(4029, 235, 'Dnipropetrovs\'ka (Dnipropetrovs\'k)'),
(4030, 235, 'Donets\'ka (Donets\'k)'),
(4031, 235, 'Ivano-Frankivs\'ka (Ivano-Frankivs\'k)'),
(4032, 235, 'Kharkivs\'ka (Kharkiv)'),
(4033, 235, 'Khersons\'ka (Kherson)'),
(4034, 235, 'Khmel\'nyts\'ka (Khmel\'nyts\'kyy)'),
(4035, 235, 'Kirovohrads\'ka (Kirovohrad)'),
(4036, 235, 'Kyyiv'),
(4037, 235, 'Kyyivs\'ka (Kiev)'),
(4038, 235, 'L\'vivs\'ka (L\'viv)'),
(4039, 235, 'Luhans\'ka (Luhans\'k)'),
(4040, 235, 'Mykolayivs\'ka (Mykolayiv)'),
(4041, 235, 'Odes\'ka (Odesa)'),
(4042, 235, 'Poltavs\'ka (Poltava)'),
(4043, 235, 'Rivnens\'ka (Rivne)'),
(4044, 235, 'Sevastopol\''),
(4045, 235, 'Sums\'ka (Sumy)'),
(4046, 235, 'Ternopil\'s\'ka (Ternopil\')'),
(4047, 235, 'Vinnyts\'ka (Vinnytsya)'),
(4048, 235, 'Volyns\'ka (Luts\'k)'),
(4049, 235, 'Zakarpats\'ka (Uzhhorod)'),
(4050, 235, 'Zaporiz\'ka (Zaporizhzhya)'),
(4051, 235, 'Zhytomyrs\'ka (Zhytomyr)'),
(4052, 236, '\'Ajman'),
(4053, 236, 'Abu Zaby (Abu Dhabi)'),
(4054, 236, 'Al Fujayrah'),
(4055, 236, 'Ash Shariqah (Sharjah)'),
(4056, 236, 'Dubayy (Dubai)'),
(4057, 236, 'Ra\'s al Khaymah'),
(4058, 236, 'Umm al Qaywayn'),
(4059, 237, 'Barking and Dagenham'),
(4060, 237, 'Barnet'),
(4061, 237, 'Barnsley'),
(4062, 237, 'Bath and North East Somerset'),
(4063, 237, 'Bedfordshire'),
(4064, 237, 'Bexley'),
(4065, 237, 'Birmingham'),
(4066, 237, 'Blackburn with Darwen'),
(4067, 237, 'Blackpool'),
(4068, 237, 'Bolton'),
(4069, 237, 'Bournemouth'),
(4070, 237, 'Bracknell Forest'),
(4071, 237, 'Bradford'),
(4072, 237, 'Brent'),
(4073, 237, 'Brighton and Hove'),
(4074, 237, 'Bromley'),
(4075, 237, 'Buckinghamshire'),
(4076, 237, 'Bury'),
(4077, 237, 'Calderdale'),
(4078, 237, 'Cambridgeshire'),
(4079, 237, 'Camden'),
(4080, 237, 'Cheshire'),
(4081, 237, 'City of Bristol'),
(4082, 237, 'City of Kingston upon Hull'),
(4083, 237, 'City of London'),
(4084, 237, 'Cornwall'),
(4085, 237, 'Coventry'),
(4086, 237, 'Croydon'),
(4087, 237, 'Cumbria'),
(4088, 237, 'Darlington'),
(4089, 237, 'Derby'),
(4090, 237, 'Derbyshire'),
(4091, 237, 'Devon'),
(4092, 237, 'Doncaster'),
(4093, 237, 'Dorset'),
(4094, 237, 'Dudley'),
(4095, 237, 'Durham'),
(4096, 237, 'Ealing'),
(4097, 237, 'East Riding of Yorkshire'),
(4098, 237, 'East Sussex'),
(4099, 237, 'Enfield'),
(4100, 237, 'Essex'),
(4101, 237, 'Gateshead'),
(4102, 237, 'Gloucestershire'),
(4103, 237, 'Greenwich'),
(4104, 237, 'Hackney'),
(4105, 237, 'Halton'),
(4106, 237, 'Hammersmith and Fulham'),
(4107, 237, 'Hampshire'),
(4108, 237, 'Haringey'),
(4109, 237, 'Harrow'),
(4110, 237, 'Hartlepool'),
(4111, 237, 'Havering'),
(4112, 237, 'Herefordshire'),
(4113, 237, 'Hertfordshire'),
(4114, 237, 'Hillingdon'),
(4115, 237, 'Hounslow'),
(4116, 237, 'Isle of Wight'),
(4117, 237, 'Islington'),
(4118, 237, 'Kensington and Chelsea'),
(4119, 237, 'Kent'),
(4120, 237, 'Kingston upon Thames'),
(4121, 237, 'Kirklees'),
(4122, 237, 'Knowsley'),
(4123, 237, 'Lambeth'),
(4124, 237, 'Lancashire'),
(4125, 237, 'Leeds'),
(4126, 237, 'Leicester'),
(4127, 237, 'Leicestershire'),
(4128, 237, 'Lewisham'),
(4129, 237, 'Lincolnshire'),
(4130, 237, 'Liverpool'),
(4131, 237, 'Luton'),
(4132, 237, 'Manchester'),
(4133, 237, 'Medway'),
(4134, 237, 'Merton'),
(4135, 237, 'Middlesbrough'),
(4136, 237, 'Milton Keynes');
INSERT INTO `provinces_list` (`id`, `country_id`, `name`) VALUES
(4137, 237, 'Newcastle upon Tyne'),
(4138, 237, 'Newham'),
(4139, 237, 'Norfolk'),
(4140, 237, 'North East Lincolnshire'),
(4141, 237, 'North Lincolnshire'),
(4142, 237, 'North Somerset'),
(4143, 237, 'North Tyneside'),
(4144, 237, 'North Yorkshire'),
(4145, 237, 'Northamptonshire'),
(4146, 237, 'Northumberland'),
(4147, 237, 'Nottingham'),
(4148, 237, 'Nottinghamshire'),
(4149, 237, 'Oldham'),
(4150, 237, 'Oxfordshire'),
(4151, 237, 'Peterborough'),
(4152, 237, 'Plymouth'),
(4153, 237, 'Poole'),
(4154, 237, 'Portsmouth'),
(4155, 237, 'Reading'),
(4156, 237, 'Redbridge'),
(4157, 237, 'Redcar and Cleveland'),
(4158, 237, 'Richmond upon Thames'),
(4159, 237, 'Rochdale'),
(4160, 237, 'Rotherham'),
(4161, 237, 'Rutland'),
(4162, 237, 'Salford'),
(4163, 237, 'Sandwell'),
(4164, 237, 'Sefton'),
(4165, 237, 'Sheffield'),
(4166, 237, 'Shropshire'),
(4167, 237, 'Slough'),
(4168, 237, 'Solihull'),
(4169, 237, 'Somerset'),
(4170, 237, 'South Gloucestershire'),
(4171, 237, 'South Tyneside'),
(4172, 237, 'Southampton'),
(4173, 237, 'Southend-on-Sea'),
(4174, 237, 'Southwark'),
(4175, 237, 'St. Helens'),
(4176, 237, 'Staffordshire'),
(4177, 237, 'Stockport'),
(4178, 237, 'Stockton-on-Tees'),
(4179, 237, 'Stoke-on-Trent'),
(4180, 237, 'Suffolk'),
(4181, 237, 'Sunderland'),
(4182, 237, 'Surrey'),
(4183, 237, 'Sutton'),
(4184, 237, 'Swindon'),
(4185, 237, 'Tameside'),
(4186, 237, 'Telford and Wrekin'),
(4187, 237, 'Thurrock'),
(4188, 237, 'Torbay'),
(4189, 237, 'Tower Hamlets'),
(4190, 237, 'Trafford'),
(4191, 237, 'Wakefield'),
(4192, 237, 'Walsall'),
(4193, 237, 'Waltham Forest'),
(4194, 237, 'Wandsworth'),
(4195, 237, 'Warrington'),
(4196, 237, 'Warwickshire'),
(4197, 237, 'West Berkshire'),
(4198, 237, 'West Sussex'),
(4199, 237, 'Westminster'),
(4200, 237, 'Wigan'),
(4201, 237, 'Wiltshire'),
(4202, 237, 'Windsor and Maidenhead'),
(4203, 237, 'Wirral'),
(4204, 237, 'Wokingham'),
(4205, 237, 'Wolverhampton'),
(4206, 237, 'Worcestershire'),
(4207, 237, 'York'),
(4208, 238, 'Artigas'),
(4209, 238, 'Canelones'),
(4210, 238, 'Cerro Largo'),
(4211, 238, 'Colonia'),
(4212, 238, 'Durazno'),
(4213, 238, 'Flores'),
(4214, 238, 'Florida'),
(4215, 238, 'Lavalleja'),
(4216, 238, 'Maldonado'),
(4217, 238, 'Montevideo'),
(4218, 238, 'Paysandu'),
(4219, 238, 'Rio Negro'),
(4220, 238, 'Rivera'),
(4221, 238, 'Rocha'),
(4222, 238, 'Salto'),
(4223, 238, 'San Jose'),
(4224, 238, 'Soriano'),
(4225, 238, 'Tacuarembo'),
(4226, 238, 'Treinta y Tres'),
(4227, 239, 'Alabama'),
(4228, 239, 'Alaska'),
(4229, 239, 'Arizona'),
(4230, 239, 'Arkansas'),
(4231, 239, 'California'),
(4232, 239, 'Colorado'),
(4233, 239, 'Connecticut'),
(4234, 239, 'Delaware'),
(4235, 239, 'District of Columbia'),
(4236, 239, 'Florida'),
(4237, 239, 'Georgia'),
(4238, 239, 'Hawaii'),
(4239, 239, 'Idaho'),
(4240, 239, 'Illinois'),
(4241, 239, 'Indiana'),
(4242, 239, 'Iowa'),
(4243, 239, 'Kansas'),
(4244, 239, 'Kentucky'),
(4245, 239, 'Louisiana'),
(4246, 239, 'Maine'),
(4247, 239, 'Maryland'),
(4248, 239, 'Massachusetts'),
(4249, 239, 'Michigan'),
(4250, 239, 'Minnesota'),
(4251, 239, 'Mississippi'),
(4252, 239, 'Missouri'),
(4253, 239, 'Montana'),
(4254, 239, 'Nebraska'),
(4255, 239, 'Nevada'),
(4256, 239, 'New Hampshire'),
(4257, 239, 'New Jersey'),
(4258, 239, 'New Mexico'),
(4259, 239, 'New York'),
(4260, 239, 'North Carolina'),
(4261, 239, 'North Dakota'),
(4262, 239, 'Ohio'),
(4263, 239, 'Oklahoma'),
(4264, 239, 'Oregon'),
(4265, 239, 'Pennsylvania'),
(4266, 239, 'Rhode Island'),
(4267, 239, 'South Carolina'),
(4268, 239, 'South Dakota'),
(4269, 239, 'Tennessee'),
(4270, 239, 'Texas'),
(4271, 239, 'Utah'),
(4272, 239, 'Vermont'),
(4273, 239, 'Virginia'),
(4274, 239, 'Washington'),
(4275, 239, 'West Virginia'),
(4276, 239, 'Wisconsin'),
(4277, 239, 'Wyoming'),
(4278, 240, 'Andijon Wiloyati'),
(4279, 240, 'Bukhoro Wiloyati'),
(4280, 240, 'Farghona Wiloyati'),
(4281, 240, 'Jizzakh Wiloyati'),
(4282, 240, 'Khorazm Wiloyati (Urganch)'),
(4283, 240, 'Namangan Wiloyati'),
(4284, 240, 'Nawoiy Wiloyati'),
(4285, 240, 'Qashqadaryo Wiloyati (Qarshi)'),
(4286, 240, 'Qoraqalpoghiston (Nukus)'),
(4287, 240, 'Samarqand Wiloyati'),
(4288, 240, 'Sirdaryo Wiloyati (Guliston)'),
(4289, 240, 'Surkhondaryo Wiloyati (Termiz)'),
(4290, 240, 'Toshkent Shahri'),
(4291, 240, 'Toshkent Wiloyati'),
(4292, 241, 'Malampa'),
(4293, 241, 'Penama'),
(4294, 241, 'Sanma'),
(4295, 241, 'Shefa'),
(4296, 241, 'Tafea'),
(4297, 241, 'Torba'),
(4298, 242, 'Amazonas'),
(4299, 242, 'Anzoategui'),
(4300, 242, 'Apure'),
(4301, 242, 'Aragua'),
(4302, 242, 'Barinas'),
(4303, 242, 'Bolivar'),
(4304, 242, 'Carabobo'),
(4305, 242, 'Cojedes'),
(4306, 242, 'Delta Amacuro'),
(4307, 242, 'Dependencias Federales'),
(4308, 242, 'Distrito Federal'),
(4309, 242, 'Falcon'),
(4310, 242, 'Guarico'),
(4311, 242, 'Lara'),
(4312, 242, 'Merida'),
(4313, 242, 'Miranda'),
(4314, 242, 'Monagas'),
(4315, 242, 'Nueva Esparta'),
(4316, 242, 'Portuguesa'),
(4317, 242, 'Sucre'),
(4318, 242, 'Tachira'),
(4319, 242, 'Trujillo'),
(4320, 242, 'Vargas'),
(4321, 242, 'Yaracuy'),
(4322, 242, 'Zulia'),
(4323, 243, 'An Giang'),
(4324, 243, 'Ba Ria-Vung Tau'),
(4325, 243, 'Bac Giang'),
(4326, 243, 'Bac Kan'),
(4327, 243, 'Bac Lieu'),
(4328, 243, 'Bac Ninh'),
(4329, 243, 'Ben Tre'),
(4330, 243, 'Binh Dinh'),
(4331, 243, 'Binh Duong'),
(4332, 243, 'Binh Phuoc'),
(4333, 243, 'Binh Thuan'),
(4334, 243, 'Ca Mau'),
(4335, 243, 'Can Tho'),
(4336, 243, 'Cao Bang'),
(4337, 243, 'Da Nang'),
(4338, 243, 'Dac Lak'),
(4339, 243, 'Dong Nai'),
(4340, 243, 'Dong Thap'),
(4341, 243, 'Gia Lai'),
(4342, 243, 'Ha Giang'),
(4343, 243, 'Ha Nam'),
(4344, 243, 'Ha Noi'),
(4345, 243, 'Ha Tay'),
(4346, 243, 'Ha Tinh'),
(4347, 243, 'Hai Duong'),
(4348, 243, 'Hai Phong'),
(4349, 243, 'Ho Chi Minh'),
(4350, 243, 'Hoa Binh'),
(4351, 243, 'Hung Yen'),
(4352, 243, 'Khanh Hoa'),
(4353, 243, 'Kien Giang'),
(4354, 243, 'Kon Tum'),
(4355, 243, 'Lai Chau'),
(4356, 243, 'Lam Dong'),
(4357, 243, 'Lang Son'),
(4358, 243, 'Lao Cai'),
(4359, 243, 'Long An'),
(4360, 243, 'Nam Dinh'),
(4361, 243, 'Nghe An'),
(4362, 243, 'Ninh Binh'),
(4363, 243, 'Ninh Thuan'),
(4364, 243, 'Phu Tho'),
(4365, 243, 'Phu Yen'),
(4366, 243, 'Quang Binh'),
(4367, 243, 'Quang Nam'),
(4368, 243, 'Quang Ngai'),
(4369, 243, 'Quang Ninh'),
(4370, 243, 'Quang Tri'),
(4371, 243, 'Soc Trang'),
(4372, 243, 'Son La'),
(4373, 243, 'Tay Ninh'),
(4374, 243, 'Thai Binh'),
(4375, 243, 'Thai Nguyen'),
(4376, 243, 'Thanh Hoa'),
(4377, 243, 'Thua Thien-Hue'),
(4378, 243, 'Tien Giang'),
(4379, 243, 'Tra Vinh'),
(4380, 243, 'Tuyen Quang'),
(4381, 243, 'Vinh Long'),
(4382, 243, 'Vinh Phuc'),
(4383, 243, 'Yen Bai'),
(4384, 244, 'Saint Croix'),
(4385, 244, 'Saint John'),
(4386, 244, 'Saint Thomas'),
(4387, 245, 'Blaenau Gwent'),
(4388, 245, 'Bridgend'),
(4389, 245, 'Caerphilly'),
(4390, 245, 'Cardiff'),
(4391, 245, 'Carmarthenshire'),
(4392, 245, 'Ceredigion'),
(4393, 245, 'Conwy'),
(4394, 245, 'Denbighshire'),
(4395, 245, 'Flintshire'),
(4396, 245, 'Gwynedd'),
(4397, 245, 'Isle of Anglesey'),
(4398, 245, 'Merthyr Tydfil'),
(4399, 245, 'Monmouthshire'),
(4400, 245, 'Neath Port Talbot'),
(4401, 245, 'Newport'),
(4402, 245, 'Pembrokeshire'),
(4403, 245, 'Powys'),
(4404, 245, 'Rhondda Cynon Taff'),
(4405, 245, 'Swansea'),
(4406, 245, 'The Vale of Glamorgan'),
(4407, 245, 'Torfaen'),
(4408, 245, 'Wrexham'),
(4409, 246, 'Alo'),
(4410, 246, 'Sigave'),
(4411, 246, 'Wallis'),
(4412, 247, 'West Bank'),
(4413, 248, 'Western Sahara'),
(4414, 249, '\'Adan'),
(4415, 249, '\'Ataq'),
(4416, 249, 'Abyan'),
(4417, 249, 'Al Bayda\''),
(4418, 249, 'Al Hudaydah'),
(4419, 249, 'Al Jawf'),
(4420, 249, 'Al Mahrah'),
(4421, 249, 'Al Mahwit'),
(4422, 249, 'Dhamar'),
(4423, 249, 'Hadhramawt'),
(4424, 249, 'Hajjah'),
(4425, 249, 'Ibb'),
(4426, 249, 'Lahij'),
(4427, 249, 'Ma\'rib'),
(4428, 249, 'Sa\'dah'),
(4429, 249, 'San\'a\''),
(4430, 249, 'Ta\'izz'),
(4431, 250, 'Kosovo'),
(4432, 250, 'Montenegro'),
(4433, 250, 'Serbia'),
(4434, 250, 'Vojvodina'),
(4435, 251, 'Central'),
(4436, 251, 'Copperbelt'),
(4437, 251, 'Eastern'),
(4438, 251, 'Luapula'),
(4439, 251, 'Lusaka'),
(4440, 251, 'North-Western'),
(4441, 251, 'Northern'),
(4442, 251, 'Southern'),
(4443, 251, 'Western'),
(4444, 252, 'Bulawayo'),
(4445, 252, 'Harare'),
(4446, 252, 'Manicaland'),
(4447, 252, 'Mashonaland Central'),
(4448, 252, 'Mashonaland East'),
(4449, 252, 'Mashonaland West'),
(4450, 252, 'Masvingo'),
(4451, 252, 'Matabeleland North'),
(4452, 252, 'Matabeleland South'),
(4453, 252, 'Midlands'),
(4454, 159, 'Maputo City');

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterial_offers`
--

CREATE TABLE `rawmaterial_offers` (
  `id` int(11) UNSIGNED NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `offer_dscription` text NOT NULL,
  `quantity` double NOT NULL,
  `quantity_left` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `raw_matrial_status` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rawmaterial_offers`
--

INSERT INTO `rawmaterial_offers` (`id`, `raw_material_id`, `brand_name`, `seller_id`, `price`, `offer_dscription`, `quantity`, `quantity_left`, `status`, `raw_matrial_status`, `count`, `image_name`, `created_at`, `updated_at`) VALUES
(4, 14, 'Hoffman Fertilizers', 57, 20, '25kg Muriate of Potash for Potatoes and early groundnuts', 25, 6, 'open', 'Ungraded', 0, 'a3ba71870f06f9d3e69e792c5e386b53.jpg', 1495089014, 1495090416),
(5, 1, 'ZimSuperSeeds ZM401 10kg', 2, 25, 'Very early maturing OPV (white maize)\r\nCan take 110 – 120 days to mature\r\nYield potential is 5 000kg/ha Tolerant to drought and low nitrogen\r\nThis variety has a good resistance to maize streak virus, Grey leaf spot(GLS), Cercosporazeae-maydis, PLS, and common rust(Puccinia sorghi', 50, 0, 'open', 'Ungraded', 0, '5ab3a9b4f9f7325ac50d2764acec30d8.jpg', 1495090256, 1518083713),
(6, 1, 'Zimsuperseeds NUA45', 2, 36.5, 'Good yield up to 2900kg/ha\r\nMatures in 90 days\r\nSeed size is large and kidney shaped', 120, 120, 'open', 'Ungraded', 0, 'c28280e295f5856e1660aa95a0b10bed.jpg', 1495090409, 1495090409),
(7, 13, 'Bonide', 2, 1.5, 'If you’re vegan, you might want to stay away from this one. Bone meal is a fine powder made up of ground animal bones. This additive is a nice way to get some additional phosphorous and calcium to your plants. An abundance of phosphorus is especially important once your plant has reached flowering phase. ', 1000, 998, 'open', 'Ungraded', 0, '3223247fee28db296c1712c8acaeae74.jpg', 1500467796, 1532676282),
(8, 4, 'elephant', 80, 3, 'high quality ', 1000, 999, 'open', 'Ungraded', 0, '7fe43be8ade32fbb2e86472a258abedf.JPG', 1518083678, 1582654298);

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `measurement_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `name`, `description`, `measurement_id`, `created_at`, `updated_at`) VALUES
(1, 'Early Maturity Maize Seed', 'Time from planting to harvest is very short, in order to mitigate the unreliable weather patterns.', 2, 1494339676, 1494339676),
(2, 'Ammonium Sulphate', 'This fertilizer type comes in a white crystalline salt form, containing 20 to 21% ammonia cal nitrogen. It is easy to handle and it stores well under dry conditions. However, during the rainy season, it sometimes, forms lumps. (TIP: When these lumps do occur you should grind them down to a powered form before use.) Though this fertilizer type is soluble in water, its nitrogen is not readily lost in drainage, because the ammonium ion is retained by the soil particles. A note of caution: Ammonium sulphate may have an acid effect on garden soil. Over time, the long-continued use of this type of fertilizer will increase soil acidity and thus lower the yield. (TIP: It is advisable to use this fertilizer type together with bulky organic manures to safeguard against the ill effects of continued application of ammonium sulphate.)\r\nThe application of Ammonium sulphate fertilizer can be done before sowing, at sowing time, or even as a top-dressing to the growing crop. Do however take care NOT to apply it along with, or too close to, the seed, because in concentrated form, it affects seed germination very adversely.', 2, 1494314947, 1494315085),
(3, 'Ammonium Sulphate', 'This fertilizer type comes in a white crystalline salt form, containing 20 to 21% ammonia cal nitrogen. It is easy to handle and it stores well under dry conditions. However, during the rainy season, it sometimes, forms lumps. (TIP: When these lumps do occur you should grind them down to a powered form before use.) Though this fertilizer type is soluble in water, its nitrogen is not readily lost in drainage, because the ammonium ion is retained by the soil particles. A note of caution: Ammonium sulphate may have an acid effect on garden soil. Over time, the long-continued use of this type of fertilizer will increase soil acidity and thus lower the yield. (TIP: It is advisable to use this fertilizer type together with bulky organic manures to safeguard against the ill effects of continued application of ammonium sulphate.)\r\nThe application of Ammonium sulphate fertilizer can be done before sowing, at sowing time, or even as a top-dressing to the growing crop. Do however take care NOT to apply it along with, or too close to, the seed, because in concentrated form, it affects seed germination very adversely.', 2, 1494315138, 1494315138),
(4, 'Ammonium Nitrate', 'This fertilizer type also comes in white crystalline salts. Ammonium Nitrate salts contains 33 to 35% nitrogen, of which half is nitrate nitrogen and the other half in the ammonium form. As part of the ammonium form, this type of fertilizer cannot be easily leached from the soil. This fertilizer is quick-acting, but highly hygroscopic thus making it unfit for storage. (TIP: Coagulation and Granulation of this fertilizer can be combated with a light coating of the granules with oil.) On a note of caution: Ammonium Nitrate also has an acid effect on the soil, in addition this type of fertilizer can be explosive under certain conditions, and, should thus be handled with care.\r\n\'Nitro Chalk\' is the trade name of a product formed by mixing ammonium nitrate with about 40% lime-stone or dolomite. This fertilizer is granulated, non-hazardous and less hygroscopic. The lime content of this fertilizer type makes it useful for application to acidic garden soils.', 2, 1494315163, 1494315163),
(5, 'Ammonium Sulphate Nitrate', 'This fertilizer type is available as a mixture of ammonium nitrate and ammonium sulphate and is recognizable as a white crystal or as dirty-white granules. This fertilizer contains 26% nitrogen, three-fourths of it in the ammoniac form and the remainder (i.e. 6.5%) as nitrate nitrogen. Ammonium Sulphate Nitrate is non-explosive, readily soluble in water and is very quick-acting. Because this type of fertilizer keeps well, it is very useful for all crops. Though it can also render garden soil acidic, the acidifying effects is only one-half of that of ammonium sulphate on garden soil. Application of this fertilizer type can be done before sowing, at sowing time or as a top-dressing, but it should not be applied along the seed.', 2, 1494315210, 1494315210),
(6, 'Ammonium Chloride', 'This fertilizer type comes in a white crystalline compound, which contains a good physical condition and 26% ammoniac nitrogen. In general, Ammonium Chloride is similar to ammonium sulphate in action. (TIP: Do not use this type of fertilizer on crops such as tomatoes because the chorine may harm your crop.)', 2, 1494315235, 1494315235),
(7, 'Urea', 'This type of fertilizer usually is available to the public in a white, crystalline, organic form. It is a highly concentrated nitrogenous fertilizer and fairly hygroscopic. This also means that this fertilizer can be quite difficult to apply. Urea is also produced in granular or pellet forms and is coated with a non-hygroscopic inert material. It is highly soluble in water and therefore, subject to rapid leaching. It is, however, quick-acting and produces quick results. When applied to the soil, its nitrogen is rapidly changed into ammonia. Similar to ammonium nitrate, urea supplies nothing but nitrogen and the application of Urea as fertilizer can be done at sowing time or as a top-dressing, but should not be allowed to come into contact with the seed.', 2, 1494315259, 1494315259),
(8, 'Ammonia', 'This fertilizer type is a gas that is made up of about 80% of nitrogen and comes in a liquid form as well because under the right conditions regarding temperature and pressure, Ammonia becomes liquid (anhydrous ammonia). Another form, \'aqueous ammonia\', results from the absorption of Ammonia gas into water, in which it is soluble. Ammonia is used as a fertilizer in both these forms. The anhydrous liquid form of Ammonia can be applied by introducing it into irrigation water, or directly into the soil from special containers. Not really suitable for the home gardener as this renders the use of ammonia as a fertilizer very expensive.', 2, 1494315289, 1494315289),
(9, 'Organic Nitrogenous Fertilizers', 'Organic Nitrogenous fertilizer is the type of fertilizer that includes plant and animal by-products. These by-products can be anything from oil cakes, to fish manure and even to dried blood. The Nitrogen available in organic nitrogenous fertilizer types first has to be converted before the plants can use it. This conversion occurs through bacterial action and is thus a slow process. The upside of this situation is that the supply of available nitrogen lasts so much longer AND the amounts of this type of fertilizer may contain small amounts of organic stimulants that contain other minor elements that might also be needed by the plants that are being fertilized. Furthermore, they may also small amounts of organic stimulants that they may contain, or of some of the minor elements needed by plant. Oil-cakes contain not only nitrogen but also some phosphoric and potash, besides a large quantity of organic matter. This type of fertilizer is used in conjunction with quicker-acting chemical fertilizers.\r\nThen there is also blood meal which contains 10 to 12% highly available Nitrogen as well as 1 to 2% Phosphoric acid. Blood meal, used in much the same way as oilcakes, makes for a quick remedy and can effectively be used on all types of soil as a type of fertilizer.\r\nFish meal which can be dried fish, fish-meal or even powder is extracted in areas where fish oil is extracted. The resulting residue is used as a fertilizer type. Obviously depending on the type of fish used, the available Nitrogen can be between 5 and 8% and the Phosphoric content can be from 4 to 6%. Fish meal also constitutes a fast-acting fertilizer type which is suitable for most soil types and crops. (TIP: In powder form it is at its best.)', 2, 1494315352, 1494315352),
(10, 'Rock Phosphate', 'As a type of fertilizer, rock phosphate occurs as natural deposits in some countries. This fertilizer type has its advantages and disadvantages. The advantage is that with adequate rainfall this fertilizer results in a long growing period which can enhance crops. Powdered phosphate fertilizer is an excellent remedy for soils that are acidic and has a phosphorous deficiency and requires soil amendments.\r\nHowever, the disadvantage is that although phosphate fertilizer such as rock phosphate contains 25 to 35% phosphoric acid, the phosphorous is insoluble in water. It has to be pulverized to be used as a type of fertilizer before rendering satisfactory results in garden soil. Thus it is not surprising that Rock Phosphate is used to manufacture superphosphate which makes the Phosphoric acid water soluble.', 2, 1494315384, 1494315384),
(11, 'Superphosphate', 'Superphosphate is a fertilizer type that most gardeners are familiar with. As a fertilizer type one can get superphosphate in three different grades, depending on the manufacturing process. The following is a short description of the different superphosphate fertilizer grades:\r\nSingle superphosphate containing 16 to 20% phosphoric acid;\r\nDicalcium phosphate containing 35 to 38% phosphoric acid; and\r\nTriple superphosphate containing 44 to 49% phosphoric acid.\r\nTriple superphosphate is used mostly in the manufacture of concentrated mixed fertilizer types.\r\nThe greatest advantage to be had of using Superphosphate as a fertilizer is that the phosphoric acid is fully water soluble, but when Superphosphate is applied to the soil, it is converted into soluble phosphate. This is due to precipitation as calcium, iron or aluminum phosphate, which is dependent on the soil type to which the fertilizer is added, be it alkaline or acidic garden soil. All garden soil types can benefit from the application of Superphosphate as a fertilizer. Used in conjunction with an organic fertilizer, it should be applied at sowing or transplant time.', 2, 1494315422, 1494315422),
(12, 'Slag', 'Basic slag is a by-product of steel mills and is used as a fertilizer to a lesser extent than Superphosphate. Slag is an excellent fertilizer that can be used to amend soils that are acidic because of its alkaline reaction. For slag application to be an effective fertilizer it has to be pulverized first.\r\n', 2, 1494315448, 1494315448),
(13, 'Bonemeal', 'Bonemeal as a fertilizer type needs no introduction. Bone-meal is used as a phosphate fertilizer type and is available in two types: raw and steamed. The raw bone-meal contains 4% organic Nitrogen that is slow acting, and 20 to 25% phosphoric acid that is not soluble in water. The steamed bone-meal on the other hand has all the fats, greases, nitrogen and glue-making substances removed as a result of high pressure steaming. But it is more brittle and can be ground into a powder form. In powder form this fertilizer is of great advantage to the gardener in that the rate of availability of the phosphoric acid depends on its pulverization. This fertilizer is particularly suitable as a soil amendment for acid soil and should be applied either at sowing time or even a few days prior to sowing. (TIP: As a fertilizer type, bone-meal is slow acting and should be incorporated into the soil and not as a top-dressing.)', 2, 1494315479, 1494315479),
(14, 'Muriate Of Potash', 'Muriate of potash is a gray crystal type of fertilizer that consists of 50 to 60% potash. All the potash in this fertilizer type is readily available to plants because it is highly soluble in water. Even so, it does not leach away deep into the soil since the potash is absorbed on the colloidal surfaces. (TIP: Apply muriate of potash at sowing time or prior to sowing.)', 2, 1494315506, 1494315506),
(15, 'Sulphate Of Potash', 'Sulphate of potash is a fertilizer type manufactured when potassium chloride is treated with magnesium sulphate. It dissolves readily in water and can be applied to the garden soil at any time up to sowing. Some gardeners prefer using sulphate of potash over muriate of potash.', 2, 1494315529, 1494315529),
(16, 'Sodium Nitrates', 'Sodium Nitrates are also known as Chilates or Chilean nitrate. The Nitrogen contained in Sodium Nitrate is refined and amounts to 16%. This means that the Nitrogen is immediately available to plants and as such is a valuable source of Nitrogen in a type of fertilizer. When one makes a soil amendment using Sodium Nitrates as a type of fertilizer in the garden, it is usually as a top- and side-dressing. Particularly when nursing young plants and garden vegetables. In soil that is acidic Sodium Nitrate is quite useful as a type of fertilizer. However, the excess use of Sodium Nitrate may cause deflocculation.', 1, 1494314644, 1494315106),
(18, 'Azoxystrobin', 'An experimental compound used on cereals, vegetables, fruit crops, peanuts, turf, ornamentals, stone fruit, bananas, rice, apples, grapes, & potatoes. This chemical does not leach and is unlikely to contaminate water bodies. It is found to exhibit very low ecological risks, to aquatic life, birds, and mammals. Other names include Abound, Amistar, Bankit, Heritage, and Quadris.', 1, 1494320755, 1494320755),
(19, 'Boscalid', '	Fungicide used on specialty crops such as straberries, beans, stone fruit, tree nuts, root vegetables, carrots, grapes, Brassica vegetables, and sunflowers (http://www.epa.gov/opp00001/chem_search/reg_actions/registration/fs_PC-128008_01-Jul-03.pdf).', 1, 1494320815, 1494320815),
(20, 'Carbendazim (MBC', '	Found to be acutely toxic to honeybees, having an effect on long term survival of colonies. Foods with Carbendazim residues include: strawberries, green beans, apple sauce, blueberries, sweet bell peppers, apples, cherries, green onions, spinach, bananas, honey, lettuce, water, celery, cauliflower, celery & broccoli.', 1, 1494320840, 1494320840),
(21, 'Chlorothalonil', '	General use insecticide used on trees, small fruits, turf, ornamentals, and vegetables. Found to be non-toxic to honey bees (http://pmep.cce.cornell.edu/profiles/extoxnet/carbaryl-dicrotophos/chlorothalonil-ext.html).', 1, 1494320864, 1494320864),
(22, 'Cyprodinil', 'Used as a foliar fungicide on cereals, grapes, pome fruit, stone fruit, strawberries, vegetables, field crops and ornamentals; and as a seed dressing on barley.', 1, 1494320893, 1494320893),
(23, 'Dicloran', '	Widely used fungicide used on a variety of ornamentals, fruit and vegetable crops such as pricots, snap beans, carrots, celery, cherries, cucumber, endive, fennel, garlic, grapes, lettuce, nectarines, onions, peaches, plums, potatoes, prunes, rhubarb, shallots, sweet potatoes and tomatoes (http://www.epa.gov/oppsrrd1/REDs/factsheets/dcna_fs.htm).', 1, 1494320913, 1494320913),
(24, 'Fenbuconazole', '	Systemic fungicide intended for use as an agricultural and horticultural fungicide spray for the control of leaf spot, yellow and brown rust, powdery mildew and net blotch on wheat and barley and apple scab, pear scab and apple powdery mildew on apples and pears. Residues are also found on cherries, apricots, plums, peaches, grapes, oranges and grapefruits and numerous vegetables.', 1, 1494320936, 1494320936),
(25, 'Fludioxonil', '	A fungicide used to control fungal disease, making it a useful seed treatment as well as a post-harvest treatment for fruit such as apples, bilberries, blackberries, blackcurrants, blueberries, broad beans, combining peas, crab apples, cranberries, dwarf french beans, edible podded peas, forest nursery, gooseberries, ornamental plant production, pears, quinces, raspberries, redcurrants, runner beans, strawberries, vining peas and whitecurrants (http://www.agchemaccess.com/Fludioxonil).', 1, 1494320979, 1494320979),
(26, 'Metalaxyl', 'A fungicide used in mixtures as a foliar spray for tropical and subtropical crops, as a soil treatment for control of soil-borne pathogens, and as a seed treatment to control downy mildews. Its average half-life in soil is about 70 days. At pH\'s of 5 to 9 and temperatures of 20 to 30 degrees C, the half- life in water was greater than four weeks. Metalaxyl is non-toxic to honeybees.', 1, 1494321006, 1494321006),
(27, 'Myclobutanil', '	A fungicide registered for use on a wide range of food crops. It is used heavily to control fungi affecting wine and table grapes, especially in California. California accounts for roughyl 50% or all myclobutanil use in the US. 60% of myclobutanil use in CA is applied to grapes. It also has a number of other food crop and commercial or residential landscaping applications. Found to be non-toxic to honey bees.(http://toxipedia.org/display/toxipedia/Myclobutanil).', 2, 1494321027, 1494321027),
(28, 'Pyraclostrobin', 'Controls foliar fungal diseases Residues are found on a variety of fruits including melons, apples, brassicaea family, sunflowers, beans, peppers, lettuces, kale and cucumbers.', 2, 1494321056, 1494321056),
(29, 'Tebuconazole', 'A powder used to treat pathogenic and foliar plant fungi on food and feed crops.', 2, 1494321078, 1494321078),
(30, 'Thiabendazole', 'Fungicide used to control mold, rot, blight and stain on fruits and vegetables. It is found to be non-toxic to honey bees.', 2, 1494321107, 1494321107),
(31, 'Trifloxystrobin', '	A long-term effective pesticide used to treat fungal turf infections such as brown patch, red thread, rust, anthracnose, fusarium patch and dollar spot (http://www.rigbytaylor.com/Glossary+-+Trifloxystrobin.htm).', 2, 1494321130, 1494321130),
(32, 'THPI', '	Major metabolite of Captan, a fungicide. Used to control diseases on a number of fruits and vegetables as well as ornamental plants. It also improves the outward appearance of many fruits, making them brighter and healthier-looking. Captan is utilized by both home and agricultural growers and is often applied during apple production. Captan is cited as Group B2, a probable human carcinogen by the EPA.', 2, 1494321150, 1494321150),
(33, 'Vinclozolin', '	General use fungicide used on raspberries, chicory, lettuce, kiwi, canola, snap beans, dry bulb onions, ornamentals, and turf (http://pmep.cce.cornell.edu/profiles/extoxnet/pyrethrins-ziram/vinclozolin-ext.html).', 2, 1494321174, 1494321174),
(34, 'Atrazine', '	A commonly used, effective and inexpensive herbicide used to eliminate noxious weeds in major crops. It frequently contaminates groundwater and is can causes male amphibians (frogs) to change gender. It is restricted in Europe.', 2, 1494321243, 1494321243),
(35, 'Fluridone', 'Herbicide used to control aquatic weeds in freshwater ponds whether floating, submerged or emersed (http://ccetompkins.org/environment/invasive-species/fluridone-herbide-treatment-faq).', 2, 1494321267, 1494321267),
(36, 'Metolachlor', '	Applied to soil to control weeds in corn, soybeans, peanuts, grain sorghum, potatoes, pod crops, cotton, safflower, stone fruits, nut trees, highway right-of-ways and woody ornamental fields. Rapid degradation in sunny soil (http://pmep.cce.cornell.edu/profiles/extoxnet/metiram-propoxur/metolachlor-ext.html).', 2, 1494321290, 1494321290),
(37, 'Oxyfluorfen', '	Herbicide used to control broadleaf and grassy weeds in fruit and vegetable crops as well as ornamentals. It is also used for weed control on patios and driveways. \"The largest agricultural markets in terms of total pounds active ingredient are wine grapes and almonds.\" It does not appear to have an effect on honey bees.', 2, 1494321366, 1494321366),
(38, 'Pendimethalin', 'Herbicide used to control annual grasses and certain broadleaf weeds. Usually used to protect crops such as wheat, corn, soybeans potatoes, cabbage, peas, carrots and asparagus. Found to not be toxic to bees or mammals but highly toxic to aquatic invertebrates and fish.', 2, 1494321403, 1494321403),
(39, 'Propazine', 'Herbacide found to be non-toxic to honey bees. Applied to boradleaf weeds and annual grasses in sweet sorghum in the form of a spray or powder (http://pmep.cce.cornell.edu/profiles/extoxnet/metiram-propoxur/propazine-ext.html).', 2, 1494321429, 1494321429),
(40, 'Tebuthiuron', '	Tebuthiuron is a herbicide used to control weeds in noncropland areas, rangelands, rights-of-way and industrial sites. Weeds that are controlled by tebuthiuron include alfalfa, bluegrasses, chickweed, clover, dock, goldenrod, mullein, etc. If used correctly it should not pose a threat to bees (http://pmep.cce.cornell.edu/profiles/extoxnet/pyrethrins-ziram/tebuthiuron-ext.html)', 2, 1494321475, 1494321475),
(41, 'Trifluralin', 'Herbicide on used on grass, to control broadleaf weeds and on some fruit and vegetable crops, flowers and shrubs such as cotton, alfalfa, sunflowers and soybeans are examples. Insoluble in water but does not leave residues on crops so residues only occur in root tissues. Considered a pre-emergence herbicide', 2, 1494321495, 1494321495),
(42, '2,4 Dimethylphenyl formamide (DMPF)', 'Amitraz is a non-systemic acaricide and insecticide. Amitraz is among many other purposes best known as insecticide against mite- or tick-infestation of dogs.', 2, 1494322011, 1494322011),
(43, 'Acephate', 'General use insecticide commonly used to treat species, in fruit, vegetables (e.g. potatoes and sugar beets), vine, and hop cultivation and in horticulture to protect from biting and sucking insects. Considered toxic to bees at 1.2 ug/bee (Kidd, H. and James, D. R., Eds. The Agrochemicals Handbook, Third Edition. Royal Society of Chemistry Information Services, Cambridge, UK, 1991 (as updated).5-14).', 2, 1494322035, 1494322035),
(44, 'Acetamiprid', '	Contact neonicatinoid insecticide targeting sucking-type insects. Can be applied to soil or as a foliar spray on apples, cherries, letttuce, pears, peppers, house and garden plants, potatoes, plums and tomatoes (http://www.agchemaccess.com/Acetamiprid).', 2, 1494322062, 1494322062),
(45, 'Aldicarb sulfone', '	Active ingredient in pesticide Temik. It is effective against thrips, aphids, spider mites, lygus, fleahoppers, and leafminers, but is primarily used as a nematicide in potato crops. Its weakness is its high level of solubility, which restricts its use in certain areas where the water table is close to the surface.', 2, 1494322097, 1494322097),
(46, 'Bifenthrin', '	Insecticide used mainly again red fire ants but also used to control aphids, worms, ants, gnats, moths, beetles, grasshoppers, mites, midges, spiders, ticks, yellow jackets, maggots, thrips, caterpillars, flies and fleas. It is mostly used in orchards, nurseries and homes and is seen in large amounts on corn. It is highly toxic to aquatic organisms and has one of the longest known residual times in soil on the market. \"In bees, the lethal concentration (LC50) of bifenthrin is about 17 mg/L. At sub lethal concentrations, bifenthrin reduces the fecundity of bees, decreases the rate at which bees develop into adulthood, and increases their immature periods. Dai, Ping-Li; Wang, Qiang; Sun, Ji-Hu; Liu, Feng; Wang, Xing; Wu, Yan-Yan; Zhou, Ting (2010). \"Effects of sub lethal concentrations of bifenthrin and deltamethrin on fecundity, growth, and development of the honeybeeApis mellifera logistical\". Environmental Toxicology and Chemistry 29 (3): 644–9.\" A Pyrethroid insecticide.', 2, 1494322136, 1494322136),
(47, 'Chlorpyrifos', 'Insecticide effective in controlling cutworms, corn rootworms, cockroaches, grubs, flea beetles, flies, termites, fire ants, and lice. Mainly used as an insecticide on grain, cotton, field, fruit, nut and vegetable crops, and well as on lawns and ornamental plants. \"Aquatic and general agricultural uses of chlorpyrifos pose a serious hazard to wildlife and honeybees\" (Kidd, H. and James, D. R., Eds. The Agrochemicals Handbook, Third Edition. Royal Society of Chemistry Information Services, Cambridge, UK, 1991, 5-14)', 2, 1494322160, 1494322160),
(48, 'Coumaphos', '	A widely used insecticide found to be moderately toxic to bees. It used to control livestock insects such as cattle grubs, screw worms, lice, scabies, flies and ticks. Coumaphos is an organophosphate which affects the activity of naturally occuring enzymes called cholinesterases in humans and insects that are essential for the proper functioing of the nervous system (http://pmep.cce.cornell.edu/profiles/extoxnet/carbaryl-dicrotophos/coumaphos-ext.html).', 2, 1494322182, 1494322182),
(49, 'Cyfluthrin', '	Insecticide used to control cutworms, ants, silverfish, cockroaches, termites, grain beetles, weevils, mosquitoes, fleas, flies, corn earworms, tobacco budworm, codling moth, European corn borer, cabbageworm, loopers, armyworms, boll weevil, alfalfa weevil, Colorado potato beetle, and many others. Its primary agricultural uses have been for control of chewing and sucking insects on crops such as cotton, turf, ornamentals, hops, cereal, corn, deciduous fruit, peanuts, potatoes, and other vegetables. Cyfluthrin is also used in public health situations and for structural pest control. Cyfluthrin is the active ingredient in many insecticide products including Baythroid, Baythroid H, Attatox, Contur, Laser, Responsar, Solfac, Tempo and Tempo H. Cyfluthrin is highly toxic to bees with an LD50 of 0.037 mg/bee. A Synthetic pyrethroid derivative that is used as an insecticide and a common household pesticide.', 2, 1494322226, 1494322226),
(51, 'Diazinon', '	In 1994 the EPA phased out the residential use of Diazinon and in 1988 cancelled the registration for use on golf courses and sod farms. It is currently used on rice, fruit trees, sugarcane, corn tobacco, potatoes, and other horticultural plants (http://pmep.cce.cornell.edu/profiles/extoxnet/carbaryl-dicrotophos/diazinon-ext.html).', 2, 1494322315, 1494322315),
(52, 'Dichlorvos', '	An organophosphate insecticide used to control mushroom flies, aphids, spider mites, caterpillars, thrips, and white flies in fruit and vegetble crops. It is also fed to livestock to control botfuly larvae in manure as well as parasitic worm infections in humans, livestock and dogs. Many plants tolerate the pesticide very well and it is toxic to bees (http://pmep.cce.cornell.edu/profiles/extoxnet/carbaryl-dicrotophos/dichlorvos-ext.html).', 2, 1494322346, 1494322346),
(53, 'Dicofol', '	A miticide used on fruit, vegetable, ornamental and field crops. It id found to be non-toxic to honey bees (http://pmep.cce.cornell.edu/profiles/extoxnet/carbaryl-dicrotophos/dicofol-ext.html)', 2, 1494322371, 1494322371),
(54, 'Dieldrin', '	Banned insecticide as of 1987 and no longer produced in the US. used to control insects on cotton, corn and citrus crops. Used to control locusts and mosquitoes, as a wood preserve, and for termite control. (EPA)', 2, 1494322396, 1494322396),
(55, 'Diflubenzuron', 'Insecticide used to control many leaf eating larvae of insects feeding on agricultural, forest and ornamental plants (e.g. gypsy moths, mosquito larvae, rust mites). Diflubenzuron is used primarily on cattle, citrus, cotton, mushrooms, ornamentals, standing water, forestry trees and in programs to control mosquito larvae and gypsy moth populations. (EPA) Insecticide used in controlling insect pests in forests and on field crops. It inhibits the production of chitin used by an insect to build its exoskeleton.', 2, 1494322425, 1494322425),
(56, 'Endosulfan I', '	Controversial insecticide that is globally being phased out by mid 2012. Endosulfan has been used in agriculture around the world to control insect pests including whiteflys, aphids, leafhoppers, Colorado potato beetles and cabbage worms however it can negatively effect populations of beneficial insects and is moderately toxic to honey bees (Oregon State University). Endocrine disruptor and acutely neurotoxic to both insects and mammals.', 2, 1494322467, 1494322467),
(57, 'Esfenvalerate', 'Insecticide used on a wide range of pests such as moths, flies, beetles, and other insects. It is used on vegetable crops, tree fruits, and nut crops. \"Esfenvalerate is also highly toxic to bees. The compound tends to repel bees for a day or two after application, causing bee visitations to drop during that time . Since most intoxicated bees die in the field before they can return to contaminate the hive, the brood is not exposed except by direct spray. Dried spray residues are not expected to pose a significant threat to bees\" (Asana XL Technical Bulletin. (no date). Du Pont Chemical Corp). Synthetic pyrethroid insecticide.', 2, 1494322503, 1494322503),
(58, 'Fenpropathrin', '	Insecticide used in agriculture and on ornamentals. Used to control mites in fruits and vegetables.', 2, 1494322531, 1494322531),
(59, 'Fenpyroximate', 'Acaricide used to control varroa mites.', 2, 1494322579, 1494322579),
(60, 'Flonicamid', 'Insecticide used to control hemipterous, or sucking insects such as aphids and whiteflies on fruit, cereal and root/tuber crops, by inhibiting feeding behavior. No honey bee toxity infromation is currently available for this insecticide (http://www.efsa.europa.eu/en/efsajournal/doc/1445.pdf).', 2, 1494322608, 1494322608),
(61, 'Fluvalinate', 'Insecticide mainly used to treat honey bees for Varroa mites.', 2, 1494322637, 1494322637),
(62, 'Imidacloprid', '	The most widely used insecticide in the world to control beetles, fleas, aphids, stink bugs, termites, locusts, thrips, carpenter ants and cockroaches. It is one of the most toxic insecticides to honey bees (^ Suchail, Séverine; Guez, David; Belzunces, Luc P. (November 2011). \"Discrepancy between acute and chronic toxicity induced by imidacloprid and its metabolites in Apis mellifera\". Environmental Toxicology and Chemistry 20: 2482-2486.)', 2, 1494322669, 1494322669),
(63, 'Methoxyfenozide', 'Insecticide used to target lepidopterous insects (moths) causing premature molting. Not believed to be toxic to honey bees.', 2, 1494322709, 1494322709),
(64, 'Methoxyfenozide', 'Insecticide used to target lepidopterous insects (moths) causing premature molting. Not believed to be toxic to honey bees.', 2, 1494322710, 1494322710),
(65, 'Methamidophos', '	A highly active, systemic, residual organophosphate insecticide. It is used on crops such as broccoli, Brussel sprouts, cauliflower, grapes, celery, sugar beets, cotton, tobacco, and potatoes to protect them against aphids, flea beetles, worms, whiteflies, thrips, cabbage loopers, Colorado potato beetles, potato tubeworms, armyworms, mites, and leafhoppers. Toxic to honey bees as one study found it greatly reduces the foraging activity of bees for a prolonged period of time after application (Gary, N.E. and K. Lorenzen. 1989. Effect of Methamidophos on Honey Bees (Hymenoptera: Apidae) During Alfalfa Pollination. J. Econ. Entomol. 82(4): 1067-1072.)', 2, 1494322744, 1494322744),
(66, 'Methomyl', '	Broad spectrum insecticide used to control spiders and ticks as well as applications to agricultural crops. It cosidered highly toxic to honey bees through direct contact and ingestion (http://pmep.cce.cornell.edu/profiles/extoxnet/haloxyfop-methylparathion/methomyl-ext.html).', 2, 1494322768, 1494322768),
(67, 'Paradichlorobenzene', '	A fumigant insecticide used to control moths and moth larvae. In 2010, 30 known products on the market contained paradichlorobenzene according to the EPA. Hives can be fumigated with this chemical to stave off wax moth infestation (http://npic.orst.edu/factsheets/PDBgen.pdf).', 2, 1494322815, 1494322815),
(68, 'Permethrin total', 'The majority of permethrin, over 70%, is used in non-agricultural settings. It is used on many food and feed crops. A pyrethroid.', 2, 1494322842, 1494322842),
(69, 'Phosmet', 'Insecticide mainly used on apple trees for the control of codling moth it however used on other fruit crops and ornamentals and vines for aphids, suckers, mites and fruit flies control.', 2, 1494322870, 1494322870),
(70, 'Pyridaben', '	An insecticide applied to fruit and nut crops such as apples, pears and almonds. Per package instructions, the insecticide should not to be sprayed when honey bees are in close proximity to a treatment area as it is toxic to honey bees (http://pmep.cce.cornell.edu/profiles/insect-mite/mevinphos-propargite/pyridaben/pyramite_mcl_0398.pdf).', 2, 1494322894, 1494322894),
(71, 'Tebufenozide', 'Molt-inducing pesticide used on cabbage, cauliflower, beet, soybean, cotton, mealie, tea, tobacco and fruit trees. Found to be not acutely toxic to honey bees (http://www.pesticideinfo.org/Detail_Chemical.jsp?Rec_Id=PC36018).', 2, 1494322932, 1494322932),
(72, 'Thiacloprid', '	Neonicotinoid insecticide that is mainly for chewing insects', 2, 1494322963, 1494322963),
(73, 'Thymol', 'Used as an antifungal or anti fermentation agent in producing sugar syrup and as an aromatic material for use against the Varroa mite in special evaporator frames. Essential oil, active ingredient in Apiguard.', 2, 1494322991, 1494322991),
(74, 'Thiamethoxam', '	Insecticide classified as a neonicatoid. Used to deter insect feeding from aphids, thrips, beetles, centipedes, millipedes, sawflies, leaf miners, stem borers and termites', 2, 1494323016, 1494323016),
(350, 'Cypermethrin', 'Cypermethrin is a synthetic pyrethroid used as an insecticide in large-scale commercial agricultural applications as well as in consumer products for domestic purposes. Lasts 2-8 weeks in the soil and unlikely to contaminate groundwater.', 2, 1494322274, 1494322274);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Region 2', '700-1 050. Rainfall confined to summer. Suitable for intensive farming, based on maize, tobacco, cotton and livestock', 1478004697, 1478004697),
(3, 'Region 3', '500-800. Relatively high temperatures and infrequent, heavy falls of rain, and subject to seasonal droughts and severe mid-season dry spells. Semi-intensive farming region. Suitable for livestock production, together with production of fodder crops and cash crops under good farm management', 1478004749, 1478004749),
(4, 'Region 4', '450-650. Rainfall subject to frequent seasonal droughts and severe dry spells during the rainy season. Semi-extensive region. Suitable for farm systems based on livestock and resistant fodder crops. Forestry, wildlife/tourism', 1478004812, 1478004812),
(5, 'Region 5', '< 450. Very erratic rainfall. Northern low veldt may have more rain but the topography and soils are poor. Extensive farming region. Suitable for extensive cattle ranching. Zambezi Valley is infested with tsetse fly. Forestry, wildlife/tourism', 1478004870, 1478004870);

-- --------------------------------------------------------

--
-- Table structure for table `region_conditions`
--

CREATE TABLE `region_conditions` (
  `id` int(11) UNSIGNED NOT NULL,
  `region_id` int(11) NOT NULL,
  `condition_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `region_condition_products`
--

CREATE TABLE `region_condition_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `region_id_condition_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `narrative` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `browseurl` varchar(255) NOT NULL,
  `pollurl` varchar(255) NOT NULL,
  `paynowRef` varchar(255) NOT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `user_id`, `amount`, `narrative`, `status`, `browseurl`, `pollurl`, `paynowRef`, `paymentStatus`, `mobile`, `created_at`, `updated_at`) VALUES
(19, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102699/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=a2b54f9c-4ff3-4df1-ad51-8d2def8d3563', '000000', 'status', '263775009236', 1455728800, 1455728800),
(20, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102702/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=932c607c-33a0-494e-92d8-9f408668c792', '000000', 'status', '263775009236', 1455729138, 1455729138),
(21, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102703/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=bf6aefee-a233-4024-b933-287c60ec9aa1', '000000', 'status', '263775009236', 1455729153, 1455729153),
(22, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102704/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=8aa4be68-ed91-4d86-a33f-617a5e73e3a6', '000000', 'status', '263775009236', 1455729235, 1455729235),
(23, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102706/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=fdfba83c-4acd-4ef9-bf3d-0fb89a6e59ac', '000000', 'status', '263775009236', 1455729392, 1455729392),
(24, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102707/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1c5d6a4c-b24a-424b-8cd0-4e8ae8f36f22', '000000', 'status', '263775009236', 1455729409, 1455729409),
(25, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102708/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=8a6a248c-ac2e-441e-9ba1-3ee1e05e4f6d', '000000', 'status', '263775009236', 1455729440, 1455729440),
(26, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102709/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=05c3e85a-19c3-4f05-b9dd-b6f6758bfe74', '000000', 'status', '263775009236', 1455729457, 1455729457),
(27, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102710/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=5ce1a82a-6f24-4747-b607-107e1b102d0a', '000000', 'status', '263775009236', 1455729634, 1455729634),
(28, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102711/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=54293b1d-6077-4c3b-9877-e281bbaae994', '000000', 'status', '263775009236', 1455729683, 1455729683),
(29, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102712/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=3772e350-b462-4c0d-8043-d2639b7c343a', '000000', 'status', '263775009236', 1455729695, 1455729695),
(30, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102713/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=6876cf50-a07c-4ab5-9f2a-0573e56e8f8a', '000000', 'status', '263775009236', 1455729715, 1455729716),
(31, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102714/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1f717901-db0b-46f1-8980-5d800176e878', '000000', 'status', '263775009236', 1455729799, 1455729799),
(32, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102715/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=dca738fc-d93d-4531-b0a3-72e02dbf87aa', '000000', 'status', '263775009236', 1455729909, 1455729909),
(33, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102718/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=7825d7d5-fd7a-4275-85c2-0deacc56f13a', '000000', 'status', '263775009236', 1455730253, 1455730253),
(34, 19, 20, 'This is a payment of $20, for registration on Smart Farmer for Langelihle Chimanya. The mobile number the payment information will be sent to is 263776009237', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102720/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=ed56278c-fcaa-4e44-81ee-ec75e9ca31bb', '000000', 'status', '263776009237', 1455730471, 1455730471),
(35, 19, 20, 'This is a payment of $20, for registration on Smart Farmer for Langelihle Chimanya. The mobile number the payment information will be sent to is 263776009237', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102721/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=8f53dbd0-c0d8-4ae2-8178-4faa4d7f3c54', '000000', 'status', '263776009237', 1455730604, 1455730604),
(36, 19, 20, 'This is a payment of $20, for registration on Smart Farmer for Langelihle Chimanya. The mobile number the payment information will be sent to is 263776009237', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102722/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=7cc4bdfa-0d02-4180-946d-61293849d2ab', '000000', 'status', '263776009237', 1455730634, 1455730634),
(37, 19, 20, 'This is a payment of $20, for registration on Smart Farmer for Langelihle Chimanya. The mobile number the payment information will be sent to is 263776009237', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102724/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1a2f9c1f-2633-45fd-af0e-a62c3ed3fc2d', '000000', 'status', '263776009237', 1455731055, 1455731056),
(38, 2, 20, 'This is a payment of $20, for registration on Smart Farmer for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102800/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=cbcf10dc-a4b0-49cc-a7b8-edc9f6c3f310', '000000', 'status', '263775009236', 1455773524, 1455773524),
(39, 20, 20, 'This is a payment of $20, for registration on Smart Farmer for Shupi Dube. The mobile number the payment information will be sent to is 263779009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102805/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=a16703ad-626b-42a1-a619-bbfd6865ed0f', '000000', 'status', '263779009236', 1455774739, 1455774739),
(40, 21, 20, 'This is a payment of $20, for registration on Smart Farmer for Rudo Moyo. The mobile number the payment information will be sent to is 263779009237', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102810/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=7499bee7-a202-4b48-88a8-cec8dda88ef0', '000000', 'status', '263779009237', 1455775353, 1455775353),
(41, 21, 20, 'This is a payment of $20, for registration on Smart Farmer for Rudo Moyo. The mobile number the payment information will be sent to is 263779009237', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102811/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=fa1b403a-08e3-4073-8d59-06b3ffbd63e1', '000000', 'status', '263779009237', 1455775401, 1455775401),
(42, 21, 20, 'This is a payment of $20, for registration on Smart Farmer for Rudo Moyo. The mobile number the payment information will be sent to is 263779009237', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102814/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=8dba3365-e48c-423d-9195-f77f33b2ea47', '000000', 'status', '263779009237', 1455775707, 1455775707),
(43, 22, 20, 'AMA Registration fee for Moses Chatikobo. The mobile number the payment information will be sent to is 263773111331', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102820/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=8a68a890-7628-4a86-85d2-a7afc02787f9', '000000', 'status', '263773111331', 1455777127, 1455777127),
(44, 22, 20, 'AMA Registration fee for Moses Chatikobo. The mobile number the payment information will be sent to is 263773111331', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102837/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=361a9ecc-2240-4803-b5a9-34b07d3ca809', '000000', 'status', '263773111331', 1455780551, 1455780551),
(45, 23, 20, 'AMA Registration fee for Tariro Sithole. The mobile number the payment information will be sent to is 263775222332', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102854/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=9954e94a-7f69-4c5e-80bd-b7a0172284c6', '000000', 'status', '263775222332', 1455783111, 1455783111),
(46, 2, 20, 'AMA Registration fee for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/109734/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=8fb0bffd-569b-46c0-b80b-b90669013446', '000000', 'status', '263775009236', 1457447168, 1457447171),
(47, 2, 20, 'AMA Registration fee for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/109901/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=232d510d-12be-4917-95fa-2a9d20d87ebb', '000000', 'status', '263775009236', 1457505977, 1457505980),
(48, 2, 20, 'AMA Registration fee for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/109905/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d7ea19c8-2f23-4599-bab6-72189c477ba4', '000000', 'status', '263775009236', 1457506713, 1457506714),
(49, 2, 20, 'AMA Registration fee for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/109907/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=7f4c527e-cced-4999-9d04-9501a35b75ee', '000000', 'status', '263775009236', 1457507090, 1457507091),
(50, 2, 20, 'AMA Registration fee for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/109908/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=bfcaac23-79d4-4828-90d7-e4454241c325', '000000', 'status', '263775009236', 1457507172, 1457507172),
(51, 2, 20, 'AMA Registration fee for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/109957/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=8fc9f32c-148d-4cd8-89da-2e12a37b9b40', '000000', 'status', '263775009236', 1457512999, 1457513005),
(52, 2, 20, 'AMA Registration fee for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/110125/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=dbefa17e-cb2f-45cc-9ce8-8c6f59310806', '000000', 'status', '263775009236', 1457529948, 1457529949),
(53, 2, 20, 'AMA Registration fee for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/110350/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=0dc1697d-fd70-40c3-acd6-b4125203f14b', '000000', 'status', '263775009236', 1457598654, 1457598654),
(54, 2, 20, 'AMA Registration fee for Svodesai Sithole. The mobile number the payment information will be sent to is 263775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/110354/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=2c746c86-22b7-447a-b907-f2bd6b0263e2', '000000', 'status', '263775009236', 1457599203, 1457599209),
(55, 24, 20, 'AMA Registration fee for Tatenda  Vafana. The mobile number the payment information will be sent to is 263773430399', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/110728/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=a6883840-e9c1-410d-b45f-7f02ef1478a8', '000000', 'status', '263773430399', 1457689225, 1457689226),
(56, 29, 20, 'AMA Registration fee for Nyasha Chikwanda. The mobile number the payment information will be sent to is 263773266499', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/149237/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1ae90d51-3682-4fdf-bb23-627dc1d674a7', '000000', 'status', '263773266499', 1466499892, 1466499893),
(57, 31, 20, 'AMA Registration fee for Chiedza Mutero. The mobile number the payment information will be sent to is 263775100200', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263775100200', 1467874106, 1467874106),
(58, 31, 20, 'AMA Registration fee for Chiedza Mutero. The mobile number the payment information will be sent to is 263775100200', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263775100200', 1467874189, 1467874189),
(59, 32, 20, 'AMA Registration fee for Cephas Magava. The mobile number the payment information will be sent to is 263772287875', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263772287875', 1467875892, 1467875892),
(60, 38, 20, 'AMA Registration fee for Marjorie Napata. The mobile number the payment information will be sent to is 263772285739', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/178946/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=21f2aad5-778c-4c53-8714-d22947be7a83', '000000', 'status', '263772285739', 1471441043, 1471441045),
(61, 38, 20, 'AMA Registration fee for Marjorie Napata. The mobile number the payment information will be sent to is 263772285739', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/178947/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=b7764f47-f931-4863-a16b-3eb00eda0945', '000000', 'status', '263772285739', 1471441142, 1471441148),
(62, 39, 20, 'AMA Registration fee for Nkosana Mkandla. The mobile number the payment information will be sent to is 263739123650', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/178987/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=ae4a280a-8be9-45c8-aaac-3bc9d63658d8', '000000', 'status', '263739123650', 1471445206, 1471445208),
(63, 2, 20, 'AMA Registration fee for Svodesai Sithole. The mobile number the payment information will be sent to is 263717779296', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179353/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=f223722e-2766-4eb0-a9d1-1d8af3b62818', '000000', 'status', '263717779296', 1471503354, 1471503355),
(64, 38, 20, 'AMA Registration fee for Marjorie Napata. The mobile number the payment information will be sent to is 263772285739', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179401/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=3f2a9def-50a4-43d1-82d6-bbcc8d6ed988', '000000', 'status', '263772285739', 1471503669, 1471503669),
(65, 38, 20, 'AMA Registration fee for Marjorie Napata. The mobile number the payment information will be sent to is 263772285739', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179632/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=7187cbca-f3ea-4185-a349-af1944a275eb', '000000', 'status', '263772285739', 1471506069, 1471506069),
(66, 38, 20, 'AMA Registration fee for Marjorie Napata. The mobile number the payment information will be sent to is 263772285739', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179675/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d81e503a-f763-423a-9038-7ff093c4e875', '000000', 'status', '263772285739', 1471506468, 1471506473),
(67, 29, 20, 'AMA Registration fee for Nyasha Chikwanda. The mobile number the payment information will be sent to is 263773266499', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179731/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=4861754c-f600-4522-8fd6-f5ce8da411df', '000000', 'status', '263773266499', 1471508032, 1471508033),
(68, 40, 20, 'AMA Registration fee for Eugene Muzvidziwa. The mobile number the payment information will be sent to is 263772811066', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179739/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=70410485-fc08-4fb9-ac77-a985fb38f79f', '000000', 'status', '263772811066', 1471509130, 1471509134),
(69, 40, 20, 'AMA Registration fee for Eugene Muzvidziwa. The mobile number the payment information will be sent to is 263772811066', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179744/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1473ab57-0e22-4c7a-8f02-ff33fb6c1044', '000000', 'status', '263772811066', 1471509292, 1471509293),
(70, 40, 20, 'AMA Registration fee for Eugene Muzvidziwa. The mobile number the payment information will be sent to is 263772811066', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179778/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=bce1f2d5-ecc1-4e45-a704-33006f4765f7', '000000', 'status', '263772811066', 1471513194, 1471513194),
(71, 41, 20, 'AMA Registration fee for Diamond Chirisa. The mobile number the payment information will be sent to is 263773437387', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179914/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=58601dce-c845-49b9-a149-5629becc6bf2', '000000', 'status', '263773437387', 1471524922, 1471524922),
(72, 42, 20, 'AMA Registration fee for Alvin  Vafana. The mobile number the payment information will be sent to is 263774330318', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/193981/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=dd278b8e-e006-4c70-86e2-bb6cb29f8f62', '000000', 'status', '263774330318', 1473668541, 1473668542);

-- --------------------------------------------------------

--
-- Table structure for table `rm_sales`
--

CREATE TABLE `rm_sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `rm_offer_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` double NOT NULL,
  `total` double NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_sales`
--

INSERT INTO `rm_sales` (`id`, `rm_offer_id`, `buyer_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(0, 8, 2, 3, 1, 3, 1582654298, 1582654298),
(1, 4, 47, 20, 2, 40, 1495089157, 1495089157),
(2, 4, 2, 20, 10, 200, 1495089385, 1495089385),
(3, 4, 47, 20, 25, 500, 1495089385, 1495089385),
(4, 4, 2, 20, 1, 20, 1495089488, 1495089488),
(5, 4, 47, 20, 5, 100, 1495089742, 1495089742),
(6, 4, 2, 20, 1, 20, 1495089809, 1495089809),
(7, 4, 2, 20, 10, 200, 1495090003, 1495090003),
(8, 4, 47, 20, 3, 60, 1495090416, 1495090416),
(9, 5, 80, 25, 50, 1250, 1518083713, 1518083713),
(10, 7, 5, 1.5, 2, 3, 1532676282, 1532676282);

-- --------------------------------------------------------

--
-- Table structure for table `rm_transactions`
--

CREATE TABLE `rm_transactions` (
  `id` int(11) UNSIGNED NOT NULL,
  `rm_sale_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `narrative` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `browse_url` varchar(255) NOT NULL,
  `poll_url` varchar(255) NOT NULL,
  `paynow_ref` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_transactions`
--

INSERT INTO `rm_transactions` (`id`, `rm_sale_id`, `amount`, `narrative`, `status`, `browse_url`, `poll_url`, `paynow_ref`, `payment_status`, `mobile`, `created_at`, `updated_at`) VALUES
(0, 0, 3, 'This is a payment of $3, for 1kgs of elephant sold by Promise MakufaThe mobile number the payment information will be sent to is 263717779296', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/6764606/onlinepayments@ttcs.co.zw//263717779296', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=0c0de726-85f5-4654-b17e-18c86425c311', '6764606', 'status', '263717779296', 1582654300, 1582654302),
(1, 1, 40, 'This is a payment of $40, for 2kgs of Hoffman Fertilizers sold by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395070/onlinepayments@ttcs.co.zw/-/263773433318', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=14c93e75-fe63-4207-892a-e8d853175a0f', '000000', 'status', '263773433318', 1495089164, 1495089164),
(2, 1, 40, 'This is a payment of $40, for 2kgs of Hoffman Fertilizers sold by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395071/onlinepayments@ttcs.co.zw/-/263773433318', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=616ccf7c-1294-443d-9656-0bb07dd53744', '000000', 'status', '263773433318', 1495089173, 1495089174),
(3, 1, 40, 'This is a payment of $40, for 2kgs of Hoffman Fertilizers sold by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395072/onlinepayments@ttcs.co.zw/-/263773433318', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=ad33e39d-566b-4cca-bc70-b2a2be1d73e6', '000000', 'status', '263773433318', 1495089204, 1495089204),
(4, 2, 200, 'This is a payment of $200, for 10kgs of Hoffman Fertilizers sold by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395077/onlinepayments@ttcs.co.zw/-/263717779296', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=6f4eb1af-8b42-4954-9f90-05f7204e7a3c', '000000', 'status', '263717779296', 1495089388, 1495089388),
(5, 3, 500, 'This is a payment of $500, for 25kgs of Hoffman Fertilizers sold by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395078/onlinepayments@ttcs.co.zw/-/263773433318', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=ef7f9278-07e5-439d-9226-b2630b16dfd2', '000000', 'status', '263773433318', 1495089389, 1495089392),
(6, 4, 20, 'This is a payment of $20, for 1kgs of Hoffman Fertilizers sold by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395085/onlinepayments@ttcs.co.zw/-/263717779296', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=4f81ae5e-a74a-46b1-a166-c313f05a00ef', '395085', 'status', '263717779296', 1495089490, 1495089508),
(7, 5, 100, 'This is a payment of $100, for 5kgs of Hoffman Fertilizers sold by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395087/onlinepayments@ttcs.co.zw/-/263773433318', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=014c2964-2318-49a4-a6ed-0b8dfda96d92', '000000', 'status', '263773433318', 1495089744, 1495089744),
(8, 6, 20, 'This is a payment of $20, for 1kgs of Hoffman Fertilizers sold by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395089/onlinepayments@ttcs.co.zw/-/263717779296', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=56ff1604-29d6-403c-b75f-3b5a5b26cd0c', '395089', 'status', '263717779296', 1495089810, 1495089820),
(9, 7, 200, 'This is a payment of $200, for 10kgs of Hoffman Fertilizers sold by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395093/onlinepayments@ttcs.co.zw/-/263717779296', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=bd5a7674-5cd6-4a88-b367-5797c72c3d88', '395093', 'status', '263717779296', 1495090004, 1495090020),
(10, 8, 60, 'This is a payment of $60, for 3kgs of Hoffman Fertilizers sold by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395104/onlinepayments@ttcs.co.zw/-/263773433318', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1ced36b6-7764-4a25-8dfc-4782ca0cf343', '395104', 'status', '263773433318', 1495090425, 1495090452),
(11, 9, 1250, 'This is a payment of $1250, for 50kgs of ZimSuperSeeds ZM401 10kg sold by Panashe KazondaThe mobile number the payment information will be sent to is 263772000000', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/902279/onlinepayments@ttcs.co.zw/-/263772000000', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=19f84fcf-381c-4dbc-877e-edaa3f339a6d', '902279', 'status', '263772000000', 1518083717, 1518083717),
(12, 10, 3, 'This is a payment of $3, for 2kgs of Bonide sold by Alvin VafanaThe mobile number the payment information will be sent to is 263772465888', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/1383857/onlinepayments@ttcs.co.zw/-/263772465888', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=cec424f9-0325-47b2-a2ef-596b06fae631', '1383857', 'status', '263772465888', 1532676284, 1532676320);

-- --------------------------------------------------------

--
-- Table structure for table `roles_structures`
--

CREATE TABLE `roles_structures` (
  `role_id` int(11) NOT NULL,
  `structure_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `runningtables`
--

CREATE TABLE `runningtables` (
  `id` int(11) UNSIGNED NOT NULL,
  `value` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `productoffer_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `productoffer_id`, `bid_id`, `status`, `amount`, `created_at`, `updated_at`) VALUES
(0, 26, 54, 'open', 1000, 1582654148, 1582654148),
(1, 1, 30, 'open', 4, 1449644401, 1449644401),
(2, 3, 32, 'open', 5, 1449657098, 1449657098),
(3, 3, 33, 'open', 5, 1449657151, 1449657151),
(4, 3, 34, 'open', 5, 1449657460, 1449657460),
(5, 1, 35, 'open', 40, 1449664359, 1449664359),
(6, 1, 36, 'open', 40, 1449672567, 1449672567),
(7, 3, 37, 'open', 25, 1449687260, 1449687260),
(8, 3, 38, 'open', 25, 1449729077, 1449729077),
(9, 1, 39, 'open', 80, 1449738960, 1449738960),
(10, 0, 40, 'open', 4, 1449743565, 1451999740),
(11, 2, 41, 'open', 40, 1449748826, 1449748826),
(12, 0, 42, 'completed', 4, 1449752939, 1451999740),
(13, 0, 43, 'completed', 4, 1449753814, 1451999740),
(14, 1, 44, 'completed', 40, 1449826800, 1449827024),
(15, 0, 45, 'open', 7.6000000000000005, 1450170102, 1451999740),
(16, 0, 46, 'open', 7.6000000000000005, 1450170142, 1451999740),
(17, 0, 47, 'completed', 6.08, 1450170154, 1451999741),
(18, 1, 48, 'completed', 80, 1450679805, 1450679901),
(19, 8, 49, 'completed', 20, 1452177006, 1452177413),
(20, 8, 50, 'open', 10, 1454922716, 1454922716),
(21, 8, 51, 'open', 10, 1454922751, 1454922751),
(22, 8, 52, 'completed', 15, 1454922771, 1455775742),
(23, 2, 53, 'completed', 60, 1455171905, 1455174606),
(24, 8, 54, 'completed', 25, 1455199463, 1455199515),
(25, 11, 55, 'completed', 20, 1455529575, 1455783169),
(26, 11, 56, 'open', 20, 1455529945, 1455529945),
(27, 8, 57, 'open', 20, 1455537016, 1455537016),
(28, 12, 58, 'completed', 20, 1455537856, 1455537905),
(29, 2, 59, 'completed', 40, 1455630544, 1457506787),
(30, 12, 60, 'completed', 20, 1455692384, 1457507220),
(31, 12, 61, 'open', 20, 1455701035, 1455701035),
(32, 2, 62, 'completed', 80, 1455701988, 1457529990),
(33, 13, 63, 'open', 40, 1455702348, 1455702348),
(34, 13, 64, 'completed', 80, 1455702489, 1457599122),
(35, 2, 65, 'completed', 60, 1455702691, 1457689273),
(36, 13, 66, 'open', 40, 1455703643, 1455703643),
(37, 13, 67, 'completed', 40, 1455705483, 1455705564),
(38, 15, 68, 'completed', 200, 1455705957, 1455706017),
(39, 7, 69, 'completed', 5400, 1455730850, 1455730934),
(40, 18, 70, 'open', 43.75, 1455774507, 1455774507),
(41, 7, 71, 'completed', 5400, 1455776934, 1455776973),
(42, 15, 72, 'completed', 600, 1455783908, 1455783977),
(43, 15, 73, 'completed', 40, 1457506145, 1471508053),
(44, 6, 74, 'completed', 100, 1458297503, 1458297550),
(45, 6, 75, 'completed', 100, 1458303861, 1458303910),
(46, 1, 76, 'completed', 60, 1459504865, 1471513237),
(47, 1, 77, 'completed', 80, 1463732699, 1471524955),
(48, 1, 78, 'open', 100, 1463739988, 1463739988),
(49, 3, 79, 'open', 125, 1463740609, 1463740609),
(50, 8, 80, 'open', 10, 1463748423, 1463748423),
(51, 1, 81, 'open', 152, 1464961736, 1464961736),
(52, 1, 82, 'open', 40, 1465199211, 1465199211),
(53, 3, 83, 'open', 25, 1465476308, 1465476308),
(54, 3, 84, 'open', 25, 1466070048, 1466070048),
(55, 3, 85, 'open', 25, 1466500632, 1466500632),
(56, 1, 86, 'completed', 72, 1466511102, 1466511181),
(57, 1, 87, 'completed', 88, 1466589229, 1466589326),
(58, 27, 88, 'completed', 25, 1466690390, 1466690433),
(59, 27, 89, 'completed', 500, 1466691566, 1466691625),
(60, 27, 90, 'completed', 100, 1466764403, 1466764439),
(61, 29, 91, 'completed', 625, 1466765212, 1466765251),
(62, 20, 92, 'open', 100, 1467796951, 1467796951),
(63, 29, 93, 'open', 600, 1467802392, 1467802392),
(64, 27, 94, 'open', 50, 1467874313, 1467874313),
(65, 27, 95, 'open', 62.5, 1467876752, 1467876752),
(66, 30, 96, 'open', 31.25, 1467886750, 1467886750),
(67, 30, 97, 'open', 12.5, 1467899811, 1467899811),
(68, 29, 98, 'open', 600, 1467959362, 1467959362),
(69, 27, 99, 'open', 250, 1468574764, 1468574764),
(70, 30, 100, 'open', 25, 1468824543, 1468824543),
(71, 30, 101, 'open', 12.5, 1468839679, 1468839679),
(72, 27, 102, 'open', 100, 1468839984, 1468839984),
(73, 30, 103, 'open', 6.25, 1468911995, 1468911995),
(74, 27, 104, 'completed', 25, 1468913470, 1468913527),
(75, 30, 105, 'completed', 25, 1468928889, 1468928919),
(76, 6, 106, 'completed', 100, 1468934459, 1468934525),
(77, 30, 107, 'completed', 6.25, 1468945951, 1468946013),
(78, 30, 108, 'completed', 18.75, 1469000247, 1469000338),
(79, 25, 109, 'completed', 5, 1469025133, 1469025181),
(80, 14, 110, 'open', 2.5, 1469210976, 1469210976),
(81, 30, 111, 'completed', 25, 1470572362, 1470572417),
(82, 30, 112, 'completed', 25, 1470658135, 1470658300),
(83, 30, 113, 'completed', 25, 1470738361, 1470738596),
(84, 29, 114, 'open', 480, 1470738652, 1470738652),
(85, 30, 115, 'completed', 25, 1470739251, 1470739364),
(86, 27, 116, 'open', 25, 1470741962, 1470741962),
(87, 29, 117, 'open', 480, 1470742162, 1470742162),
(88, 27, 118, 'open', 50, 1470745442, 1470745442),
(89, 27, 119, 'open', 50, 1470749587, 1470749587),
(90, 27, 120, 'open', 25, 1470813594, 1470813594),
(91, 27, 121, 'open', 37.5, 1470814058, 1470814058),
(92, 27, 122, 'open', 25, 1470817825, 1470817825),
(93, 27, 123, 'open', 37.5, 1470818682, 1470818682),
(94, 30, 124, 'open', 12.5, 1470820275, 1470820275),
(95, 30, 125, 'completed', 5000, 1470822733, 1470822750),
(96, 29, 126, 'open', 480, 1470825285, 1470825285),
(97, 30, 127, 'completed', 125, 1470830343, 1470830356),
(98, 30, 128, 'open', 199.8, 1470836466, 1470836466),
(99, 30, 129, 'open', 199.8, 1470836545, 1470836545),
(100, 30, 130, 'open', 199.8, 1470837500, 1470837500),
(101, 30, 131, 'open', 199.8, 1470837810, 1470837810),
(102, 29, 132, 'open', 480, 1470838072, 1470838072),
(103, 30, 133, 'open', 399.6, 1470838567, 1470838567),
(104, 30, 134, 'open', 399.6, 1470839493, 1470839493),
(105, 30, 135, 'open', 599.4, 1470839620, 1470839620),
(106, 30, 136, 'open', 599.4, 1470840096, 1470840096),
(107, 28, 137, 'open', 10, 1471419162, 1471419162),
(108, 19, 138, 'open', 480, 1471419821, 1471419821),
(109, 28, 139, 'open', 1000, 1471420031, 1471420031),
(110, 28, 140, 'completed', 50, 1471426583, 1471426625),
(111, 30, 141, 'completed', 999, 1471442023, 1471442052),
(112, 18, 142, 'completed', 350, 1471508146, 1471508171),
(113, 32, 143, 'completed', 5.75, 1471514470, 1471514493),
(114, 33, 144, 'completed', 60, 1471523418, 1471523447),
(115, 35, 145, 'completed', 500, 1471526209, 1471526236),
(116, 6, 10, 'completed', 1250, 1475478863, 1475478935),
(117, 11, 11, 'completed', 80, 1476189501, 1476189539),
(118, 7, 12, 'open', 180000, 1476344962, 1476344962),
(119, 14, 13, 'open', 5000, 1476952853, 1476952853),
(120, 8, 14, 'open', 200, 1477653045, 1477653045),
(121, 12, 15, 'completed', 100, 1477897878, 1477898062),
(122, 11, 16, 'completed', 80, 1477898013, 1477898072),
(123, 11, 17, 'completed', 100, 1477899310, 1477899350),
(124, 20, 18, 'open', 1, 1484290918, 1484290918),
(125, 20, 19, 'open', 5, 1484293602, 1484293602),
(126, 20, 20, 'completed', 5, 1484293882, 1484294082),
(127, 20, 21, 'open', 5, 1484315692, 1484315692),
(128, 15, 22, 'completed', 10, 1484547973, 1484548050),
(129, 22, 23, 'completed', 32, 1493720438, 1493720468),
(130, 22, 24, 'open', 16, 1494832017, 1494832017),
(131, 22, 25, 'open', 16, 1495089445, 1495089445),
(132, 15, 26, 'completed', 500, 1495089446, 1495089471),
(133, 20, 27, 'completed', 4, 1495199219, 1495199258),
(134, 15, 28, 'completed', 15, 1495621457, 1495621478),
(135, 15, 29, 'completed', 100, 1498724154, 1498724187),
(136, 12, 30, 'completed', 360, 1499077760, 1499077779),
(137, 12, 31, 'completed', 150, 1499239937, 1499240037),
(138, 11, 32, 'completed', 40, 1499948249, 1499948279),
(139, 11, 33, 'completed', 60, 1499951839, 1499951874),
(140, 12, 34, 'completed', 25, 1500450233, 1500450285),
(141, 22, 35, 'completed', 96, 1500880444, 1500880468),
(142, 22, 36, 'completed', 8, 1501744003, 1501744102),
(143, 22, 37, 'completed', 16, 1501767755, 1501767865),
(144, 22, 38, 'completed', 16, 1501833601, 1501833661),
(145, 22, 39, 'completed', 16, 1502132774, 1502132800),
(146, 21, 40, 'completed', 500, 1502178578, 1502178597),
(147, 22, 41, 'completed', 16, 1502183220, 1502183301),
(148, 22, 42, 'completed', 8, 1502197872, 1502197955),
(149, 7, 43, 'open', 8100, 1502285979, 1502285979),
(150, 22, 44, 'completed', 40, 1502878239, 1502878457),
(151, 22, 45, 'completed', 80, 1504514695, 1504514752),
(152, 22, 46, 'open', 80, 1517922458, 1517922458),
(153, 24, 47, 'open', 100, 1518083193, 1518083193),
(154, 24, 48, 'open', 120, 1518527411, 1518527411),
(155, 23, 49, 'open', 10, 1518594066, 1518594066),
(156, 24, 50, 'open', 100, 1518612804, 1518612804),
(157, 26, 51, 'completed', 20, 1532502351, 1532502389),
(158, 22, 52, 'completed', 8, 1532502543, 1532502558),
(159, 26, 53, 'open', 1000, 1535967003, 1535967003);

-- --------------------------------------------------------

--
-- Table structure for table `sap_bps`
--

CREATE TABLE `sap_bps` (
  `id` int(11) UNSIGNED NOT NULL,
  `bp_num` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `housenumber` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sap_bps`
--

INSERT INTO `sap_bps` (`id`, `bp_num`, `firstname`, `lastname`, `street`, `housenumber`, `city`, `region`, `created_at`, `updated_at`) VALUES
(1, '0100000080', 'Peter', 'Bhebhe', 'Glenlorne, Drive', '7', 'Harare', 'HRE', 1522233700, 1522233700),
(2, '0100000081', 'Harry', 'Zulu', 'Kenilworth Road', '6', 'Harare', 'HRE', 1522233829, 1522233829),
(4, '0100000091', 'Maria', 'Mpisi', 'Hlubela, Street Luveve', '678', 'Bulawayo', 'BYO', 1522847981, 1522847981),
(5, '0100000092', 'Abdulla', 'Mahommed', 'Kennedy Drive, Greendale', '53', 'Harare', 'HRE', 1522848921, 1522848921);

-- --------------------------------------------------------

--
-- Table structure for table `seasonfarmings`
--

CREATE TABLE `seasonfarmings` (
  `id` int(11) UNSIGNED NOT NULL,
  `contract_id` int(11) NOT NULL,
  `expectedyield` varchar(255) NOT NULL,
  `actualyield` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seasonfarmings`
--

INSERT INTO `seasonfarmings` (`id`, `contract_id`, `expectedyield`, `actualyield`, `created_at`, `updated_at`) VALUES
(1, 12, '2645', '0.0', 1469177961, 1469177961),
(2, 6, '2645', '0.0', 1469180476, 1469180476),
(3, 7, '2645', '0.0', 1469180592, 1469180592),
(4, 8, '2645', '0.0', 1469180639, 1469180639),
(5, 9, '2645', '0.0', 1469180743, 1469180743),
(6, 10, '2645', '0.0', 1469180787, 1469180787),
(7, 18, '26450', '0.0', 1469518013, 1469518013),
(8, 19, '6050', '0.0', 1469518119, 1469518119),
(9, 20, '50000', '0.0', 1469524953, 1469524953),
(10, 21, '6050', '0.0', 1469525804, 1469525804),
(11, 22, '50000', '0.0', 1469540985, 1469540985),
(12, 23, '200000', '0.0', 1470058602, 1470058602),
(13, 24, '26450', '0.0', 1470987048, 1470987048),
(14, 25, '1250000', '0.0', 1471254176, 1471254176),
(15, 26, '125000', '0.0', 1471429006, 1471429006),
(16, 27, '5000000', '0.0', 1471442907, 1471442907),
(17, 28, '1250000', '0.0', 1471513817, 1471513817),
(18, 29, '1250000', '0.0', 1471525374, 1471525374),
(19, 30, '1250000', '0.0', 1472033519, 1472033519),
(20, 31, '5000000', '0.0', 1472564255, 1472564255),
(21, 32, '125000', '0.0', 1473934392, 1473934392),
(22, 33, '5000000', '0.0', 1474373262, 1474373262),
(23, 34, '20000000', '0.0', 1474377928, 1474377928),
(24, 35, '1250000', '0.0', 1474622918, 1474622918),
(25, 36, '50000', '0.0', 1477899727, 1477899727),
(26, 37, '5000000', '0.0', 1480321787, 1480321787),
(27, 38, '5000000', '0.0', 1480335237, 1480335237),
(28, 39, '125000000', '0.0', 1480578977, 1480578977),
(29, 40, '12500000', '0.0', 1480595735, 1480595735),
(30, 41, '800000', '0.0', 1480941200, 1480941200),
(31, 42, '5000000', '0.0', 1481532674, 1481532674),
(32, 43, '125000', '0.0', 1481536041, 1481536041),
(33, 44, '125000', '0.0', 1483440717, 1483440717),
(34, 45, '8000', '0.0', 1483521646, 1483521646),
(35, 1, '125000', '0.0', 1483522849, 1483522849),
(36, 1, '125000', '0.0', 1483534617, 1483534617),
(37, 2, '12500', '0.0', 1484054161, 1484054161),
(38, 3, '4500', '0.0', 1484054560, 1484054560),
(39, 4, '1250000', '0.0', 1484299456, 1484299456),
(40, 5, '1250000', '0.0', 1484299759, 1484299759),
(41, 6, '1250000', '0.0', 1484299828, 1484299828),
(42, 7, '1250000', '0.0', 1484299837, 1484299837),
(43, 8, '1250000', '0.0', 1484299929, 1484299929),
(44, 9, '0', '0.0', 1484300899, 1484300899),
(45, 10, '0', '0.0', 1484301036, 1484301036),
(46, 11, '0', '0.0', 1484572040, 1484572040),
(47, 12, '0', '0.0', 1484832633, 1484832633),
(48, 13, '0', '0.0', 1484904846, 1484904846),
(49, 14, '0', '0.0', 1487754386, 1487754386),
(50, 15, '0', '0.0', 1487755113, 1487755113),
(51, 16, '0', '0.0', 1487924752, 1487924752),
(52, 17, '0', '0.0', 1490018071, 1490018071),
(53, 18, '0', '0.0', 1493378208, 1493378208),
(54, 19, '0', '0.0', 1493386330, 1493386330),
(55, 20, '0', '0.0', 1493662081, 1493662081),
(56, 21, '0', '0.0', 1498723376, 1498723376),
(57, 22, '0', '0.0', 1498729577, 1498729577),
(58, 23, '0', '0.0', 1498750859, 1498750859),
(59, 24, '0', '0.0', 1498751133, 1498751133),
(60, 25, '0', '0.0', 1499240932, 1499240932),
(61, 26, '0', '0.0', 1500450707, 1500450707),
(62, 27, '0', '0.0', 1500633770, 1500633770),
(63, 28, '0', '0.0', 1500639742, 1500639742),
(64, 29, '0', '0.0', 1500640362, 1500640362),
(65, 30, '0', '0.0', 1500640558, 1500640558),
(66, 31, '0', '0.0', 1500879759, 1500879759),
(67, 32, '0', '0.0', 1500880697, 1500880697),
(68, 33, '0', '0.0', 1500887357, 1500887357),
(69, 34, '0', '0.0', 1500888562, 1500888562),
(70, 35, '0', '0.0', 1500888955, 1500888955),
(71, 36, '0', '0.0', 1500992696, 1500992696),
(72, 37, '0', '0.0', 1501682704, 1501682704),
(73, 38, '0', '0.0', 1501744475, 1501744475),
(74, 39, '0', '0.0', 1501768408, 1501768408),
(75, 40, '0', '0.0', 1501831774, 1501831774),
(76, 41, '0', '0.0', 1501834624, 1501834624),
(77, 42, '0', '0.0', 1501845758, 1501845758),
(78, 43, '0', '0.0', 1501854686, 1501854686),
(79, 44, '0', '0.0', 1502129054, 1502129054),
(80, 45, '0', '0.0', 1502130971, 1502130971),
(81, 46, '0', '0.0', 1502178799, 1502178799),
(82, 47, '0', '0.0', 1502183542, 1502183542),
(83, 48, '0', '0.0', 1502268652, 1502268652),
(84, 49, '0', '0.0', 1502880638, 1502880638),
(85, 50, '0', '0.0', 1504517392, 1504517392),
(86, 51, '0', '0.0', 1517995547, 1517995547),
(87, 52, '0', '0.0', 1518082646, 1518082646),
(88, 53, '0', '0.0', 1518082673, 1518082673),
(89, 54, '0', '0.0', 1518096392, 1518096392),
(90, 55, '0', '0.0', 1518414955, 1518414955),
(91, 56, '0', '0.0', 1518506730, 1518506730),
(92, 57, '0', '0.0', 1518519792, 1518519792),
(93, 58, '0', '0.0', 1518526797, 1518526797),
(94, 59, '0', '0.0', 1518592316, 1518592316),
(95, 60, '0', '0.0', 1518612410, 1518612410);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Winter', 1468417328, 1468417328),
(2, 'Summer', 1468417337, 1468417337);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipients` text NOT NULL,
  `body` text NOT NULL,
  `sending_number` varchar(255) NOT NULL,
  `message_id` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `username`, `sender_id`, `recipients`, `body`, `sending_number`, `message_id`, `created_at`, `updated_at`) VALUES
(71, 'ttcsremote6', 10, '263775009236', 'A payment of US100.00 has been made into your account by Nyasha Chikwanda For 20 Kilogram of Lemons', 'txt.co.zw', ' 207697', 1458303912, 1458303912),
(72, 'ttcsremote6', 2, '263710000001', 'A payment of US72.00 has been made into your account by Svodesai Sithole For 18 Kilogram of Grapes', 'txt.co.zw', ' 284068', 1466511183, 1466511183),
(73, 'ttcsremote6', 2, '263710000001', 'A payment of US88.00 has been made into your account by Svodesai Sithole For 22 Kilogram of Grapes', 'txt.co.zw', ' 284897', 1466589332, 1466589332),
(74, 'ttcsremote6', 2, '263774100200', 'A payment of US25.00 has been made into your account by Svodesai Sithole For 10 Kilogram of Apples', 'txt.co.zw', ' 286278', 1466690435, 1466690435),
(75, 'ttcsremote6', 29, '263774100200', 'A payment of US500.00 has been made into your account by Nyasha Chikwanda For 200 Kilogram of Apples', 'txt.co.zw', ' 286307', 1466691626, 1466691626),
(76, 'ttcsremote6', 2, '263774100200', 'A payment of US100.00 has been made into your account by Svodesai Sithole For 40 Kilogram of Apples', 'txt.co.zw', ' 286948', 1466764440, 1466764440),
(77, 'ttcsremote6', 2, '263773266499', 'A payment of US625.00 has been made into your account by Svodesai Sithole For 25 Kilogram of Apples', 'txt.co.zw', ' 286963', 1466765252, 1466765252),
(78, 'ttcsremote6', 29, '263774100200', 'A payment of US25.00 has been made into your account by Nyasha Chikwanda For 10 Kilogram of Apples', 'txt.co.zw', ' 306881', 1468913528, 1468913528),
(79, 'ttcsremote6', 2, '263772287875', 'A payment of US25.00 has been made into your account by Svodesai Sithole For 20 Kilogram of Apples', 'txt.co.zw', ' 307281', 1468928920, 1468928920),
(80, 'ttcsremote6', 29, '263717779296', 'A payment of US100.00 has been made into your account by Nyasha Chikwanda For 20 Kilogram of Lemons', 'txt.co.zw', ' 307429', 1468934526, 1468934526),
(81, 'ttcsremote6', 29, '263772287875', 'A payment of US6.25 has been made into your account by Nyasha Chikwanda For 5 Kilogram of Apples', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.220.24.106\'', 1468946014, 1468946014),
(82, 'ttcsremote6', 29, '263772287875', 'A payment of US18.75 has been made into your account by Nyasha Chikwanda For 15 Kilogram of Apples', 'txt.co.zw', ' 308025', 1469000339, 1469000339),
(83, 'ttcsremote6', 29, '263717779296', 'A payment of US5.00 has been made into your account by Nyasha Chikwanda For 10 Kilogram of Apples', 'txt.co.zw', ' 308656', 1469025182, 1469025182),
(84, 'ttcsremote6', 2, '263772287875', 'A payment of US25.00 has been made into your account by Svodesai Sithole For 20 Kilogram of Apples', 'txt.co.zw', ' 323751', 1470572417, 1470572417),
(85, 'ttcsremote6', 2, '263772287875', 'A payment of US25.00 has been made into your account by Svodesai Sithole For 20 Kilogram of Apples', 'txt.co.zw', ' 324198', 1470658301, 1470658301),
(86, 'ttcsremote6', 2, '263772287875', 'A payment of US25.00 has been made into your account by Svodesai Sithole For 20 Kilogram of Apples', 'txt.co.zw', ' 324730', 1470738603, 1470738603),
(87, 'ttcsremote6', 2, '263772287875', 'A payment of US25.00 has been made into your account by Svodesai Sithole For 20 Kilogram of Apples', 'txt.co.zw', ' 324740', 1470739365, 1470739365),
(88, 'ttcsremote6', 2, '263772287875', 'A payment of US5000.00 has been made into your account by Svodesai Sithole For 4000 Kilogram of Apples', 'txt.co.zw', ' 325462', 1470822751, 1470822751),
(89, 'ttcsremote6', 2, '263772287875', 'A payment of US125.00 has been made into your account by Svodesai Sithole For 100 Kilogram of Apples', 'txt.co.zw', ' 325663', 1470830357, 1470830357),
(90, 'ttcsremote6', 29, '263772271681', 'A payment of US50.00 has been made into your account by Nyasha Chikwanda For 100 Kilogram of Mazhanje', 'txt.co.zw', ' 330309', 1471426631, 1471426631),
(91, 'ttcsremote6', 29, '263772287875', 'A payment of US999.00 has been made into your account by Nyasha Chikwanda For 100 Kilogram of Apples', 'txt.co.zw', ' 330779', 1471442053, 1471442053),
(92, 'ttcsremote6', 38, '263717779296', 'A payment of US20.00 has been made into your account by Marjorie Napata For 60 Kilogram of Avocado Pears', 'txt.co.zw', ' 331447', 1471506398, 1471506398),
(93, 'ttcsremote6', 38, '263710000001', 'A payment of US20.00 has been made into your account by Marjorie Napata For 300 Kilogram of Maize Fresh', 'txt.co.zw', ' 331451', 1471506485, 1471506485),
(94, 'ttcsremote6', 29, '263710000001', 'A payment of US20.00 has been made into your account by Nyasha Chikwanda For 20 Kilogram of Maize Fresh', 'txt.co.zw', ' 331488', 1471508054, 1471508054),
(95, 'ttcsremote6', 29, '263717779296', 'A payment of US350.00 has been made into your account by Nyasha Chikwanda For 100 Kilogram of Lemons', 'txt.co.zw', ' 331489', 1471508175, 1471508175),
(96, 'ttcsremote6', 40, '263717779296', 'A payment of US20.00 has been made into your account by Eugene Muzvidziwa For 20 Kilogram of Lemons', 'txt.co.zw', ' 331509', 1471509316, 1471509316),
(97, 'ttcsremote6', 40, '263710000001', 'A payment of US20.00 has been made into your account by Eugene Muzvidziwa For 15 Kilogram of Grapes', 'txt.co.zw', ' 331582', 1471513241, 1471513241),
(98, 'ttcsremote6', 40, '263717779296', 'A payment of US5.75 has been made into your account by Eugene Muzvidziwa For 25 Kilogram of Apples', 'txt.co.zw', ' 331620', 1471514494, 1471514494),
(99, 'ttcsremote6', 38, '263773266499', 'A payment of US60.00 has been made into your account by Marjorie Napata For 20 Kilogram of Pineapple', 'txt.co.zw', ' 331859', 1471523448, 1471523448),
(100, 'ttcsremote6', 41, '263710000001', 'A payment of US20.00 has been made into your account by Diamond Chirisa For 20 Kilogram of Grapes', 'txt.co.zw', ' 331890', 1471524956, 1471524956),
(101, 'ttcsremote6', 29, '263773437387', 'A payment of US500.00 has been made into your account by Nyasha Chikwanda For 100 Kilogram of Mazhanje', 'txt.co.zw', ' 331923', 1471526238, 1471526238),
(102, 'ttcsremote6', 2, '263773430312,263710000001', 'test', '263717779296', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.33.61\'', 1472612633, 1472612635),
(103, 'ttcsremote6', 2, '263773430312,263710000001', 'test', '263717779296', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.220.24.109\'', 1472622470, 1472622473),
(104, 'ttcsremote6', 29, '263717779296', 'A payment of US1250.00 has been made into your account by Nyasha Chikwanda For 250 Kilogram of Lemons', 'txt.co.zw', ' 372774', 1475478937, 1475478937),
(105, 'ttcsremote6', 29, '263717779296', 'A payment of US80.00 has been made into your account by Nyasha Chikwanda For 40 Kilogram of Grapes', 'txt.co.zw', ' 381357', 1476189544, 1476189544),
(106, 'ttcsremote6', 29, '263710000001', 'A payment of US100.00 has been made into your account by Nyasha Chikwanda For 100 Kilogram of Peaches', 'txt.co.zw', ' 398996', 1477898063, 1477898063),
(107, 'ttcsremote6', 29, '263717779296', 'A payment of US80.00 has been made into your account by Nyasha Chikwanda For 40 Kilogram of Grapes', 'txt.co.zw', ' 398997', 1477898073, 1477898073),
(108, 'ttcsremote6', 29, '263717779296', 'A payment of US100.00 has been made into your account by Nyasha Chikwanda For 50 Kilogram of Grapes', 'txt.co.zw', ' 399032', 1477899354, 1477899354),
(109, 'ttcsremote6', 47, '263717779296', 'A payment of US5.00 has been made into your account by Alvin2 Vafana For 25 Kilogram of Maize Fresh', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.220.24.108\'', 1484294085, 1484294085),
(110, 'ttcsremote6', 2, '263710000001', 'A payment of US10.00 has been made into your account by Svodesai Sithole For 20 Kilogram of Mazhanje', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.220.24.108\'', 1484548051, 1484548051),
(111, 'ttcsremote6', 32, '263773266499', 'A payment of US32.00 has been made into your account by Cephas Magava For 40 Kilogram of Apples', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1493720469, 1493720469),
(112, 'ttcsremote6', 2, '263710000001', 'A payment of US500.00 has been made into your account by Svodesai Sithole For 1000 Kilogram of Mazhanje', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1495089472, 1495089472),
(113, 'ttcsremote6', 2, '263717779296', 'A payment of US20.00 has been made into your account by Svodesai Sithole For 1 Kilogram of Hoffman Fertilizers', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1495089509, 1495089509),
(114, 'ttcsremote6', 2, '263717779296', 'A payment of US20.00 has been made into your account by Svodesai Sithole For 1 Kilogram of Hoffman Fertilizers', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1495089821, 1495089821),
(115, 'ttcsremote6', 2, '263717779296', 'A payment of US20.00 has been made into your account by Svodesai Sithole For 1 Kilogram of Hoffman Fertilizers', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1495089911, 1495089911),
(116, 'ttcsremote6', 2, '263717779296', 'A payment of US20.00 has been made into your account by Svodesai Sithole For 1 Kilogram of Hoffman Fertilizers', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1495089989, 1495089989),
(117, 'ttcsremote6', 2, '263717779296', 'A payment of US200.00 has been made into your account by Svodesai Sithole For 10 Kilogram of Hoffman Fertilizers', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1495090021, 1495090021),
(118, 'ttcsremote6', 47, '263773433318', 'A payment of US60.00 has been made into your account by Alvin2 Vafana For 3 Kilogram of Hoffman Fertilizers', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1495090452, 1495090452),
(119, 'ttcsremote6', 29, '263717779296', 'A payment of US4.00 has been made into your account by Nyasha Chikwanda For 20 Kilogram of Maize Fresh', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1495199263, 1495199263),
(120, 'ttcsremote6', 29, '263710000001', 'A payment of US15.00 has been made into your account by Nyasha Chikwanda For 30 Kilogram of Mazhanje', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1495621479, 1495621479),
(121, 'ttcsremote6', 29, '263710000001', 'A payment of US100.00 has been made into your account by Nyasha Chikwanda For 200 Kilogram of Mazhanje', 'txt.co.zw', ' Could not authenticate user \'ttcsremote6\' from I.P. address \'41.60.203.125\'', 1498724188, 1498724188),
(122, 'ttcsremote6', 29, '263710000001', 'A payment of US360.00 has been made into your account by Nyasha Chikwanda For 360 Kilogram of Peaches', 'txt.co.zw', '', 1499077779, 1499077779),
(123, 'ttcsremote6', 2, '263710000001', 'A payment of US150.00 has been made into your account by Schweppes Pvt (Ltd) For 150 Kilogram of Peaches', 'txt.co.zw', '', 1499240037, 1499240037),
(124, 'ttcsremote6', 29, '263717779296', 'A payment of US40.00 has been made into your account by Nyasha Chikwanda For 20 Kilogram of Grapes', 'txt.co.zw', '', 1499948280, 1499948280),
(125, 'ttcsremote6', 29, '263717779296', 'A payment of US60.00 has been made into your account by Nyasha Chikwanda For 30 Kilogram of Grapes', 'txt.co.zw', '', 1499951875, 1499951875),
(126, 'ttcsremote6', 29, '263710000001', 'A payment of US25.00 has been made into your account by Nyasha Chikwanda For 25 Kilogram of Peaches', 'txt.co.zw', '', 1500450286, 1500450286),
(127, 'ttcsremote6', 2, '263773266499', 'A payment of US96.00 has been made into your account by Svodesai Sithole For 120 Kilogram of Apples', 'txt.co.zw', '', 1500880469, 1500880469),
(128, 'ttcsremote6', 2, '263773266499', 'A payment of US8.00 has been made into your account by Svodesai Sithole For 10 Kilogram of Apples', 'txt.co.zw', '', 1501744103, 1501744103),
(129, 'ttcsremote6', 2, '263773266499', 'A payment of US16.00 has been made into your account by Svodesai Sithole For 20 Kilogram of Apples', 'txt.co.zw', '', 1501767866, 1501767866),
(130, 'ttcsremote6', 2, '263773266499', 'A payment of US16.00 has been made into your account by Svodesai Sithole For 20 Kilogram of Apples', 'txt.co.zw', '', 1501833672, 1501833672),
(131, 'ttcsremote6', 2, '263773266499', 'A payment of US16.00 has been made into your account by Svodesai Sithole For 20 Kilogram of Apples', 'txt.co.zw', '', 1502132802, 1502132802),
(132, 'ttcsremote6', 2, '263772887738', 'A payment of US500.00 has been made into your account by Svodesai Sithole For 1 Kilogram of Tomatoes', 'txt.co.zw', '', 1502178598, 1502178598),
(133, 'ttcsremote6', 2, '263773266499', 'A payment of US16.00 has been made into your account by Svodesai Sithole For 20 Kilogram of Apples', 'txt.co.zw', '', 1502183301, 1502183301),
(134, 'ttcsremote6', 2, '263773266499', 'A payment of US8.00 has been made into your account by Svodesai Sithole For 10 Kilogram of Apples', 'txt.co.zw', '', 1502197956, 1502197956),
(135, 'ttcsremote6', 2, '263773266499', 'A payment of US40.00 has been made into your account by Svodesai Sithole For 50 Kilogram of Apples', 'txt.co.zw', '', 1502878458, 1502878458),
(136, 'ttcsremote6', 24, '263773266499', 'A payment of US80.00 has been made into your account by Tatenda  Vafana For 100 Kilogram of Maize', 'txt.co.zw', '', 1504514753, 1504514753),
(137, 'ttcsremote6', 5, '263773132288', 'A payment of US20.00 has been made into your account by Alvin Vafana For 20 Kilogram of Maize', 'txt.co.zw', '', 1532502526, 1532502526),
(138, 'ttcsremote6', 5, '263773266499', 'A payment of US8.00 has been made into your account by Alvin Vafana For 10 Kilogram of Maize', 'txt.co.zw', '', 1532502558, 1532502558),
(139, 'ttcsremote6', 5, '263772465888', 'A payment of US3.00 has been made into your account by Alvin Vafana For 2 Kilogram of Bonide', 'txt.co.zw', '', 1532676321, 1532676321);

-- --------------------------------------------------------

--
-- Table structure for table `soapplications`
--

CREATE TABLE `soapplications` (
  `id` int(11) UNSIGNED NOT NULL,
  `farmer` varchar(255) NOT NULL,
  `contractname` varchar(255) NOT NULL,
  `stoporderno` varchar(255) NOT NULL,
  `farmerid` varchar(255) NOT NULL,
  `contractno` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `soiltypes`
--

CREATE TABLE `soiltypes` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soiltypes`
--

INSERT INTO `soiltypes` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Vertisol-Very acidic clay', 'Predominantly 2:1 montmorillonitic\r\nclay, slickensides.', 1477899923, 1477900981),
(6, 'Siallitic-Active clay', 'High amounts of both 2:1 and 1:1\r\nclay mineral.', 1477899969, 1477901142),
(7, 'Fertiallitic-mixed clay', 'Small amounts of 2:1 always present.\r\nAppreciable amounts of sesquioxides.\r\n1:1 clay minerals dominant.', 1477899996, 1485347481),
(8, 'Paraferrallitic-inert clay', 'Dominated by 1:1 clay minerals.\r\nAppreciable amounts of sesquioxides.\r\n1:1 clay minerals dominant.', 1477900022, 1477901224),
(9, 'Orthoferrallitic', 'Entirely 1:1 clay minerals and\r\nsesquioxides', 1477900073, 1477900073),
(10, 'Sodic', 'Soils have ESP>9 within 80cm of the\r\nsurface.', 1477900248, 1477900248);

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Preparation of the land', 1477904587, 1477904587),
(6, 'Sowing', 1477904631, 1477904631),
(7, 'Cleaning and other tasks', 1477904716, 1477904716),
(8, 'Harvest', 1477904730, 1477904730),
(9, 'Post-harvest', 1477904745, 1477904745),
(10, 'Planing', 1484743335, 1484743343),
(11, 'Stage 1', 1484819183, 1484819183),
(12, 'Stage 2', 1484819191, 1484819191),
(13, 'Stage 3', 1484819201, 1484819201),
(14, 'Stage 4', 1484819218, 1484819218),
(15, 'Stage 5', 1484819229, 1484819229),
(16, 'Stage 6', 1484819238, 1484819238),
(17, 'Stage 7', 1484819248, 1484819248);

-- --------------------------------------------------------

--
-- Table structure for table `stakeholder_products`
--

CREATE TABLE `stakeholder_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `additional_details` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `tradingname` varchar(250) NOT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stakeholder_products`
--

INSERT INTO `stakeholder_products` (`id`, `name`, `description`, `pic`, `additional_details`, `created_at`, `updated_at`, `tradingname`, `userid`) VALUES
(2, 'Cattle Reflactor', 'Cattle Reflactor', 'e3ff574b3a8f619b7d33230312166759.jpg', 'Cattle Reflactor', 1485161515, 1485161515, 'N Richards', 2),
(3, 'Tractor', 'Leading tractor brand that never disappoints. Give it a try and you will never look back.', 'cc9fa212a86294cf7eb87feb7386d046.jpg', 'What else can I say?', 1502199900, 1502199900, 'Massey Fergusson', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stakeholder_tradingdetails`
--

CREATE TABLE `stakeholder_tradingdetails` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `additional_details` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stakeholder_tradingdetails`
--

INSERT INTO `stakeholder_tradingdetails` (`id`, `name`, `additional_details`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'N Richards', 'Hre Branch', 1484574221, 1484574221, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stopcodes`
--

CREATE TABLE `stopcodes` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `company_code` varchar(255) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `deduction_rate` varchar(255) NOT NULL,
  `commission` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf32 DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stopcodes`
--

INSERT INTO `stopcodes` (`id`, `code`, `vendor`, `company_code`, `vendor_name`, `deduction_rate`, `commission`, `description`, `created_at`, `updated_at`) VALUES
(1, 'BG', '6001265', '1000', 'GMB HEAD OFFICE', '100.00000', '0', 'GRAIN BAGS', 0, 1540890121),
(2, 'CB', '2723302', '1000', 'CBZ S/ORDER FACILITY', '100.00000', '2', 'CBZ', 0, 0),
(3, 'CL', '6001265', '1000', 'GMB HEAD OFFICE', '2.00000', '0', 'GMB COMMISSION 2%', 0, 0),
(4, 'CM', '6001265', '1000', 'GMB HEAD OFFICE', '1.00000', '0', 'GMB COMMISSION 1%', 0, 0),
(5, 'CN', '6001265', '1000', 'GMB HEAD OFFICE', '0.50000', '0', 'GMB COMMISSION 0.5%', 0, 1540889911),
(6, 'CO', '2723298', '1000', 'COMMAND AGRICULTURE', '100.00000', '0', 'COMMAND AGRICULTURE', 0, 0),
(7, 'CS', '2798898', '1000', 'COMMAND AGRICULTURE SOYABEANS', '100.00000', '0', 'COMMAND AGRICULTURE SOYA BEANS', 0, 0),
(8, 'CW', '2772677', '1000', 'COMMAND AGRICULTURE WHEAT', '100.00000', '0', 'COMMAND AGRICULTURE WHEAT', 0, 0),
(9, 'GM', '2854491', '1000', 'GMB SMALL GRAINS INPUTS PROG', '100.00000', '0', 'GMB SMALL GRAINS INPUTS PROG', 0, 0),
(10, 'NM', '2814085', '1000', 'NMB BANK LIMITED', '100.00000', '2', 'NMB BANK', 0, 0),
(11, 'OD', '6001265', '1000', 'GMB HEAD OFFICE', '100.00000', '0', 'OVER DEDUCTIONS', 0, 0),
(12, 'OV', '6001265', '1000', 'GMB HEAD OFFICE', '100.00000', '0', 'OVERPAYMENTS RECOVERIES', 0, 0),
(13, 'QU', '2723301', '1000', 'QUEST FINANCIAL SERVICES', '100.00000', '2', 'QUEST', 0, 0),
(14, 'SC', '2814087', '1000', 'SABLE CHEMICAL', '100.00000', '2', 'SABLE CHEMICALS', 0, 0),
(15, 'ZA', '2801687', '1000', 'ZAMCO', '100.00000', '2', 'ZAMCO', 0, 0),
(16, 'ZN', '2723299', '1000', 'ZINWA S/ORDER FACILITY', '100.00000', '2', 'ZINWA', 0, 0),
(17, 'ZT', '2723300', '1000', 'ZETDC S/ORDER FACILITY', '100.00000', '3', 'ZETDC', 0, 0),
(18, 'MM', '500013', '1000', 'JOANITA NYASHANU', '12', '5', 'GRAIN BAGS', 1543387122, 1543387122),
(19, 'MM', '500007', '1000', 'SHEILA SITHOLE', '12', '4', 'GRAIN BAGS', 1544607722, 1544607722),
(20, 'CO', '500007', '1000', 'SHEILA SITHOLE', '100.00000', '0', 'COMMAND AGRICULTURE', 1544616468, 1544616468);

-- --------------------------------------------------------

--
-- Table structure for table `stoporders`
--

CREATE TABLE `stoporders` (
  `id` int(11) UNSIGNED NOT NULL,
  `company_code` varchar(255) NOT NULL,
  `stop_order_number` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `farmer_name` varchar(255) NOT NULL,
  `farmer_number` varchar(255) NOT NULL,
  `farmer_id` varchar(255) NOT NULL,
  `material_number` varchar(255) NOT NULL,
  `max_amount` double NOT NULL,
  `effective_date` date NOT NULL,
  `so_text` text NOT NULL,
  `depot` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stoporders`
--

INSERT INTO `stoporders` (`id`, `company_code`, `stop_order_number`, `code`, `farmer_name`, `farmer_number`, `farmer_id`, `material_number`, `max_amount`, `effective_date`, `so_text`, `depot`, `created_at`, `updated_at`) VALUES
(1, '1000', '        2 ', 'CO', 'ACSEND  CONCRETE', '100015', '07-774618-g-27', '01', 350, '2018-04-01', 'Tillage stop order', 'DURA', 0, 0),
(2, '1000', '       17 ', 'CS', 'Tariro Sithole', '500026', '07-774618-g-27', '03', 33333, '2018-04-01', 'sadza', 'EE05', 1542895840, 0),
(4, '1000', '       12 ', 'BG', 'Adrenalin Advertising', '100021', '07-774618-a-27', '00', 1000, '2018-04-01', 'stop1', 'DURA', 1543241706, 0),
(6, '1000', '       14 ', 'CM', 'Joanita Nyashanu', '500013', '07-774618-a-27', '01', 12002, '2018-04-01', 'no description', 'EE01', 1543386715, 0),
(8, '2000', '       16 ', 'CB', 'Adrenalin Advertising', '100021', '07-774618-a-27', '01', 60, '2018-04-01', 'thy', 'EE02', 1543389477, 0),
(9, '1000', '       21 ', 'BG', 'Sheila Sithole', '500007', '07-774618-g-27', '00', 7777, '2018-04-01', '3', 'DURA', 1545038757, 0),
(10, '1000', '       22 ', 'BG', 'Sheila Sithole', '500007', '07-774618-g-27', '00', 7777, '2018-04-01', '3', 'DURA', 1545038758, 0),
(11, '1000', '       23 ', 'BG', 'Sheila Sithole', '500007', '07-774618-g-27', '00', 7777, '2018-04-01', '3', 'DURA', 1545038758, 0);

-- --------------------------------------------------------

--
-- Table structure for table `structures`
--

CREATE TABLE `structures` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `structures`
--

INSERT INTO `structures` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Default', 'Structure which accommodates every one', 1448879396, 1448879396),
(2, 'Government', 'this is the overall governing structure of the industry', 1448888596, 1448888596);

-- --------------------------------------------------------

--
-- Table structure for table `structures_groups`
--

CREATE TABLE `structures_groups` (
  `structure_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `structures_groups`
--

INSERT INTO `structures_groups` (`structure_id`, `group_id`) VALUES
(1, 13),
(1, 14),
(4, 15),
(1, 16),
(2, 17),
(2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `structures_structures`
--

CREATE TABLE `structures_structures` (
  `structure_id` int(11) NOT NULL,
  `view_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `structures_structures`
--

INSERT INTO `structures_structures` (`structure_id`, `view_id`) VALUES
(1, 2),
(1, 4),
(1, 0),
(2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `surname`, `created_at`, `updated_at`) VALUES
(2, 'peter', 'moyo', 1481974120, 1481974120);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `subscribed` tinyint(1) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `type`, `subscribed`, `created_at`, `updated_at`, `user_id`) VALUES
(0, 'farmer', 1, 1582642745, NULL, 2),
(1, 'farmer', 1, 1449238105, NULL, 1),
(2, 'farmer', 1, 1449238161, NULL, 1),
(3, 'buyer', 0, 1449238304, NULL, 1),
(4, 'farmer', 0, 1449238314, NULL, 1),
(5, 'farmer', 0, 1449238434, NULL, 1),
(6, 'buyer', 0, 1449238438, NULL, 1),
(7, 'trader', 0, 1449238441, NULL, 1),
(8, 'farmer', 0, 1449238903, NULL, 1),
(9, 'farmer', 0, 1449238954, NULL, 1),
(11, 'farmer', 0, 1449754813, NULL, 1),
(12, 'farmer', 1, 1449754822, NULL, 1),
(17, 'farmer', 1, 1450881513, NULL, 4),
(18, 'buyer', 0, 1450881646, NULL, 4),
(20, 'farmer', 1, 1451910941, NULL, 6),
(21, 'farmer', 1, 1451916756, NULL, 8),
(22, 'farmer', 1, 1451916819, NULL, 8),
(28, 'buyer', 1, 1455029299, NULL, 9),
(53, 'buyer', 1, 1455107972, NULL, 10),
(54, 'buyer', 0, 1455108001, NULL, 10),
(55, 'buyer', 1, 1455108715, NULL, 10),
(56, 'trader', 1, 1455109309, NULL, 10),
(57, 'labor', 1, 1455109322, NULL, 10),
(58, 'logistic', 1, 1455109333, NULL, 10),
(59, 'buyer', 0, 1455109371, NULL, 10),
(60, 'trader', 0, 1455109375, NULL, 10),
(61, 'labor', 0, 1455109381, NULL, 10),
(62, 'logistic', 0, 1455109385, NULL, 10),
(63, 'logistic', 0, 1455109413, NULL, 10),
(64, 'logistic', 0, 1455109649, NULL, 10),
(65, 'logistic', 0, 1455109846, NULL, 10),
(66, 'logistic', 0, 1455109884, NULL, 10),
(67, 'logistic', 1, 1455109909, NULL, 10),
(68, 'logistic', 0, 1455109928, NULL, 10),
(69, 'logistic', 1, 1455110200, NULL, 10),
(70, 'labor', 1, 1455110987, NULL, 10),
(71, 'buyer', 1, 1455111349, NULL, 10),
(72, 'farmer', 1, 1455111393, NULL, 10),
(73, 'buyer', 0, 1455113387, NULL, 10),
(74, 'labor', 0, 1455113399, NULL, 10),
(75, 'logistic', 0, 1455113408, NULL, 10),
(77, 'farmer', 1, 1455114260, NULL, 10),
(83, 'labor', 1, 1455131398, NULL, 10),
(84, 'logistic', 1, 1455135901, NULL, 10),
(91, 'farmer', 1, 1455281688, NULL, 10),
(92, 'farmer', 1, 1455281698, NULL, 10),
(93, 'buyer', 1, 1455529112, NULL, 16),
(94, 'trader', 1, 1455529120, NULL, 16),
(95, 'labor', 1, 1455529144, NULL, 16),
(97, 'farmer', 1, 1455632238, NULL, 4),
(98, 'buyer', 1, 1455632259, NULL, 4),
(99, 'logistic', 1, 1455632275, NULL, 4),
(100, 'trader', 0, 1455632290, NULL, 4),
(101, 'farmer', 1, 1455626937, NULL, 4),
(102, 'buyer', 1, 1455630175, NULL, 18),
(103, 'trader', 1, 1455704047, NULL, 19),
(104, 'trader', 0, 1455704070, NULL, 19),
(105, 'labor', 1, 1455704083, NULL, 19),
(106, 'labor', 0, 1455704087, NULL, 19),
(107, 'buyer', 1, 1455774752, NULL, 20),
(108, 'trader', 1, 1455774898, NULL, 20),
(109, 'labor', 1, 1455774956, NULL, 20),
(110, 'logistic', 1, 1455775077, NULL, 20),
(111, 'buyer', 1, 1455775299, NULL, 21),
(112, 'trader', 1, 1455775305, NULL, 21),
(113, 'labor', 1, 1455775960, NULL, 21),
(114, 'logistic', 1, 1455775988, NULL, 21),
(115, 'buyer', 1, 1455776268, NULL, 22),
(116, 'labor', 1, 1455776277, NULL, 22),
(117, 'labor', 0, 1455776286, NULL, 22),
(118, 'labor', 1, 1455776292, NULL, 22),
(119, 'logistic', 1, 1455776304, NULL, 22),
(120, 'trader', 1, 1455777195, NULL, 22),
(121, 'logistic', 0, 1455780040, NULL, 22),
(122, 'logistic', 1, 1455783008, NULL, 22),
(123, 'buyer', 1, 1455783539, NULL, 23),
(124, 'farmer', 1, 1457447059, NULL, 10),
(125, 'farmer', 1, 1457447084, NULL, 10),
(126, 'farmer', 1, 1457514529, NULL, 10),
(127, 'farmer', 1, 1457514551, NULL, 10),
(129, 'buyer', 1, 1457518767, NULL, 10),
(130, 'trader', 1, 1457518789, NULL, 10),
(150, 'trader', 1, 1464951772, NULL, 4),
(151, 'labor', 1, 1464951780, NULL, 4),
(152, 'farmer', 1, 1464955352, NULL, 27),
(153, 'buyer', 1, 1464955358, NULL, 27),
(154, 'trader', 1, 1464955362, NULL, 27),
(155, 'labor', 1, 1464955366, NULL, 27),
(156, 'logistic', 1, 1464955371, NULL, 27),
(157, 'buyer', 1, 1464960843, NULL, 28),
(158, 'trader', 1, 1464960851, NULL, 28),
(159, 'labor', 1, 1464960912, NULL, 28),
(160, 'logistic', 1, 1464961458, NULL, 28),
(182, 'farmer', 1, 1466595325, NULL, 30),
(183, 'buyer', 1, 1466595331, NULL, 30),
(184, 'farmer', 1, 1467874030, NULL, 31),
(185, 'buyer', 1, 1467874037, NULL, 31),
(186, 'trader', 1, 1467874042, NULL, 31),
(188, 'buyer', 1, 1467875992, NULL, 32),
(190, 'farmer', 1, 1468826569, NULL, 33),
(191, 'buyer', 1, 1468826579, NULL, 33),
(192, 'trader', 1, 1468826601, NULL, 33),
(193, 'labor', 1, 1468826608, NULL, 33),
(194, 'logistic', 1, 1468826614, NULL, 33),
(195, 'farmer', 1, 1468837587, NULL, 35),
(196, 'labor', 1, 1468837599, NULL, 35),
(197, 'trader', 1, 1468837612, NULL, 35),
(198, 'buyer', 1, 1468837618, NULL, 35),
(199, 'logistic', 1, 1468837638, NULL, 35),
(217, 'labor', 1, 1469517985, NULL, 36),
(218, 'labor', 0, 1469518039, NULL, 36),
(219, 'labor', 1, 1469518190, NULL, 36),
(220, 'labor', 0, 1469518241, NULL, 36),
(221, 'buyer', 1, 1469518333, NULL, 36),
(222, 'trader', 1, 1469518350, NULL, 36),
(223, 'trader', 0, 1469518561, NULL, 36),
(224, 'buyer', 0, 1469518573, NULL, 36),
(226, 'labor', 1, 1469519048, NULL, 36),
(229, 'buyer', 1, 1469625011, NULL, 36),
(230, 'logistic', 1, 1470041857, NULL, 36),
(232, 'farmer', 1, 1470042178, NULL, 36),
(234, 'contractor', 1, 1470044300, NULL, 34),
(235, 'trader', 1, 1470044316, NULL, 34),
(236, 'logistic', 1, 1470044319, NULL, 34),
(237, 'buyer', 1, 1470044320, NULL, 34),
(238, 'labor', 1, 1470044322, NULL, 34),
(239, 'farmer', 1, 1470044324, NULL, 34),
(254, 'farmer', 1, 1471445126, NULL, 39),
(255, 'buyer', 1, 1471445127, NULL, 39),
(256, 'contractor', 1, 1471445131, NULL, 39),
(257, 'trader', 1, 1471445132, NULL, 39),
(258, 'logistic', 1, 1471445136, NULL, 39),
(259, 'farmer', 1, 1471509028, NULL, 40),
(260, 'buyer', 1, 1471509426, NULL, 40),
(261, 'contractor', 1, 1471509429, NULL, 40),
(262, 'trader', 1, 1471509431, NULL, 40),
(263, 'logistic', 1, 1471509433, NULL, 40),
(265, 'farmer', 1, 1471524854, NULL, 41),
(266, 'logistic', 1, 1471524984, NULL, 41),
(267, 'trader', 1, 1471524992, NULL, 41),
(297, 'trader', 1, 1473144897, NULL, 11),
(298, 'contractor', 1, 1473149114, NULL, 11),
(300, 'farmer', 1, 1473758184, NULL, 50),
(304, 'farmer', 1, 1474372814, NULL, 54),
(305, 'contractor', 1, 1474372976, NULL, 53),
(307, 'farmer', 1, 1474376973, NULL, 42),
(308, 'farmer', 1, 1475145726, NULL, 53),
(323, 'farmer', 1, 1483090181, NULL, 24),
(344, 'contractor', 1, 1484225564, NULL, 47),
(346, 'logistic', 1, 1485157025, NULL, 47),
(350, 'farmer', 1, 1494228186, NULL, 29),
(357, 'buyer', 1, 1495088585, NULL, 47),
(358, 'trader', 1, 1495088619, NULL, 47),
(379, 'logistic', 1, 1499948135, NULL, 29),
(380, 'buyer', 1, 1499948150, NULL, 29),
(385, 'contractor', 1, 1500964579, NULL, 2),
(390, 'farmer', 1, 1500991775, NULL, 57),
(392, 'trader', 1, 1501580288, NULL, 5),
(396, 'labor', 1, 1501580346, NULL, 5),
(419, 'contractor', 1, 1502118483, NULL, 58),
(420, 'buyer', 1, 1502118508, NULL, 58),
(421, 'trader', 1, 1502118510, NULL, 58),
(422, 'logistic', 1, 1502118517, NULL, 58),
(423, 'farmer', 1, 1502119920, NULL, 58),
(424, 'labor', 1, 1502119926, NULL, 58),
(430, 'contractor', 1, 1502273157, NULL, 61),
(431, 'logistic', 1, 1502273162, NULL, 61),
(432, 'farmer', 1, 1502273165, NULL, 61),
(436, 'contractor', 1, 1502282040, NULL, 63),
(452, 'farmer', 1, 1502351702, NULL, 64),
(453, 'trader', 1, 1502351719, NULL, 64),
(456, 'buyer', 1, 1502868515, NULL, 2),
(457, 'trader', 1, 1502868547, NULL, 2),
(458, 'labor', 1, 1502868553, NULL, 2),
(459, 'logistic', 1, 1502868558, NULL, 2),
(460, 'farmer', 1, 1502876071, NULL, 38),
(461, 'farmer', 1, 1502954887, NULL, 60),
(466, 'contractor', 1, 1503318926, NULL, 32),
(468, 'farmer', 1, 1503924025, NULL, 66),
(475, 'contractor', 1, 1504100935, NULL, 17),
(476, 'contractor', 1, 1504512737, NULL, 24),
(477, 'farmer', 1, 1504515156, NULL, 71),
(478, 'farmer', 1, 1517910969, NULL, 5),
(479, 'contractor', 1, 1517910972, NULL, 5),
(480, 'buyer', 1, 1517910975, NULL, 5),
(481, 'logistic', 1, 1517910978, NULL, 5),
(482, 'contractor', 1, 1517911074, NULL, 77),
(483, 'buyer', 1, 1517911075, NULL, 77),
(484, 'farmer', 1, 1517911080, NULL, 77),
(485, 'trader', 1, 1517911082, NULL, 77),
(486, 'labor', 1, 1517911085, NULL, 77),
(487, 'logistic', 1, 1517911090, NULL, 77),
(488, 'contractor', 1, 1517911203, NULL, 38),
(489, 'buyer', 1, 1517911207, NULL, 38),
(490, 'trader', 1, 1517911208, NULL, 38),
(491, 'labor', 1, 1517911209, NULL, 38),
(492, 'logistic', 1, 1517911210, NULL, 38),
(493, 'farmer', 1, 1517994635, NULL, 76),
(494, 'contractor', 1, 1517994640, NULL, 76),
(495, 'buyer', 1, 1517994643, NULL, 76),
(496, 'trader', 1, 1517994646, NULL, 76),
(497, 'logistic', 1, 1517994650, NULL, 76),
(498, 'labor', 1, 1517994653, NULL, 76),
(500, 'farmer', 1, 1518081012, NULL, 79),
(501, 'contractor', 1, 1518082437, NULL, 81),
(502, 'buyer', 1, 1518082443, NULL, 81),
(503, 'trader', 1, 1518082451, NULL, 81),
(504, 'contractor', 1, 1518082454, NULL, 80),
(505, 'labor', 1, 1518082456, NULL, 81),
(506, 'buyer', 1, 1518082462, NULL, 80),
(507, 'logistic', 1, 1518082468, NULL, 81),
(508, 'trader', 1, 1518082469, NULL, 80),
(509, 'logistic', 1, 1518082475, NULL, 80),
(510, 'farmer', 1, 1518082912, NULL, 81),
(511, 'farmer', 1, 1518082920, NULL, 80),
(512, 'labor', 1, 1518082923, NULL, 80),
(513, 'farmer', 1, 1518092544, NULL, 82),
(514, 'farmer', 1, 1518095815, NULL, 78),
(515, 'trader', 1, 1518420220, NULL, 83),
(516, 'labor', 1, 1518420229, NULL, 83),
(517, 'logistic', 1, 1518421989, NULL, 83),
(518, 'buyer', 1, 1518421996, NULL, 83),
(519, 'contractor', 1, 1518422001, NULL, 83),
(520, 'farmer', 1, 1518422008, NULL, 83),
(521, 'farmer', 1, 1518442827, NULL, 84),
(522, 'contractor', 1, 1518505943, NULL, 84),
(523, 'trader', 1, 1518505945, NULL, 84),
(524, 'labor', 1, 1518505948, NULL, 84),
(525, 'buyer', 1, 1518505952, NULL, 84),
(526, 'logistic', 1, 1518505954, NULL, 84);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'The leaves dry up', 1458207476, 1458207476),
(2, 'The rate of growth of tree is not according to growth  schedule.', 1458282229, 1458282229),
(3, 'Very dry fruits', 1458285154, 1458285154),
(4, 'Yellow or Brown leaves.', 1458287517, 1458287517),
(5, 'Purple flecks or circular lesions which are brown in the centre and purple at margin', 1493381753, 1493381753),
(6, 'Red flecks, purple lesions and/or brown black rings on fruit.', 1493381776, 1493381776),
(7, 'Bright orange or yellow patches on top side of leaves surrounded by a red band and small black spots in the center', 1493382130, 1493382130),
(8, 'Cup-like structures called aecia form on the leaf undersides.', 1493382167, 1493382167),
(9, 'Leaves become covered in tubular structures from which spores are released.', 1493382194, 1493382194),
(10, 'Oval or elongated cinnamon brown pustules on upper and lower surfaces of leaves', 1493382957, 1493382957),
(11, 'Chlorotic or necrotic flecks on the leaves which release little or no spore.', 1493382995, 1493382995),
(12, 'Chlorosis and stunting of growth.', 1493383684, 1493383684),
(13, 'Leaves shows mottling, chlorotic streaking and lesions and white striped leaves.', 1493383722, 1493383722),
(14, 'Leaves are narrower and more erect when compare to healthy plants and are covered with a white, downy growth on both surfaces.', 1493383750, 1493383750),
(15, 'Sporulating lesions - upper surface (30° angle) powdery appearance', 1500468964, 1500468964),
(16, 'Lesions after sporulation - upper surface', 1500468991, 1500468991),
(17, 'Greyish sporulation - powdery appearance', 1500469008, 1500469008),
(18, 'Whitish sporulation - downy appearance\r\n', 1500469019, 1500469019),
(19, 'Leaf - initial foliar lesions occur on young tissue as small brown to black spots that develop prominent yellow halos. ', 1500533153, 1500533153),
(20, ' Lesions expand into irregular or circular necrotic areas which can involve large portions of the leaf, especially on highly susceptible cultivars like \'Minneola\'.', 1500533206, 1500533206),
(21, ' Lesions are flat and visible on both sides on the leaf. Older lesions have a brittle paper-like texture in the middle of the lesions.', 1500533232, 1500533232),
(22, 'Fruit - young fruit lesions occur on immature fruit for 4 months post petal fall and cause slightly sunken dark spots with yellow halos. ', 1500533260, 1500533260),
(23, 'The fruit rind responds to infection by forming a barrier of corky tissue that erupts from the surface.', 1500533300, 1500534273),
(24, 'Early fruit drop is common, especially if infection has occurred shortly after petal fall. Alternaria fruit lesions can crack around the outer edge, giving a moat-like appearance.', 1500533326, 1500533326),
(25, 'The papery patches on the leaves develop tiny, dark specks inside them. ', 1500543955, 1500543955),
(26, 'Older leaves are affected first.', 1500543974, 1500543974),
(27, 'Dark, concentric spots (brown to black), ¼ - ½” in diameter, form on lower leaves and stems. Early blight is marked by tell-tale rings.', 1500544706, 1500544706),
(28, 'Fruit can also be affected; spots often begin near stem of fruit', 1500544729, 1500544729),
(29, 'Lower leaves turn yellow and drop', 1500544754, 1500544754),
(30, 'As the disease progresses, the small sunken lesions coalesce to form large necrotic patches affecting the flesh of the fruit.', 1500644563, 1500644563),
(31, 'A grey to black rot of the soft butt tissue develops, ', 1500646202, 1500646202),
(32, 'partial decay of the butt severely reduces plant growth.', 1500877373, 1500877373);

-- --------------------------------------------------------

--
-- Table structure for table `targetyields`
--

CREATE TABLE `targetyields` (
  `id` int(11) UNSIGNED NOT NULL,
  `value` double NOT NULL,
  `units` varchar(255) NOT NULL,
  `sizein` varchar(255) NOT NULL,
  `land` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(14, 'Apply Basal Fertilizer', 'apply basal fertilizer', 1484819990, 1484819990),
(15, 'Plant', 'Planting of crop', 1484820009, 1484820009),
(16, 'Weeding', 'weeding', 1484820091, 1484820091),
(17, 'Ammonium Nitrate', 'ammonium nitrate', 1484820114, 1484820114);

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) UNSIGNED NOT NULL,
  `notes` text NOT NULL,
  `duration` double NOT NULL,
  `units` varchar(255) DEFAULT NULL,
  `Model_Product_Variablecost_Stage_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) UNSIGNED NOT NULL,
  `sale_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `narrative` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL,
  `browseurl` varchar(255) NOT NULL,
  `pollurl` varchar(255) NOT NULL,
  `paynowRef` varchar(255) NOT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sale_id`, `amount`, `narrative`, `status`, `browseurl`, `pollurl`, `paynowRef`, `paymentStatus`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 5, 40, 'This is a payment of $40, for 40kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Message', 'browser', 'poll', '0000000', 'pending', '0775009236', 1449670078, 1449670078),
(2, 5, 40, 'This is a payment of $40, for 40kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Message', 'browser', 'poll', '0000000', 'pending', '0775009236', 1449670142, 1449670142),
(3, 5, 40, 'This is a payment of $40, for 40kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Message', 'browser', 'poll', '0000000', 'pending', '0775009236', 1449671025, 1449671025),
(4, 5, 40, 'This is a payment of $40, for 40kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79376/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=f4950409-cc99-427f-b37c-a64f2bea5a5f', '0000000', 'pending', '0775009236', 1449671126, 1449671133),
(5, 5, 40, 'This is a payment of $40, for 40kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79378/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=873aaf85-2e44-4960-8456-a4dc2b982926', '0000000', 'pending', '0775009236', 1449671365, 1449671373),
(6, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79462/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=50cccfc7-562b-4bac-ae09-8241d51a550e', '00', 'pending', '0775009236', 1449688207, 1449688211),
(7, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79463/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=2b377d52-2455-49c7-819c-eac9a5fa5db6', '00', 'pending', '0775009236', 1449688400, 1449688401),
(8, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79465/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=998ed76a-12e6-423d-b22e-b8f960caea0a', '0000000', 'pending', '0775009236', 1449688595, 1449688596),
(9, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79466/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=5246a272-454e-428f-89ec-b7240d1f4d24', '0000000', 'pending', '0775009236', 1449688655, 1449688655),
(10, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79468/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=726eaead-b67b-482b-ba89-8729d82d4733', '0000000', 'pending', '0775009236', 1449688808, 1449688808),
(11, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'message', 'browse', 'poll', '0000000', 'pending', '0775009236', 1449688849, 1449688849),
(12, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79469/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=a03e139f-b1bf-47d6-8c22-b6d30415a622', '1111', 'dddddd', '0775009236', 1449688948, 1449688949),
(13, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79470/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1627f644-2c1b-4418-842b-805e6a311f11', '1111', 'dddddd', '0775009236', 1449688986, 1449688986),
(14, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79472/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=98be05ab-2ddf-41db-a0f5-bb53cd5885a9', '1111', 'dddddd', '0775009236', 1449689076, 1449689077),
(15, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79473/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1d2c8ba4-4b02-49e2-b212-1ca7b779078d', '1111', 'dddddd', '0775009236', 1449689100, 1449689101),
(16, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79474/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=a0c69afc-c2be-4ec9-924f-3faa1ace620d', '000', 'pending', '0775009236', 1449689169, 1449689170),
(17, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79476/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=a39bc448-5300-409b-81ff-da294fe37de2', '000', 'pending', '0775009236', 1449689253, 1449689253),
(18, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79477/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d8feebe8-829c-42eb-a122-834e6727c682', '4444', 'pending', '0775009236', 1449689377, 1449689377),
(19, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79478/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=8e8035c0-5f69-4f22-b01b-785846914335', '000', 'kkk', '0775009236', 1449689418, 1449689419),
(20, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79479/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=c82cc432-6d24-4c2c-81b7-9b81ba67aab7', '000', 'kkk', '0775009236', 1449689497, 1449689498),
(21, 7, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79480/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=ffd82b9a-b22f-44dc-ab25-60863519ba5a', 'pa', 'ssss', '0775009236', 1449689621, 1449689622),
(22, 8, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79543/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=3fdcec8a-a8cd-491d-abc0-83ccad7285cf', '0000', 'pending', '0775009236', 1449729107, 1449729121),
(23, 8, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79545/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=e09dd356-76db-47ce-85c1-6bc41b13c915', '0000', 'pending', '0775009236', 1449729207, 1449729216),
(24, 8, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79546/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=368c1e9f-10a4-409a-b03a-09fb9d590603', '00000', 'pending', '0775009236', 1449729291, 1449729305),
(25, 8, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79548/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=0a04e92a-4639-47c2-a96d-d0abe5c384c5', '00000', 'pending', '0775009236', 1449729448, 1449729464),
(26, 8, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79550/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=ab32fb4c-25c6-498e-b86a-5871ce01f3ba', '00000', 'pending', '0775009236', 1449729814, 1449729827),
(27, 8, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'pending', 'browse', 'poll', '00000', 'pending', '0775009236', 1449729935, 1449729935),
(28, 8, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79552/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1758bb70-83b3-421d-bede-26860b8920e0', '00000', 'pending', '0775009236', 1449730009, 1449730017),
(29, 8, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'pending', 'browse', 'poll', '00000', 'pending', '0775009236', 1449730257, 1449730257),
(30, 8, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79555/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=4c3c4e34-2c35-4fe5-a230-fad380dbceb3', '00000', 'pending', '0775009236', 1449730317, 1449730326),
(31, 8, 25, 'This is a payment of $25, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79560/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=b9b7a6c8-4e21-462e-bb7c-87347459b906', '00000', 'pending', '0775009236', 1449731072, 1449731085),
(32, 9, 80, 'This is a payment of $80, for 40kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79589/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=98645c7e-b9fa-41c3-a057-7af0ea04389f', '000000', 'pending', '0775009236', 1449738994, 1449739013),
(33, 9, 80, 'This is a payment of $80, for 40kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Ok', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79591/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=dc2e861c-e099-4b26-9bd2-7953a2f389c4', '000', 'pending', '0775009236', 1449739989, 1449740004),
(34, 10, 4, 'This is a payment of $4, for 200kgs of Guava by Alvin VafanaThe mobile number the payment information will be sent to is 0773430312', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79605/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=06e70a76-6e0e-4197-b3d4-5ce8557f7e50', '79605', 'status', '0773430312', 1449743602, 1449744214),
(35, 11, 40, 'This is a payment of $40, for 100kgs of Grapes by Alvin VafanaThe mobile number the payment information will be sent to is 0773430312', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79676/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=0175b38d-a7a5-4790-b25a-62ee87441584', '79676', 'status', '0773430312', 1449751924, 1449752168),
(36, 12, 4, 'This is a payment of $4, for 200kgs of Guava by Alvin VafanaThe mobile number the payment information will be sent to is 0773430312', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79686/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=976f71d3-2325-4b97-a8a7-6d091647cf0f', '79686', 'status', '0773430312', 1449752948, 1449753160),
(37, 13, 4, 'This is a payment of $4, for 200kgs of Guava by Alvin VafanaThe mobile number the payment information will be sent to is 0773430312', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79692/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d8613230-534e-498f-bfe4-9fa5db6c8bef', '79692', 'status', '0773430312', 1449753832, 1449754401),
(38, 14, 40, 'This is a payment of $40, for 40kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/79974/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d26f4dc2-c1b3-47a4-903d-00757cc23f73', '79974', 'status', '0775009236', 1449826845, 1449827023),
(39, 17, 6.08, 'This is a payment of $6.08, for 200kgs of Guava by Alvin VafanaThe mobile number the payment information will be sent to is 0773430312', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/81293/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=6d0f0666-e2af-47ad-9e95-162dd927f4ea', '81293', 'status', '0773430312', 1450170190, 1450170425),
(40, 18, 80, 'This is a payment of $80, for 40kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 0775009236', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/83346/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=24885279-26d0-4fd2-a4df-d8d00f8e21e2', '83346', 'status', '0775009236', 1450679820, 1450679900),
(41, 19, 20, 'This is a payment of $20, for 20kgs of Oranges by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/88772/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=b9acd23c-5d55-4f0b-9b3f-c6450662777b', '88772', 'status', '263775009236', 1452177226, 1452177413),
(42, 22, 15, 'This is a payment of $15, for 15kgs of Oranges by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/99167/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=4c41e807-7318-45c9-8779-42ad4912d40f', '102814', 'status', '263775009236', 1454922824, 1455775742),
(43, 23, 60, 'This is a payment of $60, for 30kgs of Grapes by Munyaradzi MuswerakuendaThe mobile number the payment information will be sent to is 263777000777', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/100254/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=80c18265-dc43-486b-8894-76b33448a18c', '102820', 'status', '263777000777', 1455171925, 1455777169),
(44, 24, 25, 'This is a payment of $25, for 25kgs of Oranges by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/100453/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=2d67da10-6c3e-4afc-b1bd-cce07f35ed5f', '100453', 'status', '263775009236', 1455199470, 1455199515),
(45, 25, 20, 'This is a payment of $20, for 10kgs of Grapes by Josphat ChitomboThe mobile number the payment information will be sent to is 263773304935', 'Paid', 'browsurl', 'pollurl', '102854', 'status', '263773304935', 1455529584, 1455783169),
(46, 27, 20, 'This is a payment of $20, for 20kgs of Oranges by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/101577/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=21326f82-4975-4f3f-88e4-faaff935b1f3', '101577', 'status', '263775009236', 1455537019, 1455537040),
(47, 28, 20, 'This is a payment of $20, for 20kgs of Peaches by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/101588/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=3d6eb785-2671-45a7-b164-09fd2850f303', '109901', 'status', '263775009236', 1455537859, 1457505981),
(48, 29, 40, 'This is a payment of $40, for 20kgs of Grapes by Derek MaphosaThe mobile number the payment information will be sent to is 263772560448', 'Paid', 'browsurl', 'pollurl', '109905', 'status', '263772560448', 1455630553, 1457506787),
(49, 29, 40, 'This is a payment of $40, for 20kgs of Grapes by Derek MaphosaThe mobile number the payment information will be sent to is 263772560448', 'Created', 'browsurl', 'pollurl', '109907', 'status', '263772560448', 1455630581, 1457507091),
(50, 30, 20, 'This is a payment of $20, for 20kgs of Peaches by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Paid', 'browsurl', 'pollurl', '109908', 'status', '263775009236', 1455692401, 1457507220),
(51, 31, 20, 'This is a payment of $20, for 20kgs of Peaches by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Created', 'browsurl', 'pollurl', '109957', 'status', '263775009236', 1455701040, 1457513006),
(52, 32, 80, 'This is a payment of $80, for 40kgs of Grapes by Langelihle ChimanyaThe mobile number the payment information will be sent to is 263776009237', 'Paid', 'browsurl', 'pollurl', '110125', 'status', '263776009237', 1455701990, 1457529990),
(53, 34, 80, 'This is a payment of $80, for 20kgs of Nyii by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Paid', 'browsurl', 'pollurl', '110350', 'status', '263775009236', 1455702492, 1457599121),
(54, 34, 80, 'This is a payment of $80, for 20kgs of Nyii by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Paid', 'browsurl', 'pollurl', '110354', 'status', '263775009236', 1455702665, 1457599238),
(55, 35, 60, 'This is a payment of $60, for 30kgs of Grapes by Langelihle ChimanyaThe mobile number the payment information will be sent to is 263776009237', 'Paid', 'browsurl', 'pollurl', '110728', 'status', '263776009237', 1455702694, 1457689273),
(56, 34, 80, 'This is a payment of $80, for 20kgs of Nyii by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Created', 'browsurl', 'pollurl', '149237', 'status', '263775009236', 1455702808, 1466499893),
(57, 34, 80, 'This is a payment of $80, for 20kgs of Nyii by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263775009236', 1455703033, 1455703033),
(58, 34, 80, 'This is a payment of $80, for 20kgs of Nyii by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263775009236', 1455703094, 1455703094),
(59, 36, 40, 'This is a payment of $40, for 10kgs of Nyii by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263775009236', 1455703646, 1455703646),
(60, 36, 40, 'This is a payment of $40, for 10kgs of Nyii by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263775009236', 1455703716, 1455703716),
(61, 37, 40, 'This is a payment of $40, for 10kgs of Nyii by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102505/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=5b513cdf-022b-48ea-85bf-d6224bbc497a', '102505', 'status', '263775009236', 1455705486, 1455705564),
(62, 38, 200, 'This is a payment of $200, for 100kgs of Maize Fresh by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102513/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=59af04e1-3f05-45d1-b6b4-546bbe821529', '102513', 'status', '263775009236', 1455705964, 1455706016),
(63, 39, 5400, 'This is a payment of $5400, for 60kgs of Avocado Pears by Langelihle ChimanyaThe mobile number the payment information will be sent to is 263776009237', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102723/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d9a33133-d05b-451c-9cce-9547c47dc272', '102723', 'status', '263776009237', 1455730853, 1455730934),
(64, 40, 43.75, 'This is a payment of $43.75, for 12.5kgs of Lemons by Langelihle ChimanyaThe mobile number the payment information will be sent to is 263776009237', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102803/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=f1c26c53-79f9-4a55-9ecd-9c1d8b52b89a', '179401', 'status', '263776009237', 1455774511, 1471505971),
(65, 41, 5400, 'This is a payment of $5400, for 60kgs of Avocado Pears by Moses ChatikoboThe mobile number the payment information will be sent to is 263773111331', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102819/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=7b9bbd89-bafe-4d70-b740-4ad47508957e', '179632', 'status', '263773111331', 1455776937, 1471506398),
(66, 42, 600, 'This is a payment of $600, for 300kgs of Maize Fresh by Tariro SitholeThe mobile number the payment information will be sent to is 263775222332', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/102862/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=c1a3e48a-8bdd-49e0-93f3-6e52915a7b2b', '179675', 'status', '263775222332', 1455783934, 1471506485),
(67, 43, 40, 'This is a payment of $40, for 20kgs of Maize Fresh by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/109903/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=23c51e42-0f93-4dbc-95e6-d3677068cf25', '179731', 'status', '263775009236', 1457506147, 1471508053),
(68, 44, 100, 'This is a payment of $100, for 20kgs of Lemons by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263777000000', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/112719/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=7b7aa12d-d4b2-48fd-b2d3-cc75164a38a8', '179739', 'status', '263777000000', 1458297507, 1471509134),
(69, 45, 100, 'This is a payment of $100, for 20kgs of Lemons by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263777000000', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/112777/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=aed910e7-f5d3-41b5-8ad5-91e75d1651dd', '179744', 'status', '263777000000', 1458303867, 1471509314),
(70, 46, 60, 'This is a payment of $60, for 15kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 263775009236', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/118714/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=81a21441-04eb-4c2c-89eb-5b9d83f6a6d4', '179778', 'status', '263775009236', 1459504870, 1471513237),
(71, 47, 80, 'This is a payment of $80, for 20kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/136952/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=61b0dc8d-ebb8-4e26-83d1-036db4ff3c54', '179914', 'status', '263717779296', 1463732725, 1471524955),
(72, 48, 100, 'This is a payment of $100, for 25kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/137011/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=05ba0f87-9fda-4ad9-a711-bd455b78bc2f', '193981', 'status', '263717779296', 1463740297, 1473668544),
(73, 49, 125, 'This is a payment of $125, for 25kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/137015/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=f518d9af-fb42-4a30-af6e-fb39db698448', '137015', 'status', '263717779296', 1463740612, 1463740615),
(74, 50, 10, 'This is a payment of $10, for 10kgs of Oranges by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/137076/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=c22d1c43-cdce-40a9-b2e3-425a4ccf36d4', '137076', 'status', '263717779296', 1463748426, 1463748445),
(75, 51, 152, 'This is a payment of $152, for 38kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263717779296', 1464961739, 1464961739),
(76, 52, 40, 'This is a payment of $40, for 10kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263717779296', 1465199213, 1465199213),
(77, 53, 25, 'This is a payment of $25, for 5kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/145093/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=cd232555-4f55-4fdf-9813-34438ed95ca2', '145093', 'status', '263717779296', 1465476310, 1465476313),
(78, 54, 25, 'This is a payment of $25, for 5kgs of Mango by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/147436/liberty@gmail.com/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=5e136415-d2b8-419e-8e45-b2448be7edb6', '147436', 'status', '263717779296', 1466070050, 1466070051),
(79, 55, 25, 'This is a payment of $25, for 5kgs of Mango by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/149242/nchikwanda@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=e6e953ce-464d-4152-9bd2-7a462d91691e', '149242', 'status', '263773266499', 1466500647, 1466500652),
(80, 56, 72, 'This is a payment of $72, for 18kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/149308/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=10d78063-4151-441a-9a8a-e70bc8a5db35', '149308', 'status', '263717779296', 1466511107, 1466511181),
(81, 57, 88, 'This is a payment of $88, for 22kgs of Grapes by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/149758/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=08ae4ffd-f50f-4f24-bc00-7a6ac48df1af', '149758', 'status', '263717779296', 1466589231, 1466589326),
(82, 58, 25, 'This is a payment of $25, for 10kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/150443/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=986e7069-4a43-4c68-a7be-75fec05c0250', '150443', 'status', '263717779296', 1466690393, 1466690433),
(83, 59, 500, 'This is a payment of $500, for 200kgs of Apples by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/150454/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=31b723d3-e7fd-4813-82b2-1ae4c438b07d', '150454', 'status', '263773266499', 1466691575, 1466691625),
(84, 60, 100, 'This is a payment of $100, for 40kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/150851/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=19df7f2f-980f-4375-9718-5e4aaffe3e24', '150851', 'status', '263717779296', 1466764404, 1466764439),
(85, 61, 625, 'This is a payment of $625, for 25kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/150863/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=a271136f-3c6c-4304-bef6-514ad313dd3c', '150863', 'status', '263717779296', 1466765214, 1466765251),
(86, 62, 100, 'This is a payment of $100, for 20kgs of Roundnuts Fresh by Munyaradzi MuswerakuendaThe mobile number the payment information will be sent to is 263772271681', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263772271681', 1467796959, 1467796959),
(87, 63, 600, 'This is a payment of $600, for 25kgs of Apples by Munyaradzi MuswerakuendaThe mobile number the payment information will be sent to is 263772271681', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263772271681', 1467802396, 1467802396),
(88, 64, 50, 'This is a payment of $50, for 20kgs of Apples by Chiedza MuteroThe mobile number the payment information will be sent to is 263775100200', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263775100200', 1467874318, 1467874318),
(89, 64, 50, 'This is a payment of $50, for 20kgs of Apples by Chiedza MuteroThe mobile number the payment information will be sent to is 263775100200', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263775100200', 1467874408, 1467874408),
(90, 64, 50, 'This is a payment of $50, for 20kgs of Apples by Chiedza MuteroThe mobile number the payment information will be sent to is 263775100200', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263775100200', 1467874489, 1467874489),
(91, 64, 50, 'This is a payment of $50, for 20kgs of Apples by Chiedza MuteroThe mobile number the payment information will be sent to is 263775100200', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263775100200', 1467874571, 1467874571),
(92, 65, 62.5, 'This is a payment of $62.5, for 25kgs of Apples by Cephas MagavaThe mobile number the payment information will be sent to is 263772287875', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263772287875', 1467876772, 1467876772),
(93, 66, 31.25, 'This is a payment of $31.25, for 25kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263717779296', 1467886752, 1467886752),
(94, 67, 12.5, 'This is a payment of $12.5, for 10kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263717779296', 1467899813, 1467899813),
(95, 68, 600, 'This is a payment of $600, for 25kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263717779296', 1467959363, 1467959363),
(96, 69, 250, 'This is a payment of $250, for 100kgs of Apples by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263773266499', 1468574770, 1468574770),
(97, 70, 25, 'This is a payment of $25, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263717779296', 1468824545, 1468824545),
(98, 71, 12.5, 'This is a payment of $12.5, for 10kgs of Apples by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263773266499', 1468839684, 1468839684),
(99, 72, 100, 'This is a payment of $100, for 40kgs of Apples by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263773266499', 1468839985, 1468839985),
(100, 72, 100, 'This is a payment of $100, for 40kgs of Apples by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263773266499', 1468844936, 1468844936),
(101, 73, 6.25, 'This is a payment of $6.25, for 5kgs of Apples by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263773266499', 1468911997, 1468911997),
(102, 74, 25, 'This is a payment of $25, for 10kgs of Apples by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/162525/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=a7576394-268f-474b-a0bc-e4727b2640a1', '162525', 'status', '263773266499', 1468913473, 1468913527),
(103, 75, 25, 'This is a payment of $25, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/162668/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=748041b9-f6d7-4a2e-9e63-2132077d842b', '162668', 'status', '263717779296', 1468928892, 1468928919),
(104, 76, 100, 'This is a payment of $100, for 20kgs of Lemons by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/162721/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d18df06e-8aad-40e9-ae6b-d36c703b7a7a', '162721', 'status', '263773266499', 1468934461, 1468934525),
(105, 77, 6.25, 'This is a payment of $6.25, for 5kgs of Apples by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/162819/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=64753f8e-cbf0-4ae1-ba95-cc5d0ca47723', '162819', 'status', '263773266499', 1468945960, 1468946013),
(106, 78, 18.75, 'This is a payment of $18.75, for 15kgs of Apples by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/163009/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=e8993eed-263b-4456-9d60-546290ac6911', '163009', 'status', '263773266499', 1469000257, 1469000338),
(107, 79, 5, 'This is a payment of $5, for 10kgs of Apples by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/163218/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=20435141-95ae-4000-9841-ed2e8a2b3984', '163218', 'status', '263773266499', 1469025136, 1469025181),
(108, 80, 2.5, 'This is a payment of $2.5, for 5kgs of Pineapple by Munyaradzi MuswerakuendaThe mobile number the payment information will be sent to is 263777000777', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/164275/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=92d6aaa8-baa9-4580-8340-64a53afffc12', '164275', 'status', '263777000777', 1469210990, 1469210991),
(109, 81, 25, 'This is a payment of $25, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/174070/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=f25afcb5-5b08-4a06-a331-558338c5a048', '174070', 'status', '263717779296', 1470572370, 1470572417),
(110, 82, 25, 'This is a payment of $25, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/174449/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=beb522e6-a684-4be9-a722-6a73e1524d1c', '174449', 'status', '263717779296', 1470658137, 1470658300),
(111, 83, 25, 'This is a payment of $25, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/174770/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=2f5d12c0-dc23-413f-9e56-e77a96cacbe1', '174770', 'status', '263717779296', 1470738391, 1470738596),
(112, 84, 480, 'This is a payment of $480, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/174771/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=0d068f73-8a8b-4e3c-8494-40d25586530b', '174771', 'status', '263717779296', 1470738653, 1470738654),
(113, 85, 25, 'This is a payment of $25, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/174775/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=f13ebb1e-abf1-4148-8e1e-0b2b98c275ae', '174775', 'status', '263717779296', 1470739260, 1470739364),
(114, 112, 350, 'This is a payment of $350, for 100kgs of Lemons by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179732/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=9c7828a6-6f1f-4df9-a2c1-6f2cc061cb7f', '179732', 'status', '263773266499', 1471508148, 1471508171),
(115, 113, 5.75, 'This is a payment of $5.75, for 25kgs of Apples by Eugene MuzvidziwaThe mobile number the payment information will be sent to is 263772811066', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179787/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=68acdec3-f2f3-40e4-85c6-4c282fc04203', '179787', 'status', '263772811066', 1471514472, 1471514493),
(116, 114, 60, 'This is a payment of $60, for 20kgs of Pineapple by Marjorie NapataThe mobile number the payment information will be sent to is 263772285739', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179882/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=aa7d2224-54f9-41c1-9c36-dfbab91018bb', '179882', 'status', '263772285739', 1471523423, 1471523447),
(117, 115, 500, 'This is a payment of $500, for 100kgs of Mazhanje by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/179928/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=b58e7896-71c2-4c27-aa25-8c59652abf70', '179928', 'status', '263773266499', 1471526213, 1471526236),
(118, 116, 1250, 'This is a payment of $1250, for 250kgs of Lemons by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/205430/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=f60512e2-3b0b-4d9a-bf54-ebb51a9ae4ad', '205430', 'status', '263773266499', 1475478876, 1475478935),
(119, 117, 80, 'This is a payment of $80, for 40kgs of Grapes by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/210583/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=c0346d7a-c7cc-4b8a-a60a-35353d05169a', '210583', 'status', '263773266499', 1476189504, 1476189539),
(120, 118, 180000, 'This is a payment of $180000, for 2000kgs of Avocado Pears by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/211590/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=181c7324-7d78-46de-beb8-c65d7e120f97', '211590', 'status', '263773266499', 1476344969, 1476344970),
(121, 119, 5000, 'This is a payment of $5000, for 10000kgs of Pineapple by Munyaradzi MuswerakuendaThe mobile number the payment information will be sent to is 263772271681', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/215676/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=481b2587-7984-4f14-83ef-0505f70569e0', '215676', 'status', '263772271681', 1476952876, 1476952880),
(122, 120, 200, 'This is a payment of $200, for 200kgs of Oranges by Munyaradzi MuswerakuendaThe mobile number the payment information will be sent to is 263772271681', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/221422/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=0c897c84-cdc7-4636-87c2-b7c37a18dc4b', '221422', 'status', '263772271681', 1477653047, 1477653048),
(123, 121, 100, 'This is a payment of $100, for 100kgs of Peaches by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/223284/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=84d30840-bb9a-464e-ad95-4fc1ed76265f', '223284', 'status', '263773266499', 1477897969, 1477898062),
(124, 122, 80, 'This is a payment of $80, for 40kgs of Grapes by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/223287/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=15c764f2-9ff9-4eb5-af55-742a254b7c37', '223287', 'status', '263773266499', 1477898037, 1477898072),
(125, 123, 100, 'This is a payment of $100, for 50kgs of Grapes by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/223303/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=74a8f109-7075-49c3-a86f-394762bb64a6', '223303', 'status', '263773266499', 1477899314, 1477899350),
(126, 124, 1, 'This is a payment of $1, for 5kgs of Maize Fresh by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/274899/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=3530e2b0-66f4-41e7-ac9d-1d6f6f07cbd3', '274899', 'status', '263773433318', 1484290929, 1484290931),
(127, 125, 5, 'This is a payment of $5, for 25kgs of Maize Fresh by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/274929/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=375806ac-f9c7-4f05-aae6-e3e334c34684', '274929', 'status', '263773433318', 1484293618, 1484293619),
(128, 126, 5, 'This is a payment of $5, for 25kgs of Maize Fresh by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263773433318', 1484293884, 1484293884),
(129, 126, 5, 'This is a payment of $5, for 25kgs of Maize Fresh by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263773433318', 1484293912, 1484293912),
(130, 126, 5, 'This is a payment of $5, for 25kgs of Maize Fresh by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'pending', 'browsurl', 'pollurl', '000000', 'status', '263773433318', 1484293941, 1484293941),
(131, 126, 5, 'This is a payment of $5, for 25kgs of Maize Fresh by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/274937/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=5ff719f4-34bb-45eb-98eb-149f46f842ef', '274937', 'status', '263773433318', 1484293971, 1484294082),
(132, 128, 10, 'This is a payment of $10, for 20kgs of Mazhanje by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/276600/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=6eacad6c-650d-4114-8d10-666835364133', '276600', 'status', '263717779296', 1484547977, 1484548050),
(133, 129, 32, 'This is a payment of $32, for 40kgs of Apples by Cephas MagavaThe mobile number the payment information will be sent to is 263772287875', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/377708/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=9c6587cb-e90a-45fa-b45c-e74b5446e35a', '377708', 'status', '263772287875', 1493720441, 1493720468),
(134, 132, 500, 'This is a payment of $500, for 1000kgs of Mazhanje by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395081/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=9f2c1918-f1c7-4e50-9ab7-6f8ec43e0f1c', '395081', 'status', '263717779296', 1495089447, 1495089471),
(135, 131, 16, 'This is a payment of $16, for 20kgs of Apples by Alvin2 VafanaThe mobile number the payment information will be sent to is 263773433318', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/395082/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=ce4d0094-2648-4394-8332-fb9a20d31d5f', '395082', 'status', '263773433318', 1495089448, 1495089449),
(136, 133, 4, 'This is a payment of $4, for 20kgs of Maize Fresh by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/396413/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d00c3f24-f659-4122-9dc6-ef18c38aee29', '396413', 'status', '263773266499', 1495199221, 1495199258),
(137, 134, 15, 'This is a payment of $15, for 30kgs of Mazhanje by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/400291/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=e95c26ca-7946-41f8-8ee2-08f5e0824a6e', '400291', 'status', '263773266499', 1495621459, 1495621478),
(138, 135, 100, 'This is a payment of $100, for 200kgs of Mazhanje by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/436599/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=2a32aab9-1fbe-4745-ad65-a3178313f965', '436599', 'status', '263773266499', 1498724164, 1498724187),
(139, 136, 360, 'This is a payment of $360, for 360kgs of Peaches by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/442328/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=61abc937-de93-46f6-bf68-697e97387c4a', '442328', 'status', '263773266499', 1499077761, 1499077779);
INSERT INTO `transactions` (`id`, `sale_id`, `amount`, `narrative`, `status`, `browseurl`, `pollurl`, `paynowRef`, `paymentStatus`, `mobile`, `created_at`, `updated_at`) VALUES
(140, 137, 150, 'This is a payment of $150, for 150kgs of Peaches by Schweppes Pvt (Ltd)The mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/445175/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=4b6a3293-e159-4c2f-8469-a41e558faa91', '445175', 'status', '263717779296', 1499239943, 1499240036),
(141, 138, 40, 'This is a payment of $40, for 20kgs of Grapes by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/456405/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=5dfb3f37-22f4-44bc-8aa8-f3a1f3d05eaf', '456405', 'status', '263773266499', 1499948251, 1499948279),
(142, 139, 60, 'This is a payment of $60, for 30kgs of Grapes by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/456503/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=df3f8b72-0366-4088-b8af-09b1e1eab95c', '456503', 'status', '263773266499', 1499951844, 1499951874),
(143, 140, 25, 'This is a payment of $25, for 25kgs of Peaches by Nyasha ChikwandaThe mobile number the payment information will be sent to is 263773266499', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/462885/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=4c227a18-9cc3-414d-8fbb-d0985bddd0d9', '462885', 'status', '263773266499', 1500450235, 1500450285),
(144, 141, 96, 'This is a payment of $96, for 120kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/470068/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=ab3d539c-a071-4705-9997-b16d75c8f700', '470068', 'status', '263717779296', 1500880446, 1500880468),
(145, 142, 8, 'This is a payment of $8, for 10kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/487206/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d9e2c1d7-d890-4327-8b7b-9ee7330af687', '487206', 'status', '263717779296', 1501744019, 1501744102),
(146, 143, 16, 'This is a payment of $16, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/488077/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=396634b2-6cf5-436b-98d3-fe29d7daabf4', '488077', 'status', '263717779296', 1501767779, 1501767865),
(147, 144, 16, 'This is a payment of $16, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/489087/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=bbf49036-7204-4ab3-b6bc-7a11653dcdc7', '489087', 'status', '263717779296', 1501833605, 1501833661),
(148, 145, 16, 'This is a payment of $16, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/494378/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=695b8d71-9b24-4196-84c8-3747da27ebf0', '494378', 'status', '263717779296', 1502132777, 1502132799),
(149, 146, 500, 'This is a payment of $500, for 1kgs of Tomatoes by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/494760/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=141ebeab-c40b-4efc-b775-ffe13adcd235', '494760', 'status', '263717779296', 1502178581, 1502178597),
(150, 147, 16, 'This is a payment of $16, for 20kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/494916/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=70d4c36c-11a2-4e07-8b85-eafbf39b8361', '494916', 'status', '263717779296', 1502183226, 1502183301),
(151, 148, 8, 'This is a payment of $8, for 10kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/495375/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=f138e6f9-9082-4b2b-abb2-66b6d5412848', '495375', 'status', '263717779296', 1502197877, 1502197955),
(152, 149, 8100, 'This is a payment of $8100, for 90kgs of Avocado Pears by Joao ChalecaThe mobile number the payment information will be sent to is 258843650854', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/497206/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=3d0d6b14-5630-4560-a3cc-f713b3c7cf45', '497206', 'status', '258843650854', 1502285989, 1502285990),
(153, 150, 40, 'This is a payment of $40, for 50kgs of Apples by Svodesai SitholeThe mobile number the payment information will be sent to is 263717779296', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/506421/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=97d2cbaf-058d-4a83-9ff0-d3f3a54153f2', '506421', 'status', '263717779296', 1502878243, 1502878457),
(154, 151, 80, 'This is a payment of $80, for 100kgs of Maize by Tatenda  VafanaThe mobile number the payment information will be sent to is 263773430399', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/537868/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=28346b7f-e8ac-4ba1-b651-9fb91dc6573f', '537868', 'status', '263773430399', 1504514698, 1504514752),
(155, 153, 100, 'This is a payment of $100, for 100kgs of Maize by ruth chimanikireThe mobile number the payment information will be sent to is 2634772586', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/902242/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=5df37652-8517-444a-a580-ca896657b1d2', '902242', 'status', '2634772586', 1518083198, 1518083199),
(156, 154, 120, 'This is a payment of $120, for 120kgs of Maize by Yolanda ManuhwaThe mobile number the payment information will be sent to is 263772586214', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/915002/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=20f3b87a-d6cc-424e-8997-eb9c37ec5484', '915002', 'status', '263772586214', 1518527417, 1518527417),
(157, 155, 10, 'This is a payment of $10, for 10kgs of Maize by Yolanda ManuhwaThe mobile number the payment information will be sent to is 263772586214', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/916553/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=a3e84ab1-8cd3-4daa-b404-934badef950b', '916553', 'status', '263772586214', 1518594070, 1518594076),
(158, 156, 100, 'This is a payment of $100, for 100kgs of Maize by Yolanda ManuhwaThe mobile number the payment information will be sent to is 263772586214', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/917584/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=8ee60460-fe60-4af4-bd7e-21f57f057a3f', '917584', 'status', '263772586214', 1518612815, 1518612816),
(159, 157, 20, 'This is a payment of $20, for 20kgs of Maize by Alvin VafanaThe mobile number the payment information will be sent to is 263772465888', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/1375526/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=25a5bec5-35c6-424a-bf7b-f55e201a2a8a', '1375526', 'status', '263772465888', 1532502353, 1532502389),
(160, 158, 8, 'This is a payment of $8, for 10kgs of Maize by Alvin VafanaThe mobile number the payment information will be sent to is 263772465888', 'Paid', 'https://www.paynow.co.zw/Payment/ConfirmPayment/1375541/onlinepayments@ttcs.co.zw/-/', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=3e2d1e8f-aff1-4a8c-8492-1dc9833d288e', '1375541', 'status', '263772465888', 1532502545, 1532502558),
(161, 159, 1000, 'This is a payment of $1000, for 1000kgs of Maize by Liberty MataruseThe mobile number the payment information will be sent to is 263717779296', 'Created', 'https://www.paynow.co.zw/Payment/ConfirmPayment/1535885/onlinepayments@ttcs.co.zw//', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=4bd7dfbd-8902-45bf-838d-f5b7a3bcf09c', '1535885', 'status', '263717779296', 1535967010, 1535967014);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'labour hours', 1477917159, 1477917159),
(2, 'litres', 1477917166, 1477917166),
(3, 'USD', 1477917174, 1477917174),
(4, 'kilograms', 1477917182, 1477917182);

-- --------------------------------------------------------

--
-- Table structure for table `userprofiles`
--

CREATE TABLE `userprofiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_mobile` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `natid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT 0,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `last_login` varchar(25) NOT NULL,
  `previous_login` varchar(25) NOT NULL DEFAULT '0',
  `login_hash` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `updated_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `activated`, `username`, `password`, `group_id`, `email`, `last_login`, `previous_login`, `login_hash`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, '263717779296', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 16, 'nchikwanda@ttcs.co.zw', '1582654778', '1582649180', '072546de3e36f16c6d09a1431dfe9049f0ba4419', 2, 1449133749, 1582654778),
(5, 1, '263772465888', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 1, 'tsitsi@gmail.com', '1545034378', '1544608522', 'd6a4f8ceca6ccfbb6cc5c0d655fd34cb170475c2', 5, 1451909170, 1545034378),
(10, 1, '263777000000', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'nyasha@gmail.com', '1458297085', '1457518696', '65696eb42582712dfc3f33db568d0e05765dc081', 10, 1455107194, 1458297085),
(11, 1, '263777000777', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'munya@gmail.com', '1475670019', '1473144814', '1fa42569de90c701df05863cea36f075111078c8', 11, 1455170882, 1475670019),
(14, 1, '263777999999', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'david@gmail.com', '0', '0', '', 0, 1455281047, 0),
(15, 1, '263775009238', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'lange@gmail.com', '0', '0', '', 0, 1455283439, 0),
(17, 1, '263772271681', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'mmuswerakuenda@ttcsglobal.com', '1504100800', '1502457341', '618bda4f2f26b28d173d645ad7c697679254955b', 17, 1455617479, 1504100800),
(18, 1, '263772560448', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'mmaphosa@ttcs.co.zw', '1455630614', '1455630134', 'a71a632da937e5593712cb3d526c01c366c91037', 18, 1455630095, 1455630614),
(19, 1, '263776009237', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'langes@gmail.com', '1456395627', '1456395587', '65dc12086a397ee76ddf7d7c30c77a484952182e', 19, 1455700361, 1456395627),
(21, 1, '263779009237', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'rudomoyo@gmail.com', '1455775293', '0', '6d7ad167f3226a0348db698f87142c90ed4b4d65', 21, 1455775280, 1455775293),
(22, 1, '263773111331', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'mchatikobo@gmail.com', '1455780009', '1455778480', '0fb077563dc951d635f804d24f5c9c5308da575b', 22, 1455776215, 1455780009),
(23, 1, '263775222332', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'tsithole@ttcs.co.zw', '1534314259', '1455783491', '13138415524199e524ddc5ba21a70a61fe5332f3', 23, 1455782895, 1534314259),
(24, 1, '263773430399', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'tatendaalvin@gmail.com', '1504517458', '1504515088', '7e9d37ee28d8cef2e175be70538b43c4fc0a2dea', 24, 1457689105, 1504517458),
(25, 1, '263773577817', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'amachingauta@ttcs.co.zw', '1458028138', '1458027884', '64dcc8264b841c52bf351d51ce8434b2bca8a21c', 25, 1458027831, 1458028138),
(26, 1, '263774609218', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'leey@mat.com', '1463478707', '1463474589', 'cb6b8619ab2eab0503bdc7755d6d249d6db13bd8', 0, 1463474568, 1484033489),
(27, 1, '263774000111', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'peshy@test.local', '1464955340', '0', 'f2a74df63db275ad27285cdab28ca88dbd84ed71', 27, 1464955332, 1464955340),
(28, 1, '263774100200', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'lierty2@test.local', '1464960782', '0', 'f23303f9db08810b71c82d613b8d8aad73e626c7', 28, 1464960761, 1464960782),
(29, 1, '263773266499', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'nchikwanda@ttcs.co.zw', '1500881305', '1500880884', '9ea0658e63264773f80676b992f86b1972e5de03', 29, 1466499759, 1500881305),
(30, 1, '26371200300', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'leey@gmail.com', '1466595497', '1466595308', 'bde610622b8e51cbf3d078b5e25905fde2741b70', 30, 1466595297, 1466595497),
(31, 1, '263775100200', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'chiedza@ttcs.co.zw', '1467874019', '0', 'abc1406e13670e1917458c1040277aa8082bbff0', 31, 1467874006, 1467874019),
(32, 1, '263772287875', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'cmagava@ttcs.co.zw', '1517995450', '1517994210', 'd9f64c222739634de4d6cce99a56bd98eb8cb6ff', 32, 1467875654, 1517995450),
(33, 0, '2637123004000', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'user1@ama.co.zw', '1468917253', '1468917170', '1fd780b34b80c610b47d6a061ddf449e4cd5ac40', 33, 1468826503, 1468917253),
(34, 1, '2637125006000', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'user1@boka.co.zw', '1470044294', '0', 'ab44a903b1f47380473b5184c73b5151500989b8', 34, 1468826548, 1470044294),
(35, 1, '263774235976', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'lmataruse2@ttcsglobal.com', '1468837545', '0', 'ab1b63dfc1ca24146badc17e1780cafa680db789', 35, 1468837532, 1468837545),
(37, 1, '263775967999', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'paulnyarugwe@yahoo.com', '1470745980', '0', '4ee5af18def0d72daa4e76a0d7afe23e7bd1c728', 37, 1470745955, 1470745980),
(38, 1, '263772285739', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'nnapata@ttcs.co.zw', '1517919260', '1517912816', '47215e67d734eec6ee637f7b5f2932ddd08ccd6b', 38, 1471440862, 1517919260),
(39, 1, '263739123650', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'nmkandla@ttcsglobal.com', '1471524167', '1471519976', 'a818373426ef9a04665e8377d8fcf8b38f0ce2ee', 39, 1471445088, 1471524167),
(40, 1, '263772811066', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'emuzvidziwa@ttcs.co.zw', '1471514026', '1471513117', 'e116b4c5246dbb73812a3d7064f1a12dc228327a', 40, 1471508918, 1471514026),
(41, 1, '263773437387', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'dchirisa@ttcs.co.zw', '1471525486', '1471524836', '155b0e6f639005cd4607b0e29b07196b4bf5cbf3', 41, 1471524809, 1471525486),
(42, 1, '263774330318', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'avafana@ttcglobal.com', '1475151018', '1475150991', 'd1403500f24643a7d125a6f459bf435f45678dc6', 42, 1473153367, 1475151018),
(43, 1, '2637777777', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'aa@gmail.com', '0', '0', '', 0, 1473168778, 0),
(44, 1, '26377777771', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'aa1@gmail.com', '0', '0', '', 0, 1473169135, 0),
(45, 1, '263773431318', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'alvintvafana23@gmail.com', '0', '0', '', 0, 1473230106, 0),
(46, 1, '263773432318', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'alvintvafana24@gmail.com', '0', '0', '', 0, 1473230145, 0),
(47, 1, '263773433318', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'alvintvafana25@gmail.com', '1501744394', '1500457217', 'cab81f718a5c66936b027a45b0f5f04a6d31b66e', 47, 1473230227, 1501744394),
(48, 1, '263773434318', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'alvintvafana26@gmail.com', '0', '0', '', 0, 1473230271, 0),
(49, 1, 'Vafana', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'a@aaa.com', '1473424207', '1473410257', 'c3d3fc34dc965cd618d093247035e514734e6e89', 49, 1473230720, 1473424207),
(50, 1, '263773420317', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'b@b.com', '1536652336', '1473933472', 'b3ebe99f650ceaf87f729c352495fdc0e83a14bc', 50, 1473233492, 1536652336),
(51, 1, '12345678', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'aaaa@gmail.com', '0', '0', '', 50, 1473234316, 0),
(52, 1, '263773121212', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'shingiv@gmail.com', '0', '0', '', 50, 1473240307, 0),
(53, 1, '263773123124', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 't.mpofu@globaltech.com', '1477840434', '1477488629', 'aee637731aa7cf9b0a95405674746d2ae33ea43c', 53, 1474372009, 1477840434),
(54, 1, '263773218634', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'selu@gmail.com', '1474372786', '0', '69512ebdc4c011e72a4262d7bfaa16a45bcbc263', 54, 1474372760, 1474372786),
(55, 1, '00263772271681', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'mmuswerakuenda@gmail.com', '0', '0', '', 0, 1474389808, 0),
(56, 1, '263782382370', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'kmurimba@ttcsglobal.com', '0', '0', '', 0, 1476972262, 0),
(57, 1, '263772887738', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'chimukaoliver@gmail.com', '1500992346', '1500990702', 'f65a60dfe0e9ed2a94495895febce740d4965e74', 57, 1484038364, 1500992346),
(58, 1, '258823059135', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'paul@brandcomercial.com', '1502966106', '1502119676', '85d0e1cbb6e2769e368fb80f730a3a42c5a4dbbc', 58, 1501744134, 1502966106),
(59, 1, '263774609200', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'chipo.rusere@xds.co.zw', '1502272531', '0', '266828640d38a9a98527f6009f70e53c9308c58c', 59, 1502272503, 1502272531),
(60, 1, '258843650854', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'joao.chaleca@ebs.co.mz', '1502965179', '1502954726', 'c518e76be41cb6a313908b939607412858da8615', 60, 1502272765, 1502965179),
(61, 1, '263777037150', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'maxwell@springware.co.zw', '1502273122', '0', '7b75e401f2373c727d2a6c40e9331484bc47d5e4', 61, 1502272935, 1502273122),
(62, 1, '263712938771', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'leanda@gmail.com', '1502273281', '0', 'fd23c73b8ceed582c204b6beba236f96423f124c', 62, 1502273264, 1502273281),
(63, 1, '258848870782', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'david.miambo@ebs.co.mz', '1502279975', '0', '279d46331eaa0770ff8985c1fc6ba51865536789', 63, 1502279926, 1502279975),
(64, 1, '773782077', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'gmapindu@ttcsglobal.com', '1502359940', '1502351667', '6b97cc93ab1b2d7d9517257517502c61f7acc559', 64, 1502351641, 1502359940),
(65, 1, '263782737456', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'silent.magwa@gmail.com', '1503316772', '0', '31c217d6b2e0219b0c0024049c07897ed26f0885', 65, 1503316756, 1503316772),
(66, 1, '263774373456', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'henry@gmail.com', '1503923978', '1503923918', '2c128d1889d0a74ada7574282fd18d04efe682d1', 66, 1503923886, 1503923978),
(67, 1, '0772886789', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'gjongwe@gmail.com', '0', '0', '', 0, 1503930398, 0),
(68, 1, '0773456456', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'eshay@gmail.com', '0', '0', '', 0, 1503988481, 0),
(69, 0, '0775776776', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'tmany@gmail.com', '0', '0', '', 0, 1503988666, 0),
(70, 1, '0772772772', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'fchivasa@gmail.com', '0', '0', '', 0, 1503988810, 0),
(71, 1, '0775775775', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'fmuguza@gmail.com', '1504515167', '1504515141', 'a793ea649863710515961acf8b30e089393ff21e', 71, 1503990137, 1504515167),
(72, 0, '263774609219', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'mirriam@gmail.com', '1517900073', '0', '5af1b54373beb0834cca331a4f2850e9e3b7756e', 72, 1517900054, 1517900073),
(74, 1, '263775009266', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'svodesaitariro1@yahoo.com', '1517902087', '1517901361', 'be55e5ce2098ba41b4aa9fceb52b417357ed179c', 74, 1517901343, 1517902087),
(75, 1, '263775009267', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'svodesaitariro2@yahoo.com', '0', '0', '', 0, 1517902762, 0),
(76, 1, '263775978555', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'cgutu@ttcsglobal.com', '1518082331', '1518080035', '469f912a830b128506417d9e00d0fe87c595488a', 76, 1517910390, 1518082331),
(77, 1, '263772586214', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'ymanuhwa@ttcsglobal.com', '1523622945', '1518675731', 'e061438d0d0bfb1668595442107503b053c162d9', 77, 1517910404, 1523622945),
(78, 1, '263772651784', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'jmuganda@gmail.com', '1518096132', '1518095787', '1f2a69f6172042a89e4b652d3981090e3ce88e9f', 78, 1518080752, 1518096132),
(79, 1, '263773675234', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'johnm1234@yahoo.com', '1518080979', '0', '6c35f0fbf4ff7984206d58a3fc1cc4554a2f157a', 79, 1518080887, 1518080979),
(80, 1, '263772000000', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'pkazonda1234@yahoo.com', '1518082439', '1518082315', '36b2af61d89ce25c1b85e86d60439d862d1180cf', 80, 1518082265, 1518082439),
(81, 1, '2634772586', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'rchimanikire@gmail.com', '1518082418', '0', '7becfc538f3ff84b4c0ad8be058d7a3e2c991917', 81, 1518082274, 1518082418),
(82, 1, '263773132288', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'togara@yahoo.cm', '1518092496', '0', 'c1eeab8f302e499e2e11c4378dc237ce5048ae03', 82, 1518092392, 1518092496),
(83, 1, '263735925707', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'amakundamhuka@ttcsglobal.com', '1518420194', '1518419642', '00724b46221ea6fbd4c527e860c37911936ce54e', 83, 1518419623, 1518420194),
(84, 1, '263784601968', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'pchakauya@ttcsglobal.com', '1518505680', '1518440990', 'caa7425d52a486829ec6eab81f4bf6458c3a33bc', 84, 1518439592, 1518505680),
(85, 1, '263777970079', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'imutasa@ttcsglobal.com', '0', '0', '', 0, 1518526198, 0),
(101, 0, '263775009246', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'svodesaitariro22@gmail.com', '0', '0', '', 2, 1536919256, 0),
(217, 0, '0718998719', 'iwqM49R0A2i8bzKOcGEoFTzQld34VcYVO2AXb/WqCFk=', 0, 'final@gkmgail.com', '0', '0', '', 0, 1537884017, 0),
(227, 0, '0786898388', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'promiax@gbylk.com', '0', '0', '', 0, 1539677086, 0),
(228, 0, '0786898488', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'promax@gbylk.com', '0', '0', '', 0, 1539677284, 0),
(229, 0, '0786898489', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'promax@glk.com', '0', '0', '', 0, 1539677514, 0),
(240, 0, '0734516361', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'paymenttest@test123.com', '0', '0', '', 2, 1539941934, 0),
(241, 0, '0734516461', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'payment@test123.com', '0', '0', '', 2, 1539943804, 0),
(242, 0, '0784516368', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'pay@pay.com', '0', '0', '', 2, 1539950359, 0),
(243, 0, '0784156361', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'pay@payme.com', '0', '0', '', 2, 1539950720, 0),
(244, 0, '0775431280', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'jnyashanu@ttcsglobal.com', '0', '0', '', 2, 1541752940, 0),
(245, 0, '0775431281', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'svodesaitariro@gmail4.com', '0', '0', '', 2, 1541754582, 0),
(246, 0, '0773100200', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'testing@gmail.com', '0', '0', '', 2, 1543389744, 0),
(247, 0, '0772355001', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'gmbtest2@gmb.com', '0', '0', '', 2, 1543499671, 0),
(249, 0, '0771111111', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'promjo@promjo.com', '0', '0', '', 2, 1543839302, 0),
(250, 0, '0777777111', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'tarsith@tarsith.com', '0', '0', '', 2, 1544433531, 0),
(251, 0, '0716587644', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'augostino@gmail.com', '0', '0', '', 2, 1544779358, 0),
(252, 0, '0700000000', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'bamuamon@gmb.co.zw', '0', '0', '', 2, 1544795835, 0),
(253, 0, '0719387579', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'kidkudzy@gmail4.com', '0', '0', '', 2, 1582483041, 0),
(254, 0, '0719387571', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'kidkudzy@gmail1.com', '0', '0', '', 2, 1582483253, 0),
(255, 0, '0719387574', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', 0, 'kidkudzy@gmail3w.com', '0', '0', '', 2, 1582483804, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersold`
--

CREATE TABLE `usersold` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersold`
--

INSERT INTO `usersold` (`id`, `first_name`, `last_name`, `email`, `address_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'ttt', 'ttata', 'tttt', 1, 1, NULL, NULL),
(2, 'alvin', 'ttt', 'a@f.com', 1, 1, 1447060555, 1447060555);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `updated_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(16, 'None', 0, 1448879461, 0),
(17, 'Agritax', 1, 1448888619, 0),
(18, 'CSC', 1, 1448892857, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_group_roles`
--

CREATE TABLE `users_group_roles` (
  `group_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_group_roles`
--

INSERT INTO `users_group_roles` (`group_id`, `role_id`) VALUES
(18, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users_metadata`
--

CREATE TABLE `users_metadata` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `key` varchar(20) NOT NULL,
  `value` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `updated_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_metadata`
--

INSERT INTO `users_metadata` (`id`, `parent_id`, `key`, `value`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 2, 'first_name', 'Nyasha', 2, 1449133749, 1582654485),
(5, 2, 'last_name', 'Chikwanda', 2, 1449133749, 1582654485),
(6, 2, 'address_id', '', 2, 1449133750, 1582654485),
(8, 2, 'enabled', '1', 0, 0, 0),
(9, 3, 'first_name', 'Tariro', 2, 1449482259, 0),
(10, 3, 'last_name', 'Sithole', 2, 1449482259, 0),
(11, 3, 'address_id', '26', 2, 1449482260, 0),
(12, 3, 'enabled', '0', 2, 1449482260, 0),
(17, 5, 'first_name', 'Alvin', 0, 1451909170, 0),
(18, 5, 'last_name', 'Vafana', 0, 1451909170, 0),
(19, 5, 'address_id', '28', 0, 1451909170, 0),
(20, 5, 'enabled', '0', 2, 1451909170, 1582477665),
(37, 10, 'first_name', 'Nyasha', 0, 1455107194, 0),
(38, 10, 'last_name', 'Chikwanda', 0, 1455107194, 0),
(39, 10, 'address_id', '40', 0, 1455107194, 0),
(40, 10, 'enabled', '1', 0, 1455107194, 0),
(41, 11, 'first_name', 'Munyaradzi', 0, 1455170882, 0),
(42, 11, 'last_name', 'Muswerakuenda', 0, 1455170883, 0),
(43, 11, 'address_id', '41', 0, 1455170883, 0),
(44, 11, 'enabled', '1', 0, 1455170883, 0),
(53, 14, 'first_name', 'David', 0, 1455281048, 0),
(54, 14, 'last_name', 'Doe', 0, 1455281048, 0),
(55, 14, 'address_id', '46', 0, 1455281048, 0),
(56, 14, 'enabled', '1', 0, 1455281048, 0),
(57, 15, 'first_name', 'Lange', 0, 1455283439, 0),
(58, 15, 'last_name', 'Chimanya', 0, 1455283439, 0),
(59, 15, 'address_id', '48', 0, 1455283439, 0),
(60, 15, 'enabled', '1', 0, 1455283439, 0),
(65, 17, 'first_name', 'Munyaradzi', 0, 1455617479, 0),
(66, 17, 'last_name', 'Muswerakuenda', 0, 1455617479, 0),
(67, 17, 'address_id', '', 17, 1455617479, 1501579839),
(68, 17, 'enabled', '1', 0, 1455617479, 0),
(69, 18, 'first_name', 'Derek', 0, 1455630095, 0),
(70, 18, 'last_name', 'Maphosa', 0, 1455630095, 0),
(71, 18, 'address_id', '55', 0, 1455630095, 0),
(72, 18, 'enabled', '1', 0, 1455630095, 0),
(73, 19, 'first_name', 'Langelihle', 0, 1455700361, 0),
(74, 19, 'last_name', 'Chimanya', 0, 1455700361, 0),
(75, 19, 'address_id', '59', 0, 1455700361, 0),
(76, 19, 'enabled', '1', 0, 1455700361, 0),
(81, 21, 'first_name', 'Rudo', 0, 1455775280, 0),
(82, 21, 'last_name', 'Moyo', 0, 1455775280, 0),
(83, 21, 'address_id', '86', 0, 1455775280, 0),
(84, 21, 'enabled', '1', 0, 1455775280, 0),
(85, 22, 'first_name', 'Moses', 0, 1455776215, 0),
(86, 22, 'last_name', 'Chatikobo', 0, 1455776215, 0),
(87, 22, 'address_id', '90', 0, 1455776215, 0),
(88, 22, 'enabled', '1', 0, 1455776215, 0),
(89, 23, 'first_name', 'Tariro', 0, 1455782895, 0),
(90, 23, 'last_name', 'Sithole', 0, 1455782895, 0),
(91, 23, 'address_id', '93', 0, 1455782895, 0),
(92, 23, 'enabled', '1', 0, 1455782895, 0),
(93, 24, 'first_name', 'Tatenda ', 0, 1457689105, 0),
(94, 24, 'last_name', 'Vafana', 0, 1457689105, 0),
(95, 24, 'address_id', '104', 0, 1457689105, 0),
(96, 24, 'enabled', '1', 0, 1457689105, 0),
(97, 25, 'first_name', 'ALWIN', 0, 1458027831, 0),
(98, 25, 'last_name', 'Machingauta', 0, 1458027831, 0),
(99, 25, 'address_id', '106', 0, 1458027831, 0),
(100, 25, 'enabled', '1', 0, 1458027831, 0),
(101, 26, 'first_name', 'leey', 0, 1463474568, 0),
(102, 26, 'last_name', 'mat', 0, 1463474568, 0),
(103, 26, 'address_id', '108', 0, 1463474568, 0),
(104, 26, 'enabled', '1', 2, 1463474568, 1463481743),
(105, 27, 'first_name', 'Patience', 0, 1464955332, 0),
(106, 27, 'last_name', 'Mataruse', 0, 1464955332, 0),
(107, 27, 'address_id', '111', 0, 1464955332, 0),
(108, 27, 'enabled', '1', 0, 1464955332, 0),
(109, 28, 'first_name', 'Liberty2', 0, 1464960761, 0),
(110, 28, 'last_name', 'Mataruse2', 0, 1464960761, 0),
(111, 28, 'address_id', '112', 0, 1464960761, 0),
(112, 28, 'enabled', '1', 0, 1464960761, 0),
(113, 29, 'first_name', 'Nyasha', 0, 1466499759, 0),
(114, 29, 'last_name', 'Chikwanda', 0, 1466499759, 0),
(115, 29, 'address_id', '116', 0, 1466499759, 0),
(116, 29, 'enabled', '0', 2, 1466499759, 1544602123),
(117, 30, 'first_name', 'Leey', 0, 1466595297, 0),
(118, 30, 'last_name', 'Mataruse', 0, 1466595297, 0),
(119, 30, 'address_id', '118', 0, 1466595297, 0),
(120, 30, 'enabled', '1', 0, 1466595297, 0),
(121, 31, 'first_name', 'Chiedza', 0, 1467874006, 0),
(122, 31, 'last_name', 'Mutero', 0, 1467874006, 0),
(123, 31, 'address_id', '121', 0, 1467874006, 0),
(124, 31, 'enabled', '1', 0, 1467874006, 0),
(125, 32, 'first_name', 'Cephas', 0, 1467875654, 0),
(126, 32, 'last_name', 'Magava', 0, 1467875654, 0),
(127, 32, 'address_id', '124', 0, 1467875654, 0),
(128, 32, 'enabled', '1', 0, 1467875654, 0),
(129, 33, 'first_name', 'Amahle', 0, 1468826503, 0),
(130, 33, 'last_name', 'Moyo', 0, 1468826503, 0),
(131, 33, 'address_id', '126', 0, 1468826503, 0),
(132, 33, 'enabled', '1', 0, 1468826503, 0),
(133, 34, 'first_name', 'Bongani', 0, 1468826548, 0),
(134, 34, 'last_name', 'Ndlovu', 0, 1468826548, 0),
(135, 34, 'address_id', '127', 0, 1468826548, 0),
(136, 34, 'enabled', '1', 0, 1468826548, 0),
(137, 35, 'first_name', 'Liberty', 0, 1468837532, 0),
(138, 35, 'last_name', 'Mataruse', 0, 1468837532, 0),
(139, 35, 'address_id', '128', 0, 1468837532, 0),
(140, 35, 'enabled', '1', 0, 1468837532, 0),
(145, 37, 'first_name', 'paul', 0, 1470745955, 0),
(146, 37, 'last_name', 'nyarugwe', 0, 1470745955, 0),
(147, 37, 'address_id', '130', 0, 1470745955, 0),
(148, 37, 'enabled', '1', 0, 1470745955, 0),
(149, 38, 'first_name', 'Marjorie', 0, 1471440862, 0),
(150, 38, 'last_name', 'Napata', 0, 1471440862, 0),
(151, 38, 'address_id', '131', 0, 1471440862, 0),
(152, 38, 'enabled', '1', 0, 1471440862, 0),
(153, 39, 'first_name', 'Nkosana', 0, 1471445088, 0),
(154, 39, 'last_name', 'Mkandla', 0, 1471445088, 0),
(155, 39, 'address_id', '134', 0, 1471445088, 0),
(156, 39, 'enabled', '1', 0, 1471445088, 0),
(157, 40, 'first_name', 'Eugene', 0, 1471508918, 0),
(158, 40, 'last_name', 'Muzvidziwa', 0, 1471508918, 0),
(159, 40, 'address_id', '141', 0, 1471508918, 0),
(160, 40, 'enabled', '1', 0, 1471508918, 0),
(161, 41, 'first_name', 'Diamond', 0, 1471524809, 0),
(162, 41, 'last_name', 'Chirisa', 0, 1471524809, 0),
(163, 41, 'address_id', '146', 0, 1471524809, 0),
(164, 41, 'enabled', '1', 0, 1471524809, 0),
(165, 42, 'first_name', 'Tatenda', 42, 1473153367, 1473927027),
(166, 42, 'last_name', 'Vafan', 42, 1473153367, 1474377024),
(167, 42, 'address_id', '', 42, 1473153367, 1474377024),
(168, 42, 'company', '1', 0, 1473153367, 0),
(169, 42, 'company_contact', '1', 0, 1473153367, 0),
(170, 42, 'admin', '1', 0, 1473153367, 0),
(171, 42, 'enabled', '1', 0, 1473153367, 0),
(172, 43, 'first_name', 'Alvin', 0, 1473168778, 0),
(173, 43, 'last_name', 'Vafana', 0, 1473168778, 0),
(174, 43, 'address_id', '149', 0, 1473168778, 0),
(175, 43, 'company', '2', 0, 1473168778, 0),
(176, 43, 'company_contact', '1', 0, 1473168778, 0),
(177, 43, 'admin', '1', 0, 1473168778, 0),
(178, 43, 'enabled', '1', 0, 1473168778, 0),
(179, 44, 'first_name', 'Alvin', 0, 1473169135, 0),
(180, 44, 'last_name', 'Vafana', 0, 1473169135, 0),
(181, 44, 'address_id', '151', 0, 1473169136, 0),
(182, 44, 'company', '4', 0, 1473169136, 0),
(183, 44, 'company_contact', '1', 0, 1473169136, 0),
(184, 44, 'admin', '1', 0, 1473169136, 0),
(185, 44, 'enabled', '1', 0, 1473169136, 0),
(186, 45, 'first_name', 'Alvin', 0, 1473230106, 0),
(187, 45, 'last_name', 'Vafana', 0, 1473230106, 0),
(188, 45, 'address_id', '152', 0, 1473230106, 0),
(189, 45, 'company', '5', 0, 1473230106, 0),
(190, 45, 'company_contact', '1', 0, 1473230106, 0),
(191, 45, 'admin', '1', 0, 1473230106, 0),
(192, 45, 'enabled', '1', 0, 1473230106, 0),
(193, 46, 'first_name', 'Alvin', 0, 1473230145, 0),
(194, 46, 'last_name', 'Vafana', 0, 1473230146, 0),
(195, 46, 'address_id', '154', 0, 1473230146, 0),
(196, 46, 'company', '7', 0, 1473230146, 0),
(197, 46, 'company_contact', '1', 0, 1473230146, 0),
(198, 46, 'admin', '1', 0, 1473230146, 0),
(199, 46, 'enabled', '1', 0, 1473230146, 0),
(200, 47, 'first_name', 'Alvin2', 0, 1473230227, 0),
(201, 47, 'last_name', 'Vafana', 0, 1473230227, 0),
(202, 47, 'address_id', '156', 0, 1473230227, 0),
(203, 47, 'company', '9', 0, 1473230227, 0),
(204, 47, 'company_contact', '1', 0, 1473230227, 0),
(205, 47, 'admin', '1', 0, 1473230227, 0),
(206, 47, 'enabled', '1', 0, 1473230228, 0),
(207, 48, 'first_name', 'Alvin2', 0, 1473230271, 0),
(208, 48, 'last_name', 'Vafana', 0, 1473230271, 0),
(209, 48, 'address_id', '157', 0, 1473230271, 0),
(210, 48, 'company', '10', 0, 1473230271, 0),
(211, 48, 'company_contact', '1', 0, 1473230271, 0),
(212, 48, 'admin', '1', 0, 1473230271, 0),
(213, 48, 'enabled', '1', 0, 1473230271, 0),
(214, 49, 'first_name', 'Alvin', 49, 1473230720, 1473424256),
(215, 49, 'last_name', 'vafana', 49, 1473230721, 1473424256),
(216, 49, 'address_id', '', 49, 1473230721, 1473424256),
(217, 49, 'company', '11', 0, 1473230721, 0),
(218, 49, 'company_contact', '1', 0, 1473230721, 0),
(219, 49, 'admin', '1', 0, 1473230721, 0),
(220, 49, 'enabled', '1', 0, 1473230721, 0),
(221, 50, 'first_name', 'Blessing', 0, 1473233492, 0),
(222, 50, 'last_name', 'Batsirai', 0, 1473233492, 0),
(223, 50, 'address_id', '159', 0, 1473233492, 0),
(224, 50, 'company', '12', 0, 1473233492, 0),
(225, 50, 'company_contact', '1', 0, 1473233492, 0),
(226, 50, 'admin', '1', 0, 1473233492, 0),
(227, 50, 'enabled', '1', 0, 1473233492, 0),
(228, 51, 'first_name', 'Pop', 50, 1473234316, 0),
(229, 51, 'last_name', 'Alvin', 50, 1473234316, 0),
(230, 51, 'enabled', '1', 50, 1473234316, 0),
(231, 52, 'first_name', 'Shingi ', 50, 1473240307, 0),
(232, 52, 'last_name', 'Vafana', 50, 1473240307, 0),
(233, 52, 'address_id', '159', 50, 1473240307, 0),
(234, 52, 'company', '12', 50, 1473240307, 0),
(235, 52, 'company_contact', '1', 50, 1473240307, 0),
(236, 52, 'admin', '1', 50, 1473240307, 0),
(237, 52, 'enabled', '0', 50, 1473240307, 1473249426),
(238, 53, 'first_name', 'Tate', 0, 1474372009, 0),
(239, 53, 'last_name', 'Mpofu', 0, 1474372009, 0),
(240, 53, 'address_id', '', 53, 1474372009, 1475144665),
(241, 53, 'company', '13', 0, 1474372009, 0),
(242, 53, 'company_contact', '1', 0, 1474372009, 0),
(243, 53, 'admin', '1', 0, 1474372009, 0),
(244, 53, 'enabled', '1', 0, 1474372009, 0),
(245, 54, 'first_name', 'Selu', 0, 1474372760, 0),
(246, 54, 'last_name', 'Moyo', 0, 1474372760, 0),
(247, 54, 'address_id', '163', 0, 1474372760, 0),
(248, 54, 'enabled', '1', 0, 1474372760, 0),
(249, 55, 'first_name', 'Munyaradzi ', 0, 1474389808, 0),
(250, 55, 'last_name', 'Muswerakuenda', 0, 1474389808, 0),
(251, 55, 'address_id', '164', 0, 1474389808, 0),
(252, 55, 'enabled', '1', 0, 1474389808, 0),
(253, 56, 'first_name', 'Komborerai', 0, 1476972262, 0),
(254, 56, 'last_name', 'Murimba', 0, 1476972262, 0),
(255, 56, 'address_id', '166', 0, 1476972262, 0),
(256, 56, 'enabled', '1', 0, 1476972262, 0),
(257, 57, 'first_name', 'Oliver ', 0, 1484038364, 0),
(258, 57, 'last_name', 'Chimuka', 0, 1484038364, 0),
(259, 57, 'address_id', '168', 0, 1484038364, 0),
(260, 57, 'enabled', '1', 0, 1484038364, 0),
(261, 58, 'first_name', 'Paul', 0, 1501744134, 0),
(262, 58, 'last_name', 'Chiobvu', 0, 1501744134, 0),
(263, 58, 'address_id', '195', 0, 1501744134, 0),
(264, 58, 'enabled', '1', 0, 1501744134, 0),
(265, 59, 'first_name', 'Chipo', 0, 1502272503, 0),
(266, 59, 'last_name', 'Rusere', 0, 1502272503, 0),
(267, 59, 'address_id', '198', 0, 1502272503, 0),
(268, 59, 'enabled', '1', 0, 1502272503, 0),
(269, 60, 'first_name', 'Joao', 0, 1502272765, 0),
(270, 60, 'last_name', 'Chaleca', 0, 1502272765, 0),
(271, 60, 'address_id', '199', 0, 1502272765, 0),
(272, 60, 'enabled', '1', 0, 1502272765, 0),
(273, 61, 'first_name', 'Maxwell', 0, 1502272935, 0),
(274, 61, 'last_name', 'Maoneke', 0, 1502272935, 0),
(275, 61, 'address_id', '200', 0, 1502272935, 0),
(276, 61, 'company', '14', 0, 1502272935, 0),
(277, 61, 'company_contact', '1', 0, 1502272935, 0),
(278, 61, 'admin', '1', 0, 1502272935, 0),
(279, 61, 'enabled', '1', 0, 1502272935, 0),
(280, 62, 'first_name', 'Leanda', 0, 1502273264, 0),
(281, 62, 'last_name', 'Kandiero', 0, 1502273264, 0),
(282, 62, 'address_id', '201', 0, 1502273264, 0),
(283, 62, 'enabled', '1', 0, 1502273264, 0),
(284, 63, 'first_name', 'David', 0, 1502279926, 0),
(285, 63, 'last_name', 'Miambo', 0, 1502279926, 0),
(286, 63, 'address_id', '202', 0, 1502279926, 0),
(287, 63, 'enabled', '1', 0, 1502279926, 0),
(288, 64, 'first_name', 'kelvin', 0, 1502351641, 0),
(289, 64, 'last_name', 'mapindu', 0, 1502351641, 0),
(290, 64, 'address_id', '203', 0, 1502351641, 0),
(291, 64, 'enabled', '1', 0, 1502351641, 0),
(292, 65, 'first_name', 'Silent', 0, 1503316756, 0),
(293, 65, 'last_name', 'Magwa', 0, 1503316756, 0),
(294, 65, 'address_id', '205', 0, 1503316756, 0),
(295, 65, 'enabled', '1', 0, 1503316756, 0),
(296, 66, 'first_name', 'Henry', 0, 1503923886, 0),
(297, 66, 'last_name', 'Musara', 0, 1503923886, 0),
(298, 66, 'address_id', '206', 0, 1503923886, 0),
(299, 66, 'enabled', '1', 0, 1503923886, 0),
(300, 67, 'first_name', 'george', 0, 1503930398, 0),
(301, 67, 'last_name', 'jongwe', 0, 1503930398, 0),
(302, 67, 'address_id', '207', 0, 1503930398, 0),
(303, 67, 'enabled', '1', 0, 1503930398, 0),
(304, 68, 'first_name', 'enoch', 0, 1503988481, 0),
(305, 68, 'last_name', 'shayamano', 0, 1503988481, 0),
(306, 68, 'address_id', '208', 0, 1503988481, 0),
(307, 68, 'enabled', '1', 0, 1503988481, 0),
(308, 69, 'first_name', 'tambudzai', 0, 1503988666, 0),
(309, 69, 'last_name', 'manyeruke', 0, 1503988666, 0),
(310, 69, 'address_id', '209', 0, 1503988666, 0),
(311, 69, 'enabled', '1', 0, 1503988666, 0),
(312, 70, 'first_name', 'fidelis', 0, 1503988810, 0),
(313, 70, 'last_name', 'chivasa', 0, 1503988810, 0),
(314, 70, 'address_id', '210', 0, 1503988810, 0),
(315, 70, 'enabled', '1', 0, 1503988810, 0),
(316, 71, 'first_name', 'farai', 0, 1503990137, 0),
(317, 71, 'last_name', 'muguza', 0, 1503990137, 0),
(318, 71, 'address_id', '211', 0, 1503990137, 0),
(319, 71, 'enabled', '1', 0, 1503990137, 0),
(320, 72, 'first_name', 'Mirriam ', 0, 1517900054, 0),
(321, 72, 'last_name', 'Chikwanha', 0, 1517900054, 0),
(322, 72, 'address_id', '216', 0, 1517900054, 0),
(323, 72, 'enabled', '1', 0, 1517900054, 0),
(324, 73, 'first_name', 'Susan', 0, 1517900853, 0),
(325, 73, 'last_name', 'Sithole', 0, 1517900853, 0),
(326, 73, 'address_id', '217', 0, 1517900853, 0),
(327, 73, 'enabled', '1', 0, 1517900853, 0),
(328, 74, 'first_name', 'Susan', 0, 1517901343, 0),
(329, 74, 'last_name', 'Sithole', 0, 1517901343, 0),
(330, 74, 'address_id', '218', 0, 1517901343, 0),
(331, 74, 'enabled', '1', 0, 1517901343, 0),
(332, 75, 'first_name', 'Ruth', 0, 1517902762, 0),
(333, 75, 'last_name', 'Ruvimbo', 0, 1517902762, 0),
(334, 75, 'address_id', '219', 0, 1517902762, 0),
(335, 75, 'enabled', '1', 0, 1517902762, 0),
(336, 76, 'first_name', 'Chiedza Lebogang', 0, 1517910390, 0),
(337, 76, 'last_name', 'Gutu', 0, 1517910390, 0),
(338, 76, 'address_id', '220', 0, 1517910390, 0),
(339, 76, 'enabled', '1', 0, 1517910390, 0),
(340, 77, 'first_name', 'Yolanda', 0, 1517910405, 0),
(341, 77, 'last_name', 'Manuhwa', 0, 1517910405, 0),
(342, 77, 'address_id', '221', 0, 1517910405, 0),
(343, 77, 'enabled', '1', 0, 1517910405, 0),
(344, 78, 'first_name', 'James', 77, 1518080752, 0),
(345, 78, 'last_name', 'Muganda', 77, 1518080752, 0),
(346, 78, 'address_id', '222', 77, 1518080752, 0),
(347, 78, 'enabled', '1', 77, 1518080752, 0),
(348, 79, 'first_name', 'John', 76, 1518080887, 0),
(349, 79, 'last_name', 'Moyo', 76, 1518080887, 0),
(350, 79, 'address_id', '223', 76, 1518080887, 0),
(351, 79, 'enabled', '1', 76, 1518080887, 0),
(352, 80, 'first_name', 'Panashe', 0, 1518082265, 0),
(353, 80, 'last_name', 'Kazonda', 0, 1518082265, 0),
(354, 80, 'address_id', '226', 0, 1518082265, 0),
(355, 80, 'company', '15', 0, 1518082265, 0),
(356, 80, 'company_contact', '1', 0, 1518082265, 0),
(357, 80, 'admin', '1', 0, 1518082265, 0),
(358, 80, 'enabled', '1', 0, 1518082265, 0),
(359, 81, 'first_name', 'ruth', 77, 1518082274, 0),
(360, 81, 'last_name', 'chimanikire', 77, 1518082274, 0),
(361, 81, 'address_id', '227', 77, 1518082274, 0),
(362, 81, 'company', '16', 77, 1518082274, 0),
(363, 81, 'company_contact', '1', 77, 1518082274, 0),
(364, 81, 'admin', '1', 77, 1518082274, 0),
(365, 81, 'enabled', '1', 77, 1518082274, 0),
(366, 82, 'first_name', 'ruby', 0, 1518092392, 0),
(367, 82, 'last_name', 'woo', 0, 1518092392, 0),
(368, 82, 'address_id', '', 82, 1518092392, 1518092721),
(369, 82, 'enabled', '1', 0, 1518092392, 0),
(370, 83, 'first_name', 'Sheila', 0, 1518419623, 0),
(371, 83, 'last_name', 'Sithole', 0, 1518419623, 0),
(372, 83, 'address_id', '231', 0, 1518419623, 0),
(373, 83, 'enabled', '1', 0, 1518419623, 0),
(374, 84, 'first_name', 'ACSEND ', 0, 1518439592, 0),
(375, 84, 'last_name', 'CONCRETE', 0, 1518439592, 0),
(376, 84, 'address_id', '232', 0, 1518439592, 0),
(377, 84, 'enabled', '1', 0, 1518439592, 0),
(378, 85, 'first_name', 'Isheunesu', 0, 1518526198, 0),
(379, 85, 'last_name', 'Mutasa', 0, 1518526198, 0),
(380, 85, 'address_id', '233', 0, 1518526198, 0),
(381, 85, 'enabled', '1', 0, 1518526198, 0),
(382, 88, 'first_name', 'ashton', 2, 1534862544, 0),
(383, 88, 'last_name', 'ashton', 2, 1534862544, 0),
(384, 88, 'address_id', '275', 2, 1534862544, 0),
(385, 88, 'enabled', '1', 2, 1534862544, 0),
(386, 89, 'first_name', 'name', 2, 1534864972, 0),
(387, 89, 'last_name', 'name', 2, 1534864972, 0),
(388, 89, 'address_id', 'name', 2, 1534864972, 0),
(389, 89, 'enabled', '1', 2, 1534864972, 0),
(390, 90, 'first_name', 'ashton', 2, 1534865770, 0),
(391, 90, 'last_name', 'ashton', 2, 1534865770, 0),
(392, 90, 'address_id', 'oiooi', 2, 1534865770, 0),
(393, 90, 'enabled', '1', 2, 1534865770, 0),
(394, 91, 'first_name', 'ashton', 2, 1534865973, 0),
(395, 91, 'last_name', 'ashton', 2, 1534865973, 0),
(396, 91, 'address_id', '312', 2, 1534865973, 0),
(397, 91, 'enabled', '1', 2, 1534865973, 0),
(398, 92, 'first_name', 'ashton', 2, 1534866005, 0),
(399, 92, 'last_name', 'ashton', 2, 1534866005, 0),
(400, 92, 'address_id', '313', 2, 1534866005, 0),
(401, 92, 'enabled', '1', 2, 1534866006, 0),
(402, 93, 'first_name', 'ashton', 2, 1534866053, 0),
(403, 93, 'last_name', 'ashton', 2, 1534866053, 0),
(404, 93, 'address_id', '314', 2, 1534866053, 0),
(405, 93, 'enabled', '1', 2, 1534866053, 0),
(406, 94, 'first_name', 'ashton', 2, 1534866113, 0),
(407, 94, 'last_name', 'ashton', 2, 1534866113, 0),
(408, 94, 'address_id', '315', 2, 1534866113, 0),
(409, 94, 'enabled', '1', 2, 1534866113, 0),
(410, 95, 'first_name', 'ashton', 2, 1534866171, 0),
(411, 95, 'last_name', 'ashton', 2, 1534866171, 0),
(412, 95, 'address_id', '317', 2, 1534866171, 0),
(413, 95, 'enabled', '1', 2, 1534866171, 0),
(414, 96, 'first_name', 'ashton', 2, 1534866230, 0),
(415, 96, 'last_name', 'ashton', 2, 1534866230, 0),
(416, 96, 'address_id', '319', 2, 1534866230, 0),
(417, 96, 'enabled', '1', 2, 1534866230, 0),
(418, 97, 'first_name', 'ashton', 2, 1534866292, 0),
(419, 97, 'last_name', 'ashton', 2, 1534866292, 0),
(420, 97, 'address_id', '322', 2, 1534866292, 0),
(421, 97, 'enabled', '1', 2, 1534866292, 0),
(422, 98, 'first_name', 'ashton', 2, 1534866359, 0),
(423, 98, 'last_name', 'ashton', 2, 1534866359, 0),
(424, 98, 'address_id', '323', 2, 1534866359, 0),
(425, 98, 'enabled', '1', 2, 1534866359, 0),
(426, 99, 'first_name', 'ashton', 2, 1534866450, 0),
(427, 99, 'last_name', 'ashton', 2, 1534866450, 0),
(428, 99, 'address_id', '325', 2, 1534866450, 0),
(429, 99, 'enabled', '1', 2, 1534866450, 0),
(430, 100, 'first_name', 'ashton', 2, 1534866522, 0),
(431, 100, 'last_name', 'ashton', 2, 1534866522, 0),
(432, 100, 'address_id', '327', 2, 1534866522, 0),
(433, 100, 'enabled', '1', 2, 1534866522, 0),
(434, 101, 'first_name', 'ashton', 2, 1534866604, 0),
(435, 101, 'last_name', 'ashton', 2, 1534866604, 0),
(436, 101, 'address_id', '329', 2, 1534866604, 0),
(437, 101, 'enabled', '1', 2, 1534866604, 0),
(438, 102, 'first_name', 'ashton', 2, 1534866706, 0),
(439, 102, 'last_name', 'ashton', 2, 1534866706, 0),
(440, 102, 'address_id', '331', 2, 1534866706, 0),
(441, 102, 'enabled', '1', 2, 1534866706, 0),
(442, 103, 'first_name', 'ashton', 2, 1534866764, 0),
(443, 103, 'last_name', 'ashton', 2, 1534866764, 0),
(444, 103, 'address_id', '333', 2, 1534866764, 0),
(445, 103, 'enabled', '1', 2, 1534866764, 0),
(446, 104, 'first_name', 'ashton', 2, 1534866809, 0),
(447, 104, 'last_name', 'ashton', 2, 1534866809, 0),
(448, 104, 'address_id', '336', 2, 1534866809, 0),
(449, 104, 'enabled', '1', 2, 1534866809, 0),
(450, 105, 'first_name', 'ashton', 2, 1534866835, 0),
(451, 105, 'last_name', 'ashton', 2, 1534866835, 0),
(452, 105, 'address_id', '337', 2, 1534866835, 0),
(453, 105, 'enabled', '1', 2, 1534866835, 0),
(454, 106, 'first_name', 'ashton', 2, 1534866902, 0),
(455, 106, 'last_name', 'ashton', 2, 1534866902, 0),
(456, 106, 'address_id', '338', 2, 1534866902, 0),
(457, 106, 'enabled', '1', 2, 1534866902, 0),
(458, 107, 'first_name', 'ashton', 2, 1534866971, 0),
(459, 107, 'last_name', 'ashton', 2, 1534866971, 0),
(460, 107, 'address_id', '339', 2, 1534866971, 0),
(461, 107, 'enabled', '1', 2, 1534866971, 0),
(462, 108, 'first_name', 'ashton', 2, 1534867036, 0),
(463, 108, 'last_name', 'ashton', 2, 1534867036, 0),
(464, 108, 'address_id', '341', 2, 1534867036, 0),
(465, 108, 'enabled', '1', 2, 1534867036, 0),
(466, 109, 'first_name', 'ashton', 2, 1534867109, 0),
(467, 109, 'last_name', 'ashton', 2, 1534867109, 0),
(468, 109, 'address_id', '342', 2, 1534867109, 0),
(469, 109, 'enabled', '1', 2, 1534867109, 0),
(470, 110, 'first_name', 'ashton', 2, 1534867153, 0),
(471, 110, 'last_name', 'ashton', 2, 1534867153, 0),
(472, 110, 'address_id', '343', 2, 1534867153, 0),
(473, 110, 'enabled', '1', 2, 1534867153, 0),
(474, 111, 'first_name', 'ashton', 2, 1534867164, 0),
(475, 111, 'last_name', 'ashton', 2, 1534867164, 0),
(476, 111, 'address_id', '344', 2, 1534867164, 0),
(477, 111, 'enabled', '1', 2, 1534867164, 0),
(478, 112, 'first_name', 'ashton', 2, 1534867428, 0),
(479, 112, 'last_name', 'ashton', 2, 1534867428, 0),
(480, 112, 'address_id', '345', 2, 1534867428, 0),
(481, 112, 'enabled', '1', 2, 1534867428, 0),
(482, 113, 'first_name', 'ashton', 2, 1534867563, 0),
(483, 113, 'last_name', 'ashton', 2, 1534867563, 0),
(484, 113, 'address_id', '346', 2, 1534867563, 0),
(485, 113, 'enabled', '1', 2, 1534867563, 0),
(486, 114, 'first_name', 'ashton', 2, 1534867626, 0),
(487, 114, 'last_name', 'ashton', 2, 1534867627, 0),
(488, 114, 'address_id', '348', 2, 1534867627, 0),
(489, 114, 'enabled', '1', 2, 1534867627, 0),
(490, 115, 'first_name', 'ashton', 2, 1534867823, 0),
(491, 115, 'last_name', 'ashton', 2, 1534867823, 0),
(492, 115, 'address_id', '350', 2, 1534867823, 0),
(493, 115, 'enabled', '1', 2, 1534867823, 0),
(494, 116, 'first_name', 'ashton', 2, 1534867884, 0),
(495, 116, 'last_name', 'ashton', 2, 1534867884, 0),
(496, 116, 'address_id', '352', 2, 1534867884, 0),
(497, 116, 'enabled', '1', 2, 1534867884, 0),
(498, 117, 'first_name', 'ashton', 2, 1534867911, 0),
(499, 117, 'last_name', 'ashton', 2, 1534867912, 0),
(500, 117, 'address_id', '354', 2, 1534867912, 0),
(501, 117, 'enabled', '1', 2, 1534867912, 0),
(502, 118, 'first_name', 'ashton', 2, 1534868012, 0),
(503, 118, 'last_name', 'ashton', 2, 1534868012, 0),
(504, 118, 'address_id', '356', 2, 1534868012, 0),
(505, 118, 'enabled', '1', 2, 1534868012, 0),
(506, 229, 'first_name', 'Ashton', 2, 1534868096, 0),
(507, 229, 'last_name', 'Ndlovu', 2, 1534868096, 0),
(508, 229, 'address_id', '357', 2, 1534868096, 0),
(509, 229, 'enabled', '1', 2, 1534868096, 0),
(510, 240, 'first_name', 'Adrenalin', 2, 1539941934, 0),
(511, 240, 'last_name', 'Advertising', 2, 1539941934, 0),
(512, 240, 'address_id', '503', 2, 1539941934, 0),
(513, 240, 'enabled', '1', 2, 1539941934, 0),
(514, 241, 'first_name', 'Promise', 2, 1539943804, 0),
(515, 241, 'last_name', 'Makufa', 2, 1539943804, 0),
(516, 241, 'address_id', '504', 2, 1539943804, 0),
(517, 241, 'enabled', '1', 2, 1539943804, 0),
(518, 242, 'first_name', 'Joanita', 2, 1539950359, 0),
(519, 242, 'last_name', 'Nyashanu', 2, 1539950359, 0),
(520, 242, 'address_id', '505', 2, 1539950359, 0),
(521, 242, 'enabled', '1', 2, 1539950359, 0),
(522, 243, 'first_name', 'Tariro', 2, 1539950720, 0),
(523, 243, 'last_name', 'Sithole', 2, 1539950720, 0),
(524, 243, 'address_id', '506', 2, 1539950720, 0),
(525, 243, 'enabled', '1', 2, 1539950720, 0),
(526, 244, 'first_name', 'Joanita', 2, 1541752940, 0),
(527, 244, 'last_name', 'Nyashanu', 2, 1541752940, 0),
(528, 244, 'address_id', '509', 2, 1541752940, 0),
(529, 244, 'enabled', '1', 2, 1541752940, 0),
(530, 245, 'first_name', 'Svodesai Tariro', 2, 1541754582, 0),
(531, 245, 'last_name', 'Sithole', 2, 1541754583, 0),
(532, 245, 'address_id', '510', 2, 1541754583, 0),
(533, 245, 'enabled', '1', 2, 1541754583, 0),
(534, 246, 'first_name', 'testing', 2, 1543389744, 0),
(535, 246, 'last_name', 'testingsurname', 2, 1543389744, 0),
(536, 246, 'address_id', '513', 2, 1543389744, 0),
(537, 246, 'enabled', '1', 2, 1543389744, 0),
(538, 247, 'first_name', 'gmbtest', 2, 1543499671, 0),
(539, 247, 'last_name', 'gmbsurname', 2, 1543499671, 0),
(540, 247, 'address_id', '514', 2, 1543499671, 0),
(541, 247, 'enabled', '1', 2, 1543499671, 0),
(542, 248, 'first_name', 'Jo', 2, 1543831265, 0),
(543, 248, 'last_name', 'jokyra', 2, 1543831265, 0),
(544, 248, 'address_id', '515', 2, 1543831265, 0),
(545, 248, 'enabled', '1', 2, 1543831265, 0),
(546, 249, 'first_name', 'Promjo', 2, 1543839302, 0),
(547, 249, 'last_name', 'Promjo', 2, 1543839302, 0),
(548, 249, 'address_id', '516', 2, 1543839302, 0),
(549, 249, 'enabled', '1', 2, 1543839302, 0),
(550, 250, 'first_name', 'Tar', 2, 1544433531, 0),
(551, 250, 'last_name', 'Sith', 2, 1544433531, 0),
(552, 250, 'address_id', '517', 2, 1544433531, 0),
(553, 250, 'enabled', '1', 2, 1544433531, 0),
(554, 251, 'first_name', 'AUGOSTINO', 2, 1544779358, 0),
(555, 251, 'last_name', 'CLOUDY', 2, 1544779358, 0),
(556, 251, 'address_id', '518', 2, 1544779358, 0),
(557, 251, 'enabled', '1', 2, 1544779358, 0),
(558, 252, 'first_name', 'AMON', 2, 1544795835, 0),
(559, 252, 'last_name', 'BAMU', 2, 1544795835, 0),
(560, 252, 'address_id', '519', 2, 1544795835, 0),
(561, 252, 'enabled', '1', 2, 1544795835, 0),
(562, 253, 'first_name', 'Promise', 2, 1582483041, 0),
(563, 253, 'last_name', 'Makufa', 2, 1582483041, 0),
(564, 253, 'address_id', '520', 2, 1582483042, 0),
(565, 253, 'enabled', '1', 2, 1582483042, 0),
(566, 254, 'first_name', 'Promise', 2, 1582483253, 0),
(567, 254, 'last_name', 'Makufa', 2, 1582483253, 0),
(568, 254, 'address_id', '522', 2, 1582483253, 0),
(569, 254, 'enabled', '1', 2, 1582483253, 0),
(570, 255, 'first_name', 'Promise', 2, 1582483804, 0),
(571, 255, 'last_name', 'Makufa', 2, 1582483804, 0),
(572, 255, 'address_id', '524', 2, 1582483804, 0),
(573, 255, 'enabled', '1', 2, 1582483804, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `id` int(11) NOT NULL,
  `area` varchar(25) NOT NULL,
  `permission` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `actions` text DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `updated_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`id`, `area`, `permission`, `description`, `actions`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '6', '8', 'super user conversion', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1450879948, 0),
(3, '6', '10', 'measurement', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1450880033, 0),
(5, '6', '2', 'admin menu', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1450880087, 0),
(6, '6', '4', 'admin menu roles', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1450880109, 0),
(7, '6', '3', 'Organisation', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1450880134, 0),
(8, '6', '5', 'Role Permissions', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1450880163, 0),
(9, '6', '6', 'menu', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1450880180, 0),
(16, '8', '-1', 'Home', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1450881469, 0),
(17, '11', '-1', 'Farmes', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1450881557, 0),
(18, '10', '-1', 'Logout', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1450882079, 0),
(19, '6', '7', 'user enabling', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', NULL, 1451916231, 0),
(20, '15', '-1', 'agritex_dashboard', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 9, 1455086406, 0),
(23, '17', '-1', 'Profile_Service', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1455088567, 0),
(24, '7', '13', 'Agronomy_Services', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1458636941, 0),
(25, '7', '14', 'Agronomy_service2', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1458636969, 0),
(26, '8', '15', 'Generic_Services', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1458637656, 0),
(27, '8', '16', 'Generic_Services2', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1458637688, 0),
(28, '9', '17', 'Buying_Services', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1458638698, 0),
(29, '10', '18', 'Selling_Services', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1458642115, 0),
(30, '11', '19', 'Logistic_Service', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1458642459, 0),
(31, '12', '20', 'Labor_Services', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1458642772, 0),
(32, '7', '21', 'agronomy_create_disease', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1464946381, 0),
(33, '7', '23', 'agronomy_disease_symptoms', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1464946734, 0),
(34, '12', '24', 'labor_list_all', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1464949524, 0),
(35, '11', '25', 'logistic_list_all', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1464950154, 0),
(36, '7', '24', 'Agronomy_Contract_Application', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1468830894, 0),
(37, '7', '25', 'Agronomy_View_Contract_Application', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1468835740, 0),
(38, '13', '26', 'permits_create', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1468916686, 0),
(39, '13', '27', 'permits_list_all', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1468916707, 0),
(40, '14', '28', 'reports_prod_bydistrict', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1468916809, 0),
(41, '14', '29', 'reports_farm_bydistrict', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1468916827, 0),
(42, '7', '30', 'Agronomy_Contracts', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1468999658, 0),
(43, '13', '31', 'permits_my', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469096990, 0),
(44, '8', '32', 'services_hire_out_equipment', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469434230, 0),
(45, '15', '33', 'markets_buying', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469434379, 0),
(46, '15', '34', 'markets_selling', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469434396, 0),
(47, '16', '35', 'profile_view_profile', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469435313, 0),
(48, '16', '36', 'profile_view_docs', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469435330, 0),
(51, '16', '39', 'profile_myskills', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469436273, 0),
(52, '16', '40', 'profile_logout', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469436288, 0),
(53, '17', '41', 'Contracts_Open', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469443403, 0),
(54, '17', '42', 'Contracts_History', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469443427, 0),
(55, '17', '43', 'Contracts_Apply', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469450986, 0),
(56, '8', '15', 'services_view_labor_hire', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1469776557, 0),
(57, '17', '44', 'contract_applications', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1470231328, 0),
(58, '18', '45', 'so_index', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1471426709, 0),
(59, '18', '46', 'so_completed', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1471426726, 0),
(60, '17', '47', 'contracts_so_index', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1471426744, 0),
(61, '17', '48', 'contracts_so_completed', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1471426781, 0),
(62, '14', '49', 'Report_Invoice', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1472110773, 0),
(63, '16', '50', 'profile_add_company_user', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1473168397, 0),
(64, '16', '51', 'profile_edit', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1473665214, 0),
(65, '16', '52', 'profile_farms', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1473926160, 0),
(66, '19', '53', 'home_dashboard', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1474373932, 0),
(67, '20', '54', 'projectmanagement_costs', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1477916508, 0),
(68, '20', '55', 'project_management_measurementUnits', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1477917860, 0),
(69, '20', '57', 'project_management_region', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1477918635, 0),
(70, '20', '56', 'projectmananagement_stages', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1477918658, 0),
(71, '20', '58', 'projectmanagement_soiltpyes', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1477919162, 0),
(72, '20', '59', 'projectmanagement_projecttasks', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1477919191, 0),
(73, '20', '60', 'projectmanagement_conditions', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1477919506, 0),
(74, '20', '61', 'projectmanagement_project', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1477919686, 0),
(75, '21', '62', 'project_schedulestartdate', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1480338047, 0),
(76, '21', '63', 'project_tracker', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1480338846, 0),
(77, '21', '64', 'project_view_progress', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1480672350, 0),
(78, '8', '65', 'services_create_trading_details', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1484730372, 0),
(79, '15', '66', 'Buyer_Raw_Materials', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1495088410, 0),
(80, '15', '67', 'Seller_Raw_Materials', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1495088441, 0),
(81, '14', '68', 'Contract_Reports', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1500446775, 0),
(82, '14', '69', 'reports_agents_report', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1500446826, 0),
(83, '14', '70', 'report_contract_document', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1500448144, 0),
(84, '14', '71', 'reports_product_byproduct', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1500878825, 0),
(85, '14', '72', 'contract_tracker_report', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1500878928, 0),
(86, '6', '73', 'admin_activate_users', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1503317326, 0),
(87, '22', '-1', 'loans', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1503317653, 0),
(88, '19', '-1', 'dashboard', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1503318813, 0),
(89, '20', '74', 'grading_grades', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1532676919, 0),
(90, '20', '75', 'grading_grains', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1532676937, 0),
(91, '20', '76', 'grading_grain_receipts', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1532676954, 0),
(92, '18', '77', 'stop_codes', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1540977865, 0),
(93, '13', '78', 'farmer_list', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1540981310, 0),
(94, '13', '79', 'farm_list', 'a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:6:\"delete\";}', 2, 1542106001, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_providers`
--

CREATE TABLE `users_providers` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `provider` varchar(50) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `expires` int(12) DEFAULT 0,
  `refresh_token` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `updated_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filter` enum('','A','D','R') NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `updated_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `name`, `filter`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Agritax', '', 9, 1448891751, 0),
(7, 'super user', '', 1, 1449237599, 0),
(8, 'Farmer', '', 1, 1449238383, 0),
(9, 'Buyer', '', 1, 1449238396, 0),
(10, 'Trader', '', 1, 1449238410, 0),
(11, 'Labor', '', 1, 0, 0),
(12, 'Logistic', '', 1, 0, 0),
(13, 'AMA Officer', '', 2, 1468840012, 0),
(14, 'Contractor', '', 2, 1468840060, 0),
(15, 'Company', '', 2, 1473168342, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_role_permissions`
--

CREATE TABLE `users_role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `perms_id` int(11) NOT NULL,
  `actions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_role_permissions`
--

INSERT INTO `users_role_permissions` (`id`, `role_id`, `perms_id`, `actions`) VALUES
(1, 7, 1, NULL),
(2, 7, 2, NULL),
(3, 7, 4, NULL),
(4, 7, 3, NULL),
(5, 7, 5, NULL),
(6, 7, 6, NULL),
(7, 7, 7, NULL),
(8, 7, 8, NULL),
(9, 7, 9, NULL),
(10, 8, 10, NULL),
(11, 8, 13, NULL),
(12, 9, 12, NULL),
(13, 9, 13, NULL),
(14, 9, 14, NULL),
(15, 9, 15, NULL),
(16, 7, 16, NULL),
(17, 8, 16, NULL),
(19, 8, 17, NULL),
(21, 7, 18, NULL),
(23, 7, 19, NULL),
(27, 6, 20, NULL),
(28, 6, 21, NULL),
(29, 6, 22, NULL),
(30, 7, 23, NULL),
(32, 6, 23, NULL),
(33, 8, 21, NULL),
(34, 8, 22, NULL),
(43, 8, 24, NULL),
(44, 8, 25, NULL),
(45, 8, 26, NULL),
(46, 8, 27, NULL),
(47, 9, 28, NULL),
(48, 10, 29, NULL),
(50, 12, 30, NULL),
(52, 11, 31, NULL),
(53, 6, 32, NULL),
(54, 7, 32, NULL),
(55, 6, 33, NULL),
(56, 7, 33, NULL),
(57, 6, 34, NULL),
(58, 7, 34, NULL),
(59, 8, 34, NULL),
(61, 10, 34, NULL),
(62, 11, 34, NULL),
(63, 12, 34, NULL),
(64, 6, 35, NULL),
(65, 7, 35, NULL),
(66, 8, 35, NULL),
(67, 9, 35, NULL),
(68, 10, 35, NULL),
(69, 12, 35, NULL),
(70, 11, 35, NULL),
(71, 8, 29, NULL),
(72, 8, 36, NULL),
(73, 8, 37, NULL),
(78, 13, 40, NULL),
(79, 13, 41, NULL),
(80, 13, 39, NULL),
(81, 14, 40, NULL),
(82, 14, 41, NULL),
(83, 8, 42, NULL),
(84, 7, 40, NULL),
(85, 7, 41, NULL),
(86, 8, 38, NULL),
(87, 9, 38, NULL),
(88, 10, 38, NULL),
(89, 11, 38, NULL),
(90, 8, 43, NULL),
(91, 9, 43, NULL),
(92, 10, 43, NULL),
(93, 7, 44, NULL),
(96, 7, 47, NULL),
(97, 7, 48, NULL),
(98, 7, 49, NULL),
(99, 7, 50, NULL),
(100, 7, 51, NULL),
(101, 7, 52, NULL),
(102, 14, 53, NULL),
(103, 14, 54, NULL),
(106, 14, 55, NULL),
(107, 9, 45, NULL),
(108, 9, 47, NULL),
(109, 9, 48, NULL),
(110, 9, 51, NULL),
(111, 9, 52, NULL),
(112, 8, 46, NULL),
(113, 8, 52, NULL),
(114, 8, 47, NULL),
(115, 8, 48, NULL),
(116, 8, 51, NULL),
(117, 8, 44, NULL),
(118, 11, 44, NULL),
(119, 11, 52, NULL),
(120, 10, 46, NULL),
(121, 13, 52, NULL),
(122, 13, 51, NULL),
(123, 13, 47, NULL),
(124, 14, 51, NULL),
(125, 14, 48, NULL),
(126, 14, 47, NULL),
(127, 14, 52, NULL),
(128, 12, 52, NULL),
(129, 12, 51, NULL),
(130, 12, 48, NULL),
(131, 12, 47, NULL),
(132, 11, 47, NULL),
(133, 11, 48, NULL),
(134, 11, 56, NULL),
(135, 12, 44, NULL),
(136, 13, 57, NULL),
(137, 7, 58, NULL),
(138, 7, 59, NULL),
(139, 13, 59, NULL),
(140, 13, 58, NULL),
(141, 14, 60, NULL),
(142, 14, 61, NULL),
(143, 8, 62, NULL),
(144, 15, 63, NULL),
(145, 15, 52, NULL),
(149, 11, 64, NULL),
(155, 8, 65, NULL),
(156, 6, 66, NULL),
(157, 7, 66, NULL),
(158, 8, 66, NULL),
(159, 9, 66, NULL),
(160, 10, 66, NULL),
(161, 11, 66, NULL),
(162, 12, 66, NULL),
(163, 13, 66, NULL),
(164, 14, 66, NULL),
(165, 15, 66, NULL),
(166, 6, 67, NULL),
(167, 7, 67, NULL),
(168, 7, 68, NULL),
(169, 6, 68, NULL),
(170, 6, 69, NULL),
(171, 7, 69, NULL),
(172, 6, 70, NULL),
(173, 7, 70, NULL),
(174, 6, 71, NULL),
(175, 7, 71, NULL),
(176, 6, 72, NULL),
(177, 7, 72, NULL),
(178, 6, 73, NULL),
(179, 7, 73, NULL),
(180, 6, 74, NULL),
(181, 7, 74, NULL),
(182, 8, 75, NULL),
(183, 8, 76, NULL),
(184, 14, 77, NULL),
(185, 12, 78, NULL),
(186, 7, 78, NULL),
(187, 9, 79, NULL),
(188, 10, 80, NULL),
(189, 7, 81, NULL),
(190, 7, 82, NULL),
(191, 7, 83, NULL),
(192, 14, 83, NULL),
(193, 7, 84, NULL),
(194, 7, 85, NULL),
(195, 6, 86, NULL),
(196, 7, 86, NULL),
(197, 14, 86, NULL),
(198, 6, 87, NULL),
(199, 7, 87, NULL),
(200, 14, 87, NULL),
(201, 7, 88, NULL),
(202, 6, 88, NULL),
(203, 8, 88, NULL),
(204, 9, 88, NULL),
(205, 10, 88, NULL),
(206, 11, 88, NULL),
(207, 12, 88, NULL),
(208, 13, 88, NULL),
(209, 14, 88, NULL),
(210, 15, 88, NULL),
(211, 7, 89, NULL),
(212, 7, 90, NULL),
(213, 7, 91, NULL),
(214, 7, 92, NULL),
(215, 7, 93, NULL),
(216, 7, 94, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_scopes`
--

CREATE TABLE `users_scopes` (
  `id` int(11) NOT NULL,
  `scope` varchar(64) NOT NULL DEFAULT '',
  `name` varchar(64) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_sessions`
--

CREATE TABLE `users_sessions` (
  `id` int(11) NOT NULL,
  `client_id` varchar(32) NOT NULL DEFAULT '',
  `redirect_uri` varchar(255) NOT NULL DEFAULT '',
  `type_id` varchar(64) NOT NULL,
  `type` enum('user','auto') NOT NULL DEFAULT 'user',
  `code` text NOT NULL,
  `access_token` varchar(50) NOT NULL DEFAULT '',
  `stage` enum('request','granted') NOT NULL DEFAULT 'request',
  `first_requested` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL,
  `limited_access` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_user_roles`
--

CREATE TABLE `users_user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_user_roles`
--

INSERT INTO `users_user_roles` (`user_id`, `role_id`) VALUES
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 14),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(9, 6),
(10, 8),
(10, 9),
(10, 10),
(10, 11),
(10, 12),
(11, 10),
(11, 14),
(17, 14),
(18, 9),
(21, 9),
(21, 10),
(21, 11),
(21, 12),
(22, 9),
(22, 10),
(22, 11),
(22, 12),
(23, 9),
(24, 8),
(24, 14),
(27, 8),
(27, 9),
(27, 10),
(27, 11),
(27, 12),
(28, 9),
(28, 10),
(28, 11),
(28, 12),
(29, 8),
(29, 9),
(29, 12),
(30, 8),
(30, 9),
(31, 8),
(31, 9),
(31, 10),
(32, 9),
(32, 14),
(33, 8),
(33, 9),
(33, 10),
(33, 11),
(33, 12),
(34, 8),
(34, 9),
(34, 10),
(34, 11),
(34, 12),
(34, 14),
(35, 8),
(35, 9),
(35, 10),
(35, 11),
(35, 12),
(38, 8),
(38, 9),
(38, 10),
(38, 11),
(38, 12),
(38, 14),
(39, 8),
(39, 9),
(39, 10),
(39, 12),
(39, 14),
(40, 8),
(40, 9),
(40, 10),
(40, 12),
(40, 14),
(41, 8),
(41, 10),
(41, 12),
(42, 8),
(47, 9),
(47, 10),
(47, 12),
(47, 14),
(48, 15),
(49, 15),
(50, 8),
(50, 15),
(53, 8),
(53, 14),
(53, 15),
(54, 8),
(57, 8),
(58, 8),
(58, 9),
(58, 10),
(58, 11),
(58, 12),
(58, 14),
(60, 8),
(61, 8),
(61, 12),
(61, 14),
(61, 15),
(63, 14),
(64, 8),
(64, 10),
(66, 8),
(71, 8),
(76, 8),
(76, 9),
(76, 10),
(76, 11),
(76, 12),
(76, 14),
(77, 8),
(77, 9),
(77, 10),
(77, 11),
(77, 12),
(77, 14),
(78, 8),
(79, 8),
(80, 8),
(80, 9),
(80, 10),
(80, 11),
(80, 12),
(80, 14),
(80, 15),
(81, 8),
(81, 9),
(81, 10),
(81, 11),
(81, 12),
(81, 14),
(81, 15),
(82, 8),
(83, 8),
(83, 9),
(83, 10),
(83, 11),
(83, 12),
(83, 14),
(84, 8),
(84, 9),
(84, 10),
(84, 11),
(84, 12),
(84, 14);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `national_id` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `vendor_number` varchar(255) DEFAULT NULL,
  `payment_term` varchar(255) NOT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `national_id`, `gender`, `date_of_birth`, `vendor_number`, `payment_term`, `created_at`, `updated_at`) VALUES
(103, '83', '07-774618-g-27', 'Male', '02/05/1995', '500007', 'N120', 1537884017, 1537884017),
(104, '84', '07-774618-g-27', 'Male', '02/05/1995', '100015', 'N120', 1537884200, 1537884260),
(105, '229', '09-777898-G56', 'Male', '02/05/1995', '500008', 'NT30', 1537884200, 1537884260),
(106, '240', '07-774618-a-27', 'Male', '1995-05-02', '100021', 'NT00', 1539941934, 1539941934),
(107, '241', '07-774618-a-27', 'Male', '1995-05-02', '100006', 'NT30', 1539943804, 1539943804),
(108, '242', '07-774618-a-27', 'Female', '1995-05-02', '500013', 'N120', 1539950359, 1539950359),
(109, '243', '07-774618-g-27', 'Male', '1995-05-02', '500026', 'NT00', 1539950720, 1539950720),
(110, '245', '09-877972-t-27', 'Female', '1982.10.26', '0000500021', 'NT00', 1541754583, 1541754583),
(111, '246', '07-774618-a-27', 'Female', '1995-05-02', '0000500020', 'NT60', 1543389744, 1543389744),
(115, '250', '22-111111-g-77', 'Female', '2018-12-01', '888888', 'N120', 1544433531, 1544433531),
(116, '251', '07-774618-c-27', 'Male', '1978-06-14', '507360', 'NT00', 1544779358, 1544779358),
(117, '252', '11-123456-d-55', 'Male', '2018-12-01', '506670', 'N120', 1544795835, 1544795835),
(118, '255', '63-158354-a-50', 'Male', '1995-04-18', '0719387574', '0', 1582483804, 1582483804);

-- --------------------------------------------------------

--
-- Table structure for table `variablecosts`
--

CREATE TABLE `variablecosts` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `disbursed` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `variablecosts`
--

INSERT INTO `variablecosts` (`id`, `name`, `unit`, `disbursed`, `created_at`, `updated_at`) VALUES
(1, 'Labour', '1', 0, 1477919869, 1484573456),
(2, 'Fertilizer and lime', '4', 1, 1478761613, 1484573611),
(3, 'Seeds', '4', 1, 1484744368, 1484744368);

-- --------------------------------------------------------

--
-- Table structure for table `vids`
--

CREATE TABLE `vids` (
  `id` int(11) UNSIGNED NOT NULL,
  `national_ID` varchar(255) NOT NULL,
  `Details` varchar(255) NOT NULL,
  `License_Type` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `view_gettotalquantitybidded`
--

CREATE TABLE `view_gettotalquantitybidded` (
  `name` varchar(255) DEFAULT NULL,
  `bidmonth` int(2) DEFAULT NULL,
  `bidmonthname` varchar(9) DEFAULT NULL,
  `quantity` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `view_productoffers`
--

CREATE TABLE `view_productoffers` (
  `name` varchar(255) DEFAULT NULL,
  `quantity_left` decimal(30,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`country_id`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basicformulas`
--
ALTER TABLE `basicformulas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids2`
--
ALTER TABLE `bids2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_users`
--
ALTER TABLE `campaign_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cocodes`
--
ALTER TABLE `cocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condtions`
--
ALTER TABLE `condtions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractapplications`
--
ALTER TABLE `contractapplications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractortrackers`
--
ALTER TABLE `contractortrackers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractquantities`
--
ALTER TABLE `contractquantities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractstarts`
--
ALTER TABLE `contractstarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracttrackers`
--
ALTER TABLE `contracttrackers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_disburses`
--
ALTER TABLE `contract_disburses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversions`
--
ALTER TABLE `conversions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `correctivemeasures`
--
ALTER TABLE `correctivemeasures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depots`
--
ALTER TABLE `depots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseasesymptoms`
--
ALTER TABLE `diseasesymptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts_list`
--
ALTER TABLE `districts_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdowns`
--
ALTER TABLE `dropdowns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmguides`
--
ALTER TABLE `farmguides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradingcriterias`
--
ALTER TABLE `gradingcriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradings`
--
ALTER TABLE `gradings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grainreceipts`
--
ALTER TABLE `grainreceipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grainreceiptsdata`
--
ALTER TABLE `grainreceiptsdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grains`
--
ALTER TABLE `grains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labors`
--
ALTER TABLE `labors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linktables`
--
ALTER TABLE `linktables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loanid`);

--
-- Indexes for table `logistics`
--
ALTER TABLE `logistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainmenus`
--
ALTER TABLE `mainmenus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainmenus2`
--
ALTER TABLE `mainmenus2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_places`
--
ALTER TABLE `market_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentterms`
--
ALTER TABLE `paymentterms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permits`
--
ALTER TABLE `permits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productoffers`
--
ALTER TABLE `productoffers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productoffers21`
--
ALTER TABLE `productoffers21`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttypes`
--
ALTER TABLE `producttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variablecost_complexformulas`
--
ALTER TABLE `product_variablecost_complexformulas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variablecost_stages`
--
ALTER TABLE `product_variablecost_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variablecost_stage_targetyields`
--
ALTER TABLE `product_variablecost_stage_targetyields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilepics`
--
ALTER TABLE `profilepics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_conditions`
--
ALTER TABLE `project_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_filtered_resources`
--
ALTER TABLE `project_filtered_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_filtered_tasks`
--
ALTER TABLE `project_filtered_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_regions`
--
ALTER TABLE `project_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_soiltypes`
--
ALTER TABLE `project_soiltypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_stages`
--
ALTER TABLE `project_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_stage_tasks`
--
ALTER TABLE `project_stage_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_stage_task_variablecosts`
--
ALTER TABLE `project_stage_task_variablecosts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_variablecosts`
--
ALTER TABLE `project_variablecosts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces_list`
--
ALTER TABLE `provinces_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawmaterial_offers`
--
ALTER TABLE `rawmaterial_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region_conditions`
--
ALTER TABLE `region_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region_condition_products`
--
ALTER TABLE `region_condition_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rm_sales`
--
ALTER TABLE `rm_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rm_transactions`
--
ALTER TABLE `rm_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `runningtables`
--
ALTER TABLE `runningtables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sap_bps`
--
ALTER TABLE `sap_bps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasonfarmings`
--
ALTER TABLE `seasonfarmings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soapplications`
--
ALTER TABLE `soapplications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soiltypes`
--
ALTER TABLE `soiltypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stakeholder_products`
--
ALTER TABLE `stakeholder_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stakeholder_tradingdetails`
--
ALTER TABLE `stakeholder_tradingdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stopcodes`
--
ALTER TABLE `stopcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stoporders`
--
ALTER TABLE `stoporders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targetyields`
--
ALTER TABLE `targetyields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofiles`
--
ALTER TABLE `userprofiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersold`
--
ALTER TABLE `usersold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group_roles`
--
ALTER TABLE `users_group_roles`
  ADD PRIMARY KEY (`group_id`,`role_id`);

--
-- Indexes for table `users_metadata`
--
ALTER TABLE `users_metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_providers`
--
ALTER TABLE `users_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_role_permissions`
--
ALTER TABLE `users_role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_scopes`
--
ALTER TABLE `users_scopes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `scope` (`scope`);

--
-- Indexes for table `users_sessions`
--
ALTER TABLE `users_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_sessions_ibfk_1` (`client_id`);

--
-- Indexes for table `users_user_roles`
--
ALTER TABLE `users_user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variablecosts`
--
ALTER TABLE `variablecosts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vids`
--
ALTER TABLE `vids`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=525;

--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `basicformulas`
--
ALTER TABLE `basicformulas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `bids2`
--
ALTER TABLE `bids2`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `campaign_users`
--
ALTER TABLE `campaign_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cocodes`
--
ALTER TABLE `cocodes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `condtions`
--
ALTER TABLE `condtions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contractapplications`
--
ALTER TABLE `contractapplications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `contractortrackers`
--
ALTER TABLE `contractortrackers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contractquantities`
--
ALTER TABLE `contractquantities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `contractstarts`
--
ALTER TABLE `contractstarts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contracttrackers`
--
ALTER TABLE `contracttrackers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contract_disburses`
--
ALTER TABLE `contract_disburses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `conversions`
--
ALTER TABLE `conversions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `correctivemeasures`
--
ALTER TABLE `correctivemeasures`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `depots`
--
ALTER TABLE `depots`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `diseasesymptoms`
--
ALTER TABLE `diseasesymptoms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `districts_list`
--
ALTER TABLE `districts_list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dropdowns`
--
ALTER TABLE `dropdowns`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `farmguides`
--
ALTER TABLE `farmguides`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gradingcriterias`
--
ALTER TABLE `gradingcriterias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gradings`
--
ALTER TABLE `gradings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grainreceipts`
--
ALTER TABLE `grainreceipts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grainreceiptsdata`
--
ALTER TABLE `grainreceiptsdata`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `grains`
--
ALTER TABLE `grains`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `labors`
--
ALTER TABLE `labors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `linktables`
--
ALTER TABLE `linktables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7013;

--
-- AUTO_INCREMENT for table `logistics`
--
ALTER TABLE `logistics`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mainmenus`
--
ALTER TABLE `mainmenus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mainmenus2`
--
ALTER TABLE `mainmenus2`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `market_places`
--
ALTER TABLE `market_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
