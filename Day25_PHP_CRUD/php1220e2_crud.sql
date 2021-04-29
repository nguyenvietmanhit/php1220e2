-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 01:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php1220e2_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `avatar`, `created_at`) VALUES
(1, 'Iphone X', 1000, 'iphonex.jpg', '2021-04-27 13:52:23'),
(2, 'Samsung S7', 2000, 'samsungs7.jpg', '2021-04-27 13:52:23'),
(3, 'Iphone X', 1000, 'iphonex.jpg', '2021-04-27 13:57:02'),
(4, 'Samsung S7', 2000, 'samsungs7.jpg', '2021-04-27 13:57:02'),
(5, 'Iphone X', 1000, 'iphonex.jpg', '2021-04-27 13:57:31'),
(6, 'Samsung S7', 2000, 'samsungs7.jpg', '2021-04-27 13:57:31'),
(7, 'Iphone X', 1000, 'iphonex.jpg', '2021-04-27 14:08:14'),
(8, 'Samsung S7', 2000, 'samsungs7.jpg', '2021-04-27 14:08:14'),
(9, 'Iphone X', 1000, 'iphonex.jpg', '2021-04-27 14:08:22'),
(10, 'Samsung S7', 2000, 'samsungs7.jpg', '2021-04-27 14:08:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
