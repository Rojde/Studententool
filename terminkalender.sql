-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jul 2018 um 20:22
-- Server-Version: 10.1.32-MariaDB
-- PHP-Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `terminkalender`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `benutzername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `benutzername`, `passwort`, `created_at`, `updated_at`) VALUES
(6, 'HeikeWiesner', '$2y$10$ZVfRwdBqKFzMd0.yAj3vGOdPGF1rqxySGncxnlaStFsvZuthFqoK6', '2018-06-09 12:19:27', NULL),
(7, 'Gruppe1', '$2y$10$1GPBSV3ZR2tsIMKAoYKSDuN9hQoHLj.LRFYM5eFGkFzVIY6WlHOpy', '2018-06-09 21:18:16', NULL),
(8, 'Gruppe2', '$2y$10$vEQVkafxmvllb.kkk7g9iOZncR.m2HEbnVGYRTSVscf70a2NrhXtm', '2018-06-09 21:19:58', NULL),
(9, 'Gruppe3', '$2y$10$Sn5HBO0ShxcFLuQb4I3hQeLy5fkrpFlGtIi8QvbWPbu.hB3iKhY92', '2018-06-09 21:20:47', NULL),
(10, 'Gruppe4', '$2y$10$M36QMf.vULXo025DLp6qlOyAI9gH30qR2Hl0JjhPYos02Hb6sxlke', '2018-06-09 21:21:37', NULL),
(11, 'Gruppe5', '$2y$10$xBOqIYzb4ngEs078AolIne0oxEDwWY7.Tqtjdlg2nn7D526dlgRA6', '2018-06-09 21:22:12', NULL),
(12, 'Gruppe6', '$2y$10$lQJS/4R66PHwYhLxl2WIyONCDmy/o/.zkGkeY5y7W9PhbQprsroSi', '2018-06-09 21:22:48', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
