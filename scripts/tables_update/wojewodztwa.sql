-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 10 Lis 2013, 18:18
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
-- Struktura tabeli dla tabeli `wojewodztwa`
--

CREATE TABLE IF NOT EXISTS `wojewodztwa` (
  `id_wojewodztwo` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_wojewodztwo`),
  UNIQUE KEY `nazwa` (`nazwa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `wojewodztwa`
--

INSERT INTO `wojewodztwa` (`id_wojewodztwo`, `nazwa`) VALUES
(1, 'Dolnośląskie'),
(2, 'Kujawsko-pomorskie'),
(3, 'Lubelskie'),
(4, 'Lubuskie'),
(5, 'Łódzkie'),
(6, 'Małopolskie'),
(7, 'Mazowieckie'),
(8, 'Opolskie'),
(9, 'Podkarpackie'),
(10, 'Podlaskie'),
(11, 'Pomorskie'),
(12, 'Śląskie'),
(13, 'Świętokrzyskie'),
(14, 'Warmińsko-mazurskie'),
(15, 'Wielkopolskie'),
(16, 'Zachodniopomorskie');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
