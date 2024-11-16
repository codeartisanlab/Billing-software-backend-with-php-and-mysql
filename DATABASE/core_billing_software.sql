-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 10:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `core_billing_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(9) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin@1234');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Mouse'),
(2, 'Keyboard'),
(3, 'Screen'),
(5, 'printer');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(9) NOT NULL,
  `image` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `cat_id` int(9) NOT NULL,
  `opening_stock` varchar(150) NOT NULL,
  `current_stock` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `name`, `cat_id`, `opening_stock`, `current_stock`) VALUES
(1, '1731325858_mouse.webp', 'HP Mouse', 1, '100', '300'),
(2, '1731325874_keyboard.webp', 'Logitech Keyboard', 2, '85', '109'),
(3, '1731314417_screen.webp', 'Dell Screen', 3, '15', '62'),
(4, '1731314466_keyboard.webp', 'Asus Keyboard', 2, '10', '114'),
(8, '1731589038_mouse.webp', 'Dell Mouse', 1, '100', '128');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(9) NOT NULL,
  `product` varchar(150) NOT NULL,
  `vendor` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `price` varchar(150) NOT NULL,
  `qty` varchar(150) NOT NULL,
  `total` varchar(150) NOT NULL,
  `discount` varchar(150) NOT NULL,
  `dis_price` varchar(150) NOT NULL,
  `tax_rate` varchar(150) NOT NULL,
  `tax_price` varchar(150) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `product`, `vendor`, `status`, `price`, `qty`, `total`, `discount`, `dis_price`, `tax_rate`, `tax_price`, `date_time`) VALUES
(1, '1', '1', 'Paid', '250', '50', '12500', '1000', '11500', '2070', '13570', '2024-11-15 09:18:48'),
(2, '2', '2', 'Due', '1200', '10', '12000', '2000', '10000', '1800', '11800', '2024-11-15 09:19:53'),
(3, '3', '3', 'Cancel', '5000', '5', '25000', '2500', '22500', '4050', '26550', '2024-11-15 09:20:52'),
(4, '4', '1', 'Paid', '1500', '5', '7500', '500', '7000', '1260', '8260', '2024-11-15 09:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(9) NOT NULL,
  `product` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `price` varchar(150) NOT NULL,
  `qty` varchar(150) NOT NULL,
  `total` varchar(150) NOT NULL,
  `discount` varchar(150) NOT NULL,
  `dis_price` varchar(150) NOT NULL,
  `tax_rate` varchar(150) NOT NULL,
  `tax_price` varchar(150) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `product`, `phone`, `status`, `price`, `qty`, `total`, `discount`, `dis_price`, `tax_rate`, `tax_price`, `date_time`) VALUES
(1, '1', '1234567890', 'Paid', '600', '10', '6000', '500', '5500', '990', '6490', '2024-11-15 09:23:22'),
(2, '8', '1234569870', 'Cancel', '500', '2', '1000', '100', '900', '162', '1062', '2024-11-15 09:24:19'),
(3, '3', '9562013470', 'Due', '9000', '3', '27000', '2000', '25000', '4500', '29500', '2024-11-15 09:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `light_logo` varchar(150) NOT NULL,
  `dark_logo` varchar(150) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `light_logo`, `dark_logo`, `company_name`, `phone`, `address`) VALUES
(8, '///1731588815_logo.png', '///1731588815_dark-logo.png', 'Bill Easy', '1234567890', 'Ludhiana, Punjab ');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(9) NOT NULL,
  `image` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `image`, `name`, `phone`, `address`) VALUES
(1, '1731587262_user.png', 'Vipan', '9878693736', 'Ludhiana'),
(2, '1731314173_man.png', 'Rajat', '6283136958', 'Jalandhar'),
(3, '1731314247_user (1).png', 'Nina', '9056323280', 'Amritsar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
