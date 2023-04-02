-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 07:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `google_voice`
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
(1, 'Main Admin', '27.147.190.199', 'public/images/avatar-01.jpg', 'admin1@gmail.com', '@BCD1234', 'admin', '2023-03-31 10:50:35'),
(2, 'Sub Admin', '103.107.160.134', 'public/images/avatar-01.jpg', 'admin2@gmail.com', '@BCD1234', 'admin', '2023-03-31 10:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `btc_address` varchar(100) NOT NULL,
  `usdt_address` varchar(100) NOT NULL,
  `ltc_address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `btc_address`, `usdt_address`, `ltc_address`, `email`, `number`, `skype`, `image`, `updated_at`) VALUES
(1, 'test', 'test', 'test', 'test@test.com', '00000', 'live.cid:test', 'images/email/contact.png', '2023-04-02 17:27:25');

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
(1, 'GOOGLE VOICE ACCOUNTS SHORT PACKAGE (1-9)', 'FGZDMR', 5.00, '(1-9) Google Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(2, 'BRONZE', 'BP4ISN', 40.00, '10 Google Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(3, 'SILVER', '65147S', 80.00, '20 Google Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(4, 'GOLD', '5Q4SIR', 200.00, '50 Google Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(5, 'PLATINUM', 'DNHD8O', 400.00, '100 Google Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(6, '3 MONTHS OLD', '03AVO5', 30.00, '5 Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(7, '6 MONTHS OLD', 'WL3AP7', 120.00, '25 Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(8, '1 YEAR OLD', 'GXH91G', 250.00, '50 Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed'),
(9, '2 YEARS OLD', 'DO6UY7', 175.00, '25 Voice Accounts', '100% Real', 'Fast Delivery with 48 hours Replacement policy', 'Satisfaction Guaranteed');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
