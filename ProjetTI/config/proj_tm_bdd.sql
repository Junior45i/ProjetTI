-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 26 avr. 2022 à 15:36
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

START TRANSACTION;

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
  `idPubli` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_comment`, `id_auteur`, `idPubli`, `contenu`) VALUES
(9, 3, 23, 'sdfsf'),
(27, 3, 23, 'Test'),
(28, 3, 23, 'qsd'),
(29, 3, 23, 'qsd'),
(30, 1, 23, 'dsf'),
(31, 1, 1, 'Coucou grand maitre'),
(32, 23, 24, 'Coucou moi'),
(33, 23, 23, 'qsdqds'),
(34, 24, 25, 'qsdqsdqs'),
(35, 24, 25, 'Blabla'),
(36, 24, 25, 'Blabla'),
(37, 24, 25, 'Blabla'),
(38, 24, 25, 'qsd'),
(39, 24, 25, 'df'),
(40, 1, 25, 'qsd'),
(41, 1, 27, 'qsd');

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
  `mdpMembre` varchar(30) NOT NULL,
  `idMem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idMem`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`nomMem`, `preMem`, `dateNmembre`, `section`, `mail`, `ville`, `rue`, `bio`, `sexe`, `telephone`, `administrateur`, `mdpMembre`, `idMem`) VALUES
('Oliosi', 'Ludovic', '1992-05-22 22:00:00', '2IG', 'mli@moi.mooi', 'qsdqs', 'qsdqsd', ' sqdqsd', 'F', 'qsdqsd', 1, '1234', 1),
('Vanmalderen', 'Pascal', '2002-06-02 22:00:00', 'IG', 'pascal.vanmalderen@hotmail.be', NULL, NULL, NULL, NULL, NULL, 0, 'Pascal', 3),
('Stoica', 'Marina', '2003-01-29 23:00:00', 'IG', 'test@gmail.com', 'PasAimé', 'Rue de ma mère', ' Coucou petite perruche', 'F', '048987894', 0, 'BlaBla134', 23),
('Dolamiente', 'Julien', '1986-03-31 22:00:00', 'IG', 'juju@hotmail.be', 'Stertos Ville', 'Rue de la street', ' Habdoula je suis pas arabe j aime pas ca', 'H', '045557897654', 0, 'juju123456', 24);

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
  `compteur_like` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `idPubli` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idMem` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idPubli`,`datePubli`,`idMem`),
  KEY `fkPublicationP` (`idMem`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`title`, `content`, `datePubli`, `compteur_like`, `idPubli`, `idMem`) VALUES
('vcbcvb', ' vcbcvb', '2022-04-13 14:16:06', 0, 14, 3),
('Blablabla', ' azerty', '2022-04-13 15:42:07', 0, 17, 3),
('qsd', ' qsd', '2022-04-13 15:42:53', 0, 18, 3),
('qsd', ' qsd', '2022-04-13 15:42:55', 0, 19, 3),
('sqd', ' sqd', '2022-04-13 15:42:56', 0, 20, 3),
('qsd', ' qsd', '2022-04-13 15:42:58', 0, 21, 3),
('dsf', ' sdf', '2022-04-13 15:43:00', 0, 22, 3),
('qsd', ' dsfg', '2022-04-13 15:43:02', 0, 23, 3),
('Je suios nouvelle', ' coucou', '2022-04-14 13:16:17', 0, 24, 23),
('qsdqsd', ' qsdqsd', '2022-04-19 09:48:34', 0, 26, 24),
('qsd', ' qsdqsdsf', '2022-04-24 18:39:32', 0, 27, 1);

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
