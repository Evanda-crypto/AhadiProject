-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2022 at 11:53 AM
-- Server version: 10.6.7-MariaDB-2ubuntu1.1
-- PHP Version: 8.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paneldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `region_description`
--

CREATE TABLE `region_description` (
  `id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `public_ip` varchar(255) NOT NULL,
  `gateway_ip` varchar(100) NOT NULL,
  `regional_ip` varchar(255) NOT NULL,
  `coreswitch_ip` varchar(255) NOT NULL,
  `acsn` varchar(100) NOT NULL,
  `routersn` varchar(100) NOT NULL,
  `coreswitch_sn` varchar(100) NOT NULL,
  `acipadress` varchar(100) NOT NULL,
  `portnumber` varchar(100) NOT NULL,
  `mainanydeskId` varchar(100) NOT NULL,
  `remoteanydeskId` varchar(100) NOT NULL,
  `mngmtanydeskId` varchar(100) NOT NULL,
  `zonesnumber` varchar(100) NOT NULL,
  `pop` varchar(100) NOT NULL,
  `tsname` varchar(100) NOT NULL,
  `tscontact` varchar(100) NOT NULL,
  `btopersonell` varchar(100) NOT NULL,
  `mrpersonell` varchar(100) NOT NULL,
  `srpersonell` varchar(100) NOT NULL,
  `irpersonell` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region_description`
--

INSERT INTO `region_description` (`id`, `region_name`, `provider`, `public_ip`, `gateway_ip`, `regional_ip`, `coreswitch_ip`, `acsn`, `routersn`, `coreswitch_sn`, `acipadress`, `portnumber`, `mainanydeskId`, `remoteanydeskId`, `mngmtanydeskId`, `zonesnumber`, `pop`, `tsname`, `tscontact`, `btopersonell`, `mrpersonell`, `srpersonell`, `irpersonell`) VALUES
(2, 'G45S', 'CTG', '102.217.167.70', '102.217.167.65', '172.22.0.253', '172.22.0.254', '172.22.0.252', '12142R6000043', '120C2D8000041', '119DCAJ000002', '11', '', '', '344374474', '15', 'CHARIS PoP', 'Dadius Charana', '702015396', 'Andrew Wambari', 'John Paul ,Luka Kinuthia Muiruri ,Erickson Nato ', 'Charles Mwangi,Ken Mbogo ', 'Kennedy Murimi '),
(3, 'G44', 'SEACOM', '105.27.237.117', '105.27.237.113', '172.20.0.253', '172.20.0.254', '172.20.0.252', '1.21541E+12', '12151J7000004', '118BR21000002', '5', '413768723', '', '979323988', '17', 'Sonic', 'Meshack Maingi ', '729599885', 'Dennis Gichuru Kibira ', 'Leonard Kiprotich Langat,Benjamin Makhasi ', 'Rose Muthoni', 'Meshack Mukatia'),
(4, 'ZMM', 'SEACOM', '105.27.237.116', '105.27.237.113', '172.18.0.253', '172.18.0.254', '172.18.0.252', '', 'Mac address :34-F7-16-67-05-4D', '118BR2100003', '3', '', '', '440524677', '18', 'Gardenia POP', 'Peter Muraguri ', '791777822', 'George Mathenge ', 'James Ngururi,Daniel Mwatu ', 'Jefferson Muthoka ', 'James Karanja Githae '),
(5, 'G45N1', 'CTG', '102.217.167.71', '102.217.167.65', '172.24.0.253', '172.24.0.254', '172.24.0.252', '120B2L9000032', '12182B0000053', '1205012R100001', '1', '', '', '252505152', '19', 'QWETU PoP', 'Dadius Charana', '702015396', 'Andrew Wambari', 'John Paul ,Luka Kinuthia Muiruri ,Erickson Nato ', 'Charles Mwangi,Ken Mbogo ', 'Kennedy Murimi '),
(6, 'G45N2', 'CTG', '102.217.167.72', '102.217.167.65', '172.25.0.253', '172.25.0.254', '172.25.0.254', '12073V2000032', '12182B0000069', '12184J3000011', '2', '', '', '252505152', '13', 'QWETU PoP', 'Dadius Charana', '702015396', 'Andrew Wambari', 'John Paul ,Luka Kinuthia Muiruri ,Erickson Nato ', 'Charles Mwangi,Ken Mbogo ', 'Kennedy Murimi '),
(7, 'R&M', 'CTG', '102.217.167.66', '102.217.167.65', '172.16.0.253', '172.16.0.254', '172.16.0.252', '1.21541E+12', '12182b0000002', '12184j3000007 ', '11', '', '395572800', '160098744', '16, 8 active', 'Joppa', 'Wambugu Muchemi ', '0706139071 / 0754142141', 'George Mathenge ', 'James Ngururi,Daniel Mwatu ', 'Jefferson Muthoka ', 'James Karanja Githae '),
(8, 'KWT1', 'SEACOM', '105.27.237.115', '105.27.237.113', '172.21.0.253', '172.21.0.254', '172.21.0.252', '1.21541E+12', '12182B0000047', '1.16993E+12', '6', '', '', '592409911', '15', 'Mukuyu PoP', 'Kittim Wachira Njagi ', '711194871', 'Andrew Wambari', 'Erick Kibunja', 'Daniel Obiero Watanga', 'Jesse Mwangi'),
(9, 'KWT2', 'CTG', '102.217.167.69', '102.217.167.65', '10.101.0.253', '10.101.0.254', '10.101.0.252', '120B2L9000033', '12182B0000060', '1205012R10002', '12', '', '', '592409911', '10', 'Mukuyu PoP', 'Kittim Wachira Njagi ', '711194871', 'Andrew Wambari', 'Erick Kibunja', 'Daniel Obiero Watanga', 'Jesse Mwangi'),
(10, 'LSM', 'CTG', '102.217.167.67', '102.217.167.65', '172.17.0.253', '172.17.0.254', '172.17.0.252', '1.21921E+12', '1215BBE000007', '12184J3000005', '', '', '631937665', '350280357', '13', 'MINA LOVE POP', 'Stephen Munene Macharia ', '719816612', 'Dennis Gichuru Kibira', 'John Ogola Tyrus Oduori Wafula', 'Robinson Mbuvi ', 'Mwangi Jackson Ng\'ang\'a '),
(11, 'HTR', 'CTG', '102.217.167.73', '102.217.167.65', '10.102.0.253', '10.102.0.254', '10.102.0.252', '120B2L9000009', '120C2D8000002', '12184J3000023', '13', '410627882', '', '313155395', '18', 'MAIRURA', 'Angelo Kimathi Kaburu ', '706025297', 'Dennis Gichuru Kibira', 'Auko Luke', 'Kennedy Ochieng', 'Mwangi Jackson Ng\'ang\'a ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `region_description`
--
ALTER TABLE `region_description`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `region_description`
--
ALTER TABLE `region_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
