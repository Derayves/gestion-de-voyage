-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 20 Août 2020 à 11:37
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Base de données: `dbvoyageurs`
-- Structure de la table `voyage`

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
(12, 'Antananarivo', 'Tulear', 18, 8, 5, 2023);

