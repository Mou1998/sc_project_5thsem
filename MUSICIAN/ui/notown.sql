-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 05:17 PM
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
-- Database: `notown`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `Ph_No` int(10) NOT NULL,
  `FullAddress` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `A_Id` int(100) NOT NULL DEFAULT 0,
  `A_Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Copyright_Date` date NOT NULL,
  `Format` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SSn` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `Ins_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Musicalkey` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `musicians`
--

CREATE TABLE `musicians` (
  `Ssn` int(100) NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Ph_No` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performs`
--

CREATE TABLE `performs` (
  `Ssn` int(100) NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

CREATE TABLE `plays` (
  `Ins_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ssn` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Author` text COLLATE utf8_unicode_ci NOT NULL,
  `A_Id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`Ph_No`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`A_Id`),
  ADD KEY `Ssn` (`SSn`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`Ins_Name`,`Musicalkey`);

--
-- Indexes for table `musicians`
--
ALTER TABLE `musicians`
  ADD PRIMARY KEY (`Ssn`),
  ADD KEY `ph_no` (`Ph_No`);

--
-- Indexes for table `performs`
--
ALTER TABLE `performs`
  ADD PRIMARY KEY (`Ssn`,`Title`),
  ADD KEY `Title` (`Title`);

--
-- Indexes for table `plays`
--
ALTER TABLE `plays`
  ADD PRIMARY KEY (`Ins_name`,`Ssn`),
  ADD KEY `Ssn` (`Ssn`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`Title`),
  ADD KEY `A_Id` (`A_Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `Ssn` FOREIGN KEY (`SSn`) REFERENCES `musicians` (`Ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `musicians`
--
ALTER TABLE `musicians`
  ADD CONSTRAINT `ph_no` FOREIGN KEY (`Ph_No`) REFERENCES `addresses` (`Ph_No`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `performs`
--
ALTER TABLE `performs`
  ADD CONSTRAINT `Title` FOREIGN KEY (`Title`) REFERENCES `songs` (`Title`),
  ADD CONSTRAINT `performs_ibfk_1` FOREIGN KEY (`Ssn`) REFERENCES `musicians` (`Ssn`);

--
-- Constraints for table `plays`
--
ALTER TABLE `plays`
  ADD CONSTRAINT `Ins_name` FOREIGN KEY (`Ins_name`) REFERENCES `instruments` (`Ins_Name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `plays_ibfk_1` FOREIGN KEY (`Ssn`) REFERENCES `musicians` (`Ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `A_Id` FOREIGN KEY (`A_Id`) REFERENCES `albums` (`A_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
