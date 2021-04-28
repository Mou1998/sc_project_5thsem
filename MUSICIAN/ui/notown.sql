-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 02:51 PM
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
  `Ph_No` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `FullAddress` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`Ph_No`, `FullAddress`) VALUES
('011', 'Howrah'),
('0123', 'Kolkata'),
('12', '21ab'),
('123', 'abcd'),
('123456789', 'abcd'),
('456', '456abc');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `A_Id` int(100) NOT NULL,
  `A_Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Copyright_Date` date NOT NULL,
  `Format` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SSn` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`A_Id`, `A_Name`, `Copyright_Date`, `Format`, `SSn`) VALUES
(1, 'abc', '2021-04-25', 'cd', 3),
(2, 'ab', '2021-04-25', 'dvd', 4),
(3, 'a', '2010-04-05', 'cd', 3),
(4, 'a2', '2010-10-05', 'cd', 3),
(5, 'aa', '2011-05-05', 'dvd', 3),
(9, 'ab', '2010-01-15', 'dvd', 3),
(10, 'ac', '2010-07-25', 'dvd', 3),
(11, 'ad', '2010-03-05', 'dvd', 3),
(12, 'ae', '2011-06-05', 'dvd', 3),
(13, 'af', '2012-10-10', 'dvd', 3),
(14, 'ag', '2011-05-05', 'dvd', 2),
(15, 'ah', '2015-05-05', 'dvd', 2),
(16, 'ai', '2014-11-17', 'dvd', 2),
(17, 'jk', '2014-05-13', 'dvd', 2),
(18, 'aj', '2015-10-17', 'dvd', 2),
(19, 'akl', '2011-05-05', 'dvd', 4),
(20, 'am', '2011-12-03', 'dvd', 4),
(21, 'ao', '2014-06-05', 'dvd', 4),
(22, 'ap', '2014-01-01', 'dvd', 4),
(23, 'aq', '2013-02-05', 'dvd', 4),
(24, 'ar', '2019-08-11', 'dvd', 1),
(25, 'as', '2018-05-23', 'dvd', 1),
(26, 'auyt', '2018-06-25', 'dvd', 1),
(27, 'at', '2012-06-15', 'dvd', 1),
(28, 'Vande Mataram ', '1997-12-01', 'cd', 18),
(29, 'Raunaq', '2014-07-01', 'dvd', 18);

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
(' shehnai', 'B_FlAT'),
(' shehnai', 'C'),
(' shehnai', 'E_FLAT'),
('Acoustic guitar', 'B_FlAT'),
('Acoustic guitar', 'C'),
('Acoustic guitar', 'E_FLAT'),
('aktara', 'B_FlAT'),
('aktara', 'C'),
('aktara', 'E_FLAT'),
('bamboo flute', 'B_FlAT'),
('bamboo flute', 'C'),
('bamboo flute', 'E_FLAT'),
('Bass guitar', 'B_FlAT'),
('Bass guitar', 'C'),
('Bass guitar', 'E_FLAT'),
('Classical guitar', 'B_FlAT'),
('Classical guitar', 'C'),
('Classical guitar', 'E_FLAT'),
('dotara', 'B_FlAT'),
('dotara', 'C'),
('dotara', 'E_FLAT'),
('earthen drum', 'B_FlAT'),
('earthen drum', 'C'),
('earthen drum', 'E_FLAT'),
('Electric guitar', 'B_FlAT'),
('Electric guitar', 'C'),
('Electric guitar', 'E_FLAT'),
('Guitar', 'B_FlAT'),
('Guitar', 'C'),
('Guitar', 'E_FLAT'),
('Guitar synthesizer', 'B_FlAT'),
('Guitar synthesizer', 'C'),
('Guitar synthesizer', 'E_FLAT'),
('Guitarra quinta huapanguera', 'B_FlAT'),
('Guitarra quinta huapanguera', 'C'),
('Guitarra quinta huapanguera', 'E_FLAT'),
('Gut-stringed guitars', 'B_FlAT'),
('Gut-stringed guitars', 'C'),
('Gut-stringed guitars', 'E_FLAT'),
('harmonium', 'B_FlAT'),
('harmonium', 'C'),
('harmonium', 'E_FLAT'),
('Keyboard', 'B_FlAT'),
('Keyboard', 'C'),
('Keyboard', 'E_FLAT'),
('khol drum', 'B_FlAT'),
('khol drum', 'C'),
('khol drum', 'E_FLAT'),
('m', 'B_FlAT'),
('m', 'C'),
('m', 'E_FLAT'),
('n', 'B_FlAT'),
('n', 'C'),
('n', 'E_FLAT'),
('o', 'B_FlAT'),
('o', 'C'),
('o', 'E_FLAT'),
('Piano', 'B_FlAT'),
('Piano', 'C'),
('Piano', 'E_FLAT'),
('plucked drum', 'B_FlAT'),
('plucked drum', 'C'),
('plucked drum', 'E_FLAT'),
('santoor', 'B_FlAT'),
('santoor', 'C'),
('santoor', 'E_FLAT'),
('Saxophone', 'B_FlAT'),
('Saxophone', 'C'),
('Saxophone', 'E_FLAT'),
('sitar', 'B_FlAT'),
('sitar', 'C'),
('sitar', 'E_FLAT'),
('Violin', 'B_FlAT'),
('Violin', 'C'),
('Violin', 'E_FLAT');

-- --------------------------------------------------------

--
-- Table structure for table `musicians`
--

CREATE TABLE `musicians` (
  `Ssn` int(100) NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Ph_No` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Existance` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Exist'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `musicians`
--

INSERT INTO `musicians` (`Ssn`, `Name`, `Ph_No`, `Existance`) VALUES
(1, 'abc', '123', 'Exist'),
(2, 'aaaaa', '456', 'Exist'),
(3, 'a', '12', 'Exist'),
(4, 'a', '12', 'Exist'),
(5, 'Samar', '456', 'Exist'),
(6, 'Subham', '456', 'Exist'),
(7, 'Sayak', '123456789', 'Exist'),
(8, 'S', '011', 'Exist'),
(9, 'Russo', '123456789', 'Exist'),
(10, 'Chandramouli', '123456789', 'Exist'),
(11, 'Lalan Fakir', '0123', 'Exist'),
(12, 'Ustad Bismillah Khan', '0123', 'Exist'),
(13, 'Pandit Ravi Shankar', '0123', 'Exist'),
(14, 'Hariprasad Chaurasia', '011', 'Exist'),
(15, 'Pandit Shivkumar Sharma', '011', 'Exist'),
(16, 'R.D. Burman', '0123', 'Exist'),
(17, 'Jagjit Singh', '456', 'Exist'),
(18, 'AR Rahman', '0123', 'Exist');

-- --------------------------------------------------------

--
-- Table structure for table `performs`
--

CREATE TABLE `performs` (
  `Ssn` int(100) NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `performs`
--

INSERT INTO `performs` (`Ssn`, `Title`) VALUES
(9, 'song5'),
(9, 'song8'),
(9, 'song9'),
(10, 'song5'),
(10, 'song8'),
(11, 'song6'),
(11, 'song7'),
(12, 'song7'),
(16, 'song1'),
(16, 'song2'),
(16, 'song3'),
(16, 'song4'),
(16, 'song5'),
(17, 'song1'),
(17, 'song2'),
(17, 'song3'),
(17, 'song4'),
(17, 'song5'),
(18, 'song1'),
(18, 'song2'),
(18, 'song3'),
(18, 'song4'),
(18, 'song5');

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

CREATE TABLE `plays` (
  `Ins_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ssn` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plays`
