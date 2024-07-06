-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2024 at 03:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quilet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `aname`
--

CREATE TABLE `aname` (
  `id` int NOT NULL,
  `Appname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aname`
--

INSERT INTO `aname` (`id`, `Appname`) VALUES
(1, 'LERA APP');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `title` varchar(255) NOT NULL,
  `corr` int NOT NULL,
  `wrong` int NOT NULL,
  `total` int NOT NULL,
  `tag` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `eid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`title`, `corr`, `wrong`, `total`, `tag`, `date`, `eid`) VALUES
('Php', 2, 1, 2, 'Coding', '2024-05-23 13:48:58', '664ed8cae2b83'),
('Pseudoscience', 2, 1, 2, 'science', '2024-05-31 16:37:08', '66598c34a21a8'),
('Javascript', 2, 1, 2, 'js', '2024-06-01 09:57:23', '665a8003a51ec');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `FilesID` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `downloads` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `categ` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`FilesID`, `name`, `size`, `downloads`, `categ`) VALUES
(18, 'Final-Performace-Task_ITEC-306.pdf', '616080', '0', 'English'),
(27, 'Aws bastion host.docx', '240085', '0', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `flashcards`
--

CREATE TABLE `flashcards` (
  `id` int NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flashcards`
--

INSERT INTO `flashcards` (`id`, `question`, `answer`) VALUES
(48, 'fsdgdhg', 'eryertdyhert');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int NOT NULL,
  `eid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `question` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(250) NOT NULL,
  `correct_answer` varchar(250) NOT NULL,
  `marks` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `eid`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `marks`) VALUES
(34, '664ed8cae2b83', 'What is the primary purpose of PHP in web development?', 'To style web pages', 'To add interactivity to web pages', 'To manage databases', 'To create dynamic web pages and server-side scripting', 'd', 1),
(35, '664ed8cae2b83', 'Which of the following is the correct way to start a PHP block of code?', '<script>', '<% %>', '<?php ?>', '<!-- -->', 'c', 1),
(36, '66598c34a21a8', 'how many moons are there in jupiter', '1', '23', '95', '60', 'c', 1),
(37, '66598c34a21a8', 'The study of something that claims or appears to be scientific in nature, but is not related to science is known as what?', 'Pseudoscience', 'Alchemy', 'Mysticism', 'Hestia', 'a', 1),
(38, '665a8003a51ec', 'What is the use of js', 'a', 'b', 'c', 'd', 'b', 1),
(39, '665a8003a51ec', 'start and ending tag of js', 'a', 'b', 'c', 'd', 'd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'XAMMP', 'Provide the meaning of xammp', '2024-05-30 08:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int NOT NULL,
  `task_id` int NOT NULL,
  `user_id` int NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grade` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `email_verified_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `verification_code`, `email_verified_at`) VALUES
(44, 'asdfasfwe', 'ict1mercado.cdlb@gmail.com', '$2y$10$My2hx5Ty27hfP1zsRU45eeBZx.iuThFS8RZynd4P5gRQH6.oX203u', '733483', '2024-05-18 12:20:28.000000'),
(45, 'Mark', 'mercadomarklawrence55@gmail.com', '$2y$10$SmeQksEKsf3cIHGkBD8VN.6Isw.oITz4XwxtNDSa.cI542yByESHu', '225231', '2024-07-06 11:27:59.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `eid` varchar(255) NOT NULL,
  `qid` int NOT NULL,
  `answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `user_id`, `eid`, `qid`, `answer`) VALUES
(67, 44, '664c8c7de58ee', 15, 'b'),
(68, 44, '664c8c7de58ee', 15, 'b'),
(69, 44, '664c8c7de58ee', 15, 'a'),
(70, 44, '664c8c7de58ee', 15, 'd'),
(73, 44, '664ecbda9d624', 33, 'b'),
(74, 44, '664ecbda9d624', 33, 'a'),
(75, 44, '664ecbda9d624', 33, 'd'),
(76, 44, '664ecbda9d624', 33, 'a'),
(83, 44, '664c8c7de58ee', 15, 'a'),
(84, 44, '664c8c7de58ee', 15, 'c'),
(85, 44, '664ecbda9d624', 33, 'c'),
(86, 44, '664ecbda9d624', 33, 'a'),
(93, 44, '664c8ca6bbed4', 16, 'd'),
(94, 44, '664c8ca6bbed4', 17, 'b'),
(115, 44, '66598c34a21a8', 36, 'c'),
(116, 44, '66598c34a21a8', 37, 'a'),
(117, 44, '664ed8cae2b83', 34, 'd'),
(118, 44, '664ed8cae2b83', 35, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `user_scores`
--

CREATE TABLE `user_scores` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `eid` varchar(255) NOT NULL,
  `score` int NOT NULL,
  `correct_answers` int NOT NULL,
  `wrong_answers` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rank` int NOT NULL DEFAULT '0',
  `retake_count` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_scores`
--

INSERT INTO `user_scores` (`id`, `user_id`, `eid`, `score`, `correct_answers`, `wrong_answers`, `date`, `rank`, `retake_count`) VALUES
(55, 44, '66598c34a21a8', 2, 2, 0, '2024-05-31 08:50:06', 0, 0),
(56, 44, '664ed8cae2b83', 2, 2, 0, '2024-06-01 01:44:13', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int NOT NULL,
  `category` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `embed_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `category`, `youtube_url`, `embed_url`, `created_at`) VALUES
(5, 'ㅤ', 'https://www.youtube.com/watch?v=PmtVcTgu9lI', 'https://www.youtube.com/embed/PmtVcTgu9lI', '2024-05-30 06:49:32'),
(6, 'ㅤ', 'https://www.youtube.com/watch?v=MMVaFpFGv9s', 'https://www.youtube.com/embed/MMVaFpFGv9s', '2024-05-30 06:49:57'),
(7, 'Filipino', 'https://www.youtube.com/watch?v=sBJmRD7kNTk', 'https://www.youtube.com/embed/sBJmRD7kNTk', '2024-06-01 09:55:39'),
(8, 'Filipino', 'https://www.youtube.com/watch?v=PlpM2LJWu-s', 'https://www.youtube.com/embed/PlpM2LJWu-s', '2024-06-01 09:56:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aname`
--
ALTER TABLE `aname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`FilesID`);

--
-- Indexes for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`eid`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test3` (`task_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test2` (`user_id`);

--
-- Indexes for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test1` (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aname`
--
ALTER TABLE `aname`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `FilesID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `user_scores`
--
ALTER TABLE `user_scores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `test` FOREIGN KEY (`eid`) REFERENCES `exam` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `test3` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `test2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD CONSTRAINT `test1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
