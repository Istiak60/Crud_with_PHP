-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2021 at 12:40 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `created_at`, `modified_at`) VALUES
(2, 'istiak ', 'istisquare@gmail.com', '696969', '5555555555555', '2021-12-20 11:14:10', '2021-12-20 11:14:10'),
(3, 'Istiak Sharif', 'abc@gmail.com', 'cccccccccc', '', '2021-12-20 12:07:35', '2021-12-20 12:07:35'),
(5, 'test case 01', 'abc@gmail.com', '252525', '01521488460', '2021-12-20 12:59:12', '2021-12-20 12:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `promotional_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `html_banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_draft` tinyint(4) NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `created_at`, `link`, `promotional_message`, `html_banner`, `is_draft`, `picture`, `is_active`, `modified_at`) VALUES
(9, 'Table fan', '2021-12-20 10:49:02', 'https', 'final testing it was', '', 0, 'IMG_product1-700x850.jpg', 1, '2021-12-20 11:01:57'),
(13, 'Test 11', '2021-12-20 10:49:02', 'evaly.com', '50% off', '', 0, 'product2-700x850.jpg', 0, '2021-12-20 10:49:32'),
(22, 'Arfan a khan', '2021-12-20 10:51:10', 'iisssiiss', 'ssssssssskkko', '', 0, 'IMG_newsletter-img.jpg', 1, '2021-12-20 10:51:10'),
(23, 'TEST case 101 editaed', '2021-12-20 12:35:48', 'sjjsjsj', 'sssdasfa', 'asfasfasf', 0, 'IMG_product2-700x850.jpg', 0, '2021-12-20 12:48:28'),
(24, 'ss', '2021-12-20 12:50:42', 's', 's', 's', 1, 'IMG_product4-700x850.jpg', 1, '2021-12-20 12:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_title`, `qty`, `picture`, `unit_price`, `total_price`) VALUES
(1, 111, 'pencil', 125000, '', 0, 0),
(2, 111111, 'shirt', 150, '', 0, 0),
(3, 123, 'pro', 125, 'IMG_blog-img1-913x500.jpg', 0, 0),
(4, 4556, 'test done', 15, 'IMG_blog-img1-913x500.jpg', 50, 750);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `link`, `created_at`, `modified_at`) VALUES
(3, 'Bangla', 'pppp', '2021-12-20 11:21:39', '2021-12-20 11:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `comment`, `status`, `date`) VALUES
(3, 'Nisho', 'abc@gmail.com', 'BBA1', 'tata good bye gaya khatam1', 1, '2021-11-11'),
(4, 'istiak', 'abc@gmail.com', 'email', 'ss', 1, '2021-12-20'),
(5, 'test case done', 'abc@gmail.com', 'CSE', 'ss', 0, '2021-12-20'),
(6, 'arfan a khan', 'abc@gmail.com', 'BBA', 'ss', 1, '2021-12-01'),
(7, 'finally solved', 'abc@gmail.com', 'BBA', 'ss', 1, '2021-12-11'),
(8, 'faruk', 'rakiv94@yahoo.com', 'BBA1', 'ss', 1, '2021-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `qty`) VALUES
(1, 6598755, 125333),
(2, 2222, 150),
(3, 33338888, 1899999),
(4, 9999, 20);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `created_at`, `picture`, `is_active`, `modified_at`, `is_deleted`) VALUES
(23, 'Good name', '2021-12-20 09:49:47', 'blog-img1-913x500.jpg', 1, '2021-12-20 10:34:44', 1),
(24, 'Succesfull done', '2021-12-20 09:49:47', 'product21-700x850.jpg', 0, '2021-12-20 10:10:27', 0),
(25, 'PCCCC', '2021-12-20 09:49:47', 'IMG_product24-700x850.jpg', 0, '2021-12-20 10:10:27', 0),
(26, 'oppppppppp', '2021-12-20 09:49:47', 'IMG_product23-700x850.jpg', 0, '2021-12-20 10:10:27', 0),
(27, 'tarek', '2021-12-20 09:49:47', 'IMG_product4-700x850.jpg', 0, '2021-12-20 10:18:51', 0),
(31, 'final', '2021-12-20 10:37:51', 'IMG_product5-700x850.jpg', 1, '2021-12-20 10:37:51', 0),
(33, 'testing ', '2021-12-21 11:58:17', 'IMG_IMG_product4-700x850.jpg', 1, '2021-12-21 12:06:15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
