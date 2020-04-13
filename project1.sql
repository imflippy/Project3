-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2020 at 10:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(100) NOT NULL,
  `product` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `product`) VALUES
(4, 'Haylie '),
(9, 'Jerry'),
(11, 'Gayla'),
(12, 'Iola'),
(13, 'Callie'),
(14, 'Adalberto'),
(15, 'Abel'),
(16, 'Ada'),
(17, 'Ingeborg'),
(18, 'Inga'),
(19, 'Burma'),
(20, 'Adah'),
(21, 'Deangelo'),
(22, 'Abel'),
(23, 'Abbie'),
(24, 'Burma'),
(25, 'Callie'),
(26, 'Abraham'),
(27, 'Iola'),
(28, 'Jess'),
(29, 'Inocencia'),
(30, 'Ingeborg'),
(31, 'Inez'),
(32, 'Abdul'),
(33, 'Burton'),
(34, 'Deangelo'),
(35, 'Adaline'),
(36, 'Jerrod'),
(37, 'Inge'),
(38, 'Camelia'),
(39, 'Ada'),
(40, 'Caitlyn'),
(41, 'Burma'),
(42, 'Abdul'),
(43, 'Jesse'),
(44, 'Jerrold'),
(45, 'Burton'),
(46, 'Indira'),
(47, 'Gayla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
