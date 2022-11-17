-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 06:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employment`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `headquarters` varchar(100) NOT NULL,
  `founder` varchar(100) NOT NULL,
  `founded` int(4) NOT NULL,
  `employees` int(8) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `industry`, `headquarters`, `founder`, `founded`, `employees`, `img`) VALUES
(1, 'Microsoft Corporation', 'Technology', 'Redmond, Washington, United States', 'Bill Gates & Paul Allen', 1975, 221000, 'img/companies/microsoft.png'),
(2, 'Meta', 'Technology', 'Menlo Park, California, United States', 'Mark Zuckerberg, Andrew McCollum, Eduardo Saverin, Chris Hughes & Dustin Moskovitz', 2004, 76000, 'img/companies/meta.png'),
(3, 'Google', 'Technology', 'Mountain View, California, United States', 'Larry Page & Sergey Brin', 1998, 150000, 'img/companies/google.png'),
(4, 'BP', 'Oil', 'London, United Kingdom', 'William Knox D\'Arcy, Charles Greenway & 1st Baron Greenway', 1990, 60000, 'img/companies/bp.png'),
(5, 'McDonald\'s', 'Fast Food', 'Chicago, Illinois, United States', 'Ray Kroc', 1955, 200000, 'img/companies/mcdonalds.png'),
(6, 'Coca-Cola', 'Beverage', 'Atlanta, Georgia, United States', 'Asa Griggs Candler', 1892, 79000, 'img/companies/cocacola.png');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `year` int(4) NOT NULL,
  `nationality` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `companyid`, `name`, `position`, `year`, `nationality`) VALUES
(1, 1, 'Johnatan Clarkson', 'Principal Software Engineer', 1976, 'United States'),
(2, 5, 'Mark Iverson', 'Chef', 1992, 'Denmark'),
(3, 1, 'Marry Jane', 'Principal Data Scientist', 1989, 'England'),
(4, 3, 'Marko Jankovic', 'Software Engineering Manager', 1993, 'Serbia'),
(5, 6, 'Ricardo Carvalho', 'Partner Strategy Manager', 1991, 'Peru'),
(6, 4, 'Bill Olsen', 'Product Technology Manager', 1981, 'Netherlands'),
(7, 4, 'Sheck Wes', 'Shipping Deck Cadet', 1993, 'Uganda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companyid` (`companyid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`companyid`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
