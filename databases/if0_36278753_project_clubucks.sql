-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.infinityfree.com
-- Generation Time: Jun 28, 2024 at 05:25 AM
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
-- Database: `if0_36278753_project_clubucks`
--

-- --------------------------------------------------------

--
-- Table structure for table `events_2024`
--

CREATE TABLE `events_2024` (
  `fest_id` int(11) NOT NULL,
  `fest_name` varchar(30) NOT NULL,
  `last_date` date NOT NULL,
  `venue` varchar(50) NOT NULL,
  `brochure_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events_2024`
--

INSERT INTO `events_2024` (`fest_id`, `fest_name`, `last_date`, `venue`, `brochure_path`) VALUES
(1, 'TECHRITI', '2024-04-05', 'PGGC - 46 , CHANDIGARH', '../pdf/Techriti_2024.pdf'),
(2, 'BIZBASH', '2024-04-02', 'GGSCW - 26 , CHANDIGARH', '../pdf/BIZBASH_2024.pdf'),
(3, 'OSMIUM', '2024-04-02', 'PGGCG - 42 , CHANDIGARH', '../pdf/osmium2024.pdf'),
(4, 'BIZZTECH', '2024-03-20', 'PGGC - 11, CHANDIGARH', '../pdf/bizztech2024.pdf'),
(5, 'PARWAZ-E-GCCBA', '2024-03-07', 'GCCBACHD - 50 , CHD', '../pdf/Parwaw-E-GCCBA_2024.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events_2024`
--
ALTER TABLE `events_2024`
  ADD PRIMARY KEY (`fest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events_2024`
--
ALTER TABLE `events_2024`
  MODIFY `fest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
