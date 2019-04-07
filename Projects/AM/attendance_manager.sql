-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 05:18 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendance_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(30) NOT NULL,
  `admin_pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `student_id` varchar(30) NOT NULL,
  `subject_id` varchar(30) NOT NULL,
  `lectures_attended` int(10) NOT NULL,
  `lectures_bunked` int(10) NOT NULL,
  `total_lectures` int(10) NOT NULL,
  `percent` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`student_id`, `subject_id`, `lectures_attended`, `lectures_bunked`, `total_lectures`, `percent`) VALUES
('201', '301', 0, 0, 0, 0),
('201', '302', 0, 1, 1, 0),
('201', '303', 0, 0, 0, 0),
('201', '304', 0, 0, 0, 0),
('201', '305', 2, 0, 2, 100),
('201', '306', 0, 0, 0, 0),
('201', '307', 0, 0, 0, 0),
('201', '308', 0, 0, 0, 0),
('201', '309', 0, 0, 0, 0),
('202', '301', 0, 0, 0, 0),
('202', '302', 1, 0, 1, 100),
('202', '303', 0, 0, 0, 0),
('202', '304', 0, 0, 0, 0),
('202', '305', 2, 0, 2, 100),
('202', '306', 0, 0, 0, 0),
('202', '307', 0, 0, 0, 0),
('202', '308', 0, 0, 0, 0),
('202', '309', 0, 0, 0, 0),
('203', '301', 0, 0, 0, 0),
('203', '303', 0, 0, 0, 0),
('203', '304', 0, 0, 0, 0),
('203', '305', 1, 1, 2, 50),
('203', '306', 0, 0, 0, 0),
('203', '307', 0, 0, 0, 0),
('203', '308', 0, 0, 0, 0),
('203', '309', 0, 0, 0, 0),
('204', '301', 0, 0, 0, 0),
('204', '303', 0, 0, 0, 0),
('204', '304', 0, 0, 0, 0),
('204', '305', 1, 1, 2, 50),
('204', '306', 0, 0, 0, 0),
('204', '307', 0, 0, 0, 0),
('204', '308', 0, 0, 0, 0),
('204', '309', 0, 0, 0, 0),
('205', '301', 0, 0, 0, 0),
('205', '303', 0, 0, 0, 0),
('205', '304', 0, 0, 0, 0),
('205', '305', 2, 0, 2, 100),
('205', '306', 0, 0, 0, 0),
('205', '307', 0, 0, 0, 0),
('205', '308', 0, 0, 0, 0),
('205', '309', 0, 0, 0, 0),
('206', '301', 0, 0, 0, 0),
('206', '303', 0, 0, 0, 0),
('206', '304', 0, 0, 0, 0),
('206', '305', 2, 0, 2, 100),
('206', '306', 0, 0, 0, 0),
('206', '307', 0, 0, 0, 0),
('206', '308', 0, 0, 0, 0),
('206', '309', 0, 0, 0, 0),
('207', '301', 0, 0, 0, 0),
('207', '303', 0, 0, 0, 0),
('207', '304', 0, 0, 0, 0),
('207', '305', 1, 1, 2, 50),
('207', '306', 0, 0, 0, 0),
('207', '307', 0, 0, 0, 0),
('207', '308', 0, 0, 0, 0),
('207', '309', 0, 0, 0, 0),
('208', '301', 0, 0, 0, 0),
('208', '302', 0, 1, 1, 0),
('208', '303', 0, 0, 0, 0),
('208', '304', 0, 0, 0, 0),
('208', '305', 1, 1, 2, 50),
('208', '306', 0, 0, 0, 0),
('208', '307', 0, 0, 0, 0),
('208', '308', 0, 0, 0, 0),
('208', '309', 0, 0, 0, 0),
('209', '301', 0, 0, 0, 0),
('209', '302', 1, 0, 1, 100),
('209', '303', 0, 0, 0, 0),
('209', '304', 0, 0, 0, 0),
('209', '305', 1, 1, 2, 50),
('209', '306', 0, 0, 0, 0),
('209', '307', 0, 0, 0, 0),
('209', '308', 0, 0, 0, 0),
('209', '309', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` varchar(30) NOT NULL,
  `faculty_name` varchar(40) NOT NULL,
  `faculty_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_pass`) VALUES
('101', 'Nitin Choubey', '123'),
('102', 'Sachin Chavan', '123'),
('103', 'Pratiksha Mehram', '123'),
('104', 'Prashant Udawant', '123'),
('105', 'Ankit Jain', '123'),
('106', 'Anurag Joshi', '123'),
('107', 'Upendra Verma', '123'),
('108', 'Narendra Vishvakarma', '123'),
('109', 'Suraj Patil', '123'),
('110', 'Bhushan Inje', '123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` varchar(10) NOT NULL,
  `student_name` varchar(40) NOT NULL,
  `student_pass` varchar(30) NOT NULL,
  `student_rollno` varchar(10) NOT NULL,
  `batch_code` varchar(10) NOT NULL,
  `elective_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_pass`, `student_rollno`, `batch_code`, `elective_code`) VALUES
('201', 'Nishit Mehta', '123', 'B323', '1', '1'),
('202', 'Samraddhi Gupta', '123', 'B313', '1', '1'),
('203', 'Janhavi Vakil', '123', 'B353', '3', '2'),
('204', 'Kshitij Shah', '123', 'D602', '3', '2'),
('205', 'Akash Agrawal', '123', 'B302', '1', '3'),
('206', 'Shriya Mehra', '123', 'B322', '1', '2'),
('207', 'Paavan Patel', '123', 'B327', '2', '3'),
('208', 'Yash Garud', '123', 'B362', '3', '2'),
('209', 'Anukriti Rautela', '123', 'B331', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` varchar(10) NOT NULL,
  `subject_name` varchar(40) NOT NULL,
  `faculty_id` varchar(30) NOT NULL,
  `total_lectures` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `faculty_id`, `total_lectures`) VALUES
('301', 'Fundamentals Of Web Technology', '109', 0),
('302', 'Operational Research', '101', 1),
('303', 'Human Computer Interface', '106', 0),
('304', 'Principles of Compiler Design', '105', 0),
('305', 'Project Workshop', '104', 2),
('306', 'Industrial Economics and Management', '110', 0),
('307', 'MicroProcessors and Controllers', '103', 0),
('308', 'Theory Of Computer Science', '101', 0),
('309', 'Image Processing', '102', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `student_id` (`student_id`), ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`), ADD KEY `elective_code` (`elective_code`), ADD KEY `elective_code_2` (`elective_code`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`), ADD KEY `faculty_id` (`faculty_id`), ADD KEY `subject_id` (`subject_id`), ADD KEY `total_lectures` (`total_lectures`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
ADD CONSTRAINT `student_id_fk` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `subject_id_fk` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
ADD CONSTRAINT `subject_faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
