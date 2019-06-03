-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Jun 2019 um 11:29
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `neurodb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder`
--

CREATE TABLE `bilder` (
  `imid` bigint(20) NOT NULL,
  `bildklein` text,
  `bildgross` text,
  `blogid` bigint(20) DEFAULT NULL,
  `beschreibung` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bilder`
--

INSERT INTO `bilder` (`imid`, `bildklein`, `bildgross`, `blogid`, `beschreibung`) VALUES
(1, '../bilder/small6174animegirl3.jpeg', '../bilder/big6174animegirl3.jpeg', 1, 'katana');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blogeintrag`
--

CREATE TABLE `blogeintrag` (
  `blid` bigint(20) NOT NULL,
  `datum` char(10) DEFAULT NULL,
  `blogtext` varchar(300) DEFAULT NULL,
  `ersteller` text,
  `blogtitel` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `blogeintrag`
--

INSERT INTO `blogeintrag` (`blid`, `datum`, `blogtext`, `ersteller`, `blogtitel`) VALUES
(1, '10.06.2018', 'sdfsdfsdf', 'admin@admin.ch', 'dfdfd');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kommentar`
--

CREATE TABLE `kommentar` (
  `kid` bigint(20) NOT NULL,
  `kommentartext` tinytext,
  `datum` char(10) DEFAULT NULL,
  `blogid` bigint(20) DEFAULT NULL,
  `ersteller` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `likes`
--

CREATE TABLE `likes` (
  `Like_ID` bigint(20) NOT NULL,
  `idblog` bigint(20) NOT NULL,
  `liker` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`imid`),
  ADD KEY `bilder_ibfk_1` (`blogid`);

--
-- Indizes für die Tabelle `blogeintrag`
--
ALTER TABLE `blogeintrag`
  ADD PRIMARY KEY (`blid`);

--
-- Indizes für die Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD PRIMARY KEY (`kid`),
  ADD KEY `fk_kommentar` (`blogid`);

--
-- Indizes für die Tabelle `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`Like_ID`),
  ADD KEY `fk_likes_idblog` (`idblog`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `imid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `blogeintrag`
--
ALTER TABLE `blogeintrag`
  MODIFY `blid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  MODIFY `kid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `likes`
--
ALTER TABLE `likes`
  MODIFY `Like_ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD CONSTRAINT `bilder_ibfk_1` FOREIGN KEY (`blogid`) REFERENCES `blogeintrag` (`blid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD CONSTRAINT `fk_kommentar` FOREIGN KEY (`blogid`) REFERENCES `blogeintrag` (`blid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_idblog` FOREIGN KEY (`idblog`) REFERENCES `blogeintrag` (`blid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
