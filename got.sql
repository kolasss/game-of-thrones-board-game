-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 21 2012 г., 11:07
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

UPDATE `battle` SET `id` = 1,`starting` = '0',`target` = '0',`attacker` = '0',`defender` = '0',`aorder` = 0,`dorder` = 0,`aunit1` = '0',`aunit2` = '0',`aunit3` = '0',`aunit4` = '0',`dunit1` = '0',`dunit2` = '0',`dunit3` = '0',`dunit4` = '0',`asup1` = '0',`asup2` = '0',`asup3` = '0',`asup4` = '0',`asup5` = '0',`asup6` = '0',`asup7` = '0',`dsup1` = '0',`dsup2` = '0',`dsup3` = '0',`dsup4` = '0',`dsup5` = '0',`dsup6` = '0',`dsup7` = '0',`garrison` = 0,`castle` = 0,`aCS` = 0,`dCS` = 0,`acard` = '0',`dcard` = '0',`currentplayer` = '0',`1ready` = 0,`winner` = '0' WHERE `battle`.`id` = 1;
UPDATE `battle` SET `id` = 17,`starting` = '0',`target` = '0',`attacker` = '0',`defender` = '0',`aorder` = 0,`dorder` = 0,`aunit1` = '0',`aunit2` = '0',`aunit3` = '0',`aunit4` = '0',`dunit1` = '0',`dunit2` = '0',`dunit3` = '0',`dunit4` = '0',`asup1` = '0',`asup2` = '0',`asup3` = '0',`asup4` = '0',`asup5` = '0',`asup6` = '0',`asup7` = '0',`dsup1` = '0',`dsup2` = '0',`dsup3` = '0',`dsup4` = '0',`dsup5` = '0',`dsup6` = '0',`dsup7` = '0',`garrison` = 0,`castle` = 0,`aCS` = 0,`dCS` = 0,`acard` = '0',`dcard` = '0',`currentplayer` = '0',`1ready` = 0,`winner` = '0' WHERE `battle`.`id` = 17;
UPDATE `battle` SET `id` = 18,`starting` = '0',`target` = '0',`attacker` = '0',`defender` = '0',`aorder` = 0,`dorder` = 0,`aunit1` = '0',`aunit2` = '0',`aunit3` = '0',`aunit4` = '0',`dunit1` = '0',`dunit2` = '0',`dunit3` = '0',`dunit4` = '0',`asup1` = '0',`asup2` = '0',`asup3` = '0',`asup4` = '0',`asup5` = '0',`asup6` = '0',`asup7` = '0',`dsup1` = '0',`dsup2` = '0',`dsup3` = '0',`dsup4` = '0',`dsup5` = '0',`dsup6` = '0',`dsup7` = '0',`garrison` = 0,`castle` = 0,`aCS` = 0,`dCS` = 0,`acard` = '0',`dcard` = '0',`currentplayer` = '0',`1ready` = 0,`winner` = '0' WHERE `battle`.`id` = 18;
UPDATE `battle` SET `id` = 19,`starting` = '0',`target` = '0',`attacker` = '0',`defender` = '0',`aorder` = 0,`dorder` = 0,`aunit1` = '0',`aunit2` = '0',`aunit3` = '0',`aunit4` = '0',`dunit1` = '0',`dunit2` = '0',`dunit3` = '0',`dunit4` = '0',`asup1` = '0',`asup2` = '0',`asup3` = '0',`asup4` = '0',`asup5` = '0',`asup6` = '0',`asup7` = '0',`dsup1` = '0',`dsup2` = '0',`dsup3` = '0',`dsup4` = '0',`dsup5` = '0',`dsup6` = '0',`dsup7` = '0',`garrison` = 0,`castle` = 0,`aCS` = 0,`dCS` = 0,`acard` = '0',`dcard` = '0',`currentplayer` = '0',`1ready` = 0,`winner` = '0' WHERE `battle`.`id` = 19;
UPDATE `battle` SET `id` = 20,`starting` = '0',`target` = '0',`attacker` = '0',`defender` = '0',`aorder` = 0,`dorder` = 0,`aunit1` = '0',`aunit2` = '0',`aunit3` = '0',`aunit4` = '0',`dunit1` = '0',`dunit2` = '0',`dunit3` = '0',`dunit4` = '0',`asup1` = '0',`asup2` = '0',`asup3` = '0',`asup4` = '0',`asup5` = '0',`asup6` = '0',`asup7` = '0',`dsup1` = '0',`dsup2` = '0',`dsup3` = '0',`dsup4` = '0',`dsup5` = '0',`dsup6` = '0',`dsup7` = '0',`garrison` = 0,`castle` = 0,`aCS` = 0,`dCS` = 0,`acard` = '0',`dcard` = '0',`currentplayer` = '0',`1ready` = 0,`winner` = '0' WHERE `battle`.`id` = 20;

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

