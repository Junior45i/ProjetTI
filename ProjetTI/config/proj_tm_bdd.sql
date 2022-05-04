-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 mai 2022 à 18:28
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `proj_tm_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `ami`
--

DROP TABLE IF EXISTS `ami`;
CREATE TABLE IF NOT EXISTS `ami` (
  `date_ami` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idMem1` int(10) UNSIGNED NOT NULL,
  `idMem2` int(10) UNSIGNED NOT NULL,
  `statut` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`idMem1`,`idMem2`),
  KEY `fkAmi2` (`idMem2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_comment`, `id_auteur`, `id_question`, `contenu`) VALUES
(1, 1, 48, 'Test'),
(2, 1, 48, 'sdf'),
(3, 1, 48, 'sdf'),
(4, 1, 48, 'sdf'),
(5, 5, 50, 'test'),
(6, 5, 50, 'Test'),
(7, 10, 50, 'qsd'),
(8, 10, 54, 'xxxxx'),
(10, 10, 54, '&lt;script&gt;alert(&quot;coucou&quot;);&lt;/script&gt;'),
(11, 10, 54, '(&quot;coucou&quot;)'),
(12, 10, 54, '(&quot;coucou&quot;)'),
(13, 10, 54, 'wxc'),
(14, 10, 54, 'dsf'),
(15, 10, 54, '&lt;script&gt;alert(&quot;coucou&quot;);&lt;/script&gt;'),
(16, 10, 54, 'sdf'),
(17, 10, 54, 'sdf'),
(18, 10, 54, '&lt;script&gt;alert(&quot;coucou&quot;);&lt;/script&gt;');

-- --------------------------------------------------------

--
-- Structure de la table `likee`
--

DROP TABLE IF EXISTS `likee`;
CREATE TABLE IF NOT EXISTS `likee` (
  `date_like` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idPubli` int(10) UNSIGNED NOT NULL,
  `idMem` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idMem`,`idPubli`),
  KEY `fkLikePubli` (`idPubli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `nomMem` varchar(30) NOT NULL,
  `preMem` varchar(30) NOT NULL,
  `dateNmembre` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `section` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `rue` varchar(100) DEFAULT NULL,
  `bio` varchar(250) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `telephone` varchar(12) DEFAULT NULL,
  `administrateur` tinyint(1) DEFAULT '0',
  `mdpMembre` varchar(100) NOT NULL,
  `idMem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idMem`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`nomMem`, `preMem`, `dateNmembre`, `section`, `mail`, `ville`, `rue`, `bio`, `sexe`, `telephone`, `administrateur`, `mdpMembre`, `idMem`) VALUES
('Oliosi', 'Ludovic', '1992-05-22 22:00:00', '2IG', 'mli@moi.mooi', '', 'test', 'Bonjlkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkk', 'F', '', 1, '1234', 1),
('Pascal', 'Vanmalderen', '2002-06-02 22:00:00', 'IG', 'pascal.vanmalderen@hotmail.be', NULL, NULL, NULL, NULL, NULL, 0, 'Pascal1234', 2),
('Vanmalderen', 'Test', '2022-04-25 22:00:00', 'IG', 'apscal@html.ne', '', '', ' Test', 'H', '', 0, 'Blablatest', 3),
('sdf', 'sdf', '2022-04-20 22:00:00', 'IG', 'jdsf@hml.be', NULL, NULL, NULL, NULL, NULL, 0, 'SADS23', 4),
('Vanmalderen', 'Pascal', '2002-06-02 22:00:00', 'IG', 'pv@hotmail.be', '', '', 'biloute', 'F', '', 0, '123456', 5),
('sdf', 'sdf', '2022-05-01 22:00:00', 'IG', 'jqfsd@hmtl.e', NULL, NULL, NULL, NULL, NULL, 0, '123456', 6),
('sdf', 'sdf', '2022-05-01 22:00:00', 'IG', 'sdfsdgf@hytml.be', NULL, NULL, NULL, NULL, NULL, 0, 'qsdqdsqd', 7),
('qsd', 'sqd', '2022-05-15 22:00:00', 'IG', 'paosf@mlk', NULL, NULL, NULL, NULL, NULL, 0, 'AZERTY', 8),
('qsdf', 'qsdf', '2004-05-03 22:00:00', 'IG', 'qsd@hmtl', NULL, NULL, NULL, NULL, NULL, 0, '$2y$12$k.Ti2h4PFdeZKRuUGbBmquEX877iPqEjodDBkfrk0XcLnW6soziWu', 9),
('PA', 'PA', '2022-04-30 22:00:00', 'IG', 'pva@html.be', 'Oui', 'TEst', 'Je suis ludo le boss', 'F', '0474', 0, '$2y$12$TuIdg9BxCDz5N86ZbJ6jm.Z8CI.7ERPomvrIiBw90hS8rYSM6/jVS', 10),
('qsddddd', 'df', '2022-05-01 22:00:00', 'IG', 'oisdfj@html.be', NULL, NULL, NULL, NULL, NULL, 0, '$2y$12$n0Qs60xq7UZR74UaLTYhQuTgJfzyt.NHBYQH8FZoYrcQOOdMl4WdS', 11);

-- --------------------------------------------------------

--
-- Structure de la table `msg`
--

DROP TABLE IF EXISTS `msg`;
CREATE TABLE IF NOT EXISTS `msg` (
  `contenu` varchar(500) NOT NULL,
  `datePubli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idMemDesti` int(10) UNSIGNED NOT NULL,
  `idMemExpi` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idMemDesti`,`idMemExpi`,`datePubli`),
  KEY `fkMsgExpi` (`idMemExpi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `title` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `datePubli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `compteur_like` int(10) UNSIGNED DEFAULT '0',
  `idPubli` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idMem` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idPubli`,`datePubli`,`idMem`),
  KEY `fkPublicationP` (`idMem`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`title`, `content`, `datePubli`, `compteur_like`, `idPubli`, `idMem`) VALUES
