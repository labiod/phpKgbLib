-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 03 Sie 2013, 11:12
-- Wersja serwera: 5.5.32
-- Wersja PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `lpunkt`
--
CREATE DATABASE IF NOT EXISTS `lpunkt` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `lpunkt`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `content`
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
-- Struktura tabeli dla tabeli `friendly_links`
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
-- Struktura tabeli dla tabeli `menu`
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
-- Struktura tabeli dla tabeli `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL,
  `module_name` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(55) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id_role`, `role_name`) VALUES
(3, 'instruktor'),
(1, 'kursant'),
(2, 'osk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles_priv`
--

CREATE TABLE IF NOT EXISTS `roles_priv` (
  `id_privilage` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `action_name` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_privilage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `nr` varchar(11) COLLATE utf8_polish_ci DEFAULT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `adres` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `kod` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `active` enum('Y','N') COLLATE utf8_polish_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `user_name` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `role_id`, `nr`, `imie`, `nazwisko`, `adres`, `miasto`, `kod`, `active`) VALUES
(2, 'dd@w.pl', 'ooo', 0, '123qwe', '', '', '', '', '', 'N'),
(4, 'ddd@w.pl', 'mm', 2, '11', '', '', '', '', '', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
