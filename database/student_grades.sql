-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 08:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_grades`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentid` varchar(10) NOT NULL,
  `rollnumber` varchar(10) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `emailaddress` text NOT NULL,
  `dob` date NOT NULL,
  `major` varchar(20) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentid`, `rollnumber`, `firstname`, `lastname`, `gender`, `emailaddress`, `dob`, `major`, `bloodgroup`, `regdate`) VALUES
('1920', '46', 'Harith', 'Bimani', 'male', 'halbimani6@gmail.com', '2001-05-09', 'computer science', 'A+', '2019-09-22'),
('1923', '63', 'Abdul', 'Mahrooqi', 'male', 'halbimani@hotmail.com', '2001-05-09', 'computer science', 'A+', '2019-09-22'),
('2130', '86', 'Khalid', 'Zadjali', 'male', 'halbimani6@gmail.com', '1999-09-10', 'computer science', 'AB+', '2021-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `markid` int(10) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `subjectid` varchar(10) NOT NULL,
  `mark` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`markid`, `studentid`, `subjectid`, `mark`) VALUES
(1, '1920', '1', 88),
(2, '1920', '2', 90),
(3, '1923', '1', 92),
(4, '2130', '2', 70),
(5, '2130', '1', 78);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectid` varchar(10) NOT NULL,
  `subjectname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectid`, `subjectname`) VALUES
('1', 'Data Structures'),
('2', 'Theory of Computing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `studentid` (`studentid`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD UNIQUE KEY `markid` (`markid`),
  ADD KEY `studentid` (`studentid`),
  ADD KEY `subjectid` (`subjectid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD UNIQUE KEY `subjectid` (`subjectid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `markid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
