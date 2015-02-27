-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 27 2015 г., 18:20
-- Версия сервера: 5.5.41-0ubuntu0.12.04.1
-- Версия PHP: 5.5.22-1+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `zf2vacancies`
--

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL,
  `default_title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id`, `default_title`) VALUES
(1, 'Developers'),
(2, 'QA'),
(3, 'Management'),
(4, 'Economists');

-- --------------------------------------------------------

--
-- Структура таблицы `department_contents`
--

CREATE TABLE IF NOT EXISTS `department_contents` (
  `id` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `department_contents`
--

INSERT INTO `department_contents` (`id`, `department_id`, `language_id`, `title`) VALUES
(1, 1, 1, 'Разработчики'),
(2, 1, 2, 'Developers'),
(3, 1, 3, 'Développeurs'),
(4, 1, 4, 'Entwickler'),
(5, 1, 5, 'Sviluppatori'),
(6, 2, 1, 'QA'),
(7, 2, 2, 'QA'),
(8, 2, 3, 'QA'),
(9, 2, 4, 'QA'),
(10, 2, 5, 'QA'),
(11, 3, 1, 'Менеджмент'),
(12, 3, 2, 'Management'),
(13, 3, 3, 'Gestion'),
(14, 3, 4, 'Verwaltung'),
(15, 3, 5, 'Gestione'),
(16, 4, 1, 'Экономисты'),
(17, 4, 2, 'Economists'),
(18, 4, 3, 'Les économistes'),
(19, 4, 4, 'Volkswirte'),
(20, 4, 5, 'Economisti');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'ru'),
(2, 'en'),
(3, 'fr'),
(4, 'de'),
(5, 'it');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancies`
--

CREATE TABLE IF NOT EXISTS `vacancies` (
  `id` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vacancies`
--