--

INSERT INTO `plays` (`Ins_name`, `Ssn`) VALUES
(' shehnai', 12),
('Acoustic guitar', 7),
('Acoustic guitar', 18),
('aktara', 11),
('bamboo flute', 14),
('Bass guitar', 7),
('Bass guitar', 18),
('Classical guitar', 8),
('dotara', 11),
('earthen drum', 11),
('Electric guitar', 7),
('Electric guitar', 10),
('Electric guitar', 16),
('Electric guitar', 18),
('Guitar', 10),
('Guitar', 16),
('Guitar synthesizer', 5),
('Guitar synthesizer', 6),
('Guitar synthesizer', 7),
('Guitar synthesizer', 18),
('Guitarra quinta huapanguera', 5),
('Guitarra quinta huapanguera', 6),
('Guitarra quinta huapanguera', 7),
('Guitarra quinta huapanguera', 18),
('Gut-stringed guitars', 5),
('Gut-stringed guitars', 6),
('Gut-stringed guitars', 7),
('Gut-stringed guitars', 18),
('harmonium', 17),
('Keyboard', 9),
('Keyboard', 16),
('khol drum', 11),
('m', 1),
('m', 2),
('m', 3),
('m', 4),
('n', 1),
('n', 2),
('o', 1),
('o', 2),
('Piano', 9),
('Piano', 16),
('plucked drum', 11),
('santoor', 15),
('Saxophone', 9),
('sitar', 13),
('Violin', 16);

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
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`Title`, `Author`, `A_Id`) VALUES
('song1', 'author1', 27),
('song2', 'author2', 27),
('song3', 'author3', 27),
('song4', 'author4', 27),
('song5', 'author5', 27),
('song6', 'author6', 10),
('song7', 'author5', 10),
('song8', 'author6', 10),
('song9', 'author5', 10);

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
  ADD KEY `SSn` (`SSn`);

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
  MODIFY `A_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `musicians`
--
ALTER TABLE `musicians`
  MODIFY `Ssn` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`SSn`) REFERENCES `musicians` (`Ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `musicians`
--
ALTER TABLE `musicians`
  ADD CONSTRAINT `musicians_ibfk_1` FOREIGN KEY (`Ph_No`) REFERENCES `addresses` (`Ph_No`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `performs`
--
ALTER TABLE `performs`
  ADD CONSTRAINT `Title` FOREIGN KEY (`Title`) REFERENCES `songs` (`Title`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `performs_ibfk_1` FOREIGN KEY (`Ssn`) REFERENCES `musicians` (`Ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `A_id` FOREIGN KEY (`A_Id`) REFERENCES `albums` (`A_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
