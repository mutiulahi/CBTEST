-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 12:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `department` varchar(150) NOT NULL,
  `questionID` varchar(300) NOT NULL,
  `optionS` varchar(100) NOT NULL,
  `lecturer` varchar(250) NOT NULL,
  `seasion` varchar(50) NOT NULL,
  `matric` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `subject`, `level`, `department`, `questionID`, `optionS`, `lecturer`, `seasion`, `matric`) VALUES
(21, 'MTH101', '200', 'Computer', '1', 'A', 'ola', '2020 / 2021', '17/000'),
(22, 'MTH101', '200', 'Computer', '2', 'C', 'ola', '2020 / 2021', '17/000'),
(23, 'MTH101', '200', 'Computer', '3', 'C', 'ola', '2020 / 2021', '17/000'),
(24, 'MTH101', '200', 'Computer', '4', 'C', 'ola', '2020 / 2021', '17/000'),
(25, 'MTH101', '200', 'Computer', '5', 'A', 'ola', '2020 / 2021', '17/000'),
(26, 'MTH101', '200', 'Computer', '1', 'C', 'ola', '2020 / 2021', '17/0000'),
(27, 'MTH101', '200', 'Computer', '2', 'D', 'ola', '2020 / 2021', '17/0000'),
(28, 'MTH101', '200', 'Computer', '3', 'A', 'ola', '2020 / 2021', '17/0000'),
(29, 'MTH101', '200', 'Computer', '4', 'C', 'ola', '2020 / 2021', '17/0000'),
(30, 'MTH101', '200', 'Computer', '5', 'A', 'ola', '2020 / 2021', '17/0000');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Tesleem', 'Tescode', 'tesleemolamilekan902@gmail.com', 'tescode'),
(2, 'ola', 'ola', 'ola@gmail.com', 'ola'),
(3, 'test', 'test', 'test@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `questionupload`
--

CREATE TABLE `questionupload` (
  `id` int(11) NOT NULL,
  `questionID` varchar(300) NOT NULL,
  `seasion` varchar(50) NOT NULL,
  `uploaders` varchar(100) NOT NULL,
  `questions` varchar(500) NOT NULL,
  `optionA` varchar(300) NOT NULL,
  `optionB` varchar(300) NOT NULL,
  `optionC` varchar(300) NOT NULL,
  `optionD` varchar(300) NOT NULL,
  `level` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `answers` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionupload`
--

INSERT INTO `questionupload` (`id`, `questionID`, `seasion`, `uploaders`, `questions`, `optionA`, `optionB`, `optionC`, `optionD`, `level`, `department`, `course_code`, `answers`) VALUES
(1, '200_Computer_MTH101', '2020 / 2021', 'ola', '1212', 'A', 'C', 'C', 'D', '200', 'Computer', 'MTH101', 'B'),
(2, '200_Computer_MTH101', '2020 / 2021', 'ola', 'JDKFJKLDSK', 'A', 'C', 'C', 'D', '200', 'Computer', 'MTH101', 'D'),
(3, '200_Computer_MTH101', '2020 / 2021', 'ola', 'KJNDFJKNLKDN', 'A', 'C', 'C', 'D', '200', 'Computer', 'MTH101', 'A'),
(4, '200_Computer_MTH101', '2020 / 2021', 'ola', 'CFBBCBFFGF', 'A', 'C', 'C', 'D', '200', 'Computer', 'MTH101', 'C'),
(5, '200_Computer_MTH101', '2020 / 2021', 'ola', 'DFHGTHYTHTYHT', 'A', 'C', 'C', 'D', '200', 'Computer', 'MTH101', 'A'),
(8, '300_Computer_MTH10103', '2020 / 2021', 'ola', 'what is book', 'H T M L ', 'java', 'java', 'flutter', '300', 'Computer', 'MTH10103', 'css'),
(9, '300_Computer_MTH10103', '2020 / 2021', 'ola', 'mhgmhjm', 'jghjgh', 'hjhj', 'hjhj', 'hjmh', '300', 'Computer', 'MTH10103', 'hmjhgj'),
(10, '300_Computer_MTH10103', '2020 / 2021', 'ola', 'gjghj', 'nmm', 'bnb', 'bnb', 'bnmb', '300', 'Computer', 'MTH10103', 'bnbm'),
(11, '300_Computer_MTH101', '2020 / 2021', 'ola', 'dbfdbgfb', 'fdgggdf', '', '', '', '300', 'Computer', 'MTH101', ''),
(12, '300_Computer_MTH101', '2020 / 2021', 'ola', 'qewrreffe', 'efefd', 'wfdewdf', 'wfdewdf', 'wedfewd', '300', 'Computer', 'MTH101', 'ewded');

-- --------------------------------------------------------

--
-- Table structure for table `question_details`
--

CREATE TABLE `question_details` (
  `id` int(100) NOT NULL,
  `numberQues` int(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `lecturer` varchar(150) NOT NULL,
  `questionID` varchar(300) NOT NULL,
  `seasion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_details`
--

INSERT INTO `question_details` (`id`, `numberQues`, `level`, `department`, `subject`, `lecturer`, `questionID`, `seasion`) VALUES
(1, 5, '200', 'Computer', 'MTH101', 'ola', '200_Computer_MTH101_2020 / 2021', '2020 / 2021'),
(2, 6, '300', 'Computer', 'MTH101', 'ola', '300_Computer_MTH101_2020 / 2021', '2020 / 2021'),
(3, 7, '300', 'Computer', 'MTH1010', 'ola', '300_Computer_MTH1010_2020 / 2021', '2020 / 2021'),
(4, 3, '300', 'Computer', 'MTH10103', 'ola', '300_Computer_MTH10103_2020 / 2021', '2020 / 2021');

-- --------------------------------------------------------

--
-- Table structure for table `result_tb`
--

CREATE TABLE `result_tb` (
  `id` int(11) NOT NULL,
  `matric` varchar(30) NOT NULL,
  `score` int(30) NOT NULL,
  `department` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `seasion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_tb`
--

INSERT INTO `result_tb` (`id`, `matric`, `score`, `department`, `course`, `level`, `seasion`) VALUES
(6, '17/000', 2, 'Computer', 'MTH101', '200', '2020 / 2021'),
(7, '17/0000', 4, 'Computer', 'MTH101', '200', '2020 / 2021'),
(8, '', 0, '', '', '', ''),
(9, '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_db`
--

CREATE TABLE `student_db` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `matric` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `level` varchar(10) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_db`
--

INSERT INTO `student_db` (`id`, `email`, `matric`, `name`, `level`, `department`) VALUES
(1, 'tescode@gmail.com', '17/0000', 'Mutiulahi Tesleem Olamilekan', '200', 'Computer'),
(2, 'tes@tesinfo.com', '17/000', 'GANIYU', '200', 'Computer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `questionupload`
--
ALTER TABLE `questionupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_details`
--
ALTER TABLE `question_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_tb`
--
ALTER TABLE `result_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_db`
--
ALTER TABLE `student_db`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matric` (`matric`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questionupload`
--
ALTER TABLE `questionupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `question_details`
--
ALTER TABLE `question_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result_tb`
--
ALTER TABLE `result_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_db`
--
ALTER TABLE `student_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
