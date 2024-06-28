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
-- Database: `if0_36278753_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_posted` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `user_id`, `content`, `date_posted`) VALUES
(25, 8, 18, 'What is the time?', '2024-04-20 00:43:45'),
(26, 8, 18, '9:00 onwards\r\nvenue : lab 153', '2024-04-20 00:44:12'),
(27, 9, 21, 'We should have basic knowledge of CSS, consider making project / UI using core CSS.', '2024-04-20 00:53:44'),
(28, 101, 21, 'ok', '2024-04-20 01:39:59'),
(29, 9, 24, 'Yes basic about css', '2024-06-25 10:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `answers_cyber`
--

CREATE TABLE `answers_cyber` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_posted` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers_cyber`
--

INSERT INTO `answers_cyber` (`id`, `question_id`, `user_id`, `content`, `date_posted`) VALUES
(0, 101, 21, 'Use Prepared statement to prevent SQL injection attacks. It provide a security for database.', '2024-04-20 01:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_posted` datetime DEFAULT current_timestamp(),
  `status` enum('open','closed','deleted') DEFAULT 'open',
  `tags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `title`, `description`, `date_posted`, `status`, `tags`) VALUES
(8, 18, 'Updates for major project', 'to be held on 20 Apr 2024\r\nBring your practical files.\r\nAnd be on time.', '2024-04-20 00:43:12', 'open', NULL),
(9, 21, 'Tailwind CSS or Bootstrap? Which is considered good practice?', 'The answer to the question that you are asking really depends on who you ask. You can achieve good practice for CSS with both frameworks, but it really comes to what you consider as a good practice.\r\n\r\nYou can find various articles on the web telling you about best practices for CSS, such as this.\r\n\r\nI encourage you to read more about CSS and the best practices for CSS in general, then you should start to read about both frameworks in depth, and also try both of them on some projects to really decide which one suits you better. But in the end, good practice can be achieved with both, but you need to understand why are you using one of them. Also, have in mind that they are different paradigms and you should read about it as well Tailwind CSS vs Bootstrap: Learn about the differences. Once you understand all of this, you will be able to tell, which is better for you and the projects that you are working on.', '2024-04-20 00:52:24', 'open', NULL),
(10, 24, 'What about python, how to get started with python?', 'Tell me something about it.\r\n', '2024-06-25 10:25:43', 'open', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions_cyber`
--

CREATE TABLE `questions_cyber` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_posted` datetime DEFAULT current_timestamp(),
  `status` enum('open','closed','deleted') DEFAULT 'open',
  `tags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions_cyber`
--

INSERT INTO `questions_cyber` (`id`, `user_id`, `title`, `description`, `date_posted`, `status`, `tags`) VALUES
(101, 21, 'What is Cyber Security?', 'Cybersecurity is the practice of defending computers, servers, mobile devices, electronic systems, networks, and data from malicious attacks. It&#39;s also known as information technology security or electronic information security.', '2024-04-20 01:22:29', 'open', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_answers_user_id` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tags` (`tags`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questions_cyber`
--
ALTER TABLE `questions_cyber`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_answers_user_id` FOREIGN KEY (`user_id`) REFERENCES `questions` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
