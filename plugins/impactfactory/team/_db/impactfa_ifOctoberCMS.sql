-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 16. Sep 2020 um 16:36
-- Server-Version: 5.7.26-log-cll-lve
-- PHP-Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `impactfa_ifOctoberCMS`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `impactfactory_team_organisations`
--

CREATE TABLE `impactfactory_team_organisations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `impactfactory_team_people`
--

CREATE TABLE `impactfactory_team_people` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motivation` text COLLATE utf8_unicode_ci,
  `background` text COLLATE utf8_unicode_ci,
  `favourite_movie` text COLLATE utf8_unicode_ci,
  `availability` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `impactfactory_team_person_team`
--

CREATE TABLE `impactfactory_team_person_team` (
  `person_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `impactfactory_team_teams`
--

CREATE TABLE `impactfactory_team_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `style` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organisation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `impactfactory_team_organisations`
--
ALTER TABLE `impactfactory_team_organisations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `impactfactory_team_people`
--
ALTER TABLE `impactfactory_team_people`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `impactfactory_team_person_team`
--
ALTER TABLE `impactfactory_team_person_team`
  ADD PRIMARY KEY (`person_id`,`team_id`);

--
-- Indizes für die Tabelle `impactfactory_team_teams`
--
ALTER TABLE `impactfactory_team_teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `impactfactory_team_organisations`
--
ALTER TABLE `impactfactory_team_organisations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `impactfactory_team_people`
--
ALTER TABLE `impactfactory_team_people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `impactfactory_team_teams`
--
ALTER TABLE `impactfactory_team_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
