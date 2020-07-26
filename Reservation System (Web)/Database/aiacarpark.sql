-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 05:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aiacarpark`
--

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `invoice_num` int(10) NOT NULL,
  `vehicle_num` varchar(8) NOT NULL,
  `parked_date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time DEFAULT NULL,
  `cost` int(4) DEFAULT NULL,
  `slot_id` int(2) NOT NULL,
  `guard_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`invoice_num`, `vehicle_num`, `parked_date`, `in_time`, `out_time`, `cost`, `slot_id`, `guard_id`) VALUES
(3344424, 'ffg8877', '2020-07-26', '20:40:00', '20:45:00', 0, 2, 120);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slot_num` int(2) NOT NULL,
  `invoice_num` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slot_num`, `invoice_num`, `status`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL),
(4, NULL, NULL),
(5, NULL, NULL),
(6, NULL, NULL),
(7, NULL, NULL),
(8, NULL, NULL),
(9, NULL, NULL),
(10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `emp_id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` enum('admin','guard') NOT NULL DEFAULT 'guard'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`emp_id`, `username`, `password`, `type`) VALUES
(119, 'gg', '73c18c59a39b18382081ec00bb456d43', 'admin'),
(120, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'guard');

-- --------------------------------------------------------

--
-- Table structure for table `vip_vehicles`
--

CREATE TABLE `vip_vehicles` (
  `employee_id` int(10) NOT NULL,
  `vehicle_num` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vip_vehicles`
--

INSERT INTO `vip_vehicles` (`employee_id`, `vehicle_num`) VALUES
(1, 'caw2224'),
(112, 'wer9999'),
(115, 'caw3456'),
(116, 'cas2224'),
(117, 'WAS8889'),
(125, 'caw3345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`invoice_num`),
  ADD KEY `slot_id` (`slot_id`),
  ADD KEY `report_ibfk_1` (`guard_id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slot_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `vip_vehicles`
--
ALTER TABLE `vip_vehicles`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `invoice_num` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3344425;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `vip_vehicles`
--
ALTER TABLE `vip_vehicles`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`guard_id`) REFERENCES `users` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
