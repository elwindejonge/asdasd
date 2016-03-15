-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 mrt 2016 om 13:16
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
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(5, 'elwin', '3d1e357635bb33310f31d1c79c1255705fc8d0e7', 'elwin@filmforum.nl'),
(15, 'Andries090', 'elwin123', 'andries@live.nl'),
(16, 'qweqwe', 'sha1qweqwe', 'qweqwe'),
(17, 'test', 'andriesknevel', 'asdasd@live.nl'),
(18, 'Elleboogje', 'test', 'elleboogje@live.nl'),
(19, 'sander', 'sander123', 'sanderelderman@live.nl'),
(20, 'bananen', '9fc3aa39b9c720afaf08f6ab4d4d95ac073c0097', 'bananen@live.nl'),
(21, 'welkom', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'welkom@live.nl'),
(22, 'basanninga', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'bas@live.nl'),
(23, 'johanstr', '3a1d6438615510bfed5fe69d5876416c886ef8bf', 'johan@live.nl'),
(24, 'Elwin090', '3d1e357635bb33310f31d1c79c1255705fc8d0e7', 'elwindejonge@hotmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
