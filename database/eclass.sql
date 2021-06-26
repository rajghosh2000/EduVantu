-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 10:48 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `sno` int(11) NOT NULL,
  `assign_id` varchar(11) NOT NULL,
  `assign_name` varchar(50) NOT NULL,
  `class_id` varchar(8) NOT NULL,
  `assign_text` varchar(500) NOT NULL,
  `assign_deadline` varchar(20) NOT NULL,
  `assign_file` varchar(500) NOT NULL,
  `marks` text NOT NULL,
  `assign_stmp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `sno` int(11) NOT NULL,
  `class_id` varchar(6) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_desc` varchar(105) NOT NULL,
  `u_email` varchar(40) NOT NULL,
  `class_join_code` varchar(11) NOT NULL,
  `std_count` int(11) NOT NULL DEFAULT 0,
  `class_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `std_class`
--

CREATE TABLE `std_class` (
  `class_id` varchar(6) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `class_join_code` varchar(11) NOT NULL,
  `usr_stmp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `submit`
--

CREATE TABLE `submit` (
  `sno` int(11) NOT NULL,
  `assign_id` varchar(10) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `submit_file` varchar(500) NOT NULL,
  `assign_marks` varchar(4) NOT NULL,
  `submit_stmp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_name` text NOT NULL,
  `dob` varchar(100) NOT NULL,
  `usr_email` varchar(40) NOT NULL,
  `usr_pwd` varchar(100) NOT NULL,
  `usr_stamp` datetime NOT NULL DEFAULT current_timestamp(),
  `usr_start_otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `std_class`
--
ALTER TABLE `std_class`
  ADD PRIMARY KEY (`usr_stmp`);

--
-- Indexes for table `submit`
--
ALTER TABLE `submit`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `submit`
--
ALTER TABLE `submit`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
