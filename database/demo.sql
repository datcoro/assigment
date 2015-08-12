-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2015 at 05:18 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--
CREATE DATABASE IF NOT EXISTS `demo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `demo`;

-- --------------------------------------------------------

--
-- Table structure for table `lines`
--

CREATE TABLE IF NOT EXISTS `lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`id`, `name`, `description`, `start_time`, `end_time`, `image`, `record_status`) VALUES
(1, 'Áo MU ', 'Áo MU 2015', '2015-06-29 00:00:00', '2015-07-01 00:00:00', '@web/uploads/ao_mu_2015.jpg', 0),
(2, 'Áo Chelsea', 'Áo Chelsea ', '2015-06-29 00:00:00', '2015-06-30 00:00:00', '@web/uploads/ao_chelsea_2015.jpg', 0),
(3, 'dsd', 'sdsd', '2015-09-01 00:00:00', '2015-09-01 00:00:00', '@web/uploads/dsd.jpg', 1),
(4, 'dsdsd', 'sdsdsd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '@web/uploads/dsdsd.jpg', 1),
(5, 'dsdsd', 'sdsdsddsds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '@web/uploads/dsdsd.jpg', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
