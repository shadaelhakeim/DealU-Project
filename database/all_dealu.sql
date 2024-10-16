-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 09:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dealu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin1@gmail.com', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'clothes'),
(3, 'Food'),
(6, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `percentage` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `image`, `percentage`) VALUES
(1, 'uber20', '1684700184-photo_2023-05-07_17-28-48.jpg', 20),
(2, 'nike30', '1684700212-photo_2023-04-11_23-46-43.jpg', 30),
(3, 'Krisptkreme90', '1684700293-photo_2023-04-11_23-46-40.jpg', 90),
(4, 'dom50', '1684700244-photo_2023-04-11_23-46-46.jpg', 50),
(5, 'WLIpF4MQdC', 'coupon.png', 3),
(6, 'tF6wEF8q3R', 'coupon.png', 3),
(7, '0FLTQV6fSi', 'coupon.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `for_gender` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `price` int(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `expires_in` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `for_gender`, `type`, `price`, `image`, `expires_in`, `description`, `category_id`) VALUES
(2, '2 Sandwiches + 2 Fries + 2 Cola for EGP 265 instead of EGP 310', 'male', 'online', 100, 'Buffalo 2 Sandwich Offer.jpg', '2024-05-21', 'Choose 2 200gm sandwiches + 2 Fries + 2 Colas and buffalo sauce at Buffalo Burger and pay Only EGP 265 instead of EGP 310 <br>\r\n          Sandwiches available in this offer: Old School 200 gm', 1),
(3, 'offer 2', 'male', 'in_store', 120, '1684510222-easykash-logo.png', '', 'asdas das sad asd ads', 3),
(4, 'offer 3', 'male', 'in_store', 110, '1684510222-easykash-logo.png', '', 'asdas das sad asd ads slamo', 1),
(5, 'offer 4', 'female', 'in_store', 400, '1684583604-mike_ross.jfif', '2023-05-20', 'dfsd lorem  11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(191) NOT NULL,
  `qr_code` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `rating` int(11) NOT NULL,
  `type_of_payment` varchar(191) NOT NULL,
  `payment` varchar(191) DEFAULT NULL,
  `total_price` int(191) NOT NULL,
  `coupon_id` int(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `qr_code`, `code`, `rating`, `type_of_payment`, `payment`, `total_price`, `coupon_id`) VALUES
(1, 1, 'accepted', '1684528480-mike_ross.jfif', 'xL1KG0jFJw', 0, 'cash', '0', 200, 0),
(2, 1, 'rejected', '', '', 0, 'cash', '0', 200, 0),
(4, 1, 'rejected', '1684583909-class_idea.jpg', 'N1Z1VWzlq0', 0, 'visa', '$2y$10$grrsi7dWqNpKG6exuqxf7ed5wwmUTDsStqNckzhZVKkOlKX/6t42W', 168, 2),
(5, 3, 'submitted', '', '', 0, 'visa', '$2y$10$lcadUUh/WE4GMYjuQCVdzuMiyPcV7/5Gm6jPODe1RQxCPk5zFv6xm', 400, 4),
(6, 3, 'submitted', '', '', 0, 'cash', NULL, 100, NULL),
(7, 1, 'cart', '', '', 0, '', NULL, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `offer_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 3),
(4, 2, 3),
(5, 2, 4),
(6, 3, 2),
(7, 3, 3),
(9, 4, 2),
(10, 4, 4),
(11, 5, 2),
(12, 5, 5),
(13, 6, 2),
(14, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `plan_reservation`
--

CREATE TABLE `plan_reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type_of_payment` varchar(191) NOT NULL,
  `visa` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plan_reservation`
--

INSERT INTO `plan_reservation` (`id`, `user_id`, `plan_id`, `status`, `type_of_payment`, `visa`) VALUES
(1, 1, 1, 1, 'visa', 'sadjasjjasahahhashas'),
(3, 3, 1, 0, 'visa', '$2y$10$H8WX0VhKmZzVLgr16IVfmuuzAGsnHEf8A9e4YX9So7fU40.f3pj0i');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `offer_id`, `name`, `email`, `rate`, `message`) VALUES
(1, 1, 2, 'mohamed', 'mohamed@gmail.com', 0, 'lorem isaid'),
(2, 1, 2, 'mohamed ahmed', 'mohamed@gmail.com', 0, 'asdasasdasdas da s das  da sd as d askakkd ldp;asdas dasd asl;las;;d;as;\'d\'\'das'),
(3, 1, 2, 'sada', 'mohamed@gmail.com', 0, 'asdas'),
(4, 1, 2, 'dasas', 'mohamed@gmail.com', 5, 'asdas'),
(5, 1, 3, 'asds', 'asda@gmail.com', 3, 'sdas');

-- --------------------------------------------------------

--
-- Table structure for table `share_link`
--

CREATE TABLE `share_link` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `count` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `share_link`
--

INSERT INTO `share_link` (`id`, `user_id`, `offer_id`, `count`) VALUES
(1, 1, 2, 1001),
(2, 2, 3, 1),
(3, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subscribtion`
--

CREATE TABLE `subscribtion` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribtion`
--

INSERT INTO `subscribtion` (`id`, `email`) VALUES
(1, 'john@Gmail.com'),
(2, 'jjj@gmail.com'),
(3, 'jjj@gmail.com'),
(4, 'john@hhahs.vom'),
(5, 'adsa@gmail.com'),
(6, 'johnmahh179@g.xom'),
(7, ''),
(8, 'asdas@Gmail.ocm'),
(9, 'dassad@gmail.cxom');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `gender`, `address`, `password`) VALUES
(1, 'mohamed', 'homer57147@duscore.com', 1149929818, '', 'helwan', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(2, 'MOhamoud hamda', 'mohamoud@gmail.com', 111282881, 'male', '', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(3, 'Lydia', 'lydia@gmail.com', 1223487477, 'female', '', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_reservation`
--
ALTER TABLE `plan_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_link`
--
ALTER TABLE `share_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribtion`
--
ALTER TABLE `subscribtion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `plan_reservation`
--
ALTER TABLE `plan_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `share_link`
--
ALTER TABLE `share_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribtion`
--
ALTER TABLE `subscribtion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
