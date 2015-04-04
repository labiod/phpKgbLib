-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Kwi 2015, 20:06
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

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
-- Struktura tabeli dla tabeli `content`
--

CREATE TABLE IF NOT EXISTS `content` (
`id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `content_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `content_text` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id_course` int(11) NOT NULL,
  `course_name` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `category` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `start_date` date NOT NULL,
  `drive_hours` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
`id_wojewodztwo` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `districts`
--

INSERT INTO `districts` (`id_wojewodztwo`, `nazwa`) VALUES
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `drive_book`
--

CREATE TABLE IF NOT EXISTS `drive_book` (
`id` int(11) NOT NULL,
  `drive_date` datetime NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `location` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `drive_type` int(11) NOT NULL,
  `carr_id` int(11) NOT NULL,
  `osk_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `drive_book`
--

INSERT INTO `drive_book` (`id`, `drive_date`, `student_id`, `teacher_id`, `location`, `drive_type`, `carr_id`, `osk_id`) VALUES
(1, '2015-04-04 14:00:00', 1, 1, 'Pod zamkiem', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `friendly_links`
--

CREATE TABLE IF NOT EXISTS `friendly_links` (
`id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `module` varchar(20) NOT NULL,
  `type` enum('Index','Admin','User') NOT NULL DEFAULT 'Index',
  `action` varchar(20) NOT NULL,
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `friendly_links`
--

INSERT INTO `friendly_links` (`id`, `link`, `module`, `type`, `action`, `params`) VALUES
(1, 'login', 'user', 'Index', 'login', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `menu_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `module_type` int(11) NOT NULL,
  `content_id` int(11) NOT NULL DEFAULT '0',
  `url` varchar(150) NOT NULL,
  `start-page` tinyint(2) NOT NULL DEFAULT '0',
  `access` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
`id` int(11) NOT NULL,
  `osk_name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nr` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `zip_code` int(6) NOT NULL,
  `district` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `nip` varchar(13) COLLATE utf8_polish_ci NOT NULL,
  `regon` varchar(14) COLLATE utf8_polish_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `osk`
--

INSERT INTO `osk` (`id`, `osk_name`, `nr`, `address`, `city`, `zip_code`, `district`, `nip`, `regon`, `active`, `user_id`) VALUES
(1, 'OSK test', '123-123-123', 'Testowa 7', 'Mieścina', 66, 'lubelskie', '12345678901', '13123334', 1, 2),
(2, 'awaria', '123ac', 'Ufoludków 5', 'Łyse Pole', 0, 'lubelskie', '321654', '', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osk_site`
--

CREATE TABLE IF NOT EXISTS `osk_site` (
`id_osk_site` int(11) NOT NULL,
  `osk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
`id_role` int(11) NOT NULL,
  `role_name` varchar(55) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
`id_privilage` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `module` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `action_name` varchar(40) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
(30, 3, 'grafik', 'podgladDnia'),
(31, 2, 'grafik', 'osk'),
(32, 2, 'osk', 'grafik'),
(33, 2, 'grafik', 'oskDay');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings_osk`
--

CREATE TABLE IF NOT EXISTS `settings_osk` (
`id_setting` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `value` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `osk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `students`
--

CREATE TABLE IF NOT EXISTS `students` (
`id_student` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `osk_id` int(11) DEFAULT NULL,
  `paid_hours` int(3) NOT NULL,
  `driven_hours` int(3) NOT NULL,
  `drive_category` varchar(2) COLLATE utf8_polish_ci NOT NULL,
  `phone_number` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `students`
--

INSERT INTO `students` (`id_student`, `user_id`, `osk_id`, `paid_hours`, `driven_hours`, `drive_category`, `phone_number`) VALUES
(1, 5, 1, 40, 0, 'B', 333444555);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `students_course`
--

CREATE TABLE IF NOT EXISTS `students_course` (
`id_entry` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nr` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `teacher_color` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `nr`, `teacher_color`) VALUES
(1, 2, 'ds-IT1', 11111);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `zip_code` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `active` enum('Y','N') COLLATE utf8_polish_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `role_id`, `first_name`, `last_name`, `address`, `city`, `zip_code`, `active`) VALUES
(2, 'dd@w.pl', 'ooo', 3, 'Jan', 'Kowalski', '', '', '', 'Y'),
(4, 'ddd@w.pl', 'mm', 2, 'Tomasz', 'Nowak', '', '', '', 'Y'),
(5, 'g@g.pl', 'ggg', 1, 'Anna', 'Kowalska', '', '', '', 'Y'),
(6, 'admin@gmail.com', 'adm', 4, '', '', '', '', '', 'Y'),
(7, 'ff@ff', 'ff', 1, '', '', NULL, NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
`id_vehicle` int(11) NOT NULL,
  `registration_number` varchar(8) COLLATE utf8_polish_ci NOT NULL,
  `osk_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `vehicles`
--

INSERT INTO `vehicles` (`id_vehicle`, `registration_number`, `osk_id`) VALUES
(1, 'lu 12345', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
 ADD PRIMARY KEY (`id_wojewodztwo`), ADD UNIQUE KEY `nazwa` (`nazwa`);

--
-- Indexes for table `drive_book`
--
ALTER TABLE `drive_book`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendly_links`
--
ALTER TABLE `friendly_links`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `link` (`link`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`), ADD KEY `module_type` (`module_type`);

--
-- Indexes for table `osk`
--
ALTER TABLE `osk`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nr` (`nr`), ADD UNIQUE KEY `NIP` (`nip`,`regon`);

--
-- Indexes for table `osk_site`
--
ALTER TABLE `osk_site`
 ADD PRIMARY KEY (`id_osk_site`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id_role`), ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `roles_priv`
--
ALTER TABLE `roles_priv`
 ADD PRIMARY KEY (`id_privilage`);

--
-- Indexes for table `settings_osk`
--
ALTER TABLE `settings_osk`
 ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id_student`);

--
-- Indexes for table `students_course`
--
ALTER TABLE `students_course`
 ADD PRIMARY KEY (`id_entry`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id` (`user_id`,`nr`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `user_name` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
 ADD PRIMARY KEY (`id_vehicle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `content`
--
ALTER TABLE `content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `courses`
--
ALTER TABLE `courses`
MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `districts`
--
ALTER TABLE `districts`
MODIFY `id_wojewodztwo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `drive_book`
--
ALTER TABLE `drive_book`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `friendly_links`
--
ALTER TABLE `friendly_links`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `osk`
--
ALTER TABLE `osk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `osk_site`
--
ALTER TABLE `osk_site`
MODIFY `id_osk_site` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `roles`
--
ALTER TABLE `roles`
MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `roles_priv`
--
ALTER TABLE `roles_priv`
MODIFY `id_privilage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT dla tabeli `settings_osk`
--
ALTER TABLE `settings_osk`
MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `students`
--
ALTER TABLE `students`
MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `students_course`
--
ALTER TABLE `students_course`
MODIFY `id_entry` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `teachers`
--
ALTER TABLE `teachers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `vehicles`
--
ALTER TABLE `vehicles`
MODIFY `id_vehicle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
