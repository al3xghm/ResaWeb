-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 04 mai 2024 à 18:58
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
(1, 'Rafraf', 'Tunisie', 'Afrique'),
(2, 'Paris', 'France', 'Europe'),
(3, 'Bacalar', 'Mexique', 'Amérique du Sud'),
(4, 'Santorin', 'Grèce', 'Europe'),
(5, 'Saariselkä', 'Finlande', 'Europe'),
(6, 'Bali', 'Indonésie', 'Asie'),
(7, 'Sydney', 'Australie', 'Océanie'),
(8, 'New York', 'États-Unis', 'Amérique du Nord'),
(9, 'Stalden', 'Suisse', 'Europe'),
(10, 'Tokyo', 'Japon', 'Asie'),
(11, 'Cotswolds', 'Royaume-Uni', 'Europe'),
(12, 'Marrakech', 'Maroc', 'Afrique'),
(13, 'Porto Ottiolu', 'Italie', 'Europe'),
(14, 'Costa Brava', 'Espagne', 'Europe'),
(15, 'Chamonix', 'France', 'Europe'),
(16, 'Albufeira', 'Portugal', 'Europe');

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
  `montagne` tinyint(1) NOT NULL,
  `lacs` tinyint(1) NOT NULL,
  `mer` tinyint(1) NOT NULL,
  `animaux` tinyint(1) NOT NULL,
  `baignoire` tinyint(1) NOT NULL,
  `cuisine` tinyint(1) NOT NULL,
  `coord` varchar(255) NOT NULL,
  `destinationextID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logements`
--

