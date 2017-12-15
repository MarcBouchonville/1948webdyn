-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 16 Novembre 2017 à 20:41
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `isuzu`
--
/*DROP DATABASE IF EXISTS isuzu;*/
CREATE DATABASE IF NOT EXISTS `isuzu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `isuzu`;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `telephone` char(10) DEFAULT NULL,
  `commune` varchar(100) DEFAULT NULL,
  `commentaire` text,
  primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`email`, `nom`, `prenom`, `telephone`, `commune`, `commentaire`) VALUES
('andrea-occhilupo@hotmail.com', 'Occhilupo', 'Andrea', '0495129130', 'Wolluwe-Saint-Lambert', 'com 1'),
('andrea-occhilupo@hotmail.comf', 'fff', 'fff', 'fff', 'Wolluwe-Saint-Lambert', 'fff'),
('andrea-occhiluspo@hotmail.com', 's', 's', 's', 'Ixelles', 's'),
('test1@test1.test1', 'test1', 'test1', 'test1', 'Wolluwe-Saint-Lambert', 'test1'),
('test2@test2.test2', 'test2', 'test2', 'test2', 'Wolluwe-Saint-Pierre', 'test2'),
('test3@test3.test3', 'test3', 'test2test3', 'test3', 'Wolluwe-Saint-Pierre', 'test3'),
('test4@test4.test4', 'test4', 'test4', 'test4', 'Wolluwe-Saint-Lambert', 'test4'),
('test5@test5.test5', 'test5', 'test5', 'test5', '.', 'test5'),
('test6@test6.test6', 'test6', 'test6', 'test6', 'Wolluwe-Saint-Lambert', 'test6'),
('test7@test7.test7', 'test7', 'test7', 'test7', 'Ixelles', 'test7'),
('test8@test8.test8', 'test8', 'test8', 'test8', 'Ixelles', 'test8');

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `id_commune` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `communes`
--

INSERT INTO `communes` (`id_commune`, `nom`) VALUES
(1, 'Wolluwe-Saint-Lambert'),
(2, 'Wolluwe-Saint-Pierre'),
(3, 'Ixelles'),
(4, 'Etterbeek');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id_commune`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `id_commune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
