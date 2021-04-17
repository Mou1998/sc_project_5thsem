-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 08:38 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `style_of_art` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`name`, `age`, `address`, `style_of_art`) VALUES
('Sunil Roy', 32, '76, A.K.Lane', 'Fine Art');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `year_of_made` year(4) NOT NULL,
  `price` int(11) NOT NULL,
  `a_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txn_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classify`
--

CREATE TABLE `classify` (
  `a_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `g_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `c_name` text COLLATE utf8_unicode_ci NOT NULL,
  `c_address` text COLLATE utf8_unicode_ci NOT NULL,
  `total_spent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `g_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likegroups`
--

CREATE TABLE `likegroups` (
  `c_id` int(11) NOT NULL,
  `g_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefers`
--

CREATE TABLE `prefers` (
  `a_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `txn_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`title`),
  ADD KEY `Transaction_ID` (`txn_id`),
  ADD KEY `Artist_Name` (`a_name`);

--
-- Indexes for table `classify`
--
ALTER TABLE `classify`
  ADD KEY `ArtTitle` (`a_title`),
  ADD KEY `GroupID` (`g_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`g_name`);

--
-- Indexes for table `likegroups`
--
ALTER TABLE `likegroups`
  ADD PRIMARY KEY (`c_id`,`g_name`),
  ADD KEY `Group_ID` (`g_name`);

--
-- Indexes for table `prefers`
--
ALTER TABLE `prefers`
  ADD KEY `ArtistName` (`a_name`),
  ADD KEY `CustomerID` (`c_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`txn_id`),
  ADD KEY `customer_ID` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `txn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `Artist_Name` FOREIGN KEY (`a_name`) REFERENCES `artists` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Transaction_ID` FOREIGN KEY (`txn_id`) REFERENCES `transactions` (`txn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `classify`
--
ALTER TABLE `classify`
  ADD CONSTRAINT `ArtTitle` FOREIGN KEY (`a_title`) REFERENCES `artwork` (`title`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `GroupID` FOREIGN KEY (`g_name`) REFERENCES `groups` (`g_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `likegroups`
--
ALTER TABLE `likegroups`
  ADD CONSTRAINT `C_id` FOREIGN KEY (`c_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Group_ID` FOREIGN KEY (`g_name`) REFERENCES `groups` (`g_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prefers`
--
ALTER TABLE `prefers`
  ADD CONSTRAINT `ArtistName` FOREIGN KEY (`a_name`) REFERENCES `artists` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CustomerID` FOREIGN KEY (`c_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `customer_ID` FOREIGN KEY (`c_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
