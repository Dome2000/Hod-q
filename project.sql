-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2022 at 09:13 AM
-- Server version: 10.3.37-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hodqggx_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dp_id` int(11) NOT NULL,
  `dp_name` varchar(45) NOT NULL,
  `dp_img` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dp_id`, `dp_name`, `dp_img`) VALUES
(1, 'เจ้าหน้าที่IT', 'admin.png'),
(2, 'อายุรกรรม', 'select_dep1.png'),
(3, 'สูตินรีเวช', 'select_dep2.png'),
(4, 'จักษุ', 'select_dep3.png'),
(5, 'หู คอ จมูก', 'select_dep4.png'),
(6, 'กุมารเวช', 'select_dep5.png'),
(7, 'จิตเวช', 'select_dep6.png'),
(25, 'ทดสอบ', '1668973779.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `ps_idCard` varchar(13) NOT NULL,
  `ps_Fname` varchar(45) NOT NULL,
  `ps_Lname` varchar(45) NOT NULL,
  `ps_gender` varchar(45) NOT NULL,
  `ps_birthday` date NOT NULL,
  `ps_email` varchar(45) NOT NULL,
  `ps_tel` varchar(10) NOT NULL,
  `ps_password` varchar(999) NOT NULL,
  `ty_id` int(1) NOT NULL,
  `rt_id` int(1) NOT NULL,
  `ps_otp` varchar(11) NOT NULL,
  `lineId` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`ps_idCard`, `ps_Fname`, `ps_Lname`, `ps_gender`, `ps_birthday`, `ps_email`, `ps_tel`, `ps_password`, `ty_id`, `rt_id`, `ps_otp`, `lineId`) VALUES
