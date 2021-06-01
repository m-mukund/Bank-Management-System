-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 08:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_no` int(11) NOT NULL,
  `Balance` float NOT NULL,
  `Branch_id` int(11) NOT NULL,
  `Employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_no`, `Balance`, `Branch_id`, `Employee_id`) VALUES
(1, 0, 1, 1),
(2, 0, 1, 2),
(3, 0, 1, 2),
(4, 0, 1, 2),
(5, 1000000000, 1, 2),
(6, 1000000000, 1, 2),
(7, 1000000000, 1, 2),
(8, 10000500, 1, 2),
(9, 9250, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `Admin_id` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`Admin_id`, `Password`) VALUES
('admin', '$2y$10$tC2fgyV9fS71F68jW0w7E.33IQQJiSbug2nKFTLL301r6RaSvIU66'),
('admin2', '$2y$10$l0HUwLjGrP.6D/nXRFPwqO69MYRVIpST.zOw4TbMXWoc4oXnu6UGW');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch_id` int(11) NOT NULL,
  `Branch_name` varchar(255) NOT NULL,
  `Pincode` int(11) NOT NULL,
  `Admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch_id`, `Branch_name`, `Pincode`, `Admin_id`) VALUES
(1, 'Aluva', 683101, 1),
(2, 'kozhikode', 673001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Aadhar_no` bigint(20) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Pincode` int(11) DEFAULT NULL,
  `Phone_no` bigint(20) NOT NULL,
  `Email_id` varchar(255) NOT NULL,
  `Account_no` int(11) DEFAULT NULL,
  `Employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Aadhar_no`, `Fname`, `Lname`, `Pincode`, `Phone_no`, `Email_id`, `Account_no`, `Employee_id`) VALUES
