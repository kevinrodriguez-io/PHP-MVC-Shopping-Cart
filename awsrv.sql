-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 03:53 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awsrv`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ID` int(11) NOT NULL,
  `CODE` varchar(50) NOT NULL,
  `BRAND` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(1024) NOT NULL,
  `PRICE` decimal(18,2) NOT NULL,
  `QUANTITY` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ID`, `CODE`, `BRAND`, `DESCRIPTION`, `PRICE`, `QUANTITY`) VALUES
(1, 'AB001', 'Phillips', 'Desatornillador', '2500.00', 47),
(2, 'AB002', 'Black and decker', 'Coffee Maker', '48000.00', 2),
(3, 'AB003', 'Samsung', 'Televisor FHD 55', '700000.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `ID` int(11) NOT NULL,
  `USERID` int(11) NOT NULL,
  `ARTICLEID` int(11) NOT NULL,
  `INVOICENUMBER` varchar(50) NOT NULL,
  `SALEDATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`ID`, `USERID`, `ARTICLEID`, `INVOICENUMBER`, `SALEDATE`) VALUES
(5, 3, 3, '3', '2017-12-09 15:57:22'),
(6, 3, 2, '4', '2017-12-09 15:57:22'),
(7, 3, 1, '5', '2018-03-03 02:43:06'),
(8, 3, 3, '6', '2018-03-03 02:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `ID` int(11) NOT NULL,
  `SKEY` varchar(50) NOT NULL,
  `SVALUE` varchar(21792) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `SKEY`, `SVALUE`) VALUES
(1, 'LASTINVOICENUMBER', '6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `IDCARD` varchar(50) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `LASTNAME` varchar(50) NOT NULL,
  `PHONE` varchar(50) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` varchar(50) NOT NULL DEFAULT 'CLIENT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `IDCARD`, `NAME`, `LASTNAME`, `PHONE`, `EMAIL`, `USERNAME`, `PASSWORD`, `ROLE`) VALUES
(1, '115870399', 'Kevin', 'Rodriguez', '84215616', '_@kevinrodriguez.io', 'admin', '$2y$10$PT7JY/5lAizPM8bf1QvYqe5R4xdbVnXNewQv9Zg3LxmLeC/FHqWVi', 'ADMIN'),
(3, '115870400', 'Angela', 'Jhonson', '80809191', 'maquinadehielo@gmail.com', 'client', '$2y$10$r4ZtMHoCdu.38Q1tzxmtDevWf.wXaJ5afn7KJJKXvVgrnqMAoknr.', 'CLIENT');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwsales`
-- (See below for the actual view)
--
CREATE TABLE `vwsales` (
`ID` int(11)
,`USERID` int(11)
,`USERNAME` varchar(50)
,`ARTICLEID` int(11)
,`CODE` varchar(50)
,`BRAND` varchar(50)
,`DESCRIPTION` varchar(1024)
,`INVOICENUMBER` varchar(50)
,`SALEDATE` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `vwsales`
--
DROP TABLE IF EXISTS `vwsales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwsales`  AS  select `s`.`ID` AS `ID`,`s`.`USERID` AS `USERID`,`u`.`USERNAME` AS `USERNAME`,`s`.`ARTICLEID` AS `ARTICLEID`,`a`.`CODE` AS `CODE`,`a`.`BRAND` AS `BRAND`,`a`.`DESCRIPTION` AS `DESCRIPTION`,`s`.`INVOICENUMBER` AS `INVOICENUMBER`,`s`.`SALEDATE` AS `SALEDATE` from ((`sales` `s` join `users` `u` on((`s`.`USERID` = `u`.`ID`))) join `articles` `a` on((`s`.`ARTICLEID` = `a`.`ID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CODE` (`CODE`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `SKEY` (`SKEY`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `IDCARD` (`IDCARD`),
  ADD UNIQUE KEY `PHONE` (`PHONE`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
