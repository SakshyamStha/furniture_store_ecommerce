-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 05:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
(1, 0.00, 'Not Paid', 0, 0, '', '', '2024-06-08 16:21:32'),
(2, 9999.99, 'Not Paid', 1, 2147483647, 'madrid', 'fen', '2024-06-08 13:03:48'),
(3, 9999.99, 'Not Paid', 1, 2147483647, 'ma', 'fen', '2024-06-08 13:27:54'),
(4, 9999.99, 'Not Paid', 1, 2147483647, 'ma', 'fen', '2024-06-09 09:59:33'),
(5, 9999.99, 'Not Paid', 1, 2147483647, 'ma', 'fen', '2024-06-09 10:14:31'),
(6, 9999.99, 'Not Paid', 1, 2147483647, 'ma', 'fen', '2024-06-10 07:06:59'),
(7, 20000.00, 'Not Paid', 2, 2147483647, 'ktm', 'pokhara', '2024-06-10 19:13:51'),
(8, 5000.00, 'Not Paid', 2, 2147483647, 'ktm', 'pokhara', '2024-06-10 19:21:38'),
(9, 5000.00, 'Not Paid', 1, 0, 'ma', 'fen', '2024-06-11 07:24:24'),
(10, 2000.00, 'Not Paid', 3, 2147483647, 'dwd', 'Kathmandu', '2024-06-12 03:48:16'),
(11, 2000.00, 'Not Paid', 3, 0, '', '', '2024-06-12 04:31:55'),
(12, 10000.00, 'Not Paid', 3, 2147483647, 'dwd', 'Kathmandu', '2024-06-12 04:39:09');

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
(1, 3, '3', 'sofa1', 'sofa1.jpg', 3500.00, 1, 1, '2024-06-08 13:27:54'),
(2, 3, '6', 'lamp1', 'lamp1.jpg', 7500.00, 2, 1, '2024-06-08 13:27:54'),
(3, 4, '3', 'sofa1', 'sofa1.jpg', 3500.00, 1, 1, '2024-06-09 09:59:33'),
(4, 4, '6', 'lamp1', 'lamp1.jpg', 7500.00, 2, 1, '2024-06-09 09:59:33'),
(5, 5, '3', 'sofa1', 'sofa1.jpg', 3500.00, 1, 1, '2024-06-09 10:14:31'),
(6, 5, '6', 'lamp1', 'lamp1.jpg', 7500.00, 2, 1, '2024-06-09 10:14:31'),
(7, 6, '3', 'sofa1', 'sofa1.jpg', 3500.00, 1, 1, '2024-06-10 07:06:59'),
(8, 6, '6', 'lamp1', 'lamp1.jpg', 7500.00, 5, 1, '2024-06-10 07:06:59'),
(9, 7, '5', 'sofa1', 'sofa1.jpg', 10000.00, 2, 2, '2024-06-10 19:13:51'),
(10, 8, '7', 'carpet1', 'carpet1.jpg', 5000.00, 1, 2, '2024-06-10 19:21:38'),
(11, 9, '7', 'carpet1', 'carpet1.jpg', 5000.00, 1, 1, '2024-06-11 07:24:24'),
(12, 10, '4', 'chair1', 'chair1.jpg', 2000.00, 1, 3, '2024-06-12 03:48:16'),
(13, 11, '4', 'chair1', 'chair1.jpg', 2000.00, 1, 3, '2024-06-12 04:31:55'),
(14, 12, '5', 'Pumpkin Shaped Couch', 'sofa2.jpg', 10000.00, 1, 3, '2024-06-12 04:39:09');

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
(1, 'Lounge Chair with Ottoman', 'Chair', 'Experience ultimate relaxation with our lounge chair and ottoman set. Featuring ergonomic design and plush cushioning, it offers superior comfort and style. Perfect for lounging, reading, or unwinding in any living space.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'ochair2.jpg', 'ochair3.jpg', 'ochair1.jpg', '', 8000.00, 0, 'gray'),
(4, 'Hollow Nordic vase', 'Accessories', 'Embrace minimalist elegance with our Hollow Nordic Ceramic Vase. Crafted from premium ceramic with a sleek, hollow design, this vase is perfect for fresh or dried flowers. ', 'vase1.jpg', 'vase2.jpg', 'vase3.jpg', '', 2000.00, 0, 'black'),
(5, 'Pumpkin Shaped Couch', 'Sofa', 'This charming piece combines playful design with plush comfort, making it a standout addition to any living space. Upholstered in high-quality fabric and featuring ergonomic cushioning, the Pumpkin Shaped Couch offers both style and relaxation.', 'sofa2.jpg', 'sofa3.jpg', 'sofa4.jpg', '', 10000.00, 0, 'all'),
(6, 'Tiffany Lamp', 'Lighting', 'Illuminate your home with timeless elegance using our exquisite Tiffany Lamp. Renowned for their intricate stained glass designs, Tiffany lamps bring a touch of vintage charm and artistic flair to any room.', 'tiffanylamp1.jpg', 'tiffanylamp2.jpg', 'tiffanylamp3.jpg', 'tiffanylamp3.jpg', 9500.00, 0, 'all'),
(7, 'Bohemian rug', 'Carpet', 'Transform your living space with the vibrant and eclectic charm of our Bohemian Rug. Perfect for adding a touch of free-spirited style and warmth, this rug is an ideal centerpiece for any room seeking a boho-chic flair.', 'bohorug1.jpg', 'bohorug2.jpg', 'bohorug3.jpg', '', 5000.00, 0, 'all'),
(8, 'Moon Lamp', 'Lighting', 'Experience the mesmerizing glow of our Moon Lamp. With realistic 3D-printed details, adjustable brightness, and rechargeable convenience, it adds a touch of celestial charm to any room, creating a serene ambiance.', 'moonlamp3.jpg', 'moonlamp1.jpg', 'moonlamp2.jpg', '', 5000.00, 0, 'all'),
(9, 'Coffee Table', 'Table', 'Complete your living space with our stylish coffee table. Featuring a sleek design and durable materials, it offers both functionality and elegance. Perfect for displaying decor, holding drinks, and enhancing your room\'s ambiance.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'ctable2.jpg', 'ctable3.jpg', 'ctable1.jpg', '', 4200.00, 0, 'brown'),
(10, 'Arch Mirror', 'Wall decor', 'Enhance your decor with our elegant Arch Mirror. Featuring a gracefully curved design and high-quality glass, it adds sophistication and light to any room, perfect for entryways, bedrooms, living rooms, or bathrooms.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'mirror1.jpg', 'mirror3.jpg', 'mirror2.jpg', '', 2600.00, 0, 'golden');

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
(3, 'mihika', 'mihika.ranjit1@gmail.com', '25d55ad283aa400af464c76d713c07ad');

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
