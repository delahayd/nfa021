-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 14 Mai 2014 à 21:14
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
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(25) DEFAULT NULL,
  `id_biblio_bibliotheque_TPTP` int(11) NOT NULL,
  `id_utilisateur_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`),
  KEY `FK_categorie_id_biblio_bibliotheque_TPTP` (`id_biblio_bibliotheque_TPTP`),
  KEY `FK_categorie_id_utilisateur_utilisateur` (`id_utilisateur_utilisateur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `id_biblio_bibliotheque_TPTP`, `id_utilisateur_utilisateur`) VALUES
(1, 'FOF', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