('1111111111111', 'Mommy', 'Nonginjun', 'หญิง', '2000-01-24', 'plengchansoo@gmail.com', '0888888888', 'e10adc3949ba59abbe56e057f20f883e', 1, 5, '', ''),
('1234567890123', 'ทดสอบ', 'ระบบ', 'ชาย', '2004-06-01', 'peeraphat34@gmail.com', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'E1UytH', ''),
('1401400077758', 'พรทิพา', 'ชนะน้อย', 'หญิง', '2000-06-22', 'porntipa.ch@kkumail.com', '0990432964', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '', 'U0dbb128c3d1bc11d7f6d074494b9c15b'),
('1409944445555', 'ชวณัฐ', 'วรรณประภา', 'ชาย', '1999-01-01', 'w.chawanut@kkumail.com', '0836671544', '1e701fa68f9055d70e42c48e37aa91e5', 1, 2, '', ''),
('1444444444444', 'บรรทม', 'แสนแก้ว', 'ชาย', '1966-11-01', 'buntomsea@gmail.com', '0611466056', 'e10adc3949ba59abbe56e057f20f883e', 2, 4, '', ''),
('1469900525161', 'ณัฐริกา', 'แสนแก้ว', 'หญิง', '2000-12-16', 'nattarika.sean@kkumail.com', '0934527512', '543bb92567e1f494953d6a5b09a80668', 1, 1, '', ''),
('1499900335494', 'พีรพัฒน์', 'เจริญไทย', 'ชาย', '2000-10-26', 'peeraphat.ch@kkumail.com', '0956510666', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '', 'U0848999cb4ed2e1a6a6a3ce568b8637c');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `q_id` int(11) NOT NULL,
  `q_max` int(10) NOT NULL,
  `q_date` date NOT NULL,
  `q_time` varchar(999) NOT NULL,
  `sf_username` varchar(45) NOT NULL,
  `dp_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`q_id`, `q_max`, `q_date`, `q_time`, `sf_username`, `dp_id`) VALUES
(21, 2, '2022-11-24', '08:00 - 09:00', 'admin', 5),
(23, 3, '2022-11-25', '08:00 - 09:00', 'admin', 2),
(24, 5, '2022-11-25', '09:00 - 10:00', 'admin', 2),
(25, 2, '2022-11-25', '10:00 - 11:00', 'staff2', 2),
(29, 2, '2022-11-27', '08:00 - 09:00', 'staff2', 2),
(30, 5, '2022-11-27', '09:00 - 10:00', 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `queue_list`
--

CREATE TABLE `queue_list` (
  `ql_id` int(45) NOT NULL,
  `ql_detail` varchar(999) NOT NULL,
  `ql_no` int(45) NOT NULL,
  `q_id` int(10) NOT NULL,
  `ps_idCard` varchar(40) NOT NULL,
  `ql_status` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `succeed_at` datetime NOT NULL,
  `time_spent` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `queue_list`
--

INSERT INTO `queue_list` (`ql_id`, `ql_detail`, `ql_no`, `q_id`, `ps_idCard`, `ql_status`, `create_at`, `update_at`, `succeed_at`, `time_spent`) VALUES
(53, '1', 0, 21, '1234567890123', 4, '2022-11-22 22:24:19', '2022-11-22 22:26:21', '0000-00-00 00:00:00', 0),
(54, '2', 0, 21, '1499900335494', 4, '2022-11-22 22:25:20', '2022-11-22 22:29:46', '0000-00-00 00:00:00', 0),
(55, '3', 1, 21, '1401400077758', 3, '2022-11-22 22:25:51', '2022-11-24 01:03:22', '2022-11-24 01:08:06', 5),
(56, '4', 2, 21, '1234567890123', 3, '2022-11-22 22:27:04', '2022-11-24 01:03:27', '2022-11-24 01:08:08', 5),
(58, '5', 3, 21, '1499900335494', 3, '2022-11-22 22:31:42', '2022-11-24 01:03:32', '2022-11-24 01:05:33', 2),
(59, '1', 1, 23, '1401400077758', 3, '2022-11-24 20:02:48', '2022-11-25 23:02:38', '2022-11-25 23:04:45', 2),
(60, '2', 0, 23, '1499900335494', 4, '2022-11-24 20:03:23', '2022-11-24 21:03:17', '0000-00-00 00:00:00', 0),
(61, '3', 2, 23, '1234567890123', 3, '2022-11-24 20:04:16', '2022-11-25 23:02:41', '2022-11-25 23:04:47', 2),
(62, '2.1', 1, 24, '1111111111111', 3, '2022-11-24 20:07:31', '2022-11-25 23:02:55', '2022-11-25 23:04:53', 2),
(63, '3.1', 1, 25, '1499900335494', 3, '2022-11-24 21:04:04', '2022-11-25 23:03:02', '2022-11-25 23:04:33', 2),
(67, '1', 1, 29, '1401400077758', 3, '2022-11-26 00:05:12', '2022-11-26 07:24:55', '2022-11-26 07:26:00', 1),
(69, '2', 0, 29, '1499900335494', 4, '2022-11-26 00:48:11', '2022-11-26 14:19:32', '0000-00-00 00:00:00', 0),
(70, '3', 2, 29, '1234567890123', 3, '2022-11-26 00:50:10', '2022-11-26 07:27:04', '2022-11-26 07:28:07', 1),
(71, '4', 3, 29, '1499900335494', 5, '2022-11-26 14:21:20', '2022-11-26 07:27:52', '0000-00-00 00:00:00', 0),
(72, '11', 1, 30, '1499900335494', 2, '2022-11-26 14:34:06', '2022-11-26 07:58:30', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rv_id` int(45) NOT NULL,
  `rv_score` int(1) NOT NULL,
  `rv_comment` text NOT NULL,
  `rv_datetime` datetime NOT NULL,
  `ps_idCard` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rv_id`, `rv_score`, `rv_comment`, `rv_datetime`, `ps_idCard`) VALUES
(57, 5, 'test', '2022-10-24 23:44:16', '1499900335494'),
(58, 4, '4', '2022-10-24 23:50:17', '1499900335494'),
(59, 3, '3', '2022-10-24 23:50:20', '1499900335494'),
(60, 2, '2', '2022-10-24 23:50:23', '1499900335494'),
(62, 5, '5', '2022-10-24 23:50:38', '1499900335494'),
(63, 3, 'ดีมากกกกกก', '2022-11-06 13:48:37', '1401400077758'),
(64, 5, '555', '2022-11-08 09:46:58', '1401400077758'),
(65, 1, 'ทดสอบ', '2022-11-08 15:05:58', '1499900335494'),
(91, 5, 'ทดสอบ', '2022-11-21 03:54:43', '1499900335494'),
(92, 5, 'ใช้งานง่ายดีครับ', '2022-11-21 09:29:33', '1499900335494'),
(93, 3, '    ', '2022-11-21 11:11:55', '1234567890123');

-- --------------------------------------------------------

--
-- Table structure for table `right_to_treatment`
--

CREATE TABLE `right_to_treatment` (
  `rt_id` int(11) NOT NULL,
  `rt_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `right_to_treatment`
