-- phpMyAdmin SQL Dump
-- version 3.4.6-rc1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 27 May 2012, 10:28
-- Wersja serwera: 5.5.16
-- Wersja PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `alhambra`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `content_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `content_text` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `friendly_links`
--

CREATE TABLE IF NOT EXISTS `friendly_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) NOT NULL,
  `module` varchar(20) NOT NULL,
  `type` enum('Index','Admin','User') NOT NULL DEFAULT 'Index',
  `action` int(20) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `module_type` int(11) NOT NULL,
  `content_id` int(11) NOT NULL DEFAULT '0',
  `url` varchar(150) NOT NULL,
  `start-page` tinyint(2) NOT NULL DEFAULT '0',
  `access` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `module_type` (`module_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL,
  `module_name` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;