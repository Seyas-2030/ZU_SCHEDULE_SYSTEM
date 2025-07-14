-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 07:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zu_scheduler_first_2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(20) NOT NULL,
  `Year` varchar(250) COLLATE utf8_bin NOT NULL,
  `Semester` varchar(250) COLLATE utf8_bin NOT NULL,
  `Department` varchar(250) COLLATE utf8_bin NOT NULL,
  `Course_Number` varchar(250) COLLATE utf8_bin NOT NULL,
  `Course_Name` varchar(250) COLLATE utf8_bin NOT NULL,
  `Mid_Hours` int(2) NOT NULL,
  `Final_Hours` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `Year`, `Semester`, `Department`, `Course_Number`, `Course_Name`, `Mid_Hours`, `Final_Hours`) VALUES
(1, '2024', 'First', 'تكنولوجيا المعلومات', '12345', 'Java', 60, 90),
(2, '2024', 'First', 'تكنولوجيا المعلومات', '1234', 'Web', 60, 90),
(3, '2024', 'First', 'تكنولوجيا المعلومات', '44556', 'Database', 60, 90);

-- --------------------------------------------------------

--
-- Table structure for table `final_schedules`
--

CREATE TABLE `final_schedules` (
  `ID` int(20) NOT NULL,
  `Year` varchar(250) COLLATE utf8_bin NOT NULL,
  `Semester` varchar(250) COLLATE utf8_bin NOT NULL,
  `Department` varchar(250) COLLATE utf8_bin NOT NULL,
  `Section_ID` int(20) NOT NULL,
  `Room_ID` int(20) NOT NULL,
  `Day` text COLLATE utf8_bin NOT NULL,
  `Date` date NOT NULL,
  `Time_From` time NOT NULL,
  `Time_To` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `ID` int(20) NOT NULL,
  `Year` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Semester` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Department` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Instructor_Name` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Instructor_Username` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Instructor_Password` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`ID`, `Year`, `Semester`, `Department`, `Instructor_Name`, `Instructor_Username`, `Instructor_Password`) VALUES
(1, '2024', 'First', 'تكنولوجيا المعلومات', 'Test', 'test', '123456789'),
(2, '2024', 'First', 'تكنولوجيا المعلومات', 'Test 2', 'test2', '123456789'),
(3, '2024', 'First', 'تكنولوجيا المعلومات', 'Test 3', 'test3', '123456789'),
(4, '2024', 'First', 'تكنولوجيا المعلومات', 'Test 4', 'test4', '123456789'),
(5, '2024', 'First', 'تكنولوجيا المعلومات', 'Test 5', 'test5', '123456789'),
(6, '2024', 'First', 'تكنولوجيا المعلومات', 'Test 6', 'test6', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `instructors_final_schedules`
--

CREATE TABLE `instructors_final_schedules` (
  `ID` int(20) NOT NULL,
  `Instructor_ID` int(20) NOT NULL,
  `Schedule_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instructors_mid_schedules`
--

CREATE TABLE `instructors_mid_schedules` (
  `ID` int(20) NOT NULL,
  `Instructor_ID` int(20) NOT NULL,
  `Schedule_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors_mid_schedules`
--

INSERT INTO `instructors_mid_schedules` (`ID`, `Instructor_ID`, `Schedule_ID`) VALUES
(30, 1, 158),
(31, 2, 159),
(32, 3, 160),
(33, 1, 161),
(34, 2, 162);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_rooms`
--

CREATE TABLE `meeting_rooms` (
  `ID` int(20) NOT NULL,
  `Year` varchar(250) COLLATE utf8_bin NOT NULL,
  `Semester` varchar(250) COLLATE utf8_bin NOT NULL,
  `Department` varchar(250) COLLATE utf8_bin NOT NULL,
  `Room_Name` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `meeting_rooms`
--

INSERT INTO `meeting_rooms` (`ID`, `Year`, `Semester`, `Department`, `Room_Name`) VALUES
(1, '2024', 'First', 'تكنولوجيا المعلومات', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_rooms_reservations`
--

CREATE TABLE `meeting_rooms_reservations` (
  `ID` int(20) NOT NULL,
  `Room_ID` int(20) NOT NULL,
  `Instructor_ID` int(20) NOT NULL,
  `Date` text COLLATE utf8_bin NOT NULL,
  `Time_From` time NOT NULL,
  `Time_To` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `meeting_rooms_reservations`
--

INSERT INTO `meeting_rooms_reservations` (`ID`, `Room_ID`, `Instructor_ID`, `Date`, `Time_From`, `Time_To`) VALUES
(12, 1, 1, '2025-01-12', '08:00:00', '09:00:00'),
(13, 1, 1, '2025-01-13', '08:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mid_schedules`
--

CREATE TABLE `mid_schedules` (
  `ID` int(20) NOT NULL,
  `Year` varchar(250) COLLATE utf8_bin NOT NULL,
  `Semester` varchar(250) COLLATE utf8_bin NOT NULL,
  `Department` varchar(250) COLLATE utf8_bin NOT NULL,
  `Section_ID` int(20) NOT NULL,
  `Room_ID` int(20) NOT NULL,
  `Day` text COLLATE utf8_bin NOT NULL,
  `Date` date NOT NULL,
  `Time_From` time NOT NULL,
  `Time_To` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mid_schedules`
--

INSERT INTO `mid_schedules` (`ID`, `Year`, `Semester`, `Department`, `Section_ID`, `Room_ID`, `Day`, `Date`, `Time_From`, `Time_To`) VALUES
(158, '2024', 'First', 'تكنولوجيا المعلومات', 1, 1, 'Sunday', '2025-01-12', '08:00:00', '09:00:00'),
(159, '2024', 'First', 'تكنولوجيا المعلومات', 4, 3, 'Sunday', '2025-01-12', '08:00:00', '09:00:00'),
(160, '2024', 'First', 'تكنولوجيا المعلومات', 2, 4, 'Sunday', '2025-01-12', '08:00:00', '09:00:00'),
(161, '2024', 'First', 'تكنولوجيا المعلومات', 5, 1, 'Sunday', '2025-01-12', '09:00:00', '10:00:00'),
(162, '2024', 'First', 'تكنولوجيا المعلومات', 6, 3, 'Sunday', '2025-01-12', '09:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ID` int(20) NOT NULL,
  `Year` varchar(250) COLLATE utf8_bin NOT NULL,
  `Semester` varchar(250) COLLATE utf8_bin NOT NULL,
  `Department` varchar(250) COLLATE utf8_bin NOT NULL,
  `Room_Name` varchar(250) COLLATE utf8_bin NOT NULL,
  `Room_Type` varchar(250) COLLATE utf8_bin NOT NULL,
  `Total_Students_Capacity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `Year`, `Semester`, `Department`, `Room_Name`, `Room_Type`, `Total_Students_Capacity`) VALUES
(1, '2024', 'First', 'تكنولوجيا المعلومات', 'Room1', 'Class', 80),
(3, '2024', 'First', 'تكنولوجيا المعلومات', 'Room2', 'Class', 40),
(4, '2024', 'First', 'تكنولوجيا المعلومات', 'Room3', 'Class', 50);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `ID` int(20) NOT NULL,
  `Year` varchar(250) COLLATE utf8_bin NOT NULL,
  `Semester` varchar(250) COLLATE utf8_bin NOT NULL,
  `Department` varchar(250) COLLATE utf8_bin NOT NULL,
  `Course_ID` int(20) NOT NULL,
  `Instructor_ID` int(20) NOT NULL,
  `Section_Number` int(20) NOT NULL,
  `Total_Students_Capacity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`ID`, `Year`, `Semester`, `Department`, `Course_ID`, `Instructor_ID`, `Section_Number`, `Total_Students_Capacity`) VALUES
(1, '2024', 'First', 'تكنولوجيا المعلومات', 1, 1, 1, 20),
(2, '2024', 'First', 'تكنولوجيا المعلومات', 2, 1, 1, 20),
(3, '2024', 'First', 'تكنولوجيا المعلومات', 2, 2, 2, 15),
(4, '2024', 'First', 'تكنولوجيا المعلومات', 1, 1, 2, 40),
(5, '2024', 'First', 'تكنولوجيا المعلومات', 3, 3, 1, 20),
(6, '2024', 'First', 'تكنولوجيا المعلومات', 3, 3, 2, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `final_schedules`
--
ALTER TABLE `final_schedules`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Room_ID` (`Room_ID`),
  ADD KEY `Section_ID` (`Section_ID`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `instructors_final_schedules`
--
ALTER TABLE `instructors_final_schedules`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Instructor_ID` (`Instructor_ID`),
  ADD KEY `Schedule_ID` (`Schedule_ID`);

--
-- Indexes for table `instructors_mid_schedules`
--
ALTER TABLE `instructors_mid_schedules`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Instructor_ID` (`Instructor_ID`),
  ADD KEY `Schedule_ID` (`Schedule_ID`);

--
-- Indexes for table `meeting_rooms`
--
ALTER TABLE `meeting_rooms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `meeting_rooms_reservations`
--
ALTER TABLE `meeting_rooms_reservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Room_ID` (`Room_ID`);

--
-- Indexes for table `mid_schedules`
--
ALTER TABLE `mid_schedules`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Room_ID` (`Room_ID`),
  ADD KEY `Section_ID` (`Section_ID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `Instructor_ID` (`Instructor_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `final_schedules`
--
ALTER TABLE `final_schedules`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructors_final_schedules`
--
ALTER TABLE `instructors_final_schedules`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `instructors_mid_schedules`
--
ALTER TABLE `instructors_mid_schedules`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `meeting_rooms`
--
ALTER TABLE `meeting_rooms`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meeting_rooms_reservations`
--
ALTER TABLE `meeting_rooms_reservations`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mid_schedules`
--
ALTER TABLE `mid_schedules`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instructors_mid_schedules`
--
ALTER TABLE `instructors_mid_schedules`
  ADD CONSTRAINT `instructors_mid_schedules_ibfk_1` FOREIGN KEY (`Instructor_ID`) REFERENCES `instructors` (`ID`),
  ADD CONSTRAINT `instructors_mid_schedules_ibfk_2` FOREIGN KEY (`Schedule_ID`) REFERENCES `mid_schedules` (`ID`);

--
-- Constraints for table `meeting_rooms_reservations`
--
ALTER TABLE `meeting_rooms_reservations`
  ADD CONSTRAINT `meeting_rooms_reservations_ibfk_1` FOREIGN KEY (`Room_ID`) REFERENCES `meeting_rooms` (`ID`);

--
-- Constraints for table `mid_schedules`
--
ALTER TABLE `mid_schedules`
  ADD CONSTRAINT `mid_schedules_ibfk_1` FOREIGN KEY (`Room_ID`) REFERENCES `rooms` (`ID`),
  ADD CONSTRAINT `mid_schedules_ibfk_2` FOREIGN KEY (`Section_ID`) REFERENCES `sections` (`ID`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_2` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`ID`),
  ADD CONSTRAINT `sections_ibfk_3` FOREIGN KEY (`Instructor_ID`) REFERENCES `instructors` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
