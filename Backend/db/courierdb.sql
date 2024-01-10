-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 06:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courierdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(30) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `street`, `city`, `zip_code`, `country`, `contact`, `date_created`) VALUES
(1, 'vzTL0PqMogyOWhF', 'Branch 1 Karachi', 'Karachi', '1001', 'Pakistan', '+2 123 455 623', '2020-11-26 11:21:41'),
(2, 'KyIab3mYBgAX71t', 'Branch 2 Mianwali', 'Mianwali', '6000', 'Pakistan', '+1234567489', '2020-11-26 16:45:05'),
(3, 'dIbUK5mEh96f0Zc', 'Branch 3 Sialkot', 'Sialkot', '123456', 'Pakistan', '+ 1231313123', '2020-11-27 13:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(1000) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_address` text NOT NULL,
  `sender_contact` text NOT NULL,
  `recipient_name` text NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_contact` text NOT NULL,
  `from_branch_id` varchar(30) NOT NULL,
  `to_branch_id` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1' COMMENT '1 = Shipped\r\n2 = In Progress\r\n3 = Delivered\r\n',
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `reference_number`, `sender_name`, `sender_address`, `sender_contact`, `recipient_name`, `recipient_address`, `recipient_contact`, `from_branch_id`, `to_branch_id`, `amount`, `status`, `date_created`) VALUES
(23, '751422371802', 'Abdulah Ghazi', 'AbbasTown123 Homelander', '11112222333', 'Mohtashim', 'Shahfaisal,town', '44445555666', '1', '3', 500, '2', '2023-12-16'),
(24, '257348740412', 'Hamza', 'Example Hometown, Example City', '11117777222', 'Example', 'Example Society, Example City', '00001111333', '2', '1', 1500, '3', '2023-12-18'),
(25, '768886382120', 'John Smith', '123 Main Street, Anytown, USA', '15551234567', 'Sarah Johnson', '456 Oak Avenue, Somewhere City, USA', '15559876543', '3', '2', 5000, '1', '2023-12-18'),
(26, '183632355765', 'LOL', 'Example', '00002222981', 'HAHA', 'Very Funny :/', '00002222944', '3', '2', 2821, '2', '2023-12-18'),
(28, '626280723084', 'Basit', 'Example Corner, City', '00009999222', 'Ibtisam', 'Example, Example', '22223333111', '1', '3', 1233, '2', '2023-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `image` varchar(60) NOT NULL DEFAULT '65899fb9283b2.png',
  `branch_id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Number` varchar(20) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `city` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT 3 COMMENT '1=Admin, \r\n2=agent\r\n3=user',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `image`, `branch_id`, `username`, `email`, `Number`, `Password`, `city`, `type`, `date_created`) VALUES
(1, '', 0, 'Saif', 'Saif@gmail.com', '00007777444', 'mirza', '', 3, '2023-12-12 08:00:00'),
(2, '', 0, 'Ahad', 'jane_smith@example.com', '9876543210', 'pass123word', '', 3, '2023-12-11 09:30:00'),
(3, '', 0, 'mike_jackson', 'mike_jackson@example.com', '5556667777', 'securepass', '', 3, '2023-12-10 10:45:00'),
(4, '', 0, 'sara_williams', 'sara_williams@example.com', '7778889999', 'userpass', '', 3, '2023-12-09 11:20:00'),
(5, '', 0, 'chris_brown', 'chris_brown@example.com', '4443332222', 'test123', '', 3, '2023-12-08 12:15:00'),
(6, '658a5d7a6ceb7.jpg', 0, 'admin', 'admin@admin.com', '02323232323', 'admin', '', 1, '2023-12-12 13:48:14'),
(56, '658a64d239d78.jpg', 2, 'Abdul', 'abdul@gmail.com', '03233485756', 'abdul', 'Karachi', 2, '2023-12-14 17:20:24'),
(58, '', 2, 'NoNoBad', 'newkunzete@gmail.com', '00002222999', 'mohtashimkhan', 'Sialkot', 2, '2023-12-17 15:43:30'),
(59, '', 2, 'Ahmad Khan', 'Khan.ahmed22@gmail.com', '99991111888', 'AhmadKhan', 'Mianwali', 2, '2023-12-18 13:41:09'),
(60, '', 3, 'Abbas', 'abb.as333@gmail.com', '00003333888', 'Abbaskhan', 'Karachi', 2, '2023-12-18 13:42:09'),
(61, '', 2, 'Amjad', 'amjad13@gmail.com', '00003333999', 'AmjadKhan', 'Karachi', 2, '2023-12-18 13:42:35'),
(62, '', 1, 'Ali', 'Ali123@gmail.com', '00002222999', 'Ali123', 'Mianwali', 2, '2023-12-18 13:46:39'),
(65, '', 3, 'Abdul Hameed', 'hameed@gmail.com', '00009999888', 'hameed', 'Sialkot', 2, '2023-12-20 14:00:01'),
(66, '', 1, 'Taha', 'taha@gmail.com', '00009999222', 'tahakhan', 'Karachi', 2, '2023-12-20 20:04:24'),
(70, '', NULL, 'Lion', 'lion@gmail.com', '00002222111', 'lion', '', 3, '2023-12-22 16:59:45'),
(71, '', NULL, 'Hussain', 'hussain@gmail.com', '00002222111', 'hussain', '', 3, '2023-12-25 19:13:41'),
(72, '', NULL, 'Amir', 'amir2@gmail.com', '99992222888', 'amir', '', 3, '2023-12-25 19:15:48'),
(73, '658998fc949b3.png', NULL, 'Gojo', 'gojo@gmail.com', '00001111222', 'gojo', '', 3, '2023-12-25 19:46:46'),
(74, '', NULL, 'Adbl', 'fatima@gmail.com', '00002222111', '12345', '', 3, '2023-12-25 20:03:44'),
(75, '658a57b238a74.jpg', NULL, 'Login', 'login@gmail.com', '00001111', 'login', '', 3, '2023-12-26 09:33:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
