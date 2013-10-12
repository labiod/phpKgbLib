-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 30 Wrz 2013, 20:30
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osk`
--

CREATE TABLE IF NOT EXISTS `osk` (
  `id_osk` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `adres` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `kod` int(6) NOT NULL,
  `wojewodztwo` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `NIP` varchar(13) COLLATE utf8_polish_ci NOT NULL,
  `REGON` varchar(14) COLLATE utf8_polish_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_osk`),
  UNIQUE KEY `NIP` (`NIP`,`REGON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
