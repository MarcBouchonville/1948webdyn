-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 30 Novembre 2017 à 18:11
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

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
  `Email` varchar(50) COLLATE utf16_bin NOT NULL,
  `Prenom` varchar(50) COLLATE utf16_bin NOT NULL,
  `Nom` varchar(50) COLLATE utf16_bin NOT NULL,
  `Telephone` varchar(20) COLLATE utf16_bin NOT NULL,
  `Commune` varchar(50) COLLATE utf16_bin NOT NULL,
  `Commentaire` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;
