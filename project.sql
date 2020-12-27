-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 12:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`id`, `name`, `image`, `price`) VALUES
(1, 'operating system', '1.jpg', 500.00),
(4, 'Mein kampf', '4.jpg', 175.00),
(5, 'Data Science and algo in c++', '5.jpg', 200.00),
(6, 'Mann me\r\nhai vishwas', '6.jpg', 175.00),
(7, 'Theory of\r\nevery thing', '7.jpg', 100.00),
(8, 'web technology', '8.jpg', 195.00),
(9, 'web technology', '9.jpg', 225.00),
(10, 'Data Science and algo', '10.jpg', 445.00),
(11, 'Abdul\r\nkalam', '11.jpg', 200.00),
(12, 'Internet of thing', '12.jpg', 299.00),
(14, 'Internet of thing', '14.jpg', 195.00),
(15, 'captain cool', '15.jpg', 197.00),
(18, 'Think and grow rich', '18.jpg', 100.00),
(20, 'oop', '20.jpg', 179.00),
(21, 'Programming ASNI', '21.jpg', 255.00),
(22, 'complete referance', '22.jpg', 125.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
