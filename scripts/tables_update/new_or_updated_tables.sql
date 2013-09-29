-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 28 Wrz 2013, 22:08
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
-- Struktura tabeli dla tabeli `auta`
--

CREATE TABLE IF NOT EXISTS `auta` (
  `id_auto` int(11) NOT NULL AUTO_INCREMENT,
  `nr_rej` varchar(8) COLLATE utf8_polish_ci NOT NULL,
  `osk_id` int(11) NOT NULL,
  PRIMARY KEY (`id_auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jazdy`
--

CREATE TABLE IF NOT EXISTS `jazdy` (
  `id_jazdy` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `kursant_id` int(11) NOT NULL,
  `osk_id` int(11) NOT NULL,
  `instruktor_id` int(11) NOT NULL,
  `auto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jazdy`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kursanci`
--

CREATE TABLE IF NOT EXISTS `kursanci` (
  `id_kursant` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `osk_id` int(11) DEFAULT NULL,
  `godz_oplacone` int(3) NOT NULL,
  `godz_pozostale` int(3) NOT NULL,
  `kategoria` varchar(2) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_kursant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kursy`
--

CREATE TABLE IF NOT EXISTS `kursy` (
  `id_kurs` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `kategoria` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `data_rozp` date NOT NULL,
  `godziny_jazd` int(3) NOT NULL,
  PRIMARY KEY (`id_kurs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id_osk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osk_adm`
--

CREATE TABLE IF NOT EXISTS `osk_adm` (
  `id_pracownik` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `osk_id` int(11) NOT NULL,
  PRIMARY KEY (`id_pracownik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczestnicy`
--

CREATE TABLE IF NOT EXISTS `uczestnicy` (
  `id_uczestnik` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL,
  PRIMARY KEY (`id_uczestnik`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `role_id`, `nr`, `imie`, `nazwisko`, `adres`, `miasto`, `kod`, `active`) VALUES
(2, 'dd@w.pl', 'ooo', 0, '123qwe', '', '', '', '', '', 'Y'),
(4, 'ddd@w.pl', 'mm', 2, '11', '', '', '', '', '', 'Y'),
(5, 'g@g.pl', 'ggg', 1, NULL, '', '', '', '', '', 'Y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 28 Wrz 2013, 22:13
-- Wersja serwera: 5.5.32
-- Wersja PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Baza danych: `lpunkt`
--
CREATE DATABASE IF NOT EXISTS `lpunkt` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `lpunkt`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings_osk`
--

CREATE TABLE IF NOT EXISTS `settings_osk` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `value` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `osk_id` int(11) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;
