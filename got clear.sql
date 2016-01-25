-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 18 2012 г., 09:40
-- Версия сервера: 5.5.16
-- Версия PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `got`
--

-- --------------------------------------------------------

--
-- Структура таблицы `battle`
--

CREATE TABLE IF NOT EXISTS `battle` (
  `id` int(255) NOT NULL,
  `starting` varchar(20) NOT NULL DEFAULT '0',
  `target` varchar(20) NOT NULL DEFAULT '0',
  `attacker` varchar(9) NOT NULL DEFAULT '0',
  `defender` varchar(9) NOT NULL DEFAULT '0',
  `aorder` int(1) NOT NULL DEFAULT '0',
  `dorder` int(2) NOT NULL DEFAULT '0',
  `aunit1` varchar(2) NOT NULL DEFAULT '0',
  `aunit2` varchar(2) NOT NULL DEFAULT '0',
  `aunit3` varchar(2) NOT NULL DEFAULT '0',
  `aunit4` varchar(2) NOT NULL DEFAULT '0',
  `dunit1` varchar(2) NOT NULL DEFAULT '0',
  `dunit2` varchar(2) NOT NULL DEFAULT '0',
  `dunit3` varchar(2) NOT NULL DEFAULT '0',
  `dunit4` varchar(2) NOT NULL DEFAULT '0',
  `asup1` varchar(20) NOT NULL DEFAULT '0',
  `asup2` varchar(20) NOT NULL DEFAULT '0',
  `asup3` varchar(20) NOT NULL DEFAULT '0',
  `asup4` varchar(20) NOT NULL DEFAULT '0',
  `asup5` varchar(20) NOT NULL DEFAULT '0',
  `asup6` varchar(20) NOT NULL DEFAULT '0',
  `asup7` varchar(20) NOT NULL DEFAULT '0',
  `dsup1` varchar(20) NOT NULL DEFAULT '0',
  `dsup2` varchar(20) NOT NULL DEFAULT '0',
  `dsup3` varchar(20) NOT NULL DEFAULT '0',
  `dsup4` varchar(20) NOT NULL DEFAULT '0',
  `dsup5` varchar(20) NOT NULL DEFAULT '0',
  `dsup6` varchar(20) NOT NULL DEFAULT '0',
  `dsup7` varchar(20) NOT NULL DEFAULT '0',
  `garrison` int(1) NOT NULL DEFAULT '0',
  `castle` tinyint(1) NOT NULL DEFAULT '0',
  `aCS` int(2) NOT NULL DEFAULT '0',
  `dCS` int(2) NOT NULL DEFAULT '0',
  `acard` varchar(20) NOT NULL DEFAULT '0',
  `dcard` varchar(20) NOT NULL DEFAULT '0',
  `currentplayer` varchar(9) NOT NULL DEFAULT '0',
  `1ready` tinyint(1) NOT NULL DEFAULT '0',
  `winner` varchar(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `battle`
--

INSERT INTO `battle` (`id`, `starting`, `target`, `attacker`, `defender`, `aorder`, `dorder`, `aunit1`, `aunit2`, `aunit3`, `aunit4`, `dunit1`, `dunit2`, `dunit3`, `dunit4`, `asup1`, `asup2`, `asup3`, `asup4`, `asup5`, `asup6`, `asup7`, `dsup1`, `dsup2`, `dsup3`, `dsup4`, `dsup5`, `dsup6`, `dsup7`, `garrison`, `castle`, `aCS`, `dCS`, `acard`, `dcard`, `currentplayer`, `1ready`, `winner`) VALUES
(1, '0', '0', '0', '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', '0', 0, '0'),
(17, '0', '0', '0', '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', '0', 0, '0'),
(18, '0', '0', '0', '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', '0', 0, '0'),
(19, '0', '0', '0', '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', '0', 0, '0'),
(20, '0', '0', '0', '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', '0', 0, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Stark` int(255) NOT NULL DEFAULT '0' COMMENT 'player1',
  `Greyjoy` int(255) NOT NULL DEFAULT '0' COMMENT 'player2',
  `Lannister` int(255) NOT NULL DEFAULT '0' COMMENT 'player3',
  `Martell` int(255) NOT NULL DEFAULT '0' COMMENT 'player4',
  `Tyrell` int(255) NOT NULL DEFAULT '0' COMMENT 'player5',
  `Baratheon` int(255) NOT NULL DEFAULT '0' COMMENT 'player6',
  `turn` tinyint(1) NOT NULL DEFAULT '0',
  `faza` int(1) NOT NULL DEFAULT '3',
  `terr` varchar(10) NOT NULL COMMENT 'imya tablici',
  `house` varchar(20) NOT NULL,
  `currentplayer` int(1) NOT NULL DEFAULT '0',
  `throne1` varchar(9) NOT NULL DEFAULT 'Baratheon',
  `throne2` varchar(9) NOT NULL DEFAULT 'Lannister',
  `throne3` varchar(9) NOT NULL DEFAULT 'Stark',
  `throne4` varchar(9) NOT NULL DEFAULT 'Martell',
  `throne5` varchar(9) NOT NULL DEFAULT 'Greyjoy',
  `throne6` varchar(9) NOT NULL DEFAULT 'Tyrell',
  `fiefdom1` varchar(9) NOT NULL DEFAULT 'Greyjoy',
  `fiefdom2` varchar(9) NOT NULL DEFAULT 'Tyrell',
  `fiefdom3` varchar(9) NOT NULL DEFAULT 'Martell',
  `fiefdom4` varchar(9) NOT NULL DEFAULT 'Stark',
  `fiefdom5` varchar(9) NOT NULL DEFAULT 'Baratheon',
  `fiefdom6` varchar(9) NOT NULL DEFAULT 'Lannister',
  `court1` varchar(9) NOT NULL DEFAULT 'Lannister',
  `court2` varchar(9) NOT NULL DEFAULT 'Stark',
  `court3` varchar(9) NOT NULL DEFAULT 'Martell',
  `court4` varchar(9) NOT NULL DEFAULT 'Baratheon',
  `court5` varchar(9) NOT NULL DEFAULT 'Tyrell',
  `court6` varchar(9) NOT NULL DEFAULT 'Greyjoy',
  `WC1_1` int(1) NOT NULL,
  `WC1_2` int(1) NOT NULL,
  `WC1_3` int(1) NOT NULL,
  `WC1_4` int(1) NOT NULL,
  `WC1_5` int(1) NOT NULL,
  `WC1_6` int(1) NOT NULL,
  `WC1_7` int(1) NOT NULL,
  `WC1_8` int(1) NOT NULL,
  `WC1_9` int(1) NOT NULL,
  `WC1_10` int(1) NOT NULL,
  `WC2_1` int(1) NOT NULL,
  `WC2_2` int(1) NOT NULL,
  `WC2_3` int(1) NOT NULL,
  `WC2_4` int(1) NOT NULL,
  `WC2_5` int(1) NOT NULL,
  `WC2_6` int(1) NOT NULL,
  `WC2_7` int(1) NOT NULL,
  `WC2_8` int(1) NOT NULL,
  `WC2_9` int(1) NOT NULL,
  `WC2_10` int(1) NOT NULL,
  `WC3_1` int(1) NOT NULL,
  `WC3_2` int(1) NOT NULL,
  `WC3_3` int(1) NOT NULL,
  `WC3_4` int(1) NOT NULL,
  `WC3_5` int(1) NOT NULL,
  `WC3_6` int(1) NOT NULL,
  `WC3_7` int(1) NOT NULL,
  `WC3_8` int(1) NOT NULL,
  `WC3_9` int(1) NOT NULL,
  `WC3_10` int(1) NOT NULL,
  `WildPower` int(1) NOT NULL DEFAULT '1',
  `WildCard1` int(1) NOT NULL,
  `WildCard2` int(1) NOT NULL,
  `WildCard3` int(1) NOT NULL,
  `WildCard4` int(1) NOT NULL,
  `WildCard5` int(1) NOT NULL,
  `WildCard6` int(1) NOT NULL,
  `WildCard7` int(1) NOT NULL,
  `WildCard8` int(1) NOT NULL,
  `WildCard9` int(1) NOT NULL,
  `win` int(1) NOT NULL DEFAULT '0',
  `Blade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `game`
--

INSERT INTO `game` (`id`, `Stark`, `Greyjoy`, `Lannister`, `Martell`, `Tyrell`, `Baratheon`, `turn`, `faza`, `terr`, `house`, `currentplayer`, `throne1`, `throne2`, `throne3`, `throne4`, `throne5`, `throne6`, `fiefdom1`, `fiefdom2`, `fiefdom3`, `fiefdom4`, `fiefdom5`, `fiefdom6`, `court1`, `court2`, `court3`, `court4`, `court5`, `court6`, `WC1_1`, `WC1_2`, `WC1_3`, `WC1_4`, `WC1_5`, `WC1_6`, `WC1_7`, `WC1_8`, `WC1_9`, `WC1_10`, `WC2_1`, `WC2_2`, `WC2_3`, `WC2_4`, `WC2_5`, `WC2_6`, `WC2_7`, `WC2_8`, `WC2_9`, `WC2_10`, `WC3_1`, `WC3_2`, `WC3_3`, `WC3_4`, `WC3_5`, `WC3_6`, `WC3_7`, `WC3_8`, `WC3_9`, `WC3_10`, `WildPower`, `WildCard1`, `WildCard2`, `WildCard3`, `WildCard4`, `WildCard5`, `WildCard6`, `WildCard7`, `WildCard8`, `WildCard9`, `win`, `Blade`) VALUES
(1, 30, 0, 32, 0, 0, 0, 0, 3, 'terr1', 'house1', 0, 'Baratheon', 'Lannister', 'Stark', 'Martell', 'Greyjoy', 'Tyrell', 'Greyjoy', 'Tyrell', 'Martell', 'Stark', 'Baratheon', 'Lannister', 'Lannister', 'Stark', 'Martell', 'Baratheon', 'Tyrell', 'Greyjoy', 2, 1, 2, 4, 3, 0, 1, 2, 1, 3, 0, 2, 3, 2, 2, 4, 0, 0, 1, 1, 0, 1, 2, 3, 4, 5, 6, 1, 6, 6, 1, 0, 3, 2, 5, 8, 7, 4, 4, 4, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 3, 'terr17', 'house17', 0, 'Baratheon', 'Lannister', 'Stark', 'Martell', 'Greyjoy', 'Tyrell', 'Greyjoy', 'Tyrell', 'Martell', 'Stark', 'Baratheon', 'Lannister', 'Lannister', 'Stark', 'Martell', 'Baratheon', 'Tyrell', 'Greyjoy', 1, 2, 1, 4, 3, 0, 1, 3, 2, 2, 0, 2, 3, 1, 2, 2, 1, 4, 0, 0, 3, 6, 4, 6, 0, 6, 1, 5, 2, 1, 1, 5, 6, 7, 3, 0, 2, 8, 1, 4, 0, 0),
(18, 0, 0, 0, 0, 0, 0, 0, 3, 'terr18', 'house18', 0, 'Baratheon', 'Lannister', 'Stark', 'Martell', 'Greyjoy', 'Tyrell', 'Greyjoy', 'Tyrell', 'Martell', 'Stark', 'Baratheon', 'Lannister', 'Lannister', 'Stark', 'Martell', 'Baratheon', 'Tyrell', 'Greyjoy', 2, 1, 2, 3, 1, 0, 1, 3, 2, 4, 2, 0, 0, 0, 3, 4, 1, 2, 2, 1, 6, 4, 3, 2, 5, 0, 1, 6, 6, 1, 1, 1, 6, 5, 2, 7, 8, 3, 4, 0, 0, 0),
(19, 0, 30, 0, 0, 0, 0, 0, 3, 'terr19', 'house19', 0, 'Baratheon', 'Lannister', 'Stark', 'Martell', 'Greyjoy', 'Tyrell', 'Greyjoy', 'Tyrell', 'Martell', 'Stark', 'Baratheon', 'Lannister', 'Lannister', 'Stark', 'Martell', 'Baratheon', 'Tyrell', 'Greyjoy', 3, 0, 2, 1, 1, 1, 2, 3, 2, 4, 0, 1, 2, 1, 2, 2, 0, 3, 4, 0, 6, 4, 0, 6, 5, 1, 6, 2, 1, 3, 1, 7, 2, 3, 1, 8, 5, 4, 0, 6, 0, 0),
(20, 0, 0, 0, 32, 0, 0, 0, 3, 'terr20', 'house20', 0, 'Baratheon', 'Lannister', 'Stark', 'Martell', 'Greyjoy', 'Tyrell', 'Greyjoy', 'Tyrell', 'Martell', 'Stark', 'Baratheon', 'Lannister', 'Lannister', 'Stark', 'Martell', 'Baratheon', 'Tyrell', 'Greyjoy', 2, 0, 3, 1, 1, 2, 4, 2, 3, 1, 2, 1, 0, 0, 3, 1, 2, 0, 2, 4, 1, 5, 6, 6, 2, 0, 4, 3, 6, 1, 1, 3, 7, 8, 2, 0, 6, 4, 1, 5, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `gamelist`
--

CREATE TABLE IF NOT EXISTS `gamelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` int(255) NOT NULL,
  `Stark` int(255) NOT NULL DEFAULT '0',
  `Greyjoy` int(255) NOT NULL DEFAULT '0',
  `Lannister` int(255) NOT NULL DEFAULT '0',
  `Martell` int(255) NOT NULL DEFAULT '0',
  `Tyrell` int(255) NOT NULL DEFAULT '0',
  `Baratheon` int(255) NOT NULL DEFAULT '0',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `gamelist`
--

INSERT INTO `gamelist` (`id`, `game`, `Stark`, `Greyjoy`, `Lannister`, `Martell`, `Tyrell`, `Baratheon`, `addtime`) VALUES
(3, 20, 0, 0, 0, 32, 0, 0, '2012-05-18 06:50:01');

-- --------------------------------------------------------

--
-- Структура таблицы `house1`
--

CREATE TABLE IF NOT EXISTS `house1` (
  `name` varchar(9) NOT NULL,
  `tokih` int(2) NOT NULL DEFAULT '5',
  `tokob` int(2) NOT NULL DEFAULT '0',
  `zamki` int(1) NOT NULL,
  `bochki` int(1) NOT NULL,
  `HC1` tinyint(1) NOT NULL DEFAULT '1',
  `HC2` tinyint(1) NOT NULL DEFAULT '1',
  `HC3` tinyint(1) NOT NULL DEFAULT '1',
  `HC4` tinyint(1) NOT NULL DEFAULT '1',
  `HC5` tinyint(1) NOT NULL DEFAULT '1',
  `HC6` tinyint(1) NOT NULL DEFAULT '1',
  `HC7` tinyint(1) NOT NULL DEFAULT '1',
  `ready` tinyint(1) NOT NULL DEFAULT '0',
  `bid` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `house1`
--

INSERT INTO `house1` (`name`, `tokih`, `tokob`, `zamki`, `bochki`, `HC1`, `HC2`, `HC3`, `HC4`, `HC5`, `HC6`, `HC7`, `ready`, `bid`) VALUES
('Baratheon', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Greyjoy', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Lannister', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Martell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Stark', 5, 0, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Tyrell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `house17`
--

CREATE TABLE IF NOT EXISTS `house17` (
  `name` varchar(9) NOT NULL,
  `tokih` int(2) NOT NULL DEFAULT '5',
  `tokob` int(2) NOT NULL DEFAULT '0',
  `zamki` int(1) NOT NULL,
  `bochki` int(1) NOT NULL,
  `HC1` tinyint(1) NOT NULL DEFAULT '1',
  `HC2` tinyint(1) NOT NULL DEFAULT '1',
  `HC3` tinyint(1) NOT NULL DEFAULT '1',
  `HC4` tinyint(1) NOT NULL DEFAULT '1',
  `HC5` tinyint(1) NOT NULL DEFAULT '1',
  `HC6` tinyint(1) NOT NULL DEFAULT '1',
  `HC7` tinyint(1) NOT NULL DEFAULT '1',
  `ready` tinyint(1) NOT NULL DEFAULT '0',
  `bid` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `house17`
--

INSERT INTO `house17` (`name`, `tokih`, `tokob`, `zamki`, `bochki`, `HC1`, `HC2`, `HC3`, `HC4`, `HC5`, `HC6`, `HC7`, `ready`, `bid`) VALUES
('Baratheon', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Greyjoy', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Lannister', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Martell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Stark', 5, 0, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Tyrell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `house18`
--

CREATE TABLE IF NOT EXISTS `house18` (
  `name` varchar(9) NOT NULL,
  `tokih` int(2) NOT NULL DEFAULT '5',
  `tokob` int(2) NOT NULL DEFAULT '0',
  `zamki` int(1) NOT NULL,
  `bochki` int(1) NOT NULL,
  `HC1` tinyint(1) NOT NULL DEFAULT '1',
  `HC2` tinyint(1) NOT NULL DEFAULT '1',
  `HC3` tinyint(1) NOT NULL DEFAULT '1',
  `HC4` tinyint(1) NOT NULL DEFAULT '1',
  `HC5` tinyint(1) NOT NULL DEFAULT '1',
  `HC6` tinyint(1) NOT NULL DEFAULT '1',
  `HC7` tinyint(1) NOT NULL DEFAULT '1',
  `ready` tinyint(1) NOT NULL DEFAULT '0',
  `bid` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `house18`
--

INSERT INTO `house18` (`name`, `tokih`, `tokob`, `zamki`, `bochki`, `HC1`, `HC2`, `HC3`, `HC4`, `HC5`, `HC6`, `HC7`, `ready`, `bid`) VALUES
('Baratheon', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Greyjoy', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Lannister', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Martell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Stark', 5, 0, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Tyrell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `house19`
--

CREATE TABLE IF NOT EXISTS `house19` (
  `name` varchar(9) NOT NULL,
  `tokih` int(2) NOT NULL DEFAULT '5',
  `tokob` int(2) NOT NULL DEFAULT '0',
  `zamki` int(1) NOT NULL,
  `bochki` int(1) NOT NULL,
  `HC1` tinyint(1) NOT NULL DEFAULT '1',
  `HC2` tinyint(1) NOT NULL DEFAULT '1',
  `HC3` tinyint(1) NOT NULL DEFAULT '1',
  `HC4` tinyint(1) NOT NULL DEFAULT '1',
  `HC5` tinyint(1) NOT NULL DEFAULT '1',
  `HC6` tinyint(1) NOT NULL DEFAULT '1',
  `HC7` tinyint(1) NOT NULL DEFAULT '1',
  `ready` tinyint(1) NOT NULL DEFAULT '0',
  `bid` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `house19`
--

INSERT INTO `house19` (`name`, `tokih`, `tokob`, `zamki`, `bochki`, `HC1`, `HC2`, `HC3`, `HC4`, `HC5`, `HC6`, `HC7`, `ready`, `bid`) VALUES
('Baratheon', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Greyjoy', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Lannister', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Martell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Stark', 5, 0, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Tyrell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `house20`
--

CREATE TABLE IF NOT EXISTS `house20` (
  `name` varchar(9) NOT NULL,
  `tokih` int(2) NOT NULL DEFAULT '5',
  `tokob` int(2) NOT NULL DEFAULT '0',
  `zamki` int(1) NOT NULL,
  `bochki` int(1) NOT NULL,
  `HC1` tinyint(1) NOT NULL DEFAULT '1',
  `HC2` tinyint(1) NOT NULL DEFAULT '1',
  `HC3` tinyint(1) NOT NULL DEFAULT '1',
  `HC4` tinyint(1) NOT NULL DEFAULT '1',
  `HC5` tinyint(1) NOT NULL DEFAULT '1',
  `HC6` tinyint(1) NOT NULL DEFAULT '1',
  `HC7` tinyint(1) NOT NULL DEFAULT '1',
  `ready` tinyint(1) NOT NULL DEFAULT '0',
  `bid` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `house20`
--

INSERT INTO `house20` (`name`, `tokih`, `tokob`, `zamki`, `bochki`, `HC1`, `HC2`, `HC3`, `HC4`, `HC5`, `HC6`, `HC7`, `ready`, `bid`) VALUES
('Baratheon', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Greyjoy', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Lannister', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Martell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Stark', 5, 0, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Tyrell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `karta`
--

CREATE TABLE IF NOT EXISTS `karta` (
  `id` varchar(16) NOT NULL,
  `CastleBlack` tinyint(1) NOT NULL DEFAULT '0',
  `Karhold` tinyint(1) NOT NULL DEFAULT '0',
  `Winterfell` tinyint(1) NOT NULL DEFAULT '0',
  `StonyShore` tinyint(1) NOT NULL DEFAULT '0',
  `WhiteHarbor` tinyint(1) NOT NULL DEFAULT '0',
  `WidowsWatch` tinyint(1) NOT NULL DEFAULT '0',
  `FuntsFinger` tinyint(1) NOT NULL DEFAULT '0',
  `GreywaterWatch` tinyint(1) NOT NULL DEFAULT '0',
  `MoatCailin` tinyint(1) NOT NULL DEFAULT '0',
  `Seagard` tinyint(1) NOT NULL DEFAULT '0',
  `Twins` tinyint(1) NOT NULL DEFAULT '0',
  `Fingers` tinyint(1) NOT NULL DEFAULT '0',
  `MountainsOfMoon` tinyint(1) NOT NULL DEFAULT '0',
  `Eyrie` tinyint(1) NOT NULL DEFAULT '0',
  `Pyke` tinyint(1) NOT NULL DEFAULT '0',
  `Riverrun` tinyint(1) NOT NULL DEFAULT '0',
  `Lannisport` tinyint(1) NOT NULL DEFAULT '0',
  `StoneySept` tinyint(1) NOT NULL DEFAULT '0',
  `Harrenhal` tinyint(1) NOT NULL DEFAULT '0',
  `CrackclawPoint` tinyint(1) NOT NULL DEFAULT '0',
  `Dragonstone` tinyint(1) NOT NULL DEFAULT '0',
  `SearoadMarches` tinyint(1) NOT NULL DEFAULT '0',
  `Blackwater` tinyint(1) NOT NULL DEFAULT '0',
  `KingsLanding` tinyint(1) NOT NULL DEFAULT '0',
  `Highgarden` tinyint(1) NOT NULL DEFAULT '0',
  `Reach` tinyint(1) NOT NULL DEFAULT '0',
  `Kingswood` tinyint(1) NOT NULL DEFAULT '0',
  `StormsEnd` tinyint(1) NOT NULL DEFAULT '0',
  `DornishMarches` tinyint(1) NOT NULL DEFAULT '0',
  `Boneway` tinyint(1) NOT NULL DEFAULT '0',
  `Oldtown` tinyint(1) NOT NULL DEFAULT '0',
  `ThreeTowers` tinyint(1) NOT NULL DEFAULT '0',
  `PrincesPass` tinyint(1) NOT NULL DEFAULT '0',
  `Yronwood` tinyint(1) NOT NULL DEFAULT '0',
  `Starfall` tinyint(1) NOT NULL DEFAULT '0',
  `Arbor` tinyint(1) NOT NULL DEFAULT '0',
  `Sunspear` tinyint(1) NOT NULL DEFAULT '0',
  `SaltShore` tinyint(1) NOT NULL DEFAULT '0',
  `BayofIce` tinyint(1) NOT NULL DEFAULT '0',
  `WinterfellPort` tinyint(1) NOT NULL DEFAULT '0',
  `SunsetSea` tinyint(1) NOT NULL DEFAULT '0',
  `IronmansBay` tinyint(1) NOT NULL DEFAULT '0',
  `PykePort` tinyint(1) NOT NULL DEFAULT '0',
  `GoldenSound` tinyint(1) NOT NULL DEFAULT '0',
  `LannisportPort` tinyint(1) NOT NULL DEFAULT '0',
  `WestSummerSea` tinyint(1) NOT NULL DEFAULT '0',
  `RedwyneStraghts` tinyint(1) NOT NULL DEFAULT '0',
  `OldtownPort` tinyint(1) NOT NULL DEFAULT '0',
  `ShiveringSea` tinyint(1) NOT NULL DEFAULT '0',
  `NarrowSea` tinyint(1) NOT NULL DEFAULT '0',
  `WhiteHarborPort` tinyint(1) NOT NULL DEFAULT '0',
  `ShipbreakerBay` tinyint(1) NOT NULL DEFAULT '0',
  `DragonstonePort` tinyint(1) NOT NULL DEFAULT '0',
  `BlackwaterBay` tinyint(1) NOT NULL DEFAULT '0',
  `StormsEndPort` tinyint(1) NOT NULL DEFAULT '0',
  `EastSummerSea` tinyint(1) NOT NULL DEFAULT '0',
  `SunspearPort` tinyint(1) NOT NULL DEFAULT '0',
  `SeaOfDorne` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `karta`
--

INSERT INTO `karta` (`id`, `CastleBlack`, `Karhold`, `Winterfell`, `StonyShore`, `WhiteHarbor`, `WidowsWatch`, `FuntsFinger`, `GreywaterWatch`, `MoatCailin`, `Seagard`, `Twins`, `Fingers`, `MountainsOfMoon`, `Eyrie`, `Pyke`, `Riverrun`, `Lannisport`, `StoneySept`, `Harrenhal`, `CrackclawPoint`, `Dragonstone`, `SearoadMarches`, `Blackwater`, `KingsLanding`, `Highgarden`, `Reach`, `Kingswood`, `StormsEnd`, `DornishMarches`, `Boneway`, `Oldtown`, `ThreeTowers`, `PrincesPass`, `Yronwood`, `Starfall`, `Arbor`, `Sunspear`, `SaltShore`, `BayofIce`, `WinterfellPort`, `SunsetSea`, `IronmansBay`, `PykePort`, `GoldenSound`, `LannisportPort`, `WestSummerSea`, `RedwyneStraghts`, `OldtownPort`, `ShiveringSea`, `NarrowSea`, `WhiteHarborPort`, `ShipbreakerBay`, `DragonstonePort`, `BlackwaterBay`, `StormsEndPort`, `EastSummerSea`, `SunspearPort`, `SeaOfDorne`) VALUES
('Arbor', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('BayofIce', 3, 0, 3, 3, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Blackwater', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('BlackwaterBay', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 3, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
('Boneway', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2),
('CastleBlack', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('CrackclawPoint', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 0, 2, 0, 0, 0, 0),
('DornishMarches', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Dragonstone', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0),
('DragonstonePort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
('EastSummerSea', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 3, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 5, 1),
('Eyrie', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('Fingers', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('FuntsFinger', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('GoldenSound', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('GreywaterWatch', 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Harrenhal', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Highgarden', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('IronmansBay', 0, 0, 0, 0, 0, 0, 3, 3, 0, 3, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Karhold', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('KingsLanding', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0),
('Kingswood', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 0, 0, 0, 0),
('Lannisport', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('LannisportPort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('MoatCailin', 0, 0, 1, 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('MountainsOfMoon', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('NarrowSea', 0, 0, 0, 0, 3, 3, 0, 0, 3, 0, 3, 3, 3, 3, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 5, 1, 0, 0, 0, 0, 0, 0),
('Oldtown', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('OldtownPort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('PrincesPass', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Pyke', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('PykePort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Reach', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('RedwyneStraghts', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Riverrun', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('SaltShore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0),
('Seagard', 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('SeaOfDorne', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 3, 0, 0, 0, 3, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
('SearoadMarches', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('ShipbreakerBay', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 5, 1, 5, 1, 0, 0),
('ShiveringSea', 3, 3, 3, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
('Starfall', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0),
('StoneySept', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('StonyShore', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('StormsEnd', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 3, 2, 0, 2),
('StormsEndPort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
('SunsetSea', 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Sunspear', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 2),
('SunspearPort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
('ThreeTowers', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Twins', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('WestSummerSea', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 3, 0, 0, 0, 0, 0, 0, 3, 0, 0, 3, 3, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
('WhiteHarbor', 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 3, 0, 0, 0, 0, 0, 0, 0),
('WhiteHarborPort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
('WidowsWatch', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('Winterfell', 1, 1, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('WinterfellPort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Yronwood', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `terr1`
--

CREATE TABLE IF NOT EXISTS `terr1` (
  `name` varchar(20) NOT NULL,
  `control` varchar(1) NOT NULL DEFAULT '0',
  `unit1` varchar(2) NOT NULL DEFAULT '0',
  `unit2` varchar(2) NOT NULL DEFAULT '0',
  `unit3` varchar(2) NOT NULL DEFAULT '0',
  `unit4` varchar(2) NOT NULL DEFAULT '0',
  `garrison` int(2) NOT NULL DEFAULT '0',
  `token` tinyint(1) NOT NULL DEFAULT '0',
  `prikaz` int(2) NOT NULL DEFAULT '0',
  `supply` int(1) NOT NULL DEFAULT '0',
  `power` int(1) NOT NULL DEFAULT '0',
  `castle` int(1) NOT NULL DEFAULT '0',
  `mustered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `terr1`
--

INSERT INTO `terr1` (`name`, `control`, `unit1`, `unit2`, `unit3`, `unit4`, `garrison`, `token`, `prikaz`, `supply`, `power`, `castle`, `mustered`) VALUES
('Arbor', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('BayofIce', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Blackwater', '0', '0', '0', '0', '0', 0, 0, 0, 2, 0, 0, 0),
('BlackwaterBay', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Boneway', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CastleBlack', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CrackclawPoint', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('DornishMarches', 'T', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('Dragonstone', 'B', 'F1', 'K1', '0', '0', 4, 0, 0, 1, 1, 2, 0),
('DragonstonePort', 'B', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('EastSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Eyrie', '1', '0', '0', '0', '0', 7, 0, 0, 1, 1, 1, 0),
('Fingers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('FlintsFinger', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('GoldenSound', 'L', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('GreywaterWatch', 'G', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Harrenhal', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 1, 0),
('Highgarden', 'T', 'F1', 'K1', '0', '0', 5, 0, 0, 2, 0, 2, 0),
('IronmansBay', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Karhold', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('KingsLanding', '1', '0', '0', '0', '0', 8, 0, 0, 0, 2, 2, 0),
('Kingswood', 'B', 'F1', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Lannisport', 'L', 'F1', 'K1', '0', '0', 3, 0, 0, 2, 0, 2, 0),
('LannisportPort', 'L', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('MoatCailin', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('MountainsOfMoon', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('NarrowSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Oldtown', '0', '0', '0', '0', '0', 0, 0, 0, 0, 2, 0, 0),
('OldtownPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('PrincesPass', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Pyke', 'G', 'F1', 'K1', '0', '0', 2, 0, 0, 1, 1, 2, 0),
('PykePort', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Reach', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('RedwyneStraghts', 'T', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Riverrun', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SaltShore', 'M', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Seagard', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SeaOfDorne', 'M', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SearoadMarches', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('ShipbreakerBay', 'B', 'S1', 'S1', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ShiveringSea', 'S', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Starfall', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 1, 0),
('StoneySept', 'L', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('StonyShore', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('StormsEnd', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('StormsEndPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SunsetSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Sunspear', 'M', 'F1', 'K1', '0', '0', 6, 0, 0, 1, 1, 2, 0),
('SunspearPort', 'M', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ThreeTowers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Twins', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('WestSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WhiteHarbor', 'S', 'F1', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('WhiteHarborPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WidowsWatch', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Winterfell', 'S', 'K1', 'F1', '0', '0', 1, 0, 0, 1, 1, 2, 0),
('WinterfellPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Yronwood', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `terr17`
--

CREATE TABLE IF NOT EXISTS `terr17` (
  `name` varchar(20) NOT NULL,
  `control` varchar(1) NOT NULL DEFAULT '0',
  `unit1` varchar(2) NOT NULL DEFAULT '0',
  `unit2` varchar(2) NOT NULL DEFAULT '0',
  `unit3` varchar(2) NOT NULL DEFAULT '0',
  `unit4` varchar(2) NOT NULL DEFAULT '0',
  `garrison` int(2) NOT NULL DEFAULT '0',
  `token` tinyint(1) NOT NULL DEFAULT '0',
  `prikaz` int(2) NOT NULL DEFAULT '0',
  `supply` int(1) NOT NULL DEFAULT '0',
  `power` int(1) NOT NULL DEFAULT '0',
  `castle` int(1) NOT NULL DEFAULT '0',
  `mustered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `terr17`
--

INSERT INTO `terr17` (`name`, `control`, `unit1`, `unit2`, `unit3`, `unit4`, `garrison`, `token`, `prikaz`, `supply`, `power`, `castle`, `mustered`) VALUES
('Arbor', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('BayofIce', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Blackwater', '0', '0', '0', '0', '0', 0, 0, 0, 2, 0, 0, 0),
('BlackwaterBay', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Boneway', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CastleBlack', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CrackclawPoint', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('DornishMarches', 'T', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('Dragonstone', 'B', 'F1', 'K1', '0', '0', 4, 0, 0, 1, 1, 2, 0),
('DragonstonePort', 'B', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('EastSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Eyrie', '1', '0', '0', '0', '0', 7, 0, 0, 1, 1, 1, 0),
('Fingers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('FlintsFinger', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('GoldenSound', 'L', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('GreywaterWatch', 'G', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Harrenhal', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 1, 0),
('Highgarden', 'T', 'F1', 'K1', '0', '0', 5, 0, 0, 2, 0, 2, 0),
('IronmansBay', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Karhold', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('KingsLanding', '1', '0', '0', '0', '0', 8, 0, 0, 0, 2, 2, 0),
('Kingswood', 'B', 'F1', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Lannisport', 'L', 'F1', 'K1', '0', '0', 3, 0, 0, 2, 0, 2, 0),
('LannisportPort', 'L', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('MoatCailin', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('MountainsOfMoon', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('NarrowSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Oldtown', '0', '0', '0', '0', '0', 0, 0, 0, 0, 2, 0, 0),
('OldtownPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('PrincesPass', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Pyke', 'G', 'F1', 'K1', '0', '0', 2, 0, 0, 1, 1, 2, 0),
('PykePort', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Reach', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('RedwyneStraghts', 'T', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Riverrun', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SaltShore', 'M', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Seagard', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SeaOfDorne', 'M', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SearoadMarches', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('ShipbreakerBay', 'B', 'S1', 'S1', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ShiveringSea', 'S', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Starfall', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 1, 0),
('StoneySept', 'L', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('StonyShore', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('StormsEnd', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('StormsEndPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SunsetSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Sunspear', 'M', 'F1', 'K1', '0', '0', 6, 0, 0, 1, 1, 2, 0),
('SunspearPort', 'M', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ThreeTowers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Twins', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('WestSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WhiteHarbor', 'S', 'F1', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('WhiteHarborPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WidowsWatch', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Winterfell', 'S', 'K1', 'F1', '0', '0', 1, 0, 0, 1, 1, 2, 0),
('WinterfellPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Yronwood', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `terr18`
--

CREATE TABLE IF NOT EXISTS `terr18` (
  `name` varchar(20) NOT NULL,
  `control` varchar(1) NOT NULL DEFAULT '0',
  `unit1` varchar(2) NOT NULL DEFAULT '0',
  `unit2` varchar(2) NOT NULL DEFAULT '0',
  `unit3` varchar(2) NOT NULL DEFAULT '0',
  `unit4` varchar(2) NOT NULL DEFAULT '0',
  `garrison` int(2) NOT NULL DEFAULT '0',
  `token` tinyint(1) NOT NULL DEFAULT '0',
  `prikaz` int(2) NOT NULL DEFAULT '0',
  `supply` int(1) NOT NULL DEFAULT '0',
  `power` int(1) NOT NULL DEFAULT '0',
  `castle` int(1) NOT NULL DEFAULT '0',
  `mustered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `terr18`
--

INSERT INTO `terr18` (`name`, `control`, `unit1`, `unit2`, `unit3`, `unit4`, `garrison`, `token`, `prikaz`, `supply`, `power`, `castle`, `mustered`) VALUES
('Arbor', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('BayofIce', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Blackwater', '0', '0', '0', '0', '0', 0, 0, 0, 2, 0, 0, 0),
('BlackwaterBay', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Boneway', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CastleBlack', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CrackclawPoint', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('DornishMarches', 'T', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('Dragonstone', 'B', 'F1', 'K1', '0', '0', 4, 0, 0, 1, 1, 2, 0),
('DragonstonePort', 'B', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('EastSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Eyrie', '1', '0', '0', '0', '0', 7, 0, 0, 1, 1, 1, 0),
('Fingers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('FlintsFinger', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('GoldenSound', 'L', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('GreywaterWatch', 'G', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Harrenhal', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 1, 0),
('Highgarden', 'T', 'F1', 'K1', '0', '0', 5, 0, 0, 2, 0, 2, 0),
('IronmansBay', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Karhold', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('KingsLanding', '1', '0', '0', '0', '0', 8, 0, 0, 0, 2, 2, 0),
('Kingswood', 'B', 'F1', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Lannisport', 'L', 'F1', 'K1', '0', '0', 3, 0, 0, 2, 0, 2, 0),
('LannisportPort', 'L', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('MoatCailin', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('MountainsOfMoon', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('NarrowSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Oldtown', '0', '0', '0', '0', '0', 0, 0, 0, 0, 2, 0, 0),
('OldtownPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('PrincesPass', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Pyke', 'G', 'F1', 'K1', '0', '0', 2, 0, 0, 1, 1, 2, 0),
('PykePort', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Reach', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('RedwyneStraghts', 'T', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Riverrun', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SaltShore', 'M', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Seagard', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SeaOfDorne', 'M', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SearoadMarches', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('ShipbreakerBay', 'B', 'S1', 'S1', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ShiveringSea', 'S', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Starfall', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 1, 0),
('StoneySept', 'L', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('StonyShore', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('StormsEnd', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('StormsEndPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SunsetSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Sunspear', 'M', 'F1', 'K1', '0', '0', 6, 0, 0, 1, 1, 2, 0),
('SunspearPort', 'M', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ThreeTowers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Twins', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('WestSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WhiteHarbor', 'S', 'F1', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('WhiteHarborPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WidowsWatch', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Winterfell', 'S', 'K1', 'F1', '0', '0', 1, 0, 0, 1, 1, 2, 0),
('WinterfellPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Yronwood', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `terr19`
--

CREATE TABLE IF NOT EXISTS `terr19` (
  `name` varchar(20) NOT NULL,
  `control` varchar(1) NOT NULL DEFAULT '0',
  `unit1` varchar(2) NOT NULL DEFAULT '0',
  `unit2` varchar(2) NOT NULL DEFAULT '0',
  `unit3` varchar(2) NOT NULL DEFAULT '0',
  `unit4` varchar(2) NOT NULL DEFAULT '0',
  `garrison` int(2) NOT NULL DEFAULT '0',
  `token` tinyint(1) NOT NULL DEFAULT '0',
  `prikaz` int(2) NOT NULL DEFAULT '0',
  `supply` int(1) NOT NULL DEFAULT '0',
  `power` int(1) NOT NULL DEFAULT '0',
  `castle` int(1) NOT NULL DEFAULT '0',
  `mustered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `terr19`
--

INSERT INTO `terr19` (`name`, `control`, `unit1`, `unit2`, `unit3`, `unit4`, `garrison`, `token`, `prikaz`, `supply`, `power`, `castle`, `mustered`) VALUES
('Arbor', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('BayofIce', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Blackwater', '0', '0', '0', '0', '0', 0, 0, 0, 2, 0, 0, 0),
('BlackwaterBay', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Boneway', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CastleBlack', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CrackclawPoint', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('DornishMarches', 'T', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('Dragonstone', 'B', 'F1', 'K1', '0', '0', 4, 0, 0, 1, 1, 2, 0),
('DragonstonePort', 'B', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('EastSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Eyrie', '1', '0', '0', '0', '0', 7, 0, 0, 1, 1, 1, 0),
('Fingers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('FlintsFinger', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('GoldenSound', 'L', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('GreywaterWatch', 'G', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Harrenhal', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 1, 0),
('Highgarden', 'T', 'F1', 'K1', '0', '0', 5, 0, 0, 2, 0, 2, 0),
('IronmansBay', 'G', 'S1', '0', '0', '0', 0, 0, 5, 0, 0, 0, 0),
('Karhold', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('KingsLanding', '1', '0', '0', '0', '0', 8, 0, 0, 0, 2, 2, 0),
('Kingswood', 'B', 'F1', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Lannisport', 'L', 'F1', 'K1', '0', '0', 3, 0, 0, 2, 0, 2, 0),
('LannisportPort', 'L', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('MoatCailin', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('MountainsOfMoon', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('NarrowSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Oldtown', '0', '0', '0', '0', '0', 0, 0, 0, 0, 2, 0, 0),
('OldtownPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('PrincesPass', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Pyke', 'G', 'F1', 'K1', '0', '0', 2, 0, 2, 1, 1, 2, 0),
('PykePort', 'G', 'S1', '0', '0', '0', 0, 0, 1, 0, 0, 0, 0),
('Reach', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('RedwyneStraghts', 'T', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Riverrun', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SaltShore', 'M', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Seagard', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SeaOfDorne', 'M', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SearoadMarches', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('ShipbreakerBay', 'B', 'S1', 'S1', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ShiveringSea', 'S', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Starfall', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 1, 0),
('StoneySept', 'L', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('StonyShore', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('StormsEnd', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('StormsEndPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SunsetSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Sunspear', 'M', 'F1', 'K1', '0', '0', 6, 0, 0, 1, 1, 2, 0),
('SunspearPort', 'M', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ThreeTowers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Twins', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('WestSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WhiteHarbor', 'S', 'F1', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('WhiteHarborPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WidowsWatch', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Winterfell', 'S', 'K1', 'F1', '0', '0', 1, 0, 0, 1, 1, 2, 0),
('WinterfellPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Yronwood', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `terr20`
--

CREATE TABLE IF NOT EXISTS `terr20` (
  `name` varchar(20) NOT NULL,
  `control` varchar(1) NOT NULL DEFAULT '0',
  `unit1` varchar(2) NOT NULL DEFAULT '0',
  `unit2` varchar(2) NOT NULL DEFAULT '0',
  `unit3` varchar(2) NOT NULL DEFAULT '0',
  `unit4` varchar(2) NOT NULL DEFAULT '0',
  `garrison` int(2) NOT NULL DEFAULT '0',
  `token` tinyint(1) NOT NULL DEFAULT '0',
  `prikaz` int(2) NOT NULL DEFAULT '0',
  `supply` int(1) NOT NULL DEFAULT '0',
  `power` int(1) NOT NULL DEFAULT '0',
  `castle` int(1) NOT NULL DEFAULT '0',
  `mustered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `terr20`
--

INSERT INTO `terr20` (`name`, `control`, `unit1`, `unit2`, `unit3`, `unit4`, `garrison`, `token`, `prikaz`, `supply`, `power`, `castle`, `mustered`) VALUES
('Arbor', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('BayofIce', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Blackwater', '0', '0', '0', '0', '0', 0, 0, 0, 2, 0, 0, 0),
('BlackwaterBay', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Boneway', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CastleBlack', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CrackclawPoint', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('DornishMarches', 'T', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('Dragonstone', 'B', 'F1', 'K1', '0', '0', 4, 0, 0, 1, 1, 2, 0),
('DragonstonePort', 'B', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('EastSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Eyrie', '1', '0', '0', '0', '0', 7, 0, 0, 1, 1, 1, 0),
('Fingers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('FlintsFinger', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('GoldenSound', 'L', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('GreywaterWatch', 'G', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Harrenhal', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 1, 0),
('Highgarden', 'T', 'F1', 'K1', '0', '0', 5, 0, 0, 2, 0, 2, 0),
('IronmansBay', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Karhold', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('KingsLanding', '1', '0', '0', '0', '0', 8, 0, 0, 0, 2, 2, 0),
('Kingswood', 'B', 'F1', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Lannisport', 'L', 'F1', 'K1', '0', '0', 3, 0, 0, 2, 0, 2, 0),
('LannisportPort', 'L', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('MoatCailin', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('MountainsOfMoon', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('NarrowSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Oldtown', '0', '0', '0', '0', '0', 0, 0, 0, 0, 2, 0, 0),
('OldtownPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('PrincesPass', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Pyke', 'G', 'F1', 'K1', '0', '0', 2, 0, 0, 1, 1, 2, 0),
('PykePort', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Reach', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('RedwyneStraghts', 'T', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Riverrun', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SaltShore', 'M', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Seagard', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SeaOfDorne', 'M', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SearoadMarches', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('ShipbreakerBay', 'B', 'S1', 'S1', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ShiveringSea', 'S', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Starfall', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 1, 0),
('StoneySept', 'L', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('StonyShore', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('StormsEnd', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('StormsEndPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SunsetSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Sunspear', 'M', 'F1', 'K1', '0', '0', 6, 0, 0, 1, 1, 2, 0),
('SunspearPort', 'M', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ThreeTowers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Twins', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('WestSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WhiteHarbor', 'S', 'F1', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('WhiteHarborPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WidowsWatch', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Winterfell', 'S', 'K1', 'F1', '0', '0', 1, 0, 0, 1, 1, 2, 0),
('WinterfellPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Yronwood', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL,
  `lastgame` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`, `lastgame`) VALUES
(2, 'root', '5ef112b93a6e23fc43d57e98d0e49b7f', '2e5915aa0f247c5ca7950037c5d50398', 0),
(30, 'test', 'fb469d7ef430b0baf0cab6c436e70375', 'c11b4e3996dd57ab9840d7c63ffca054', 19),
(32, 'qwe', '3675ac5c859c806b26e02e6f9fd62192', '2ff5e0879150777d3a5914f63346d120', 20),
(33, 'Helyck', '35f504164d5a963d6a820e71614a4009', 'd9db7b26571323cc874af6cb2a64eb53', 85),
(34, 'edda', '52700466eec6b1a093c37ec52fe90278', '31f79f93918509295ad694b7751538e1', 85),
(35, 'Avlek', '131ca722ce8f86d107d69ccc554f40aa', '982ffa00df462a26b0ebe7b84fa0946a', 87);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
