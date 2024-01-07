-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 05:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.2.34

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
-- Table structure for table `facultyachievement`
--

CREATE TABLE `facultyachievement` (
  `id` int(11) NOT NULL,
  `Academic_Year` year(4) NOT NULL,
  `Name_Of_The_Faculty` varchar(50) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `Nature_of_Achievement` varchar(50) NOT NULL,
  `Details_of_Achievement` varchar(50) NOT NULL,
  `pdffile1` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facultyachievement`
--

INSERT INTO `facultyachievement` (`id`, `Academic_Year`, `Name_Of_The_Faculty`, `Branch`, `Nature_of_Achievement`, `Details_of_Achievement`, `pdffile1`, `user_id`, `STATUS`) VALUES
(1, 2022, 'Aditya', 'IT', 'PhD Degree Awarded', 'aa', 'Water tank Sequence.vi', 7, 'PENDING'),
(9, 2022, 'Aditya', 'IT', 'Best Paper Award', 'aaa', 'download (2).jpg', 5, 'PENDING'),
(10, 2020, 'Aditya', 'IT', 'Best Thesis Award', 'aa', 'download.jpg', 5, 'PENDING'),
(11, 2020, 'ksknx', 'IT', 'Best Paper Award', 'aaa', 'download (1).jpg', 5, 'PENDING'),
(12, 2020, 'ksknx', 'IT', 'Best Project Award', 'aaa', 'KREADYMIX200GmChit14xx310521_5_B.jpg', 5, 'PENDING'),
(13, 2019, 'ksknx', 'IT', 'Best Paper Award', 'aaa', 'bakarwadi-namkeens-chitale-bandhu-mithaiwale-187780_1024x1024.webp', 5, 'PENDING');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facultyachievement`
--
ALTER TABLE `facultyachievement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facultyachievement`
--
ALTER TABLE `facultyachievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
