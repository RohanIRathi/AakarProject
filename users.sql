CREATE DATABASE IF NOT EXISTS `aakar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `aakar`;
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2020 at 09:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2021 at 10:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `first_name`, `last_name`) VALUES
('00001', '', 'admin@gmail.com', '$2y$10$rSDD/KcGB9Yd6KRJNhSCmef9fbnaJ0B9nlmThEeNtsdF77bG8QoM2', 'Admin', ''),
('00002', '', 'siddharthkothari655@gmail.com', '$2y$10$OWPwst9ma9nPi6GxRPaYWukfQZXNGpx8OVVYQYwT9WN.oNABPoyRO', 'Siddharth', 'Kothari'),
('00003', '', 'shrinidhi.21810366@viit.ac.in', '$2y$10$j9TKwq1oKAtOCZb2kH.hu.3gM1.6x.qqbR0S8j6anYgysI8abPsTK', 'Shrinidhi', ' -');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(20) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `hod_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `username`, `email`, `password`, `first_name`, `last_name`, `hod_id`) VALUES
('00001', '', 'admin@gmail.com', '$2y$10$ZDYsPNnsiqUL6QonhFIloOnlbWsH3q/l4tiGWK.xcPoqES/ZXQuHm', 'Admin', '', '00001'),
('00003', '', 'vknk986@gmail.com', '$2y$10$8q4mX94SZvG28dbwbhhj/uYOrHC2RxpiJaCIeWgcZQaOml4Cj5rAu', 'Vinay', 'Kothari', '00003'),
('00004', '', 'dhwanikothari.nmims@gmail.com', '$2y$10$/wpvGHi1MwlA6qMBpweJZOm.R8RaaTb0gUyKN7.R5EsPvXKNRzglq', 'Dhwani', 'Kothari', '00003');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave_pass`
--

CREATE TABLE `emp_leave_pass` (
  `leave_pass_id` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `hod_id` varchar(20) NOT NULL,
  `Purpose` text NOT NULL,
  `start_time` varchar(20) NOT NULL,
  `end_time` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_leave_pass`
--

INSERT INTO `emp_leave_pass` (`leave_pass_id`, `employee_id`, `emp_name`, `hod_id`, `Purpose`, `start_time`, `end_time`, `status`) VALUES
(1, '00003', 'Vinay ', '00003', 'To collect very important documents and laptop of my son from his temporary address studying in VIIT college.', '12:12', '12:12', ''),
(2, '00003', 'Vinay Kothari', '00003', 'To collect very important documents and laptop of my son from his temporary address studying in VIIT college.', '12:12', '12:12', ''),
(3, '00003', 'Vinay Kothari', '00003', 'To collect very important documents and laptop of my son from his temporary address studying in VIIT college.', '12:12', '12:12', 'REQ_SENT'),
(4, '00003', 'Vinay Kothari', '00003', 'To collect very important documents and laptop of my son from his temporary address studying in VIIT college.', '12:12', '12:12', 'REQ_SENT'),
(5, '00003', 'Vinay Kothari', '00003', 'To collect very important documents and laptop of my son from his temporary address studying in VIIT college.', '12:12', '12:12', 'REQ_SENT');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `hod_id` varchar(20) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `admin_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`hod_id`, `username`, `email`, `password`, `first_name`, `last_name`, `admin_id`) VALUES
('00001', '', 'admin@gmail.com', '$2y$10$oIpRCA0tbZyHJc7O2XgMWOg2HXHpGq6RovOKAnSlmtl4mnv9o5po6', 'Admin', '', '00001'),
('00003', '', 'vknk986@gmail.com', '$2y$10$lGenWXiiqrwm/6WRV.l0M.zOZkWDF2ckwokYI46FOc6vClG6jOwKy', 'Vinay', 'Kothari', '00002');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id` varchar(20) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id`, `username`, `email`, `password`, `first_name`, `last_name`) VALUES
('1', '', 'admin@gmail.com', '$2y$10$MdLm1e2V4.Bo7JPfUrsVAOpzyRnGBa/QB4uuhrgdV9bBf8fX2wbci', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(10) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `purpose` varchar(45) NOT NULL,
  `photo_id` text NOT NULL,
  `time` varchar(255) NOT NULL,
  `noofvisitors` int(11) NOT NULL DEFAULT 1,
  `photo_id_no` int(11) NOT NULL,
  `hospitality` int(11) DEFAULT NULL,
  `conference` tinyint(1) NOT NULL DEFAULT 0,
  `conference_room` varchar(32) DEFAULT NULL,
  `room_purpose` varchar(45) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `visitee` varchar(45) NOT NULL,
  `tokenid` varchar(255) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `dateofappointment` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'BOOKED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `FKK` (`hod_id`);

--
-- Indexes for table `emp_leave_pass`
--
ALTER TABLE `emp_leave_pass`
  ADD PRIMARY KEY (`leave_pass_id`),
  ADD KEY `empIdFD` (`employee_id`),
  ADD KEY `hodIdFK` (`hod_id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`hod_id`),
  ADD KEY `FK` (`admin_id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_leave_pass`
--
ALTER TABLE `emp_leave_pass`
  MODIFY `leave_pass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FKK` FOREIGN KEY (`hod_id`) REFERENCES `hod` (`hod_id`);

--
-- Constraints for table `emp_leave_pass`
--
ALTER TABLE `emp_leave_pass`
  ADD CONSTRAINT `empIdFD` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `hodIdFK` FOREIGN KEY (`hod_id`) REFERENCES `hod` (`hod_id`);

--
-- Constraints for table `hod`
--
ALTER TABLE `hod`
  ADD CONSTRAINT `FK` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
