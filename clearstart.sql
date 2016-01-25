-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 07 2012 г., 04:27
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
-- Структура таблицы `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Stark` int(255) NOT NULL COMMENT 'player1',
  `Greyjoy` int(255) NOT NULL COMMENT 'player2',
  `Lannister` int(255) NOT NULL COMMENT 'player3',
  `Martell` int(255) NOT NULL COMMENT 'player4',
  `Tyrell` int(255) NOT NULL COMMENT 'player5',
  `Baratheon` int(255) NOT NULL COMMENT 'player6',
  `turn` tinyint(1) NOT NULL DEFAULT '0',
  `faza` int(1) NOT NULL DEFAULT '3',
  `terr` varchar(10) NOT NULL COMMENT 'imya tablici',
  `house` varchar(20) NOT NULL,
  `currentplayer` int(1) NOT NULL DEFAULT '0',
  `throne1` varchar(9) NOT NULL DEFAULT 'baratheon',
  `throne2` varchar(9) NOT NULL DEFAULT 'lannister',
  `throne3` varchar(9) NOT NULL DEFAULT 'stark',
  `throne4` varchar(9) NOT NULL DEFAULT 'martell',
  `throne5` varchar(9) NOT NULL DEFAULT 'greyjoy',
  `throne6` varchar(9) NOT NULL DEFAULT 'tyrell',
  `fiefdom1` varchar(9) NOT NULL DEFAULT 'greyjoy',
  `fiefdom2` varchar(9) NOT NULL DEFAULT 'tyrell',
  `fiefdom3` varchar(9) NOT NULL DEFAULT 'martell',
  `fiefdom4` varchar(9) NOT NULL DEFAULT 'stark',
  `fiefdom5` varchar(9) NOT NULL DEFAULT 'baratheon',
  `fiefdom6` varchar(9) NOT NULL DEFAULT 'lannister',
  `court1` varchar(9) NOT NULL DEFAULT 'lannister',
  `court2` varchar(9) NOT NULL DEFAULT 'stark',
  `court3` varchar(9) NOT NULL DEFAULT 'martell',
  `court4` varchar(9) NOT NULL DEFAULT 'baratheon',
  `court5` varchar(9) NOT NULL DEFAULT 'tyrell',
  `court6` varchar(9) NOT NULL DEFAULT 'greyjoy',
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `game`
--

