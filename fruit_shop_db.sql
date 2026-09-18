-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2026 at 06:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruit_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` varchar(20) NOT NULL,
  `categor_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `categor_name`) VALUES
('f001', 'Citrus'),
('f002', 'Drupes'),
('f003', 'Berry'),
('f004', 'Pepo'),
('f005', 'Pome');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` int(100) NOT NULL,
  `product_cover` text NOT NULL,
  `category_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `product_cover`, `category_id`) VALUES
('p001', 'ส้มโอ', 120, 'https://hdmall.co.th/blog/wp-content/uploads/2024/03/%E0%B8%AA%E0%B9%89%E0%B8%A1%E0%B9%82%E0%B8%AD%E0%B8%97%E0%B8%B1%E0%B8%9A%E0%B8%97%E0%B8%B4%E0%B8%A1%E0%B8%AA%E0%B8%A2%E0%B8%B2%E0%B8%A1-1.jpg.webp', 'f001'),
('p002', 'มะม่วง', 50, 'https://s.isanook.com/wo/0/ud/51/259109/mango-3.jpg?ip/crop/w670h402/q80/jpg', 'f002'),
('p003', 'องุ่น', 50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkrnooEWX8UufaggwfJtJpU801yPO9JSPohqkdwRRumA&s=10', 'f003'),
('p004', 'แตงโม', 150, 'https://mpics2.mgronline.com/pics/Images/569000007077701.JPEG', 'f004'),
('p005', 'แอปเปิล', 80, 'https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_750/https://shopee.co.th/blog/wp-content/uploads/2020/11/Shopee-Blog-%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B9%82%E0%B8%A2%E0%B8%8A%E0%B8%99%E0%B9%8C%E0%B8%82%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%AD%E0%B8%9B%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B9%89%E0%B8%A5-%E0%B9%81%E0%B8%AD%E0%B8%9B%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B9%89%E0%B8%A5%E0%B9%81%E0%B8%94%E0%B8%87-%E0%B9%81%E0%B8%AD%E0%B8%9B%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B9%89%E0%B8%A5%E0%B9%80%E0%B8%82%E0%B8%B5%E0%B8%A2%E0%B8%A7.jpg', 'f005');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
