-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 24 jan. 2022 à 13:45
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
-- Base de données : `e-shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_Login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Admin_Password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Login`, `Admin_Password`) VALUES
(5, 'TestOne', '$*95#e!f4dGm78S^');

-- --------------------------------------------------------

--
-- Structure de la table `available`
--

DROP TABLE IF EXISTS `available`;
CREATE TABLE IF NOT EXISTS `available` (
  `Available_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Available_Available` tinyint(1) DEFAULT NULL,
  `Available_SizeID` int(11) DEFAULT NULL,
  `Available_TshirtID` int(11) NOT NULL,
  `Available_ColorID` int(11) NOT NULL,
  PRIMARY KEY (`Available_ID`),
  KEY `Available_SizeID` (`Available_SizeID`),
  KEY `Available_TshirtID` (`Available_TshirtID`),
  KEY `Available_ColorID` (`Available_ColorID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`) VALUES
(1, 'T-shirt'),
(2, 'Hoodies');

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `Cities_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cities_Name` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cities_Code` int(11) DEFAULT NULL,
  PRIMARY KEY (`Cities_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `Color_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Color_Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Color_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Commande_ID` int(11) NOT NULL AUTO_INCREMENT,
  `commande_UserID` int(11) NOT NULL,
  `commande_AvailableID` int(11) NOT NULL,
  PRIMARY KEY (`Commande_ID`),
  KEY `commande_UserID` (`commande_UserID`),
  KEY `commande_AvailableID` (`commande_AvailableID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `Items_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Items_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Items_Description` mediumtext COLLATE utf8_unicode_ci,
  `Items_CategoryID` int(11) DEFAULT NULL,
  `Items_Price` int(11) DEFAULT NULL,
  `Items_IMG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Items_ID`),
  KEY `Tshirt_TypeID` (`Items_CategoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`Items_ID`, `Items_Name`, `Items_Description`, `Items_CategoryID`, `Items_Price`, `Items_IMG`) VALUES
(1, 'M. Anderson', 'Un tshirt de Loli', 1, 30, '005.png'),
(2, 'windows one', 'T-shirt mouillÃ©', 1, 14, '009.png'),
(3, 'El Basico', 'T-Shirt Blanc', 1, 900, '003.png'),
(4, 'Noyeux Joel', 'un hoodies de nowel', 2, 60, '004.png'),
(5, 'el Classico', 'un pull de couleur Bleu', 2, 30, '002.png'),
(6, 'un pull mouch', 'un pull avec le tete de XafiÃ©', 2, 1, '001.png'),
(10, 'une petite bierre', 't-shirt pour geek', 1, 56, '0 (1).jpg'),
(11, 'Tout travail mÃ©rite salaire', 't-shirt humoristique', 1, 36, '0 (1).png'),
(12, 'Un peu goore non?', 'sweet de la mort qui tue', 2, 29, '0 (2).jpg'),
(13, 'Tout est sous controle', 'sweet a capuche', 1, 105, '0 (2).png'),
(14, 'On est plusieurs dans ma tÃªte', 't-shirt pour geek', 1, 25, '0 (3).jpg'),
(15, 'Tu ferais mieux...', 't-shirt humoristique', 1, 35, '0 (3).png'),
(16, 'ca use le tapis', 't-shirt humoristique', 2, 35, '0 (4).jpg'),
(17, 'Il a quoi le chef?', 't-shirt humoristique', 1, 36, '0 (5).jpg'),
(18, 'quand on a des problemes de vues', 't-shirt pour geek', 1, 61, '0 (6).jpg'),
(19, 'Controle technique', 't-shirt humoristique', 1, 26, '0 (7).jpg'),
(20, 'En chantier', 't-shirt humoristique', 2, 44, '0 (8).jpg'),
(21, 'Les tontons flingueurs', 't-shirt humoristique', 1, 49, '0 (9).jpg'),
(22, 'Le hibou', 't-shirt humoristique', 2, 35, '0 (10).jpg'),
(23, 'J\'ai une fille magnifique', 't-shirt humoristique', 1, 52, '0 (11).jpg'),
(24, 'On peut pas recommencer?', 't-shirt humoristique', 1, 78, '0 (12).jpg'),
(25, 'Death note', 't-shirt pour geek', 2, 95, '0 (13).jpg'),
(26, 'Licorne', 't-shirt pour geek', 2, 76, '0 (14).jpg'),
(27, 'Je m\'en fous', 't-shirt humoristique', 2, 57, '0 (15).jpg'),
(28, 'Ne pas lire', 't-shirt humoristique', 2, 75, '0 (16).jpg'),
(29, 'Papa Maman', 't-shirt pour geek', 2, 64, '0 (17).jpg'),
(30, 'Parfois... et puis...', 't-shirt humoristique', 1, 77, '0 (18).jpg'),
(31, 'Perfection', 't-shirt pour geek', 2, 90, '0 (19).jpg'),
(32, 'ca souleve plus de bierre', 't-shirt humoristique', 1, 59, '0 (20).jpg'),
(33, 'La retraite...', 't-shirt humoristique', 2, 74, '0 (21).jpg'),
(34, 'je ronronne', 't-shirt pour geek', 1, 89, '0 (22).jpg'),
(35, 'Sluurrp', 't-shirt pour geek', 2, 76, '0 (23).jpg'),
(36, 'Soit je me leve tot, soit ...', 't-shirt humoristique', 1, 159, '0 (24).jpg'),
(37, 'ZEN', 't-shirt humoristique', 2, 780, '0 (25).jpg'),
(38, 'Laisse moi dormir', 't-shirt humoristique', 2, 58, '11.png');

-- --------------------------------------------------------

--
-- Structure de la table `postadress`
--

DROP TABLE IF EXISTS `postadress`;
CREATE TABLE IF NOT EXISTS `postadress` (
  `PA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PA_Cities` int(11) DEFAULT NULL,
  `PA_Number` int(11) DEFAULT NULL,
  `PA_Road` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PA_ID`),
  KEY `PA_Cities` (`PA_Cities`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `Size_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Size_Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Size_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_FirstName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Bday` date DEFAULT NULL,
  `User_Mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_PA_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `User_PA_ID` (`User_PA_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`User_ID`, `User_Login`, `User_Password`, `User_Name`, `User_FirstName`, `User_Bday`, `User_Mail`, `User_PA_ID`) VALUES
(2, 'a', 'a', 'a', 'a', '2022-01-12', 'a', 0),
(3, 'Bili', '$*95#e!f4dGm78S^', 'Eliot', 'bili', '2022-01-19', 'bili@gmail.com', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
