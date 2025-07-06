-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 05:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysoftware`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `role` text DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `phone`, `email`, `role`, `date`, `type`) VALUES
(1, 'Admin', 'Admin@321', 'admin', NULL, NULL, NULL, '', 'admin'),
(2, 'User', 'Dream@123', 'user', NULL, NULL, NULL, '', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `applyleave`
--

CREATE TABLE `applyleave` (
  `id` int(11) NOT NULL,
  `regno` varchar(10) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `leavereason` varchar(300) DEFAULT NULL,
  `fromdate` varchar(20) DEFAULT NULL,
  `todate` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `returns` text DEFAULT '0',
  `regby` text DEFAULT NULL,
  `disablests` text NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applyleave`
--

INSERT INTO `applyleave` (`id`, `regno`, `image`, `leavereason`, `fromdate`, `todate`, `date`, `status`, `returns`, `regby`, `disablests`) VALUES
(12, 'ACSep00002', 'upload/dssd.png', 'ghgj', '2024-09-25', '2024-09-28', '25-09-2024', '1', '0', 'User', '0');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `batchname` varchar(50) NOT NULL,
  `username` text DEFAULT NULL,
  `duration` text DEFAULT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batchname`, `username`, `duration`, `date`) VALUES
(16, 'batch1', '2', '1', '30-08-24'),
(17, 'batch2', '2', '2', '30-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `batchreq`
--

CREATE TABLE `batchreq` (
  `id` int(11) NOT NULL,
  `oldbatch` text DEFAULT NULL,
  `newbatch` text DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `regby` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batchreq`
--

