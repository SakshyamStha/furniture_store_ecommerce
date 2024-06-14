-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 07:34 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_password` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@email.com', '21232f297a57a5a743894a0e4a801fc3');

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
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, '0.00', 'Not Paid', 0, 0, '', '', '2024-06-08 16:21:32'),
(17, '2000.00', 'Not Paid', 4, 123, 'ma', 'fen', '2024-06-13 18:59:25'),
(18, '2000.00', 'Not Paid', 4, 123, 'ma', 'fen', '2024-06-13 18:59:54'),
(19, '2000.00', 'Not Paid', 4, 123, 'ma', 'fen', '2024-06-13 19:04:04'),
(23, '7600.00', 'paid', 4, 2147483647, 'ma', 'fen', '2024-06-14 00:00:00'),
(24, '17600.00', 'Not Paid', 4, 2147483647, 'ma', 'fen', '2024-06-14 00:00:00'),
(25, '12200.00', 'paid', 5, 2147483647, 'ktm', 'samakhushi 26 dumba marga', '2024-06-14 00:00:00');

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
(11, 9, '7', 'carpet1', 'carpet1.jpg', '5000.00', 1, 1, '2024-06-11 07:24:24'),
(12, 10, '4', 'chair1', 'chair1.jpg', '2000.00', 1, 3, '2024-06-12 03:48:16'),
(13, 11, '4', 'chair1', 'chair1.jpg', '2000.00', 1, 3, '2024-06-12 04:31:55'),
(14, 12, '5', 'Pumpkin Shaped Couch', 'sofa2.jpg', '10000.00', 1, 3, '2024-06-12 04:39:09'),
(15, 13, '1', 'Lounge Chair with Ottoman', 'ochair2.jpg', '8000.00', 3, 3, '2024-06-12 14:43:49'),
(16, 14, '10', 'Arch Mirror', 'mirror1.jpg', '2600.00', 1, 4, '2024-06-13 09:44:28'),
(17, 15, '5', 'Pumpkin Shaped Couch', 'sofa2.jpg', '10000.00', 1, 4, '2024-06-13 09:53:09'),
(18, 16, '4', 'Hollow Nordic vase', 'vase1.jpg', '2000.00', 1, 4, '2024-06-13 14:28:51'),
(19, 17, '4', 'Hollow Nordic vase', 'vase1.jpg', '2000.00', 1, 4, '2024-06-13 18:59:25'),
(20, 18, '4', 'Hollow Nordic vase', 'vase1.jpg', '2000.00', 1, 4, '2024-06-13 18:59:54'),
(21, 19, '4', 'Hollow Nordic vase', 'vase1.jpg', '2000.00', 1, 4, '2024-06-13 19:04:04'),
(22, 20, '4', 'Hollow Nordic vase', 'vase1.jpg', '2000.00', 1, 4, '2024-06-13 19:07:03'),
(23, 21, '4', 'Hollow Nordic vase', 'vase1.jpg', '2000.00', 1, 4, '2024-06-13 00:00:00'),
(24, 21, '1', 'Lounge Chair with Ottoman', 'ochair2.jpg', '8000.00', 1, 4, '2024-06-13 00:00:00'),
(25, 22, '8', 'Moon Lamp', 'moonlamp3.jpg', '5000.00', 1, 4, '2024-06-13 00:00:00'),
(26, 23, '8', 'Moon Lamp', 'moonlamp3.jpg', '5000.00', 1, 4, '2024-06-14 00:00:00'),
(27, 23, '10', 'Arch Mirror', 'mirror1.jpg', '2600.00', 1, 4, '2024-06-14 00:00:00'),
(28, 24, '8', 'Moon Lamp', 'moonlamp3.jpg', '5000.00', 1, 4, '2024-06-14 00:00:00'),
(29, 24, '10', 'Arch Mirror', 'mirror1.jpg', '2600.00', 1, 4, '2024-06-14 00:00:00'),
(30, 24, '5', 'Pumpkin Shaped Couch', 'sofa2.jpg', '10000.00', 1, 4, '2024-06-14 00:00:00'),
(31, 25, '9', 'Coffee Table', 'ctable2.jpg', '4200.00', 1, 5, '2024-06-14 00:00:00'),
(32, 25, '1', 'Lounge Chair with Ottoman', 'ochair2.jpg', '8000.00', 1, 5, '2024-06-14 00:00:00');

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
(1, 'Lounge Chair with Ottoman', 'Chair', 'Experience ultimate relaxation with our lounge chair and ottoman set. Featuring ergonomic design and plush cushioning, it offers superior comfort and style. Perfect for lounging, reading, or unwinding in any living space.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'ochair2.jpg', 'ochair3.jpg', 'ochair1.jpg', '', '8000.00', 0, 'gray'),
(4, 'Hollow Nordic vase', 'Accessories', 'Embrace minimalist elegance with our Hollow Nordic Ceramic Vase. Crafted from premium ceramic with a sleek, hollow design, this vase is perfect for fresh or dried flowers. ', 'vase1.jpg', 'vase2.jpg', 'vase3.jpg', '', '2000.00', 0, 'black'),
(5, 'Pumpkin Shaped Couch', 'Sofa', 'This charming piece combines playful design with plush comfort, making it a standout addition to any living space. Upholstered in high-quality fabric and featuring ergonomic cushioning, the Pumpkin Shaped Couch offers both style and relaxation.', 'sofa2.jpg', 'sofa3.jpg', 'sofa4.jpg', '', '10000.00', 0, 'all'),
(6, 'Tiffany Lamp', 'lamp', 'Illuminate your home with timeless elegance using our exquisite Tiffany Lamp. Renowned for their intricate stained glass designs, Tiffany lamps bring a touch of vintage charm and artistic flair to any room.', 'tiffanylamp1.jpg', 'tiffanylamp2.jpg', 'tiffanylamp3.jpg', 'tiffanylamp3.jpg', '9500.00', 0, 'all'),
(7, 'Bohemian rug', 'Carpet', 'Transform your living space with the vibrant and eclectic charm of our Bohemian Rug. Perfect for adding a touch of free-spirited style and warmth, this rug is an ideal centerpiece for any room seeking a boho-chic flair.', 'bohorug1.jpg', 'bohorug2.jpg', 'bohorug3.jpg', '', '5000.00', 0, 'all'),
(8, 'Moon Lamp', 'lamp', 'Experience the mesmerizing glow of our Moon Lamp. With realistic 3D-printed details, adjustable brightness, and rechargeable convenience, it adds a touch of celestial charm to any room, creating a serene ambiance.', 'moonlamp3.jpg', 'moonlamp1.jpg', 'moonlamp2.jpg', '', '5000.00', 0, 'all'),
(9, 'Coffee Table', 'Table', 'Complete your living space with our stylish coffee table. Featuring a sleek design and durable materials, it offers both functionality and elegance. Perfect for displaying decor, holding drinks, and enhancing your room\'s ambiance.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'ctable2.jpg', 'ctable3.jpg', 'ctable1.jpg', '', '4200.00', 0, 'brown'),
(10, 'Arch Mirror', 'wall', 'Enhance your decor with our elegant Arch Mirror. Featuring a gracefully curved design and high-quality glass, it adds sophistication and light to any room, perfect for entryways, bedrooms, living rooms, or bathrooms.', 'mirror1.jpg', 'mirror3.jpg', 'mirror2.jpg', '', '2600.00', 0, 'golden'),
(11, 'Hanging Chair', 'chair', 'very comfortable chair where you can sit and swing away your tensions.', 'Hanging Chair1.jpeg', 'Hanging Chair2.jpeg', 'Hanging Chair3.jpeg', 'Hanging Chair4.jpeg', '7750.00', 0, 'golden');

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
(2, 'shambhu lal shrestha', 'shambhushrestha628@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(3, 'mihika', 'mihika.ranjit1@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(4, 'zalwa', 'zalwa1@email.com', '25f9e794323b453885f5181f1b624d0b'),
(5, 'Saksham', 'sakshamstha123@gmail.com', '9a296184eb3f6798b505a243859edbd7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
