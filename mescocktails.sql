-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 09 juin 2023 à 20:27
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mescocktails`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `IdAdmin` int(11) NOT NULL,
  `MailA` varchar(100) NOT NULL,
  `mdpA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `MailA`, `mdpA`) VALUES
(3, 'Jordanb.64400@gmail.com', '967520ae23e8ee14888bae72809031b98398ae4a636773e18fff917d77679334'),
(5, 'test@gmail.com', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578'),
(6, 'Nicolas@gmail.com', '967520ae23e8ee14888bae72809031b98398ae4a636773e18fff917d77679334'),
(7, 'Manon@gmail.com', '967520ae23e8ee14888bae72809031b98398ae4a636773e18fff917d77679334');

-- --------------------------------------------------------

--
-- Structure de la table `bouteilles`
--

CREATE TABLE `bouteilles` (
  `ID_B` int(11) NOT NULL,
  `NomBouteille` varchar(100) NOT NULL,
  `ImgBouteille` varchar(255) NOT NULL,
  `Prix` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `bouteilles`
--

INSERT INTO `bouteilles` (`ID_B`, `NomBouteille`, `ImgBouteille`, `Prix`) VALUES
(1, 'Le Rêveur', 'Bouteille_Spritz.jpg', '24'),
(2, 'Jamaïcan Punch', 'Bouteille_Amaretosour.jpg', '28'),
(3, 'O\'Captain', 'Bouteille_Cloverclub.jpg', '29'),
(4, 'Méchant Loup', 'Bouteille_Mojito2.jpg', '24'),
(5, 'Le voyageur', 'Bouteille_caipirinha.jpg', '28'),
(30, 'fsefes', 'fsefes', '85'),
(33, 'dzqdqz', 'dqzdzq', '48');

-- --------------------------------------------------------

--
-- Structure de la table `cocktails`
--

CREATE TABLE `cocktails` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(150) NOT NULL,
  `Images` varchar(255) NOT NULL,
  `Descriptions` varchar(1000) NOT NULL,
  `Ingredients` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `cocktails`
--

INSERT INTO `cocktails` (`ID`, `Nom`, `Images`, `Descriptions`, `Ingredients`) VALUES
(1, 'Le Spritz', 'Spritz.jpg', 'Le Spritz Veneziano est une recette originale apparue,\r\ncomme le Bellini, dans la région de Venise,\r\npendant la domination autrichienne. Les soldats avaient pour habitude de mélanger du vin blanc avec de l’eau gazeuse. Aujourd’hui,\r\nla recette du Spritz est un mélange de vin blanc pétillant type prosecco, eau de Seltz ou Schweppes Tonic Original et Aperol ou Campari.\r\nEt le verre du Spritz est généralement un grand verre à vin.', '12 cl d’Aperol\r\n24 cl de Prosecco\r\n4 cl d’eau pétillante\r\n2 tranches d’orange non traitée\r\n'),
(2, 'L\'Amareto Sour', 'Amaretosour.jpg', 'Le cocktail Amaretto sour fait partie comme son nom l\'indique de la famille des \"sours\"\r\nintroduit par Jerry Thomas en 1862 et qui consiste à mélanger un spiritueux avec du citron et du sucre,\r\nrendant les cocktails acides et doux à la fois.', '5 cl Amaretto.\r\n2,5 cl Jus de citron.\r\n1 blanc d’œuf.\r\n3 gouttes Angostura bitters.\r\nGlaçons.'),
(3, 'Cloverclub', 'Cloverclub.jpg', 'Le Clover Club est un cocktail inventé vers 1911, dans un club du même nom à Philadelphie.\r\nC\'est dans cet endroit réservé aux hommes businessmen, avocats et journalistes,\r\nque le jeune barman Ambrose Burnside Lincoln Hoffman aurait eu l\'idée de ce cocktail à base de gin..', 'Gin 15 cl\r\nVermouth sec 1,5 cl\r\nJus de citron jaune 2,5 cl\r\nSirop de framboise 1,5 cl\r\nBlanc d\'oeuf 1,5 cl\r\nFramboises 3'),
(4, 'Le Mojito', 'Mojito2.jpg', 'Le mojito est le cocktail le plus consommé en France.\r\nIl suffit de jeter un œil aux terrasses des bars, en été, pour réaliser que cette boisson compte de nombreux adeptes de tout âge.\r\nComposé de rhum, d’eau gazeuse, de citron et de feuilles de menthe,\r\nle mojito est une boisson incontournable et rafraîchissante.', '4 cl de rhum blanc.\r\n2 cl de sirop de sucre de canne.\r\n6 feuilles de menthe.\r\n½ citron vert.\r\nEau gazeuse.'),
(5, 'Caipirinha', 'caipirinha.jpg', 'Le cocktail caipirinha remonterait aux environs de 1750 et aurait commencé à être consommé par des officiers de la marine anglo-saxonne.\r\nÀ cette époque, la malaria et le scorbut faisaient des ravages,\r\nles officiers auraient décidé d\'ajouter au gin du tonic et du citron pour leurs vertus. Le mélange était magique,\r\nle tonic à base de quinine aidait à lutter contre la malaria, le citron aidait à lutter contre le scorbut, tandis que l\'alcool préservait la vitamine C.', '12 cl de cachaça Aguacana\r\n4 cl de sirop de canne Canadou\r\n1 citron vert frais\r\nglace pilée'),
(30, 'testreto', 'sdfsq', 'fsefsfes', 'efsf'),
(33, 'ddzqdq', 'dzqdq', 'dzqdqz', 'dzqdqz');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `Id_commande` int(11) NOT NULL,
  `Numero_Commande` int(255) NOT NULL,
  `utilisateurs_ID` int(255) NOT NULL,
  `Bouteille_ID` int(255) NOT NULL,
  `Quantité` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`Id_commande`, `Numero_Commande`, `utilisateurs_ID`, `Bouteille_ID`, `Quantité`) VALUES
(1, 2, 5, 5, 0),
(2, 3, 8, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `IdUser_C` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Mail_C` varchar(100) NOT NULL,
  `Nom_C` varchar(100) NOT NULL,
  `Message_C` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`IdUser_C`, `Date`, `Mail_C`, `Nom_C`, `Message_C`) VALUES
(19, '2023-05-27 00:00:00', 'dqzdq@gmail.com', 'dzqdq', 'dzqdqdqz'),
(20, '2023-05-27 00:00:00', 'dqzdq@gmail.com', 'dqzdq', 'dzqdqz'),
(21, '2023-05-27 00:00:00', 'dqzdq@gmail.com', 'dqzdq', 'dqzdqzdq'),
(22, '2023-05-27 00:00:00', 'jordanb.64400@gmail.com', 'dqzdq', 'dqzdzqdq'),
(23, '2023-05-27 00:00:00', 'jordanb.64400@gmail.com', 'dqzdq', 'dqzdqzdqz'),
(24, '2023-05-27 00:00:00', 'dqzdq@gmail.com', 'dqzdq', 'dqzdzqd'),
(25, '2023-05-27 00:00:00', 'dqzdq@gmail.com', 'dqzdq', 'dqdq'),
(26, '2023-05-27 00:00:00', 'dqzdq@gmail.com', 'dqzdq', 'dqdqz'),
(27, '2023-05-27 00:00:00', 'dqzdq@gmail.com', 'dqzdq', 'dqzdqz'),
(29, '0000-00-00 00:00:00', 'jordanb.64400@gmail.com', 'testreto', 'motdepasse'),
(30, '0000-00-00 00:00:00', 'jordanb.64400@gmail.com', 'Jordan Berot', 'zdqdoizhqohdqz'),
(31, '2023-05-27 11:39:33', 'jordanb.64400@gmail.com', 'bouteille d\'eau', 'dzqdzqd'),
(32, '2023-05-27 11:40:00', 'jordanb.64400@gmail.com', 'dzqdq', 'dzqdzqdq'),
(33, '2023-05-27 11:00:00', 'jordanb.64400@gmail.com', 'dzqdq', 'dqzdqzd'),
(34, '2023-05-27 11:43:29', 'jordanb.64400@gmail.com', 'dzqdqz', 'dzqdzqdq'),
(35, '2023-05-27 09:45:04', 'jordanb.64400@gmail.com', 'bouteille d\'eau', 'dzqdzqdzq'),
(36, '2023-05-27 09:45:31', 'jordanb.64400@gmail.com', 'dzqdqz', 'dzqdzqdzq'),
(37, '2023-05-27 09:48:02', 'jordanb.64400@gmail.com', 'dqzdq', 'dzqdqz  dzqd  dqzdqdzq'),
(38, '0000-00-00 00:00:00', 'dqzdq@gmail.com', 'dzqd', 'format date'),
(39, '1970-01-01 00:00:00', 'jordanb.64400@gmail.com', 'bouteille d\'eau', 'qzddqzdqz'),
(40, '2023-05-27 09:52:39', 'jordanb.64400@gmail.com', 'Jordan Berot', 'TOUT EST OKKKKKKKKKKKKK !! <3'),
(43, '2023-05-28 22:55:53', 'dqzdq@gmail.com', 'bouteille d\'eau', 'test test test 28/05'),
(44, '2023-06-04 13:33:10', 'manon@gmail.com', 'Manon cas', 'super ca fonctionne, je voudrai un bonhomme de neige'),
(45, '2023-06-04 15:15:43', 'Connexion@gmail.com', 'bouteille d\'eau', 'DZQDZQDZQD'),
(46, '2023-06-04 15:19:36', 'dqzdq@gmail.com', 'dzqdzq', 'qdzqdzq'),
(47, '2023-06-04 15:30:28', 'dzqdsdqdzd@dqz.com', 'bouteille d\'eau', 'dzqdzqdsqdsqd qdsqd qzdqzd');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `IdUser` int(11) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`IdUser`, `Mail`, `mdp`) VALUES
(3, 'Azerty@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(4, 'Azerty@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(5, 'Azerty@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(6, 'azertyyy@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(7, 'Nicolas@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(8, 'Nicolas@gmail.com', '529fdc710be6b1224022c2a6395a94173ef90d3cf3936aa6e0e7ea6b7280f147'),
(9, 'manon@gmail.com', '694947af650c7f5bf4e9c41bb83e383cded268fed3ee7f6e41c0a6d78967e6e4'),
(10, 'jordanb.64400@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(11, 'testtest@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(12, 'testestest@gmail.com', '95a5e804c59a267645e4e64d9bad9ca0e8ce13b936a17a28def33c14b9f919c0'),
(13, 'Azerty@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(14, 'Azerty@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(15, 'Azerty@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(16, 'Azerty@gmail', '61268976b8f1d596785199efa0a79a10af1a3ed13c5f5c842574dc8142c1386c'),
(18, 'kyky@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(19, 'Connexion@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(20, 'test@test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(21, 'dacheuxmarie07@gmail.com', '78f7b9977b26e996a58e07c169a3b694a88190053e64ec1f1adfe18a676f0320'),
(22, 'mariedacheux07@gmail.com', 'c6d17a3613b9914e68707fcfac8410f097643bc5840681bb533030d73cbb18f8');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdAdmin`);

--
-- Index pour la table `bouteilles`
--
ALTER TABLE `bouteilles`
  ADD PRIMARY KEY (`ID_B`);

--
-- Index pour la table `cocktails`
--
ALTER TABLE `cocktails`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`Id_commande`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`IdUser_C`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `IdAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `bouteilles`
--
ALTER TABLE `bouteilles`
  MODIFY `ID_B` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `cocktails`
--
ALTER TABLE `cocktails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `Id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `IdUser_C` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