(60, 'Akshaj', 'Sunil', 683101, 9497460893, 'akshajxf@gmail.com', NULL, NULL),
(11111, 'Saby', 'P.P', 683101, 7558835017, 'saby@saby.com', 1, 1),
(1234567, 'Mukunds', 'M.k', 683101, 735483264945, 'mkund@kund.com', 3, 2),
(5678904, 'Kane', 'harry', 683101, 9188037893, 'kane@gmail.com', 5, 2),
(7676767, 'CAS', 'Blank', 683101, 95762374374, 'cas@cas.com', 2, 2),
(123456789, 'son', 'h', 683101, 9675674563, 'son@son.com', 9, 1),
(2342313433, 'Jose', 'Anand', 683101, 9682367644, 'anand@jose.com', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cus_log`
--

CREATE TABLE `cus_log` (
  `Account_no` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_log`
--

INSERT INTO `cus_log` (`Account_no`, `Password`) VALUES
(5, '$2y$10$Jjq6/4zT3DvgGnaIRWSRzOuyS7dpHDoT2OcLmrmZLUEnLZB5hK8cC'),
(6, '$2y$10$LLB7F9IMxGiLhAIsPbQ5oOVfGQfrbVjWLnNMyF0vE3.Ia7GHOATlu'),
(7, '$2y$10$3jZPAIvmc7qfnuQAUwY0seMfjcLheqHk8RzOnwltNo8GYGpLP1pwy'),
(8, '$2y$10$ZJW47quSCBJEFTrlEfPVletpe9lMFhEtEQkMW5jySSDFVTW5NZuIW'),
(9, '$2y$10$KFRkh7T1bzHLEuDrx222jOab0r0EPZW9dwVCkBvUWATgFbC3dfzfC');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_id` int(11) NOT NULL,
  `Aadhar_no` bigint(20) DEFAULT NULL,
  `Salary` int(11) NOT NULL,
  `Manager_id` int(11) DEFAULT NULL,
  `Branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_id`, `Aadhar_no`, `Salary`, `Manager_id`, `Branch_id`) VALUES
(1, 60, 10000, 1, NULL),
(2, 11111, 9, 1, 1),
(3, 7676767, 15, 2, 1),
(4, 1234567, 7, 2, 1),
(5, 2342313433, 16, 2, 1),
(9, 123456789, 1000000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_log`
--

CREATE TABLE `emp_log` (
  `Employee_id` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_log`
--

INSERT INTO `emp_log` (`Employee_id`, `Password`) VALUES
(1, '$2y$10$9O4v5uQZ9F4Q/R.7A2ZfAe3VXpTwLTb4ZEKeqUvI8CNs.oSjHyk3m'),
(2, '$2y$10$9O4v5uQZ9F4Q/R.7A2ZfAe3VXpTwLTb4ZEKeqUvI8CNs.oSjHyk3m'),
(3, '$2y$10$KOSwQ9cZihCisdA7lv55QusHuicb/xFLhRq1bOJ9mkK0pqRGXrAmm'),
(4, '$2y$10$hqCs4oSSXJWwRcJHB2wl8e/tVxkD7h3rwrBY6ebhm0rfSaO/vHYva'),
(5, '$2y$10$yEyrmf3asm143DlEnM/rgORvodz0U4zVwrQnaSSDuvvQl2X7wbPT.'),
(9, '$2y$10$KFRkh7T1bzHLEuDrx222jOab0r0EPZW9dwVCkBvUWATgFbC3dfzfC');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `Loan_id` int(11) NOT NULL,
  `Amount` double NOT NULL,
  `Interest` float NOT NULL,
  `Previous_date` date NOT NULL,
  `Time_period` int(11) NOT NULL,
  `Aadhar_no` bigint(11) NOT NULL,
  `Employee_id` int(11) NOT NULL,
  `Amount_remaining` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`Loan_id`, `Amount`, `Interest`, `Previous_date`, `Time_period`, `Aadhar_no`, `Employee_id`, `Amount_remaining`) VALUES
(1, 500, 8, '2020-12-28', 10, 1234567, 2, 500),
(2, 500, 6, '2020-12-28', 3, 7676767, 2, 500),
(3, 500, 4, '2020-12-28', 5, 123456789, 2, 250);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `Pincode` int(11) NOT NULL,
  `State` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`Pincode`, `State`, `City`) VALUES
(673001, 'Kerala', 'Kozhikode'),
(683101, 'Kerala', 'Kochi');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `Transfer_id` int(11) NOT NULL,
  `Receiver_acc_no` int(11) NOT NULL,
  `Sender_acc_no` int(11) NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`Transfer_id`, `Receiver_acc_no`, `Sender_acc_no`, `Amount`) VALUES
(3, 8, 9, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_no`),
  ADD KEY `Branch_id` (`Branch_id`),
  ADD KEY `Employee_id` (`Employee_id`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch_id`),
  ADD KEY `Pincode` (`Pincode`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Aadhar_no`),
  ADD UNIQUE KEY `Phone_no` (`Phone_no`),
  ADD UNIQUE KEY `Email_id` (`Email_id`),
  ADD UNIQUE KEY `Account_no` (`Account_no`),
  ADD KEY `Pincode` (`Pincode`),
  ADD KEY `Employee_id` (`Employee_id`);

--
-- Indexes for table `cus_log`
--
ALTER TABLE `cus_log`
  ADD PRIMARY KEY (`Account_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_id`),
  ADD UNIQUE KEY `Aadhar_no` (`Aadhar_no`),
  ADD KEY `Manager_id` (`Manager_id`),
  ADD KEY `Branch_id` (`Branch_id`);

--
-- Indexes for table `emp_log`
--
ALTER TABLE `emp_log`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`Loan_id`),
  ADD KEY `Aadhar_no` (`Aadhar_no`),
  ADD KEY `Employee_id` (`Employee_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`Pincode`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`Transfer_id`),
  ADD KEY `Receiver_acc_no` (`Receiver_acc_no`),
  ADD KEY `Sender_acc_no` (`Sender_acc_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `Branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5556;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `Loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `Transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`Branch_id`) REFERENCES `branch` (`Branch_id`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`Pincode`) REFERENCES `locations` (`Pincode`),
  ADD CONSTRAINT `branch_ibfk_2` FOREIGN KEY (`Admin_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Pincode`) REFERENCES `locations` (`Pincode`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`Account_no`) REFERENCES `account` (`Account_no`),
  ADD CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Aadhar_no`) REFERENCES `customer` (`Aadhar_no`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`Manager_id`) REFERENCES `employee` (`Employee_id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`Branch_id`) REFERENCES `branch` (`Branch_id`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`Aadhar_no`) REFERENCES `customer` (`Aadhar_no`),
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_ibfk_1` FOREIGN KEY (`Receiver_acc_no`) REFERENCES `account` (`Account_no`),
  ADD CONSTRAINT `transfers_ibfk_2` FOREIGN KEY (`Sender_acc_no`) REFERENCES `account` (`Account_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
