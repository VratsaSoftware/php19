-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 апр 2020 в 14:08
-- Версия на сървъра: 10.4.10-MariaDB
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
-- Database: `publications`
--

-- --------------------------------------------------------

--
-- Структура на таблица `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_first_name` varchar(150) NOT NULL,
  `author_last_name` varchar(150) NOT NULL,
  `autor_biography` text NOT NULL,
  `autor_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `publications`
--

CREATE TABLE `publications` (
  `publication_id` int(11) NOT NULL,
  `publication_title` varchar(250) NOT NULL,
  `publication_date_created` date NOT NULL,
  `publication_text` text NOT NULL,
  `publication_image` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `publications_categories_authors`
--

CREATE TABLE `publications_categories_authors` (
  `publication_category_autor_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `types_publications`
--

CREATE TABLE `types_publications` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(150) NOT NULL
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
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `publications_categories_authors`
--
ALTER TABLE `publications_categories_authors`
  ADD PRIMARY KEY (`publication_category_autor_id`),
  ADD KEY `publication_id` (`publication_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `types_publications`
--
ALTER TABLE `types_publications`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications_categories_authors`
--
ALTER TABLE `publications_categories_authors`
  MODIFY `publication_category_autor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types_publications`
--
ALTER TABLE `types_publications`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `publications_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `publications_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `types_publications` (`type_id`);

--
-- Ограничения за таблица `publications_categories_authors`
--
ALTER TABLE `publications_categories_authors`
  ADD CONSTRAINT `publications_categories_authors_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `publications_categories_authors_ibfk_2` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`publication_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `publications_categories_authors_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
