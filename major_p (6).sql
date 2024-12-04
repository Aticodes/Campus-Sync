-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 07:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `major_p`
--

-- --------------------------------------------------------

--
-- Table structure for table `aluminia`
--

CREATE TABLE `aluminia` (
  `al_id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `is_current` tinyint(1) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aluminia`
--

INSERT INTO `aluminia` (`al_id`, `s_id`, `company_name`, `position`, `start_date`, `end_date`, `is_current`, `description`) VALUES
(1, 1, 'Google', 'senior webdeveloper', '2023-11-09', '0000-00-00', 1, 'just a senior web developer ');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_master`
--

CREATE TABLE `attendance_master` (
  `a_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `takenon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_master`
--

INSERT INTO `attendance_master` (`a_id`, `t_id`, `e_id`, `status`, `takenon`) VALUES
(39, 15, 9, 'present', '08:45:50'),
(40, 15, 10, 'present', '08:45:50'),
(41, 15, 11, 'present', '08:45:50'),
(42, 15, 12, 'present', '08:45:50'),
(43, 21, 9, 'absent', '08:46:01'),
(44, 21, 10, 'present', '08:46:01'),
(45, 21, 11, 'present', '08:46:01'),
(46, 21, 12, 'present', '08:46:01'),
(47, 24, 9, 'present', '08:47:05'),
(48, 24, 10, 'present', '08:47:05'),
(49, 24, 11, 'present', '08:47:05'),
(50, 24, 12, 'present', '08:47:05'),
(51, 16, 9, 'present', '08:47:57'),
(52, 16, 10, 'absent', '08:47:57'),
(53, 16, 11, 'present', '08:47:57'),
(54, 16, 12, 'present', '08:47:57'),
(55, 23, 9, 'absent', '08:48:05'),
(56, 23, 10, 'present', '08:48:05'),
(57, 23, 11, 'absent', '08:48:05'),
(58, 23, 12, 'present', '08:48:05'),
(59, 19, 9, 'present', '08:48:13'),
(60, 19, 10, 'absent', '08:48:13'),
(61, 19, 11, 'present', '08:48:13'),
(62, 19, 12, 'absent', '08:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `batch_master`
--

CREATE TABLE `batch_master` (
  `batch_id` int(11) NOT NULL,
  `batch_name` varchar(255) DEFAULT NULL,
  `batch_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch_master`
--

INSERT INTO `batch_master` (`batch_id`, `batch_name`, `batch_year`) VALUES
(17, '2023-2027', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `class_master`
--

CREATE TABLE `class_master` (
  `class_id` int(11) NOT NULL,
  `class_name` text NOT NULL,
  `batch_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_master`
--

INSERT INTO `class_master` (`class_id`, `class_name`, `batch_id`, `course_id`) VALUES
(26, 'Btech Div-A', 17, 8);

-- --------------------------------------------------------

--
-- Table structure for table `comapny_master`
--

CREATE TABLE `comapny_master` (
  `name` varchar(255) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact_person` varchar(150) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comapny_master`
--

INSERT INTO `comapny_master` (`name`, `address`, `contact_person`, `contact_no`, `email`, `company_id`, `user_id`) VALUES
('amit@gmail.com', 'san fransisco', 'amit ', 789456215, 'amit@gmail.com', 2, 3),
('juzar@gmail.com', 'c-1234, lal baadjaskl', 'jsklfdjskj', 2147483647, 'ssdfsfs@gmail.com', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `years` text NOT NULL,
  `createdon` date NOT NULL,
  `createdby` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `c_name`, `years`, `createdon`, `createdby`, `d_id`) VALUES
(8, 'BTech', '4', '2024-03-29', 1, 2),
(9, 'MTech', '2', '2024-03-29', 1, 2),
(10, 'BCA', '3', '2024-03-30', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `createdon` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`, `createdon`, `status`) VALUES
(1, 'Computer Science ', '2027-01-21', 1),
(2, 'Engineering', '2024-02-22', 1),
(4, 'Information Technology', '2024-03-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrollement_master`
--

CREATE TABLE `enrollement_master` (
  `e_id` int(11) NOT NULL,
  `e_number` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `status` varchar(70) NOT NULL,
  `joined_on` date NOT NULL,
  `completed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollement_master`
--

INSERT INTO `enrollement_master` (`e_id`, `e_number`, `student_id`, `course_id`, `class_id`, `status`, `joined_on`, `completed`) VALUES
(9, 0, 1, 8, 26, '1', '2024-03-30', '0000-00-00'),
(10, 0, 3, 8, 26, '1', '2024-03-30', '0000-00-00'),
(11, 0, 4, 8, 26, '1', '2024-03-30', '0000-00-00'),
(12, 0, 5, 8, 26, '1', '2024-03-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `examschedule_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `date` text NOT NULL,
  `ps_id` int(11) NOT NULL,
  `time` text NOT NULL,
  `room` text DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`examschedule_id`, `exam_id`, `date`, `ps_id`, `time`, `room`, `status`) VALUES
(6, 6, '2024-03-30', 3, '13:20', '2', 1),
(7, 6, '2024-04-01', 4, '13:20', '2', 1),
(8, 6, '2024-04-02', 5, '13:20', '2', 1),
(9, 6, '2024-04-03', 6, '13:20', '2', 1),
(10, 7, '2024-04-15', 3, '12:00', '2', 1),
(11, 7, '2024-04-16', 4, '12:00', '2', 1),
(12, 7, '2024-04-17', 5, '12:00', '2', 1),
(13, 7, '2024-04-18', 6, '12:00', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_table`
--

CREATE TABLE `exam_table` (
  `exam_id` int(11) NOT NULL,
  `e_name` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `done` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_table`
--

INSERT INTO `exam_table` (`exam_id`, `e_name`, `course_id`, `class_id`, `sem`, `done`) VALUES
(6, 'First Internals ', 8, 26, 1, 2),
(7, 'Sem2', 8, 26, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fees_master`
--

CREATE TABLE `fees_master` (
  `fees_name` text NOT NULL,
  `fees_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duedate` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_master`
--

INSERT INTO `fees_master` (`fees_name`, `fees_id`, `department_id`, `course_id`, `batch_id`, `sem`, `amount`, `duedate`, `status`) VALUES
('Internals ', 1, 1, 1, 1, 2, 150000, '2024-03-04', 1),
('SEM-6', 2, 1, 1, 1, 3, 1560, '2024-03-02', 1),
('extra course ', 3, 1, 1, 1, 4, 600, '2024-03-30', 1),
('Internals ', 4, 1, 1, 1, 1, 1200, '2024-03-24', 1),
('extra course ', 5, 4, 3, 1, 3, 7500, '2024-03-28', 1),
('extra course ', 6, 2, 6, 2, 1, 15000, '2024-03-28', 1),
('extra course ', 7, 2, 8, 17, 1, 15000, '2024-04-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hackathon`
--

CREATE TABLE `hackathon` (
  `hack_id` int(11) NOT NULL,
  `hack_name` varchar(30) NOT NULL,
  `max_part` int(11) NOT NULL,
  `teamorind` varchar(100) NOT NULL,
  `mode` varchar(10) DEFAULT NULL,
  `about_hack` varchar(100) NOT NULL,
  `cover_imge` text DEFAULT NULL,
  `rep_uni` varchar(20) DEFAULT NULL,
  `fees` int(11) NOT NULL,
  `app_start` date NOT NULL,
  `app_end` date NOT NULL,
  `hack_start` date NOT NULL,
  `hack_end` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `brochure` text DEFAULT NULL,
  `result` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hack_participation`
--

CREATE TABLE `hack_participation` (
  `hp_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `hackathon_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `mark_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `examschedule_id` int(11) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mark_id`, `e_id`, `examschedule_id`, `uploaded_by`, `mark`, `status`) VALUES
(1, 1, 1, 1, 25, 1),
(2, 1, 1, 1, 25, 1),
(3, 1, 1, 1, 90, 1),
(4, 1, 1, 1, 90, 1),
(5, 1, 1, 1, 85, 1),
(6, 1, 1, 1, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes_master`
--

CREATE TABLE `notes_master` (
  `n_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `subject_id` int(11) NOT NULL,
  `link` text NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes_master`
--

INSERT INTO `notes_master` (`n_id`, `name`, `subject_id`, `link`, `uploaded_by`, `d_id`) VALUES
(6, 'chapater2', 9, 'notes/05,04,241712300362bipahsa.pdf', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `notification_from` int(11) NOT NULL,
  `notification_to` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payement_master`
--

CREATE TABLE `payement_master` (
  `payement_id` int(11) NOT NULL,
  `fees_id` int(11) NOT NULL,
  `enrollement_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_id` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payement_master`
--

INSERT INTO `payement_master` (`payement_id`, `fees_id`, `enrollement_id`, `amount`, `transaction_id`, `status`, `date`, `method`) VALUES
(1, 1, 1, 15000, '0', 1, '2024-03-06', 'online'),
(2, 4, 1, 15000, '0', 1, '2024-03-06', 'online'),
(3, 1, 1, 15000, 'pay_NqUyHwyuF5sxYr', 1, '2024-03-25', 'online'),
(4, 1, 1, 15000, 'pay_NsV7thTGmYNxX5', 1, '2024-03-30', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `placement_application`
--

CREATE TABLE `placement_application` (
  `application_id` int(11) NOT NULL,
  `enrollement_id` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `file` text DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placement_application`
--

INSERT INTO `placement_application` (`application_id`, `enrollement_id`, `placement_id`, `file`, `status`) VALUES
(1, 1, 2, 'cv/Readme.txt', 2),
(2, 1, 3, 'cv/Readme.txt', 0),
(3, 1, 5, 'cv/carrental.sql', 0),
(4, 9, 7, 'CAMPUSSYNCfortu.pdf', 0),
(5, 9, 7, 'CAMPUS SYNCfor utu.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `placement_master`
--

CREATE TABLE `placement_master` (
  `placement_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `apply_start` date NOT NULL,
  `apply_end` date NOT NULL,
  `type` text NOT NULL,
  `eligibility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placement_master`
--

INSERT INTO `placement_master` (`placement_id`, `company_id`, `p_name`, `apply_start`, `apply_end`, `type`, `eligibility`) VALUES
(5, 1, 'Amount', '2024-03-01', '2024-03-22', '3', 1),
(6, 2, 'Amount', '2024-03-01', '2024-03-22', '3', 1),
(7, 2, 'Summer Internship', '2024-03-30', '2024-04-30', '1', 8);

-- --------------------------------------------------------

--
-- Table structure for table `professor_master`
--

CREATE TABLE `professor_master` (
  `professor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_firstname` varchar(255) NOT NULL,
  `p_lastname` varchar(255) NOT NULL,
  `phoneno` varchar(12) NOT NULL,
  `address1` text NOT NULL,
  `dob` date NOT NULL,
  `j_date` date NOT NULL,
  `field_of_expertise` varchar(150) DEFAULT NULL,
  `experience` varchar(10) DEFAULT NULL,
  `previously_job` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `e_phone` varchar(12) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `blood_group` varchar(15) NOT NULL,
  `d_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor_master`
--

INSERT INTO `professor_master` (`professor_id`, `user_id`, `p_firstname`, `p_lastname`, `phoneno`, `address1`, `dob`, `j_date`, `field_of_expertise`, `experience`, `previously_job`, `image`, `type`, `e_phone`, `sex`, `blood_group`, `d_id`) VALUES
(1, 1, 'juzar', 'kagdi', '1234567895', 'jahsjdh', '2003-12-08', '2020-08-18', 'ai', '3', 'none ', 'professorid/22,03,241711101794Screenshot (5).png', 2, '45645645645', 'Female', 'b+', 2),
(2, 11, 'Meghna ', 'Shukla', '7894561235', 'bharuch ', '2023-09-06', '2024-03-15', 'Machine Learning ', '5', 'Narmada', 'professorid/22,03,241711101794Screenshot (5).png', 1, '45645645645', 'Female', 'b+', NULL),
(3, 12, 'Prachi ', 'Raol', '1234567895', 'bharuch ', '2004-08-18', '2023-05-18', 'AI', '3', 'Parul university', 'professorid/22,03,241711101794Screenshot (5).png', 1, '7894565289', 'Female', 'b+', NULL),
(4, 16, 'Bipasa', 'Rana', '7894561235', 'Shaktinath , Bharuch ', '2010-10-07', '2024-03-27', 'Machine Learning ', '3', 'Narmada College', 'professorid/hel.jpeg', 1, '5689456235', 'Male', 'b+', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `professor_subject`
--

CREATE TABLE `professor_subject` (
  `ps_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `assign_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor_subject`
--

INSERT INTO `professor_subject` (`ps_id`, `p_id`, `s_id`, `assign_by`, `status`) VALUES
(3, 4, 10, 1, 1),
(4, 1, 8, 1, 1),
(5, 2, 9, 1, 1),
(6, 3, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `query_master`
--

CREATE TABLE `query_master` (
  `query_id` int(11) NOT NULL,
  `query_to` int(11) NOT NULL,
  `query_from` int(11) NOT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `message` text NOT NULL,
  `answer` text DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query_master`
--

INSERT INTO `query_master` (`query_id`, `query_to`, `query_from`, `subject`, `message`, `answer`, `status`) VALUES
(167, 1, 1, NULL, 'asdadasda', NULL, 1),
(168, 1, 1, NULL, 'sdasdsa', NULL, 1),
(169, 1, 1, NULL, 'asas', NULL, 1),
(170, 1, 1, NULL, 'likftrdr', NULL, 1),
(171, 1, 1, NULL, '', 'ggg', 1),
(172, 0, 1, NULL, 'hellooo', NULL, 1),
(173, 0, 1, NULL, 'hellooo', NULL, 1),
(174, 0, 1, NULL, 'hellooo', NULL, 1),
(175, 4, 1, NULL, 'hfggh', NULL, 1),
(176, 4, 1, NULL, 'How Are You', NULL, 1),
(177, 4, 1, NULL, '', 'yess for sure ', 1),
(178, 4, 1, NULL, '', 'what about you ', 1),
(179, 4, 1, NULL, 'sfds', NULL, 1),
(180, 4, 1, NULL, 'Hello HOw are yu ', NULL, 1),
(181, 4, 1, NULL, '', 'i am fine how about you', 1),
(182, 1, 1, NULL, '', 'hfsjkdf', 1),
(183, 1, 1, NULL, '', 'hfsjkdf', 1),
(184, 1, 1, NULL, '', 'hfsjkdf', 1),
(185, 1, 1, NULL, '', 'hfsjkdf', 1),
(186, 2, 1, NULL, '', 'yess for sure ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `s_firstname` varchar(150) NOT NULL,
  `s_lastname` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `phone_no` varchar(12) NOT NULL,
  `father_name` varchar(150) DEFAULT NULL,
  `mother_name` varchar(150) DEFAULT NULL,
  `father_phone` varchar(12) NOT NULL,
  `admission_date` date NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`student_id`, `user_id`, `s_firstname`, `s_lastname`, `dob`, `address1`, `address2`, `phone_no`, `father_name`, `mother_name`, `father_phone`, `admission_date`, `blood_group`, `sex`, `remarks`, `img`) VALUES
(1, 4, 'juzar', 'kagdi', '2003-08-18', 'c-1520 , lala bazaar', 'rajput street ', '7984915566', 'mohammed ', 'banu', '9856321475', '2024-02-27', 'b+', 'Male', 'none', 'studentid/images.jpeg'),
(3, 5, 'Nirmit', 'Pujara', '2017-03-09', 'ONGC , Dahej Bypass', 'Surat', '8975463259', 'Chintan Patel', 'Vanita patel', '9876543210', '2024-03-22', 'b+', 'Male', 'nothing', '../admin/studentid/09,03,2417099728136_20240227_232932_0005.png'),
(4, 7, 'Atiya', 'Kharwa', '2002-06-15', 'Ankleshwar ', 'bharuch ', '7894561235', 'mohammed', 'asma ', '7894562135', '2024-03-15', 'b+', 'Female', 'Sahil', 'studentid/15,03,241710481027ist.jpg'),
(5, 8, 'shradhha', 'pujara', '2003-07-11', 'Bholav', 'bharuch ', '7894561235', 'sumit ', 'kunj', '7894561235', '2024-03-15', 'a-', 'Male', 'sa', 'studentid/15,03,24171048109610,10,231696953135logo-removebg-preview (1).png'),
(6, 17, 'Dhyey', 'berawala', '2002-04-10', 'Shaktinath , Bharuch ', 'bharuch ', '7894561235', 'mohammed', 'banu', '7894561235', '2024-04-07', 'b+', 'Female', '', 'studentid/07,04,241712508528WhatsApp Image 2024-02-01 at 11.56.52_577577dd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credit` int(11) DEFAULT NULL,
  `c_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `credit`, `c_id`, `year`, `sem`) VALUES
(8, 'DSA', 9, 8, 1, 1),
(9, 'JAVA', 9, 8, 1, 1),
(10, 'WEB DESIGNING', 7, 8, 1, 1),
(11, 'Software Testing', 10, 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `t_id` int(11) NOT NULL,
  `ps_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `time` text NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `remarks` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`t_id`, `ps_id`, `class_id`, `time`, `room_no`, `remarks`, `date`, `status`) VALUES
(15, 4, 26, '7.30', '2', '', '2024-04-02', 2),
(16, 5, 26, '8.30', '2', '', '2024-04-03', 2),
(17, 3, 26, '9.30', '2', '', '2024-04-02', 1),
(18, 6, 26, '10.30', '2', '', '2024-03-14', 1),
(19, 5, 26, '7.30', '2', '', '2024-04-02', 2),
(20, 6, 26, '8.30', '2', '', '2024-03-15', 1),
(21, 4, 26, '8.30', '2', '', '2024-03-16', 2),
(22, 3, 26, '9.30', '2', '', '2024-03-16', 1),
(23, 5, 26, '10.30', '5', '', '2024-03-16', 2),
(24, 4, 26, '7.30', '2', '', '2024-03-21', 2),
(25, 3, 26, '8.30', '2', '', '2021-03-21', 1),
(26, 6, 26, '11.30', '5', '', '2024-03-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `username`, `password`, `type`) VALUES
(1, 'mohammedkagdi68@gmail.com', '123456', 2),
(2, 'cyberjuzar@gmail.com', '123456', 1),
(3, 'company@gmail.com', '123456', 4),
(4, 'student@gmail.com', '123456', 3),
(5, 'pujaranirmit@gmail.com', '123456', 3),
(6, 'admin@gmail.com', '123456', 2),
(7, 'atiyakharwa@gmail.com', '2002-06-15', 3),
(8, 'shradha@gmail.com', '123456', 3),
(11, 'professor@gmail.com', '123456', 2),
(12, 'dd@gmail.com', '123456', 2),
(13, 'ssdfsfs@gmail.com', '123456', 4),
(16, 'bipasa@gmail.com', '123456', 2),
(17, 'berawaladhey@gmail.com', '123456', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluminia`
--
ALTER TABLE `aluminia`
  ADD PRIMARY KEY (`al_id`);

--
-- Indexes for table `attendance_master`
--
ALTER TABLE `attendance_master`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `batch_master`
--
ALTER TABLE `batch_master`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `class_master`
--
ALTER TABLE `class_master`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `comapny_master`
--
ALTER TABLE `comapny_master`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `enrollement_master`
--
ALTER TABLE `enrollement_master`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`examschedule_id`);

--
-- Indexes for table `exam_table`
--
ALTER TABLE `exam_table`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `fees_master`
--
ALTER TABLE `fees_master`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `hackathon`
--
ALTER TABLE `hackathon`
  ADD PRIMARY KEY (`hack_id`);

--
-- Indexes for table `hack_participation`
--
ALTER TABLE `hack_participation`
  ADD PRIMARY KEY (`hp_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `notes_master`
--
ALTER TABLE `notes_master`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `payement_master`
--
ALTER TABLE `payement_master`
  ADD PRIMARY KEY (`payement_id`);

--
-- Indexes for table `placement_application`
--
ALTER TABLE `placement_application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `placement_master`
--
ALTER TABLE `placement_master`
  ADD PRIMARY KEY (`placement_id`);

--
-- Indexes for table `professor_master`
--
ALTER TABLE `professor_master`
  ADD PRIMARY KEY (`professor_id`);

--
-- Indexes for table `professor_subject`
--
ALTER TABLE `professor_subject`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `query_master`
--
ALTER TABLE `query_master`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluminia`
--
ALTER TABLE `aluminia`
  MODIFY `al_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_master`
--
ALTER TABLE `attendance_master`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `batch_master`
--
ALTER TABLE `batch_master`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `class_master`
--
ALTER TABLE `class_master`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comapny_master`
--
ALTER TABLE `comapny_master`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enrollement_master`
--
ALTER TABLE `enrollement_master`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `examschedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exam_table`
--
ALTER TABLE `exam_table`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fees_master`
--
ALTER TABLE `fees_master`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hackathon`
--
ALTER TABLE `hackathon`
  MODIFY `hack_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hack_participation`
--
ALTER TABLE `hack_participation`
  MODIFY `hp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notes_master`
--
ALTER TABLE `notes_master`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payement_master`
--
ALTER TABLE `payement_master`
  MODIFY `payement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `placement_application`
--
ALTER TABLE `placement_application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `placement_master`
--
ALTER TABLE `placement_master`
  MODIFY `placement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `professor_master`
--
ALTER TABLE `professor_master`
  MODIFY `professor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `professor_subject`
--
ALTER TABLE `professor_subject`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `query_master`
--
ALTER TABLE `query_master`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `student_master`
--
ALTER TABLE `student_master`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
