-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 07:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `ID` int(11) NOT NULL,
  `Student` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `CurrentDate` date NOT NULL DEFAULT current_timestamp(),
  `UpadateOn` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `Years` varchar(50) NOT NULL,
  `CreationDate` date NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `Years`, `CreationDate`, `UpdationDate`, `status`) VALUES
(7, 'BBA', '3', '2022-07-23', NULL, 1),
(16, 'MCA', '2', '2022-08-12', NULL, 1),
(18, 'BCOM', '4', '2022-08-12', NULL, 1),
(19, 'BCA', '3', '2022-08-12', NULL, 1),
(21, 'MBA', '3', '2022-08-14', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ExamID` int(11) NOT NULL,
  `ExamName` varchar(255) NOT NULL,
  `Course` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `CreationDate` date NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ExamID`, `ExamName`, `Course`, `Semester`, `CreationDate`, `UpdationDate`, `status`) VALUES
(1, 'Mid Terms', 19, 1, '2022-08-16', NULL, 1),
(6, 'internal ', 19, 2, '2022-08-16', NULL, 1),
(7, 'final', 19, 2, '2022-08-17', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_tt`
--

CREATE TABLE `exam_tt` (
  `ETTID` int(11) NOT NULL,
  `ExamName` int(11) NOT NULL,
  `SubName` int(11) NOT NULL,
  `Marks` varchar(255) NOT NULL DEFAULT '100',
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_tt`
--

INSERT INTO `exam_tt` (`ETTID`, `ExamName`, `SubName`, `Marks`, `Date`) VALUES
(1, 1, 1, '100', '2022-08-09'),
(2, 1, 2, '100', '2022-08-10'),
(3, 6, 3, '100', '2022-08-16'),
(4, 6, 4, '100', '2022-08-18'),
(5, 7, 3, '100', '2022-08-20'),
(8, 7, 4, '100', '2022-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `ID` int(11) NOT NULL,
  `Student` int(11) NOT NULL,
  `Course` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Exam` int(11) NOT NULL,
  `Subject` int(11) NOT NULL,
  `InternalMarks` int(11) NOT NULL,
  `ExternalMarks` int(11) NOT NULL,
  `CreationDate` date NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `SemID` int(11) NOT NULL,
  `SemName` varchar(50) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemID`, `SemName`, `CreationDate`, `UpdationDate`) VALUES
(1, '1', '2022-07-23 07:32:58', NULL),
(2, '2', '2022-07-23 07:32:58', NULL),
(3, '3', '2022-08-06 09:43:17', NULL),
(4, '4', '2022-08-06 09:43:17', NULL),
(5, '5', '2022-08-06 09:43:29', NULL),
(6, '6', '2022-08-06 09:43:29', NULL),
(7, '7', '2022-08-06 09:43:43', NULL),
(8, '8', '2022-08-06 09:43:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectID` int(11) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `SubjectName` varchar(50) NOT NULL,
  `Course` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `Code`, `SubjectName`, `Course`, `Semester`, `CreationDate`, `UpdationDate`, `status`) VALUES
(1, '101', 'JAVA', 19, 1, '2022-08-16 13:06:29', NULL, 1),
(2, '102', 'OS', 19, 1, '2022-08-16 13:06:44', NULL, 1),
(3, '103', 'CPP', 19, 2, '2022-08-16 13:06:58', NULL, 1),
(4, '104', 'OR', 19, 2, '2022-08-16 13:07:18', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_allocation`
--

CREATE TABLE `teacher_allocation` (
  `aID` int(11) NOT NULL,
  `UserName` int(11) NOT NULL,
  `Course` int(11) NOT NULL,
  `Sem` int(11) NOT NULL,
  `CreationDate` date NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_allocation`
--

INSERT INTO `teacher_allocation` (`aID`, `UserName`, `Course`, `Sem`, `CreationDate`, `UpdationDate`) VALUES
(4, 7, 1, 1, '2022-08-11', NULL),
(6, 7, 7, 1, '2022-08-14', NULL),
(7, 39, 7, 2, '2022-08-14', NULL),
(10, 45, 16, 1, '2022-08-14', NULL),
(12, 46, 16, 5, '2022-08-14', NULL),
(13, 49, 19, 6, '2022-08-14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TypeID` int(11) NOT NULL,
  `TypeName` varchar(50) NOT NULL,
  `CreationDate` date NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `TypeName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', '2022-07-27', NULL),
(2, 'teacher', '2022-07-27', NULL),
(3, 'student', '2022-07-27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `stdID` varchar(255) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Add` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Course` int(11) DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` int(11) NOT NULL,
  `CreationDate` date NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `stdID`, `Name`, `Add`, `Gender`, `DOB`, `Contact`, `Course`, `Semester`, `Email`, `UserName`, `Password`, `Type`, `CreationDate`, `UpdationDate`, `status`) VALUES
(4, 'STDID2254', 'Om tawde', 'Gandhidham', 'Male', '2001-09-26', '9825230177', 19, 4, 'om@gmail', 'om', '83db893235619e973fe241e51f0f59f9c31299ec', 3, '2022-07-28', '2022-08-14', 0),
(7, NULL, 'abhishek jethwa', 'porbandar', 'Male', '2002-09-26', '9328053473', NULL, NULL, 'abhishek@gmail', 'abhishek', '6b8f12da63e0791f9a1397d0839e407f10b8af40', 2, '2022-08-05', '2022-08-14', 0),
(38, 'STDID2255', 'bhavik', 'porbandar', 'Male', '1990-08-25', '9825230122', 19, 1, 'bhavik@gmail', 'bhavik', '64a7fcc0ff82b799e1f5f8af6d4ebd6fa299d4d6', 3, '2022-08-10', NULL, 1),
(39, NULL, 'dhu', 'gandhidham', 'Male', '2022-08-12', '90909090', 8, 4, 'dhu@gmail', 'dhur', '67f2533bdd0a6b28c62e55e408963d9966f2b594', 2, '2022-08-10', '2022-08-14', 1),
(45, NULL, 'vijay', 'gandhidham', 'Male', '2022-08-02', '90909090', 16, 3, 'vijay@gmail', 'vijay', 'e442472d9ae74c677b6c389c9a6b15fa88229abe', 2, '2022-08-13', NULL, 1),
(46, NULL, 'Bhovan', 'porbandar', 'Male', '2002-09-22', '9825230122', 16, 2, 'bhivan@gmail', 'bhovan', '9227c8bf5e5722c01e3d3dccb8ed39d0a15abf8f', 2, '2022-08-13', NULL, 1),
(47, NULL, 'Admin', 'gandhidham', 'Male', '2000-09-26', '9825230188', NULL, NULL, 'Admin@gmail.com', 'admin', '23d42f5f3f66498b2c8ff4c20b8c5ac826e47146', 1, '2022-08-13', '2022-08-13', 1),
(49, NULL, 'ak', 'anjar', 'Male', '2022-08-01', '98098080', 18, 3, 'ak@gmail', 'ak', '0474aee45985f5ae829f53849df476200e876990', 2, '2022-08-14', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student` (`Student`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ExamID`),
  ADD KEY `Course` (`Course`),
  ADD KEY `Semester` (`Semester`);

--
-- Indexes for table `exam_tt`
--
ALTER TABLE `exam_tt`
  ADD PRIMARY KEY (`ETTID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student` (`Student`),
  ADD KEY `Course` (`Course`),
  ADD KEY `Semester` (`Semester`),
  ADD KEY `Exam` (`Exam`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`SemID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectID`),
  ADD UNIQUE KEY `subject` (`Code`),
  ADD KEY `Course` (`Course`),
  ADD KEY `Semester` (`Semester`);

--
-- Indexes for table `teacher_allocation`
--
ALTER TABLE `teacher_allocation`
  ADD PRIMARY KEY (`aID`),
  ADD KEY `Course` (`Course`),
  ADD KEY `Sem` (`Sem`),
  ADD KEY `UserName` (`UserName`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `admID` (`stdID`),
  ADD KEY `Course` (`Course`),
  ADD KEY `Semester` (`Semester`),
  ADD KEY `users_ibfk_3` (`Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_tt`
--
ALTER TABLE `exam_tt`
  MODIFY `ETTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `SemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_allocation`
--
ALTER TABLE `teacher_allocation`
  MODIFY `aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
