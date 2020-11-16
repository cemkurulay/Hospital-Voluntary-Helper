-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 31, 2020 at 08:05 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

DROP TABLE IF EXISTS `floors`;
CREATE TABLE IF NOT EXISTS `floors` (
  `fno` int(11) NOT NULL,
  PRIMARY KEY (`fno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`fno`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `roomno` int(11) NOT NULL,
  `rname` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`roomno`,`rname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`roomno`, `rname`) VALUES
(301, 'magic'),
(301, 'science');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `rno` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`rno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rno`, `floor`, `status`) VALUES
(301, 3, 0),
(302, 3, 1),
(303, 3, -1),
(304, 3, 0),
(305, 3, 0),
(306, 3, 0),
(307, 3, 0),
(308, 3, 0),
(201, 2, 0),
(101, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
