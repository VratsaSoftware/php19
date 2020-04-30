-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 03:47 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
  `author_name_first` varchar(20) NOT NULL,
  `author_name_second` varchar(20) NOT NULL,
  `author_profile_picture` varchar(20) NOT NULL,
  `author_bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name_first`, `author_name_second`, `author_profile_picture`, `author_bio`) VALUES
(1, 'Petar', 'Ivanov', 'knklnlk', 'klnlknk;ln');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories_publications`
--

CREATE TABLE `categories_publications` (
  `category_publication_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images_authors`
--

CREATE TABLE `images_authors` (
  `images_author_id` int(11) NOT NULL,
  `image_author_name_first` varchar(20) NOT NULL,
  `image_author_name_second` varchar(20) NOT NULL,
  `image_author_profile_picture` varchar(20) NOT NULL,
  `image_author_bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_publication_image`
--

CREATE TABLE `pivot_publication_image` (
  `pivot_publication_image_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `publication_id` int(11) NOT NULL,
  `publication_heading` varchar(150) NOT NULL,
  `publication_date` date NOT NULL,
  `publication_themе` text NOT NULL,
  `publication_text` text NOT NULL,
  `publication_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`publication_id`, `publication_heading`, `publication_date`, `publication_themе`, `publication_text`, `publication_type`) VALUES
(1, 'lknlknlk', '2020-04-26', 'klnk;lnkln', 'lklknlnln', 1);

-- --------------------------------------------------------

--
-- Table structure for table `publications_authors`
--

CREATE TABLE `publications_authors` (
  `publication_author_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publications_authors`
--

INSERT INTO `publications_authors` (`publication_author_id`, `author_id`, `publication_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `publication_images`
--

CREATE TABLE `publication_images` (
  `publication_image_id` int(11) NOT NULL,
  `publication_image_path` varchar(20) NOT NULL,
  `publications_image_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `categories_publications`
--
ALTER TABLE `categories_publications`
  ADD PRIMARY KEY (`category_publication_id`),
  ADD KEY `categories.category_id` (`category_id`),
  ADD KEY `publications.publication_id` (`publication_id`);

--
-- Indexes for table `images_authors`
--
ALTER TABLE `images_authors`
  ADD PRIMARY KEY (`images_author_id`);

--
-- Indexes for table `pivot_publication_image`
--
ALTER TABLE `pivot_publication_image`
  ADD PRIMARY KEY (`pivot_publication_image_id`),
  ADD KEY `publications_images.publication_image_id` (`image_id`),
  ADD KEY `publications.publication_id` (`publication_id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`publication_id`),
  ADD UNIQUE KEY `publication_heading` (`publication_heading`),
  ADD KEY `types.type_id` (`publication_type`);

--
-- Indexes for table `publications_authors`
--
ALTER TABLE `publications_authors`
  ADD PRIMARY KEY (`publication_author_id`),
  ADD KEY `authors.authors_id` (`author_id`),
  ADD KEY `publications.publication_id` (`publication_id`);

--
-- Indexes for table `publication_images`
--
ALTER TABLE `publication_images`
  ADD PRIMARY KEY (`publication_image_id`),
  ADD KEY `images_author.image_author_id` (`publications_image_author`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories_publications`
--
ALTER TABLE `categories_publications`
  MODIFY `category_publication_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images_authors`
--
ALTER TABLE `images_authors`
  MODIFY `images_author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pivot_publication_image`
--
ALTER TABLE `pivot_publication_image`
  MODIFY `pivot_publication_image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publications_authors`
--
ALTER TABLE `publications_authors`
  MODIFY `publication_author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publication_images`
--
ALTER TABLE `publication_images`
  MODIFY `publication_image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
