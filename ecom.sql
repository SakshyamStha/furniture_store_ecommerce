-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 08:30 AM
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
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, '0.00', 'Not Paid', 0, 0, '', '', '2024-06-08 16:21:32'),
(2, '9999.99', 'Not Paid', 1, 2147483647, 'madrid', 'fen', '2024-06-08 13:03:48'),
(3, '9999.99', 'Not Paid', 1, 2147483647, 'ma', 'fen', '2024-06-08 13:27:54'),
(4, '9999.99', 'Not Paid', 1, 2147483647, 'ma', 'fen', '2024-06-09 09:59:33'),
(5, '9999.99', 'Not Paid', 1, 2147483647, 'ma', 'fen', '2024-06-09 10:14:31'),
(6, '9999.99', 'Not Paid', 1, 2147483647, 'ma', 'fen', '2024-06-10 07:06:59'),
(7, '20000.00', 'Not Paid', 2, 2147483647, 'ktm', 'pokhara', '2024-06-10 19:13:51'),
(8, '5000.00', 'Not Paid', 2, 2147483647, 'ktm', 'pokhara', '2024-06-10 19:21:38'),
(9, '5000.00', 'Not Paid', 1, 0, 'ma', 'fen', '2024-06-11 07:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 3, '3', 'sofa1', 'sofa1.jpg', '3500.00', 1, 1, '2024-06-08 13:27:54'),
(2, 3, '6', 'lamp1', 'lamp1.jpg', '7500.00', 2, 1, '2024-06-08 13:27:54'),
(3, 4, '3', 'sofa1', 'sofa1.jpg', '3500.00', 1, 1, '2024-06-09 09:59:33'),
(4, 4, '6', 'lamp1', 'lamp1.jpg', '7500.00', 2, 1, '2024-06-09 09:59:33'),
(5, 5, '3', 'sofa1', 'sofa1.jpg', '3500.00', 1, 1, '2024-06-09 10:14:31'),
(6, 5, '6', 'lamp1', 'lamp1.jpg', '7500.00', 2, 1, '2024-06-09 10:14:31'),
(7, 6, '3', 'sofa1', 'sofa1.jpg', '3500.00', 1, 1, '2024-06-10 07:06:59'),
(8, 6, '6', 'lamp1', 'lamp1.jpg', '7500.00', 5, 1, '2024-06-10 07:06:59'),
(9, 7, '5', 'sofa1', 'sofa1.jpg', '10000.00', 2, 2, '2024-06-10 19:13:51'),
(10, 8, '7', 'carpet1', 'carpet1.jpg', '5000.00', 1, 2, '2024-06-10 19:21:38'),
(11, 9, '7', 'carpet1', 'carpet1.jpg', '5000.00', 1, 1, '2024-06-11 07:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(108) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `product_image4` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_special_offer` int(2) DEFAULT NULL,
  `product_color` varchar(108) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(4, 'chair1', 'chair', 'very sturdy chair', 'chair1.jpg', 'chair1.jpg', 'chair1.jpg', 'chair1.jpg', '2000.00', 0, 'black'),
(5, 'sofa1', 'sofa', 'nice sofa', 'sofa1.jpg', 'sofa2.jpg', 'sofa3.jpg', 'sofa4.jpg', '10000.00', 0, 'all'),
(6, 'lamp1', 'lamp', 'good lamp', 'lamp1.jpg', 'lamp2.jpg', 'lamp3.jpg', 'lamp4.jpg', '7500.00', 0, 'all'),
(7, 'carpet1', 'carpet', 'good carpet', 'carpet1.jpg', 'carpet2.jpg', 'carpet3.jpg', 'carpet4.jpg', '5000.00', 0, 'all');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(108) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'ram', 'ram@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(2, 'shambhu lal shrestha', 'shambhushrestha628@gmail.com', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
