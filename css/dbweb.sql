-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 05:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `postname` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `creator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`userID`, `postID`, `postname`, `content`, `creator`) VALUES
(0, 5, 'My First Post!', '66004c128ef6d.jpg', 'Ivan Ky Versoza');

-- --------------------------------------------------------

--
-- Table structure for table `tb_postlike`
--

CREATE TABLE `tb_postlike` (
  `userID` int(50) NOT NULL,
  `post_Id` int(50) NOT NULL,
  `profile_Id` int(50) NOT NULL,
  `created_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_post_comment`
--

CREATE TABLE `tb_post_comment` (
  `userID` int(50) NOT NULL,
  `post_Id` int(50) NOT NULL,
  `profile_Id` int(50) NOT NULL,
  `comment_text` varchar(200) NOT NULL,
  `created_datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_userprofile`
--

CREATE TABLE `tb_userprofile` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_userprofile`
--

INSERT INTO `tb_userprofile` (`userID`, `firstname`, `surname`, `email_address`, `password`, `country`, `date_of_birth`) VALUES
(1, 'Ivan Ky', 'Versoza', 'ikversoza@gmail.com', 'weew33', '', '0000-00-00'),
(3, 'Edmarlen', 'Catid', 'edfrosting6@gmail.com', 'cactus', '', '0000-00-00'),
(4, 'GG', 'Sucker', '12312@ww.com', '1111', '', '0000-00-00'),
(6, 'Diana', 'Love', 'DLove@gmail.com', '2222', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `tb_postlike`
--
ALTER TABLE `tb_postlike`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tb_post_comment`
--
ALTER TABLE `tb_post_comment`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tb_userprofile`
--
ALTER TABLE `tb_userprofile`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_postlike`
--
ALTER TABLE `tb_postlike`
  MODIFY `userID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_post_comment`
--
ALTER TABLE `tb_post_comment`
  MODIFY `userID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_userprofile`
--
ALTER TABLE `tb_userprofile`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
