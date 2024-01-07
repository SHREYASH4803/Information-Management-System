-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 12, 2023 at 08:07 PM
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
-- Table structure for table `bookschapter`
--

CREATE TABLE `bookschapter` (
  `id` int(100) NOT NULL,
  `Name_Of_The_Teacher` varchar(100) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  `Title_Of_The_Book_Published` varchar(100) NOT NULL,
  `Title_Of_The_Chapter_Published_In_The_Book` varchar(100) NOT NULL,
  `Name_Of_The_Publisher` varchar(100) NOT NULL,
  `National_Or_International` varchar(100) NOT NULL,
  `ISBN_Or_ISSN_Number` varchar(100) NOT NULL,
  `Year_Of_Publication` int(11) NOT NULL,
  `Volume_Issue` varchar(100) NOT NULL,
  `pdffile1` varchar(100) NOT NULL,
  `pdffile2` varchar(100) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookschapter`
--

INSERT INTO `bookschapter` (`id`, `Name_Of_The_Teacher`, `Branch`, `Title_Of_The_Book_Published`, `Title_Of_The_Chapter_Published_In_The_Book`, `Name_Of_The_Publisher`, `National_Or_International`, `ISBN_Or_ISSN_Number`, `Year_Of_Publication`, `Volume_Issue`, `pdffile1`, `pdffile2`, `user_id`, `STATUS`) VALUES
(1, '   IT 1  ', '', '   IT  1  ', '   IT 1  ', '   IT 1  ', 'International', '   1 1  ', 2019, '   1 1  ', 'bill.png', 'sale.png', '21', 'PENDING'),
(2, 'extc', 'EXTC', 'extc', 'extc', 'extc', 'International', '2', 2017, '2', 'bill.png', 'sale.png', '20', 'approved'),
(3, ' comp 1 2 ', 'Computers', '   comp 1 2 ', '   comp 1 2 ', '   comp 1 2 ', 'National', '   3 1 2 ', 2018, '   3 1 2 ', 'bill.png', 'sale.png', '23', 'approved'),
(7, '87', 'Computers', '87', '8', '87', 'International', '98', 2018, '980', 'bill.png', 'sale.png', '23', 'approved'),
(8, ' O ', 'Computers', ' oo ', ' O ', ' O ', 'National', ' 12', 2018, ' 0 ', 'C5NEW.jpg', 'C5NEW.jpg', '23', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `branchadmins`
--

CREATE TABLE `branchadmins` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branchadmins`
--

INSERT INTO `branchadmins` (`id`, `username`, `password`, `branch`) VALUES
(3, 'it', '6c5522ca8af86fc5069b737bb8892b3ea61002c2', 'it'),
(4, 'comp', 'b1227d2ef5edb14a1d4bf6dfb9871c3a17b42df0', 'computer'),
(5, 'extc', 'fbb36b0d39c5aae89b2b4201417839111eed516e', 'extc'),
(6, 'elec', 'c2726d0945f620311e9061335017657e9a946527', 'electrical'),
(7, 'mech', 'e7fa8f38396ef1332a60b629ba69257c462cbf3b', 'mechanical'),
(8, 'humanities', '905db83dc5b90f8051d414130369ea54d0fce544', 'humanities'),
(9, 'comp', 'b1227d2ef5edb14a1d4bf6dfb9871c3a17b42df0', 'Computers');

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
(8, 32333, ' IT ', ' adi ', '2222', 500, 'Screenshot (47).png', 'PENDING'),
(11, 2017, 'IT', '0', '0', 0, 'sale.png', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Course_coordinator` varchar(255) NOT NULL,
  `Programs_offered` varchar(255) NOT NULL,
  `Course_code` varchar(255) NOT NULL,
  `Year_of_offering` int(100) NOT NULL,
  `No_of_times_offered` int(100) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Duration` int(100) NOT NULL,
  `No_of_students_enrolled` int(100) NOT NULL,
  `No_of_students_completing` int(100) NOT NULL,
  `pdffile1` text NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `Department`, `Course_coordinator`, `Programs_offered`, `Course_code`, `Year_of_offering`, `No_of_times_offered`, `Start_date`, `End_date`, `Duration`, `No_of_students_enrolled`, `No_of_students_completing`, `pdffile1`, `user_id`) VALUES
(7, 'EXTC', ' abc ', ' dhskd ', ' 1234 ', 2003, 23, '2023-03-10', '2023-03-10', 3629, 234, 432, 'Probability(28_2_23) .pdf', 8),
(8, 'IT', 'abc', 'sdfsfd', '23344', 2019, 23, '2023-03-16', '2023-03-02', 3629, 234, 432, 'SE-IT_SEM4_M4_MAY17.pdf', 8),
(9, 'IT', 'abcd', 'efgh', '1234', 2019, 17, '2023-03-24', '2023-03-25', 23, 526, 32, 'Probability 1.pdf', 0),
(10, 'Humanities', ' abcd ', ' efgh ', ' 1234 ', 2004, 17, '2023-03-08', '2023-03-09', 23, 234, 32, 'Adobe Scan 03 Feb 2023 (1).pdf', 8),
(11, 'Computers', '1234', 'dgghh', '23344', 2020, 1234, '2023-03-08', '2023-03-16', 3629, 234, 32, 'Adobe Scan 03 Feb 2023 (1).pdf', 8);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `username`, `password`) VALUES
(1, 'ecelladmin@fcrit.ac.in', '8cb2237d0679ca88db6464eac60da96345513964'),
(2, 'nssadmin@fcrit.ac.in', '8cb2237d0679ca88db6464eac60da96345513964'),
(3, 'ubaadmin@fcrit.ac.in', '8cb2237d0679ca88db6464eac60da96345513964'),
(4, 'aiadmin@fcrit.ac.in', '8cb2237d0679ca88db6464eac60da96345513964'),
(5, 'ecoadmin@fcrit.ac.in', '8cb2237d0679ca88db6464eac60da96345513964'),
(6, 'womancell@fcrit.ac.in', '8cb2237d0679ca88db6464eac60da96345513964'),
(7, 'ebsbadmin@fcrit.ac.in', '8cb2237d0679ca88db6464eac60da96345513964'),
(8, 'placementcell@fcrit.ac.in', '8cb2237d0679ca88db6464eac60da96345513964');

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
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conferencepublication`
--

INSERT INTO `conferencepublication` (`id`, `Name_Of_The_Teacher`, `Branch`, `Title_Of_The_Paper`, `Title_Of_The_Proceedings`, `Name_Of_The_Conference`, `National_Or_International`, `Name_Of_Organizing_Institute`, `Year_Of_Publication`, `ISBN_Or_ISSN_Number`, `Affiliating_Institute`, `Name_Of_Publisher`, `Conference_Date_From`, `Conference_Date_To`, `Name_Of_Library`, `Paper_Webinar`, `Conference_Proceedings`, `Registration_Amount`, `TA_Received`, `user_id`) VALUES
(1, ',,jbsd', 'sd', 'sd', 'sd', 'ds', 'sd', 'ds', 2002, 23, 'fd', 'f', '2023-04-05', '2023-04-21', 'w', 'wr', 'wr', 23, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `branch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `username`, `password`, `branch`) VALUES
(1, 'fcrit1@fcrit.ac.in', '8fa1d29e62ae163bdaef5138dd56814ee223a58e', 'it'),
(6, 'it1@fcrit.ac.in', '3ad534ace0aeead50bf37166f24ee067e068c660', 'it'),
(7, 'it2@fcrit.ac.in', '2e475e9411423be4bfc00e0f69454ad93f1e8bac', 'it'),
(8, 'mech1@fcrit.ac.in\r\n', '4cbb5a69fb2f69776786a7e7e405ae0fc8638adf', 'mechanical'),
(9, 'mech2@fcrit.ac.in', '734ae23d5e06fd1aff31ddf0bbfd6f047418e2bc', 'mechanical'),
(10, 'comp1@fcrit.ac.in', '1cfe4dae7181bcab07203e929a873d8b8c489b4c', 'computer'),
(11, 'comp2@fcrit.ac.in', 'c3049ee10e28446cb65d4ac53a18f2ad6d3ad1bd', 'computer'),
(12, 'extc1@fcrit.ac.in', '2e360b1d9f7864375935b2bc826033f96630722b', 'extc'),
(13, 'extc2@fcrit.ac.in', 'e460d77531724b1dae9f88cdc5fccd509582e63a', 'extc'),
(14, 'elec1@fcrit.ac.in', '084e85e527b9fd5618b1f4d9753eb71b0c666105', 'electrical'),
(15, 'elec2@fcrit.ac.in', 'e0f1fa54253612d3af2c1276510331de7fbcc57e', 'electrical'),
(16, 'humanities1@fcrit.ac.in', '07212e6084e6fe55837a1607b35566d9a7405bdb', 'humanities'),
(17, 'humanities2@fcrit.ac.in', '54e9820f4798447cef85780697896a464cd07d3b', 'humanities'),
(18, '5021117@fcrit.ac.in', '87589b441ebf68ea8ffc8160c91fce82b9297e13', 'IT'),
(19, 'it11@fcrit.ac.in', '84b9b22763f3a67c1127575e5eabf12afb85d79c', 'it'),
(20, 'EXTC143@fcrit.ac.in', '408c096b21ef2a8092f0ed89797a2ea636a6bc3f', 'EXTC'),
(21, 'it143@fcrit.ac.in', '08f2065c5329660051e82d217a692b3b3c44f9cc', 'IT'),
(22, 'pp@fcrit.ac.in', '6d3236ec3c88039ca534b81acad564e847ecb062', 'mechanical'),
(23, 'computer@fcrit.ac.in', 'c60266a8adad2f8ee67d793b4fd3fd0ffd73cc61', 'Computers'),
(24, 'extc', 'fbb36b0d39c5aae89b2b4201417839111eed516e', 'EXTC'),
(25, 'comp', 'b1227d2ef5edb14a1d4bf6dfb9871c3a17b42df0', 'Computers');

