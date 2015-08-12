-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2015 at 06:57 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fpoly_php3_assignment`
--
CREATE DATABASE IF NOT EXISTS `fpoly_php3_assignment` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fpoly_php3_assignment`;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `lines`
--

CREATE TABLE IF NOT EXISTS `lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`id`, `name`, `description`, `start_time`, `end_time`, `image`, `record_status`) VALUES
(1, 'Hà Nội - Nam Định', 'Tuyến Hà Nội - Nam Định', '01:02:43', '13:02:50', '@web/uploads/line_1_1434278179.jpg', 0),
(2, 'Hà Nội - Lào Cai', 'Tuyến Hà Nội - Lào Cai', '03:05:00', '10:05:00', '@web/uploads/line_2_1434278171.jpg', 0),
(3, 'Hà Nội - Sơn La', 'Tuyến Hà Nội - Sơn La buổi chiều', '15:09:00', '00:00:00', '@web/uploads/line_3_1434278197.jpg', 0),
(4, 'Hà Nội - Điện Biên', 'Hà Nội - Điện Biên', '02:00:00', '23:00:00', '@web/uploads/line_4_1434278204.jpg', 0),
(5, 'Lai Châu - Thanh Hóa', 'Lai Châu - Thanh Hóa', '02:40:00', '20:10:00', '@web/uploads/line_5_1434278213.jpg', 0),
(14, 'Hà Nội - Hokkaido (Nhật Bản)', 'Hà Nội - Hokkaido (Nhật Bản)', '12:47:00', '12:47:00', '@web/uploads/sdfsd_14.jpeg', 1),
(15, 'Hà Nội - Quảng Bình', 'Hà Nội - Quảng Bình', '15:48:00', '22:00:00', '@web/uploads/line_15_1434278188.jpg', 0),
(16, 'thienth', 'thienth', '13:57:00', '23:00:00', '@web/uploads/line_16_1434278222.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `prority` int(11) DEFAULT NULL,
  `record_status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `prority`, `record_status`) VALUES
(1, 'Member', 1, 1),
(2, 'Driver', 5, 1),
(3, 'Business owner', 10, 1),
(4, 'Admin', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE IF NOT EXISTS `stations` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `line_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `line_id` (`line_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `line_id`, `name`, `description`, `image`, `record_status`) VALUES
(1, 2, 'GA HÀ NỘI', 'HÀ NỘI GA', '@web/uploads/station_1_1434530760.jpg', 0),
(2, 1, 'GA PHỦ LÝ', 'GA PHỦ LÝ', '@web/uploads/line_16_1434278222.jpg', 1),
(3, 2, 'GA HCM', 'TRUNG TÂM', '@web/uploads/station_3_1434369945.jpg', 0),
(4, 1, 'ĐÀ NẴNG', 'ĐÀ NẴNG', '@web/uploads/station_4_1434530164.jpg', 1),
(5, 1, 'ĐÀ NẴNG', 'ĐÀ NẴNG', '@web/uploads/station_4_1434530164.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth_key`, `password_reset_token`, `record_status`) VALUES
(14, 'datvt@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `note` text,
  `birth_date` datetime DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `line_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_type_id` int(255) DEFAULT NULL,
  `license_plate` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `line_id` (`line_id`),
  KEY `user_id` (`user_id`),
  KEY `vehicle_type_id` (`vehicle_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE IF NOT EXISTS `vehicle_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stations`
--
ALTER TABLE `stations`
  ADD CONSTRAINT `stations_ibfk_1` FOREIGN KEY (`line_id`) REFERENCES `lines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`line_id`) REFERENCES `lines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicles_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicles_ibfk_4` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
