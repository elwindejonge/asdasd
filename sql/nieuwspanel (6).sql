-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 mei 2016 om 12:17
-- Serverversie: 5.6.26
-- PHP-versie: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nieuwspanel`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) unsigned NOT NULL,
  `topic_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `name`, `content`, `created_at`, `user_id`, `topic_id`) VALUES
(34, '', 'Hallo', '2016-05-19 12:26:20', 27, 1),
(35, '', 'Hallo', '2016-05-19 12:26:20', 28, 2),
(36, '', 'Hallo', '2016-05-19 12:26:43', 29, 3),
(37, '', 'Hallo', '2016-05-19 12:26:43', 30, 4),
(38, '', '<p>Dashdhasdhsd</p>', '2016-05-19 13:31:38', 32, 2),
(39, '', '<p>asdsdasdasdasdasdasd</p>', '2016-05-19 13:32:03', 32, 2),
(40, '', '<p>asdsdasdasdasdasdasd</p>', '2016-05-19 13:32:07', 32, 2),
(41, '', '<p>Hallo ik ben blij dat dit werkt!</p>', '2016-05-21 17:22:15', 31, 1),
(42, '', '<p>kanker</p>', '2016-05-22 16:12:25', 31, 2),
(43, '', '<p>Kuthoer</p>', '2016-05-22 16:15:33', 31, 2),
(44, '', '<p>******</p>', '2016-05-22 16:15:40', 31, 2),
(45, '', '<p>Hallo</p>', '2016-05-22 16:16:14', 31, 2),
(46, '', '<p>test</p>', '2016-05-22 16:17:58', 34, 2),
(47, '', '<p>Heyy alles goed jongens?!</p>', '2016-05-23 11:06:25', 34, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `content` mediumtext CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `topics`
--

INSERT INTO `topics` (`id`, `name`, `content`, `created_at`) VALUES
(1, 'Breaking Bad', 'Breaking bad is een leuke serie voor drugsdealers en kogelvangers.', '2014-08-12 09:30:00'),
(2, 'Prison Break', 'Prison break is een leuke serie voor mensen die in een gevangenis geleefd hebben het nogmaals willen beleven en uitbreken.', '2016-05-18 06:19:00'),
(3, 'Better Call Saul', 'Voor de echte advocaat moet je weten wat je moet doen dus "Better call saul"', '2016-02-09 10:27:24'),
(4, 'Vikings', 'Dit is een leuke serie voor murderest verkrachters en plunderaars', '2015-09-15 10:39:26');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(26, 'admin', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'admin@filmforum.nl', 1),
(27, 'Elwin', '3d1e357635bb33310f31d1c79c1255705fc8d0e7', 'elwindejonge@hotmail.com', 0),
(28, 'pieter', '945d0708936a74d63f88b0dd781808c47eb3a054', 'pietergriep@live.nl', 0),
(29, 'iris', '3e9afe235a0ebee72d1969e8b4a886d5bd30c515', 'iris@live.nl', 0),
(30, 'henkie', '0dbd769736bbeb8f3bf01f9fba9f33ef02761355', 'henkei@wenk.nl', 0),
(31, 'irisvdh', '0dbd769736bbeb8f3bf01f9fba9f33ef02761355', 'irisdikkop@live.nl', 0),
(32, 'elwin090', '0dbd769736bbeb8f3bf01f9fba9f33ef02761355', 'elwindejonge@hotmail.com', 0),
(33, 'gonny', '0dbd769736bbeb8f3bf01f9fba9f33ef02761355', 'gonnyblabla@live.nl', 0),
(34, 'thijskuiper', '0dbd769736bbeb8f3bf01f9fba9f33ef02761355', 'thijs@alda;sd.nl', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT voor een tabel `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
