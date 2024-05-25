-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 04:27 PM
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
-- Database: `blogging`
--
CREATE DATABASE IF NOT EXISTS `blogging` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blogging`;

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

DROP TABLE IF EXISTS `bloggers`;
CREATE TABLE `bloggers` (
  `first name` text NOT NULL,
  `last name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `logged in or not` text NOT NULL,
  `user id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `bloggers`
--

TRUNCATE TABLE `bloggers`;
--
-- Dumping data for table `bloggers`
--

INSERT DELAYED IGNORE INTO `bloggers` (`first name`, `last name`, `email`, `password`, `logged in or not`, `user id`) VALUES
('ajay', 'chauhan', 'ajay@email', '$2y$10$SJVCIs4BJtdP7XkbbRpuT.iGA7zr6Rlnrt0lN2gPBUrlPoOQt5PKm', '0', '9286810931');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloggers`
--
ALTER TABLE `bloggers`
  ADD UNIQUE KEY `user id` (`user id`(19)),
  ADD UNIQUE KEY `email` (`email`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
