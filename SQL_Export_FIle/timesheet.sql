-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2019 at 07:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timesheet`
--
CREATE DATABASE IF NOT EXISTS `timesheet` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `timesheet`;

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `UID` int(11) NOT NULL,
  `USERNAME` text NOT NULL,
  `PASSWORD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`UID`, `USERNAME`, `PASSWORD`) VALUES
(0, 'sa@FDM.com', 'password'),
(1, 't', 'passw0rd'),
(2, 'another', 'Password');

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE `timesheets` (
  `ID` int(11) NOT NULL,
  `USERID` int(11) NOT NULL,
  `WeekStart` date DEFAULT NULL,
  `Monday` int(11) NOT NULL,
  `Tuesday` int(11) NOT NULL,
  `Wednesday` int(11) NOT NULL,
  `Thursday` int(11) NOT NULL,
  `Friday` int(11) NOT NULL,
  `Saturday` int(11) NOT NULL,
  `Sunday` int(11) NOT NULL,
  `Mon_project` text NOT NULL,
  `Tues_project` text NOT NULL,
  `Wed_project` text NOT NULL,
  `Thurs_project` text NOT NULL,
  `Fri_project` text NOT NULL,
  `Sat_project` text NOT NULL,
  `Sun_project` text NOT NULL,
  `Saved_status` tinyint(1) NOT NULL,
  `Submitted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `timesheets`
--

INSERT INTO `timesheets` (`ID`, `USERID`, `WeekStart`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`, `Mon_project`, `Tues_project`, `Wed_project`, `Thurs_project`, `Fri_project`, `Sat_project`, `Sun_project`, `Saved_status`, `Submitted`) VALUES
(1, 0, '2019-05-05', 5, 6, 7, 7, 6, 0, 0, '', '', '', '', '', '', '', 0, 1),
(4, 0, '0000-00-00', 6, 7, 70, 88, 60, 1, 1, 'project 1', 'project 1', 'project 2', 'project 1', 'project 1', 'project 1', 'project 2', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timesheet_status`
--

CREATE TABLE `timesheet_status` (
  `TimesheetID` int(11) NOT NULL,
  `TotalHours` int(11) NOT NULL,
  `ManagerApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `Forename` text NOT NULL,
  `Surname` text NOT NULL,
  `Email` text NOT NULL,
  `Department` text NOT NULL,
  `Manager` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `Forename`, `Surname`, `Email`, `Department`, `Manager`) VALUES
(0, 'Simon', 'Ainslie', 'sa@FDM.com', 'IT', 0),
(1, 'Test', 'Account', 'Test@FDM.com', 'accounts', 0),
(2, 'Another', 'Test_Account', 'testing@FDM.com', 'marketing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_defaults`
--

CREATE TABLE `user_defaults` (
  `UID` int(11) NOT NULL,
  `Monday` int(11) NOT NULL,
  `Tuesday` int(11) NOT NULL,
  `Wednesday` int(11) NOT NULL,
  `Thursday` int(11) NOT NULL,
  `Friday` int(11) NOT NULL,
  `Saturday` int(11) NOT NULL,
  `Sunday` int(11) NOT NULL,
  `Mon_project` text NOT NULL,
  `Tues_project` text NOT NULL,
  `Wed_project` text NOT NULL,
  `Thurs_project` text NOT NULL,
  `Fri_project` text NOT NULL,
  `Sat_project` text NOT NULL,
  `Sun_project` text NOT NULL,
  `TotalHours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user_defaults`
--

INSERT INTO `user_defaults` (`UID`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`, `Mon_project`, `Tues_project`, `Wed_project`, `Thurs_project`, `Fri_project`, `Sat_project`, `Sun_project`, `TotalHours`) VALUES
(0, 6, 7, 70, 88, 60, 1, 1, '', '', '', '', '', '', '', 32),
(1, 5, 5, 5, 5, 5, 5, 5, '', '', '', '', '', '', '', 0),
(2, 3, 4, 5, 6, 7, 0, 0, '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_manager`
--

CREATE TABLE `user_manager` (
  `UID` int(11) NOT NULL,
  `MID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `timesheet_status`
--
ALTER TABLE `timesheet_status`
  ADD PRIMARY KEY (`TimesheetID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `UID` (`UID`),
  ADD KEY `UID_2` (`UID`);

--
-- Indexes for table `user_defaults`
--
ALTER TABLE `user_defaults`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `user_manager`
--
ALTER TABLE `user_manager`
  ADD PRIMARY KEY (`UID`),
  ADD KEY `MID` (`MID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_details`
--
ALTER TABLE `login_details`
  ADD CONSTRAINT `login_details_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`);

--
-- Constraints for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD CONSTRAINT `timesheets_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `users` (`UID`);

--
-- Constraints for table `timesheet_status`
--
ALTER TABLE `timesheet_status`
  ADD CONSTRAINT `timesheet_status_ibfk_1` FOREIGN KEY (`TimesheetID`) REFERENCES `timesheets` (`ID`);

--
-- Constraints for table `user_defaults`
--
ALTER TABLE `user_defaults`
  ADD CONSTRAINT `user_defaults_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`);

--
-- Constraints for table `user_manager`
--
ALTER TABLE `user_manager`
  ADD CONSTRAINT `user_manager_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`),
  ADD CONSTRAINT `user_manager_ibfk_2` FOREIGN KEY (`MID`) REFERENCES `users` (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--Manually added privilages settings

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, CREATE TEMPORARY TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER ON *.* TO 'all_web_users'@'localhost' IDENTIFIED BY PASSWORD '*A0F874BC7F54EE086FCE60A37CE7887D8B31086B';

GRANT ALL PRIVILEGES ON `timesheet`.* TO 'all_web_users'@'localhost';