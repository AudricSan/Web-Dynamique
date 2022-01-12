-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 12 jan. 2022 à 14:41
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
