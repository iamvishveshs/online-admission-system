-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 10:43 AM
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
-- Database: `onlineadmissionsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_details`
--

CREATE TABLE `address_details` (
  `applicant_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `district` text NOT NULL,
  `state` text NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_details`
--

INSERT INTO `address_details` (`applicant_id`, `address`, `district`, `state`, `pincode`) VALUES
(18, 'Himachal pradesh', 'Mandi', 'Himachal Pradesh', 175024),
(19, 'xyz', 'Mandi', 'Himachal Pradesh', 175022),
(25, 'Talaoo', 'Mandi', 'Himachal Pradesh', 175024),
(26, 'sarkaghat', 'Mandi', 'Himachal Pradesh', 175024),
(27, 'ghumarwin', 'Bilaspur', 'Himachal Pradesh', 175023),
(28, 'Talaoo', 'Mandi', 'Himachal Pradesh', 175024),
(30, 'Vill talaw, po fatehpur,teh sarkaghat,distt mandi', 'NDAKSD', 'Himachal Pradesh', 175024),
(32, 'sarkaghat', 'Mandi', 'Himachal Pradesh', 175024),
(33, 'talaoo', 'Mandi', 'Himachal Pradesh', 175024),
(34, 'Talaoo', 'Mandi', 'Himachal Pradesh', 175024),
(35, 'Himachal pradesh', 'Bilaspur', 'Himachal Pradesh', 175024),
(36, 'Vill talaoo po fatehpur teh sarkaghat', 'Mandi', 'Himachal Pradesh', 175024),
(41, 'vcxvc cxbxc xcbc ', 'XXXX', 'Haryana', 456789),
(42, 'Baloh', 'Bilaspur', 'Himachal Pradesh', 174001),
(43, 'mandi', 'Mandi', 'Himachal Pradesh', 177001);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_personal_details`
--

CREATE TABLE `applicant_personal_details` (
  `applicant_id` int(11) NOT NULL,
  `gender` enum('male','female','others','') NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_contact` varchar(20) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `religion` enum('hindu','muslim','sikh','christian','buddhist','jain') NOT NULL,
  `category` enum('general','obc','sc','st') NOT NULL,
  `sub_category` enum('unreserved','ews') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_personal_details`
--

INSERT INTO `applicant_personal_details` (`applicant_id`, `gender`, `date_of_birth`, `contact_no`, `father_name`, `father_contact`, `mother_name`, `religion`, `category`, `sub_category`) VALUES
(18, 'female', '2010-12-09', '9876123450', 'Rajkumar', '9865743210', 'Sandhya Devi', 'hindu', 'general', 'unreserved'),
(19, 'male', '2005-12-10', '9876543210', 'Rajiv Bhardwaj', '1234567890', 'Sandhya Bhardwaj', 'hindu', 'sc', 'unreserved'),
(25, 'female', '1996-11-02', '09459331009', 'Rajkumar', '09857488580', 'Himi Devi', 'hindu', 'general', 'unreserved'),
(26, 'male', '2005-12-02', '789231650', 'Satish Chandel', '789542310', 'seema devi', 'hindu', 'general', 'unreserved'),
(27, 'male', '2005-04-09', '9872345610', 'Rajkumar', '9418405979', 'Himi Devi', 'hindu', 'general', 'unreserved'),
(28, 'male', '2004-02-09', '0987654321', 'Rahul', '0897564321', 'Sweta', 'hindu', 'obc', 'unreserved'),
(30, '', '0002-12-09', '12355546768', 'vdscsd', '12233254576', 'dfvgvd', 'buddhist', 'general', 'ews'),
(32, 'male', '2009-07-06', '987654334', 'Rajkumar', '9856743210', 'Sandhya Bhardwaj', 'hindu', 'general', 'ews'),
(33, 'male', '2003-08-04', '9459331509', 'Vishvesh', '9857456580', 'Himi Devi', 'hindu', 'general', 'unreserved'),
(34, 'female', '2010-12-09', '5678943210', 'Vishvesh', '6789054321', 'Sandhya', 'muslim', 'sc', 'ews'),
(35, '', '2010-12-09', '9845673210', 'vcxvx', '2367458901', 'khdfkjsdhkf', 'hindu', 'st', 'ews'),
(36, 'male', '2007-10-04', '8628957590', 'Himmat ram', '8628857580', 'Sandhya Devi', 'hindu', 'general', 'unreserved'),
(41, 'male', '2004-03-23', '7890123456', 'Rajiv Sharma', '6789012345', 'Shalini Sharma', 'hindu', 'general', 'unreserved'),
(42, 'male', '2002-05-31', '8628957655', 'Rajiv Sharma', '5678912340', 'Shalini Sharma', 'hindu', 'general', 'unreserved'),
(43, 'male', '2006-09-03', '8967523410', 'shashvat', '8894035678', 'shreya', 'hindu', 'sc', 'unreserved');

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

CREATE TABLE `application_status` (
  `user_id` int(11) NOT NULL,
  `status` enum('success','almost','partial') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_status`
--

INSERT INTO `application_status` (`user_id`, `status`, `date`) VALUES
(18, 'success', '2022-11-01 09:46:08'),
(19, 'success', '2022-11-01 07:06:33'),
(25, 'partial', '2022-11-01 10:22:11'),
(26, 'success', '2022-11-02 02:21:35'),
(27, 'almost', '2022-11-03 06:44:47'),
(28, 'success', '2022-12-12 18:31:16'),
(30, 'success', '2022-12-12 18:30:55'),
(32, 'success', '2022-12-06 06:17:33'),
(33, 'success', '2022-12-12 18:30:50'),
(34, 'success', '2022-12-13 06:52:50'),
(35, 'success', '2022-12-18 07:25:05'),
(36, 'success', '2022-12-18 12:44:38'),
(41, 'almost', '2024-07-10 10:59:56'),
(42, 'success', '2024-08-20 13:35:43'),
(43, 'success', '2024-08-28 18:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_id`, `college_name`) VALUES
(10, 'ABVGIET Polytechnic Pragtinagar'),
(19, 'Devasya Polytechnic Hamirpur'),
(6, 'Dr. B. R. Ambedkar Govt. Polytechnic Ambota'),
(20, 'Dreamz Polytechnic Sundernagar'),
(7, 'Govt. Millenium Polytechnic Chamba'),
(12, 'Govt. Polytechnic Bilaspur'),
(4, 'Govt. Polytechnic for Women Kandaghat'),
(2, 'Govt. Polytechnic Hamirpur'),
(5, 'Govt. Polytechnic Kangra'),
(11, 'Govt. Polytechnic Kinnaur'),
(15, 'Govt. Polytechnic Kullu'),
(14, 'Govt. Polytechnic Paonta Sahib'),
(3, 'Govt. Polytechnic Rohru'),
(1, 'Govt. Polytechnic Sundernagar'),
(9, 'Govt. Polytechnic Talwar (Jaisinghpur)'),
(13, 'Govt. Polytechnic Udaipur'),
(16, 'Green Hills Polytechnic Kumarhatti'),
(17, 'Himalayan Polytechnic Kala Amb'),
(18, 'K.C.Polytechnic Una'),
(23, 'L.R. Polytechnic Solan'),
(8, 'Rajiv Gandhi Govt. Polytechnic   Banikhet'),
(22, 'Shivalik Polytechnic Haroli'),
(21, 'SIRDA Polytechnic Naulakha');

-- --------------------------------------------------------

--
-- Table structure for table `college_preferences`
--

CREATE TABLE `college_preferences` (
  `applicant_id` int(11) NOT NULL,
  `first_preference` int(11) NOT NULL,
  `second_preference` int(11) NOT NULL,
  `third_preference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college_preferences`
--

INSERT INTO `college_preferences` (`applicant_id`, `first_preference`, `second_preference`, `third_preference`) VALUES
(18, 7, 1, 2),
(19, 2, 1, 5),
(26, 1, 2, 6),
(27, 2, 1, 3),
(28, 5, 1, 2),
(30, 13, 19, 15),
(32, 1, 2, 12),
(33, 1, 2, 5),
(34, 2, 3, 1),
(35, 3, 10, 2),
(36, 3, 7, 12),
(41, 12, 2, 1),
(42, 2, 12, 1),
(43, 8, 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
(1, 'Computer Engineering'),
(2, 'Information Technology'),
(3, 'Electrical Engineering'),
(4, 'Agriculture Engineering'),
(5, 'Electronics and Communication Engineering'),
(6, 'Civil Engineering'),
(7, 'Mechanical Engineering'),
(8, 'Automobile Engineering'),
(9, 'Instrumentation Engineering'),
(10, 'Electrical & Electronics Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`) VALUES
(1, 'Bilaspur'),
(2, 'Chamba'),
(3, 'Hamirpur'),
(4, 'Kangra'),
(5, 'Kinnaur'),
(6, 'Kullu'),
(7, 'Lahul & Spiti'),
(8, 'Mandi'),
(9, 'Shimla'),
(10, 'Sirmaur'),
(11, 'Solan'),
(12, 'Una');

-- --------------------------------------------------------

--
-- Table structure for table `document_details`
--

CREATE TABLE `document_details` (
  `applicant_id` int(11) NOT NULL,
  `10th_certificate` text NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_details`
--

INSERT INTO `document_details` (`applicant_id`, `10th_certificate`, `picture`) VALUES
(18, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(19, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(25, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(26, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(27, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(28, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(30, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(32, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(33, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(34, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(35, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(36, 'PAT-documents/certificate/20201115_121236181222014329.jpg', 'PAT-documents/picture/20200724_101057181222014329.jpg'),
(41, 'PAT-documents/certificate/resized-image100724125927.png', 'PAT-documents/picture/resized-image (1)100724125927.png'),
(42, 'PAT-documents/certificate/black text200824032949.png', 'PAT-documents/picture/Screenshot 2024-06-06 143522200824032949.png'),
(43, 'PAT-documents/certificate/Analyze Windows Memory Usage (1)280824061138.png', 'PAT-documents/picture/Analyze Windows Memory Usage280824061138.png');

-- --------------------------------------------------------

--
-- Table structure for table `educational_details`
--

CREATE TABLE `educational_details` (
  `applicant_id` int(11) NOT NULL,
  `board_name` text NOT NULL,
  `marks_obtained` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational_details`
--

INSERT INTO `educational_details` (`applicant_id`, `board_name`, `marks_obtained`, `total_marks`, `percentage`) VALUES
(18, 'HPBOSE', 650, 700, 92.86),
(19, 'HPBOSE', 630, 700, 90),
(25, 'HPBOSE', 379, 700, 54.14),
(26, 'Maharastra Board', 567, 700, 81),
(27, 'HPBOSE', 607, 700, 86.71),
(28, 'HPBOSE', 618, 700, 88.29),
(30, 'HPBOSE', 598, 700, 85.43),
(32, 'HPBOSE', 678, 700, 96.86),
(33, 'HPBOSE', 560, 700, 80),
(34, 'HPBOSE', 567, 700, 81),
(35, 'HPBOSE', 500, 700, 71.43),
(36, 'HPBOSE', 600, 700, 85.71),
(41, 'HPDOSE', 670, 700, 95.71),
(42, 'HPBOSE', 650, 700, 92.86),
(43, 'HPBOSE', 670, 700, 95.71);

-- --------------------------------------------------------

--
-- Table structure for table `fees_details`
--

CREATE TABLE `fees_details` (
  `applicant_id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `date_of_ payment` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) NOT NULL,
  `status` enum('successful','failed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_details`
--

INSERT INTO `fees_details` (`applicant_id`, `payment_id`, `order_id`, `date_of_ payment`, `amount`, `status`) VALUES
(18, 'pay_KajJaSxwwIdYqE', 'order_KajJQNWyxE0HlV', '2022-11-01 09:46:08', 250, 'successful'),
(19, 'pay_Kagb0RkFXPH7hL', 'order_KagaoZVpYnLNCB', '2022-11-01 07:06:33', 100, 'successful'),
(26, 'pay_Kb0H7SVnlH2fRu', 'order_Kb0GoSo3vq8NWs', '2022-11-02 02:21:35', 250, 'successful'),
(28, 'pay_KfPyHje52AQgGf', 'order_KfPy6nlZOvV1Vx', '2022-11-13 06:05:46', 250, 'successful'),
(30, 'pay_KlnZD6c4JgmY8w', 'order_KlnYyjlRK74Vtr', '2022-11-29 09:04:44', 250, 'successful'),
(32, 'pay_KoWSVe2wNXHj79', 'order_KoWSErUN3BFkMO', '2022-12-06 06:17:33', 250, 'successful'),
(33, 'pay_KprkLwBC7nCakB', 'order_KprjoILuQgATlu', '2022-12-09 15:46:20', 250, 'successful'),
(34, 'pay_KrInci2iAfJXL3', 'order_KrInGho2NLJZye', '2022-12-13 06:52:50', 100, 'successful'),
(35, 'pay_KtI1HQkIcLacDM', 'order_KtI0d6RmlfivJp', '2022-12-18 07:25:05', 100, 'successful'),
(42, 'pay_KtNSpnHJmTjLu2', 'order_KtNSGheZR4XiXy', '2022-12-18 12:44:38', 250, 'successful'),
(43, 'pay_OqPpfDXbtOICH4', 'order_OqPliIj6efaopf', '2024-08-28 18:20:06', 100, 'successful');

-- --------------------------------------------------------

--
-- Table structure for table `marks_detail`
--

CREATE TABLE `marks_detail` (
  `applicant_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_detail`
--

INSERT INTO `marks_detail` (`applicant_id`, `marks`) VALUES
(18, 76),
(19, 89),
(42, 98);

-- --------------------------------------------------------

--
-- Table structure for table `program_preferences`
--

CREATE TABLE `program_preferences` (
  `applicant_id` int(11) NOT NULL,
  `first_program` int(11) NOT NULL,
  `second_program` int(11) NOT NULL,
  `third_program` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_preferences`
--

INSERT INTO `program_preferences` (`applicant_id`, `first_program`, `second_program`, `third_program`) VALUES
(28, 4, 10, 6),
(30, 2, 6, 7),
(32, 1, 6, 2),
(33, 1, 2, 6),
(34, 6, 1, 10),
(35, 8, 6, 1),
(36, 1, 6, 10),
(41, 7, 1, 6),
(42, 6, 1, 3),
(43, 1, 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `rollnumber`
--

CREATE TABLE `rollnumber` (
  `applicant_id` int(11) NOT NULL,
  `applicant_rollNumber` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rollnumber`
--

INSERT INTO `rollnumber` (`applicant_id`, `applicant_rollNumber`) VALUES
(0, 10072030000),
(18, 10072030001),
(19, 10072030002),
(26, 10072030003),
(28, 10072030004),
(30, 10072030005),
(32, 10072030006),
(33, 10072030007),
(34, 10072030008),
(35, 10072030009),
(36, 10072030010),
(42, 10072030011);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `item`, `status`) VALUES
(1, 'application_Submission_Close', 'false'),
(2, 'Release_Admit_Card', 'false'),
(3, 'ReleaseResult', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `test_location`
--

CREATE TABLE `test_location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_location`
--

INSERT INTO `test_location` (`location_id`, `location_name`, `location_address`) VALUES
(1, 'Govt. Polytechnic Sundernagar', 'Sundernagar, Mandi H.P.'),
(2, 'Govt. Polytechnic Hamirpur', 'Baru , Hamirpur H.P.'),
(3, 'Govt. Polytechnic Rohru', 'Rohru, Shimla H.P.'),
(4, 'Govt. Polytechnic for Women Kandaghat', 'Solan H.P.'),
(5, 'Govt. Polytechnic Kangra', 'Kangra H.P.'),
(6, 'Dr. B. R. Ambedkar Govt. Polytechnic Ambota', 'Una H.P.'),
(7, 'Govt. Millenium Polytechnic Chamba', 'Chamba H.P.'),
(8, 'Rajiv Gandhi Govt. Polytechnic Banikhet', 'Chamba H.P.'),
(9, 'Govt. Polytechnic Talwar (Jaisinghpur)', 'Kangra H.P.'),
(10, 'ABVGIET Polytechnic Pragtinagar', 'Shimla H.P.'),
(11, 'Govt. Polytechnic Bilaspur', 'Bilaspur H.P.'),
(12, 'Govt. Polytechnic Paonta Sahib', 'Village & P.O. Dhaula Kuan,  Tehsil Ponta Sahib,  Distt. Sirmour (HP)'),
(13, 'Govt. Polytechnic Kullu', 'Seo-Bag,  Distt. Kullu (HP)');

-- --------------------------------------------------------

--
-- Table structure for table `test_prefrences`
--

CREATE TABLE `test_prefrences` (
  `applicant_id` int(11) NOT NULL,
  `first_location` int(11) NOT NULL,
  `second_location` int(11) NOT NULL,
  `third_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_prefrences`
--

INSERT INTO `test_prefrences` (`applicant_id`, `first_location`, `second_location`, `third_location`) VALUES
(18, 2, 1, 3),
(19, 2, 3, 1),
(26, 1, 3, 2),
(27, 1, 2, 3),
(28, 2, 3, 4),
(30, 11, 8, 3),
(32, 1, 3, 4),
(33, 3, 1, 8),
(34, 2, 3, 4),
(35, 8, 5, 3),
(36, 1, 2, 4),
(41, 4, 2, 3),
(42, 3, 1, 8),
(43, 8, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` enum('admin','applicant') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`, `role`) VALUES
(15, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(18, 'pooja sharma', 'poojasharma7058@gmail.com', '9cbb6aebcf5ae14a9248b4c08165212e', 'applicant'),
(19, 'demo', 'demo@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'applicant'),
(24, 'Sahil Pathania', 'sahilpathania@gmail.com', '1006f0ae5a7ece19828a67ac62288e05', 'applicant'),
(25, 'sweta sharma', 'sweta@gmail.com', 'ef2ab6b98e5e1a714f716104747245cc', 'applicant'),
(26, 'Harshit Satish Chandel', 'harshit@gmail.com', '83a75f0b31435193bafd3b9c5fd45aec', 'applicant'),
(27, 'demo2', 'demo2@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'applicant'),
(28, 'demo3', 'demo3@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'applicant'),
(29, 'akshit', '36akshit@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'applicant'),
(30, 'shivam', 'sp0852160@gmail.com', '83ff085aad87c7e256067e782435582d', 'applicant'),
(31, 'demo4', 'demo4@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'applicant'),
(32, 'demo 5', 'demo5@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'applicant'),
(33, 'demo6', 'demo6@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'applicant'),
(34, 'not', 'not@gmail.com', 'd529e941509eb9e9b9cfaeae1fe7ca23', 'applicant'),
(35, 'Akshit Thakur', 'akshit@gmail.com', '91aa445f4353331ded78efcb28e11e2d', 'applicant'),
(36, 'Vishal Kumar', 'vishal@gmail.com', '8b64d2451b7a8f3fd17390f88ea35917', 'applicant'),
(37, 'demo', 'demo10@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'applicant'),
(38, 'sdkhs', 'ad@gmail.com', '6226f7cbe59e99a90b5cef6f94f966fd', 'applicant'),
(39, 'ghgj', 'gh@gmail.com', '19b19ffc30caef1c9376cd2982992a59', 'applicant'),
(40, 'demo 7', 'demo7@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'applicant'),
(41, 'student1', 'student1@gmail.com', 'cd73502828457d15655bbd7a63fb0bc8', 'applicant'),
(42, 'abhishek', 'abhishek@gmail.com', 'f589a6959f3e04037eb2b3eb0ff726ac', 'applicant'),
(43, 'testuser3', 'testuser3@gmail.com', '1e4332f65a7a921075fbfb92c7c60cce', 'applicant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_details`
--
ALTER TABLE `address_details`
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `applicant_personal_details`
--
ALTER TABLE `applicant_personal_details`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `application_status`
--
ALTER TABLE `application_status`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_id`),
  ADD UNIQUE KEY `college_name` (`college_name`);

--
-- Indexes for table `college_preferences`
--
ALTER TABLE `college_preferences`
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `document_details`
--
ALTER TABLE `document_details`
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `educational_details`
--
ALTER TABLE `educational_details`
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `fees_details`
--
ALTER TABLE `fees_details`
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `marks_detail`
--
ALTER TABLE `marks_detail`
  ADD PRIMARY KEY (`applicant_id`),
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `program_preferences`
--
ALTER TABLE `program_preferences`
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `rollnumber`
--
ALTER TABLE `rollnumber`
  ADD PRIMARY KEY (`applicant_rollNumber`),
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_location`
--
ALTER TABLE `test_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `test_prefrences`
--
ALTER TABLE `test_prefrences`
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_personal_details`
--
ALTER TABLE `applicant_personal_details`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rollnumber`
--
ALTER TABLE `rollnumber`
  MODIFY `applicant_rollNumber` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10072030012;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_location`
--
ALTER TABLE `test_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