-- --------------------------------------------------------

--
-- Table structure for table `fdpadmins`
--

CREATE TABLE `fdpadmins` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fdpadmins`
--

INSERT INTO `fdpadmins` (`id`, `username`, `password`, `branch`) VALUES
(5, 'it', '6c5522ca8af86fc5069b737bb8892b3ea61002c2', 'it');

-- --------------------------------------------------------

--
-- Table structure for table `fdpsttpattendedit`
--

CREATE TABLE `fdpsttpattendedit` (
  `id` int(100) NOT NULL,
  `Academic_year` varchar(255) NOT NULL,
  `Name_Of_The_Teacher` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `Title_Of_Program` varchar(255) NOT NULL,
  `Professional_Body_Or_Organization_Associated` varchar(255) NOT NULL,
  `Course_Type` varchar(255) NOT NULL,
  `Organizing_Institute_And_Location` varchar(1000) NOT NULL,
  `Dates_From` varchar(255) NOT NULL,
  `Dates_To` varchar(255) NOT NULL,
  `Duration` varchar(255) NOT NULL,
  `TA_Received` varchar(255) NOT NULL,
  `Registration_Amount` varchar(255) NOT NULL,
  `pdffile1` text NOT NULL,
  `pdffile2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fdpsttpattendedit`
--

INSERT INTO `fdpsttpattendedit` (`id`, `Academic_year`, `Name_Of_The_Teacher`, `Branch`, `Title_Of_Program`, `Professional_Body_Or_Organization_Associated`, `Course_Type`, `Organizing_Institute_And_Location`, `Dates_From`, `Dates_To`, `Duration`, `TA_Received`, `Registration_Amount`, `pdffile1`, `pdffile2`) VALUES
(4, '2017-18', 'nancy', 'IT', 'awfa', 'a', 'faw', 'waf', '2023-04-13', '2023-04-27', '43', '23', '43', 'competitiveexams (1).sql', 'PROJ.docx');

-- --------------------------------------------------------

--
-- Table structure for table `fdpsttporganised`
--

CREATE TABLE `fdpsttporganised` (
  `id` int(11) NOT NULL,
  `Academic_year` varchar(50) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `Title_Of_Program` varchar(50) NOT NULL,
  `Approving_Body` varchar(50) NOT NULL,
  `Grant_Amount` int(11) NOT NULL,
  `Convener_Of_FDP_STTP` varchar(50) NOT NULL,
  `Dates_From` date NOT NULL,
  `Dates_To` date NOT NULL,
  `Total_No_Of_Days` int(11) NOT NULL,
  `No_Of_Participants` int(11) NOT NULL,
  `pdffile` varchar(100) NOT NULL,
  `STATUS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fdpsttporganised`
--

INSERT INTO `fdpsttporganised` (`id`, `Academic_year`, `Branch`, `Title_Of_Program`, `Approving_Body`, `Grant_Amount`, `Convener_Of_FDP_STTP`, `Dates_From`, `Dates_To`, `Total_No_Of_Days`, `No_Of_Participants`, `pdffile`, `STATUS`) VALUES
(1, ' 2018-19 ', '  IT  ', '', ' k ', 9, ' k ', '2023-06-19', '2023-06-22', 90, 10, '', 'PENDING'),
(2, '2018-19', '', '0', '0', 0, '0', '0001-01-01', '0001-01-01', 0, 0, 'bill.png', 'PENDING'),
(3, '2021-22', '', 'j', 'j', 9, 'j', '2023-06-09', '2023-06-09', 9, 9, 'sale.png', 'PENDING');

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
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iqacadmins`
--

