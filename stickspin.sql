-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 15 jan. 2025 à 12:54
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stickspin`
--

-- --------------------------------------------------------

--
-- Structure de la table `ami`
--

DROP TABLE IF EXISTS `ami`;
CREATE TABLE IF NOT EXISTS `ami` (
  `id_uti` int NOT NULL,
  `id_ami` int NOT NULL,
  `status` enum('en attente','accepté','refusé') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'en attente',
  `date` date NOT NULL,
  PRIMARY KEY (`id_uti`,`id_ami`),
  KEY `id_utilisateur` (`id_uti`),
  KEY `id_amis` (`id_ami`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_msg` int NOT NULL AUTO_INCREMENT,
  `id_exp` int NOT NULL,
  `id_rec` int NOT NULL,
  `texte` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `est_lu` tinyint(1) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`id_msg`),
  KEY `id_expediteur` (`id_exp`),
  KEY `id_receveur` (`id_rec`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notif` int NOT NULL AUTO_INCREMENT,
  `id_uti` int NOT NULL,
  `type` enum('demande_amis','nouveau_meilleur_temps','message') NOT NULL,
  `contenu` text NOT NULL,
  `est_lu` tinyint(1) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`id_notif`),
  KEY `id_utilisateur` (`id_uti`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id_score` int NOT NULL AUTO_INCREMENT,
  `id_uti` int NOT NULL,
  `temps` int NOT NULL,
  `morts` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_score`),
  KEY `id_uti` (`id_uti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_uti` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `score_morts` int NOT NULL,
  `score_temps` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_uti`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
