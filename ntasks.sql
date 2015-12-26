-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2015 at 05:12 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ntasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `leave_remain` int(11) NOT NULL DEFAULT '20',
  `leave_times` int(11) NOT NULL DEFAULT '0',
  `leave_count` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `active_token` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `leave_remain`, `leave_times`, `leave_count`, `title`, `active_token`) VALUES
(1, 8, 20, 0, 3, 'Amar jor ashce ami cuti chai', 0),
(11, 18, 17, 1, 3, 'Ass HOle', 0),
(12, 18, 14, 2, 3, 'Ass HOle', 0),
(13, 8, 16, 1, 4, 'Yeah the reason of deleting me', 0),
(14, 19, 17, 1, 3, 'asdf', 0),
(15, 19, 11, 2, 6, 'asfkjfasdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `permission`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2015-12-26 05:11:32', '2015-12-26 03:16:15'),
(2, 2, 10, '2015-12-26 05:11:32', '2015-12-26 08:46:35'),
(10, 1, 19, '2015-12-26 09:07:14', '2015-12-26 09:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `permissions` text,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) DEFAULT NULL,
  `activated_at` varchar(255) DEFAULT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `persist_code` varchar(255) DEFAULT NULL,
  `reset_password_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `created_at`, `updated_at`) VALUES
(8, 'Nahid', 'nahid@nahid.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2015-12-26 03:16:02'),
(10, 'BillKIllu', 'this@this.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2015-12-26 00:43:40', '2015-12-26 01:56:45'),
(19, 'Ridi', 'ridi@ridi.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2015-12-26 09:07:14', '2015-12-26 09:13:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
