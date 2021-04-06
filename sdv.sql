-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 02:45 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `actbacklog` varchar(100) NOT NULL,
  `cgpa` varchar(100) NOT NULL,
  `result` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `first_name`, `last_name`, `batch`, `branch`, `regno`, `actbacklog`, `cgpa`, `result`, `status`, `created_date`) VALUES
(2, 'banita', 'swain', '1', '1', '0901298064', 'no', '8.65', 1, 0, '2021-03-29 00:00:00'),
(3, 'banita', 'swain', 'Batch 2', 'Branch 2', '0901298064', 'no', '8.65', 2, 1, '2021-03-29 00:00:00'),
(4, 'Alpha', 'swain', 'Batch 1', 'Branch 2', '09012943', '345', '34', 1, 1, '2021-03-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentcampous`
--

CREATE TABLE `tbl_studentcampous` (
  `id` int(11) NOT NULL,
  `year_wise` year(4) DEFAULT NULL,
  `student_placed` int(11) DEFAULT NULL,
  `student_passed` int(11) DEFAULT NULL,
  `chart_type` smallint(1) NOT NULL,
  `status` smallint(1) NOT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studentcampous`
--

INSERT INTO `tbl_studentcampous` (`id`, `year_wise`, `student_placed`, `student_passed`, `chart_type`, `status`, `created_date`) VALUES
(1, 2019, 60, 40, 1, 1, '2021-03-04'),
(3, 2015, 30, NULL, 2, 1, NULL),
(4, 2016, 20, NULL, 2, 1, NULL),
(5, 2017, 30, NULL, 2, 1, NULL),
(6, 2018, 20, NULL, 2, 1, NULL),
(7, 2019, 30, NULL, 2, 1, NULL),
(8, 2020, 10, NULL, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `enc_pwd` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `is_pswd_cngd` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_studentcampous`
--
ALTER TABLE `tbl_studentcampous`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_studentcampous`
--
ALTER TABLE `tbl_studentcampous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
