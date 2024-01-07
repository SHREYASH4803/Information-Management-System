-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 08:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teacher_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `career_guidance`
--

CREATE TABLE `career_guidance` (
  `id` int(11) NOT NULL,
  `career_year` int(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `guidance_career` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `students_attended` int(50) NOT NULL,
  `pdffile` text NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_guidance`
--

INSERT INTO `career_guidance` (`id`, `career_year`, `branch`, `guidance_career`, `title`, `students_attended`, `pdffile`, `STATUS`) VALUES
(4, 0, ' IT ', ' aditya', 'dhumal', 1000, '', 'PENDING'),
(5, 2018, ' IT ', 'dhumal', ' aditya', 1222, '', 'PENDING'),
(6, 90000, ' IT ', ' 12 ', ' 122 ', 111, '', 'PENDING'),
(7, 87756, ' IT ', ' 11 ', ' 111 ', 677, 'Screenshot (47).png', 'PENDING'),
(8, 32333, ' IT ', ' adi ', '2222', 500, 'Screenshot (47).png', 'PENDING');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career_guidance`
--
ALTER TABLE `career_guidance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career_guidance`
--
ALTER TABLE `career_guidance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