CREATE TABLE `iqacadmins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iqacadmins`
--

INSERT INTO `iqacadmins` (`id`, `username`, `password`) VALUES
(1, 'iqacadminit', 'd3f9a10e7d2ed6215b0ba4b0a5f0989816b0fbb8');

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
  `Journal_Paper` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journal_publications`
--

INSERT INTO `journal_publications` (`id`, `Name_Of_Faculty`, `Branch`, `Title_Of_Paper`, `Name_Of_Author`, `Name_Of_Journal`, `Journal_Citation_Index`, `Journal_Impact_Factor`, `Publisher`, `Year_Of_Publication`, `Publication_Date`, `Volume_Issue`, `ISSN_ISBN`, `Paper_Weblink`, `Link_Of_Paper`, `Details_Of_Paper`, `Journal_Paper`) VALUES
(0, 'namess', 'IT', 'fecesd', 'cerfeawvt', 'refdcx', 'dsfsdfcs', 'sdcsddc', 'ertgbc', 2021, '2022-11-15', 'sdcd', 'edfce', 'scszsd', 'edsfsde', 'ace4tv', '1.pdf'),
(2, 'fces', 'Mechanical', 'fecesd', 'sdefcews', 'ewatvr', 'wvetwtg ', 'factor', 'wetv4wv', 2020, '2022-11-09', 'csfwe', 'sdcsd', 'refaf', 'mn bvfc', 'sdfcsd', '');

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
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outreached_program`
--

