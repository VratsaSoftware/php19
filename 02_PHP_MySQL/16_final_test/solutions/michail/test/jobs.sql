-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 02:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_name_id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_name_id`, `company_name`, `company_description`) VALUES
(1, 'Lidel', 'Good company');

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE `job_locations` (
  `job_location_id` int(11) NOT NULL,
  `job_country` varchar(100) NOT NULL,
  `job_city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`job_location_id`, `job_country`, `job_city`) VALUES
(1, 'Bulgeria', 'Vratsa');

-- --------------------------------------------------------

--
-- Table structure for table `job_postitions`
--

CREATE TABLE `job_postitions` (
  `job_name_id` int(11) NOT NULL,
  `job_name` text NOT NULL,
  `job_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_postitions`
--

INSERT INTO `job_postitions` (`job_name_id`, `job_name`, `job_description`) VALUES
(1, 'Saller', 'Saller');

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` int(11) NOT NULL,
  `job_name_id` int(11) NOT NULL,
  `company_name_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `work_time_id` int(11) NOT NULL,
  `job_location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `job_name_id`, `company_name_id`, `category_id`, `work_time_id`, `job_location_id`) VALUES
(1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_times`
--

CREATE TABLE `work_times` (
  `work_time_id` int(11) NOT NULL,
  `work_time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_times`
--

INSERT INTO `work_times` (`work_time_id`, `work_time`) VALUES
(1, 'full work day');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_name` (`category_name`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_name_id`),
  ADD KEY `company_name` (`company_name`),
  ADD KEY `company_description` (`company_description`(768));

--
-- Indexes for table `job_locations`
--
ALTER TABLE `job_locations`
  ADD PRIMARY KEY (`job_location_id`),
  ADD KEY `job_country` (`job_country`),
  ADD KEY `job_city` (`job_city`);

--
-- Indexes for table `job_postitions`
--
ALTER TABLE `job_postitions`
  ADD PRIMARY KEY (`job_name_id`),
  ADD KEY `job_name` (`job_name`(768)),
  ADD KEY `job_description` (`job_description`(768));

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_name_id` (`job_name_id`),
  ADD KEY `company_name_id` (`company_name_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `work_time_id` (`work_time_id`),
  ADD KEY `job_location_id` (`job_location_id`);

--
-- Indexes for table `work_times`
--
ALTER TABLE `work_times`
  ADD PRIMARY KEY (`work_time_id`),
  ADD KEY `work_time` (`work_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_locations`
--
ALTER TABLE `job_locations`
  MODIFY `job_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_postitions`
--
ALTER TABLE `job_postitions`
  MODIFY `job_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_times`
--
ALTER TABLE `work_times`
  MODIFY `work_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD CONSTRAINT `job_posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `job_posts_ibfk_2` FOREIGN KEY (`company_name_id`) REFERENCES `companies` (`company_name_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `job_posts_ibfk_3` FOREIGN KEY (`work_time_id`) REFERENCES `work_times` (`work_time_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `job_posts_ibfk_4` FOREIGN KEY (`job_name_id`) REFERENCES `job_postitions` (`job_name_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `job_posts_ibfk_5` FOREIGN KEY (`job_location_id`) REFERENCES `job_locations` (`job_location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
