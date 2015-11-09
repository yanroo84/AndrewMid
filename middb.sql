-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 12:01 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `middb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtype` int(11) NOT NULL DEFAULT '0',
  `rg` int(11) NOT NULL DEFAULT '0',
  `rb` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `nickname`, `idtype`, `rg`, `rb`) VALUES
(111, '111', 'Andrew', 0, 0, 0),
(222, '222', 'Andy', 1, 0, 0),
(333, '333', 'focaaby', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `id` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `whostart` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whotake` int(20) DEFAULT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `title`, `msg`, `price`, `status`, `whostart`, `whotake`, `date`, `rate`) VALUES
(1, 'app', 'appappapp欸呸呸', 100, 1, 'Andrew', 111, '2015-11-10', NULL),
(2, 'web', 'webwebweb', 222, 4, 'Andrew', 111, '0000-00-00', 1),
(3, '333', '333', 111, 1, 'Andrew', 333, '2016-12-31', NULL),
(4, '444', '444', 444, 1, 'Andrew', 111, '0000-00-00', NULL),
(5, '555', '555', 555, 1, 'Andrew', 222, '0000-00-00', NULL),
(6, '666', '666', 666, 4, 'Andrew', 333, '0000-00-00', 0),
(7, '延畢', '把學妹', 999999999, 1, 'focaaby', 333, '0000-00-00', NULL),
(8, 'adadadad', 'aaaaa', 0, 0, 'focaaby', NULL, '2015/11/31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
