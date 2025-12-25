-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2025 at 10:01 AM
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
-- Database: `mini_ecom`
--
CREATE DATABASE IF NOT EXISTS `mini_ecom` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mini_ecom`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@test.com', '$2y$10$X4xiETjkMnyH.lbzeJ3Ni.4cnDIhCD6H.4fApU0WpUwyFS/iB5vmi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('paid','unpaid') DEFAULT 'paid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`id`, `order_id`, `user_id`, `product_id`, `quantity`, `price`, `status`, `created_at`) VALUES
(1, 'ORD1765811988', 2, 10, 2, 400.00, 'paid', '2025-12-15 15:19:48'),
(2, 'ORD1765811988', 2, 11, 1, 200.00, 'paid', '2025-12-15 15:19:48'),
(3, 'ORD1765811988', 2, 6, 1, 700.00, 'paid', '2025-12-15 15:19:48'),
(4, 'ORD1765812231', 2, 7, 1, 200.00, 'paid', '2025-12-15 15:23:51'),
(5, 'ORD1765812231', 2, 10, 3, 400.00, 'paid', '2025-12-15 15:23:51'),
(6, 'ORD1765812231', 2, 17, 2, 300.00, 'paid', '2025-12-15 15:23:51'),
(7, 'ORD1765812702', 2, 10, 1, 400.00, 'paid', '2025-12-15 15:31:42'),
(8, 'ORD1765812702', 2, 9, 5, 300.00, 'paid', '2025-12-15 15:31:42'),
(9, 'ORD1765812702', 2, 11, 1, 200.00, 'paid', '2025-12-15 15:31:42'),
(10, 'ORD1766591904', 2, 7, 2, 3299.00, 'paid', '2025-12-24 15:58:24'),
(11, 'ORD1766591904', 2, 6, 1, 2499.00, 'paid', '2025-12-24 15:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `card_holder_name` varchar(100) DEFAULT NULL,
  `card_last4` varchar(4) DEFAULT NULL,
  `card_expiry` date DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`id`, `order_id`, `user_id`, `card_holder_name`, `card_last4`, `card_expiry`, `billing_address`, `created_at`) VALUES
(1, 'ORD1765811899', 2, 'John Doe', '9963', '2031-10-01', 'some random address', '2025-12-15 15:18:19'),
(2, 'ORD1765811988', 2, 'Jon', '9056', '2034-11-01', 'some randome address', '2025-12-15 15:19:48'),
(3, 'ORD1765812231', 2, 'John Doe', '4938', '2030-08-01', 'random adress 3', '2025-12-15 15:23:51'),
(4, 'ORD1765812702', 2, 'Abc', '9087', '2033-06-01', 'some address', '2025-12-15 15:31:42'),
(5, 'ORD1766591904', 2, 'Abcd', '9012', '2035-10-01', 'asdfdfdf', '2025-12-24 15:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `imageUrl`) VALUES
(6, 'StreetFlex Runner', '2499', 'Lightweight everyday sneakers designed for comfort and durability. Perfect for casual wear and long walks.', 'images/PROD_1766590439_1831.jpg'),
(7, 'Urban High-Tops', '3299', 'Stylish high-top sneakers with ankle support and a bold streetwear look. Ideal for fashion-forward outfits.', 'images/PROD_1766590693_2477.jpg'),
(8, 'AirStride Sports Shoes', '2999', 'Breathable mesh sports shoes with cushioned soles for running, gym workouts, and active lifestyles.', 'images/PROD_1766590853_3306.jpg'),
(9, 'Classic White Sneakers', '2199', 'Minimalist white sneakers that match any outfit. Clean design with premium synthetic leather finish.', 'images/PROD_1766590996_3594.jpg'),
(10, 'Velocity Trainers', '3499', 'Performance-focused trainers with shock-absorbing soles and strong grip for intense training sessions.', 'images/PROD_1766591142_3566.jpg'),
(11, 'Retro Vibe Sneakers', '2799', 'Inspired by vintage sneaker designs with modern comfort technology. Perfect blend of old-school and new.', 'images/PROD_1766591220_1653.jpg'),
(12, 'FlexKnit Slip-Ons', '1999', 'Easy-to-wear slip-on shoes with flexible knit fabric for all-day comfort and effortless style.', 'images/PROD_1766591445_3998.jpg'),
(13, 'StreetPro Low-Tops', '2599', 'Low-top sneakers with reinforced soles and trendy color combinations for everyday urban wear.', 'images/PROD_1766591590_2820.jpg'),
(14, 'TrailBlaze Outdoor Shoes', '3899', 'Rugged outdoor shoes built for rough terrain, featuring extra grip and water-resistant material.', 'images/PROD_1766591726_29124.jpg'),
(15, 'Luxe Leather Sneakers', '4499', 'Premium leather sneakers with a sleek finish, designed for both casual and semi-formal looks.', 'images/PROD_1766651668_2817.jpg'),
(16, 'CloudWalk Sneakers', '2699', 'Ultra-soft cushioned sneakers designed for all-day walking and daily comfort with a modern look.', 'images/PROD_1766651795_4141.jpg'),
(17, 'PowerGrip Running Shoes', '3199', 'High-performance running shoes with enhanced grip, breathable fabric, and responsive sole support.', 'images/PROD_1766651870_4523.jpg'),
(18, 'MonoBlack Street Sneakers', '2399', 'All-black sneakers with a sleek, bold design—perfect for night wear, casual outfits, and daily use.', 'images/PROD_1766651929_3557.jpg'),
(19, 'SwiftLite Trainers', '2899', 'Feather-light trainers built for speed, flexibility, and maximum airflow during workouts or jogging.', 'images/PROD_1766652030_6470.jpg'),
(20, 'CourtMax Sneakers', '3099', 'Court-inspired sneakers with reinforced toe protection and stable soles for everyday sporty style.', 'images/PROD_1766652137_3592.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(2, 'user1', 'demo', 'test@test.com', '$2y$10$X4xiETjkMnyH.lbzeJ3Ni.4cnDIhCD6H.4fApU0WpUwyFS/iB5vmi'),
(3, 'user2', 'test', 'test2@test.com', '$2y$10$yvfpaFjHQpo3V9U2ciARSevITJ7BDlNTnCsVc.fFLkzTh1samZNIC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`user_id`),
  ADD KEY `productId` (`product_id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `productId` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `userId` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
