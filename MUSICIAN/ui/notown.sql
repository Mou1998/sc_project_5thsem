-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 07:57 PM
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
  `Ph_No` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `FullAddress` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`Ph_No`, `FullAddress`) VALUES
('1111112222', '75, Nadia'),
('11234556678', '41, Chetla'),
('1123456789', '91, Behala'),
('1234556678', '451, Golfgreen'),
('1234556789', '45, Golpark'),
('1234567890', '9, Murshidabad'),
('3698521470', '34, Midnapore'),
('9856321000', '787, Belur'),
('9856321470', '31, Rasbehari Avenew'),
('9874563210', '78, Belur'),
('9876554321', '9, B.B.D. Bag'),
('9955521000', '89, Chowrongee'),
('9956321000', '89, Saltlake');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `A_Id` int(4) NOT NULL,
  `A_Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Copyright_Date` date NOT NULL,
  `Format` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ssn` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`A_Id`, `A_Name`, `Copyright_Date`, `Format`, `Ssn`) VALUES
(1, 'Tomar songe', '2016-08-10', 'CD', 6),
(2, 'Nibehon', '2018-09-25', 'CD', 6),
(3, 'Aladin', '2019-06-12', 'MC', 2),
(4, 'Aladin', '2018-09-25', 'MC', 2);

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
  `Ssn` int(4) NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Ph_No` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Existance` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Exist'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `musicians`
--

INSERT INTO `musicians` (`Ssn`, `Name`, `Ph_No`, `Existance`) VALUES
(1, 'Arijit Singh', '1234567890', 'Exist'),
(2, 'Monali Thakur', '1123456789', 'Exist'),
(3, 'Upal Sengupta', '1234556789', 'Not_Exist'),
(4, 'anindya Chatterjee', '1234556789', 'Exist'),
(5, 'Surajit Banerjee', '1234556678', 'Exist'),
(6, 'Sraboni Sen', '11234556678', 'Exist'),
(7, 'Shovan Ganguly', '9874563210', 'Exist'),
(8, 'Iman Chakraborty', '9856321000', 'Exist'),
(9, 'Kaushiki Chakraborty', '9956321000', 'Exist'),
(10, 'Kabita Roy', '9955521000', 'Exist'),
(11, 'Kushal Deb', '3698521470', 'Exist'),
(12, 'Kush Deb', '3698521470', 'Exist'),
(13, 'Kiran Bedi', '1234556789', 'Not_Exist'),
(14, 'Karuna Bedi', '1234556789', 'Exist'),
(15, 'Tanmoy Das', '1111112222', 'Exist'),
(16, 'Tinni Das', '1111112222', 'Exist');

-- --------------------------------------------------------

--
-- Table structure for table `performs`
--

CREATE TABLE `performs` (
  `Ssn` int(4) NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `performs`
--

INSERT INTO `performs` (`Ssn`, `Title`) VALUES
(4, 'Mono moro meghero songi'),
(5, 'Mono moro meghero songi'),
(8, 'Mono moro meghero songi');

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

CREATE TABLE `plays` (
  `Ins_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ssn` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Author` text COLLATE utf8_unicode_ci NOT NULL,
  `A_Id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`Title`, `Author`, `A_Id`) VALUES
('Modhuro Bosonto', 'Rabindranath Tagore', 2),
('Mono moro meghero songi', 'Rabindranath Tagore', 2),
('purano sei diner kotha', 'Rabindranath Tagore', 2);

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
  ADD KEY `Ssn` (`Ssn`);

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
  ADD KEY `Ph_No` (`Ph_No`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `A_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `musicians`
--
ALTER TABLE `musicians`
  MODIFY `Ssn` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`Ssn`) REFERENCES `musicians` (`Ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `musicians`
--
ALTER TABLE `musicians`
  ADD CONSTRAINT `musicians_ibfk_1` FOREIGN KEY (`Ph_No`) REFERENCES `addresses` (`Ph_No`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `performs`
--
ALTER TABLE `performs`
  ADD CONSTRAINT `performs_ibfk_1` FOREIGN KEY (`Ssn`) REFERENCES `musicians` (`Ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `performs_ibfk_2` FOREIGN KEY (`Title`) REFERENCES `songs` (`Title`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `plays`
--
ALTER TABLE `plays`
  ADD CONSTRAINT `plays_ibfk_1` FOREIGN KEY (`Ins_name`) REFERENCES `instruments` (`Ins_Name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `plays_ibfk_2` FOREIGN KEY (`Ssn`) REFERENCES `musicians` (`Ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`A_Id`) REFERENCES `albums` (`A_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
