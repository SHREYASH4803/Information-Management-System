-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 07:38 PM
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
-- Table structure for table `outreached_program`
--

CREATE TABLE `outreached_program` (
  `id` int(255) NOT NULL,
  `Name_of_Activity` varchar(100) NOT NULL,
  `Organizing_Unit` varchar(100) NOT NULL,
  `Name_of_Coordinators` varchar(100) NOT NULL,
  `Name_of_Scheme` varchar(100) NOT NULL,
  `Others` varchar(100) NOT NULL,
  `Dates_Conducted` date NOT NULL,
  `Year_of_Activity` int(100) NOT NULL,
  `No_of_Student_Volunteer_for_Activity` bigint(255) NOT NULL,
  `No_of_People_benefitted_by_Activity` bigint(255) NOT NULL,
  `pdffile1` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outreached_program`
--

INSERT INTO `outreached_program` (`id`, `Name_of_Activity`, `Organizing_Unit`, `Name_of_Coordinators`, `Name_of_Scheme`, `Others`, `Dates_Conducted`, `Year_of_Activity`, `No_of_Student_Volunteer_for_Activity`, `No_of_People_benefitted_by_Activity`, `pdffile1`, `user_id`, `STATUS`) VALUES
(1, ' rhea', ' rha', 'wiji', 'IT', ' ', '2023-03-09', 0, 0, 0, 'SamplingTheory.pdf', 0, 'approved'),
(2, ' rhea', ' Og', 'ecell', 'IT', ' ', '2023-03-10', 1234, 12, 13, 'SamplingTheory.pdf', 0, 'approved'),
(3, ' rhea1', ' hab', 'wodj', 'Electrical', ' ', '2023-03-02', 0, 0, 232, 'Probability 1.pdf', 0, 'approved'),
(4, ' rhkjhds', ' lkjlsxc', 'lkdjls', 'UBA', ' ,ndlslc', '2023-03-09', 15271, 822, 2121, 'Ztransform.pdf', 3, 'approved'),
(5, ' gfg', ' drer', 'cgg', 'Eco-club', ' ', '2023-03-09', 0, 356, 5454, 'Probability(28_2_23) .pdf', 0, 'approved'),
(6, ' key', ' Og', '5454', 'Mechanical', ' a', '2023-03-02', 15271, 822, 232, 'SamplingTheory.pdf', 0, 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `outreached_program`
--
ALTER TABLE `outreached_program`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `outreached_program`
--
ALTER TABLE `outreached_program`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
