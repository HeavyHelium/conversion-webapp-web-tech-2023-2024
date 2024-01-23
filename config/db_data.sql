-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Време на генериране: 23 яну 2024 в 19:19
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

--
-- Схема на данните от таблица `ProfileHistory`
--

INSERT INTO `ProfileHistory` (`username`, `inputField`, `configField`, `outputField`, `version`, `conversionType`, `comment`) VALUES
('helium', 1, 2, 2, '2024-01-23 13:12:13', 'json2properties', ''),
('helium', 1, 2, 3, '2024-01-23 13:44:02', 'json2properties', ''),
('helium', 1, 2, 3, '2024-01-23 13:44:55', 'json2properties', ''),
('helium', 2, 2, 1, '2024-01-23 14:29:26', 'properties2json', ''),
('helium', 2, 3, 1, '2024-01-23 14:29:46', 'properties2json', ''),
('helium', 3, 3, 1, '2024-01-23 14:31:50', 'properties2json', ''),
('helium', 3, 2, 1, '2024-01-23 14:32:47', 'properties2json', 'piping works!'),
('helium', NULL, 2, NULL, '2024-01-23 14:34:14', 'json2properties', 'testing json to property'),
('helium', 1, 2, 3, '2024-01-23 14:35:06', 'json2properties', 'testing json to properties'),
('helium', 1, 2, 3, '2024-01-23 14:37:05', 'json2properties', 'testing json to properties'),
('helium', 1, 2, 3, '2024-01-23 14:38:27', 'json2properties', 'try try try'),
('helium', 1, 2, 3, '2024-01-23 14:39:03', 'json2properties', 'try try try'),
('helium', 1, 2, 3, '2024-01-23 14:40:36', 'json2properties', 'try try try'),
('helium', 1, 2, 3, '2024-01-23 14:42:45', 'json2properties', '???'),
('helium', 1, 2, 3, '2024-01-23 18:49:39', 'json2properties', ''),
('helium', 1, 1, 2, '2024-01-23 18:53:06', 'json2properties', 'test with upload'),
('helium', 1, 1, 2, '2024-01-23 20:10:11', 'properties2properties', ''),
('helium', 1, 1, 2, '2024-01-23 20:11:42', 'properties2json', ''),
('helium', 1, 1, 2, '2024-01-23 20:12:37', 'properties2properties', 'pr to pr'),
('helium', 1, 1, 1, '2024-01-23 20:14:50', 'properties2json', ''),
('helium', 2, 1, 3, '2024-01-23 20:15:50', 'json2json', '');

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`username`, `name`, `passwd`, `email`) VALUES
('helium', 'Diana Markova', '$2y$10$400TfckwCivMnSP/q1qCPuWbMQRGl1/EmJsuywapDbxk8BSkEA8ce', 'dventsisla@uni-sofia.bg'),
('pesho42', 'Pesho', '$2y$10$M.UtL.q5iG.QXpE2E/rx9eqV3oZOTAEHCzD32xaEFYVjCP9Sv5ENe', 'pesho@gosho.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
