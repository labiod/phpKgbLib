-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Lut 2015, 18:11
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lpunkt`
--

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
  `action` varchar(20) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `friendly_links`
--

INSERT INTO `friendly_links` (`id`, `link`, `module`, `type`, `action`, `params`) VALUES
(1, 'login', 'user', 'Index', 'login', '');

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
-- Struktura tabeli dla tabeli `osk`
--

CREATE TABLE IF NOT EXISTS `osk` (
  `id_osk` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nr` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `adres` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `kod` int(6) NOT NULL,
  `wojewodztwo` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `nip` varchar(13) COLLATE utf8_polish_ci NOT NULL,
  `regon` varchar(14) COLLATE utf8_polish_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_osk`),
  UNIQUE KEY `nr` (`nr`),
  UNIQUE KEY `NIP` (`nip`,`regon`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `osk`
--

INSERT INTO `osk` (`id_osk`, `nazwa`, `nr`, `adres`, `miasto`, `kod`, `wojewodztwo`, `nip`, `regon`, `active`) VALUES
(1, 'OSK test', '123-123-123', 'Testowa 7', 'Mieścina', 66, 'lubelskie', '12345678901', '13123334', 1),
(2, 'awaria', '123ac', 'Ufoludków 5', 'Łyse Pole', 0, 'lubelskie', '321654', '', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osk_site`
--

CREATE TABLE IF NOT EXISTS `osk_site` (
  `id_osk_site` int(11) NOT NULL AUTO_INCREMENT,
  `osk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_osk_site`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `osk_site`
--

INSERT INTO `osk_site` (`id_osk_site`, `osk_id`, `user_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 1, 4),
(4, 2, 4),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(55) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id_role`, `role_name`) VALUES
(4, 'admin'),
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
  `module` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `action_name` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_privilage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=31 ;

--
-- Zrzut danych tabeli `roles_priv`
--

INSERT INTO `roles_priv` (`id_privilage`, `id_role`, `module`, `action_name`) VALUES
(1, 4, 'admin', 'login'),
(2, 4, 'admin', 'index'),
(3, 4, 'osk', 'index'),
(4, 4, 'osk', 'registerOsk'),
(9, 1, 'user', 'oskSite'),
(10, 2, 'user', 'oskSite'),
(11, 3, 'user', 'oskSite'),
(12, 1, 'index', 'index_logged'),
(13, 2, 'index', 'index_logged'),
(14, 3, 'index', 'index_logged'),
(17, 1, 'user', 'profile'),
(18, 2, 'user', 'profile'),
(19, 3, 'user', 'profile'),
(22, 1, 'grafik', 'kursant'),
(23, 2, 'grafik', 'kursant'),
(24, 3, 'grafik', 'kursant'),
(25, 1, 'grafik', 'podgladDnia'),
(26, 0, 'grafik', 'podgladDnia'),
(27, 3, 'grafik', 'podgladDnia'),
(28, 1, 'grafik', 'podgladDnia'),
(29, 2, 'grafik', 'podgladDnia'),
(30, 3, 'grafik', 'podgladDnia');

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
  `imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `adres` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL,
  `miasto` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `kod` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `active` enum('Y','N') COLLATE utf8_polish_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `user_name` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `role_id`, `imie`, `nazwisko`, `adres`, `miasto`, `kod`, `active`) VALUES
(2, 'dd@w.pl', 'ooo', 3, 'Jan', 'Kowalski', '', '', '', 'Y'),
(4, 'ddd@w.pl', 'mm', 2, 'Tomasz', 'Nowak', '', '', '', 'Y'),
(5, 'g@g.pl', 'ggg', 1, '', '', '', '', '', 'Y'),
(6, 'admin@gmail.com', 'adm', 4, '', '', '', '', '', 'Y'),
(7, 'ff@ff', 'ff', 1, '', '', NULL, NULL, NULL, 'N');

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
