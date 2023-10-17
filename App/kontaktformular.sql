-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Okt 2023 um 09:46
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kontaktformular`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messe_besuchern`
--

 --CREATE TABLE `messe_besuchern` (
--  `Id` int(10) NOT NULL,
--  `Name` char(255) NOT NULL,
--  `Vorname` char(255) NOT NULL,
--  `Straße` char(255) NOT NULL,
--  `PLZ` int(10) NOT NULL,
--  `Ort` char(255) NOT NULL,
--  `Kundennummer AA/Jobcenter` char(255) NOT NULL,
--  `Geburtsdatum` date NOT NULL,
--  `Telefon` char(255) NOT NULL,
--  `Mobil` char(255) NOT NULL,
--  `E-Mail` char(255) NOT NULL,
--  `Berufliche Qualifikation` char(255) NOT NULL,
--  `Berufliche Tätigkeiten` varchar(500) NOT NULL,
--  `Gewünschte Weiterbildungsrichtung` varchar(500) NOT NULL,
--  `Gewünschte Starttermin/ Umfang` date NOT NULL,
--  `Zustellung des Angebots` char(255) NOT NULL,
--  `Vereinbarter Beratungstermin` date NOT NULL,
--  `Datenschutz` tinyint(1) NOT NULL
--) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

Drop Table messe_besuchern;
Create Table messe_besuchern (
   Id int(10) NOT NULL AUTO_INCREMENT,
   Name varchar(255) NOT NULL,
   Vorname varchar(255) NOT NULL,
   Strasse varchar(255),
   PLZ varchar(10),
   Ort varchar(255),
   Kundennummer varchar(255),
   Geburtsdatum date,
   Telefon varchar(255),
   Mobil varchar(255),
   EMail  varchar(255),
   BeruflicheQualifikation varchar(255),
   BeruflicheTaetigkeiten varchar(500),
   GewuenschteWeiterbildungsrichtung varchar(500) NOT NULL,
   GewuenschteStarttermin date ,
   ZustellungdesAngebots varchar(255),
   VereinbarterBeratungstermin date,
   Datenschutz tinyint(1) NOT NULL
) ;
Drop Table messe_besuchern;
Create Table messe_besuchern (
   Id int(10) NOT NULL AUTO_INCREMENT,
   Name varchar(255) NOT NULL,
   Vorname varchar(255) NOT NULL,
   Strasse varchar(255),
   PLZ varchar(10),
   Ort varchar(255),
   Kundennummer varchar(255),
   Geburtsdatum date,
   Telefon varchar(255),
   Mobil varchar(255),
   EMail  varchar(255),
   BeruflicheQualifikation varchar(255),
   BeruflicheTaetigkeiten varchar(500),
   GewuenschteWeiterbildungsrichtung varchar(500) NOT NULL,
   GewuenschteStarttermin date ,
   ZustellungdesAngebots varchar(255),
   VereinbarterBeratungstermin date,
   Datenschutz tinyint(1) NOT NULL
) ;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teem_besuchern`
--

CREATE TABLE `teem_besuchern` (
  `ID-TB` int(15) NOT NULL,
  `Id` int(11) NOT NULL,
  `Id_Mitarbeiter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teem_robotron`
--

CREATE TABLE `teem_robotron` (
  `Id_Mitarbeiter` int(10) NOT NULL,
  `Name` char(25) NOT NULL,
  `Vorname` char(25) NOT NULL,
  `Stelle` char(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `passwort` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE teem_robotron;
CREATE TABLE team_robotron(
Id_Mitarbeiter int (10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
Name varchar (255),
Vorname varchar (255),
Stelle varchar (255),
Email varchar (255) NOT NULL,
Passwort varchar (255) NOT NULL
);

INSERT INTO team_robotron (Id_Mitarbeiter, Name, Vorname, Stelle, Email, Passwort) VALUES 
(1, 'Eisenzimmer', 'Sasha', 'Entwicklerin', 'Olexa.eisenzimmer@gm', '80977172977S');
--
-- Daten für Tabelle `teem_robotron`
--

INSERT INTO `teem_robotron` (`Id_Mitarbeiter`, `Name`, `Vorname`, `Stelle`, `email`, `passwort`) VALUES
(6, 'Eis', 'Sasha', 'Entwicklerin', 'Olexa.eisenzimmer@gm', '80977172977S$'),
(7, 'Lamberger', 'David', 'Rabinner', 'david.lamberger@gmai', '123456789D$'),
(10, 'Roleder', 'Maria', 'Kauffrau', 'maria.roleder@gmail.', '123456789M$');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `messe_besuchern`
--
ALTER TABLE `messe_besuchern`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `teem_besuchern`
--
ALTER TABLE `teem_besuchern`
  ADD PRIMARY KEY (`ID-TB`);

--
-- Indizes für die Tabelle `teem_robotron`
--
ALTER TABLE `teem_robotron`
  ADD PRIMARY KEY (`Id_Mitarbeiter`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `messe_besuchern`
--
ALTER TABLE `messe_besuchern`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `teem_besuchern`
--
ALTER TABLE `teem_besuchern`
  MODIFY `ID-TB` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `teem_robotron`
--
ALTER TABLE `teem_robotron`
  MODIFY `Id_Mitarbeiter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