INSERT INTO `vacancies` (`id`, `department_id`, `created_at`) VALUES
(1, 1, '2015-02-27 17:07:18'),
(2, 1, '2015-02-27 17:07:18'),
(3, 1, '2015-02-27 17:07:18'),
(4, 2, '2015-02-27 17:07:18'),
(5, 2, '2015-02-27 17:07:18'),
(6, 3, '2015-02-27 17:07:18'),
(7, 3, '2015-02-27 17:07:18'),
(8, 3, '2015-02-27 17:07:18'),
(9, 4, '2015-02-27 17:07:18'),
(10, 4, '2015-02-27 17:07:18');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy_contents`
--

CREATE TABLE IF NOT EXISTS `vacancy_contents` (
  `id` int(10) unsigned NOT NULL,
  `vacancy_id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vacancy_contents`
--

INSERT INTO `vacancy_contents` (`id`, `vacancy_id`, `language_id`, `title`, `content`) VALUES
(1, 1, 1, 'Front-End Web Разработчик (Ru)', 'Разработки на клиенте'),
(2, 1, 2, 'Front-End Web Developer (En)', 'Works on Front-End side'),
(3, 1, 3, 'Front-End Web Developer (Fr)', 'Fonctionne sur le côté frontal'),
(4, 1, 4, 'Front-End Web Developer (De)', 'Funktioniert auf Front-End-Seite'),
(5, 1, 5, 'Front-End Web Developer (It)', 'Funziona su lato front-end'),
(6, 2, 1, 'Back-End Web разработчик (Ru)', 'Серверное программирование'),
(7, 2, 2, 'Back-End Web Developer (En)', 'Server-Side Programming'),
(8, 2, 3, 'Back-End Web Developer (Fr)', 'Programmation côté serveur'),
(9, 2, 4, 'Back-End Web Developer (De)', 'Serverseitige Programmierung'),
(10, 2, 5, 'Back-End Web Developer (It)', 'Programmazione lato server'),
(11, 3, 1, 'Full-Stack Web разработчик (Ru)', 'Описание на русском'),
(12, 3, 2, 'Full-Stack Web Developer (En)', 'Description in English'),
(13, 3, 3, 'Full-Stack Web Developer (Fr)', 'Description en français'),
(14, 3, 4, 'Full-Stack Web Developer (De)', 'Beschreibung in Deutsch'),
(15, 3, 5, 'Full-Stack Web Developer (It)', 'Descrizione in italiano'),
(16, 4, 1, 'QA Engineer (Ru)', 'Описание на русском'),
(17, 4, 2, 'QA Engineer (En)', 'Description in English'),
(18, 4, 3, 'QA Engineer (Fr)', 'Description en français'),
(19, 4, 4, 'QA Engineer (De)', 'Beschreibung in Deutsch'),
(20, 4, 5, 'QA Engineer (It)', 'Descrizione in italiano'),
(21, 5, 1, 'Senior QA Engineer (Ru)', 'Описание на русском'),
(22, 5, 2, 'Senior QA Engineer (En)', 'Description in English'),
(23, 5, 3, 'Senior QA Engineer (Fr)', 'Description en français'),
(24, 5, 4, 'Senior QA Engineer (De)', 'Beschreibung in Deutsch'),
(25, 5, 5, 'Senior QA Engineer (It)', 'Descrizione in italiano'),
(26, 6, 1, 'CEO (Ru)', 'Описание на русском'),
(27, 6, 2, 'CEO (En)', 'Description in English'),
(28, 6, 3, 'CEO (Fr)', 'Description en français'),
(29, 6, 4, 'CEO (De)', 'Beschreibung in Deutsch'),
(30, 6, 5, 'CEO (It)', 'Descrizione in italiano'),
(31, 7, 1, 'Executive Manager (Ru)', 'Описание на русском'),
(32, 7, 2, 'Executive Manager (En)', 'Description in English'),
(33, 7, 3, 'Executive Manager (Fr)', 'Description en français'),
(34, 7, 4, 'Executive Manager (De)', 'Beschreibung in Deutsch'),
(35, 7, 5, 'Executive Manager (It)', 'Descrizione in italiano'),
(36, 8, 1, 'Team Leader (Ru)', 'Описание на русском'),
(37, 8, 2, 'Team Leader (En)', 'Description in English'),
(38, 8, 3, 'Team Leader (Fr)', 'Description en français'),
(39, 8, 4, 'Team Leader (De)', 'Beschreibung in Deutsch'),
(40, 8, 5, 'Team Leader (It)', 'Descrizione in italiano'),
(41, 9, 1, 'Economist (Ru)', 'Описание на русском'),
(42, 9, 2, 'Economist (En)', 'Description in English'),
(43, 9, 3, 'Economist (Fr)', 'Description en français'),
(44, 9, 4, 'Economist (De)', 'Beschreibung in Deutsch'),
(45, 9, 5, 'Economist (It)', 'Descrizione in italiano'),
(46, 10, 1, 'Finansist (Ru)', 'Описание на русском'),
(47, 10, 2, 'Finansist (En)', 'Description in English'),
(48, 10, 3, 'Finansist (Fr)', 'Description en français'),
(49, 10, 4, 'Finansist (De)', 'Beschreibung in Deutsch'),
(50, 10, 5, 'Finansist (It)', 'Descrizione in italiano');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `department_contents`
--
ALTER TABLE `department_contents`
  ADD PRIMARY KEY (`id`), ADD KEY `departments_fk` (`department_id`), ADD KEY `languages_fk` (`language_id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`), ADD KEY `departments_to_vacancies` (`department_id`);

--
-- Индексы таблицы `vacancy_contents`
--
ALTER TABLE `vacancy_contents`
  ADD PRIMARY KEY (`id`), ADD KEY `languages_fk` (`language_id`), ADD KEY `vacancies_fk` (`vacancy_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `department_contents`
--
ALTER TABLE `department_contents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `vacancy_contents`
--
ALTER TABLE `vacancy_contents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