UPDATE `game` SET `id` = 1,`Stark` = 30,`Greyjoy` = 0,`Lannister` = 32,`Martell` = 0,`Tyrell` = 0,`Baratheon` = 0,`turn` = 0,`faza` = 3,`terr` = 'terr1',`house` = 'house1',`currentplayer` = 0,`throne1` = 'Baratheon',`throne2` = 'Lannister',`throne3` = 'Stark',`throne4` = 'Martell',`throne5` = 'Greyjoy',`throne6` = 'Tyrell',`fiefdom1` = 'Greyjoy',`fiefdom2` = 'Tyrell',`fiefdom3` = 'Martell',`fiefdom4` = 'Stark',`fiefdom5` = 'Baratheon',`fiefdom6` = 'Lannister',`court1` = 'Lannister',`court2` = 'Stark',`court3` = 'Martell',`court4` = 'Baratheon',`court5` = 'Tyrell',`court6` = 'Greyjoy',`WC1_1` = 2,`WC1_2` = 1,`WC1_3` = 2,`WC1_4` = 4,`WC1_5` = 3,`WC1_6` = 0,`WC1_7` = 1,`WC1_8` = 2,`WC1_9` = 1,`WC1_10` = 3,`WC2_1` = 0,`WC2_2` = 2,`WC2_3` = 3,`WC2_4` = 2,`WC2_5` = 2,`WC2_6` = 4,`WC2_7` = 0,`WC2_8` = 0,`WC2_9` = 1,`WC2_10` = 1,`WC3_1` = 0,`WC3_2` = 1,`WC3_3` = 2,`WC3_4` = 3,`WC3_5` = 4,`WC3_6` = 5,`WC3_7` = 6,`WC3_8` = 1,`WC3_9` = 6,`WC3_10` = 6,`WildPower` = 1,`WildCard1` = 0,`WildCard2` = 3,`WildCard3` = 2,`WildCard4` = 5,`WildCard5` = 8,`WildCard6` = 7,`WildCard7` = 4,`WildCard8` = 4,`WildCard9` = 4,`win` = 0,`Blade` = 0 WHERE `game`.`id` = 1;
UPDATE `game` SET `id` = 17,`Stark` = 0,`Greyjoy` = 0,`Lannister` = 0,`Martell` = 0,`Tyrell` = 0,`Baratheon` = 0,`turn` = 0,`faza` = 3,`terr` = 'terr17',`house` = 'house17',`currentplayer` = 0,`throne1` = 'Baratheon',`throne2` = 'Lannister',`throne3` = 'Stark',`throne4` = 'Martell',`throne5` = 'Greyjoy',`throne6` = 'Tyrell',`fiefdom1` = 'Greyjoy',`fiefdom2` = 'Tyrell',`fiefdom3` = 'Martell',`fiefdom4` = 'Stark',`fiefdom5` = 'Baratheon',`fiefdom6` = 'Lannister',`court1` = 'Lannister',`court2` = 'Stark',`court3` = 'Martell',`court4` = 'Baratheon',`court5` = 'Tyrell',`court6` = 'Greyjoy',`WC1_1` = 1,`WC1_2` = 2,`WC1_3` = 1,`WC1_4` = 4,`WC1_5` = 3,`WC1_6` = 0,`WC1_7` = 1,`WC1_8` = 3,`WC1_9` = 2,`WC1_10` = 2,`WC2_1` = 0,`WC2_2` = 2,`WC2_3` = 3,`WC2_4` = 1,`WC2_5` = 2,`WC2_6` = 2,`WC2_7` = 1,`WC2_8` = 4,`WC2_9` = 0,`WC2_10` = 0,`WC3_1` = 3,`WC3_2` = 6,`WC3_3` = 4,`WC3_4` = 6,`WC3_5` = 0,`WC3_6` = 6,`WC3_7` = 1,`WC3_8` = 5,`WC3_9` = 2,`WC3_10` = 1,`WildPower` = 1,`WildCard1` = 5,`WildCard2` = 6,`WildCard3` = 7,`WildCard4` = 3,`WildCard5` = 0,`WildCard6` = 2,`WildCard7` = 8,`WildCard8` = 1,`WildCard9` = 4,`win` = 0,`Blade` = 0 WHERE `game`.`id` = 17;
UPDATE `game` SET `id` = 18,`Stark` = 0,`Greyjoy` = 0,`Lannister` = 0,`Martell` = 0,`Tyrell` = 0,`Baratheon` = 0,`turn` = 0,`faza` = 3,`terr` = 'terr18',`house` = 'house18',`currentplayer` = 0,`throne1` = 'Baratheon',`throne2` = 'Lannister',`throne3` = 'Stark',`throne4` = 'Martell',`throne5` = 'Greyjoy',`throne6` = 'Tyrell',`fiefdom1` = 'Greyjoy',`fiefdom2` = 'Tyrell',`fiefdom3` = 'Martell',`fiefdom4` = 'Stark',`fiefdom5` = 'Baratheon',`fiefdom6` = 'Lannister',`court1` = 'Lannister',`court2` = 'Stark',`court3` = 'Martell',`court4` = 'Baratheon',`court5` = 'Tyrell',`court6` = 'Greyjoy',`WC1_1` = 2,`WC1_2` = 1,`WC1_3` = 2,`WC1_4` = 3,`WC1_5` = 1,`WC1_6` = 0,`WC1_7` = 1,`WC1_8` = 3,`WC1_9` = 2,`WC1_10` = 4,`WC2_1` = 2,`WC2_2` = 0,`WC2_3` = 0,`WC2_4` = 0,`WC2_5` = 3,`WC2_6` = 4,`WC2_7` = 1,`WC2_8` = 2,`WC2_9` = 2,`WC2_10` = 1,`WC3_1` = 6,`WC3_2` = 4,`WC3_3` = 3,`WC3_4` = 2,`WC3_5` = 5,`WC3_6` = 0,`WC3_7` = 1,`WC3_8` = 6,`WC3_9` = 6,`WC3_10` = 1,`WildPower` = 1,`WildCard1` = 1,`WildCard2` = 6,`WildCard3` = 5,`WildCard4` = 2,`WildCard5` = 7,`WildCard6` = 8,`WildCard7` = 3,`WildCard8` = 4,`WildCard9` = 0,`win` = 0,`Blade` = 0 WHERE `game`.`id` = 18;
UPDATE `game` SET `id` = 19,`Stark` = 0,`Greyjoy` = 30,`Lannister` = 0,`Martell` = 0,`Tyrell` = 0,`Baratheon` = 0,`turn` = 1,`faza` = 2,`terr` = 'terr19',`house` = 'house19',`currentplayer` = 5,`throne1` = 'Greyjoy',`throne2` = 'Lannister',`throne3` = 'Stark',`throne4` = 'Martell',`throne5` = 'Baratheon',`throne6` = 'Tyrell',`fiefdom1` = 'Greyjoy',`fiefdom2` = 'Tyrell',`fiefdom3` = 'Martell',`fiefdom4` = 'Stark',`fiefdom5` = 'Baratheon',`fiefdom6` = 'Lannister',`court1` = 'Lannister',`court2` = 'Stark',`court3` = 'Martell',`court4` = 'Baratheon',`court5` = 'Tyrell',`court6` = 'Greyjoy',`WC1_1` = 3,`WC1_2` = 0,`WC1_3` = 2,`WC1_4` = 1,`WC1_5` = 1,`WC1_6` = 1,`WC1_7` = 2,`WC1_8` = 3,`WC1_9` = 2,`WC1_10` = 4,`WC2_1` = 0,`WC2_2` = 1,`WC2_3` = 2,`WC2_4` = 1,`WC2_5` = 2,`WC2_6` = 2,`WC2_7` = 0,`WC2_8` = 3,`WC2_9` = 4,`WC2_10` = 0,`WC3_1` = 6,`WC3_2` = 4,`WC3_3` = 0,`WC3_4` = 6,`WC3_5` = 5,`WC3_6` = 1,`WC3_7` = 6,`WC3_8` = 2,`WC3_9` = 1,`WC3_10` = 3,`WildPower` = 6,`WildCard1` = 6,`WildCard2` = 2,`WildCard3` = 3,`WildCard4` = 1,`WildCard5` = 8,`WildCard6` = 5,`WildCard7` = 4,`WildCard8` = 0,`WildCard9` = 6,`win` = 0,`Blade` = 0 WHERE `game`.`id` = 19;
UPDATE `game` SET `id` = 20,`Stark` = 0,`Greyjoy` = 0,`Lannister` = 0,`Martell` = 32,`Tyrell` = 0,`Baratheon` = 0,`turn` = 0,`faza` = 3,`terr` = 'terr20',`house` = 'house20',`currentplayer` = 0,`throne1` = 'Baratheon',`throne2` = 'Lannister',`throne3` = 'Stark',`throne4` = 'Martell',`throne5` = 'Greyjoy',`throne6` = 'Tyrell',`fiefdom1` = 'Greyjoy',`fiefdom2` = 'Tyrell',`fiefdom3` = 'Martell',`fiefdom4` = 'Stark',`fiefdom5` = 'Baratheon',`fiefdom6` = 'Lannister',`court1` = 'Lannister',`court2` = 'Stark',`court3` = 'Martell',`court4` = 'Baratheon',`court5` = 'Tyrell',`court6` = 'Greyjoy',`WC1_1` = 2,`WC1_2` = 0,`WC1_3` = 3,`WC1_4` = 1,`WC1_5` = 1,`WC1_6` = 2,`WC1_7` = 4,`WC1_8` = 2,`WC1_9` = 3,`WC1_10` = 1,`WC2_1` = 2,`WC2_2` = 1,`WC2_3` = 0,`WC2_4` = 0,`WC2_5` = 3,`WC2_6` = 1,`WC2_7` = 2,`WC2_8` = 0,`WC2_9` = 2,`WC2_10` = 4,`WC3_1` = 1,`WC3_2` = 5,`WC3_3` = 6,`WC3_4` = 6,`WC3_5` = 2,`WC3_6` = 0,`WC3_7` = 4,`WC3_8` = 3,`WC3_9` = 6,`WC3_10` = 1,`WildPower` = 1,`WildCard1` = 3,`WildCard2` = 7,`WildCard3` = 8,`WildCard4` = 2,`WildCard5` = 0,`WildCard6` = 6,`WildCard7` = 4,`WildCard8` = 1,`WildCard9` = 5,`win` = 0,`Blade` = 0 WHERE `game`.`id` = 20;

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

UPDATE `house1` SET `name` = 'Baratheon',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house1`.`name` = 'Baratheon';
UPDATE `house1` SET `name` = 'Greyjoy',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house1`.`name` = 'Greyjoy';
UPDATE `house1` SET `name` = 'Lannister',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house1`.`name` = 'Lannister';
UPDATE `house1` SET `name` = 'Martell',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house1`.`name` = 'Martell';
UPDATE `house1` SET `name` = 'Stark',`tokih` = 5,`tokob` = 0,`zamki` = 2,`bochki` = 1,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house1`.`name` = 'Stark';
UPDATE `house1` SET `name` = 'Tyrell',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house1`.`name` = 'Tyrell';

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

UPDATE `house17` SET `name` = 'Baratheon',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house17`.`name` = 'Baratheon';
UPDATE `house17` SET `name` = 'Greyjoy',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house17`.`name` = 'Greyjoy';
UPDATE `house17` SET `name` = 'Lannister',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house17`.`name` = 'Lannister';
UPDATE `house17` SET `name` = 'Martell',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house17`.`name` = 'Martell';
UPDATE `house17` SET `name` = 'Stark',`tokih` = 5,`tokob` = 0,`zamki` = 2,`bochki` = 1,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house17`.`name` = 'Stark';
UPDATE `house17` SET `name` = 'Tyrell',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house17`.`name` = 'Tyrell';

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

