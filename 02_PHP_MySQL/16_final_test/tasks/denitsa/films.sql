-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 апр 2020 в 10:48
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
-- Database: `films`
--

-- --------------------------------------------------------

--
-- Структура на таблица `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(150) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `date_deleted`) VALUES
(1, 'France', NULL),
(2, 'USA', NULL),
(3, 'Great Britain', NULL),
(4, 'Japan', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `directors`
--

CREATE TABLE `directors` (
  `director_id` int(11) NOT NULL,
  `director_name` varchar(150) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `directors`
--

INSERT INTO `directors` (`director_id`, `director_name`, `date_deleted`) VALUES
(1, 'Gorge Lucas', NULL),
(2, 'Martin Scorsese', NULL),
(3, 'Francis Ford Copolla', NULL),
(4, 'Stieven Spielberg', NULL),
(5, 'Ridley Scott', NULL),
(6, 'John Woo', NULL),
(7, 'Christopher Nolan', NULL),
(8, 'Tim Burton', NULL),
(9, 'Peter Jackson', NULL),
(10, 'Hayao Miyazaki', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `film_critics`
--

CREATE TABLE `film_critics` (
  `film_critic_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `film_critics`
--

INSERT INTO `film_critics` (`film_critic_id`, `name`, `date_deleted`) VALUES
(1, 'Film Critic1', NULL),
(2, 'Film Critic2', NULL),
(3, 'Film Critic3', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(150) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`, `date_deleted`) VALUES
(1, 'fantasy', NULL),
(2, 'thriller', NULL),
(3, 'drama', NULL),
(4, 'comedy', NULL),
(5, 'children animation', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `magazinez`
--

CREATE TABLE `magazinez` (
  `magazine_id` int(11) NOT NULL,
  `magazine_name` varchar(150) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `magazinez`
--

INSERT INTO `magazinez` (`magazine_id`, `magazine_name`, `date_deleted`) VALUES
(1, 'Cosmopolitan', NULL),
(2, 'Little White Lies Magazine', NULL),
(3, 'Filmmaker Magazine', NULL),
(4, 'Film Comment Magazine', NULL),
(5, 'MovieMaker', NULL),
(6, 'Film Inquiry', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `productions`
--

CREATE TABLE `productions` (
  `production_id` int(11) NOT NULL,
  `production_name` varchar(250) NOT NULL,
  `year` int(11) NOT NULL,
  `director_id` int(11) NOT NULL,
  `IMDB_index` float NOT NULL,
  `tickets_sold` int(11) NOT NULL,
  `income` float NOT NULL,
  `country_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `productions`
--

INSERT INTO `productions` (`production_id`, `production_name`, `year`, `director_id`, `IMDB_index`, `tickets_sold`, `income`, `country_id`, `genre_id`, `date_deleted`) VALUES
(1, 'Catch Me If You Can', 2002, 4, 8.1, 702236178, 8825440000, 2, 2, NULL),
(2, 'Amistad', 1997, 4, 7.3, 52254477, 361453000, 2, 2, NULL),
(3, 'Taxi Driver', 1976, 2, 6.5, 77885252, 4517790000, 2, 3, NULL),
(4, 'Doodfellas', 1990, 2, 8.2, 362211, 451778, 2, 3, NULL),
(5, 'The Age of Innocence', 1993, 2, 8, 121141, 744777, 2, 3, NULL),
(6, 'The Martian', 2015, 5, 7.7, 998857, 78474100, 2, 3, NULL),
(7, 'Thelma and Luise', 1991, 5, 9.2, 332225111, 44225500, 2, 3, NULL),
(8, 'Gladiator', 2000, 5, 8.9, 996699988, 10022400000, 2, 3, NULL),
(9, 'Interstellar', 2014, 7, 7.6, 321456987, 987456000, 3, 3, NULL),
(10, 'Dunkirk', 2017, 7, 6.9, 456321789, 3214570000, 3, 3, NULL),
(11, 'Inception', 2010, 7, 9.7, 332211445, 9988770000, 3, 1, NULL),
(12, 'Princess Mononke', 1997, 10, 7.5, 147852369, 369852000, 4, 5, NULL),
(13, 'My Neighbor Totoro', 1988, 10, 7, 132465798, 978645000, 4, 5, NULL),
(14, 'Spirited Away', 2001, 10, 7, 897564231, 965412000, 4, 5, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `film_id` int(11) NOT NULL,
  `magazine_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `reviews`
--

INSERT INTO `reviews` (`review_id`, `review`, `film_id`, `magazine_id`, `author_id`, `date_deleted`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 1, 2, 1, NULL),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 1, 1, 1, NULL),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 4, 5, 2, NULL),
(4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 10, 4, 2, NULL),
(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 14, 3, 3, NULL),
(6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 8, 1, 2, NULL),
(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 3, 5, 3, NULL),
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 3, 6, 1, NULL),
(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 11, 2, 3, NULL),
(10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 5, 3, 2, NULL),
(11, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 13, 2, 3, NULL),
(12, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam aut, in dolorum quam voluptate facere veritatis vitae distinctio! At et tenetur est pariatur blanditiis in omnis. Assumenda est delectus quis.', 5, 6, 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `film_critics`
--
ALTER TABLE `film_critics`
  ADD PRIMARY KEY (`film_critic_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `magazinez`
--
ALTER TABLE `magazinez`
  ADD PRIMARY KEY (`magazine_id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`production_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `director_id` (`director_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `magazine_id` (`magazine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `film_critics`
--
ALTER TABLE `film_critics`
  MODIFY `film_critic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `magazinez`
--
ALTER TABLE `magazinez`
  MODIFY `magazine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `production_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `productions`
--
ALTER TABLE `productions`
  ADD CONSTRAINT `productions_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `productions_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `directors` (`director_id`),
  ADD CONSTRAINT `productions_ibfk_3` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`);

--
-- Ограничения за таблица `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `productions` (`production_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `film_critics` (`film_critic_id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`magazine_id`) REFERENCES `magazinez` (`magazine_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
