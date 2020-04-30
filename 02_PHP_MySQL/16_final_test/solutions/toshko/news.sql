-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 апр 2020 в 16:21
-- Версия на сървъра: 10.4.11-MariaDB
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
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Структура на таблица `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(500) NOT NULL,
  `news_content` longtext NOT NULL,
  `news_added` datetime NOT NULL,
  `news_author` int(11) NOT NULL,
  `news_pics` varchar(500) NOT NULL,
  `news_cat` int(11) NOT NULL,
  `news_type` int(11) NOT NULL,
  `news_delete` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура на таблица `news_cats`
--

CREATE TABLE `news_cats` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `cat_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура на таблица `news_type`
--

CREATE TABLE `news_type` (
  `type_id` int(11) NOT NULL,
  `type_name` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_register` datetime NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `user_first_name` varchar(250) NOT NULL,
  `user_last_name` varchar(250) NOT NULL,
  `user_pic` varchar(500) DEFAULT NULL,
  `user_banned` int(11) DEFAULT NULL,
  `user_bio` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `user_id` (`news_author`),
  ADD KEY `cat_id` (`news_cat`),
  ADD KEY `news_type` (`news_type`);

--
-- Indexes for table `news_cats`
--
ALTER TABLE `news_cats`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_cats`
--
ALTER TABLE `news_cats`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_type`
--
ALTER TABLE `news_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