INSERT INTO `outreached_program` (`id`, `Name_of_Activity`, `Organizing_Unit`, `Name_of_Coordinators`, `Name_of_Scheme`, `Others`, `Dates_Conducted`, `Year_of_Activity`, `No_of_Student_Volunteer_for_Activity`, `No_of_People_benefitted_by_Activity`, `pdffile1`, `user_id`) VALUES
(1, ' rhea', ' rha', 'wiji', 'IT', ' ', '2023-03-09', 0, 0, 0, 'SamplingTheory.pdf', 0),
(2, ' rhea', ' Og', 'ecell', 'IT', ' ', '2023-03-10', 1234, 12, 13, 'SamplingTheory.pdf', 0),
(3, ' rhea1', ' hab', 'wodj', 'Electrical', ' ', '2023-03-02', 0, 0, 232, 'Probability 1.pdf', 0),
(4, ' rhkjhds', ' lkjlsxc', 'lkdjls', 'UBA', ' ,ndlslc', '2023-03-09', 15271, 822, 2121, 'Ztransform.pdf', 3),
(5, ' gfg', ' drer', 'cgg', 'Eco-club', ' ', '2023-03-09', 0, 356, 5454, 'Probability(28_2_23) .pdf', 0),
(6, ' key', ' Og', '5454', 'Mechanical', ' a', '2023-03-02', 15271, 822, 232, 'SamplingTheory.pdf', 0),
(7, ' key', ' Og', '822', 'Mechanical', ' ', '2023-03-09', 1234, 12, 2121, 'Assignment1&2.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `researchprojectconsultancies`
--

CREATE TABLE `researchprojectconsultancies` (
  `id` int(100) NOT NULL,
  `Type_Research_Project_Consultancy` varchar(100) NOT NULL,
  `Name_Of_Project_Endownment` varchar(100) NOT NULL,
  `Name_Of_Principal_Investigator_CoInvestigator` varchar(100) NOT NULL,
  `Department_Of_Principal_Investigator` varchar(100) NOT NULL,
  `Year_Of_Award` varchar(100) NOT NULL,
  `Amount_Sanctioned` varchar(100) NOT NULL,
  `Duration_Of_The_Project` varchar(100) NOT NULL,
  `Name_Of_The_Funding_Agency` varchar(250) NOT NULL,
  `Funding_Agency_Website_Link` varchar(250) NOT NULL,
  `Type_Govt_NonGovt` varchar(100) NOT NULL,
  `pdffile1` varchar(100) NOT NULL,
  `STATUS` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `researchprojectconsultancies`
--

INSERT INTO `researchprojectconsultancies` (`id`, `Type_Research_Project_Consultancy`, `Name_Of_Project_Endownment`, `Name_Of_Principal_Investigator_CoInvestigator`, `Department_Of_Principal_Investigator`, `Year_Of_Award`, `Amount_Sanctioned`, `Duration_Of_The_Project`, `Name_Of_The_Funding_Agency`, `Funding_Agency_Website_Link`, `Type_Govt_NonGovt`, `pdffile1`, `STATUS`) VALUES
(14, 'Research Consultancy', 'w', 'w', 'w', 'w', 'w', 'w', 'w', 'w', 'Government', 'coding.pdf', ''),
(15, 'Research Project', 'a', 'aa', 'a', '1', '1', 'z1', '1', '1', 'Government', '1.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`) VALUES
(1, 'superadmin', '889a3a791b3875cfae413574b53da4bb8a90d53e');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `s_no` int(11) NOT NULL,
  `club` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `workshop/seminar` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `coordinator` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `no_of_participants` int(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `report` varchar(255) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookschapter`
--
ALTER TABLE `bookschapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchadmins`
--
ALTER TABLE `branchadmins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_guidance`
--
ALTER TABLE `career_guidance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conferencepublication`
--
ALTER TABLE `conferencepublication`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdpadmins`
--
ALTER TABLE `fdpadmins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdpsttpattendedit`
--
ALTER TABLE `fdpsttpattendedit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdpsttporganised`
--
ALTER TABLE `fdpsttporganised`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `higher_studies`
--
ALTER TABLE `higher_studies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iqacadmins`
--
ALTER TABLE `iqacadmins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_publications`
--
ALTER TABLE `journal_publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outreached_program`
--
ALTER TABLE `outreached_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `researchprojectconsultancies`
--
ALTER TABLE `researchprojectconsultancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookschapter`
--
ALTER TABLE `bookschapter`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branchadmins`
--
ALTER TABLE `branchadmins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `career_guidance`
--
ALTER TABLE `career_guidance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `conferencepublication`
--
ALTER TABLE `conferencepublication`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `fdpadmins`
--
ALTER TABLE `fdpadmins`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fdpsttpattendedit`
--
ALTER TABLE `fdpsttpattendedit`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fdpsttporganised`
--
ALTER TABLE `fdpsttporganised`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iqacadmins`
--
ALTER TABLE `iqacadmins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `outreached_program`
--
ALTER TABLE `outreached_program`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `researchprojectconsultancies`
--
ALTER TABLE `researchprojectconsultancies`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
