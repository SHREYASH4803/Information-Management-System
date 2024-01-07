-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 08:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `higher_studies`
--

CREATE TABLE `higher_studies` (
  `year` bigint(255) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `graduation_program` varchar(100) NOT NULL,
  `institute_name_joined` varchar(100) NOT NULL,
  `program_name_admitted` varchar(100) NOT NULL,
  `upload_admitcard_idcard` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `STATUS` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `higher_studies`
--

INSERT INTO `higher_studies` (`year`, `student_name`, `graduation_program`, `institute_name_joined`, `program_name_admitted`, `upload_admitcard_idcard`, `id`, `STATUS`) VALUES
(2018, 'a', 'Electrical', 'a', 'a', '1.pdf', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `higher_studies`
--
ALTER TABLE `higher_studies`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
