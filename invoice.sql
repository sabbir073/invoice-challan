-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 03:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `challan`
--

CREATE TABLE `challan` (
  `id` int(11) NOT NULL,
  `challan_no` int(7) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `to_company` varchar(100) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `style_number` varchar(55) NOT NULL,
  `job_number` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challan`
--

INSERT INTO `challan` (`id`, `challan_no`, `date`, `to_company`, `contact_name`, `address`, `style_number`, `job_number`, `product_name`, `color`, `size`, `quantity`) VALUES
(1, 0, '2023-01-31 14:04:44', 'xubisoft', 'sabbir', 'house21', '212121', '232323', 'sabbir', 'Red', 'xl', '100');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `clientname` varchar(100) NOT NULL,
  `clientemail` varchar(100) NOT NULL,
  `clientphone` varchar(50) NOT NULL,
  `clientcompanyname` varchar(50) NOT NULL,
  `clientcompanyemail` varchar(100) NOT NULL,
  `clientcompanyaddress` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `clientname`, `clientemail`, `clientphone`, `clientcompanyname`, `clientcompanyemail`, `clientcompanyaddress`, `created_at`) VALUES
(1, 'sabbir', 'sabbir@gmail.com', '897587587', 'xubisoft', 'xubisoft@gmail.com', 'house21', '2023-01-04 18:00:31'),
(2, 'ahmed', 'sabbir@gmail.com', '123', 'abc', 'xubisoft@gmail.com', '123 strret', '2023-01-17 19:40:43'),
(3, 'fahad', 'fahad@gmail.om', '123456', 'Amicritas', 'amicritas@gmail.com', 'hg 2233', '2023-01-17 20:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `colorname` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `colorname`, `created_at`) VALUES
(1, 'Red', '2023-01-04 16:26:36'),
(2, 'Blue', '2023-01-10 16:29:41'),
(3, 'Green', '2023-01-17 20:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `image`, `description`, `created_at`) VALUES
(1, 'sabbir', 'Shirt', 'teet.png', 'this is a good product', '2023-01-03 19:29:48'),
(2, 'jahid', 'Pant', 'teet.png', 'ryujaryy', '2023-01-03 19:56:42'),
(3, 'sobuj', 'Pant', 'teet.png', '4ujaij', '2023-01-04 16:06:29'),
(4, 'Pant', 'Pant', 'teet.png', 'aryjaryj', '2023-01-04 19:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `sizename` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `sizename`, `created_at`) VALUES
(1, 'xl', '2023-01-04 16:32:44'),
(2, 'XXL', '2023-01-04 16:33:05'),
(3, 'M', '2023-01-04 16:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unitname` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unitname`, `created_at`) VALUES
(1, 'Cartoon', '2023-01-04 16:21:25'),
(2, 'Box', '2023-01-04 16:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `password`, `created_at`) VALUES
(18, 'Md Sabbir Ahmed', 'sabbir073', 'md.sabbir073@gmail.com', 'admin', '$2y$10$WwQ0ZqomzijBG/uOcj410.DajCZ67YI5c6DPcmybX2SN.oEe1XJ5e', '2023-01-04 17:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `vendorname` varchar(100) NOT NULL,
  `vendoremail` varchar(100) NOT NULL,
  `vendorphone` varchar(50) NOT NULL,
  `vendorcompanyname` varchar(50) NOT NULL,
  `vendorcompanyemail` varchar(100) NOT NULL,
  `vendorcompanyaddress` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendorname`, `vendoremail`, `vendorphone`, `vendorcompanyname`, `vendorcompanyemail`, `vendorcompanyaddress`, `created_at`) VALUES
(1, 'sabbir', 'sabbir@gmail.com', '123456789', 'xubisoft Ltd', 'info@xubisoft.com', 'house 123', '2023-01-04 17:48:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challan`
--
ALTER TABLE `challan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `challan_no` (`challan_no`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challan`
--
ALTER TABLE `challan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
