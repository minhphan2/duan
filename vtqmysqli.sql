-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 01:19 PM
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
-- Database: `vtqmysqli`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Phan Tuấn Minh', 'lh3399257@gmail.com', '$2y$10$lUxc6XigwNCbq8ms5Uxm.Ol0W63V237em29.XXRqwz9fJx5RqecSW', '2025-05-19 01:12:22', '2025-05-19 01:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 17, '2025-05-20 17:24:29', '2025-05-20 17:24:29'),
(8, 16, '2025-05-20 17:37:50', '2025-05-20 17:37:50'),
(9, 18, '2025-05-20 17:48:27', '2025-05-20 17:48:27'),
(10, 1, '2025-05-21 09:08:52', '2025-05-21 09:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(44, 8, 10, 1, '2025-05-26 10:50:54', '2025-05-26 10:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_dons`
--

CREATE TABLE `chi_tiet_hoa_dons` (
  `id` int(11) NOT NULL,
  `hoa_don_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `don_gia` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_hoa_dons`
--

INSERT INTO `chi_tiet_hoa_dons` (`id`, `hoa_don_id`, `product_id`, `so_luong`, `don_gia`) VALUES
(1, 1, 11, 3, 250000.00),
(2, 2, 10, 3, 200000.00),
(3, 3, 10, 3, 200000.00),
(4, 3, 11, 2, 250000.00),
(5, 3, 7, 2, 1000.00),
(6, 3, 2, 3, 170000.00),
(7, 4, 2, 1, 170000.00),
(8, 5, 10, 3, 200000.00),
(9, 5, 11, 2, 250000.00),
(10, 5, 7, 2, 1000.00),
(11, 5, 2, 3, 170000.00),
(12, 6, 10, 3, 200000.00),
(13, 6, 11, 2, 250000.00),
(14, 6, 7, 2, 1000.00),
(15, 7, 10, 3, 200000.00),
(16, 7, 11, 2, 250000.00),
(17, 7, 7, 2, 1000.00),
(18, 8, 10, 3, 200000.00),
(19, 8, 11, 2, 250000.00),
(20, 8, 7, 2, 1000.00),
(21, 9, 10, 3, 200000.00),
(22, 9, 11, 2, 250000.00),
(23, 9, 7, 2, 1000.00),
(24, 10, 10, 3, 200000.00),
(25, 10, 11, 2, 250000.00),
(26, 11, 10, 1, 200000.00),
(27, 11, 11, 1, 250000.00),
(28, 12, 10, 1, 200000.00),
(29, 13, 10, 1, 200000.00);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_dons`
--

CREATE TABLE `hoa_dons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tong_tien` decimal(10,2) DEFAULT NULL,
  `trang_thai` varchar(50) DEFAULT 'Cho xu ly',
  `dia_chi` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoa_dons`
--

INSERT INTO `hoa_dons` (`id`, `user_id`, `tong_tien`, `trang_thai`, `dia_chi`, `note`, `created_at`, `updated_at`) VALUES
(1, 16, 750000.00, 'Chờ xác nhận', NULL, NULL, '2025-05-21 22:34:17', '2025-05-21 22:34:17'),
(2, 16, 600000.00, 'Chờ xác nhận', NULL, NULL, '2025-05-21 22:43:37', '2025-05-21 22:43:37'),
(3, 16, 1612000.00, 'Chờ xác nhận', NULL, NULL, '2025-05-21 22:45:55', '2025-05-21 22:45:55'),
(4, 17, 170000.00, 'Chờ xác nhận', NULL, NULL, '2025-05-21 23:09:07', '2025-05-21 23:09:07'),
(5, 16, 1612000.00, 'Chờ xác nhận', NULL, NULL, '2025-05-22 04:49:16', '2025-05-22 04:49:16'),
(6, 16, 1102000.00, 'Chờ xác nhận', NULL, NULL, '2025-05-22 04:52:56', '2025-05-22 04:52:56'),
(7, 16, 1102000.00, 'Chờ xác nhận', NULL, NULL, '2025-05-22 04:55:04', '2025-05-22 04:55:04'),
(8, 16, 1102000.00, 'Hoàn tất', NULL, NULL, '2025-05-22 04:56:02', '2025-05-22 12:26:26'),
(9, 16, 1102000.00, 'Hoàn tất', 'Gia lâm', NULL, '2025-05-22 04:58:19', '2025-05-22 12:21:32'),
(10, 16, 1100000.00, 'Hoàn tất', 'Hung Yen', 'nhanh len', '2025-05-22 05:02:37', '2025-05-22 12:20:54'),
(11, 16, 450000.00, 'Hoàn tất', 'VIet', NULL, '2025-05-24 08:16:08', '2025-05-24 08:17:43'),
(12, 16, 200000.00, 'Chờ xác nhận', 'Hoang mai', NULL, '2025-05-26 10:51:07', '2025-05-26 10:51:07'),
(13, 16, 200000.00, 'Chờ xác nhận', 'hai ba trung', NULL, '2025-05-26 18:00:39', '2025-05-26 18:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `reset_matkhau`
--

CREATE TABLE `reset_matkhau` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reset_matkhau`
--

INSERT INTO `reset_matkhau` (`email`, `token`, `created_at`) VALUES
('dbrr231104@gmail.com', 'ViqkAc', '2025-04-30 22:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'minhg', 2, 5, 'ok', '2025-05-25 02:56:08', '2025-05-25 02:56:08'),
(2, 'minh', 10, 5, 'ok phet', '2025-05-26 03:09:28', '2025-05-26 03:09:28'),
(3, 'minh', 10, 5, 'cung duoc', '2025-05-26 03:11:58', '2025-05-26 03:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(255) NOT NULL,
  `Gia` decimal(10,2) NOT NULL,
  `SoLuong` int(11) DEFAULT 0,
  `HinhAnh` varchar(255) NOT NULL,
  `HinhAnh2` varchar(255) DEFAULT NULL,
  `HinhAnh3` varchar(255) DEFAULT NULL,
  `MoTa` text NOT NULL,
  `Loaisp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Gia`, `SoLuong`, `HinhAnh`, `HinhAnh2`, `HinhAnh3`, `MoTa`, `Loaisp`) VALUES
(1, 'Bánh sinh nhật Chocolate', 150000.00, 0, 'uploads/chocolate_cake.jpg', NULL, NULL, 'Bánh sinh nhật vị chocolate thơm ngon.', 'BSN'),
(2, 'Bánh sinh nhật Dâu tây', 170000.00, 0, 'uploads/strawberry_cake.jpg', NULL, NULL, 'Bánh sinh nhật vị dâu tây tươi mát.', 'BSN'),
(3, 'Bánh sinh nhật Vanilla', 160000.00, 0, 'uploads/vanilla_cake.jpg', NULL, NULL, 'Bánh sinh nhật vị vanilla ngọt ngào.', 'BNE'),
(4, 'Bánh sinh nhật Matcha', 180000.00, 0, 'uploads/matcha_cake.jpg', NULL, NULL, 'Bánh sinh nhật vị matcha thanh mát.', 'BNE'),
(5, 'Bánh sinh nhật Caramel', 190000.00, 0, 'uploads/caramel_cake.jpg', NULL, NULL, 'Bánh sinh nhật vị caramel đậm đà.', 'PKB'),
(6, 'banh oc cho', 120000.00, 0, '../../uploads/264465242_195977516080870_2157769778723098317_n (1).png', NULL, NULL, 'okphet day', 'PKB'),
(7, 'banhmatuy', 1000.00, 1, 'alo.jpg', NULL, NULL, 'phevcl', 'PKB'),
(8, 'banhviet', 200000.00, 0, 'aloalo.jpg', NULL, NULL, 'nhucac', 'BSN'),
(9, 'banh minh', 200000.00, 0, 'minh.jpg', NULL, NULL, 'nhucut', 'BNE'),
(10, 'Minhphan', 200000.00, 5, '1747670223_1.jpg', '1747670223_2.jpg', '1747670223_3.jpg', 'alo alo', 'BNE'),
(11, 'Minhphan2', 250000.00, 7, '1747680721_update.jpg', '1747670264_2.jpg', '1747670264_3.jpg', 'alo alo', 'BNE'),
(15, 'Quốc', 150000.00, 13, '1748074878_1.jpg', '1748074878_2.jpg', '1748074878_3.jpg', 'ok ok', 'PKB');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT 'default',
  `phone` varchar(20) DEFAULT '012345678',
  `address` varchar(100) DEFAULT 'Viet Nam',
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `phone`, `address`, `reset_token`, `reset_token_expires_at`) VALUES
(16, 'minh', 'dbrr231104@gmail.com', '$2y$10$xPEFmBOUCOclyC2LgKuKduiIMl1nQpLnpGPzrW5cy2kPAWPmTMMOu', 'default', '012345678', 'Viet Nam', 'EcR0JH', '2025-05-24 08:55:52'),
(17, 'Phan Minh', 'zen231104@gmail.com', '$2y$10$882cH.QhdKUg0ZAO1/x7hONXduTynABvv7XZYdRMEg51okdLxvjz6', 'default', '012345678', 'Viet Nam', NULL, NULL),
(18, 'Phan Minh', 'mphan0124@gmail.com', '$2y$10$TtuLlpL6tegycfZLynBeDes4ZMURCJoQwgpBMLdjtRsUA2/qU4NuO', 'default', '012345678', 'Viet Nam', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoa_don_id` (`hoa_don_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reset_matkhau`
--
ALTER TABLE `reset_matkhau`
  ADD KEY `email` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`MaSP`);

--
-- Constraints for table `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  ADD CONSTRAINT `chi_tiet_hoa_dons_ibfk_1` FOREIGN KEY (`hoa_don_id`) REFERENCES `hoa_dons` (`id`),
  ADD CONSTRAINT `chi_tiet_hoa_dons_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`MaSP`);

--
-- Constraints for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD CONSTRAINT `hoa_dons_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
