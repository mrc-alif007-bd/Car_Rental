CREATE TABLE `customers` (
  `customer_id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `email` varchar(255),
  `phone` varchar(255),
  `address` varchar(255),
  `license_no` varchar(255),
  `password` varchar(255),
  `created_at` datetime
);

CREATE TABLE `cars` (
  `car_id` int PRIMARY KEY AUTO_INCREMENT,
  `car_name` varchar(255),
  `brand` varchar(255),
  `type` varchar(255),
  `model_year` int,
  `registration_no` varchar(255),
  `rent_price` decimal,
  `status` varchar(255),
  `image` varchar(255)
);

CREATE TABLE `bookings` (
  `booking_id` int PRIMARY KEY AUTO_INCREMENT,
  `customer_id` int,
  `car_id` int,
  `start_date` date,
  `end_date` date,
  `total_amount` decimal,
  `booking_status` varchar(255),
  `created_at` datetime
);

CREATE TABLE `payments` (
  `payment_id` int PRIMARY KEY AUTO_INCREMENT,
  `booking_id` int,
  `amount` decimal,
  `payment_method` varchar(255),
  `payment_date` datetime,
  `status` varchar(255)
);

CREATE TABLE `admin` (
  `admin_id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `password` varchar(255),
  `role` varchar(255)
);

ALTER TABLE `bookings` ADD FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

ALTER TABLE `bookings` ADD FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`);

ALTER TABLE `payments` ADD FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`);
