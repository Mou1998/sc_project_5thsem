-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 12:53 PM
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
('Anish Kapoor', '1954-03-12', 'Mumbai', 'Sculpture'),
('Jamini Roy', '1887-04-11', 'Kolkata', 'Painting'),
('Jogen Chowdhury', '1939-02-15', 'Faridpur District, Bangladesh', 'Painting'),
('MF Hussain', '1915-09-17', 'Pandharpur', 'Painting'),
('Nandalal Bose', '1882-02-03', 'Kolkata', 'Painting'),
('Nilima Sheikh', '1945-11-18', 'New Delhi', 'Miniature Painting'),
('Poorva Shingre', '1980-12-15', 'Kolkata', 'Linocut'),
('Sankho Chaudhuri', '1916-02-25', 'Bihar', 'Sculpture'),
('Sayed Haider Raza', '1922-02-22', 'Madhya Pradesh', 'Painting'),
('Subodh Gupta', '1964-01-01', 'Khagaul', 'Sculpture');

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
('Anish Kapoor', 'Scalpture', 2006, 250000, 'Anish Kapoor', NULL),
('Ankuran', 'abstract', 1987, 43000, 'Sayed Haider Raza', NULL),
('Bihari', 'Scalpture', 1999, 10000, 'Subodh Gupta', 29),
('Blood on the road (4)', 'abstract', 2021, 100000, 'Nilima Sheikh', 34),
('Blood on the road (5)', 'abstract', 2021, 100000, 'Nilima Sheikh', 32),
('Blood on the Road 2', 'abstract', 2018, 50000, 'Nilima Sheikh', 33),
('Couple', 'acrylic', 1982, 50000, 'Jogen Chowdhury', 35),
('Dancing Gopi', 'acrylic', 1905, 50000, 'Jamini Roy', 31),
('Darjeeling and Fog', 'acrylic', 1940, 129999, 'Nandalal Bose', 37),
('Dirty Corner', 'Scalpture', 2011, 1000000, 'Anish Kapoor', 28),
('Erasure', 'abstract', 2020, 99999, 'Nilima Sheikh', 38),
('Ganga and Jamuna', 'Oil', 1983, 60000, 'MF Hussain', 30),
('High Life', 'Scalpture', 2002, 50000, 'Subodh Gupta', NULL),
('Horses', 'abstract', 1960, 45000, 'MF Hussain', NULL),
('Krishna and Balarama', 'acrylic', 1901, 50000, 'Jamini Roy', 39),
('Krishna with Gopis', 'acrylic', 1903, 150000, 'Jamini Roy', NULL),
('Meerut Congress', 'Scalpture', 1975, 20000, 'Sankho Chaudhuri', NULL),
('Mother and Child', 'acrylic', 1903, 75000, 'Jamini Roy', 40),
('Mother Teresa', 'abstract', 1988, 84000, 'MF Hussain', 41),
('New Clouds', 'acrylic', 1937, 120000, 'Nandalal Bose', 27),
('Rati with her Bow', 'acrylic', 1937, 125000, 'Nandalal Bose', NULL),
('Santhal', 'Scalpture', 1980, 40000, 'Sankho Chaudhuri', NULL),
('Sarhad 2', 'abstract', 2018, 99999, 'Nilima Sheikh', NULL),
('Saurashtra', 'abstract', 1983, 67000, 'Sayed Haider Raza', NULL),
('Smoking ladies', 'Linocut', 2010, 3000, 'Poorva Shingre', NULL),
('Three Pujarinis', 'acrylic', 1905, 100000, 'Jamini Roy', 36),
('Tiger in the Moonlit Night', 'Oil', 1979, 100000, 'Jogen Chowdhury', NULL);

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
('Blood on the road (4)', 'Tempera on Sanganer paper'),
('Blood on the road (5)', 'Tempera on Sanganer paper'),
('Erasure', 'Mixed tempura on Sanganer handmade paper'),
('Sarhad 2', 'Tempera on Sanganer paper'),
('Blood on the Road 2', 'Tempera on Sanganer Vasli paper'),
('Three Pujarinis', 'Indian Culture'),
('Mother and Child', 'Love'),
('Mother and Child', 'Family'),
('Krishna and Balarama', 'Indian Culture'),
('Krishna and Balarama', 'Indian God'),
('Krishna with Gopis', 'God'),
('Krishna with Gopis', 'Love'),
('Dancing Gopi', 'Dancing'),
('Dancing Gopi', 'Love'),
('Smoking ladies', 'modern'),
('Smoking ladies', 'Girl'),
('Smoking ladies', 'New Generation'),
('New Clouds', 'Nature'),
('New Clouds', 'Lady'),
('New Clouds', 'Joy'),
('New Clouds', 'Forest'),
('Darjeeling and Fog', 'Nature'),
('Rati with her Bow', 'Tempera on paper'),
('Rati with her Bow', 'Weapon'),
('Couple', 'love'),
('Tiger in the Moonlit Night', 'Forest'),
('Tiger in the Moonlit Night', 'Nature'),
('Tiger in the Moonlit Night', 'Animal'),
('Tiger in the Moonlit Night', 'Murder'),
('Horses', 'animal'),
('Horses', 'warrior'),
('Mother Teresa', 'Kind'),
('Mother Teresa', 'lady'),
('Mother Teresa', 'Love'),
('Ganga and Jamuna', 'Nature'),
('Ganga and Jamuna', 'River'),
('Saurashtra', 'gestural strokes'),
('Saurashtra', 'Abstractionism'),
('Ankuran', 'Abstractionism'),
('Anish Kapoor', 'Stainless steel'),
('Anish Kapoor', 'City'),
('Dirty Corner', 'Stainless steel'),
('High Life', 'Stainless steel'),
('Bihari', 'Rock'),
('Bihari', 'Soil'),
('Bihari', 'acrylic'),
('Santhal', 'bronze'),
('Meerut Congress', 'bronze');

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
(5, 'Sani Jana', 'Howrah', 260000),
(6, 'Susmita Sett', 'Howrah', 209999),
(7, 'Saikat Jana', 'Kolkata', 245000),
(8, 'Debopriyo Ghosh', 'Howrah', 1000000),
(9, 'Mousumi', 'hooghly', 263999),
(10, 'Saradindu Rana', 'midnapore', 100000),
(11, 'Soumya Jana', 'Kolkata', 0);

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
('Abstractionism'),
('acrylic'),
('Animal'),
('bronze'),
('City'),
('Dancing'),
('Family'),
('Forest'),
('gestural strokes'),
('Girl'),
('God'),
('Indian Culture'),
('Indian God'),
('Joy'),
('Kind'),
('Lady'),
('Love'),
('Mixed tempura on Sanganer handmade paper'),
('modern'),
('Murder'),
('Nature'),
('New Generation'),
('River'),
('Rock'),
('Soil'),
('Stainless steel'),
('Tempera on paper'),
('Tempera on Sanganer paper'),
('Tempera on Sanganer Vasli paper'),
('warrior'),
('Weapon');

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
(5, 'acrylic'),
(5, 'Fine Art'),
(5, 'Indian Culture'),
(5, 'Mixed tempura on Sanganer handmade paper'),
(6, 'Abstractionism'),
(6, 'oil'),
(6, 'Pastel'),
(6, 'Sketch'),
(7, 'bronze'),
(7, 'Forest'),
(7, 'kolaj'),
(7, 'oil'),
(7, 'pastel'),
(7, 'sketch'),
(7, 'water'),
(8, 'Girl'),
(8, 'God'),
(8, 'Joy'),
(8, 'Mixed tempura on Sanganer handmade paper'),
(8, 'oil'),
(8, 'Sketch'),
(9, 'Girl'),
(9, 'God'),
(9, 'Joy'),
(9, 'Mixed tempura on Sanganer handmade paper'),
(9, 'oil'),
(9, 'Pastel'),
(9, 'Sketch'),
(10, 'Abstractionism'),
(10, 'acrylic'),
(10, 'Nature'),
(10, 'oil'),
(10, 'River'),
(11, 'Girl'),
(11, 'God'),
(11, 'Joy'),
(11, 'Mixed tempura on Sanganer handmade paper'),
(11, 'oil'),
(11, 'Pastel'),
(11, 'Sketch');

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
('Poorva Shingre', 5),
('Jamini Roy', 5),
('Nandalal Bose', 5),
('Ram Kumar', 5),
('Jaminy Roy', 6),
('Sakti Burman', 6),
('Nandalal Bose', 6),
('Nandalal Bose', 7),
('Sayed Haider Raza', 7),
('Subodh Gupta', 7),
('Jaminy Roy', 8),
('Antonio Lopez', 8),
('David Downton', 8),
('Leonardo da Vinci', 8),
('Pablo Picasso', 8),
('Poorva Shingre', 9),
('Jamini Roy', 9),
('Nandalal Bose', 9),
('Ram Kumar', 9),
('Jamini Roy', 10),
('MF Hussain', 10),
('Nandalal Bose', 10),
('Poorva Shingre', 10),
('Poorva Shingre', 11),
('Jamini Roy', 11),
('Nandalal Bose', 11),
('Ram Kumar', 11);

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
(27, '2012-04-29', 7),
(28, '2021-04-29', 8),
(29, '2020-04-25', 5),
(30, '2020-04-29', 6),
(31, '2019-12-11', 6),
(32, '2018-04-25', 5),
(33, '2016-06-09', 5),
(34, '2015-07-01', 5),
(35, '2015-06-29', 9),
(36, '2015-06-15', 10),
(37, '2013-10-31', 9),
(38, '2012-12-12', 6),
(39, '2011-10-01', 7),
(40, '2009-10-29', 7),
(41, '2009-08-30', 9);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `txn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