UPDATE `house18` SET `name` = 'Baratheon',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house18`.`name` = 'Baratheon';
UPDATE `house18` SET `name` = 'Greyjoy',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house18`.`name` = 'Greyjoy';
UPDATE `house18` SET `name` = 'Lannister',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house18`.`name` = 'Lannister';
UPDATE `house18` SET `name` = 'Martell',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house18`.`name` = 'Martell';
UPDATE `house18` SET `name` = 'Stark',`tokih` = 5,`tokob` = 0,`zamki` = 2,`bochki` = 1,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house18`.`name` = 'Stark';
UPDATE `house18` SET `name` = 'Tyrell',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house18`.`name` = 'Tyrell';

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

UPDATE `house19` SET `name` = 'Baratheon',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 1,`bid` = 1 WHERE `house19`.`name` = 'Baratheon';
UPDATE `house19` SET `name` = 'Greyjoy',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house19`.`name` = 'Greyjoy';
UPDATE `house19` SET `name` = 'Lannister',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 1,`bid` = 1 WHERE `house19`.`name` = 'Lannister';
UPDATE `house19` SET `name` = 'Martell',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 1,`bid` = 2 WHERE `house19`.`name` = 'Martell';
UPDATE `house19` SET `name` = 'Stark',`tokih` = 5,`tokob` = 0,`zamki` = 2,`bochki` = 1,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 1,`bid` = 2 WHERE `house19`.`name` = 'Stark';
UPDATE `house19` SET `name` = 'Tyrell',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 1,`bid` = 1 WHERE `house19`.`name` = 'Tyrell';

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

UPDATE `house20` SET `name` = 'Baratheon',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house20`.`name` = 'Baratheon';
UPDATE `house20` SET `name` = 'Greyjoy',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house20`.`name` = 'Greyjoy';
UPDATE `house20` SET `name` = 'Lannister',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house20`.`name` = 'Lannister';
UPDATE `house20` SET `name` = 'Martell',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house20`.`name` = 'Martell';
UPDATE `house20` SET `name` = 'Stark',`tokih` = 5,`tokob` = 0,`zamki` = 2,`bochki` = 1,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house20`.`name` = 'Stark';
UPDATE `house20` SET `name` = 'Tyrell',`tokih` = 5,`tokob` = 0,`zamki` = 1,`bochki` = 2,`HC1` = 1,`HC2` = 1,`HC3` = 1,`HC4` = 1,`HC5` = 1,`HC6` = 1,`HC7` = 1,`ready` = 0,`bid` = 0 WHERE `house20`.`name` = 'Tyrell';

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

