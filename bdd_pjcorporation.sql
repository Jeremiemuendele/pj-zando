-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 04 oct. 2024 à 15:39
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_pjcorporation`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idamin` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `reference` text NOT NULL,
  `tel` varchar(13) NOT NULL,
  `idajouteur` varchar(5) NOT NULL,
  `adresse` text NOT NULL,
  `datecompt` varchar(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idamin`, `nom`, `prenom`, `password`, `reference`, `tel`, `idajouteur`, `adresse`, `datecompt`, `photo`) VALUES
(1, 'MUENDELE', 'jeremie', '$2y$10$cvOcSCsnJ0L6.tLH6aBeOuBFpgjpKGCf5XsHEtIJQlSVf.TVzGtlq', 'tlk', '+243813324605', '', 'chez les parent', '', 'IMG_20240719_121659_555.jpg'),
(2, 'tuluka', 'prosperine', '$2y$10$4eQorad41iV2HsluNHs4K.GwLbSROs2JH6qRxcOiEanWvYxIubnMG', 'mdl', '0123456789012', '', 'chez les parent', '', 'IMG_20240718_161704_044.jpg'),
(3, 'molengo', 'benjamain', '$2y$10$41NPstW/huLsoaK8HQ0sLOLmB6WUNLO83j1snS3WFgIDVtRyfq9E6', 'nelly', '0123456789012', '', 'chez les parent', '2024-09-25 ', 'MOLENGO.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idart` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `prix` varchar(10) NOT NULL,
  `couleur` text NOT NULL,
  `photo` text NOT NULL,
  `idcat` varchar(7) NOT NULL,
  `qt` varchar(7) NOT NULL,
  `avis` text NOT NULL,
  `datpub` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idart`, `libelle`, `contenu`, `prix`, `couleur`, `photo`, `idcat`, `qt`, `avis`, `datpub`) VALUES
(1, 'veste', 'bbbbbbbbbbbbbbbbbbbbbbb', '200$', 'noire', 'allmagne (2).jpg', '1', '10', 'bon', '2024-09-25 '),
(2, 'robe', 'ddddddddddddd eeeeeeeeeeeeettt aaaaaaaaaa iiiiiillllllll', '20$', 'rouge et beaucoup de coué', 'bresil.jpg', '2', '10', 'aaaaaaaaaaaaaaa vvvvvvvvvvvvvvvvvvvvvvvv iiiiiiiiiiiiiiii ssssssssss', '2024-09-25 '),
(3, 'jupe', 'oigoj i&#039;ji&quot;f ijij &#039;ffcc f&quot;ff àài&#039;it&#039;r&#039;&quot; &#039;&quot;r&#039;r&#039;i ijji&#039;rf ijçàj rr&quot;&#039;ç ijàojj ijijo jjio &#039;&quot;f&#039;f ', '100$', 'red', 'images-2.jpg', '2', '3', 'cool', '2024-10-01 '),
(4, 'robe', 'oigoj i&#039;ji&quot;f ijij &#039;ffcc f&quot;ff àài&#039;it&#039;r&#039;&quot; &#039;&quot;r&#039;r&#039;i ijji&#039;rf ijçàj rr&quot;&#039;ç ijàojj ijijo jjio &#039;&quot;f&#039;f ', '105$', 'red and blue', 'images-6.jpg', '1', '4', 'cooooool', '2024-10-01 '),
(5, 'talon', 'ici si vous acheter deux la livraison est pris en charge par nous kop,(g&#039;froe,', '25$', 'toutes les 12 couleurs ', 'images-2.jpg', '2', '15', 'bon', '2024-10-01 '),
(6, 'talon', 'ici si vous acheter deux la livraison est pris en charge par nous kop,(g&#039;froe,', '25$', 'toutes les 12 couleurs ', 'images-2.jpg', '1', '16', 'bon', '2024-10-01 '),
(7, 'ceinture', 'ici si vous acheter deux la livraison est pris en charge par nous kop,(g&#039;froe,', '25$', 'toutes les 12 couleurs ', 'images-2.jpg', '1', '14', 'bon', '2024-10-01 '),
(8, 'ceinture noire', 'ici si vous acheter deux la livraison est pris en charge par nous kop,(g&#039;froe,', '25$', 'noir', 'images-2.jpg', '1', '14', 'bon', '2024-10-01 ');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idcat` int(11) NOT NULL,
  `categorie` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcat`, `categorie`) VALUES
(1, 'homme'),
(2, 'femme');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idutil` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `tel` varchar(13) NOT NULL,
  `adresse` text NOT NULL,
  `photo` text NOT NULL,
  `typecompt` varchar(20) NOT NULL,
  `datecompte` date NOT NULL,
  `reference` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutil`, `pseudo`, `nom`, `prenom`, `password`, `tel`, `adresse`, `photo`, `typecompt`, `datecompte`, `reference`) VALUES
(5, 'PJ corporation', 'MUENDELE', 'jeremie', '$2y$10$/.pD3/wEhLb.PU2iLHMY1.5HfRq1kRNGoPhWztLK4Oc5VBnicisIK', '+243813324605', 'chez les parent', 'IMG_20240719_121659_555.jpg', 'Personel', '2024-09-26', 'tlk');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idamin`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idart`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcat`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idutil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idutil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
