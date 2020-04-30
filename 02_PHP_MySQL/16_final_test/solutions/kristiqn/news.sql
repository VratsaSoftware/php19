-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 апр 2020 в 13:36
-- Версия на сървъра: 10.1.37-MariaDB
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
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Структура на таблица `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(250) NOT NULL,
  `author_biography` varchar(250) NOT NULL,
  `author_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `author_biography`, `author_photo`) VALUES
(1, 'Simon Sinek', 'Motivator', 0),
(2, 'Jordan Peterson', 'Pshychologist', 0);

-- --------------------------------------------------------

--
-- Структура на таблица `author_publication`
--

CREATE TABLE `author_publication` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `photos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Healthcare'),
(2, 'Economics');

-- --------------------------------------------------------

--
-- Структура на таблица `publications`
--

CREATE TABLE `publications` (
  `publication_id` int(11) NOT NULL,
  `publication_name` varchar(250) NOT NULL,
  `publication_title` varchar(250) NOT NULL,
  `publication_author` varchar(250) NOT NULL,
  `date_publicated` datetime NOT NULL,
  `publication_theme` varchar(250) NOT NULL,
  `publication_text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `publications_photos`
--

CREATE TABLE `publications_photos` (
  `id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `publication_types`
--

CREATE TABLE `publication_types` (
  `publication_type_id` int(11) NOT NULL,
  `publication_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `publication_types`
--

INSERT INTO `publication_types` (`publication_type_id`, `publication_type`) VALUES
(1, 'news'),
(2, 'ads'),
(3, 'articles');

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
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`publication_id`);

--
-- Indexes for table `publications_photos`
--
ALTER TABLE `publications_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publication_types`
--
ALTER TABLE `publication_types`
  ADD PRIMARY KEY (`publication_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications_photos`
--
ALTER TABLE `publications_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publication_types`
--
ALTER TABLE `publication_types`
  MODIFY `publication_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
