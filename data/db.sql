-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Apr 2018 um 14:22
-- Server-Version: 10.1.9-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `meinbuecherregal`
--
CREATE DATABASE IF NOT EXISTS `meinbuecherregal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `meinbuecherregal`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

CREATE TABLE `genre` (
  `gid` int(11) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `Beschreibung` varchar(250) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `email` varchar(75) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `passwort` varchar(255) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_genre_buch`
--

CREATE TABLE `user_genre_buch` (
  `ugID` int(10000) NOT NULL,
  `gid` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `bID` int(100) NOT NULL,
  `bildname` varchar(100) DEFAULT NULL,
  `titel` varchar(75) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `veroeffentlicht` varchar(10) DEFAULT NULL,
  `pers_zmsf` varchar(1000) NOT NULL
);
--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`gid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `nickname_unique` (`nickname`);

--
-- Indizes für die Tabelle `user_genre_buch`
--
ALTER TABLE `user_genre_buch`
  ADD PRIMARY KEY (`ugID`),
  ADD KEY `uid` (`uid`),
  ADD KEY `gid` (`gid`),
  ADD KEY `bID` (`bID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `genre`
--
ALTER TABLE `genre`
  MODIFY `gid` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user_genre_buch`
--
ALTER TABLE `user_genre_buch`
  MODIFY `ugID` int(100) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `user_genre_buch`
--
ALTER TABLE `user_genre_buch`
  ADD CONSTRAINT `user_genre_buch_FK_genre` FOREIGN KEY (`gid`) REFERENCES `genre` (`gid`),
  ADD CONSTRAINT `user_genre_buch_FK_user` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;