-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 05 avr. 2024 à 13:58
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

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

CREATE TABLE `destinations` (
  `destinationID` int(11) NOT NULL,
  `nom_destination` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `continent` enum('Amérique du Sud','Amérique du Nord','Europe','Asie','Afrique','Océanie') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`destinationID`, `nom_destination`, `pays`, `continent`) VALUES
(1, 'Djerba', 'Tunisie', 'Afrique'),
(2, 'Paris', 'France', 'Europe');

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

CREATE TABLE `logements` (
  `logementID` int(11) NOT NULL,
  `nom_logement` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `prix_par_nuit` decimal(10,0) NOT NULL,
  `capacite` int(11) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `vue` tinyint(1) NOT NULL,
  `lacs` tinyint(1) NOT NULL,
  `animaux` tinyint(1) NOT NULL,
  `baignoire` tinyint(1) NOT NULL,
  `cuisine` tinyint(1) NOT NULL,
  `destinationextID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logements`
--

INSERT INTO `logements` (`logementID`, `nom_logement`, `type`, `description`, `image`, `prix_par_nuit`, `capacite`, `wifi`, `vue`, `lacs`, `animaux`, `baignoire`, `cuisine`, `destinationextID`) VALUES
(1, 'Villa Phenicia', 'maison', 'Chaleureuse villa', 'villa4.jpg+villa2.jpg+villa3.jpg+villa5.jpg', '210', 8, 0, 1, 1, 1, 0, 0, 1),
(2, 'Villa Belle Vue', 'appartement', 'Villa moche', 'villa3.jpg', '90', 2, 0, 1, 0, 0, 0, 0, 1),
(3, 'Maison Pere Castor', 'maison_hotes', 'Belle maison familiale parfaitement équipée, lumineuse, plein sud, calme et proche de la forêt à 10\' à pied du RER C (Tour Eiffel & Château de Versailles en 20\'). Notre maison vous séduira à la fois par son intérieur très agréable et son extérieur aménagé avec un bar extérieur ainsi qu\'une grande terrasse pour de belles soirées d\'été.', 'ro-fi.jpg', '190', 9, 1, 1, 1, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `reservationID` int(11) NOT NULL,
  `logementID` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nb_personnes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`reservationID`, `logementID`, `nom`, `prenom`, `email`, `tel`, `date_debut`, `date_fin`, `nb_personnes`) VALUES
(2, 2, 'amel', 'karim', 'karim@gmail.com', '0723838283', '2024-05-09', '2024-08-08', 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destinationID`);

--
-- Index pour la table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`logementID`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destinationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `logements`
--
ALTER TABLE `logements`
  MODIFY `logementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
