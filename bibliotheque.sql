-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 05 Décembre 2023 à 19:08
-- Version du serveur: 4.1.22
-- Version de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `nom` varchar(20) NOT NULL default '',
  `auteur` varchar(20) NOT NULL default '',
  ` quantite` varchar(20) NOT NULL default '',
  `prix` int(8) NOT NULL default '0',
  `drapeau` varchar(8) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livre`
--


-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL default '0',
  `full_name` varchar(20) NOT NULL default '',
  `email` varchar(20) NOT NULL default '',
  `password` varchar(20) NOT NULL default ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(0, 'james bond', 'james123@gmail.om', 'eba2346346bce6e941a9');