INSERT INTO `logements` (`logementID`, `nom_logement`, `type`, `description`, `image`, `prix_par_nuit`, `capacite`, `wifi`, `vue`, `montagne`, `lacs`, `mer`, `animaux`, `baignoire`, `cuisine`, `coord`, `destinationextID`) VALUES
(1, 'Villa Phenicia', 'villa', 'La Villa Phenicia à Raf Raf est une luxueuse résidence qui offre une vue imprenable sur l\'île Pilau, évoquant la forme d\'un bateau. Elle combine une architecture moderne avec des intérieurs spacieux et élégants, décorés dans un style contemporain avec des touches méditerranéennes. Sa grande piscine extérieure se fond avec le panorama marin, entourée d\'un espace lounge et d\'une terrasse aménagée pour la détente. Située dans un cadre tranquille, la villa permet un accès facile à des activités nautiques et des explorations locales.', 'villaphenicia1.jpg+villaphenicia2.jpg+villaphenicia3.jpeg+villaphenicia4.jpeg', '340', 6, 1, 1, 1, 0, 1, 0, 0, 0, '37.17762817726299,10.229082613401786', 1),
(2, 'Chalet Inari', 'chalet', 'Ce chalet lappish à Saariselkä offre une ambiance chaleureuse avec cheminée et sauna, idéal pour observer les aurores boréales. Parfait pour le ski, la luge et la randonnée, il propose des safaris husky à tarif réduit. Situé à 30 km de l\'aéroport d\'Ivalo, avec parking gratuit et Wi-Fi disponible.', 'inari1.jpg+inari2.jpg+inari3.jpg+inari4.jpg', '160', 4, 1, 1, 0, 1, 0, 0, 0, 1, '68.42495721070142, 27.449117303893974', 5),
(3, 'Chalet Front Palafito', 'chalet', 'Situé à Bacalar, ce refuge tranquille offre une vue spectaculaire sur la lagune depuis une cabane exclusive, soigneusement construite juste au bord de l\'eau. Les hôtes bénéficient d\'un accès gratuit à une variété d\'activités nautiques telles que le kayak, le vélo et le paddleboard, parfait pour explorer les beautés naturelles de la région. Ce lieu est spécialement conçu pour offrir une escapade romantique exceptionnelle, invitant les couples à se détendre et à se reconnecter dans un environnement naturel et paisible.', 'palafito1.jpg+palafito2.jpg+palafito3.jpg+palafito4.jpg', '172', 2, 1, 1, 0, 1, 0, 0, 1, 1, '18.746651359346988, -88.32868384039567', 3),
(4, 'Appartement Sea Esta', 'appartement', 'Ce studio élégant et confortable, récemment rénové, est situé au bord de la plage d\'Agia Paraskevi. Dans un quartier calme, loin de la foule et du bruit, c\'est un endroit parfait pour ceux qui souhaitent passer des vacances détendues et privées. Tout en offrant l\'avantage de la tranquillité, le studio se trouve également à seulement 10-15 minutes à pied du quartier de Kamari qui dispose d\'une multitude de restaurants, de cafés ainsi que d\'autres magasins.', 'seaesta1.jpg+seaesta2.jpg+seaesta3.jpg+seaesta4.jpg', '95', 3, 1, 1, 0, 1, 0, 1, 0, 0, '36.45034016840436, 25.441200736885026', 4),
(5, 'Appartement Le Donatien', 'appartement', 'Appartement de 34 m2 à 20min des Champs-Elysées. Très lumineux, deux grandes pièces au 3eme étage d’un immeuble Haussmannien. Pas de vis à vis. Calme. Cuisine ouverte et sa table bar, grande chambre avec son dressing et lit deux places. Machine à café Nespresso, machine à laver.\nA 15 min à pied du quartier et gare Montparnasse. Metro Convention (ligne 12) ou Plaisance (ligne 13) ou bus 95 en direction de Montmartre, Opéra.', 't2haussmanien1.jpg+t2haussmanien2.jpg+t2haussmanien3.jpg+t2haussmanien4.jpg', '145', 4, 1, 0, 0, 0, 0, 1, 1, 1, '48.83405916215754, 2.2995941082786504', 2),
(6, 'Villa Flow House', 'villa', 'Conçu par Alexandre Ghmir et construit comme une résidence pour les artistes, Flow House est un lieu inspirant, avec une vue inspirante sur les rizières dans un quartier paisible de Mas, Ubud.\nC\'est un séjour de luxe avec toutes les commodités associées : notre concierge dédié peut fournir un chef privé, un chauffeur, des massages, une moto, des réservations, des cours de yoga privés, une blanchisserie, un baby-sitting…\nRéveillez-vous au son des oiseaux et admirez le lever du soleil à seulement 15 minutes du centre d\'Ubud.', 'flowhouse1.jpg+flowhouse2.jpg+flowhouse3.jpg+flowhouse4.jpg', '695', 6, 1, 1, 0, 0, 0, 1, 1, 0, '-8.373655293880645, 115.03633144641701', 6),
(7, 'Appartement Dynasty', 'appartement', 'L\'appartement Dynasty, d\'une superficie de 125m carrés, est équipée d\'un lit queen et d\'un petit bureau. Située entre les 8e et 10e étages, elle offre une vue sur la ville. Il est important de noter que toutes les photos présentées sont à titre illustratif uniquement. La disposition réelle de la chambre, ainsi que l\'emplacement des fenêtres et la vue, peuvent varier selon leur position dans l\'établissement.', 'dynasty1.jpg+dynasty2.jpg+dynasty3.jpg+dynasty4.jpg', '245', 2, 1, 1, 0, 0, 0, 1, 0, 1, '40.72367498103114, -73.98640715582036', 8),
(8, 'Chalet Luciano', 'chalet', 'Magnifique chalet avec une vue magnifique sur le glacier et le lac au coeur de la Suisse. Grand salon-salle à manger avec cheminée. Le bois est inclus. Chambre avec grand lit et placards. Chambre séparée. Superbe balcon avec mobilier lounge, hamac.\nJeux de société pour petits et grands. Table de ping-pong derrière la maison.\nParadis de ski de fond et de randonnée Langis en voiture ou en car postal à 7 minutes. ', 'stalden1.jpg+stalden2.jpg+stalden3.jpg+stalden4.jpg', '215', 4, 1, 1, 1, 0, 0, 0, 0, 1, '46.20718199051467, 7.884056640054834', 9),
(9, 'Appartement Asakusa', 'appartement', 'Toutes les pièces sont équipées d\'une cuisine et d\'un lave-linge, afin que vous puissiez vous détendre comme si vous étiez à la maison.\nIl y a de nombreuses attractions touristiques dans les environs, telles que le temple d\'Asakusa et Tokyo Skytree, toutes accessibles à pied.\nC\'est un appartement où vous pouvez passer un agréable moment avec vos proches.', 'asakusa1.jpg+asakusa2.jpg+asakusa3.jpg+asakusa4.jpg', '315', 4, 1, 1, 0, 0, 0, 0, 1, 1, '35.716101988894955, 139.80082327732168', 10),
(10, 'Chalet Valley View', 'chalet', 'Valley View est situé dans une petite exploitation de 42 acres, les Cotswolds.\n\nAbritant de nombreux animaux, dont un poney d\'un an appelé Mio.\n\nC\'est un endroit fantastique pour profiter de certains des meilleurs paysages des Cotswolds.\n\nLes villes voisines comprennent le trio étoile des Cotswolds du nord, Moreton in Marsh, Bourton on the Water, Stow on the Wold.\n\nNous avons des itinéraires pédestres et des brides dans toutes les directions. Nous espérons vous accueillir bientôt !', 'valleyview1.jpg+valleyview2.jpg+valleyview3.jpg+valleyview4.jpg', '195', 2, 1, 1, 0, 0, 0, 1, 0, 1, '51.790888612646874, -1.874963915775276', 11),
(11, 'Appartement Dymos', 'appartement', 'L\'appartement Dymos, situé au cœur du quartier des affaires de Sydney, combine élégance et fonctionnalité sur 22 étages. Il offre une vue imprenable sur le quartier historique et des commodités modernes telles qu\'une piscine chauffée, un spa, un sauna, et une salle de sport. La proximité des cafés, boutiques, et attractions majeures, comme l\'Opéra de Sydney, en fait un choix idéal pour les voyageurs cherchant confort et accessibilité.', 'dymos1.jpg+dymos2.jpg+dymos3.jpg+dymos4.jpg', '295', 4, 1, 1, 0, 0, 0, 0, 1, 1, '-33.86947386367206, 151.20635068348147', 7),
(12, 'Villa Hassan II', 'villa', 'Niché au coeur d\'un domaine sécurisé de 11 hectares, découvrez cette authentique Villa signée par le célèbre architecte Charles Boccara avec un jardin luxuriant offrant une vue époustouflante sur les majestueuses montagnes de l\'Atlas et disposant d\'une piscine à débordement de 17 mètres de long. Durant votre séjour, vous pourrez profiter du service sur place pour la préparation de vos repas et l’entretien des lieux.', 'hassan1.jpg+hassan2.jpg+hassan3.jpg+hassan4.jpg', '595', 6, 1, 0, 0, 0, 0, 1, 1, 1, '31.609686377355, -7.935945961567355', 12),
(13, 'Villa Il Sogno', 'villa', 'Entrez dans le monde de la sérénité dans cette villa récemment reconstruite.  Le panorama à couper le souffle à 180 degrés sur la mer Méditerranée vous laissera sans voix. Imaginez vous allonger sur un transat, siroter du vin ou déguster un apéritif, entouré du parfum des plantes indigènes et caressé par la douce brise.', 'sogno1.jpg+sogno2.jpg+sogno3.jpg+sogno4.jpg', '190', 4, 1, 1, 0, 0, 1, 0, 0, 1, '40.74312664434893, 9.711200627641363', 13),
(14, 'Villa Revo', 'villa', 'Belle villa dans une endroit calme avec une belle vue sur la mer, à distance de marche d\'une plage privée. Un endroit idéal pour des vacances en famille relaxantes. La villa est situé à côté de Tossa de Mar et de Lloret de Mar.', 'revo1.jpg+revo2.jpg+revo3.jpg+revo4.jpg', '375', 6, 1, 1, 0, 0, 1, 0, 1, 1, '42.37086371424838, 3.1556598865985763', 14),
(15, 'Chalet Les Houches', 'chalet', 'Bienvenue dans ce charmant chalet d\'alpage, niché dans un cadre idyllique en bordure de forêt, offrant une vue imprenable sur le majestueux Mont Blanc. Les visiteurs seront enchantés par la tranquillité du vaste terrain et la proximité immédiate des sentiers de randonnée. Situé à seulement 5 à 10 minutes à pied du centre-ville, ce chalet est l\'endroit parfait pour ceux qui cherchent à combiner paix et accessibilité.', 'leshouches1.jpg+leshouches2.jpg+leshouches3.jpg+leshouches4.jpg', '250', 4, 0, 1, 1, 0, 0, 1, 0, 1, '45.92252092605268, 6.944652753333853', 15),
(16, 'Villa Laranjas', 'villa', 'La spacieuse villa de 220m carrés (construite en 2019) est située à Brejos da Carregueira de Cima, un petit village calme à moins de 5 minutes en voiture des plages populaires de Carvalhal et Pego.\r\n\r\nSituées dans une réserve naturelle immaculée, de merveilleuses promenades et des courses dans les pinèdes sont à seulement 50 m.\r\n\r\nCarvalhal (10 min en voiture) et Comporta (12 min) peuvent trouver les principaux services d\'épicerie, de restaurants, de cafés, de banques, de boutiques, etc. En haute saison, une épicerie est à 5 minutes à pied.', 'laranjas1.jpg+laranjas2.jpg+laranjas3.jpg+laranjas4.jpg', '660', 7, 1, 0, 0, 0, 0, 1, 1, 1, '38.32360554553502, -8.76179237844169', 16);

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
(75, 2, 'XAAAAANDER', 'XANDER', 'amelou518@gmail.com', '5165616516', '2024-05-03', '2024-05-31', 3),
(76, 2, 'XAAAAANDER', 'XANDER', 'amelou518@gmail.com', '5165616516', '2024-05-03', '2024-05-31', 3),
(77, 2, 'XAAAAANDER', 'XANDER', 'amelou518@gmail.com', '5165616516', '2024-05-03', '2024-05-31', 3),
(78, 2, 'XAAAAANDER', 'XANDER', 'amelou518@gmail.com', '5165616516', '2024-05-03', '2024-05-31', 3),
(79, 2, 'XAAAAANDER', 'XANDER', 'amelou518@gmail.com', '5165616516', '2024-05-03', '2024-05-31', 3),
(80, 2, 'mdddd', 'mdmdmd', 'amelou518@gmail.com', '0463165156', '2024-05-11', '2024-06-07', 2),
(81, 2, 'mdddd', 'mdmdmd', 'amelou518@gmail.com', '0463165156', '2024-05-11', '2024-06-07', 2),
(82, 2, 'mdddd', 'mdmdmd', 'amelou518@gmail.com', '0463165156', '2024-05-11', '2024-06-07', 2),
(83, 2, 'pepe', 'pepe', 'amelou518@gmail.com', '0156165106', '2024-05-11', '2024-06-06', 4),
(84, 2, 'pepe', 'pepe', 'amelou518@gmail.com', '0156165106', '2024-05-11', '2024-06-06', 4),
(85, 2, 'pepe', 'pepe', 'amelou518@gmail.com', '0156165106', '2024-05-11', '2024-06-06', 4),
(86, 1, 'alex', 'alex', 'fzlflflzlz@gmail.com', '3344343344', '2024-05-03', '2024-05-08', 8),
(87, 1, 'Ghmir', 'Alexandre', 'alexandre.ghmir@edu.univ-eiffel.fr', '0729929392', '2024-04-30', '2024-05-03', 2),
(88, 1, 'eieiri', 'ozeoo', 'eeiriai@gmail.com', '0394949393', '2024-04-29', '2024-04-30', 8),
(89, 1, 'pedro', 'alta', 'pedro@gmail.com', '0339399393', '2024-08-12', '2024-09-13', 2),
(90, 1, 'pedro', 'alta', 'pedro@gmail.com', '0339399393', '2024-08-12', '2024-09-13', 2),
(91, 1, 'p', 'papeao', 'paezp@gmail.com', '0393939399', '2024-09-12', '2024-09-13', 2),
(92, 1, 'oeeo', 'oezoaoeao', 'zaoeo@gmail.com', '0883939393', '2025-01-12', '2025-02-12', 2),
(93, 3, 'eozoo', 'sodfozfo', 'fgofoz@gmail.com', '0292929292', '2024-04-30', '2024-05-01', 2),
(94, 10, 'LDL', 'SLDAL', 'SDALDL@GMAIL.COM', '2029292929', '2024-06-12', '2024-06-14', 2);

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
  MODIFY `destinationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `logements`
--
ALTER TABLE `logements`
  MODIFY `logementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
