-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Ven 02 Avril 2021 à 13:43
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `parking_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_occupation`
--

CREATE TABLE IF NOT EXISTS `tb_occupation` (
  `proprio_id` varchar(20) NOT NULL,
  `proprio_nom` varchar(50) NOT NULL,
  `mt_type` varchar(30) NOT NULL,
  `mt_matricule` varchar(20) DEFAULT NULL,
  `id_place` int(11) NOT NULL,
  PRIMARY KEY (`proprio_id`),
  UNIQUE KEY `id_place` (`id_place`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tb_occupation`
--

INSERT INTO `tb_occupation` (`proprio_id`, `proprio_nom`, `mt_type`, `mt_matricule`, `id_place`) VALUES
('62290012', 'SIMMON', 'MOTO', '18X090911', 9),
('66234517', 'ALFRED', 'MOTO', '18M347812', 7),
('66770101', 'GHISLAIN', 'VELO', '', 13),
('90900876', 'RAOUL', 'MOTO', '18P170918', 8),
('90902345', 'JULIEN', 'VOITURE', '380942P', 1),
('99050513', 'SERGE', 'VOITURE', '270943T', 2),
('99551789', 'HAROUN', 'MOTO', '18Z380189', 10);

-- --------------------------------------------------------

--
-- Structure de la table `tb_place`
--

CREATE TABLE IF NOT EXISTS `tb_place` (
  `num_place` int(11) NOT NULL,
  `type_place` varchar(30) NOT NULL,
  `disponible` varchar(10) NOT NULL,
  PRIMARY KEY (`num_place`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tb_place`
--

INSERT INTO `tb_place` (`num_place`, `type_place`, `disponible`) VALUES
(1, 'PLACE VOITURE', 'non'),
(2, 'PLACE VOITURE', 'non'),
(4, 'PLACE VOITURE', 'oui'),
(5, 'PLACE VOITURE', 'oui'),
(6, 'PLACE VOITURE', 'oui'),
(7, 'PLACE MOTO', 'non'),
(8, 'PLACE MOTO', 'non'),
(9, 'PLACE MOTO', 'non'),
(10, 'PLACE MOTO', 'non'),
(11, 'PLACE MOTO', 'oui'),
(12, 'PLACE MOTO', 'oui'),
(13, 'PLACE VELO', 'non'),
(14, 'PLACE VELO', 'oui'),
(15, 'PLACE VELO', 'oui'),
(16, 'PLACE MOTO', 'oui');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tb_occupation`
--
ALTER TABLE `tb_occupation`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_place`) REFERENCES `tb_place` (`num_place`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
