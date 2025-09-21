-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 10:23 PM
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
-- Database: `hospital_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `bed_id` int(11) NOT NULL,
  `bed_status` enum('Occupied','Available') DEFAULT 'Available',
  `room_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`bed_id`, `bed_status`, `room_id`, `patient_id`) VALUES
(21, 'Occupied', 3, 3),
(22, 'Available', 3, NULL),
(23, 'Occupied', 4, 4),
(24, 'Available', 4, NULL),
(25, 'Occupied', 5, 5),
(26, 'Available', 5, NULL),
(27, 'Occupied', 6, 6),
(28, 'Available', 6, NULL),
(29, 'Occupied', 7, 7),
(30, 'Available', 7, NULL),
(31, 'Occupied', 8, 8),
(32, 'Available', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bill_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `billing_date` date NOT NULL,
  `payment_status` enum('Paid','Unpaid') NOT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_id`, `total_amount`, `billing_date`, `payment_status`, `patient_id`) VALUES
(1, 2000.00, '2024-11-01', 'Paid', 1),
(2, 1500.50, '2024-11-02', 'Unpaid', 2),
(6, 2222.00, '2024-11-22', 'Paid', 5),
(7, 2222.00, '2024-11-22', 'Paid', 5),
(8, 555.00, '2024-11-22', 'Paid', 5),
(11, 555.00, '2024-11-22', 'Paid', 3);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `dept_head` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`, `location`, `dept_head`) VALUES
(1, 'Cardiology', 'First Floor', 'Dr. John Smith'),
(2, 'Neurology', 'Second Floor', 'Dr. Emily Davis'),
(3, 'Orthopedics', 'Third Floor', 'Dr. Michael Brown'),
(4, 'Pediatrics', 'Ground Floor', 'Dr. Sarah Lee'),
(5, 'Radiology', 'Basement', 'Dr. Daniel Harris');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `mid_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `date_joined` date DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `thana` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `mid_name`, `last_name`, `mobile`, `date_joined`, `street`, `thana`, `city`, `district`, `salary`, `gender`, `date_of_birth`, `dept_id`) VALUES
(2, 'Jane', 'Marie', 'Doe', '0987654321', '2023-03-12', '456 Elm St', 'Thana B', 'Chittagong', 'Chittagong', 45000.00, 'Female', '1985-11-25', 2),
(3, 'Michael', 'James', 'Brown', '0176765678', '2022-08-01', '789 Oak St', 'Thana C', 'Rajshahi', 'Rajshahi', 55000.00, 'Male', '1982-02-20', 3),
(4, 'Sarah', 'Elizabeth', 'Taylor', '0198765432', '2021-06-14', '321 Pine St', 'Thana D', 'Khulna', 'Khulna', 60000.00, 'Female', '1993-07-30', 4),
(5, 'David', 'Lee', 'White', '0153456789', '2020-09-05', '654 Maple St', 'Thana E', 'Sylhet', 'Sylhet', 47000.00, 'Male', '1988-01-13', 5),
(6, 'Emma', 'Grace', 'Miller', '0167654321', '2019-05-19', '987 Cedar St', 'Thana F', 'Barisal', 'Barisal', 48000.00, 'Female', '1991-03-22', 1),
(7, 'Daniel', 'Edward', 'Wilson', '0171234567', '2022-04-10', '654 Birch St', 'Thana G', 'Narayanganj', 'Narayanganj', 51000.00, 'Male', '1986-12-03', 2),
(8, 'Olivia', 'Sophia', 'Moore', '0189876543', '2021-11-20', '789 Elm St', 'Thana H', 'Bogura', 'Bogura', 46000.00, 'Female', '1992-09-05', 3),
(9, 'James', 'Michael', 'Anderson', '0157896543', '2020-12-22', '321 Oak St', 'Thana I', 'Mymensingh', 'Mymensingh', 53000.00, 'Male', '1984-04-16', 4),
(10, 'Isabella', 'Ruth', 'Thomas', '0161234567', '2023-02-17', '654 Pine St', 'Thana J', 'Khulna', 'Khulna', 50000.00, 'Female', '1990-11-10', 5),
(11, 'Benjamin', 'Arthur', 'Jackson', '0172345678', '2022-07-25', '789 Maple St', 'Thana K', 'Dhaka', 'Dhaka', 49000.00, 'Male', '1987-05-25', 1),
(12, 'Charlotte', 'Marie', 'Harris', '0193456789', '2021-01-15', '123 Cedar St', 'Thana L', 'Chittagong', 'Chittagong', 52000.00, 'Female', '1993-08-11', 2),
(13, 'William', 'John', 'Clark', '0182345678', '2023-07-20', '654 Birch St', 'Thana M', 'Rajshahi', 'Rajshahi', 54000.00, 'Male', '1989-03-30', 3),
(14, 'Amelia', 'Rose', 'Lewis', '0176543210', '2022-09-09', '321 Pine St', 'Thana N', 'Sylhet', 'Sylhet', 46000.00, 'Female', '1992-04-05', 4),
(15, 'Lucas', 'Henry', 'Walker', '0198765432', '2021-04-10', '987 Cedar St', 'Thana O', 'Barisal', 'Barisal', 47000.00, 'Male', '1986-10-22', 5),
(16, 'Harper', 'Lynn', 'Young', '0153456789', '2020-02-18', '123 Maple St', 'Thana P', 'Narayanganj', 'Narayanganj', 55000.00, 'Female', '1991-07-16', 1),
(17, 'Ethan', 'Samuel', 'King', '0165432167', '2022-06-30', '789 Pine St', 'Thana Q', 'Mymensingh', 'Mymensingh', 51000.00, 'Male', '1983-12-09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insurance_id` int(11) NOT NULL,
  `provider_name` varchar(255) NOT NULL,
  `coverage_details` text DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insurance_id`, `provider_name`, `coverage_details`, `patient_id`, `bill_id`) VALUES
(1, 'ABC Health Insurance', 'Covers up to $1000 for hospitalization', 1, 1),
(2, 'XYZ Insurance', 'Full coverage for surgeries', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `expiry_date`, `quantity`, `price`) VALUES
(1, 'Aspirin', '2025-12-31', 100, 10.50),
(2, 'Paracetamol', '2026-06-30', 200, 5.75),
(3, 'Amoxicillin', '2027-05-15', 150, 12.00),
(4, 'Insulin', '2024-11-30', 50, 25.00),
(5, 'Ibuprofen', '2026-03-31', 120, 8.25);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `name`, `date_of_birth`, `gender`, `city`, `phone`) VALUES
(1, 'Alice Williams', '1985-03-12', 'Female', 'Dhaka', '0123456789'),
(2, 'Bob Martin', '1990-07-22', 'Male', 'Chittagong', '0987654321'),
(3, 'Charlie Brown', '1982-01-15', 'Male', 'Sylhet', '0198765432'),
(4, 'Daisy Green', '1995-11-10', 'Female', 'Rajshahi', '0176543210'),
(5, 'Ethan White', '2000-05-25', 'Male', 'Khulna', '0145789632'),
(6, 'Fiona Black', '1989-02-03', 'Female', 'Barisal', '0161234789'),
(7, 'George Harris', '1993-09-30', 'Male', 'Comilla', '0192345678'),
(8, 'Helen Young', '1997-08-11', 'Female', 'Mymensingh', '0187654321');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_number` varchar(20) DEFAULT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_number`, `room_type`, `ward_id`) VALUES
(3, '201', 'Private', 2),
(4, '202', 'Shared', 2),
(5, '301', 'Private', 3),
(6, '302', 'Shared', 3),
(7, '401', 'Private', 4),
(8, '402', 'Shared', 4),
(11, '201', 'Private', 2),
(12, '202', 'Shared', 2),
(13, '301', 'Private', 3),
(14, '302', 'Shared', 3),
(15, '401', 'Private', 4),
(16, '402', 'Shared', 4);

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `ward_id` int(11) NOT NULL,
  `ward_name` varchar(100) DEFAULT NULL,
  `ward_type` varchar(50) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `occupied` int(11) DEFAULT 0,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`ward_id`, `ward_name`, `ward_type`, `floor`, `capacity`, `occupied`, `department_id`) VALUES
(2, 'Neuro Ward', 'General', 2, 15, 5, 2),
(3, 'Orthopedic Ward', 'General', 3, 20, 10, 3),
(4, 'Pediatric Ward', 'ICU', 0, 10, 7, 4),
(5, 'Cardiac Ward', 'ICU', 1, 10, 3, 1),
(6, 'Neuro Ward', 'General', 2, 15, 5, 2),
(7, 'Orthopedic Ward', 'General', 3, 20, 10, 3),
(8, 'Pediatric Ward', 'ICU', 0, 10, 7, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`bed_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insurance_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `ward_id` (`ward_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`ward_id`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `bed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insurance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `ward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `beds_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `beds_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE SET NULL;

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`);

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `insurance_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `insurance_ibfk_2` FOREIGN KEY (`bill_id`) REFERENCES `billing` (`bill_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`ward_id`) ON DELETE CASCADE;

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
