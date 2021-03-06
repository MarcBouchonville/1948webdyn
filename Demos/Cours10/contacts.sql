-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Décembre 2017 à 13:09
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

﻿--
-- Base de données :  `commerce`
--
﻿
-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `email` varchar(50) COLLATE utf16_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf16_bin NOT NULL,
  `nom` varchar(50) COLLATE utf16_bin NOT NULL,
  `telephone` varchar(20) COLLATE utf16_bin NOT NULL,
  `commune` varchar(50) COLLATE utf16_bin NOT NULL,
  `commentaire` longtext COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin COMMENT='table contacts dans db commerce';
﻿
--
-- Contenu de la table `contacts`
--

﻿INSERT INTO `contacts` (`email`, `prenom`, `nom`, `telephone`, `commune`, `commentaire`) VALUES
('test1@gmail.com', 'test1', 'Nom1', '022255665', 'Bruxelles', 'ceci est le premier enregistrement encodé manuellement dans la table contacts de la DB commerce.')﻿,
('test1@gmail.com', 'test1', 'Nom1', '022255665', 'Bruxelles', 'ceci est le premier enregistrement encodé manuellement dans la table contacts de la DB commerce.')﻿,
('test2@hotmail.com', 'Test2', 'Nom2', '025558977', 'Ixelles', 'deuxième test d\'encodage de data dans la table contacts de la db commerce')﻿,
('trois@hotmail.com', 'trois', 'nom3', '021112233', 'Etterbeek', 'troisième entité encodée')﻿;
﻿
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