--

INSERT INTO `right_to_treatment` (`rt_id`, `rt_name`) VALUES
(1, 'สิทธิบัตรทอง'),
(2, 'จ่ายเอง'),
(3, 'สิทธิประกันสังคม'),
(4, 'สิทธิข้าราชการ'),
(5, 'สิทธิประกันสุขภาพ');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sf_username` varchar(13) NOT NULL,
  `sf_Fname` varchar(45) NOT NULL,
  `sf_Lname` varchar(45) NOT NULL,
  `sf_gender` varchar(45) NOT NULL,
  `sf_Birthday` date NOT NULL,
  `sf_Email` varchar(45) NOT NULL,
  `sf_tel` varchar(10) NOT NULL,
  `sf_password` varchar(45) NOT NULL,
  `dp_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sf_username`, `sf_Fname`, `sf_Lname`, `sf_gender`, `sf_Birthday`, `sf_Email`, `sf_tel`, `sf_password`, `dp_id`) VALUES
('', '', '', '', '0000-00-00', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0),
('admin', 'พีรพัฒน์', 'เจริญไทย', 'ชาย', '2000-02-02', 'peeraphat.ch@kkumail.com', '0956510666', '202cb962ac59075b964b07152d234b70', 1),
('admin2', 'พรทิพา', 'ชนะน้อย', 'หญิง', '2000-06-22', 'porntipa.ch@kkumail.com', '123', '202cb962ac59075b964b07152d234b70', 1),
('staff2', 'ใจดี', 'มาก', 'ชาย', '2022-08-01', 'staff2@gmail.com', '123456789', '202cb962ac59075b964b07152d234b70', 2),
('staff3', 'staff3', 'staff3', 'หญิง', '2022-08-09', 'staff3@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 3),
('staff4', 'staff4', 'staff4', 'ชาย', '2022-08-04', 'staff4@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 4),
('staff5', 'staff5', 'staff5', 'ชาย', '2022-08-07', 'staff5@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 5),
('staff6', 'staff6', 'staff6', 'หญิง', '2022-04-03', 'staff1@gmail.com', '1234567890', '202cb962ac59075b964b07152d234b70', 6),
('staff7', 'staff7', 'staff7', 'ชาย', '2022-08-18', 'staff6@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 7);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(0, 'รอคิว'),
(1, 'เรียกคิว'),
(2, 'เข้าตรวจ'),
(3, 'ตรวจเสร็จ'),
(4, 'ยกเลิกโดยคนไข้'),
(5, 'ยกเลิกโดยเจ้าหน้าที่');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `ty_id` int(1) NOT NULL,
  `ty_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`ty_id`, `ty_name`) VALUES
(1, 'ผู้ป่วยใหม่'),
(2, 'ผู้ป่วยเก่า');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dp_id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`ps_idCard`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `queue_list`
--
ALTER TABLE `queue_list`
  ADD PRIMARY KEY (`ql_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rv_id`);

--
-- Indexes for table `right_to_treatment`
--
ALTER TABLE `right_to_treatment`
  ADD PRIMARY KEY (`rt_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sf_username`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `queue_list`
--
ALTER TABLE `queue_list`
  MODIFY `ql_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rv_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `right_to_treatment`
--
ALTER TABLE `right_to_treatment`
  MODIFY `rt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `ty_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
