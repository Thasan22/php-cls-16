-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 07:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yummy_foods`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `details` mediumtext DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `featured_img` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `heading`, `details`, `button_title`, `button_url`, `video_url`, `featured_img`, `status`) VALUES
(1, 'Heading 1', 'hello', 'hello', 'hello', 'hello', '65b8845626834banner-imagetheme.png', 0),
(5, 'Heading 2', 'shrimp', 'go to...', 'asap', 'https://youtu.be/7KetlgMYFeY?si=K1o_mlsAgpJJ4mJh', '65b8d02f4d6e3banner-imageimages.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `status`) VALUES
(7, 'lunch', 1),
(8, 'dinner', 1),
(9, 'breakfast', 1),
(10, 'ramadan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `detail` mediumtext NOT NULL,
  `price` float NOT NULL,
  `food_img` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `category`, `title`, `detail`, `price`, `food_img`, `status`) VALUES
(1, 'lunch', 'test', 'test', 0, 'food-image65c9028bc7c2b.png', 1),
(2, 'breakfast', 'egg roll', 'egg', 50.55, 'food-image65c90318464d6.png', 1),
(3, 'breakfast', 'chaomin', 'noodles', 30.25, 'food-image65c90375e5a72.png', 1),
(4, 'ramadan', 'beaf steak', 'beaf', 70.85, 'food-image65c903dcd5de7.png', 1),
(5, 'dinner', 'y', 'y', 6, 'food-image65c905301b756.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `profile_pic`) VALUES
(6, 'a', 'b', 'a@b.com', '$2y$10$6PtaEVqBY2T7N23eT9t.DOz40IF0y2eNSh4yS.YsQZk5JG2loYZU.', NULL),
(7, 'th', 'asan', 'th@gmail.com', '$2y$10$lZEQPFWxFzpXnO0Qsx7JoOFlDvFdYpwUyKUfh2j3If5wFFkhuHreW', NULL),
(8, 'Thasan 22', '', 'thasan@gmail.com', '$2y$10$0ZWncbrZt48TJ3JXulqGGebWwG4l4KA4FWl3WhjCbKCopg8UID2aC', 'user-65c759c95c151.jpg'),
(9, 'abc', 'c', 'ab@gmail.com', '$2y$10$h/EACfRSs6e3eZ/BJhPkqedVuILgt2WsKu2y1ZDsMd/U8PBZWbB2K', 'user-65af6536deff7.png'),
(10, 'Md', 'Thasan', 'thasan28@gmail.com', '$2y$10$tlJzS5jXKONTpP8pXUDO8OzSSsg9ydJGfNG5TleLTo95Dk3mUs6Hq', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
