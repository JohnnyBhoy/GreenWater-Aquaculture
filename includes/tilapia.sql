-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 07:32 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tilapia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `userPassword` text NOT NULL,
  `role` text NOT NULL,
  `status` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `email`, `userPassword`, `role`, `status`, `created`) VALUES
(1, 'Technician', 'admin@gmail.com', 'admin', 'admin', 'active', '2022-08-08 12:13:44'),
(2, 'Owner', 'owner@gmail.com', 'Owner', 'Owner', 'active', '2022-08-08 12:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `job` varchar(30) NOT NULL,
  `dated` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `fname`, `job`, `dated`, `created`) VALUES
(1, 'Elorisa Penes', '', '2022-08-09', '2022-08-09 11:41:43'),
(2, 'Juan Dela Cruz', 'Electrician', '2022-08-09', '2022-08-09 11:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `e_id` int(11) NOT NULL,
  `totalfeedscost` int(12) NOT NULL,
  `totalprobioticcost` int(12) NOT NULL,
  `salary` int(12) NOT NULL,
  `other` int(12) NOT NULL,
  `total` int(12) NOT NULL,
  `dated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `financial_statement_reports`
--

CREATE TABLE `financial_statement_reports` (
  `f_id` int(11) NOT NULL,
  `total_expenses` int(20) NOT NULL,
  `total_sales` int(20) NOT NULL,
  `net_income` int(20) NOT NULL,
  `dated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `harvest`
--

CREATE TABLE `harvest` (
  `h_id` int(11) NOT NULL,
  `harvestdate` date NOT NULL,
  `sizing` varchar(25) NOT NULL,
  `price` int(10) NOT NULL,
  `pondnumber` int(5) NOT NULL,
  `sales` int(12) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `j_id` int(11) NOT NULL,
  `job` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`j_id`, `job`, `created`) VALUES
(1, 'Technician', '2022-08-09 11:12:25'),
(2, 'Worker', '2022-08-09 11:13:24'),
(3, 'Electrician', '2022-08-09 11:13:40'),
(5, 'Driver', '2022-08-09 11:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `pond`
--

CREATE TABLE `pond` (
  `p_id` int(11) NOT NULL,
  `pond` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `dated` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pond`
--

INSERT INTO `pond` (`p_id`, `pond`, `used`, `dated`, `created`) VALUES
(10, 1, 1, '2022-08-09', '2022-08-09 09:57:39'),
(12, 2, 1, '2022-08-09', '2022-08-09 09:58:17'),
(13, 3, 0, '2022-08-09', '2022-08-09 09:59:16'),
(14, 4, 0, '2022-08-09', '2022-08-09 11:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `probiotic`
--

CREATE TABLE `probiotic` (
  `p_id` int(5) NOT NULL,
  `inventory` int(11) NOT NULL,
  `consumption` int(5) NOT NULL,
  `remain` int(5) NOT NULL,
  `dateuse` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `p_id` int(11) NOT NULL,
  `prod_number` int(12) NOT NULL,
  `stock_number` int(12) NOT NULL,
  `pond` int(12) NOT NULL,
  `fingerlings` int(5) NOT NULL,
  `feeds` int(10) NOT NULL,
  `biomass` int(25) NOT NULL,
  `probiotic` varchar(255) NOT NULL,
  `stockdate` date NOT NULL,
  `employee` text NOT NULL,
  `remarks` text NOT NULL,
  `dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`p_id`, `prod_number`, `stock_number`, `pond`, `fingerlings`, `feeds`, `biomass`, `probiotic`, `stockdate`, `employee`, `remarks`, `dated`) VALUES
(35, 1, 1, 2, 1000, 5, 5, '5', '2022-08-12', 'Elorisa Penes', 'Sad', '2022-08-12 00:00:00'),
(36, 1, 2, 3, 1000, 10, 10, '101', '2022-08-12', 'Juan Dela Cruz', 'Nice', '2022-08-12 00:00:00'),
(37, 1, 3, 1, 1, 1, 1, '1', '2022-01-12', 'Elorisa Penes', 'dfsdf', '2022-08-12 00:00:00'),
(38, 1, 3, 1, 1, 1, 1, '1', '2022-01-12', 'Elorisa Penes', 'dfsdf', '2022-08-12 00:00:00'),
(39, 1, 5, 2, 10000, 12, 12, '12', '2022-08-12', 'Juan Dela Cruz', 'Okay man', '2022-08-12 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `financial_statement_reports`
--
ALTER TABLE `financial_statement_reports`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `harvest`
--
ALTER TABLE `harvest`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `pond`
--
ALTER TABLE `pond`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `financial_statement_reports`
--
ALTER TABLE `financial_statement_reports`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harvest`
--
ALTER TABLE `harvest`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pond`
--
ALTER TABLE `pond`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
