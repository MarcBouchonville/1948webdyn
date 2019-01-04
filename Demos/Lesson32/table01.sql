-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 07 Juin 2018 à 19:41
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbtest`
--

-- --------------------------------------------------------

--
-- Structure de la table `table01`
--

CREATE TABLE `table01` (
  `Id_Ville` decimal(65,0) UNSIGNED NOT NULL COMMENT 'key',
  `CP` decimal(10,0) UNSIGNED NOT NULL,
  `Ville` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='table des communes';

--
-- Contenu de la table `table01`
--

INSERT INTO `table01` (`Id_Ville`, `CP`, `Ville`) VALUES
('1', '1000', 'Bruxelles'),
('2', '1050', 'Ixelles'),
('3', '1040', 'Etterbeek');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `table01`
--
ALTER TABLE `table01`
  ADD PRIMARY KEY (`Id_Ville`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
