-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 04:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
-- Table structure for table `conferencepublication`
--

CREATE TABLE `conferencepublication` (
  `id` int(50) NOT NULL,
  `Name_Of_The_Teacher` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `Title_Of_The_Paper` varchar(255) NOT NULL,
  `Title_Of_The_Proceedings` varchar(255) NOT NULL,
  `Name_Of_The_Conference` varchar(255) NOT NULL,
  `National_Or_International` varchar(255) NOT NULL,
  `Name_Of_Organizing_Institute` varchar(255) NOT NULL,
  `Year_Of_Publication` year(4) NOT NULL,
  `ISBN_Or_ISSN_Number` int(100) NOT NULL,
  `Affiliating_Institute` varchar(255) NOT NULL,
  `Name_Of_Publisher` varchar(255) NOT NULL,
  `Conference_Date_From` date NOT NULL,
  `Conference_Date_To` date NOT NULL,
  `Name_Of_Library` varchar(255) NOT NULL,
  `Paper_Webinar` varchar(255) NOT NULL,
  `Conference_Proceedings` varchar(255) NOT NULL,
  `Registration_Amount` int(100) NOT NULL,
  `TA_Received` int(100) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conferencepublication`
--

INSERT INTO `conferencepublication` (`id`, `Name_Of_The_Teacher`, `Branch`, `Title_Of_The_Paper`, `Title_Of_The_Proceedings`, `Name_Of_The_Conference`, `National_Or_International`, `Name_Of_Organizing_Institute`, `Year_Of_Publication`, `ISBN_Or_ISSN_Number`, `Affiliating_Institute`, `Name_Of_Publisher`, `Conference_Date_From`, `Conference_Date_To`, `Name_Of_Library`, `Paper_Webinar`, `Conference_Proceedings`, `Registration_Amount`, `TA_Received`, `user_id`) VALUES
(1, ',,jbsd', 'sd', 'sd', 'sd', 'ds', 'sd', 'ds', 2002, 23, 'fd', 'f', '2023-04-05', '2023-04-21', 'w', 'wr', 'wr', 23, 23, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conferencepublication`
--
ALTER TABLE `conferencepublication`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conferencepublication`
--
ALTER TABLE `conferencepublication`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
