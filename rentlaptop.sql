-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 11:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentlaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) UNSIGNED NOT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_image` varchar(225) NOT NULL,
  `a_email` varchar(30) NOT NULL,
  `a_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_image`, `a_email`, `a_password`) VALUES
(6, 'Dipesh Thakur', '../img/admin/105.jpg', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) UNSIGNED NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_address` varchar(30) NOT NULL,
  `c_contact` varchar(10) NOT NULL,
  `c_profile` varchar(225) NOT NULL,
  `c_email` varchar(30) NOT NULL,
  `c_password` varchar(30) NOT NULL,
  `account_status` varchar(20) DEFAULT 'pending',
  `a_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_address`, `c_contact`, `c_profile`, `c_email`, `c_password`, `account_status`, `a_id`) VALUES
(18, 'bikesh thakur', 'kathmandu', '9876453727', '../img/customer/profile/img7.png', 'bikesh@gmail.com', '123456', 'approve', 6);

-- --------------------------------------------------------

--
-- Table structure for table `customer_credential`
--

CREATE TABLE `customer_credential` (
  `credential_id` int(11) UNSIGNED NOT NULL,
  `credential_name` varchar(30) NOT NULL,
  `front_side` varchar(225) NOT NULL,
  `back_side` varchar(225) NOT NULL,
  `c_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_credential`
--

INSERT INTO `customer_credential` (`credential_id`, `credential_name`, `front_side`, `back_side`, `c_id`) VALUES
(10, 'Citizenship', '../../img/customer/credential/Screenshot (187).png', '../../img/customer/credential/Screenshot (134).png', 18);

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `lap_id` int(11) UNSIGNED NOT NULL,
  `lap_name` varchar(30) NOT NULL,
  `processor` varchar(30) NOT NULL,
  `lap_model` varchar(40) NOT NULL,
  `lap_brand` varchar(30) NOT NULL,
  `lap_color` varchar(30) NOT NULL,
  `lap_ssd` varchar(10) NOT NULL,
  `lap_ram` varchar(10) NOT NULL,
  `lap_speed` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `lap_image` varchar(225) NOT NULL,
  `o_id` int(11) UNSIGNED DEFAULT NULL,
  `lap_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`lap_id`, `lap_name`, `processor`, `lap_model`, `lap_brand`, `lap_color`, `lap_ssd`, `lap_ram`, `lap_speed`, `description`, `lap_image`, `o_id`, `lap_status`) VALUES
(19, 'dell Inspiron5', 'i5', 'e234', 'dell', 'black', '256', '8', '3426', 'this is the best laptop for basic use ', 'img/laptop/erick-cerritos-i5UV2HpITYA-unsplash.jpg', 14, 'available'),
(20, 'inspiron5', 'i7', '2342', 'dell', 'white', '256', '16', '3245', 'this is the best ', 'img/laptop/e.jpg', 14, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `o_id` int(11) UNSIGNED NOT NULL,
  `o_name` varchar(30) NOT NULL,
  `o_address` varchar(30) NOT NULL,
  `o_contact` varchar(10) NOT NULL,
  `o_profile` varchar(225) NOT NULL,
  `o_email` varchar(30) NOT NULL,
  `o_password` varchar(10) NOT NULL,
  `account_status` varchar(20) DEFAULT 'pending',
  `a_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`o_id`, `o_name`, `o_address`, `o_contact`, `o_profile`, `o_email`, `o_password`, `account_status`, `a_id`) VALUES
(14, 'dipesh', 'kathmandu', '9804327158', '../img/owner/profile/2019-02-24-11-21-47-235.jpg', 'dipesh@gmail.com', '123456', 'approve', 6);

-- --------------------------------------------------------

--
-- Table structure for table `owner_credential`
--

CREATE TABLE `owner_credential` (
  `credential_id` int(11) UNSIGNED NOT NULL,
  `credential_name` varchar(30) NOT NULL,
  `front_side` varchar(225) NOT NULL,
  `back_side` varchar(225) NOT NULL,
  `o_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_credential`
--

INSERT INTO `owner_credential` (`credential_id`, `credential_name`, `front_side`, `back_side`, `o_id`) VALUES
(20, 'Citizenship', '../../img/owner/credential/Screenshot (288).png', '../../img/owner/credential/Screenshot (133).png', 14);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) UNSIGNED NOT NULL,
  `rental_id` int(11) UNSIGNED DEFAULT NULL,
  `first_installment` int(10) NOT NULL,
  `first_payment_date` date DEFAULT NULL,
  `add_charge` int(10) DEFAULT NULL,
  `last_installment` int(10) NOT NULL,
  `last_payment_date` date DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `rental_id` int(11) UNSIGNED NOT NULL,
  `rental_date` date NOT NULL,
  `return_date` date NOT NULL,
  `o_id` int(11) UNSIGNED DEFAULT NULL,
  `lap_id` int(11) UNSIGNED DEFAULT NULL,
  `c_id` int(11) UNSIGNED DEFAULT NULL,
  `rental_status` varchar(15) DEFAULT NULL,
  `payment` int(12) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `customer_credential`
--
ALTER TABLE `customer_credential`
  ADD PRIMARY KEY (`credential_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`lap_id`),
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `owner_credential`
--
ALTER TABLE `owner_credential`
  ADD PRIMARY KEY (`credential_id`),
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `rental_id` (`rental_id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `o_id` (`o_id`),
  ADD KEY `lap_id` (`lap_id`),
  ADD KEY `c_id` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_credential`
--
ALTER TABLE `customer_credential`
  MODIFY `credential_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `lap_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `o_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `owner_credential`
--
ALTER TABLE `owner_credential`
  MODIFY `credential_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rental_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_credential`
--
ALTER TABLE `customer_credential`
  ADD CONSTRAINT `customer_credential_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `owner` (`o_id`);

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`);

--
-- Constraints for table `owner_credential`
--
ALTER TABLE `owner_credential`
  ADD CONSTRAINT `owner_credential_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `owner` (`o_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`rental_id`) REFERENCES `rental` (`rental_id`);

--
-- Constraints for table `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `owner` (`o_id`),
  ADD CONSTRAINT `rental_ibfk_2` FOREIGN KEY (`lap_id`) REFERENCES `laptop` (`lap_id`),
  ADD CONSTRAINT `rental_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