UPDATE `karta` SET `id` = 'Arbor',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 2,`RedwyneStraghts` = 2,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Arbor';
UPDATE `karta` SET `id` = 'BayofIce',`CastleBlack` = 3,`Karhold` = 0,`Winterfell` = 3,`StonyShore` = 3,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 3,`GreywaterWatch` = 3,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 5,`SunsetSea` = 1,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'BayofIce';
UPDATE `karta` SET `id` = 'Blackwater',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 1,`Harrenhal` = 1,`CrackclawPoint` = 1,`Dragonstone` = 0,`SearoadMarches` = 1,`Blackwater` = 0,`KingsLanding` = 1,`Highgarden` = 0,`Reach` = 1,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Blackwater';
UPDATE `karta` SET `id` = 'BlackwaterBay',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 3,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 3,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 3,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 1,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'BlackwaterBay';
UPDATE `karta` SET `id` = 'Boneway',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 1,`Kingswood` = 1,`StormsEnd` = 1,`DornishMarches` = 1,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 1,`Yronwood` = 1,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 2 WHERE `karta`.`id` = 'Boneway';
UPDATE `karta` SET `id` = 'CastleBlack',`CastleBlack` = 0,`Karhold` = 1,`Winterfell` = 1,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 2,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 2,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'CastleBlack';
UPDATE `karta` SET `id` = 'CrackclawPoint',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 1,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 1,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 1,`KingsLanding` = 1,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 2,`WhiteHarborPort` = 0,`ShipbreakerBay` = 2,`DragonstonePort` = 0,`BlackwaterBay` = 2,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'CrackclawPoint';
UPDATE `karta` SET `id` = 'DornishMarches',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 1,`Reach` = 1,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 1,`Oldtown` = 1,`ThreeTowers` = 1,`PrincesPass` = 1,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'DornishMarches';
UPDATE `karta` SET `id` = 'Dragonstone',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 2,`DragonstonePort` = 3,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Dragonstone';
UPDATE `karta` SET `id` = 'DragonstonePort',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 1,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'DragonstonePort';
UPDATE `karta` SET `id` = 'EastSummerSea',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 3,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 3,`Arbor` = 0,`Sunspear` = 3,`SaltShore` = 3,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 1,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 1,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 5,`SeaOfDorne` = 1 WHERE `karta`.`id` = 'EastSummerSea';
UPDATE `karta` SET `id` = 'Eyrie',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 1,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 2,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Eyrie';
UPDATE `karta` SET `id` = 'Fingers',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 1,`Fingers` = 0,`MountainsOfMoon` = 1,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 2,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Fingers';
UPDATE `karta` SET `id` = 'FuntsFinger',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 1,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 2,`WinterfellPort` = 0,`SunsetSea` = 2,`IronmansBay` = 2,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'FuntsFinger';
UPDATE `karta` SET `id` = 'GoldenSound',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 3,`Lannisport` = 3,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 3,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 1,`IronmansBay` = 1,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 5,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'GoldenSound';
UPDATE `karta` SET `id` = 'GreywaterWatch',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 1,`GreywaterWatch` = 0,`MoatCailin` = 1,`Seagard` = 1,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 2,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 2,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'GreywaterWatch';
UPDATE `karta` SET `id` = 'Harrenhal',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 1,`Lannisport` = 0,`StoneySept` = 1,`Harrenhal` = 0,`CrackclawPoint` = 1,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 1,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Harrenhal';
UPDATE `karta` SET `id` = 'Highgarden',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 1,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 1,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 1,`Boneway` = 0,`Oldtown` = 1,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 2,`RedwyneStraghts` = 2,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Highgarden';
UPDATE `karta` SET `id` = 'IronmansBay',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 3,`GreywaterWatch` = 3,`MoatCailin` = 0,`Seagard` = 3,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 3,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 1,`IronmansBay` = 0,`PykePort` = 5,`GoldenSound` = 1,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'IronmansBay';
UPDATE `karta` SET `id` = 'Karhold',`CastleBlack` = 1,`Karhold` = 0,`Winterfell` = 1,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 2,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Karhold';
UPDATE `karta` SET `id` = 'KingsLanding',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 1,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 1,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 1,`Kingswood` = 1,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 2,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'KingsLanding';
UPDATE `karta` SET `id` = 'Kingswood',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 1,`Highgarden` = 0,`Reach` = 1,`Kingswood` = 0,`StormsEnd` = 1,`DornishMarches` = 0,`Boneway` = 1,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 2,`DragonstonePort` = 0,`BlackwaterBay` = 2,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Kingswood';
UPDATE `karta` SET `id` = 'Lannisport',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 1,`Lannisport` = 0,`StoneySept` = 1,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 1,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 2,`LannisportPort` = 3,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Lannisport';
UPDATE `karta` SET `id` = 'LannisportPort',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 1,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'LannisportPort';
UPDATE `karta` SET `id` = 'MoatCailin',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 1,`StonyShore` = 0,`WhiteHarbor` = 1,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 1,`MoatCailin` = 0,`Seagard` = 1,`Twins` = 1,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 2,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'MoatCailin';
UPDATE `karta` SET `id` = 'MountainsOfMoon',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 1,`Fingers` = 1,`MountainsOfMoon` = 0,`Eyrie` = 1,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 1,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 2,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'MountainsOfMoon';
UPDATE `karta` SET `id` = 'NarrowSea',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 3,`WidowsWatch` = 3,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 3,`Seagard` = 0,`Twins` = 3,`Fingers` = 3,`MountainsOfMoon` = 3,`Eyrie` = 3,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 3,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 1,`NarrowSea` = 0,`WhiteHarborPort` = 5,`ShipbreakerBay` = 1,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'NarrowSea';
UPDATE `karta` SET `id` = 'Oldtown',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 1,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 1,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 1,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 2,`OldtownPort` = 3,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Oldtown';
UPDATE `karta` SET `id` = 'OldtownPort',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 1,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'OldtownPort';
UPDATE `karta` SET `id` = 'PrincesPass',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 1,`Boneway` = 1,`Oldtown` = 0,`ThreeTowers` = 1,`PrincesPass` = 0,`Yronwood` = 1,`Starfall` = 1,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'PrincesPass';
UPDATE `karta` SET `id` = 'Pyke',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 2,`PykePort` = 3,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Pyke';
UPDATE `karta` SET `id` = 'PykePort',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 1,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'PykePort';
UPDATE `karta` SET `id` = 'Reach',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 1,`Blackwater` = 1,`KingsLanding` = 1,`Highgarden` = 1,`Reach` = 0,`Kingswood` = 1,`StormsEnd` = 0,`DornishMarches` = 1,`Boneway` = 1,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Reach';
UPDATE `karta` SET `id` = 'RedwyneStraghts',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 3,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 3,`ThreeTowers` = 3,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 3,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 1,`RedwyneStraghts` = 0,`OldtownPort` = 5,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'RedwyneStraghts';
UPDATE `karta` SET `id` = 'Riverrun',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 1,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 1,`StoneySept` = 1,`Harrenhal` = 1,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 2,`PykePort` = 0,`GoldenSound` = 2,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Riverrun';
UPDATE `karta` SET `id` = 'SaltShore',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 1,`Starfall` = 1,`Arbor` = 0,`Sunspear` = 1,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 2,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'SaltShore';
UPDATE `karta` SET `id` = 'Seagard',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 1,`MoatCailin` = 1,`Seagard` = 0,`Twins` = 1,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 1,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 2,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Seagard';
UPDATE `karta` SET `id` = 'SeaOfDorne',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 3,`DornishMarches` = 0,`Boneway` = 3,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 3,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 3,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 1,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'SeaOfDorne';
UPDATE `karta` SET `id` = 'SearoadMarches',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 1,`StoneySept` = 1,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 1,`KingsLanding` = 0,`Highgarden` = 1,`Reach` = 1,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 2,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 2,`LannisportPort` = 0,`WestSummerSea` = 2,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'SearoadMarches';
UPDATE `karta` SET `id` = 'ShipbreakerBay',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 3,`Dragonstone` = 3,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 3,`StormsEnd` = 3,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 1,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 5,`BlackwaterBay` = 1,`StormsEndPort` = 5,`EastSummerSea` = 1,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'ShipbreakerBay';
UPDATE `karta` SET `id` = 'ShiveringSea',`CastleBlack` = 3,`Karhold` = 3,`Winterfell` = 3,`StonyShore` = 0,`WhiteHarbor` = 3,`WidowsWatch` = 3,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 1,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'ShiveringSea';
UPDATE `karta` SET `id` = 'Starfall',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 1,`Yronwood` = 1,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 1,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 2,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 2,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Starfall';
UPDATE `karta` SET `id` = 'StoneySept',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 1,`Lannisport` = 1,`StoneySept` = 0,`Harrenhal` = 1,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 1,`Blackwater` = 1,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'StoneySept';
UPDATE `karta` SET `id` = 'StonyShore',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 1,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 2,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'StonyShore';
UPDATE `karta` SET `id` = 'StormsEnd',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 1,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 1,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 2,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 3,`EastSummerSea` = 2,`SunspearPort` = 0,`SeaOfDorne` = 2 WHERE `karta`.`id` = 'StormsEnd';
UPDATE `karta` SET `id` = 'StormsEndPort',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 1,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'StormsEndPort';
UPDATE `karta` SET `id` = 'SunsetSea',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 3,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 3,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 1,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 1,`PykePort` = 0,`GoldenSound` = 1,`LannisportPort` = 0,`WestSummerSea` = 1,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'SunsetSea';
UPDATE `karta` SET `id` = 'Sunspear',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 1,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 1,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 2,`SunspearPort` = 3,`SeaOfDorne` = 2 WHERE `karta`.`id` = 'Sunspear';
UPDATE `karta` SET `id` = 'SunspearPort',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 1,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'SunspearPort';
UPDATE `karta` SET `id` = 'ThreeTowers',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 1,`Boneway` = 0,`Oldtown` = 1,`ThreeTowers` = 0,`PrincesPass` = 1,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 2,`RedwyneStraghts` = 2,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'ThreeTowers';
UPDATE `karta` SET `id` = 'Twins',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 1,`Seagard` = 1,`Twins` = 0,`Fingers` = 1,`MountainsOfMoon` = 1,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 2,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Twins';
UPDATE `karta` SET `id` = 'WestSummerSea',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 3,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 3,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 3,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 3,`Arbor` = 3,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 1,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 1,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 1,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'WestSummerSea';
UPDATE `karta` SET `id` = 'WhiteHarbor',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 1,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 1,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 1,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 2,`NarrowSea` = 2,`WhiteHarborPort` = 3,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'WhiteHarbor';
UPDATE `karta` SET `id` = 'WhiteHarborPort',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 1,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'WhiteHarborPort';
UPDATE `karta` SET `id` = 'WidowsWatch',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 1,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 2,`NarrowSea` = 2,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'WidowsWatch';
UPDATE `karta` SET `id` = 'Winterfell',`CastleBlack` = 1,`Karhold` = 1,`Winterfell` = 0,`StonyShore` = 1,`WhiteHarbor` = 1,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 1,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 2,`WinterfellPort` = 3,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 2,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'Winterfell';
UPDATE `karta` SET `id` = 'WinterfellPort',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 0,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 0,`Yronwood` = 0,`Starfall` = 0,`Arbor` = 0,`Sunspear` = 0,`SaltShore` = 0,`BayofIce` = 1,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 0 WHERE `karta`.`id` = 'WinterfellPort';
UPDATE `karta` SET `id` = 'Yronwood',`CastleBlack` = 0,`Karhold` = 0,`Winterfell` = 0,`StonyShore` = 0,`WhiteHarbor` = 0,`WidowsWatch` = 0,`FuntsFinger` = 0,`GreywaterWatch` = 0,`MoatCailin` = 0,`Seagard` = 0,`Twins` = 0,`Fingers` = 0,`MountainsOfMoon` = 0,`Eyrie` = 0,`Pyke` = 0,`Riverrun` = 0,`Lannisport` = 0,`StoneySept` = 0,`Harrenhal` = 0,`CrackclawPoint` = 0,`Dragonstone` = 0,`SearoadMarches` = 0,`Blackwater` = 0,`KingsLanding` = 0,`Highgarden` = 0,`Reach` = 0,`Kingswood` = 0,`StormsEnd` = 0,`DornishMarches` = 0,`Boneway` = 1,`Oldtown` = 0,`ThreeTowers` = 0,`PrincesPass` = 1,`Yronwood` = 0,`Starfall` = 1,`Arbor` = 0,`Sunspear` = 1,`SaltShore` = 1,`BayofIce` = 0,`WinterfellPort` = 0,`SunsetSea` = 0,`IronmansBay` = 0,`PykePort` = 0,`GoldenSound` = 0,`LannisportPort` = 0,`WestSummerSea` = 0,`RedwyneStraghts` = 0,`OldtownPort` = 0,`ShiveringSea` = 0,`NarrowSea` = 0,`WhiteHarborPort` = 0,`ShipbreakerBay` = 0,`DragonstonePort` = 0,`BlackwaterBay` = 0,`StormsEndPort` = 0,`EastSummerSea` = 0,`SunspearPort` = 0,`SeaOfDorne` = 2 WHERE `karta`.`id` = 'Yronwood';

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

