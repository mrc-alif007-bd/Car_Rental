-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2025 at 07:58 PM
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
  `client_name` varchar(150) NOT NULL,
  `client_id` int(11) NOT NULL,
  `nid` int(32) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `pick_address` varchar(100) NOT NULL,
  `drop_address` varchar(100) NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `booking_status` varchar(50) DEFAULT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `car_id`, `client_name`, `client_id`, `nid`, `start_date`, `end_date`, `pick_address`, `drop_address`, `total_amount`, `booking_status`, `invoice_id`, `created_at`) VALUES
(27, 14, 'admin', 0, 0, '1986-05-26', '1974-01-23', '', '', 5500.00, 'Pendding', '', '2025-12-19 14:46:18'),
(28, 14, 'admin', 0, 0, '1986-05-26', '1974-01-23', '', '', 5500.00, 'Pendding', '', '2025-12-19 14:51:11'),
(29, 14, 'admin', 0, 0, '2012-08-17', '2000-04-06', '', '', 5500.00, 'Pendding', '', '2025-12-19 14:51:40'),
(30, 14, 'client', 4, 0, '1998-11-15', '1975-03-03', '', '', 5500.00, 'Confirm', '', '2025-12-19 14:55:59'),
(31, 19, 'client', 4, 0, '1995-06-18', '2009-02-07', '', '', 8500.00, 'Pendding', '', '2025-12-19 15:03:36'),
(32, 19, 'client', 4, 0, '1987-05-13', '1988-06-30', '', '', 8500.00, 'Pendding', '', '2025-12-19 15:25:01'),
(33, 18, 'client', 4, 615, '1971-10-22', '1985-01-05', 'Aut eaque id magna ', 'Eum odio qui hic sim', 8000.00, 'Confirm', '', '2025-12-29 17:32:29'),
(34, 25, 'client', 4, 820, '1995-03-19', '1974-02-03', 'In rerum dignissimos', 'Ea eius ipsam nisi q', 7000.00, 'Confirmed', '', '2025-12-30 16:22:53'),
(35, 28, 'client', 4, 731, '1980-03-17', '1970-06-04', 'Laboris sint vitae c', 'Autem qui sit ea te', 8000.00, 'Pendding', '', '2025-12-31 12:28:29'),
(36, 28, 'client', 4, 46, '2007-04-10', '1976-05-19', 'Excepturi omnis et v', 'Eius aliquid volupta', 8000.00, 'paid', 'INV-208223', '2025-12-31 12:32:55'),
(37, 27, 'client', 4, 431, '2018-04-25', '1972-09-01', 'Officia elit aute i', 'Incididunt dolorem d', 8500.00, 'paid', 'INV-435897', '2025-12-31 12:45:59'),
(38, 25, 'client', 4, 524, '1991-09-26', '1970-12-13', 'Nostrum minus omnis ', 'Non pariatur Non au', 7000.00, 'paid', 'INV-900663', '2025-12-31 13:32:44');

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
  `status` enum('available','busy') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` varchar(150) NOT NULL,
  `roll` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `type`, `model_year`, `registration_no`, `rent_price`, `status`, `image`, `details`, `roll`) VALUES
(14, 'BMW', 'suv', 2016, '48749067', 5500.00, 'available', 'img/car_07.jfif', 'lorem ipsum', 1),
(15, 'Mercedes', 'suv', 2017, '87976526', 7000.00, 'available', 'img/car_10.jfif', 'lorem ipsum', 1),
(16, 'Toyota', 'suv', 2018, '57364512', 6000.00, 'available', 'img/car_03.01.jfif', 'lorem ipsum', 1),
(18, 'BMW', 'suv', 2017, '58658655', 8000.00, 'available', 'img/car_06.jfif', 'lorem ipsum', 2),
(19, 'BMW', 'suv', 2017, '51232377', 8500.00, 'available', 'img/car_08.jfif', 'lorem ipsum', 2),
(21, 'Mercedes', 'suv', 2020, '51234377', 7000.00, 'available', 'img/car_07.jfif', 'lorem ipsum', 3),
(24, 'Honda', 'suv', 2017, '75849390', 8000.00, 'available', 'img/car_03.01.jfif', 'lorem ipsum', 3),
(25, 'Toyota', 'suv', 2016, '54764528', 7000.00, 'available', 'img/car_10.jfif', 'lorem ipsum', 4),
(26, 'Mahindra', 'Jeep', 2020, '78642356', 5500.00, 'available', 'img/jeep01.jfif', 'lorem ipsum', 1),
(27, 'Mahindra', 'Jeep', 2017, '48749067', 8500.00, 'available', 'img/jeep02.jfif', 'lorem ipsum', 1),
(28, 'Mahindra', 'Jeep', 1995, '56012455', 8000.00, 'available', 'img/jeep03.jfif', 'lorem ipsum', 1);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', '2025-12-19 16:46:22'),
(3, 'employee', 'employee@gmail.com', 'fa5473530e4d1a5a1e1eb53d2fedb10c', '2', '2025-12-19 16:46:22'),
(4, 'client', 'client@gmail.com', '62608e08adc29a8d6dbc9754e659f125', '3', '2025-12-19 16:46:22'),
(5, 'kawsar', 'kawsar@gmail.com', '8a15329d6eaf13bce1193bd42d0dd5aa', '2', '2025-12-17 19:47:12'),
(6, 'tareq', 'tareq@gmail.com', '0d20b93812a60f072cbcf2ac64b271a6', '2', '2025-12-17 19:48:35'),
(9, 'arif', 'arif@gmail.com', '0ff6c3ace16359e41e37d40b8301d67f', '3', '2025-12-17 19:52:11'),
(10, 'rakib', 'rakib@gmail.com', 'a36949228c1d9146cace6359d88968e8', '3', '2025-12-17 19:52:11'),
(11, 'naziur', 'naziur@gmail.com', '30fa864f0bfa3a355853a921e2c769eb', '3', '2025-12-17 19:52:11'),
(12, 'ftsgf', 'uysdyg@gmail.com', '957e74b3f7b149f515978100d4705622', '3', '2025-12-19 17:02:51'),
(15, 'Dieter Rosa', 'luhiroko@mailinator.com', 'luhiroko', '2', '2025-12-31 18:54:02');

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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