INSERT INTO `batchreq` (`id`, `oldbatch`, `newbatch`, `userid`, `date`, `status`, `regby`) VALUES
(12, '16', '17', '152', '26-09-2024', '1', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `concession`
--

CREATE TABLE `concession` (
  `id` int(11) NOT NULL,
  `regno` varchar(100) DEFAULT NULL,
  `stuname` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `amt` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `regby` text DEFAULT NULL,
  `disablests` text DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `concession`
--

INSERT INTO `concession` (`id`, `regno`, `stuname`, `fname`, `amt`, `remarks`, `date`, `status`, `regby`, `disablests`) VALUES
(42, 'ACSep00001', 'klklklklk', 'kulwant', '200', 'ui deta', '26-09-24', '0', 'User', '0');

-- --------------------------------------------------------

--
-- Table structure for table `concessionreq`
--

CREATE TABLE `concessionreq` (
  `id` int(11) NOT NULL,
  `regno` text DEFAULT NULL,
  `stuname` text DEFAULT NULL,
  `fname` text DEFAULT NULL,
  `amt` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `regby` text DEFAULT NULL,
  `Emidate` text DEFAULT NULL,
  `emi_id` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `disablests` text DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `concessionreq`
--

INSERT INTO `concessionreq` (`id`, `regno`, `stuname`, `fname`, `amt`, `remarks`, `date`, `regby`, `Emidate`, `emi_id`, `status`, `disablests`) VALUES
(31, 'ACSep00001', 'klklklklk', 'kulwant', '200', 'ui deta', '26-09-24', 'User', '2024-10-25', '426', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `emis`
--

CREATE TABLE `emis` (
  `id` int(11) NOT NULL,
  `regno` varchar(100) DEFAULT NULL,
  `stuname` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `amt` varchar(100) DEFAULT NULL,
  `refund` text DEFAULT NULL,
  `concession` varchar(100) DEFAULT NULL,
  `paydate` varchar(100) DEFAULT NULL,
  `mop` varchar(100) DEFAULT NULL,
  `refno` text DEFAULT NULL,
  `tranno` varchar(100) DEFAULT NULL,
  `cheqno` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `status` text NOT NULL,
  `regby` text DEFAULT NULL,
  `disablests` text NOT NULL DEFAULT '0',
  `apr_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emis`
--

INSERT INTO `emis` (`id`, `regno`, `stuname`, `fname`, `amt`, `refund`, `concession`, `paydate`, `mop`, `refno`, `tranno`, `cheqno`, `remarks`, `status`, `regby`, `disablests`, `apr_date`) VALUES
(232, 'ACAug00001', 'demo', 'testing', '2000.00', NULL, NULL, '30-08-24', 'Cash', '3135', '', '', NULL, '', 'User', '1', NULL),
(233, 'ACAug00002', 'bawa', 'gdh', '3000.00', NULL, NULL, '31-08-24', 'Cash', '3136', '', '', NULL, '', 'User', '0', NULL),
(234, 'ACAug00002', 'bawa', 'gdh', '3000.00', NULL, NULL, '25-09-24', 'Cash', '3137', '', '', NULL, '0', 'User', '0', '25-09-2024'),
(235, 'ACSep00001', 'klklklklk', 'kulwant', '2000.00', NULL, NULL, '25-09-24', 'Cash', '3138', '', '', NULL, '', 'User', '0', NULL),
(236, 'ACSep00002', 'klklklklk', 'kulwantdsddfdf', '1500.00', NULL, NULL, '25-09-24', 'Cash', '3139', '', '', NULL, '', 'User', '0', NULL),
(237, 'ACSep00002', 'klklklklk', 'kulwantdsddfdf', '1500.00', NULL, NULL, '25-09-24', 'Cash', '3140', '', '', NULL, '0', 'User', '0', '25-09-2024'),
(238, 'ACSep00003', 'klklklklkgyutyu', 'kulwanthj', '2000.00', NULL, NULL, '26-09-24', 'Cash', '3141', '', '', NULL, '', 'User', '0', NULL),
(239, 'ACSep00004', 'klklklklkgyutyu', 'kulwanthj', '3000.00', NULL, NULL, '26-09-24', 'Cash', '3142', '', '', NULL, '', 'User', '0', NULL),
(240, 'ACSep00001', 'klklklklk', 'kulwant', NULL, NULL, '200', '26-09-24', NULL, '3143', NULL, NULL, NULL, '', 'User', '0', NULL),
(241, 'ACAug00002', 'bawa', 'gdh', NULL, '2000', NULL, '26-09-24', NULL, '3144', NULL, NULL, 'sdfsdfsd ui', '', 'User', '0', NULL),
(242, 'ACApr00001', 'demo', 'demof', '1000.00', NULL, NULL, '01-04-25', 'Cash', '3145', '', '', NULL, '', 'User', '0', NULL);

--
-- Triggers `emis`
--
DELIMITER $$
CREATE TRIGGER `getID` BEFORE INSERT ON `emis` FOR EACH ROW BEGIN
                      INSERT INTO test_id_db VALUES (NULL);
                      SET NEW.refno = CONCAT(LPAD(LAST_INSERT_ID(), 4, "3000"));
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `installments`
--

CREATE TABLE `installments` (
  `id` int(11) NOT NULL,
  `user_id` text DEFAULT NULL,
  `batch_id` text DEFAULT NULL,
  `pack_id` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `fine` text DEFAULT '0',
  `concession` text DEFAULT '0',
  `emis` text DEFAULT NULL,
  `paydate` text DEFAULT NULL,
  `paytype` text DEFAULT NULL,
  `regby` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `disablests` text DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `installments`
--

INSERT INTO `installments` (`id`, `user_id`, `batch_id`, `pack_id`, `amount`, `fine`, `concession`, `emis`, `paydate`, `paytype`, `regby`, `date`, `status`, `disablests`) VALUES
(420, '151', '16', '17', '2000.00', '0', '0', '3', '2024-08-30', 'Monthly', 'User', '30-08-2024', '1', '1'),
(421, '151', '16', '17', '2000.00', '0', '0', '3', '2024-09-30', 'Monthly', 'User', '30-08-2024', '0', '1'),
(422, '151', '16', '17', '2000.00', '0', '0', '3', '2024-10-30', 'Monthly', 'User', '30-08-2024', '0', '1'),
(423, '152', '16', '17', '3000.00', '0', '0', '2', '2024-08-30', 'Monthly', 'User', '30-08-2024', '1', '0'),
(424, '152', '16', '17', '3000.00', '0', '0', '2', '2024-09-30', 'Monthly', 'User', '30-08-2024', '1', '0'),
(425, '153', '16', '17', '2000.00', '0', '0', '3', '2024-09-25', 'Monthly', 'User', '25-09-2024', '1', '0'),
(426, '153', '16', '17', '1600', '0', '200', '3', '2024-10-25', 'Monthly', 'User', '25-09-2024', '0', '0'),
(427, '153', '16', '17', '2200.00', '0', '0', '3', '2024-11-25', 'Monthly', 'User', '25-09-2024', '0', '0'),
(428, '154', '16', '17', '1500.00', '0', '0', '4', '2024-09-25', 'Monthly', 'User', '25-09-2024', '1', '0'),
(429, '154', '16', '17', '1500.00', '0', '0', '4', '2024-10-25', 'Monthly', 'User', '25-09-2024', '1', '0'),
(430, '154', '16', '17', '1500.00', '0', '0', '4', '2024-11-25', 'Monthly', 'User', '25-09-2024', '0', '0'),
(431, '154', '16', '17', '1500.00', '0', '0', '4', '2024-12-25', 'Monthly', 'User', '25-09-2024', '0', '0'),
(438, '157', '16', '17', '2000.00', '0', '0', '3', '2024-09-26', 'Monthly', 'User', '26-09-2024', '1', '0'),
(439, '157', '16', '17', '2000.00', '0', '0', '3', '2024-10-26', 'Monthly', 'User', '26-09-2024', '0', '0'),
(440, '157', '16', '17', '2000.00', '0', '0', '3', '2024-11-26', 'Monthly', 'User', '26-09-2024', '0', '0'),
(441, '158', '16', '17', '3000.00', '0', '0', '2', '2024-09-26', 'Monthly', 'User', '26-09-2024', '1', '0'),
(442, '158', '16', '17', '3000.00', '0', '0', '2', '2024-10-26', 'Monthly', 'User', '26-09-2024', '0', '0'),
(443, '159', '16', '17', '3000.00', '0', '0', '2', '2024-09-26', 'Monthly', 'User', '26-09-2024', '0', '0'),
(444, '159', '16', '17', '3000.00', '0', '0', '2', '2024-10-26', 'Monthly', 'User', '26-09-2024', '0', '0'),
(445, '160', '16', '17', '1000.00', '0', '0', '3', '2025-04-01', 'Monthly', 'User', '01-04-2025', '1', '0'),
(446, '160', '16', '17', '3000.00', '0', '0', '3', '2025-05-01', 'Monthly', 'User', '01-04-2025', '0', '0'),
(447, '160', '16', '17', '2000.00', '0', '0', '3', '2025-06-01', 'Monthly', 'User', '01-04-2025', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pack`
--

CREATE TABLE `pack` (
  `id` int(11) NOT NULL,
  `batchname` varchar(100) DEFAULT NULL,
  `packname` varchar(50) NOT NULL,
  `packprice` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pack`
--

INSERT INTO `pack` (`id`, `batchname`, `packname`, `packprice`, `date`) VALUES
(17, '16', 'pack1', '6000', '30-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `pendingpay`
--

CREATE TABLE `pendingpay` (
  `id` int(11) NOT NULL,
  `regno` varchar(200) DEFAULT NULL,
  `stuname` varchar(200) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `feepack` varchar(200) DEFAULT NULL,
  `packfee` text DEFAULT NULL,
  `paidamt` text NOT NULL,
  `refund` text DEFAULT NULL,
  `concession` varchar(100) DEFAULT NULL,
  `pendingfee` text DEFAULT NULL,
  `pendingpaydate` varchar(200) DEFAULT NULL,
  `pendingsts` varchar(1) NOT NULL,
  `mop` varchar(100) DEFAULT NULL,
  `tranno` varchar(100) DEFAULT NULL,
  `cheqno` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT '0',
  `regby` varchar(100) NOT NULL,
  `disablests` text DEFAULT '0',
  `apr_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendingpay`
--

INSERT INTO `pendingpay` (`id`, `regno`, `stuname`, `fname`, `email`, `feepack`, `packfee`, `paidamt`, `refund`, `concession`, `pendingfee`, `pendingpaydate`, `pendingsts`, `mop`, `tranno`, `cheqno`, `status`, `regby`, `disablests`, `apr_date`) VALUES
(81, 'ACAug00001', 'demo', 'testing', 'simar.k.parmar@gmail', '17', '6000', '2000.00', NULL, NULL, '4000', '30-08-24', '0', NULL, NULL, NULL, '0', 'User', '1', NULL),
(82, 'ACAug00002', 'bawa', 'gdh', 'kulwantablu@gmail.co', '17', '6000', '4000', '2000', NULL, '0', '25-09-24', '1', NULL, NULL, NULL, '0', 'User', '0', '25-09-2024'),
(83, 'ACSep00001', 'klklklklk', 'kulwant', 'uio@gmail.com', '17', '6000', '2000.00', NULL, '200', '3800', '25-09-24', '0', NULL, NULL, NULL, '0', 'User', '0', NULL),
(84, 'ACSep00002', 'klklklklk', 'kulwantdsddfdf', 'uio@gmail.com', '17', '6000', '3000', NULL, NULL, '3000', '25-09-24', '0', NULL, NULL, NULL, '0', 'User', '0', '25-09-2024'),
(85, 'ACSep00003', 'klklklklkgyutyu', 'kulwanthj', 'uio@gmail.com', '17', '6000', '2000.00', NULL, NULL, '4000', '26-09-24', '0', NULL, NULL, NULL, '0', 'User', '0', NULL),
(86, 'ACSep00004', 'klklklklkgyutyu', 'kulwanthj', 'uio@gmail.com', '17', '6000', '3000.00', NULL, NULL, '3000', '26-09-24', '0', NULL, NULL, NULL, '0', 'User', '0', NULL),
(87, 'ACApr00001', 'demo', 'demof', 'kulwantablu@gmail.co', '17', '6000', '1000.00', NULL, NULL, '5000', '01-04-25', '0', NULL, NULL, NULL, '0', 'User', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `regno` varchar(20) DEFAULT NULL,
  `batchname` varchar(20) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `stuname` varchar(20) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `mobno` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `highqual` varchar(20) DEFAULT NULL,
  `feepack` varchar(50) DEFAULT NULL,
  `paytype` varchar(100) NOT NULL,
  `packfee` text DEFAULT NULL,
  `otherqual` varchar(200) DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `gurukukll` varchar(20) DEFAULT NULL,
  `gurukulid` varchar(20) DEFAULT NULL,
  `roomno` varchar(20) DEFAULT NULL,
  `entrydate` varchar(20) DEFAULT NULL,
  `leftdate` varchar(20) DEFAULT NULL,
  `paydate` varchar(100) DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `pending` text DEFAULT NULL,
  `refund` text DEFAULT NULL,
  `concession` text DEFAULT NULL,
  `gst` varchar(30) DEFAULT NULL,
  `mop` varchar(20) DEFAULT NULL,
  `tranno` varchar(30) DEFAULT NULL,
  `cheqno` varchar(30) DEFAULT NULL,
  `refno` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `Installment` varchar(10) DEFAULT NULL,
  `regby` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT '0',
  `refundsts` text NOT NULL,
  `constatus` text NOT NULL,
  `batchsts` text DEFAULT NULL,
  `disablests` text DEFAULT '0',
  `apr_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `regno`, `batchname`, `pic`, `stuname`, `fname`, `mobno`, `email`, `address`, `category`, `highqual`, `feepack`, `paytype`, `packfee`, `otherqual`, `file`, `dob`, `gurukukll`, `gurukulid`, `roomno`, `entrydate`, `leftdate`, `paydate`, `amount`, `pending`, `refund`, `concession`, `gst`, `mop`, `tranno`, `cheqno`, `refno`, `remarks`, `Installment`, `regby`, `status`, `refundsts`, `constatus`, `batchsts`, `disablests`, `apr_date`) VALUES
(151, 'ACAug00001', '16', 'upload/asde.jpg', 'demo', 'testing', '9803456598', 'simar.k.parmar@gmail', 'ty', 'OBC', 'Diploma', '17', 'Monthly', '6000', '', 'upload/fileTesting.pdf', '2024-08-30', NULL, NULL, NULL, NULL, NULL, '30-08-24', '2000.00', '4000', NULL, NULL, '18', 'Cash', '', '', '0', NULL, NULL, 'User', '1', '', '', NULL, '1', NULL),
(152, 'ACAug00002', '17', 'upload/rgg.png', 'bawa', 'gdh', '9999999999', 'kulwantablu@gmail.co', 'WARD NO 8 24SSW Hanumangarh Rajasthan', 'ST', '12th', '17', 'Monthly', '6000', '', 'upload/pdf/Testing.pdf', '2024-08-30', NULL, NULL, NULL, NULL, NULL, '31-08-24', '4000', '0', '2000', NULL, '18', 'Cash', '', '', '0', 'sdfsdfsd ui', NULL, 'User', '0', '1', '', '1', '0', '28-09-2024'),
(153, 'ACSep00001', '16', 'upload/dddd.jpg', 'klklklklk', 'kulwant', '9999999999', 'uio@gmail.com', 'WARD NO 8 24SSW Hanumangarh Rajasthan', 'General', '10th', '17', 'Monthly', '6000', '', 'upload/fileTesting.pdf', '1995-09-25', NULL, NULL, NULL, NULL, NULL, '25-09-24', '2000.00', '3800', NULL, '200', '18', 'Cash', '', '', '0', NULL, NULL, 'User', NULL, '', '1', NULL, '0', NULL),
(154, 'ACSep00002', '16', 'upload/df.jpg', 'klklklklk', 'kulwantdsddfdf', '9999999999', 'uio@gmail.com', 'WARD NO 8 24SSW Hanumangarh Rajasthan', 'OBC', 'Graduation', '17', 'Monthly', '6000', '', 'upload/fileTesting.pdf', '2024-09-25', NULL, NULL, NULL, NULL, NULL, '25-09-24', '3000', '3000', NULL, NULL, '18', 'Cash', '', '', '0', NULL, NULL, 'User', '0', '', '', NULL, '0', '27-09-2024'),
(157, 'ACSep00003', '16', 'images/icon.png', 'klklklklkgyutyu', 'kulwanthj', '9999999999', 'uio@gmail.com', 'WARD NO 8 24SSW Hanumangarh Rajasthan', 'OBC', 'Diploma', '17', 'Monthly', '6000', '', 'images/pdf-icon.png', '2024-09-26', NULL, NULL, NULL, NULL, NULL, '26-09-24', '2000.00', '4000', NULL, NULL, '18', 'Cash', '', '', '0', NULL, NULL, 'User', '0', '', '', NULL, '0', '27-09-2024'),
(158, 'ACSep00004', '16', 'images/icon.png', 'klklklklkgyutyu', 'kulwanthj', '9999999999', 'uio@gmail.com', 'WARD NO 8 24SSW Hanumangarh Rajasthan', 'BC', '10th', '17', 'Monthly', '6000', '', 'images/pdf-icon.png', '2024-09-26', NULL, NULL, NULL, NULL, NULL, '26-09-24', '3000.00', '3000', NULL, NULL, '18', 'Cash', '', '', '0', NULL, NULL, 'User', '1', '', '', NULL, '0', '26-09-2024'),
(159, 'ACSep00005', '16', 'images/icon.png', 'klklklklkgyutyu', 'kulwanthj', '9999999999', 'uio@gmail.com', 'WARD NO 8 24SSW Hanumangarh Rajasthan', 'General', '10th', '17', 'Monthly', '6000', '', 'images/pdf-icon.png', '2024-09-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User', '0', '', '', NULL, '0', NULL),
(160, 'ACApr00001', '16', 'upload/asde.jpg', 'demo', 'demof', '9803456598', 'kulwantablu@gmail.co', 'asdasd', 'OBC', '12th', '17', 'Monthly', '6000', '', 'upload/fileTesting.pdf', '2025-04-01', NULL, NULL, NULL, NULL, NULL, '01-04-25', '1000.00', '5000', NULL, NULL, '18', 'Cash', '', '', '0', NULL, NULL, 'User', '1', '', '', NULL, '0', '02-04-2025');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `id` int(11) NOT NULL,
  `regno` varchar(50) DEFAULT NULL,
  `stuname` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `amt` text DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `status` varchar(11) DEFAULT '0',
  `regby` text DEFAULT NULL,
  `disablests` text DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`id`, `regno`, `stuname`, `fname`, `amt`, `date`, `remarks`, `status`, `regby`, `disablests`) VALUES
(8, 'ACAug00002', 'bawa', 'gdh', '2000', '26-09-24', 'sdfsdfsd ui', '1', 'User', '0');

-- --------------------------------------------------------

--
-- Table structure for table `refundreq`
--

CREATE TABLE `refundreq` (
  `id` int(11) NOT NULL,
  `regno` text DEFAULT NULL,
  `stuname` text DEFAULT NULL,
  `fname` text DEFAULT NULL,
  `amt` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `regby` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `disablests` text DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refundreq`
--

INSERT INTO `refundreq` (`id`, `regno`, `stuname`, `fname`, `amt`, `remarks`, `date`, `regby`, `status`, `disablests`) VALUES
(5, 'ACAug00002', 'bawa', 'gdh', '2000', 'sdfsdfsd ui', '26-09-24', 'User', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `test_id_db`
--

CREATE TABLE `test_id_db` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `test_id_db`
--

INSERT INTO `test_id_db` (`id`) VALUES
(135),
(136),
(137),
(138),
(139),
(140),
(141),
(142),
(143),
(144),
(145);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applyleave`
--
ALTER TABLE `applyleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batchreq`
--
ALTER TABLE `batchreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concession`
--
ALTER TABLE `concession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concessionreq`
--
ALTER TABLE `concessionreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emis`
--
ALTER TABLE `emis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installments`
--
ALTER TABLE `installments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pack`
--
ALTER TABLE `pack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendingpay`
--
ALTER TABLE `pendingpay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refundreq`
--
ALTER TABLE `refundreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_id_db`
--
ALTER TABLE `test_id_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `applyleave`
--
ALTER TABLE `applyleave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `batchreq`
--
ALTER TABLE `batchreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `concession`
--
ALTER TABLE `concession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `concessionreq`
--
ALTER TABLE `concessionreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `emis`
--
ALTER TABLE `emis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `installments`
--
ALTER TABLE `installments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;

--
-- AUTO_INCREMENT for table `pack`
--
ALTER TABLE `pack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pendingpay`
--
ALTER TABLE `pendingpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `refundreq`
--
ALTER TABLE `refundreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_id_db`
--
ALTER TABLE `test_id_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
