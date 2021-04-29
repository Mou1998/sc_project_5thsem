-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 02:35 PM
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
-- Database: `artgallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `style_of_art` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`name`, `dob`, `address`, `style_of_art`) VALUES
('Anish Kapoor', '1986-08-26', 'Howrah', 'Sculpture'),
('Antonio Lopez', '1995-05-11', 'Kolkata', 'sketch'),
('David Downton', '1993-06-17', 'Kolkata', 'sketch'),
('Henry Moore', '1982-07-08', 'Kolkata', 'Sculpture'),
('Jamini Roy', '1950-01-01', 'Kolkata', 'Painting'),
('Leonardo da Vinci', '1956-12-13', 'Howrah', 'Painting'),
('Michelangelo', '1977-06-08', 'Kolkata', 'Sculpture'),
('Pablo Picasso', '1960-02-25', 'Kolkata', 'Painting'),
('Vincent van Gogh', '1975-07-09', 'Howrah', 'Painting');

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

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`title`, `type`, `year_of_made`, `price`, `a_name`, `txn_id`) VALUES
('a', 'Painting', 2000, 10, 'Anish Kapoor', 21),
('b', 'pastel', 2000, 100, 'Anish Kapoor', 22),
('Black Horse', 'Animals', 1985, 50000, 'Jamini Roy', 16),
('Bride and two Companions', 'Indian Calture', 1998, 100000, 'Jamini Roy', 13),
('Cloud Gate', 'Scalpture', 2006, 500000, 'Anish Kapoor', 17),
('Dead Girl', 'Painting', 2000, 75000, 'Antonio Lopez', 12),
('Dirty Corner', 'Scalpture', 2011, 100000, 'Anish Kapoor', 20),
('Krishna with Gopis', 'Indian God of Love', 1975, 100000, 'Jamini Roy', 14),
('Sink and Mirror', 'Painting', 2010, 65000, 'Antonio Lopez', 19),
('Sky Mirror', 'Scalpture', 2006, 1000, 'Anish Kapoor', 18),
('The Apparition', 'Painting', 2001, 80000, 'Antonio Lopez', NULL),
('Three Pujarinis', 'Indian Calture', 1980, 1000, 'Jamini Roy', 15);

-- --------------------------------------------------------

--
-- Table structure for table `classify`
--

CREATE TABLE `classify` (
  `a_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `g_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classify`
--

INSERT INTO `classify` (`a_title`, `g_name`) VALUES
('Three Pujarinis', 'oil painting'),
('Three Pujarinis', 'Indian history'),
('Three Pujarinis', 'caltural'),
('Bride and two Companions', 'oil painting'),
('Bride and two Companions', 'Indian history'),
('Bride and two Companions', 'caltural'),
('Black Horse', 'oil painting'),
('Black Horse', 'real life'),
('Krishna with Gopis', 'oil painting'),
('Krishna with Gopis', 'Indian history'),
('Krishna with Gopis', 'caltural'),
('Krishna with Gopis', 'God'),
('Cloud Gate', 'Mirror Image'),
('Sky Mirror', 'Mirror'),
('Dirty Corner', 'Real Object'),
('Dead Girl', 'real life'),
('The Apparition', 'real life'),
('Sink and Mirror', 'Mirror Image'),
('Sink and Mirror', 'Real Object'),
('a', 'Real Object'),
('b', 'real life');

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `c_name`, `c_address`, `total_spent`) VALUES
(1, 'Sani Jana', 'PO+VILL: DAKSHIN JHAPORDAH, PS: DOMJUR DIST: HOWAH', 501000),
(2, 'Susmita', 'Domjur', 215000),
(3, 'Dipika', 'Howrah', 101110),
(4, 'Saikat Jana', 'Howrah', 175000);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `g_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`g_name`) VALUES
('caltural'),
('God'),
('Indian history'),
('Mirror'),
('Mirror Image'),
('oil painting'),
('real life'),
('Real Object');

-- --------------------------------------------------------

--
-- Table structure for table `likegroups`
--

CREATE TABLE `likegroups` (
  `c_id` int(11) NOT NULL,
  `g_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likegroups`
--

INSERT INTO `likegroups` (`c_id`, `g_name`) VALUES
(1, 'oil'),
(2, 'kolaj'),
(2, 'oil'),
(2, 'pastel'),
(2, 'sketch'),
(2, 'water'),
(3, 'caltural'),
(3, 'God'),
(3, 'Indian history'),
(4, 'abstract Painting'),
(4, 'kolaj painting'),
(4, 'real life'),
(4, 'Real Object');

-- --------------------------------------------------------

--
-- Table structure for table `prefers`
--

CREATE TABLE `prefers` (
  `a_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prefers`
--

INSERT INTO `prefers` (`a_name`, `c_id`) VALUES
('Jaminy Roy', 1),
('Jaminy Roy', 2),
('Raja Ravi Varma', 2),
('Nandalal Bose', 2),
('Jaminy Roy', 3),
('Jaminy Roy', 4),
('Antonio Lopez', 4),
('David Downton', 4),
('Leonardo da Vinci', 4),
('Pablo Picasso', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `txn_id` int(11) NOT NULL,
  `t_date` date NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`txn_id`, `t_date`, `c_id`) VALUES
(10, '2021-04-25', 2),
(11, '2021-04-26', 1),
(12, '2021-04-26', 4),
(13, '2021-04-26', 4),
(14, '2021-04-26', 3),
(15, '2021-04-26', 3),
(16, '2021-04-26', 2),
(17, '2021-04-26', 1),
(18, '2021-04-26', 1),
(19, '2021-04-26', 2),
(20, '2021-04-26', 2),
(21, '2021-04-27', 3),
(22, '2021-04-27', 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `txn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  ADD CONSTRAINT `C_id` FOREIGN KEY (`c_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prefers`
--
ALTER TABLE `prefers`
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
