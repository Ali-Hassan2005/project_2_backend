-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 سبتمبر 2023 الساعة 04:26
-- إصدار الخادم: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- بنية الجدول `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `phone_number` text NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `clients`
--

INSERT INTO `clients` (`id`, `full_name`, `email`, `username`, `password`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ali', '5@d', '622045', '434', '1009114127', 'og', '2023-08-26 13:12:39', '2023-08-26 13:12:39'),
(2, 'ada', 'a@ww', 'ada', 'adsadadada', '646464', 'adadacdasf', '2023-08-26 15:35:55', '2023-08-26 15:35:55'),
(3, 'aliyyyyyyyyyysdf', 'a@ww', 'adadgsdg', 'adsadadada', '646464', 'adadacdasf', '2023-08-26 15:37:11', '2023-08-26 15:37:11'),
(4, 'shady', 'a@ww', 'annnnn', 'adsadadada', '646464', 'adadacdasf', '2023-08-26 15:43:06', '2023-08-26 15:43:06'),
(6, 'awdfas', 'a@q', 'jgksad', '\r\n64643434', '6464', 'jgfkd', '2023-09-02 09:17:10', '2023-09-02 09:17:10'),
(7, 'alinnnnnn', 'f@dd', 'jgdjfskd', '313131', 'fd6464', 'fdgdgsdg', '2023-09-02 09:18:13', '2023-09-02 09:18:13'),
(8, 'nnbnb ', 's@r', 'star', 'e10adc3949ba59abbe56e057f20f883e', '1266', 'ohidfoldh', '2023-09-02 09:19:13', '2023-09-03 18:04:00'),
(9, 'sara', 'sa@ra', 'sara', '202cb962ac59075b964b07152d234b70', '123', 'lll', '2023-09-02 11:08:15', '2023-09-02 11:08:15'),
(10, 'abo sara', 'a@qq', 'k1', '202cb962ac59075b964b07152d234b70', '123', 'lj', '2023-09-02 11:51:32', '2023-09-02 12:09:09'),
(11, 'messi', 'leo@qq', 'leo', '202cb962ac59075b964b07152d234b70', '123', '123', '2023-09-03 18:05:33', '2023-09-03 18:05:33'),
(12, 'oop', 'aW@3', 'oop', '202cb962ac59075b964b07152d234b70', '123', '123', '2023-09-03 22:17:44', '2023-09-03 22:17:44'),
(13, 'oop0', 'aW@3', '', '', '123', '123', '2023-09-03 22:34:29', '2023-09-03 22:34:29');

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `count`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-08-29 18:23:47', '2023-08-29 18:23:47'),
(2, 8, 1, '2023-09-02 09:36:00', '2023-09-02 09:36:00'),
(3, 8, 1, '2023-09-03 17:54:45', '2023-09-03 17:54:45');

-- --------------------------------------------------------

--
-- بنية الجدول `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-08-29 18:23:47', '2023-08-29 18:23:47'),
(2, 2, 1, '2023-09-02 09:36:00', '2023-09-02 09:36:00'),
(3, 3, 1, '2023-09-03 17:54:45', '2023-09-03 17:54:45');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `size` int(11) NOT NULL,
  `image` text NOT NULL,
  `color` text NOT NULL,
  `count_in_stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `name`, `size`, `image`, `color`, `count_in_stock`, `created_at`, `updated_at`) VALUES
(1, 'vvvv', 5, '', 'red', 2, '2023-09-03 17:54:45', '2023-08-26 17:57:30'),
(5, 'vc', 54, 'wallpaperflare.com_wallpaper (31).jpg', 'red', 20, '2023-09-03 17:52:43', '2023-09-03 17:52:43'),
(6, 'react', 12, 'wallpaperflare.com_wallpaper (31).jpg', 'red', 20, '2023-09-03 18:08:15', '2023-09-03 18:08:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `client_id` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- قيود الجداول `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
