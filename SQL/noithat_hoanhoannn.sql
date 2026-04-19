-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2026 at 05:48 PM
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
-- Database: `noithat_hoanhoannn`
--

-- --------------------------------------------------------

--
-- Table structure for table `artisans`
--

CREATE TABLE `artisans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artisans`
--

INSERT INTO `artisans` (`id`, `name`, `image`, `description`, `created_at`) VALUES
(1, 'Cao Lương', 'Chan-dung-nghe-nhan-Tran-Do.jpg', 'Vĩ nhân tuyệt thế', '2026-04-19 09:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `created_at`) VALUES
(7, 'HOME-BANNER-SLIDE-6-1.png', '2026-04-19 08:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`) VALUES
(1, 'Phòng khách', 'sofa.png'),
(2, 'Phòng ngủ', 'bed.png'),
(3, 'Phòng bếp', 'kitchen.png'),
(4, 'Phòng tắm', 'bath1.png'),
(5, 'Trẻ em', 'kid.png'),
(6, 'Văn phòng', 'office.png'),
(7, 'Cầu thang', 'stairs1.png'),
(8, 'Đồ trang trí', 'decor1.png');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `zalo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `name`, `phone`, `email`, `address`, `facebook`, `zalo`, `created_at`) VALUES
(1, 'CÔNG TY DTN HOME', '0999999999', 'DTNHOME@gmail.com', 'Số 1 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, '2026-04-19 09:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'đặng tài nguyenm', 'nguyendeptraiokk2004@gmail.com', '1234', 'đáaaaaaa', '2026-04-19 06:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `featured_products`
--

CREATE TABLE `featured_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featured_products`
--

INSERT INTO `featured_products` (`id`, `product_id`, `created_at`) VALUES
(1, 2, '2026-04-19 15:20:10'),
(2, 3, '2026-04-19 15:20:11'),
(3, 4, '2026-04-19 15:20:11'),
(4, 5, '2026-04-19 15:20:12'),
(5, 7, '2026-04-19 15:20:22'),
(6, 8, '2026-04-19 15:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(3, 'NGẤT NGÂY VỚI TOP 1 MẪU NỘI THẤT CHUNG CƯ 1 PHÒNG NGỦ ĐẸP NHẤT', 'Những căn hộ chung cư mini, có diện tích nhỏ ngày càng trở nên phổ biến trong cuộc sống hiện đại.\r\n          Thiết kế nội thất chung cư 1 phòng ngủ chính là giải pháp tối ưu giúp mang lại không gian sống hoàn hảo.', 'anh123.png', '2026-04-19 06:51:32'),
(4, 'đa', 'đa', 'anh123.png', '2026-04-19 07:00:14'),
(5, 'da', 'da', 'anh123.png', '2026-04-19 14:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `payment_method` varchar(50) DEFAULT NULL,
  `shipping_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `phone`, `address`, `total`, `created_at`, `payment_method`, `shipping_method`) VALUES
(1, 'da', 'da', 'da', 9999000, '2026-01-07 23:33:24', NULL, NULL),
(2, 'da', 'da', 'da', 0, '2026-01-07 23:39:52', NULL, NULL),
(3, 'nguyem', '098234618', 'hn', 3200012, '2026-01-08 00:06:57', NULL, NULL),
(4, 'da', 'da', 'da', 0, '2026-01-08 00:12:07', NULL, NULL),
(5, 'jhj', 'fs', 'fs', 143991000, '2026-01-08 02:29:06', NULL, NULL),
(6, 'gr', 'ge', 'ge', 8999000, '2026-01-08 14:22:36', NULL, NULL),
(7, 'vanngu', '1234', 'Tq', 98989000, '2026-01-09 00:50:27', NULL, NULL),
(8, 'fsd', 'fsdf', 'fsd', 8999000, '2026-04-01 02:41:31', NULL, NULL),
(9, 'dâd', 'đâ', 'đâ', 8999000, '2026-04-19 20:21:50', NULL, NULL),
(10, 'DTN', '098437574', 'HN', 17499000, '2026-04-19 21:02:56', NULL, NULL),
(11, 'NNV', '096423616', 'TPHCM', 8999000, '2026-04-19 21:03:35', NULL, NULL),
(12, 'DTN', '08974324', 'SG', 8500000, '2026-04-19 21:27:58', NULL, NULL),
(13, 'DVT', '09124664214', 'CB', 8999000, '2026-04-19 21:34:15', 'COD', 'Giao hàng nhanh');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `wood` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `price`, `quantity`, `color`, `wood`) VALUES
(1, 1, 'Bàn uống nước', 9999000, 1, NULL, NULL),
(2, 3, 'ghe', 12, 1, NULL, NULL),
(3, 3, 'Bàn trà hiện đại', 3200000, 1, NULL, NULL),
(4, 5, 'Giường châu Âu', 15999000, 9, NULL, NULL),
(5, 6, 'Bàn ăn gỗ', 8999000, 1, NULL, NULL),
(6, 7, 'Bàn ăn gỗ', 8999000, 11, NULL, NULL),
(7, 8, 'Bàn ăn gỗ', 8999000, 1, NULL, NULL),
(8, 9, 'Bàn ăn gỗ', 8999000, 1, NULL, NULL),
(9, 10, 'Sofa gỗ cao cấp', 8500000, 1, 'Trắng', 'Gỗ sồi'),
(10, 10, 'Bàn ăn gỗ', 8999000, 1, 'Trắng', 'Gỗ xoan'),
(11, 11, 'Bàn ăn gỗ', 8999000, 1, 'Nâu', 'Gỗ xoan'),
(12, 12, 'Sofa gỗ cao cấp', 8500000, 1, 'Đen', 'Gỗ sồi'),
(13, 13, 'Bàn ăn gỗ', 8999000, 1, 'Trắng', 'Gỗ xoan');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `category_id`) VALUES
(2, 'Giường châu Âu', 15999000, '1767813740_1767813522_giuong.jpg', 'Giường nhập khẩu', 2),
(3, 'Bàn ăn gỗ', 8999000, '1767813731_1767813701_1767813522_giuong.jpg', 'Bàn ăn', 3),
(4, 'Sofa gỗ cao cấp', 8500000, '1767813725_giuong.jpg', 'Sofa gỗ tự nhiên, thiết kế sang trọng', NULL),
(5, 'Bàn trà hiện đại', 3200000, '1767813718_1767813522_giuong.jpg', 'Bàn trà phong cách tối giản', NULL),
(7, 'Bàn trà hiện đại', 9999000, '1767813522_giuong.jpg', 'da', NULL),
(8, 'Bàn trà hiện đại', 8999000, '1767813718_1767813522_giuong.jpg', 'dasdad', NULL),
(9, 'Bàn ăn gỗ', 15999000, 'anh123.png', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@ngocquang.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(2, 'nguyen', 'nguyendeptraiokk2004@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(3, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'user'),
(4, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'user'),
(5, 'Bàn ăn gỗ', 'a@ngocquang.com', '202cb962ac59075b964b07152d234b70', 'user'),
(6, 'ghe', '11@ngocquang.com', '202cb962ac59075b964b07152d234b70', 'user'),
(7, '111', '111@ngocquang.com', '698d51a19d8a121ce581499d7b701668', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artisans`
--
ALTER TABLE `artisans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
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
-- AUTO_INCREMENT for table `artisans`
--
ALTER TABLE `artisans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