UPDATE `terr1` SET `name` = 'Arbor',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'Arbor';
UPDATE `terr1` SET `name` = 'BayofIce',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'BayofIce';
UPDATE `terr1` SET `name` = 'Blackwater',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'Blackwater';
UPDATE `terr1` SET `name` = 'BlackwaterBay',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'BlackwaterBay';
UPDATE `terr1` SET `name` = 'Boneway',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'Boneway';
UPDATE `terr1` SET `name` = 'CastleBlack',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'CastleBlack';
UPDATE `terr1` SET `name` = 'CrackclawPoint',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr1`.`name` = 'CrackclawPoint';
UPDATE `terr1` SET `name` = 'DornishMarches',`control` = 'T',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'DornishMarches';
UPDATE `terr1` SET `name` = 'Dragonstone',`control` = 'B',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 4,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr1`.`name` = 'Dragonstone';
UPDATE `terr1` SET `name` = 'DragonstonePort',`control` = 'B',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'DragonstonePort';
UPDATE `terr1` SET `name` = 'EastSummerSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'EastSummerSea';
UPDATE `terr1` SET `name` = 'Eyrie',`control` = '1',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 7,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 1,`mustered` = 0 WHERE `terr1`.`name` = 'Eyrie';
UPDATE `terr1` SET `name` = 'Fingers',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'Fingers';
UPDATE `terr1` SET `name` = 'FlintsFinger',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr1`.`name` = 'FlintsFinger';
UPDATE `terr1` SET `name` = 'GoldenSound',`control` = 'L',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'GoldenSound';
UPDATE `terr1` SET `name` = 'GreywaterWatch',`control` = 'G',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'GreywaterWatch';
UPDATE `terr1` SET `name` = 'Harrenhal',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 1,`mustered` = 0 WHERE `terr1`.`name` = 'Harrenhal';
UPDATE `terr1` SET `name` = 'Highgarden',`control` = 'T',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 5,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 2,`mustered` = 0 WHERE `terr1`.`name` = 'Highgarden';
UPDATE `terr1` SET `name` = 'IronmansBay',`control` = 'G',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'IronmansBay';
UPDATE `terr1` SET `name` = 'Karhold',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'Karhold';
UPDATE `terr1` SET `name` = 'KingsLanding',`control` = '1',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 8,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 2,`castle` = 2,`mustered` = 0 WHERE `terr1`.`name` = 'KingsLanding';
UPDATE `terr1` SET `name` = 'Kingswood',`control` = 'B',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'Kingswood';
UPDATE `terr1` SET `name` = 'Lannisport',`control` = 'L',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 3,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 2,`mustered` = 0 WHERE `terr1`.`name` = 'Lannisport';
UPDATE `terr1` SET `name` = 'LannisportPort',`control` = 'L',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'LannisportPort';
UPDATE `terr1` SET `name` = 'MoatCailin',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr1`.`name` = 'MoatCailin';
UPDATE `terr1` SET `name` = 'MountainsOfMoon',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'MountainsOfMoon';
UPDATE `terr1` SET `name` = 'NarrowSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'NarrowSea';
UPDATE `terr1` SET `name` = 'Oldtown',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 2,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'Oldtown';
UPDATE `terr1` SET `name` = 'OldtownPort',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'OldtownPort';
UPDATE `terr1` SET `name` = 'PrincesPass',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'PrincesPass';
UPDATE `terr1` SET `name` = 'Pyke',`control` = 'G',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 2,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr1`.`name` = 'Pyke';
UPDATE `terr1` SET `name` = 'PykePort',`control` = 'G',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'PykePort';
UPDATE `terr1` SET `name` = 'Reach',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr1`.`name` = 'Reach';
UPDATE `terr1` SET `name` = 'RedwyneStraghts',`control` = 'T',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'RedwyneStraghts';
UPDATE `terr1` SET `name` = 'Riverrun',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr1`.`name` = 'Riverrun';
UPDATE `terr1` SET `name` = 'SaltShore',`control` = 'M',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'SaltShore';
UPDATE `terr1` SET `name` = 'Seagard',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr1`.`name` = 'Seagard';
UPDATE `terr1` SET `name` = 'SeaOfDorne',`control` = 'M',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'SeaOfDorne';
UPDATE `terr1` SET `name` = 'SearoadMarches',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'SearoadMarches';
UPDATE `terr1` SET `name` = 'ShipbreakerBay',`control` = 'B',`unit1` = 'S1',`unit2` = 'S1',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'ShipbreakerBay';
UPDATE `terr1` SET `name` = 'ShiveringSea',`control` = 'S',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'ShiveringSea';
UPDATE `terr1` SET `name` = 'Starfall',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr1`.`name` = 'Starfall';
UPDATE `terr1` SET `name` = 'StoneySept',`control` = 'L',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'StoneySept';
UPDATE `terr1` SET `name` = 'StonyShore',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'StonyShore';
UPDATE `terr1` SET `name` = 'StormsEnd',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr1`.`name` = 'StormsEnd';
UPDATE `terr1` SET `name` = 'StormsEndPort',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'StormsEndPort';
UPDATE `terr1` SET `name` = 'SunsetSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'SunsetSea';
UPDATE `terr1` SET `name` = 'Sunspear',`control` = 'M',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 6,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr1`.`name` = 'Sunspear';
UPDATE `terr1` SET `name` = 'SunspearPort',`control` = 'M',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'SunspearPort';
UPDATE `terr1` SET `name` = 'ThreeTowers',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'ThreeTowers';
UPDATE `terr1` SET `name` = 'Twins',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'Twins';
UPDATE `terr1` SET `name` = 'WestSummerSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'WestSummerSea';
UPDATE `terr1` SET `name` = 'WhiteHarbor',`control` = 'S',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr1`.`name` = 'WhiteHarbor';
UPDATE `terr1` SET `name` = 'WhiteHarborPort',`control` = 'S',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'WhiteHarborPort';
UPDATE `terr1` SET `name` = 'WidowsWatch',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'WidowsWatch';
UPDATE `terr1` SET `name` = 'Winterfell',`control` = 'S',`unit1` = 'K1',`unit2` = 'F1',`unit3` = '0',`unit4` = '0',`garrison` = 1,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr1`.`name` = 'Winterfell';
UPDATE `terr1` SET `name` = 'WinterfellPort',`control` = 'S',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr1`.`name` = 'WinterfellPort';
UPDATE `terr1` SET `name` = 'Yronwood',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr1`.`name` = 'Yronwood';

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

UPDATE `terr17` SET `name` = 'Arbor',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'Arbor';
UPDATE `terr17` SET `name` = 'BayofIce',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'BayofIce';
UPDATE `terr17` SET `name` = 'Blackwater',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'Blackwater';
UPDATE `terr17` SET `name` = 'BlackwaterBay',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'BlackwaterBay';
UPDATE `terr17` SET `name` = 'Boneway',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'Boneway';
UPDATE `terr17` SET `name` = 'CastleBlack',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'CastleBlack';
UPDATE `terr17` SET `name` = 'CrackclawPoint',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr17`.`name` = 'CrackclawPoint';
UPDATE `terr17` SET `name` = 'DornishMarches',`control` = 'T',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'DornishMarches';
UPDATE `terr17` SET `name` = 'Dragonstone',`control` = 'B',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 4,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr17`.`name` = 'Dragonstone';
UPDATE `terr17` SET `name` = 'DragonstonePort',`control` = 'B',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'DragonstonePort';
UPDATE `terr17` SET `name` = 'EastSummerSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'EastSummerSea';
UPDATE `terr17` SET `name` = 'Eyrie',`control` = '1',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 7,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 1,`mustered` = 0 WHERE `terr17`.`name` = 'Eyrie';
UPDATE `terr17` SET `name` = 'Fingers',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'Fingers';
UPDATE `terr17` SET `name` = 'FlintsFinger',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr17`.`name` = 'FlintsFinger';
UPDATE `terr17` SET `name` = 'GoldenSound',`control` = 'L',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'GoldenSound';
UPDATE `terr17` SET `name` = 'GreywaterWatch',`control` = 'G',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'GreywaterWatch';
UPDATE `terr17` SET `name` = 'Harrenhal',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 1,`mustered` = 0 WHERE `terr17`.`name` = 'Harrenhal';
UPDATE `terr17` SET `name` = 'Highgarden',`control` = 'T',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 5,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 2,`mustered` = 0 WHERE `terr17`.`name` = 'Highgarden';
UPDATE `terr17` SET `name` = 'IronmansBay',`control` = 'G',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'IronmansBay';
UPDATE `terr17` SET `name` = 'Karhold',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'Karhold';
UPDATE `terr17` SET `name` = 'KingsLanding',`control` = '1',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 8,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 2,`castle` = 2,`mustered` = 0 WHERE `terr17`.`name` = 'KingsLanding';
UPDATE `terr17` SET `name` = 'Kingswood',`control` = 'B',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'Kingswood';
UPDATE `terr17` SET `name` = 'Lannisport',`control` = 'L',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 3,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 2,`mustered` = 0 WHERE `terr17`.`name` = 'Lannisport';
UPDATE `terr17` SET `name` = 'LannisportPort',`control` = 'L',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'LannisportPort';
UPDATE `terr17` SET `name` = 'MoatCailin',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr17`.`name` = 'MoatCailin';
UPDATE `terr17` SET `name` = 'MountainsOfMoon',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'MountainsOfMoon';
UPDATE `terr17` SET `name` = 'NarrowSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'NarrowSea';
UPDATE `terr17` SET `name` = 'Oldtown',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 2,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'Oldtown';
UPDATE `terr17` SET `name` = 'OldtownPort',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'OldtownPort';
UPDATE `terr17` SET `name` = 'PrincesPass',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'PrincesPass';
UPDATE `terr17` SET `name` = 'Pyke',`control` = 'G',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 2,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr17`.`name` = 'Pyke';
UPDATE `terr17` SET `name` = 'PykePort',`control` = 'G',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'PykePort';
UPDATE `terr17` SET `name` = 'Reach',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr17`.`name` = 'Reach';
UPDATE `terr17` SET `name` = 'RedwyneStraghts',`control` = 'T',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'RedwyneStraghts';
UPDATE `terr17` SET `name` = 'Riverrun',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr17`.`name` = 'Riverrun';
UPDATE `terr17` SET `name` = 'SaltShore',`control` = 'M',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'SaltShore';
UPDATE `terr17` SET `name` = 'Seagard',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr17`.`name` = 'Seagard';
UPDATE `terr17` SET `name` = 'SeaOfDorne',`control` = 'M',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'SeaOfDorne';
UPDATE `terr17` SET `name` = 'SearoadMarches',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'SearoadMarches';
UPDATE `terr17` SET `name` = 'ShipbreakerBay',`control` = 'B',`unit1` = 'S1',`unit2` = 'S1',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'ShipbreakerBay';
UPDATE `terr17` SET `name` = 'ShiveringSea',`control` = 'S',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'ShiveringSea';
UPDATE `terr17` SET `name` = 'Starfall',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr17`.`name` = 'Starfall';
UPDATE `terr17` SET `name` = 'StoneySept',`control` = 'L',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'StoneySept';
UPDATE `terr17` SET `name` = 'StonyShore',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'StonyShore';
UPDATE `terr17` SET `name` = 'StormsEnd',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr17`.`name` = 'StormsEnd';
UPDATE `terr17` SET `name` = 'StormsEndPort',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'StormsEndPort';
UPDATE `terr17` SET `name` = 'SunsetSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'SunsetSea';
UPDATE `terr17` SET `name` = 'Sunspear',`control` = 'M',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 6,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr17`.`name` = 'Sunspear';
UPDATE `terr17` SET `name` = 'SunspearPort',`control` = 'M',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'SunspearPort';
UPDATE `terr17` SET `name` = 'ThreeTowers',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'ThreeTowers';
UPDATE `terr17` SET `name` = 'Twins',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'Twins';
UPDATE `terr17` SET `name` = 'WestSummerSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'WestSummerSea';
UPDATE `terr17` SET `name` = 'WhiteHarbor',`control` = 'S',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr17`.`name` = 'WhiteHarbor';
UPDATE `terr17` SET `name` = 'WhiteHarborPort',`control` = 'S',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'WhiteHarborPort';
UPDATE `terr17` SET `name` = 'WidowsWatch',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'WidowsWatch';
UPDATE `terr17` SET `name` = 'Winterfell',`control` = 'S',`unit1` = 'K1',`unit2` = 'F1',`unit3` = '0',`unit4` = '0',`garrison` = 1,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr17`.`name` = 'Winterfell';
UPDATE `terr17` SET `name` = 'WinterfellPort',`control` = 'S',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr17`.`name` = 'WinterfellPort';
UPDATE `terr17` SET `name` = 'Yronwood',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr17`.`name` = 'Yronwood';

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

