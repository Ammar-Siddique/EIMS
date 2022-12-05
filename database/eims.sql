-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 08:41 AM
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
-- Database: `eims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `a_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`a_id`, `name`, `phone_no`, `address`, `email`, `password`, `dt`) VALUES
(3, 'Atif Tahir', '03132024793', 'Fast', 'atiftahir@gmail.com', 'fast', '2022-12-04 23:54:08'),
(4, 'Abdul Saeed', '03132024791', 'fast', 'abdulsaeed@fast.com', 'fast', '2022-12-04 23:56:27'),
(5, 'Ahmed', '03132024792', 'fast', 'ahmed@fast.com', 'fast', '2022-12-04 23:56:59'),
(6, 'Ali', '03132024794', 'fast', 'Ali@fast.com', 'fast', '2022-12-04 23:57:35'),
(7, 'Amin', '03132024795', 'fast', 'amin@fast.com', 'fast', '2022-12-04 23:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(6) NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
('CS3001', 'OOP'),
('CS3002', 'DB'),
('CS3003', 'DS'),
('CS3004', 'OS'),
('CS3005', 'PF'),
('CS3008', 'COAL');

-- --------------------------------------------------------

--
-- Table structure for table `course_feedback`
--

CREATE TABLE `course_feedback` (
  `Sr. no` int(4) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_feedback`
--

INSERT INTO `course_feedback` (`Sr. no`, `roll_no`, `course_id`, `feedback`) VALUES
(3, '20k0356', 'CS3001', 'Good course.'),
(4, '20k0356', 'CS3002', 'bad course.'),
(6, '20k0415', 'CS3001', 'very good course.'),
(7, '20k0415', 'CS3004', 'good teacher'),
(8, '20k0415', 'CS3005', 'bad teacher');

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `id` int(3) NOT NULL,
  `designation` text NOT NULL,
  `description` text NOT NULL,
  `salary` int(7) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`id`, `designation`, `description`, `salary`, `dt`) VALUES
(4, 'assistant lecturer', 'very good lecturer', 10000, '2022-12-04 11:47:00'),
(5, 'assistant lecturer', 'VERY very good lecturer', 10000, '2022-12-04 19:28:36'),
(6, 'assistant lecturer', 'VERY very BAD lecturer', 5000, '2022-12-04 19:30:17'),
(7, 'admin', 'good admin', 100000, '2022-12-04 19:31:09'),
(8, 'security guard', 'good guard', 200000, '2022-12-04 19:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `roll_no` varchar(10) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `obtained_marks` int(2) NOT NULL,
  `total_marks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`roll_no`, `course_id`, `obtained_marks`, `total_marks`) VALUES
('20k0000', 'CS3003', 0, 0),
('20k0000', 'CS3004', 0, 0),
('20k0002', 'CS3005', 0, 0),
('20k0296', 'CS3005', 0, 0),
('20k0356', 'CS3002', 51, 100),
('20k0415', 'CS3001', 90, 100),
('20k0415', 'CS3004', 69, 100),
('20k0415', 'CS3005', 40, 100);

-- --------------------------------------------------------

--
-- Table structure for table `students_courses`
--

CREATE TABLE `students_courses` (
  `roll_no` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_courses`
--

INSERT INTO `students_courses` (`roll_no`, `course_id`) VALUES
('20k0000', 'CS3003'),
('20k0000', 'CS3004'),
('20k0002', 'CS3005'),
('20k0296', 'CS3005'),
('20k0356', 'CS3002'),
('20k0415', 'CS3001'),
('20k0415', 'CS3004'),
('20k0415', 'CS3005');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `attendance_id` int(11) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`attendance_id`, `roll_no`, `attendance`, `course_id`, `date`) VALUES
(8, '20k0356', 1, 'CS3001', '04-12-22'),
(9, '20k0415', 0, 'CS3001', '04-12-22'),
(10, '20k0356', 1, 'CS3002', '04-12-22'),
(11, '20k0415', 0, 'CS3005', '04-12-22'),
(12, '20k0415', 1, 'CS3004', '04-12-22'),
(13, '20k0356', 1, 'CS3001', '05-12-22'),
(14, '20k0415', 0, 'CS3001', '05-12-22'),
(15, '20k0356', 1, 'CS3001', '05-12-22'),
(16, '20k0415', 0, 'CS3001', '05-12-22'),
(17, '20k0356', 0, 'CS3001', '05-12-22'),
(18, '20k0415', 0, 'CS3001', '05-12-22'),
(19, '20k0000', 1, 'CS3004', '05-12-22'),
(20, '20k0415', 1, 'CS3004', '05-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `roll_no` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `department` varchar(25) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`roll_no`, `name`, `department`, `date_of_birth`, `address`, `phone_no`, `password`, `dt`) VALUES
('20k0000', 'ammar', 'cs', '2022-12-01', 'fast', '03132024793', '5502a4d218db4c3545023d9b80d69d9e', '2022-12-05 00:09:59'),
('20k0001', 'ghouri', 'cs', '2022-12-06', 'fast', '03132024791', 'a346d8f5e7939ca502f54dc15e785aed', '2022-12-05 00:10:22'),
('20k0002', 'sher', 'cs', '2022-12-01', 'fast', '03132024792', 'd9ba90b5ee592f9f74607611e2a9b40c', '2022-12-05 10:07:52'),
('20k0296', 'haiman', 'cs', '2022-12-01', 'fast', '03132024794', 'db10f95686f9dca741cfd00232b6b21d', '2022-12-05 00:08:29'),
('20k0356', 'Ahad', 'cs', '2022-12-08', 'fast', '03132024795', '8775dfc34356cf9a9ef72cda32ec5f3d', '2022-12-05 00:06:28'),
('20k0415', 'zaki', 'cs', '2022-11-30', 'fast', '03132024796', 'ea6764a2c3ae29ef31275cf11a628666', '2022-12-05 00:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `id` int(3) NOT NULL,
  `T_id` varchar(10) NOT NULL,
  `attendance` int(1) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`id`, `T_id`, `attendance`, `date`) VALUES
(10, '11', 1, '04-12-22'),
(11, '12', 1, '04-12-22'),
(12, '20', 0, '04-12-22'),
(13, '21', 1, '04-12-22'),
(14, '22', 0, '04-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `T_id` varchar(10) NOT NULL,
  `T_name` text NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `salary` int(7) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`T_id`, `T_name`, `phone_no`, `address`, `salary`, `password`) VALUES
('11', 'Amin', '03132024794', 'fast', 20000, '6512bd43d9caa6e02c990b0a82652dca'),
('12', 'Musawar', '03132024792', 'fast', 50000, 'c20ad4d76fe97759aa27a0c99bff6710'),
('20', 'Hajra', '03132024791', 'fast', 60000, '98f13708210194c475687be6106a3b84'),
('21', 'Sadiq', '03132024793', 'fast', 10000, '3c59dc048e8850243be8079a5c74d079'),
('22', 'Ali', '03132024795', 'fast', 5000, 'b6d767d2f8ed5d21a44b0e5886680cb9'),
('69', 'ammar', '03034567891', 'fast', 5, '14bfa6bb14875e45bba028a21ed38046');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_no` int(5) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `fees` int(7) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`voucher_no`, `roll_no`, `fees`, `status`) VALUES
(13, '20k0356', 18000, 'Unpaid'),
(14, '20k0415', 26000, 'Unpaid'),
(15, '20k0296', 10000, 'Unpaid'),
(28, '20k0000', 18000, 'Unpaid'),
(29, '20k0002', 10000, 'Unpaid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_feedback`
--
ALTER TABLE `course_feedback`
  ADD PRIMARY KEY (`Sr. no`),
  ADD KEY `course_feedback_ibfk_1` (`roll_no`),
  ADD KEY `course_feedback_ibfk_2` (`course_id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`roll_no`,`course_id`),
  ADD KEY `marks_ibfk_2` (`course_id`);

--
-- Indexes for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD PRIMARY KEY (`roll_no`,`course_id`),
  ADD KEY `students_courses_ibfk_2` (`course_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_attendance_ibfk_1` (`roll_no`),
  ADD KEY `student_attendance_ibfk_2` (`course_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`roll_no`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `phone_no_2` (`phone_no`),
  ADD UNIQUE KEY `phone_no_3` (`phone_no`),
  ADD UNIQUE KEY `phone_no_4` (`phone_no`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `T_id` (`T_id`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`T_id`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_no`),
  ADD KEY `roll_no` (`roll_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_feedback`
--
ALTER TABLE `course_feedback`
  MODIFY `Sr. no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_feedback`
--
ALTER TABLE `course_feedback`
  ADD CONSTRAINT `course_feedback_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `student_info` (`roll_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_feedback_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `student_info` (`roll_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD CONSTRAINT `students_courses_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `student_info` (`roll_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `student_info` (`roll_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_attendance_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD CONSTRAINT `teacher_attendance_ibfk_1` FOREIGN KEY (`T_id`) REFERENCES `teacher_info` (`T_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `student_info` (`roll_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
