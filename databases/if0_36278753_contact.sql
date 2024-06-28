-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.infinityfree.com
-- Generation Time: Jun 28, 2024 at 05:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_36278753_contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`name`, `email`, `phone`, `message`) VALUES
('Arpit Pratap', 'arpitpratap02@gmail.com', '6284595526', 'Haan bhai kya haal hai aap to bhot pro ho\r\n'),
('Arpit Pratap', 'arpitprataparpit@gmail.com', '6284595526', 'hlo bhai kaise ho aap to pro ho'),
('ffd', 'dfs@gm.com', '43', 'e343434'),
('Kumkum', 'kumkum7026@gmail.com', '6284201978', 'Very good website\r\nThank you for helping us.'),
('Rishav Kumar', 'ri98bho@gmail.com', '7973781357', 'testing my contact form'),
('Yaman Sahota', 'yamansahota3@gmail.com', '9855722564', 'Hello Yaman Sahota Here ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
