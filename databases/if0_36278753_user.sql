-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.infinityfree.com
-- Generation Time: Jun 28, 2024 at 05:27 AM
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
-- Database: `if0_36278753_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`user_id`, `name`, `phone`, `email`, `password`, `date_joined`) VALUES
(18, 'Rishav Kumar', '7973781357', 'ri98bho@gmail.com', '732ef85b300cdee186d0a55452b374de001ffa4a', '2024-04-19 20:04:12'),
(19, 'yamanq', '987', 'yamansahota3@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '2024-04-20 02:33:22'),
(20, 'jassi', '98742', 'jaspreetmehra185@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '2024-04-20 03:58:03'),
(21, 'Clubucks', '111', 'clubuckys@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '2024-04-20 04:49:05'),
(22, 'river', '5566778899', 'river25may@gmail.com', '682ae232770cb53112dcc7346d16eab38d68e3a5', '2024-04-20 05:55:49'),
(23, 'Ankush ', '1234567890', 'ankush62390@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2024-04-20 07:03:41'),
(24, 'w', '1', 'w@gmail.com', '17ba0791499db908433b80f37c5fbc89b870084b', '2024-06-25 14:24:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
