-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 04 oct. 2020 à 10:35
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `festival`
--

-- --------------------------------------------------------

--
-- Structure de la table `attribution`
--

DROP TABLE IF EXISTS `attribution`;
CREATE TABLE IF NOT EXISTS `attribution` (
  `idEtab` char(8) NOT NULL,
  `idEquipe` char(4) NOT NULL,
  `nombreChambres` int(11) NOT NULL,
  PRIMARY KEY (`idEtab`,`idEquipe`),
  KEY `fk2_Attribution` (`idEquipe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `attribution`
--

INSERT INTO `attribution` (`idEtab`, `idEquipe`, `nombreChambres`) VALUES
('0350123A', 'g004', 13),
('0350123A', 'g005', 8),
('0350785N', 'g001', 11),
('0350785N', 'g002', 9),
('0351234W', 'g001', 3),
('0351234W', 'g006', 10),
('0351234W', 'g007', 7);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` char(4) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `identiteResponsable` varchar(40) DEFAULT NULL,
  `adressePostale` varchar(120) DEFAULT NULL,
  `nombrePersonnes` int(11) NOT NULL,
  `nomVille` varchar(40) NOT NULL,
  `hebergement` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `identiteResponsable`, `adressePostale`, `nombrePersonnes`, `nomVille`, `hebergement`) VALUES
('g001', 'Équipe de Football - Les Royals', NULL, NULL, 18, 'Limoges', 'O'),
('g002', 'Équipe de Football - Les Abeilles de Fer', NULL, NULL, 17, 'Caen', 'O'),
('g003', 'Équipe de Football - Les Mambas Rouges', NULL, NULL, 18, 'Perpignan', 'O'),
('g004', 'Équipe de Football - Les Furets', NULL, NULL, 18, 'Toulon', 'O'),
('g005', 'Équipe de Football - Les Gardiens', NULL, NULL, 19, 'Nancy', 'O'),
('g006', 'Équipe de Football - Les Vikings', NULL, NULL, 20, 'Brest', 'O'),
('g007', 'Équipe de Football - Les Coyotes', NULL, NULL, 19, 'Dunkerque', 'O'),
('g008', 'Équipe de Football - Les Milles Lunes', NULL, NULL, 17, 'Nice', 'O'),
('g009', 'Équipe de Football - Les Écureuils', NULL, NULL, 17, 'Lyon', 'O'),
('g010', 'Équipe de Football - Les Spartiates', NULL, NULL, 16, 'Nantes', 'O'),
('g011', 'Équipe de Football - Les Lames Noirs', NULL, NULL, 18, 'Rennes', 'O'),
('g012', 'Équipe de Volleyball - Les Colombes', NULL, NULL, 12, 'Limoges', 'O'),
('g013', 'Équipe de Volleyball - Les Ailes de la Liberté', NULL, NULL, 13, 'Caen', 'O'),
('g014', 'Équipe de Volleyball - Le Vent de l\'Aube', NULL, NULL, 14, 'Perpignan', 'O'),
('g015', 'Équipe de Volleyball - Les Pigeons', NULL, NULL, 10, 'Toulon', 'O'),
('g016', 'Équipe de Volleyball - Les Perroquets', NULL, NULL, 10, 'Nancy', 'O'),
('g017', 'Équipe de Volleyball - Les Croisés', NULL, NULL, 11, 'Brest', 'O'),
('g018', 'Équipe de Volleyball - Le Nord', NULL, NULL, 13, 'Dunkerque', 'O'),
('g019', 'Équipe de Volleyball - Les Corbeaux', NULL, NULL, 10, 'Nice', 'O'),
('g020', 'Équipe de Volleyball - Les Ailerons Jaunes', NULL, NULL, 14, 'Lyon', 'O'),
('g021', 'Équipe de Volleyball - L\'Armée de l\'Air', NULL, NULL, 13, 'Nantes', 'O'),
('g022', 'Équipe de Volleyball - Les Wombats Agiles', NULL, NULL, 12, 'Rennes', 'O'),
('g023', 'Équipe de Basketball - The Wizards', NULL, NULL, 10, 'Limoges', 'O'),
('g024', 'Équipe de Basketball - The Beasts', NULL, NULL, 9, 'Caen', 'O'),
('g025', 'Équipe de Basketball - The Free Riders', NULL, NULL, 12, 'Perpignan', 'O'),
('g026', 'Équipe de Basketball - The Scavengers', NULL, NULL, 11, 'Toulon', 'N'),
('g027', 'Équipe de Basketball - The Warlocks', NULL, NULL, 10, 'Nancy', 'N'),
('g028', 'Équipe de Basketball - The West Force', NULL, NULL, 10, 'Brest', 'N'),
('g029', 'Équipe de Basketball - The Mad Dragons', NULL, NULL, 9, 'Dunkerque', 'N'),
('g030', 'Équipe de Basketball - The United Nice', NULL, NULL, 9, 'Nice', 'N'),
('g031', 'Équipe de Basketball - The Lions', NULL, NULL, 11, 'Lyon', 'N'),
('g032', 'Équipe de Basketball - The Snakes', NULL, NULL, 10, 'Nantes', 'N'),
('g033', 'Équipe de Basketball - The Blue Vampires', NULL, NULL, 10, 'Rennes', 'N'),
('g034', 'Équipe de Natation - Les Oracles', NULL, NULL, 8, 'Limoges', 'N'),
('g035', 'Équipe de Natation - Les Ninjas', NULL, NULL, 7, 'Caen', 'N'),
('g036', 'Équipe de Natation - Les Barracudas', NULL, NULL, 9, 'Perpignan', 'N'),
('g037', 'Équipe de Natation - Les Requins Blancs', NULL, NULL, 8, 'Toulon', 'N'),
('g038', 'Équipe de Natation - Les Matelos', NULL, NULL, 9, 'Nancy', 'N'),
('g039', 'Équipe de Natation - Le Titanic', NULL, NULL, 7, 'Brest', 'N'),
('g040', 'Équipe de Natation - Les Explorateurs', NULL, NULL, 8, 'Dunkerque', 'N'),
('g041', 'Équipe de Natation - Les Eaux Profondes', NULL, NULL, 9, 'Nice', 'N'),
('g042', 'Équipe de Natation - Les Phoques', NULL, NULL, 9, 'Lyon', 'N'),
('g043', 'Équipe de Natation - Les Enfants de Poséidon', NULL, NULL, 8, 'Nantes', 'N'),
('g044', 'Équipe de Natation - Les Anguilles', NULL, NULL, 7, 'Rennes', 'N');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `id` char(8) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `adresseRue` varchar(45) NOT NULL,
  `codePostal` char(5) NOT NULL,
  `ville` varchar(35) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `adresseElectronique` varchar(70) DEFAULT NULL,
  `type` tinyint(4) NOT NULL,
  `civiliteResponsable` varchar(12) NOT NULL,
  `nomResponsable` varchar(25) NOT NULL,
  `prenomResponsable` varchar(25) DEFAULT NULL,
  `nombreChambresOffertes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`id`, `nom`, `adresseRue`, `codePostal`, `ville`, `tel`, `adresseElectronique`, `type`, `civiliteResponsable`, `nomResponsable`, `prenomResponsable`, `nombreChambresOffertes`) VALUES
('0350123A', 'Collège Jean Lamour', '56 Boulevard de Scarpone', '54000', 'Nancy', '0890030624', NULL, 1, 'Mme', 'Lefort', 'Anne', 58),
('0350785N', 'Collège Louis Armand', '33 Avenue de Brabois', '54000', 'Nancy', '0890030673', NULL, 1, 'M.', 'Dupont', 'Alain', 20),
('0351234W', 'Collège Saint-Dominique', '11 Rue du Manège Bp 223', '54000', 'Nancy', '0890030692', NULL, 1, 'M.', 'Durand', 'Pierre', 60),
('0352235Z', 'Lycée Henri Loritz', '29 Rue Saint-Léon', '54000', 'Nancy', '0890030695', NULL, 0, 'M.', 'Guenroc', 'Guy', 200);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attribution`
--
ALTER TABLE `attribution`
  ADD CONSTRAINT `fk1_Attribution` FOREIGN KEY (`idEtab`) REFERENCES `etablissement` (`id`),
  ADD CONSTRAINT `fk2_Attribution` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
