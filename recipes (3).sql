-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 11, 2023 at 11:08 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes`
--
CREATE DATABASE IF NOT EXISTS `recipes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `recipes`;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `list` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `recipe_id`, `list`) VALUES
(5, 2, '100g of tomatoes,200g of mince beef,1 pinch of oregano,500g of spaghetti');

-- --------------------------------------------------------

--
-- Table structure for table `method`
--

DROP TABLE IF EXISTS `method`;
CREATE TABLE `method` (
  `id` int(11) NOT NULL,
  `step_1` varchar(500) NOT NULL,
  `step_2` varchar(500) NOT NULL,
  `step_4` varchar(500) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_list`
--

DROP TABLE IF EXISTS `recipe_list`;
CREATE TABLE `recipe_list` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe_list`
--

INSERT INTO `recipe_list` (`id`, `name`, `description`) VALUES
(2, 'lasagne', 'oven roasted dinner with beef'),
(3, 'chicken curry', 'very popular dish'),
(4, 'beef curry', 'very spicy version of this curry'),
(5, 'lemon tea', 'nice fresh lemon tea recipe'),
(6, 'bolognese', 'italian pasta dish with herbs'),
(7, 'lamb chops', 'lamb chops with a nice mint sauce');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `date_created`, `role`) VALUES
(2, 'neil@gmail.co.uk', '$2y$10$ClMlgWYvBRAjpiy5hbn/SeuF/1povh7TLamHbcC3NJSfQQGDXrwZW', '2023-02-23 17:59:12.000000', 'regular'),
(3, 'neil@gmail.ie', '$2y$10$FZLZ5L0HXBfSZJXxpe3jTOVzT.gIKk2.TaceNTp41c.75GLxei8aG', '2023-02-23 20:58:10.000000', 'admin'),
(4, 'neil@yahoo.ie', '$2y$10$ZR9nwMphnRciaku1kb4wkOKfRDvUekCQywxy3SGv.nYz7utHQT2j.', '2023-03-06 19:28:55.000000', 'regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_list`
--
ALTER TABLE `recipe_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `method`
--
ALTER TABLE `method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe_list`
--
ALTER TABLE `recipe_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
