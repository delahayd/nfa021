-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 06 Mai 2014 à 10:45
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Structure de la table `bibliotheque_tptp`
--

CREATE TABLE IF NOT EXISTS `bibliotheque_tptp` (
  `id_biblio` int(11) NOT NULL AUTO_INCREMENT,
  `nom_biblio` varchar(25) NOT NULL,
  `id_utilisateur_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_biblio`),
  KEY `FK_bibliotheque_TPTP_id_utilisateur_utilisateur` (`id_utilisateur_utilisateur`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `bibliotheque_tptp`
--

INSERT INTO `bibliotheque_tptp` (`id_biblio`, `nom_biblio`, `id_utilisateur_utilisateur`) VALUES
(1, 'TPTP', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