('kb', ' qsldf', '2022-04-20 08:56:23', 0, 7, 2),
('dgf', ' dfgfd', '2022-04-27 10:31:09', 0, 27, 1),
('Ma grand est morte ', ' sdg', '2022-04-27 11:36:41', 0, 33, 1),
('test', 'test', '2022-04-28 17:44:50', 0, 35, 1),
('sdf', ' sdf', '2022-04-28 17:58:28', 0, 40, 1),
('sdf', ' sdf', '2022-04-28 17:59:17', 0, 42, 1),
('sdf', ' sdf', '2022-04-28 18:01:16', 0, 44, 1),
('sdf', ' sdf', '2022-04-28 18:01:23', 0, 45, 1),
('sdf', ' sdf', '2022-04-29 07:39:12', 0, 47, 1),
('test', ' sdf', '2022-04-29 07:39:19', 0, 48, 1),
('fdg', ' dfg', '2022-04-29 16:14:09', 0, 49, 1),
('azert', ' azert', '2022-04-29 16:14:21', 0, 50, 1),
('aze', ' aze', '2022-05-01 18:20:00', 0, 52, 5),
('aaa', ' aaa', '2022-05-03 10:18:49', 0, 54, 10),
('sdf', ' ', '2022-05-03 18:06:02', 0, 65, 10),
('sdf', ' ', '2022-05-03 18:07:12', 0, 66, 10),
('fdg', ' ', '2022-05-03 18:07:39', 0, 67, 10),
('qsd', ' sdsdfsfd', '2022-05-03 18:17:01', 0, 68, 10),
('sdf', ' sdf', '2022-05-03 18:17:35', 0, 69, 10);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ami`
--
ALTER TABLE `ami`
  ADD CONSTRAINT `fkAmi1` FOREIGN KEY (`idMem1`) REFERENCES `membre` (`idMem`),
  ADD CONSTRAINT `fkAmi2` FOREIGN KEY (`idMem2`) REFERENCES `membre` (`idMem`);

--
-- Contraintes pour la table `likee`
--
ALTER TABLE `likee`
  ADD CONSTRAINT `fkLikeMem` FOREIGN KEY (`idMem`) REFERENCES `membre` (`idMem`),
  ADD CONSTRAINT `fkLikePubli` FOREIGN KEY (`idPubli`) REFERENCES `publication` (`idPubli`);

--
-- Contraintes pour la table `msg`
--
ALTER TABLE `msg`
  ADD CONSTRAINT `fkMsgDesti` FOREIGN KEY (`idMemDesti`) REFERENCES `membre` (`idMem`),
  ADD CONSTRAINT `fkMsgExpi` FOREIGN KEY (`idMemExpi`) REFERENCES `membre` (`idMem`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `fkPublicationP` FOREIGN KEY (`idMem`) REFERENCES `membre` (`idMem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
