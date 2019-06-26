-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 26 juin 2019 à 16:02
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immobilier-cellia`
--
CREATE DATABASE IF NOT EXISTS `immobilier-cellia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `immobilier-cellia`;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'ggdngn', 'gh,h,gh', 'luon', 11000, 32, 180000, 'building.jpg', 'location', 'niorfdbdb'),
(2, 'ggdngn', 'gh,h,gh', 'luon', 11000, 32, 180000, 'building.jpg', 'location', 'niorfdbdb'),
(3, 'ggdngn', 'gh,h,gh', 'luon', 24000, 42, 200000, 'building.jpg', 'vente', 'niorfdbdb'),
(4, 'ggdngn', 'gh,h,gh', 'luon', 24000, 42, 200000, 'building.jpg', 'vente', 'niorfdbdb'),
(5, 'ggdngn', 'gh,h,gh', 'luon', 24000, 42, 200000, 'building.jpg', 'vente', 'niorfdbdb'),
(6, 'ggdngn', 'gh,h,gh', 'luon', 24000, 42, 200000, 'building.jpg', 'vente', 'niorfdbdb'),
(7, 'ggdngn', 'gh,h,gh', 'luon', 24000, 42, 200000, 'building.jpg', 'vente', 'niorfdbdb'),
(8, 'ggdngn', 'gh,h,gh', 'luon', 24000, 42, 200000, 'building.jpg', 'vente', 'niorfdbdb'),
(9, 'ggdngn', 'gh,h,gh', 'luon', 24000, 42, 200000, 'building.jpg', 'vente', 'niorfdbdb'),
(10, 'ggdngn', 'gh,h,gh', 'luon', 24000, 42, 200000, 'building.jpg', 'vente', 'niorfdbdb'),
(11, 'immeuble', '20 rue de la paix', 'lausanne', 23540, 45, 300000, 'building.jpg', 'vente', 'niorfdbdb'),
(12, 'immeuble', '20 rue de la paix', 'lausanne', 23540, 45, 300000, 'building.jpg', 'vente', 'niorfdbdb');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
