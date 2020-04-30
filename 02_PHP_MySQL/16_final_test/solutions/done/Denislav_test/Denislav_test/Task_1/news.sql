-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 01:34 PM
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
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `second_name` varchar(30) NOT NULL,
  `third_name` varchar(30) NOT NULL,
  `biography` text NOT NULL,
  `author_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `publication_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `publication_subject` varchar(150) NOT NULL,
  `publication_content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `publication_type_id` int(11) NOT NULL,
  `date_published` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publications_authors`
--

CREATE TABLE `publications_authors` (
  `publications_authors_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publications_images`
--

CREATE TABLE `publications_images` (
  `publications_images_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publications_types`
--

CREATE TABLE `publications_types` (
  `publication_type_id` int(11) NOT NULL,
  `publication_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `publication_type_id` (`publication_type_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `publications_authors`
--
ALTER TABLE `publications_authors`
  ADD PRIMARY KEY (`publications_authors_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `publication_id` (`publication_id`);

--
-- Indexes for table `publications_images`
--
ALTER TABLE `publications_images`
  ADD PRIMARY KEY (`publications_images_id`),
  ADD KEY `publication_id` (`publication_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `publications_types`
--
ALTER TABLE `publications_types`
  ADD PRIMARY KEY (`publication_type_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications_authors`
--
ALTER TABLE `publications_authors`
  MODIFY `publications_authors_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications_images`
--
ALTER TABLE `publications_images`
  MODIFY `publications_images_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications_types`
--
ALTER TABLE `publications_types`
  MODIFY `publication_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `publications_ibfk_2` FOREIGN KEY (`publication_type_id`) REFERENCES `publications_types` (`publication_type_id`);

--
-- Constraints for table `publications_authors`
--
ALTER TABLE `publications_authors`
  ADD CONSTRAINT `publications_authors_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `publications_authors_ibfk_2` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`publication_id`);

--
-- Constraints for table `publications_images`
--
ALTER TABLE `publications_images`
  ADD CONSTRAINT `publications_images_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`),
  ADD CONSTRAINT `publications_images_ibfk_2` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`publication_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
