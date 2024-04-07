-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 07 avr. 2024 à 15:46
-- Version du serveur : 8.2.0
-- Version de PHP : 8.3.0

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
  `lacs` tinyint(1) NOT NULL,
  `animaux` tinyint(1) NOT NULL,
  `baignoire` tinyint(1) NOT NULL,
  `cuisine` tinyint(1) NOT NULL,
  `destinationextID` int NOT NULL,
  PRIMARY KEY (`logementID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `logements`
--

INSERT INTO `logements` (`logementID`, `nom_logement`, `type`, `description`, `image`, `prix_par_nuit`, `capacite`, `wifi`, `vue`, `lacs`, `animaux`, `baignoire`, `cuisine`, `destinationextID`) VALUES
(1, 'Villa Phenicia', 'maison', 'Belle maison familiale parfaitement équipée, lumineuse, plein sud, calme et proche de la forêt à 10\' à pied du RER C (Tour Eiffel & Château de Versailles en 20\'). Notre maison vous séduira à la fois par son intérieur très agréable et son extérieur aménagé avec un bar extérieur ainsi qu\'une grande terrasse pour de belles soirées d\'été.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 210, 8, 0, 1, 1, 1, 0, 0, 1),
(2, 'Villa Belle Vue', 'appartement', 'Belle maison familiale parfaitement équipée, lumineuse, plein sud, calme et proche de la forêt à 10\' à pied du RER C (Tour Eiffel & Château de Versailles en 20\'). Notre maison vous séduira à la fois par son intérieur très agréable et son extérieur aménagé avec un bar extérieur ainsi qu\'une grande terrasse pour de belles soirées d\'été.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 90, 2, 0, 1, 0, 0, 0, 0, 1),
(3, 'Maison Pere Castor', 'maison_hotes', 'Belle maison familiale parfaitement équipée, lumineuse, plein sud, calme et proche de la forêt à 10\' à pied du RER C (Tour Eiffel & Château de Versailles en 20\'). Notre maison vous séduira à la fois par son intérieur très agréable et son extérieur aménagé avec un bar extérieur ainsi qu\'une grande terrasse pour de belles soirées d\'été.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 190, 9, 1, 1, 1, 1, 1, 1, 2),
(4, 'Villa Tropicale', 'maison', 'Une villa exotique avec vue sur la plage.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 300, 6, 1, 1, 0, 1, 1, 1, 1),
(5, 'Appartement de Luxe', 'appartement', 'Un appartement moderne au cœur de la ville.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 150, 4, 1, 1, 0, 0, 0, 1, 2),
(6, 'Chalet Montagnard', 'chalet', 'Un chalet rustique niché au sommet des montagnes.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 250, 8, 1, 1, 1, 1, 1, 1, 3),
(7, 'Maison de Charme', 'maison', 'Une charmante maison traditionnelle avec jardin.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 200, 5, 1, 1, 0, 1, 0, 1, 4),
(8, 'Appartement Citadin', 'appartement', 'Un appartement confortable en plein centre-ville.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 120, 3, 1, 0, 0, 0, 0, 1, 5),
(9, 'Maison d\'Hôtes Paisible', 'maison_hotes', 'Une maison d\'hôtes paisible entourée de nature.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 180, 7, 1, 1, 1, 0, 1, 1, 1),
(10, 'Chalet en Bord de Lac', 'chalet', 'Un chalet pittoresque offrant une vue imprenable sur le lac.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 280, 6, 1, 1, 1, 0, 1, 1, 2),
(11, 'Appartement Cosy', 'appartement', 'Un appartement confortable et chaleureux.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 100, 2, 1, 0, 0, 0, 0, 1, 3),
(12, 'Maison Moderne', 'maison', 'Une maison moderne avec piscine privée.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 220, 6, 1, 1, 0, 1, 1, 1, 4),
(13, 'Chalet en Forêt', 'chalet', 'Un chalet isolé au cœur de la forêt.', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', 270, 4, 1, 1, 0, 1, 0, 1, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`reservationID`, `logementID`, `nom`, `prenom`, `email`, `tel`, `date_debut`, `date_fin`, `nb_personnes`) VALUES
(2, 2, 'amel', 'karim', 'karim@gmail.com', '0723838283', '2024-05-09', '2024-08-08', 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
