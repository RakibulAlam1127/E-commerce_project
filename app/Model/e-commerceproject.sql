-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2018 at 12:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerceproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL DEFAULT '',
  `slug` varchar(128) NOT NULL DEFAULT '',
  `active` tinyint(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(128) NOT NULL DEFAULT '',
  `last_name` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `phone_number` varchar(32) NOT NULL DEFAULT '',
  `billing_address` longtext NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` varchar(128) NOT NULL DEFAULT 'pending',
  `op_status` varchar(128) NOT NULL DEFAULT 'pending',
  `payment_details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `seles_price` int(10) DEFAULT NULL,
  `active` tinyint(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `image_path` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `profile_photo` varchar(128) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verification_token` varchar(80) DEFAULT NULL,
  `active` tinyint(11) NOT NULL DEFAULT '1',
  `role` varchar(80) NOT NULL DEFAULT 'user',
  `billing_address` text NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `profile_photo`, `email_verified_at`, `email_verification_token`, `active`, `role`, `billing_address`, `first_name`, `last_name`, `phone_number`) VALUES
(1, 'rakib12', 'rakib@gmail.com', '$2y$10$q6Bb4HxCO/7juXZlR./Ly.tEQAB74SDQl9xCYekAjrzzrOqicu9yC', 'profile_photo1542219276.jpg', NULL, '260bde6a058b805fa4feea8a750c188e296817dd', 1, 'user', '', '', '', ''),
(2, 'rakib122', 'rakib@smerttech.com', '$2y$10$VISHdeNUyA7YJk7xBbNDiuJh12J3FAJS96rPtDBVG8MqEV8nbhqwm', 'profile_photo1542219331.jpg', NULL, '02e71b026f95119430193a10eb64e008a683d27f', 1, 'user', '', '', '', ''),
(3, 'rakibul15', 'rakibul@gmail.com', '$2y$10$vi6TczqCLBeA9Apvo7dSv.tk1ZNRvMbTVHHlH9YqNse1ulXr.sSRG', 'profile_photo1542219943.jpg', NULL, '9282b766129070b538e1f5084d2edf9deac604d3', 1, 'user', '', '', '', ''),
(4, 'joybaba', 'jobbaba@gmail.com', '$2y$10$lYvRxXUJzYebYfFbo2cJx.32n0Kz/YXwI1Jr2lTRMYc9V6JIEhWY6', 'profile_photo1542221622.jpg', NULL, '1e3aae905b910811046825dec7d57a23b3975dde', 1, 'user', '', '', '', ''),
(5, 'badsha124', 'badsha124@gmail.com', '$2y$10$LWNw4MaDOyICo7xGQSlbLOHJb44ywt7H1Ev8BKlg5UE7QEVSocBi2', 'profile_photo1542221858.jpg', NULL, '3df3582681e970919c2c59b1d4f16fa7d218e018', 1, 'user', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_verification_token` (`email_verification_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
