--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `ETUDIANT` (
  `numetu` smallint(3) unsigned NOT NULL DEFAULT '0',
  `nom` varchar(50) NOT NULL DEFAULT '',
  `prenom` varchar(50) NOT NULL DEFAULT '',
  `datenaiss` date NOT NULL DEFAULT '0000-00-00',
  `rue` varchar(100) DEFAULT NULL,
  `cp` mediumint(5) DEFAULT '0',
  `ville` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`numetu`),
  UNIQUE KEY `numcli` (`numetu`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_bin;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `ETUDIANT` (`numetu`, `nom`, `prenom`, `datenaiss`, `rue`, `cp`, `ville`) VALUES
(110, 'Dupont', 'Albert', '1980-06-01', 'Rue de Crimée', 69001, 'Lyon'),
(222, 'West', 'James', '1983-09-03', 'Studio', NULL, 'Hollywood'),
(300, 'Martin', 'Marie', '1988-06-05', 'Rue des Acacias', 69130, 'Ecully'),
(421, 'Durand', 'Gaston', '1980-11-15', 'Rue de la Meuse', 69008, 'Lyon'),
(575, 'Titgoutte', 'Justine', '1985-02-28', 'Chemin du Château', 69630, 'Chaponost'),
(667, 'Dupond', 'Noémie', '1987-09-18', 'Rue de Dôle', 69007, 'Lyon'),
(999, 'Phantom', 'Marcel', '1960-01-30', NULL, NULL, NULL);

--
-- Structure de la table `notation`
--

CREATE TABLE IF NOT EXISTS `NOTATION` (
  `numetu` smallint(5) unsigned NOT NULL DEFAULT '0',
  `numepreuve` smallint(5) unsigned NOT NULL DEFAULT '0',
  `note` float DEFAULT NULL,
  PRIMARY KEY (`numetu`,`numepreuve`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_bin;

--
-- Contenu de la table `notation`
--

INSERT INTO `NOTATION` (`numetu`, `numepreuve`, `note`) VALUES
(110, 11031, 10),
(110, 11032, 11.5),
(110, 21031, 8.5),
(110, 21032, NULL),
(110, 31030, 13),
(222, 11031, 9),
(222, 11032, 14),
(222, 21031, 12),
(222, 21032, 16),
(222, 31030, 20),
(300, 11031, 14),
(300, 11032, 20),
(300, 21031, 20),
(300, 21032, 13.5),
(300, 31030, 16),
(421, 11031, 5.5),
(421, 11032, 7),
(421, 21031, 1.5),
(421, 21032, NULL),
(421, 31030, 10),
(575, 11031, 13),
(575, 11032, 9),
(575, 21031, 12.5),
(575, 21032, 14),
(575, 31030, 7),
(667, 11031, 16),
(667, 11032, 20),
(667, 21031, 8.5),
(667, 21032, 9.5),
(667, 31030, NULL);
