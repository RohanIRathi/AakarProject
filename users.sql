CREATE DATABASE IF NOT EXISTS `aakar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `aakar`;
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2021 at 03:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2021 at 09:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2021 at 08:49 AM
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
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `first_name`, `last_name`, `email`, `purpose`, `photo_id`, `time`, `noofvisitors`, `photo_id_no`, `hospitality`, `conference`, `conference_room`, `room_purpose`, `start_time`, `end_time`, `visitee`, `tokenid`, `phone_no`, `dateofappointment`, `status`) VALUES
(47, 'Vinay', 'Kothari', 'siddharthkothari655@gmail.com', 'on', '', '1613843580', 1, 12, 0, 0, '', '', '1613806663', '1613806688', '00001', '$2y$10$ZosZ6m3LxFyfxRx74jzzAO6ULpaim1bGfO14j3EfAojcdF.EfD2Gm', '7021019903', '20-02-21', 'ACCEPTED_FINISHED'),
(48, 'Siddharth', 'Kothari', 'siddharthkothari655@gmail.com', 'on', '', '1613843580', 1, 1, 0, 0, '', '', '', '', '00001', '$2y$10$Pqp7TZjbgHzE30jWGL7r0.2Z52DvOpgEXDlhnGqYAC.Q63MsMxw8m', '7021019903', '20-02-21', 'BOOKED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