UPDATE `terr18` SET `name` = 'Arbor',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'Arbor';
UPDATE `terr18` SET `name` = 'BayofIce',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'BayofIce';
UPDATE `terr18` SET `name` = 'Blackwater',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'Blackwater';
UPDATE `terr18` SET `name` = 'BlackwaterBay',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'BlackwaterBay';
UPDATE `terr18` SET `name` = 'Boneway',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'Boneway';
UPDATE `terr18` SET `name` = 'CastleBlack',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'CastleBlack';
UPDATE `terr18` SET `name` = 'CrackclawPoint',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr18`.`name` = 'CrackclawPoint';
UPDATE `terr18` SET `name` = 'DornishMarches',`control` = 'T',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'DornishMarches';
UPDATE `terr18` SET `name` = 'Dragonstone',`control` = 'B',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 4,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr18`.`name` = 'Dragonstone';
UPDATE `terr18` SET `name` = 'DragonstonePort',`control` = 'B',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'DragonstonePort';
UPDATE `terr18` SET `name` = 'EastSummerSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'EastSummerSea';
UPDATE `terr18` SET `name` = 'Eyrie',`control` = '1',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 7,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 1,`mustered` = 0 WHERE `terr18`.`name` = 'Eyrie';
UPDATE `terr18` SET `name` = 'Fingers',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'Fingers';
UPDATE `terr18` SET `name` = 'FlintsFinger',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr18`.`name` = 'FlintsFinger';
UPDATE `terr18` SET `name` = 'GoldenSound',`control` = 'L',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'GoldenSound';
UPDATE `terr18` SET `name` = 'GreywaterWatch',`control` = 'G',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'GreywaterWatch';
UPDATE `terr18` SET `name` = 'Harrenhal',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 1,`mustered` = 0 WHERE `terr18`.`name` = 'Harrenhal';
UPDATE `terr18` SET `name` = 'Highgarden',`control` = 'T',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 5,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 2,`mustered` = 0 WHERE `terr18`.`name` = 'Highgarden';
UPDATE `terr18` SET `name` = 'IronmansBay',`control` = 'G',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'IronmansBay';
UPDATE `terr18` SET `name` = 'Karhold',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'Karhold';
UPDATE `terr18` SET `name` = 'KingsLanding',`control` = '1',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 8,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 2,`castle` = 2,`mustered` = 0 WHERE `terr18`.`name` = 'KingsLanding';
UPDATE `terr18` SET `name` = 'Kingswood',`control` = 'B',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'Kingswood';
UPDATE `terr18` SET `name` = 'Lannisport',`control` = 'L',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 3,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 2,`mustered` = 0 WHERE `terr18`.`name` = 'Lannisport';
UPDATE `terr18` SET `name` = 'LannisportPort',`control` = 'L',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'LannisportPort';
UPDATE `terr18` SET `name` = 'MoatCailin',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr18`.`name` = 'MoatCailin';
UPDATE `terr18` SET `name` = 'MountainsOfMoon',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'MountainsOfMoon';
UPDATE `terr18` SET `name` = 'NarrowSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'NarrowSea';
UPDATE `terr18` SET `name` = 'Oldtown',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 2,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'Oldtown';
UPDATE `terr18` SET `name` = 'OldtownPort',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'OldtownPort';
UPDATE `terr18` SET `name` = 'PrincesPass',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'PrincesPass';
UPDATE `terr18` SET `name` = 'Pyke',`control` = 'G',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 2,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr18`.`name` = 'Pyke';
UPDATE `terr18` SET `name` = 'PykePort',`control` = 'G',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'PykePort';
UPDATE `terr18` SET `name` = 'Reach',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr18`.`name` = 'Reach';
UPDATE `terr18` SET `name` = 'RedwyneStraghts',`control` = 'T',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'RedwyneStraghts';
UPDATE `terr18` SET `name` = 'Riverrun',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr18`.`name` = 'Riverrun';
UPDATE `terr18` SET `name` = 'SaltShore',`control` = 'M',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'SaltShore';
UPDATE `terr18` SET `name` = 'Seagard',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr18`.`name` = 'Seagard';
UPDATE `terr18` SET `name` = 'SeaOfDorne',`control` = 'M',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'SeaOfDorne';
UPDATE `terr18` SET `name` = 'SearoadMarches',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'SearoadMarches';
UPDATE `terr18` SET `name` = 'ShipbreakerBay',`control` = 'B',`unit1` = 'S1',`unit2` = 'S1',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'ShipbreakerBay';
UPDATE `terr18` SET `name` = 'ShiveringSea',`control` = 'S',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'ShiveringSea';
UPDATE `terr18` SET `name` = 'Starfall',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr18`.`name` = 'Starfall';
UPDATE `terr18` SET `name` = 'StoneySept',`control` = 'L',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'StoneySept';
UPDATE `terr18` SET `name` = 'StonyShore',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'StonyShore';
UPDATE `terr18` SET `name` = 'StormsEnd',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr18`.`name` = 'StormsEnd';
UPDATE `terr18` SET `name` = 'StormsEndPort',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'StormsEndPort';
UPDATE `terr18` SET `name` = 'SunsetSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'SunsetSea';
UPDATE `terr18` SET `name` = 'Sunspear',`control` = 'M',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 6,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr18`.`name` = 'Sunspear';
UPDATE `terr18` SET `name` = 'SunspearPort',`control` = 'M',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'SunspearPort';
UPDATE `terr18` SET `name` = 'ThreeTowers',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'ThreeTowers';
UPDATE `terr18` SET `name` = 'Twins',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'Twins';
UPDATE `terr18` SET `name` = 'WestSummerSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'WestSummerSea';
UPDATE `terr18` SET `name` = 'WhiteHarbor',`control` = 'S',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr18`.`name` = 'WhiteHarbor';
UPDATE `terr18` SET `name` = 'WhiteHarborPort',`control` = 'S',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'WhiteHarborPort';
UPDATE `terr18` SET `name` = 'WidowsWatch',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'WidowsWatch';
UPDATE `terr18` SET `name` = 'Winterfell',`control` = 'S',`unit1` = 'K1',`unit2` = 'F1',`unit3` = '0',`unit4` = '0',`garrison` = 1,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr18`.`name` = 'Winterfell';
UPDATE `terr18` SET `name` = 'WinterfellPort',`control` = 'S',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr18`.`name` = 'WinterfellPort';
UPDATE `terr18` SET `name` = 'Yronwood',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr18`.`name` = 'Yronwood';

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

UPDATE `terr19` SET `name` = 'Arbor',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'Arbor';
UPDATE `terr19` SET `name` = 'BayofIce',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'BayofIce';
UPDATE `terr19` SET `name` = 'Blackwater',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'Blackwater';
UPDATE `terr19` SET `name` = 'BlackwaterBay',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'BlackwaterBay';
UPDATE `terr19` SET `name` = 'Boneway',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'Boneway';
UPDATE `terr19` SET `name` = 'CastleBlack',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'CastleBlack';
UPDATE `terr19` SET `name` = 'CrackclawPoint',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr19`.`name` = 'CrackclawPoint';
UPDATE `terr19` SET `name` = 'DornishMarches',`control` = 'T',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'DornishMarches';
UPDATE `terr19` SET `name` = 'Dragonstone',`control` = 'B',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 4,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr19`.`name` = 'Dragonstone';
UPDATE `terr19` SET `name` = 'DragonstonePort',`control` = 'B',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'DragonstonePort';
UPDATE `terr19` SET `name` = 'EastSummerSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'EastSummerSea';
UPDATE `terr19` SET `name` = 'Eyrie',`control` = '1',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 7,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 1,`mustered` = 0 WHERE `terr19`.`name` = 'Eyrie';
UPDATE `terr19` SET `name` = 'Fingers',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'Fingers';
UPDATE `terr19` SET `name` = 'FlintsFinger',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr19`.`name` = 'FlintsFinger';
UPDATE `terr19` SET `name` = 'GoldenSound',`control` = 'L',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'GoldenSound';
UPDATE `terr19` SET `name` = 'GreywaterWatch',`control` = 'G',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 6,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'GreywaterWatch';
UPDATE `terr19` SET `name` = 'Harrenhal',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 1,`mustered` = 0 WHERE `terr19`.`name` = 'Harrenhal';
UPDATE `terr19` SET `name` = 'Highgarden',`control` = 'T',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 5,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 2,`mustered` = 0 WHERE `terr19`.`name` = 'Highgarden';
UPDATE `terr19` SET `name` = 'IronmansBay',`control` = 'G',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'IronmansBay';
UPDATE `terr19` SET `name` = 'Karhold',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'Karhold';
UPDATE `terr19` SET `name` = 'KingsLanding',`control` = '1',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 8,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 2,`castle` = 2,`mustered` = 0 WHERE `terr19`.`name` = 'KingsLanding';
UPDATE `terr19` SET `name` = 'Kingswood',`control` = 'B',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'Kingswood';
UPDATE `terr19` SET `name` = 'Lannisport',`control` = 'L',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 3,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 2,`mustered` = 0 WHERE `terr19`.`name` = 'Lannisport';
UPDATE `terr19` SET `name` = 'LannisportPort',`control` = 'L',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'LannisportPort';
UPDATE `terr19` SET `name` = 'MoatCailin',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr19`.`name` = 'MoatCailin';
UPDATE `terr19` SET `name` = 'MountainsOfMoon',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'MountainsOfMoon';
UPDATE `terr19` SET `name` = 'NarrowSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'NarrowSea';
UPDATE `terr19` SET `name` = 'Oldtown',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 2,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'Oldtown';
UPDATE `terr19` SET `name` = 'OldtownPort',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'OldtownPort';
UPDATE `terr19` SET `name` = 'PrincesPass',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'PrincesPass';
UPDATE `terr19` SET `name` = 'Pyke',`control` = 'G',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 2,`token` = 0,`prikaz` = 2,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr19`.`name` = 'Pyke';
UPDATE `terr19` SET `name` = 'PykePort',`control` = 'G',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 1,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'PykePort';
UPDATE `terr19` SET `name` = 'Reach',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr19`.`name` = 'Reach';
UPDATE `terr19` SET `name` = 'RedwyneStraghts',`control` = 'T',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'RedwyneStraghts';
UPDATE `terr19` SET `name` = 'Riverrun',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr19`.`name` = 'Riverrun';
UPDATE `terr19` SET `name` = 'SaltShore',`control` = 'M',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'SaltShore';
UPDATE `terr19` SET `name` = 'Seagard',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr19`.`name` = 'Seagard';
UPDATE `terr19` SET `name` = 'SeaOfDorne',`control` = 'M',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'SeaOfDorne';
UPDATE `terr19` SET `name` = 'SearoadMarches',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'SearoadMarches';
UPDATE `terr19` SET `name` = 'ShipbreakerBay',`control` = 'B',`unit1` = 'S1',`unit2` = 'S1',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'ShipbreakerBay';
UPDATE `terr19` SET `name` = 'ShiveringSea',`control` = 'S',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'ShiveringSea';
UPDATE `terr19` SET `name` = 'Starfall',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr19`.`name` = 'Starfall';
UPDATE `terr19` SET `name` = 'StoneySept',`control` = 'L',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'StoneySept';
UPDATE `terr19` SET `name` = 'StonyShore',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'StonyShore';
UPDATE `terr19` SET `name` = 'StormsEnd',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr19`.`name` = 'StormsEnd';
UPDATE `terr19` SET `name` = 'StormsEndPort',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'StormsEndPort';
UPDATE `terr19` SET `name` = 'SunsetSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'SunsetSea';
UPDATE `terr19` SET `name` = 'Sunspear',`control` = 'M',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 6,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr19`.`name` = 'Sunspear';
UPDATE `terr19` SET `name` = 'SunspearPort',`control` = 'M',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'SunspearPort';
UPDATE `terr19` SET `name` = 'ThreeTowers',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'ThreeTowers';
UPDATE `terr19` SET `name` = 'Twins',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'Twins';
UPDATE `terr19` SET `name` = 'WestSummerSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'WestSummerSea';
UPDATE `terr19` SET `name` = 'WhiteHarbor',`control` = 'S',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr19`.`name` = 'WhiteHarbor';
UPDATE `terr19` SET `name` = 'WhiteHarborPort',`control` = 'S',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'WhiteHarborPort';
UPDATE `terr19` SET `name` = 'WidowsWatch',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'WidowsWatch';
UPDATE `terr19` SET `name` = 'Winterfell',`control` = 'S',`unit1` = 'K1',`unit2` = 'F1',`unit3` = '0',`unit4` = '0',`garrison` = 1,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr19`.`name` = 'Winterfell';
UPDATE `terr19` SET `name` = 'WinterfellPort',`control` = 'S',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr19`.`name` = 'WinterfellPort';
UPDATE `terr19` SET `name` = 'Yronwood',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr19`.`name` = 'Yronwood';

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

