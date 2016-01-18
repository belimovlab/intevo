-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 17 2016 г., 15:07
-- Версия сервера: 5.5.27
-- Версия PHP: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `intevo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `active_code` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `email`, `password`, `active_code`) VALUES
(1, 'sbelimov@gmail.com', '044be57429ebc88bff19ef97c55c24cf', '');

-- --------------------------------------------------------

--
-- Структура таблицы `storage`
--

CREATE TABLE `storage` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `is_folder` int(11) NOT NULL,
  `parent_folder` varchar(10) COLLATE utf8_bin NOT NULL,
  `create_date` datetime NOT NULL,
  `size` bigint(20) NOT NULL,
  `url` text COLLATE utf8_bin NOT NULL,
  `myme_type` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `storage`
--

INSERT INTO `storage` (`id`, `name`, `is_folder`, `parent_folder`, `create_date`, `size`, `url`, `myme_type`) VALUES
(1, 'Первая папка', 1, '', '2016-01-04 00:00:00', 0, '', ''),
(2, 'Вторая папка', 1, '', '2016-01-04 00:00:00', 0, '', ''),
(3, 'Первый файл', 0, '', '2016-01-04 00:00:00', 1024, '1.txt', ''),
(4, 'Новая папка 3', 1, '', '2016-01-06 11:16:10', 0, '', ''),
(5, 'Новая папка 3', 1, '', '2016-01-06 11:16:16', 0, '', ''),
(6, 'asd', 1, '2', '2016-01-06 11:27:56', 0, '', ''),
(7, 'adasdasd', 1, '6', '2016-01-06 11:28:01', 0, '', ''),
(8, 'asd', 1, '7', '2016-01-06 11:29:03', 0, '', ''),
(9, 'eqwe', 1, '7', '2016-01-06 11:29:07', 0, '', ''),
(10, 'gfh', 1, '2', '2016-01-06 14:11:32', 0, '', ''),
(11, '444', 1, '2', '2016-01-06 14:11:35', 0, '', ''),
(12, '555', 1, '11', '2016-01-06 14:11:38', 0, '', ''),
(13, '666', 1, '12', '2016-01-06 14:11:42', 0, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `system`
--

CREATE TABLE `system` (
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `from_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `work_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `system`
--

INSERT INTO `system` (`title`, `from_email`, `work_status`) VALUES
('Первый магазин №1', 'noreply@inetvo.cms', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `storage`
--
ALTER TABLE `storage`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `storage`
--
ALTER TABLE `storage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