INSERT INTO `game` (`id`, `Stark`, `Greyjoy`, `Lannister`, `Martell`, `Tyrell`, `Baratheon`, `turn`, `faza`, `terr`, `house`, `currentplayer`, `throne1`, `throne2`, `throne3`, `throne4`, `throne5`, `throne6`, `fiefdom1`, `fiefdom2`, `fiefdom3`, `fiefdom4`, `fiefdom5`, `fiefdom6`, `court1`, `court2`, `court3`, `court4`, `court5`, `court6`, `WC1_1`, `WC1_2`, `WC1_3`, `WC1_4`, `WC1_5`, `WC1_6`, `WC1_7`, `WC1_8`, `WC1_9`, `WC1_10`, `WC2_1`, `WC2_2`, `WC2_3`, `WC2_4`, `WC2_5`, `WC2_6`, `WC2_7`, `WC2_8`, `WC2_9`, `WC2_10`, `WC3_1`, `WC3_2`, `WC3_3`, `WC3_4`, `WC3_5`, `WC3_6`, `WC3_7`, `WC3_8`, `WC3_9`, `WC3_10`, `WildPower`, `WildCard1`, `WildCard2`, `WildCard3`, `WildCard4`, `WildCard5`, `WildCard6`, `WildCard7`, `WildCard8`, `WildCard9`, `win`) VALUES
(1, 1, 2, 3, 4, 5, 6, 0, 3, 'terr1', 'house1', 0, 'baratheon', 'lannister', 'stark', 'martell', 'greyjoy', 'tyrell', 'greyjoy', 'tyrell', 'martell', 'stark', 'baratheon', 'lannister', 'lannister', 'stark', 'martell', 'baratheon', 'tyrell', 'greyjoy', 0, 1, 2, 3, 4, 1, 2, 3, 1, 2, 0, 1, 2, 3, 4, 0, 1, 2, 0, 2, 0, 1, 2, 3, 4, 5, 6, 1, 6, 6, 1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `gamelist`
--

CREATE TABLE IF NOT EXISTS `gamelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` int(255) NOT NULL,
  `player1` int(255) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `KN` int(1) NOT NULL DEFAULT '1',
  `FT` int(1) NOT NULL DEFAULT '2',
  `Sh` int(1) NOT NULL,
  `En` int(1) NOT NULL DEFAULT '0',
  `HC1` tinyint(1) NOT NULL DEFAULT '1',
  `HC2` tinyint(1) NOT NULL DEFAULT '1',
  `HC3` tinyint(1) NOT NULL DEFAULT '1',
  `HC4` tinyint(1) NOT NULL DEFAULT '1',
  `HC5` tinyint(1) NOT NULL DEFAULT '1',
  `HC6` tinyint(1) NOT NULL DEFAULT '1',
  `HC7` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `house1`
--

INSERT INTO `house1` (`name`, `tokih`, `tokob`, `zamki`, `bochki`, `KN`, `FT`, `Sh`, `En`, `HC1`, `HC2`, `HC3`, `HC4`, `HC5`, `HC6`, `HC7`) VALUES
('Baratheon', 5, 0, 1, 2, 1, 2, 2, 0, 1, 1, 1, 1, 1, 1, 1),
('Greyjoy', 5, 0, 1, 2, 1, 2, 2, 0, 1, 1, 1, 1, 1, 1, 1),
('Lannister', 5, 0, 1, 2, 1, 2, 1, 0, 1, 1, 1, 1, 1, 1, 1),
('Martell', 5, 0, 1, 2, 1, 2, 1, 0, 1, 1, 1, 1, 1, 1, 1),
('Stark', 5, 0, 2, 1, 1, 2, 1, 0, 1, 1, 1, 1, 1, 1, 1),
('Tyrell', 5, 0, 1, 2, 1, 2, 1, 0, 1, 1, 1, 1, 1, 1, 1);

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
('BayofIce', 3, 0, 3, 3, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Blackwater', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('BlackwaterBay', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 3, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
('Boneway', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2),
('CastleBlack', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('CrackclawPoint', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 0, 2, 0, 0, 0, 0),
('DornishMarches', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Dragonstone', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0),
('DragonstonePort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
('EastSummerSea', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 3, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 2, 1),
('Eyrie', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('Fingers', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('FuntsFinger', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('GoldenSound', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('GreywaterWatch', 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Harrenhal', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Highgarden', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('IronmansBay', 0, 0, 0, 0, 0, 0, 3, 3, 0, 3, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Karhold', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('KingsLanding', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0),
('Kingswood', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 0, 0, 0, 0),
('Lannisport', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('LannisportPort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('MoatCailin', 0, 0, 1, 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('MountainsOfMoon', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('NarrowSea', 0, 0, 0, 0, 3, 3, 0, 0, 3, 0, 3, 3, 3, 3, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 2, 1, 0, 0, 0, 0, 0, 0),
('Oldtown', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('OldtownPort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('PrincesPass', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Pyke', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('PykePort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Reach', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('RedwyneStraghts', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Riverrun', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('SaltShore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0),
('Seagard', 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('SeaOfDorne', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 3, 0, 0, 0, 3, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
('SearoadMarches', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('ShipbreakerBay', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 2, 1, 2, 1, 0, 0),
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
('Eyrie', '0', '0', '0', '0', '0', 7, 0, 0, 1, 1, 1, 0),
('Fingers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('FuntsFinger', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('GoldenSound', 'L', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('GreywaterWatch', 'G', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Harrenhal', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 1, 0),
('Highgarden', 'T', 'F1', 'K1', '0', '0', 5, 0, 0, 2, 0, 2, 0),
('IronmansBay', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Karhold', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('KingsLanding', '0', '0', '0', '0', '0', 8, 0, 0, 0, 2, 2, 0),
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
('Winterfell', 'S', 'F1', 'K1', '0', '0', 1, 0, 1, 1, 1, 2, 0),
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
  `lastgame` int(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`, `lastgame`) VALUES
(2, 'root', '5ef112b93a6e23fc43d57e98d0e49b7f', '2e5915aa0f247c5ca7950037c5d50398', 0),
(30, 'test', 'fb469d7ef430b0baf0cab6c436e70375', '2618df1487a98dfd84bfdaf719ac2640', 91),
(32, 'qwe', '3675ac5c859c806b26e02e6f9fd62192', '91c3f726351410b090e6deb47031a3c2', 92),
(33, 'Helyck', '35f504164d5a963d6a820e71614a4009', 'd9db7b26571323cc874af6cb2a64eb53', 85),
(34, 'edda', '52700466eec6b1a093c37ec52fe90278', '31f79f93918509295ad694b7751538e1', 85),
(35, 'Avlek', '131ca722ce8f86d107d69ccc554f40aa', '3fc73c386669d1d0bc9cf974e0125f9a', 87);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
