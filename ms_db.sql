-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 10:14 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_registration`
--

CREATE TABLE `admin_registration` (
  `a_ld` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_registration`
--

INSERT INTO `admin_registration` (`a_ld`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assign_work`
--

CREATE TABLE `assign_work` (
  `r_no` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `request_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_add1` text COLLATE utf8_bin NOT NULL,
  `request_add2` text COLLATE utf8_bin NOT NULL,
  `request_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `req_region` varchar(60) COLLATE utf8_bin NOT NULL,
  `req_postalcode` int(11) NOT NULL,
  `req_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `req_phone` bigint(20) NOT NULL,
  `tech_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `asign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assign_work`
--

INSERT INTO `assign_work` (`r_no`, `request_id`, `request_info`, `request_desc`, `request_name`, `request_add1`, `request_add2`, `request_city`, `req_region`, `req_postalcode`, `req_email`, `req_phone`, `tech_name`, `asign_date`) VALUES
(3, 6, 'ac', 'cooling', 'usama', '4566/343', 'fgghg', 'wah cantt', 'punjab', 1234, 'usama@gmail.com', 344455, 'ali', '2021-09-15'),
(4, 7, 'laptop', 'led', 'usama', 'cb-324/7', 'jinnah colony', 'wah cantt', 'punjab', 1234, 'usama12@gmail.com', 3737667866, 'ali', '2021-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `registration_db`
--

CREATE TABLE `registration_db` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `registration_db`
--

INSERT INTO `registration_db` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(16, 'umar', 'umar@gmail.com', '12345'),
(17, 'samar', 'samar@gmail.com', '12345'),
(18, '123', 'usama12@gmail.com', ''),
(19, '12', 'usama@gmail.com', ''),
(20, '12345', 'usama12@gmail.com', ''),
(21, '1', 'usama12@gmail.com', ''),
(22, 'usama3', 'usama12@gmail.com', '55'),
(23, 'usama', 'usama@gmail.com', '12'),
(24, 'usama', 'qww', '12'),
(25, 'rrrr', 'rrr@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `r_id` int(11) NOT NULL,
  `r_info` text COLLATE utf8_bin NOT NULL,
  `r_description` text COLLATE utf8_bin NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_address1` text COLLATE utf8_bin NOT NULL,
  `r_address2` text COLLATE utf8_bin NOT NULL,
  `r_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_region` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_postalcode` int(11) NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_phone` bigint(20) NOT NULL,
  `r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`r_id`, `r_info`, `r_description`, `r_name`, `r_address1`, `r_address2`, `r_city`, `r_region`, `r_postalcode`, `r_email`, `r_phone`, `r_date`) VALUES
(8, 'laptop', 'window ', 'usama', '234', 'jinnah colony', 'wah cantt', 'punjab', 234, 'usama@gmail.com', 3737667866, '2021-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `technition_tb`
--

CREATE TABLE `technition_tb` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `emp_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `emp_phone` bigint(20) NOT NULL,
  `emp_email` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technition_tb`
--

INSERT INTO `technition_tb` (`emp_id`, `emp_name`, `emp_city`, `emp_phone`, `emp_email`) VALUES
(3, 'ali', 'wah', 8888997, 'ali@gmail.com'),
(4, 'huzafa', 'wah', 8888997, 'ali12@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_registration`
--
ALTER TABLE `admin_registration`
  ADD PRIMARY KEY (`a_ld`);

--
-- Indexes for table `assign_work`
--
ALTER TABLE `assign_work`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `registration_db`
--
ALTER TABLE `registration_db`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `technition_tb`
--
ALTER TABLE `technition_tb`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_registration`
--
ALTER TABLE `admin_registration`
  MODIFY `a_ld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assign_work`
--
ALTER TABLE `assign_work`
  MODIFY `r_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration_db`
--
ALTER TABLE `registration_db`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `technition_tb`
--
ALTER TABLE `technition_tb`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
