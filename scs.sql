-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2019 at 02:58 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scs`
--

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `ID` int(10) NOT NULL,
  `studentnumber` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `timeout` varchar(15) NOT NULL,
  `age` int(10) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `symptoms` varchar(50) NOT NULL,
  `diagnosis` varchar(50) NOT NULL,
  `medicationgiven` varchar(50) NOT NULL,
  `followupdate` varchar(20) NOT NULL,
  `clinician` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`ID`, `studentnumber`, `date`, `time`, `timeout`, `age`, `weight`, `symptoms`, `diagnosis`, `medicationgiven`, `followupdate`, `clinician`) VALUES
(12, '2015-00227-ST-0', '2019-02-02', '14:34', '14:45', 19, '54kg', 'cold', 'very cold', 'white flower', '', 'CJ De Claro'),
(13, '2015-00227-ST-0', '2019-02-02', '21:55', '22:00', 19, '54kg', 'runny nose', 'cold', 'neozep', '', 'Default Admin');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `ID` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `prereq` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `name`, `status`, `prereq`) VALUES
(1, 'WebsiteStatus', 'On', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `studentnumber` varchar(50) NOT NULL,
  `LRN` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `section` varchar(20) NOT NULL,
  `adviser` varchar(50) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `parentsname` varchar(50) NOT NULL,
  `parentsnumber` varchar(20) NOT NULL,
  `allergens` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `name`, `studentnumber`, `LRN`, `address`, `contactnumber`, `grade`, `section`, `adviser`, `bloodtype`, `parentsname`, `parentsnumber`, `allergens`) VALUES
(11, 'Christopher Jay De Claro', '2015-00227-ST-0', '123456789012', 'Tumaway', '09758233891', '12', 'Jose Rizal', 'Luz Viminda', '', 'Lili Cruz', '09876543211', ''),
(12, 'Jane Doe', '2015-00123-ST-0', '123456789013', 'Tanauan', '09876543212', '12', 'Gumamela', 'luz', '', 'Lili', '09878789998', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `lname`, `fname`, `usertype`) VALUES
(1, 'admin', 'admin', 'Admin', 'Default', 'admin'),
(3, 'cj', 'cj', 'De Claro', 'CJ', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
