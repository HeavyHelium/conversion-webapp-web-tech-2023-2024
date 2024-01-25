-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Време на генериране: 24 яну 2024 в 21:32
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

--
-- Схема на данните от таблица `ProfileHistory`
--

INSERT INTO `ProfileHistory` (`username`, `inputField`, `configField`, `outputField`, `version`, `conversionType`, `comment`, `output`) VALUES
('helium', 2, 1, 2, '2024-01-24 22:11:26', 'properties2json', 'test', '{\n    \"input_format\": \"properties\",\n    \"output_format\": \"json\",\n    \"out\": \"area2\",\n    \"in\": \"area2\",\n    \"config\": \"area1\"\n}'),
('sherlocked', NULL, 2, NULL, '2024-01-24 12:33:32', NULL, NULL, NULL),
('sherlocked', 3, 2, 1, '2024-01-24 13:11:32', 'json2properties', 'Demo 2', 'quiz.sport.q1.question=Which one is correct team name in NBA?\nquiz.sport.q1.options.0=New York Bulls\nquiz.sport.q1.options.1=Los Angeles Kings\nquiz.sport.q1.options.2=Golden State Warriros\nquiz.sport.q1.options.3=Huston Rocket\nquiz.sport.q1.answer=Huston Rocket\nquiz.maths.q1.question=5 + 7 = ?\nquiz.maths.q1.options.0=10\nquiz.maths.q1.options.1=11\nquiz.maths.q1.options.2=12\nquiz.maths.q1.options.3=13\nquiz.maths.q1.answer=12\nquiz.maths.q2.question=12 - 8 = ?\nquiz.maths.q2.options.0=1\nquiz.maths.q2.options.1=2\nquiz.maths.q2.options.2=3\nquiz.maths.q2.options.3=4\nquiz.maths.q2.answer=4\n'),
('sherlocked', 3, 2, 2, '2024-01-24 21:39:46', 'json2json', 'json to json', '{\r\n    &quot;quiz&quot;: {\r\n        &quot;sport&quot;: {\r\n            &quot;q1&quot;: {\r\n                &quot;question&quot;: &quot;Which one is correct team name in NBA?&quot;,\r\n                &quot;options&quot;: [\r\n                    &quot;New York Bulls&quot;,\r\n                    &quot;Los Angeles Kings&quot;,\r\n                    &quot;Golden State Warriros&quot;,\r\n                    &quot;Huston Rocket&quot;\r\n                ],\r\n                &quot;answer&quot;: &quot;Huston Rocket&quot;\r\n            }\r\n        },\r\n        &quot;maths&quot;: {\r\n            &quot;q1&quot;: {\r\n                &quot;question&quot;: &quot;5 + 7 = ?&quot;,\r\n                &quot;options&quot;: [\r\n                    &quot;10&quot;,\r\n                    &quot;11&quot;,\r\n                    &quot;12&quot;,\r\n                    &quot;13&quot;\r\n                ],\r\n                &quot;answer&quot;: &quot;12&quot;\r\n            },\r\n            &quot;q2&quot;: {\r\n                &quot;question&quot;: &quot;12 - 8 = ?&quot;,\r\n                &quot;options&quot;: [\r\n                    &quot;1&quot;,\r\n                    &quot;2&quot;,\r\n                    &quot;3&quot;,\r\n                    &quot;4&quot;\r\n                ],\r\n                &quot;answer&quot;: &quot;4&quot;\r\n            }\r\n        }\r\n    }\r\n}'),
('sherlocked', 1, 1, 3, '2024-01-24 21:41:14', 'json2json', 'trr', '{\r\n    &quot;quiz&quot;: {\r\n        &quot;sport&quot;: {\r\n            &quot;q1&quot;: {\r\n                &quot;question&quot;: &quot;Which one is correct team name in NBA?&quot;,\r\n                &quot;options&quot;: [\r\n                    &quot;New York Bulls&quot;,\r\n                    &quot;Los Angeles Kings&quot;,\r\n                    &quot;Golden State Warriros&quot;,\r\n                    &quot;Huston Rocket&quot;\r\n                ],\r\n                &quot;answer&quot;: &quot;Huston Rocket&quot;\r\n            }\r\n        },\r\n        &quot;maths&quot;: {\r\n            &quot;q1&quot;: {\r\n                &quot;question&quot;: &quot;5 + 7 = ?&quot;,\r\n                &quot;options&quot;: [\r\n                    &quot;10&quot;,\r\n                    &quot;11&quot;,\r\n                    &quot;12&quot;,\r\n                    &quot;13&quot;\r\n                ],\r\n                &quot;answer&quot;: &quot;12&quot;\r\n            },\r\n            &quot;q2&quot;: {\r\n                &quot;question&quot;: &quot;12 - 8 = ?&quot;,\r\n                &quot;options&quot;: [\r\n                    &quot;1&quot;,\r\n                    &quot;2&quot;,\r\n                    &quot;3&quot;,\r\n                    &quot;4&quot;\r\n                ],\r\n                &quot;answer&quot;: &quot;4&quot;\r\n            }\r\n        }\r\n    }\r\n}'),
('sherlocked', 2, 3, 2, '2024-01-24 21:42:44', 'properties2properties', 'properties to properties', 'quiz.sport.q1.question=Which one is correct team name in NBA?\r\nquiz.sport.q1.options.0=New York Bulls\r\nquiz.sport.q1.options.1=Los Angeles Kings\r\nquiz.sport.q1.options.2=Golden State Warriros\r\nquiz.sport.q1.options.3=Huston Rocket\r\nquiz.sport.q1.answer=Huston Rocket\r\nquiz.maths.q1.question=5 + 7 = ?\r\nquiz.maths.q1.options.0=10\r\nquiz.maths.q1.options.1=11\r\nquiz.maths.q1.options.2=12\r\nquiz.maths.q1.options.3=13\r\nquiz.maths.q1.answer=12\r\nquiz.maths.q2.question=12 - 8 = ?\r\nquiz.maths.q2.options.0=1\r\nquiz.maths.q2.options.1=2\r\nquiz.maths.q2.options.2=3\r\nquiz.maths.q2.options.3=4\r\nquiz.maths.q2.answer=4'),
('sherlocked', 2, 3, 2, '2024-01-24 21:44:22', 'properties2json', 'properties to json', '{\n    \"quiz\": {\n        \"sport\": {\n            \"q1\": {\n                \"question\": \"Which one is correct team name in NBA?\",\n                \"options\": [\n                    \"New York Bulls\",\n                    \"Los Angeles Kings\",\n                    \"Golden State Warriros\",\n                    \"Huston Rocket\"\n                ],\n                \"answer\": \"Huston Rocket\"\n            }\n        },\n        \"maths\": {\n            \"q1\": {\n                \"question\": \"5 + 7 = ?\",\n                \"options\": [\n                    \"10\",\n                    \"11\",\n                    \"12\",\n                    \"13\"\n                ],\n                \"answer\": \"12\"\n            },\n            \"q2\": {\n                \"question\": \"12 - 8 = ?\",\n                \"options\": [\n                    \"1\",\n                    \"2\",\n                    \"3\",\n                    \"4\"\n                ],\n                \"answer\": \"4\"\n            }\n        }\n    }\n}'),
('sherlocked', 2, 1, 3, '2024-01-24 22:02:50', 'json2json', '', '{\r\n    &quot;quiz&quot;: {\r\n        &quot;sport&quot;: {\r\n            &quot;q1&quot;: {\r\n                &quot;question&quot;: &quot;Which one is correct team name in NBA?&quot;,\r\n                &quot;options&quot;: [\r\n                    &quot;New York Bulls&quot;,\r\n                    &quot;Los Angeles Kings&quot;,\r\n                    &quot;Golden State Warriros&quot;,\r\n                    &quot;Huston Rocket&quot;\r\n                ],\r\n                &quot;answer&quot;: &quot;Huston Rocket&quot;\r\n            }\r\n        },\r\n        &quot;maths&quot;: {\r\n            &quot;q1&quot;: {\r\n                &quot;question&quot;: &quot;5 + 7 = ?&quot;,\r\n                &quot;options&quot;: [\r\n                    &quot;10&quot;,\r\n                    &quot;11&quot;,\r\n                    &quot;12&quot;,\r\n                    &quot;13&quot;\r\n                ],\r\n                &quot;answer&quot;: &quot;12&quot;\r\n            },\r\n            &quot;q2&quot;: {\r\n                &quot;question&quot;: &quot;12 - 8 = ?&quot;,\r\n                &quot;options&quot;: [\r\n                    &quot;1&quot;,\r\n                    &quot;2&quot;,\r\n                    &quot;3&quot;,\r\n                    &quot;4&quot;\r\n                ],\r\n                &quot;answer&quot;: &quot;4&quot;\r\n            }\r\n        }\r\n    }\r\n}'),
('sherlocked', 2, 1, 3, '2024-01-24 22:06:12', 'json2properties', '', 'quiz.sport.q1.question=Which one is correct team name in NBA?\nquiz.sport.q1.options.0=New York Bulls\nquiz.sport.q1.options.1=Los Angeles Kings\nquiz.sport.q1.options.2=Golden State Warriros\nquiz.sport.q1.options.3=Huston Rocket\nquiz.sport.q1.answer=Huston Rocket\nquiz.maths.q1.question=5 + 7 = ?\nquiz.maths.q1.options.0=10\nquiz.maths.q1.options.1=11\nquiz.maths.q1.options.2=12\nquiz.maths.q1.options.3=13\nquiz.maths.q1.answer=12\nquiz.maths.q2.question=12 - 8 = ?\nquiz.maths.q2.options.0=1\nquiz.maths.q2.options.1=2\nquiz.maths.q2.options.2=3\nquiz.maths.q2.options.3=4\nquiz.maths.q2.answer=4\n');

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`username`, `name`, `passwd`, `email`) VALUES
('helium', 'Diana Markova', '$2y$10$400TfckwCivMnSP/q1qCPuWbMQRGl1/EmJsuywapDbxk8BSkEA8ce', 'dventsisla@uni-sofia.bg'),
('pesho42', 'Pesho', '$2y$10$M.UtL.q5iG.QXpE2E/rx9eqV3oZOTAEHCzD32xaEFYVjCP9Sv5ENe', 'pesho@gosho.com'),
('sherlocked', 'Sherlock Holmes', '$2y$10$fJTKyRRLOrSG6x4qXdq3Te8K0uKoOv0a6rdBte6Yq/8SGv9ew5d7i', 'sherlock@221b.bakerstreet');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;