UPDATE `terr20` SET `name` = 'Arbor',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'Arbor';
UPDATE `terr20` SET `name` = 'BayofIce',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'BayofIce';
UPDATE `terr20` SET `name` = 'Blackwater',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'Blackwater';
UPDATE `terr20` SET `name` = 'BlackwaterBay',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'BlackwaterBay';
UPDATE `terr20` SET `name` = 'Boneway',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'Boneway';
UPDATE `terr20` SET `name` = 'CastleBlack',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'CastleBlack';
UPDATE `terr20` SET `name` = 'CrackclawPoint',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr20`.`name` = 'CrackclawPoint';
UPDATE `terr20` SET `name` = 'DornishMarches',`control` = 'T',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'DornishMarches';
UPDATE `terr20` SET `name` = 'Dragonstone',`control` = 'B',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 4,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr20`.`name` = 'Dragonstone';
UPDATE `terr20` SET `name` = 'DragonstonePort',`control` = 'B',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'DragonstonePort';
UPDATE `terr20` SET `name` = 'EastSummerSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'EastSummerSea';
UPDATE `terr20` SET `name` = 'Eyrie',`control` = '1',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 7,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 1,`mustered` = 0 WHERE `terr20`.`name` = 'Eyrie';
UPDATE `terr20` SET `name` = 'Fingers',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'Fingers';
UPDATE `terr20` SET `name` = 'FlintsFinger',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr20`.`name` = 'FlintsFinger';
UPDATE `terr20` SET `name` = 'GoldenSound',`control` = 'L',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'GoldenSound';
UPDATE `terr20` SET `name` = 'GreywaterWatch',`control` = 'G',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'GreywaterWatch';
UPDATE `terr20` SET `name` = 'Harrenhal',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 1,`mustered` = 0 WHERE `terr20`.`name` = 'Harrenhal';
UPDATE `terr20` SET `name` = 'Highgarden',`control` = 'T',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 5,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 2,`mustered` = 0 WHERE `terr20`.`name` = 'Highgarden';
UPDATE `terr20` SET `name` = 'IronmansBay',`control` = 'G',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'IronmansBay';
UPDATE `terr20` SET `name` = 'Karhold',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'Karhold';
UPDATE `terr20` SET `name` = 'KingsLanding',`control` = '1',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 8,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 2,`castle` = 2,`mustered` = 0 WHERE `terr20`.`name` = 'KingsLanding';
UPDATE `terr20` SET `name` = 'Kingswood',`control` = 'B',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'Kingswood';
UPDATE `terr20` SET `name` = 'Lannisport',`control` = 'L',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 3,`token` = 0,`prikaz` = 0,`supply` = 2,`power` = 0,`castle` = 2,`mustered` = 0 WHERE `terr20`.`name` = 'Lannisport';
UPDATE `terr20` SET `name` = 'LannisportPort',`control` = 'L',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'LannisportPort';
UPDATE `terr20` SET `name` = 'MoatCailin',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr20`.`name` = 'MoatCailin';
UPDATE `terr20` SET `name` = 'MountainsOfMoon',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'MountainsOfMoon';
UPDATE `terr20` SET `name` = 'NarrowSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'NarrowSea';
UPDATE `terr20` SET `name` = 'Oldtown',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 2,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'Oldtown';
UPDATE `terr20` SET `name` = 'OldtownPort',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'OldtownPort';
UPDATE `terr20` SET `name` = 'PrincesPass',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'PrincesPass';
UPDATE `terr20` SET `name` = 'Pyke',`control` = 'G',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 2,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr20`.`name` = 'Pyke';
UPDATE `terr20` SET `name` = 'PykePort',`control` = 'G',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'PykePort';
UPDATE `terr20` SET `name` = 'Reach',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr20`.`name` = 'Reach';
UPDATE `terr20` SET `name` = 'RedwyneStraghts',`control` = 'T',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'RedwyneStraghts';
UPDATE `terr20` SET `name` = 'Riverrun',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr20`.`name` = 'Riverrun';
UPDATE `terr20` SET `name` = 'SaltShore',`control` = 'M',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'SaltShore';
UPDATE `terr20` SET `name` = 'Seagard',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr20`.`name` = 'Seagard';
UPDATE `terr20` SET `name` = 'SeaOfDorne',`control` = 'M',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'SeaOfDorne';
UPDATE `terr20` SET `name` = 'SearoadMarches',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'SearoadMarches';
UPDATE `terr20` SET `name` = 'ShipbreakerBay',`control` = 'B',`unit1` = 'S1',`unit2` = 'S1',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'ShipbreakerBay';
UPDATE `terr20` SET `name` = 'ShiveringSea',`control` = 'S',`unit1` = 'S1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'ShiveringSea';
UPDATE `terr20` SET `name` = 'Starfall',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr20`.`name` = 'Starfall';
UPDATE `terr20` SET `name` = 'StoneySept',`control` = 'L',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'StoneySept';
UPDATE `terr20` SET `name` = 'StonyShore',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'StonyShore';
UPDATE `terr20` SET `name` = 'StormsEnd',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr20`.`name` = 'StormsEnd';
UPDATE `terr20` SET `name` = 'StormsEndPort',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'StormsEndPort';
UPDATE `terr20` SET `name` = 'SunsetSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'SunsetSea';
UPDATE `terr20` SET `name` = 'Sunspear',`control` = 'M',`unit1` = 'F1',`unit2` = 'K1',`unit3` = '0',`unit4` = '0',`garrison` = 6,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr20`.`name` = 'Sunspear';
UPDATE `terr20` SET `name` = 'SunspearPort',`control` = 'M',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'SunspearPort';
UPDATE `terr20` SET `name` = 'ThreeTowers',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'ThreeTowers';
UPDATE `terr20` SET `name` = 'Twins',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 1,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'Twins';
UPDATE `terr20` SET `name` = 'WestSummerSea',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'WestSummerSea';
UPDATE `terr20` SET `name` = 'WhiteHarbor',`control` = 'S',`unit1` = 'F1',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr20`.`name` = 'WhiteHarbor';
UPDATE `terr20` SET `name` = 'WhiteHarborPort',`control` = 'S',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'WhiteHarborPort';
UPDATE `terr20` SET `name` = 'WidowsWatch',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'WidowsWatch';
UPDATE `terr20` SET `name` = 'Winterfell',`control` = 'S',`unit1` = 'K1',`unit2` = 'F1',`unit3` = '0',`unit4` = '0',`garrison` = 1,`token` = 0,`prikaz` = 0,`supply` = 1,`power` = 1,`castle` = 2,`mustered` = 0 WHERE `terr20`.`name` = 'Winterfell';
UPDATE `terr20` SET `name` = 'WinterfellPort',`control` = 'S',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 0,`mustered` = 0 WHERE `terr20`.`name` = 'WinterfellPort';
UPDATE `terr20` SET `name` = 'Yronwood',`control` = '0',`unit1` = '0',`unit2` = '0',`unit3` = '0',`unit4` = '0',`garrison` = 0,`token` = 0,`prikaz` = 0,`supply` = 0,`power` = 0,`castle` = 1,`mustered` = 0 WHERE `terr20`.`name` = 'Yronwood';

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

