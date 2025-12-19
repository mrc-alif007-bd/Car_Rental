-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2025 at 11:48 AM
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
-- Database: `car_rental`
--
CREATE DATABASE IF NOT EXISTS `car_rental` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `car_rental`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `permissions` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advance_payments`
--

CREATE TABLE `advance_payments` (
  `advance_payment_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `method_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `car_name` varchar(30) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `booking_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `car_id`, `car_name`, `start_date`, `end_date`, `total_amount`, `booking_status`, `created_at`) VALUES
(1, 23, 'Toyota', '2025-12-26', '2025-12-24', 6500.00, 'Pendding', '2025-12-19 09:14:20'),
(2, 23, 'Toyota', '2025-12-26', '2025-12-24', 6500.00, 'Pendding', '2025-12-19 09:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(120) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `model_year` int(11) DEFAULT NULL,
  `registration_no` varchar(50) DEFAULT NULL,
  `rent_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `type`, `model_year`, `registration_no`, `rent_price`, `status`, `image`, `details`) VALUES
(13, 'Quincy Wolf', 'Sit ut illum maxime', 1996, 'Ab illum qui volupt', 7500.00, 'Ut obcaecati atque l', 'img/car_03.jfif', 'lorem ipsum'),
(14, 'BMW', 'suv', 2016, '48749067', 5500.00, 'ok', 'img/car_07.jfif', 'lorem ipsum'),
(15, 'Mercedes', 'suv', 2017, '87976526', 7000.00, 'ok', 'img/car_10.jfif', 'lorem ipsum'),
(16, 'Toyota', 'suv', 2018, '57364512', 6000.00, 'ok', 'img/car_03.01.jfif', 'lorem ipsum'),
(18, 'BMW', 'suv', 2017, '58658655', 8000.00, 'ok', 'img/car_06.jfif', 'lorem ipsum'),
(19, 'BMW', 'suv', 2017, '51232377', 8500.00, 'ok', 'img/car_08.jfif', 'lorem ipsum'),
(21, 'Mercedes', 'suv', 2020, '51234377', 7000.00, 'ok', 'img/car_07.jfif', 'lorem ipsum'),
(22, 'Toyota', 'suv', 2020, '76094321', 7500.00, 'ok', 'img/car_06.jfif', 'lorem ipsum'),
(23, 'Toyota', 'suv', 2019, '78642356', 6500.00, 'ok', 'img/car_10.jfif', 'lorem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `u_name`, `u_email`, `phone`, `subject`, `message`) VALUES
(1, 'Cassandra Meyer', 'tasa@mailinator.com', '+1 (248) 258-2586', 'Voluptas illo placea', 'Est excepteur adipi'),
(2, 'Colette Chapman', 'nugo@mailinator.com', '+1 (336) 503-5621', 'Mollitia quia vero a', 'Vitae repudiandae au');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `license_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `method_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `method_id` int(11) NOT NULL,
  `method_name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `message` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `u_name`, `message`) VALUES
(1, 'Dhfv Bmsdh', 'nfhdkd fvj jcbcm  dx cbdmc  jdvkje  jrbfuf  jf  jd fjfkfkjdbd vjdnff fjfjfkghrobh nfk nvhfjc dfjgoe.  bhvvjvkc gvj mfbjm'),
(2, ' Bmsdh Xdhdj', 'vhasfeugd ufebh  ituwerv fhdkd fvj jcbcm  dx cbdmc  jdvkje  jrbfuf  jf  jd fjfkfkjdbd vjdnff ghrobh nfk nvhfjc dfjgoe.  bhvvjvkc gvj mfbjm'),
(3, 'Vxhdb', 'hoifenm viyfn mv wrn fyufasjkfdk ewrit6wfgsdg  ytwejhkdmvna x yfe vuf dvygwe '),
(4, 'Fdjhg Hxdhdj', 'fsgdk, gcxft  tdterf tertf st dstergf  fyeiru fd rtgfd  ugfkdjyfu g fkkjykufk '),
(5, 'Ghjg Fsfb', 'jkf fsgdkjy wjd tekt cdjt ehtwbeve ebvn bg nynyunbetgjjn e nk gcxft  tdterf tertf st dstergf  fyeiru fd rtgfd  ugfkdjyfu g fkkjykufk ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', NULL),
(3, 'employee', 'employee@gmail.com', 'fa5473530e4d1a5a1e1eb53d2fedb10c', '2', NULL),
(4, 'cleint', 'cleint@gmail.com', 'b5a19d74a977fd08612e71ac7fe244cb', '3', NULL),
(5, 'kawsar', 'kawsar@gmail.com', '8a15329d6eaf13bce1193bd42d0dd5aa', '2', '2025-12-17 19:47:12'),
(6, 'tareq', 'tareq@gmail.com', '0d20b93812a60f072cbcf2ac64b271a6', '2', '2025-12-17 19:48:35'),
(7, 'ziya', 'ziya@gmail.com', 'd77f18448567c402188661e60731311b', '2', '2025-12-17 19:50:05'),
(8, 'rana', 'rana@gmail.com', '90a1e95dba0d3d9c11e3f220cc4f7879', '2', '2025-12-17 19:50:05'),
(9, 'arif', 'arif@gmail.com', '0ff6c3ace16359e41e37d40b8301d67f', '3', '2025-12-17 19:52:11'),
(10, 'rakib', 'rakib@gmail.com', 'a36949228c1d9146cace6359d88968e8', '3', '2025-12-17 19:52:11'),
(11, 'naziur', 'naziur@gmail.com', '30fa864f0bfa3a355853a921e2c769eb', '3', '2025-12-17 19:52:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `advance_payments`
--
ALTER TABLE `advance_payments`
  ADD PRIMARY KEY (`advance_payment_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `method_id` (`method_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `method_id` (`method_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advance_payments`
--
ALTER TABLE `advance_payments`
  MODIFY `advance_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
