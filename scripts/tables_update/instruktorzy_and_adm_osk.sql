-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 09 Lis 2013, 19:18
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
-- Struktura tabeli dla tabeli `instruktorzy`
--

CREATE TABLE IF NOT EXISTS `instruktorzy` (
  `id_instruktor` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nr` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_instruktor`),
  UNIQUE KEY `user_id` (`user_id`,`nr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osk_adm`
--

CREATE TABLE IF NOT EXISTS `osk_adm` (
  `id_osk_adm` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `osk_id` int(11) NOT NULL,
  PRIMARY KEY (`id_osk_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osk_inst`
--

CREATE TABLE IF NOT EXISTS `osk_inst` (
  `id_osk_inst` int(11) NOT NULL AUTO_INCREMENT,
  `osk_id` int(11) NOT NULL,
  `instruktor_id` int(11) NOT NULL,
  PRIMARY KEY (`id_osk_inst`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
