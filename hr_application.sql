-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 08:25 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `firstname`) VALUES
(1, 'admin@gmail.com', 'admin', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `month_in` varchar(255) NOT NULL,
  `day_in` varchar(255) NOT NULL,
  `year_in` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `time_in` varchar(255) NOT NULL,
  `time_out` varchar(255) NOT NULL,
  `month_out` varchar(255) NOT NULL,
  `day_out` varchar(255) NOT NULL,
  `year_out` varchar(255) NOT NULL,
  `location_in_lat` varchar(255) NOT NULL,
  `location_in_long` varchar(255) NOT NULL,
  `location_out_lat` varchar(255) NOT NULL,
  `location_out_long` varchar(255) NOT NULL,
  `is_overtime` int(11) NOT NULL,
  `is_doublepay` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `month_in`, `day_in`, `year_in`, `user_id`, `time_in`, `time_out`, `month_out`, `day_out`, `year_out`, `location_in_lat`, `location_in_long`, `location_out_lat`, `location_out_long`, `is_overtime`, `is_doublepay`, `company_id`) VALUES
(11, '06', '17', '2019', '3', '04:04:04 pm', '05:15:25 pm', '06', '17', '2019', '37.4219576', '-122.0840029', '14.6219884', '121.0536673', 0, '', 24),
(12, '06', '17', '2019', '3', '05:15:21 pm', '05:15:25 pm', '06', '17', '2019', '14.6220579', '121.0536366', '14.6219884', '121.0536673', 0, '', 24),
(13, '06', '20', '2019', '6', '11:40:54 pm', '11:40:55 pm', '06', '20', '2019', '37.4219546', '-122.0840047', '37.4219546', '-122.0840047', 0, '', 0),
(14, '06', '20', '2019', '6', '11:42:38 pm', '11:42:39 pm', '06', '20', '2019', '37.4219546', '-122.0840047', '37.4219546', '-122.0840047', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `landline` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `address`, `email`, `password`, `mobile`, `landline`, `image`) VALUES
(1, 'Pascaline ERP', 'Areneta Cubao Gateway', 'erp@gmail.com', '123', '111111111111', '111111', ''),
(22, 'qwe', 'qwe', 'qwe@gmail.com', 'qwe', 'wqe', 'qwe', 'images/l6HXbNFffP1CM2LDtMlpySJxK1560697317.jpg'),
(23, 'qwer', 'qwe', 'qwe@gmail.com', 'qwe', 'wqe', 'qwe', 'images/x6s2honT4Tn3QabR5kZ9LXwhl1560697441.jpg'),
(24, 'dhfjf', 'dhxhx', 'adf@gmail.com', 'ads', '455666', '556', 'images/elT5jzXRWKHvKBsuOl5NIGVRz1560756554.jpg'),
(25, 'sample', 'sample', 'sample@gmail.com', 'aaa', '11111111111', '244', 'images/e9TJVeRrpYh2Uc978gVLj0zya1560762634.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company_applicant`
--

CREATE TABLE `company_applicant` (
  `company_applicant_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_applicant`
--

INSERT INTO `company_applicant` (`company_applicant_id`, `company_id`, `employee_id`, `day`, `month`, `year`) VALUES
(7, 1, 6, '21', '06', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `company_group`
--

CREATE TABLE `company_group` (
  `company_group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `max_member` varchar(255) NOT NULL,
  `supervisor` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_group`
--

INSERT INTO `company_group` (`company_group_id`, `name`, `description`, `max_member`, `supervisor`, `company_id`) VALUES
(1, 'qwewqe', 'qwewq', 'qwewqewq', 0, 24);

-- --------------------------------------------------------

--
-- Table structure for table `company_holiday`
--

CREATE TABLE `company_holiday` (
  `holiday_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_holiday`
--

INSERT INTO `company_holiday` (`holiday_id`, `day`, `month`, `year`, `name`, `company_id`) VALUES
(2, '20', '06', '2019', 'Aniversary', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dayofwork`
--

CREATE TABLE `dayofwork` (
  `dayofwork_id` int(11) NOT NULL,
  `work_day` varchar(255) NOT NULL,
  `time_start` varchar(255) NOT NULL,
  `time_end` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dayofwork`
--

INSERT INTO `dayofwork` (`dayofwork_id`, `work_day`, `time_start`, `time_end`, `year`, `company_id`) VALUES
(15, 'Monday', '02:11 AM', '2', '2019', 1),
(16, 'Tuesday', '03:21 AM', '3', '2019', 1),
(17, 'Wednesday', '03:34 AM', '03:34 AM', '2019', 1),
(18, 'Saturday', '04:18 AM', '04:18 AM', '2019', 1),
(19, 'Sunday', '04:18 AM', '04:18 AM', '2019', 1),
(20, 'Thursday', '04:19 AM', '04:19 AM', '2019', 1),
(21, 'Monday', '05:18 PM', '05:18 PM', '2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `holiday_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`holiday_id`, `day`, `month`, `year`, `name`) VALUES
(1, '1', '01', '2019', 'New Years Day'),
(2, '5', '02', '2019', 'Chinese New Year'),
(3, '9', '04', '2019', 'Araw ng Kagitingan'),
(4, '18', '04', '2019', 'Maundy Thursday'),
(5, '19', '04', '2019', 'Good Friday'),
(6, '1', '05', '2019', 'Labor Day'),
(7, '6', '06', '2019', 'Eid U Fitr'),
(8, '12', '06', '2019', 'Independence Day'),
(9, '26', '08', '2019', 'National Heroes Day'),
(10, '1', '11', '2019', 'All Saints Day'),
(11, '10', '11', '2019', 'Milad until Nabi'),
(12, '30', '11', '2019', 'Bonifacio Day'),
(13, '25', '12', '2019', 'Christmas Day'),
(14, '30', '12', '2019', 'Rizal Day'),
(15, '31', '12', '2019', 'New Years Eve'),
(16, '17', '06', '2019', 'dhdhfjfjv'),
(17, '17', '07', '2019', 'hsjsjsj'),
(18, '20', '06', '2019', 'Qwerty QQ'),
(19, '20', '06', '2019', 'Company Anniversary');

-- --------------------------------------------------------

--
-- Table structure for table `offset`
--

CREATE TABLE `offset` (
  `offset_id` int(11) NOT NULL,
  `dayoffset_new_day` varchar(255) NOT NULL,
  `dayoffset_new_month` varchar(255) NOT NULL,
  `dayoffset_new_year` varchar(255) NOT NULL,
  `dayoffset_day` varchar(255) NOT NULL,
  `dayoffset_month` varchar(255) NOT NULL,
  `dayoffset_year` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offset`
--

INSERT INTO `offset` (`offset_id`, `dayoffset_new_day`, `dayoffset_new_month`, `dayoffset_new_year`, `dayoffset_day`, `dayoffset_month`, `dayoffset_year`, `company_id`, `user_id`) VALUES
(9, '17', '06', '2019', '15', '06', '2019', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `overtime_id` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `start_day` varchar(255) NOT NULL,
  `start_month` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `end_day` varchar(255) NOT NULL,
  `end_month` varchar(255) NOT NULL,
  `end_year` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salarycutoff`
--

CREATE TABLE `salarycutoff` (
  `salarycutoff_id` int(11) NOT NULL,
  `cutoff_start_1` varchar(255) NOT NULL,
  `cutoff_start_2` varchar(255) NOT NULL,
  `cutoff_end_1` varchar(255) NOT NULL,
  `cutoff_ned_2` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `joined` varchar(255) NOT NULL,
  `current_company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `middlename`, `email`, `password`, `age`, `mobile`, `role`, `joined`, `current_company`) VALUES
(3, 'qwewqewq', '', '', 'qwe@gmail.com', 'qwe', '', '11111111111', 'employee', '1558432686', '24'),
(4, '', '', '', 'qwer@gmail.com', 'qwe', '', '09195719925', 'hr', '1559099063', '24'),
(5, '', '', '', 'super@gmail.com', '111', '', '111111111112', 'supervisor', '1560827478', ''),
(6, 'EMP', 'SIX', '', 'emp1@gmail.com', 'emp1', '', '22222222222', 'employee', '1560943719', ''),
(7, 'EMP', 'SEVEN', '', 'emp2@gmail.com', 'emp1', '', '33333333333', 'employee', '1560943737', ''),
(8, '', '', '', 'emp3@gmail.com', 'emp1', '', '44444444444', 'employee', '1560943758', '1'),
(9, '', '', '', 'super1@gmail.com', 'emp1', '', '55555555555', 'employee', '1560943795', ''),
(10, '', '', '', 'super2@gmail.com', 'emp1', '', '66666666666', 'employee', '1560943819', ''),
(11, '', '', '', 'hr1@gmail.com', 'emp1', '', '77777777777', 'employee', '1560943837', ''),
(12, '', '', '', 'hr2@gmail.com', 'emp1', '', '88888888888', 'employee', '1560943855', '');

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
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company_applicant`
--
ALTER TABLE `company_applicant`
  ADD PRIMARY KEY (`company_applicant_id`);

--
-- Indexes for table `company_group`
--
ALTER TABLE `company_group`
  ADD PRIMARY KEY (`company_group_id`);

--
-- Indexes for table `company_holiday`
--
ALTER TABLE `company_holiday`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `dayofwork`
--
ALTER TABLE `dayofwork`
  ADD PRIMARY KEY (`dayofwork_id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `offset`
--
ALTER TABLE `offset`
  ADD PRIMARY KEY (`offset_id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`overtime_id`);

--
-- Indexes for table `salarycutoff`
--
ALTER TABLE `salarycutoff`
  ADD PRIMARY KEY (`salarycutoff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `company_applicant`
--
ALTER TABLE `company_applicant`
  MODIFY `company_applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `company_group`
--
ALTER TABLE `company_group`
  MODIFY `company_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company_holiday`
--
ALTER TABLE `company_holiday`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dayofwork`
--
ALTER TABLE `dayofwork`
  MODIFY `dayofwork_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `offset`
--
ALTER TABLE `offset`
  MODIFY `offset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `overtime_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salarycutoff`
--
ALTER TABLE `salarycutoff`
  MODIFY `salarycutoff_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
