
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Base de données: `Voyage

CREATE TABLE IF NOT EXISTS `voyage` (
  `idvoy` int(11) NOT NULL AUTO_INCREMENT,
  `villedep` varchar(60) NOT NULL,
  `villedest` varchar(60) NOT NULL,
  `nbpassagers` smallint(6) NOT NULL,
  `jour` smallint(6) NOT NULL,
  `mois` smallint(6) NOT NULL,
  `annee` smallint(6) NOT NULL,
  PRIMARY KEY (`idvoy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- Contenu de la table `voyage`

INSERT INTO `voyage` (`idvoy`, `villedep`, `villedest`, `nbpassagers`, `jour`, `mois`, `annee`) VALUES
(1, 'Antananarivo', 'Fianaratsoa', 38, 12, 8, 2023),
(3, 'Tulear', 'Antananarivo', 37, 13, 7, 2023),
(4, 'Antananarivo', 'Majunga', 27, 10, 4, 2023),
(5, 'Majunga', 'Fianaratsoa', 40, 23, 3, 2023),
(6, 'Fianaratsoa', 'Majunga', 27, 18, 2, 2023),
(7, 'Antananarivo', 'Tulear', 34, 207, 9, 2023),
(8, 'Diego', 'Fianaratsoa', 36, 29, 11, 2023),
(9, 'Fianaratsoa', 'Diego', 30, 22, 12, 2023),
(10, 'Antananarivo', 'Fianaratsoa', 32, 20, 5, 2023),
(11, 'Fianaratsoa', 'Antananarivo', 32, 8, 10, 2023),
(12, 'Antananarivo', 'Tulear', 18, 8, 6, 2023);


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `tb_occupation` (
  `proprio_id` varchar(20) NOT NULL,
  `proprio_nom` varchar(50) NOT NULL,
  `mt_type` varchar(30) NOT NULL,
  `mt_matricule` varchar(20) DEFAULT NULL,
  `id_place` int(11) NOT NULL,
  PRIMARY KEY (`proprio_id`),
  UNIQUE KEY `id_place` (`id_place`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Contenu de la table `tb_occupation`
INSERT INTO `tb_occupation` (`proprio_id`, `proprio_nom`, `mt_type`, `mt_matricule`, `id_place`) VALUES
('7685735', 'DERA', 'MOTO', '18X090911', 9),
('9877542', 'ANDRY', 'MOTO', '18M347812', 7),
('9878781', 'BEBETO', 'VELO', '', 13),
('2436676', 'FETRA', 'MOTO', '18P170918', 8),
('2529345', 'JULIEN', 'VOITURE', '380942P', 1),
('0980513', 'BAKOLY', 'VOITURE', '270943T', 2),
('8951789', 'HAJA', 'MOTO', '18Z380189', 10);

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

ALTER TABLE `tb_occupation`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_place`) REFERENCES `tb_place` (`num_place`);


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `tb_action` (
  `id_action` int(11) NOT NULL AUTO_INCREMENT,
  `nature_action` varchar(30) NOT NULL,
  `date_action` date NOT NULL,
  `nom_voiture` varchar(80) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id_action`),
  KEY `fk` (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `tb_action`
--

INSERT INTO `tb_action` (`id_action`, `nature_action`, `date_action`, `nom_produit`, `quantite_produit`, `numero`) VALUES
(1, 'COMMANDE', '2023-07-09', 'MAZDA', 0, 1),
(2, 'COMMANDE', '2023-07-10', 'STAREX', 0, 1),
(3, 'COMMANDE', '2023-06-22', 'SPRINTER', 0, 1),

-- Structure de la table `tb_client`

CREATE TABLE IF NOT EXISTS `tb_client` (
  `num_ordre` int(11) NOT NULL,
  `nom_client` varchar(150) NOT NULL,
  `contact_client` varchar(30) NOT NULL,
  PRIMARY KEY (`num_ordre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Contenu de la table `tb_client`

INSERT INTO `tb_client` (`num_ordre`, `nom_client`, `contact_client`) VALUES
(1, 'DERA', '60893415'),
(2, 'BEBETO', '66124701'),
(3, 'DASS', '66070711'),
(4, 'RINA', '66778811');
-
ALTER TABLE `tb_action`
  ADD CONSTRAINT `fk` FOREIGN KEY (`numero`) REFERENCES `tb_client` (`num_ordre`);
