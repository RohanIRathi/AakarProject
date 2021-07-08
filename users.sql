CREATE DATABASE IF NOT EXISTS `aakar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `aakar`;
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2021 at 06:01 AM
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
('00001', '', 'admin@gmail.com', '$2y$10$rSDD/KcGB9Yd6KRJNhSCmef9fbnaJ0B9nlmThEeNtsdF77bG8QoM2', 'Admin', '');

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
  `hod_id` varchar(20) NOT NULL,
  `hod_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `username`, `email`, `password`, `first_name`, `last_name`, `hod_id`, `hod_name`) VALUES
('30001', '', 'employee1@gmail.com', '$2y$10$yAEkOUZ.Kmc1mf65ksb6t.Q5g7jJEwlWvbNm35OQ92unHBkhYhEjO', 'EMP', '1', '20001', '');

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
  `timestamp` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `actual_start_time` varchar(20) NOT NULL,
  `actual_end_time` varchar(20) NOT NULL,
  `date_of_leave` varchar(10) NOT NULL,
  `reason` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_leave_pass`
--

INSERT INTO `emp_leave_pass` (`leave_pass_id`, `employee_id`, `emp_name`, `hod_id`, `Purpose`, `start_time`, `end_time`, `timestamp`, `status`, `actual_start_time`, `actual_end_time`, `date_of_leave`, `reason`) VALUES
(52, '30001', 'EMP 1', '20001', 'Reason', '12:17', '14:18', '1625712562', 'ACCEPTED_FIN', '1625713828', '1625713843', '08/07/2021', 'profession'),
(53, '30001', 'EMP 2', '20001', 'Reason', '12:38', '14:38', '1625713695', 'ONGOING', '1625714619', '', '08/07/2021', 'personal');

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
('20001', '', 'hod@gmail.com', '$2y$10$no4wP.ZB0GrdO/YYD7lzqOiD9ZiSGV9qtyJEipLmo2eBLa8t9DLQW', 'HOD', '1', '00001'),
('20002', '', 'hod2@gmail.com', '$2y$10$M4z5eXjba4qMkVDo0rvktOGUZdOaAgsTUxZEXu3nmw54Gp5glkyba', 'HOD', '2', '00001');

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
('10001', '', 'admin_security@gmail.com', '$2y$10$z5qh8BHQb1zxnEeyfBVayOXYcJaWWPTGABv4nxI.BmFL0nTlFjsby', 'Admin', '');

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
  `status` varchar(20) NOT NULL
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
  MODIFY `leave_pass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
