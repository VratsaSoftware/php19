-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 апр 2020 в 09:30
-- Версия на сървъра: 10.1.36-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airport`
--

-- --------------------------------------------------------

--
-- Структура на таблица `airlines`
--

CREATE TABLE `airlines` (
  `airline_id` int(11) NOT NULL,
  `airline_name` varchar(150) NOT NULL,
  `CEO` varchar(250) NOT NULL,
  `country_id` int(11) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `airlines`
--

INSERT INTO `airlines` (`airline_id`, `airline_name`, `CEO`, `country_id`, `date_deleted`) VALUES
(1, 'Bulgaria Air', 'Петър Петров', 1, NULL),
(2, 'Turkish Airlines', 'Name Name', 2, NULL),
(3, 'Anadolujet', 'Name2 Name2', 2, '2020-04-01'),
(4, 'Onur Air', 'Name3 Name3', 2, NULL),
(5, 'Aegean Airlines', 'Name4 Name4', 3, NULL),
(6, 'Elinair', 'Name5 Name5', 3, '2020-04-20'),
(7, 'Olympic Air', 'Name6 Name6', 3, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `company_categories` int(11) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_categories`, `date_deleted`) VALUES
(1, 'Shop Company', 1, NULL),
(2, 'Air Security', 1, NULL),
(3, 'Airposrt Security', 1, '2020-04-21'),
(4, 'Flight Catering', 2, NULL),
(5, 'Luggage Transportation', 3, NULL),
(6, 'Passenger Transportation', 3, NULL),
(7, 'Video Monitoring', 1, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `company_categories`
--

CREATE TABLE `company_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `company_categories`
--

INSERT INTO `company_categories` (`category_id`, `category_name`, `date_deleted`) VALUES
(1, 'security', NULL),
(2, 'flight_catering', NULL),
(3, 'transportation', NULL),
(4, 'shops\r\n', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(150) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `date_deleted`) VALUES
(1, 'България', NULL),
(2, 'Турция', NULL),
(3, 'Гърция', NULL),
(4, 'Румъния', NULL),
(5, 'Сърбия', NULL),
(6, 'Черна гора', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(11) NOT NULL,
  `destination_name` varchar(150) NOT NULL,
  `country_id` int(11) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `destinations`
--

INSERT INTO `destinations` (`destination_id`, `destination_name`, `country_id`, `date_deleted`) VALUES
(1, 'София', 1, NULL),
(2, 'Пловдив', 1, NULL),
(3, 'Истанбул', 2, NULL),
(4, 'Атина', 3, '2020-04-24'),
(5, 'Букурещ', 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`airline_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `company_categories` (`company_categories`);

--
-- Indexes for table `company_categories`
--
ALTER TABLE `company_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`),
  ADD KEY `country_id` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `airline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_categories`
--
ALTER TABLE `company_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
