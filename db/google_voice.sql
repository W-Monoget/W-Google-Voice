-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2023 at 12:32 PM
-- Server version: 10.3.38-MariaDB-log-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bestgrcc_bestgvd`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `log_text` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_text`, `updated_at`) VALUES
(1, 'Sub Admin IP: 103.153.66.149 update contact data', '2023-04-03 13:18:43'),
(2, 'Sub Admin IP: 103.153.66.149 update contact data', '2023-04-03 13:32:37'),
(3, 'Sub Admin IP: 103.153.66.149 update contact data', '2023-04-03 13:33:54'),
(4, 'Sub Admin IP: 103.153.66.149 update contact data', '2023-04-03 13:34:42'),
(5, 'Sub Admin IP: 103.153.66.149 update contact data', '2023-04-03 13:35:30'),
(6, 'Sub Admin IP: 103.153.66.149 update contact data', '2023-04-03 13:37:35'),
(7, 'Sub Admin IP: 103.153.66.149 update contact data', '2023-04-03 13:38:55'),
(8, 'Sub Admin IP: 103.153.66.149 update contact data', '2023-04-03 13:40:49'),
(9, 'Sub Admin IP: 103.153.66.149 update contact data', '2023-04-03 18:19:00'),
(10, 'Sub Admin IP: 103.153.66.149 update contact data', '2023-04-04 07:49:22'),
(11, ' IP: 103.153.66.149 update contact data', '2023-04-04 08:41:56'),
(12, 'Sub Admin IP: 103.153.66.148 update package data id=1', '2023-04-07 16:36:35'),
(13, 'Sub Admin IP: 103.153.66.148 update package data id=2', '2023-04-07 16:36:46'),
(14, 'Sub Admin IP: 103.153.66.148 update package data id=3', '2023-04-07 16:37:12'),
(15, 'Sub Admin IP: 103.153.66.148 update package data id=4', '2023-04-07 16:37:52'),
(16, 'Sub Admin IP: 103.153.66.148 update package data id=5', '2023-04-07 16:38:11'),
(17, 'Sub Admin IP: 103.153.66.148 update package data id=6', '2023-04-07 16:40:09'),
(18, 'Sub Admin IP: 103.153.66.148 update package data id=7', '2023-04-07 16:40:59'),
(19, 'Sub Admin IP: 103.153.66.148 update package data id=6', '2023-04-07 16:43:47'),
(20, 'Sub Admin IP: 103.153.66.148 update package data id=7', '2023-04-07 16:45:47'),
(21, 'Sub Admin IP: 103.153.66.148 update package data id=6', '2023-04-07 16:46:41'),
(22, 'Sub Admin IP: 103.153.66.148 update package data id=7', '2023-04-07 16:47:13'),
(23, 'Sub Admin IP: 103.153.66.148 update package data id=8', '2023-04-07 16:47:42'),
(24, 'Sub Admin IP: 103.153.66.148 update package data id=9', '2023-04-07 16:48:06'),
(25, 'Sub Admin IP: 103.153.66.148 update package data id=9', '2023-04-07 16:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'sales',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `ip`, `image`, `email`, `password`, `role`, `updated_at`) VALUES
(1, 'Main Admin', '27.147.190.199', 'public/images/avatar-01.jpg', 'admin007@gmail.com', '@BCD1234', 'admin', '2023-04-04 18:32:46'),
(2, 'Sub Admin', '103.107.160.134', 'public/images/avatar-01.jpg', 'admin2@gmail.com', '@BCD1234', 'admin', '2023-03-31 10:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `state` varchar(5) NOT NULL,
  `payment_type` varchar(20) NOT NULL DEFAULT 'Card',
  `transaction_number` varchar(100) NOT NULL,
  `transaction_image` varchar(200) NOT NULL,
  `approve` int(11) NOT NULL DEFAULT 3,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `user_id`, `f_name`, `l_name`, `email`, `phone_number`, `country`, `address`, `city`, `zip_code`, `state`, `payment_type`, `transaction_number`, `transaction_image`, `approve`, `updated_at`) VALUES
(1, 0, 'Test', 'test', 'test@gmail.com', '2312367890', 'Thailand', 'Test', 'Test', '12345', '', 'BTC', '44444444444444444', 'images/proof/btc/16032_94558_LTC.JPEG', 3, '2023-04-18 16:32:03'),
(2, 0, 'check', 'check', 'check@check.com', '2258785485', 'China', 'check', 'check', '11221', '', 'BTC', '987798987978987987', 'images/proof/btc/68062_1.png', 3, '2023-04-11 16:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `btc_address` varchar(100) NOT NULL,
  `usdt_address` varchar(100) NOT NULL,
  `ltc_address` varchar(100) NOT NULL,
  `btc_qr` varchar(200) NOT NULL,
  `usdt_qr` varchar(200) NOT NULL,
  `ltc_qr` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `btc_address`, `usdt_address`, `ltc_address`, `btc_qr`, `usdt_qr`, `ltc_qr`, `email`, `number`, `skype`, `image`, `updated_at`) VALUES
(1, '1GuXy6h1FkkvKwLKzrbsLtwWjmrmH5c3pN', 'TQYAr3Sghr2j1Pmze7TyWohyNgUBct7976', 'LVKYMAEk2fv7eRvfpnL7F9u3rxrb7JtEaf', 'images/qrcode/17024_BTC.JPEG', 'images/qrcode/43899_usdt.JPEG', 'images/qrcode/94558_LTC.JPEG', 'bestgv.info24hours@gmail.com', '+1 (618) 812-5624', 'bestgv.info24hours@yahoo.com', 'images/email/contact.png', '2023-04-04 08:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_unit_price` double(10,2) NOT NULL,
  `product_total_price` double(10,2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `billing_id`, `product_name`, `product_quantity`, `product_unit_price`, `product_total_price`, `updated_at`) VALUES
(1, 1, 'GOLD', 3, 200.00, 600.00, '2023-04-04 18:37:09'),
(2, 2, 'SILVER', 1, 70.00, 70.00, '2023-04-11 16:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `price` double(10,2) NOT NULL,
  `label_1` varchar(500) NOT NULL,
  `label_2` varchar(100) NOT NULL DEFAULT '100% Real',
  `label_3` varchar(200) NOT NULL DEFAULT 'Fast Delivery with 48 hours Replacement policy',
  `label_4` varchar(100) NOT NULL DEFAULT 'Satisfaction Guaranteed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `price`, `label_1`, `label_2`, `label_3`, `label_4`) VALUES
(1, 'GOOGLE VOICE ACCOUNTS SHORT PACKAGE (1-9)', 'FGZDMR', 4.00, '(1-9) Google Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(2, 'BRONZE', 'BP4ISN', 35.00, '10 Google Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(3, 'SILVER', '65147S', 70.00, '20 Google Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(4, 'GOLD', '5Q4SIR', 175.00, '50 Google Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(5, 'PLATINUM', 'DNHD8O', 350.00, '100 Google Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(6, '3 MONTHS OLD', '03AVO5', 40.00, '10 Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(7, '6 MONTHS OLD', 'WL3AP7', 45.00, '10 Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(8, '1 YEAR OLD', 'GXH91G', 50.00, '10 Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(9, '2 YEARS  & MORE OLD', 'DO6UY7', 55.00, '10 Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `state` varchar(5) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `f_name`, `l_name`, `email`, `password`, `phone_number`, `country`, `address`, `city`, `zip_code`, `state`, `updated_at`) VALUES
(1, 'Test', 'test', 'monoget2@gmail.com', 'pGll2aog', '2312367890', 'Thailand', 'Test', 'Test', '12345', '', '2023-04-04 18:37:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
