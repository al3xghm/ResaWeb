-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 28 avr. 2024 à 00:11
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `resaweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE IF NOT EXISTS `destinations` (
  `destinationID` int NOT NULL AUTO_INCREMENT,
  `nom_destination` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `continent` enum('Amérique du Sud','Amérique du Nord','Europe','Asie','Afrique','Océanie') NOT NULL,
  PRIMARY KEY (`destinationID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`destinationID`, `nom_destination`, `pays`, `continent`) VALUES
(1, 'Djerba', 'Tunisie', 'Afrique'),
(2, 'Paris', 'France', 'Europe'),
(3, 'Rio de Janeiro', 'Brésil', 'Amérique du Sud'),
(4, 'New York', 'États-Unis', 'Amérique du Nord'),
(5, 'Barcelone', 'Espagne', 'Europe'),
(6, 'Bangkok', 'Thaïlande', 'Asie'),
(7, 'Sydney', 'Australie', 'Océanie');

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

DROP TABLE IF EXISTS `logements`;
CREATE TABLE IF NOT EXISTS `logements` (
  `logementID` int NOT NULL AUTO_INCREMENT,
  `nom_logement` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `prix_par_nuit` decimal(10,0) NOT NULL,
  `capacite` int NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `vue` tinyint(1) NOT NULL,
  `montagne` tinyint(1) NOT NULL,
  `lacs` tinyint(1) NOT NULL,
  `mer` tinyint(1) NOT NULL,
  `animaux` tinyint(1) NOT NULL,
  `baignoire` tinyint(1) NOT NULL,
  `cuisine` tinyint(1) NOT NULL,
  `coord` varchar(255) NOT NULL,
  `destinationextID` int NOT NULL,
  PRIMARY KEY (`logementID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `logements`
--

INSERT INTO `logements` (`logementID`, `nom_logement`, `type`, `description`, `image`, `prix_par_nuit`, `capacite`, `wifi`, `vue`, `montagne`, `lacs`, `mer`, `animaux`, `baignoire`, `cuisine`, `coord`, `destinationextID`) VALUES
(1, 'Villa Phenicia', 'villa', 'Belle maison familiale parfaitement équipée, lumineuse, plein sud, calme et proche de la forêt à 10\' à pied du RER C (Tour Eiffel & Château de Versailles en 20\'). Notre maison vous séduira à la fois par son intérieur très agréable et son extérieur aménagé avec un bar extérieur ainsi qu\'une grande terrasse pour de belles soirées d\'été.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 210, 8, 0, 1, 0, 1, 1, 1, 1, 0, '48.8629, 2.5921', 1),
(2, 'Villa Belle Vue', 'appartement', 'Belle maison familiale parfaitement équipée, lumineuse, plein sud, calme et proche de la forêt à 10\' à pied du RER C (Tour Eiffel & Château de Versailles en 20\'). Notre maison vous séduira à la fois par son intérieur très agréable et son extérieur aménagé avec un bar extérieur ainsi qu\'une grande terrasse pour de belles soirées d\'été.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 90, 2, 0, 1, 0, 0, 0, 0, 0, 0, '49.1182,2.4438', 1),
(3, 'Maison Pere Castor', 'maison_hotes', 'Belle maison familiale parfaitement équipée, lumineuse, plein sud, calme et proche de la forêt à 10\' à pied du RER C (Tour Eiffel & Château de Versailles en 20\'). Notre maison vous séduira à la fois par son intérieur très agréable et son extérieur aménagé avec un bar extérieur ainsi qu\'une grande terrasse pour de belles soirées d\'été.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 190, 9, 1, 1, 0, 1, 0, 1, 1, 1, '', 2),
(4, 'Villa Tropicale', 'maison', 'Une villa exotique avec vue sur la plage.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 300, 6, 1, 1, 0, 0, 0, 1, 1, 1, '', 1),
(5, 'Appartement de Luxe', 'appartement', 'Un appartement moderne au cœur de la ville.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 150, 4, 1, 1, 0, 0, 0, 0, 0, 1, '', 2),
(6, 'Chalet Montagnard', 'chalet', 'Un chalet rustique niché au sommet des montagnes.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 250, 8, 1, 1, 1, 1, 0, 1, 1, 0, '', 3),
(7, 'Maison de Charme', 'maison', 'Une charmante maison traditionnelle avec jardin.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 200, 5, 1, 1, 0, 0, 0, 1, 0, 1, '54.750,9.294', 4),
(8, 'Appartement Citadin', 'appartement', 'Un appartement confortable en plein centre-ville.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 120, 3, 1, 0, 0, 0, 0, 0, 0, 1, '', 5),
(9, 'Maison d\'Hôtes Paisible', 'maison_hotes', 'Une maison d\'hôtes paisible entourée de nature.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 180, 7, 1, 1, 0, 1, 0, 0, 1, 1, '', 1),
(10, 'Chalet en Bord de Lac', 'chalet', 'Un chalet pittoresque offrant une vue imprenable sur le lac.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 280, 6, 1, 1, 0, 1, 0, 0, 1, 1, '49.1182,2.4438', 2),
(11, 'Appartement Cosy', 'appartement', 'Un appartement confortable et chaleureux.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 100, 2, 1, 0, 0, 0, 0, 0, 0, 1, '', 3),
(12, 'Maison Moderne', 'maison', 'Une maison moderne avec piscine privée.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 220, 6, 1, 1, 0, 0, 0, 1, 1, 1, '', 4),
(13, 'Chalet en Forêt', 'chalet', 'Un chalet isolé au cœur de la forêt.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 270, 4, 1, 1, 0, 0, 0, 1, 0, 1, '', 5);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `reservationID` int NOT NULL AUTO_INCREMENT,
  `logementID` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nb_personnes` int NOT NULL,
  PRIMARY KEY (`reservationID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`reservationID`, `logementID`, `nom`, `prenom`, `email`, `tel`, `date_debut`, `date_fin`, `nb_personnes`) VALUES
(3, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(4, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(5, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(6, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(7, 13, 'pedro', 'alta²', 'pedroalta@gmail.com', '0782938271', '2024-04-06', '2024-05-04', 6),
(8, 13, 'pedro', 'alta²', 'pedroalta@gmail.com', '0782938271', '2024-04-06', '2024-05-04', 6),
(9, 13, 'pedro', 'alta²', 'pedroalta@gmail.com', '0782938271', '2024-04-06', '2024-05-04', 6),
(10, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(11, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(12, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(13, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(14, 13, 'amel', 'chabah', 'amel519@gmail.com', '0373784734', '2024-04-25', '2024-04-06', 5),
(15, 13, 'amel', 'chabah', 'amel519@gmail.com', '0373784734', '2024-04-25', '2024-04-06', 5),
(16, 13, 'amel', 'chabah', 'amel519@gmail.com', '0373784734', '2024-04-25', '2024-04-06', 5),
(17, 13, 'amel', 'chabah', 'amel519@gmail.com', '0373784734', '2024-04-25', '2024-04-06', 5),
(18, 13, 'amel', 'chabah', 'amel519@gmail.com', '0373784734', '2024-04-25', '2024-04-06', 5),
(19, 13, 'amel', 'chabah', 'amel519@gmail.com', '0373784734', '2024-04-25', '2024-04-06', 5),
(20, 13, 'amel', 'chabah', 'amel519@gmail.com', '0373784734', '2024-04-25', '2024-04-06', 5),
(21, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(22, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(23, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(24, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(25, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(26, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(27, 13, '', '', '', '', '0000-00-00', '0000-00-00', 0),
(28, 13, 'pedro', 'alta²', 'pedroalta@gmail.com', '0782938271', '2024-04-06', '2024-05-04', 6),
(29, 13, 'pedro', 'alta²', 'pedroalta@gmail.com', '0782938271', '2024-04-06', '2024-05-04', 6),
(30, 13, 'pedro', 'alta²', 'pedroalta@gmail.com', '0782938271', '2024-04-06', '2024-05-04', 6),
(31, 13, 'pedro', 'alta²', 'pedroalta@gmail.com', '0782938271', '2024-04-06', '2024-05-04', 6),
(32, 7, 'Chabah', 'Amel', 'amel519@gmail.com', '0792817231', '2024-04-12', '2024-04-19', 3),
(33, 7, 'Chabah', 'Amel', 'amel519@gmail.com', '0792817231', '2024-04-12', '2024-04-19', 3),
(34, 7, 'amel', 'Amel', 'pedroalta@gmail.com', '0373784734', '2024-04-16', '2024-04-17', 1),
(35, 7, 'amel', 'Amel', 'pedroalta@gmail.com', '0373784734', '2024-04-16', '2024-04-17', 1),
(36, 6, 'ae', 'alta²', 'zakrek@gmail.com', '0373784734', '2024-01-02', '2024-03-06', 1),
(37, 6, 'pedro', 'amel', 'amel519@gmail.com', '0482838283', '2024-04-20', '2024-04-29', 1),
(38, 6, 'pedro', 'amel', 'amel519@gmail.com', '0482838283', '2024-04-20', '2024-04-29', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
