-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 12:08 PM
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
-- Database: `hillows`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `username`, `password`) VALUES
(1, 'hillowyurub@gmail.com', 'hillow', 'YWRtaW4xMjM=');

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `cargo_id` int(11) NOT NULL,
  `cargo_dec` varchar(200) NOT NULL,
  `cargo_weight` float(10,2) NOT NULL,
  `charges` decimal(10,2) NOT NULL,
  `fee_cost` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `ref_number` varchar(200) NOT NULL,
  `status` varchar(120) NOT NULL DEFAULT 'Pending',
  `state_cargo` varchar(120) NOT NULL DEFAULT 'Not taken',
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`cargo_id`, `cargo_dec`, `cargo_weight`, `charges`, `fee_cost`, `grand_total`, `ref_number`, `status`, `state_cargo`, `customer_id`, `shipping_id`) VALUES
(18, '                Enter cargo description Here.....\r\n            Office Chairs and desks', 5.00, 3000.00, 1500.00, 16500.00, 'JOY0A124', 'Paid', 'Ready for pickup', 8, 18);

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `charge_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`charge_id`, `amount`) VALUES
(2, 3000.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `company_name` varchar(120) NOT NULL,
  `company_email` varchar(120) NOT NULL,
  `company_contact` int(12) NOT NULL,
  `company_address` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `company_name`, `company_email`, `company_contact`, `company_address`, `password`) VALUES
(8, 'ASIYAFOUNDATION', 'asiyafoundation@fufu.ke.co', 2147483647, 'Mombasa road', 'QXNpeWExMjM=');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `messages` text NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `m_ref` varchar(120) NOT NULL,
  `cargo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `total_amount`, `paid_amount`, `balance`, `m_ref`, `cargo_id`) VALUES
(14, 16500.00, 16500.00, 0.00, 'SF84U1SVXG', 18);

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `pick_id` int(11) NOT NULL,
  `shipping_from` varchar(120) NOT NULL,
  `shipping_to` varchar(120) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `pick_time` varchar(80) NOT NULL,
  `pick_date` varchar(80) NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `notification` int(13) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickup`
--

INSERT INTO `pickup` (`pick_id`, `shipping_from`, `shipping_to`, `staff_id`, `pick_time`, `pick_date`, `cargo_id`, `customer_id`, `notification`) VALUES
(6, 'NAIROBI', 'MOMBASA', 6, '06:30', '2024-06-18', 18, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `receiver_name` varchar(120) NOT NULL,
  `receiver_email` varchar(120) NOT NULL,
  `receiver_phone` int(12) NOT NULL,
  `sender_location` varchar(120) NOT NULL,
  `receiver_location` varchar(120) NOT NULL,
  `receiver_address` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL DEFAULT 'New',
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `receiver_name`, `receiver_email`, `receiver_phone`, `sender_location`, `receiver_location`, `receiver_address`, `state`, `customer_id`) VALUES
(18, 'mahiralilimited', 'mahirali@yahoo.com ', 2147483647, 'NAIROBI', 'MOMBASA', 'Mtwapa', 'Pending', 8);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `gender` varchar(80) NOT NULL,
  `contact` int(20) NOT NULL,
  `username` varchar(80) NOT NULL,
  `reg_number` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `s_status` varchar(80) NOT NULL DEFAULT 'free',
  `state` varchar(80) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `gender`, `contact`, `username`, `reg_number`, `password`, `s_status`, `state`) VALUES
(5, 'MAHIR ', 'ALI', 'MALE', 765432190, 'MAHIR ', 'KDB 234U', 'MTIzNDU2', 'free', 'Active'),
(6, 'ASIYA', 'MOHAMMED', 'FEMALE', 789654231, 'ASIYA', 'KDQ 123Z', 'MTIzNDU2', 'free', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`cargo_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `shipping_id` (`shipping_id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`charge_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `cargo_id` (`cargo_id`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`pick_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `cargo_id` (`cargo_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `cargo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `charge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `pick_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `cargo_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `shipping` (`shipping_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`cargo_id`);

--
-- Constraints for table `pickup`
--
ALTER TABLE `pickup`
  ADD CONSTRAINT `pickup_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `pickup_ibfk_2` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`cargo_id`),
  ADD CONSTRAINT `pickup_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
