-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 07 fév. 2022 à 17:39
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `demo`
--

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

DROP TABLE IF EXISTS `visite`;
CREATE TABLE IF NOT EXISTS `visite` (
  `visite_ID` int(11) NOT NULL AUTO_INCREMENT,
  `visite_Date` varchar(35) DEFAULT NULL,
  `day` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`visite_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visite`
--

INSERT INTO `visite` (`visite_ID`, `visite_Date`, `day`) VALUES
(34, 'Monday, 07-Feb-2022', 'Monday'),
(33, 'Monday, 07-Feb-2022', 'Monday'),
(32, 'Monday, 07-Feb-2022', 'Monday'),
(31, 'Monday, 07-Feb-2022', 'Monday'),
(30, 'Monday, 07-Feb-2022', 'Monday'),
(29, 'Monday, 07-Feb-2022', 'Monday'),
(28, 'Monday, 07-Feb-2022', 'Monday'),
(27, 'Monday, 07-Feb-2022', 'Monday'),
(35, 'Monday, 07-Feb-2022', 'Monday'),
(36, 'Sunday, 06-Feb-2022', 'Sunday'),
(37, 'Monday, 07-Feb-2022', 'Monday'),
(38, 'Tuesday, 08-Feb-2022', 'Tuesday'),
(39, 'Wednesday, 09-Feb-2022', 'Wednesday'),
(40, 'Wednesday, 09-Feb-2022', 'Wednesday'),
(41, 'Tuesday, 15-Feb-2022', 'Tuesday'),
(42, 'Monday, 07-Feb-2022', 'Monday'),
(43, 'Tuesday, 08-Feb-2022', 'Tuesday'),
(44, 'Wednesday, 09-Feb-2022', 'Wednesday'),
(45, 'Wednesday, 09-Feb-2022', 'Wednesday'),
(46, 'Tuesday, 15-Feb-2022', 'Tuesday');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