UPDATE `users` SET `user_id` = 2,`user_login` = 'root',`user_password` = '5ef112b93a6e23fc43d57e98d0e49b7f',`user_hash` = '2e5915aa0f247c5ca7950037c5d50398',`lastgame` = 0 WHERE `users`.`user_id` = 2;
UPDATE `users` SET `user_id` = 30,`user_login` = 'test',`user_password` = 'fb469d7ef430b0baf0cab6c436e70375',`user_hash` = '9c166fd6261527b34067fc883b50a39d',`lastgame` = 19 WHERE `users`.`user_id` = 30;
UPDATE `users` SET `user_id` = 32,`user_login` = 'qwe',`user_password` = '3675ac5c859c806b26e02e6f9fd62192',`user_hash` = '2ff5e0879150777d3a5914f63346d120',`lastgame` = 20 WHERE `users`.`user_id` = 32;
UPDATE `users` SET `user_id` = 33,`user_login` = 'Helyck',`user_password` = '35f504164d5a963d6a820e71614a4009',`user_hash` = 'd9db7b26571323cc874af6cb2a64eb53',`lastgame` = 85 WHERE `users`.`user_id` = 33;
UPDATE `users` SET `user_id` = 34,`user_login` = 'edda',`user_password` = '52700466eec6b1a093c37ec52fe90278',`user_hash` = '31f79f93918509295ad694b7751538e1',`lastgame` = 85 WHERE `users`.`user_id` = 34;
UPDATE `users` SET `user_id` = 35,`user_login` = 'Avlek',`user_password` = '131ca722ce8f86d107d69ccc554f40aa',`user_hash` = '982ffa00df462a26b0ebe7b84fa0946a',`lastgame` = 87 WHERE `users`.`user_id` = 35;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
