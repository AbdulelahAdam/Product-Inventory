-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 05:53 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiweb_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`sku`, `name`, `price`, `type`, `size`, `weight`, `height`, `width`, `length`) VALUES
('BT121555', 'Harry Potter', 49.99, 'Book', NULL, 15, NULL, NULL, NULL),
('cd-sdkj-dk', 'CD 2', 4388, 'DVD', 45, NULL, NULL, NULL, NULL),
('chair-book-dkjhc', 'Book 1', 23, 'Book', NULL, 4, NULL, NULL, NULL),
('FTR332266', 'The Cat in the Hat', 4.99, 'Book', NULL, 2, NULL, NULL, NULL),
('GGWP0007', 'War and Peace', 25.6, 'Book', NULL, 4, NULL, NULL, NULL),
('HP123456', 'Desk', 15, 'Furniture', NULL, NULL, 12, 12, 12),
('JVC200123', 'Acme DISC', 1, 'DVD', 700, NULL, NULL, NULL, NULL),
('KKR120555', 'The Great Gatsby', 15.55, 'Book', NULL, 12, NULL, NULL, NULL),
('TR120555', 'Chair', 45.12, 'Furniture', NULL, NULL, 25, 45, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`sku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
