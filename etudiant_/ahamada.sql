-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2018 at 03:24 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahamada`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE `etudiants` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(30) NOT NULL,
  `PRENOM` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `AGE` int(11) NOT NULL,
  `PHOTO` varchar(50) DEFAULT NULL,
  `PROGRAMME` varchar(50) NOT NULL,
  `FORMATION` varchar(20) NOT NULL,
  `COMMENTAIRE` text,
  `SEX` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`ID`, `NOM`, `PRENOM`, `EMAIL`, `PASSWORD`, `AGE`, `PHOTO`, `PROGRAMME`, `FORMATION`, `COMMENTAIRE`, `SEX`) VALUES
(1, 'Dzhingarova', 'Nikoleta', 'n.dzhingarova@gmail.com', 'niki123', 32, NULL, '420-935-RO', 'Formation reguliere', 'My comment', 'female'),
(2, 'Tsvetkova', 'Teodora', 'tedi@abv.bg', 'tedi123', 28, NULL, '201-043-RO', 'Formation reguliere', 'Another comment', 'female'),
(3, 'Tsvetkova', 'Teodora', 'tedi@abv.bg', 'tedi123', 28, NULL, '201-043-RO', 'Formation reguliere', 'Another comment', 'female'),
(4, 'Inscriptiom', 'Chrome', 'inscrption@chrome.ie', 'chrome123', 12, NULL, '420-B56-RO', 'Formation continue', 'Commentaire 3', 'female'),
(5, 'Inscriptiom', 'Chrome', 'inscrption@chrome.ie', 'chrome123', 12, NULL, '420-B56-RO', 'Formation continue', 'Commentaire 3', 'female'),
(6, 'Inscription', 'IE', 'inscription@ie.ie', 'ie123', 0, NULL, '420-AQ6-RO', 'Formation reguliere', 'On a appris beaucoup', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
