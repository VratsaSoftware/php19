-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_bookstore`
--

-- --------------------------------------------------------

--
-- Структура на таблица `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
`author_id` int(11) NOT NULL,
  `author_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `books`
--

CREATE TABLE IF NOT EXISTS `books` (
`books_id` int(11) NOT NULL,
  `books_name` varchar(150) NOT NULL,
  `year` date NOT NULL,
  `price` double NOT NULL,
  `series` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `languages` varchar(100) NOT NULL,
  `book_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `book_types`
--

CREATE TABLE IF NOT EXISTS `book_types` (
`book_type_id` int(11) NOT NULL,
  `book_type_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
`genre_id` int(11) NOT NULL,
  `genre_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
`language_id` int(11) NOT NULL,
  `language_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
 ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
 ADD PRIMARY KEY (`books_id`), ADD KEY `book_type_id` (`book_type_id`);

--
-- Indexes for table `book_types`
--
ALTER TABLE `book_types`
 ADD PRIMARY KEY (`book_type_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
 ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
 ADD PRIMARY KEY (`language_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
MODIFY `books_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book_types`
--
ALTER TABLE `book_types`
MODIFY `book_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
