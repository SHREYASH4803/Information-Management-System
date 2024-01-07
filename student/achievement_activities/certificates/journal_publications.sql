-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 07:10 AM
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
-- Table structure for table `journal_publications`
--

CREATE TABLE `journal_publications` (
  `id` int(11) NOT NULL,
  `Name_Of_Faculty` varchar(50) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `Title_Of_Paper` varchar(50) NOT NULL,
  `Name_Of_Author` varchar(50) NOT NULL,
  `Name_Of_Journal` varchar(50) NOT NULL,
  `Journal_Citation_Index` varchar(50) NOT NULL,
  `Journal_Impact_Factor` varchar(50) NOT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Year_Of_Publication` int(11) NOT NULL,
  `Publication_Date` date NOT NULL,
  `Volume_Issue` varchar(50) NOT NULL,
  `ISSN_ISBN` varchar(50) NOT NULL,
  `Paper_Weblink` varchar(50) NOT NULL,
  `Link_Of_Paper` varchar(50) NOT NULL,
  `Details_Of_Paper` varchar(50) NOT NULL,
  `Journal_Paper` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journal_publications`
--

INSERT INTO `journal_publications` (`id`, `Name_Of_Faculty`, `Branch`, `Title_Of_Paper`, `Name_Of_Author`, `Name_Of_Journal`, `Journal_Citation_Index`, `Journal_Impact_Factor`, `Publisher`, `Year_Of_Publication`, `Publication_Date`, `Volume_Issue`, `ISSN_ISBN`, `Paper_Weblink`, `Link_Of_Paper`, `Details_Of_Paper`, `Journal_Paper`, `user_id`, `STATUS`) VALUES
(3, 'saaaa', 'IT', 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', 90, '1111-11-11', '999', '1111', '11111', '11', '11', 'define x A0.docx', 5, 'approved'),
(4, 'aa', 'IT', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 2018, '2023-06-07', 'ssss', 'ss', 'ss', 'ss', 'ss', 'define x A0.docx', 5, 'approved'),
(5, 'qq', 'IT', 'qq', 'qq', 'qq', 'qq', 'qq', 'qq', 2018, '2023-06-14', 'qq', 'qqqq', 'qq', 'qqq', 'qq', 'define x A0.docx', 5, 'approved'),
(6, 'aa', 'IT', 'aa', 'aacd', 'dsds', 'sddc', 'sdcds', 'cdsd', 2017, '2023-06-23', 'dcs', 'sc', 'sc', 'cssc', 'cs', 'define x A0.docx', 5, 'approved'),
(7, 'jkbk', 'IT', 'jkjbk', 'bbi', 'jhbik', 'jkbk', ' jk kj', 'jbiu', 2021, '2023-06-29', 'hbiogb', 'bkbkj', 'kjbjk', 'bkjb', 'ikbi', 'define x A0.docx', 5, 'approved'),
(8, 'chduyd', 'IT', 'vjhvjh', 'vhjvj', 'vjhvjv', 'vhvtdf', 'yfuyfu', 'hjcuf', 2018, '2023-06-15', 'bjhgvj', 'bjhbvj', 'vjvjv', 'jhvh', 'chgfyu', 'define x A0.docx', 5, 'approved'),
(9, 'ass', 'IT', 'adsdas', 'dasdas', 'dasads', 'adsasasd', 'dsas', 'das', 2018, '2023-06-15', 'ads', 'ads', 'ads', 'ads', 'asd', 'define x A0.docx', 5, 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journal_publications`
--
ALTER TABLE `journal_publications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journal_publications`
--
ALTER TABLE `journal_publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
