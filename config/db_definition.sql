-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Време на генериране: 23 яну 2024 в 19:18
-- Версия на сървъра: 10.4.28-MariaDB
-- Версия на PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `web-conv`
--
CREATE DATABASE IF NOT EXISTS `web-conv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web-conv`;

-- --------------------------------------------------------

--
-- Структура на таблица `ProfileHistory`
--

CREATE TABLE `ProfileHistory` (
  `username` varchar(200) NOT NULL,
  `inputField` int(11) DEFAULT NULL,
  `configField` int(11) DEFAULT NULL,
  `outputField` int(11) DEFAULT NULL,
  `version` datetime NOT NULL,
  `conversionType` varchar(50) DEFAULT NULL CHECK (`conversionType` in ('json2json','json2properties','properties2json','properties2properties')),
  `comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `username` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `passwd` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `ProfileHistory`
--
ALTER TABLE `ProfileHistory`
  ADD PRIMARY KEY (`username`,`version`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `ProfileHistory`
--
ALTER TABLE `ProfileHistory`
  ADD CONSTRAINT `ProfileHistory_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
