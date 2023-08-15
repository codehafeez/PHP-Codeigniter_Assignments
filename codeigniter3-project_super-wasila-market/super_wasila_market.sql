-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 03:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super_wasila_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text,
  `category_systemDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_systemDatetime`) VALUES
(1, '123', '2020-09-04 18:17:44'),
(2, 'aaa', '2020-09-04 18:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_barcode` text,
  `p_description_translated` text,
  `p_name` text,
  `p_description` text,
  `category` text,
  `p_name_translate` text,
  `addProduct_systemDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_barcode`, `p_description_translated`, `p_name`, `p_description`, `category`, `p_name_translate`, `addProduct_systemDatetime`) VALUES
(27, '111', 'Un programmeur informatique, parfois appelé développeur de logiciels, programmeur ou plus récemment codeur, est une personne qui crée des logiciels. Le terme programmeur informatique peut désigner un spécialiste dans un domaine des ordinateurs ou un généraliste qui écrit du code pour de nombreux types de logiciels.', 'a1', 'A computer programmer, sometimes called a software developer, a programmer or more recently a coder, is a person who creates computer software. The term computer programmer can refer to a specialist in one area of computers, or to a generalist who writes code for many kinds of software', '123', NULL, '2020-09-04 18:23:20'),
(28, 'a2', 'Een computerprogrammeur, ook wel een softwareontwikkelaar, een programmeur of meer recentelijk een codeur genoemd, is een persoon die computersoftware maakt. De term computerprogrammeur kan verwijzen naar een specialist op een bepaald gebied van computers, of naar een generalist die code schrijft voor veel soorten software', 'a2', 'A computer programmer, sometimes called a software developer, a programmer or more recently a coder, is a person who creates computer software. The term computer programmer can refer to a specialist in one area of computers, or to a generalist who writes code for many kinds of software', '123', NULL, '2020-09-04 18:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` text,
  `status` text,
  `user_systemDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `status`, `user_systemDatetime`) VALUES
(2, 'admin@gmail.com', 'YWRtaW5AZ21haWwuY29t', 'Hafeez', 'true', '2020-07-03 04:25:59');

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
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
