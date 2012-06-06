-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 07 2012 г., 00:03
-- Версия сервера: 5.5.22
-- Версия PHP: 5.3.10-1ubuntu3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `reelty`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `actions`
--

INSERT INTO `actions` (`id`, `name`) VALUES
(3, 'Аренда'),
(2, 'Покупка'),
(1, 'Продажа');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(4, 'Гараж'),
(3, 'Дача'),
(1, 'Дом'),
(2, 'Квартира');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `object_id` bigint(20) NOT NULL,
  `text` text NOT NULL,
  `negative` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `object_id_idx` (`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `object_id`, `text`, `negative`, `created_at`, `updated_at`) VALUES
(1, 1, 71, 'sdfdds', 1, '2012-05-30 22:37:43', '2012-05-30 22:37:43'),
(2, 1, 71, 'dddsd', 1, '2012-05-30 22:37:49', '2012-05-30 22:37:49'),
(3, 1, 71, 'dfffds', 0, '2012-05-30 22:37:54', '2012-05-30 22:37:54'),
(4, 1, 71, 'fsdfsdfdsfdsf', 0, '2012-05-30 22:37:58', '2012-05-30 22:37:58'),
(5, 1, 71, 'asdfasdf', 1, '2012-05-30 22:38:01', '2012-05-30 22:38:01'),
(6, 1, 77, 'xcxcv', 1, '2012-05-30 22:48:52', '2012-05-30 22:48:52'),
(7, 2, 71, 'cgjghmbmn', 1, '2012-06-03 18:23:39', '2012-06-03 18:23:39'),
(8, 2, 71, 'sssss', 1, '2012-06-05 22:19:21', '2012-06-05 22:19:21'),
(9, 2, 71, 'sdsdsdd', 0, '2012-06-05 22:19:27', '2012-06-05 22:19:27'),
(10, 2, 82, 'sadferc', 1, '2012-06-06 23:59:17', '2012-06-06 23:59:17');

-- --------------------------------------------------------

--
-- Структура таблицы `objects`
--

CREATE TABLE IF NOT EXISTS `objects` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `actions_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `description` text,
  `room_count` bigint(20) DEFAULT NULL,
  `floor_count` bigint(20) DEFAULT NULL,
  `avaible` tinyint(1) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id_idx` (`category_id`),
  KEY `actions_id_idx` (`actions_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Дамп данных таблицы `objects`
--

INSERT INTO `objects` (`id`, `category_id`, `actions_id`, `user_id`, `adress`, `description`, `room_count`, `floor_count`, `avaible`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 'бул. Шевченка 100', 'объект №100', 2, 8, 1, 452511, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(2, 3, 3, 1, 'бул. Шевченка 101', 'объект №101', 1, 13, 1, 865165, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(3, 1, 3, 1, 'бул. Шевченка 102', 'объект №102', 4, 14, 1, 32321, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(4, 3, 3, 1, 'бул. Шевченка 103', 'объект №103', 4, 10, 1, 267305, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(5, 2, 3, 1, 'бул. Шевченка 104', 'объект №104', 1, 14, 1, 614282, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(6, 2, 2, 1, 'бул. Шевченка 105', 'объект №105', 3, 9, 1, 900767, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(7, 2, 3, 1, 'бул. Шевченка 106', 'объект №106', 3, 12, 1, 422305, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(8, 4, 1, 1, 'бул. Шевченка 107', 'объект №107', 1, 3, 1, 95260, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(9, 1, 1, 1, 'бул. Шевченка 108', 'объект №108', 1, 13, 1, 9133, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(10, 1, 2, 1, 'бул. Шевченка 109', 'объект №109', 5, 12, 1, 61672, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(11, 1, 1, 1, 'бул. Шевченка 110', 'объект №110', 5, 5, 1, 970350, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(12, 2, 3, 1, 'бул. Шевченка 111', 'объект №111', 4, 15, 1, 193810, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(13, 3, 1, 1, 'бул. Шевченка 112', 'объект №112', 1, 1, 1, 956281, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(14, 3, 3, 1, 'бул. Шевченка 113', 'объект №113', 2, 12, 1, 151824, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(15, 2, 3, 1, 'бул. Шевченка 114', 'объект №114', 2, 7, 1, 547783, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(16, 2, 2, 1, 'бул. Шевченка 115', 'объект №115', 1, 6, 1, 169308, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(17, 1, 2, 1, 'бул. Шевченка 116', 'объект №116', 2, 16, 1, 811392, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(18, 2, 2, 1, 'бул. Шевченка 117', 'объект №117', 3, 15, 1, 325660, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(19, 3, 2, 1, 'бул. Шевченка 118', 'объект №118', 3, 14, 1, 407042, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(20, 3, 2, 1, 'бул. Шевченка 119', 'объект №119', 2, 13, 1, 134532, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(21, 3, 1, 1, 'бул. Шевченка 120', 'объект №120', 5, 15, 1, 522806, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(22, 2, 1, 1, 'бул. Шевченка 121', 'объект №121', 5, 8, 1, 550709, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(23, 1, 2, 1, 'бул. Шевченка 122', 'объект №122', 1, 8, 1, 484234, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(24, 4, 3, 1, 'бул. Шевченка 123', 'объект №123', 5, 7, 1, 610583, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(25, 1, 1, 1, 'бул. Шевченка 124', 'объект №124', 5, 13, 1, 921754, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(26, 2, 1, 1, 'бул. Шевченка 125', 'объект №125', 2, 13, 1, 73724, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(27, 2, 2, 1, 'бул. Шевченка 126', 'объект №126', 1, 6, 1, 224601, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(28, 3, 3, 1, 'бул. Шевченка 127', 'объект №127', 3, 12, 1, 196680, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(29, 1, 3, 1, 'бул. Шевченка 128', 'объект №128', 4, 2, 1, 341309, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(30, 1, 1, 1, 'бул. Шевченка 129', 'объект №129', 1, 3, 1, 414632, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(31, 3, 2, 1, 'бул. Шевченка 130', 'объект №130', 3, 11, 1, 160674, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(32, 2, 1, 1, 'бул. Шевченка 131', 'объект №131', 3, 13, 1, 875952, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(33, 3, 1, 1, 'бул. Шевченка 132', 'объект №132', 2, 12, 1, 556233, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(34, 2, 2, 1, 'бул. Шевченка 133', 'объект №133', 2, 15, 1, 167655, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(35, 3, 3, 1, 'бул. Шевченка 134', 'объект №134', 1, 4, 1, 13816, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(36, 2, 2, 1, 'бул. Шевченка 135', 'объект №135', 1, 8, 1, 568095, '2012-05-30 22:35:25', '2012-05-30 22:35:25'),
(37, 2, 1, 1, 'бул. Шевченка 136', 'объект №136', 5, 16, 1, 821886, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(38, 1, 2, 1, 'бул. Шевченка 137', 'объект №137', 5, 9, 1, 114058, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(39, 4, 1, 1, 'бул. Шевченка 138', 'объект №138', 2, 16, 1, 825352, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(40, 4, 2, 1, 'бул. Шевченка 139', 'объект №139', 2, 4, 1, 328791, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(41, 2, 3, 1, 'бул. Шевченка 140', 'объект №140', 2, 8, 1, 932303, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(42, 1, 3, 1, 'бул. Шевченка 141', 'объект №141', 2, 5, 1, 333526, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(43, 4, 3, 1, 'бул. Шевченка 142', 'объект №142', 3, 15, 1, 655846, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(44, 2, 3, 1, 'бул. Шевченка 143', 'объект №143', 1, 4, 1, 526434, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(45, 1, 3, 1, 'бул. Шевченка 144', 'объект №144', 4, 8, 1, 971546, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(46, 2, 2, 1, 'бул. Шевченка 145', 'объект №145', 3, 12, 1, 548092, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(47, 3, 1, 1, 'бул. Шевченка 146', 'объект №146', 2, 16, 1, 654785, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(48, 1, 1, 1, 'бул. Шевченка 147', 'объект №147', 3, 9, 1, 487977, '2012-05-30 22:35:26', '2012-05-30 22:35:26'),
(49, 4, 2, 1, 'бул. Шевченка 148', 'объект №148', 2, 6, 1, 372748, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(50, 4, 2, 1, 'бул. Шевченка 149', 'объект №149', 2, 14, 1, 833896, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(51, 4, 1, 1, 'бул. Шевченка 150', 'объект №150', 5, 8, 1, 465036, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(52, 4, 3, 1, 'бул. Шевченка 151', 'объект №151', 5, 3, 1, 650493, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(53, 2, 3, 1, 'бул. Шевченка 152', 'объект №152', 5, 10, 1, 882296, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(54, 2, 3, 1, 'бул. Шевченка 153', 'объект №153', 1, 16, 1, 348254, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(55, 3, 3, 1, 'бул. Шевченка 154', 'объект №154', 5, 13, 1, 197640, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(56, 1, 2, 1, 'бул. Шевченка 155', 'объект №155', 5, 9, 1, 519171, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(57, 3, 2, 1, 'бул. Шевченка 156', 'объект №156', 3, 8, 1, 910894, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(58, 4, 1, 1, 'бул. Шевченка 157', 'объект №157', 5, 13, 1, 447457, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(59, 2, 1, 1, 'бул. Шевченка 158', 'объект №158', 2, 5, 1, 775499, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(60, 1, 3, 1, 'бул. Шевченка 159', 'объект №159', 3, 6, 1, 774599, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(61, 4, 3, 1, 'бул. Шевченка 160', 'объект №160', 4, 13, 1, 709462, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(62, 4, 3, 1, 'бул. Шевченка 161', 'объект №161', 2, 11, 1, 534187, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(63, 4, 1, 1, 'бул. Шевченка 162', 'объект №162', 5, 7, 1, 803238, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(64, 4, 2, 1, 'бул. Шевченка 163', 'объект №163', 1, 12, 1, 181733, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(65, 3, 1, 1, 'бул. Шевченка 164', 'объект №164', 2, 14, 1, 505782, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(66, 1, 1, 1, 'бул. Шевченка 165', 'объект №165', 2, 12, 1, 461828, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(67, 1, 2, 1, 'бул. Шевченка 166', 'объект №166', 2, 12, 1, 363597, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(68, 1, 2, 1, 'бул. Шевченка 167', 'объект №167', 2, 8, 1, 183872, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(69, 4, 1, 1, 'бул. Шевченка 168', 'объект №168', 3, 14, 1, 714053, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(70, 2, 3, 1, 'бул. Шевченка 169', 'объект №169', 1, 7, 1, 411359, '2012-05-30 22:35:27', '2012-05-30 22:35:27'),
(71, 2, 3, 1, 'бул. Шевченка 170', 'объект №170', 4, 10, 1, 761146, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(72, 1, 3, 1, 'бул. Шевченка 171', 'объект №171', 5, 7, 1, 427521, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(73, 2, 2, 1, 'бул. Шевченка 172', 'объект №172', 1, 12, 1, 142795, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(74, 2, 3, 1, 'бул. Шевченка 173', 'объект №173', 4, 12, 1, 269445, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(75, 4, 2, 1, 'бул. Шевченка 174', 'объект №174', 3, 6, 1, 436880, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(76, 2, 3, 1, 'бул. Шевченка 175', 'объект №175', 1, 7, 1, 44897, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(77, 3, 3, 1, 'бул. Шевченка 176', 'объект №176', 5, 3, 1, 290475, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(78, 3, 1, 1, 'бул. Шевченка 177', 'объект №177', 1, 10, 1, 671373, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(79, 2, 3, 1, 'бул. Шевченка 178', 'объект №178', 1, 8, 1, 642748, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(80, 2, 3, 1, 'бул. Шевченка 179', 'объект №179', 3, 15, 1, 611817, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(81, 3, 3, 1, 'бул. Шевченка 180', 'объект №180', 2, 6, 1, 130608, '2012-05-30 22:35:28', '2012-05-30 22:35:28'),
(82, 4, 3, 1, 'sdasddddwd', '', NULL, NULL, 1, 21321, '2012-06-05 22:24:22', '2012-06-05 22:24:22');

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `objects_id` bigint(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `objects_id_idx` (`objects_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `objects_id`, `url`) VALUES
(40, 75, 'uploads/75/Zalevskij75_4.jpg'),
(41, 75, 'uploads/75/Zalevskij75_6.jpg'),
(42, 75, 'uploads/75/1316779938_savv_6.jpg'),
(43, 82, 'uploads/82/mix_wall_46_.jpg'),
(44, 82, 'uploads/82/mix_wall_42_.jpg'),
(45, 82, 'uploads/82/Zalevskij75_5.jpg'),
(46, 82, 'uploads/82/Zalevskij75_4.jpg'),
(47, 82, 'uploads/82/Zalevskij75_6.jpg'),
(48, 82, 'uploads/82/1316779938_savv_6.jpg'),
(49, 82, 'uploads/82/1316779939_savv_3.jpg'),
(50, 82, 'uploads/82/1316779919_savv_11.jpg'),
(51, 82, 'uploads/82/1316779946_savv_8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator group', '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(2, 'user', 'User group', '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(3, 'moder', 'Moder group', '2012-05-30 22:35:24', '2012-05-30 22:35:24');

-- --------------------------------------------------------

--
-- Структура таблицы `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sf_guard_group_permission`
--

INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(2, 2, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(3, 3, '2012-05-30 22:35:24', '2012-05-30 22:35:24');

-- --------------------------------------------------------

--
-- Структура таблицы `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator permission', '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(2, 'user', 'User permission', '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(3, 'moder', 'Moder permission', '2012-05-30 22:35:24', '2012-05-30 22:35:24');

-- --------------------------------------------------------

--
-- Структура таблицы `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `subj_of_law_id` bigint(20) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` text,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`),
  KEY `is_active_idx_idx` (`is_active`),
  KEY `subj_of_law_id_idx` (`subj_of_law_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `subj_of_law_id`, `phone`, `description`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 2, '555-555-555', NULL, 'john.doe@gmail.com', 'admin', 'sha1', '6d6b0da620d7d537213cf0abc94af4ec', '512963b34296adcb1599f8e1c6a7ce153fba39c4', 1, 1, '2012-06-05 11:13:21', '2012-05-30 22:35:24', '2012-06-05 11:13:21'),
(2, 'Sergey', 'Bulgacov', 1, '111-111-111', NULL, 'bulgakows@gmail.com', 'bulgakows', 'sha1', 'fd394aa8ddb6ed2b05b16d5f1ca791c0', '07d60d003b0c5564a52b4cc865264ce624ea19d5', 1, 0, '2012-06-06 22:40:51', '2012-05-30 22:35:24', '2012-06-06 22:40:51');

-- --------------------------------------------------------

--
-- Структура таблицы `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sf_guard_user_group`
--

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2012-05-30 22:35:24', '2012-05-30 22:35:24'),
(2, 3, '2012-05-30 22:35:24', '2012-05-30 22:35:24');

-- --------------------------------------------------------

--
-- Структура таблицы `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `subj_of_law`
--

CREATE TABLE IF NOT EXISTS `subj_of_law` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `subj_of_law`
--

INSERT INTO `subj_of_law` (`id`, `name`) VALUES
(4, 'Корпорация'),
(3, 'СПД'),
(1, 'Физ. лицо'),
(2, 'Юр. лицо');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_object_id_objects_id` FOREIGN KEY (`object_id`) REFERENCES `objects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `objects`
--
ALTER TABLE `objects`
  ADD CONSTRAINT `objects_actions_id_actions_id` FOREIGN KEY (`actions_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `objects_category_id_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `objects_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_objects_id_objects_id` FOREIGN KEY (`objects_id`) REFERENCES `objects` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sf_guard_user`
--
ALTER TABLE `sf_guard_user`
  ADD CONSTRAINT `sf_guard_user_subj_of_law_id_subj_of_law_id` FOREIGN KEY (`subj_of_law_id`) REFERENCES `subj_of_law` (`id`);

--
-- Ограничения внешнего ключа таблицы `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
