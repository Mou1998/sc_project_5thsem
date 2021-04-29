-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 12:35 PM
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
('33333336666', '70,B.B. Street'),
('3698521470', '34, Midnapore'),
('4444555566', '56, Murshidabad'),
('4563289710', '91, C.I.T Road'),
('9856321000', '787, Belur'),
('9856321470', '31, Rasbehari Avenew'),
('9856321471', '56, Dharmatala'),
('98563214789', '90, Ramnagar'),
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
(4, 'Aladin', '2018-09-25', 'MC', 2),
(5, 'Kedarnath', '2019-07-25', 'MC', 1),
(6, 'Khola Hawa', '2017-09-23', 'CD', 13),
(7, 'Tomar Sange', '2020-01-08', 'MC', 17),
(8, 'Chanddo', '2017-06-21', 'MC', 18),
(9, 'Niharika', '2021-04-07', 'CD', 8),
(11, 'Yatra', '2015-07-31', 'CD', 9),
(12, 'prakton', '2016-11-18', 'MC', 4),
(13, 'Britto', '2018-05-15', 'MC', 14),
(14, 'Dujne dekha Holo', '1997-05-12', 'CD', 13),
(15, 'Hiyar Majhe', '2007-05-09', 'CD', 8),
(16, '50 Ways', '2011-09-22', 'MC', 13);

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `Ins_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Musicalkey` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`Ins_Name`, `Musicalkey`) VALUES
(' Drum', 'B_FlAT'),
(' Drum', 'C'),
(' Drum', 'E_FLAT'),
('Guitter', 'B_FlAT'),
('Guitter', 'C'),
('Guitter', 'E_FLAT'),
('Harmonium', 'B_FlAT'),
('Harmonium', 'C'),
('Harmonium', 'E_FLAT'),
('Mridanga', 'B_FlAT'),
('Mridanga', 'C'),
('Mridanga', 'E_FLAT'),
('Onestring', 'B_FlAT'),
('Onestring', 'C'),
('Onestring', 'E_FLAT'),
('Setar', 'B_FlAT'),
('Setar', 'C'),
('Setar', 'E_FLAT'),
('Synthesizer', 'B_FlAT'),
('Synthesizer', 'C'),
('Synthesizer', 'E_FLAT'),
('Tanpura', 'B_FlAT'),
('Tanpura', 'C'),
('Tanpura', 'E_FLAT');

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
(1, 'Arijit Singh', '1234567890', 'Not_Exist'),
(2, 'Monali Thakur', '1123456789', 'Exist'),
(3, 'Upal Sengupta', '1234556789', 'Not_Exist'),
(4, 'Anindya Chatterjee', '1234556789', 'Exist'),
(5, 'Surajit Banerjee', '1234556678', 'Exist'),
(6, 'Sraboni Sen', '11234556678', 'Exist'),
(7, 'Shovan Ganguly', '9874563210', 'Exist'),
(8, 'Iman Chakraborty', '9856321000', 'Exist'),
(9, 'Kaushiki Chakraborty', '9956321000', 'Exist'),
(10, 'Kabita Krisnamurti', '4563289710', 'Exist'),
(11, 'Kushal Deb', '3698521470', 'Exist'),
(12, 'Kush Deb', '3698521470', 'Exist'),
(13, 'Kiran Bedi', '1234556789', 'Not_Exist'),
(14, 'Karuna Bedi', '1234556789', 'Exist'),
(15, 'Tanmoy Das', '1111112222', 'Exist'),
(16, 'Tinni Das', '1111112222', 'Exist'),
(17, 'Shampa Ghosh', '1111112222', 'Exist'),
(18, 'Shampa Ghoshal', '98563214789', 'Exist'),
(19, 'Kaushik Paul', '33333336666', 'Exist'),
(20, 'Rahul Tribedi', '4444555566', 'Exist'),
(21, 'Rik Bose', '9856321471', 'Exist'),
(22, 'Ravi Sankar', '33333336666', 'Exist'),
(23, 'Karaikudi Mani', '1234567890', 'Exist');

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
(1, 'Qaafiyana'),
(4, 'Moner Guptochor'),
(4, 'Mono moro meghero songi'),
(5, 'Bhromor'),
(5, 'Mono moro meghero songi'),
(6, 'Madhuro Madhuro'),
(6, 'Rakho Rakho Re Jibone'),
(7, 'Mora saiyaa'),
(7, 'Qaafiyana'),
(8, 'Modhuro Bosonto'),
(8, 'Mono moro meghero songi'),
(8, 'Tai Tomar Anondo'),
(8, 'Tumi Jake Vlobaso'),
(9, 'Madhuro Madhuro'),
(9, 'Rakho Rakho Re Jibone'),
(10, 'Diboso Rajani'),
(10, 'Eki labonne Purno Pran'),
(10, 'Modhu Gondhey Vora'),
(10, 'Modhuro Bosonto'),
(10, 'Sukho Hin Nishi Din'),
(17, 'Chokher Alo e'),
(17, 'Jonaki Ki Sukhe'),
(18, 'Chokher Alo e'),
(19, 'Chokher Alo e'),
(19, 'Jonaki Ki Sukhe'),
(20, 'Chokher Alo e'),
(20, 'Fool In The Rain'),
(21, 'Fool In The Rain'),
(22, 'Fool In The Rain'),
(23, 'Fool In The Rain');

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

CREATE TABLE `plays` (
  `Ins_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ssn` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plays`
--

INSERT INTO `plays` (`Ins_name`, `Ssn`) VALUES
(' Drum', 21),
('Guitter', 19),
('Guitter', 21),
('Harmonium', 17),
('harmonium', 18),
('Harmonium', 19),
('Harmonium', 20),
('Mridanga', 23),
('Onestring', 17),
('Onestring', 18),
('Setar', 22),
('Synthesizer', 21),
('Tanpura', 20);

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
('Bhromor', 'Anupam Roy', 12),
('Chokher Alo e', 'Rabindranath Tagore', 7),
('Diboso Rajani', 'Rabindranath Tagore', 14),
('Eki labonne Purno Pran', 'Rabindranath Tagore', 14),
('Fool In The Rain', 'Led Zeppelin', 16),
('Jonaki Ki Sukhe', 'Shann Parvin', 8),
('Madhuro Madhuro', 'Rabindranath Tagore', 11),
('Modhu Gondhey Vora', 'Rabindranath Tagore', 14),
('Modhuro Bosonto', 'Rabindranath Tagore', 2),
('Moner Guptochor', 'Anupam Roy', 12),
('Mono moro meghero songi', 'Rabindranath Tagore', 2),
('Mora saiyaa', 'Shovan Ganguly', 13),
('purano sei diner kotha', 'Rabindranath Tagore', 2),
('Qaafiyana', 'Amitav Bhattacharyaa', 5),
('Rakho Rakho Re Jibone', 'Rabindranath Tagore', 11),
('Sukho Hin Nishi Din', 'Rabindranath Tagore', 14),
('Tai Tomar Anondo', 'Rabindranath Tagore', 15),
('Tumi Jake Vlobaso', 'Anupam Roy', 12);

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
  MODIFY `A_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `musicians`
--
ALTER TABLE `musicians`
  MODIFY `Ssn` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
