-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 14 Mai 2014 à 21:15
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet_nfa021`
--

-- --------------------------------------------------------

--
-- Structure de la table `outil`
--

CREATE TABLE IF NOT EXISTS `outil` (
  `id_outil` int(11) NOT NULL AUTO_INCREMENT,
  `nom_outil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_outil`),
  UNIQUE KEY `nom_outil` (`nom_outil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `outil`
--

INSERT INTO `outil` (`id_outil`, `nom_outil`) VALUES
(1, 'zenon'),
(2, 'zenon modulo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
